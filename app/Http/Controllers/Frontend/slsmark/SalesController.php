<?php

namespace App\Http\Controllers\Frontend\slsmark;


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
use App\Models\Access\Delivery;
use App\Models\Access\Addstock;
use App\Models\Access\Statusstock;
use App\Models\Access\Bosch;
use App\Models\Access\Invqad;
use App\Models\Access\Cust;
use App\Models\Access\User\User;
use App\Models\Access\Das;
use App\Models\Access\Dachild;
use App\Models\Access\Manual;
use App\Models\Access\Transaction;
use App\Models\Access\Change;
use App\Models\Access\Prodedit;

use Image;
use Carbon\Carbon;
use Session;
use Yajra\Datatables\Facades\Datatables;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\ChangeSCinsales;
use App\Mail\Changesc;
use Notification;
use Mail;
use PDF;

/**
 * Class DashboardController.
 */
class SalesController extends Controller
{
    protected $users;

    public function index()
    {
        $sales=Sales::all();
        return view('frontend.slsmark.index')->with('sales',$sales);
    }

    public function historysc()
    {
        $sales=Sales::all();
        return view('frontend.slsmark.historysc')->with('sales',$sales);
    }

    public function histsctable()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
        $sales = Sales::
        leftJoin('items', 'items.sales_id','=', 'sales.id')
        ->leftJoin('stocks', 'stocks.item_number', '=', 'items.partNo')
        ->select(['sales.salesorder', 'sales.line', 'sales.wid', 'sales.purchaseOrder','sales.custName',
        'items.partNo','items.partDesc', 'items.partDesc2','items.quantity',
        'stocks.keepqty','stocks.manualstock', 'stocks.stockqty', 'sales.status_item','stocks.woqty', 'stocks.totalwoqty',
         'sales.deliverDate', 'sales.id', 'sales.record_status','sales.widremark','sales.soremark', 'sales.solineremark'

      ])
      ;

      return Datatables::of($sales)

      ->editColumn('id', function ($sales) {
        //return $sales->action_buttons;
        return '
        <a href="'. route('frontend.slsmark.edit', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="PAF"></i></a>
        <a href="'. route('frontend.slsmark.editscof', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
        <a href="'. route('frontend.slsmark.show', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View SCO"></i></a>
        <a href="'. route('frontend.slsmark.destroy', $sales->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="Delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
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
      else
      {
        $salesqad = Salesqad::
        // leftJoin('addstocks', 'addstocks.items_number','=', 'salesqads.Item_Number')
        leftJoin('stocks', 'stocks.item_number', '=', 'salesqads.Item_Number')
        ->select(['stocks.salesorder', 'stocks.line', 'salesqads.wid', 'salesqads.Purchase_order','salesqads.Name',
        'salesqads.Item_Number','salesqads.Description', 'salesqads.Description_1','salesqads.Quantity_Ordered',
        'stocks.keepqty','stocks.manualstock', 'stocks.stockqty', 'salesqads.status_item','stocks.woqty', 'stocks.totalwoqty',
        'salesqads.Order_Date', 'salesqads.Due_Date', 'salesqads.id', 'salesqads.record_status','salesqads.widremark','salesqads.soremark', 'salesqads.solineremark'

      ])
        ->where('finish', '=', 'planner')
        ->orWhere('finish', '=', 'complete')
        ;

        return Datatables::of($sales)

        ->editColumn('id', function ($sales) {

            return '
            <a href="'. route('frontend.slsmark.editscof', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
            <a href="'. route('frontend.slsmark.show', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View SCO"></i></a>
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
    }

    public function newsc()
    {
        $sales=Sales::all();
        return view('frontend.slsmark.newsc')->with('sales',$sales);
    }

    public function newsctable()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->leftJoin('addstocks', 'addstocks.so_number','=', 'sales.salesorder')
        ->select(['sales.sco_number','sales.salesorder', 'sales.line', 'sales.wid', 'sales.purchaseOrder','sales.custName',
        'items.partNo','items.partDesc', 'items.partDesc2','items.quantity',
        'addstocks.keep_qty','addstocks.manual_qty', 'addstocks.stockqty', 'sales.status_item','addstocks.woqty', 'addstocks.totalwoqty',
        'sales.deliverDate', 'sales.id', 'sales.record_status','sales.widremark','sales.soremark', 'sales.solineremark'

      ])
        ->where('finish', '=', 'complete')
        ->orWhere('finish', '=', 'planner')
      ;

      return Datatables::of($sales)

      ->editColumn('id', function ($sales) {
        //return $sales->action_buttons;
        return '
        <a href="'. route('frontend.slsmark.edit', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="PAF"></i></a>
        <a href="'. route('frontend.slsmark.editscof', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
        <a href="'. route('frontend.slsmark.show', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View SCO"></i></a>
        <a href="'. route('frontend.slsmark.destroy', $sales->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="Delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
        ';

      })
      ->editColumn('deliverDate', function ($date) {
                return $date->deliverDate ? with(new Carbon($date->deliverDate))->format('d/m/Y') : '';
            })
       ->order(function ($sales) {
                       $sales->orderBy('sales.created_at', 'desc');
                   })
      ->escapeColumns([])
      ->make();
      }
      else
      {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->leftJoin('addstocks', 'addstocks.so_number','=', 'sales.salesorder')
        ->select(['sales.sco_number','sales.salesorder', 'sales.line', 'sales.wid', 'sales.purchaseOrder','sales.custName',
        'items.partNo','items.partDesc', 'items.partDesc2','items.quantity',
        'addstocks.keep_qty','addstocks.manual_qty', 'addstocks.stockqty', 'sales.status_item','addstocks.woqty', 'addstocks.totalwoqty',
        'sales.deliverDate', 'sales.id', 'sales.record_status','sales.widremark','sales.soremark', 'sales.solineremark'

      ])
        ->where('finish', '=', 'complete')
        ->orWhere('finish', '=', 'planner')
        ->where('planning_bom', '=', null)
        ;

        return Datatables::of($sales)

        ->editColumn('id', function ($sales) {

            return '
            <a href="'. route('frontend.slsmark.editscof', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
            <a href="'. route('frontend.slsmark.show', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View SCO"></i></a>
            ';
              })
        ->editColumn('deliverDate', function ($date) {
                  return $date->deliverDate ? with(new Carbon($date->deliverDate))->format('d/m/Y') : '';
              })
        ->order(function ($sales) {
                       $sales->orderBy('sales.created_at', 'desc');
                   })
        ->escapeColumns([])
        ->make();
      }
    }

    public function create()
    {
        $sales =  Sales::all();
        $salesqad= Salesqad::all();
        return view('frontend.slsmark.create')->with('sales',$sales)->with('salesqad', $salesqad);
    }

    public function createtable()
    {
      $salesqad = Salesqad::leftJoin('addstocks', 'addstocks.so_number','=', 'salesqads.Sales_Order')
      // ->leftJoin('stocks', 'stocks.soline', '=', 'salesqads.salesline')
      ->select(['salesqads.Sales_Order', 'salesqads.Line', 'salesqads.wid', 'salesqads.Purchase_order','salesqads.Name',
				'salesqads.Item_Number','salesqads.Description', 'salesqads.Description_1','salesqads.Quantity_Ordered',
				'addstocks.keep_qty','addstocks.manual_qty', 'addstocks.stockqty', 'salesqads.status_item','addstocks.woqty', 'addstocks.totalwoqty',
				'salesqads.Order_Date', 'salesqads.Due_Date', 'salesqads.id', 'salesqads.record_status','salesqads.widremark','salesqads.soremark', 'salesqads.solineremark'

			])
      ->where('salesqads.record_status', 'New');
      //->where('salesqads.record_status', '!=', 'Irrelevant');
      return Datatables::of($salesqad)

      ->editColumn('id', function ($salesqad) {
        $item = Item::where('partNo', $salesqad->Item_Number)->first();
          if(!empty($item))
          {
            return '
            <a href="'. route('frontend.slsmark.editrepeat', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Repeat" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Repeat</a><br>
            <a href="'. route('frontend.slsmark.samplerequisite', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add SRO"></i> SRO</a><br>
            <a href="'. route('frontend.slsmark.createpaf', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add PAF"></i> PAF</a><br>
            <a href="'. route('frontend.slsmark.remarkso', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Add" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Add </a>
            <a href="'. route('frontend.slsmark.recordchange', $salesqad->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove-sign" data-toggle="modal tooltip" title="Move to history" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Irrelevant </a>
            ';
          }
          else {
            return '
            <a href="'. route('frontend.slsmark.editrepeat', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Repeat" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Repeat</a><br>
            <a href="'. route('frontend.slsmark.samplerequisite', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add SRO"></i> SRO</a><br>
            <a href="'. route('frontend.slsmark.createpaf', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add PAF"></i> PAF</a><br>
            <a href="'. route('frontend.slsmark.remarkso', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Add" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Add </a>
            <a href="'. route('frontend.slsmark.recordchange', $salesqad->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove-sign" data-toggle="modal tooltip" title="Move to history" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Irrelevant </a>
            ';

          }
        })

      // ->editColumn('totalwoqty', function ($salesqad) {
        // $bal3 = DB::table("addstocks")->where('items_number', $salesqad->Item_Number)->where('so_number','=', $salesqad->Sales_Order)->sum('woqty');

        // return ''.$bal3.'';
      // })

      // ->editColumn('stockqty', function ($salesqad) {
        // $balance = DB::table("invqads")->where('items_number', $salesqad->Item_Number)->sum('qtyonhand_detail');
        // $bal1 = DB::table("addstocks")->where('so_number', $salesqad->Sales_Order)->where('items_number','=', $salesqad->Item_Number)->sum('woqty');
        // $bal2 = DB::table("salesqads")->where('Sales_Order','=', $salesqad->Sales_Order)->sum('Quantity_Ordered');
        // $bal3 = DB::table("transactions")->where('items_number','=', $salesqad->Item_Number)->sum('loc_qty_change');

        // return ''.$balance+$bal1-$bal2+$bal3.'';

      // })

      // ->editColumn('Order_Date', function ($date) {
                // return $date->Order_Date ? with(new Carbon($date->Order_Date))->format('d/m/Y') : '';
            // })
      // ->editColumn('Due_Date', function ($date) {
                // return $date->Due_Date ? with(new Carbon($date->Due_Date))->format('d/m/Y') : '';
            // })
      // ->order(function ($salesqad) {
                      // $salesqad->orderBy('Sales_Order', 'asc');
                  // })
      ->escapeColumns([])
      ->make();
    }

    public function recordchange($id)
    {
      $salesqad= Salesqad::find($id);
      $salesqad->record_status = 'Irrelevant';
      $salesqad->save();

      return redirect()->route('frontend.slsmark.history')->withFlashSuccess('The data is saved');
    }

    public function history()
    {
      $sales =  Sales::all();
      $salesqad= Salesqad::all();
      return view('frontend.slsmark.history')->with('sales',$sales)->with('salesqad', $salesqad);
    }

    public function historytable()
    {
      $salesqad = Salesqad::
      // leftJoin('addstocks', 'addstocks.items_number','=', 'salesqads.Item_Number')
      leftJoin('stocks', 'stocks.soline', '=', 'salesqads.salesline')
      ->select(['stocks.salesorder', 'stocks.line', 'salesqads.wid', 'salesqads.Purchase_order','salesqads.Name',
      'salesqads.Item_Number','salesqads.Description', 'salesqads.Description_1','salesqads.Quantity_Ordered',
      'stocks.keepqty','stocks.manualstock', 'stocks.stockqty', 'salesqads.status_item','stocks.woqty', 'stocks.totalwoqty',
      'salesqads.Order_Date', 'salesqads.Due_Date', 'salesqads.id', 'salesqads.record_status','salesqads.widremark','salesqads.soremark', 'salesqads.solineremark'

    ])
      ->where('salesqads.record_status', '=', 'Irrelevant')
      ;
      return Datatables::of($salesqad)

      ->editColumn('id', function ($salesqad) {

        $item = Item::where('partNo', $salesqad->Item_Number)->first();
          if(!empty($item))
          {
            return '
            <a href="'. route('frontend.slsmark.editrepeat', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Repeat" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Repeat</a><br>
            <a href="'. route('frontend.slsmark.samplerequisite', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add SRO"></i> SRO</a><br>
            <a href="'. route('frontend.slsmark.createpaf', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add PAF"></i> PAF</a><br>
            <a href="'. route('frontend.slsmark.remarkso', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Add" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Add</a>
            ';
          }
          else
          {
            // <a href="'. route('frontend.slsmark.createsco', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add SC"></i> SC</a><br>
            return '
            <a href="'. route('frontend.slsmark.editrepeat', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Repeat" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Repeat</a><br>
            <a href="'. route('frontend.slsmark.samplerequisite', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add SRO"></i> SRO</a><br>
            <a href="'. route('frontend.slsmark.createpaf', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add PAF"></i> PAF</a><br>
            <a href="'. route('frontend.slsmark.remarkso', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Add" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Add </a>
            ';
            // <a href="'. route('frontend.slsmark.recordchange', $salesqad->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove-sign" data-toggle="modal tooltip" title="Move to history" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Irrelevant </a>
          }

        })

      ->editColumn('Order_Date', function ($date) {
                return $date->Order_Date ? with(new Carbon($date->Order_Date))->format('d/m/Y') : '';
            })
      ->editColumn('Due_Date', function ($date) {
                return $date->Due_Date ? with(new Carbon($date->Due_Date))->format('d/m/Y') : '';
            })
      ->order(function ($salesqad) {
                      $salesqad->orderBy('Sales_Order', 'asc');
                  })
      ->escapeColumns([])
      ->make();
    }

    public function reporting()
    {
      $sales = Sales::all();
      $salesqad = Salesqad::all();
      $product = Product::all();
      $item = Item::all();
      return view('frontend.slsmark.reporting')->with('sales',$sales)->with('salesqad', $salesqad)->with('product', $product)->with('item', $item);
    }

    public function report()
    {
      $sales = Sales::all();
      $salesqad = Salesqad::all();
      $product = Product::all();
      $item = Item::all();
      return view('frontend.slsmark.report')->with('sales',$sales)->with('salesqad', $salesqad)->with('product', $product)->with('item', $item);
    }

    public function createstock($id)
    {
      $stock = Stock::find($id);
      return view('frontend.slsmark.createstock')->with('stock',$stock);
    }

    public function stockstores($id, Request $request)
    {
      $stock = Stock::find($id);
      $stock->keepqty = $request->input('keepqty');
      $stock->manualstock = $request->input('manualstock');
      $stock->stockqty = $request->input('stockqty');
      $stock->save();
      return redirect()->route('frontend.slsmark.report')->withFlashSuccess('The data is saved');
    }


    public function reportingtable()
    {

      $salesqad = Salesqad::
      leftJoin('sales', 'sales.salesline', '=', 'salesqads.salesline')
      ->leftJoin('items', 'items.sales_id', '=', 'sales.id')
      ->leftJoin('products', 'products.paf_number', '=', 'sales.paf_number')
      // ->leftJoin('stocks', 'stocks.item_number', '=', 'salesqads.Item_Number')
      ->select(['salesqads.Sales_Order', 'salesqads.Line', 'salesqads.wid', 'salesqads.Purchase_order', 'salesqads.Name', 'salesqads.Item_Number', 'salesqads.Description', 'salesqads.Description_1',
       'salesqads.quantity_ordered' ,'salesqads.status_item', 'salesqads.Order_Date', 'salesqads.Due_Date',
       'salesqads.widremark', 'salesqads.soremark', 'salesqads.solineremark','salesqads.id', 'items.lot', 'items.mfgDate', 'items.expiryDate', 'items.dateFacNo', 'items.packerID', 'items.size',
      'items.rawMaterial', 'items.noPages', 'items.colour', 'items.finishing',  'products.lot1', 'products.mfgDate1', 'products.expiryDate1', 'products.dateFacNo1', 'products.packerID1', 'products.size1',
      'products.rawMaterial1', 'products.noPages1', 'products.colour1', 'products.finishing1']);
      return Datatables::of($salesqad)
      //
      ->editColumn('id', function ($salesqad) {
        $stock = Stock::where('item_number', $salesqad->Item_Number)->first();
        if ($stock == null)
            {
              return '
              ';
            }
            else
            {
              return '
              <a href="'. route('frontend.slsmark.createstock', $stock->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Repeat" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Change record status</a>
              ';

            }

        })

      ->editColumn('Order_Date', function ($date) {
                return $date->Order_Date ? with(new Carbon($date->Order_Date))->format('d/m/Y') : '';
            })
      ->editColumn('Due_Date', function ($date) {
                return $date->Due_Date ? with(new Carbon($date->Due_Date))->format('d/m/Y') : '';
            })
      ->order(function ($salesqad) {
                      $salesqad->orderBy('Sales_Order', 'desc');
                  })
      ->escapeColumns([])
      ->make();
    }

    public function excel(Request $request)
    {
      $name = $request->input('Name');
      $start =\Carbon\Carbon::parse($request->input('start'))->format('Y-m-d');
      $end = \Carbon\Carbon::parse($request->input('end'))->format('Y-m-d');
      // $startg =  \Carbon\Carbon::parse($start)->format('Y-m-d');
      // $endg =  \Carbon\Carbon::parse($end)->format('Y-m-d');
      $salesqads = Salesqad::
      select('salesqads.Sales_Order', 'salesqads.Line', 'salesqads.wid', 'salesqads.Purchase_order', 'salesqads.Name', 'salesqads.Item_Number', 'salesqads.Description', 'salesqads.Description_1',
       'salesqads.quantity_ordered' ,'salesqads.status_item', 'salesqads.Due_Date',
      'salesqads.record_status', 'salesqads.widremark', 'salesqads.soremark', 'salesqads.solineremark', 'items.lot', 'items.mfgDate', 'items.expiryDate', 'items.dateFacNo', 'items.packerID', 'items.size',
      'items.rawMaterial', 'items.noPages', 'items.colour', 'items.finishing',  'products.lot1', 'products.mfgDate1', 'products.expiryDate1', 'products.dateFacNo1', 'products.packerID1', 'products.size1',
      'products.rawMaterial1', 'products.noPages1', 'products.colour1', 'products.finishing1')
      ->leftJoin('sales', 'sales.salesline', '=', 'salesqads.salesline')
      ->leftJoin('items', 'items.sales_id', '=', 'sales.id')
      ->leftJoin('products', 'products.paf_number', '=', 'sales.paf_number')
      ->where('salesqads.Name', 'LIKE', '%'.$name.'%')
      ->whereBetween('salesqads.Due_Date', [$start, $end])
      ->get();

      $paymentsArray = [];
      $paymentsArray[] = ['SO', 'Line','ID','PO','Name', 'Part #', 'Part Desc', 'Part Desc2',
                            'Qty', 'Status Item', 'Due Date', 'Record Status', 'Remark(WID)', 'Remark(SO)', 'Remark(Line)',
                          'Lot', 'MFG Date', 'Expiry Date', 'Date & Fac No', 'Packer ID', 'Size', 'Raw Material', 'No of Pages', 'Colour', 'Finishing',
                        'Lot', 'MFG Date', 'Expiry Date', 'Date & Fac No', 'Packer ID', 'Size', 'Raw Material', 'No of Pages', 'Colour', 'Finishing'];

      foreach ($salesqads as $salesqad)
      {
        $paymentsArray[] = $salesqad->toArray();
      }

        Excel::create('reporting_'.date('Y-m-d H:i'), function($excel) use($paymentsArray) {

            $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {


              // $sheet->fromArray($salesqadArray);
                $sheet->fromArray($paymentsArray, null, 'A1',false,  false);
            });

        })->download('csv');
    }

    public function createhist()
    {
        $sales =  Sales::all();
        $salesqad= Salesqad::all();
        return view('frontend.slsmark.createhist')->with('sales',$sales)->with('Salesqad', $salesqad);
    }

    public function createhistorytable()
    {
      $salesqad = Salesqad::
      // leftJoin('addstocks', 'addstocks.items_number','=', 'salesqads.Item_Number')
      leftJoin('stocks', 'stocks.soline', '=', 'salesqads.salesline')
      ->select(['stocks.salesorder', 'stocks.line', 'salesqads.wid', 'salesqads.Purchase_order','salesqads.Name',
      'salesqads.Item_Number','salesqads.Description', 'salesqads.Description_1','salesqads.Quantity_Ordered',
      'stocks.keepqty','stocks.manualstock', 'stocks.stockqty', 'salesqads.status_item','stocks.woqty', 'stocks.totalwoqty',
      'salesqads.Order_Date', 'salesqads.Due_Date', 'salesqads.id', 'salesqads.record_status','salesqads.widremark','salesqads.soremark', 'salesqads.solineremark'

    ])
    ->where('salesqads.record_status', '!=', 'New')
    ->where('salesqads.record_status', '!=', 'Irrelevant')
    ;
    return Datatables::of($salesqad)

      ->editColumn('id', function ($salesqad) {
      // if ($salesqad->status == null)
      // {
              return '
              <a href="'. route('frontend.slsmark.samplerequisite', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add SRO"></i> SRO</a><br>
              <a href="'. route('frontend.slsmark.editrepeat', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Repeat" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Repeat</a><br>
              <a href="'. route('frontend.slsmark.remarkso', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Repeat" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Remark SO</a>
              ';
              // <a href="'. route('frontend.slsmark.createpaf', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add PAF"></i> PAF</a><br>
              // <a href="'. route('frontend.slsmark.createsco', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add SC"></i> SC</a><br>
              // <a href="'. route('frontend.slsmark.recordchange', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Repeat" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Change record status</a>

        })

      ->editColumn('Order_Date', function ($date) {
                return $date->Order_Date ? with(new Carbon($date->Order_Date))->format('d/m/Y') : '';
            })
      ->editColumn('Due_Date', function ($date) {
                return $date->Due_Date ? with(new Carbon($date->Due_Date))->format('d/m/Y') : '';
            })
      ->order(function ($salesqad) {
                      $salesqad->orderBy('Sales_Order', 'desc');
                  })
      ->escapeColumns([])
      ->make();
    }

    // public function createcanceltable()
    // {
    //   $salesqad = Salesqad::
    //   select(['salesqads.Sales_Order', 'salesqads.Line', 'salesqads.wid', 'salesqads.Purchase_order','salesqads.Name',
    //   'salesqads.Item_Number','salesqads.Description', 'salesqads.Description_1','salesqads.Quantity_Ordered',
    //   'salesqads.status_item',
    //   'salesqads.Order_Date', 'salesqads.Due_Date','salesqads.id'
    //
    // ])
    //   ->where('salesqads.Quantity_Ordered', '!=', '0')
    //   ->where('salesqads.record_status', '=', 'Cancel')
    //   ;
    //   return Datatables::of($salesqad)
    //
    //   // ->editColumn('id', function ($salesqad) {
    //   // if ($salesqad->status == null)
    //   // {
    //     //       return '
    //     //       <a href="'. route('frontend.slsmark.samplerequisite', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add SRO"></i> SRO</a><br>
    //     //       <a href="'. route('frontend.slsmark.editrepeat', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Repeat" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Repeat</a><br>
    //     //       <a href="'. route('frontend.slsmark.remarkso', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Repeat" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Remark SO</a>
    //     //       ';
    //     //
    //     // })
    //
    //   ->editColumn('Order_Date', function ($date) {
    //             return $date->Order_Date ? with(new Carbon($date->Order_Date))->format('d/m/Y') : '';
    //         })
    //   ->editColumn('Due_Date', function ($date) {
    //             return $date->Due_Date ? with(new Carbon($date->Due_Date))->format('d/m/Y') : '';
    //         })
    //   ->order(function ($salesqad) {
    //                   $salesqad->orderBy('Sales_Order', 'desc');
    //               })
    //   ->escapeColumns([])
    //   ->make();
    // }

    // public function history($id, Request $request)
    // {
    //   $salesqad = Salesqad::find($id);
    //   $salesqad->record_status = 'cancel';
    //   $salesqad->save();
    //
    //   return redirect()->route('frontend.slsmark.create')->withFlashSuccess('The record status had changed');
    // }


    public function createSales()
    {
        $salesqad = Salesqad::select(['sales_order','line','wid', 'purchase_order', 'name', 'item_number', 'description', 'description_1','quantity_ordered', 'order_date','due_date', 'id','status'])
        // ->where('quantity_ordered', '!=', '0')
        ;
        return Datatables::of($salesqad)
            ->editColumn('id', function ($salesqad) {
            // if ($salesqad->status == null)
            // {
              return '<a href="'. route('frontend.slsmark.createsco', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add SC"></i> SC</a><br>
              <a href="'. route('frontend.slsmark.samplerequisite', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add SRO"></i> SRO</a><br>
              <a href="'. route('frontend.slsmark.createpaf', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add PAF"></i> PAF</a><br>
              <a href="'. route('frontend.slsmark.storerepeat', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Repeat" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Repeat</a><br>
              <a href="'. route('frontend.slsmark.remarkso', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="modal tooltip" title="Repeat" onclick=" return confirm(\'Are you sure you want to do this?\')"></i> Remark SO</a>
              ';

        })
        ->editColumn('order_date', function ($date) {
                  return $date->order_date ? with(new Carbon($date->order_date))->format('d/m/Y') : '';
              })
        ->editColumn('due_date', function ($date) {
                  return $date->due_date ? with(new Carbon($date->due_date))->format('d/m/Y') : '';
              })
        ->order(function ($salesqad) {
                        $salesqad->orderBy('sales_order', 'desc');
                    })
        ->escapeColumns([])
        ->make();
      }

      public function remarkso($id)
      {
          $salesqad = Salesqad::find($id);
          $stock = Stock::where('item_number', $salesqad->Item_Number)->where('soline', $salesqad->salesline)->first();
          return view('frontend.slsmark.remarkso')->with('salesqad', $salesqad)->with('stock', $stock);
      }

      public function storeremarkso($id, Request $request)
      {
				//return $request->all();
        $salesqad = Salesqad::find($id);
        $salesqad2 = Salesqad::where('Sales_Order', $salesqad->Sales_Order)->get();
        foreach ($salesqad2 as $s) {
          $s->soremark = $request->input('soremark');
          $s->save();

        }
        $sales = Sales::where('salesorder', $salesqad->Sales_Order)->get();
        foreach($sales as $s1){
          $s1->soremark = $request->input('soremark');
          $s1->save();
        }

        $salesqad1 = Salesqad::where('Line', $salesqad->Line)->where('Sales_Order', $salesqad->Sales_Order)->first();
        $salesqad1->solineremark = $request->input('solineremark');
        $salesqad1->widremark = $request->input('widremark');
        $salesqad1->status_item = $request->input('status_item');
        $salesqad1->wid = $request->input('wid');
        $salesqad1->save();

        $sales2 = Sales::where('salesline', $salesqad1->salesline)->first();
        if (!empty($sales2))
        {
          $sales2->solineremark = $request->input('solineremark');
          $sales2->widremark = $request->input('widremark');
          $sales2->status_item = $request->input('status_item');
          $sales2->wid = $request->input('wid');
          $sales2->save();
        }

        $addstock = Stock::where('item_number', $salesqad1->Item_Number)->where('soline', $salesqad1->salesline)->first();
        $addstock->manualstock = $request->input('manualstock');
        $addstock->keepqty = $request->input('keepqty');
        $addstock->save();


        return redirect()->route('frontend.slsmark.create')->withFlashSuccess('The data are saved');
      }

      public function createsco($id)
      {
          $salesqad = Salesqad::find($id);
          return view('frontend.slsmark.createsco')->with('salesqad', $salesqad);
      }

      public function store (Request $request, $id)
      {
          $salesqad = Salesqad::find($id);
          $salesqad->status_item = 'R';
          $salesqad->sc_status = 'SC';
          $salesqad->record_status = 'Modified';
          $salesqad->save();

          $status = $request->input('finish');

          if ($status == 'planner')
          {
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
            $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
            $sales->datetime = $dt;
            // $sales->salesqads_id = $salesqad->id;
            $sales->deliver_to = $salesqad->Ship_To;
            $sales->sold_to = $salesqad->Sold_To;
            $sales->custName = $request->input('custName');
            $sales->purchaseOrder = $request->input('purchaseOrder');
            $sales->user_id = Auth::user()->id;
            $sales->workorder = $request->input('workorder');
            $sales->wid = $request->input('wid');
            $sales->salesorder = $request->input('salesorder');
            $sales->line = $request->input('line');
            $sales->salesline = $request->input('salesline');
            $dte  = \DateTime::createFromFormat('d/m/Y',$request->input('deliverDate'));
            $sales->deliverDate = $dte ;


            $sales->status_item = 'R';
            $sales->record_status = 'Modified';
            $sales->approval = $request->input('approval');
            $sales->confirmBy = $request->input('confirmBy');
            //if got any image insert

            $sales->finish = $request->input('finish');
            $sales->save();

            $items= new Item;
            $items->sales_id = $sales->id;
            $items->model = $request->input('model');
            $items->partDesc = $request->input('partDesc');
            $items->partDesc2 = $request->input('partDesc2');
            $items->partNo = $request->input('partNo');
            $items->size = $request->input('size');
            $items->quantity = str_replace(",", "", $request->input('quantity'));
            $items->rawMaterial = $request->input('rawMaterial');
            $items->noPages = $request->input('noPages');
            $items->colour = $request->input('colour');
            $items->finishing = $request->input('finishing');
            $items->lot =  $request->input('lot');
            $items->mfgDate =  $request->input('mfgDate');
            $items->expiryDate =  $request->input('expiryDate');
            $items->dateFacNo =  $request->input('dateFacNo');
            $items->packerID =  $request->input('packerID');
            $items->remark = $request->input('remark');
            $remark=$request->input('remark');
            $dom = new \DomDocument();
			error_reporting(E_ERROR);
            $dom->loadHtml($remark);
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
            $items->remark = $dom->saveHTML();
            $items->save();

            $workorder = new Workorder;
            $workorder->sales_id = $sales->id;
            $workorder->wo_number = $request->input('workorder');
            $workorder->wid = $request->input('wid');
            $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
            $workorder->due_date = $dt;
            $workorder->save();

            $sales->items_id = $items->id;
            $sales->workorders_id = $workorder->id;
            $sales->save();

            // START file upload save
            $picture = '';

            if ($request->hasFile('images')) {
                    $files = $request->file('images');
                    foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture = $filename;
                    $destinationPath = base_path() . '/public/uploaded';

                    $file->move($destinationPath, $picture);

                    $fileUpload = new FileUpload;
                    $fileUpload->filename = $filename;
                    $fileUpload->sales_id = $sales->id;
                    $fileUpload->doc_id = $sales->sco_number;
                    $fileUpload->user_id = Auth::user()->id;
                    $fileUpload->save();
                  }
                }
                return redirect()->route('frontend.slsmark.index')->withFlashSuccess('The data is saved');
          }
          else
          {
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

            $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
            $sales->datetime = $dt;
            // $sales->salesqads_id = $salesqad->id;
            $sales->deliver_to = $salesqad->Ship_To;
            $sales->sold_to = $salesqad->Sold_To;
            $sales->custName = $request->input('custName');
            $sales->purchaseOrder = $request->input('purchaseOrder');
            $sales->user_id = Auth::user()->id;
            $sales->workorder = $request->input('workorder');
            $sales->wid = $request->input('wid');
            $sales->salesorder = $salesqad->Sales_Order;
            $sales->line = $salesqad->Line;
            $sales->salesline = $request->input('salesline');
            $dte  = \DateTime::createFromFormat('d/m/Y',$request->input('deliverDate'));
            $sales->deliverDate = $dte ;
            $sales->status_item = 'M';
            $sales->record_status = 'Modified';
            $sales->approval = $request->input('approval');
            $sales->confirmBy = $request->input('confirmBy');
            //if got any image insert

            $sales->finish = $request->input('finish');
            $sales->save();

            $items= new Item;
            $items->sales_id = $sales->id;
            $items->model = $request->input('model');
            $items->partDesc = $request->input('partDesc');
            $items->partDesc2 = $request->input('partDesc2');
            $items->partNo = $request->input('partNo');
            $items->size = $request->input('size');
            $items->quantity = str_replace(",", "", $request->input('quantity'));
            $items->rawMaterial = $request->input('rawMaterial');
            $items->noPages = $request->input('noPages');
            $items->colour = $request->input('colour');
            $items->finishing = $request->input('finishing');
            $items->lot =  $request->input('lot');
            $items->mfgDate =  $request->input('mfgDate');
            $items->expiryDate =  $request->input('expiryDate');
            $items->dateFacNo =  $request->input('dateFacNo');
            $items->packerID =  $request->input('packerID');
            $items->remark = $request->input('remark');
            $remark=$request->input('remark');
            $dom = new \DomDocument();
			error_reporting(E_ERROR);
            $dom->loadHtml($remark);
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
            $items->remark = $dom->saveHTML();
            $items->save();

            $workorder = new Workorder;
            $workorder->sales_id = $sales->id;
            $workorder->wo_number = $request->input('workorder');
            $workorder->wid = $request->input('wid');
            $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
            $workorder->due_date = $dt;
            $workorder->save();

            $sales->items_id = $items->id;
            $sales->workorders_id = $workorder->id;
            $sales->save();

            // START file upload save
            $picture = '';

            if ($request->hasFile('images')) {
                    $files = $request->file('images');
                    foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture = $filename;
                    $destinationPath = base_path() . '/public/uploaded';

                    $file->move($destinationPath, $picture);

                    $fileUpload = new FileUpload;
                    $fileUpload->filename = $filename;
                    $fileUpload->sales_id = $sales->id;
                    $fileUpload->doc_id = $sales->sco_number;
                    $fileUpload->user_id = Auth::user()->id;
                    $fileUpload->save();
                  }
                }

                return redirect()->route('frontend.slsmark.notfinish')->withFlashSuccess('The data is saved');
          }

        // END file upload save

      }
      public function createrepeat()
      {
          $salesqad= Salesqad::all();
          return view('frontend.slsmark.storerepeat')->with('Salesqad', $salesqad);
      }

      public function storerepeat (Request $request, $id)
      {
        $salesqad = Salesqad::find($id);

        $salesqad->status_item = 'R';
        $salesqad->sc_status = 'R';
        $salesqad->record_status = 'Repeat';
        $salesqad->save();

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
        // $sales->salesqads_id = $salesqad->id;
        $dt22 =  \Carbon\Carbon::now();
        $sales->datetime = $dt22;
        $sales->deliver_to = $salesqad->Ship_To;
        $sales->sold_to = $salesqad->Sold_To;
        $sales->custName = $salesqad->Name;
        $sales->purchaseOrder = $salesqad->Purchase_order;
        $sales->user_id = Auth::user()->id;
        $sales->wid = $salesqad->wid;
        $sales->salesorder = $salesqad->Sales_Order;
        $sales->line = $salesqad->Line;
        $sales->salesline = $salesqad->Sales_Order.'-'.$salesqad->Line;
        // $dt2 =  \DateTime::createFromFormat('d/m/Y', $salesqad->Due_Date);
        // $sales->deliverDate = $dt2;
        $sales->deliverDate = $salesqad->Due_Date;
        $sales->status_item = 'R';
        $sales->record_status = 'Repeat';
        $sales->repeatdone = 'planner';
        $sales->save();

        $items= new Item;
        $items->sales_id = $sales->id;
        $items->partDesc = $salesqad->Description;
        $items->partDesc2 = $salesqad->Description_1;
        $items->partNo = $salesqad->Item_Number;
        $items->size = $salesqad->Size;
        $items->quantity = str_replace(",", "", $salesqad->Quantity_Ordered);
        $items->save();

        $workorder = new Workorder;
        $workorder->sales_id = $sales->id;
        $workorder->wid = $salesqad->wid;
        // $dt =  \DateTime::createFromFormat('d/m/Y', $salesqad->Due_Date);
        // $workorder->due_date = $dt;
        $workorder->due_date = $salesqad->Due_Date;
        $workorder->save();

        $sales->items_id = $items->id;
        $sales->workorders_id = $workorder->id;
        $sales->save();

        return redirect()->route('frontend.slsmark.addrepeat')->withFlashSuccess('The repeat data had been created');
      }

      public function createpaf($id)
      {
          $salesqad= Salesqad::find($id);
          return view('frontend.slsmark.createpaf')->with('salesqad', $salesqad);
      }

      public function storepaf(Request $request, $id)
      {
        if (access()->hasPermissions(['sales-marketing']))
        {
          $salesqad = Salesqad::find($id);
          $salesqad->status_item = 'M';
          $salesqad->sc_status = 'PAF';
          $salesqad->record_status = 'Modified';
          $salesqad->save();
		  //return $salesqad;

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

          $sales->user_id = Auth::user()->id;
          $sales->custName = $salesqad->Name;
          $sales->deliver_to = $salesqad->Ship_To;
          $sales->sold_to = $salesqad->Sold_To;
		  if ($salesqad->Due_Date == null || $salesqad->Due_Date == '0')
		  { 
			 
		  }else{
			  $sales->deliverDate = $salesqad->Due_Date;
		  }
          
          $sales->datetime = \Carbon\Carbon::now();
          $sales->status = 'PAF';


          $sales->status_item = 'M';
          $sales->record_status = 'Modified';
          $sales->finish = 'PAF';
          $sales->save();

          $items = new Item;
          $items->sales_id = $sales->id;
          $items->rawcheck =$request->input('rawcheck');

          $items->partNo = $salesqad->Item_Number;
          $items->partDesc = $request->input('partDesc');
          $items->partDesc2 = $request->input('partDesc2');
          $items->quantity = str_replace(",", "", $request->input('quantity'));
          $items->size = $request->input('size');
          $items->rawMaterial = $request->input('rawMaterial');
          $items->noPages = $request->input('noPages');
          $items->colour = $request->input('colour');
          $items->finishing = $request->input('finishing');
          $items->lot = $request->input('lot');
          $items->mfgDate = $request->input('mfgDate');
          $items->expiryDate = $request->input('expiryDate');
          $items->dateFacNo = $request->input('dateFacNo');
          $items->packerID = $request->input('packerID');
          $items->batchbar = $request->input('batchbar');
          $items->lotcheck = $request->input('lotcheck');
          $items->mfgcheck = $request->input('mfgcheck');
          $items->expcheck = $request->input('expcheck');
          $items->datecheck = $request->input('datecheck');
          $items->packcheck = $request->input('packcheck');
          $items->batchcheck = $request->input('batchcheck');
          $items->save();

          $workorder = new Workorder;
          $workorder->sales_id = $sales->id;
          $workorder->wid = $salesqad->wid;
          $dt =  \DateTime::createFromFormat('d/m/Y',$salesqad->Due_Date);
          $workorder->due_date = $dt;
          $workorder->save();

          $product = new Product;
          $product->users_id = Auth::user()->id;
          $product->items_id = $items->id;
          $latestproduct = Product::orderBy('created_at', 'desc')->first();
          if ($latestproduct === null){
            $product->paf_number = 'PAF-' . Carbon::now()->format('y') . '-00001';
          }
          else{
            $number = (int) substr($latestproduct->paf_number,-5,5);
            $number ++;
            $product->paf_number = 'PAF-' . Carbon::now()->format('y') .'-'. str_pad($number,5,'0',STR_PAD_LEFT );
          }
          $product->oldpartno = $request->input('oldpartno');
          $product->lot1 =  $request->input('lot');
          $product->mfgDate1 =  $request->input('mfgDate');
          $product->expiryDate1 =  $request->input('expiryDate');
          $product->dateFacNo1 =  $request->input('dateFacNo');
          $product->packerID1 =  $request->input('packerID');
          $product->size1 = $request->input('size');
          $product->rawMaterial1 = $request->input('rawMaterial');
          $product->noPages1 = $request->input('noPages');
          $product->colour1 = $request->input('colour');
          $product->finishing1 = $request->input('finishing');
          $product->sco_number =$sales->sco_number;
          $product->approval = $request->input('approval');
          $product->remarkbig = $request->input('remarkbig');
          $product->material =  $request->input('material');
          $product->data =  $request->input('data');
          $product->artwork =  $request->input('artwork');
          $product->diecut =  $request->input('diecut');
          $product->attachment =  $request->input('attachment');
          $product->revNo = $request->input('revNo');
          $product->newArtwork  = $request->input('newArtwork');
          $product->films = $request->input('films');
          $product->technicalDrawing = $request->input('technicalDrawing');
          $product->digitalProofing = $request->input('digitalProofing');
          $product->artworkDrawing = $request->input('artworkDrawing');
          $product->colorLimit = $request->input('colorLimit');
          $product->bluePrint = $request->input('bluePrint');
          $product->pmrf = $request->input('pmrf');
          $product->other = $request->input('other');
          $product->other_text = $request->input('other_text');
          $product->yes = $request->input('yes');
          $product->no = $request->input('no');
          $product->customer = $request->input('customer');
          $product->customer_text = $request->input('customer_text');
          $product->qa = $request->input('qa');
          $product->qa_text = $request->input('qa_text');
          $product->production = $request->input('production');
          $product->production_text = $request->input('production_text');
          $product->qtyOnHand = $request->input('qtyOnHand');
          $dtprod = \DateTime::createFromFormat('d/m/Y',  $request->input("datetime"));
          $product->datetime =$dtprod;
          $product->productionProcess = $request->input('productionProcess');
          $product->handCutSubmission = $request->input('handCutSubmission');
          $product->yes1 = $request->input('yes1');
          $product->no1 = $request->input('no1');
          $product->wip = $request->input('wip');
          $product->fg = $request->input('fg');
          $product->rcp = $request->input('rcp');
          $product->cutoff = $request->input('cutoff');
          $product->kiv = $request->input('kiv');
          $product->workOrderID = $request->input('workOrderID');
          $product->notAvailable1 = $request->input('notAvailable1');
          $product->adviseBy = $request->input('adviseBy');
          $product->issueBy = $request->input('issueBy');
          $product->done = 'planner';
          $remarkbig = $request->input('remarkbig');
          $dom = new \DomDocument();
		  error_reporting(E_ERROR);
          $dom->loadHtml($remarkbig);
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
              $product->remarkbig = $dom->saveHTML();
              $product->save();

              $sales->paf_number= $product->paf_number;
              $sales->items_id= $items->id;
              $sales->workorders_id= $workorder->id;
              $sales->save();

              $prodedit = new Prodedit;
              $prodedit->products_id = $product->id;
              $prodedit->save();

              // START file upload save
              $picture = '';

              if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach($files as $file){
                  $filename = $file->getClientOriginalName();
                  $extension = $file->getClientOriginalExtension();
                  $picture = $filename;
                  $destinationPath = base_path() . '/public/uploaded';

                  $file->move($destinationPath, $picture);

                  $fileUpload = new FileUpload;
                  $fileUpload->filename = $filename;
                  $fileUpload->products_id = $product->id;
                  $fileUpload->doc_id = $product->paf_number;
                  $fileUpload->user_id = Auth::user()->id;
                  $fileUpload->save();
                }
              }
              return redirect()->route('frontend.slsmark.review')->withFlashSuccess('The data is saved.');
            }
		//if dont have permission
        else
        {
          $sales= Sales::find($id);
          $product = Product::where('paf_number', $request->input('paf_number'))->first();
          $product->remarkbig=$request->input('remarkbig');
          $product->notAvailable1=$request->input('notAvailable1');
          $product->dispose1=$request->input('dispose1');
          $product->ctpPlate_text=$request->input('ctpPlate_text');
          $product->notAvailable2=$request->input('notAvailable2');
          $product->dispose2=$request->input('dispose2');
          $product->film_text=$request->input('film_text');
          $product->ctp_issue=$request->input('ctp_issue');
          $product->save();

          return redirect()->route('frontend.slsmark.review')->withFlashSuccess('The data is saved.');
        }

    } //storepaf

    public function createsc()
    {
        return view('frontend.slsmark.createsc');
    }

    public function storesc (Request $request)
    {
      $this->validate($request,[
        'partNo' => 'unique:invqads,items_number'
      ],
      [
        'partNo.unique'            => 'The item number entered already existed.'
      ]);
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
        $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
        $sales->datetime = $dt;
        $sales->user_id = Auth::user()->id;
        $sales->custName = $request->input('custName');
        $sales->purchaseOrder = $request->input('purchaseOrder');
        $sales->workorder = $request->input('workorder');
        $sales->wid = $request->input('wid');
        $sales->salesorder =$request->input('salesorder');
        $sales->line = $request->input('line');
        $sales->salesline = $request->input('salesorder').'-'.$request->input('line');
		if($request->input('deliverDate') == 0)
		{
			$dte = null;
		}else
		{
			$dte  = \DateTime::createFromFormat('d/m/Y',$request->input('deliverDate'));
		}
        $dte  = \DateTime::createFromFormat('d/m/Y',$request->input('deliverDate'));
        $sales->deliverDate = $dte ;
        $sales->status_item = 'N';
        $sales->record_status = 'New';
        $sales->approval = $request->input('approval');
        $sales->confirmBy = $request->input('confirmBy');
        $sales->finish = $request->input('finish');
        $sales->save();

        $items= new Item;
        $items->sales_id = $sales->id;
        $items->model = $request->input('model');
        $items->partDesc = $request->input('partDesc');
        $items->partDesc2 = $request->input('partDesc2');
        $items->partNo = $request->input('partNo');
        $items->size = $request->input('size');
        $items->quantity = str_replace(",", "", $request->input('quantity'));
        $items->rawMaterial = $request->input('rawMaterial');
        $items->noPages = $request->input('noPages');
        $items->colour = $request->input('colour');
        $items->finishing = $request->input('finishing');
        $items->lot =  $request->input('lot');
        $items->mfgDate =  $request->input('mfgDate');
        $items->expiryDate =  $request->input('expiryDate');
        $items->dateFacNo =  $request->input('dateFacNo');
        $items->packerID =  $request->input('packerID');
        $items->remark = $request->input('remark');
        $remark=$request->input('remark');
        
        error_reporting(E_ERROR);
        $dom = new \DomDocument();
        $dom->loadHtml($remark);
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
        $items->remark = $dom->saveHTML();
        $items->save();

        $workorder = new Workorder;
        $workorder->sales_id = $sales->id;
        $workorder->wo_number = $request->input('workorder');
        $workorder->wid = $request->input('wid');
        $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("deliverDate"));
        $workorder->due_date = $dt;
        $workorder->save();

        $sales->items_id = $items->id;
        $sales->workorders_id = $workorder->id;
        $sales->save();

        $change = new Change;
        $change->sales_id = $sales->id;
        $change->save();

        // START file upload save
        $picture = '';

        if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = $filename;
                $destinationPath = base_path() . '/public/uploaded';

                $file->move($destinationPath, $picture);

                $fileUpload = new FileUpload;
                $fileUpload->filename = $filename;
                $fileUpload->sales_id = $sales->id;
                $fileUpload->doc_id = $sales->sco_number;
                $fileUpload->user_id = Auth::user()->id;
                $fileUpload->save();
              }
            }
      // END file upload save
        return redirect()->route('frontend.slsmark.notfinish')->withFlashSuccess('The data is saved');
    }

    public function anyData()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
      $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
      ->select(['sales.sco_number','sales.wid','sales.custName', 'items.partNo', 'items.partDesc','items.partDesc2', 'sales.rev', 'sales.id','sales.created_at'])
      ->where('finish', '=', 'planner')
      -orWhere('finish', '=', 'complete')

      ;

      return Datatables::of($sales)

      ->editColumn('id', function ($sales) {
        //return $sales->action_buttons;
        return '
        <a href="'. route('frontend.slsmark.edit', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="PAF"></i></a>
        <a href="'. route('frontend.slsmark.editscof', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
        <a href="'. route('frontend.slsmark.show', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View SCO"></i></a>
        <a href="'. route('frontend.slsmark.destroy', $sales->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="Delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
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
      else
      {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->select(['sales.wid','sales.custName', 'items.partNo', 'items.partDesc','items.partDesc2', 'sales.id','sales.created_at'])
        ->where('finish', '=', 'planner')
        -orWhere('finish', '=', 'complete')
        ;

        return Datatables::of($sales)

        ->editColumn('id', function ($sales) {

            return '
            <a href="'. route('frontend.slsmark.editscof', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
            <a href="'. route('frontend.slsmark.show', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View SCO"></i></a>
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
    }

    public function notfinish()
    {
        $sales=Sales::all();
        return view('frontend.slsmark.notfinish')->with('sales',$sales);
    }

    public function notfinishnewsc()
    {
        $sales=Sales::all();
        return view('frontend.slsmark.notfinishnewsc')->with('sales',$sales);
    }

    public function notfinishistorysc()
    {
        $sales=Sales::all();
        return view('frontend.slsmark.notfinishistorysc')->with('sales',$sales);
    }

    public function unfinishtable()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
      $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
      ->leftJoin('addstocks', 'addstocks.so_number','=', 'sales.salesorder')
      ->select(['sales.sco_number','sales.salesorder', 'sales.line', 'sales.wid', 'sales.purchaseOrder','sales.custName',
      'items.partNo','items.partDesc', 'items.partDesc2','items.quantity',
      'addstocks.keep_qty','addstocks.manual_qty', 'addstocks.stockqty', 'sales.status_item','addstocks.woqty', 'addstocks.totalwoqty',
      'sales.deliverDate', 'sales.id', 'sales.record_status','sales.widremark','sales.soremark', 'sales.solineremark'

      ])
      ->where('finish', '=', 'N')
	  ->orderBy('sales.id', 'desc');
      ;

      return Datatables::of($sales)

      ->editColumn('id', function ($sales) {
        //return $sales->action_buttons;
        return '
        <a href="'. route('frontend.slsmark.edit', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="PAF"></i></a>
        <a href="'. route('frontend.slsmark.editscof', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
        <a href="'. route('frontend.slsmark.show', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View SCO"></i></a>
        <a href="'. route('frontend.slsmark.destroy', $sales->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="Delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
        ';

      })
      ->editColumn('deliverDate', function ($date) {
                return $date->deliverDate ? with(new Carbon($date->deliverDate))->format('d/m/Y') : '';
            })
      // ->order(function ($sales) {
      //                 $sales->orderBy('created_at', 'desc');
      //             })
       ->order(function ($sales) {
                       $sales->orderBy('deliverDate', 'desc');
                   })

      ->escapeColumns([])
      ->make();
      }
      else
      {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->leftJoin('addstocks', 'addstocks.so_number','=', 'sales.salesorder')
        ->select(['sales.sco_number','sales.salesorder', 'sales.line', 'sales.wid', 'sales.purchaseOrder','sales.custName',
        'items.partNo','items.partDesc', 'items.partDesc2','items.quantity',
        'addstocks.keep_qty','addstocks.manual_qty', 'addstocks.stockqty', 'sales.status_item','addstocks.woqty', 'addstocks.totalwoqty',
        'sales.deliverDate', 'sales.id', 'sales.record_status','sales.widremark','sales.soremark', 'sales.solineremark'

      ])
        ->where('finish', '=', 'N')
        ;

        return Datatables::of($sales)

        ->editColumn('id', function ($sales) {

            return '
            <a href="'. route('frontend.slsmark.editscof', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
            <a href="'. route('frontend.slsmark.show', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View SCO"></i></a>
            ';
              })
        //->editColumn('created_at', function ($date) {
        //          return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
        //      })
        //->order(function ($sales) {
        //               $sales->orderBy('created_at', 'desc');
        //           })
        ->order(function ($sales) {
                       $sales->orderBy('deliverDate', 'desc');
                   })

        ->escapeColumns([])
        ->make();
      }
    }

    public function newmanualso()
    {
        $sales=Sales::all();
        $manual = Manual::all();
        return view('frontend.slsmark.newmanualso')->with('sales',$sales)->with('manual',$manual);
    }

    public function newmanualtable()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
        $manual = Manual::select(['manual_id','part_no', 'soqty' , 'keepqty','manualstock','duedate','cust_po' ,'sono', 'paper', 'status'])
        ->where('status', '=', 'stock' )
        ->orWhere('status', '=', 'plan')
        ;

        return Datatables::of($manual)
          ->editColumn('id', function ($manual) {
                    return '<a href="'. route('frontend.slsmark.confirmscmanual', $manual->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Release BOM"></i></a>
                    ';
                })
        ->editColumn('duedate', function ($date) {
                  return $date->duedate ? with(new Carbon($date->duedate))->format('d/m/Y') : '';
              })

        ->escapeColumns([])
        ->make();
      }
      else
      {
        $manual = Manual::select(['manual_id','part_no', 'soqty' , 'keepqty','manualstock', 'duedate','sono', 'paper'])
        ->where('status', '=', 'stock' )
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

    public function confirmscmanual($id)
    {
      $manual = Manual::find($id);
      $manual->status = 'confirm';
      $manual->save();

      // $sales = new Sales;
      // $sales->deliverDate = $manual->duedate;
      // $sales->datetime = \Carbon\Carbon::now();
      // $sales->purchaseOrder = $manual->custpo;
      // $sales->salesorder = $manual->sono;
      // $sales->finish = 'Manual';
      // $sales->save();
      //
      // $items = New Item;
      // $items->partNo = $manual->part_no;
      // $items->save();

      // $workorder = New Workorder;
      // $workorder->sales_id = $sales->id;
      // $workorder->save();

      return redirect()->route('frontend.slsmark.histmanualso')->withFlashDanger('The Manual been confirmed.');
    }

    public function histmanualso()
    {
        $sales=Sales::all();
        $manual = Manual::all();
        return view('frontend.slsmark.histmanualso')->with('sales',$sales)->with('manual',$manual);
    }

    public function histmanualtable()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
        $manual = Manual::select(['customer_name','manual_wid', 'manual_wo','part_no','child_part', 'soqty' , 'keepqty','manualstock','stockcard','duedate','custpo' ,'sono', 'paper', 'status', 'id'])
        ->where('status','complete' )
        ->orWhere('status', '=', 'plan')
        ;
        return Datatables::of($manual)
        ->editColumn('duedate', function ($date) {
                  return $date->duedate ? with(new Carbon($date->duedate))->format('d/m/Y') : '';
        })
        ->editColumn('stockcard', function ($manual) {

          $balance = DB::table("invqads")->where('items_number', $manual->part_no)->sum('qtyonhand_detail');
          $bal2 = DB::table("salesqads")->where('Sales_Order','=', $manual->sono)->sum('Quantity_Ordered');
          $bal1 = DB::table("addstocks")->where('so_number', $manual->sono)->where('items_number','=', $manual->part_number)->sum('woqty');
          
          $bal3 = DB::table("transactions")->where('items_number','=', $manual->part_no)->sum('loc_qty_change');

          return ''.$balance+$bal1-$bal2+$bal3.'';

        })
				->editColumn('id', function ($manual){
					return '<a href="'.route('frontend.slsmark.editManualSO', $manual->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>';
				
				})
			
        ->escapeColumns([])
        ->make();
      }
      else
      {
        $manual = Manual::select(['manual_id','part_no', 'soqty' , 'keepqty','manualstock','stockcard', 'duedate','sono', 'paper', 'status', 'id'])
        ->where('status', '=', 'plan')
        ->orWhere('status', '=', 'complete')
        ;

        return Datatables::of($manual)
        ->editColumn('duedate', function ($date) {
                  return $date->duedate ? with(new Carbon($date->duedate))->format('d/m/Y') : '';
              })

        ->escapeColumns([])
        ->make();
      }
    }

		public function editManualSO($id)
		{

			$m = Manual::find($id);
			//return $m;
			return view('frontend.slsmark.editManualSO')->with('mso',$m);
		}
		
		public function updateManualSO(Request $r)
		{
			$m = Manual::find($r->id);
			
			$m->manual_wid = $r->manual_wid;
			$m->manual_wo = $r->manual_wo;
			$m->part_no = $r->part_no;
			$m->child_part = $r->child_part;
			$m->soqty = $r->so_qty;
			$m->keepqty = $r->keep_qty;
			$m->duedate = $r->duedate;
			$m->sono = $r->sono;
			$m->paper = $r->paper;
			$m->remark1 = $r->remark2;
			$m->remark2 = $r->remark2;
			$m->remark3 = $r->remark3;
			$m->remark4 = $r->remark4;
			$m->remark5 = $r->remark5;
			$m->stockcard = $r->stockcard;
			$m->save();
			
			 $sales=Sales::all();
        $manual = Manual::all();
        return view('frontend.slsmark.histmanualso')->with('sales',$sales)->with('manual',$manual);
			
		}
			
    public function updatewid()
    {
      $salesqad = Salesqad::all();
      $sales = Sales::all();
      return view('frontend.slsmark.updatewid')->with('sales',$sales)->with('Salesqad', $salesqad);
    }

    public function tablewid()
    {
      $salesqad = Salesqad::
      leftJoin('addstocks', 'addstocks.so_number','=', 'salesqads.Sales_Order')
      // ->leftJoin('stocks', 'stocks.soline', '=', 'salesqads.salesline')
      ->select(['salesqads.Sales_Order', 'salesqads.Line', 'salesqads.wid', 'salesqads.Purchase_order','salesqads.Name',
      'salesqads.Item_Number','salesqads.Description', 'salesqads.Description_1','salesqads.Quantity_Ordered',
      'addstocks.keep_qty','addstocks.manual_qty', 'addstocks.stockqty', 'salesqads.status_item','addstocks.woqty', 'addstocks.totalwoqty',
      'salesqads.Order_Date', 'salesqads.Due_Date', 'salesqads.id', 'salesqads.record_status','salesqads.widremark','salesqads.soremark', 'salesqads.solineremark'
    ])
      ;
      return Datatables::of($salesqad)

      ->editColumn('id', function ($salesqad) {

      if (!empty($salesqad->widremark))
      {
        return '<a href="'. route('frontend.slsmark.editwid', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit WID"></i></a>
        ';
      }
      else
      {
        return ' <input type="checkbox" name="things[]" value="'.$salesqad->id.'" >
                  <input type="hidden" name="item_number[]" value="'.$salesqad->sales_order.'" >
        ';
      }
    })
    ->editColumn('totalwoqty', function ($salesqad) {
      $bal3 = DB::table("addstocks")->where('items_number', $salesqad->Item_Number)->where('so_number','=', $salesqad->Sales_Order)->sum('woqty');

      return ''.$bal3.'';
    })
    ->editColumn('stockqty', function ($salesqad) {
      $balance = DB::table("addstocks")->where('so_number', $salesqad->Sales_Order)->where('items_number','=', $salesqad->Item_Number)->sum('stockqty');
      $bal1 = DB::table("addstocks")->where('so_number', $salesqad->Sales_Order)->where('items_number','=', $salesqad->Item_Number)->sum('woqty');
      $bal2 = DB::table("salesqads")->where('Sales_Order','=', $salesqad->Sales_Order)->sum('Quantity_Ordered');
      $bal3 = DB::table("transactions")->where('items_number','=', $salesqad->Item_Number)->sum('loc_qty_change');

      return ''.$balance+$bal1-$bal2+$bal3.'';

    })

      ->editColumn('Order_Date', function ($date) {
                return $date->Order_Date ? with(new Carbon($date->Order_Date))->format('d/m/Y') : '';
            })
      ->editColumn('Due_Date', function ($date) {
                return $date->Due_Date ? with(new Carbon($date->Due_Date))->format('d/m/Y') : '';
            })
      ->order(function ($salesqad) {
                      $salesqad->orderBy('Sales_Order', 'asc');
                  })
      ->escapeColumns([])
      ->make();
    }

    public function updatewidtable()
    {
      $salesqad = Salesqad::select(['wid','sales_order', 'purchase_order','line', 'name', 'item_number', 'description', 'description_1','quantity_ordered', 'order_date','due_date', 'id','status'])
      ->where('quantity_ordered', '!=', '0');
      return Datatables::of($salesqad)
          ->editColumn('id', function ($salesqad) {
          // if ($salesqad->status == null)
          // {
          if (!empty($salesqad->wid))
          {
            return '<a href="'. route('frontend.slsmark.editwid', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit WID"></i></a>
            ';
          }
          else
          {
            return ' <input type="checkbox" name="things[]" value="'.$salesqad->id.'" >
                      <input type="hidden" name="item_number[]" value="'.$salesqad->sales_order.'" >
            ';
          }
          // }
          // else
          // {
          //   return '';
          // }
      })
      ->editColumn('order_date', function ($date) {
                return $date->order_date ? with(new Carbon($date->order_date))->format('d/m/Y') : '';
            })
      ->editColumn('due_date', function ($date) {
                return $date->due_date ? with(new Carbon($date->due_date))->format('d/m/Y') : '';
            })
      ->order(function ($salesqad) {
                      $salesqad->orderBy('sales_order', 'desc');
                  })
      ->escapeColumns([])
      ->make();
    }

    public function updatewidview(Request $request)
    {
      $check = $request->input('things');
      $check1 = $request->input('item_number');
      // return $request->all();
      $salesqad = Salesqad::find($check);
      $sales = Sales::where('salesorder', $check1)->first();

      return view('frontend.slsmark.updatewidview')->with('check', $check)->with('salesqad', $salesqad)->with('sales', $sales);
    }

    public function updatewidstore(Request $request)
    {
      $c = $request->input('id');
      $c1 = $request->input('salesorder');
      foreach ($c as $v) {
        $salesqad = Salesqad::find($v);
        $salesqad->wid = $request->input('wid');
        $salesqad->widremark = $request->input('remark');
        $salesqad->save();

        $sales = Sales::where('salesline', $salesqad->salesline)->first();
        if(!empty($sales))
        {
          $sales->wid = $request->input('wid');
          $sales->widremark = $request->input('remark');
          $sales->save();
        }
        else{

        }
      }

      $sales = Sales::where('salesorder', $c1)->first();
      // dd( $sales);
      if (!empty($sales))
      {
        $sales->wid = $request->input('wid');
        $sales->save();
        return redirect()->route('frontend.slsmark.updatewid')->withFlashSuccess('The data is saved.');
      }
      else
      {
        return redirect()->route('frontend.slsmark.updatewid')->withFlashSuccess('The data is saved.');
      }
    }

    public function editwid($id)
    {
      $salesqad = Salesqad::find($id);
      $salesqad1 = Salesqad::where('wid', $salesqad->wid)->first();
      return view('frontend.slsmark.editwid')->with('salesqad',$salesqad)->with('salesqad1', $salesqad1);
    }

    public function editwidstore($id, Request $request)
    {
      $salesqad = Salesqad::find($id);
      $salesqad2 = Salesqad::where('wid', $salesqad->wid)->get();
      foreach ($salesqad2 as $s)
      {
        $s->wid = $request->input('wid');
        $s->widremark = $request->input('remark');
        $s->save();
      }
      $sales = Sales::where('salesline', $salesqad->salesline)->get();
      if (!empty($sales))
      {
        foreach ($sales as $sale)
        {
          $sale->wid = $request->input('wid');
          $sale->widremark = $request->input('remark');
          $sale->save();
        }
      }

        return redirect()->route('frontend.slsmark.editwid', $salesqad->id)->withFlashSuccess('The data is saved.');
    }


    public function editwidtable(Request $request)
    {
      $salesqad = Salesqad::select(['item_number', 'description', 'description_1','wid', 'line', 'sales_order', 'id'])
      ->where('wid', '=', $request->input('wid') );
      return Datatables::of($salesqad)
          ->editColumn('id', function ($salesqad) {
            return '<a href="'. route('frontend.slsmark.deletewid', $salesqad->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
            ';
      })
      ->order(function ($salesqad) {
                      $salesqad->orderBy('sales_order', 'desc');
                  })
      ->escapeColumns([])
      ->make();
    }


    public function review()
    {
      $sales=Sales::all();
      $product=Product::all();
      return view('frontend.slsmark.review')->with('sales',$sales)->with('product', $product);
    }

    public function showformTable()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
          $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
                              ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
                              ->select(['products.paf_number','sales.wid', 'sales.custName','items.partNo','items.partDesc','items.partDesc2','products.rev', 'products.id' ])
                              // ->where('products.done', '=', null)
                              ;

          return Datatables::of($product)
            ->editColumn('id', function ($product) {

            $prod = Product::find($product->id);
            $sales = Sales::where('sco_number', $prod->sco_number)->first();

            return '<a href="'. route('frontend.slsmark.editform', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit PAF"></i></a>
                  <a href="'. route('frontend.slsmark.viewpaf', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View PAF"></i></a>
            <a href="'. route('frontend.slsmark.delete', $product->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
            ';
          })
          ->escapeColumns([])
          ->make();
        }
        elseif(access()->hasPermissions(['ctp']))
        {
          $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
                              ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
                              ->select(['products.paf_number','sales.wid', 'sales.custName','items.partNo','items.partDesc','items.partDesc2', 'products.id' ])
                              // ->where('products.done', '=', null)
                              ;

          return Datatables::of($product)
            ->editColumn('id', function ($product) {
            return '<a href="'. route('frontend.slsmark.editform', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit PAF"></i></a>
            ';
          })
          ->escapeColumns([])
          ->make();
        }
        else
        {
          $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
                              ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
                              ->select(['products.paf_number','sales.wid', 'sales.custName','items.partNo','items.partDesc','items.partDesc2', 'products.id' ])
                              ->where('products.done', '=', null)
                              ;

          return Datatables::of($product)
            ->editColumn('id', function ($product) {
            return '<a href="'. route('frontend.slsmark.viewpaf', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View PAF"></i></a>';
          })
          ->escapeColumns([])
          ->make();
        }
    }

    public function reviewhistory()
    {
      $sales=Sales::all();
      $product=Product::all();
      return view('frontend.slsmark.reviewhistory')->with('sales',$sales)->with('product', $product);
    }

    public function showformhistTable()
    {
			
      // if (access()->hasPermissions(['sales-marketing']))
      // {
				 $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
        ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
        ->leftJoin('addstocks', 'addstocks.so_number','=', 'sales.salesorder')
        ->select(['products.paf_number as paf','sales.salesorder', 'sales.line', 'sales.wid', 'sales.purchaseOrder','sales.custName',
				'items.partNo','items.partDesc', 'items.partDesc2','items.quantity',
        'addstocks.keep_qty','addstocks.manual_qty', 'addstocks.stockqty', 'sales.status_item','addstocks.woqty', 'addstocks.totalwoqty',
        'sales.deliverDate', 'products.id','products.rev','products.done'
				
				])
				// ->where('products.done', '=', 'planner')
				// ->orWhere('products.done', '=', 'complete')
				->orderBy('products.paf_number','desc')
				->whereIn('products.done', ['planner','complete']);

				return Datatables::of($product)
					->editColumn('id', function ($product) {

						$prod = Product::find($product->id);
						$sales = Sales::where('sco_number', $prod->sco_number)->first();

						return '<a href="'. route('frontend.slsmark.editform', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit PAF"></i></a>
								<a href="'. route('frontend.slsmark.viewpaf', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View PAF"></i></a>
						<a href="'. route('frontend.slsmark.delete', $product->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
					';
				})
				->escapeColumns([])
				->make();
			// }	
				
        // $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
        // ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
        // ->leftJoin('addstocks', 'addstocks.so_number','=', 'sales.salesorder')
        // ->select(['products.paf_number','sales.salesorder', 'sales.line', 'sales.wid', 'sales.purchaseOrder','sales.custName',
				// 'items.partNo','items.partDesc', 'items.partDesc2','items.quantity',
        // 'addstocks.keep_qty','addstocks.manual_qty', 'addstocks.stockqty', 'sales.status_item','addstocks.woqty', 'addstocks.totalwoqty',
        // 'sales.deliverDate', 'products.id','products.rev','products.done'

				// ])
				// ->where('products.done', '=', 'planner')
				// ->orWhere('products.done', '=', 'complete');

				// return Datatables::of($product)
					// ->editColumn('id', function ($product) {

						// $prod = Product::find($product->id);
						// $sales = Sales::where('sco_number', $prod->sco_number)->first();

						// return '<a href="'. route('frontend.slsmark.editform', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit PAF"></i></a>
								// <a href="'. route('frontend.slsmark.viewpaf', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View PAF"></i></a>
						// <a href="'. route('frontend.slsmark.delete', $product->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
					// ';
				// })
				// ->escapeColumns([])
				// ->make();
      // }
        // elseif(access()->hasPermissions(['ctp']))
        // {
          // $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
					// ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
					// ->leftJoin('addstocks', 'addstocks.so_number','=', 'sales.salesorder')
					// ->select(['products.paf_number','sales.salesorder', 'sales.line', 'sales.wid', 'sales.purchaseOrder','sales.custName',
					// 'items.partNo','items.partDesc', 'items.partDesc2','items.quantity',
					// 'addstocks.keep_qty','addstocks.manual_qty', 'addstocks.stockqty', 'sales.status_item','addstocks.woqty', 'addstocks.totalwoqty',
					// 'sales.deliverDate', 'products.id','products.rev','products.done'

					// ])
					// ->where('products.done', '=', 'planner')
					// ->orWhere('products.done', '=', 'complete');

					// return Datatables::of($product)
					// ->editColumn('id', function ($product) {
						// return '<a href="'. route('frontend.slsmark.editform', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit PAF"></i></a>
						// ';
					// })
					// ->escapeColumns([])
					// ->make();
				// }
        // else
        // {
          // $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
          // ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
          // ->leftJoin('addstocks', 'addstocks.so_number','=', 'sales.salesorder')
          // ->select(['products.paf_number','sales.salesorder', 'sales.line', 'sales.wid', 'sales.purchaseOrder','sales.custName',
          // 'items.partNo','items.partDesc', 'items.partDesc2','items.quantity',
          // 'addstocks.keep_qty','addstocks.manual_qty', 'addstocks.stockqty', 'sales.status_item','addstocks.woqty', 'addstocks.totalwoqty',
          // 'sales.deliverDate', 'products.id','products.rev','products.done'

        // ])
        // ->where('products.done', '=', 'planner')
        // ->orWhere('products.done', '=', 'complete');

				// return Datatables::of($product)
					// ->editColumn('id', function ($product) {
					// return '<a href="'. route('frontend.slsmark.viewpaf', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View PAF"></i></a>';
				// })
				// ->escapeColumns([])
				// ->make();
        // }
    }

    public function viewpaf($id)
    {
      $product = Product::find($id);
      $prodedit = Prodedit::where('products_id', $product->id)->first();
      $items = Item::find($product->items_id);
      $sales = Sales::where('items_id', $items->id)->first();
      return view('frontend.slsmark.viewpaf')->with('product',$product)->with('sales',$sales)->with('prodedit', $prodedit);
    }

    //x pakai
    public function sco_paf ($id)
    {
      $sales = Sales::find($id);
      $items = Item::find($sales->items->id);
      return view('frontend.slsmark.sco_paf')->with('sales', $sales);
    }
//x pakai
    public function storesco (Request  $request, $id)
    {

      $sales= Sales::find($id);
      $items = Item::find($sales->items->id);

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
      $sales->user_id = Auth::user()->id;

      $sales->workorder = $request->input('workorder');
      $sales->wid =$request->input('wid');
      $sales->salesorder = $request->input('salesorder');
      $sales->line =$request->input('line');
      $sales->approval = $request->input('approval');
      $dt  = \DateTime::createFromFormat('d/m/Y',$request->input('datetime'));
      $sales->datetime = $dt ;
      $sales->custName = $request->input('custName');
      $sales->purchaseOrder = $request->input('purchaseOrder');
      $sales->salesline = $request->input('salesorder').'-'.$request->input('line');
      $dte  = \DateTime::createFromFormat('d/m/Y',$request->input('deliverDate'));
      $sales->deliverDate = $dte;


      $sales->status = 'PAF(cont)';
      $sales->confirmBy = $request->input('confirmBy');

      $sales->save();

      $items= new Item;
      $items->sales_id = $sales->id;
      $items->model = $request->input('model');
      $items->partDesc = $request->input('partDesc');
      $items->partDesc2 = $request->input('partDesc2');
      $items->partNo = $request->input('partNo');
      $items->quantity = str_replace(",", "", $request->input('quantity'));
      $items->size = $request->input('size');
      $items->rawMaterial = $request->input('rawMaterial');
      $items->noPages = $request->input('noPages');
      $items->colour = $request->input('colour');
      $items->finishing = $request->input('finishing');
      $items->rawMaterial = $request->input('rawMaterial');
      $items->rawcheck = $request->input('rawcheck');
      $items->lot =  $request->input('lot');
      $items->mfgDate =  $request->input('mfgDate');
      $items->expiryDate =  $request->input('expiryDate');
      $items->dateFacNo =  $request->input('dateFacNo');
      $items->packerID =  $request->input('packerID');
      $items->remark = $request->input('remark');
      $remark=$request->input('remark');
      $dom = new \DomDocument();
	  error_reporting(E_ERROR);
      $dom->loadHtml($remark);
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
      $items->remark = $dom->saveHTML();
      $items->save();

      $workorder = new Workorder;
      $workorder->sales_id = $sales->id;
      $workorder->wo_number = $request->input('workorder');
      $workorder->wid = $request->input('wid');
      $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
      $workorder->due_date = $dt;
      $workorder->save();

      $sales->items_id = $items->id;
      $sales->workorders_id = $workorder->id;
      $sales->save();

      $change = new Change;
      $change->sales_id = $sales->id;
      $change->save();

      $picture = '';

      if ($request->hasFile('images')) {
              $files = $request->file('images');
              foreach($files as $file){
              $filename = $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $picture = $filename;
              $destinationPath = base_path() . '/public/uploaded';

              $file->move($destinationPath, $picture);

              $fileUpload = new FileUpload;
              $fileUpload->filename = $filename;
              $fileUpload->sales_id = $sales->id;
              $fileUpload->doc_id = $sales->sco_number;
              $fileUpload->user_id = Auth::user()->id;
              $fileUpload->save();
            }
          }

      return redirect()->route('frontend.slsmark.edit', $sales->id);
    }

    public function edit ($id)
    {
      $sales = Sales::find($id);
      $items = Item::find($sales->items->id);
      $product = product::where('items_id', $items->id)->first();
      return view('frontend.slsmark.edit')->with('sales', $sales)->with('product', $product);
    }

    public function storeProd (Request  $request, $id)
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
          $sales= Sales::find($id);
          $items = Item::find($sales->items->id);

          $product = new Product;
          $product->items_id = $items->id;
          $latestproduct = Product::orderBy('created_at', 'desc')->first();
          if ($latestproduct === null){
              $product->paf_number = 'PAF-' . Carbon::now()->format('y') . '-00001';
          }
          else{
              $number = (int) substr($latestproduct->paf_number,-5,5);
              $number ++;
              $product->paf_number = 'PAF-' . Carbon::now()->format('y') .'-'. str_pad($number,5,'0',STR_PAD_LEFT );
          }
          $product->oldpartno =  $request->input('oldpartno');
          $product->revNo =  $request->input('revNo');
          $product->lot1 =  $request->input('lot');
          $product->mfgDate1 =  $request->input('mfgDate');
          $product->expiryDate1 =  $request->input('expiryDate');
          $product->dateFacNo1 =  $request->input('dateFacNo');
          $product->packerID1 =  $request->input('packerID');
          $product->lotcheck1 = $request->input('lotcheck');
          $product->mfgcheck1 = $request->input('mfgcheck');
          $product->expcheck1 = $request->input('expcheck');
          $product->datecheck1 = $request->input('datecheck');
          $product->packcheck1 = $request->input('packcheck');
          $product->batchcheck1 = $request->input('batchcheck');
          $product->batchbar1 = $request->input('batchbar');
          $product->size1 = $request->input('size');
          $product->rawMaterial1 = $request->input('rawMaterial');
          $product->noPages1 = $request->input('noPages');
          $product->colour1 = $request->input('colour');
          $product->finishing1 = $request->input('finishing');
          $product->sco_number =$sales->sco_number;
          $product->approval = $request->input('approval');
          $product->remarkbig = $request->input('remarkbig');
          $product->material =  $request->input('material');
          $product->data =  $request->input('data');
          $product->artwork =  $request->input('artwork');
          $product->diecut =  $request->input('diecut');
          $product->attachment =  $request->input('attachment');
          $product->revNo = $request->input('revNo');
          $product->newArtwork  = $request->input('newArtwork');
          $product->films = $request->input('films');
          $product->technicalDrawing = $request->input('technicalDrawing');
          $product->digitalProofing = $request->input('digitalProofing');
          $product->artworkDrawing = $request->input('artworkDrawing');
          $product->colorLimit = $request->input('colorLimit');
          $product->bluePrint = $request->input('bluePrint');
          $product->pmrf = $request->input('pmrf');
          $product->other = $request->input('other');
          $product->other_text = $request->input('other_text');
          $product->yes = $request->input('yes');
          $product->no = $request->input('no');
          $product->customer = $request->input('customer');
          $product->customer_text = $request->input('customer_text');
          $product->qa = $request->input('qa');
          $product->qa_text = $request->input('qa_text');
          $product->production = $request->input('production');
          $product->production_text = $request->input('production_text');
          $product->qtyOnHand = $request->input('qtyOnHand');
          $dtreq = \DateTime::createFromFormat('d/m/Y', $request->input('requiredDate'));
          $product->requiredDate = $dtreq;
          $dtprod = \DateTime::createFromFormat('d/m/Y',  $request->input("datetime"));
          $product->datetime =$dtprod;
          $product->productionProcess = $request->input('productionProcess');
          $product->handCutSubmission = $request->input('handCutSubmission');
          $product->yes1 = $request->input('yes1');
          $product->no1 = $request->input('no1');
          $product->wip = $request->input('wip');
          $product->fg = $request->input('fg');
          $product->rcp = $request->input('rcp');
          $product->cutoff = $request->input('cutoff');
          $product->kiv = $request->input('kiv');
          $product->workOrderID = $request->input('workOrderID');
          $product->notAvailable1 = $request->input('notAvailable1');
          $product->adviseBy = $request->input('adviseBy');
          $product->issueBy = $request->input('issueBy');
          $product->done = 'planner';
          $remarkbig=$request->input('remarkbig');
          $dom = new \DomDocument();
		  error_reporting(E_ERROR);
          $dom->loadHtml($remarkbig);
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
          $product->remarkbig = $dom->saveHTML();
          $product->save();

          $sales->paf_number= $product->paf_number;
          $sales->save();

          $prodedit = new Prodedit;
          $prodedit->products_id = $product->id;
          $prodedit->save();

          // START file upload save
          $picture = '';

          if ($request->hasFile('images')) {
                  $files = $request->file('images');
                  foreach($files as $file){
                  $filename = $file->getClientOriginalName();
                  $extension = $file->getClientOriginalExtension();
                  $picture = $filename;
                  $destinationPath = base_path() . '/public/uploaded';

                  $file->move($destinationPath, $picture);

                  $fileUpload = new FileUpload;
                  $fileUpload->filename = $filename;
                  $fileUpload->products_id = $product->id;
                  $fileUpload->doc_id = $product->paf_number;
                  $fileUpload->user_id = Auth::user()->id;
                  $fileUpload->save();
                }
              }

          return redirect()->route('frontend.slsmark.review')->withFlashSuccess('The data is saved.');
        }
        else
        {
          $sales= Sales::find($id);
          $product = Product::where('paf_number', $request->input('paf_number'))->first();
          $product->remarkbig=$request->input('remarkbig');
          $product->notAvailable1=$request->input('notAvailable1');
          $product->dispose1=$request->input('dispose1');
          $product->ctpPlate_text=$request->input('ctpPlate_text');
          $product->notAvailable2=$request->input('notAvailable2');
          $product->dispose2=$request->input('dispose2');
          $product->film_text=$request->input('film_text');
          $product->ctp_issue=$request->input('ctp_issue');
          $product->save();

          return redirect()->route('frontend.slsmark.review')->withFlashSuccess('The data is saved.');
        }
    }

    public function editform ($id)
    {
      $product = Product::find($id);
      $prodedit = Prodedit::where('products_id', $product->id)->first();
      $items = Item::find($product->items_id);
      $sales = Sales::where('items_id', $items->id)->first();
      $latestsales = Product::select('rev')->orderBy('created_at', 'desc')->first();
      if ($latestsales === null){
          $product->rev = 'Rev-001';
      }
      else{
          $number = (int) substr($latestsales->rev,-3,3);
          $number ++;
          $product->rev = 'Rev-'.str_pad($number,3,'0',STR_PAD_LEFT );
      }
      return view('frontend.slsmark.editform')->with('product', $product)->with('sales', $sales)->with('prodedit', $prodedit);
    }

    public function storeform (Request  $request, $id)
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
            $product = Product::find($id);
            $prodedit = Prodedit::where('products_id', $product->id)->first();

            $product->rev = $request->input('rev');
            $product->users_id = Auth::user()->id;
            $product->revNo =  $request->input('revNo');
            $product->done =  'planner';
            if ($product->oldpartno == $request->input('oldpartno'))
            {
              $product->oldpartno = $request->input('oldpartno');
            }
            else
            {
              $product->oldpartno = $request->input('oldpartno');
              $prodedit->oldpartno = 1;
            }
            if ($product->lot1 == $request->input('lot'))
            {
              $product->lot1 = $request->input('lot');
            }
            else
            {
              $product->lot1 = $request->input('lot');
              $prodedit->lot1 = 1;
            }
            if ($product->mfgDate1 == $request->input('mfgDate'))
            {
              $product->mfgDate1 = $request->input('mfgDate');
            }
            else
            {
              $product->mfgDate1 = $request->input('mfgDate');
              $prodedit->mfgDate1 = 1;
            }
            if ($product->expiryDate1 == $request->input('expiryDate'))
            {
              $product->expiryDate1 = $request->input('expiryDate');
            }
            else
            {
              $product->expiryDate1 = $request->input('expiryDate');
              $prodedit->expiryDate1 = 1;
            }
            if ($product->dateFacNo1 == $request->input('dateFacNo'))
            {
              $product->dateFacNo1 = $request->input('dateFacNo');
            }
            else
            {
              $product->dateFacNo1 = $request->input('dateFacNo');
              $prodedit->dateFacNo1 = 1;
            }
            if ($product->packerID1 == $request->input('packerID'))
            {
              $product->packerID1 = $request->input('packerID');
            }
            else
            {
              $product->packerID1 = $request->input('packerID');
              $prodedit->packerID1 = 1;
            }
            if ($product->packerID1 == $request->input('packerID'))
            {
              $product->packerID1 = $request->input('packerID');
            }
            else
            {
              $product->packerID1 = $request->input('packerID');
              $prodedit->packerID1 = 1;
            }
            $product->lotcheck1 = $request->input('lotcheck');
            if ($product->packerID1 == $request->input('packerID'))
            {
              $product->packerID1 = $request->input('packerID');
            }
            else
            {
              $product->packerID1 = $request->input('packerID');
              $prodedit->packerID1 = 1;
            }
            $product->mfgcheck1 = $request->input('mfgcheck');
            if ($product->packerID1 == $request->input('packerID'))
            {
              $product->packerID1 = $request->input('packerID');
            }
            else
            {
              $product->packerID1 = $request->input('packerID');
              $prodedit->packerID1 = 1;
            }
            $product->expcheck1 = $request->input('expcheck');
            if ($product->packerID1 == $request->input('packerID'))
            {
              $product->packerID1 = $request->input('packerID');
            }
            else
            {
              $product->packerID1 = $request->input('packerID');
              $prodedit->packerID1 = 1;
            }
            $product->datecheck1 = $request->input('datecheck');
            if ($product->packerID1 == $request->input('packerID'))
            {
              $product->packerID1 = $request->input('packerID');
            }
            else
            {
              $product->packerID1 = $request->input('packerID');
              $prodedit->packerID1 = 1;
            }
            $product->packcheck1 = $request->input('packcheck');
            if ($product->packerID1 == $request->input('packerID'))
            {
              $product->packerID1 = $request->input('packerID');
            }
            else
            {
              $product->packerID1 = $request->input('packerID');
              $prodedit->packerID1 = 1;
            }
            $product->batchcheck1 = $request->input('batchcheck');

            if ($product->batchbar1 == $request->input('batchbar1'))
            {
              $product->batchbar1 = $request->input('batchbar');
            }
            else
            {
              $product->batchbar1 = $request->input('batchbar');
              $prodedit->batchbar1 = 1;
            }
            if ($product->size1 == $request->input('size'))
            {
              $product->size1 = $request->input('size');
            }
            else
            {
              $product->size1 = $request->input('size');
              $prodedit->size1 = 1;
            }
            if ($product->rawMaterial1 == $request->input('rawMaterial'))
            {
              $product->rawMaterial1 = $request->input('rawMaterial');
            }
            else
            {
              $product->rawMaterial1 = $request->input('rawMaterial');
              $prodedit->rawMaterial1 = 1;
            }
            if ($product->noPages1 == $request->input('noPages'))
            {
              $product->noPages1 = $request->input('noPages');
            }
            else
            {
              $product->noPages1 = $request->input('noPages');
              $prodedit->noPages1 = 1;
            }
            if ($product->colour1 == $request->input('colour'))
            {
              $product->colour1 = $request->input('colour');
            }
            else
            {
              $product->colour1 = $request->input('colour');
              $prodedit->colour1 = 1;
            }
            if ($product->finishing1 == $request->input('finishing'))
            {
              $product->finishing1 = $request->input('finishing');
            }
            else
            {
              $product->finishing1 = $request->input('finishing');
              $prodedit->finishing1 = 1;
            }

            $product->remarkbig =$request->input('remarkbig');

            if ($product->material == $request->input('material'))
            {
              $product->material = $request->input('material');
            }
            else
            {
              $product->material = $request->input('material');
              $prodedit->material = 1;
            }
            $product->data = $request->input('data');
            if ($product->data == $request->input('data'))
            {
              $product->data = $request->input('data');
            }
            else
            {
              $product->data = $request->input('data');
              $prodedit->data = 1;
            }
            if ($product->artwork == $request->input('artwork'))
            {
              $product->artwork = $request->input('artwork');
            }
            else
            {
              $product->artwork = $request->input('artwork');
              $prodedit->artwork = 1;
            }
            if ($product->diecut == $request->input('diecut'))
            {
              $product->diecut = $request->input('diecut');
            }
            else
            {
              $product->diecut = $request->input('diecut');
              $prodedit->diecut = 1;
            }
            if ($product->attachment == $request->input('attachment'))
            {
              $product->attachment = $request->input('attachment');
            }
            else
            {
              $product->attachment = $request->input('attachment');
              $prodedit->attachment = 1;
            }

            $product->revNo =$request->input('revNo');
            if ($product->newArtwork == $request->input('newArtwork'))
            {
              $product->newArtwork = $request->input('newArtwork');
            }
            else
            {
              $product->newArtwork = $request->input('newArtwork');
              $prodedit->newArtwork = 1;
            }
            if ($product->films == $request->input('films'))
            {
              $product->films = $request->input('films');
            }
            else
            {
              $product->films = $request->input('films');
              $prodedit->films = 1;
            }
            if ($product->technicalDrawing == $request->input('technicalDrawing'))
            {
              $product->technicalDrawing = $request->input('technicalDrawing');
            }
            else
            {
              $product->technicalDrawing = $request->input('technicalDrawing');
              $prodedit->technicalDrawing = 1;
            }
            if ($product->digitalProofing == $request->input('digitalProofing'))
            {
              $product->digitalProofing = $request->input('digitalProofing');
            }
            else
            {
              $product->digitalProofing = $request->input('digitalProofing');
              $prodedit->digitalProofing = 1;
            }
            if ($product->artworkDrawing == $request->input('artworkDrawing'))
            {
              $product->artworkDrawing = $request->input('artworkDrawing');
            }
            else
            {
              $product->artworkDrawing = $request->input('artworkDrawing');
              $prodedit->artworkDrawing = 1;
            }
            if ($product->colorLimit == $request->input('colorLimit'))
            {
              $product->colorLimit = $request->input('colorLimit');
            }
            else
            {
              $product->colorLimit = $request->input('colorLimit');
              $prodedit->colorLimit = 1;
            }
            if ($product->bluePrint == $request->input('bluePrint'))
            {
              $product->bluePrint = $request->input('bluePrint');
            }
            else
            {
              $product->bluePrint = $request->input('bluePrint');
              $prodedit->bluePrint = 1;
            }
            if ($product->pmrf == $request->input('pmrf'))
            {
              $product->pmrf = $request->input('pmrf');
            }
            else
            {
              $product->pmrf = $request->input('pmrf');
              $prodedit->pmrf = 1;
            }
            if ($product->other == $request->input('other'))
            {
              $product->other = $request->input('other');
            }
            else
            {
              $product->other = $request->input('other');
              $prodedit->other = 1;
            }
            if ($product->other_text == $request->input('other_text'))
            {
              $product->other_text = $request->input('other_text');
            }
            else
            {
              $product->other_text = $request->input('other_text');
              $prodedit->other_text = 1;
            }
            if ($product->yes == $request->input('yes'))
            {
              $product->yes = $request->input('yes');
            }
            else
            {
              $product->yes = $request->input('yes');
              $prodedit->yes = 1;
            }
            if ($product->no == $request->input('no'))
            {
              $product->no = $request->input('no');
            }
            else
            {
              $product->no = $request->input('no');
              $prodedit->no = 1;
            }

            $product->customer =$request->input('customer');
            if ($product->qa == $request->input('qa'))
            {
              $product->qa = $request->input('qa');
            }
            else
            {
              $product->qa = $request->input('qa');
              $prodedit->qa = 1;
            }
            if ($product->production == $request->input('production'))
            {
              $product->production = $request->input('production');
            }
            else
            {
              $product->production = $request->input('production');
              $prodedit->production = 1;
            }
            if ($product->production_text == $request->input('production_text'))
            {
              $product->production_text = $request->input('production_text');
            }
            else
            {
              $product->production_text = $request->input('production_text');
              $prodedit->production_text = 1;
            }
            if ($product->qtyOnHand == $request->input('qtyOnHand'))
            {
              $product->qtyOnHand = $request->input('qtyOnHand');
            }
            else
            {
              $product->qtyOnHand = $request->input('qtyOnHand');
              $prodedit->qtyOnHand = 1;
            }
            $dtreq = \DateTime::createFromFormat('d/m/Y', $request->input('requiredDate'));
            $product->requiredDate = $dtreq;
            $dtprod = \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
            $product->datetime =$dtprod;

            if ($product->productionProcess == $request->input('productionProcess'))
            {
              $product->productionProcess = $request->input('productionProcess');
            }
            else
            {
              $product->productionProcess = $request->input('productionProcess');
              $prodedit->productionProcess = 1;
            }
            if ($product->handCutSubmission == $request->input('handCutSubmission'))
            {
              $product->handCutSubmission = $request->input('handCutSubmission');
            }
            else
            {
              $product->pachandCutSubmissionkerID1 = $request->input('handCutSubmission');
              $prodedit->handCutSubmission = 1;
            }
            if ($product->yes1 == $request->input('yes1'))
            {
              $product->yes1 = $request->input('yes1');
            }
            else
            {
              $product->yes1 = $request->input('yes1');
              $prodedit->yes1 = 1;
            }
            if ($product->no1 == $request->input('no1'))
            {
              $product->no1 = $request->input('no1');
            }
            else
            {
              $product->no1 = $request->input('no1');
              $prodedit->no1 = 1;
            }
            if ($product->wip == $request->input('wip'))
            {
              $product->wip = $request->input('wip');
            }
            else
            {
              $product->wip = $request->input('wip');
              $prodedit->wip = 1;
            }
            if ($product->fg == $request->input('fg'))
            {
              $product->fg = $request->input('fg');
            }
            else
            {
              $product->fg = $request->input('fg');
              $prodedit->fg = 1;
            }
            if ($product->rcp == $request->input('rcp'))
            {
              $product->rcp = $request->input('rcp');
            }
            else
            {
              $product->rcp = $request->input('rcp');
              $prodedit->rcp = 1;
            }
            if ($product->cutoff == $request->input('cutoff'))
            {
              $product->cutoff = $request->input('cutoff');
            }
            else
            {
              $product->cutoff = $request->input('cutoff');
              $prodedit->cutoff = 1;
            }
            if ($product->kiv == $request->input('kiv'))
            {
              $product->kiv = $request->input('kiv');
            }
            else
            {
              $product->kiv = $request->input('kiv');
              $prodedit->kiv = 1;
            }
            if ($product->workOrderID == $request->input('workOrderID'))
            {
              $product->workOrderID = $request->input('workOrderID');
            }
            else
            {
              $product->workOrderID = $request->input('workOrderID');
              $prodedit->workOrderID = 1;
            }
            if ($product->notAvailable1 == $request->input('notAvailable1'))
            {
              $product->notAvailable1 = $request->input('notAvailable1');
            }
            else
            {
              $product->notAvailable1 = $request->input('notAvailable1');
              $prodedit->notAvailable1 = 1;
            }
            $product->adviseBy =$request->input('adviseBy');
            $product->issueBy =$request->input('issueBy');
            $remarkbig=$request->input('remarkbig');
            $dom = new \DomDocument();
						error_reporting(E_ERROR);
            
            $dom->loadHtml($remarkbig);
						//return $remarkbig;
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
            $product->remarkbig = $dom->saveHTML();
            $product->save();

            $prodedit->save();

          // // START file upload save
      $pictureProd = '';

      if ($request->hasFile('images')) {
              $files = $request->file('images');
              foreach($files as $file){
              $filename = $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $picture = $filename;
              $destinationPath = base_path() . '/public/uploaded';

              $file->move($destinationPath, $picture);

              $fileUpload = new FileUpload;
              $fileUpload->filename = $filename;
              $fileUpload->sales_id = $sales->id;
              $fileUpload->doc_id = $product->paf_number;
              $fileUpload->user_id = Auth::user()->id;
              $fileUpload->save();
          }
        }

      // // END file upload save
    return redirect()->route('frontend.slsmark.review')->withFlashSuccess('The data is saved.');
    }

    else
    {
      $sales= Sales::find($id);
      $product = Product::where('paf_number', $request->input('paf_number'))->first();
      $product->remarkbig=$request->input('remarkbig');
      $product->notAvailable1=$request->input('notAvailable1');
      $product->dispose1=$request->input('dispose1');
      $product->ctpPlate_text=$request->input('ctpPlate_text');
      $product->notAvailable2=$request->input('notAvailable2');
      $product->dispose2=$request->input('dispose2');
      $product->film_text=$request->input('film_text');
      $product->ctp_issue=$request->input('ctp_issue');
      $product->save();

      return redirect()->route('frontend.slsmark.review')->withFlashSuccess('The data is saved.');
    }
  }

    public function show ($id)
    {
      $sales = Sales::find($id);
      return view('frontend.slsmark.show')->with('sales', $sales);
    }

    public function addrepeat ()
    {
      $sales = Sales::all();
      return view('frontend.slsmark.addrepeat')->with('sales', $sales);
    }

    public function editrepeat ($id)
    {
      $salesqad = Salesqad::find($id);
      $sales = Sales::where('salesline', $salesqad->salesline)->first();

      return view('frontend.slsmark.editrepeat')->with('salesqad', $salesqad)->with('sales', $sales);
    }

    public function storeeditrepeat($id, Request $request)
    {
      $this->validate($request,[
        'salesline' => 'unique:sales'
      ],
      [
        'salesline.unique'            => 'The sales order and line entered already existed.'
      ]);

      $salesqad = Salesqad::find($id);
      $salesqad->status_item = 'R';
      $salesqad->sc_status = 'SC';
      $salesqad->record_status = 'Repeat';
      $salesqad->save();

      $sales2 = Sales::where('salesline', $salesqad->salesline)->first();
      {
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
        // $sales->sco_number = $sales2->sco_number;
        $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
        $sales->datetime = $dt;
        // $sales->salesqads_id = $salesqad->id;
        $sales->deliver_to = $salesqad->Ship_To;
        $sales->sold_to = $salesqad->Sold_To;
        $sales->custName = $request->input('custName');
        $sales->purchaseOrder = $request->input('purchaseOrder');
        $sales->user_id = Auth::user()->id;
        $sales->workorder = $request->input('workorder');
        $sales->wid = $request->input('wid');
        $sales->salesorder = $request->input('salesorder');
        $sales->line = $request->input('line');
        $sales->salesline = $request->input('salesorder').'-'.$request->input('line');
        $dte  = \DateTime::createFromFormat('d/m/Y',$request->input('deliverDate'));
        $sales->deliverDate = $dte ;
        $sales->status_item = 'R';
        $sales->record_status = 'Repeat';
        $sales->approval = $request->input('approval');
        $sales->confirmBy = $request->input('confirmBy');
        $sales->repeatdone = $request->input('finish');
        $sales->save();

        $items= new Item;
        $items->sales_id = $sales->id;
        $items->model = $request->input('model');
        $items->partDesc = $request->input('partDesc');
        $items->partDesc2 = $request->input('partDesc2');
        $items->partNo = $request->input('partNo');
        $items->size = $request->input('size');
        $items->quantity = str_replace(",", "", $request->input('quantity'));
        $items->rawMaterial = $request->input('rawMaterial');
        $items->noPages = $request->input('noPages');
        $items->colour = $request->input('colour');
        $items->finishing = $request->input('finishing');
        $items->lot =  $request->input('lot');
        $items->mfgDate =  $request->input('mfgDate');
        $items->expiryDate =  $request->input('expiryDate');
        $items->dateFacNo =  $request->input('dateFacNo');
        $items->packerID =  $request->input('packerID');
        $items->remark = $request->input('remark');
        $remark=$request->input('remark');
        $dom = new \DomDocument();
				//error_reporting(E_ERROR);
        $dom->loadHtml($remark);
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
        $items->remark = $dom->saveHTML();
        $items->save();

        $workorder = new Workorder;
        $workorder->sales_id = $sales->id;
        $workorder->wo_number = $request->input('workorder');
        $workorder->wid = $request->input('wid');
        $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
        $workorder->due_date = $dt;
        $workorder->save();

        $sales->items_id = $items->id;
        $sales->workorders_id = $workorder->id;
        $sales->save();

        $change = new Change;
        $change->sales_id = $sales->id;
        $change->save();

        // START file upload save
        $picture = '';

        if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = $filename;
                $destinationPath = base_path() . '/public/uploaded';

                $file->move($destinationPath, $picture);

                $fileUpload = new FileUpload;
                $fileUpload->filename = $filename;
                $fileUpload->sales_id = $sales->id;
                $fileUpload->doc_id = $sales->sco_number;
                $fileUpload->user_id = Auth::user()->id;
                $fileUpload->save();
              }
            }
            return redirect()->route('frontend.slsmark.addrepeat')->withFlashSuccess('The data is saved');
      }
    }

    public function tablerepeat()
    {
      // if (access()->hasPermissions(['sales-marketing']))
      // {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->leftJoin('addstocks', 'addstocks.so_number','=', 'sales.salesorder')
        ->select(['sales.sco_number','sales.salesorder', 'sales.line', 'sales.wid', 'sales.purchaseOrder','sales.custName',
        'items.partNo','items.partDesc', 'items.partDesc2','items.quantity',
        'addstocks.keep_qty','addstocks.manual_qty', 'addstocks.stockqty', 'sales.status_item',
				'sales.id','sales.rev', 'sales.repeatdone'

      ])
      // ->where('repeatdone', '=', 'planner')
      // ->orWhere('repeatdone', '=', 'complete')
      // ->orWhere('repeatdone', '=', 'N')
			->whereIn('repeatdone', ['planner', 'complete', 'N'])
      ;

      return Datatables::of($sales)

      ->editColumn('id', function ($sales) {
        
				if(access()->hasPermissions(['sales-marketing']))
				{
					return '
					<a href="'. route('frontend.slsmark.edit', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="PAF"></i></a>
					<a href="'. route('frontend.slsmark.editscof', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
					<a href="'. route('frontend.slsmark.show', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View SCO"></i></a>
					<a href="'. route('frontend.slsmark.destroy', $sales->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="Delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>';
				}else
				{
					 return '
            <a href="'. route('frontend.slsmark.editscof', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
            <a href="'. route('frontend.slsmark.show', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View SCO"></i></a>';
				}
        

      })
      ->escapeColumns([])
      ->make();
     
      
    }

    public function editscof($id)
    {
        $sales = Sales::find($id);
        $fileUpload = FileUpload::where('sales_id', $sales->id)->get();

        $latestsales = Sales::select('rev')->orderBy('created_at', 'desc')->first();
        if ($latestsales === null){
            $sales->rev = 'Rev-001';
        }
        else{
            $number = (int) substr($latestsales->rev,-3,3);
            $number ++;
            $sales->rev = 'Rev-'.str_pad($number,3,'0',STR_PAD_LEFT );
        }
		//return phpinfo();

        return view('frontend.slsmark.editscof')
        ->with('sales',$sales)
        ->with('fileUpload', $fileUpload)
        ->with('latestsales', $latestsales);
    }

    public function updatescof ($id,Request $request)
    {
		error_reporting(E_ERROR);
      $finish = $request->input('finish');
      $salesline = $request->input('salesorder').'-'.$request->input('line');
      $sales = Sales::find($id);
      $change = Change::where('sales_id', $sales->id)->first();
      // $salesqad = Salesqad::where('salesline', $salesline)->first();
      if($sales->repeatdone != null)
      {

        $sales->edit_user = Auth::user()->id;
        $sales->sco_number = $sales->sco_number;
        if ($sales->workorder == $request->input('workorder'))
        {
          $sales->workorder = $request->input('workorder');
        }
        else
        {
          $sales->workorder = $request->input('workorder');
          $change->workorder = 1;
        }
        if ($sales->wid == $request->input('wid'))
        {
          $sales->wid = $request->input('wid');
        }
        else
        {
          $sales->wid = $request->input('wid');
          $change->wid = 1;
        }
        $sales->salesline = $request->input('salesorder').'-'.$request->input('line');
        if ($sales->salesorder == $request->input('salesorder'))
        {
          $sales->salesorder = $request->input('salesorder');
        }
        else
        {
          $sales->salesorder = $request->input('salesorder');
          $change->salesorder = 1;
        }
        if ($sales->line == $request->input('line'))
        {
          $sales->line = $request->input('line');
        }
        else
        {
          $sales->line = $request->input('line');
          $change->line = 1;
        }
        if ($sales->purchaseOrder == $request->input('purchaseOrder'))
        {
          $sales->purchaseOrder = $request->input('purchaseOrder');
        }
        else
        {
          $sales->purchaseOrder = $request->input('purchaseOrder');
          $change->purchaseOrder = 1;
        }
        $dtsales3 = \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
        $sales->datetime = $dtsales3;
        $sales->custName = $request->input('custName');
        $dtsales2 = \DateTime::createFromFormat('d/m/Y', $request->input("deliverDate"));
        $sales->deliverDate = $dtsales2;
        // $sales->confirmBy =  $request->input('confirmBy');
        $sales->repeatdone = $request->input('finish');
        $sales->planning_bom = null;
        $sales->rev = $request->input('rev');

        $sales->save();

        $items = Item::find($sales->items_id);
        // $items = new Item;
        $items->sales_id = $sales->id;
        if ($items->model == $request->input('model'))
        {
          $items->model = $request->input('model');
        }
        else
        {
          $items->model = $request->input('model');
          $change->model = 1;
        }

        if ($items->partDesc == $request->input('partDesc'))
        {
          $items->partDesc = $request->input('partDesc');
        }
        else
        {
          $items->partDesc = $request->input('partDesc');
          $change->partDesc = 1;
        }

        if ($items->partDesc2 == $request->input('partDesc2'))
        {
          $items->partDesc2 = $request->input('partDesc2');
        }
        else
        {
          $items->partDesc2 = $request->input('partDesc2');
          $change->partDesc2 = 1;
        }

        if ($items->partNo == $request->input('partNo'))
        {
          $items->partNo = $request->input('partNo');
        }
        else
        {
          $items->partNo = $request->input('partNo');
          $change->partNo = 1;
        }

        if ($items->size == $request->input('size'))
        {
          $items->size = $request->input('size');
        }
        else
        {
          $items->size = $request->input('size');
          $change->size = 1;
        }

        if ($items->quantity == $request->input('quantity'))
        {
          $items->quantity = $request->input('quantity');
        }
        else
        {
          $items->quantity = $request->input('quantity');
          $change->quantity = 1;
        }

        if ($items->rawMaterial == $request->input('rawMaterial'))
        {
          $items->rawMaterial = $request->input('rawMaterial');
        }
        else
        {
          $items->rawMaterial = $request->input('rawMaterial');
          $change->rawMaterial = 1;
        }

        if ($items->noPages == $request->input('noPages'))
        {
          $items->noPages = $request->input('noPages');
        }
        else
        {
          $items->noPages = $request->input('noPages');
          $change->noPages = 1;
        }

        if ($items->colour == $request->input('colour'))
        {
          $items->colour = $request->input('colour');
        }
        else
        {
          $items->colour = $request->input('colour');
          $change->colour = 1;
        }

        if ($items->finishing == $request->input('finishing'))
        {
          $items->finishing = $request->input('finishing');
        }
        else
        {
          $items->finishing = $request->input('finishing');
          $change->finishing = 1;
        }

        if ($items->lot == $request->input('lot'))
        {
          $items->lot = $request->input('lot');
        }
        else
        {
          $items->lot = $request->input('lot');
          $change->lot = 1;
        }

        if ($items->mfgDate  == $request->input('mfgDate'))
        {
          $items->mfgDate  = $request->input('mfgDate');
        }
        else
        {
          $items->mfgDate  = $request->input('mfgDate');
          $change->mfgDate = 1;
        }

        if ($items->expiryDate == $request->input('expiryDate'))
        {
          $items->expiryDate = $request->input('expiryDate');
        }
        else
        {
          $items->expiryDate = $request->input('expiryDate');
          $change->expiryDate = 1;
        }

        if ($items->dateFacNo == $request->input('dateFacNo'))
        {
          $items->dateFacNo = $request->input('dateFacNo');
        }
        else
        {
          $items->dateFacNo = $request->input('dateFacNo');
          $change->dateFacNo = 1;
        }

        if ($items->packerID == $request->input('packerID'))
        {
          $items->packerID = $request->input('packerID');
        }
        else
        {
          $items->packerID = $request->input('packerID');
          $change->packerID = 1;
        }
        $items->remark =$request->input('remark');
        $remark=$request->input('remark');
		
		error_reporting(E_ERROR);
        $dom = new \DomDocument();
        $dom->loadHtml($remark);
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
        $items->remark = $dom->saveHTML();
        $items->save();

        $workorder = Workorder::find($sales->workorders_id);
        $workorder->sales_id = $sales->id;
        $workorder->wo_number = $request->input('workorder');
        $workorder->wid = $request->input('wid');
        $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("deliverDate"));
        $workorder->due_date = $dt;
        $workorder->save();

        $sales->items_id = $items->id;
        $sales->workorders_id = $workorder->id;
        $sales->save();

        $picture = '';

        if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = $filename;
                $destinationPath = base_path() . '/public/uploaded';

                $file->move($destinationPath, $picture);

                $fileUpload = new FileUpload;
                $fileUpload->filename = $filename;
                $fileUpload->sales_id = $sales->id;
                $fileUpload->doc_id = $sales->sco_number;
                $fileUpload->user_id = Auth::user()->id;
                $fileUpload->save();
            }
          }
      // Mail::to('aireen.9350@gmail.com')->send(new Changesc($user, $sales));

        // Notification::send($user, new ChangeSCinsales($sales));
        return redirect()->route('frontend.slsmark.addrepeat')->withFlashSuccess('The repeat data is saved and updated.');

      }
      if ($sales->finish != null)
      {
        if ($sales->finish == 'complete')
        {
          $salesqad = Salesqad::where('salesline', $sales->salesline)->first();
          if (!empty($salesqad))
          {
            $salesqad->wid = $request->input('wid');
            $salesqad->save();
          }

          $sales->edit_user = Auth::user()->id;
          $sales->sco_number = $sales->sco_number;

          if ($sales->workorder == $request->input('workorder'))
          {
            $sales->workorder = $request->input('workorder');
          }
          else
          {
            $sales->workorder = $request->input('workorder');
            $change->workorder = 1;
          }
          if ($sales->wid == $request->input('wid'))
          {
            $sales->wid = $request->input('wid');
          }
          else
          {
            $sales->wid = $request->input('wid');
            $change->wid = 1;
          }
          $sales->salesline = $request->input('salesorder').'-'.$request->input('line');
          if ($sales->salesorder == $request->input('salesorder'))
          {
            $sales->salesorder = $request->input('salesorder');
          }
          else
          {
            $sales->salesorder = $request->input('salesorder');
            $change->salesorder = 1;
          }
          if ($sales->line == $request->input('line'))
          {
            $sales->line = $request->input('line');
          }
          else
          {
            $sales->line = $request->input('line');
            $change->line = 1;
          }
          if ($sales->purchaseOrder == $request->input('purchaseOrder'))
          {
            $sales->purchaseOrder = $request->input('purchaseOrder');
          }
          else
          {
            $sales->purchaseOrder = $request->input('purchaseOrder');
            $change->purchaseOrder = 1;
          }
          $dtsales3 = \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
          $sales->datetime = $dtsales3;
          $sales->custName = $request->input('custName');
          $dtsales2 = \DateTime::createFromFormat('d/m/Y', $request->input("deliverDate"));
          $sales->deliverDate = $dtsales2;


          // $sales->confirmBy =  $request->input('confirmBy');
          $sales->status_item = 'R';
          $sales->record_status = 'Repeat';
          $sales->finish = $request->input('finish');
          $sales->planning_bom = null;


          $sales->rev = $request->input('rev');

          $sales->save();

          $items = Item::find($sales->items_id);
          // $items = new Item;
          $items->sales_id = $sales->id;

          if ($items->model == $request->input('model'))
          {
            $items->model = $request->input('model');
          }
          else
          {
            $items->model = $request->input('model');
            $change->model = 1;
          }

          if ($items->partDesc == $request->input('partDesc'))
          {
            $items->partDesc = $request->input('partDesc');
          }
          else
          {
            $items->partDesc = $request->input('partDesc');
            $change->partDesc = 1;
          }

          if ($items->partDesc2 == $request->input('partDesc2'))
          {
            $items->partDesc2 = $request->input('partDesc2');
          }
          else
          {
            $items->partDesc2 = $request->input('partDesc2');
            $change->partDesc2 = 1;
          }

          if ($items->partNo == $request->input('partNo'))
          {
            $items->partNo = $request->input('partNo');
          }
          else
          {
            $items->partNo = $request->input('partNo');
            $change->partNo = 1;
          }

          if ($items->size == $request->input('size'))
          {
            $items->size = $request->input('size');
          }
          else
          {
            $items->size = $request->input('size');
            $change->size = 1;
          }

          if ($items->quantity == $request->input('quantity'))
          {
            $items->quantity = $request->input('quantity');
          }
          else
          {
            $items->quantity = $request->input('quantity');
            $change->quantity = 1;
          }

          if ($items->rawMaterial == $request->input('rawMaterial'))
          {
            $items->rawMaterial = $request->input('rawMaterial');
          }
          else
          {
            $items->rawMaterial = $request->input('rawMaterial');
            $change->rawMaterial = 1;
          }

          if ($items->noPages == $request->input('noPages'))
          {
            $items->noPages = $request->input('noPages');
          }
          else
          {
            $items->noPages = $request->input('noPages');
            $change->noPages = 1;
          }

          if ($items->colour == $request->input('colour'))
          {
            $items->colour = $request->input('colour');
          }
          else
          {
            $items->colour = $request->input('colour');
            $change->colour = 1;
          }

          if ($items->finishing == $request->input('finishing'))
          {
            $items->finishing = $request->input('finishing');
          }
          else
          {
            $items->finishing = $request->input('finishing');
            $change->finishing = 1;
          }

          if ($items->lot == $request->input('lot'))
          {
            $items->lot = $request->input('lot');
          }
          else
          {
            $items->lot = $request->input('lot');
            $change->lot = 1;
          }

          if ($items->mfgDate  == $request->input('mfgDate'))
          {
            $items->mfgDate  = $request->input('mfgDate');
          }
          else
          {
            $items->mfgDate  = $request->input('mfgDate');
            $change->mfgDate = 1;
          }

          if ($items->expiryDate == $request->input('expiryDate'))
          {
            $items->expiryDate = $request->input('expiryDate');
          }
          else
          {
            $items->expiryDate = $request->input('expiryDate');
            $change->expiryDate = 1;
          }

          if ($items->dateFacNo == $request->input('dateFacNo'))
          {
            $items->dateFacNo = $request->input('dateFacNo');
          }
          else
          {
            $items->dateFacNo = $request->input('dateFacNo');
            $change->dateFacNo = 1;
          }

          if ($items->packerID == $request->input('packerID'))
          {
            $items->packerID = $request->input('packerID');
          }
          else
          {
            $items->packerID = $request->input('packerID');
            $change->packerID = 1;
          }

          $items->remark =$request->input('remark');
          $remark=$request->input('remark');
		  error_reporting(E_ERROR);
          $dom = new \DomDocument();
          $dom->loadHtml($remark);
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
          $items->remark = $dom->saveHTML();
          $items->save();

          // $workorder = new Workorder;
          $workorder = Workorder::find($sales->workorders_id);
          $workorder->sales_id = $sales->id;
          $workorder->wo_number = $request->input('workorder');
          $workorder->wid = $request->input('wid');
          $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
          $workorder->due_date = $dt;
          $workorder->save();

          $sales->items_id = $items->id;
          $sales->workorders_id = $workorder->id;
          $sales->save();

          $change->save();

          $picture = '';

          if ($request->hasFile('images')) {
                  $files = $request->file('images');
                  foreach($files as $file){
                  $filename = $file->getClientOriginalName();
                  $extension = $file->getClientOriginalExtension();
                  $picture = $filename;
                  $destinationPath = base_path() . '/public/uploaded';

                  $file->move($destinationPath, $picture);

                  $fileUpload = new FileUpload;
                  $fileUpload->filename = $filename;
                  $fileUpload->sales_id = $sales->id;
                  $fileUpload->doc_id = $sales->sco_number;
                  $fileUpload->user_id = Auth::user()->id;
                  $fileUpload->save();
              }
            }
        // Mail::to('aireen.9350@gmail.com')->send(new Changesc($user, $sales));

          // Notification::send($user, new ChangeSCinsales($sales));
        }
        elseif($sales->finish == 'planner')
        {
			
		  //return $sales;
          $salesqad = Salesqad::where('salesline', $sales->salesline)->first();
		 
			if($salesqad){
				 $salesqad->wid = $request->input('wid');
				 $salesqad->save();
			}
			
		  
          

          $sales->edit_user = Auth::user()->id;
          if ($sales->workorder == $request->input('workorder'))
          {
            $sales->workorder = $request->input('workorder');
          }
          else
          {
            $sales->workorder = $request->input('workorder');
            $change->workorder = 1;
          }
          if ($sales->wid == $request->input('wid'))
          {
            $sales->wid = $request->input('wid');
          }
          else
          {
            $sales->wid = $request->input('wid');
            $change->wid = 1;
          }
          $sales->salesline = $request->input('salesorder').'-'.$request->input('line');
          if ($sales->salesorder == $request->input('salesorder'))
          {
            $sales->salesorder = $request->input('salesorder');
          }
          else
          {
            $sales->salesorder = $request->input('salesorder');
            $change->salesorder = 1;
          }
          if ($sales->line == $request->input('line'))
          {
            $sales->line = $request->input('line');
          }
          else
          {
            $sales->line = $request->input('line');
            $change->line = 1;
          }
          if ($sales->purchaseOrder == $request->input('purchaseOrder'))
          {
            $sales->purchaseOrder = $request->input('purchaseOrder');
          }
          else
          {
            $sales->purchaseOrder = $request->input('purchaseOrder');
            $change->purchaseOrder = 1;
          }
          $dtsales3 = \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
          $sales->datetime = $dtsales3;
          $sales->custName = $request->input('custName');
          $dtsales2 = \DateTime::createFromFormat('d/m/Y', $request->input("deliverDate"));
          $sales->deliverDate = $dtsales2;
          // $sales->confirmBy =  $request->input('confirmBy');
          $sales->status_item = 'R';
          $sales->record_status = 'Repeat';
          $sales->finish = $request->input('finish');
          $sales->planning_bom = null;


          $sales->rev = $request->input('rev');
          $sales->save();

          $items = Item::find($sales->items_id);
          // $items = new Item;
          $items->sales_id = $sales->id;
          if ($items->model == $request->input('model'))
          {
            $items->model = $request->input('model');
          }
          else
          {
            $items->model = $request->input('model');
            $change->model = 1;
          }

          if ($items->partDesc == $request->input('partDesc'))
          {
            $items->partDesc = $request->input('partDesc');
          }
          else
          {
            $items->partDesc = $request->input('partDesc');
            $change->partDesc = 1;
          }

          if ($items->partDesc2 == $request->input('partDesc2'))
          {
            $items->partDesc2 = $request->input('partDesc2');
          }
          else
          {
            $items->partDesc2 = $request->input('partDesc2');
            $change->partDesc2 = 1;
          }

          if ($items->partNo == $request->input('partNo'))
          {
            $items->partNo = $request->input('partNo');
          }
          else
          {
            $items->partNo = $request->input('partNo');
            $change->partNo = 1;
          }

          if ($items->size == $request->input('size'))
          {
            $items->size = $request->input('size');
          }
          else
          {
            $items->size = $request->input('size');
            $change->size = 1;
          }

          if ($items->quantity == $request->input('quantity'))
          {
            $items->quantity = $request->input('quantity');
          }
          else
          {
            $items->quantity = $request->input('quantity');
            $change->quantity = 1;
          }

          if ($items->rawMaterial == $request->input('rawMaterial'))
          {
            $items->rawMaterial = $request->input('rawMaterial');
          }
          else
          {
            $items->rawMaterial = $request->input('rawMaterial');
            $change->rawMaterial = 1;
          }

          if ($items->noPages == $request->input('noPages'))
          {
            $items->noPages = $request->input('noPages');
          }
          else
          {
            $items->noPages = $request->input('noPages');
            $change->noPages = 1;
          }

          if ($items->colour == $request->input('colour'))
          {
            $items->colour = $request->input('colour');
          }
          else
          {
            $items->colour = $request->input('colour');
            $change->colour = 1;
          }

          if ($items->finishing == $request->input('finishing'))
          {
            $items->finishing = $request->input('finishing');
          }
          else
          {
            $items->finishing = $request->input('finishing');
            $change->finishing = 1;
          }

          if ($items->lot == $request->input('lot'))
          {
            $items->lot = $request->input('lot');
          }
          else
          {
            $items->lot = $request->input('lot');
            $change->lot = 1;
          }

          if ($items->mfgDate  == $request->input('mfgDate'))
          {
            $items->mfgDate  = $request->input('mfgDate');
          }
          else
          {
            $items->mfgDate  = $request->input('mfgDate');
            $change->mfgDate = 1;
          }

          if ($items->expiryDate == $request->input('expiryDate'))
          {
            $items->expiryDate = $request->input('expiryDate');
          }
          else
          {
            $items->expiryDate = $request->input('expiryDate');
            $change->expiryDate = 1;
          }

          if ($items->dateFacNo == $request->input('dateFacNo'))
          {
            $items->dateFacNo = $request->input('dateFacNo');
          }
          else
          {
            $items->dateFacNo = $request->input('dateFacNo');
            $change->dateFacNo = 1;
          }

          if ($items->packerID == $request->input('packerID'))
          {
            $items->packerID = $request->input('packerID');
          }
          else
          {
            $items->packerID = $request->input('packerID');
            $change->packerID = 1;
          }

          $items->remark =$request->input('remark');
          $remark=$request->input('remark');
          $dom = new \DomDocument();
		  error_reporting(E_ERROR);
          $dom->loadHtml($remark);
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
          $items->remark = $dom->saveHTML();
          $items->save();

          // $workorder = new Workorder;
          $workorder = Workorder::find($sales->workorders_id);
          $workorder->sales_id = $sales->id;
          $workorder->wo_number = $request->input('workorder');
          $workorder->wid = $request->input('wid');
          $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
          $workorder->due_date = $dt;
          $workorder->save();

          $sales->items_id = $items->id;
          $sales->workorders_id = $workorder->id;
          $sales->save();
		  if($change){
			  $change->save();
		  }
          

          $picture = '';

          if ($request->hasFile('images')) {
                  $files = $request->file('images');
                  foreach($files as $file){
                  $filename = $file->getClientOriginalName();
                  $extension = $file->getClientOriginalExtension();
                  $picture = $filename;
                  $destinationPath = base_path() . '/public/uploaded';

                  $file->move($destinationPath, $picture);

                  $fileUpload = new FileUpload;
                  $fileUpload->filename = $filename;
                  $fileUpload->sales_id = $sales->id;
                  $fileUpload->doc_id = $sales->sco_number;
                  $fileUpload->user_id = Auth::user()->id;
                  $fileUpload->save();
              }
            }


        // Mail::to('aireen.9350@gmail.com')->send(new Changesc($user, $sales));

          // Notification::send($user, new ChangeSCinsales($sales));
        }
        else
        {
          $salesqad = Salesqad::where('salesline', $sales->salesline)->first();
          if(!empty($salesqad))
          {
            $salesqad->wid = $request->input('wid');
            $salesqad->save();
          }
          // $salesqad = new Salesqad;
          //
          // $salesqad->status_item = 'R';
          // $salesqad->wid = $request->input('wid');
          // $salesqad->Sales_Order = $request->input('salesorder');
          // $salesqad->Name = $request->input('custName');
          // $salesqad->Line = $request->input('line');
          // $salesqad->Item_Number = $request->input('partNo');
          // $salesqad->Quantity_Ordered = $request->input('quantity');
          // $dte  = \DateTime::createFromFormat('d/m/Y',$request->input('deliverDate'));
          // $salesqad->Due_Date = $dte ;
          // $salesqad->Purchase_order = $request->input('purchaseOrder');
          // $salesqad->Description = $request->input('partDesc');
          // $salesqad->Description_1 = $request->input('partDesc2');
          // $salesqad->record_status = 'Repeat';
          // $salesqad->sc_status = 'SC';
          // $salesqad->save();

          // $latestsales = Sales::orderBy('created_at', 'desc')->first();
          // if ($latestsales === null){
          //     $sales->sco_number = 'SC-' . Carbon::now()->format('y') . '-00001';
          // }
          // else{
          //     $number = (int) substr($latestsales->sco_number,-5,5);
          //     $number ++;
          //     $sales->sco_number = 'SC-' . Carbon::now()->format('y') .'-'.str_pad($number,5,'0',STR_PAD_LEFT );
          // }
          // $sales->salesqads_id = $salesqad->id;
          $sales->edit_user = Auth::user()->id;
          $sales->workorder = $request->input('workorder');
          $sales->wid = $request->input('wid');
          $sales->salesline = $request->input('salesorder').'-'.$request->input('line');
          $sales->salesorder = $request->input('salesorder');
          $sales->line = $request->input('line');
          $sales->purchaseOrder = $request->input('purchaseOrder');
          $dtsales3 = \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
          $sales->datetime = $dtsales3;
          $sales->custName = $request->input('custName');
          $dtsales2 = \DateTime::createFromFormat('d/m/Y', $request->input("deliverDate"));
          $sales->deliverDate = $dtsales2;
          // $sales->confirmBy =  $request->input('confirmBy');
          $sales->status_item = 'N';
          $sales->record_status = 'New';
          $sales->finish = $request->input('finish');
          $sales->planning_bom = null;
          // $sales->rev = $request->input('rev');
          $sales->save();

          $items = Item::find($sales->items_id);
          // $items = new Item;
          $items->sales_id = $sales->id;
          $items->model = $request->input('model');
          $items->partDesc = $request->input('partDesc');
          $items->partDesc2 = $request->input('partDesc2');
          $items->partNo = $request->input('partNo');
          $items->size = $request->input('size');
          $items->quantity = $request->input('quantity');
          $items->rawMaterial = $request->input('rawMaterial');
          $items->noPages = $request->input('noPages');
          $items->colour = $request->input('colour');
          $items->finishing = $request->input('finishing');
          $items->lot =  $request->input('lot');
          $items->mfgDate =  $request->input('mfgDate');
          $items->expiryDate =  $request->input('expiryDate');
          $items->dateFacNo =  $request->input('dateFacNo');
          $items->packerID =  $request->input('packerID');
          $items->remark =$request->input('remark');
          $remark=$request->input('remark');
          $dom = new \DomDocument();
          $dom->loadHtml($remark);
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
          $items->remark = $dom->saveHTML();
          $items->save();

          // $workorder = new Workorder;
          $workorder = Workorder::find($sales->workorders_id);
          $workorder->sales_id = $sales->id;
          $workorder->wo_number = $request->input('workorder');
          $workorder->wid = $request->input('wid');
          $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
          $workorder->due_date = $dt;
          $workorder->save();

          $sales->items_id = $items->id;
          $sales->workorders_id = $workorder->id;
          $sales->save();

          //$req = Requisite::where('salesline', $sales->salesline)->first();
		  // wan changed, because some sro don't have sales order.
		  $req = Requisite::where('SRO_number', $sales->sro_number)->first();
		  //return $req;
          if (!empty($req))
          {
            $req->confirm = 'complete';
            $req->save();
          }
          $picture = '';

          if ($request->hasFile('images')) {
                  $files = $request->file('images');
                  foreach($files as $file){
                  $filename = $file->getClientOriginalName();
                  $extension = $file->getClientOriginalExtension();
                  $picture = $filename;
                  $destinationPath = base_path() . '/public/uploaded';

                  $file->move($destinationPath, $picture);

                  $fileUpload = new FileUpload;
                  $fileUpload->filename = $filename;
                  $fileUpload->sales_id = $sales->id;
                  $fileUpload->doc_id = $sales->sco_number;
                  $fileUpload->user_id = Auth::user()->id;
                  $fileUpload->save();
              }
            }

        // Mail::to('aireen.9350@gmail.com')->send(new Changesc($user, $sales));

          // Notification::send($user, new ChangeSCinsales($sales));

        }
      }


      $salesqad = Salesqad::where('salesline', $sales->salesline)->first();
      if(!empty($salesqad))
      {
        $salesqad->record_status = 'Repeat';
        $salesqad->save();
      }

      return redirect()->route('frontend.slsmark.index')->withFlashSuccess('The data is saved and updated.');
    }

    public function listStock()
    {
      $sales=Sales::all();
      return view('frontend.slsmark.updateStock')->with('sales',$sales);
    }

    public function stockstatus ()
    {
      $sales = Sales::all();
      $items = Item::all();
      return view('frontend.slsmark.stockstatus')->with('sales',$sales)->with('items', $items);
    }

    public function stocklist ()
    {
      $sales = Sales::all();
      $transaction = Transaction::orderBy('date', 'desc')->first();
      $items = Item::all();
      return view('frontend.slsmark.stocklist')->with('sales',$sales)->with('items', $items)->with('transaction', $transaction)
      ;
    }

    public function stocktables1(Request $request)
    {

        $sales = Sales::leftJoin('items', 'sales.items_id', '=', 'items.id')
        ->leftJoin('salesqads', 'salesqads.salesline', '=', 'sales.salesline')
        ->leftJoin('addstocks', 'addstocks.so_number', 'sales.salesorder')
        ->leftJoin('prodstructs', 'prodstructs.items_number', '=', 'items.partNo')
        ->leftJoin('statusstocks', 'statusstocks.sales_id', '=', 'sales.id')
        ->leftJoin('transactions', 'transactions.items_number', '=', 'items.partNo')
        ->select([
          'items.partNo','prodstructs.component','sales.salesorder', 'sales.purchaseOrder','sales.wid', 'sales.sro_number'  ,'sales.sco_number',
					'sales.paf_number','addstocks.stockqty','addstocks.woqty', 'salesqads.Quantity_Open', 'transactions.loc_qty_change', 'transactions.date', 'statusstocks.balance',
					'sales.status_item','sales.finish','statusstocks.cust_approval','sales.deliverDate', 'salesqads.widremark', 'salesqads.solineremark', 'salesqads.soremark',
					'statusstocks.remarks','statusstocks.remarks2','statusstocks.remarks3','statusstocks.remarks4','statusstocks.remarks5', 'sales.id'
      ])
        //->where('sales.finish', '=', 'complete' )
        //->orWhere('sales.repeatdone', '=', 'complete')
        // ->where('transactions.loc_qty_change','!=', '0')
        ;

        // dd();
        return Datatables::of($sales)
        ->editColumn('sco_number', function($sales)
        {
            return '<a href="'. route('frontend.slsmark.show', $sales->id) . '" >'.$sales->sco_number.'</a>';
        })
				->editColumn('finish', function($sales)
        {
					if ($sales->finish == null)
					{
						return $sales->repeat;
					}else
					{
						return $sales->finish;
					}
					
        })
        ->editColumn('paf_number', function($sales)
        {
          $product = Product::where('items_id', $sales->items->id)->first();
          if (!empty($product))
          {
            return '<a href="'. route('frontend.slsmark.viewpaf', $product->id) . '" >'.$sales->paf_number.'</a>';
          }
          else {
            return '';
          }
        })
        

        ->editColumn('balance', function($sales)
        {
          $balance = DB::table("invqads")->where('items_number', $sales->items->partNo)->sum('qtyonhand_detail');
          // $balance = DB::table("addstocks")->where('so_number', $sales->salesorder)->where('items_number','=', $sales->items->partNo)->sum('stockqty');
          $bal1 = DB::table("addstocks")->where('so_number', $sales->salesorder)->where('items_number','=', $sales->items->partNo)->sum('woqty');
          $bal2 = DB::table("salesqads")->where('Sales_Order','=', $sales->salesorder)->sum('Quantity_Ordered');
          $bal3 = DB::table("transactions")->where('items_number','=', $sales->items->partNo)->sum('loc_qty_change');
          // return $bal2;

          return ''.$balance+$bal1-$bal2+$bal3.'';

        })
        ->editColumn('sro_number', function($sales)
        {
          $requisite = Requisite::where('SRO_number', $sales->sro_number)->first();
          if (!empty($requisite))
          {
            return '<a href="'. route('frontend.slsmark.viewreq', $requisite->id) . '" >'.$sales->sro_number.'</a>';
          }
          else {
            return '';
          }
        })
        ->editColumn('date',function ($date) {
                  return $date->date ? with(new Carbon($date->date))->format('d/m/Y') : '';
              })

        ->editColumn('deliverDate',function ($date) {
                  return $date->deliverDate ? with(new Carbon($date->deliverDate))->format('d/m/Y') : '';
              })

        ->editColumn('id', function ($sales) {
          return '<a href="'. route('frontend.slsmark.editstock', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="add"></i></a>
          ';

          // <a href="'. route('frontend.slsmark.manualstock', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="Manually key in data"></i></a>
        })
        ->escapeColumns([])
        ->make();
    }

    public function editstock ($id)
    {
      $sales = Sales::find($id);
      $statusstock = Statusstock::where('wid', $sales->wid)->where('salesjob', $sales->salesorder)->first();
      return view('frontend.slsmark.editstock')->with('sales',$sales)->with('statusstock', $statusstock);
    }

    public function storestocks1($id, Request $request)
    {
      $sales = Sales::find($id);
      $sales2 = Sales::where('salesorder', $sales->salesorder)->where('wid', $sales->wid)->first();
      $statusstock = Statusstock::where('wid', $sales->wid)->where('salesjob', $sales->salesorder)->first();
      // $workorder = Worko
      if (!empty($statusstock))
      {
        // $statusstock = new Statusstock;
        $statusstock->sales_id = $sales->id;
        $statusstock->items_number = $sales->items->partNo;
        $statusstock->wid = $sales->wid;
        $statusstock->salesjob = $sales->salesorder;
        $statusstock->stock_status = $request->input('stock_status');
        $statusstock->cust_approval = $request->input('cust_approval');
        $statusstock->app_date = $request->input('app_date');
        $statusstock->remarks = $request->input('remarks');
        $statusstock->balance = $request->input('balance');
        $statusstock->save();

        $sales->status_item = $request->input('stock_status');
        $sales->save();
      }
      else
      {
        $statusstock = new Statusstock;
        $statusstock->sales_id = $sales->id;
        $statusstock->items_number = $sales->items->partNo;
        $statusstock->wid = $sales->wid;
        $statusstock->salesjob = $sales->salesorder;
        $statusstock->stock_status = $request->input('stock_status');
        $statusstock->cust_approval = $request->input('cust_approval');
        $statusstock->app_date = $request->input('app_date');
        $statusstock->remarks = $request->input('remarks');
        $statusstock->balance = $request->input('balance');
        $statusstock->save();
        $sales->status_item = $request->input('stock_status');
        $sales->save();
      }
      return redirect()->route('frontend.slsmark.stocklist')->withFlashSuccess('The data is  saved.');

    }

    public function stocktables2()
    {
      $manual = Manual::select(['part_no', 'child_part',  'keepqty', 'manualstock','stockcard', 'duedate', 'custpo', 'sono','soqty', 'paper', 'remark1','remark2','remark3','remark4','remark5', 'id', 'status'])
      ->where('status', '=', 'complete');

      return Datatables::of($manual)
      ->editColumn('id', function ($manual) {
        return '<a href="'. route('frontend.slsmark.addremarkmstock', $manual->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="add"></i></a>';
			})
      ->editColumn('stockcard', function ($manual) {

        $balance = DB::table("invqads")
				->where('items_number', $manual->part_no)->sum('qtyonhand_detail');
				
				$bal2 = 0;
        $bal2 = DB::table("salesqads")->where('Sales_Order','=', $manual->sono)->sum('Quantity_Ordered');
				
				$bal1 = 0;
        $bal1 = DB::table("addstocks")
				->where('so_number', $manual->sono)
				->where('items_number','=', $manual->part_no)
				->sum('woqty');
				
				
				$bal3 = 0;
        $bal3 = DB::table("transactions")->where('items_number','=', $manual->part_no)->sum('loc_qty_change');

        return ''.$balance+$bal1-$bal2+$bal3.'';

      })
      ->escapeColumns([])
      ->make();
    }

    public function addremarkmstock ($id)
    {
      $manual = Manual::find($id);
      return view('frontend.slsmark.addremarkmstock')->with('manual',$manual);
    }

    public function storeremarkmanual($id, Request $request)
    {
        $manual = Manual::find($id);

        $manual->remark1 = $request->input('remark1');
        $manual->remark2 = $request->input('remark2');
        $manual->remark3 = $request->input('remark3');
        $manual->remark4 = $request->input('remark4');
        $manual->remark5 = $request->input('remark5');
        $manual->save();

      return redirect()->route('frontend.slsmark.stocklist')->withFlashSuccess('The data is  saved.');

    }

    //show datatable
    public function listTable()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
        $sales = Sales::leftJoin('items', 'sales.items_id', '=', 'items.id')
        ->select(['sales.wid','sales.custName', 'items.partNo','items.partDesc','items.partDesc2', 'sales.id'])
        ->where('sales.finish', '=', 'Y' );

        return Datatables::of($sales)
          ->editColumn('id', function ($sales) {
          return '<a href="'. route('frontend.slsmark.stocklist', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="Forecast stock"></i></a>
          ';
        })
        ->escapeColumns([])
        ->make();
      }
      else
      {
        $sales = Sales::leftJoin('items', 'sales.items_id', '=', 'items.id')
        ->select(['sales.wid','sales.custName', 'items.partNo','items.partDesc','items.partDesc2', 'sales.id'])
        ->where('sales.finish', '=', 'Y' );

        return Datatables::of($sales)
          ->editColumn('id', function ($sales)  {
          return '';
        })
        ->escapeColumns([])
        ->make();
      }
    }
    // return '<a href="'. route('frontend.slsmark.stock', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="Forecast stock"></i></a>

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
         $balance = DB::table("stocks")->where('status','=', 'WO')->where('item_number','=', $items->partNo)->sum('quantity_ordered') + DB::table("stocks")->where('status','=', 'SO')->where('item_number','=', $items->partNo)->sum('quantity_ordered');
       }

       if ($stockupdate == null){
         $stock = $balance;
       }
       else {
         // $stock =$stockupdate->stock_taken - $balance + $stockupdate->adj ;
         $stock =  DB::table("stockupdates")->where('items_id','=', $items->id)->sum('stock_taken') - $balance + DB::table("stockupdates")->where('items_id','=', $items->id)->sum('adj');

       }
       return view('frontend.slsmark.stock')
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

      $stockupdate = new Stockupdate;
      $stockupdate->items_id = $sales->items_id;
      $stockupdate->idNum = $request->input('idNum');
      $stockupdate->POQuantity = $request->input('POQuantity');
      $stockupdate->stock_taken = $request->input('stock_taken');
      $stockupdate->adj = $request->input('adj');
      $stockupdate->balance =  $request->input('balance');
      $dtreceive= \DateTime::createFromFormat('d/m/Y', $request->input("receiveDate"));
      $stockupdate->receiveDate =  $dtreceive;
      $stockupdate->remarkStock =  $request->input('remarkStock');
      $stockupdate->partNo = $sales->items->partNo;
      $stockupdate->save();

      return redirect()->route('frontend.slsmark.stock', $sales->id)->withFlashSuccess('The data is  saved.');
    }

    public function viewstocktable(Request $request)
    {
      $stockupdate = Stockupdate::leftJoin('items', 'stockupdates.items_id', '=', 'items.id')
      ->select(['stockupdates.idNum', 'stockupdates.POQuantity','stockupdates.stock_taken',  'stockupdates.adj','stockupdates.balance',
       'stockupdates.receiveDate', 'stockupdates.remarkStock', 'stockupdates.id'])
       ->where('items.id', '=', $request->input('id') )
      ;

      return Datatables::of($stockupdate)
      ->editColumn('receiveDate', function ($date) {
              return $date->receiveDate ? with(new Carbon($date->receiveDate))->format('d/m/Y') : '';
          })
      ->editColumn('id', function ($stockupdate) {
        return '<a href="'. route('frontend.slsmark.deletestock',$stockupdate->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>';

          })
    ->escapeColumns([])
    ->make();
    }

    public function wosotable(Request $request)
    {
      $stock = Stock::select(['status', 'reference','due_date', 'quantity_ordered'])
      ->where('item_number', '=', $request->input('partNo') );
      return Datatables::of($stock)
      ->editColumn('due_date', function ($date) {
              return $date->due_date ? with(new Carbon($date->due_date))->format('d/m/Y') : '';
          })
      ->escapeColumns([])
      ->make();
    }
     public function showrepeat ($id)
     {
       $sales = Sales::find($id);
       return view('frontend.slsmark.showrepeat')->with('sales', $sales);
     }

     public function tablesample()
     {
         $sales = Sales::leftJoin('items', 'sales.items_id', '=', 'items.id')
         ->select(['sales.wid','sales.custName', 'items.partNo', 'items.partDesc', 'items.partDesc2','sales.id'])
         ->where('sales.finish', '=', 'Y' );

         return Datatables::of($sales)
         ->editColumn('id', function ($sales) {
           return '<a href="'. route('frontend.slsmark.samplerequisite', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add New"></i></a>
           ';
         })

         ->escapeColumns([])
         ->make();
       }

       public function showsales()
       {
           $sales =  Sales::all();
           $requisite = Requisite::all();
           return view('frontend.slsmark.showsales')
           ->with('sales',$sales)
           ->with('requisite',$requisite);
       }

       public function pafsro($id)
       {
           $requisite = Requisite::find($id);
           return view('frontend.slsmark.pafsro')
           ->with('requisite',$requisite);
       }

       public function storepafsro( $id,Request $request)
       {
         if (access()->hasPermissions(['sales-marketing']))
         {
             $sales= Sales::find($id);

             $product = new Product;
             $product->items_id = $sales->items_id;
             $latestproduct = Product::orderBy('created_at', 'desc')->first();
             if ($latestproduct === null){
                 $product->paf_number = 'PAF-' . Carbon::now()->format('y') . '-00001';
             }
             else{
                 $number = (int) substr($latestproduct->paf_number,-5,5);
                 $number ++;
                 $product->paf_number = 'PAF-' . Carbon::now()->format('y') .'-'. str_pad($number,5,'0',STR_PAD_LEFT );
             }
             $product->oldpartno =  $request->input('oldpartno');
             $product->revNo =  $request->input('revNo');
             $product->lot1 =  $request->input('lot');
             $product->mfgDate1 =  $request->input('mfgDate');
             $product->expiryDate1 =  $request->input('expiryDate');
             $product->dateFacNo1 =  $request->input('dateFacNo');
             $product->packerID1 =  $request->input('packerID');
             $product->lotcheck1 = $request->input('lotcheck');
             $product->mfgcheck1 = $request->input('mfgcheck');
             $product->expcheck1 = $request->input('expcheck');
             $product->datecheck1 = $request->input('datecheck');
             $product->packcheck1 = $request->input('packcheck');
             $product->batchcheck1 = $request->input('batchcheck');
             $product->batchbar1 = $request->input('batchbar');
             $product->size1 = $request->input('size');
             $product->rawMaterial1 = $request->input('rawMaterial');
             $product->noPages1 = $request->input('noPages');
             $product->colour1 = $request->input('colour');
             $product->finishing1 = $request->input('finishing');
             $product->sco_number =$sales->sco_number;
             $product->approval = $request->input('approval');
             $product->remarkbig = $request->input('remarkbig');
             $product->material =  $request->input('material');
             $product->data =  $request->input('data');
             $product->artwork =  $request->input('artwork');
             $product->diecut =  $request->input('diecut');
             $product->attachment =  $request->input('attachment');
             $product->revNo = $request->input('revNo');
             $product->newArtwork  = $request->input('newArtwork');
             $product->films = $request->input('films');
             $product->technicalDrawing = $request->input('technicalDrawing');
             $product->digitalProofing = $request->input('digitalProofing');
             $product->artworkDrawing = $request->input('artworkDrawing');
             $product->colorLimit = $request->input('colorLimit');
             $product->bluePrint = $request->input('bluePrint');
             $product->pmrf = $request->input('pmrf');
             $product->other = $request->input('other');
             $product->other_text = $request->input('other_text');
             $product->yes = $request->input('yes');
             $product->no = $request->input('no');
             $product->customer = $request->input('customer');
             $product->customer_text = $request->input('customer_text');
             $product->qa = $request->input('qa');
             $product->qa_text = $request->input('qa_text');
             $product->production = $request->input('production');
             $product->production_text = $request->input('production_text');
             $product->qtyOnHand = $request->input('qtyOnHand');
             $dtprod = \DateTime::createFromFormat('d/m/Y',  $request->input("datetime"));
             $product->datetime =$dtprod;
             $product->productionProcess = $request->input('productionProcess');
             $product->handCutSubmission = $request->input('handCutSubmission');
             $product->yes1 = $request->input('yes1');
             $product->no1 = $request->input('no1');
             $product->wip = $request->input('wip');
             $product->fg = $request->input('fg');
             $product->rcp = $request->input('rcp');
             $product->cutoff = $request->input('cutoff');
             $product->kiv = $request->input('kiv');
             $product->workOrderID = $request->input('workOrderID');
             $product->notAvailable1 = $request->input('notAvailable1');
             $product->adviseBy = $request->input('adviseBy');
             $product->issueBy = $request->input('issueBy');
             $product->done = 'planner';
             $remarkbig=$request->input('remarkbig');
             $dom = new \DomDocument();
             $dom->loadHtml($remarkbig);
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
             $product->remarkbig = $dom->saveHTML();
             $product->save();
							//wan added prodedit
							$pe = new prodedit;
							$pe->products_id = $product->id;
							$pe->save();

             $sales->paf_number= $product->paf_number;
             $sales->save();

             // START file upload save
             $picture = '';

             if ($request->hasFile('images')) {
                     $files = $request->file('images');
                     foreach($files as $file){
                     $filename = $file->getClientOriginalName();
                     $extension = $file->getClientOriginalExtension();
                     $picture = $filename;
                     $destinationPath = base_path() . '/public/uploaded';

                     $file->move($destinationPath, $picture);

                     $fileUpload = new FileUpload;
                     $fileUpload->filename = $filename;
                     $fileUpload->products_id = $product->id;
                     $fileUpload->doc_id = $product->paf_number;
                     $fileUpload->user_id = Auth::user()->id;
                     $fileUpload->save();
                   }
                 }

             return redirect()->route('frontend.slsmark.review')->withFlashSuccess('The data is saved.');
           }
           else
           {
             $sales= Sales::find($id);
             $product = Product::where('paf_number', $request->input('paf_number'))->first();
             $product->remarkbig=$request->input('remarkbig');
             $product->notAvailable1=$request->input('notAvailable1');
             $product->dispose1=$request->input('dispose1');
             $product->ctpPlate_text=$request->input('ctpPlate_text');
             $product->notAvailable2=$request->input('notAvailable2');
             $product->dispose2=$request->input('dispose2');
             $product->film_text=$request->input('film_text');
             $product->ctp_issue=$request->input('ctp_issue');
             $product->save();

             return redirect()->route('frontend.slsmark.review')->withFlashSuccess('The data is saved.');
           }
       }

       public function requisition()
       {
					//wan removed join with sales and items.
          //$requisite = Requisite::leftJoin('sales', 'requisites.salesline', '=', 'sales.salesline')
          //->leftJoin('items', 'items.sales_id', '=', 'sales.id')
          // ->leftJoin('addstocks', 'addstocks.so_number','=', 'sales.salesorder')
					
					$requisite = Requisite::select(['requisites.SRO_number','requisites.customerName',
						'requisites.partNumberSRO','requisites.partDescSRO', 'requisites.partDesc2SRO','requisites.quantitySRO', 'requisites.requiredDate',
						 'requisites.id','requisites.confirm']);
						
						
           
					//->select(['requisites.SRO_number'
          //,'requisites.customerName',
          //'requisites.partNumberSRO','requisites.partDescSRO', 'requisites.partDesc2SRO','requisites.quantitySRO',
          //'requisites.requiredDate', 'requisites.id','requisites.confirm'])
          // ,'requisites.salesorder', 'requisites.line', 'requisites.wid'
          // 'addstocks.keep_qty','addstocks.manual_qty', 'addstocks.stockqty','addstocks.woqty', 'addstocks.totalwoqty',
          // ->where('confirm', '=', null)
					//->orderBy('id', 'desc')
           

          return Datatables::of($requisite)
          ->escapeColumns([])
          ->editColumn('id', function ($requisite) {
            if ($requisite->confirm == null)
            {
              return '<a href="'. route('frontend.slsmark.editreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
              <a href="'. route('frontend.slsmark.viewreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
              <a href="'. route('frontend.slsmark.pafsro', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="PAF"></i></a>
              <a href="'. route('frontend.slsmark.confirmreq', $requisite->id) . '" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-ok" onclick=" return confirm(\'Are you sure you want to do this?\')" data-toggle="tooltip" title="Confirm"></i></a>
              <a href="'. route('frontend.slsmark.destroyreq', $requisite->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" onclick=" return confirm(\'Are you sure you want to do this?\')" data-toggle="tooltip" title="Delete"></i></a>
              ';
            }
            else
            {
              return '<a href="'. route('frontend.slsmark.editreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
              <a href="'. route('frontend.slsmark.viewreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
              <a href="'. route('frontend.slsmark.pafsro', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="PAF"></i></a>
              <a href="'. route('frontend.slsmark.destroyreq', $requisite->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
              ';
            }
             //return $sales->action_buttons;

          })
					->editColumn('requiredDate', function ($requisite) {
						return date('d-m-Y',strtotime($requisite->requiredDate));
					})
           //->order(function ($requisite) {
           //                $requisite->orderBy('created_at', 'desc');
           //            })
					// ->filterColumn('formatted_dob', function($query, $keyword) {
						// $query->whereRaw('DATE_FORMAT(requisites.requiredDate, "%d-%b-%Y") like ?', ["%{$keyword}%"]);
					// })
          ->make();
         }
         public function showsaleshist()
         {
             $sales =  Sales::all();
             $requisite = Requisite::all();
             return view('frontend.slsmark.showsaleshist')
             ->with('sales',$sales)
             ->with('requisite',$requisite);
         }

         public function requisition2()
         {
             $requisite = Requisite::select(['wid', 'customerName', 'partNumberSRO', 'partDescSRO','partDesc2SRO', 'revSRO', 'status',  'confirm', 'id'])
             // ->where('confirm', '=', 'Y')
             ;

             return Datatables::of($requisite)
             ->escapeColumns([])
             ->editColumn('id', function ($requisite) {
               if ($requisite->confirm == 'Complete')
               {
                 return '<a href="'. route('frontend.slsmark.editreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
                 <a href="'. route('frontend.slsmark.viewreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
                 <a href="'. route('frontend.slsmark.destroyreq', $requisite->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
                 ';
               }
               else
               {
                 return '<a href="'. route('frontend.slsmark.editreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
                 <a href="'. route('frontend.slsmark.viewreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search" data-toggle="tooltip" title="View"></i></a>
                 <a href="'. route('frontend.slsmark.confirmreq', $requisite->id) . '" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-ok" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
                 <a href="'. route('frontend.slsmark.destroyreq', $requisite->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a>
                 ';
               }
               //return $sales->action_buttons;

             })
             // ->order(function ($requisite) {
             //                $requisite->orderBy('created_at', 'desc');
             //            })
             ->make();
           }

   public function confirmreq ($id)
   {
     $requisite = Requisite::find($id);
     $process = Process::where('requisites_id', $requisite->id)->get();
     if ($requisite->confirm == null)
     {
       foreach($process as $p)
       {
         $get[] = $p->other_sub .'='. $p->other_data;
       }
       $links = implode(',', $get);
       // $user = User::find($requisite->user_id);
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
       $sales->user_id = Auth::user()->id;
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

       $requisite->confirm = 'Pending';
       $requisite->status = 'SC';
       $requisite->save();

       return redirect()->route('frontend.slsmark.showsales')->withFlashSuccess('The SRO is pending and been transfered to SC(Not Done). ');
     }
     else
     {
       return redirect()->route('frontend.slsmark.showsales')->withFlashWarning('The SRO is either on pending or already confirm. ');
     }


   }


    public function editreq($id)
    {
       $requisite = Requisite::find($id);
       $fileUpload = FileUpload::where('requisites_id', $requisite->id)->get();
       $process = Process::where('requisites_id', $requisite->id)->get();
       return view('frontend.slsmark.editreq')
       ->with('requisite', $requisite)
       ->with('process', $process)
       ->with('fileUpload', $fileUpload);
    }

    public function viewreq($id)
    {
       $requisite = Requisite::find($id);
       $process = Process::where('requisites_id', $requisite->id)->get();
       return view('frontend.slsmark.viewreq')
       ->with('requisite', $requisite)
       ->with('process', $process);
    }

     public function storeeditreq ($id, Request $request)
     {
         $requisite = Requisite::find($id);
         $latestrequisite = Requisite::orderBy('created_at', 'desc')->first();
         // if ($latestrequisite === null){
             // $requisite->SRO_number = 'SRO-' . Carbon::now()->format('y') . '-00001';
         // }
         // else{
             // $number = (int) substr($latestrequisite->SRO_number,-5,5);
             // $number ++;
             // $requisite->SRO_number = 'SRO-' . Carbon::now()->format('y') .'-'.str_pad($number,5,'0',STR_PAD_LEFT );
         // }
         $latestrevision = Requisite::orderby('created_at', 'desc')->first();
         if ($latestrevision === null){
             $requisite->revSRO = 'rev-'.'0001';
         }
         else{
             $number = (int) substr($latestrevision->revSRO,-2,2);
             $number ++;
             $requisite->revSRO = 'rev-'. str_pad($number,3,'0',STR_PAD_LEFT );
         }
         $dtsro = \DateTime::createFromFormat('d/m/Y', $request->input("dateSRO"));
         $requisite->dateSRO = $dtsro;
         $requisite->release = $request->input('release');
         $requisite->customerName = $request->input('customerName');
         $requisite->modelSRO = $request->input('modelSRO');
         $requisite->partDescSRO = $request->input('partDescSRO');
         $requisite->partDesc2SRO = $request->input('partDesc2SRO');
         $requisite->partNumberSRO =  $request->input('partNumberSRO');
         $requisite->quantitySRO =  $request->input('quantitySRO');
         $requisite->sizeSRO =  $request->input('sizeSRO');
         $requisite->materialSRO =  $request->input('materialSRO');
         $requisite->remarksSRO = $request->input('remarksSRO');
         $dtreq = \DateTime::createFromFormat('d/m/Y', $request->input('requiredDate'));
         $requisite->requiredDate = $dtreq;
         $requisite->requestedBy = $request->input('requestedBy');
         $requisite->preparedBy = $request->input('preparedBy');

          //if got any image insert
					//error_reporting(E_ERROR);
          $remarksSRO=$request->input('remarksSRO');
          $dom = new \DomDocument();
          $dom->loadHtml($remarksSRO);
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
         $requisite->remarksSRO = $dom->saveHTML();
         $requisite->save();

         $count       = count($request->input('other_sub'));
         $other_sub   = $request->input('other_sub');
         $other_data  = $request->input('other_data');
         $process_id  = $request->input('id');
         $process = Process::where('requisites_id', $requisite->id)->get();
         $i=0;
         foreach($process_id as $id)
         {
           $process= Process::updateOrCreate
             (
               ['id'=>$id],['other_sub' => $other_sub[$i],'other_data' => $other_data[$i] ]
             );
             $i++;
         }

         $counting       = count($request->input('other_subnew'));
         $other_subnew   = $request->input('other_subnew');
         $other_datanew  = $request->input('other_datanew');
         if ($other_subnew == null)
         {
         }
         else
         {
           for($i = 0; $i < $counting; ++$i)
           {
             $process = new Process;
             $process->requisites_id  =   $requisite->id;
             $process->other_sub      =   $other_subnew[$i];
             $process->other_data     =   $other_datanew[$i];
             $process->save();
           }
         }

         // START file upload save
         $picture = '';

         if ($request->hasFile('images')) {
                 $files = $request->file('images');
                 foreach($files as $file){
                 $filename = $file->getClientOriginalName();
                 $extension = $file->getClientOriginalExtension();
                 $picture = $filename;
                 $destinationPath = base_path() . '/public/uploaded';

                 $file->move($destinationPath, $picture);

                 $fileUpload = new FileUpload;
                 $fileUpload->filename = $filename;
                 $fileUpload->requisites_id = $requisite->id;
                 $fileUpload->doc_id = $requisite->SRO_number;
                 $fileUpload->user_id = Auth::user()->id;
                 $fileUpload->save();
               }
             }
       // END file upload save

         return redirect()->route('frontend.slsmark.showsales')->withFlashSuccess('The data is  saved ');
     }

     public function samplerequisite($id)
     {
        $salesqad = Salesqad::find($id);
        return view('frontend.slsmark.samplerequisite')
        ->with('salesqad', $salesqad);
     }

      public function storereq (Request $request, $id)
      {
        $salesqad = Salesqad::find($id);
        $salesqad->status = 'sro';
        $salesqad->sc_status = 'SRO';
        $salesqad->save();

          $requisite = new Requisite;
          $latestrequisite = Requisite::orderBy('created_at', 'desc')->first();
          if ($latestrequisite === null){
              $requisite->SRO_number = 'SRO-' . Carbon::now()->format('y') . '-00001';
          }
          else{
              $number = (int) substr($latestrequisite->SRO_number,-5,5);
              $number ++;
              $requisite->SRO_number = 'SRO-' . Carbon::now()->format('y') .'-'.str_pad($number,5,'0',STR_PAD_LEFT );
          }
          $requisite->user_id = Auth::user()->id;
          $requisite->salesorder = $request->input('salesorder');
          $requisite->line = $request->input('line');
          $requisite->salesline = $request->input('salesorder').'-'.$request->input('line');
          $dtsro = \DateTime::createFromFormat('d/m/Y', $request->input("dateSRO"));
          $requisite->dateSRO = $dtsro;
          // $requisite->release = $request->input('release');
          $requisite->customerName = $request->input('customerName');
          $requisite->modelSRO = $request->input('modelSRO');
          $requisite->partDescSRO = $request->input('partDescSRO');
          $requisite->partDesc2SRO = $request->input('partDesc2SRO');
          $requisite->partNumberSRO =  $request->input('partNumberSRO');
          $requisite->quantitySRO =  $request->input('quantitySRO');
          $requisite->sizeSRO =  $request->input('sizeSRO');
          $requisite->materialSRO =  $request->input('materialSRO');
          $requisite->remarksSRO = $request->input('remarksSRO');
          $dtreq = \DateTime::createFromFormat('d/m/Y', $request->input('requiredDate'));
          $requisite->requiredDate = $dtreq;
          $requisite->requestedBy = $request->input('requestedBy');
          $requisite->preparedBy = $request->input('preparedBy');

            //if got any image insert
            $remarksSRO=$request->input('remarksSRO');
            $dom = new \DomDocument();
			error_reporting(E_ERROR);
            $dom->loadHtml($remarksSRO);
            $images = $dom->getElementsByTagName('img');
            foreach($images as $img){
                $src = $img->getAttribute('src');
                if(preg_match('/data:image/', $src)){
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];
                    $filename = uniqid();
                    $filepath = "/uploaded/$filename.$mimetype";
                    $image = Image::make($src)
                      ->encode($mimetype, 100)  // encode file to the specified mimetype
                      ->save(public_path($filepath));
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                } // <!--endif
            } // <!-
           $requisite->remarksSRO = $dom->saveHTML();
           $requisite->save();

            $count = count($request->input('other_sub'));
            $other_sub        = $request->input('other_sub');
            $other_data  =   $request->input('other_data');

            for($i = 0; $i < $count; ++$i)
            {
            $process = new Process;
            $process->requisites_id  =   $requisite->id;
            $process->other_sub      =   $other_sub[$i];
            $process->other_data     =   $other_data[$i];
            $process->save();
            }

          // START file upload save
          $picture = '';

          if ($request->hasFile('images')) {
                  $files = $request->file('images');
                  foreach($files as $file){
                  $filename = $file->getClientOriginalName();
                  $extension = $file->getClientOriginalExtension();
                  $picture = $filename;
                  $destinationPath = base_path() . '/public/uploaded';

                  $file->move($destinationPath, $picture);

                  $fileUpload = new FileUpload;
                  $fileUpload->filename = $filename;
                  $fileUpload->requisites_id = $requisite->id;
                  $fileUpload->doc_id = $requisite->SRO_number;
                  $fileUpload->user_id = Auth::user()->id;
                  $fileUpload->save();
                }
              }
        // END file upload save

          return redirect()->route('frontend.slsmark.showsales')->withFlashSuccess('The data is  saved ');
      }

      public function samplereq()
      {
        $requisite = Requisite::all();
         return view('frontend.slsmark.samplereq')->with('requisite', $requisite);
      }

       public function storereq2 (Request $request)
       {
           $requisite = new Requisite;
           $latestrequisite = Requisite::orderBy('created_at', 'desc')->first();
           if ($latestrequisite === null){
               $requisite->SRO_number = 'SRO-' . Carbon::now()->format('y') . '-00001';
           }
           else{
               $number = (int) substr($latestrequisite->SRO_number,-5,5);
               $number ++;
               $requisite->SRO_number = 'SRO-' . Carbon::now()->format('y') .'-'.str_pad($number,5,'0',STR_PAD_LEFT );
           }
           $requisite->user_id = Auth::user()->id;
           $requisite->salesorder = $request->input('salesorder');
           $requisite->line = $request->input('line');
           $requisite->salesline = $request->input('salesorder').'-'.$request->input('line');
           $dtsro = \DateTime::createFromFormat('d/m/Y', $request->input("dateSRO"));
           $requisite->dateSRO = $dtsro;
           $requisite->customerName = $request->input('customerName');
           $requisite->modelSRO = $request->input('modelSRO');
           $requisite->partDescSRO = $request->input('partDescSRO');
           $requisite->partDesc2SRO = $request->input('partDesc2SRO');
           $requisite->partNumberSRO =  $request->input('partNumberSRO');
           $requisite->quantitySRO =  $request->input('quantitySRO');
           $requisite->sizeSRO =  $request->input('sizeSRO');
           $requisite->materialSRO =  $request->input('materialSRO');
           $requisite->remarksSRO = $request->input('remarksSRO');
           $dtreq = \DateTime::createFromFormat('d/m/Y', $request->input('requiredDate'));
           $requisite->requiredDate = $dtreq;
           $requisite->requestedBy = $request->input('requestedBy');
           $requisite->preparedBy = $request->input('preparedBy');

             //if got any image insert
             $remarksSRO=$request->input('remarksSRO');
             error_reporting(E_ERROR);
             $dom = new \DomDocument();
             $dom->loadHtml($remarksSRO);
             $images = $dom->getElementsByTagName('img');
             foreach($images as $img){
                 $src = $img->getAttribute('src');
                 if(preg_match('/data:image/', $src)){
                     preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                     $mimetype = $groups['mime'];
                     $filename = uniqid();
                     $filepath = "/uploaded/$filename.$mimetype";
                     $image = Image::make($src)
                       ->encode($mimetype, 100)  // encode file to the specified mimetype
                       ->save(public_path($filepath));
                     $new_src = asset($filepath);
                     $img->removeAttribute('src');
                     $img->setAttribute('src', $new_src);
                 } // <!--endif
             } // <!-
            $requisite->remarksSRO = $dom->saveHTML();
            $requisite->save();

             $count = count($request->input('other_sub'));
             $other_sub        = $request->input('other_sub');
             $other_data  =   $request->input('other_data');

             for($i = 0; $i < $count; ++$i)
             {
             $process = new Process;
             $process->requisites_id  =   $requisite->id;
             $process->other_sub      =   $other_sub[$i];
             $process->other_data     =   $other_data[$i];
             $process->save();
             }

           // START file upload save
           $picture = '';

           if ($request->hasFile('images')) {
                   $files = $request->file('images');
                   foreach($files as $file){
                   $filename = $file->getClientOriginalName();
                   $extension = $file->getClientOriginalExtension();
                   $picture = $filename;
                   $destinationPath = base_path() . '/public/uploaded';

                   $file->move($destinationPath, $picture);

                   $fileUpload = new FileUpload;
                   $fileUpload->filename = $filename;
                   $fileUpload->requisites_id = $requisite->id;
                   $fileUpload->doc_id = $requisite->SRO_number;
                   $fileUpload->user_id = Auth::user()->id;
                   $fileUpload->save();
                 }
               }
         // END file upload save

           return redirect()->route('frontend.slsmark.showsales')->withFlashSuccess('The data is  saved ');
       }
			 
			public function daIndex()
			{
				
				//return $da;
				return view('frontend.slsmark.daIndex');
			}
			
			public function da_table()
			{
				$da = Dachild::select(['item_number', 'customer_po', 'duedate',  'quantity', 'id'])
				->orderBy('duedate', 'desc');
				
				return Datatables::of($da)
				->addColumn('id', function ($da) {

  
					return ' <input type="checkbox" name="things[]" value="'.$da->id.'" >
                  <input type="hidden" name="item_number[]" value="'.$da->id.'" >
					';
      
				})
				->escapeColumns([])
				->make();
			}
			
			public function daselect2(Request $r)
			{
				//return $r->all();
				$da = Dachild::whereIn('id', $r->things)->get();
				
				$data = [
					'da' => $da,
					'da2' => $da
					
				];
        $pdf = PDF::loadView('frontend.slsmark.printda', $data);
        return $pdf->stream("bosch_".date('Y_m_d_H_i').".pdf");
			}

       public function daselect ()
       {
					// $salesqad = Salesqad::all();
					$salesqad = Salesqad::distinct()->get(['Sold_To', 'Name']);
					return view('frontend.slsmark.dalist')
					->with('salesqad', $salesqad);
       }

      public function dalist(Request $request)
      {
          $type = Input::get('type');
          $sold = $request->input('Sold_To');
          $date = Salesqad::where('Sold_To', $sold)->distinct()->get();

          if ($type == 'a')
          {
            $bosch1 = Bosch::select('id','cust_po', 'part_no', 'qty', 'inv', 'warehouse', 'date_upload')->distinct()->get();
            $type = 'a';
            return view ('frontend.slsmark.format1')->with('type', $type)
            ->with('bosch1', $bosch1);
          }

          else if ($type == 'none')
          {
            $salesqad = Salesqad::all();
            $name = Salesqad::where('Sold_To', $sold)->first();
            $cust = Cust::where('code', $sold)->first();
            $date = Salesqad::select('Due_Date')->where('Sold_To', $sold)->distinct()->get();
            $type = 'none';
            return view ('frontend.slsmark.editname')->with('type', $type)->with('salesqad', $salesqad)->with('name', $name)->with('cust', $cust);
          }
      }

       public function changebosch(Request $request)
       {
         // return $request->all();
         $check = $request->input('stor');
         $bosch = Bosch::find($check);

         return view ('frontend.slsmark.changebosch')->with('bosch', $bosch);

       }

       public function storebosch(Request $request)
       {

         $warehouse = $request->input('warehouse');
         $inv = $request->input('inv');
         $boschid = $request->input('id');

         $bosch = Bosch::find($boschid);
         $i=0;
         foreach($bosch as $b)
         {
           $b->warehouse = $warehouse;
           $b->inv = $inv[$i];
           $b->save();
           $i++;
         }

         return redirect()->route('frontend.slsmark.format1')->withFlashSuccess('The name had changed ');
       }


       public function bosch()
       {
         $bosch1 = Bosch::select('id','cust_po', 'part_no', 'qty', 'inv', 'warehouse', 'date_upload')->distinct()->get();
         $bosch2 = Bosch::select('warehouse')->distinct()->get();
				
         return view ('frontend.slsmark.bosch')->with('bosch1', $bosch1)->with('bosch2', $bosch2);
       } 

      public function boschpdf(Request $request)
      {
        $wa = $request->input('warehouse');
        $c = count($wa);
         
        for($i=0; $i < $c; $i++){
					$bosch = Bosch::whereIn('warehouse', $wa)->get(); 
					$bosch1 = Bosch::select('warehouse')->whereIn('warehouse', $wa)->distinct()->get();
        }
				$data = [
					'bosch' =>$bosch, 
					'bosch1' =>$bosch1,
				];
        $pdf = PDF::loadView('frontend.slsmark.printbosch', $data);
        return $pdf->stream("bosch_".date('Y_m_d_H_i').".pdf");
      }



    public function storeeditname(Request $request)
    {
      $input = $request->input('code');
      $salesqad = Salesqad::where('Sold_To', $input)->first();
      $cust1 = Cust::where('code', $salesqad->Sold_To)->first();
      if (!empty($cust1))
      {
        $cust = Cust::where('code', $salesqad->Sold_To)->first();
        $cust->ori = $request->input('ori');
        $cust->code = $request->input('code');
        $cust->change = $request->input('change');
        $cust->save();
      }
      else {
        $cust = new Cust;
        $cust->ori = $request->input('ori');
        $cust->code = $request->input('code');
        $cust->change = $request->input('change');
        $cust->save();
      }

        return redirect()->route('frontend.slsmark.format2', $salesqad->id)->withFlashSuccess('The name had changed ');

    }

    public function storeeditbosch(Request $request)
    {
      // $input = $request->input('code');
      $salesqad = Salesqad::where('Sold_To', 'TDR0001')->first();
      $cust = new Cust;
      $cust->ori = $request->input('ori');
      $cust->code = $request->input('code');
      $cust->change = $request->input('change');
      $cust->save();

      return redirect()->route('frontend.slsmark.format1', $salesqad->id)->withFlashSuccess('The name had changed ');
    }

    public function format1()
    {
      $bosch1 = Bosch::select('id','cust_po', 'part_no', 'inv', 'qty', 'date_upload', 'warehouse')->distinct()->get();
      return view ('frontend.slsmark.format1')->with('bosch1', $bosch1);
    }

    public function format2($id)
    {
      $sub =0;
        {
          $no = $sub+1;
            $sub ++;

          }
      $salesqad = Salesqad::find($id);
      // $salesqadid = Salesqad::select('id')->where('Sold_To', $salesqad->Sold_To)->where('Quantity_Ordered', '>=', 0)->distinct()->get();
      $name = Salesqad::where('Sold_To', $salesqad->Sold_To)->where('Quantity_Ordered', '>=', 0)->distinct()->get();
      $date = Salesqad::select('Due_Date', 'Sales_Order')->where('Sold_To', $salesqad->Sold_To)->where('Quantity_Ordered', '>=', 0)->orderBy('Due_Date', 'desc')->distinct()->get();
      // return $name;
      $custs = Cust::where('code', $salesqad->Sold_To)->first();
      $das = Das::where('custs_id', $custs->id)->get();
      return view ('frontend.slsmark.format2')->with('salesqad', $salesqad)->with('date', $date)->with('name', $name)
      // ->with('location', $location)
      ->with('das', $das)
      ->with('custs', $custs)
      ->with('no', $no)
      // ->with('salesqadid', $salesqadid)
      ;
    }

    public function savef2($id, Request $request)
    {
      $salesqad = Salesqad::find($id);
      $name = (Salesqad::where('Sold_To', $salesqad->Sold_To)->where('Quantity_Ordered', '>=', 0)->distinct()->get());
      $date = Salesqad::select('Due_Date', 'Sales_Order')->where('Quantity_Ordered', '>=', 0)->where('Sold_To', $salesqad->Sold_To)->orderBy('Due_Date', 'desc')->distinct('Due_Date')->get();
      // $date2 = Salesqad::select('Due_Date')->where('Quantity_Ordered', '>=', 0)->where('Sold_To', $salesqad->Sold_To)->orderBy('Due_Date', 'desc')->distinct('Due_Date')->get();
      // return $date;
      $code = $request->input('code');
      $custs = Cust::where('code', $code)->orWhere('ori', $salesqad->Name)->first();
      $das = Das::where('custs_id', $custs->id)->get();

      // $date3 = count($date);
      $stand_by = $request->input('stand_by');
      $extra = $request->input('extra');
      $extra2 = $request->input('extra2');
      $header = $request->input('header');
      $item = $request->input('item');
      $com = $request->input('com_qty');
      $remarks = $request->input('remarks');
      $date1 = $request->input('date');
      $so = $request->input('so');
      $line = $request->input('line');
      $sid = $request->input('sid');


      $i= 0;
      // return $date;
        foreach ($date as $row)
        {
          $das = new Das;
          $das->custs_id = $custs->id;
          $dte = \DateTime::createFromFormat('d/m/Y', $stand_by[$i]);
          $das->stand_by = $dte;

          $das->extra = $extra[$i];
          $das->extra2 = $extra2[$i];
          $das->header = $header[$i];
          $das->save();

          $j = 0;
          foreach ($date1 as $de)
          {
            if($de == $de && $row->Sales_Order == $so[$j])
            {
              $dachild = new Dachild;
              $dachild->salesqads_id = $sid[$j];
              $dachild->so = $so[$j];
              $dachild->das_id = $das->id;
              $dachild->line = $line[$i];
              $dachild->item_number = $item[$j];
              $dachild->com_qty = $com[$j];
              $dachild->remarks = $remarks[$j];
              $dachild->save();
            }
            $j++;
          }
          $i++;
          }

      return redirect()->route('frontend.slsmark.format2', $salesqad->id)->withFlashSuccess('The data is saved.');
    }

    public function otherformat()
    {
      $custs = Cust::all();
      $das = Das::all();
      return view ('frontend.slsmark.otherformat')

      ->with('das', $das)
      ->with('custs', $custs);
    }

    public function otherformattable()
    {
      $custs = Cust::select(['change','code', 'custs.id'])
      ;

      return Datatables::of($custs)
      ->editColumn('id', function ($custs) {
        return '<input type="checkbox" value ="'.$custs->code.'" name="code[]" >
        ';
      })

      ->escapeColumns([])
      ->make();
    }

    public function otherpdf(Request $request)
    {
      // return $request->all();
      $wa = $request->input('code');
      $c = count($wa);
      // for($i = 0; $i < $c; $i++)
      // {
        $name = Salesqad::whereIn('Sold_To', $wa)->distinct()->get();
        // $date = Salesqad::select('Due_Date')->whereIn('Sold_To', $wa)->distinct()->get();
          $custs = Cust::select('id', 'change')->whereIn('code', $wa)->get();

          foreach ($custs as $c){
            // var_dump($c->id);
            $das[] = Das::where('custs_id', $c->id)->get();

          }
          $data = [
            'name' =>$name,
            // 'date' => $date,
            'custs' =>$custs,
            'das' =>$das,
            // 'dachild' => $dachild,
          ];
          // return $data;
      $pdf = PDF::loadView('frontend.slsmark.printother', ($data));

      return $pdf->stream("printother_".date('Y_m_d_H_i').".pdf");
    }

    public function format3($id)
    {
      $salesqad = Salesqad::find($id);
      $name = (Salesqad::where('Sold_To', $salesqad->Sold_To)->distinct()->get());
      // return $name;
      // $name = Salesqad::select('Due_Date')->where('Sold_To', $salesqad->Sold_To)->distinct()->get();
      $custs = Cust::where('code', $salesqad->Sold_To)->first();
      $das = Das::where('custs_id', $custs->id)->get();
      // foreach ($das as $d)
      // {
      //   $dachilds = Dachild::where('das_id', $d->id)->get();
      // }
        // return $name;


      return view ('frontend.slsmark.format3')
      ->with('salesqad', $salesqad)
      ->with('name', $name)
      ->with('das', $das)
      // ->with('dachilds', $dachilds)
      ->with('custs', $custs);
    }



//     public function updatef2($id, Request $request)
//     {
//       // return $request->all();
//       $salesqad = Salesqad::find($id);
//       $name = (Salesqad::select('Sold_To', 'Due_Date')->where('Sold_To', $salesqad->Sold_To)->distinct()->get());
//       $date = Salesqad::select('Due_Date', 'Sales_Order')->where('Sold_To', $salesqad->Sold_To)->distinct()->get();
//       $das = Das::where('so', $date->Sales_Order)->get();
//       // return $date;
//       $code = $request->input('code');
//       $custs = Cust::where('code', $code)->first();
//
//       $date3 = count($date);
//       $stand_by = $request->input('stand_by');
//       $extra = $request->input('extra');
//       $header = $request->input('header');
//       $so = $request->input('so');
//       $i= 0;
// // return $name;
//         foreach ($date as $row)
//         {
//           foreach ($name as $n)
//           {
//             if($row->Due_Date == $n->Due_Date)
//             {
//                 $das = new Das;
//                 // $das->item_number = $item[$i];
//                 $das->so = $so[$i];
//                 $das->custs_id = $custs->id;
//                 $dte = \DateTime::createFromFormat('d/m/Y',$stand_by[$i]);
//                 $das->stand_by = $dte;
//                 $das->extra = $extra[$i];
//                 $das->header = $header[$i];
//                 $das->save();
//                 $i++;
//
//                 $item = $request->input('item');
//                 $com = $request->input('com_qty');
//                 $remark = $request->input('remark');
//                 $date = $request->input('date');
//
//                 $it = count($item);
//                 for($j = 0; $j < $it; ++$j)
//                 {
//                   if ($dte == \DateTime::createFromFormat('d/m/Y',$date[$j]))
//                     {
//                     $dachild = new Dachild;
//                     $dachild->salesqads_id = $n->Sales_Order;
//                     $dachild->das_id = $das->id;
//                     $dachild->item_number = $item[$j];
//                     $dachild->com_qty = $com[$j];
//                     $dachild->remarks = $remark[$j];
//                     $dachild->save();
//                   }
//                 }
//               }
//             }
//           }
//
//       return redirect()->route('frontend.slsmark.format3', $salesqad->id)->withFlashSuccess('The data is saved.');
//     }

    // public function etctable(Request $request)
    // {
    //   $salesqad = Salesqad::join('invqads', 'invqads.items_number', '=', 'salesqads.item_number')
    //   ->select(['salesqads.line','salesqads.item_number','salesqads.quantity_ordered', 'invqads.location', 'salesqads.id', 'salesqads.sales_order'
    //   , 'invqads.date_created', 'salesqads.due_date'])
    //   ->where('salesqads.sold_to', '=', $request->input('code'))
    //
    //   // ->where('salesqads.sales_order', )
    //   ;
    //
    //   return Datatables::of($salesqad)
    //   ->editColumn('location', function ($salesqad) {
    //     $invqads = Invqad::where('items_number', $salesqad->item_number)->first();
    //     return '
    //     <input class="form-control"  type="text" name="loc-qty" value="'.$invqads->location.'-'.$invqads->qtyonhand_detail.'" />
    //     ';
    //     // <button type="submit" class="btn btn-xs btn-success" value="SAVE"><i class="glyphicon glyphicon-pencil"></i></button>
    //   })
    //   ->editColumn('sales_order', function ($salesqad) {
    //     return '
    //     <input class="form-control"  type="text" name="remarks" value="'.$salesqad->sales_order.'-'.$salesqad->wid.'" />
    //     ';
    //     // <button type="submit" class="btn btn-xs btn-success" value="SAVE"><i class="glyphicon glyphicon-pencil"></i></button>
    //   })
    //
    //   ->escapeColumns([])
    //   ->make();
    // }

    public function da()
    {
      $item = Item::all();
      $sales = Sales::all();
      return view('frontend.slsmark.da')
      ->with('sales', $sales)
      ->with('item', $item);
    }

    public function storedateda($id, Request $request)
    {
      $del = $request->input('deliverDate');

          $sales = Sales::find($id);
          $dte  = \DateTime::createFromFormat('d/m/Y',$del);
          $sales->deliverDate = $dte ;
          $sales->save();

        return redirect()->route('frontend.slsmark.da')->withFlashSuccess('The date is  changed ');
    }

    public function datable()
    {
      $item = Item::leftJoin('sales', 'items.id', '=', 'sales.items_id')
      ->select(['sales.wid','items.partNo', 'items.partDesc','items.partDesc2', 'items.model', 'sales.custName', 'sales.deliverDate', 'items.id'])
      ->where('sales.finish', '=', 'Y')
      ;

      return Datatables::of($item)
      ->editColumn('deliverDate', function ($item) {
        $sales = Sales::where('items_id', $item->id)->first();
        return '
        <form action="'.route('frontend.slsmark.storedateda', $sales->id).'" method="POST"><input name="_token" type="hidden" value="'.csrf_token().'">
        <input class="form-control" id="'.$sales->id.'" type="text" name="deliverDate" value="'.$sales->deliverDate->format('d/m/Y').'" />
        <input type="submit" value="Submit">
        </form>
        ';
        // <button type="submit" class="btn btn-xs btn-success" value="SAVE"><i class="glyphicon glyphicon-pencil"></i></button>
      })
      ->editColumn('id', function ($item) {
        // return '<a href="'. route('frontend.slsmark.deliveryadvice', $item->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add New"></i></a>';
        $delivery = Delivery::where('items_id', $item->id)->first();
        if (!empty($delivery)){
        return '<a href="'. route('frontend.slsmark.searchda', $item->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View"></i></a>
        <a href="'. route('frontend.slsmark.deliveryadvice', $item->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add New"></i></a>';
        }
        else {
          return '<a href="'. route('frontend.slsmark.deliveryadvice', $item->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add New"></i></a>';
        }
      })

      ->escapeColumns([])
      ->make();
    }

    public function deliveryadvice($id)
    {
      $item = Item::find($id);
      $sales = Sales::where('id', $item->sales_id)->first();
      return view('frontend.slsmark.deliveryadvice')
      ->with('sales', $sales)
      ->with('item', $item);
    }

    public function dastore(Request $request, $id)
    {
      $item = Item::find($id);

      $delivery = new Delivery;
      $delivery->items_id = $item->id;
      $delivery->item_number = $request->input('item_number');
      $delivery->po = $request->input('po');
      $delivery->custCode = $request->input('custCode');
      $delivery->delDate = $request->input('delDate');
      $delivery->delQty = $request->input('delQty');

      $delivery->save();

      return redirect()->route('frontend.slsmark.da')->withFlashSuccess('The data is saved.');
    }

    public function searchda($id)
    {
      $item = Item::find($id);
      $delivery = Delivery::where('items_id', $item->id)->get();
      return  view('frontend.slsmark.searchda')->with('item', $item);
    }

    public function searchdatable(Request $request)
    {
      $delivery = Delivery::leftJoin('items', 'items.id', '=', 'deliveries.items_id')
      ->select(['items.partNo', 'items.partDesc','items.partDesc2', 'deliveries.po', 'deliveries.custCode', 'deliveries.delDate', 'deliveries.delQty', 'items.id'])
      ->where('items.id', $request->input('id'))

      ;

      return Datatables::of($delivery)
      ->editColumn('id', function ($delivery) {
        // return '<a href="'. route('frontend.slsmark.deliveryadvice', $item->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add New"></i></a>';
      })

      ->escapeColumns([])
      ->make();
    }

    public function destroy($id)
    {
        $sales = Sales::find($id);
        $workorder = Workorder::findOrFail($sales->workorders_id)->forceDelete();
        $item = Item::findOrFail($sales->items_id)->forceDelete();
        $sales = Sales::findOrFail($id)->forceDelete();
        return redirect()->route('frontend.slsmark.index')->withFlashDanger('The data is cancelled.');
    }

    public function deletewid($id)
    {
      $salesqad = Salesqad::find($id);

      // $salesqad->wid = null;
      // $salesqad->save();
      $salesqad->widremark = null;
      $salesqad->wid = null;
      $salesqad->save();
      // $salesqad1 = Salesqad::where('wid', $salesqad->wid)->where('id', $salesqad->id)->first()->forceDelete();
      return redirect()->route('frontend.slsmark.updatewid')->withFlashDanger('The data is delete.');
    }

    public function delete($id)
    {
      $product = Product::findOrFail($id)->forceDelete();
      return redirect()->route('frontend.slsmark.review')->withFlashDanger('The data is cancelled.');
    }

    public function deletestock($id)
    {
      $stockupdate = Stockupdate::findOrFail($id)->forceDelete();
      return redirect()->route('frontend.slsmark.listStock')->withFlashDanger('The data is cancelled.');
    }

    public function destroyreq($id)
    {
      $requisite = Requisite::find($id);
      $sales = Sales::where('sro_number', $requisite->sro_number)->first();
      $sales->sro_number = null;
      $sales->save();
      $requisite = Requisite::findOrFail($id)->forceDelete();
      return redirect()->route('frontend.slsmark.showsales')->withFlashDanger('The data is cancelled.');
    }

    public function deletefile ($id)
    {
      $fileUpload = FileUpload::find($id);
      $sales = Sales::where('id', $fileUpload->sales_id)->first();

      // $fileupload = FileUpload::where('sales_id', $sales->id)->first();
      $file = $fileUpload->filename;
      unlink($destinationPath = base_path() . '/public/uploaded/'.$file);

      $files = FileUpload::findOrFail($id)->forceDelete();
      return redirect()->route('frontend.slsmark.editscof', $sales->id)->withFlashDanger('The data is cancelled.');

    }

    public function deletereqfile($id)
    {
      $fileUpload = FileUpload::find($id);
      $requisite = Requisite::where('id', $fileUpload->requisites_id)->first();

      // $fileupload = FileUpload::where('sales_id', $sales->id)->first();
      $file = $fileUpload->filename;
      unlink($destinationPath = base_path() . '/public/uploaded/'.$file);

      $files = FileUpload::findOrFail($id)->forceDelete();
      return redirect()->route('frontend.slsmark.editreq', $requisite->id)->withFlashDanger('The data is cancelled.');

    }

}
