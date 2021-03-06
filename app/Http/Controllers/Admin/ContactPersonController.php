<?php

namespace App\Http\Controllers\Admin;

use App\ContactPerson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\Carbon;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Filesystem;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreContactPersonRequest;
use App\Http\Requests\Admin\UpdateContactPersonRequest;
use Illuminate\Support\Facades\Input;

class ContactPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (! Gate::allows('contactpersons_access')) {
          return abort(401);
      }
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (! Gate::allows('contactpersons_create')) {
            return abort(401);
        }
        dd("heyy");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (! Gate::allows('contactpersons_create')) {
            return abort(401);
        }
        //dd($request->all());
        $ContactPerson = new ContactPerson();
        $contactPerson = ContactPerson::create($request->all());
        return redirect()->route('admin.suppliers.show',['supplier' => $contactPerson->suppliers_id]);
        //var_dump($contactPerson);




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if (! Gate::allows('contactpersons_view')) {
            return abort(401);
        }

        // $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        // $groups = \App\Group::get()->pluck('grp_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$user_actions = \App\UserAction::where('user_id', $id)->get();$groups = \App\Group::where('admin_id', $id)->get();$contracts = \App\Contract::where('owner_id', $id)->get();
        $user = ContactPerson::findOrFail($id);
        $supplier = \App\Supplier::where('id',$user->suppliers_id)->get()->pluck('Name');
        //var_dump($supplier[0]);
        return view('admin.contactpersons.show', compact('user', 'supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (! Gate::allows('contactpersons_edit')) {
            return abort(401);
        }
        $contactperson = ContactPerson::findOrFail($id);

        return view('admin.contactpersons.edit', compact('contactperson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactPersonRequest $request, $id)
    {
        //
        if (! Gate::allows('contactpersons_edit')) {
            return abort(401);
        }
        $contactperson = ContactPerson::findOrFail($id);
        $contactperson->update($request->all());



        return redirect()->route('admin.suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (! Gate::allows('contactpersons_delete')) {
            return abort(401);
        }
        $contactperson = ContactPerson::findOrFail($id);
        $contactperson->delete();

        return redirect()->route('admin.suppliers.index');
    }
}
