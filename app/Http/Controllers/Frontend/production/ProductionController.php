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
      $station= Station::where('sales_id', $production->sales_id)->where('station','like','%diecut%')->get();
      return view('frontend.production.viewdiecut')->with('production',$production)->with('station', $station);
    }

    public function dietable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['productions.so_number', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station','like','%diecut%');

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
      $station = Station::where('sales_id', $production->sales_id)->where('station', 'like','%diecut%')->first();
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
      $station= Station::where('sales_id', $production->sales_id)->where('station','like','%surf%')->get();
      return view('frontend.production.viewsurface')->with('production',$production)->with('station', $station);
    }

    public function surfacetable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station','like','%surf%');

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
      $station = Station::where('sales_id', $production->sales_id)->where('station','like','%surf%')->first();
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
      $station= Station::where('productions_id', $production->id)->where('operation', '=', 'PRINTING')->get();
      return view('frontend.production.viewprint')->with('production',$production)->with('station', $station);
    }

    public function printtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station', 'like','%print%');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewprint', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storeprint(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sales_id', $production->sales_id)->where('station','like','%print%')->first();
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
      $station= Station::where('sales_id', $production->sales_id)->where('station','like','%trimming%')->get();
      return view('frontend.production.viewtrim')->with('production',$production)->with('station', $station);
    }

    public function trimtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station','like','%trimming%');

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
      $station = Station::where('sales_id', $production->sales_id)->where('station', 'like','%trimming%')->first();
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
      return redirect()->route('frontend.production.viewtrim', $production->id)->withFlashSuccess('The data is saved');

    }

    public function cut()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.cut')->with('production',$production)->with('station', $station);
    }

    public function viewcut($id)
    {
      $production=Production::find($id);
      $station= Station::where('sales_id', $production->sales_id)->where('station', 'like', '%cut-%')->first();
      return view('frontend.production.viewcut')->with('production',$production)->with('station', $station);
    }

    public function cuttable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station','like', '%cut-%');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewcut', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storecut(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sales_id', $production->sales_id)->where('station','like', '%cut-%')->first();
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
      return redirect()->route('frontend.production.viewcut', $production->id)->withFlashSuccess('The data is saved');

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
      $station= Station::where('sales_id', $production->sales_id)->where('station', 'like','%strip%')->get();
      return view('frontend.production.viewstrip')->with('production',$production)->with('station', $station);
    }

    public function striptable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station', 'like','%strip%');

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
      $station = Station::where('sales_id', $production->sales_id)->where('station', 'like','%strip%')->first();
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
      $station= Station::where('sales_id', $production->sales_id)->where('station', 'like','%fold%')->get();
      return view('frontend.production.viewfold')->with('production',$production)->with('station', $station);
    }

    public function foldtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station','like','%fold%');

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
      $station = Station::where('sales_id', $production->sales_id)->where('station', 'like','%fold%')->first();
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
      $station= Station::where('sales_id', $production->sales_id)->where('station','like','%sew%')->get();
      return view('frontend.production.viewsew')->with('production',$production)->with('station', $station);
    }

    public function sewtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station', 'like','%sew%');

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
      $station = Station::where('sales_id', $production->sales_id)->where('station','like','%sew%')->first();
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
      $station= Station::where('sales_id', $production->sales_id)->where('station', 'like','%bind%')->get();
      return view('frontend.production.viewbind')->with('production',$production)->with('station', $station);
    }

    public function bindtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station', 'like','%bind%');

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
      $station = Station::where('sales_id', $production->sales_id)->where('station', 'like','%bind%')->first();
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
      $station= Station::where('sales_id', $production->sales_id)->where('station','like','%knife%')->get();
      return view('frontend.production.viewthreeknife')->with('production',$production)->with('station', $station);
    }

    public function threetable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station', 'like','%knife%');

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
      $station = Station::where('sales_id', $production->sales_id)->where('station', 'like','%knife%')->first();
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
      $station= Station::where('sales_id', $production->sales_id)->where('station', 'like','%pack%')->get();
      return view('frontend.production.viewpack')->with('production',$production)->with('station', $station);
    }

    public function packtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['sales.salesline', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station','like','%pack%');

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
      $station = Station::where('sales_id', $production->sales_id)->where('station', 'like','%pack%')->first();
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

    public function flute()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.flute')->with('production',$production)->with('station', $station);
    }

    public function viewflute($id)
    {
      $production=Production::find($id);
      $station= Station::where('sales_id', $production->sales_id)->where('station', 'like','%flute%')->get();
      return view('frontend.production.viewflute')->with('production',$production)->with('station', $station);
    }

    public function flutetable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['productions.so_number', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station','like','%flute%');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewflute', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storeflute(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sales_id', $production->sales_id)->where('station', 'like','%flute%')->first();
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
      return redirect()->route('frontend.production.viewflute', $production->id)->withFlashSuccess('The data is saved');

    }

    public function window()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.window')->with('production',$production)->with('station', $station);
    }

    public function viewwindow($id)
    {
      $production=Production::find($id);
      $station= Station::where('sales_id', $production->sales_id)->where('station', 'like','%window%')->get();
      return view('frontend.production.viewwindow')->with('production',$production)->with('station', $station);
    }

    public function windowtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['productions.so_number', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station','like','%window%');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewwindow', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storewindow(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sales_id', $production->sales_id)->where('station', 'like','%window%')->first();
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
      return redirect()->route('frontend.production.viewwindow', $production->id)->withFlashSuccess('The data is saved');

    }

    public function glue()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.diecut')->with('production',$production)->with('station', $station);
    }

    public function viewglue($id)
    {
      $production=Production::find($id);
      $station= Station::where('sales_id', $production->sales_id)->where('station','like','%gluing%')->get();
      return view('frontend.production.viewglue')->with('production',$production)->with('station', $station);
    }

    public function gluetable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['productions.so_number', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station','like','%gluing%');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewglue', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storeglue(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sales_id', $production->sales_id)->where('station', 'like','%gluing%')->first();
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
      return redirect()->route('frontend.production.viewglue', $production->id)->withFlashSuccess('The data is saved');

    }

    public function varnish()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.varnish')->with('production',$production)->with('station', $station);
    }

    public function viewvarnish($id)
    {
      $production=Production::find($id);
      $station= Station::where('sales_id', $production->sales_id)->where('station','like','%varnish%')->get();
      return view('frontend.production.viewvarnish')->with('production',$production)->with('station', $station);
    }

    public function varnishtable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['productions.so_number', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station','like','%varnish%');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewvarnish', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storevarnish(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sales_id', $production->sales_id)->where('station', 'like','%varnish%')->first();
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
      return redirect()->route('frontend.production.viewvarnish', $production->id)->withFlashSuccess('The data is saved');

    }

    public function ai()
    {
      $production=Production::all();
      $station= Station::all();
      return view('frontend.production.ai')->with('production',$production)->with('station', $station);
    }

    public function viewai($id)
    {
      $production=Production::find($id);
      $station= Station::where('sales_id', $production->sales_id)->where('station','=','ai')->get();
      return view('frontend.production.viewai')->with('production',$production)->with('station', $station);
    }

    public function aitable()
    {
          $production = Production::leftJoin('sales', 'productions.sales_id', '=', 'sales.id' )
          ->leftJoin('stations', 'productions.sales_id', '=', 'stations.sales_id')
          ->select(['productions.so_number', 'productions.wo_number', 'sales.custName', 'productions.id'])
          ->where('stations.station','=', 'ai');

          return Datatables::of($production)
            ->editColumn('id', function ($production) {
                      return '<a href="'. route('frontend.production.viewai', $production->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View Die-cut"></i></a>
                      ';
                  })
          ->escapeColumns([])
          ->make();
    }

    public function storeai(Request $request, $id)
    {

      $production = Production::find($id);
      $station = Station::where('sales_id', $production->sales_id)->where('station', '=','ai')->first();
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
      return redirect()->route('frontend.production.viewai', $production->id)->withFlashSuccess('The data is saved');

    }



}
