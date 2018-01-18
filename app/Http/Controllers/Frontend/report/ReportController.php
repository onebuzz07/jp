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
      // $sales = Sales::all();
      $sales = Sales::has('station')->get();
      return  view('frontend.report.index')->with('sales', $sales);
    }

    public function reportsearch(Request $request)
    {
      $wid= $request->input('wid');
      $custName= $request->input('custName');

      if ($request->has('wid')  != null){

        $sales = Sales::where('wid','like','%'.$wid.'%')->get();
        return  view('frontend.report.index')->with('sales', $sales);
      }
      elseif ($request->has('custName') != null)
      {
        $sales = Sales::where('custName','like','%'.$custName.'%')->get();
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
      $check = $request->input('wo_operation');

      $station = collect();

      foreach ($check as $key => $ch) {
        $c = explode('.', $ch);

        $station_temp = Station::where('operation', $c[0])->where('workorder', $c[1])->first();
        $workorder = Workorder::where('wo_number', $c[1])->first();

        $station->push($station_temp);
      }

      $wotype = Wotype::where('workorders_id', $workorder->id)->first();
      $sales = Sales::where('workorder', $workorder->wo_number)->first();


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

    public function anydata (Request $request)
    {
      $station = Station::join('sales', 'sales.id', '=', 'stations.sales_id' )
        ->leftJoin('items', 'items.sales_id', '=', 'sales.id')
        ->select(['stations.operation','sales.custName', 'items.partNo', 'items.partDesc', 'sales.salesorder', 'stations.workorder', 'sales.wid', 'stations.station'])
        ;

        return Datatables::of($station)
        ->editColumn('operation', function ($station) {

              return '<input type="checkbox" value ="'.$station->operation.'.'.$station->workorder.'" name="wo_operation[]" >
              ';
          })

        ->escapeColumns([])
        ->make();
    }


}
