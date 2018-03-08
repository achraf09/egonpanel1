<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Controllers\Controller;
use App\Offer;
use App\Http\Controllers\Admin\ChunkReadFilter;
use Illuminate\Http\Request;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Filesystem;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use \Chumper\Zipper\Zipper;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
use File;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
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
    //////////+++++++++++++++++++
    public function string_to_int($input)
    {
      $n=explode("E+",$input);
      $b=explode(",", $n[0]);
      $num=intval($n[1]);
      $r1= floatval($b[0].'.'.$b[1]);
      return $r1*pow(10,$num);
    }
    public function tofloat($stri) {
      $nume = explode("E", $stri);
      $num=$nume[0];
      $expo=$nume[1];
      $dotPos = strrpos($num, '.');
      $commaPos = strrpos($num, ',');
      $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
      ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

      if (!$sep) {
        return floatval(preg_replace("/[^0-9]/", "", $num));
      }

      return floatval(
        preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
        preg_replace("/[^0-9]/", "", substr($num, $sep+1, strlen($num)))
      )*(pow(10,(float)$expo));
    }

    /////////+++++++++++++++++++++++

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
          if(!Storage::disk('local')->exists('tmp')) Storage::makeDirectory('tmp');
          $zipper->zip($request->file('offers'))->extractTo(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'tmp');

        //  $zipper->make($request->file('offers')->getClientOriginalName())->getFileContent(); //getClientOriginalName())->extractTo('/Offers');

        $files = File::allFiles(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'tmp');
        // dd($files[0]);
        // foreach ($files as $fich)
        // {
        //
        $fich = $files[0];
        // $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xls");
        // $spreadsheet = $reader->load($fich);
         //################## $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fich);

         //################  $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
         // ############### dd(self::tofloat($sheetData[679]["E"]));
         /****************************/


         $reader = ReaderFactory::create(Type::CSV); // for XLSX files
         //$reader = ReaderFactory::create(Type::CSV); // for CSV files
         //$reader = ReaderFactory::create(Type::ODS); // for ODS files
         $reader->setFieldDelimiter("\t");
         // $reader->setFieldEnclosure('@');
          $reader->setEndOfLineCharacter("\r");
          $reader->setEncoding('Windows-1252');
         $reader->open($fich);
         if(!Storage::disk('local')->exists('OffersCSV')) Storage::makeDirectory('OffersCSV');

         $writer = WriterFactory::create(Type::CSV);
         //$writer->setEncoding('UTF-8');

         $path_parts = pathinfo($fich);
         //dd(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'OffersCSV\\'.$path_parts['filename'].".csv");
         $writer->openToFile(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'OffersCSV\\'.$path_parts['filename'].".csv"); // write data to a file or to a PHP stream





         foreach ($reader->getSheetIterator() as $sheet) {
           foreach ($sheet->getRowIterator() as $row) {
             // do stuff with the row
             try {
               $row[4]= self::string_to_int($row[4]);

             } catch (\Exception $e) {
               $row[4]=$row[4];
             }
             if ($row[0] != "PLZ") {
               $row[0]=str_pad($row[0],5,'0',STR_PAD_LEFT);

             }
             $writer->addRow($row); // add a row at a time
             //var_dump($row);
             //var_dump("\n");
           }
         }

         $reader->close();
         $writer->close();
         
         // $helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory with a defined reader type of ' . $inputFileType);
         // Create a new Reader of the type defined in $inputFileType
         //////////////////////////////////////////////////////////////////////////////////*****************To keep//////////////////////

        /*
         $inputFileType = IOFactory::identify($fich);
         $reader = IOFactory::createReader($inputFileType);

         // Define how many rows we want to read for each "chunk"
         $chunkSize = 90000;
         // Create a new Instance of our Read Filter
         $chunkFilter = new ChunkReadFilter();

         // Tell the Reader that we want to use the Read Filter that we've Instantiated
         $reader->setReadFilter($chunkFilter);

         // Loop to read our worksheet in "chunk size" blocks
         for ($startRow = 2; $startRow <= 300000; $startRow += $chunkSize) {
             //$helper->log('Loading WorkSheet using configurable filter for headings row 1 and for rows ' . $startRow . ' to ' . ($startRow + $chunkSize - 1));
             // Tell the Read Filter, the limits on which rows we want to read this iteration
             $chunkFilter = new chunkReadFilter();
             $chunkFilter->setRows($startRow, $chunkSize);
             $reader->setReadFilter($chunkFilter);

             // Load only the rows that match our filter from $inputFileName to a PhpSpreadsheet Object
             $spreadsheet = $reader->load($fich);

             //	Do some processing here

             $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
             var_dump($sheetData);
             $spreadsheet->disconnectWorksheets();
             unset($spreadsheet);
         }
         */
/////////////////////////////////////////////////////////////***********************************************////////////////////////////////////////




         /******************************/
         //  $cellValue = $spreadsheet->getActiveSheet()->getCell('A1')->getValue();
         // dd($cellValue);
        //  $writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
          //$writer->setDelimiter(';');
          // $writer->setEnclosure('');
          // $writer->setLineEnding("\r\n");
          // $writer->setSheetIndex(0);

        //  $writer->save("05featuredemo.csv");

        //   flush;
        // }


        //$files = Storage::files(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'\tmp');
        //$str = implode("", [Storage::files(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'\tmp'), $files] );

          //dd(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix());



          $success = File::cleanDirectory(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'tmp');
          //var_dump($path->getFileExtension());
          // Excel::load($path,function ($reader)
          // {
          //   $results = $reader->get();
          //   var_dump($results);
          // });
          //$storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        }
      }
      else {
        $path="";
      }
      return response()->download(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'OffersCSV\\'.$path_parts['filename'].".csv");
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
