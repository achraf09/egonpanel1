<?php

namespace App\Http\Controllers\Admin;

use App\ContactPerson;
use Illuminate\Http\Request;

class ContactPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (! Gate::allows('contract_access')) {
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