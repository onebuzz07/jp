<?php

namespace App\Http\Controllers\Frontend\plan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\Access\plan;
use App\Models\Access\sales;
use App\Models\Access\product;
use App\Models\Access\item;
use App\Models\Access\SoftCover;
use App\Models\Access\Softcoverbw;
use App\Models\Access\Overseasfb;
use App\Models\Access\Overseaswt;
use App\Models\Access\Planning;
use App\Models\Access\Boxes;
use App\Models\Access\Stockupdate;
use App\Models\Access\Salesorder;
use App\Models\Access\Workorder;
use App\Models\Access\Purchaseorder;
use App\Models\Access\Powo;
use App\Models\Access\Stockupdatepowo;
use App\Models\Access\Production;
use App\Models\Access\Station;
use App\Models\Access\Stock;
use App\Models\Access\Inventory;
use App\Models\Access\Balance;
use App\Models\Access\Sheeting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use Yajra\Datatables\Facades\Datatables;
use Maatwebsite\Excel\Facades\Excel;
use Image;
// use DateTime;

class PlanController extends Controller
{
      protected $users;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sales=Sales::where('sales.status','Planning Dept')->get();
      return view('frontend.plan.index')->with('sales',$sales);
    }

    public function edit($id)
    {
        $sales=Sales::find($id);
        return view('frontend.plan.edit')
            ->with('sales', $sales);
    }

    public function update($id, Request $request)
    {
            $sales = Sales::find($id);
            $sales->workorder =$request->input('workorder');
            $remark2 =$request->input('remark2');
            $dom = new \DomDocument();
            $dom->loadHtml($remark2, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
           // foreach <img> in the submited message
            foreach($images as $img){
                $src = $img->getAttribute('src');

                // if the img source is 'data-url'
                if(preg_match('/data:image/', $src)){
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];
                    // Generating a random filename

                    $filename = uniqid();
                    $filepath = "/uploaded/$filename.$mimetype";
                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                      // resize if required
                      /* ->resize(300, 200) */
                      ->encode($mimetype, 100)  // encode file to the specified mimetype
                      ->save(public_path($filepath));
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                } // <!--endif
            } // <!-
            $sales->remark2 = $dom->saveHTML();
            $sales->confirmby2 = Input::get('confirmby2');
            $sales->status = 'CTP Dept';
            $sales->save();

            return redirect()->route('frontend.plan.index')->withFlashSuccess('The data is saved and ready for action from CTP dept.');

    }

    public function anyData()
    {
      if (access()->hasPermissions(['planning']))
      {
          $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
          ->select(['sales.salesline','sales.custName', 'items.partNo' , 'items.partDesc','sales.repeat','sales.created_at', 'sales.id']);

          return Datatables::of($sales)
            ->editColumn('id', function ($sales) {
                      return '<a href="'. route('frontend.plan.edit', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Edit & Approve"></i></a>
                      ';
                  })
          ->editColumn('created_at', function ($date) {
                    return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
                })
          ->order(function ($sales) {
                       $sales->orderBy('created_at', 'desc');
                   })
          ->escapeColumns([])
          ->where('status', '=', "Planning Dept" )
          ->make();
        }
        else {
          $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
          ->select(['sales.salesline','sales.custName', 'items.partNo' , 'items.partDesc','sales.repeat','sales.created_at', 'sales.id']);

          return Datatables::of($sales)
            ->editColumn('id', function ($sales) {
                      return '';
                  })

          ->editColumn('created_at', function ($date) {
                    return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
                })
          ->order(function ($sales) {
                         $sales->orderBy('created_at', 'desc');
                     })

          ->escapeColumns([])
          ->where('status', '=', "Planning Dept" )
          ->make();
        }
    }

   public function paf()
   {
     $product=Product::all();
     return view('frontend.plan.paf')->with('product', $product);
   }

   public function pafTable()
   {
     $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
                         ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
                         ->select(['products.paf_number', 'sales.custName','items.partNo','items.partDesc', 'products.id' ]);

     return Datatables::of($product)
             ->editColumn('id', function ($product) {

               $prod = Product::find($product->id);
               // if ($prod == null){
                  $sales = Sales::where('sco_number', $prod->sco_number)->first();
               // }
               // else {
               //   $sales = Sales::where('id', $prod->id)->first();
               // }

               return '<a href="'. route('frontend.plan.pafform', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Edit PAF"></i></a>
               <a href="'. route('frontend.plan.viewscopaf', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View SCO"></i></a>
               ';
         })
         ->escapeColumns([])
         ->make();
   }

   public function viewscopaf($id)
   {
     $sales=Sales::find($id);
     return view('frontend.plan.viewscopaf')->with('sales',$sales);
   }

   public function pafform($id)
   {
       $product = Product::find($id);
       $items = Item::find($product->items_id);
       $sales = Sales::where('items_id', $items->id)->first();
       // show the edit form and pass the sales
       return view('frontend.plan.pafform')->with('product', $product)->with('sales', $sales);
   }

   public function planningmaster()
   {
     $sales = Sales::all();
     $items = Item::all();
     return view('frontend.plan.planningmaster')->with('sales', $sales)->with('items',$items);
   }

   public function planningTable()
   {
         $sales = Sales::leftJoin('items', 'sales.items_id', '=', 'items.id')
                             ->select(['sales.custName','items.partNo','items.partDesc', 'sales.id' ]);

         return Datatables::of($sales)
             ->editColumn('id', function ($sales) {
               return '<a href="'. route('frontend.plan.softCover', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-book" data-toggle="tooltip" title="View Soft Cover"></i> Soft Cover </a>

               ';
         })
         ->escapeColumns([])
         ->make();
   }

  //  <a href="'. route('frontend.plan.softCoverBW', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-book"></i> Soft Cover BW</a>
  //  <a href="'. route('frontend.plan.softCoverOverseas', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-book"></i> Soft Cover Oversea F&B</a>
  //  <a href="'. route('frontend.plan.softCoverOverseaWT', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-book"></i> Soft Cover Overseas WT</a>
  //  <a href="'. route('frontend.plan.boxes', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-book"></i> Boxes</a>
  //  <a href="'. route('frontend.plan.planning', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-book"></i>  Planning</a>


   public function softCover($id)
   {
     $sales = Sales::find($id);
     return view('frontend.plan.softCover')->with('sales', $sales);
   }

   public function softcoverStore(Request $request , $id)
   {
     $sales = Sales::find($id);
     $softcover = Softcover::where('sales_id',$sales->id)->first();
     $softcover = new Softcover;
     $softcover->sales_id = $sales->id;
     $softcover->half   = $request->input('half');

     $softcover->covOrderC   = $request->input('covOrderC');
     $softcover->t1OrderC   = $request->input('t1OrderC');
     $softcover->t2OrderC   = $request->input('t2OrderC');
     $softcover->t3OrderC   = $request->input('t3OrderC');
     $softcover->statOrderC   = $request->input('statOrderC');
     $softcover->covOrderB   = $request->input('covOrderB');
     $softcover->t1OrderB   = $request->input('t1OrderB');
     $softcover->t2OrderB   = $request->input('t2OrderB');
     $softcover->t3OrderB   = $request->input('t3OrderB');
     $softcover->statOrderB   = $request->input('statOrderB');

     $softcover->covUpC   = $request->input('covUpC');
     $softcover->t1UpC   = $request->input('t1UpC');
     $softcover->t2UpC   = $request->input('t2UpC');
     $softcover->t3UpC   = $request->input('t3UpC');
     $softcover->statUpC   = $request->input('statUpC');
     $softcover->covUpB   = $request->input('covUpB');
     $softcover->t1UpB   = $request->input('t1UpB');
     $softcover->t2UpB   = $request->input('t2UpB');
     $softcover->t3UpB   = $request->input('t3UpB');
     $softcover->statUpB   = $request->input('statUpB');

     $softcover->covSignC   = $request->input('covSignC');
     $softcover->t1signC   = $request->input('t1signC');
     $softcover->t2signC   = $request->input('t2signC');
     $softcover->t3signC   = $request->input('t3signC');
     $softcover->statSignC   = $request->input('statSignC');
     $softcover->covSignB   = $request->input('covSignB');
     $softcover->t1signB   = $request->input('t1signB');
     $softcover->t2signB   = $request->input('t2signB');
     $softcover->t3signB   = $request->input('t3signB');
     $softcover->statSignB   = $request->input('statSignB');

     $softcover->covFrontC   = $request->input('covFrontC');
     $softcover->t1FrontC   = $request->input('t1FrontC');
     $softcover->t2FrontC   = $request->input('t2FrontC');
     $softcover->t3FrontC   = $request->input('t3FrontC');
     $softcover->statFrontC   = $request->input('statFrontC');
     $softcover->covFrontB   = $request->input('covFrontB');
     $softcover->t1FrontB   = $request->input('t1FrontB');
     $softcover->t2FrontB   = $request->input('t2FrontB');
     $softcover->t3FrontB   = $request->input('t3FrontB');
     $softcover->statFrontB   = $request->input('statFrontB');

     $softcover->covBackC   = $request->input('covBackC');
     $softcover->t1BackC   = $request->input('t1BackC');
     $softcover->t2BackC   = $request->input('t2BackC');
     $softcover->t3BackC   = $request->input('t3BackC');
     $softcover->statBackC   = $request->input('statBackC');
     $softcover->covBackB   = $request->input('covBackB');
     $softcover->t1BackB   = $request->input('t1BackB');
     $softcover->t2BackB   = $request->input('t2BackB');
     $softcover->t3BackB   = $request->input('t3BackB');
     $softcover->statBackB   = $request->input('statBackB');

     $softcover->covSurfC   = $request->input('covSurfC');
     $softcover->t1SurfC   = $request->input('t1SurfC');
     $softcover->t2SurfC   = $request->input('t2SurfC');
     $softcover->t3SurfC   = $request->input('t3SurfC');
     $softcover->statSurfC   = $request->input('statSurfC');
     $softcover->covSurfB   = $request->input('covSurfB');
     $softcover->t1SurfB   = $request->input('t1SurfB');
     $softcover->t2SurfB   = $request->input('t2SurfB');
     $softcover->t3SurfB   = $request->input('t3SurfB');
     $softcover->statSurfB   = $request->input('statSurfB');

     $softcover->covTrimC   = $request->input('covTrimC');
     $softcover->t1TrimC   = $request->input('t1TrimC');
     $softcover->t2TrimC   = $request->input('t2TrimC');
     $softcover->t3TrimC   = $request->input('t3TrimC');
     $softcover->statTrimC   = $request->input('statTrimC');
     $softcover->covTrimB   = $request->input('covTrimB');
     $softcover->t1TrimB   = $request->input('t1TrimB');
     $softcover->t2TrimB   = $request->input('t2TrimB');
     $softcover->t3TrimB   = $request->input('t3TrimB');
     $softcover->statTrimB   = $request->input('statTrimB');

     $softcover->covDieC   = $request->input('covDieC');
     $softcover->t1DieC   = $request->input('t1DieC');
     $softcover->t2DieC   = $request->input('t2DieC');
     $softcover->t3DieC   = $request->input('t3DieC');
     $softcover->statDieC   = $request->input('statDieC');
     $softcover->covDieB   = $request->input('covDieB');
     $softcover->t1DieB   = $request->input('t1DieB');
     $softcover->t2DieB   = $request->input('t2DieB');
     $softcover->t3DieB   = $request->input('t3DieB');
     $softcover->statDieB   = $request->input('statDieB');

     $softcover->covStripC   = $request->input('covStripC');
     $softcover->t1StripC   = $request->input('t1StripC');
     $softcover->t2StripC   = $request->input('t2StripC');
     $softcover->t3stripC   = $request->input('t3stripC');
     $softcover->statStripC   = $request->input('statStripC');
     $softcover->covStripB   = $request->input('covStripB');
     $softcover->t1StripB   = $request->input('t1StripB');
     $softcover->t2StripB   = $request->input('t2StripB');
     $softcover->t3stripB   = $request->input('t3stripB');
     $softcover->statStripB   = $request->input('statStripB');

     $softcover->covFoldC   = $request->input('covFoldC');
     $softcover->t1FoldC   = $request->input('t1FoldC');
     $softcover->t2FoldC   = $request->input('t2FoldC');
     $softcover->t3FoldC   = $request->input('t3FoldC');
     $softcover->statFoldC   = $request->input('statFoldC');
     $softcover->covFoldB   = $request->input('covFoldB');
     $softcover->t1FoldB   = $request->input('t1FoldB');
     $softcover->t2FoldB   = $request->input('t2FoldB');
     $softcover->t3FoldB   = $request->input('t3FoldB');
     $softcover->statFoldB   = $request->input('statFoldB');

     $softcover->covSewC   = $request->input('covSewC');
     $softcover->t1SewC   = $request->input('t1SewC');
     $softcover->t2SewC   = $request->input('t2SewC');
     $softcover->t3SewC   = $request->input('t3SewC');
     $softcover->statSewC   = $request->input('statSewC');
     $softcover->covSewB   = $request->input('covSewB');
     $softcover->t1SewB   = $request->input('t1SewB');
     $softcover->t2SewB   = $request->input('t2SewB');
     $softcover->t3SewB   = $request->input('t3SewB');
     $softcover->statSewB   = $request->input('statSewB');

     $softcover->covBindC   = $request->input('covBindC');
     $softcover->t1BindC   = $request->input('t1BindC');
     $softcover->t2BindC   = $request->input('t2BindC');
     $softcover->t3BindC   = $request->input('t3BindC');
     $softcover->statBindC   = $request->input('statBindC');
     $softcover->covBindB   = $request->input('covBindB');
     $softcover->t1BindB   = $request->input('t1BindB');
     $softcover->t2BindB   = $request->input('t2BindB');
     $softcover->t3BindB   = $request->input('t3BindB');
     $softcover->statBindB   = $request->input('statBindB');

     $softcover->cov3C   = $request->input('cov3C');
     $softcover->t13C   = $request->input('t13C');
     $softcover->t23C   = $request->input('t23C');
     $softcover->t33C   = $request->input('t33C');
     $softcover->stat3C   = $request->input('stat3C');
     $softcover->cov3B   = $request->input('cov3B');
     $softcover->t13B   = $request->input('t13B');
     $softcover->t23B   = $request->input('t23B');
     $softcover->t33B   = $request->input('t33B');
     $softcover->stat3B   = $request->input('stat3B');

     $softcover->covPrintC  = $request->input('covPrintC');
     $softcover->t1PrintC  = $request->input('t1PrintC');
     $softcover->t2PrintC  = $request->input('t2PrintC');
     $softcover->t3PrintC  = $request->input('t3PrintC');
     $softcover->statPrintC  = $request->input('statPrintC');
     $softcover->covPrintB  = $request->input('covPrintB');
     $softcover->t1PrintB  = $request->input('t1PrintB');
     $softcover->t2PrintB  = $request->input('t2PrintB');
     $softcover->t3PrintB  = $request->input('t3PrintB');
     $softcover->statPrintB  = $request->input('statPrintB');

     $softcover->covSurfC1   = $request->input('covSurfC1');
     $softcover->t1SurfC1   = $request->input('t1SurfC1');
     $softcover->t2SurfC1   = $request->input('t2SurfC1');
     $softcover->t3SurfC1   = $request->input('t3SurfC1');
     $softcover->statSurfC1   = $request->input('statSurfC1');
     $softcover->covSurfB1   = $request->input('covSurfB1');
     $softcover->t1SurfB1  = $request->input('t1SurfB1');
     $softcover->t2SurfB1   = $request->input('t2SurfB1');
     $softcover->t3SurfB1   = $request->input('t3SurfB1');
     $softcover->statSurfB1   = $request->input('statSurfB1');

     $softcover->covTrimC1   = $request->input('covTrimC1');
     $softcover->t1TrimC1   = $request->input('t1TrimC1');
     $softcover->t2TrimC1   = $request->input('t2TrimC1');
     $softcover->t3TrimC1   = $request->input('t3TrimC1');
     $softcover->statTrimC1   = $request->input('statTrimC1');
     $softcover->covTrimB1   = $request->input('covTrimB1');
     $softcover->t1TrimB1   = $request->input('t1TrimB1');
     $softcover->t2TrimB1   = $request->input('t2TrimB1');
     $softcover->t3TrimB1   = $request->input('t3TrimB1');
     $softcover->statTrimB1   = $request->input('statTrimB1');

     $softcover->covDieC1   = $request->input('covDieC1');
     $softcover->t1DieC1   = $request->input('t1DieC1');
     $softcover->t2DieC1   = $request->input('t2DieC1');
     $softcover->t3DieC1   = $request->input('t3DieC1');
     $softcover->statDieC1   = $request->input('statDieC1');
     $softcover->covDieB1   = $request->input('covDieB1');
     $softcover->t1DieB1   = $request->input('t1DieB1');
     $softcover->t2DieB1   = $request->input('t2DieB1');
     $softcover->t3DieB1   = $request->input('t3DieB1');
     $softcover->statDieB1   = $request->input('statDieB1');

     $softcover->covStripC1   = $request->input('covStripC1');
     $softcover->t1StripC1   = $request->input('t1StripC1');
     $softcover->t2StripC1   = $request->input('t2StripC1');
     $softcover->t3stripC1   = $request->input('t3stripC1');
     $softcover->statStripC1   = $request->input('statStripC1');
     $softcover->covStripB1   = $request->input('covStripB1');
     $softcover->t1StripB1   = $request->input('t1StripB1');
     $softcover->t2StripB1   = $request->input('t2StripB1');
     $softcover->t3stripB1   = $request->input('t3stripB1');
     $softcover->statStripB1   = $request->input('statStripB1');

     $softcover->covFoldC1   = $request->input('covFoldC1');
     $softcover->t1FoldC1   = $request->input('t1FoldC1');
     $softcover->t2FoldC1   = $request->input('t2FoldC1');
     $softcover->t3FoldC1   = $request->input('t3FoldC1');
     $softcover->statFoldC1   = $request->input('statFoldC1');
     $softcover->covFoldB1   = $request->input('covFoldB1');
     $softcover->t1FoldB1   = $request->input('t1FoldB1');
     $softcover->t2FoldB1   = $request->input('t2FoldB1');
     $softcover->t3FoldB1   = $request->input('t3FoldB1');
     $softcover->statFoldB1   = $request->input('statFoldB1');

     $softcover->covSewC1   = $request->input('covSewC1');
     $softcover->t1SewC1   = $request->input('t1SewC1');
     $softcover->t2SewC1   = $request->input('t2SewC1');
     $softcover->t3SewC1   = $request->input('t3SewC1');
     $softcover->statSewC1   = $request->input('statSewC1');
     $softcover->covSewB1   = $request->input('covSewB1');
     $softcover->t1SewB1   = $request->input('t1SewB1');
     $softcover->t2SewB1   = $request->input('t2SewB1');
     $softcover->t3SewB1   = $request->input('t3SewB1');
     $softcover->statSewB1   = $request->input('statSewB1');

     $softcover->covBindC1   = $request->input('covBindC1');
     $softcover->t1BindC1   = $request->input('t1BindC1');
     $softcover->t2BindC1   = $request->input('t2BindC1');
     $softcover->t3BindC1   = $request->input('t3BindC1');
     $softcover->statBindC1   = $request->input('statBindC1');
     $softcover->covBindB1   = $request->input('covBindB1');
     $softcover->t1BindB1   = $request->input('t1BindB1');
     $softcover->t2BindB1   = $request->input('t2BindB1');
     $softcover->t3BindB1   = $request->input('t3BindB1');
     $softcover->statBindB1   = $request->input('statBindB1');

     $softcover->cov3C1   = $request->input('cov3C1');
     $softcover->t13C1   = $request->input('t13C1');
     $softcover->t23C1   = $request->input('t23C1');
     $softcover->t33C1   = $request->input('t33C1');
     $softcover->stat3C1   = $request->input('stat3C1');
     $softcover->cov3B1   = $request->input('cov3B1');
     $softcover->t13B1   = $request->input('t13B1');
     $softcover->t23B1   = $request->input('t23B1');
     $softcover->t33B1   = $request->input('t33B1');
     $softcover->stat3B1   = $request->input('stat3B1');

     $softcover->covPackC  = $request->input('covPackC');
     $softcover->t1PackC  = $request->input('t1PackC');
     $softcover->t2PackC  = $request->input('t2PackC');
     $softcover->t3PackC  = $request->input('t3PackC');
     $softcover->statPackC  = $request->input('statPackC');
     $softcover->covPackB  = $request->input('covPackB');
     $softcover->t1PackB  = $request->input('t1PackB');
     $softcover->t2PackB  = $request->input('t2PackB');
     $softcover->t3PackB  = $request->input('t3PackB');
     $softcover->statPackB  = $request->input('statPackB');

     $softcover->colMakeFront  = $request->input('colMakeFront');
     $softcover->colMakeBack  = $request->input('colMakeBack');
     $softcover->colWaste  = $request->input('colWaste');
     $softcover->blaMake  = $request->input('blaMake');
     $softcover->blaWaste  = $request->input('blaWaste');

     $softcover->surfMake  = $request->input('surfMake');
     $softcover->surfWaste  = $request->input('surfWaste');
     $softcover->trimMake  = $request->input('trimMake');
     $softcover->trimWaste  = $request->input('trimWaste');
     $softcover->dieMake  = $request->input('dieMake');
     $softcover->dieWaste  = $request->input('dieWaste');
     $softcover->stripMake  = $request->input('stripMake');
     $softcover->stripWaste  = $request->input('stripWaste');
     $softcover->foldMake  = $request->input('foldMake');
     $softcover->foldWaste  = $request->input('foldWaste');
     $softcover->sewMake  = $request->input('sewMake');
     $softcover->sewWaste  = $request->input('sewWaste');
     $softcover->bindMake  = $request->input('bindMake');
     $softcover->bindWaste  = $request->input('bindWaste');
     $softcover->threeMake  = $request->input('threeMake');
     $softcover->threeWaste  = $request->input('threeWaste');
     $softcover->PackMake  = $request->input('PackMake');
     $softcover->packWaste  = $request->input('packWaste');

     $softcover->ccover  = $request->input('ccover');
     $softcover->ccoverready  = $request->input('ccoverready');
     $softcover->ccoverwaste  = $request->input('ccoverwaste');
     $softcover->bwcover  = $request->input('bwcover');
     $softcover->bwcoverready  = $request->input('bwcoverready');
     $softcover->bwcoverwaste  = $request->input('bwcoverwaste');
     $softcover->ct1  = $request->input('ct1');
     $softcover->ct1ready  = $request->input('ct1ready');
     $softcover->ct1waste  = $request->input('ct1waste');
     $softcover->bwt1  = $request->input('bwt1');
     $softcover->bwt1ready  = $request->input('bwt1ready');
     $softcover->bwt1waste  = $request->input('bwt1waste');
     $softcover->ct2  = $request->input('ct2');
     $softcover->ct2ready = $request->input('ct2ready');
     $softcover->ct2waste  = $request->input('ct2waste');
     $softcover->bwt2  = $request->input('bwt2');
     $softcover->bwt2ready  = $request->input('bwt2ready');
     $softcover->bwt2waste  = $request->input('bwt2waste');
     $softcover->ct3  = $request->input('ct3');
     $softcover->ct3ready  = $request->input('ct3ready');
     $softcover->ct3waste  = $request->input('ct3waste');
     $softcover->bwt3  = $request->input('bwt3');
     $softcover->bwt3ready  = $request->input('bwt3ready');
     $softcover->bwt3waste  = $request->input('bwt3waste');
     $softcover->csticker  = $request->input('csticker');
     $softcover->cstickerready  = $request->input('cstickerready');
     $softcover->cstickerwaste  = $request->input('cstickerwaste');
     $softcover->bwsticker  = $request->input('bwsticker');
     $softcover->bwstickerready  = $request->input('bwstickerready');
     $softcover->bwstickerwaste  = $request->input('bwstickerwaste');

     $softcover->save();

     // redirect
     return redirect()->route('frontend.plan.planningmaster')->withFlashSuccess('The data is saved.');
   }

   public function softCoverBW($id)
   {
     $sales = Sales::find($id);
     return view('frontend.plan.softCoverBW')->with('sales', $sales);
   }

   public function softcoverbwStore(Request $request , $id)
   {
     $sales = Sales::find($id);
     $softcoverbw = Softcoverbw::where('sales_id',$sales->id)->first();
     $softcoverbw = new Softcoverbw;
     $softcoverbw->sales_id = $sales->id;

     $softcoverbw->half   = $request->input('half');
     $softcoverbw->covOrderB   = $request->input('covOrderB');
     $softcoverbw->t1OrderB   = $request->input('t1OrderB');
     $softcoverbw->t2OrderB   = $request->input('t2OrderB');
     $softcoverbw->t3OrderB   = $request->input('t3OrderB');
     $softcoverbw->statOrderB   = $request->input('statOrderB');

     $softcoverbw->covUpB   = $request->input('covUpB');
     $softcoverbw->t1UpB   = $request->input('t1UpB');
     $softcoverbw->t2UpB   = $request->input('t2UpB');
     $softcoverbw->t3UpB   = $request->input('t3UpB');
     $softcoverbw->statUpB   = $request->input('statUpB');

     $softcoverbw->covSignB   = $request->input('covSignB');
     $softcoverbw->t1signB   = $request->input('t1signB');
     $softcoverbw->t2signB   = $request->input('t2signB');
     $softcoverbw->t3signB   = $request->input('t3signB');
     $softcoverbw->statSignB   = $request->input('statSignB');

     $softcoverbw->covFrontB   = $request->input('covFrontB');
     $softcoverbw->t1FrontB   = $request->input('t1FrontB');
     $softcoverbw->t2FrontB   = $request->input('t2FrontB');
     $softcoverbw->t3FrontB   = $request->input('t3FrontB');
     $softcoverbw->statFrontB   = $request->input('statFrontB');

     $softcoverbw->covBackB   = $request->input('covBackB');
     $softcoverbw->t1BackB   = $request->input('t1BackB');
     $softcoverbw->t2BackB   = $request->input('t2BackB');
     $softcoverbw->t3BackB   = $request->input('t3BackB');
     $softcoverbw->statBackB   = $request->input('statBackB');

     $softcoverbw->covSurfB   = $request->input('covSurfB');
     $softcoverbw->t1SurfB   = $request->input('t1SurfB');
     $softcoverbw->t2SurfB   = $request->input('t2SurfB');
     $softcoverbw->t3SurfB   = $request->input('t3SurfB');
     $softcoverbw->statSurfB   = $request->input('statSurfB');

     $softcoverbw->covTrimB   = $request->input('covTrimB');
     $softcoverbw->t1TrimB   = $request->input('t1TrimB');
     $softcoverbw->t2TrimB   = $request->input('t2TrimB');
     $softcoverbw->t3TrimB   = $request->input('t3TrimB');
     $softcoverbw->statTrimB   = $request->input('statTrimB');

     $softcoverbw->covDieB   = $request->input('covDieB');
     $softcoverbw->t1DieB   = $request->input('t1DieB');
     $softcoverbw->t2DieB   = $request->input('t2DieB');
     $softcoverbw->t3DieB   = $request->input('t3DieB');
     $softcoverbw->statDieB   = $request->input('statDieB');

     $softcoverbw->covStripB   = $request->input('covStripB');
     $softcoverbw->t1StripB   = $request->input('t1StripB');
     $softcoverbw->t2StripB   = $request->input('t2StripB');
     $softcoverbw->t3stripB   = $request->input('t3stripB');
     $softcoverbw->statStripB   = $request->input('statStripB');

     $softcoverbw->covFoldB   = $request->input('covFoldB');
     $softcoverbw->t1FoldB   = $request->input('t1FoldB');
     $softcoverbw->t2FoldB   = $request->input('t2FoldB');
     $softcoverbw->t3FoldB   = $request->input('t3FoldB');
     $softcoverbw->statFoldB   = $request->input('statFoldB');

     $softcoverbw->covSewB   = $request->input('covSewB');
     $softcoverbw->t1SewB   = $request->input('t1SewB');
     $softcoverbw->t2SewB   = $request->input('t2SewB');
     $softcoverbw->t3SewB   = $request->input('t3SewB');
     $softcoverbw->statSewB   = $request->input('statSewB');

     $softcoverbw->covBindB   = $request->input('covBindB');
     $softcoverbw->t1BindB   = $request->input('t1BindB');
     $softcoverbw->t2BindB   = $request->input('t2BindB');
     $softcoverbw->t3BindB   = $request->input('t3BindB');
     $softcoverbw->statBindB   = $request->input('statBindB');

     $softcoverbw->cov3B   = $request->input('cov3B');
     $softcoverbw->t13B   = $request->input('t13B');
     $softcoverbw->t23B   = $request->input('t23B');
     $softcoverbw->t33B   = $request->input('t33B');
     $softcoverbw->stat3B   = $request->input('stat3B');

     $softcoverbw->covPrintB  = $request->input('covPrintB');
     $softcoverbw->t1PrintB  = $request->input('t1PrintB');
     $softcoverbw->t2PrintB  = $request->input('t2PrintB');
     $softcoverbw->t3PrintB  = $request->input('t3PrintB');
     $softcoverbw->statPrintB  = $request->input('statPrintB');

     $softcoverbw->covSurfB1  = $request->input('covSurfB1');
     $softcoverbw->t1SurfB1   = $request->input('t1SurfB1');
     $softcoverbw->t2SurfB1   = $request->input('t2SurfB1');
     $softcoverbw->t3SurfB1   = $request->input('t3SurfB1');
     $softcoverbw->statSurfB1   = $request->input('statSurfB1');

     $softcoverbw->covTrimB1   = $request->input('covTrimB1');
     $softcoverbw->t1TrimB1   = $request->input('t1TrimB1');
     $softcoverbw->t2TrimB1   = $request->input('t2TrimB1');
     $softcoverbw->t3TrimB1   = $request->input('t3TrimB1');
     $softcoverbw->statTrimB1   = $request->input('statTrimB1');

     $softcoverbw->covDieB1   = $request->input('covDieB1');
     $softcoverbw->t1DieB1   = $request->input('t1DieB1');
     $softcoverbw->t2DieB1   = $request->input('t2DieB1');
     $softcoverbw->t3DieB1   = $request->input('t3DieB1');
     $softcoverbw->statDieB1   = $request->input('statDieB1');

     $softcoverbw->covStripB1   = $request->input('covStripB1');
     $softcoverbw->t1StripB1   = $request->input('t1StripB1');
     $softcoverbw->t2StripB1   = $request->input('t2StripB1');
     $softcoverbw->t3stripB1   = $request->input('t3stripB1');
     $softcoverbw->statStripB1   = $request->input('statStripB1');

     $softcoverbw->covFoldB1   = $request->input('covFoldB1');
     $softcoverbw->t1FoldB1   = $request->input('t1FoldB1');
     $softcoverbw->t2FoldB1   = $request->input('t2FoldB1');
     $softcoverbw->t3FoldB1   = $request->input('t3FoldB1');
     $softcoverbw->statFoldB1   = $request->input('statFoldB1');

     $softcoverbw->covSewB1   = $request->input('covSewB1');
     $softcoverbw->t1SewB1  = $request->input('t1SewB1');
     $softcoverbw->t2SewB1   = $request->input('t2SewB1');
     $softcoverbw->t3SewB1   = $request->input('t3SewB1');
     $softcoverbw->statSewB1   = $request->input('statSewB1');

     $softcoverbw->covBindB1   = $request->input('covBindB1');
     $softcoverbw->t1BindB1   = $request->input('t1BindB1');
     $softcoverbw->t2BindB1   = $request->input('t2BindB1');
     $softcoverbw->t3BindB1   = $request->input('t3BindB1');
     $softcoverbw->statBindB1   = $request->input('statBindB1');

     $softcoverbw->cov3B1   = $request->input('cov3B1');
     $softcoverbw->t13B1   = $request->input('t13B1');
     $softcoverbw->t23B1   = $request->input('t23B1');
     $softcoverbw->t33B1   = $request->input('t33B1');
     $softcoverbw->stat3B1   = $request->input('stat3B1');

     $softcoverbw->covPackB  = $request->input('covPackB');
     $softcoverbw->t1PackB = $request->input('t1PackB');
     $softcoverbw->t2PackB = $request->input('t2PackB');
     $softcoverbw->t3PackB  = $request->input('t3PackB');
     $softcoverbw->statPackB  = $request->input('statPackB');

     $softcoverbw->blaMake  = $request->input('blaMake');
     $softcoverbw->blaWaste  = $request->input('blaWaste');

     $softcoverbw->surfMake  = $request->input('surfMake');
     $softcoverbw->surfWaste  = $request->input('surfWaste');
     $softcoverbw->trimMake  = $request->input('trimMake');
     $softcoverbw->trimWaste  = $request->input('trimWaste');
     $softcoverbw->dieMake  = $request->input('dieMake');
     $softcoverbw->dieWaste  = $request->input('dieWaste');
     $softcoverbw->stripMake  = $request->input('stripMake');
     $softcoverbw->stripWaste  = $request->input('stripWaste');
     $softcoverbw->foldMake  = $request->input('foldMake');
     $softcoverbw->foldWaste  = $request->input('foldWaste');
     $softcoverbw->sewMake  = $request->input('sewMake');
     $softcoverbw->sewWaste  = $request->input('sewWaste');
     $softcoverbw->bindMake  = $request->input('bindMake');
     $softcoverbw->bindWaste  = $request->input('bindWaste');
     $softcoverbw->threeMake  = $request->input('threeMake');
     $softcoverbw->threeWaste  = $request->input('threeWaste');
     $softcoverbw->PackMake  = $request->input('PackMake');
     $softcoverbw->packWaste  = $request->input('packWaste');

     $softcoverbw->bwcover  = $request->input('bwcover');
     $softcoverbw->bwcoverready  = $request->input('bwcoverready');
     $softcoverbw->bwcoverwaste  = $request->input('bwcoverwaste');

     $softcoverbw->bwt1  = $request->input('bwt1');
     $softcoverbw->bwt1ready  = $request->input('bwt1ready');
     $softcoverbw->bwt1waste  = $request->input('bwt1waste');

     $softcoverbw->bwt2  = $request->input('bwt2');
     $softcoverbw->bwt2ready  = $request->input('bwt2ready');
     $softcoverbw->bwt2waste  = $request->input('bwt2waste');

     $softcoverbw->bwt3  = $request->input('bwt3');
     $softcoverbw->bwt3ready  = $request->input('bwt3ready');
     $softcoverbw->bwt3waste  = $request->input('bwt3waste');

     $softcoverbw->bwsticker  = $request->input('bwsticker');
     $softcoverbw->bwstickerready  = $request->input('bwstickerready');
     $softcoverbw->bwstickerwaste  = $request->input('bwstickerwaste');

     $softcoverbw->save();

     // redirect
     return redirect()->route('frontend.plan.planningmaster')->withFlashSuccess('The data is saved.');
   }

   public function softCoverOverseaWT($id)
   {
     $sales = Sales::find($id);
     return view('frontend.plan.softCoverOverseaWT')->with('sales', $sales);
   }

   public function softcoveroverseawtStore(Request $request ,$id )
   {

     $sales = Sales::find($id);
     $overseaswt = Overseaswt::where('sales_id',$sales->id)->first();
     $overseaswt = new Overseaswt;
     $overseaswt->sales_id = $sales->id;
     $overseaswt->none1  = $request->input('none1');
     $overseaswt->none2  = $request->input('none2');

     $overseaswt->covOrderC  = $request->input('covOrderC');
     $overseaswt->t1OrderC  = $request->input('t1OrderC');
     $overseaswt->t2OrderC  = $request->input('t2OrderC');
     $overseaswt->t3OrderC  = $request->input('t3OrderC');
     $overseaswt->statOrderC  = $request->input('statOrderC');
     $overseaswt->flexiOrderC  = $request->input('flexiOrderC');

     $overseaswt->covUpC  = $request->input('covUpC');
     $overseaswt->t1UpC  = $request->input('t1UpC');
     $overseaswt->t2UpC  = $request->input('t2UpC');
     $overseaswt->t3UpC  = $request->input('t3UpC');
     $overseaswt->statUpC  = $request->input('statUpC');
     $overseaswt->flexiUpC  = $request->input('flexiUpC');

     $overseaswt->covSignC  = $request->input('covSignC');
     $overseaswt->t1signC  = $request->input('t1signC');
     $overseaswt->t2signC  = $request->input('t2signC');
     $overseaswt->t3signC  = $request->input('t3signC');
     $overseaswt->statSignC  = $request->input('statSignC');
     $overseaswt->flexiSignC  = $request->input('flexiSignC');

     $overseaswt->covFrontC  = $request->input('covFrontC');
     $overseaswt->t1FrontC  = $request->input('t1FrontC');
     $overseaswt->t2FrontC  = $request->input('t2FrontC');
     $overseaswt->t3FrontC  = $request->input('t3FrontC');
     $overseaswt->statFrontC  = $request->input('statFrontC');
     $overseaswt->flexiFrontC  = $request->input('flexiFrontC');

     $overseaswt->covBackC  = $request->input('covBackC');
     $overseaswt->t1BackC  = $request->input('t1BackC');
     $overseaswt->t2BackC  = $request->input('t2BackC');
     $overseaswt->t3BackC  = $request->input('t3BackC');
     $overseaswt->statBackC  = $request->input('statBackC');
     $overseaswt->flexiBackC  = $request->input('flexiBackC');

     $overseaswt->covSurfC  = $request->input('covSurfC');
     $overseaswt->t1SurfC  = $request->input('t1SurfC');
     $overseaswt->t2SurfC  = $request->input('t2SurfC');
     $overseaswt->t3SurfC  = $request->input('t3SurfC');
     $overseaswt->statSurfC  = $request->input('statSurfC');
     $overseaswt->flexiSurfC  = $request->input('flexiSurfC');

     $overseaswt->covTrimC  = $request->input('covTrimC');
     $overseaswt->t1TrimC  = $request->input('t1TrimC');
     $overseaswt->t2TrimC  = $request->input('t2TrimC');
     $overseaswt->t3TrimC  = $request->input('t3TrimC');
     $overseaswt->statTrimC  = $request->input('statTrimC');
     $overseaswt->flexiTrimC  = $request->input('flexiTrimC');

     $overseaswt->covDieC  = $request->input('covDieC');
     $overseaswt->t1DieC  = $request->input('t1DieC');
     $overseaswt->t2DieC  = $request->input('t2DieC');
     $overseaswt->t3DieC  = $request->input('t3DieC');
     $overseaswt->statDieC  = $request->input('statDieC');
     $overseaswt->flexiDieC  = $request->input('flexiDieC');

     $overseaswt->covStripC  = $request->input('covStripC');
     $overseaswt->t1StripC  = $request->input('t1StripC');
     $overseaswt->t2StripC  = $request->input('t2StripC');
     $overseaswt->t3stripC  = $request->input('t3stripC');
     $overseaswt->statStripC  = $request->input('statStripC');
     $overseaswt->flexiStripC  = $request->input('flexiStripC');

     $overseaswt->covFoldC  = $request->input('covFoldC');
     $overseaswt->t1FoldC  = $request->input('t1FoldC');
     $overseaswt->t2FoldC  = $request->input('t2FoldC');
     $overseaswt->t3FoldC  = $request->input('t3FoldC');
     $overseaswt->statFoldC  = $request->input('statFoldC');
     $overseaswt->flexiFoldC  = $request->input('flexiFoldC');

     $overseaswt->covSewC  = $request->input('covSewC');
     $overseaswt->t1SewC  = $request->input('t1SewC');
     $overseaswt->t2SewC  = $request->input('t2SewC');
     $overseaswt->t3SewC  = $request->input('t3SewC');
     $overseaswt->statSewC  = $request->input('statSewC');
     $overseaswt->flexiSewC  = $request->input('flexiSewC');

     $overseaswt->covBindC  = $request->input('covBindC');
     $overseaswt->t1BindC  = $request->input('t1BindC');
     $overseaswt->t2BindC  = $request->input('t2BindC');
     $overseaswt->t3BindC  = $request->input('t3BindC');
     $overseaswt->statBindC  = $request->input('statBindC');
     $overseaswt->flexiBindC  = $request->input('flexiBindC');

     $overseaswt->cov3C  = $request->input('cov3C');
     $overseaswt->t13C  = $request->input('t13C');
     $overseaswt->t23C  = $request->input('t23C');
     $overseaswt->t33C  = $request->input('t33C');
     $overseaswt->stat3C  = $request->input('stat3C');
     $overseaswt->flexi3C  = $request->input('flexi3C');

     $overseaswt->covPrintC1  = $request->input('covPrintC1');
     $overseaswt->t1PrintC1  = $request->input('t1PrintC1');
     $overseaswt->t2PrintC1  = $request->input('t2PrintC1');
     $overseaswt->t3PrintC1  = $request->input('t3PrintC1');
     $overseaswt->statPrintC1  = $request->input('statPrintC1');
     $overseaswt->flexiPrintC1  = $request->input('flexiPrintC1');

     $overseaswt->covSurfC1  = $request->input('covSurfC1');
     $overseaswt->t1SurfC1  = $request->input('t1SurfC1');
     $overseaswt->t2SurfC1  = $request->input('t2SurfC1');
     $overseaswt->t3SurfC1  = $request->input('t3SurfC1');
     $overseaswt->statSurfC1  = $request->input('statSurfC1');
     $overseaswt->flexiSurfC1  = $request->input('flexiSurfC1');

     $overseaswt->covTrimC1  = $request->input('covTrimC1');
     $overseaswt->t1TrimC1  = $request->input('t1TrimC1');
     $overseaswt->t2TrimC1  = $request->input('t2TrimC1');
     $overseaswt->t3TrimC1 = $request->input('t3TrimC1');
     $overseaswt->statTrimC1  = $request->input('statTrimC1');
     $overseaswt->flexiTrimC1  = $request->input('flexiTrimC1');

     $overseaswt->covDieC1  = $request->input('covDieC1');
     $overseaswt->t1DieC1  = $request->input('t1DieC1');
     $overseaswt->t2DieC1  = $request->input('t2DieC1');
     $overseaswt->t3DieC1  = $request->input('t3DieC1');
     $overseaswt->statDieC1  = $request->input('statDieC1');
     $overseaswt->flexiDieC1  = $request->input('flexiDieC1');

     $overseaswt->covStripC1  = $request->input('covStripC1');
     $overseaswt->t1StripC1  = $request->input('t1StripC1');
     $overseaswt->t2StripC1  = $request->input('t2StripC1');
     $overseaswt->t3stripC1  = $request->input('t3stripC1');
     $overseaswt->statStripC1  = $request->input('statStripC1');
     $overseaswt->flexiStripC1  = $request->input('flexiStripC1');

     $overseaswt->covFoldC1  = $request->input('covFoldC1');
     $overseaswt->t1FoldC1  = $request->input('t1FoldC1');
     $overseaswt->t2FoldC1  = $request->input('t2FoldC1');
     $overseaswt->t3FoldC1  = $request->input('t3FoldC1');
     $overseaswt->statFoldC1  = $request->input('statFoldC1');
     $overseaswt->flexiFoldC1  = $request->input('flexiFoldC1');

     $overseaswt->covSewC1  = $request->input('covSewC1');
     $overseaswt->t1SewC1  = $request->input('t1SewC1');
     $overseaswt->t2SewC1  = $request->input('t2SewC1');
     $overseaswt->t3SewC1  = $request->input('t3SewC1');
     $overseaswt->statSewC1  = $request->input('statSewC1');
     $overseaswt->flexiSewC1  = $request->input('flexiSewC1');

     $overseaswt->covBindC1  = $request->input('covBindC1');
     $overseaswt->t1BindC1  = $request->input('t1BindC1');
     $overseaswt->t2BindC1  = $request->input('t2BindC1');
     $overseaswt->t3BindC1  = $request->input('t3BindC1');
     $overseaswt->statBindC1  = $request->input('statBindC1');
     $overseaswt->flexiBindC1  = $request->input('flexiBindC1');

     $overseaswt->cov3C1  = $request->input('cov3C1');
     $overseaswt->t13C1  = $request->input('t13C1');
     $overseaswt->t23C1  = $request->input('t23C1');
     $overseaswt->t33C1  = $request->input('t33C1');
     $overseaswt->stat3C1  = $request->input('stat3C1');
     $overseaswt->flexi3C1  = $request->input('flexi3C1');

     $overseaswt->covPackC1  = $request->input('covPackC1');
     $overseaswt->t1PackC1  = $request->input('t1PackC1');
     $overseaswt->t2PackC1  = $request->input('t2PackC1');
     $overseaswt->t3PackC1  = $request->input('t3PackC1');
     $overseaswt->statPackC1  = $request->input('statPackC1');
     $overseaswt->flexiPackC1  = $request->input('flexiPackC1');

     $overseaswt->ccover  = $request->input('ccover');
     $overseaswt->ccoverready  = $request->input('ccoverready');
     $overseaswt->ccoverwaste  = $request->input('ccoverwaste');
     $overseaswt->flexicover  = $request->input('flexicover');
     $overseaswt->flexicoverready  = $request->input('flexicoverready');
     $overseaswt->flexicoverwaste  = $request->input('flexicoverwaste');
     $overseaswt->ct1  = $request->input('ct1');
     $overseaswt->ct1ready  = $request->input('ct1ready');
     $overseaswt->ct1waste  = $request->input('ct1waste');
     $overseaswt->ct2  = $request->input('ct2');
     $overseaswt->ct2ready  = $request->input('ct2ready');
     $overseaswt->ct2waste  = $request->input('ct2waste');
     $overseaswt->ct3  = $request->input('ct3');
     $overseaswt->ct3ready  = $request->input('ct3ready');
     $overseaswt->ct3waste  = $request->input('ct3waste');
     $overseaswt->csticker  = $request->input('csticker');
     $overseaswt->cstickerready  = $request->input('cstickerready');
     $overseaswt->cstickerwaste  = $request->input('cstickerwaste');

     $overseaswt->surfMake  = $request->input('surfMake');
     $overseaswt->surfWaste  = $request->input('surfWaste');
     $overseaswt->trimMake  = $request->input('trimMake');
     $overseaswt->trimWaste  = $request->input('trimWaste');
     $overseaswt->dieMake  = $request->input('dieMake');
     $overseaswt->dieWaste  = $request->input('dieWaste');
     $overseaswt->stripMake  = $request->input('stripMake');
     $overseaswt->stripWaste  = $request->input('stripWaste');
     $overseaswt->foldMake  = $request->input('foldMake');
     $overseaswt->foldWaste  = $request->input('foldWaste');
     $overseaswt->sewMake  = $request->input('sewMake');
     $overseaswt->sewWaste  = $request->input('sewWaste');
     $overseaswt->bindMake  = $request->input('bindMake');
     $overseaswt->bindWaste  = $request->input('bindWaste');
     $overseaswt->threeMake  = $request->input('threeMake');
     $overseaswt->threeWaste  = $request->input('threeWaste');
     $overseaswt->PackMake  = $request->input('PackMake');
     $overseaswt->packWaste  = $request->input('packWaste');

     $overseaswt->colMakeFront  = $request->input('colMakeFront');
     $overseaswt->colMakeBack  = $request->input('colMakeBack');
     $overseaswt->colWaste  = $request->input('colWaste');
    //  $overseaswt->blaMake  = $request->input('blaMake');
    //  $overseaswt->blaWaste  = $request->input('blaWaste');

     $overseaswt->colMakeFront1  = $request->input('colMakeFront1');
     $overseaswt->colMakeBack1  = $request->input('colMakeBack1');
     $overseaswt->colWaste1  = $request->input('colWaste1');
    //  $overseaswt->blaMake1  = $request->input('blaMake1');
    //  $overseaswt->blaWaste1  = $request->input('blaWaste1');

     $overseaswt->colMakeFront2  = $request->input('colMakeFront2');
     $overseaswt->colMakeBack2  = $request->input('colMakeBack2');
     $overseaswt->colWaste2  = $request->input('colWaste2');
    //  $overseaswt->blaMake2  = $request->input('blaMake2');
    //  $overseaswt->blaWaste2  = $request->input('blaWaste2');
    $overseaswt->colMakeFrontcovback  = $request->input('colMakeFrontcovback');

     $overseaswt->flexiOrderC2  = $request->input('flexiOrderC2');
     $overseaswt->flexiUpC2  = $request->input('flexiUpC2');
     $overseaswt->flexiSignC2  = $request->input('flexiSignC2');
     $overseaswt->flexiFrontC2  = $request->input('flexiFrontC2');
     $overseaswt->flexiBackC2  = $request->input('flexiBackC2');
     $overseaswt->flexiSurfC2  = $request->input('flexiSurfC2');
     $overseaswt->flexiTrimC2  = $request->input('flexiTrimC2');
     $overseaswt->flexiDieC2  = $request->input('flexiDieC2');
     $overseaswt->flexiStripC2 = $request->input('flexiStripC2');
     $overseaswt->flexiFoldC2  = $request->input('flexiFoldC2');
     $overseaswt->flexiSewC2  = $request->input('flexiSewC2');
     $overseaswt->flexiBindC2  = $request->input('flexiBindC2');
     $overseaswt->flexi3C2  = $request->input('flexi3C2');

     $overseaswt->flexiPrintC3  = $request->input('flexiPrintC3');
     $overseaswt->flexiSurfC3  = $request->input('flexiSurfC3');
     $overseaswt->flexiTrimC3  = $request->input('flexiTrimC3');
     $overseaswt->flexiDieC3  = $request->input('flexiDieC3');
     $overseaswt->flexiStripC3  = $request->input('flexiStripC3');
     $overseaswt->flexiFoldC3  = $request->input('flexiFoldC3');
     $overseaswt->flexiSewC3  = $request->input('flexiSewC3');
     $overseaswt->flexiBindC3  = $request->input('flexiBindC3');
     $overseaswt->flexi3C3  = $request->input('flexi3C3');
     $overseaswt->flexiPackC3  = $request->input('flexiPackC3');

     $overseaswt->flexicover1  = $request->input('flexicover1');
     $overseaswt->flexicoverready1  = $request->input('flexicoverready1');
     $overseaswt->flexicoverwaste1  = $request->input('flexicoverwaste1');

     $overseaswt->surfMake1  = $request->input('surfMake1');
     $overseaswt->surfWaste1  = $request->input('surfWaste1');
     $overseaswt->trimMake1  = $request->input('trimMake1');
     $overseaswt->trimWaste1  = $request->input('trimWaste1');
     $overseaswt->dieMake1  = $request->input('dieMake1');
     $overseaswt->dieWaste1  = $request->input('dieWaste1');
     $overseaswt->stripMake1  = $request->input('stripMake1');
     $overseaswt->stripWaste1  = $request->input('stripWaste1');
     $overseaswt->foldMake1  = $request->input('foldMake1');
     $overseaswt->foldWaste1  = $request->input('foldWaste1');
     $overseaswt->sewMake1  = $request->input('sewMake1');
     $overseaswt->sewWaste1  = $request->input('sewWaste1');
     $overseaswt->bindMake1  = $request->input('bindMake1');
     $overseaswt->bindWaste1  = $request->input('bindWaste1');
     $overseaswt->threeMake1  = $request->input('threeMake1');
     $overseaswt->threeWaste1  = $request->input('threeWaste1');
     $overseaswt->PackMake1  = $request->input('PackMake1');
     $overseaswt->packWaste1  = $request->input('packWaste1');

     $overseaswt->colMakeFront3  = $request->input('colMakeFront3');
     $overseaswt->colMakeBack3  = $request->input('colMakeBack3');
     $overseaswt->colWaste3  = $request->input('colWaste3');
    //  $overseaswt->blaMake3  = $request->input('blaMake3');
    //  $overseaswt->blaWaste3  = $request->input('blaWaste3');

     $overseaswt->colMakeFront4  = $request->input('colMakeFront4');
     $overseaswt->colMakeBack4  = $request->input('colMakeBack4');
     $overseaswt->colWaste4  = $request->input('colWaste4');
    //  $overseaswt->blaMake4  = $request->input('blaMake4');
    //  $overseaswt->blaWaste4  = $request->input('blaWaste4');

     $overseaswt->colMakeFront5  = $request->input('colMakeFront5');
     $overseaswt->colMakeBack5  = $request->input('colMakeBack5');
     $overseaswt->colWaste5  = $request->input('colWaste5');
    //  $overseaswt->blaMake5  = $request->input('blaMake5');
    //  $overseaswt->blaWaste5  = $request->input('blaWaste5');
    $overseaswt->colMakeFrontcovback1  = $request->input('colMakeFrontcovback1');

     $overseaswt->save();

     // redirect
     return redirect()->route('frontend.plan.planningmaster')->withFlashSuccess('The data is saved.');
   }

   public function softCoverOverseas($id)
   {
     $sales = Sales::find($id);
     return view('frontend.plan.softCoverOverseas')->with('sales', $sales);
   }

   public function softcoveroverseasStore(Request $request ,$id )
   {

     $sales = Sales::find($id);
     $overseasfb = Overseasfb::where('sales_id',$sales->id)->first();
     $overseasfb = new Overseasfb;
     $overseasfb->sales_id = $sales->id;
     $overseasfb->none1  = $request->input('none1');
     $overseasfb->none2  = $request->input('none2');

     $overseasfb->covOrderC  = $request->input('covOrderC');
     $overseasfb->t1OrderC  = $request->input('t1OrderC');
     $overseasfb->t2OrderC  = $request->input('t2OrderC');
     $overseasfb->t3OrderC  = $request->input('t3OrderC');
     $overseasfb->statOrderC  = $request->input('statOrderC');
     $overseasfb->flexiOrderC  = $request->input('flexiOrderC');

     $overseasfb->covUpC  = $request->input('covUpC');
     $overseasfb->t1UpC  = $request->input('t1UpC');
     $overseasfb->t2UpC  = $request->input('t2UpC');
     $overseasfb->t3UpC  = $request->input('t3UpC');
     $overseasfb->statUpC  = $request->input('statUpC');
     $overseasfb->flexiUpC  = $request->input('flexiUpC');

     $overseasfb->covSignC  = $request->input('covSignC');
     $overseasfb->t1signC  = $request->input('t1signC');
     $overseasfb->t2signC  = $request->input('t2signC');
     $overseasfb->t3signC  = $request->input('t3signC');
     $overseasfb->statSignC  = $request->input('statSignC');
     $overseasfb->flexiSignC  = $request->input('flexiSignC');

     $overseasfb->covFrontC  = $request->input('covFrontC');
     $overseasfb->t1FrontC  = $request->input('t1FrontC');
     $overseasfb->t2FrontC  = $request->input('t2FrontC');
     $overseasfb->t3FrontC  = $request->input('t3FrontC');
     $overseasfb->statFrontC  = $request->input('statFrontC');
     $overseasfb->flexiFrontC  = $request->input('flexiFrontC');

     $overseasfb->covBackC  = $request->input('covBackC');
     $overseasfb->t1BackC  = $request->input('t1BackC');
     $overseasfb->t2BackC  = $request->input('t2BackC');
     $overseasfb->t3BackC  = $request->input('t3BackC');
     $overseasfb->statBackC  = $request->input('statBackC');
     $overseasfb->flexiBackC  = $request->input('flexiBackC');

     $overseasfb->covSurfC  = $request->input('covSurfC');
     $overseasfb->t1SurfC  = $request->input('t1SurfC');
     $overseasfb->t2SurfC  = $request->input('t2SurfC');
     $overseasfb->t3SurfC  = $request->input('t3SurfC');
     $overseasfb->statSurfC  = $request->input('statSurfC');
     $overseasfb->flexiSurfC  = $request->input('flexiSurfC');

     $overseasfb->covTrimC  = $request->input('covTrimC');
     $overseasfb->t1TrimC  = $request->input('t1TrimC');
     $overseasfb->t2TrimC  = $request->input('t2TrimC');
     $overseasfb->t3TrimC  = $request->input('t3TrimC');
     $overseasfb->statTrimC  = $request->input('statTrimC');
     $overseasfb->flexiTrimC  = $request->input('flexiTrimC');

     $overseasfb->covDieC  = $request->input('covDieC');
     $overseasfb->t1DieC  = $request->input('t1DieC');
     $overseasfb->t2DieC  = $request->input('t2DieC');
     $overseasfb->t3DieC  = $request->input('t3DieC');
     $overseasfb->statDieC  = $request->input('statDieC');
     $overseasfb->flexiDieC  = $request->input('flexiDieC');

     $overseasfb->covStripC  = $request->input('covStripC');
     $overseasfb->t1StripC  = $request->input('t1StripC');
     $overseasfb->t2StripC  = $request->input('t2StripC');
     $overseasfb->t3stripC  = $request->input('t3stripC');
     $overseasfb->statStripC  = $request->input('statStripC');
     $overseasfb->flexiStripC  = $request->input('flexiStripC');

     $overseasfb->covFoldC  = $request->input('covFoldC');
     $overseasfb->t1FoldC  = $request->input('t1FoldC');
     $overseasfb->t2FoldC  = $request->input('t2FoldC');
     $overseasfb->t3FoldC  = $request->input('t3FoldC');
     $overseasfb->statFoldC  = $request->input('statFoldC');
     $overseasfb->flexiFoldC  = $request->input('flexiFoldC');

     $overseasfb->covSewC  = $request->input('covSewC');
     $overseasfb->t1SewC  = $request->input('t1SewC');
     $overseasfb->t2SewC  = $request->input('t2SewC');
     $overseasfb->t3SewC  = $request->input('t3SewC');
     $overseasfb->statSewC  = $request->input('statSewC');
     $overseasfb->flexiSewC  = $request->input('flexiSewC');

     $overseasfb->covBindC  = $request->input('covBindC');
     $overseasfb->t1BindC  = $request->input('t1BindC');
     $overseasfb->t2BindC  = $request->input('t2BindC');
     $overseasfb->t3BindC  = $request->input('t3BindC');
     $overseasfb->statBindC  = $request->input('statBindC');
     $overseasfb->flexiBindC  = $request->input('flexiBindC');

     $overseasfb->cov3C  = $request->input('cov3C');
     $overseasfb->t13C  = $request->input('t13C');
     $overseasfb->t23C  = $request->input('t23C');
     $overseasfb->t33C  = $request->input('t33C');
     $overseasfb->stat3C  = $request->input('stat3C');
     $overseasfb->flexi3C  = $request->input('flexi3C');

     $overseasfb->covPrintC1  = $request->input('covPrintC1');
     $overseasfb->t1PrintC1  = $request->input('t1PrintC1');
     $overseasfb->t2PrintC1  = $request->input('t2PrintC1');
     $overseasfb->t3PrintC1  = $request->input('t3PrintC1');
     $overseasfb->statPrintC1  = $request->input('statPrintC1');
     $overseasfb->flexiPrintC1  = $request->input('flexiPrintC1');

     $overseasfb->covSurfC1  = $request->input('covSurfC1');
     $overseasfb->t1SurfC1  = $request->input('t1SurfC1');
     $overseasfb->t2SurfC1  = $request->input('t2SurfC1');
     $overseasfb->t3SurfC1  = $request->input('t3SurfC1');
     $overseasfb->statSurfC1  = $request->input('statSurfC1');
     $overseasfb->flexiSurfC1  = $request->input('flexiSurfC1');

     $overseasfb->covTrimC1  = $request->input('covTrimC1');
     $overseasfb->t1TrimC1  = $request->input('t1TrimC1');
     $overseasfb->t2TrimC1  = $request->input('t2TrimC1');
     $overseasfb->t3TrimC1 = $request->input('t3TrimC1');
     $overseasfb->statTrimC1  = $request->input('statTrimC1');
     $overseasfb->flexiTrimC1  = $request->input('flexiTrimC1');

     $overseasfb->covDieC1  = $request->input('covDieC1');
     $overseasfb->t1DieC1  = $request->input('t1DieC1');
     $overseasfb->t2DieC1  = $request->input('t2DieC1');
     $overseasfb->t3DieC1  = $request->input('t3DieC1');
     $overseasfb->statDieC1  = $request->input('statDieC1');
     $overseasfb->flexiDieC1  = $request->input('flexiDieC1');

     $overseasfb->covStripC1  = $request->input('covStripC1');
     $overseasfb->t1StripC1  = $request->input('t1StripC1');
     $overseasfb->t2StripC1  = $request->input('t2StripC1');
     $overseasfb->t3stripC1  = $request->input('t3stripC1');
     $overseasfb->statStripC1  = $request->input('statStripC1');
     $overseasfb->flexiStripC1  = $request->input('flexiStripC1');

     $overseasfb->covFoldC1  = $request->input('covFoldC1');
     $overseasfb->t1FoldC1  = $request->input('t1FoldC1');
     $overseasfb->t2FoldC1  = $request->input('t2FoldC1');
     $overseasfb->t3FoldC1  = $request->input('t3FoldC1');
     $overseasfb->statFoldC1  = $request->input('statFoldC1');
     $overseasfb->flexiFoldC1  = $request->input('flexiFoldC1');

     $overseasfb->covSewC1  = $request->input('covSewC1');
     $overseasfb->t1SewC1  = $request->input('t1SewC1');
     $overseasfb->t2SewC1  = $request->input('t2SewC1');
     $overseasfb->t3SewC1  = $request->input('t3SewC1');
     $overseasfb->statSewC1  = $request->input('statSewC1');
     $overseasfb->flexiSewC1  = $request->input('flexiSewC1');

     $overseasfb->covBindC1  = $request->input('covBindC1');
     $overseasfb->t1BindC1  = $request->input('t1BindC1');
     $overseasfb->t2BindC1  = $request->input('t2BindC1');
     $overseasfb->t3BindC1  = $request->input('t3BindC1');
     $overseasfb->statBindC1  = $request->input('statBindC1');
     $overseasfb->flexiBindC1  = $request->input('flexiBindC1');

     $overseasfb->cov3C1  = $request->input('cov3C1');
     $overseasfb->t13C1  = $request->input('t13C1');
     $overseasfb->t23C1  = $request->input('t23C1');
     $overseasfb->t33C1  = $request->input('t33C1');
     $overseasfb->stat3C1  = $request->input('stat3C1');
     $overseasfb->flexi3C1  = $request->input('flexi3C1');

     $overseasfb->covPackC1  = $request->input('covPackC1');
     $overseasfb->t1PackC1  = $request->input('t1PackC1');
     $overseasfb->t2PackC1  = $request->input('t2PackC1');
     $overseasfb->t3PackC1  = $request->input('t3PackC1');
     $overseasfb->statPackC1  = $request->input('statPackC1');
     $overseasfb->flexiPackC1  = $request->input('flexiPackC1');

     $overseasfb->ccover  = $request->input('ccover');
     $overseasfb->ccoverready  = $request->input('ccoverready');
     $overseasfb->ccoverwaste  = $request->input('ccoverwaste');
     $overseasfb->flexicover  = $request->input('flexicover');
     $overseasfb->flexicoverready  = $request->input('flexicoverready');
     $overseasfb->flexicoverwaste  = $request->input('flexicoverwaste');
     $overseasfb->ct1  = $request->input('ct1');
     $overseasfb->ct1ready  = $request->input('ct1ready');
     $overseasfb->ct1waste  = $request->input('ct1waste');
     $overseasfb->ct2  = $request->input('ct2');
     $overseasfb->ct2ready  = $request->input('ct2ready');
     $overseasfb->ct2waste  = $request->input('ct2waste');
     $overseasfb->ct3  = $request->input('ct3');
     $overseasfb->ct3ready  = $request->input('ct3ready');
     $overseasfb->ct3waste  = $request->input('ct3waste');
     $overseasfb->csticker  = $request->input('csticker');
     $overseasfb->cstickerready  = $request->input('cstickerready');
     $overseasfb->cstickerwaste  = $request->input('cstickerwaste');

     $overseasfb->surfMake  = $request->input('surfMake');
     $overseasfb->surfWaste  = $request->input('surfWaste');
     $overseasfb->trimMake  = $request->input('trimMake');
     $overseasfb->trimWaste  = $request->input('trimWaste');
     $overseasfb->dieMake  = $request->input('dieMake');
     $overseasfb->dieWaste  = $request->input('dieWaste');
     $overseasfb->stripMake  = $request->input('stripMake');
     $overseasfb->stripWaste  = $request->input('stripWaste');
     $overseasfb->foldMake  = $request->input('foldMake');
     $overseasfb->foldWaste  = $request->input('foldWaste');
     $overseasfb->sewMake  = $request->input('sewMake');
     $overseasfb->sewWaste  = $request->input('sewWaste');
     $overseasfb->bindMake  = $request->input('bindMake');
     $overseasfb->bindWaste  = $request->input('bindWaste');
     $overseasfb->threeMake  = $request->input('threeMake');
     $overseasfb->threeWaste  = $request->input('threeWaste');
     $overseasfb->PackMake  = $request->input('PackMake');
     $overseasfb->packWaste  = $request->input('packWaste');

     $overseasfb->colMakeFront  = $request->input('colMakeFront');
     $overseasfb->colMakeBack  = $request->input('colMakeBack');
     $overseasfb->colWaste  = $request->input('colWaste');
    //  $overseasfb->blaMake  = $request->input('blaMake');
    //  $overseasfb->blaWaste  = $request->input('blaWaste');

     $overseasfb->colMakeFront1  = $request->input('colMakeFront1');
     $overseasfb->colMakeBack1  = $request->input('colMakeBack1');
     $overseasfb->colWaste1  = $request->input('colWaste1');
    //  $overseasfb->blaMake1  = $request->input('blaMake1');
    //  $overseasfb->blaWaste1  = $request->input('blaWaste1');

     $overseasfb->colMakeFront2  = $request->input('colMakeFront2');
     $overseasfb->colMakeBack2  = $request->input('colMakeBack2');
     $overseasfb->colWaste2  = $request->input('colWaste2');
    //  $overseasfb->blaMake2  = $request->input('blaMake2');
    //  $overseasfb->blaWaste2  = $request->input('blaWaste2');

     $overseasfb->flexiOrderC2  = $request->input('flexiOrderC2');
     $overseasfb->flexiUpC2  = $request->input('flexiUpC2');
     $overseasfb->flexiSignC2  = $request->input('flexiSignC2');
     $overseasfb->flexiFrontC2  = $request->input('flexiFrontC2');
     $overseasfb->flexiBackC2  = $request->input('flexiBackC2');
     $overseasfb->flexiSurfC2  = $request->input('flexiSurfC2');
     $overseasfb->flexiTrimC2  = $request->input('flexiTrimC2');
     $overseasfb->flexiDieC2  = $request->input('flexiDieC2');
     $overseasfb->flexiStripC2 = $request->input('flexiStripC2');
     $overseasfb->flexiFoldC2  = $request->input('flexiFoldC2');
     $overseasfb->flexiSewC2  = $request->input('flexiSewC2');
     $overseasfb->flexiBindC2  = $request->input('flexiBindC2');
     $overseasfb->flexi3C2  = $request->input('flexi3C2');

     $overseasfb->flexiPrintC3  = $request->input('flexiPrintC3');
     $overseasfb->flexiSurfC3  = $request->input('flexiSurfC3');
     $overseasfb->flexiTrimC3  = $request->input('flexiTrimC3');
     $overseasfb->flexiDieC3  = $request->input('flexiDieC3');
     $overseasfb->flexiStripC3  = $request->input('flexiStripC3');
     $overseasfb->flexiFoldC3  = $request->input('flexiFoldC3');
     $overseasfb->flexiSewC3  = $request->input('flexiSewC3');
     $overseasfb->flexiBindC3  = $request->input('flexiBindC3');
     $overseasfb->flexi3C3  = $request->input('flexi3C3');
     $overseasfb->flexiPackC3  = $request->input('flexiPackC3');

     $overseasfb->flexicover1  = $request->input('flexicover1');
     $overseasfb->flexicoverready1  = $request->input('flexicoverready1');
     $overseasfb->flexicoverwaste1  = $request->input('flexicoverwaste1');

     $overseasfb->surfMake1  = $request->input('surfMake1');
     $overseasfb->surfWaste1  = $request->input('surfWaste1');
     $overseasfb->trimMake1  = $request->input('trimMake1');
     $overseasfb->trimWaste1  = $request->input('trimWaste1');
     $overseasfb->dieMake1  = $request->input('dieMake1');
     $overseasfb->dieWaste1  = $request->input('dieWaste1');
     $overseasfb->stripMake1  = $request->input('stripMake1');
     $overseasfb->stripWaste1  = $request->input('stripWaste1');
     $overseasfb->foldMake1  = $request->input('foldMake1');
     $overseasfb->foldWaste1  = $request->input('foldWaste1');
     //wan commented this
     //$overseasfb->sewMake1  = $request->input('sewMake1');
     //$overseasfb->sewWaste1  = $request->input('sewWaste1');
     //$overseasfb->bindMake1  = $request->input('bindMake1');
     //$overseasfb->bindWaste1  = $request->input('bindWaste1');
     $overseasfb->threeMake1  = $request->input('threeMake1');
     $overseasfb->threeWaste1  = $request->input('threeWaste1');
     $overseasfb->PackMake1  = $request->input('PackMake1');
     $overseasfb->packWaste1  = $request->input('packWaste1');

     $overseasfb->colMakeFront3  = $request->input('colMakeFront3');
     $overseasfb->colMakeBack3  = $request->input('colMakeBack3');
     $overseasfb->colWaste3  = $request->input('colWaste3');
    //  $overseasfb->blaMake3  = $request->input('blaMake3');
    //  $overseasfb->blaWaste3  = $request->input('blaWaste3');

     $overseasfb->colMakeFront4  = $request->input('colMakeFront4');
     $overseasfb->colMakeBack4  = $request->input('colMakeBack4');
     $overseasfb->colWaste4  = $request->input('colWaste4');
    //  $overseasfb->blaMake4  = $request->input('blaMake4');
    //  $overseasfb->blaWaste4  = $request->input('blaWaste4');

     $overseasfb->colMakeFront5  = $request->input('colMakeFront5');
     $overseasfb->colMakeBack5  = $request->input('colMakeBack5');
     $overseasfb->colWaste5  = $request->input('colWaste5');
    //  $overseasfb->blaMake5  = $request->input('blaMake5');
    //  $overseasfb->blaWaste5  = $request->input('blaWaste5');

     $overseasfb->save();

     // redirect
     return redirect()->route('frontend.plan.planningmaster')->withFlashSuccess('The data is saved.');
   }

   public function boxes ($id)
   {
     $sales = Sales::find($id);
     return view('frontend.plan.boxes')->with('sales', $sales);
   }

   public function boxesstore($id, Request $request)
   {
     $sales = Sales::find($id);
     $boxes = Boxes::where('sales_id',$sales->id)->first();
     $boxes = new Boxes;
     $boxes->sales_id = $sales->id;
     $boxes->user_id = Auth::user()->id;
     $boxes->order1  = $request->input('order1');
     $boxes->order2  = $request->input('order2');
     $boxes->order3  = $request->input('order3');
     $boxes->order4  = $request->input('order4');
     $boxes->up1  = $request->input('up1');
     $boxes->up2  = $request->input('up2');
     $boxes->up3  = $request->input('up3');
     $boxes->up4  = $request->input('up4');
     $boxes->front2  = $request->input('front2');
     $boxes->front1  = $request->input('front1');
     $boxes->back1  = $request->input('back1');
     $boxes->back2  = $request->input('back2');
     $boxes->surf1  = $request->input('surf1');
     $boxes->surf2  = $request->input('surf2');
     $boxes->trim1  = $request->input('trim1');
     $boxes->trim2  = $request->input('trim2');
     $boxes->trim3  = $request->input('trim3');
     $boxes->trim4 = $request->input('trim4');
     $boxes->flute1 = $request->input('flute1');
     $boxes->flute2  = $request->input('flute2');
     $boxes->flute3  = $request->input('flute3');
     $boxes->flute4  = $request->input('flute4');
     $boxes->die1  = $request->input('die1');
     $boxes->die2  = $request->input('die2');
     $boxes->die3  = $request->input('die3');
     $boxes->die4  = $request->input('die4');
     $boxes->strip1  = $request->input('strip1');
     $boxes->strip2  = $request->input('strip2');
     $boxes->strip3  = $request->input('strip3');
     $boxes->strip4  = $request->input('strip4');
     $boxes->window1  = $request->input('window1');
     $boxes->window2  = $request->input('window2');
     $boxes->window3  = $request->input('window3');
     $boxes->window4  = $request->input('window4');
     $boxes->glue1  = $request->input('glue1');
     $boxes->glue2  = $request->input('glue2');
     $boxes->glue3  = $request->input('glue3');
     $boxes->glue4  = $request->input('glue4');
     $boxes->print11  = $request->input('print11');
     $boxes->print12  = $request->input('print12');
     $boxes->surf11  = $request->input('surf11');
     $boxes->surf12  = $request->input('surf12');
     $boxes->trim11  = $request->input('trim11');
     $boxes->trim12 = $request->input('trim12');
     $boxes->trim13  = $request->input('trim13');
     $boxes->trim14  = $request->input('trim14');
     $boxes->flute11  = $request->input('flute11');
     $boxes->flute12  = $request->input('flute12');
     $boxes->flute13  = $request->input('flute13');
     $boxes->flute14  = $request->input('flute14');
     $boxes->die11  = $request->input('die11');
     $boxes->die12  = $request->input('die12');
     $boxes->die13  = $request->input('die13');
     $boxes->die14  = $request->input('die14');
     $boxes->strip11  = $request->input('strip11');
     $boxes->strip12  = $request->input('strip12');
     $boxes->strip13  = $request->input('strip13');
     $boxes->strip14  = $request->input('strip14');
     $boxes->window11  = $request->input('window11');
     $boxes->window12  = $request->input('window12');
     $boxes->window13  = $request->input('window13');
     $boxes->window14  = $request->input('window14');
     $boxes->glue11  = $request->input('glue11');
     $boxes->glue12  = $request->input('glue12');
     $boxes->glue13  = $request->input('glue13');
     $boxes->glue14  = $request->input('glue14');
     $boxes->pack11  = $request->input('pack11');
     $boxes->pack12  = $request->input('pack12');
     $boxes->pack13  = $request->input('pack13');
     $boxes->pack14  = $request->input('pack14');
     $boxes->wastecardC  = $request->input('wastecardC');
     $boxes->reqwastecardC  = $request->input('reqwastecardC');
     $boxes->paperwastecardC  = $request->input('paperwastecardC');
     $boxes->wastecardB  = $request->input('wastecardB');
     $boxes->reqwastecardB  = $request->input('reqwastecardB');
     $boxes->paperwastecardB  = $request->input('paperwastecardB');
     $boxes->wastefluteC  = $request->input('wastefluteC');
     $boxes->paperwastefluteC  = $request->input('paperwastefluteC');
     $boxes->wastefluteB  = $request->input('wastefluteB');
     $boxes->paperwastefluteB  = $request->input('paperwastefluteB');
     $boxes->some1  = $request->input('some1');
     $boxes->some2  = $request->input('some2');
     $boxes->some3  = $request->input('some3');
     $boxes->some4  = $request->input('some4');
     $boxes->some5 = $request->input('some5');
     $boxes->some6  = $request->input('some6');
     $boxes->some7  = $request->input('some7');
     $boxes->some8  = $request->input('some8');
     $boxes->colMakeFront  = $request->input('colMakeFront');
     $boxes->colMakeBack  = $request->input('colMakeBack');
     $boxes->colWaste  = $request->input('colWaste');
     $boxes->blaMake  = $request->input('blaMake');
     $boxes->blaWaste  = $request->input('blaWaste');
     $boxes->surfMake  = $request->input('surfMake');
     $boxes->surfWaste  = $request->input('surfWaste');
     $boxes->trimMake  = $request->input('trimMake');
     $boxes->trimWaste  = $request->input('trimWaste');
     $boxes->flutemake  = $request->input('flutemake');
     $boxes->flutewaste  = $request->input('flutewaste');
     $boxes->diemake  = $request->input('diemake');
     $boxes->diewaste  = $request->input('diewaste');
     $boxes->stripmake  = $request->input('stripmake');
     $boxes->stripwaste  = $request->input('stripwaste');
     $boxes->windowsmake  = $request->input('windowsmake');
     $boxes->windowswaste  = $request->input('windowswaste');
     $boxes->glueflutemake = $request->input('glueflutemake');
     $boxes->glueflutewaste  = $request->input('glueflutewaste');
     $boxes->gluemake  = $request->input('gluemake');
     $boxes->gluewaste  = $request->input('gluewaste');
     $boxes->PackMake  = $request->input('PackMake');
     $boxes->packWaste  = $request->input('packWaste');
     $boxes->save();

     // redirect
     return redirect()->route('frontend.plan.planningmaster')->withFlashSuccess('The data is saved.');
   }

   public function planning ($id)
   {
     $sales = Sales::find($id);
     return view('frontend.plan.planning')->with('sales', $sales);
   }

   public function planningstore($id, Request $request)
   {
     $sales = Sales::find($id);
     $plannings = Planning::where('sales_id',$sales->id)->first();
     $plannings = new Planning;
     $plannings->sales_id = $sales->id;
     $plannings->user_id = Auth::user()->id;
     $plannings->aread  = $request->input('aread');
     $plannings->incharead  = $request->input('incharead');
     $plannings->areaw  = $request->input('areaw');
     $plannings->inchareaw  = $request->input('inchareaw');
     $plannings->papergsm  = $request->input('papergsm');
     $plannings->up  = $request->input('up');
     $plannings->qty  = $request->input('qty');
     $plannings->ink  = $request->input('ink');
     $plannings->total  = $request->input('total');
     $plannings->calcsheet  = $request->input('calcsheet');
     $plannings->calcmt  = $request->input('calcmt');
     $plannings->paperink  = $request->input('paperink');
     $plannings->duplexink  = $request->input('duplexink');
     $plannings->paperissue  = $request->input('paperissue');
     $plannings->duplexissue  = $request->input('duplexissue');
     $plannings->calculation1  = $request->input('calculation1');
     $plannings->calculation2  = $request->input('calculation2');
     $plannings->length  = $request->input('length');
     $plannings->width  = $request->input('width');
     $plannings->weight  = $request->input('weight');
     $plannings->paperqty  = $request->input('paperqty');
     $plannings->calcinmt  = $request->input('calcinmt');
     $plannings->permt  = $request->input('permt');
     $plannings->mt  = $request->input('mt');
     $plannings->sh  = $request->input('sh');

     $plannings->save();

     return redirect()->route('frontend.plan.planningmaster')->withFlashSuccess('The data is saved.');
   }

   public function softcoverpreview($id)
   {
        // $sales = Sales::find($id);
        //
        // $softcover = Softcover::where('sales_id',$sales->id)->first();
        $softcover = Softcover::find($id);
        $sales = Sales::find($softcover->sales_id);
        return view('frontend.plan.softcoverpreview')->with('sales', $sales)->with('softcover', $softcover);
    }

   public function softcoverbwpreview($id)
   {
     // $sales = Sales::find($id);
     // $softcoverbw = Softcoverbw::where('sales_id',$sales->id)->first();

        $softcoverbw = Softcoverbw::find($id);
        $sales = Sales::find($softcoverbw->sales_id);
     return view('frontend.plan.softcoverbwpreview')->with('sales', $sales)->with('softcoverbw', $softcoverbw);
   }

   public function softcoveroverseaspreview($id)
   {
     // $sales = Sales::find($id);
     // $overseasfb = Overseasfb::where('sales_id',$sales->id)->first();
     $overseasfb = Overseasfb::find($id);
     $sales = Sales::find($overseasfb->sales_id);
     return view('frontend.plan.softcoveroverseaspreview')->with('sales', $sales)->with('overseasfb', $overseasfb);
   }

   public function softcoveroverseaswtpreview($id)
   {
     // $sales = Sales::find($id);
     // $overseaswt = Overseaswt::where('sales_id',$sales->id)->first();
        $oveseaswt = Overseaswt::find($id);
        $sales = Sales::find($overseaswt->sales_id);
     return view('frontend.plan.softcoveroverseaswtpreview')->with('sales', $sales)->with('overseaswt', $overseaswt);
   }

   public function boxespreview($id)
   {
     // $sales = Sales::find($id);
     // $boxes = Boxes::where('sales_id',$sales->id)->first();
     $boxes = Boxes::find($id);
     $sales = Sales::find($boxes->id);

     return view('frontend.plan.boxespreview')->with('sales', $sales)->with('boxes', $boxes);
   }

   public function planningpreview($id)
   {
     // $sales = Sales::find($id);
     // $plannings = Planning::where('sales_id',$sales->id)->first();

     $plannings = Planning::find($id);
     $sales = Sales::find($plannings->sales_id);
     return view('frontend.plan.planningpreview')->with('sales', $sales)->with('plannings', $plannings);
   }

   public function liststock()
   {
     $sales=Sales::all();
     return view('frontend.plan.liststock')->with('sales',$sales);
   }

   public function listTable()
   {
       $sales = Sales::leftJoin('items', 'sales.items_id', '=', 'items.id')
       ->select(['sales.salesline','sales.custName', 'items.partNo','items.partDesc', 'sales.id'])
       ->where('sales.status', '=', 'Approved');
       return Datatables::of($sales)
         ->editColumn('id', function ($sales) {
         //return $sales->action_buttons;
         return '<a href="'. route('frontend.plan.stock', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search data-toggle="tooltip" title="Forecast Stock"></i></a>
         ';
       })
       ->escapeColumns([])
       ->make();
     }

    public function listsales()
    {
     $sales = Sales::all();
     return view('frontend.plan.listsales')->with('sales', $sales);
    }

    public function prodtable()
    {
      $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
      ->select(['sales.salesline','sales.custName', 'items.partNo', 'items.partDesc' , 'sales.id'])
      ->where('sales.status', '=', 'Approved')
      ->orwhere('sales.status', '=', 'PAF');

      return Datatables::of($sales)

      ->editColumn('id', function ($sales) {
        //return $sales->action_buttons;
        return '<a href="'. route('frontend.plan.production', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add New"></i></a>';
      })
      ->escapeColumns([])
      ->make();
    }

    public function viewproduction($id)
    {
      $sales = Sales::find($id);
      $production = Production::where('sales_id', $sales->id)->first();
      $stations = Station::where('sco_number', $sales->sco_number)->get();
      return view('frontend.plan.viewproduction')->with('sales', $sales)->with('production', $production)->with('stations', $stations);
    }

    public function productiontable()
    {
      $production = Production::leftJoin('sales', 'sales.id', '=', 'productions.sales_id' )
      ->select(['productions.sco_number','sales.salesline', 'sales.custName', 'productions.id'])
      ->where('sales.status', '=', 'Approved')
      ->orwhere('sales.status', '=', 'PAF');

      return Datatables::of($production)

      ->editColumn('id', function ($production) {
        $prod = Production::find($production->id);
        $sales = Sales::where('sco_number', $prod->sco_number)->first();
        //return $sales->action_buttons;
        return '<a href="'. route('frontend.plan.viewproduction', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add New"></i></a>';
      })
      ->escapeColumns([])
      ->make();
    }

    public function production ($id)
    {
      $sales = Sales::find($id);
      $production = Production::where('sales_id', $sales->id)->first();
      $stations = Station::where('sco_number', $sales->sco_number)->get();
      return view('frontend.plan.production')->with('sales', $sales)->with('production', $production)->with('stations', $stations);
    }

    public function storeproduction($id, Request $request)
    {
      $sales = Sales::find($id);
      // $production = new Production;
      $production = Production::where('sales_id', $sales->id)->first();
        $production->sales_id = $sales->id;

        $production->sco_number = $sales->sco_number;
        $production->so_number = $sales->salesorder;
        $production->wo_number = $sales->workorder;
        $production->keyproduction = $sales->sco_number.$sales->salesorders;

        $production->save();

      $station = Station::where('sco_number', $sales->sco_number)->get();
        $station2 = $request->input('station');
        $remarksQAD = $request->input('remarksQAD');
        $remarks = $request->input('remarks');
        $sco_number = $request->input('sco_number');
        $jobid =  $request->input('job_id');
        $i=0;

      foreach ($station as $stat) {
        $stat->station = $station2[$i];
        $stat->remarksQAD = $remarksQAD[$i];
        $stat->remarks = $remarks[$i];
        $stat->job_id =  $jobid[$i];
        $stat->sco_number =  $sco_number;
        $stat->save();
        $i++;
      }

      return redirect()->route('frontend.plan.listsales')->withFlashSuccess('The data is saved');

    }

   public function stock($id)
   {
      $sales = Sales::find($id);
      $items = Item::find($sales->items_id);
       $stockupdate = Stockupdate::where('items_id', $items->id)->first();
       $stocks = Stock::where('item_number', $items->partNo)->first();
       $inventory = Inventory::where("item_id", $items->partNo)->first();
       if ($stocks == null){
         $balance = 0;
       }
       else {
          $balance = DB::table("powos")->where('status','=', 'PO')->where('item_number','=', $items->partNo)->sum('quantity_ordered') + DB::table("powos")->where('status','=', 'WO')->where('item_number','=', $items->partNo)->sum('quantity_ordered');
       }

       if ($stockupdate == null){
         $stock = $balance;
       }
       else {
         // $stock =$stockupdate->stock_taken - $balance + $stockupdate->adj ;
         $stock =  DB::table("stockupdates")->where('items_id','=', $items->id)->sum('stock_taken') - $balance + DB::table("stockupdates")->where('items_id','=', $items->id)->sum('adj');

       }
       return view('frontend.plan.stock')
       ->with('sales',$sales)
       ->with('stockupdate', $stockupdate)
       ->with('stocks', $stocks)
       ->with('balance', $balance)
      ->with('stock', $stock)
      ->with('inventory',1000);
   }

   public function storestock ($id, Request $request)
   {

     $sales = Sales::find($id);
     $stockupdatepowo = new Stockupdatepowo;

     $stockupdatepowo->items_id = $sales->items_id;
     $stockupdatepowo->idNum = $request->input('idNum');
     $stockupdatepowo->POQuantity = $request->input('POQuantity');
     $stockupdatepowo->stock_taken = $request->input('stock_taken');
     $stockupdatepowo->adj = $request->input('adj');
     $stockupdatepowo->balance =  $request->input('balance');
     $dtreceive= \DateTime::createFromFormat('d/m/Y', $request->input("receiveDate"));
     $stockupdatepowo->receiveDate =  $dtreceive;
     $stockupdatepowo->remarkStock =  $request->input('remarkStock');
     $stockupdatepowo->partNo = $sales->items->partNo;
     $stockupdatepowo->save();

    //  $powos = Powo::where('item_number', $sales->items->partNo)->first();
    return redirect()->route('frontend.plan.stock', $sales->id)->withFlashSuccess('The data is saved.');
   }

   //show datatable
   public function viewstocktableplan(Request $request)
   {
        $stockupdatepowo = Stockupdatepowo::leftJoin('items', 'stockupdatepowos.items_id', '=', 'items.id')
        ->select(['stockupdatepowos.idNum', 'stockupdatepowos.POQuantity', 'stockupdatepowos.balance','stockupdatepowos.stock_taken', 'stockupdatepowos.adj',
        'stockupdatepowos.receiveDate', 'stockupdatepowos.remarkStock', 'stockupdatepowos.id'])
        ->where('items.id', '=', $request->input('id') );

        return Datatables::of($stockupdatepowo)
        ->editColumn('receiveDate', function ($date) {
           return $date->receiveDate ? with(new Carbon($date->receiveDate))->format('d/m/Y') : '';
        })
        ->editColumn('id', function ($stockupdatepowo) {
           //return $sales->action_buttons;
           return '<a href="'. route('frontend.plan.deletestock',$stockupdatepowo->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Cancel </a>';

        })
        ->escapeColumns([])
        ->make();
    }

   public function powotable(Request $request)
   {
     $powos = Powo::select(['status', 'reference','rawmaterial','wo_id', 'due_date','job', 'quantity_ordered'])
     ->where('reference', '=', $request->input('partNo') );
     return Datatables::of($powos)
     ->editColumn('due_date', function ($date) {
             return $date->due_date ? with(new Carbon($date->due_date))->format('d/m/Y') : '';
         })
     ->escapeColumns([])
     ->make();
   }

   //bakal dibuang
   public function importwo (Request $request)
   {
     $powos = Powo::where('status','=', 'WO')->forceDelete();
       if(Input::hasFile('import_wo')){
         $path = Input::file('import_wo')->getRealPath();
         $rows = Excel::load($path, function($reader) {
               $reader->toArray();
               $reader->noHeading();
           })->get();

          foreach ($rows as $row) {
            $row5 = str_replace(",", "", $row[5]);
            $date = \DateTime::createFromFormat('d/m/Y',$row[8]);
               DB::table('powos')->insert(
               ['item_number'=> $row[1], 'reference' => $row[0], 'rawmaterial' => $row[2], 'due_date'=> $date, 'quantity_ordered'=> '-'.$row5, 'status'=>'WO', 'wo_id' => $row[3], 'job' => $row[9] ]);
           }
       }
           return redirect()->route('frontend.plan.liststock')->withFlashSuccess('The Work Order is saved.');
   }

   public function importpo (Request $request)
   {
       ini_set('max_execution_time', 300);
     $powos = Powo::where('status','=', 'PO')->forceDelete();
       if(Input::hasFile('import_po')){
         $path = Input::file('import_po')->getRealPath();
         $rows = Excel::load($path, function($reader) {
               $reader->toArray();
               $reader->noHeading();
           })->get();

          foreach ($rows as $row) {
            $row4 = str_replace(",", "", $row[4]);
            $date = \DateTime::createFromFormat('Y-m-d H:i:s', $row[3]);
               DB::table('powos')->insert(
               ['item_number'=> $row[1], 'reference' => $row[0], 'due_date'=> $date, 'rawmaterial'=> '-',  'quantity_ordered'=> $row4, 'status'=>'PO' ]);
           }
       }
       return redirect()->route('frontend.plan.liststock')->withFlashSuccess('The Puchase Order is saved.');
   }

   public function deletestock($id)
   {
     $stockupdatepowo = Stockupdatepowo::findOrFail($id)->forceDelete();
     // redirect
     return redirect()->route('frontend.plan.listStock')->withFlashSuccess('The data is cancelled.');
   }

   public function softcoverview()
   {
     $softcover = Softcover::all();
     return view('frontend.plan.softcoverview')->with('softcover', $softcover);
   }

   public function softcovertable()
   {
         $softcover = Softcover::leftJoin('sales', 'soft_covers.sales_id', '=', 'sales.id')
          ->leftJoin('items', 'sales.items_id', '=', 'items.id')
          ->select(['sales.custName','items.partNo','items.partDesc', 'soft_covers.created_at', 'soft_covers.id', 'soft_covers.sales_id' ]);

         return Datatables::of($softcover)
          ->editColumn('created_at', function ($date) {
               return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
             })
         ->editColumn('id', function ($softcover) {

              return '<a href="'. route('frontend.plan.softcoverpreview', $softcover->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
               ';
         })
         ->escapeColumns([])
         ->make();
   }

   public function softcoverbwview()
   {
     $softcoverbw = Softcoverbw::all();
     return view('frontend.plan.softcoverbwview')->with('softcoverbw', $softcoverbw);
   }

   public function softcoverbwtable()
   {
     $softcoverbw = Softcoverbw::leftJoin('sales', 'softcoverbws.sales_id', '=', 'sales.id')
      ->leftJoin('items', 'sales.items_id', '=', 'items.id')
      ->select(['sales.custName','items.partNo','items.partDesc', 'softcoverbws.created_at', 'softcoverbws.id', 'softcoverbws.sales_id' ]);

      return Datatables::of($softcoverbw)
       ->editColumn('created_at', function ($date) {
            return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          })
      ->editColumn('id', function ($softcoverbw) {
           return '<a href="'. route('frontend.plan.softcoverbwpreview', $softcoverbw->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
            ';
      })
         ->escapeColumns([])
         ->make();
   }

   public function softcoveroverseasview()
   {
     $overseasfb = Overseasfb::all();
     return view('frontend.plan.softcoveroverseasview')->with('overseasfb', $overseasfb);
   }

   public function softcoveroverseastable()
   {
     $overseasfb = Overseasfb::leftJoin('sales', 'overseasfbs.sales_id', '=', 'sales.id')
      ->leftJoin('items', 'sales.items_id', '=', 'items.id')
      ->select(['sales.custName','items.partNo','items.partDesc', 'overseasfbs.created_at', 'overseasfbs.id', 'overseasfbs.sales_id' ]);

      return Datatables::of($overseasfb)
       ->editColumn('created_at', function ($date) {
            return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          })
      ->editColumn('id', function ($overseasfb) {
           return '<a href="'. route('frontend.plan.softcoveroverseaspreview', $overseasfb->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
            ';
      })
         ->escapeColumns([])
         ->make();
    }

   public function softcoveroverseaswtview()
   {
     $overseaswt = Overseaswt::all();
     return view('frontend.plan.softcoveroverseaswtview')->with('overseaswt', $overseaswt);
   }

   public function softcoveroverseaswttable()
   {
     $overseaswt = Overseaswt::leftJoin('sales', 'overseaswts.sales_id', '=', 'sales.id')
      ->leftJoin('items', 'sales.items_id', '=', 'items.id')
      ->select(['sales.custName','items.partNo','items.partDesc', 'overseaswts.created_at', 'overseaswts.id', 'overseaswts.sales_id' ]);

      return Datatables::of($overseaswt)
       ->editColumn('created_at', function ($date) {
            return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          })
      ->editColumn('id', function ($overseaswt) {
           return '<a href="'. route('frontend.plan.softcoveroverseaswtpreview', $overseaswt->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
            ';
      })
         ->escapeColumns([])
         ->make();
   }

   public function boxesview()
   {
     $boxes = Boxes::all();
     return view('frontend.plan.boxesview')->with('boxes', $boxes);
   }

   public function boxestable()
   {
     $boxes = Boxes::leftJoin('sales', 'boxes.sales_id', '=', 'sales.id')
      ->leftJoin('items', 'sales.items_id', '=', 'items.id')
      ->select(['sales.custName','items.partNo','items.partDesc', 'boxes.created_at', 'boxes.id', 'boxes.sales_id' ]);

      return Datatables::of($boxes)
       ->editColumn('created_at', function ($date) {
            return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          })
      ->editColumn('id', function ($boxes) {
           return '<a href="'. route('frontend.plan.boxespreview', $boxes->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
            ';
      })
         ->escapeColumns([])
         ->make();
   }

   public function planningview()
   {
     $planning = Planning::all();
     return view('frontend.plan.planningview')->with('planning', $planning);
   }

   public function planningstable()
   {
     $planning = Planning::leftJoin('sales', 'plannings.sales_id', '=', 'sales.id')
      ->leftJoin('items', 'sales.items_id', '=', 'items.id')
      ->select(['sales.custName','items.partNo','items.partDesc', 'plannings.created_at', 'plannings.id', 'plannings.sales_id' ]);

      return Datatables::of($planning)
       ->editColumn('created_at', function ($date) {
            return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          })
      ->editColumn('id', function ($planning) {
           return '<a href="'. route('frontend.plan.planningpreview', $planning->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View" ></i></a>
            ';
      })
         ->escapeColumns([])
         ->make();
   }

   public function selectpn ()
   {
     $sales = Sales::all();
     $items = Item::all();
     return view('frontend.plan.selectpn')->with('sales', $sales)->with('items',$items);
   }

   public function selectpntable()
   {
         $sales = Sales::leftJoin('items', 'sales.items_id', '=', 'items.id')
                             ->select(['sales.salesline','sales.custName','items.partNo','items.partDesc', 'sales.id' ])
                             ->where('sales.status', '=', 'Approved')
                             ->orWhere('sales.status', '=', 'PAF');

         return Datatables::of($sales)
             ->editColumn('id', function ($sales) {
               return '<a href="'. route('frontend.plan.select', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add New"></i></a>

               ';
         })
         ->escapeColumns([])
         ->make();
   }

   public function select ($id)
   {
     $sales= Sales::find($id);
     return view('frontend.plan.selectformula')->with('sales', $sales);
   }

   public function selectformula(Request $request, $id)
   {
     $sales= Sales::find($id);
      // return view('frontend.plan.selectformula');
      $type = Input::get('type');

      if ($type == 'a')
      {
        $sales = Sales::find($id);
        $items = Item::where('id', $sales->item_number)->first();
        $type = 'a';
        return view ('frontend.plan.softCover')->with('type', $type)->with('sales', $sales)->with('items',$items);
      }

      else if ($type == 'b')
      {
        $sales = Sales::find($id);
        $items = Item::where('id', $sales->item_number)->first();
        $type = 'b';
        return view ('frontend.plan.softCoverBW')->with('type', $type)->with('sales', $sales)->with('items',$items);
      }

      else if ($type == 'c')
      {
        $sales = Sales::find($id);
        $items = Item::where('id', $sales->item_number)->first();
        $type = 'c';
        return view ('frontend.plan.softCoverOverseas')->with('type', $type)->with('sales', $sales)->with('items',$items);
      }

      else if ($type == 'd')
      {
        $sales = Sales::find($id);
        $items = Item::where('id', $sales->item_number)->first();
        $type = 'd';
        return view ('frontend.plan.softCoverOverseaWT')->with('type', $type)->with('sales', $sales)->with('items',$items);
      }

      else if ($type == 'e')
      {
        $sales = Sales::find($id);
        $items = Item::where('id', $sales->item_number)->first();
        $type = 'e';
        return view ('frontend.plan.boxes')->with('type', $type)->with('sales', $sales)->with('items',$items);
      }

      else if ($type == 'f')
      {
        $sales = Sales::find($id);
        $items = Item::where('id', $sales->item_number)->first();
        $type = 'f';
        return view ('frontend.plan.planning')->with('type', $type)->with('sales', $sales)->with('items',$items);
      }

   }

   public function listbalance()
   {
     $sales= Sales::all();
     return view ('frontend.plan.listbalance')->with('sales', $sales);
   }

   public function tablelist()
   {
     $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
     ->select(['sales.salesline','sales.workorder','sales.custName', 'items.partNo', 'items.partDesc' , 'sales.id'])
     ->where('sales.status', '=', 'Approved');
     return Datatables::of($sales)
         ->editColumn('id', function ($sales) {

           $prod = Sales::find($sales->id);
           $sheeting = Sheeting::where('sco_number', $prod->sco_number)->first();
         //return $sales->action_buttons;
             return '<a href="'. route('frontend.plan.stockbalance', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Roll Inventory"></i> Roll Inventory</a>
             <a href="'. route('frontend.plan.sheeting', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Sheeting"></i> Sheeting</a>

             ';
     })
     ->escapeColumns([])
     ->make();
   }
   // <a href="'. route('frontend.plan.viewstock', $sheeting->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Sheeting"></i> Sheeting</a>

   // public function viewstock($id)
   // {
   //   $sheeting= Sheeting::find($id);
   //   return view ('frontend.plan.viewstock')->with('sheeting', $sheeting);
   // }

   public function stockbalance($id)
   {
     $sales= Sales::find($id);
     $sheeting = Sheeting::where('sco_number', $sales->sco_number)->first();

       return view ('frontend.plan.stockbalance')->with('sales', $sales)->with('sheeting', $sheeting);
    
   }

   public function balancestore($id, Request $request)
   {
      $sales = Sales::find($id);
      $balances = new Balance;

      $balances->sco_number = $sales->sco_number;
      $balances->salesorder = $sales->salesorder;
      $balances->date = $request->input('date');
      $balances->job_no = $request->input('job_no');
      $balances->grn_no = $request->input('grn_no');
      $balances->inmt = $request->input('inmt');
      $balances->outmt = $request->input('outmt');
      $balances->balance = $request->input('balance');
      $balances->remark = $request->input('remark');

      $balances->save();

      return redirect()->route('frontend.plan.stockbalance', $sales->id)->withFlashSuccess('The data is  saved.');
   }

   public function tablebalance()
   {
     $balances = Balance::select(['date', 'job_no', 'grn_no', 'inmt', 'outmt', 'balance', 'remark', 'id']);
     return Datatables::of($balances)
         ->editColumn('id', function ($balances) {
         //return $sales->action_buttons;
             return '<a href="'. route('frontend.plan.delete',$balances->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>';
     })
     ->escapeColumns([])
     ->make();
   }

   public function sheeting($id)
   {
     $sales= Sales::find($id);
     return view ('frontend.plan.sheeting')->with('sales', $sales);
   }

   public function sheetingstore($id, Request $request)
   {
      $sales = Sales::find($id);
      $sheetings = new Sheeting;

      $sheetings->sco_number = $sales->sco_number;
      $sheetings->salesorder = $sales->salesorder;
      $sheetings->supplier = $request->input('supplier');
      $sheetings->item_number = $request->input('item_number');
      $sheetings->desc = $request->input('desc');
      $sheetings->qty = $request->input('qty');
      $sheetings->due_date = $request->input('due_date');
      $sheetings->customerid = $request->input('customerid');
      $sheetings->partNo = $request->input('partNo');

      $sheetings->save();

      return redirect()->route('frontend.plan.listbalance')->withFlashSuccess('The data is  saved.');
   }

   public function delete($id)
   {
     $balances = Balance::findOrFail($id)->forceDelete();
     return redirect()->route('frontend.plan.listbalance')->withFlashSuccess('The data is deleted.');
   }

}
