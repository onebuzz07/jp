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
use App\Models\Access\Salesqad;
use App\Models\Access\Powo;
use App\Models\Access\Stockupdatepowo;
use App\Models\Access\Production;
use App\Models\Access\Station;
use App\Models\Access\Stock;
use App\Models\Access\Inventory;
use App\Models\Access\Balance;
use App\Models\Access\Sheeting;
use App\Models\Access\Prodqads;
use App\Models\Access\Wotype;
use App\Models\Access\Sheet;
use App\Models\Access\Requisite;
use App\Models\Access\Process;
use App\Models\Access\Remark;
use App\Models\Access\Prodstruct;
use App\Models\Access\Inv;
use App\Models\Access\Manual;
use App\Models\Access\Addstock;
use App\Models\Access\Comment;
use App\Models\Access\Purchase;
use App\Models\Access\Change;
use App\Models\Access\Prodedit;

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
      $sales=Sales::all();
      return view('frontend.plan.index')->with('sales',$sales);
    }

    public function anyData()
    {
      if (access()->hasPermissions(['planning']))
      {
          $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
          ->select(['sales.sco_number','sales.wid', 'sales.workorder','sales.custName', 'items.partNo', 'items.quantity', 'sales.deliverDate','sales.purchaseOrder', 'sales.salesorder' ,'sales.rev', 'sales.id','sales.created_at'])
          ->where('sales.finish', '=', 'planner' )
          ->where('sales.planning_bom', '=', null);

          return Datatables::of($sales)
            ->editColumn('id', function ($sales) {
                      return '<a href="'. route('frontend.plan.edit', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Release BOM"></i></a>
                      ';
                  })
          ->editColumn('created_at', function ($date) {
                    return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
                })
          ->order(function ($sales) {
                       $sales->orderBy('created_at', 'desc');
                   })
          ->escapeColumns([])
          ->make();
        }
        else {
          $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
          ->select(['sales.sco_number','sales.wid','sales.custName', 'items.partNo' , 'items.partDesc','items.partDesc2','sales.rev', 'sales.id','sales.created_at'])
          ->where('sales.finish', '=', 'planner' )
          ->where('sales.planning_bom', '=', null);

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
          ->make();
        }
    }

    public function oldjob()
    {
      $sales=Sales::all();
      return view('frontend.plan.oldjob')->with('sales',$sales);
    }

    public function oldjobtable()
    {
      if (access()->hasPermissions(['planning']))
      {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->select(['sales.sco_number','sales.wid', 'sales.workorder','sales.custName', 'items.partNo', 'items.quantity', 'sales.deliverDate','sales.purchaseOrder', 'sales.salesorder' ,'sales.rev', 'sales.id','sales.created_at'])
          ->where('sales.finish', '=', 'complete' )
          ->where('sales.planning_bom', '=', 'Y');

          return Datatables::of($sales)
          ->editColumn('deliverDate', function ($date) {
                    return $date->deliverDate ? with(new Carbon($date->deliverDate))->format('d/m/Y') : '';
                })
            ->editColumn('id', function ($sales) {
                      return '<a href="'. route('frontend.plan.edit', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Release BOM"></i></a>
                      ';
                  })
          ->editColumn('created_at', function ($date) {
                    return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
                })
          ->order(function ($sales) {
                       $sales->orderBy('created_at', 'desc');
                   })
          ->escapeColumns([])
          ->make();
        }
        else {
          $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
          ->select(['sales.sco_number','sales.wid','sales.custName', 'items.partNo' , 'items.partDesc','items.partDesc2', 'sales.id','sales.created_at'])
          ->where('sales.finish', '=', 'complete' )
          ->where('sales.planning_bom', '=', 'Y');

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
          ->make();
        }
    }

    public function newmanualso()
    {
      $sales=Sales::all();
      $manual = Manual::all();
      return view('frontend.plan.newmanualso')->with('sales',$sales)->with('manual',$manual);
    }

    public function addmanual($id)
    {
      $manual = Manual::find($id);
      return view('frontend.plan.addmanual')
      ->with('manual',$manual);
    }

    public function storemanual($id, Request $request)
    {
      $manual = Manual::find($id);
      $manual->manual_wo = $request->input('manual_wo');
      $manual->manual_wid = $request->input('manual_wid');
      $manual->status = 'complete';
      $manual->save();

      return redirect()->route('frontend.plan.histmanualso')->withFlashSuccess('The data is  saved.');
    }

    public function newmanualtable()
    {
      if (access()->hasPermissions(['planning']))
      {
          $manual = Manual::select(['manual_wid', 'manual_wo','part_no','child_part', 'soqty' , 'keepqty','manualstock','duedate','custpo' ,'sono', 'paper', 'status', 'id'])
          ->where('status', '=', 'plan' )
          ;

          return Datatables::of($manual)
            ->editColumn('id', function ($manual) {
                      return '<a href="'. route('frontend.plan.addmanual', $manual->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Release BOM"></i></a>
                      ';
                  })
          ->editColumn('duedate', function ($date) {
                    return $date->duedate ? with(new Carbon($date->duedate))->format('d/m/Y') : '';
                })

          ->escapeColumns([])
          ->make();
        }
        else {
          $manual = Manual::select(['manual_wid', 'manual_wo','part_no','child_part', 'soqty' , 'keepqty','manualstock','duedate','custpo' ,'sono', 'paper', 'status','id'])
          ->where('status', '=', 'plan' )
          ;

          return Datatables::of($manual)
            ->editColumn('id', function ($manual) {
                      return '
                      ';
                  })
          ->editColumn('duedate', function ($date) {
                    return $date->duedate ? with(new Carbon($date->duedate))->format('d/m/Y') : '';
                })

          ->escapeColumns([])
          ->make();
        }
    }

    public function confirmmanualso($id)
    {
      $manual = Manual::find($id);
      $manual->status = 'complete';
      $manual->save();
      return redirect()->route('frontend.plan.histmanualso')->withFlashSuccess('The stock had been created.');
    }

    public function histmanualso()
    {
      $sales=Sales::all();
      $manual = Manual::all();
      return view('frontend.plan.histmanualso')->with('sales',$sales)->with('manual',$manual);
    }

    public function histmanualtable()
    {
      if (access()->hasPermissions(['planning']))
      {
        $manual = Manual::select(['manual_wid', 'manual_wo','part_no','child_part', 'soqty' , 'keepqty','manualstock','duedate','custpo' ,'sono', 'paper', 'status', 'id'])
        ->where('status', '=', 'complete' )
        ;

        return Datatables::of($manual)
          ->editColumn('id', function ($manual) {
                    return '
                    ';
                })
        ->editColumn('duedate', function ($date) {
                  return $date->duedate ? with(new Carbon($date->duedate))->format('d/m/Y') : '';
              })

        ->escapeColumns([])
        ->make();
        }
        else {
          $manual = Manual::select(['manual_wid', 'manual_wo','part_no', 'soqty' , 'keepqty','manualstock', 'duedate','sono', 'paper'])
          ->where('status', '=', 'complete' )
          ;

          return Datatables::of($manual)
            ->editColumn('id', function ($manual) {
                      return '
                      ';
                  })
          ->editColumn('duedate', function ($date) {
                    return $date->duedate ? with(new Carbon($date->duedate))->format('d/m/Y') : '';
                })

          ->escapeColumns([])
          ->make();
        }
    }

    public function edit($id)
    {
        $sales=Sales::find($id);
        $prodstruct = Prodstruct::all();
        $change = Change::where('sales_id', $sales->id)->first();
        return view('frontend.plan.edit')->with('sales', $sales)->with('prodstruct', $prodstruct)->with('change',$change);
    }

    public function update($id, Request $request)
    {
            $sales = Sales::find($id);

            $salesqad = Salesqad::where('salesline', $sales->salesline)->first();
            $salesqad->wid = $request->input('wid');
            $salesqad->save();

            $sales->workorder = $request->input('workorder');
            $sales->wid = $request->input('wid');

            $workorder = Workorder::where('sales_id', $sales->id)->first();
            $workorder->wo_number = $request->input('workorder');
            $workorder->wid = $request->input('wid');
            $workorder->save();

            $prodstruct = Prodstruct::where('items_number', $sales->items->partNo)->first();
              if(!empty($prodstruct))
              {
                $sales->finish = 'complete';
                $sales->planning_bom = 'Y';
                $sales->save();



                return redirect()->route('frontend.plan.oldjob')->withFlashSuccess('The BOM is confirmed.');
              }
              else
              {
                return redirect()->route('frontend.plan.index')->withFlashDanger('The BOM do not exist.');
              }
    }


   public function paf()
   {
     $product=Product::all();
     return view('frontend.plan.paf')->with('product', $product);
   }

   public function pafform($id)
   {
       $product = Product::find($id);
       $prodedit = Prodedit::where('products_id', $product->id)->first();
       $items = Item::find($product->items_id);
       $sales = Sales::where('items_id', $items->id)->first();
       // show the edit form and pass the sales
       return view('frontend.plan.pafform')->with('product', $product)->with('sales', $sales)->with('prodedit', $prodedit);
   }

   public function jobconfirmstore($id, Request $request)
   {
     $product = Product::find($id);
     $product->done = 'complete';
     $product->save();

     return redirect()->route('frontend.plan.pafconfirm')->withFlashSuccess('The job is done');
   }

   public function pafTable()
   {

     $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
                         ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
                         ->select(['products.paf_number','sales.wid', 'sales.workorder','sales.custName', 'items.partNo', 'items.quantity', 'sales.deliverDate','sales.purchaseOrder', 'sales.salesorder' ,'products.rev', 'products.id' ])
                         ->where('products.done', '=', 'planner')
                         ;

     return Datatables::of($product)
             ->editColumn('id', function ($product) {

               $prod = Product::find($product->id);
               $sales = Sales::where('sco_number', $prod->sco_number)->first();

               return '<a href="'. route('frontend.plan.pafform', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Edit PAF"></i></a>
               ';
         })
         ->escapeColumns([])
         ->make();
   }

   public function pafconfirm()
   {
     $product=Product::all();
     return view('frontend.plan.pafconfirm')->with('product', $product);
   }

   public function pafTable2()
   {
     $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
                         ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
                         ->select(['products.paf_number','sales.wid', 'sales.workorder','sales.custName', 'items.partNo', 'items.quantity', 'sales.deliverDate','sales.purchaseOrder', 'sales.salesorder' ,'products.rev', 'products.id' ])
                         ->where('products.done', '=', 'complete')
                         ;

     return Datatables::of($product)
             ->editColumn('id', function ($product) {

               $prod = Product::find($product->id);
               $sales = Sales::where('sco_number', $prod->sco_number)->first();

               return '
               <a href="'. route('frontend.plan.pafform', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Edit PAF"></i></a>
               ';
         })
         ->escapeColumns([])
         ->make();
   }

   public function sample()
   {
     $requisite = Requisite::all();
     return view('frontend.plan.sample')->with('requisites',$requisite);
   }

   public function sroconfirm()
   {
     $requisite = Requisite::all();
     return view('frontend.plan.sroconfirm')->with('requisites',$requisite);
   }

   public function requisition()
   {
     $requisite = Requisite::select(['SRO_number','customerName', 'partNumberSRO', 'partDescSRO','partDesc2SRO','revSRO','confirm', 'id'])
     ;
     // ->where('confirm', '=', 'Pending');

     return Datatables::of($requisite)
     ->escapeColumns([])
     ->editColumn('id', function ($requisite) {
       return '
       <a href="'. route('frontend.plan.viewreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="Edit"></i></a>
       ';

     })
     ->order(function ($requisite) {
                     $requisite->orderBy('created_at', 'desc');
                 })
     ->make();
   }

   public function requisition2()
   {
     $requisite = Requisite::select(['customerName', 'partNumberSRO', 'partDescSRO','partDesc2SRO','revSRO','confirm', 'id'])
     ->where('confirm', '=', 'Complete');

     return Datatables::of($requisite)
     ->escapeColumns([])
     ->editColumn('id', function ($requisite) {
       //return $sales->action_buttons;
       if ($requisite->confirm == 'Complete')
       {
       return '
       <a href="'. route('frontend.plan.viewreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="Edit"></i></a>
       ';
     }
     else
     {
       return '
       <a href="'. route('frontend.plan.viewreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="Edit"></i></a>
       <a href="'. route('frontend.plan.confirmreq', $requisite->id) . '" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-ok" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
       ';
     }
     })
     ->order(function ($requisite) {
                     $requisite->orderBy('created_at', 'desc');
                 })
     ->make();
   }

    public function confirmreq ($id)
   {
     $requisite = Requisite::find($id);
     $process = Process::where('requisites_id', $requisite->id)->get();

     foreach($process as $p)
     {
       $get[] = $p->other_sub .'='. $p->other_data;
     }
     $links = implode(',', $get);
     $sales = new Sales;
     $latestsales = Sales::orderBy('created_at', 'desc')->first();
     if ($latestsales === null){
         $sales->sco_number = 'SC-' . Carbon::now()->format('y') . '-00001';
     }
     else{
         $number = (int) substr($latestsales->sco_number,-5,5);
         $number ++;
         $sales->sco_number = 'SC-' . Carbon::now()->format('y') .'-'.str_pad($number,5,'0',STR_PAD_LEFT );
     }
     $sales->datetime = $requisite->dateSRO;
     $sales->custName = $requisite->customerName;
     $sales->purchaseOrder = '';
     $sales->workorder = '';
     $sales->wid = '';
     $sales->salesorder = $requisite->salesorder;
     $sales->line = $requisite->line;
     $sales->salesline = $requisite->salesline;
     $sales->deliverDate = null ;


     // $sales->status = 'Planning Dept';
     $sales->approval = null;
     $sales->confirmBy = '';
     $sales->sro_number = $requisite->SRO_number;
     $sales->finish = 'N';

     $sales->save();

     $items= new Item;
     $items->sales_id = $sales->id;
     $items->model = $requisite->modelSRO;
     $items->partDesc = $requisite->partDescSRO;
     $items->partDesc2 = $requisite->partDesc2SRO;
     $items->partNo = $requisite->partNumberSRO;
     $items->size = $requisite->sizeSRO;
     $items->quantity = $requisite->quantitySRO;
     $items->rawMaterial = $requisite->materialSRO;
     $items->noPages = '';
     $items->colour = '';
     $items->finishing = '';
     $items->remark = $requisite->remarksSRO.' '. $links;
     $items->lot =  '';
     $items->mfgDate =  '';
     $items->expiryDate =  '';
     $items->dateFacNo =  '';
     $items->packerID =  '';
     $items->save();

     $workorder = new Workorder;
     $workorder->sales_id = $sales->id;
     $workorder->wo_number = '';
     $workorder->wid = '';
     $workorder->due_date = '';
     $workorder->save();

     $sales->items_id = $items->id;
     $sales->workorders_id = $workorder->id;
     $sales->save();

     $requisite->confirm = 'Complete';
     $requisite->status = 'SC';
     $requisite->save();

     return redirect()->route('frontend.plan.sample')->withFlashSuccess('The SRO is confirmed and been transfered to SC. ');
   }

   public function repeat()
   {
     $sales = Sales::all();
     return view('frontend.plan.repeat')->with('sales',$sales);
   }

   public function repeatconfirm()
   {
     $sales = Sales::all();
     return view('frontend.plan.repeatconfirm')->with('sales',$sales);
   }

   public function repeats($id)
   {
     $sales = Sales::find($id);
     return view('frontend.plan.repeats')->with('sales',$sales);
   }

   public function updatebom($id, Request $request)
   {
      $sales = Sales::find($id);
      $sales->workorder =$request->input('workorder');
      $sales->wid = $request->input('wid');
      $sales->planning_bom = 'Y';
      $sales->repeatdone = 'complete';
      $sales->save();

      $workorder->wid = $request->input('wid');
      $workorder->wo_number =$request->input('workorder');
      $workorder->save();

      return redirect()->route('frontend.plan.repeatconfirm')->withFlashSuccess('The job is finished.');
   }

   public function repeattable1()
   {
     $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
     ->select(['sales.sco_number','sales.wid', 'sales.workorder','sales.custName', 'items.partNo', 'items.quantity', 'sales.deliverDate','sales.purchaseOrder', 'sales.salesorder' ,'sales.rev', 'sales.id','sales.created_at'])
     ->where('sales.repeatdone', '=', 'planner');

     return Datatables::of($sales)
     ->escapeColumns([])
     ->editColumn('id', function ($sales) {
       //return $sales->action_buttons;

       return '
       <a href="'. route('frontend.plan.repeats', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Finish job"></i></a>
       ';

     })
     ->order(function ($sales) {
                     $sales->orderBy('created_at', 'desc');
                 })
     ->make();
   }

   public function repeattable2()
   {
     $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
     ->select(['sales.sco_number','sales.wid', 'sales.workorder','sales.custName', 'items.partNo', 'items.quantity', 'sales.deliverDate','sales.purchaseOrder', 'sales.salesorder' ,'sales.rev', 'sales.id','sales.created_at'])
     ->where('sales.repeatdone', '=', 'complete');

     return Datatables::of($sales)
     ->escapeColumns([])
     ->editColumn('id', function ($sales) {
       //return $sales->action_buttons;

       return '
       <a href="'. route('frontend.plan.repeats', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="view"></i></a>
       ';

     })
     ->order(function ($sales) {
                     $sales->orderBy('created_at', 'desc');
                 })
     ->make();
   }

   public function viewreq($id)
   {
     $requisite = Requisite::find($id);
     $process = Process::where('requisites_id', $requisite->id)->get();
     return view('frontend.plan.viewreq')
     ->with('requisite', $requisite)
     ->with('process', $process);
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
                             ->select(['sales.custName','items.partNo','items.partDesc','items.partDesc2', 'sales.id' ])
                             ->where('sales.finish', '=', 'complete' );

         return Datatables::of($sales)
             ->editColumn('id', function ($sales) {
               return '<a href="'. route('frontend.plan.softCover', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-book" data-toggle="tooltip" title="View Soft Cover"></i> Soft Cover </a>

               ';
         })
         ->escapeColumns([])
         ->make();
   }

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
     $softcover->typeofformula = 'Soft Cover';
     $softcover->workorders_id = $sales->workorders_id;

     $softcover->half   = $request->input('half');
     $softcover->covOrderC   = $request->input('covOrderC');
     $softcover->t1OrderC   = $request->input('t1OrderC');
     $softcover->t2OrderC   = $request->input('t2OrderC');
     $softcover->t3OrderC   = $request->input('t3OrderC');
     $softcover->t4OrderC   = $request->input('t4OrderC');
     $softcover->t5OrderC   = $request->input('t5OrderC');
     $softcover->statOrderC   = $request->input('statOrderC');
     $softcover->covOrderB   = $request->input('covOrderB');
     $softcover->t1OrderB   = $request->input('t1OrderB');
     $softcover->t2OrderB   = $request->input('t2OrderB');
     $softcover->t3OrderB   = $request->input('t3OrderB');
     $softcover->t4OrderB   = $request->input('t4OrderB');
     $softcover->t5OrderB   = $request->input('t5OrderB');
     $softcover->statOrderB   = $request->input('statOrderB');

     $softcover->covUpC   = $request->input('covUpC');
     $softcover->t1UpC   = $request->input('t1UpC');
     $softcover->t2UpC   = $request->input('t2UpC');
     $softcover->t3UpC   = $request->input('t3UpC');
     $softcover->t4UpC   = $request->input('t4UpC');
     $softcover->t5UpC   = $request->input('t5UpC');
     $softcover->statUpC   = $request->input('statUpC');
     $softcover->covUpB   = $request->input('covUpB');
     $softcover->t1UpB   = $request->input('t1UpB');
     $softcover->t2UpB   = $request->input('t2UpB');
     $softcover->t3UpB   = $request->input('t3UpB');
     $softcover->t4UpB   = $request->input('t4UpB');
     $softcover->t5UpB   = $request->input('t5UpB');
     $softcover->statUpB   = $request->input('statUpB');

     $softcover->covSignC   = $request->input('covSignC');
     $softcover->t1signC   = $request->input('t1signC');
     $softcover->t2signC   = $request->input('t2signC');
     $softcover->t3signC   = $request->input('t3signC');
     $softcover->t4signC   = $request->input('t4signC');
     $softcover->t5signC   = $request->input('t5signC');
     $softcover->statSignC   = $request->input('statSignC');
     $softcover->covSignB   = $request->input('covSignB');
     $softcover->t1signB   = $request->input('t1signB');
     $softcover->t2signB   = $request->input('t2signB');
     $softcover->t3signB   = $request->input('t3signB');
     $softcover->t4signB   = $request->input('t4signB');
     $softcover->t5signB   = $request->input('t5signB');
     $softcover->statSignB   = $request->input('statSignB');

     $softcover->covFrontC   = $request->input('covFrontC');
     $softcover->t1FrontC   = $request->input('t1FrontC');
     $softcover->t2FrontC   = $request->input('t2FrontC');
     $softcover->t3FrontC   = $request->input('t3FrontC');
     $softcover->t4FrontC   = $request->input('t4FrontC');
     $softcover->t5FrontC   = $request->input('t5FrontC');
     $softcover->statFrontC   = $request->input('statFrontC');
     $softcover->covFrontB   = $request->input('covFrontB');
     $softcover->t1FrontB   = $request->input('t1FrontB');
     $softcover->t2FrontB   = $request->input('t2FrontB');
     $softcover->t3FrontB   = $request->input('t3FrontB');
     $softcover->t4FrontB   = $request->input('t4FrontB');
     $softcover->t5FrontB   = $request->input('t5FrontB');
     $softcover->statFrontB   = $request->input('statFrontB');

     $softcover->covBackC   = $request->input('covBackC');
     $softcover->t1BackC   = $request->input('t1BackC');
     $softcover->t2BackC   = $request->input('t2BackC');
     $softcover->t3BackC   = $request->input('t3BackC');
     $softcover->t4BackC   = $request->input('t4BackC');
     $softcover->t5BackC   = $request->input('t5BackC');
     $softcover->statBackC   = $request->input('statBackC');
     $softcover->covBackB   = $request->input('covBackB');
     $softcover->t1BackB   = $request->input('t1BackB');
     $softcover->t2BackB   = $request->input('t2BackB');
     $softcover->t3BackB   = $request->input('t3BackB');
     $softcover->t4BackB   = $request->input('t4BackB');
     $softcover->t5BackB   = $request->input('t5BackB');
     $softcover->statBackB   = $request->input('statBackB');

     $softcover->covSurfC   = $request->input('covSurfC');
     $softcover->t1SurfC   = $request->input('t1SurfC');
     $softcover->t2SurfC   = $request->input('t2SurfC');
     $softcover->t3SurfC   = $request->input('t3SurfC');
     $softcover->t4SurfC   = $request->input('t4SurfC');
     $softcover->t5SurfC   = $request->input('t5SurfC');
     $softcover->statSurfC   = $request->input('statSurfC');
     $softcover->covSurfB   = $request->input('covSurfB');
     $softcover->t1SurfB   = $request->input('t1SurfB');
     $softcover->t2SurfB   = $request->input('t2SurfB');
     $softcover->t3SurfB   = $request->input('t3SurfB');
     $softcover->t4SurfB   = $request->input('t4SurfB');
     $softcover->t5SurfB   = $request->input('t5SurfB');
     $softcover->statSurfB   = $request->input('statSurfB');

     $softcover->covTrimC   = $request->input('covTrimC');
     $softcover->t1TrimC   = $request->input('t1TrimC');
     $softcover->t2TrimC   = $request->input('t2TrimC');
     $softcover->t3TrimC   = $request->input('t3TrimC');
     $softcover->t4TrimC   = $request->input('t4TrimC');
     $softcover->t5TrimC   = $request->input('t5TrimC');
     $softcover->statTrimC   = $request->input('statTrimC');
     $softcover->covTrimB   = $request->input('covTrimB');
     $softcover->t1TrimB   = $request->input('t1TrimB');
     $softcover->t2TrimB   = $request->input('t2TrimB');
     $softcover->t3TrimB   = $request->input('t3TrimB');
     $softcover->t4TrimB   = $request->input('t4TrimB');
     $softcover->t5TrimB   = $request->input('t5TrimB');
     $softcover->statTrimB   = $request->input('statTrimB');

     $softcover->covDieC   = $request->input('covDieC');
     $softcover->t1DieC   = $request->input('t1DieC');
     $softcover->t2DieC   = $request->input('t2DieC');
     $softcover->t3DieC   = $request->input('t3DieC');
     $softcover->t4DieC   = $request->input('t4DieC');
     $softcover->t5DieC   = $request->input('t5DieC');
     $softcover->statDieC   = $request->input('statDieC');
     $softcover->covDieB   = $request->input('covDieB');
     $softcover->t1DieB   = $request->input('t1DieB');
     $softcover->t2DieB   = $request->input('t2DieB');
     $softcover->t3DieB   = $request->input('t3DieB');
     $softcover->t4DieB   = $request->input('t4DieB');
     $softcover->t5DieB   = $request->input('t5DieB');
     $softcover->statDieB   = $request->input('statDieB');

     $softcover->covStripC   = $request->input('covStripC');
     $softcover->t1StripC   = $request->input('t1StripC');
     $softcover->t2StripC   = $request->input('t2StripC');
     $softcover->t3stripC   = $request->input('t3stripC');
     $softcover->t4StripC   = $request->input('t4StripC');
     $softcover->t5stripC   = $request->input('t5stripC');
     $softcover->statStripC   = $request->input('statStripC');
     $softcover->covStripB   = $request->input('covStripB');
     $softcover->t1StripB   = $request->input('t1StripB');
     $softcover->t2StripB   = $request->input('t2StripB');
     $softcover->t3stripB   = $request->input('t3stripB');
     $softcover->t4StripB   = $request->input('t4StripB');
     $softcover->t5stripB   = $request->input('t5stripB');
     $softcover->statStripB   = $request->input('statStripB');

     $softcover->covFoldC   = $request->input('covFoldC');
     $softcover->t1FoldC   = $request->input('t1FoldC');
     $softcover->t2FoldC   = $request->input('t2FoldC');
     $softcover->t3FoldC   = $request->input('t3FoldC');
     $softcover->t4FoldC   = $request->input('t4FoldC');
     $softcover->t5FoldC   = $request->input('t5FoldC');
     $softcover->statFoldC   = $request->input('statFoldC');
     $softcover->covFoldB   = $request->input('covFoldB');
     $softcover->t1FoldB   = $request->input('t1FoldB');
     $softcover->t2FoldB   = $request->input('t2FoldB');
     $softcover->t3FoldB   = $request->input('t3FoldB');
     $softcover->t4FoldB   = $request->input('t4FoldB');
     $softcover->t5FoldB   = $request->input('t5FoldB');
     $softcover->statFoldB   = $request->input('statFoldB');

     $softcover->covSewC   = $request->input('covSewC');
     $softcover->t1SewC   = $request->input('t1SewC');
     $softcover->t2SewC   = $request->input('t2SewC');
     $softcover->t3SewC   = $request->input('t3SewC');
     $softcover->t4SewC   = $request->input('t4SewC');
     $softcover->t5SewC   = $request->input('t5SewC');
     $softcover->statSewC   = $request->input('statSewC');
     $softcover->covSewB   = $request->input('covSewB');
     $softcover->t1SewB   = $request->input('t1SewB');
     $softcover->t2SewB   = $request->input('t2SewB');
     $softcover->t3SewB   = $request->input('t3SewB');
     $softcover->t4SewB   = $request->input('t4SewB');
     $softcover->t5SewB   = $request->input('t5SewB');
     $softcover->statSewB   = $request->input('statSewB');

     $softcover->covBindC   = $request->input('covBindC');
     $softcover->t1BindC   = $request->input('t1BindC');
     $softcover->t2BindC   = $request->input('t2BindC');
     $softcover->t3BindC   = $request->input('t3BindC');
     $softcover->t4BindC   = $request->input('t4BindC');
     $softcover->t5BindC   = $request->input('t35indC');
     $softcover->statBindC   = $request->input('statBindC');
     $softcover->covBindB   = $request->input('covBindB');
     $softcover->t1BindB   = $request->input('t1BindB');
     $softcover->t2BindB   = $request->input('t2BindB');
     $softcover->t3BindB   = $request->input('t3BindB');
     $softcover->t4BindB   = $request->input('t4BindB');
     $softcover->t5BindB   = $request->input('t5BindB');
     $softcover->t3BindB   = $request->input('t3BindB');
     $softcover->statBindB   = $request->input('statBindB');

     $softcover->cov3C   = $request->input('cov3C');
     $softcover->t13C   = $request->input('t13C');
     $softcover->t23C   = $request->input('t23C');
     $softcover->t33C   = $request->input('t33C');
     $softcover->t43C   = $request->input('t43C');
     $softcover->t53C   = $request->input('t53C');
     $softcover->stat3C   = $request->input('stat3C');
     $softcover->cov3B   = $request->input('cov3B');
     $softcover->t13B   = $request->input('t13B');
     $softcover->t23B   = $request->input('t23B');
     $softcover->t33B   = $request->input('t33B');
     $softcover->t53B   = $request->input('t43B');
     $softcover->t53B   = $request->input('t53B');
     $softcover->stat3B   = $request->input('stat3B');

     $softcover->covPrintC  = $request->input('covPrintC');
     $softcover->t1PrintC  = $request->input('t1PrintC');
     $softcover->t2PrintC  = $request->input('t2PrintC');
     $softcover->t3PrintC  = $request->input('t3PrintC');
     $softcover->t4PrintC  = $request->input('t4PrintC');
     $softcover->t5PrintC  = $request->input('t5PrintC');
     $softcover->statPrintC  = $request->input('statPrintC');
     $softcover->covPrintB  = $request->input('covPrintB');
     $softcover->t1PrintB  = $request->input('t1PrintB');
     $softcover->t2PrintB  = $request->input('t2PrintB');
     $softcover->t3PrintB  = $request->input('t3PrintB');
     $softcover->t4PrintB  = $request->input('t4PrintB');
     $softcover->t5PrintB  = $request->input('t5PrintB');
     $softcover->statPrintB  = $request->input('statPrintB');

     $softcover->covSurfC1   = $request->input('covSurfC1');
     $softcover->t1SurfC1   = $request->input('t1SurfC1');
     $softcover->t2SurfC1   = $request->input('t2SurfC1');
     $softcover->t3SurfC1   = $request->input('t3SurfC1');
     $softcover->t4SurfC1   = $request->input('t4SurfC1');
     $softcover->t5SurfC1   = $request->input('t5SurfC1');
     $softcover->statSurfC1   = $request->input('statSurfC1');
     $softcover->covSurfB1   = $request->input('covSurfB1');
     $softcover->t1SurfB1  = $request->input('t1SurfB1');
     $softcover->t2SurfB1   = $request->input('t2SurfB1');
     $softcover->t3SurfB1   = $request->input('t3SurfB1');
     $softcover->t4SurfB1   = $request->input('t4SurfB1');
     $softcover->t5SurfB1   = $request->input('t5SurfB1');
     $softcover->statSurfB1   = $request->input('statSurfB1');

     $softcover->covTrimC1   = $request->input('covTrimC1');
     $softcover->t1TrimC1   = $request->input('t1TrimC1');
     $softcover->t2TrimC1   = $request->input('t2TrimC1');
     $softcover->t3TrimC1   = $request->input('t3TrimC1');
     $softcover->t4TrimC1   = $request->input('t4TrimC1');
     $softcover->t5TrimC1   = $request->input('t5TrimC1');
     $softcover->statTrimC1   = $request->input('statTrimC1');
     $softcover->covTrimB1   = $request->input('covTrimB1');
     $softcover->t1TrimB1   = $request->input('t1TrimB1');
     $softcover->t2TrimB1   = $request->input('t2TrimB1');
     $softcover->t3TrimB1   = $request->input('t3TrimB1');
     $softcover->t4TrimB1   = $request->input('t4TrimB1');
     $softcover->t5TrimB1   = $request->input('t5TrimB1');
     $softcover->statTrimB1   = $request->input('statTrimB1');

     $softcover->covDieC1   = $request->input('covDieC1');
     $softcover->t1DieC1   = $request->input('t1DieC1');
     $softcover->t2DieC1   = $request->input('t2DieC1');
     $softcover->t3DieC1   = $request->input('t3DieC1');
     $softcover->t4DieC1   = $request->input('t4DieC1');
     $softcover->t5DieC1   = $request->input('t5DieC1');
     $softcover->statDieC1   = $request->input('statDieC1');
     $softcover->covDieB1   = $request->input('covDieB1');
     $softcover->t1DieB1   = $request->input('t1DieB1');
     $softcover->t2DieB1   = $request->input('t2DieB1');
     $softcover->t3DieB1   = $request->input('t3DieB1');
     $softcover->t4DieB1   = $request->input('t4DieB1');
     $softcover->t5DieB1   = $request->input('t5DieB1');
     $softcover->statDieB1   = $request->input('statDieB1');

     $softcover->covStripC1   = $request->input('covStripC1');
     $softcover->t1StripC1   = $request->input('t1StripC1');
     $softcover->t2StripC1   = $request->input('t2StripC1');
     $softcover->t3stripC1   = $request->input('t3stripC1');
     $softcover->t4StripC1   = $request->input('t4StripC1');
     $softcover->t5stripC1   = $request->input('t5stripC1');
     $softcover->statStripC1   = $request->input('statStripC1');
     $softcover->covStripB1   = $request->input('covStripB1');
     $softcover->t1StripB1   = $request->input('t1StripB1');
     $softcover->t2StripB1   = $request->input('t2StripB1');
     $softcover->t3stripB1   = $request->input('t3stripB1');
     $softcover->t4StripB1   = $request->input('t4StripB1');
     $softcover->t5stripB1   = $request->input('t5stripB1');
     $softcover->statStripB1   = $request->input('statStripB1');

     $softcover->covFoldC1   = $request->input('covFoldC1');
     $softcover->t1FoldC1   = $request->input('t1FoldC1');
     $softcover->t2FoldC1   = $request->input('t2FoldC1');
     $softcover->t3FoldC1   = $request->input('t3FoldC1');
     $softcover->t4FoldC1   = $request->input('t4FoldC1');
     $softcover->t5FoldC1   = $request->input('t5FoldC1');
     $softcover->statFoldC1   = $request->input('statFoldC1');
     $softcover->covFoldB1   = $request->input('covFoldB1');
     $softcover->t1FoldB1   = $request->input('t1FoldB1');
     $softcover->t2FoldB1   = $request->input('t2FoldB1');
     $softcover->t3FoldB1   = $request->input('t3FoldB1');
     $softcover->t4FoldB1   = $request->input('t4FoldB1');
     $softcover->t5FoldB1   = $request->input('t5FoldB1');
     $softcover->statFoldB1   = $request->input('statFoldB1');

     $softcover->covSewC1   = $request->input('covSewC1');
     $softcover->t1SewC1   = $request->input('t1SewC1');
     $softcover->t2SewC1   = $request->input('t2SewC1');
     $softcover->t3SewC1   = $request->input('t3SewC1');
     $softcover->t4SewC1   = $request->input('t4SewC1');
     $softcover->t5SewC1   = $request->input('t5SewC1');
     $softcover->statSewC1   = $request->input('statSewC1');
     $softcover->covSewB1   = $request->input('covSewB1');
     $softcover->t1SewB1   = $request->input('t1SewB1');
     $softcover->t2SewB1   = $request->input('t2SewB1');
     $softcover->t3SewB1   = $request->input('t3SewB1');
     $softcover->t4SewB1   = $request->input('t4SewB1');
     $softcover->t5SewB1   = $request->input('t5SewB1');
     $softcover->statSewB1   = $request->input('statSewB1');

     $softcover->covBindC1   = $request->input('covBindC1');
     $softcover->t1BindC1   = $request->input('t1BindC1');
     $softcover->t2BindC1   = $request->input('t2BindC1');
     $softcover->t3BindC1   = $request->input('t3BindC1');
     $softcover->t4BindC1   = $request->input('t4BindC1');
     $softcover->t5BindC1   = $request->input('t5BindC1');
     $softcover->statBindC1   = $request->input('statBindC1');
     $softcover->covBindB1   = $request->input('covBindB1');
     $softcover->t1BindB1   = $request->input('t1BindB1');
     $softcover->t2BindB1   = $request->input('t2BindB1');
     $softcover->t3BindB1   = $request->input('t3BindB1');
     $softcover->t4BindB1   = $request->input('t4BindB1');
     $softcover->t5BindB1   = $request->input('t5BindB1');
     $softcover->statBindB1   = $request->input('statBindB1');

     $softcover->cov3C1   = $request->input('cov3C1');
     $softcover->t13C1   = $request->input('t13C1');
     $softcover->t23C1   = $request->input('t23C1');
     $softcover->t33C1   = $request->input('t33C1');
     $softcover->t43C1   = $request->input('t43C1');
     $softcover->t53C1   = $request->input('t53C1');
     $softcover->stat3C1   = $request->input('stat3C1');
     $softcover->cov3B1   = $request->input('cov3B1');
     $softcover->t13B1   = $request->input('t13B1');
     $softcover->t23B1   = $request->input('t23B1');
     $softcover->t33B1   = $request->input('t33B1');
     $softcover->t43B1   = $request->input('t43B1');
     $softcover->t53B1   = $request->input('t53B1');
     $softcover->stat3B1   = $request->input('stat3B1');

     $softcover->covPackC  = $request->input('covPackC');
     $softcover->t1PackC  = $request->input('t1PackC');
     $softcover->t2PackC  = $request->input('t2PackC');
     $softcover->t3PackC  = $request->input('t3PackC');
     $softcover->t4PackC  = $request->input('t4PackC');
     $softcover->t5PackC  = $request->input('t5PackC');
     $softcover->statPackC  = $request->input('statPackC');
     $softcover->covPackB  = $request->input('covPackB');
     $softcover->t1PackB  = $request->input('t1PackB');
     $softcover->t2PackB  = $request->input('t2PackB');
     $softcover->t3PackB  = $request->input('t3PackB');
     $softcover->t4PackB  = $request->input('t4PackB');
     $softcover->t5PackB  = $request->input('t5PackB');
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
     $softcover->ct4  = $request->input('ct4');
     $softcover->ct4ready = $request->input('ct4ready');
     $softcover->ct4waste  = $request->input('ct4waste');
     $softcover->bwt4  = $request->input('bwt4');
     $softcover->bwt4ready  = $request->input('bwt4ready');
     $softcover->bwt4waste  = $request->input('bwt42waste');
     $softcover->ct5  = $request->input('ct5');
     $softcover->ct5ready  = $request->input('ct5ready');
     $softcover->ct5waste  = $request->input('ct5waste');
     $softcover->bwt5  = $request->input('bwt5');
     $softcover->bwt5ready  = $request->input('bwt5ready');
     $softcover->bwt5waste  = $request->input('bwt5waste');
     $softcover->csticker  = $request->input('csticker');
     $softcover->cstickerready  = $request->input('cstickerready');
     $softcover->cstickerwaste  = $request->input('cstickerwaste');
     $softcover->bwsticker  = $request->input('bwsticker');
     $softcover->bwstickerready  = $request->input('bwstickerready');
     $softcover->bwstickerwaste  = $request->input('bwstickerwaste');
     $softcover->users_id = Auth::user()->id;

     $softcover->save();

     $workorder = Workorder::where('sales_id', $sales->id)->first();
     $wotype = new Wotype;
     $wotype->workorders_id = $workorder->id;
     $wotype->typeofformula = 'Soft Cover';
     $wotype->covertotalqty =$softcover->ccoverready + $softcover->bwcoverready;
     $wotype->text1totallqty = $softcover->ct1ready+$softcover->bwt1ready ;
     $wotype->text2totalqty = $softcover->ct2ready+$softcover->bwt2ready ;
     $wotype->text3totalqty = $softcover->ct3ready+$softcover->bwt3ready ;
     $wotype->text4totalqty = $softcover->ct4ready+$softcover->bwt4ready ;
     $wotype->text5totalqty = $softcover->ct5ready+$softcover->bwt5ready ;
     $wotype->sticker1totalqty = $softcover->cstickerready+$softcover->bwstickerready ;
     $wotype->covertotalpaper =$softcover->ccoverwaste + $softcover->bwcoverwaste;
     $wotype->text1totallpaper = $softcover->ct1waste+$softcover->bwt1waste ;
     $wotype->text2totalpaper = $softcover->ct2waste+$softcover->bwt2waste ;
     $wotype->text3totalpaper = $softcover->ct3waste+$softcover->bwt3waste ;
     $wotype->text4totalpaper = $softcover->ct4waste+$softcover->bwt4waste ;
     $wotype->text5totalpaper = $softcover->ct5waste+$softcover->bwt5waste ;
     $wotype->sticker1totalpaper = $softcover->cstickerwaste+$softcover->bwstickerwaste ;
     $wotype->save();

     // $workorder->wotypes_id = $wotype->id;
     $workorder->save();

     // redirect
     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
   }

   public function softcoveredit($id)
   {
     $softcover = Softcover::find($id);
     $sales = Sales::find($softcover->sales_id);
     return view('frontend.plan.softcoveredit')->with('sales', $sales)->with('softcover', $softcover);
   }

   public function softcoverupdate(Request $request, $id)
   {
     $sales = Sales::find($id);
     $softcover = Softcover::where('sales_id',$sales->id)->first();

     $softcover->half   = $request->input('half');
     $softcover->half   = $request->input('half');
     $softcover->covOrderC   = $request->input('covOrderC');
     $softcover->t1OrderC   = $request->input('t1OrderC');
     $softcover->t2OrderC   = $request->input('t2OrderC');
     $softcover->t3OrderC   = $request->input('t3OrderC');
     $softcover->t4OrderC   = $request->input('t4OrderC');
     $softcover->t5OrderC   = $request->input('t5OrderC');
     $softcover->statOrderC   = $request->input('statOrderC');
     $softcover->covOrderB   = $request->input('covOrderB');
     $softcover->t1OrderB   = $request->input('t1OrderB');
     $softcover->t2OrderB   = $request->input('t2OrderB');
     $softcover->t3OrderB   = $request->input('t3OrderB');
     $softcover->t4OrderB   = $request->input('t4OrderB');
     $softcover->t5OrderB   = $request->input('t5OrderB');
     $softcover->statOrderB   = $request->input('statOrderB');

     $softcover->covUpC   = $request->input('covUpC');
     $softcover->t1UpC   = $request->input('t1UpC');
     $softcover->t2UpC   = $request->input('t2UpC');
     $softcover->t3UpC   = $request->input('t3UpC');
     $softcover->t4UpC   = $request->input('t4UpC');
     $softcover->t5UpC   = $request->input('t5UpC');
     $softcover->statUpC   = $request->input('statUpC');
     $softcover->covUpB   = $request->input('covUpB');
     $softcover->t1UpB   = $request->input('t1UpB');
     $softcover->t2UpB   = $request->input('t2UpB');
     $softcover->t3UpB   = $request->input('t3UpB');
     $softcover->t4UpB   = $request->input('t4UpB');
     $softcover->t5UpB   = $request->input('t5UpB');
     $softcover->statUpB   = $request->input('statUpB');

     $softcover->covSignC   = $request->input('covSignC');
     $softcover->t1signC   = $request->input('t1signC');
     $softcover->t2signC   = $request->input('t2signC');
     $softcover->t3signC   = $request->input('t3signC');
     $softcover->t4signC   = $request->input('t4signC');
     $softcover->t5signC   = $request->input('t5signC');
     $softcover->statSignC   = $request->input('statSignC');
     $softcover->covSignB   = $request->input('covSignB');
     $softcover->t1signB   = $request->input('t1signB');
     $softcover->t2signB   = $request->input('t2signB');
     $softcover->t3signB   = $request->input('t3signB');
     $softcover->t4signB   = $request->input('t4signB');
     $softcover->t5signB   = $request->input('t5signB');
     $softcover->statSignB   = $request->input('statSignB');

     $softcover->covFrontC   = $request->input('covFrontC');
     $softcover->t1FrontC   = $request->input('t1FrontC');
     $softcover->t2FrontC   = $request->input('t2FrontC');
     $softcover->t3FrontC   = $request->input('t3FrontC');
     $softcover->t4FrontC   = $request->input('t4FrontC');
     $softcover->t5FrontC   = $request->input('t5FrontC');
     $softcover->statFrontC   = $request->input('statFrontC');
     $softcover->covFrontB   = $request->input('covFrontB');
     $softcover->t1FrontB   = $request->input('t1FrontB');
     $softcover->t2FrontB   = $request->input('t2FrontB');
     $softcover->t3FrontB   = $request->input('t3FrontB');
     $softcover->t4FrontB   = $request->input('t4FrontB');
     $softcover->t5FrontB   = $request->input('t5FrontB');
     $softcover->statFrontB   = $request->input('statFrontB');

     $softcover->covBackC   = $request->input('covBackC');
     $softcover->t1BackC   = $request->input('t1BackC');
     $softcover->t2BackC   = $request->input('t2BackC');
     $softcover->t3BackC   = $request->input('t3BackC');
     $softcover->t4BackC   = $request->input('t4BackC');
     $softcover->t5BackC   = $request->input('t5BackC');
     $softcover->statBackC   = $request->input('statBackC');
     $softcover->covBackB   = $request->input('covBackB');
     $softcover->t1BackB   = $request->input('t1BackB');
     $softcover->t2BackB   = $request->input('t2BackB');
     $softcover->t3BackB   = $request->input('t3BackB');
     $softcover->t4BackB   = $request->input('t4BackB');
     $softcover->t5BackB   = $request->input('t5BackB');
     $softcover->statBackB   = $request->input('statBackB');

     $softcover->covSurfC   = $request->input('covSurfC');
     $softcover->t1SurfC   = $request->input('t1SurfC');
     $softcover->t2SurfC   = $request->input('t2SurfC');
     $softcover->t3SurfC   = $request->input('t3SurfC');
     $softcover->t4SurfC   = $request->input('t4SurfC');
     $softcover->t5SurfC   = $request->input('t5SurfC');
     $softcover->statSurfC   = $request->input('statSurfC');
     $softcover->covSurfB   = $request->input('covSurfB');
     $softcover->t1SurfB   = $request->input('t1SurfB');
     $softcover->t2SurfB   = $request->input('t2SurfB');
     $softcover->t3SurfB   = $request->input('t3SurfB');
     $softcover->t4SurfB   = $request->input('t4SurfB');
     $softcover->t5SurfB   = $request->input('t5SurfB');
     $softcover->statSurfB   = $request->input('statSurfB');

     $softcover->covTrimC   = $request->input('covTrimC');
     $softcover->t1TrimC   = $request->input('t1TrimC');
     $softcover->t2TrimC   = $request->input('t2TrimC');
     $softcover->t3TrimC   = $request->input('t3TrimC');
     $softcover->t4TrimC   = $request->input('t4TrimC');
     $softcover->t5TrimC   = $request->input('t5TrimC');
     $softcover->statTrimC   = $request->input('statTrimC');
     $softcover->covTrimB   = $request->input('covTrimB');
     $softcover->t1TrimB   = $request->input('t1TrimB');
     $softcover->t2TrimB   = $request->input('t2TrimB');
     $softcover->t3TrimB   = $request->input('t3TrimB');
     $softcover->t4TrimB   = $request->input('t4TrimB');
     $softcover->t5TrimB   = $request->input('t5TrimB');
     $softcover->statTrimB   = $request->input('statTrimB');

     $softcover->covDieC   = $request->input('covDieC');
     $softcover->t1DieC   = $request->input('t1DieC');
     $softcover->t2DieC   = $request->input('t2DieC');
     $softcover->t3DieC   = $request->input('t3DieC');
     $softcover->t4DieC   = $request->input('t4DieC');
     $softcover->t5DieC   = $request->input('t5DieC');
     $softcover->statDieC   = $request->input('statDieC');
     $softcover->covDieB   = $request->input('covDieB');
     $softcover->t1DieB   = $request->input('t1DieB');
     $softcover->t2DieB   = $request->input('t2DieB');
     $softcover->t3DieB   = $request->input('t3DieB');
     $softcover->t4DieB   = $request->input('t4DieB');
     $softcover->t5DieB   = $request->input('t5DieB');
     $softcover->statDieB   = $request->input('statDieB');

     $softcover->covStripC   = $request->input('covStripC');
     $softcover->t1StripC   = $request->input('t1StripC');
     $softcover->t2StripC   = $request->input('t2StripC');
     $softcover->t3stripC   = $request->input('t3stripC');
     $softcover->t4StripC   = $request->input('t4StripC');
     $softcover->t5stripC   = $request->input('t5stripC');
     $softcover->statStripC   = $request->input('statStripC');
     $softcover->covStripB   = $request->input('covStripB');
     $softcover->t1StripB   = $request->input('t1StripB');
     $softcover->t2StripB   = $request->input('t2StripB');
     $softcover->t3stripB   = $request->input('t3stripB');
     $softcover->t4StripB   = $request->input('t4StripB');
     $softcover->t5stripB   = $request->input('t5stripB');
     $softcover->statStripB   = $request->input('statStripB');

     $softcover->covFoldC   = $request->input('covFoldC');
     $softcover->t1FoldC   = $request->input('t1FoldC');
     $softcover->t2FoldC   = $request->input('t2FoldC');
     $softcover->t3FoldC   = $request->input('t3FoldC');
     $softcover->t4FoldC   = $request->input('t4FoldC');
     $softcover->t5FoldC   = $request->input('t5FoldC');
     $softcover->statFoldC   = $request->input('statFoldC');
     $softcover->covFoldB   = $request->input('covFoldB');
     $softcover->t1FoldB   = $request->input('t1FoldB');
     $softcover->t2FoldB   = $request->input('t2FoldB');
     $softcover->t3FoldB   = $request->input('t3FoldB');
     $softcover->t4FoldB   = $request->input('t4FoldB');
     $softcover->t5FoldB   = $request->input('t5FoldB');
     $softcover->statFoldB   = $request->input('statFoldB');

     $softcover->covSewC   = $request->input('covSewC');
     $softcover->t1SewC   = $request->input('t1SewC');
     $softcover->t2SewC   = $request->input('t2SewC');
     $softcover->t3SewC   = $request->input('t3SewC');
     $softcover->t4SewC   = $request->input('t4SewC');
     $softcover->t5SewC   = $request->input('t5SewC');
     $softcover->statSewC   = $request->input('statSewC');
     $softcover->covSewB   = $request->input('covSewB');
     $softcover->t1SewB   = $request->input('t1SewB');
     $softcover->t2SewB   = $request->input('t2SewB');
     $softcover->t3SewB   = $request->input('t3SewB');
     $softcover->t4SewB   = $request->input('t4SewB');
     $softcover->t5SewB   = $request->input('t5SewB');
     $softcover->statSewB   = $request->input('statSewB');

     $softcover->covBindC   = $request->input('covBindC');
     $softcover->t1BindC   = $request->input('t1BindC');
     $softcover->t2BindC   = $request->input('t2BindC');
     $softcover->t3BindC   = $request->input('t3BindC');
     $softcover->t4BindC   = $request->input('t4BindC');
     $softcover->t5BindC   = $request->input('t35indC');
     $softcover->statBindC   = $request->input('statBindC');
     $softcover->covBindB   = $request->input('covBindB');
     $softcover->t1BindB   = $request->input('t1BindB');
     $softcover->t2BindB   = $request->input('t2BindB');
     $softcover->t3BindB   = $request->input('t3BindB');
     $softcover->t4BindB   = $request->input('t4BindB');
     $softcover->t5BindB   = $request->input('t5BindB');
     $softcover->t3BindB   = $request->input('t3BindB');
     $softcover->statBindB   = $request->input('statBindB');

     $softcover->cov3C   = $request->input('cov3C');
     $softcover->t13C   = $request->input('t13C');
     $softcover->t23C   = $request->input('t23C');
     $softcover->t33C   = $request->input('t33C');
     $softcover->t43C   = $request->input('t43C');
     $softcover->t53C   = $request->input('t53C');
     $softcover->stat3C   = $request->input('stat3C');
     $softcover->cov3B   = $request->input('cov3B');
     $softcover->t13B   = $request->input('t13B');
     $softcover->t23B   = $request->input('t23B');
     $softcover->t33B   = $request->input('t33B');
     $softcover->t53B   = $request->input('t43B');
     $softcover->t53B   = $request->input('t53B');
     $softcover->stat3B   = $request->input('stat3B');

     $softcover->covPrintC  = $request->input('covPrintC');
     $softcover->t1PrintC  = $request->input('t1PrintC');
     $softcover->t2PrintC  = $request->input('t2PrintC');
     $softcover->t3PrintC  = $request->input('t3PrintC');
     $softcover->t4PrintC  = $request->input('t4PrintC');
     $softcover->t5PrintC  = $request->input('t5PrintC');
     $softcover->statPrintC  = $request->input('statPrintC');
     $softcover->covPrintB  = $request->input('covPrintB');
     $softcover->t1PrintB  = $request->input('t1PrintB');
     $softcover->t2PrintB  = $request->input('t2PrintB');
     $softcover->t3PrintB  = $request->input('t3PrintB');
     $softcover->t4PrintB  = $request->input('t4PrintB');
     $softcover->t5PrintB  = $request->input('t5PrintB');
     $softcover->statPrintB  = $request->input('statPrintB');

     $softcover->covSurfC1   = $request->input('covSurfC1');
     $softcover->t1SurfC1   = $request->input('t1SurfC1');
     $softcover->t2SurfC1   = $request->input('t2SurfC1');
     $softcover->t3SurfC1   = $request->input('t3SurfC1');
     $softcover->t4SurfC1   = $request->input('t4SurfC1');
     $softcover->t5SurfC1   = $request->input('t5SurfC1');
     $softcover->statSurfC1   = $request->input('statSurfC1');
     $softcover->covSurfB1   = $request->input('covSurfB1');
     $softcover->t1SurfB1  = $request->input('t1SurfB1');
     $softcover->t2SurfB1   = $request->input('t2SurfB1');
     $softcover->t3SurfB1   = $request->input('t3SurfB1');
     $softcover->t4SurfB1   = $request->input('t4SurfB1');
     $softcover->t5SurfB1   = $request->input('t5SurfB1');
     $softcover->statSurfB1   = $request->input('statSurfB1');

     $softcover->covTrimC1   = $request->input('covTrimC1');
     $softcover->t1TrimC1   = $request->input('t1TrimC1');
     $softcover->t2TrimC1   = $request->input('t2TrimC1');
     $softcover->t3TrimC1   = $request->input('t3TrimC1');
     $softcover->t4TrimC1   = $request->input('t4TrimC1');
     $softcover->t5TrimC1   = $request->input('t5TrimC1');
     $softcover->statTrimC1   = $request->input('statTrimC1');
     $softcover->covTrimB1   = $request->input('covTrimB1');
     $softcover->t1TrimB1   = $request->input('t1TrimB1');
     $softcover->t2TrimB1   = $request->input('t2TrimB1');
     $softcover->t3TrimB1   = $request->input('t3TrimB1');
     $softcover->t4TrimB1   = $request->input('t4TrimB1');
     $softcover->t5TrimB1   = $request->input('t5TrimB1');
     $softcover->statTrimB1   = $request->input('statTrimB1');

     $softcover->covDieC1   = $request->input('covDieC1');
     $softcover->t1DieC1   = $request->input('t1DieC1');
     $softcover->t2DieC1   = $request->input('t2DieC1');
     $softcover->t3DieC1   = $request->input('t3DieC1');
     $softcover->t4DieC1   = $request->input('t4DieC1');
     $softcover->t5DieC1   = $request->input('t5DieC1');
     $softcover->statDieC1   = $request->input('statDieC1');
     $softcover->covDieB1   = $request->input('covDieB1');
     $softcover->t1DieB1   = $request->input('t1DieB1');
     $softcover->t2DieB1   = $request->input('t2DieB1');
     $softcover->t3DieB1   = $request->input('t3DieB1');
     $softcover->t4DieB1   = $request->input('t4DieB1');
     $softcover->t5DieB1   = $request->input('t5DieB1');
     $softcover->statDieB1   = $request->input('statDieB1');

     $softcover->covStripC1   = $request->input('covStripC1');
     $softcover->t1StripC1   = $request->input('t1StripC1');
     $softcover->t2StripC1   = $request->input('t2StripC1');
     $softcover->t3stripC1   = $request->input('t3stripC1');
     $softcover->t4StripC1   = $request->input('t4StripC1');
     $softcover->t5stripC1   = $request->input('t5stripC1');
     $softcover->statStripC1   = $request->input('statStripC1');
     $softcover->covStripB1   = $request->input('covStripB1');
     $softcover->t1StripB1   = $request->input('t1StripB1');
     $softcover->t2StripB1   = $request->input('t2StripB1');
     $softcover->t3stripB1   = $request->input('t3stripB1');
     $softcover->t4StripB1   = $request->input('t4StripB1');
     $softcover->t5stripB1   = $request->input('t5stripB1');
     $softcover->statStripB1   = $request->input('statStripB1');

     $softcover->covFoldC1   = $request->input('covFoldC1');
     $softcover->t1FoldC1   = $request->input('t1FoldC1');
     $softcover->t2FoldC1   = $request->input('t2FoldC1');
     $softcover->t3FoldC1   = $request->input('t3FoldC1');
     $softcover->t4FoldC1   = $request->input('t4FoldC1');
     $softcover->t5FoldC1   = $request->input('t5FoldC1');
     $softcover->statFoldC1   = $request->input('statFoldC1');
     $softcover->covFoldB1   = $request->input('covFoldB1');
     $softcover->t1FoldB1   = $request->input('t1FoldB1');
     $softcover->t2FoldB1   = $request->input('t2FoldB1');
     $softcover->t3FoldB1   = $request->input('t3FoldB1');
     $softcover->t4FoldB1   = $request->input('t4FoldB1');
     $softcover->t5FoldB1   = $request->input('t5FoldB1');
     $softcover->statFoldB1   = $request->input('statFoldB1');

     $softcover->covSewC1   = $request->input('covSewC1');
     $softcover->t1SewC1   = $request->input('t1SewC1');
     $softcover->t2SewC1   = $request->input('t2SewC1');
     $softcover->t3SewC1   = $request->input('t3SewC1');
     $softcover->t4SewC1   = $request->input('t4SewC1');
     $softcover->t5SewC1   = $request->input('t5SewC1');
     $softcover->statSewC1   = $request->input('statSewC1');
     $softcover->covSewB1   = $request->input('covSewB1');
     $softcover->t1SewB1   = $request->input('t1SewB1');
     $softcover->t2SewB1   = $request->input('t2SewB1');
     $softcover->t3SewB1   = $request->input('t3SewB1');
     $softcover->t4SewB1   = $request->input('t4SewB1');
     $softcover->t5SewB1   = $request->input('t5SewB1');
     $softcover->statSewB1   = $request->input('statSewB1');

     $softcover->covBindC1   = $request->input('covBindC1');
     $softcover->t1BindC1   = $request->input('t1BindC1');
     $softcover->t2BindC1   = $request->input('t2BindC1');
     $softcover->t3BindC1   = $request->input('t3BindC1');
     $softcover->t4BindC1   = $request->input('t4BindC1');
     $softcover->t5BindC1   = $request->input('t5BindC1');
     $softcover->statBindC1   = $request->input('statBindC1');
     $softcover->covBindB1   = $request->input('covBindB1');
     $softcover->t1BindB1   = $request->input('t1BindB1');
     $softcover->t2BindB1   = $request->input('t2BindB1');
     $softcover->t3BindB1   = $request->input('t3BindB1');
     $softcover->t4BindB1   = $request->input('t4BindB1');
     $softcover->t5BindB1   = $request->input('t5BindB1');
     $softcover->statBindB1   = $request->input('statBindB1');

     $softcover->cov3C1   = $request->input('cov3C1');
     $softcover->t13C1   = $request->input('t13C1');
     $softcover->t23C1   = $request->input('t23C1');
     $softcover->t33C1   = $request->input('t33C1');
     $softcover->t43C1   = $request->input('t43C1');
     $softcover->t53C1   = $request->input('t53C1');
     $softcover->stat3C1   = $request->input('stat3C1');
     $softcover->cov3B1   = $request->input('cov3B1');
     $softcover->t13B1   = $request->input('t13B1');
     $softcover->t23B1   = $request->input('t23B1');
     $softcover->t33B1   = $request->input('t33B1');
     $softcover->t43B1   = $request->input('t43B1');
     $softcover->t53B1   = $request->input('t53B1');
     $softcover->stat3B1   = $request->input('stat3B1');

     $softcover->covPackC  = $request->input('covPackC');
     $softcover->t1PackC  = $request->input('t1PackC');
     $softcover->t2PackC  = $request->input('t2PackC');
     $softcover->t3PackC  = $request->input('t3PackC');
     $softcover->t4PackC  = $request->input('t4PackC');
     $softcover->t5PackC  = $request->input('t5PackC');
     $softcover->statPackC  = $request->input('statPackC');
     $softcover->covPackB  = $request->input('covPackB');
     $softcover->t1PackB  = $request->input('t1PackB');
     $softcover->t2PackB  = $request->input('t2PackB');
     $softcover->t3PackB  = $request->input('t3PackB');
     $softcover->t4PackB  = $request->input('t4PackB');
     $softcover->t5PackB  = $request->input('t5PackB');
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
     $softcover->ct4  = $request->input('ct4');
     $softcover->ct4ready = $request->input('ct4ready');
     $softcover->ct4waste  = $request->input('ct4waste');
     $softcover->bwt4  = $request->input('bwt4');
     $softcover->bwt4ready  = $request->input('bwt4ready');
     $softcover->bwt4waste  = $request->input('bwt42waste');
     $softcover->ct5  = $request->input('ct5');
     $softcover->ct5ready  = $request->input('ct5ready');
     $softcover->ct5waste  = $request->input('ct5waste');
     $softcover->bwt5  = $request->input('bwt5');
     $softcover->bwt5ready  = $request->input('bwt5ready');
     $softcover->bwt5waste  = $request->input('bwt5waste');
     $softcover->csticker  = $request->input('csticker');
     $softcover->cstickerready  = $request->input('cstickerready');
     $softcover->cstickerwaste  = $request->input('cstickerwaste');
     $softcover->bwsticker  = $request->input('bwsticker');
     $softcover->bwstickerready  = $request->input('bwstickerready');
     $softcover->bwstickerwaste  = $request->input('bwstickerwaste');
     $softcover->users_id = Auth::user()->id;

     $softcover->save();

     $workorder = Workorder::where('sales_id', $sales->id)->first();
     $wotype = Wotype::where('typeofformula', '=', 'Soft Cover')->where('workorders_id', $workorder->id)->first();

     $wotype->covertotalqty =$softcover->ccoverready + $softcover->bwcoverready;
     $wotype->text1totallqty = $softcover->ct1ready+$softcover->bwt1ready ;
     $wotype->text2totalqty = $softcover->ct2ready+$softcover->bwt2ready ;
     $wotype->text3totalqty = $softcover->ct3ready+$softcover->bwt3ready ;
     $wotype->text4totalqty = $softcover->ct4ready+$softcover->bwt4ready ;
     $wotype->text5totalqty = $softcover->ct5ready+$softcover->bwt5ready ;
     $wotype->sticker1totalqty = $softcover->cstickerready+$softcover->bwstickerready ;
     $wotype->covertotalpaper =$softcover->ccoverwaste + $softcover->bwcoverwaste;
     $wotype->text1totallpaper = $softcover->ct1waste+$softcover->bwt1waste ;
     $wotype->text2totalpaper = $softcover->ct2waste+$softcover->bwt2waste ;
     $wotype->text3totalpaper = $softcover->ct3waste+$softcover->bwt3waste ;
     $wotype->text4totalpaper = $softcover->ct4waste+$softcover->bwt4waste ;
     $wotype->text5totalpaper = $softcover->ct5waste+$softcover->bwt5waste ;
     $wotype->sticker1totalpaper = $softcover->cstickerwaste+$softcover->bwstickerwaste ;
     $wotype->save();

     // redirect
     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
   }

   public function softCoverBW($id)
   {
     $sales = Sales::find($id);
     $softcoverbw = softCoverBW::where('sales_id', $sales->id)->first();
     return view('frontend.plan.softCoverBW')->with('sales', $sales)->with('softcoverbw', $softcoverbw);
   }

   public function softcoverbwStore(Request $request , $id)
   {
     $sales = Sales::find($id);
     $softcoverbw = Softcoverbw::where('sales_id',$sales->id)->first();
     $softcoverbw = new Softcoverbw;
     $softcoverbw->sales_id = $sales->id;
     $softcoverbw->typeofformula = 'Soft Cover BW';
     $softcoverbw->workorders_id = $sales->workorders_id;

     $softcoverbw->half   = $request->input('half');
     $softcoverbw->covOrderB   = $request->input('covOrderB');
     $softcoverbw->t1OrderB   = $request->input('t1OrderB');
     $softcoverbw->t2OrderB   = $request->input('t2OrderB');
     $softcoverbw->t3OrderB   = $request->input('t3OrderB');
     $softcoverbw->t4OrderB   = $request->input('t4OrderB');
     $softcoverbw->t5OrderB   = $request->input('t5OrderB');
     $softcoverbw->statOrderB   = $request->input('statOrderB');

     $softcoverbw->covUpB   = $request->input('covUpB');
     $softcoverbw->t1UpB   = $request->input('t1UpB');
     $softcoverbw->t2UpB   = $request->input('t2UpB');
     $softcoverbw->t3UpB   = $request->input('t3UpB');
     $softcoverbw->t4UpB   = $request->input('t4UpB');
     $softcoverbw->t5UpB   = $request->input('t5UpB');
     $softcoverbw->statUpB   = $request->input('statUpB');

     $softcoverbw->covSignB   = $request->input('covSignB');
     $softcoverbw->t1signB   = $request->input('t1signB');
     $softcoverbw->t2signB   = $request->input('t2signB');
     $softcoverbw->t3signB   = $request->input('t3signB');
     $softcoverbw->t4signB   = $request->input('t4signB');
     $softcoverbw->t5signB   = $request->input('t5signB');
     $softcoverbw->statSignB   = $request->input('statSignB');

     $softcoverbw->covFrontB   = $request->input('covFrontB');
     $softcoverbw->t1FrontB   = $request->input('t1FrontB');
     $softcoverbw->t2FrontB   = $request->input('t2FrontB');
     $softcoverbw->t3FrontB   = $request->input('t3FrontB');
     $softcoverbw->t4FrontB   = $request->input('t4FrontB');
     $softcoverbw->t5FrontB   = $request->input('t5FrontB');
     $softcoverbw->statFrontB   = $request->input('statFrontB');

     $softcoverbw->covBackB   = $request->input('covBackB');
     $softcoverbw->t1BackB   = $request->input('t1BackB');
     $softcoverbw->t2BackB   = $request->input('t2BackB');
     $softcoverbw->t3BackB   = $request->input('t3BackB');
     $softcoverbw->t4BackB   = $request->input('t4BackB');
     $softcoverbw->t5BackB   = $request->input('t5BackB');
     $softcoverbw->statBackB   = $request->input('statBackB');

     $softcoverbw->covSurfB   = $request->input('covSurfB');
     $softcoverbw->t1SurfB   = $request->input('t1SurfB');
     $softcoverbw->t2SurfB   = $request->input('t2SurfB');
     $softcoverbw->t3SurfB   = $request->input('t3SurfB');
     $softcoverbw->t4SurfB   = $request->input('t4SurfB');
     $softcoverbw->t5SurfB   = $request->input('t5SurfB');
     $softcoverbw->statSurfB   = $request->input('statSurfB');

     $softcoverbw->covTrimB   = $request->input('covTrimB');
     $softcoverbw->t1TrimB   = $request->input('t1TrimB');
     $softcoverbw->t2TrimB   = $request->input('t2TrimB');
     $softcoverbw->t3TrimB   = $request->input('t3TrimB');
     $softcoverbw->t4TrimB   = $request->input('t4TrimB');
     $softcoverbw->t5TrimB   = $request->input('t5TrimB');
     $softcoverbw->statTrimB   = $request->input('statTrimB');

     $softcoverbw->covDieB   = $request->input('covDieB');
     $softcoverbw->t1DieB   = $request->input('t1DieB');
     $softcoverbw->t2DieB   = $request->input('t2DieB');
     $softcoverbw->t3DieB   = $request->input('t3DieB');
     $softcoverbw->t4DieB   = $request->input('t4DieB');
     $softcoverbw->t5DieB   = $request->input('t5DieB');
     $softcoverbw->statDieB   = $request->input('statDieB');

     $softcoverbw->covStripB   = $request->input('covStripB');
     $softcoverbw->t1StripB   = $request->input('t1StripB');
     $softcoverbw->t2StripB   = $request->input('t2StripB');
     $softcoverbw->t3stripB   = $request->input('t3stripB');
     $softcoverbw->t4StripB   = $request->input('t4StripB');
     $softcoverbw->t5stripB   = $request->input('t5stripB');
     $softcoverbw->statStripB   = $request->input('statStripB');

     $softcoverbw->covFoldB   = $request->input('covFoldB');
     $softcoverbw->t1FoldB   = $request->input('t1FoldB');
     $softcoverbw->t2FoldB   = $request->input('t2FoldB');
     $softcoverbw->t3FoldB   = $request->input('t3FoldB');
     $softcoverbw->t4FoldB   = $request->input('t4FoldB');
     $softcoverbw->t5FoldB   = $request->input('t5FoldB');
     $softcoverbw->statFoldB   = $request->input('statFoldB');

     $softcoverbw->covSewB   = $request->input('covSewB');
     $softcoverbw->t1SewB   = $request->input('t1SewB');
     $softcoverbw->t2SewB   = $request->input('t2SewB');
     $softcoverbw->t3SewB   = $request->input('t3SewB');
     $softcoverbw->t4SewB   = $request->input('t4SewB');
     $softcoverbw->t5SewB   = $request->input('t5SewB');
     $softcoverbw->statSewB   = $request->input('statSewB');

     $softcoverbw->covBindB   = $request->input('covBindB');
     $softcoverbw->t1BindB   = $request->input('t1BindB');
     $softcoverbw->t2BindB   = $request->input('t2BindB');
     $softcoverbw->t3BindB   = $request->input('t3BindB');
     $softcoverbw->t4BindB   = $request->input('t4BindB');
     $softcoverbw->t5BindB   = $request->input('t5BindB');
     $softcoverbw->statBindB   = $request->input('statBindB');

     $softcoverbw->cov3B   = $request->input('cov3B');
     $softcoverbw->t13B   = $request->input('t13B');
     $softcoverbw->t23B   = $request->input('t23B');
     $softcoverbw->t33B   = $request->input('t33B');
     $softcoverbw->t43B   = $request->input('t43B');
     $softcoverbw->t53B   = $request->input('t53B');
     $softcoverbw->stat3B   = $request->input('stat3B');

     $softcoverbw->covPrintB  = $request->input('covPrintB');
     $softcoverbw->t1PrintB  = $request->input('t1PrintB');
     $softcoverbw->t2PrintB  = $request->input('t2PrintB');
     $softcoverbw->t3PrintB  = $request->input('t3PrintB');
     $softcoverbw->t4PrintB  = $request->input('t4PrintB');
     $softcoverbw->t5PrintB  = $request->input('t5PrintB');
     $softcoverbw->statPrintB  = $request->input('statPrintB');

     $softcoverbw->covSurfB1  = $request->input('covSurfB1');
     $softcoverbw->t1SurfB1   = $request->input('t1SurfB1');
     $softcoverbw->t2SurfB1   = $request->input('t2SurfB1');
     $softcoverbw->t3SurfB1   = $request->input('t3SurfB1');
     $softcoverbw->t4SurfB1   = $request->input('t4SurfB1');
     $softcoverbw->t5SurfB1   = $request->input('t5SurfB1');
     $softcoverbw->statSurfB1   = $request->input('statSurfB1');

     $softcoverbw->covTrimB1   = $request->input('covTrimB1');
     $softcoverbw->t1TrimB1   = $request->input('t1TrimB1');
     $softcoverbw->t2TrimB1   = $request->input('t2TrimB1');
     $softcoverbw->t3TrimB1   = $request->input('t3TrimB1');
     $softcoverbw->t4TrimB1   = $request->input('t4TrimB1');
     $softcoverbw->t5TrimB1   = $request->input('t5TrimB1');
     $softcoverbw->statTrimB1   = $request->input('statTrimB1');

     $softcoverbw->covDieB1   = $request->input('covDieB1');
     $softcoverbw->t1DieB1   = $request->input('t1DieB1');
     $softcoverbw->t2DieB1   = $request->input('t2DieB1');
     $softcoverbw->t3DieB1   = $request->input('t3DieB1');
     $softcoverbw->t4DieB1   = $request->input('t4DieB1');
     $softcoverbw->t5DieB1   = $request->input('t5DieB1');
     $softcoverbw->statDieB1   = $request->input('statDieB1');

     $softcoverbw->covStripB1   = $request->input('covStripB1');
     $softcoverbw->t1StripB1   = $request->input('t1StripB1');
     $softcoverbw->t2StripB1   = $request->input('t2StripB1');
     $softcoverbw->t3stripB1   = $request->input('t3stripB1');
     $softcoverbw->t4StripB1   = $request->input('t4StripB1');
     $softcoverbw->t5stripB1   = $request->input('t5stripB1');
     $softcoverbw->statStripB1   = $request->input('statStripB1');

     $softcoverbw->covFoldB1   = $request->input('covFoldB1');
     $softcoverbw->t1FoldB1   = $request->input('t1FoldB1');
     $softcoverbw->t2FoldB1   = $request->input('t2FoldB1');
     $softcoverbw->t3FoldB1   = $request->input('t3FoldB1');
     $softcoverbw->t4FoldB1   = $request->input('t4FoldB1');
     $softcoverbw->t5FoldB1   = $request->input('t5FoldB1');
     $softcoverbw->statFoldB1   = $request->input('statFoldB1');

     $softcoverbw->covSewB1   = $request->input('covSewB1');
     $softcoverbw->t1SewB1  = $request->input('t1SewB1');
     $softcoverbw->t2SewB1   = $request->input('t2SewB1');
     $softcoverbw->t3SewB1   = $request->input('t3SewB1');
     $softcoverbw->t4SewB1   = $request->input('t4SewB1');
     $softcoverbw->t5SewB1   = $request->input('t5SewB1');
     $softcoverbw->statSewB1   = $request->input('statSewB1');

     $softcoverbw->covBindB1   = $request->input('covBindB1');
     $softcoverbw->t1BindB1   = $request->input('t1BindB1');
     $softcoverbw->t2BindB1   = $request->input('t2BindB1');
     $softcoverbw->t3BindB1   = $request->input('t3BindB1');
     $softcoverbw->t4BindB1   = $request->input('t4BindB1');
     $softcoverbw->t5BindB1   = $request->input('t5BindB1');
     $softcoverbw->statBindB1   = $request->input('statBindB1');

     $softcoverbw->cov3B1   = $request->input('cov3B1');
     $softcoverbw->t13B1   = $request->input('t13B1');
     $softcoverbw->t23B1   = $request->input('t23B1');
     $softcoverbw->t33B1   = $request->input('t33B1');
     $softcoverbw->t43B1   = $request->input('t43B1');
     $softcoverbw->t53B1   = $request->input('t53B1');
     $softcoverbw->stat3B1   = $request->input('stat3B1');

     $softcoverbw->covPackB  = $request->input('covPackB');
     $softcoverbw->t1PackB = $request->input('t1PackB');
     $softcoverbw->t2PackB = $request->input('t2PackB');
     $softcoverbw->t3PackB  = $request->input('t3PackB');
     $softcoverbw->t4PackB = $request->input('t4PackB');
     $softcoverbw->t5PackB  = $request->input('t5PackB');
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

     $softcoverbw->bwt4  = $request->input('bwt4');
     $softcoverbw->bwt4ready  = $request->input('bwt4ready');
     $softcoverbw->bwt4waste  = $request->input('bwt4waste');

     $softcoverbw->bwt5  = $request->input('bwt5');
     $softcoverbw->bwt5ready  = $request->input('bwt5ready');
     $softcoverbw->bwt5waste  = $request->input('bwt5waste');

     $softcoverbw->bwsticker  = $request->input('bwsticker');
     $softcoverbw->bwstickerready  = $request->input('bwstickerready');
     $softcoverbw->bwstickerwaste  = $request->input('bwstickerwaste');
     $softcoverbw->users_id = Auth::user()->id;
     $softcoverbw->save();

     $workorder = Workorder::where('sales_id', $sales->id)->first();
     $wotype = new Wotype;
     $wotype->workorders_id = $workorder->id;
     $wotype->typeofformula = 'Soft Cover BW';
     $wotype->covertotalqty =$softcoverbw->bwcoverready;
     $wotype->text1totallqty = $softcoverbw->bwt1ready ;
     $wotype->text2totalqty = $softcoverbw->bwt2ready ;
     $wotype->text3totalqty = $softcoverbw->bwt3ready ;
     $wotype->text4totalqty = $softcoverbw->bwt4ready ;
     $wotype->text5totalqty = $softcoverbw->bwt5ready ;
     $wotype->sticker1totalqty = $softcoverbw->bwstickerready ;
     $wotype->covertotalpaper = $softcoverbw->bwcoverwaste;
     $wotype->text1totallpaper = $softcoverbw->bwt1waste ;
     $wotype->text2totalpaper = $softcoverbw->bwt2waste ;
     $wotype->text3totalpaper = $softcoverbw->bwt3waste ;
     $wotype->text4totalpaper = $softcoverbw->bwt4waste ;
     $wotype->text5totalpaper = $softcoverbw->bwt5waste ;
     $wotype->sticker1totalpaper = $softcoverbw->bwstickerwaste ;
     $wotype->save();

     // $workorder->wotypes_id = $wotype->id;
     $workorder->save();

     // redirect
     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
   }

   public function softcoverbwedit($id)
   {
     $softcoverbw = Softcoverbw::find($id);
     $sales = Sales::find($softcoverbw->sales_id);
     return view('frontend.plan.softcoverbwedit')->with('sales', $sales)->with('softcoverbw', $softcoverbw);
   }

   public function softcoverbwupdate(Request $request , $id)
   {
     $sales = Sales::find($id);
     $softcoverbw = Softcoverbw::where('sales_id',$sales->id)->first();

     $softcoverbw->half   = $request->input('half');
     $softcoverbw->covOrderB   = $request->input('covOrderB');
     $softcoverbw->t1OrderB   = $request->input('t1OrderB');
     $softcoverbw->t2OrderB   = $request->input('t2OrderB');
     $softcoverbw->t3OrderB   = $request->input('t3OrderB');
     $softcoverbw->t4OrderB   = $request->input('t4OrderB');
     $softcoverbw->t5OrderB   = $request->input('t5OrderB');
     $softcoverbw->statOrderB   = $request->input('statOrderB');

     $softcoverbw->covUpB   = $request->input('covUpB');
     $softcoverbw->t1UpB   = $request->input('t1UpB');
     $softcoverbw->t2UpB   = $request->input('t2UpB');
     $softcoverbw->t3UpB   = $request->input('t3UpB');
     $softcoverbw->t4UpB   = $request->input('t4UpB');
     $softcoverbw->t5UpB   = $request->input('t5UpB');
     $softcoverbw->statUpB   = $request->input('statUpB');

     $softcoverbw->covSignB   = $request->input('covSignB');
     $softcoverbw->t1signB   = $request->input('t1signB');
     $softcoverbw->t2signB   = $request->input('t2signB');
     $softcoverbw->t3signB   = $request->input('t3signB');
     $softcoverbw->t4signB   = $request->input('t4signB');
     $softcoverbw->t5signB   = $request->input('t5signB');
     $softcoverbw->statSignB   = $request->input('statSignB');

     $softcoverbw->covFrontB   = $request->input('covFrontB');
     $softcoverbw->t1FrontB   = $request->input('t1FrontB');
     $softcoverbw->t2FrontB   = $request->input('t2FrontB');
     $softcoverbw->t3FrontB   = $request->input('t3FrontB');
     $softcoverbw->t4FrontB   = $request->input('t4FrontB');
     $softcoverbw->t5FrontB   = $request->input('t5FrontB');
     $softcoverbw->statFrontB   = $request->input('statFrontB');

     $softcoverbw->covBackB   = $request->input('covBackB');
     $softcoverbw->t1BackB   = $request->input('t1BackB');
     $softcoverbw->t2BackB   = $request->input('t2BackB');
     $softcoverbw->t3BackB   = $request->input('t3BackB');
     $softcoverbw->t4BackB   = $request->input('t4BackB');
     $softcoverbw->t5BackB   = $request->input('t5BackB');
     $softcoverbw->statBackB   = $request->input('statBackB');

     $softcoverbw->covSurfB   = $request->input('covSurfB');
     $softcoverbw->t1SurfB   = $request->input('t1SurfB');
     $softcoverbw->t2SurfB   = $request->input('t2SurfB');
     $softcoverbw->t3SurfB   = $request->input('t3SurfB');
     $softcoverbw->t4SurfB   = $request->input('t4SurfB');
     $softcoverbw->t5SurfB   = $request->input('t5SurfB');
     $softcoverbw->statSurfB   = $request->input('statSurfB');

     $softcoverbw->covTrimB   = $request->input('covTrimB');
     $softcoverbw->t1TrimB   = $request->input('t1TrimB');
     $softcoverbw->t2TrimB   = $request->input('t2TrimB');
     $softcoverbw->t3TrimB   = $request->input('t3TrimB');
     $softcoverbw->t4TrimB   = $request->input('t4TrimB');
     $softcoverbw->t5TrimB   = $request->input('t5TrimB');
     $softcoverbw->statTrimB   = $request->input('statTrimB');

     $softcoverbw->covDieB   = $request->input('covDieB');
     $softcoverbw->t1DieB   = $request->input('t1DieB');
     $softcoverbw->t2DieB   = $request->input('t2DieB');
     $softcoverbw->t3DieB   = $request->input('t3DieB');
     $softcoverbw->t4DieB   = $request->input('t4DieB');
     $softcoverbw->t5DieB   = $request->input('t5DieB');
     $softcoverbw->statDieB   = $request->input('statDieB');

     $softcoverbw->covStripB   = $request->input('covStripB');
     $softcoverbw->t1StripB   = $request->input('t1StripB');
     $softcoverbw->t2StripB   = $request->input('t2StripB');
     $softcoverbw->t3stripB   = $request->input('t3stripB');
     $softcoverbw->t4StripB   = $request->input('t4StripB');
     $softcoverbw->t5stripB   = $request->input('t5stripB');
     $softcoverbw->statStripB   = $request->input('statStripB');

     $softcoverbw->covFoldB   = $request->input('covFoldB');
     $softcoverbw->t1FoldB   = $request->input('t1FoldB');
     $softcoverbw->t2FoldB   = $request->input('t2FoldB');
     $softcoverbw->t3FoldB   = $request->input('t3FoldB');
     $softcoverbw->t4FoldB   = $request->input('t4FoldB');
     $softcoverbw->t5FoldB   = $request->input('t5FoldB');
     $softcoverbw->statFoldB   = $request->input('statFoldB');

     $softcoverbw->covSewB   = $request->input('covSewB');
     $softcoverbw->t1SewB   = $request->input('t1SewB');
     $softcoverbw->t2SewB   = $request->input('t2SewB');
     $softcoverbw->t3SewB   = $request->input('t3SewB');
     $softcoverbw->t4SewB   = $request->input('t42SewB');
     $softcoverbw->t5SewB   = $request->input('t5SewB');
     $softcoverbw->statSewB   = $request->input('statSewB');

     $softcoverbw->covBindB   = $request->input('covBindB');
     $softcoverbw->t1BindB   = $request->input('t1BindB');
     $softcoverbw->t2BindB   = $request->input('t2BindB');
     $softcoverbw->t3BindB   = $request->input('t3BindB');
     $softcoverbw->t4BindB   = $request->input('t4BindB');
     $softcoverbw->t5BindB   = $request->input('t5BindB');
     $softcoverbw->statBindB   = $request->input('statBindB');

     $softcoverbw->cov3B   = $request->input('cov3B');
     $softcoverbw->t13B   = $request->input('t13B');
     $softcoverbw->t23B   = $request->input('t23B');
     $softcoverbw->t33B   = $request->input('t33B');
     $softcoverbw->t43B   = $request->input('t43B');
     $softcoverbw->t53B   = $request->input('t53B');
     $softcoverbw->stat3B   = $request->input('stat3B');

     $softcoverbw->covPrintB  = $request->input('covPrintB');
     $softcoverbw->t1PrintB  = $request->input('t1PrintB');
     $softcoverbw->t2PrintB  = $request->input('t2PrintB');
     $softcoverbw->t3PrintB  = $request->input('t3PrintB');
     $softcoverbw->t4PrintB  = $request->input('t4PrintB');
     $softcoverbw->t5PrintB  = $request->input('t5PrintB');
     $softcoverbw->statPrintB  = $request->input('statPrintB');

     $softcoverbw->covSurfB1  = $request->input('covSurfB1');
     $softcoverbw->t1SurfB1   = $request->input('t1SurfB1');
     $softcoverbw->t2SurfB1   = $request->input('t2SurfB1');
     $softcoverbw->t3SurfB1   = $request->input('t3SurfB1');
     $softcoverbw->t4SurfB1   = $request->input('t4SurfB1');
     $softcoverbw->t5SurfB1   = $request->input('t5SurfB1');
     $softcoverbw->statSurfB1   = $request->input('statSurfB1');

     $softcoverbw->covTrimB1   = $request->input('covTrimB1');
     $softcoverbw->t1TrimB1   = $request->input('t1TrimB1');
     $softcoverbw->t2TrimB1   = $request->input('t2TrimB1');
     $softcoverbw->t3TrimB1   = $request->input('t3TrimB1');
     $softcoverbw->t4TrimB1   = $request->input('t4TrimB1');
     $softcoverbw->t5TrimB1   = $request->input('t5TrimB1');
     $softcoverbw->statTrimB1   = $request->input('statTrimB1');

     $softcoverbw->covDieB1   = $request->input('covDieB1');
     $softcoverbw->t1DieB1   = $request->input('t1DieB1');
     $softcoverbw->t2DieB1   = $request->input('t2DieB1');
     $softcoverbw->t3DieB1   = $request->input('t3DieB1');
     $softcoverbw->t4DieB1   = $request->input('t4DieB1');
     $softcoverbw->t5DieB1   = $request->input('t5DieB1');
     $softcoverbw->statDieB1   = $request->input('statDieB1');

     $softcoverbw->covStripB1   = $request->input('covStripB1');
     $softcoverbw->t1StripB1   = $request->input('t1StripB1');
     $softcoverbw->t2StripB1   = $request->input('t2StripB1');
     $softcoverbw->t3stripB1   = $request->input('t3stripB1');
     $softcoverbw->t4StripB1   = $request->input('t4StripB1');
     $softcoverbw->t5stripB1   = $request->input('t5stripB1');
     $softcoverbw->statStripB1   = $request->input('statStripB1');

     $softcoverbw->covFoldB1   = $request->input('covFoldB1');
     $softcoverbw->t1FoldB1   = $request->input('t1FoldB1');
     $softcoverbw->t2FoldB1   = $request->input('t2FoldB1');
     $softcoverbw->t3FoldB1   = $request->input('t3FoldB1');
     $softcoverbw->t4FoldB1   = $request->input('t4FoldB1');
     $softcoverbw->t5FoldB1   = $request->input('t5FoldB1');
     $softcoverbw->statFoldB1   = $request->input('statFoldB1');

     $softcoverbw->covSewB1   = $request->input('covSewB1');
     $softcoverbw->t1SewB1  = $request->input('t1SewB1');
     $softcoverbw->t2SewB1   = $request->input('t2SewB1');
     $softcoverbw->t3SewB1   = $request->input('t3SewB1');
     $softcoverbw->t4SewB1   = $request->input('t4SewB1');
     $softcoverbw->t5SewB1   = $request->input('t5SewB1');
     $softcoverbw->statSewB1   = $request->input('statSewB1');

     $softcoverbw->covBindB1   = $request->input('covBindB1');
     $softcoverbw->t1BindB1   = $request->input('t1BindB1');
     $softcoverbw->t2BindB1   = $request->input('t2BindB1');
     $softcoverbw->t3BindB1   = $request->input('t3BindB1');
     $softcoverbw->t4BindB1   = $request->input('t4BindB1');
     $softcoverbw->t5BindB1   = $request->input('t5BindB1');
     $softcoverbw->statBindB1   = $request->input('statBindB1');

     $softcoverbw->cov3B1   = $request->input('cov3B1');
     $softcoverbw->t13B1   = $request->input('t13B1');
     $softcoverbw->t23B1   = $request->input('t23B1');
     $softcoverbw->t33B1   = $request->input('t33B1');
     $softcoverbw->t43B1   = $request->input('t43B1');
     $softcoverbw->t53B1   = $request->input('t53B1');
     $softcoverbw->stat3B1   = $request->input('stat3B1');

     $softcoverbw->covPackB  = $request->input('covPackB');
     $softcoverbw->t1PackB = $request->input('t1PackB');
     $softcoverbw->t2PackB = $request->input('t2PackB');
     $softcoverbw->t3PackB  = $request->input('t3PackB');
     $softcoverbw->t4PackB = $request->input('t4PackB');
     $softcoverbw->t5PackB  = $request->input('t5PackB');
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

     $softcoverbw->bwt2  = $request->input('bwt4');
     $softcoverbw->bwt2ready  = $request->input('bwt4ready');
     $softcoverbw->bwt2waste  = $request->input('bwt4waste');

     $softcoverbw->bwt3  = $request->input('bwt5');
     $softcoverbw->bwt3ready  = $request->input('bwt5ready');
     $softcoverbw->bwt3waste  = $request->input('bwt5waste');

     $softcoverbw->bwsticker  = $request->input('bwsticker');
     $softcoverbw->bwstickerready  = $request->input('bwstickerready');
     $softcoverbw->bwstickerwaste  = $request->input('bwstickerwaste');
     $softcoverbw->users_id = Auth::user()->id;

     $softcoverbw->save();

     $workorder = Workorder::where('sales_id', $sales->id)->first();
     $wotype = Wotype::where('typeofformula', '=' , 'Soft Cover BW')->where('workorders_id', $workorder->id)->first();
     $wotype->covertotalqty =$softcoverbw->bwcoverready;
     $wotype->text1totallqty = $softcoverbw->bwt1ready ;
     $wotype->text2totalqty = $softcoverbw->bwt2ready ;
     $wotype->text3totalqty = $softcoverbw->bwt3ready ;
     $wotype->text4totalqty = $softcoverbw->bwt4ready ;
     $wotype->text5totalqty = $softcoverbw->bwt5ready ;
     $wotype->sticker1totalqty = $softcoverbw->bwstickerready ;
     $wotype->covertotalpaper = $softcoverbw->bwcoverwaste;
     $wotype->text1totallpaper = $softcoverbw->bwt1waste ;
     $wotype->text2totalpaper = $softcoverbw->bwt2waste ;
     $wotype->text3totalpaper = $softcoverbw->bwt3waste ;
     $wotype->text4totalpaper = $softcoverbw->bwt4waste ;
     $wotype->text5totalpaper = $softcoverbw->bwt5waste ;
     $wotype->sticker1totalpaper = $softcoverbw->bwstickerwaste ;
     $wotype->save();

     // redirect
     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
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
     $overseaswt->typeofformula = 'Overseas WT';
     $overseaswt->workorders_id = $sales->workorders_id;

     $overseaswt->covOrderC  = $request->input('covOrderC');
     $overseaswt->t1OrderC  = $request->input('t1OrderC');
     $overseaswt->t2OrderC  = $request->input('t2OrderC');
     $overseaswt->t3OrderC  = $request->input('t3OrderC');
     $overseaswt->t4OrderC  = $request->input('t4OrderC');
     $overseaswt->t5OrderC  = $request->input('t5OrderC');
     $overseaswt->stat2OrderC  = $request->input('stat2OrderC');
     $overseaswt->flexi2OrderC  = $request->input('flexi2OrderC');
     $overseaswt->statOrderC  = $request->input('statOrderC');
     $overseaswt->flexiOrderC  = $request->input('flexiOrderC');

     $overseaswt->covUpC  = $request->input('covUpC');
     $overseaswt->t1UpC  = $request->input('t1UpC');
     $overseaswt->t2UpC  = $request->input('t2UpC');
     $overseaswt->t3UpC  = $request->input('t3UpC');
     $overseaswt->t4UpC  = $request->input('t4UpC');
     $overseaswt->t5UpC  = $request->input('t5UpC');
     $overseaswt->stat2UpC  = $request->input('stat2UpC');
     $overseaswt->flexi2UpC  = $request->input('flexi2UpC');
     $overseaswt->statUpC  = $request->input('statUpC');
     $overseaswt->flexiUpC  = $request->input('flexiUpC');

     $overseaswt->covSignC  = $request->input('covSignC');
     $overseaswt->t1signC  = $request->input('t1signC');
     $overseaswt->t2signC  = $request->input('t2signC');
     $overseaswt->t3signC  = $request->input('t3signC');
     $overseaswt->t4signC  = $request->input('t4signC');
     $overseaswt->t5signC  = $request->input('t5signC');
     $overseaswt->stat2SignC  = $request->input('stat2SignC');
     $overseaswt->flexi2SignC  = $request->input('flexi2SignC');
     $overseaswt->statSignC  = $request->input('statSignC');
     $overseaswt->flexiSignC  = $request->input('flexiSignC');

     $overseaswt->covFrontC  = $request->input('covFrontC');
     $overseaswt->t1FrontC  = $request->input('t1FrontC');
     $overseaswt->t2FrontC  = $request->input('t2FrontC');
     $overseaswt->t3FrontC  = $request->input('t3FrontC');
     $overseaswt->t4FrontC  = $request->input('t4FrontC');
     $overseaswt->t5FrontC  = $request->input('t5FrontC');
     $overseaswt->stat2FrontC  = $request->input('stat2FrontC');
     $overseaswt->flexi2FrontC  = $request->input('flexi2FrontC');
     $overseaswt->statFrontC  = $request->input('statFrontC');
     $overseaswt->flexiFrontC  = $request->input('flexiFrontC');

     $overseaswt->covBackC  = $request->input('covBackC');
     $overseaswt->t1BackC  = $request->input('t1BackC');
     $overseaswt->t2BackC  = $request->input('t2BackC');
     $overseaswt->t3BackC  = $request->input('t3BackC');
     $overseaswt->t4BackC  = $request->input('t4BackC');
     $overseaswt->t5BackC  = $request->input('t5BackC');
     $overseaswt->stat2BackC  = $request->input('stat2BackC');
     $overseaswt->flexi2BackC  = $request->input('flexi2BackC');
     $overseaswt->statBackC  = $request->input('statBackC');
     $overseaswt->flexiBackC  = $request->input('flexiBackC');

     $overseaswt->covSurfC  = $request->input('covSurfC');
     $overseaswt->t1SurfC  = $request->input('t1SurfC');
     $overseaswt->t2SurfC  = $request->input('t2SurfC');
     $overseaswt->t3SurfC  = $request->input('t3SurfC');
     $overseaswt->t4SurfC  = $request->input('t4SurfC');
     $overseaswt->t5SurfC  = $request->input('t5SurfC');
     $overseaswt->stat2SurfC  = $request->input('stat2SurfC');
     $overseaswt->flexi2SurfC  = $request->input('flexi2SurfC');
     $overseaswt->statSurfC  = $request->input('statSurfC');
     $overseaswt->flexiSurfC  = $request->input('flexiSurfC');

     $overseaswt->covTrimC  = $request->input('covTrimC');
     $overseaswt->t1TrimC  = $request->input('t1TrimC');
     $overseaswt->t2TrimC  = $request->input('t2TrimC');
     $overseaswt->t3TrimC  = $request->input('t3TrimC');
     $overseaswt->t4TrimC  = $request->input('t4TrimC');
     $overseaswt->t5TrimC  = $request->input('t5TrimC');
     $overseaswt->stat2TrimC  = $request->input('stat2TrimC');
     $overseaswt->flexi2TrimC  = $request->input('flexi2TrimC');
     $overseaswt->statTrimC  = $request->input('statTrimC');
     $overseaswt->flexiTrimC  = $request->input('flexiTrimC');

     $overseaswt->covDieC  = $request->input('covDieC');
     $overseaswt->t1DieC  = $request->input('t1DieC');
     $overseaswt->t2DieC  = $request->input('t2DieC');
     $overseaswt->t3DieC  = $request->input('t3DieC');
     $overseaswt->t4DieC  = $request->input('t4DieC');
     $overseaswt->t5DieC  = $request->input('t5DieC');
     $overseaswt->stat2DieC  = $request->input('stat2DieC');
     $overseaswt->flexi2DieC  = $request->input('flexi2DieC');
     $overseaswt->statDieC  = $request->input('statDieC');
     $overseaswt->flexiDieC  = $request->input('flexiDieC');

     $overseaswt->covStripC  = $request->input('covStripC');
     $overseaswt->t1StripC  = $request->input('t1StripC');
     $overseaswt->t2StripC  = $request->input('t2StripC');
     $overseaswt->t3stripC  = $request->input('t3stripC');
     $overseaswt->t4StripC  = $request->input('t4StripC');
     $overseaswt->t5stripC  = $request->input('t5stripC');
     $overseaswt->stat2StripC  = $request->input('stat2StripC');
     $overseaswt->flexi2StripC  = $request->input('flexi2StripC');
     $overseaswt->statStripC  = $request->input('statStripC');
     $overseaswt->flexiStripC  = $request->input('flexiStripC');

     $overseaswt->covFoldC  = $request->input('covFoldC');
     $overseaswt->t1FoldC  = $request->input('t1FoldC');
     $overseaswt->t2FoldC  = $request->input('t2FoldC');
     $overseaswt->t3FoldC  = $request->input('t3FoldC');
     $overseaswt->t4FoldC  = $request->input('t4FoldC');
     $overseaswt->t5FoldC  = $request->input('t5FoldC');
     $overseaswt->stat2FoldC  = $request->input('stat2FoldC');
     $overseaswt->flexi2FoldC  = $request->input('flexi2FoldC');
     $overseaswt->statFoldC  = $request->input('statFoldC');
     $overseaswt->flexiFoldC  = $request->input('flexiFoldC');

     $overseaswt->covSewC  = $request->input('covSewC');
     $overseaswt->t1SewC  = $request->input('t1SewC');
     $overseaswt->t2SewC  = $request->input('t2SewC');
     $overseaswt->t3SewC  = $request->input('t3SewC');
     $overseaswt->t4SewC  = $request->input('t4SewC');
     $overseaswt->t5SewC  = $request->input('t5SewC');
     $overseaswt->stat2SewC  = $request->input('stat2SewC');
     $overseaswt->flexi2SewC  = $request->input('flexi2SewC');
     $overseaswt->statSewC  = $request->input('statSewC');
     $overseaswt->flexiSewC  = $request->input('flexiSewC');

     $overseaswt->covBindC  = $request->input('covBindC');
     $overseaswt->t1BindC  = $request->input('t1BindC');
     $overseaswt->t2BindC  = $request->input('t2BindC');
     $overseaswt->t3BindC  = $request->input('t3BindC');
     $overseaswt->t4BindC  = $request->input('t4BindC');
     $overseaswt->t5BindC  = $request->input('t5BindC');
     $overseaswt->stat2BindC  = $request->input('stat2BindC');
     $overseaswt->flexi2BindC  = $request->input('flexi2BindC');
     $overseaswt->statBindC  = $request->input('statBindC');
     $overseaswt->flexiBindC  = $request->input('flexiBindC');

     $overseaswt->cov3C  = $request->input('cov3C');
     $overseaswt->t13C  = $request->input('t13C');
     $overseaswt->t23C  = $request->input('t23C');
     $overseaswt->t33C  = $request->input('t33C');
     $overseaswt->t43C  = $request->input('t43C');
     $overseaswt->t53C  = $request->input('t53C');
     $overseaswt->stat23C  = $request->input('stat23C');
     $overseaswt->flexi23C  = $request->input('flexi23C');
     $overseaswt->stat3C  = $request->input('stat3C');
     $overseaswt->flexi3C  = $request->input('flexi3C');

     $overseaswt->covPrintC1  = $request->input('covPrintC1');
     $overseaswt->t1PrintC1  = $request->input('t1PrintC1');
     $overseaswt->t2PrintC1  = $request->input('t2PrintC1');
     $overseaswt->t3PrintC1  = $request->input('t3PrintC1');
     $overseaswt->t4PrintC1  = $request->input('t4PrintC1');
     $overseaswt->t5PrintC1  = $request->input('t5PrintC1');
     $overseaswt->stat2PrintC1  = $request->input('stat2PrintC1');
     $overseaswt->flexi2PrintC1  = $request->input('flexi2PrintC1');
     $overseaswt->statPrintC1  = $request->input('statPrintC1');
     $overseaswt->flexiPrintC1  = $request->input('flexiPrintC1');

     $overseaswt->covSurfC1  = $request->input('covSurfC1');
     $overseaswt->t1SurfC1  = $request->input('t1SurfC1');
     $overseaswt->t2SurfC1  = $request->input('t2SurfC1');
     $overseaswt->t3SurfC1  = $request->input('t3SurfC1');
     $overseaswt->t4SurfC1  = $request->input('t4SurfC1');
     $overseaswt->t5SurfC1  = $request->input('t5SurfC1');
     $overseaswt->stat2SurfC1  = $request->input('stat2SurfC1');
     $overseaswt->flexi2SurfC1  = $request->input('flexi2SurfC1');
     $overseaswt->statSurfC1  = $request->input('statSurfC1');
     $overseaswt->flexiSurfC1  = $request->input('flexiSurfC1');

     $overseaswt->covTrimC1  = $request->input('covTrimC1');
     $overseaswt->t1TrimC1  = $request->input('t1TrimC1');
     $overseaswt->t2TrimC1  = $request->input('t2TrimC1');
     $overseaswt->t3TrimC1 = $request->input('t3TrimC1');
     $overseaswt->t4TrimC1  = $request->input('t4TrimC1');
     $overseaswt->t5TrimC1 = $request->input('t5TrimC1');
     $overseaswt->stat2TrimC1  = $request->input('stat2TrimC1');
     $overseaswt->flexi2TrimC1  = $request->input('flexi2TrimC1');
     $overseaswt->statTrimC1  = $request->input('statTrimC1');
     $overseaswt->flexiTrimC1  = $request->input('flexiTrimC1');

     $overseaswt->covDieC1  = $request->input('covDieC1');
     $overseaswt->t1DieC1  = $request->input('t1DieC1');
     $overseaswt->t2DieC1  = $request->input('t2DieC1');
     $overseaswt->t3DieC1  = $request->input('t3DieC1');
     $overseaswt->t4DieC1  = $request->input('t4DieC1');
     $overseaswt->t5DieC1  = $request->input('t5DieC1');
     $overseaswt->stat2DieC1  = $request->input('stat2DieC1');
     $overseaswt->flexi2DieC1  = $request->input('flexi2DieC1');
     $overseaswt->statDieC1  = $request->input('statDieC1');
     $overseaswt->flexiDieC1  = $request->input('flexiDieC1');

     $overseaswt->covStripC1  = $request->input('covStripC1');
     $overseaswt->t1StripC1  = $request->input('t1StripC1');
     $overseaswt->t2StripC1  = $request->input('t2StripC1');
     $overseaswt->t3stripC1  = $request->input('t3stripC1');
     $overseaswt->t4StripC1  = $request->input('t4StripC1');
     $overseaswt->t5stripC1  = $request->input('t5stripC1');
     $overseaswt->stat2StripC1  = $request->input('stat2StripC1');
     $overseaswt->flexi2StripC1  = $request->input('flexi2StripC1');
     $overseaswt->statStripC1  = $request->input('statStripC1');
     $overseaswt->flexiStripC1  = $request->input('flexiStripC1');

     $overseaswt->covFoldC1  = $request->input('covFoldC1');
     $overseaswt->t1FoldC1  = $request->input('t1FoldC1');
     $overseaswt->t2FoldC1  = $request->input('t2FoldC1');
     $overseaswt->t3FoldC1  = $request->input('t3FoldC1');
     $overseaswt->t4FoldC1  = $request->input('t4FoldC1');
     $overseaswt->t5FoldC1  = $request->input('t5FoldC1');
     $overseaswt->stat2FoldC1  = $request->input('stat2FoldC1');
     $overseaswt->flexi2FoldC1  = $request->input('flexi2FoldC1');
     $overseaswt->statFoldC1  = $request->input('statFoldC1');
     $overseaswt->flexiFoldC1  = $request->input('flexiFoldC1');

     $overseaswt->covSewC1  = $request->input('covSewC1');
     $overseaswt->t1SewC1  = $request->input('t1SewC1');
     $overseaswt->t2SewC1  = $request->input('t2SewC1');
     $overseaswt->t3SewC1  = $request->input('t3SewC1');
     $overseaswt->t4SewC1  = $request->input('t4SewC1');
     $overseaswt->t5SewC1  = $request->input('t5SewC1');
     $overseaswt->stat2SewC1  = $request->input('stat2SewC1');
     $overseaswt->flexi2SewC1  = $request->input('flexi2SewC1');
     $overseaswt->statSewC1  = $request->input('statSewC1');
     $overseaswt->flexiSewC1  = $request->input('flexiSewC1');

     $overseaswt->covBindC1  = $request->input('covBindC1');
     $overseaswt->t1BindC1  = $request->input('t1BindC1');
     $overseaswt->t2BindC1  = $request->input('t2BindC1');
     $overseaswt->t3BindC1  = $request->input('t3BindC1');
     $overseaswt->t4BindC1  = $request->input('t4BindC1');
     $overseaswt->t5BindC1  = $request->input('t5BindC1');
     $overseaswt->stat2BindC1  = $request->input('stat2BindC1');
     $overseaswt->flexi2BindC1  = $request->input('flexi2BindC1');
     $overseaswt->statBindC1  = $request->input('statBindC1');
     $overseaswt->flexiBindC1  = $request->input('flexiBindC1');

     $overseaswt->cov3C1  = $request->input('cov3C1');
     $overseaswt->t13C1  = $request->input('t13C1');
     $overseaswt->t23C1  = $request->input('t23C1');
     $overseaswt->t33C1  = $request->input('t33C1');
     $overseaswt->t43C1  = $request->input('t43C1');
     $overseaswt->t53C1  = $request->input('t53C1');
     $overseaswt->stat23C1  = $request->input('stat23C1');
     $overseaswt->flexi23C1  = $request->input('flexi23C1');
     $overseaswt->stat3C1  = $request->input('stat3C1');
     $overseaswt->flexi3C1  = $request->input('flexi3C1');

     $overseaswt->covPackC1  = $request->input('covPackC1');
     $overseaswt->t1PackC1  = $request->input('t1PackC1');
     $overseaswt->t2PackC1  = $request->input('t2PackC1');
     $overseaswt->t3PackC1  = $request->input('t3PackC1');
     $overseaswt->t4PackC1  = $request->input('t4PackC1');
     $overseaswt->t5PackC1  = $request->input('t5PackC1');
     $overseaswt->stat2PackC1  = $request->input('stat2PackC1');
     $overseaswt->flexi2PackC1  = $request->input('flexi2PackC1');
     $overseaswt->statPackC1  = $request->input('statPackC1');
     $overseaswt->flexiPackC1  = $request->input('flexiPackC1');

     $overseaswt->ccover  = $request->input('ccover');
     $overseaswt->ccoverready  = $request->input('ccoverready');
     $overseaswt->ccoverwaste  = $request->input('ccoverwaste');
     $overseaswt->flexicover  = $request->input('flexicover');
     $overseaswt->flexicoverready  = $request->input('flexicoverready');
     $overseaswt->flexicoverwaste  = $request->input('flexicoverwaste');
     $overseaswt->flexicover2  = $request->input('flexicover2');
     $overseaswt->flexicoverready2  = $request->input('flexicoverready2');
     $overseaswt->flexicoverwaste2  = $request->input('flexicoverwaste2');
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
     $overseaswt->ct4  = $request->input('ct4');
     $overseaswt->ct4ready  = $request->input('ct4ready');
     $overseaswt->ct4waste  = $request->input('ct4waste');
     $overseaswt->ct5  = $request->input('ct5');
     $overseaswt->ct5ready  = $request->input('ct5ready');
     $overseaswt->ct5waste  = $request->input('ct5waste');
     $overseaswt->csticker  = $request->input('csticker');
     $overseaswt->cstickerready  = $request->input('cstickerready');
     $overseaswt->cstickerwaste  = $request->input('cstickerwaste');
     $overseaswt->csticker2  = $request->input('csticker2');
     $overseaswt->cstickerready2  = $request->input('cstickerready2');
     $overseaswt->cstickerwaste2  = $request->input('cstickerwaste2');

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

     $overseaswt->colMakeFront1  = $request->input('colMakeFront1');
     $overseaswt->colMakeBack1  = $request->input('colMakeBack1');
     $overseaswt->colWaste1  = $request->input('colWaste1');

     $overseaswt->colMakeFront2  = $request->input('colMakeFront2');
     $overseaswt->colMakeBack2  = $request->input('colMakeBack2');
     $overseaswt->colWaste2  = $request->input('colWaste2');

    $overseaswt->colMakeFrontcovback  = $request->input('colMakeFrontcovback');

    $overseaswt->users_id = Auth::user()->id;
    $overseaswt->save();

    $workorder = Workorder::where('sales_id', $sales->id)->first();
    $wotype = new Wotype;
    $wotype->workorders_id = $workorder->id;
    $wotype->typeofformula = 'Overseas WT';
    $wotype->covertotalqty =$overseaswt->ccoverready;
    $wotype->text1totallqty = $overseaswt->ct1ready ;
    $wotype->text2totalqty = $overseaswt->ct2ready ;
    $wotype->text3totalqty = $overseaswt->ct3ready ;
    $wotype->text4totalqty = $overseaswt->ct4ready ;
    $wotype->text5totalqty = $overseaswt->ct5ready ;
    $wotype->sticker1totalqty = $overseaswt->cstickerready ;
    $wotype->sticker2totalqty = $overseaswt->cstickerready2 ;
    $wotype->flexi1totalqty = $overseaswt->flexicoverready ;
    $wotype->flexi2totalqty = $overseaswt->flexicoverready2 ;
    $wotype->covertotalpaper = $overseaswt->ccoverwaste;
    $wotype->text1totallpaper = $overseaswt->ct1waste ;
    $wotype->text2totalpaper = $overseaswt->ct2waste ;
    $wotype->text3totalpaper = $overseaswt->ct3waste ;
    $wotype->text4totalpaper = $overseaswt->ct4waste ;
    $wotype->text5totalpaper = $overseaswt->ct5waste ;
    $wotype->sticker1totalpaper = $overseaswt->cstickerwaste ;
    $wotype->sticker2totalpaper = $overseaswt->cstickerwaste2 ;
    $wotype->flexi2totalpaper = $overseaswt->flexicoverwaste2 ;
    $wotype->flexi1totalpaper = $overseaswt->flexicoverwaste ;
    $wotype->save();

    // $workorder->wotypes_id = $wotype->id;
    $workorder->save();

     // redirect
     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
   }

   public function softcoveroverseawtedit($id)
   {
     $overseaswt = Overseaswt::find($id);
     $sales = Sales::find($overseaswt->sales_id);
     return view('frontend.plan.softcoveroverseawtedit')->with('sales', $sales)->with('overseaswt', $overseaswt);
   }

   public function softcoveroverseawtupdate(Request $request ,$id )
   {

     $sales = Sales::find($id);
     $overseaswt = Overseaswt::where('sales_id',$sales->id)->first();

     $overseaswt->none1  = $request->input('none1');

     $overseaswt->covOrderC  = $request->input('covOrderC');
     $overseaswt->t1OrderC  = $request->input('t1OrderC');
     $overseaswt->t2OrderC  = $request->input('t2OrderC');
     $overseaswt->t3OrderC  = $request->input('t3OrderC');
     $overseaswt->t4OrderC  = $request->input('t4OrderC');
     $overseaswt->t5OrderC  = $request->input('t5OrderC');
     $overseaswt->stat2OrderC  = $request->input('stat2OrderC');
     $overseaswt->flexi2OrderC  = $request->input('flexi2OrderC');
     $overseaswt->statOrderC  = $request->input('statOrderC');
     $overseaswt->flexiOrderC  = $request->input('flexiOrderC');

     $overseaswt->covUpC  = $request->input('covUpC');
     $overseaswt->t1UpC  = $request->input('t1UpC');
     $overseaswt->t2UpC  = $request->input('t2UpC');
     $overseaswt->t3UpC  = $request->input('t3UpC');
     $overseaswt->t4UpC  = $request->input('t4UpC');
     $overseaswt->t5UpC  = $request->input('t5UpC');
     $overseaswt->stat2UpC  = $request->input('stat2UpC');
     $overseaswt->flexi2UpC  = $request->input('flexi2UpC');
     $overseaswt->statUpC  = $request->input('statUpC');
     $overseaswt->flexiUpC  = $request->input('flexiUpC');

     $overseaswt->covSignC  = $request->input('covSignC');
     $overseaswt->t1signC  = $request->input('t1signC');
     $overseaswt->t2signC  = $request->input('t2signC');
     $overseaswt->t3signC  = $request->input('t3signC');
     $overseaswt->t4signC  = $request->input('t4signC');
     $overseaswt->t5signC  = $request->input('t5signC');
     $overseaswt->stat2SignC  = $request->input('stat2SignC');
     $overseaswt->flexi2SignC  = $request->input('flexi2SignC');
     $overseaswt->statSignC  = $request->input('statSignC');
     $overseaswt->flexiSignC  = $request->input('flexiSignC');

     $overseaswt->covFrontC  = $request->input('covFrontC');
     $overseaswt->t1FrontC  = $request->input('t1FrontC');
     $overseaswt->t2FrontC  = $request->input('t2FrontC');
     $overseaswt->t3FrontC  = $request->input('t3FrontC');
     $overseaswt->t4FrontC  = $request->input('t4FrontC');
     $overseaswt->t5FrontC  = $request->input('t5FrontC');
     $overseaswt->stat2FrontC  = $request->input('stat2FrontC');
     $overseaswt->flexi2FrontC  = $request->input('flexi2FrontC');
     $overseaswt->statFrontC  = $request->input('statFrontC');
     $overseaswt->flexiFrontC  = $request->input('flexiFrontC');

     $overseaswt->covBackC  = $request->input('covBackC');
     $overseaswt->t1BackC  = $request->input('t1BackC');
     $overseaswt->t2BackC  = $request->input('t2BackC');
     $overseaswt->t3BackC  = $request->input('t3BackC');
     $overseaswt->t4BackC  = $request->input('t4BackC');
     $overseaswt->t5BackC  = $request->input('t5BackC');
     $overseaswt->stat2BackC  = $request->input('stat2BackC');
     $overseaswt->flexi2BackC  = $request->input('flexi2BackC');
     $overseaswt->statBackC  = $request->input('statBackC');
     $overseaswt->flexiBackC  = $request->input('flexiBackC');

     $overseaswt->covSurfC  = $request->input('covSurfC');
     $overseaswt->t1SurfC  = $request->input('t1SurfC');
     $overseaswt->t2SurfC  = $request->input('t2SurfC');
     $overseaswt->t3SurfC  = $request->input('t3SurfC');
     $overseaswt->t4SurfC  = $request->input('t4SurfC');
     $overseaswt->t5SurfC  = $request->input('t5SurfC');
     $overseaswt->stat2SurfC  = $request->input('stat2SurfC');
     $overseaswt->flexi2SurfC  = $request->input('flexi2SurfC');
     $overseaswt->statSurfC  = $request->input('statSurfC');
     $overseaswt->flexiSurfC  = $request->input('flexiSurfC');

     $overseaswt->covTrimC  = $request->input('covTrimC');
     $overseaswt->t1TrimC  = $request->input('t1TrimC');
     $overseaswt->t2TrimC  = $request->input('t2TrimC');
     $overseaswt->t3TrimC  = $request->input('t3TrimC');
     $overseaswt->t4TrimC  = $request->input('t4TrimC');
     $overseaswt->t5TrimC  = $request->input('t5TrimC');
     $overseaswt->stat2TrimC  = $request->input('stat2TrimC');
     $overseaswt->flexi2TrimC  = $request->input('flexi2TrimC');
     $overseaswt->statTrimC  = $request->input('statTrimC');
     $overseaswt->flexiTrimC  = $request->input('flexiTrimC');

     $overseaswt->covDieC  = $request->input('covDieC');
     $overseaswt->t1DieC  = $request->input('t1DieC');
     $overseaswt->t2DieC  = $request->input('t2DieC');
     $overseaswt->t3DieC  = $request->input('t3DieC');
     $overseaswt->t4DieC  = $request->input('t4DieC');
     $overseaswt->t5DieC  = $request->input('t5DieC');
     $overseaswt->stat2DieC  = $request->input('stat2DieC');
     $overseaswt->flexi2DieC  = $request->input('flexi2DieC');
     $overseaswt->statDieC  = $request->input('statDieC');
     $overseaswt->flexiDieC  = $request->input('flexiDieC');

     $overseaswt->covStripC  = $request->input('covStripC');
     $overseaswt->t1StripC  = $request->input('t1StripC');
     $overseaswt->t2StripC  = $request->input('t2StripC');
     $overseaswt->t3stripC  = $request->input('t3stripC');
     $overseaswt->t4StripC  = $request->input('t4StripC');
     $overseaswt->t5stripC  = $request->input('t5stripC');
     $overseaswt->stat2StripC  = $request->input('stat2StripC');
     $overseaswt->flexi2StripC  = $request->input('flexi2StripC');
     $overseaswt->statStripC  = $request->input('statStripC');
     $overseaswt->flexiStripC  = $request->input('flexiStripC');

     $overseaswt->covFoldC  = $request->input('covFoldC');
     $overseaswt->t1FoldC  = $request->input('t1FoldC');
     $overseaswt->t2FoldC  = $request->input('t2FoldC');
     $overseaswt->t3FoldC  = $request->input('t3FoldC');
     $overseaswt->t4FoldC  = $request->input('t4FoldC');
     $overseaswt->t5FoldC  = $request->input('t5FoldC');
     $overseaswt->stat2FoldC  = $request->input('stat2FoldC');
     $overseaswt->flexi2FoldC  = $request->input('flexi2FoldC');
     $overseaswt->statFoldC  = $request->input('statFoldC');
     $overseaswt->flexiFoldC  = $request->input('flexiFoldC');

     $overseaswt->covSewC  = $request->input('covSewC');
     $overseaswt->t1SewC  = $request->input('t1SewC');
     $overseaswt->t2SewC  = $request->input('t2SewC');
     $overseaswt->t3SewC  = $request->input('t3SewC');
     $overseaswt->t4SewC  = $request->input('t4SewC');
     $overseaswt->t5SewC  = $request->input('t5SewC');
     $overseaswt->stat2SewC  = $request->input('stat2SewC');
     $overseaswt->flexi2SewC  = $request->input('flexi2SewC');
     $overseaswt->statSewC  = $request->input('statSewC');
     $overseaswt->flexiSewC  = $request->input('flexiSewC');

     $overseaswt->covBindC  = $request->input('covBindC');
     $overseaswt->t1BindC  = $request->input('t1BindC');
     $overseaswt->t2BindC  = $request->input('t2BindC');
     $overseaswt->t3BindC  = $request->input('t3BindC');
     $overseaswt->t4BindC  = $request->input('t4BindC');
     $overseaswt->t5BindC  = $request->input('t5BindC');
     $overseaswt->stat2BindC  = $request->input('stat2BindC');
     $overseaswt->flexi2BindC  = $request->input('flexi2BindC');
     $overseaswt->statBindC  = $request->input('statBindC');
     $overseaswt->flexiBindC  = $request->input('flexiBindC');

     $overseaswt->cov3C  = $request->input('cov3C');
     $overseaswt->t13C  = $request->input('t13C');
     $overseaswt->t23C  = $request->input('t23C');
     $overseaswt->t33C  = $request->input('t33C');
     $overseaswt->t43C  = $request->input('t43C');
     $overseaswt->t53C  = $request->input('t53C');
     $overseaswt->stat23C  = $request->input('stat23C');
     $overseaswt->flexi23C  = $request->input('flexi23C');
     $overseaswt->stat3C  = $request->input('stat3C');
     $overseaswt->flexi3C  = $request->input('flexi3C');

     $overseaswt->covPrintC1  = $request->input('covPrintC1');
     $overseaswt->t1PrintC1  = $request->input('t1PrintC1');
     $overseaswt->t2PrintC1  = $request->input('t2PrintC1');
     $overseaswt->t3PrintC1  = $request->input('t3PrintC1');
     $overseaswt->t4PrintC1  = $request->input('t4PrintC1');
     $overseaswt->t5PrintC1  = $request->input('t5PrintC1');
     $overseaswt->stat2PrintC1  = $request->input('stat2PrintC1');
     $overseaswt->flexi2PrintC1  = $request->input('flexi2PrintC1');
     $overseaswt->statPrintC1  = $request->input('statPrintC1');
     $overseaswt->flexiPrintC1  = $request->input('flexiPrintC1');

     $overseaswt->covSurfC1  = $request->input('covSurfC1');
     $overseaswt->t1SurfC1  = $request->input('t1SurfC1');
     $overseaswt->t2SurfC1  = $request->input('t2SurfC1');
     $overseaswt->t3SurfC1  = $request->input('t3SurfC1');
     $overseaswt->t4SurfC1  = $request->input('t4SurfC1');
     $overseaswt->t5SurfC1  = $request->input('t5SurfC1');
     $overseaswt->stat2SurfC1  = $request->input('stat2SurfC1');
     $overseaswt->flexi2SurfC1  = $request->input('flexi2SurfC1');
     $overseaswt->statSurfC1  = $request->input('statSurfC1');
     $overseaswt->flexiSurfC1  = $request->input('flexiSurfC1');

     $overseaswt->covTrimC1  = $request->input('covTrimC1');
     $overseaswt->t1TrimC1  = $request->input('t1TrimC1');
     $overseaswt->t2TrimC1  = $request->input('t2TrimC1');
     $overseaswt->t3TrimC1 = $request->input('t3TrimC1');
     $overseaswt->t4TrimC1  = $request->input('t4TrimC1');
     $overseaswt->t5TrimC1 = $request->input('t5TrimC1');
     $overseaswt->stat2TrimC1  = $request->input('stat2TrimC1');
     $overseaswt->flexi2TrimC1  = $request->input('flexi2TrimC1');
     $overseaswt->statTrimC1  = $request->input('statTrimC1');
     $overseaswt->flexiTrimC1  = $request->input('flexiTrimC1');

     $overseaswt->covDieC1  = $request->input('covDieC1');
     $overseaswt->t1DieC1  = $request->input('t1DieC1');
     $overseaswt->t2DieC1  = $request->input('t2DieC1');
     $overseaswt->t3DieC1  = $request->input('t3DieC1');
     $overseaswt->t4DieC1  = $request->input('t4DieC1');
     $overseaswt->t5DieC1  = $request->input('t5DieC1');
     $overseaswt->stat2DieC1  = $request->input('stat2DieC1');
     $overseaswt->flexi2DieC1  = $request->input('flexi2DieC1');
     $overseaswt->statDieC1  = $request->input('statDieC1');
     $overseaswt->flexiDieC1  = $request->input('flexiDieC1');

     $overseaswt->covStripC1  = $request->input('covStripC1');
     $overseaswt->t1StripC1  = $request->input('t1StripC1');
     $overseaswt->t2StripC1  = $request->input('t2StripC1');
     $overseaswt->t3stripC1  = $request->input('t3stripC1');
     $overseaswt->t4StripC1  = $request->input('t4StripC1');
     $overseaswt->t5stripC1  = $request->input('t5stripC1');
     $overseaswt->stat2StripC1  = $request->input('stat2StripC1');
     $overseaswt->flexi2StripC1  = $request->input('flexi2StripC1');
     $overseaswt->statStripC1  = $request->input('statStripC1');
     $overseaswt->flexiStripC1  = $request->input('flexiStripC1');

     $overseaswt->covFoldC1  = $request->input('covFoldC1');
     $overseaswt->t1FoldC1  = $request->input('t1FoldC1');
     $overseaswt->t2FoldC1  = $request->input('t2FoldC1');
     $overseaswt->t3FoldC1  = $request->input('t3FoldC1');
     $overseaswt->t4FoldC1  = $request->input('t4FoldC1');
     $overseaswt->t5FoldC1  = $request->input('t5FoldC1');
     $overseaswt->stat2FoldC1  = $request->input('stat2FoldC1');
     $overseaswt->flexi2FoldC1  = $request->input('flexi2FoldC1');
     $overseaswt->statFoldC1  = $request->input('statFoldC1');
     $overseaswt->flexiFoldC1  = $request->input('flexiFoldC1');

     $overseaswt->covSewC1  = $request->input('covSewC1');
     $overseaswt->t1SewC1  = $request->input('t1SewC1');
     $overseaswt->t2SewC1  = $request->input('t2SewC1');
     $overseaswt->t3SewC1  = $request->input('t3SewC1');
     $overseaswt->t4SewC1  = $request->input('t4SewC1');
     $overseaswt->t5SewC1  = $request->input('t5SewC1');
     $overseaswt->stat2SewC1  = $request->input('stat2SewC1');
     $overseaswt->flexi2SewC1  = $request->input('flexi2SewC1');
     $overseaswt->statSewC1  = $request->input('statSewC1');
     $overseaswt->flexiSewC1  = $request->input('flexiSewC1');

     $overseaswt->covBindC1  = $request->input('covBindC1');
     $overseaswt->t1BindC1  = $request->input('t1BindC1');
     $overseaswt->t2BindC1  = $request->input('t2BindC1');
     $overseaswt->t3BindC1  = $request->input('t3BindC1');
     $overseaswt->t4BindC1  = $request->input('t4BindC1');
     $overseaswt->t5BindC1  = $request->input('t5BindC1');
     $overseaswt->stat2BindC1  = $request->input('stat2BindC1');
     $overseaswt->flexi2BindC1  = $request->input('flexi2BindC1');
     $overseaswt->statBindC1  = $request->input('statBindC1');
     $overseaswt->flexiBindC1  = $request->input('flexiBindC1');

     $overseaswt->cov3C1  = $request->input('cov3C1');
     $overseaswt->t13C1  = $request->input('t13C1');
     $overseaswt->t23C1  = $request->input('t23C1');
     $overseaswt->t33C1  = $request->input('t33C1');
     $overseaswt->t43C1  = $request->input('t43C1');
     $overseaswt->t53C1  = $request->input('t53C1');
     $overseaswt->stat23C1  = $request->input('stat23C1');
     $overseaswt->flexi23C1  = $request->input('flexi23C1');
     $overseaswt->stat3C1  = $request->input('stat3C1');
     $overseaswt->flexi3C1  = $request->input('flexi3C1');

     $overseaswt->covPackC1  = $request->input('covPackC1');
     $overseaswt->t1PackC1  = $request->input('t1PackC1');
     $overseaswt->t2PackC1  = $request->input('t2PackC1');
     $overseaswt->t3PackC1  = $request->input('t3PackC1');
     $overseaswt->t4PackC1  = $request->input('t4PackC1');
     $overseaswt->t5PackC1  = $request->input('t5PackC1');
     $overseaswt->stat2PackC1  = $request->input('stat2PackC1');
     $overseaswt->flexi2PackC1  = $request->input('flexi2PackC1');
     $overseaswt->statPackC1  = $request->input('statPackC1');
     $overseaswt->flexiPackC1  = $request->input('flexiPackC1');

     $overseaswt->ccover  = $request->input('ccover');
     $overseaswt->ccoverready  = $request->input('ccoverready');
     $overseaswt->ccoverwaste  = $request->input('ccoverwaste');
     $overseaswt->flexicover  = $request->input('flexicover');
     $overseaswt->flexicoverready  = $request->input('flexicoverready');
     $overseaswt->flexicoverwaste  = $request->input('flexicoverwaste');
     $overseaswt->flexicover2  = $request->input('flexicover2');
     $overseaswt->flexicoverready2  = $request->input('flexicoverready2');
     $overseaswt->flexicoverwaste2  = $request->input('flexicoverwaste2');
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
     $overseaswt->ct4  = $request->input('ct4');
     $overseaswt->ct4ready  = $request->input('ct4ready');
     $overseaswt->ct4waste  = $request->input('ct4waste');
     $overseaswt->ct5  = $request->input('ct5');
     $overseaswt->ct5ready  = $request->input('ct5ready');
     $overseaswt->ct5waste  = $request->input('ct5waste');
     $overseaswt->csticker  = $request->input('csticker');
     $overseaswt->cstickerready  = $request->input('cstickerready');
     $overseaswt->cstickerwaste  = $request->input('cstickerwaste');
     $overseaswt->csticker2  = $request->input('csticker2');
     $overseaswt->cstickerready2  = $request->input('cstickerready2');
     $overseaswt->cstickerwaste2  = $request->input('cstickerwaste2');

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

     $overseaswt->colMakeFront1  = $request->input('colMakeFront1');
     $overseaswt->colMakeBack1  = $request->input('colMakeBack1');
     $overseaswt->colWaste1  = $request->input('colWaste1');

     $overseaswt->colMakeFront2  = $request->input('colMakeFront2');
     $overseaswt->colMakeBack2  = $request->input('colMakeBack2');
     $overseaswt->colWaste2  = $request->input('colWaste2');

    $overseaswt->colMakeFrontcovback  = $request->input('colMakeFrontcovback');
    $overseaswt->users_id = Auth::user()->id;
    $overseaswt->save();

    $workorder = Workorder::where('sales_id', $sales->id)->first();
    $wotype = Wotype::where('typeofformula', '=', 'Overseas WT')->where('workorders_id', $workorder->id)->first();

    $wotype->covertotalqty =$overseaswt->ccoverready;
    $wotype->text1totallqty = $overseaswt->ct1ready ;
    $wotype->text2totalqty = $overseaswt->ct2ready ;
    $wotype->text3totalqty = $overseaswt->ct3ready ;
    $wotype->text4totalqty = $overseaswt->ct4ready ;
    $wotype->text5totalqty = $overseaswt->ct5ready ;
    $wotype->sticker1totalqty = $overseaswt->cstickerready ;
    $wotype->sticker2totalqty = $overseaswt->cstickerready2 ;
    $wotype->flexi1totalqty = $overseaswt->flexicoverready ;
    $wotype->flexi2totalqty = $overseaswt->flexicoverready2 ;
    $wotype->covertotalpaper = $overseaswt->ccoverwaste;
    $wotype->text1totallpaper = $overseaswt->ct1waste ;
    $wotype->text2totalpaper = $overseaswt->ct2waste ;
    $wotype->text3totalpaper = $overseaswt->ct3waste ;
    $wotype->text4totalpaper = $overseaswt->ct4waste ;
    $wotype->text5totalpaper = $overseaswt->ct5waste ;
    $wotype->sticker1totalpaper = $overseaswt->cstickerwaste ;
    $wotype->sticker2totalpaper = $overseaswt->cstickerwaste2 ;
    $wotype->flexi2totalpaper = $overseaswt->flexicoverwaste2 ;
    $wotype->flexi1totalpaper = $overseaswt->flexicoverwaste ;
    $wotype->save();

     // redirect
     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
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
     $overseasfb->typeofformula = 'Overseas FB';
     $overseasfb->workorders_id = $sales->workorders_id;

     $overseasfb->none1  = $request->input('none1');

     $overseasfb->covOrderC  = $request->input('covOrderC');
     $overseasfb->t1OrderC  = $request->input('t1OrderC');
     $overseasfb->t2OrderC  = $request->input('t2OrderC');
     $overseasfb->t3OrderC  = $request->input('t3OrderC');
     $overseasfb->t4OrderC  = $request->input('t4OrderC');
     $overseasfb->t5OrderC  = $request->input('t5OrderC');
     $overseasfb->stat2OrderC  = $request->input('stat2OrderC');
     $overseasfb->flexi2OrderC  = $request->input('flexi2OrderC');
     $overseasfb->statOrderC  = $request->input('statOrderC');
     $overseasfb->flexiOrderC  = $request->input('flexiOrderC');

     $overseasfb->covUpC  = $request->input('covUpC');
     $overseasfb->t1UpC  = $request->input('t1UpC');
     $overseasfb->t2UpC  = $request->input('t2UpC');
     $overseasfb->t3UpC  = $request->input('t3UpC');
     $overseasfb->t4UpC  = $request->input('t4UpC');
     $overseasfb->t5UpC  = $request->input('t5UpC');
     $overseasfb->stat2UpC  = $request->input('stat2UpC');
     $overseasfb->flexi2UpC  = $request->input('flexi2UpC');
     $overseasfb->statUpC  = $request->input('statUpC');
     $overseasfb->flexiUpC  = $request->input('flexiUpC');

     $overseasfb->covSignC  = $request->input('covSignC');
     $overseasfb->t1signC  = $request->input('t1signC');
     $overseasfb->t2signC  = $request->input('t2signC');
     $overseasfb->t3signC  = $request->input('t3signC');
     $overseasfb->t4signC  = $request->input('t4signC');
     $overseasfb->t5signC  = $request->input('t5signC');
     $overseasfb->stat2SignC  = $request->input('stat2SignC');
     $overseasfb->flexi2SignC  = $request->input('flexi2SignC');
     $overseasfb->statSignC  = $request->input('statSignC');
     $overseasfb->flexiSignC  = $request->input('flexiSignC');

     $overseasfb->covFrontC  = $request->input('covFrontC');
     $overseasfb->t1FrontC  = $request->input('t1FrontC');
     $overseasfb->t2FrontC  = $request->input('t2FrontC');
     $overseasfb->t3FrontC  = $request->input('t3FrontC');
     $overseasfb->t4FrontC  = $request->input('t4FrontC');
     $overseasfb->t5FrontC  = $request->input('t5FrontC');
     $overseasfb->stat2FrontC  = $request->input('stat2FrontC');
     $overseasfb->flexi2FrontC  = $request->input('flexi2FrontC');
     $overseasfb->statFrontC  = $request->input('statFrontC');
     $overseasfb->flexiFrontC  = $request->input('flexiFrontC');

     $overseasfb->covBackC  = $request->input('covBackC');
     $overseasfb->t1BackC  = $request->input('t1BackC');
     $overseasfb->t2BackC  = $request->input('t2BackC');
     $overseasfb->t3BackC  = $request->input('t3BackC');
     $overseasfb->t4BackC  = $request->input('t4BackC');
     $overseasfb->t5BackC  = $request->input('t5BackC');
     $overseasfb->stat2BackC  = $request->input('stat2BackC');
     $overseasfb->flexi2BackC  = $request->input('flexi2BackC');
     $overseasfb->statBackC  = $request->input('statBackC');
     $overseasfb->flexiBackC  = $request->input('flexiBackC');

     $overseasfb->covSurfC  = $request->input('covSurfC');
     $overseasfb->t1SurfC  = $request->input('t1SurfC');
     $overseasfb->t2SurfC  = $request->input('t2SurfC');
     $overseasfb->t3SurfC  = $request->input('t3SurfC');
     $overseasfb->t4SurfC  = $request->input('t4SurfC');
     $overseasfb->t5SurfC  = $request->input('t5SurfC');
     $overseasfb->stat2SurfC  = $request->input('stat2SurfC');
     $overseasfb->flexi2SurfC  = $request->input('flexi2SurfC');
     $overseasfb->statSurfC  = $request->input('statSurfC');
     $overseasfb->flexiSurfC  = $request->input('flexiSurfC');

     $overseasfb->covTrimC  = $request->input('covTrimC');
     $overseasfb->t1TrimC  = $request->input('t1TrimC');
     $overseasfb->t2TrimC  = $request->input('t2TrimC');
     $overseasfb->t3TrimC  = $request->input('t3TrimC');
     $overseasfb->t4TrimC  = $request->input('t4TrimC');
     $overseasfb->t5TrimC  = $request->input('t5TrimC');
     $overseasfb->stat2TrimC  = $request->input('stat2TrimC');
     $overseasfb->flexi2TrimC  = $request->input('flexi2TrimC');
     $overseasfb->statTrimC  = $request->input('statTrimC');
     $overseasfb->flexiTrimC  = $request->input('flexiTrimC');

     $overseasfb->covDieC  = $request->input('covDieC');
     $overseasfb->t1DieC  = $request->input('t1DieC');
     $overseasfb->t2DieC  = $request->input('t2DieC');
     $overseasfb->t3DieC  = $request->input('t3DieC');
     $overseasfb->t4DieC  = $request->input('t4DieC');
     $overseasfb->t5DieC  = $request->input('t5DieC');
     $overseasfb->stat2DieC  = $request->input('stat2DieC');
     $overseasfb->flexi2DieC  = $request->input('flexi2DieC');
     $overseasfb->statDieC  = $request->input('statDieC');
     $overseasfb->flexiDieC  = $request->input('flexiDieC');

     $overseasfb->covStripC  = $request->input('covStripC');
     $overseasfb->t1StripC  = $request->input('t1StripC');
     $overseasfb->t2StripC  = $request->input('t2StripC');
     $overseasfb->t3stripC  = $request->input('t3stripC');
     $overseasfb->t4StripC  = $request->input('t4StripC');
     $overseasfb->t5stripC  = $request->input('t5stripC');
     $overseasfb->stat2StripC  = $request->input('stat2StripC');
     $overseasfb->flexi2StripC  = $request->input('flexi2StripC');
     $overseasfb->statStripC  = $request->input('statStripC');
     $overseasfb->flexiStripC  = $request->input('flexiStripC');

     $overseasfb->covFoldC  = $request->input('covFoldC');
     $overseasfb->t1FoldC  = $request->input('t1FoldC');
     $overseasfb->t2FoldC  = $request->input('t2FoldC');
     $overseasfb->t3FoldC  = $request->input('t3FoldC');
     $overseasfb->t4FoldC  = $request->input('t4FoldC');
     $overseasfb->t5FoldC  = $request->input('t5FoldC');
     $overseasfb->stat2FoldC  = $request->input('stat2FoldC');
     $overseasfb->flexi2FoldC  = $request->input('flexi2FoldC');
     $overseasfb->statFoldC  = $request->input('statFoldC');
     $overseasfb->flexiFoldC  = $request->input('flexiFoldC');

     $overseasfb->covSewC  = $request->input('covSewC');
     $overseasfb->t1SewC  = $request->input('t1SewC');
     $overseasfb->t2SewC  = $request->input('t2SewC');
     $overseasfb->t3SewC  = $request->input('t3SewC');
     $overseasfb->t4SewC  = $request->input('t4SewC');
     $overseasfb->t5SewC  = $request->input('t5SewC');
     $overseasfb->stat2SewC  = $request->input('stat2SewC');
     $overseasfb->flexi2SewC  = $request->input('flexi2SewC');
     $overseasfb->statSewC  = $request->input('statSewC');
     $overseasfb->flexiSewC  = $request->input('flexiSewC');

     $overseasfb->covBindC  = $request->input('covBindC');
     $overseasfb->t1BindC  = $request->input('t1BindC');
     $overseasfb->t2BindC  = $request->input('t2BindC');
     $overseasfb->t3BindC  = $request->input('t3BindC');
     $overseasfb->t4BindC  = $request->input('t4BindC');
     $overseasfb->t5BindC  = $request->input('t5BindC');
     $overseasfb->stat2BindC  = $request->input('stat2BindC');
     $overseasfb->flexi2BindC  = $request->input('flexi2BindC');
     $overseasfb->statBindC  = $request->input('statBindC');
     $overseasfb->flexiBindC  = $request->input('flexiBindC');

     $overseasfb->cov3C  = $request->input('cov3C');
     $overseasfb->t13C  = $request->input('t13C');
     $overseasfb->t23C  = $request->input('t23C');
     $overseasfb->t33C  = $request->input('t33C');
     $overseasfb->t43C  = $request->input('t43C');
     $overseasfb->t53C  = $request->input('t53C');
     $overseasfb->stat23C  = $request->input('stat23C');
     $overseasfb->flexi23C  = $request->input('flexi23C');
     $overseasfb->stat3C  = $request->input('stat3C');
     $overseasfb->flexi3C  = $request->input('flexi3C');

     $overseasfb->covPrintC1  = $request->input('covPrintC1');
     $overseasfb->t1PrintC1  = $request->input('t1PrintC1');
     $overseasfb->t2PrintC1  = $request->input('t2PrintC1');
     $overseasfb->t3PrintC1  = $request->input('t3PrintC1');
     $overseasfb->t4PrintC1  = $request->input('t4PrintC1');
     $overseasfb->t5PrintC1  = $request->input('t5PrintC1');
     $overseasfb->stat2PrintC1  = $request->input('stat2PrintC1');
     $overseasfb->flexi2PrintC1  = $request->input('flexi2PrintC1');
     $overseasfb->statPrintC1  = $request->input('statPrintC1');
     $overseasfb->flexiPrintC1  = $request->input('flexiPrintC1');

     $overseasfb->covSurfC1  = $request->input('covSurfC1');
     $overseasfb->t1SurfC1  = $request->input('t1SurfC1');
     $overseasfb->t2SurfC1  = $request->input('t2SurfC1');
     $overseasfb->t3SurfC1  = $request->input('t3SurfC1');
     $overseasfb->t4SurfC1  = $request->input('t4SurfC1');
     $overseasfb->t5SurfC1  = $request->input('t5SurfC1');
     $overseasfb->stat2SurfC1  = $request->input('stat2SurfC1');
     $overseasfb->flexi2SurfC1  = $request->input('flexi2SurfC1');
     $overseasfb->statSurfC1  = $request->input('statSurfC1');
     $overseasfb->flexiSurfC1  = $request->input('flexiSurfC1');

     $overseasfb->covTrimC1  = $request->input('covTrimC1');
     $overseasfb->t1TrimC1  = $request->input('t1TrimC1');
     $overseasfb->t2TrimC1  = $request->input('t2TrimC1');
     $overseasfb->t3TrimC1 = $request->input('t3TrimC1');
     $overseasfb->t4TrimC1  = $request->input('t4TrimC1');
     $overseasfb->t5TrimC1 = $request->input('t5TrimC1');
     $overseasfb->stat2TrimC1  = $request->input('stat2TrimC1');
     $overseasfb->flexi2TrimC1  = $request->input('flexi2TrimC1');
     $overseasfb->statTrimC1  = $request->input('statTrimC1');
     $overseasfb->flexiTrimC1  = $request->input('flexiTrimC1');

     $overseasfb->covDieC1  = $request->input('covDieC1');
     $overseasfb->t1DieC1  = $request->input('t1DieC1');
     $overseasfb->t2DieC1  = $request->input('t2DieC1');
     $overseasfb->t3DieC1  = $request->input('t3DieC1');
     $overseasfb->t4DieC1  = $request->input('t4DieC1');
     $overseasfb->t5DieC1  = $request->input('t5DieC1');
     $overseasfb->stat2DieC1  = $request->input('stat2DieC1');
     $overseasfb->flexi2DieC1  = $request->input('flexi2DieC1');
     $overseasfb->statDieC1  = $request->input('statDieC1');
     $overseasfb->flexiDieC1  = $request->input('flexiDieC1');

     $overseasfb->covStripC1  = $request->input('covStripC1');
     $overseasfb->t1StripC1  = $request->input('t1StripC1');
     $overseasfb->t2StripC1  = $request->input('t2StripC1');
     $overseasfb->t3stripC1  = $request->input('t3stripC1');
     $overseasfb->t4StripC1  = $request->input('t4StripC1');
     $overseasfb->t5stripC1  = $request->input('t5stripC1');
     $overseasfb->stat2StripC1  = $request->input('stat2StripC1');
     $overseasfb->flexi2StripC1  = $request->input('flexi2StripC1');
     $overseasfb->statStripC1  = $request->input('statStripC1');
     $overseasfb->flexiStripC1  = $request->input('flexiStripC1');

     $overseasfb->covFoldC1  = $request->input('covFoldC1');
     $overseasfb->t1FoldC1  = $request->input('t1FoldC1');
     $overseasfb->t2FoldC1  = $request->input('t2FoldC1');
     $overseasfb->t3FoldC1  = $request->input('t3FoldC1');
     $overseasfb->t4FoldC1  = $request->input('t4FoldC1');
     $overseasfb->t5FoldC1  = $request->input('t5FoldC1');
     $overseasfb->stat2FoldC1  = $request->input('stat2FoldC1');
     $overseasfb->flexi2FoldC1  = $request->input('flexi2FoldC1');
     $overseasfb->statFoldC1  = $request->input('statFoldC1');
     $overseasfb->flexiFoldC1  = $request->input('flexiFoldC1');

     $overseasfb->covSewC1  = $request->input('covSewC1');
     $overseasfb->t1SewC1  = $request->input('t1SewC1');
     $overseasfb->t2SewC1  = $request->input('t2SewC1');
     $overseasfb->t3SewC1  = $request->input('t3SewC1');
     $overseasfb->t4SewC1  = $request->input('t4SewC1');
     $overseasfb->t5SewC1  = $request->input('t5SewC1');
     $overseasfb->stat2SewC1  = $request->input('stat2SewC1');
     $overseasfb->flexi2SewC1  = $request->input('flexi2SewC1');
     $overseasfb->statSewC1  = $request->input('statSewC1');
     $overseasfb->flexiSewC1  = $request->input('flexiSewC1');

     $overseasfb->covBindC1  = $request->input('covBindC1');
     $overseasfb->t1BindC1  = $request->input('t1BindC1');
     $overseasfb->t2BindC1  = $request->input('t2BindC1');
     $overseasfb->t3BindC1  = $request->input('t3BindC1');
     $overseasfb->t4BindC1  = $request->input('t4BindC1');
     $overseasfb->t5BindC1  = $request->input('t5BindC1');
     $overseasfb->stat2BindC1  = $request->input('stat2BindC1');
     $overseasfb->flexi2BindC1  = $request->input('flexi2BindC1');
     $overseasfb->statBindC1  = $request->input('statBindC1');
     $overseasfb->flexiBindC1  = $request->input('flexiBindC1');

     $overseasfb->cov3C1  = $request->input('cov3C1');
     $overseasfb->t13C1  = $request->input('t13C1');
     $overseasfb->t23C1  = $request->input('t23C1');
     $overseasfb->t33C1  = $request->input('t33C1');
     $overseasfb->t43C1  = $request->input('t43C1');
     $overseasfb->t53C1  = $request->input('t53C1');
     $overseasfb->stat23C1  = $request->input('stat23C1');
     $overseasfb->flexi23C1  = $request->input('flexi23C1');
     $overseasfb->stat3C1  = $request->input('stat3C1');
     $overseasfb->flexi3C1  = $request->input('flexi3C1');

     $overseasfb->covPackC1  = $request->input('covPackC1');
     $overseasfb->t1PackC1  = $request->input('t1PackC1');
     $overseasfb->t2PackC1  = $request->input('t2PackC1');
     $overseasfb->t3PackC1  = $request->input('t3PackC1');
     $overseasfb->t4PackC1  = $request->input('t4PackC1');
     $overseasfb->t5PackC1  = $request->input('t5PackC1');
     $overseasfb->stat2PackC1  = $request->input('stat2PackC1');
     $overseasfb->flexi2PackC1  = $request->input('flexi2PackC1');
     $overseasfb->statPackC1  = $request->input('statPackC1');
     $overseasfb->flexiPackC1  = $request->input('flexiPackC1');

     $overseasfb->ccover  = $request->input('ccover');
     $overseasfb->ccoverready  = $request->input('ccoverready');
     $overseasfb->ccoverwaste  = $request->input('ccoverwaste');
     $overseasfb->flexicover  = $request->input('flexicover');
     $overseasfb->flexicoverready  = $request->input('flexicoverready');
     $overseasfb->flexicoverwaste  = $request->input('flexicoverwaste');
     $overseasfb->flexicover2  = $request->input('flexicover2');
     $overseasfb->flexicoverready2  = $request->input('flexicoverready2');
     $overseasfb->flexicoverwaste2  = $request->input('flexicoverwaste2');
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
     $overseasfb->ct4  = $request->input('ct4');
     $overseasfb->ct4ready  = $request->input('ct4ready');
     $overseasfb->ct4waste  = $request->input('ct4waste');
     $overseasfb->ct5  = $request->input('ct5');
     $overseasfb->ct5ready  = $request->input('ct5ready');
     $overseasfb->ct5waste  = $request->input('ct5waste');
     $overseasfb->csticker  = $request->input('csticker');
     $overseasfb->cstickerready  = $request->input('cstickerready');
     $overseasfb->cstickerwaste  = $request->input('cstickerwaste');
     $overseasfb->csticker2  = $request->input('csticker2');
     $overseasfb->cstickerready2  = $request->input('cstickerready2');
     $overseasfb->cstickerwaste2  = $request->input('cstickerwaste2');
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

     $overseasfb->colMakeFront1  = $request->input('colMakeFront1');
     $overseasfb->colMakeBack1  = $request->input('colMakeBack1');
     $overseasfb->colWaste1  = $request->input('colWaste1');

     $overseasfb->colMakeFront2  = $request->input('colMakeFront2');
     $overseasfb->colMakeBack2  = $request->input('colMakeBack2');
     $overseasfb->colWaste2  = $request->input('colWaste2');

     $overseasfb->users_id = Auth::user()->id;
     $overseasfb->save();

     $workorder = Workorder::where('sales_id', $sales->id)->first();
     $wotype = new Wotype;
     $wotype->workorders_id = $workorder->id;
     $wotype->typeofformula = 'Overseas FB';
     $wotype->covertotalqty =$overseasfb->ccoverready;
     $wotype->text1totallqty = $overseasfb->ct1ready ;
     $wotype->text2totalqty = $overseasfb->ct2ready ;
     $wotype->text3totalqty = $overseasfb->ct3ready ;
     $wotype->text4totalqty = $overseasfb->ct4ready ;
     $wotype->text5totalqty = $overseasfb->ct5ready ;
     $wotype->sticker1totalqty = $overseasfb->cstickerready ;
     $wotype->sticker2totalqty = $overseasfb->cstickerready2 ;
     $wotype->flexi1totalqty = $overseasfb->flexicoverready ;
     $wotype->flexi2totalqty = $overseasfb->flexicoverready2 ;
     $wotype->covertotalpaper = $overseasfb->ccoverwaste;
     $wotype->text1totallpaper = $overseasfb->ct1waste ;
     $wotype->text2totalpaper = $overseasfb->ct2waste ;
     $wotype->text3totalpaper = $overseasfb->ct3waste ;
     $wotype->text4totalpaper = $overseasfb->ct4waste ;
     $wotype->text5totalpaper = $overseasfb->ct5waste ;
     $wotype->sticker1totalpaper = $overseasfb->cstickerwaste ;
     $wotype->sticker2totalpaper = $overseasfb->cstickerwaste2 ;
     $wotype->flexi2totalpaper = $overseasfb->flexicoverwaste2 ;
     $wotype->flexi1totalpaper = $overseasfb->flexicoverwaste ;
     $wotype->save();

     // $workorder->wotypes_id = $wotype->id;
     $workorder->save();


     // redirect
     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
   }

   public function softcoveroverseafbedit($id)
   {
     $overseasfb = Overseasfb::find($id);
     $sales = Sales::find($overseasfb->sales_id);
     return view('frontend.plan.softcoveroverseafbedit')->with('sales', $sales)->with('overseasfb', $overseasfb);
   }

   public function softcoveroverseafbupdate(Request $request ,$id )
   {
     $sales = Sales::find($id);
     $overseasfb = Overseasfb::where('sales_id',$sales->id)->first();

     $overseasfb->none1  = $request->input('none1');

     $overseasfb->covOrderC  = $request->input('covOrderC');
     $overseasfb->t1OrderC  = $request->input('t1OrderC');
     $overseasfb->t2OrderC  = $request->input('t2OrderC');
     $overseasfb->t3OrderC  = $request->input('t3OrderC');
     $overseasfb->t4OrderC  = $request->input('t4OrderC');
     $overseasfb->t5OrderC  = $request->input('t5OrderC');
     $overseasfb->stat2OrderC  = $request->input('stat2OrderC');
     $overseasfb->flexi2OrderC  = $request->input('flexi2OrderC');
     $overseasfb->statOrderC  = $request->input('statOrderC');
     $overseasfb->flexiOrderC  = $request->input('flexiOrderC');

     $overseasfb->covUpC  = $request->input('covUpC');
     $overseasfb->t1UpC  = $request->input('t1UpC');
     $overseasfb->t2UpC  = $request->input('t2UpC');
     $overseasfb->t3UpC  = $request->input('t3UpC');
     $overseasfb->t4UpC  = $request->input('t4UpC');
     $overseasfb->t5UpC  = $request->input('t5UpC');
     $overseasfb->stat2UpC  = $request->input('stat2UpC');
     $overseasfb->flexi2UpC  = $request->input('flexi2UpC');
     $overseasfb->statUpC  = $request->input('statUpC');
     $overseasfb->flexiUpC  = $request->input('flexiUpC');

     $overseasfb->covSignC  = $request->input('covSignC');
     $overseasfb->t1signC  = $request->input('t1signC');
     $overseasfb->t2signC  = $request->input('t2signC');
     $overseasfb->t3signC  = $request->input('t3signC');
     $overseasfb->t4signC  = $request->input('t4signC');
     $overseasfb->t5signC  = $request->input('t5signC');
     $overseasfb->stat2SignC  = $request->input('stat2SignC');
     $overseasfb->flexi2SignC  = $request->input('flexi2SignC');
     $overseasfb->statSignC  = $request->input('statSignC');
     $overseasfb->flexiSignC  = $request->input('flexiSignC');

     $overseasfb->covFrontC  = $request->input('covFrontC');
     $overseasfb->t1FrontC  = $request->input('t1FrontC');
     $overseasfb->t2FrontC  = $request->input('t2FrontC');
     $overseasfb->t3FrontC  = $request->input('t3FrontC');
     $overseasfb->t4FrontC  = $request->input('t4FrontC');
     $overseasfb->t5FrontC  = $request->input('t5FrontC');
     $overseasfb->stat2FrontC  = $request->input('stat2FrontC');
     $overseasfb->flexi2FrontC  = $request->input('flexi2FrontC');
     $overseasfb->statFrontC  = $request->input('statFrontC');
     $overseasfb->flexiFrontC  = $request->input('flexiFrontC');

     $overseasfb->covBackC  = $request->input('covBackC');
     $overseasfb->t1BackC  = $request->input('t1BackC');
     $overseasfb->t2BackC  = $request->input('t2BackC');
     $overseasfb->t3BackC  = $request->input('t3BackC');
     $overseasfb->t4BackC  = $request->input('t4BackC');
     $overseasfb->t5BackC  = $request->input('t5BackC');
     $overseasfb->stat2BackC  = $request->input('stat2BackC');
     $overseasfb->flexi2BackC  = $request->input('flexi2BackC');
     $overseasfb->statBackC  = $request->input('statBackC');
     $overseasfb->flexiBackC  = $request->input('flexiBackC');

     $overseasfb->covSurfC  = $request->input('covSurfC');
     $overseasfb->t1SurfC  = $request->input('t1SurfC');
     $overseasfb->t2SurfC  = $request->input('t2SurfC');
     $overseasfb->t3SurfC  = $request->input('t3SurfC');
     $overseasfb->t4SurfC  = $request->input('t4SurfC');
     $overseasfb->t5SurfC  = $request->input('t5SurfC');
     $overseasfb->stat2SurfC  = $request->input('stat2SurfC');
     $overseasfb->flexi2SurfC  = $request->input('flexi2SurfC');
     $overseasfb->statSurfC  = $request->input('statSurfC');
     $overseasfb->flexiSurfC  = $request->input('flexiSurfC');

     $overseasfb->covTrimC  = $request->input('covTrimC');
     $overseasfb->t1TrimC  = $request->input('t1TrimC');
     $overseasfb->t2TrimC  = $request->input('t2TrimC');
     $overseasfb->t3TrimC  = $request->input('t3TrimC');
     $overseasfb->t4TrimC  = $request->input('t4TrimC');
     $overseasfb->t5TrimC  = $request->input('t5TrimC');
     $overseasfb->stat2TrimC  = $request->input('stat2TrimC');
     $overseasfb->flexi2TrimC  = $request->input('flexi2TrimC');
     $overseasfb->statTrimC  = $request->input('statTrimC');
     $overseasfb->flexiTrimC  = $request->input('flexiTrimC');

     $overseasfb->covDieC  = $request->input('covDieC');
     $overseasfb->t1DieC  = $request->input('t1DieC');
     $overseasfb->t2DieC  = $request->input('t2DieC');
     $overseasfb->t3DieC  = $request->input('t3DieC');
     $overseasfb->t4DieC  = $request->input('t4DieC');
     $overseasfb->t5DieC  = $request->input('t5DieC');
     $overseasfb->stat2DieC  = $request->input('stat2DieC');
     $overseasfb->flexi2DieC  = $request->input('flexi2DieC');
     $overseasfb->statDieC  = $request->input('statDieC');
     $overseasfb->flexiDieC  = $request->input('flexiDieC');

     $overseasfb->covStripC  = $request->input('covStripC');
     $overseasfb->t1StripC  = $request->input('t1StripC');
     $overseasfb->t2StripC  = $request->input('t2StripC');
     $overseasfb->t3stripC  = $request->input('t3stripC');
     $overseasfb->t4StripC  = $request->input('t4StripC');
     $overseasfb->t5stripC  = $request->input('t5stripC');
     $overseasfb->stat2StripC  = $request->input('stat2StripC');
     $overseasfb->flexi2StripC  = $request->input('flexi2StripC');
     $overseasfb->statStripC  = $request->input('statStripC');
     $overseasfb->flexiStripC  = $request->input('flexiStripC');

     $overseasfb->covFoldC  = $request->input('covFoldC');
     $overseasfb->t1FoldC  = $request->input('t1FoldC');
     $overseasfb->t2FoldC  = $request->input('t2FoldC');
     $overseasfb->t3FoldC  = $request->input('t3FoldC');
     $overseasfb->t4FoldC  = $request->input('t4FoldC');
     $overseasfb->t5FoldC  = $request->input('t5FoldC');
     $overseasfb->stat2FoldC  = $request->input('stat2FoldC');
     $overseasfb->flexi2FoldC  = $request->input('flexi2FoldC');
     $overseasfb->statFoldC  = $request->input('statFoldC');
     $overseasfb->flexiFoldC  = $request->input('flexiFoldC');

     $overseasfb->covSewC  = $request->input('covSewC');
     $overseasfb->t1SewC  = $request->input('t1SewC');
     $overseasfb->t2SewC  = $request->input('t2SewC');
     $overseasfb->t3SewC  = $request->input('t3SewC');
     $overseasfb->t4SewC  = $request->input('t4SewC');
     $overseasfb->t5SewC  = $request->input('t5SewC');
     $overseasfb->stat2SewC  = $request->input('stat2SewC');
     $overseasfb->flexi2SewC  = $request->input('flexi2SewC');
     $overseasfb->statSewC  = $request->input('statSewC');
     $overseasfb->flexiSewC  = $request->input('flexiSewC');

     $overseasfb->covBindC  = $request->input('covBindC');
     $overseasfb->t1BindC  = $request->input('t1BindC');
     $overseasfb->t2BindC  = $request->input('t2BindC');
     $overseasfb->t3BindC  = $request->input('t3BindC');
     $overseasfb->t4BindC  = $request->input('t4BindC');
     $overseasfb->t5BindC  = $request->input('t5BindC');
     $overseasfb->stat2BindC  = $request->input('stat2BindC');
     $overseasfb->flexi2BindC  = $request->input('flexi2BindC');
     $overseasfb->statBindC  = $request->input('statBindC');
     $overseasfb->flexiBindC  = $request->input('flexiBindC');

     $overseasfb->cov3C  = $request->input('cov3C');
     $overseasfb->t13C  = $request->input('t13C');
     $overseasfb->t23C  = $request->input('t23C');
     $overseasfb->t33C  = $request->input('t33C');
     $overseasfb->t43C  = $request->input('t43C');
     $overseasfb->t53C  = $request->input('t53C');
     $overseasfb->stat23C  = $request->input('stat23C');
     $overseasfb->flexi23C  = $request->input('flexi23C');
     $overseasfb->stat3C  = $request->input('stat3C');
     $overseasfb->flexi3C  = $request->input('flexi3C');

     $overseasfb->covPrintC1  = $request->input('covPrintC1');
     $overseasfb->t1PrintC1  = $request->input('t1PrintC1');
     $overseasfb->t2PrintC1  = $request->input('t2PrintC1');
     $overseasfb->t3PrintC1  = $request->input('t3PrintC1');
     $overseasfb->t4PrintC1  = $request->input('t4PrintC1');
     $overseasfb->t5PrintC1  = $request->input('t5PrintC1');
     $overseasfb->stat2PrintC1  = $request->input('stat2PrintC1');
     $overseasfb->flexi2PrintC1  = $request->input('flexi2PrintC1');
     $overseasfb->statPrintC1  = $request->input('statPrintC1');
     $overseasfb->flexiPrintC1  = $request->input('flexiPrintC1');

     $overseasfb->covSurfC1  = $request->input('covSurfC1');
     $overseasfb->t1SurfC1  = $request->input('t1SurfC1');
     $overseasfb->t2SurfC1  = $request->input('t2SurfC1');
     $overseasfb->t3SurfC1  = $request->input('t3SurfC1');
     $overseasfb->t4SurfC1  = $request->input('t4SurfC1');
     $overseasfb->t5SurfC1  = $request->input('t5SurfC1');
     $overseasfb->stat2SurfC1  = $request->input('stat2SurfC1');
     $overseasfb->flexi2SurfC1  = $request->input('flexi2SurfC1');
     $overseasfb->statSurfC1  = $request->input('statSurfC1');
     $overseasfb->flexiSurfC1  = $request->input('flexiSurfC1');

     $overseasfb->covTrimC1  = $request->input('covTrimC1');
     $overseasfb->t1TrimC1  = $request->input('t1TrimC1');
     $overseasfb->t2TrimC1  = $request->input('t2TrimC1');
     $overseasfb->t3TrimC1 = $request->input('t3TrimC1');
     $overseasfb->t4TrimC1  = $request->input('t4TrimC1');
     $overseasfb->t5TrimC1 = $request->input('t5TrimC1');
     $overseasfb->stat2TrimC1  = $request->input('stat2TrimC1');
     $overseasfb->flexi2TrimC1  = $request->input('flexi2TrimC1');
     $overseasfb->statTrimC1  = $request->input('statTrimC1');
     $overseasfb->flexiTrimC1  = $request->input('flexiTrimC1');

     $overseasfb->covDieC1  = $request->input('covDieC1');
     $overseasfb->t1DieC1  = $request->input('t1DieC1');
     $overseasfb->t2DieC1  = $request->input('t2DieC1');
     $overseasfb->t3DieC1  = $request->input('t3DieC1');
     $overseasfb->t4DieC1  = $request->input('t4DieC1');
     $overseasfb->t5DieC1  = $request->input('t5DieC1');
     $overseasfb->stat2DieC1  = $request->input('stat2DieC1');
     $overseasfb->flexi2DieC1  = $request->input('flexi2DieC1');
     $overseasfb->statDieC1  = $request->input('statDieC1');
     $overseasfb->flexiDieC1  = $request->input('flexiDieC1');

     $overseasfb->covStripC1  = $request->input('covStripC1');
     $overseasfb->t1StripC1  = $request->input('t1StripC1');
     $overseasfb->t2StripC1  = $request->input('t2StripC1');
     $overseasfb->t3stripC1  = $request->input('t3stripC1');
     $overseasfb->t4StripC1  = $request->input('t4StripC1');
     $overseasfb->t5stripC1  = $request->input('t5stripC1');
     $overseasfb->stat2StripC1  = $request->input('stat2StripC1');
     $overseasfb->flexi2StripC1  = $request->input('flexi2StripC1');
     $overseasfb->statStripC1  = $request->input('statStripC1');
     $overseasfb->flexiStripC1  = $request->input('flexiStripC1');

     $overseasfb->covFoldC1  = $request->input('covFoldC1');
     $overseasfb->t1FoldC1  = $request->input('t1FoldC1');
     $overseasfb->t2FoldC1  = $request->input('t2FoldC1');
     $overseasfb->t3FoldC1  = $request->input('t3FoldC1');
     $overseasfb->t4FoldC1  = $request->input('t4FoldC1');
     $overseasfb->t5FoldC1  = $request->input('t5FoldC1');
     $overseasfb->stat2FoldC1  = $request->input('stat2FoldC1');
     $overseasfb->flexi2FoldC1  = $request->input('flexi2FoldC1');
     $overseasfb->statFoldC1  = $request->input('statFoldC1');
     $overseasfb->flexiFoldC1  = $request->input('flexiFoldC1');

     $overseasfb->covSewC1  = $request->input('covSewC1');
     $overseasfb->t1SewC1  = $request->input('t1SewC1');
     $overseasfb->t2SewC1  = $request->input('t2SewC1');
     $overseasfb->t3SewC1  = $request->input('t3SewC1');
     $overseasfb->t4SewC1  = $request->input('t4SewC1');
     $overseasfb->t5SewC1  = $request->input('t5SewC1');
     $overseasfb->stat2SewC1  = $request->input('stat2SewC1');
     $overseasfb->flexi2SewC1  = $request->input('flexi2SewC1');
     $overseasfb->statSewC1  = $request->input('statSewC1');
     $overseasfb->flexiSewC1  = $request->input('flexiSewC1');

     $overseasfb->covBindC1  = $request->input('covBindC1');
     $overseasfb->t1BindC1  = $request->input('t1BindC1');
     $overseasfb->t2BindC1  = $request->input('t2BindC1');
     $overseasfb->t3BindC1  = $request->input('t3BindC1');
     $overseasfb->t4BindC1  = $request->input('t4BindC1');
     $overseasfb->t5BindC1  = $request->input('t5BindC1');
     $overseasfb->stat2BindC1  = $request->input('stat2BindC1');
     $overseasfb->flexi2BindC1  = $request->input('flexi2BindC1');
     $overseasfb->statBindC1  = $request->input('statBindC1');
     $overseasfb->flexiBindC1  = $request->input('flexiBindC1');

     $overseasfb->cov3C1  = $request->input('cov3C1');
     $overseasfb->t13C1  = $request->input('t13C1');
     $overseasfb->t23C1  = $request->input('t23C1');
     $overseasfb->t33C1  = $request->input('t33C1');
     $overseasfb->t43C1  = $request->input('t43C1');
     $overseasfb->t53C1  = $request->input('t53C1');
     $overseasfb->stat23C1  = $request->input('stat23C1');
     $overseasfb->flexi23C1  = $request->input('flexi23C1');
     $overseasfb->stat3C1  = $request->input('stat3C1');
     $overseasfb->flexi3C1  = $request->input('flexi3C1');

     $overseasfb->covPackC1  = $request->input('covPackC1');
     $overseasfb->t1PackC1  = $request->input('t1PackC1');
     $overseasfb->t2PackC1  = $request->input('t2PackC1');
     $overseasfb->t3PackC1  = $request->input('t3PackC1');
     $overseasfb->t4PackC1  = $request->input('t4PackC1');
     $overseasfb->t5PackC1  = $request->input('t5PackC1');
     $overseasfb->stat2PackC1  = $request->input('stat2PackC1');
     $overseasfb->flexi2PackC1  = $request->input('flexi2PackC1');
     $overseasfb->statPackC1  = $request->input('statPackC1');
     $overseasfb->flexiPackC1  = $request->input('flexiPackC1');

     $overseasfb->ccover  = $request->input('ccover');
     $overseasfb->ccoverready  = $request->input('ccoverready');
     $overseasfb->ccoverwaste  = $request->input('ccoverwaste');
     $overseasfb->flexicover  = $request->input('flexicover');
     $overseasfb->flexicoverready  = $request->input('flexicoverready');
     $overseasfb->flexicoverwaste  = $request->input('flexicoverwaste');
     $overseasfb->flexicover2  = $request->input('flexicover2');
     $overseasfb->flexicoverready2  = $request->input('flexicoverready2');
     $overseasfb->flexicoverwaste2  = $request->input('flexicoverwaste2');
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
     $overseasfb->ct4  = $request->input('ct4');
     $overseasfb->ct4ready  = $request->input('ct4ready');
     $overseasfb->ct4waste  = $request->input('ct4waste');
     $overseasfb->ct5  = $request->input('ct5');
     $overseasfb->ct5ready  = $request->input('ct5ready');
     $overseasfb->ct5waste  = $request->input('ct5waste');
     $overseasfb->csticker  = $request->input('csticker');
     $overseasfb->cstickerready  = $request->input('cstickerready');
     $overseasfb->cstickerwaste  = $request->input('cstickerwaste');
     $overseasfb->csticker2  = $request->input('csticker2');
     $overseasfb->cstickerready2  = $request->input('cstickerready2');
     $overseasfb->cstickerwaste2  = $request->input('cstickerwaste2');
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

     $overseasfb->colMakeFront1  = $request->input('colMakeFront1');
     $overseasfb->colMakeBack1  = $request->input('colMakeBack1');
     $overseasfb->colWaste1  = $request->input('colWaste1');

     $overseasfb->colMakeFront2  = $request->input('colMakeFront2');
     $overseasfb->colMakeBack2  = $request->input('colMakeBack2');
     $overseasfb->colWaste2  = $request->input('colWaste2');
     $overseasfb->save();

     $workorder = Workorder::where('sales_id', $sales->id)->first();
     $wotype = Wotype::where('typeofformula', '=', 'Overseas FB')->where('workorders_id', $workorder->id)->first();

     $wotype->covertotalqty =$overseasfb->ccoverready;
     $wotype->text1totallqty = $overseasfb->ct1ready ;
     $wotype->text2totalqty = $overseasfb->ct2ready ;
     $wotype->text3totalqty = $overseasfb->ct3ready ;
     $wotype->text4totalqty = $overseasfb->ct4ready ;
     $wotype->text5totalqty = $overseasfb->ct5ready ;
     $wotype->sticker1totalqty = $overseasfb->cstickerready ;
     $wotype->sticker2totalqty = $overseasfb->cstickerready2 ;
     $wotype->flexi1totalqty = $overseasfb->flexicoverready ;
     $wotype->flexi2totalqty = $overseasfb->flexicoverready2 ;
     $wotype->covertotalpaper = $overseasfb->ccoverwaste;
     $wotype->text1totallpaper = $overseasfb->ct1waste ;
     $wotype->text2totalpaper = $overseasfb->ct2waste ;
     $wotype->text3totalpaper = $overseasfb->ct3waste ;
     $wotype->text4totalpaper = $overseasfb->ct4waste ;
     $wotype->text5totalpaper = $overseasfb->ct5waste ;
     $wotype->sticker1totalpaper = $overseasfb->cstickerwaste ;
     $wotype->sticker2totalpaper = $overseasfb->cstickerwaste2 ;
     $wotype->flexi2totalpaper = $overseasfb->flexicoverwaste2 ;
     $wotype->flexi1totalpaper = $overseasfb->flexicoverwaste ;
     $wotype->save();

     // redirect
     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
   }

   public function boxes ($id)
   {
     $sales = Sales::find($id);
     return view('frontend.plan.boxes')->with('sales', $sales);
   }

   public function boxesstore($id, Request $request)
   {
     $sales = Sales::find($id);
     // $boxes = Boxes::where('sales_id',$sales->id)->first();
     $boxes = new Boxes;
     $boxes->sales_id = $sales->id;
     $boxes->typeofformula = 'Boxes';
     $boxes->workorders_id = $sales->workorders_id;

     $boxes->order1  = $request->input('order1');
     $boxes->order2  = $request->input('order2');
     $boxes->order3  = $request->input('order3');
     $boxes->order4  = $request->input('order4');
     $boxes->order1e  = $request->input('order1e');
     $boxes->order2e  = $request->input('order2e');
     $boxes->order3e  = $request->input('order3e');
     $boxes->order4e  = $request->input('order4e');
     $boxes->up1  = $request->input('up1');
     $boxes->up2  = $request->input('up2');
     $boxes->up3  = $request->input('up3');
     $boxes->up4  = $request->input('up4');
     $boxes->up1e  = $request->input('up1e');
     $boxes->up2e  = $request->input('up2e');
     $boxes->up3e  = $request->input('up3e');
     $boxes->up4e  = $request->input('up4e');
     $boxes->front2e  = $request->input('front2e');
     $boxes->front1e  = $request->input('front1e');
     $boxes->front2  = $request->input('front2');
     $boxes->front1  = $request->input('front1');
     $boxes->back1e  = $request->input('back1e');
     $boxes->back2e  = $request->input('back2e');
     $boxes->back1  = $request->input('back1');
     $boxes->back2  = $request->input('back2');
     $boxes->surf1  = $request->input('surf1');
     $boxes->surf2  = $request->input('surf2');
     $boxes->surf1e  = $request->input('surf1e');
     $boxes->surf2e  = $request->input('surf2e');
     $boxes->surf3e  = $request->input('surf3e');
     $boxes->surf4e  = $request->input('surf4e');
     $boxes->surf3  = $request->input('surf3');
     $boxes->surf4  = $request->input('surf4');
     $boxes->trim1  = $request->input('trim1');
     $boxes->trim2  = $request->input('trim2');
     $boxes->trim3  = $request->input('trim3');
     $boxes->trim4 = $request->input('trim4');
     $boxes->trim1e  = $request->input('trim1e');
     $boxes->trim2e  = $request->input('trim2e');
     $boxes->trim3e  = $request->input('trim3e');
     $boxes->trim4e = $request->input('trim4e');
     $boxes->flute1 = $request->input('flute1');
     $boxes->flute2  = $request->input('flute2');
     $boxes->flute3  = $request->input('flute3');
     $boxes->flute4  = $request->input('flute4');
     $boxes->flute1e = $request->input('flute1e');
     $boxes->flute2e  = $request->input('flute2e');
     $boxes->flute3e  = $request->input('flute3e');
     $boxes->flute4e  = $request->input('flute4e');
     $boxes->die1  = $request->input('die1');
     $boxes->die2  = $request->input('die2');
     $boxes->die3  = $request->input('die3');
     $boxes->die4  = $request->input('die4');
     $boxes->die1e  = $request->input('die1e');
     $boxes->die2e  = $request->input('die2e');
     $boxes->die3e  = $request->input('die3e');
     $boxes->die4e  = $request->input('die4e');
     $boxes->strip1  = $request->input('strip1');
     $boxes->strip2  = $request->input('strip2');
     $boxes->strip3  = $request->input('strip3');
     $boxes->strip4  = $request->input('strip4');
     $boxes->strip1e  = $request->input('strip1e');
     $boxes->strip2e  = $request->input('strip2e');
     $boxes->strip3e  = $request->input('strip3e');
     $boxes->strip4e  = $request->input('strip4e');
     $boxes->window1  = $request->input('window1');
     $boxes->window2  = $request->input('window2');
     $boxes->window3  = $request->input('window3');
     $boxes->window4  = $request->input('window4');
     $boxes->window1e  = $request->input('window1e');
     $boxes->window2e  = $request->input('window2e');
     $boxes->window3e  = $request->input('window3e');
     $boxes->window4e  = $request->input('window4e');
     $boxes->glue1  = $request->input('glue1');
     $boxes->glue2  = $request->input('glue2');
     $boxes->glue3  = $request->input('glue3');
     $boxes->glue4  = $request->input('glue4');
     $boxes->glue1e  = $request->input('glue1e');
     $boxes->glue2e  = $request->input('glue2e');
     $boxes->glue3e  = $request->input('glue3e');
     $boxes->glue4e  = $request->input('glue4e');
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
     $boxes->print11e  = $request->input('print11e');
     $boxes->print12e  = $request->input('print12e');
     $boxes->surf11e  = $request->input('surf11e');
     $boxes->surf12e  = $request->input('surf12e');
     $boxes->trim11e  = $request->input('trim11e');
     $boxes->trim12e = $request->input('trim12e');
     $boxes->trim13e  = $request->input('trim13e');
     $boxes->trim14e  = $request->input('trim14e');
     $boxes->flute11e  = $request->input('flute11e');
     $boxes->flute12e  = $request->input('flute12e');
     $boxes->flute13e  = $request->input('flute13e');
     $boxes->flute14e  = $request->input('flute14e');
     $boxes->die11e  = $request->input('die11e');
     $boxes->die12e  = $request->input('die12e');
     $boxes->die13e  = $request->input('die13e');
     $boxes->die14e  = $request->input('die14e');
     $boxes->strip11e  = $request->input('strip11e');
     $boxes->strip12e  = $request->input('strip12e');
     $boxes->strip13e  = $request->input('strip13e');
     $boxes->strip14e  = $request->input('strip14e');
     $boxes->window11e  = $request->input('window11e');
     $boxes->window12e  = $request->input('window12e');
     $boxes->window13e  = $request->input('window13e');
     $boxes->window14e  = $request->input('window14e');
     $boxes->glue11e  = $request->input('glue11e');
     $boxes->glue12e  = $request->input('glue12e');
     $boxes->glue13e  = $request->input('glue13e');
     $boxes->glue14e  = $request->input('glue14e');
     $boxes->pack11e  = $request->input('pack11e');
     $boxes->pack12e  = $request->input('pack12e');
     $boxes->pack13e  = $request->input('pack13e');
     $boxes->pack14e  = $request->input('pack14e');
     $boxes->wastecardC  = $request->input('wastecardC');
     $boxes->reqwastecardC  = $request->input('reqwastecardC');
     $boxes->paperwastecardC  = $request->input('paperwastecardC');
     $boxes->wastecardC1  = $request->input('wastecardC1');
     $boxes->reqwastecardC1  = $request->input('reqwastecardC1');
     $boxes->paperwastecardC1  = $request->input('paperwastecardC1');
     $boxes->wastecardB  = $request->input('wastecardB');
     $boxes->reqwastecardB  = $request->input('reqwastecardB');
     $boxes->paperwastecardB  = $request->input('paperwastecardB');
     $boxes->wastecardB1  = $request->input('wastecardB1');
     $boxes->reqwastecardB1  = $request->input('reqwastecardB1');
     $boxes->paperwastecardB1  = $request->input('paperwastecardB1');
     $boxes->wastefluteC  = $request->input('wastefluteC');
     $boxes->paperwastefluteC  = $request->input('paperwastefluteC');
     $boxes->wastefluteC1  = $request->input('wastefluteC1');
     $boxes->paperwastefluteC1  = $request->input('paperwastefluteC1');
     $boxes->wastefluteB  = $request->input('wastefluteB');
     $boxes->paperwastefluteB  = $request->input('paperwastefluteB');
     $boxes->wastefluteB1  = $request->input('wastefluteB1');
     $boxes->paperwastefluteB1  = $request->input('paperwastefluteB1');

     $boxes->some1  = $request->input('some1');
     $boxes->some2  = $request->input('some2');
     $boxes->some3  = $request->input('some3');
     $boxes->some11  = $request->input('some11');
     $boxes->some21  = $request->input('some21');
     $boxes->some31  = $request->input('some31');
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
     $boxes->users_id = Auth::user()->id;

     $boxes->save();

     $workorder = Workorder::where('sales_id', $sales->id)->first();

     $wotype = new Wotype;
     $wotype->workorders_id = $workorder->id;
     $wotype->typeofformula = 'Boxes';
     $wotype->card1colorreq = $boxes->reqwastecardC;
     $wotype->card1colorpaper = $boxes->paperwastecardC   ;
     $wotype->card1bwreq = $boxes->reqwastecardB  ;
     $wotype->card1bwpaper = $boxes->paperwastecardB  ;
     $wotype->card2colorreq = $boxes->reqwastecardC1;
     $wotype->card2colorpaper = $boxes->paperwastecardC1  ;
     $wotype->card2bwreq = $boxes->reqwastecardB1  ;
     $wotype->card2bwpaper = $boxes->paperwastecardB1  ;

     $wotype->flute1colorpaper = $boxes->paperwastefluteC  ;
     $wotype->flute2colorpaper = $boxes->paperwastefluteC1  ;
     $wotype->flute1bwpaper = $boxes->paperwastefluteB  ;
     $wotype->flute2bwpaper = $boxes->paperwastefluteB1  ;
     $wotype->save();

     // $workorder->wotypes_id = $wotype->id;
     $workorder->save();
     // redirect
     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
   }

   public function boxesedit ($id)
   {
     $boxes = Boxes::find($id);
     $sales = Sales::find($boxes->sales_id);
     return view('frontend.plan.boxesedit')->with('sales', $sales)->with('boxes', $boxes);
   }

   public function boxesupdate($id, Request $request)
   {
     $sales = Sales::find($id);
     $boxes = Boxes::where('sales_id',$sales->id)->first();

     $boxes->order1  = $request->input('order1');
     $boxes->order2  = $request->input('order2');
     $boxes->order3  = $request->input('order3');
     $boxes->order4  = $request->input('order4');
     $boxes->order1e  = $request->input('order1e');
     $boxes->order2e  = $request->input('order2e');
     $boxes->order3e  = $request->input('order3e');
     $boxes->order4e  = $request->input('order4e');
     $boxes->up1  = $request->input('up1');
     $boxes->up2  = $request->input('up2');
     $boxes->up3  = $request->input('up3');
     $boxes->up4  = $request->input('up4');
     $boxes->up1e  = $request->input('up1e');
     $boxes->up2e  = $request->input('up2e');
     $boxes->up3e  = $request->input('up3e');
     $boxes->up4e  = $request->input('up4e');
     $boxes->front2e  = $request->input('front2e');
     $boxes->front1e  = $request->input('front1e');
     $boxes->front2  = $request->input('front2');
     $boxes->front1  = $request->input('front1');
     $boxes->back1e  = $request->input('back1e');
     $boxes->back2e  = $request->input('back2e');
     $boxes->back1  = $request->input('back1');
     $boxes->back2  = $request->input('back2');
     $boxes->surf1  = $request->input('surf1');
     $boxes->surf2  = $request->input('surf2');
     $boxes->surf1e  = $request->input('surf1e');
     $boxes->surf2e  = $request->input('surf2e');
     $boxes->surf3e  = $request->input('surf3e');
     $boxes->surf4e  = $request->input('surf4e');
     $boxes->surf3  = $request->input('surf3');
     $boxes->surf4  = $request->input('surf4');
     $boxes->trim1  = $request->input('trim1');
     $boxes->trim2  = $request->input('trim2');
     $boxes->trim3  = $request->input('trim3');
     $boxes->trim4 = $request->input('trim4');
     $boxes->trim1e  = $request->input('trim1e');
     $boxes->trim2e  = $request->input('trim2e');
     $boxes->trim3e  = $request->input('trim3e');
     $boxes->trim4e = $request->input('trim4e');
     $boxes->flute1 = $request->input('flute1');
     $boxes->flute2  = $request->input('flute2');
     $boxes->flute3  = $request->input('flute3');
     $boxes->flute4  = $request->input('flute4');
     $boxes->flute1e = $request->input('flute1e');
     $boxes->flute2e  = $request->input('flute2e');
     $boxes->flute3e  = $request->input('flute3e');
     $boxes->flute4e  = $request->input('flute4e');
     $boxes->die1  = $request->input('die1');
     $boxes->die2  = $request->input('die2');
     $boxes->die3  = $request->input('die3');
     $boxes->die4  = $request->input('die4');
     $boxes->die1e  = $request->input('die1e');
     $boxes->die2e  = $request->input('die2e');
     $boxes->die3e  = $request->input('die3e');
     $boxes->die4e  = $request->input('die4e');
     $boxes->strip1  = $request->input('strip1');
     $boxes->strip2  = $request->input('strip2');
     $boxes->strip3  = $request->input('strip3');
     $boxes->strip4  = $request->input('strip4');
     $boxes->strip1e  = $request->input('strip1e');
     $boxes->strip2e  = $request->input('strip2e');
     $boxes->strip3e  = $request->input('strip3e');
     $boxes->strip4e  = $request->input('strip4e');
     $boxes->window1  = $request->input('window1');
     $boxes->window2  = $request->input('window2');
     $boxes->window3  = $request->input('window3');
     $boxes->window4  = $request->input('window4');
     $boxes->window1e  = $request->input('window1e');
     $boxes->window2e  = $request->input('window2e');
     $boxes->window3e  = $request->input('window3e');
     $boxes->window4e  = $request->input('window4e');
     $boxes->glue1  = $request->input('glue1');
     $boxes->glue2  = $request->input('glue2');
     $boxes->glue3  = $request->input('glue3');
     $boxes->glue4  = $request->input('glue4');
     $boxes->glue1e  = $request->input('glue1e');
     $boxes->glue2e  = $request->input('glue2e');
     $boxes->glue3e  = $request->input('glue3e');
     $boxes->glue4e  = $request->input('glue4e');
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
     $boxes->print11e  = $request->input('print11e');
     $boxes->print1e  = $request->input('print12e');
     $boxes->surf11e  = $request->input('surf11e');
     $boxes->surf12e  = $request->input('surf12e');
     $boxes->trim11e  = $request->input('trim11e');
     $boxes->trim12e = $request->input('trim12e');
     $boxes->trim13e  = $request->input('trim13e');
     $boxes->trim14e  = $request->input('trim14e');
     $boxes->flute11e  = $request->input('flute11e');
     $boxes->flute12e  = $request->input('flute12e');
     $boxes->flute13e  = $request->input('flute13e');
     $boxes->flute14e  = $request->input('flute14e');
     $boxes->die11e  = $request->input('die11e');
     $boxes->die12e  = $request->input('die12e');
     $boxes->die13e  = $request->input('die13e');
     $boxes->die14e  = $request->input('die14e');
     $boxes->strip11e  = $request->input('strip11e');
     $boxes->strip12e  = $request->input('strip12e');
     $boxes->strip13e  = $request->input('strip13e');
     $boxes->strip14e  = $request->input('strip14e');
     $boxes->window11e  = $request->input('window11e');
     $boxes->window12e  = $request->input('window12e');
     $boxes->window13e  = $request->input('window13e');
     $boxes->window14e  = $request->input('window14e');
     $boxes->glue11e  = $request->input('glue11e');
     $boxes->glue12e  = $request->input('glue12e');
     $boxes->glue13e  = $request->input('glue13e');
     $boxes->glue14e  = $request->input('glue14e');
     $boxes->pack11e  = $request->input('pack11e');
     $boxes->pack12e  = $request->input('pack12e');
     $boxes->pack13e  = $request->input('pack13e');
     $boxes->pack14e  = $request->input('pack14e');
     $boxes->wastecardC  = $request->input('wastecardC');
     $boxes->reqwastecardC  = $request->input('reqwastecardC');
     $boxes->paperwastecardC  = $request->input('paperwastecardC');
     $boxes->wastecardC1  = $request->input('wastecardC1');
     $boxes->reqwastecardC1  = $request->input('reqwastecardC1');
     $boxes->paperwastecardC1  = $request->input('paperwastecardC1');
     $boxes->wastecardB  = $request->input('wastecardB');
     $boxes->reqwastecardB  = $request->input('reqwastecardB');
     $boxes->paperwastecardB  = $request->input('paperwastecardB');
     $boxes->wastecardB1  = $request->input('wastecardB1');
     $boxes->reqwastecardB1  = $request->input('reqwastecardB1');
     $boxes->paperwastecardB1  = $request->input('paperwastecardB1');
     $boxes->wastefluteC  = $request->input('wastefluteC');
     $boxes->paperwastefluteC  = $request->input('paperwastefluteC');
     $boxes->wastefluteC1  = $request->input('wastefluteC1');
     $boxes->paperwastefluteC1  = $request->input('paperwastefluteC1');
     $boxes->wastefluteB  = $request->input('wastefluteB');
     $boxes->paperwastefluteB  = $request->input('paperwastefluteB');
     $boxes->wastefluteB1  = $request->input('wastefluteB1');
     $boxes->paperwastefluteB1  = $request->input('paperwastefluteB1');

     $boxes->some1  = $request->input('some1');
     $boxes->some2  = $request->input('some2');
     $boxes->some3  = $request->input('some3');
     $boxes->some11  = $request->input('some11');
     $boxes->some21  = $request->input('some21');
     $boxes->some31  = $request->input('some31');
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
     $boxes->users_id = Auth::user()->id;
     $boxes->totalqty = $request->input('reqwastecardC')+$request->input('reqwastecardB');
     $boxes->totalpaper = $request->input('paperwastecardC')+$request->input('paperwastecardB')+$request->input('paperwastefluteC')+$request->input('paperwastefluteB');

     $boxes->save();

     $workorder = Workorder::where('sales_id', $sales->id)->first();
     $wotype->card1colorreq = $boxes->reqwastecardC;
     $wotype->card1colorpaper = $boxes->paperwastecardC   ;
     $wotype->card1bwreq = $boxes->reqwastecardB  ;
     $wotype->card1bwpaper = $boxes->paperwastecardB  ;
     $wotype->card2colorreq = $boxes->reqwastecardC1;
     $wotype->card2colorpaper = $boxes->paperwastecardC1  ;
     $wotype->card2bwreq = $boxes->reqwastecardB1  ;
     $wotype->card2bwpaper = $boxes->paperwastecardB1  ;

     $wotype->flute1colorpaper = $boxes->paperwastefluteC  ;
     $wotype->flute2colorpaper = $boxes->paperwastefluteC1  ;
     $wotype->flute1bwpaper = $boxes->paperwastefluteB  ;
     $wotype->flute2bwpaper = $boxes->paperwastefluteB1  ;
     $wotype->save();

     // redirect
     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
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
     $plannings->typeofformula = 'Planning';
     $plannings->workorders_id = $sales->workorders_id;

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
     $plannings->users_id = Auth::user()->id;

     $plannings->save();

     $workorder = Workorder::where('sales_id', $sales->id)->first();

     $wotype = new Wotype;
     $wotype->workorders_id = $workorder->id;
     $wotype->typeofformula = 'Planning';
     $wotype->paper_sup = '';
     $wotype->printqty = '' ;
     $wotype->save();

     // $workorder->wotypes_id = $wotype->id;
     $workorder->save();

     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
   }

   public function planningedit ($id)
   {
     $plannings = Planning::find($id);
     $sales = Sales::find($plannings->sales_id);
     return view('frontend.plan.planningedit')->with('sales', $sales)->with('plannings', $plannings);
   }

   public function planningupdate($id, Request $request)
   {
     $sales = Sales::find($id);
     $plannings = Planning::where('sales_id',$sales->id)->first();

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
     $plannings->users_id = Auth::user()->id;

     $plannings->save();

     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
   }

   public function listformula()
   {
     $workorder = Workorder::all();
     $wotype = Wotype::all();
     $sales = Sales::all();
     return view('frontend.plan.listformula')->with('sales', $sales)->with('workorder', $workorder)->with('wotype', $wotype);
   }

   public function formulatable()
   {
     $workorder = Workorder::leftJoin('sales', 'workorders.sales_id', '=', 'sales.id')
     ->leftJoin('items', 'sales.items_id', 'items.id')
     ->select(['sales.wid','sales.custName', 'items.partNo', 'workorders.id'])
     ->where('sales.finish', '=', 'complete');
     return Datatables::of($workorder)
       ->editColumn('id', function ($workorder) {
       //return $sales->action_buttons;
       return '
       <a href="'. route('frontend.plan.addremark', $workorder->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus data-toggle="tooltip" title="Add"></i></a>
       ';
     })
     ->escapeColumns([])
     ->make();
   }

   public function addremark($id)
   {
     $workorder = Workorder::find($id);
     $wotype = Wotype::where('workorders_id', $workorder->id)->get();
     $prodqads = Prodqads::where('wid', $workorder->wid)->first();
     $comments = Comment::where('item_number', $workorder->sales->items->partNo)->first();
     $remark = Remark::where('workorder', $workorder->wo_number)->where('wid', $workorder->wid)->first();

     $resultc = '0';
     $resultc1 = '0';
     $resultt1 = '0';
     $resultt11 = '0';
     $resultt2 = '0';
     $resultt21 = '0';
     $resultt3 = '0';
     $resultt31 = '0';
     $resultt4 = '0';
     $resultt41 = '0';
     $resultt5 = '0';
     $resultt51 = '0';
     $results1 = '0';
     $results11 = '0';
     $results2 = '0';
     $results21 = '0';
     $resultf1 = '0';
     $resultf11 = '0';
     $resultf2 = '0';
     $resultf21 = '0';
     $resultb = '0';
     $resultb1 = '0';

     foreach ($wotype as $wotypes){
     if ($wotypes->typeofformula == 'Boxes')
     {
         $boxes = Boxes::where('workorders_id', $workorder->id)->first();

         if ($wotypes->card1colorreq != 0)
         {
           $resultb = $wotypes->card1colorreq.' \'s X '. $boxes->up1   .' UP';
           $resultb1 =$wotypes->card1colorpaper.' \'s X '. $boxes->up1   .' UP';
         }
         if ($wotypes->card2colorreq != 0)
         {
           $resultb = $wotypes->card2colorreq.' \'s X '. $boxes->up1   .' UP';
           $resultb1 =$wotypes->card2colorpaper.' \'s X '. $boxes->up1   .' UP';
         }
         if ($wotypes->card1bwreq != 0)
         {
           $resultb = $wotypes->card1bwreq.' \'s X '. $boxes->up3   .' UP';
           $resultb1 = $wotypes->card1bwpaper.' \'s X '. $boxes->up3   .' UP';
         }
         if ($wotypes->card2bwreq != 0)
         {
           $resultb = $wotypes->card2bwreq.' \'s X '. $boxes->up3   .' UP';
           $resultb1 = $wotypes->card2bwpaper.' \'s X '. $boxes->up3   .' UP';
         }
         if ($wotypes->flute1colorpaper != 0)
         {
           $resultb = $wotypes->flute1colorpaper.' \'s X '. $boxes->up1e   .' UP';
         }
         if ($wotypes->flute2colorpaper != 0)
         {
           $resultb = $wotypes->flute2colorpaper.' \'s X '. $boxes->up2e   .' UP';
         }
         if ($wotypes->flute1bwpaper != 0)
         {
           $resultb = $wotypes->flute1bwpaper.' \'s X '. $boxes->up3e   .' UP';
         }
         if ($wotypes->flute2bwpaper != 0)
         {
           $resultb = $wotypes->flute2bwpaper.' \'s X '. $boxes->up4e   .' UP';
         }
     }
     else
     {
         if ($wotypes->covertotalqty != 0)
         {
            if ($wotypes->typeofformula == 'Soft Cover')
            {
              $softcover = SoftCover::where('workorders_id', $workorder->id)->first();
              if ($softcover->covOrderC != 0)
              {
                $resultc = $wotypes->covertotalqty.' \'s X '. $softcover->covUpC   .' UP';
                $resultc1 = $wotypes->covertotalpaper.'\'s';
              }
              if($softcover->covOrderB !=0)
              {
                $resultc = $wotypes->covertotalqty.' \'s X '. $softcover->covUpB   .' UP';
                $resultc1 = $wotypes->covertotalpaper.'\'s';
              }

            }
            if ($wotypes->typeofformula =='Soft Cover BW')
            {
              $softcoverbw = Softcoverbw::where('workorders_id', $workorder->id)->first();
              $resultc = $wotypes->covertotalqty.' \'s X '. $softcoverbw->covUpB   .' UP';
              $resultc1 = $wotypes->covertotalpaper.'\'s';
            }
            if ($wotypes->typeofformula =='Overseas FB')
            {
              $overseasfb = Overseasfb::where('workorders_id', $workorder->id)->first();
              $resultc = $wotypes->covertotalqty.' \'s X '. $overseasfb->covUpC   .' UP';
              $resultc1 = $wotypes->covertotalpaper.'\'s';
            }
            if ($wotypes->typeofformula =='Overseas WT')
            {
              $overseaswt = Overseaswt::where('workorders_id', $workorder->id)->first();
              $resultc = $wotypes->covertotalqty.' \'s X '. $overseaswt->covUpC   .' UP';
              $resultc1 = $wotypes->covertotalpaper.'\'s';
            }

         }

         if ($wotypes->text1totallqty != 0)
         {
           if ($wotypes->typeofformula == 'Soft Cover')
           {
             $softcover = SoftCover::where('workorders_id', $workorder->id)->first();
             if($softcover->t1OrderC != 0)
             {
               $resultt1 = $wotypes->text1totallqty.' \'s X '. $softcover->t1UpC   .' UP [ X 4 SIGNATURE] - 32PP';
               $resultt11 = $wotypes->text1totallpaper.'\'s';
             }
             if($softcover->t1OrderB != 0)
             {
               $resultt1 = $wotypes->text1totallqty.' \'s X '. $softcover->t1UpB   .' UP [ X 4 SIGNATURE] - 32PP';
               $resultt11 = $wotypes->text1totallpaper.'\'s';
             }

           }
           if ($wotypes->typeofformula =='Soft Cover BW')
           {
             $softcoverbw = Softcoverbw::where('workorders_id', $workorder->id)->first();
             $resultt1 = $wotypes->text1totallqty.' \'s X '. $softcoverbw->t1UpC   .' UP [ X 4 SIGNATURE] - 32PP';
             $resultt11 = $wotypes->text1totallpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas FB')
           {
             $overseasfb = Overseasfb::where('workorders_id', $workorder->id)->first();
             $resultt1 = $wotypes->text1totallqty.' \'s X '. $overseasfb->t1UpC   .' UP [ X 4 SIGNATURE] - 32PP';
             $resultt11 = $wotypes->text1totallpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas WT')
           {
             $overseaswt = Overseaswt::where('workorders_id', $workorder->id)->first();
             $resultt1 = $wotypes->text1totallqty.' \'s X '. $overseaswt->t1UpC   .' UP [ X 4 SIGNATURE] - 32PP';
             $resultt11 = $wotypes->text1totallpaper.'\'s';
           }
         }

         if ($wotypes->text2totalqty != 0)
         {
           if ($wotypes->typeofformula == 'Soft Cover')
           {
             $softcover = SoftCover::where('workorders_id', $workorder->id)->first();
             if ($softcover->t2OrderC != 0)
             {
               $resultt2 = $wotypes->text2totalqty.' \'s X '. $softcover->t2UpC   ;
               $resultt21 = $wotypes->text2totalpaper.'\'s';
             }
             if ($softcover->t2OrderB != 0)
             {
               $resultt2 = $wotypes->text2totalqty.' \'s X '. $softcover->t2UpB   ;
               $resultt21 = $wotypes->text2totalpaper.'\'s';
             }

           }
           if ($wotypes->typeofformula =='Soft Cover BW')
           {
             $softcoverbw = Softcoverbw::where('workorders_id', $workorder->id)->first();
             $resultt2 = $wotypes->text2totalqty.' \'s X '. $softcoverbw->t2UpC   ;
             $resultt21 = $wotypes->text2totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas FB')
           {
             $overseasfb = Overseasfb::where('workorders_id', $workorder->id)->first();
             $resultt2 = $wotypes->text2totalqty.' \'s X '. $overseasfb->t2UpC   ;
             $resultt21 = $wotypes->text2totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas WT')
           {
             $overseaswt = Overseaswt::where('workorders_id', $workorder->id)->first();
             $resultt2 = $wotypes->text2totalqty.' \'s X '. $overseaswt->t2UpC   ;
             $resultt21 = $wotypes->text2totalpaper.'\'s';
           }
         }

         if ($wotypes->text3totalqty != 0)
         {
           if ($wotypes->typeofformula == 'Soft Cover')
           {
             $softcover = SoftCover::where('workorders_id', $workorder->id)->first();
             if ($softcover->t3OrderC != 0)
             {
               $resultt3 = $wotypes->text3totalqty.' \'s X '. $softcover->t3UpC   .' UP';
               $resultt31 = $wotypes->text3totalpaper.'\'s';
             }
             if ($softcover->t3OrderB != 0)
             {
               $resultt3 = $wotypes->text3totalqty.' \'s X '. $softcover->t3UpB   .' UP';
               $resultt31 = $wotypes->text3totalpaper.'\'s';
             }
           }
           if ($wotypes->typeofformula =='Soft Cover BW')
           {
             $softcoverbw = Softcoverbw::where('workorders_id', $workorder->id)->first();
             $resultt3 = $wotypes->text3totalqty.' \'s X '. $softcoverbw->t3UpB   .' UP ';
             $resultt31 = $wotypes->text3totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas FB')
           {
             $overseasfb = Overseasfb::where('workorders_id', $workorder->id)->first();
             $resultt3 = $wotypes->text3totalqty.' \'s X '. $overseasfb->t3UpC   .' UP ';
             $resultt31 = $wotypes->text3totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas WT')
           {
             $overseaswt = Overseaswt::where('workorders_id', $workorder->id)->first();
             $resultt3 = $wotypes->text3totalqty.' \'s X '. $overseaswt->t3UpC   .' UP';
             $resultt31 = $wotypes->text3totalpaper.'\'s';
           }
         }

         if ($wotypes->text4totalqty != 0)
         {
           if ($wotypes->typeofformula == 'Soft Cover')
           {
             $softcover = SoftCover::where('workorders_id', $workorder->id)->first();
             if ($softcover->t4OrderC != 0)
             {
               $resultt4 = $wotypes->text4totalqty.' \'s X '. $softcover->t4UpC   ;
               $resultt41 = $wotypes->text4totalpaper.'\'s';
             }
             if ($softcover->t2OrderB != 0)
             {
               $resultt4 = $wotypes->text4totalqty.' \'s X '. $softcover->t4UpB   ;
               $resultt41 = $wotypes->text4totalpaper.'\'s';
             }

           }
           if ($wotypes->typeofformula =='Soft Cover BW')
           {
             $softcoverbw = Softcoverbw::where('workorders_id', $workorder->id)->first();
             $resultt4 = $wotypes->text4totalqty.' \'s X '. $softcoverbw->t4UpC   ;
             $resultt41 = $wotypes->text4totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas FB')
           {
             $overseasfb = Overseasfb::where('workorders_id', $workorder->id)->first();
             $resultt4 = $wotypes->text4totalqty.' \'s X '. $overseasfb->t4UpC   ;
             $resultt41 = $wotypes->text4totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas WT')
           {
             $overseaswt = Overseaswt::where('workorders_id', $workorder->id)->first();
             $resultt4 = $wotypes->text4totalqty.' \'s X '. $overseaswt->t4UpC   ;
             $resultt41 = $wotypes->text4totalpaper.'\'s';
           }
         }

         if ($wotypes->text5totalqty != 0)
         {
           if ($wotypes->typeofformula == 'Soft Cover')
           {
             $softcover = SoftCover::where('workorders_id', $workorder->id)->first();
             if ($softcover->t5OrderC != 0)
             {
               $resultt5 = $wotypes->text5totalqty.' \'s X '. $softcover->t5UpC   ;
               $resultt51 = $wotypes->text5totalpaper.'\'s';
             }
             if ($softcover->t5OrderB != 0)
             {
               $resultt5 = $wotypes->text5totalqty.' \'s X '. $softcover->t5UpB   ;
               $resultt51 = $wotypes->text5totalpaper.'\'s';
             }

           }
           if ($wotypes->typeofformula =='Soft Cover BW')
           {
             $softcoverbw = Softcoverbw::where('workorders_id', $workorder->id)->first();
             $resultt5 = $wotypes->text5totalqty.' \'s X '. $softcoverbw->t5UpC   ;
             $resultt51 = $wotypes->text5totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas FB')
           {
             $overseasfb = Overseasfb::where('workorders_id', $workorder->id)->first();
             $resultt5 = $wotypes->text5totalqty.' \'s X '. $overseasfb->t5UpC   ;
             $resultt51 = $wotypes->text5totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas WT')
           {
             $overseaswt = Overseaswt::where('workorders_id', $workorder->id)->first();
             $resultt5 = $wotypes->text5totalqty.' \'s X '. $overseaswt->t5UpC   ;
             $resultt51 = $wotypes->text5totalpaper.'\'s';
           }
         }

         if ($wotypes->sticker1totalqty != 0)
         {
           if ($wotypes->typeofformula == 'Soft Cover')
           {
             $softcover = SoftCover::where('workorders_id', $workorder->id)->first();
             if($softcover->statOrderC !=0)
             {
               $results1 = $wotypes->sticker1totalqty.' \'s X '. $softcover->statUpC   ;
               $results11 = $wotypes->sticker1totalpaper.'\'s';
             }
             if ($softcover->statOrderB !=0)
             {
               $results1 = $wotypes->sticker1totalqty.' \'s X '. $softcover->statUpB   ;
               $results11 = $wotypes->sticker1totalpaper.'\'s';
             }

           }
           if ($wotypes->typeofformula =='Soft Cover BW')
           {
             $softcoverbw = Softcoverbw::where('workorders_id', $workorder->id)->first();
             $results1 = $wotypes->sticker1totalqty.' \'s X '. $softcoverbw->statUpC   ;
             $results11 = $wotypes->sticker1totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas FB')
           {
             $overseasfb = Overseasfb::where('workorders_id', $workorder->id)->first();
             $results1 = $wotypes->sticker1totalqty.' \'s X '. $overseasfb->statUpC   ;
             $results11 = $wotypes->sticker1totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas WT')
           {
             $overseaswt = Overseaswt::where('workorders_id', $workorder->id)->first();
             $results1 = $wotypes->sticker1totalqty.' \'s X '. $overseaswt->statUpC   ;
             $results11 = $wotypes->sticker1totalpaper.'\'s';
           }
         }

         if ($wotypes->sticker2totalqty != 0)
         {
           if ($wotypes->typeofformula =='Overseas FB')
           {
             $overseasfb = Overseasfb::where('workorders_id', $workorder->id)->first();
             $results1 = $wotypes->sticker2totalqty.' \'s X '. $overseasfb->stat2UpC   ;
             $results21 = $wotypes->sticker2totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas WT')
           {
             $overseaswt = Overseaswt::where('workorders_id', $workorder->id)->first();
             $results2 = $wotypes->sticker2totalqty.' \'s X '. $overseaswt->stat2UpC   ;
             $results21 = $wotypes->sticker2totalpaper.'\'s';
           }
         }

         if ($wotypes->flexi1totalqty != 0)
         {
           if ($wotypes->typeofformula =='Overseas FB')
           {
             $overseasfb = Overseasfb::where('workorders_id', $workorder->id)->first();
             $resultf1 = $wotypes->flexi1totalqty.' \'s X '. $overseasfb->flexiUpC   ;
             $resultf11 = $wotypes->flexi1totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas WT')
           {
             $overseaswt = Overseaswt::where('workorders_id', $workorder->id)->first();
             $resultf1 = $wotypes->flexi1totalqty.' \'s X '. $overseaswt->flexiUpC   ;
             $resultf11 = $wotypes->flexi1totalpaper.'\'s';
           }
         }
         if ($wotypes->flexi2totalqty != 0)
         {
           if ($wotypes->typeofformula =='Overseas FB')
           {
             $overseasfb = Overseasfb::where('workorders_id', $workorder->id)->first();
             $resultf2 = $wotypes->flexi2totalqty.' \'s X '. $overseasfb->flexi2UpC   ;
             $resultf21 = $wotypes->flexi2totalpaper.'\'s';
           }
           if ($wotypes->typeofformula =='Overseas WT')
           {
             $overseaswt = Overseaswt::where('workorders_id', $workorder->id)->first();
             $resultf2 = $wotypes->flexi2totalqty.' \'s X '. $overseaswt->flexi2UpC   ;
             $resultf21 = $wotypes->flexi2totalpaper.'\'s';
           }
         }
       }
     }
     $sales = Sales::find($workorder->sales_id);
     return view('frontend.plan.addremark')
     ->with('workorder',$workorder)
     ->with('sales', $sales)
     ->with('wotype', $wotype)
     ->with('resultc', $resultc)
     ->with('resultc1', $resultc1)
     ->with('resultt1', $resultt1)
     ->with('resultt11', $resultt11)
     ->with('resultt2', $resultt2)
     ->with('resultt21', $resultt21)
     ->with('resultt3', $resultt3)
     ->with('resultt31', $resultt31)
     ->with('resultt4', $resultt4)
     ->with('resultt41', $resultt41)
     ->with('resultt5', $resultt5)
     ->with('resultt51', $resultt51)
     ->with('results1', $results1)
     ->with('results11', $results11)
     ->with('results2', $results2)
     ->with('results21', $results21)
     ->with('resultf1', $resultf1)
     ->with('resultf11', $resultf11)
     ->with('resultf2', $resultf2)
     ->with('resultf21', $resultf21)
     ->with('resultb', $resultb)
     ->with('resultb1', $resultb1)
     ->with('comments', $comments)
     ->with('prodqads', $prodqads)
     ->with('remark', $remark);

   }

   public function remarkstore($id, Request $request)
   {
     $value = $request->input('create');
     $workorder = Workorder::find($id);
     $sales = Sales::find($workorder->sales_id);

     if ($value == 'Save')
     {
       $remark = new Remark;
       $remark->workorders_id = $workorder->id;
       $remark->workorder  = $workorder->wo_number;
       $remark->wid  = $workorder->wid;
       $remark->batch  = $sales->batch;
       $remark->partNo  = $sales->items->partNo;
       $remark->partDesc  = $sales->items->partDesc;
       // $remark->partDesc2  = $sales->items->partDesc2;
       $remark->quantity_ordered  = $sales->items->quantity;
       $remark->custName  =$sales->custName;
       $remark->due_date  =$workorder->due_date;
       $remark->salesjob  = $sales->salesorder;
       $remark->deliverto  = $request->input('deliverto');
       $remark->noPage  = $request->input('noPage');
       $remark->model  = $request->input('model');
       $remark->covername = $request->input('covername');
       $remark->coverqty = $request->input('coverqty');
       $remark->coverpaper = $request->input('coverpaper');
       $remark->t1name = $request->input('t1name');
       $remark->t1qty = $request->input('t1qty');
       $remark->t1paper = $request->input('t1paper');
       $remark->t2name = $request->input('t2name');
       $remark->t2qty = $request->input('t2qty');
       $remark->t2paper = $request->input('t2paper');
       $remark->t3name = $request->input('t3name');
       $remark->t3qty = $request->input('t3qty');
       $remark->t3paper = $request->input('t3paper');
       $remark->t4name = $request->input('t4name');
       $remark->t4qty = $request->input('t4qty');
       $remark->t4paper = $request->input('t4paper');
       $remark->t5name = $request->input('t5name');
       $remark->t5qty = $request->input('t5qty');
       $remark->t5paper = $request->input('t5paper');
       $remark->stick1name = $request->input('stick1name');
       $remark->stick1qty = $request->input('stick1qty');
       $remark->stick1paper = $request->input('stick1paper');
       $remark->stick2name = $request->input('stick2name');
       $remark->stick2qty = $request->input('stick2qty');
       $remark->stick2paper = $request->input('stick2paper');
       $remark->flexi1name = $request->input('flexi1name');
       $remark->flexi1qty = $request->input('flexi1qty');
       $remark->flexi1paper = $request->input('flexi1paper');
       $remark->flexi2name = $request->input('flexi2name');
       $remark->flexi2qty = $request->input('flexi2qty');
       $remark->flexi2paper = $request->input('flexi2paper');
       $remark->size  = $request->input('size');
       $remark->remarks  = $request->input('remarks');
       $remark->remarkqad = $request->input('remarkqad');
       $remark->boxespaper  = $request->input('boxespaper');
       $remark->boxesprinting  = $request->input('boxesprinting');
       $remark->status_save = 'Save';
       $remark->save();

     }
     else
     {
       $remark = new Remark;
       $remark->workorders_id = $workorder->id;
       $remark->workorder  = $workorder->wo_number;
       $remark->wid  = $workorder->wid;
       $remark->batch  = $sales->batch;
       $remark->partNo  = $sales->items->partNo;
       $remark->partDesc  = $sales->items->partDesc;
       // $remark->partDesc2  = $sales->items->partDesc2;
       $remark->quantity_ordered  = $sales->items->quantity;
       $remark->custName  =$sales->custName;
       $remark->due_date  =$workorder->due_date;
       $remark->salesjob  = $sales->salesorder;
       $remark->deliverto  = $request->input('deliverto');
       $remark->noPage  = $request->input('noPage');
       $remark->model  = $request->input('model');
       $remark->covername = $request->input('covername');
       $remark->coverqty = $request->input('coverqty');
       $remark->coverpaper = $request->input('coverpaper');
       $remark->t1name = $request->input('t1name');
       $remark->t1qty = $request->input('t1qty');
       $remark->t1paper = $request->input('t1paper');
       $remark->t2name = $request->input('t2name');
       $remark->t2qty = $request->input('t2qty');
       $remark->t2paper = $request->input('t2paper');
       $remark->t3name = $request->input('t3name');
       $remark->t3qty = $request->input('t3qty');
       $remark->t3paper = $request->input('t3paper');
       $remark->t4name = $request->input('t4name');
       $remark->t4qty = $request->input('t4qty');
       $remark->t4paper = $request->input('t4paper');
       $remark->t5name = $request->input('t5name');
       $remark->t5qty = $request->input('t5qty');
       $remark->t5paper = $request->input('t5paper');
       $remark->stick1name = $request->input('stick1name');
       $remark->stick1qty = $request->input('stick1qty');
       $remark->stick1paper = $request->input('stick1paper');
       $remark->stick2name = $request->input('stick2name');
       $remark->stick2qty = $request->input('stick2qty');
       $remark->stick2paper = $request->input('stick2paper');
       $remark->flexi1name = $request->input('flexi1name');
       $remark->flexi1qty = $request->input('flexi1qty');
       $remark->flexi1paper = $request->input('flexi1paper');
       $remark->flexi2name = $request->input('flexi2name');
       $remark->flexi2qty = $request->input('flexi2qty');
       $remark->flexi2paper = $request->input('flexi2paper');
       $remark->size  = $request->input('size');
       // $remark->remarks  = $request->input('remarks');
       $remark->remarkqad = $request->input('remarkqad');
       $remark->boxespaper  = $request->input('boxespaper');
       $remark->boxesprinting  = $request->input('boxesprinting');
       $remark->status_save = 'Create';
       $remark->save();

     }



     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
   }

   public function updateremark($id, Request $request)
   {
     $workorder = Workorder::find($id);
     $sales = Sales::find($workorder->sales_id);
     $remark = Remark::where('workorder', $workorder->wo_number)->where('wid', $workorder->wid)->first();
     $value = $request->input('create');

     if ($value == 'Save')
     {

       $remark->noPage  = $request->input('noPage');
       $remark->model  = $request->input('model');
       $remark->covername = $request->input('covername');
       $remark->coverqty = $request->input('coverqty');
       $remark->coverpaper = $request->input('coverpaper');
       $remark->t1name = $request->input('t1name');
       $remark->t1qty = $request->input('t1qty');
       $remark->t1paper = $request->input('t1paper');
       $remark->t2name = $request->input('t2name');
       $remark->t2qty = $request->input('t2qty');
       $remark->t2paper = $request->input('t2paper');
       $remark->t3name = $request->input('t3name');
       $remark->t3qty = $request->input('t3qty');
       $remark->t3paper = $request->input('t3paper');
       $remark->t4name = $request->input('t4name');
       $remark->t4qty = $request->input('t4qty');
       $remark->t4paper = $request->input('t4paper');
       $remark->t5name = $request->input('t5name');
       $remark->t5qty = $request->input('t5qty');
       $remark->t5paper = $request->input('t5paper');
       $remark->stick1name = $request->input('stick1name');
       $remark->stick1qty = $request->input('stick1qty');
       $remark->stick1paper = $request->input('stick1paper');
       $remark->stick2name = $request->input('stick2name');
       $remark->stick2qty = $request->input('stick2qty');
       $remark->stick2paper = $request->input('stick2paper');
       $remark->flexi1name = $request->input('flexi1name');
       $remark->flexi1qty = $request->input('flexi1qty');
       $remark->flexi1paper = $request->input('flexi1paper');
       $remark->flexi2name = $request->input('flexi2name');
       $remark->flexi2qty = $request->input('flexi2qty');
       $remark->flexi2paper = $request->input('flexi2paper');
       $remark->size  = $request->input('size');
       $remark->remarks  = $request->input('remarks');
       $remark->remarkqad = $request->input('remarkqad');
       $remark->boxespaper  = $request->input('boxespaper');
       $remark->boxesprinting  = $request->input('boxesprinting');
       $remark->status_save = 'Save';
     }
     else
     {
       $remark->noPage  = $request->input('noPage');
       $remark->model  = $request->input('model');
       $remark->covername = $request->input('covername');
       $remark->coverqty = $request->input('coverqty');
       $remark->coverpaper = $request->input('coverpaper');
       $remark->t1name = $request->input('t1name');
       $remark->t1qty = $request->input('t1qty');
       $remark->t1paper = $request->input('t1paper');
       $remark->t2name = $request->input('t2name');
       $remark->t2qty = $request->input('t2qty');
       $remark->t2paper = $request->input('t2paper');
       $remark->t3name = $request->input('t3name');
       $remark->t3qty = $request->input('t3qty');
       $remark->t3paper = $request->input('t3paper');
       $remark->t4name = $request->input('t4name');
       $remark->t4qty = $request->input('t4qty');
       $remark->t4paper = $request->input('t4paper');
       $remark->t5name = $request->input('t5name');
       $remark->t5qty = $request->input('t5qty');
       $remark->t5paper = $request->input('t5paper');
       $remark->stick1name = $request->input('stick1name');
       $remark->stick1qty = $request->input('stick1qty');
       $remark->stick1paper = $request->input('stick1paper');
       $remark->stick2name = $request->input('stick2name');
       $remark->stick2qty = $request->input('stick2qty');
       $remark->stick2paper = $request->input('stick2paper');
       $remark->flexi1name = $request->input('flexi1name');
       $remark->flexi1qty = $request->input('flexi1qty');
       $remark->flexi1paper = $request->input('flexi1paper');
       $remark->flexi2name = $request->input('flexi2name');
       $remark->flexi2qty = $request->input('flexi2qty');
       $remark->flexi2paper = $request->input('flexi2paper');
       $remark->size  = $request->input('size');
       // $remark->remarks  = $request->input('remarks');
       $remark->remarkqad = $request->input('remarkqad');
       $remark->boxespaper  = $request->input('boxespaper');
       $remark->boxesprinting  = $request->input('boxesprinting');
       $remark->status_save = 'Create';
     }


     $remark->save();

     return redirect()->route('frontend.plan.listformula')->withFlashSuccess('The data is saved.');
   }

    public function listsales()
    {
     $sales = Sales::all();
     $prodqads = Prodqads::all();
     return view('frontend.plan.listsales')->with('sales', $sales)->with('prodqads', $prodqads);
    }

    public function prodtable()
    {
      $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
      ->select(['sales.wid','sales.custName', 'items.partNo', 'items.partDesc', 'sales.id','sales.prodremark'])
      ->where('sales.finish', '=', 'complete' )
      ->where('sales.planning_bom', '=', 'Y');

      return Datatables::of($sales)
        ->editColumn('id', function ($sales) {
          if ($sales->prodremark == null){
            return '<a href="'. route('frontend.plan.production', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add New"></i></a>
               ';
          }
          else {
            return '<a href="'. route('frontend.plan.viewproduction', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View"></i></a>
            <a href="'. route('frontend.plan.editproduction', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>';
          }
      })
      ->escapeColumns([])
      ->make();
    }

    public function viewproduction($id)
    {
      $sales = Sales::find($id);
      $production = Production::where('sales_id', $sales->id)->first();
      $stations = Station::where('sales_id', $sales->id)->get();
      $prodqads = Prodqads::where('item_number', $sales->items->partNo)->where('wid', $sales->wid)->get();
      return view('frontend.plan.viewproduction')->with('sales', $sales)->with('production', $production)->with('stations', $stations)->with('prodqads', $prodqads);
    }

    public function production ($id)
    {
      $sales = Sales::find($id);
      $items = Item::find($sales->items_id);
      $prodqads = Prodqads::where('wid', $sales->wid)->where('item_number', $sales->items->partNo)->get();

      return view('frontend.plan.production')
      ->with('sales', $sales)
      // ->with('production', $production)
      // ->with('stations', $stations)
      ->with('prodqads', $prodqads)
      ->with('items', $items);
    }

    public function storeproduction($id, Request $request)
    {

      $sales = Sales::find($id);
      $sales->prodremark = 'y';
      $sales->save();

      // return $prodqads;
      $production = new Production;
      // $production = Production::where('sco_number', $sales->sco_number)->first();
      // return $production;
        $production->sales_id = $sales->id;
        $production->item_number = $sales->items->partNo;
        $production->so_number = $sales->salesorder;
        $production->wo_number = $sales->workorder;
        $production->wid = $sales->wid;
        $production->keyproduction = $request->input('so_number').$request->input('wo_number').$sales->items->partNo;

        $production->save();

      // $station = Station::where('sco_number', $sales->sco_number)->get();
        $prodqads = Prodqads::where('item_number', $sales->items->partNo)
        ->where('wid', $sales->wid)->get();

        $i=0;

        foreach($prodqads as $prod)
        {
          $station = new Station;
          {
            $station->productions_id = $production->id;
            $station->sales_id = $sales->id;
            $station->wid = $production->wid;
            $station->workorder = $production->wo_number;
            $station->station = $request->input("station.$i");
            $station->remarksQAD = $request->input("remarksQAD.$i");
            $station->remarks = $request->input("remarks.$i");
            $station->salesjob =  $request->input("salesjob.$i");
            $station->operation =  $request->input("operation.$i");
            $station->desc =  $request->input("desc.$i");
            $station->code = $request->input("operation.$i").$production->wo_number.$request->input("salesjob.$i");
            $station->keyproduction = $production->keyproduction;
            $station->wo_operation = $request->input("operation.$i").'.'.$production->wo_number;
            $station->save();
            $i++;
          }
        }

      return redirect()->route('frontend.plan.listsales')->withFlashSuccess('The data is saved');

    }


    public function editproduction ($id)
    {
      $sales = Sales::find($id);
      $production = Production::where('sales_id', $sales->id)->first();
      $stations = Station::where('sales_id', $sales->id)->get();
      // $prodqads = Prodqads::where('item_number', $sales->items->partNo)->where('wid', $sales->wid)->get();
      return view('frontend.plan.editproduction')->with('sales', $sales)->with('production', $production)->with('stations', $stations)
      ;
    }

    public function updateproduction($id, Request $request)
    {
        $sales = Sales::find($id);
        $stations = Station::where('salesjob', $sales->salesorder)->where('wid', $sales->wid)->get();
        $i=0;
        foreach($stations as $prod)
        {
            $prod->remarks = $request->input("remarks.$i");
            $prod->save();
            $i++;
        }

      return redirect()->route('frontend.plan.listsales')->withFlashSuccess('The data is saved');
    }



   public function softcoverpreview($id)
   {
        $softcover = Softcover::find($id);
        $sales = Sales::find($softcover->sales_id);
        return view('frontend.plan.softcoverpreview')->with('sales', $sales)->with('softcover', $softcover);
    }

   public function softcoverbwpreview($id)
   {
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
        $overseaswt = Overseaswt::find($id);
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


   public function softcoverview()
   {
     $softcover = Softcover::all();
     return view('frontend.plan.softcoverview')->with('softcover', $softcover);
   }

   public function softcovertable()
   {
         $softcover = Softcover::leftJoin('sales', 'soft_covers.sales_id', '=', 'sales.id')
          ->leftJoin('items', 'sales.items_id', '=', 'items.id')
          ->leftJoin('users', 'soft_covers.users_id', '=', 'users.id')
          ->leftJoin('wotypes', 'wotypes.workorders_id', '=', 'soft_covers.workorders_id')
          ->select(['sales.salesline', 'sales.custName','items.partNo','items.partDesc','items.partDesc2', 'soft_covers.created_at','users.first_name',  'soft_covers.id', 'soft_covers.sales_id' ]);

         return Datatables::of($softcover)
          ->editColumn('created_at', function ($date) {
               return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
             })
         ->editColumn('id', function ($softcover) {

              return '<a href="'. route('frontend.plan.softcoverpreview', $softcover->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
              <a href="'. route('frontend.plan.softcoveredit', $softcover->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
              <a href="'. route('frontend.plan.deletes1', $softcover->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>

               ';
         })
         ->order(function ($softcover) {
                         $softcover->orderBy('created_at', 'desc');
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
      ->leftJoin('users', 'softcoverbws.users_id', '=', 'users.id')
      ->leftJoin('wotypes', 'wotypes.workorders_id', '=', 'softcoverbws.workorders_id')
      ->select(['sales.salesline','sales.custName','items.partNo','items.partDesc','items.partDesc2', 'softcoverbws.created_at', 'users.first_name', 'softcoverbws.id', 'softcoverbws.sales_id' ]);

      return Datatables::of($softcoverbw)
       ->editColumn('created_at', function ($date) {
            return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          })
      ->editColumn('id', function ($softcoverbw) {
           return '<a href="'. route('frontend.plan.softcoverbwpreview', $softcoverbw->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
           <a href="'. route('frontend.plan.softcoverbwedit', $softcoverbw->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
           <a href="'. route('frontend.plan.deletes2', $softcoverbw->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
            ';
      })
      ->order(function ($softcoverbw) {
                      $softcoverbw->orderBy('created_at', 'desc');
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
      ->leftJoin('users', 'overseasfbs.users_id', '=', 'users.id')
      ->leftJoin('wotypes', 'wotypes.workorders_id', '=', 'overseasfbs.workorders_id')
      ->select(['sales.salesline','sales.custName','items.partNo','items.partDesc','items.partDesc2', 'overseasfbs.created_at','users.first_name',  'overseasfbs.id', 'overseasfbs.sales_id' ]);

      return Datatables::of($overseasfb)
       ->editColumn('created_at', function ($date) {
            return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          })
      ->editColumn('id', function ($overseasfb) {
           return '<a href="'. route('frontend.plan.softcoveroverseaspreview', $overseasfb->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
           <a href="'. route('frontend.plan.softcoveroverseafbedit', $overseasfb->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
           <a href="'. route('frontend.plan.deletes4', $overseasfb->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
            ';
      })
      ->order(function ($overseasfb) {
                      $overseasfb->orderBy('created_at', 'desc');
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
      ->leftJoin('users', 'overseaswts.users_id', '=', 'users.id')
      ->leftJoin('wotypes', 'wotypes.workorders_id', '=', 'overseaswts.workorders_id')
      ->select(['sales.salesline','sales.custName','items.partNo','items.partDesc', 'items.partDesc2','overseaswts.created_at','users.first_name',  'overseaswts.id', 'overseaswts.sales_id' ]);

      return Datatables::of($overseaswt)
       ->editColumn('created_at', function ($date) {
            return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          })
      ->editColumn('id', function ($overseaswt) {
           return '<a href="'. route('frontend.plan.softcoveroverseaswtpreview', $overseaswt->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
           <a href="'. route('frontend.plan.softcoveroverseawtedit', $overseaswt->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
           <a href="'. route('frontend.plan.deletes3', $overseaswt->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
            ';
      })

      ->order(function ($overseaswt) {
                      $overseaswt->orderBy('created_at', 'desc');
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
      ->leftJoin('users', 'boxes.users_id', '=', 'users.id')
      ->leftJoin('wotypes', 'wotypes.workorders_id', '=', 'boxes.workorders_id')
      ->select(['sales.salesline','sales.custName','items.partNo','items.partDesc','items.partDesc2', 'boxes.created_at','users.first_name','boxes.id', 'boxes.sales_id' ]);

      return Datatables::of($boxes)
       ->editColumn('created_at', function ($date) {
            return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          })
      ->editColumn('id', function ($boxes) {
           return '<a href="'. route('frontend.plan.boxespreview', $boxes->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
           <a href="'. route('frontend.plan.boxesedit', $boxes->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
           <a href="'. route('frontend.plan.deletes5', $boxes->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
            ';
      })
      ->order(function ($boxes) {
                      $boxes->orderBy('created_at', 'desc');
                  })
         ->escapeColumns([])
         ->make();
   }

   public function planningview()
   {
     $planning = Planning::all();
     return view('frontend.plan.planningview')->with('planning', $planning);
   }

   public function selectpntable()
   {
         $sales = Sales::leftJoin('items', 'sales.items_id', '=', 'items.id')
                             ->select(['sales.wid','sales.custName','items.partNo','items.partDesc','items.partDesc2', 'sales.id' ])
                             ->where('sales.finish', '=', 'complete' )
                             ->where('sales.planning_bom', '=', 'Y');

         return Datatables::of($sales)
             ->editColumn('id', function ($sales) {
               return '<a href="'. route('frontend.plan.select', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Create/Edit"></i></a>

               ';
         })
         ->escapeColumns([])
         ->make();
   }

   public function planningstable()
   {
     $planning = Planning::leftJoin('sales', 'plannings.sales_id', '=', 'sales.id')
      ->leftJoin('items', 'sales.items_id', '=', 'items.id')
      ->leftJoin('users', 'plannings.users_id', '=', 'users.id')
      ->select(['sales.salesline','sales.custName','items.partNo','items.partDesc','items.partDesc2', 'plannings.created_at','users.first_name', 'plannings.id', 'plannings.sales_id' ]);

      return Datatables::of($planning)
       ->editColumn('created_at', function ($date) {
            return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          })
      ->editColumn('id', function ($planning) {
           return '<a href="'. route('frontend.plan.planningpreview', $planning->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View" ></i></a>
           <a href="'. route('frontend.plan.planningedit', $planning->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
           <a href="'. route('frontend.plan.deletes6', $planning->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
            ';
      })
      ->order(function ($planning) {
                      $planning->orderBy('created_at', 'desc');
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


   public function select ($id)
   {
     $sales= Sales::find($id);
     $workorder = Workorder::where('sales_id', $sales->id)->first();
     $softcover = Softcover::where('sales_id', $sales->id)->first();
     $softcoverbw = Softcoverbw::where('sales_id', $sales->id)->first();
     $overseasfb = Overseasfb::where('sales_id', $sales->id)->first();
     $overseaswt = Overseaswt::where('sales_id', $sales->id)->first();
     $boxes = Boxes::where('sales_id', $sales->id)->first();
     $planning = Planning::where('sales_id', $sales->id)->first();
     $wotype = Wotype::where('workorders_id', $workorder->id)->get();
       if (($wotype)->isEmpty())
       {
         $done[] = "None";
       }
       else
       {
         foreach( $wotype as $w)
         {
           $done[] = $w->typeofformula;
         }
       }
     // return $done;
     return view('frontend.plan.selectformula')->with('sales', $sales)->with('workorder', $workorder)->with('wotype', $wotype)->with('done', $done)
     ->with('softcover', $softcover)->with('softcoverbw', $softcoverbw)->with('overseasfb', $overseasfb)->with('overseaswt', $overseaswt)
     ->with('boxes', $boxes)->with('planning', $planning);
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
        $softcover = Softcover::where('sales_id', $sales->id)->first();
        $type = 'a';
        return view ('frontend.plan.softCover')->with('type', $type)->with('sales', $sales)->with('items',$items)->with('softcover', $softcover);
      }

      else if ($type == 'b')
      {
        $sales = Sales::find($id);
        $items = Item::where('id', $sales->item_number)->first();
        $softcoverbw = SoftcoverBW::where('sales_id', $sales->id)->first();
        $type = 'b';
        return view ('frontend.plan.softCoverBW')->with('type', $type)->with('sales', $sales)->with('items',$items)->with('softcoverbw', $softcoverbw);
      }

      else if ($type == 'c')
      {
        $sales = Sales::find($id);
        $items = Item::where('id', $sales->item_number)->first();
        $overseasfb = Overseasfb::where('sales_id', $sales->id)->first();
        $type = 'c';
        return view ('frontend.plan.softCoverOverseas')->with('type', $type)->with('sales', $sales)->with('items',$items)->with('overseasfb', $overseasfb);
      }

      else if ($type == 'd')
      {
        $sales = Sales::find($id);
        $items = Item::where('id', $sales->item_number)->first();
        $overseaswt = Overseaswt::where('sales_id', $sales->id)->first();
        $type = 'd';
        return view ('frontend.plan.softCoverOverseaWT')->with('type', $type)->with('sales', $sales)->with('items',$items)->with('overseaswt', $overseaswt);
      }

      else if ($type == 'e')
      {
        $sales = Sales::find($id);
        $items = Item::where('id', $sales->item_number)->first();
        $boxes = Boxes::where('sales_id', $sales->id)->first();
        $type = 'e';
        return view ('frontend.plan.boxes')->with('type', $type)->with('sales', $sales)->with('items',$items)->with('boxes', $boxes);
      }

      else if ($type == 'f')
      {
        $sales = Sales::find($id);
        $items = Item::where('id', $sales->item_number)->first();
        $planning = Planning::where('sales_id', $sales->id)->first();
        $type = 'f';
        return view ('frontend.plan.planning')->with('type', $type)->with('sales', $sales)->with('items',$items)->with('planning', $planning);
      }

   }

   public function listbalance()
   {
     $sheet= Sheet::all();
     return view ('frontend.plan.listbalance')->with('sheet', $sheet);
   }
   public function tablelist()
   {
    $sheet = Sheet::select(['partNo','po','podate', 'grn','datereceived', 'location', 'suppliercode','suppliername', 'size','changeqtyavail','changeactavail','unit_of_measure', 'id'])
    // ->where('changeqtyavail', '!=', '0')
    // ->where('changeactavail', '!=', '0')
    // ->where('actavail', '!=', '0')
    ;
    return Datatables::of($sheet)
      ->editColumn('changeqtyavail', function($sheet)
      {
        return ''.$sheet->changeqtyavail.'';
      })
      ->editColumn('changeactavail', function($sheet)
      {
        return ''.$sheet->changeactavail.'';
      })
      ->editColumn('id', function ($sheet) {
       return '<a href="'. route('frontend.plan.stockbalance', $sheet->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Roll Inventory"></i> Roll Inventory</a>
       <a href="'. route('frontend.plan.editpaperroll', $sheet->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Edit Roll"></i> Edit Roll</a>

       ';
      })
      ->editColumn('datereceived', function ($date) {
                return $date->datereceived ? with(new Carbon($date->datereceived))->format('d/m/Y') : '';
      })
      ->editColumn('podate', function ($date) {
                return $date->podate ? with(new Carbon($date->podate))->format('d/m/Y') : '';
            })
      ->order(function ($sheet) {
                $sheet->orderBy('created_at', 'desc');
            })
      ->escapeColumns([])
      ->make();
    }

    public function listhistorybalance()
    {
      $sheet= Sheet::all();
      return view ('frontend.plan.listhistorybalance')->with('sheet', $sheet);
    }
    public function tablelisthist()
    {
     $sheet = Sheet::select(['partNo','po','podate', 'grn','datereceived', 'location', 'suppliercode','suppliername', 'size','changeqtyavail','changeactavail'])
     ->where('changeqtyavail', '=', '0')
     ->orWhere('changeactavail', '=', '0')
     ;
     return Datatables::of($sheet)

       // ->editColumn('id', function ($sheet) {
       //  return '<a href="'. route('frontend.plan.stockbalance', $sheet->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Roll Inventory"></i> Roll Inventory</a>
       //  ';
       // })
       ->escapeColumns([])
       ->make();
     }

     public function choosepo()
     {
       $po = Purchase::all();
       return view ('frontend.plan.choosepo')->with('po', $po);
     }

     public function chooseposearch (Request $request)
     {
       $input = $request->input('input');
       // $po = $request->input('po');
       if ($input == null)
       {
         $choose = Purchase::all();
         return view ('frontend.plan.choosepo')->with('choose', $choose);
       }
       else
       {
         $choose = Purchase::where('po', 'LIKE', '%'.$input.'%')->orWhere('item_number', 'LIKE', '%'.$input.'%')->get();

         return view ('frontend.plan.choosepo')->with('choose', $choose);
       }

     }

   public function newroll($id)
   {
     $po = Purchase::find($id);
     return view ('frontend.plan.newroll')->with('po', $po);
   }

   public function storeroll (Request $request)
   {
        $sheet = new Sheet;

        $sheet->partNo = $request->input('partNo');
        $sheet->po = $request->input('po');
        $dtprod = \DateTime::createFromFormat('d/m/Y', $request->input('podate'));
        $sheet->podate = $dtprod;
        $sheet->grn = $request->input('grn');
        $dtprod2 = \DateTime::createFromFormat('d/m/Y', $request->input('datereceived'));
        $sheet->datereceived = $dtprod2;
        $sheet->location = $request->input('location');
        $sheet->suppliercode = $request->input('suppliercode');
        $sheet->suppliername = $request->input('suppliername');
        $sheet->size = $request->input('size');
        $sheet->qtyavail = $request->input('qtyavail');
        $sheet->changeqtyavail = $request->input('qtyavail');
        $sheet->actavail = $request->input('qtyavail');
        $sheet->changeactavail = $request->input('qtyavail');
        $sheet->unit_of_measure = $request->input('unit_of_measure');
        $sheet->save();

      return redirect()->route('frontend.plan.listbalance')->withFlashSuccess('The data is  saved.');
   }

   //masalah
   public function stockbalance($id)
   {
     $sheet = Sheet::find($id);
     $balance = Balance::where('sheets_id', $sheet->id)->orderBy('created_at', 'desc')->first();

     $prodstruct = Prodstruct::where('component', $sheet->partNo)->first();
     // $salesqad = Salesqad::where('Purchase_order', $sheet->pon)->first();

     if($prodstruct == null)
     {
       $addstock = null;
       $wo = null;
     }
     else {
       $addstock = Addstock::where('items_number', $prodstruct->items_number )->orderBy('due_date', 'desc')->first();
       $wo = Addstock::where('items_number', $addstock->items_number)->get();

     }
     if (!empty($balance))
     {
       $balwo = $balance->balwoqty;
       $balact = $balance->balactqty;
     }
     else
     {
       $balwo = $sheet->qtyavail;
       $balact = $sheet->qtyavail;
     }

     if (!empty($addstock))
     {
       $qtywo = $addstock->woqty;
       $woid = $addstock->wid;
     }
     else {
       $qtywo = 0;
       $woid = null;
     }
       return view ('frontend.plan.stockbalance')->with('sheet', $sheet)->with('balance', $balance)->with('addstock', $addstock)
       ->with('balwo', $balwo)->with('balact', $balact)
       ->with('prodstruct', $prodstruct)->with('qtywo', $qtywo)
       ->with('woid', $woid)
       ->with('wo', $wo)
       ;

   }

   public function balancestore($id, Request $request)
    {
       $sheet = Sheet::find($id);
       $balances = new Balance;

         $balances->sheets_id  = $sheet->id;
         $balances->partNo  = $sheet->partNo;
         $balances->woqty  = $request->input('woqty');
         $balances->balwoqty  = $request->input('balwoqty');
         $balances->actqty  = $request->input('actqty');
         $balances->balactqty  = $request->input('balactqty');
         $balances->wid  = $request->input('wid');
         $balances->wodate  = $request->input('wodate');

         $balances->save();

         $sheet->changeactavail = $request->input('balactqty');
         $sheet->changeqtyavail = $request->input('balwoqty');
         $sheet->save();

       return redirect()->route('frontend.plan.stockbalance', $sheet->id)->withFlashSuccess('The data is  saved.');
     }

   public function searchwid ($id, Request $request)
   {
     $wid = $request->input('wid');
     $sheet = Sheet::find($id);
     $prod = Prodstruct::where('component', $sheet->partNo)->first();

     if (!empty($prod))
     {
       $addstock = Addstock::where('items_number', $prod->items_number )->orderBy('due_date', 'desc')->first();
       if ($wid == null)
       {
         return redirect()->route('frontend.plan.stockbalance', $sheet->id)->withFlashWarning('Please input something.');
       }
       else
       {
         $choose = Addstock::where('wid', 'LIKE', '%'.$wid.'%')->where('items_number', $prod->items_number)->first();
         if (!empty($choose))
         {
           $balance = Balance::where('sheets_id', $sheet->id)->orderBy('created_at', 'desc')->first();
           $wo = Addstock::where('items_number', $choose->items_number)->get();
           // $salesqad = Salesqad::where('Purchase_order', $sheet->po)->first();

           if($wo == null)
           {
             $prodstruct = null;
             $addstock = null;
           }
           else {
             $prodstruct = Prodstruct::where('component', $sheet->partNo)->where('items_number', $choose->items_number)->first();
             $addstock = Addstock::where('items_number', $prod->items_number )->orderBy('due_date', 'desc')->first();
             if (!empty($addstock))
             {
               $qtywo = $addstock->woqty;
               $woid = $addstock->wid;
             }
             else {
               $qtywo = 2;
               $woid = null;
             }
           }
           if (!empty($balance))
           {
             $balwo = $balance->balwoqty;
             $balact = $balance->balactqty;
           }
           else
           {
             $balwo = $sheet->qtyavail;
             $balact = $sheet->qtyavail;
           }

           // return redirect()->route('frontend.plan.stockbalance', $sheet->id)->withFlashSuccess('Word Order ID # exist');
           return view ('frontend.plan.stockbalance', $sheet->id)
           // ->with('choose', $choose)
           ->with('sheet', $sheet)
           ->with('balance', $balance)
           // ->with('addstock', $addstock)
           ->with('balwo', $balwo)
           ->with('balact', $balact)
           // ->with('prod', $prod)
           // ->with('qtywo', $qtywo)
           ->with('woid', $woid)
           // ->with('wid', $wid)
           ;
         }
         else
         {
           return redirect()->route('frontend.plan.stockbalance', $sheet->id)->withFlashWarning('Word Order ID # do not exist');
         }

       }
     }
     else {
       return redirect()->route('frontend.plan.stockbalance', $sheet->id)->withFlashWarning('Word Order ID # do not exist');
     }

   }

   public function editpaperroll($id)
   {
     $sheet= Sheet::find($id);
     // $balance = Balance::where('sheets_id', $sheet->id)->orderBy('created_at', 'desc')->first();
     // $salesqad = Salesqad::where('Purchase_order', $sheet->po)->first();
     // $prodstruct = Prodstruct::where('component', $sheet->partNo)->where('items_number', $salesqad->Item_Number)->first();
     // $addstock = Addstock::where('items_number',$prodstruct->items_number)->orderBy('created_at', 'desc')->first();


     // if (!empty($balance))
     // {
     //   $hu = $balance->balance;
     //
     //   // $hu = ($balance->inmt - $balance->outmt);
     // }
     // else {
     //   $hu = 0;
     // }

       return view ('frontend.plan.editpaperroll')
       ->with('sheet', $sheet)
       // ->with('balance', $balance)
       // ->with('addstock', $addstock)
       ;
       // ->with('balwo', $balwo)->with('balact', $balact`);
       // ->with('items', $items)

   }

   public function updateroll ($id, Request $request)
   {
        $sheet = Sheet::find($id);

        $sheet->partNo = $request->input('partNo');
        $sheet->po = $request->input('po');
        $dtprod = \DateTime::createFromFormat('d/m/Y', $request->input('podate'));
        $sheet->podate = $dtprod;
        $sheet->grn = $request->input('grn');
        $dtprod1 = \DateTime::createFromFormat('d/m/Y', $request->input('datereceived'));
        $sheet->datereceived = $dtprod1;
        $sheet->location = $request->input('location');
        $sheet->suppliercode = $request->input('suppliercode');
        $sheet->suppliername = $request->input('suppliername');
        $sheet->size = $request->input('size');
        // $sheet->qtyavail = $request->input('changeactavail');
        // $sheet->actavail = $request->input('changeactavail');
        // $sheet->changeactavail = $request->input('changeactavail');
        // $sheet->changeqtyavail = $request->input('changeactavail');
        $sheet->save();


      return redirect()->route('frontend.plan.listbalance')->withFlashSuccess('The data is  saved.');
   }


   public function tablebalance(Request $request)
   {
     $balances = Balance::leftJoin('sheets', 'sheets.id', 'balances.sheets_id')
     ->select([ 'balances.wodate', 'balances.wid','balances.woqty', 'balances.balwoqty', 'balances.actqty', 'balances.balactqty', 'balances.id'])
     ->where('sheets_id', $request->input('sheets_id'))
     ;
     return Datatables::of($balances)
         ->editColumn('id', function ($balances) {
         return '
         <a href="'. route('frontend.plan.delete',$balances->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
         <a href="'. route('frontend.plan.editbalance',$balances->id) . '"  class="btn btn-xs btn-primary editbtn-modal" name="editbtn"><i class="glyphicon glyphicon-edit" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
         ';
         // <button  href="#edit-empl" class="btn btn-default " value="'. route('frontend.plan.editbalance',$balances->id) . '" type="button" >Edit</button>
     })

     ->order(function ($balances) {
                     $balances->orderBy('balances.created_at', 'desc');
                 })
     ->escapeColumns([])
     ->make();
   }

   public function editbalance($id)
   {
     $balance = Balance::find($id);

     return view ('frontend.plan.editbalance')
     ->with('balance', $balance);


   }

   public function storeeditbalance($id, Request $request)
   {
     $balance = Balance::find($id);

     $dt  = \DateTime::createFromFormat('d/m/Y',$request->input('wodate'));
     $balance->wodate = $dt;
     $balance->wid = $request->input('wid');
     $balance->woqty = $request->input('woqty');
     $balance->balwoqty = $request->input('balwoqty');
     $balance->actqty = $request->input('actqty');
     $balance->balactqty = $request->input('balactqty');
     $balance->remarks = $request->input('remarks');
     $balance->save();

     $sheet = Sheet::find($balance->sheets_id);
     return redirect()->route('frontend.plan.stockbalance', $sheet->id)->withFlashSuccess('The data is  saved.');
   }



   public function delete($id)
   {
     $balance = Balance::find($id);
     $sheet = Sheet::where('partNo', $balance->partNo)->orderBy('id', 'desc')->first();
     // $balance = Balance::findOrFail($id)->forceDelete();
     $balan = Balance::select('balwoqty')->orderBy('id', 'desc')->first();
     $balan2 = Balance::select('balactqty')->orderBy('id', 'desc')->first();
     $balanc = Balance::where('sheets_id', $sheet->id)->get();
     if ($balanc->count()){
       $hu = (int)$balan->balwoqty + (int)$balance->woqty ;
       $ha = (int)$balan2->balactqty + (int)$balance->actqty ;
     }
     else {
       $hu=0;
       $ha =0;
     }

     $balances = new Balance;
     $balances->sheets_id  = $sheet->id;
     $balances->partNo  = $sheet->partNo;
     $balances->woqty  = '0';
     $balances->balwoqty  = $hu;
     $balances->actqty  = '0';
     $balances->balactqty  = $ha;
     $balances->wid  = null;
     $balances->wodate  = \Carbon\Carbon::now()->format('d/m/Y');
     $balances->save();

     $balance = Balance::findOrFail($id)->forceDelete();

     return redirect()->route('frontend.plan.stockbalance',$sheet->id)->withFlashDanger('The data is deleted.');
   }

   public function deletes1($id)
   {
     $softcover=softCover::find($id);
     $wotype = Wotype::where('typeofformula', '=', 'Soft Cover')->where('workorders_id', $softcover->workorders_id)->first();
     $workorder = Workorder::find($wotype->workorders_id);
     // $workorder->wotypes_id = '';
     $workorder->save();
     $wotype = Wotype::where('typeofformula', '=', 'Soft Cover')->where('workorders_id', $softcover->workorders_id)->first()->delete();
     $softcover = Softcover::findOrFail($id)->delete();

     return redirect()->route('frontend.plan.selectpn')->withFlashSuccess('The data is deleted.');
   }

   public function deletes2($id)
   {
     $softcoverbw=Softcoverbw::find($id);
     $wotype = Wotype::where('typeofformula', '=', 'Soft Cover BW')->where('workorders_id', $softcoverbw->workorders_id)->first();
     $workorder = Workorder::find($wotype->workorders_id);
     // $workorder->wotypes_id = '';
     $workorder->save();
     $wotype = Wotype::where('typeofformula', '=', 'Soft Cover BW')->where('workorders_id', $softcoverbw->workorders_id)->first()->delete();
     $softcoverbw = Softcoverbw::findOrFail($id)->delete();

     return redirect()->route('frontend.plan.selectpn')->withFlashSuccess('The data is deleted.');
   }

   public function deletes3($id)
   {
     $overseaswt=Overseaswt::find($id);
     $wotype = Wotype::where('typeofformula', '=', 'Overseas WT')->where('workorders_id', $overseaswt->workorders_id)->first();
     $workorder = Workorder::find($wotype->workorders_id);
     // $workorder->wotypes_id = '';
     $workorder->save();
     $wotype = Wotype::where('typeofformula', '=', 'Overseas WT')->where('workorders_id', $overseaswt->workorders_id)->first()->delete();
     $overseaswt = Overseaswt::findOrFail($id)->delete();

     return redirect()->route('frontend.plan.selectpn')->withFlashSuccess('The data is deleted.');
   }

   public function deletes4($id)
   {

     $overseasfb=Overseasfb::find($id);
     $wotype = Wotype::where('typeofformula', '=', 'Overseas FB')->where('workorders_id', $overseasfb->workorders_id)->first();
     $workorder = Workorder::find($wotype->workorders_id);
     // $workorder->wotypes_id = '';
     $workorder->save();
     $wotype = Wotype::where('typeofformula', '=', 'Overseas FB')->where('workorders_id', $overseasfb->workorders_id)->first()->delete();
     $overseasfb = Overseasfb::findOrFail($id)->delete();
     return redirect()->route('frontend.plan.selectpn')->withFlashSuccess('The data is deleted.');
   }

   public function deletes5($id)
   {
     $boxes=Boxes::find($id);
     $wotype = Wotype::where('typeofformula', '=', 'Boxes')->where('workorders_id', $boxes->workorders_id)->first();
     $workorder = Workorder::find($wotype->workorders_id);
     // $workorder->wotypes_id = '';
     $workorder->save();
     $wotype = Wotype::where('typeofformula', '=', 'Boxes')->where('workorders_id', $boxes->workorders_id)->first()->delete();
     $boxes = Boxes::findOrFail($id)->delete();

     return redirect()->route('frontend.plan.selectpn')->withFlashSuccess('The data is deleted.');
   }

   public function deletes6($id)
   {
     $plannings=Planning::find($id);
     $wotype = Wotype::where('typeofformula', '=', 'Planning')->where('workorders_id', $plannings->workorders_id)->first();
     $workorder = Workorder::find($wotype->workorders_id);
     // $workorder->wotypes_id = '';
     $workorder->save();
     $wotype = Wotype::where('typeofformula', '=', 'Planning')->where('workorders_id', $plannings->workorders_id)->first()->delete();
     $plannings = Planning::findOrFail($id)->delete();

     return redirect()->route('frontend.plan.selectpn')->withFlashSuccess('The data is deleted.');
   }

}
