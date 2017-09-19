<?php

namespace App\Http\Controllers\Admin;
include 'C:\xampp\php\PEAR\ChromePhp.php';
use App\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContractsRequest;
use App\Http\Requests\Admin\UpdateContractsRequest;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\Carbon;
use Illuminate\Contracts\Filesystem;
use Illuminate\Support\Facades\Storage;
class ContractsController extends Controller
{
    /**
     * Display a listing of Contract.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('contract_access')) {
            return abort(401);
        }



        if (request()->ajax()) {
            $query = Contract::query();
            $query->with("owner");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('contract_delete')) {
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
                $gateKey  = 'contract_';
                $routeKey = 'admin.contracts';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('contractsname', function ($row) {
                return $row->contractsname ? $row->contractsname : '';
            });
            $table->editColumn('end_date', function ($row) {
                return $row->end_date ? $row->end_date : '';
            });
            $table->editColumn('owner.name', function ($row) {
                return $row->owner ? $row->owner->name : '';
            });

            return $table->make(true);
        }

        return view('admin.contracts.index');
    }

    /**
     * Show the form for creating new Contract.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('contract_create')) {
            return abort(401);
        }

        // ChromePhp::log('Hello console!');
        // $owners = \App\User::get()->pluck(DB::raw("CONCAT(name,' ',lastname) AS name"), 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $owners = \App\User::select(
            DB::raw("CONCAT(name,' ',lastname) AS name"),'id')
            ->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.contracts.create', compact('owners'));
    }

    /**
     * Store a newly created Contract in storage.
     *
     * @param  \App\Http\Requests\StoreContractsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContractsRequest $request)
    {
        if (! Gate::allows('contract_create')) {
            return abort(401);
        }
        if(!Storage::disk('local')->exists('Records')) Storage::makeDirectory('Records');
        $path=$request->file('records')->storeAs('Records',$request->contractsname.'_'.$request->l_name.''.Carbon::now()->format('Y-m-d-H-i-s'));
        $contract = Contract::create($request->all());



        return redirect()->route('admin.contracts.index');
    }


    /**
     * Show the form for editing Contract.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('contract_edit')) {
            return abort(401);
        }

        $owners = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $contract = Contract::findOrFail($id);

        return view('admin.contracts.edit', compact('contract', 'owners'));
    }

    /**
     * Update Contract in storage.
     *
     * @param  \App\Http\Requests\UpdateContractsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContractsRequest $request, $id)
    {
        if (! Gate::allows('contract_edit')) {
            return abort(401);
        }
        $contract = Contract::findOrFail($id);
        $contract->update($request->all());



        return redirect()->route('admin.contracts.index');
    }


    /**
     * Display Contract.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('contract_view')) {
            return abort(401);
        }
        $contract = Contract::findOrFail($id);

        return view('admin.contracts.show', compact('contract'));
    }


    /**
     * Remove Contract from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('contract_delete')) {
            return abort(401);
        }
        $contract = Contract::findOrFail($id);
        $contract->delete();

        return redirect()->route('admin.contracts.index');
    }

    /**
     * Delete all selected Contract at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('contract_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Contract::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Contract from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('contract_delete')) {
            return abort(401);
        }
        $contract = Contract::onlyTrashed()->findOrFail($id);
        $contract->restore();

        return redirect()->route('admin.contracts.index');
    }

    /**
     * Permanently delete Contract from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('contract_delete')) {
            return abort(401);
        }
        $contract = Contract::onlyTrashed()->findOrFail($id);
        $contract->forceDelete();

        return redirect()->route('admin.contracts.index');
    }
}
