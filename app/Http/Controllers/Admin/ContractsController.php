<?php

namespace App\Http\Controllers\Admin;
// include 'C:\xampp\php\PEAR\ChromePhp.php';
//require_once 'Classes/PHPExcel/IOFactory.php';
use App\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContractsRequest;
use App\Http\Requests\Admin\UpdateContractsRequest;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\Carbon;
use JavaScript;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Filesystem;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
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


        $user = \Auth::user();

        if (request()->ajax()) {
            $query = Contract::query();
            if (\Auth::getUser()->id==1 || \Auth::getUser()->id==2) {
              $query->with("owner");
            }
            else {
              $query->with("owner")->where('owner_id',$user->id)->get();
            }
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
      //  var_dump($request->file('records')->getClientOriginalName());
        $path=$request->file('records')->storeAs('Records',$request->contractsname.'_'.$request->l_name.''.Carbon::now()->format('Y-m-d-H-i-s').''.$request->file('records')->getClientOriginalName());
        //var_dump($path->getFileExtension());
        // Excel::load($path,function ($reader)
        // {
        //   $results = $reader->get();
        //   var_dump($results);
        // });
        $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        //dd($path);
        $contract = new Contract();
        $contract->contractsname= $request->contractsname;
        $contract->salutation= $request->salutation;
        $contract->f_name= $request->f_name;
        $contract->l_name=$request->l_name;
        $contract->addresse=$request->addresse;
        $contract->zihlerpunktnummer=$request->zihlerpunktnummer;
        $contract->telephone=$request->telephone;
        $contract->mobile=$request->mobile;
        $contract->fax=$request->fax;
        $contract->consumption_HT=$request->consumption_HT;
        $contract->consumption_NT=$request->consumption_NT;
        $contract->powersupplier=$request->powersupplier;
        $contract->tension_MS=$request->tension_MS;
        $contract->tension_HS=$request->tension_HS;
        $contract->end_date=$request->end_date;
        $contract->owner_id=$request->owner_id;
        $contract->records=$path;
        // $contract = Contract::create($request->all());
        $contract->save();
        $file = fopen($storagePath.''.$path, "r");

        while (($line = fgetcsv($file))!== FALSE){
          dd('Here is the File being read!!!!!!!!!!!!!!!!!!!!');

        }


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
        //show the csv File content
        $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        $file = fopen($storagePath.''.$contract->records, "r");
        $file_contents = array();
        if (($file = fopen($storagePath.''.$contract->records, "r")) !== FALSE) {
          while (!feof($file)){
            $line = fgetcsv($file,1000,';');
            //$line = array_map("utf8_encode", $line);
            array_push($file_contents, $line);


          }
        }
        // echo "<pre>";
        // var_dump($file_contents);
        // echo "</pre>";
      fclose($file);
      


        return view('admin.contracts.show', compact(['contract','file_contents']));
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
    private function _import_csv($path, $filename)
    {

        $csv = $path . $filename;
        $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE users FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n' IGNORE 0 LINES (`firstname`, `lastname`, `username`, `gender`, `email`, `country`, `ethnicity`, `education`  )", addslashes($csv));
    return DB::connection()->getpdo()->exec($query);

    }
    public function download_file($filename)
    {
        return redirect()->route('admin.contracts.index');
    }

}
