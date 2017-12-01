<?php

namespace App\Http\Controllers\Admin;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSuppliersRequest;
use App\Http\Requests\Admin\UpdateSuppliersRequest;
use Yajra\Datatables\Datatables;
use DB;
class SuppliersController extends Controller
{
    /**
     * Display a listing of Group.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('supplier_access')) {
            return abort(401);
        }


        $user = \Auth::user();

        if (request()->ajax()) {
            $query = Supplier::query();


          //  $query = Contract::query();
              if (\Auth::getUser()->role_id==1) {
              //  $q->get();
              $q = Supplier::select(['name','anschrift']);
             }
            // else {
            //   $query->with("admin")->where('admin_id',$user->id)->get();
            // }
          //  $query->with("admin");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('supplier_delete')) {
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
                $gateKey  = 'supplier_';
                $routeKey = 'admin.suppliers';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('Name', function ($row) {
                return $row->Name ? $row->Name : '';
            });
            $table->editColumn('anschrift', function ($row) {
                return $row->anschrift ? $row->anschrift : '';
            });
            // $table->editColumn('admin.lastname', function ($row) {
            //     return $row->admin ? $row->admin->lastname : '';
            // });

            return $table->make(true);
        }

        return view('admin.suppliers.index');
    }

    /**
     * Show the form for creating new Group.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('supplier_access_create')) {
            return abort(401);
        }
        $admins = \App\User::select(
            DB::raw("CONCAT(name,' ',lastname) AS name"),'id')
            ->where('role_id',2)
            ->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        // $admins = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.suppliers.create', compact('admins'));
    }

    /**
     * Store a newly created Group in storage.
     *
     * @param  \App\Http\Requests\StoreGroupsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupsRequest $request)
    {
        if (! Gate::allows('suppliers_create')) {
            return abort(401);
        }
        $group = Supplier::create($request->all());



        return redirect()->route('admin.suppliers.index');
    }


    /**
     * Show the form for editing Group.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('supplier_edit')) {
            return abort(401);
        }

        $admins = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $supplier = Supplier::findOrFail($id);

        return view('admin.suppliers.edit', compact('supplier', 'admins'));
    }

    /**
     * Update Supplier in storage.
     *
     * @param  \App\Http\Requests\UpdateSuppliersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuppliersRequest $request, $id)
    {
        if (! Gate::allows('supplier_edit')) {
            return abort(401);
        }
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());



        return redirect()->route('admin.supplier.index');
    }


    /**
     * Display Supplier.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('supplier_view')) {
            return abort(401);
        }

        //$admins = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $contact_persons = \App\ContactPerson::where('suppliers_id', $id)->get();

        $supplier = Supplier::findOrFail($id);

        return view('admin.suppliers.show', compact('supplier', 'contact_persons'));
    }


    /**
     * Remove Supplier from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('supplier_delete')) {
            return abort(401);
        }
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('admin.suppliers.index');
    }

    /**
     * Delete all selected Suppliers at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('supplier_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Supplier::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Supplier from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('supplier_delete')) {
            return abort(401);
        }
        $supplier = Supplier::onlyTrashed()->findOrFail($id);
        $supplier->restore();

        return redirect()->route('admin.suppliers.index');
    }

    /**
     * Permanently delete Supllier from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('supplier_delete')) {
            return abort(401);
        }
        $supplier = Supplier::onlyTrashed()->findOrFail($id);
        $supplier->forceDelete();

        return redirect()->route('admin.suppliers.index');
    }
}
