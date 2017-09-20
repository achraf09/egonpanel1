<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGroupsRequest;
use App\Http\Requests\Admin\UpdateGroupsRequest;
use Yajra\Datatables\Datatables;
use DB;
class GroupsController extends Controller
{
    /**
     * Display a listing of Group.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('group_access')) {
            return abort(401);
        }


        $user = \Auth::user();

        if (request()->ajax()) {
            $query = Group::query();
          //  $query = Contract::query();
            if (\Auth::getUser()->id==1) {
              $query->with("admin");
            }
            else {
              $query->with("admin")->where('admin_id',$user->id)->get();
            }
          //  $query->with("admin");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('group_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'group_';
                $routeKey = 'admin.groups';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('grp_name', function ($row) {
                return $row->grp_name ? $row->grp_name : '';
            });
            $table->editColumn('admin.name', function ($row) {
                return $row->admin ? $row->admin->name."\t".$row->admin->lastname : '';
            });
            // $table->editColumn('admin.lastname', function ($row) {
            //     return $row->admin ? $row->admin->lastname : '';
            // });

            return $table->make(true);
        }

        return view('admin.groups.index');
    }

    /**
     * Show the form for creating new Group.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('group_create')) {
            return abort(401);
        }
        $admins = \App\User::select(
            DB::raw("CONCAT(name,' ',lastname) AS name"),'id')
            ->where('role_id',2)
            ->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        // $admins = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.groups.create', compact('admins'));
    }

    /**
     * Store a newly created Group in storage.
     *
     * @param  \App\Http\Requests\StoreGroupsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupsRequest $request)
    {
        if (! Gate::allows('group_create')) {
            return abort(401);
        }
        $group = Group::create($request->all());



        return redirect()->route('admin.groups.index');
    }


    /**
     * Show the form for editing Group.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('group_edit')) {
            return abort(401);
        }

        $admins = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $group = Group::findOrFail($id);

        return view('admin.groups.edit', compact('group', 'admins'));
    }

    /**
     * Update Group in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupsRequest $request, $id)
    {
        if (! Gate::allows('group_edit')) {
            return abort(401);
        }
        $group = Group::findOrFail($id);
        $group->update($request->all());



        return redirect()->route('admin.groups.index');
    }


    /**
     * Display Group.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('group_view')) {
            return abort(401);
        }

        $admins = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$users = \App\User::where('group_id', $id)->get();

        $group = Group::findOrFail($id);

        return view('admin.groups.show', compact('group', 'users'));
    }


    /**
     * Remove Group from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('group_delete')) {
            return abort(401);
        }
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('admin.groups.index');
    }

    /**
     * Delete all selected Group at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('group_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Group::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Group from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('group_delete')) {
            return abort(401);
        }
        $group = Group::onlyTrashed()->findOrFail($id);
        $group->restore();

        return redirect()->route('admin.groups.index');
    }

    /**
     * Permanently delete Group from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('group_delete')) {
            return abort(401);
        }
        $group = Group::onlyTrashed()->findOrFail($id);
        $group->forceDelete();

        return redirect()->route('admin.groups.index');
    }
}
