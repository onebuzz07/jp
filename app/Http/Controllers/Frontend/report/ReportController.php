<?php

namespace App\Http\Controllers\Frontend\report;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Access\plan;
use App\Models\Access\sales;
use App\Models\Access\item;
use App\Models\Access\product;
use App\Models\Access\FileUpload;
use App\Models\Access\Stockupdate;
use App\Models\Access\Stocklist;
use App\Models\Access\Salesqad;
use App\Models\Access\Requisite;
use App\Models\Access\Process;
use App\Models\Access\Salesorder;
use App\Models\Access\Workorder;
use App\Models\Access\Stock;
use App\Models\Access\Inventory;
use App\Models\Access\Station;
use App\Models\Access\Production;
use App\Models\Access\Wotype;

use PDF;
use Image;
use Carbon\Carbon;
use Session;
use Yajra\Datatables\Facades\Datatables;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
      $sales = Sales::has('station')->get();
      return  view('frontend.report.index')->with('sales', $sales);
    }

    public function reportsearch(Request $request)
    {
      $wid= $request->input('wid');

      if ($request->has('wid') != null){

        $sales = Sales::where('wid','like','%'.$wid.'%')->get();
        return  view('frontend.report.index')->with('sales', $sales);
      }
      else
      {
        // $sales = Sales::all();
        $sales = Sales::has('station')->get();
        return view('frontend.report.index')->with('sales', $sales);
      }
    }

    public function indexpdf(Request $request)
    {
      $check = $request->input('operation');
      $wo = $request->input('workorder');

        $station = Station::whereIn('operation', $check)->where('workorder', $wo)->get();
        $workorder = Workorder::where('wo_number', $wo)->first();
        $wotype = Wotype::where('workorders_id', $workorder->id)->first();
        $sales = Sales::where('workorder', $wo)->first();

          $data = [
            'station' =>$station,
            'workorder' =>$workorder,
            'sales' =>$sales,
            'wotype' =>$wotype,
          ];
      $pdf = PDF::loadView('frontend.report.indexresult', $data);
      return $pdf->stream("test.pdf");

      // return PDF::loadFile('http://www.github.com')->inline('github.pdf');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
