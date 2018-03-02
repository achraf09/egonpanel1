<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Filesystem;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use \Chumper\Zipper\Zipper;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.offers.index');
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
     * @param  \App\Offers  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $product)
    {
        //
    }

    public function upload(Request $request)
    {
      //dd("fghfgh");
      //dd(Request::hasFile("offers"));
      if ($request->hasFile('offers')) {
      //  dd("hello");
        if ($request->file('offers')->isValid()) {
          if(!Storage::disk('local')->exists('Offers')) Storage::makeDirectory('Offers');
        // dd(Request::file('offers')->getClientOriginalName());
          $path=$request->file('offers')->storeAs('Offers', $request->file('offers')->getClientOriginalName());

          $zipper = new \Chumper\Zipper\Zipper;
          //dd($request->file('offers')->getClientOriginalName());
          $zipper->zip($request->file('offers'))->extractTo(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'\public');
          
        //  $zipper->make($request->file('offers')->getClientOriginalName())->getFileContent(); //getClientOriginalName())->extractTo('/Offers');
          dd(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix());
          //var_dump($path->getFileExtension());
          // Excel::load($path,function ($reader)
          // {
          //   $results = $reader->get();
          //   var_dump($results);
          // });
          $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        }
      }
      else {
        $path="";
      }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $product)
    {
        //
    }
}
