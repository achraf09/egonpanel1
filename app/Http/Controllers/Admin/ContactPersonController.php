<?php

namespace App\Http\Controllers\Admin;

use App\ContactPerson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\Carbon;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Filesystem;
use Illuminate\Support\Facades\Storage;



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
        dd($request->all());
        ContactPerson::create($request->all());
        //var_dump($contactPerson);




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function show(ContactPerson $contactPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactPerson $contactPerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactPerson $contactPerson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactPerson $contactPerson)
    {
        //
    }
}
