<?php

namespace App\Http\Controllers\Frontend\production;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use Yajra\Datatables\Facades\Datatables;
use Image;

use App\Models\Access\Production;
use App\Models\Access\Station;


class ProductionController extends Controller
{
    protected $users;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $production=Production::all();
      return view('frontend.production.index')->with('production',$production);
    }

    public function anyData()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->select(['sales.salesline','sales.custName', 'productions.so_number', 'sales.id']);

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.diecut', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Edit PAF"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function diecut()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.diecut')->with('production',$production)->with('station', $station);
    }

    public function viewdiecut($id)
    {
      $production=Production::find($id);
      $station= Station::where('sco_number', $production->sco_number)->where('station', '=', 'Die-Cut')->get();
      return view('frontend.production.viewdiecut')->with('production',$production)->with('station', $station);
    }

    public function dietable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sco_number', '=', 'stations.sco_number')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'sales.id'])
          ->where('stations.station', '=', 'Die-Cut');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewdiecut', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storedie(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sco_number', $production->sco_number)->where('station', '=', 'Die-cut')->first();
      if ($station->timein == null)
      {
        $station->check ='yes';
        $station->timein = Carbon::now()->toDateTimeString();
        $station->save();
      }
      else
      {
        $station->timeout = Carbon::now()->toDateTimeString();
        $station->save();
      }
      return redirect()->route('frontend.production.viewdiecut', $production->id)->withFlashSuccess('The data is saved');

    }

    public function surfacefinishing()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.surfacefinishing')->with('production',$production)->with('station', $station);
    }

    public function viewsurface($id)
    {
      $production=Production::find($id);
      $station= Station::where('sco_number', $production->sco_number)->where('station', '=', 'Surface Finishing')->get();
      return view('frontend.production.viewsurface')->with('production',$production)->with('station', $station);
    }

    public function surfacetable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sco_number', '=', 'stations.sco_number')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'sales.id'])
          ->where('stations.station', '=', 'Surface Finishing');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewsurface', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storesurf(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sco_number', $production->sco_number)->where('station', '=', 'Surface Finishing')->first();
      if ($station->timein == null)
      {
        $station->check ='yes';
        $station->timein = Carbon::now()->toDateTimeString();
        $station->save();
      }
      else
      {
        $station->timeout = Carbon::now()->toDateTimeString();
        $station->save();
      }
      return redirect()->route('frontend.production.viewdiecut', $production->id)->withFlashSuccess('The data is saved');

    }

    public function print()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.print')->with('production',$production)->with('station', $station);
    }

    public function viewprint($id)
    {
      $production=Production::find($id);
      $station= Station::where('sco_number', $production->sco_number)->where('station', '=', 'Printing')->get();
      return view('frontend.production.viewprint')->with('production',$production)->with('station', $station);
    }

    public function printtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sco_number', '=', 'stations.sco_number')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'sales.id'])
          ->where('stations.station', '=', 'Printing');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewprint', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storeprint(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sco_number', $production->sco_number)->where('station', '=', 'Printing')->first();
      if ($station->timein == null)
      {
        $station->check ='yes';
        $station->timein = Carbon::now()->toDateTimeString();
        $station->save();
      }
      else
      {
        $station->timeout = Carbon::now()->toDateTimeString();
        $station->save();
      }
      return redirect()->route('frontend.production.viewdiecut', $production->id)->withFlashSuccess('The data is saved');

    }

    public function trim()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.trim')->with('production',$production)->with('station', $station);
    }

    public function viewtrim($id)
    {
      $production=Production::find($id);
      $station= Station::where('sco_number', $production->sco_number)->where('station', '=', 'Trimming')->get();
      return view('frontend.production.viewtrim')->with('production',$production)->with('station', $station);
    }

    public function trimtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sco_number', '=', 'stations.sco_number')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'sales.id'])
          ->where('stations.station', '=', 'Trimming');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewtrim', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storetrim(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sco_number', $production->sco_number)->where('station', '=', 'Trimming/Cutting')->first();
      if ($station->timein == null)
      {
        $station->check ='yes';
        $station->timein = Carbon::now()->toDateTimeString();
        $station->save();
      }
      else
      {
        $station->timeout = Carbon::now()->toDateTimeString();
        $station->save();
      }
      return redirect()->route('frontend.production.viewdiecut', $production->id)->withFlashSuccess('The data is saved');

    }

    public function stripping()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.stripping')->with('production',$production)->with('station', $station);
    }

    public function viewstrip($id)
    {
      $production=Production::find($id);
      $station= Station::where('sco_number', $production->sco_number)->where('station', '=', 'Stripping')->get();
      return view('frontend.production.viewstrip')->with('production',$production)->with('station', $station);
    }

    public function striptable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sco_number', '=', 'stations.sco_number')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'sales.id'])
          ->where('stations.station', '=', 'Stripping');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewstrip', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storestrip(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sco_number', $production->sco_number)->where('station', '=', 'Stripping')->first();
      if ($station->timein == null)
      {
        $station->check ='yes';
        $station->timein = Carbon::now()->toDateTimeString();
        $station->save();
      }
      else
      {
        $station->timeout = Carbon::now()->toDateTimeString();
        $station->save();
      }
      return redirect()->route('frontend.production.viewdiecut', $production->id)->withFlashSuccess('The data is saved');

    }

    public function folding()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.folding')->with('production',$production)->with('station', $station);
    }

    public function viewfold($id)
    {
      $production=Production::find($id);
      $station= Station::where('sco_number', $production->sco_number)->where('station', '=', 'Folding')->get();
      return view('frontend.production.viewfold')->with('production',$production)->with('station', $station);
    }

    public function foldtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sco_number', '=', 'stations.sco_number')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'sales.id'])
          ->where('stations.station', '=', 'Folding');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewfold', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storefold(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sco_number', $production->sco_number)->where('station', '=', 'Folding')->first();
      if ($station->timein == null)
      {
        $station->check ='yes';
        $station->timein = Carbon::now()->toDateTimeString();
        $station->save();
      }
      else
      {
        $station->timeout = Carbon::now()->toDateTimeString();
        $station->save();
      }
      return redirect()->route('frontend.production.viewdiecut', $production->id)->withFlashSuccess('The data is saved');

    }

    public function sewing()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.sewing')->with('production',$production)->with('station', $station);
    }

    public function viewsew($id)
    {
      $production=Production::find($id);
      $station= Station::where('sco_number', $production->sco_number)->where('station', '=', 'Sewing')->get();
      return view('frontend.production.viewsew')->with('production',$production)->with('station', $station);
    }

    public function sewtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sco_number', '=', 'stations.sco_number')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'sales.id'])
          ->where('stations.station', '=', 'Sewing');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewsew', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storesew(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sco_number', $production->sco_number)->where('station', '=', 'Sewing')->first();
      if ($station->timein == null)
      {
        $station->check ='yes';
        $station->timein = Carbon::now()->toDateTimeString();
        $station->save();
      }
      else
      {
        $station->timeout = Carbon::now()->toDateTimeString();
        $station->save();
      }
      return redirect()->route('frontend.production.viewdiecut', $production->id)->withFlashSuccess('The data is saved');

    }

    public function binding()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.binding')->with('production',$production)->with('station', $station);
    }

    public function viewbind($id)
    {
      $production=Production::find($id);
      $station= Station::where('sco_number', $production->sco_number)->where('station', '=', 'Binding')->get();
      return view('frontend.production.viewbind')->with('production',$production)->with('station', $station);
    }

    public function bindtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sco_number', '=', 'stations.sco_number')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'sales.id'])
          ->where('stations.station', '=', 'Binding');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewbind', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storebind(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sco_number', $production->sco_number)->where('station', '=', 'Binding')->first();
      if ($station->timein == null)
      {
        $station->check ='yes';
        $station->timein = Carbon::now()->toDateTimeString();
        $station->save();
      }
      else
      {
        $station->timeout = Carbon::now()->toDateTimeString();
        $station->save();
      }
      return redirect()->route('frontend.production.viewdiecut', $production->id)->withFlashSuccess('The data is saved');

    }

    public function threeknifetrim()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.threeknifetrim')->with('production',$production)->with('station', $station);
    }

    public function viewthreeknife($id)
    {
      $production=Production::find($id);
      $station= Station::where('sco_number', $production->sco_number)->where('station', '=', '3 Knife Trim')->get();
      return view('frontend.production.viewthreeknife')->with('production',$production)->with('station', $station);
    }

    public function threetable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sco_number', '=', 'stations.sco_number')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'sales.id'])
          ->where('stations.station', '=', '3 Knife Trim');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewthreeknife', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storethree(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sco_number', $production->sco_number)->where('station', '=', '3 Knife Trim')->first();
      if ($station->timein == null)
      {
        $station->check ='yes';
        $station->timein = Carbon::now()->toDateTimeString();
        $station->save();
      }
      else
      {
        $station->timeout = Carbon::now()->toDateTimeString();
        $station->save();
      }
      return redirect()->route('frontend.production.viewdiecut', $production->id)->withFlashSuccess('The data is saved');

    }

    public function packing()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.packing')->with('production',$production)->with('station', $station);
    }

    public function viewpack($id)
    {
      $production=Production::find($id);
      $station= Station::where('sco_number', $production->sco_number)->where('station', '=', 'Packing')->get();
      return view('frontend.production.viewpack')->with('production',$production)->with('station', $station);
    }

    public function packtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sco_number', '=', 'stations.sco_number')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'sales.id'])
          ->where('stations.station', '=', 'Packing');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewpack', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storepack(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sco_number', $production->sco_number)->where('station', '=', 'Packing')->first();
      if ($station->timein == null)
      {
        $station->check ='yes';
        $station->timein = Carbon::now()->toDateTimeString();
        $station->save();
      }
      else
      {
        $station->timeout = Carbon::now()->toDateTimeString();
        $station->save();
      }
      return redirect()->route('frontend.production.viewdiecut', $production->id)->withFlashSuccess('The data is saved');

    }

}
