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

use Image;
use Carbon\Carbon;
use Session;
use Yajra\Datatables\Facades\Datatables;
use Maatwebsite\Excel\Facades\Excel;
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

    //dah
    public function create()
    {
        $sales =  new Sales;
        $salesqad= new Salesqad;
        return view('frontend.slsmark.create')
        ->with('sales',$sales)
        ->with('Salesqad', $salesqad);
    }

    public function createSales()
    {
        $salesqad = Salesqad::select(['sales_order', 'purchase_order','line', 'name', 'item_number', 'description', 'description_1','quantity_ordered', 'order_date','due_date','status', 'id']);
        return Datatables::of($salesqad)
            ->editColumn('id', function ($salesqad) {
            //return $sales->action_buttons;
                return '<a href="'. route('frontend.slsmark.createsco', $salesqad->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i> New </a>';

        })

        ->order(function ($salesqad) {
                        $salesqad->orderBy('sales_order', 'desc');
                    })
        ->escapeColumns([])
        ->make();
      }

      public function createsco($id)
      {
          $salesqad = Salesqad::find($id);
          return view('frontend.slsmark.createsco')
          ->with('salesqad', $salesqad);
      }

    //dah
    public function store (Request $request, $id)
    {
        $salesqad = Salesqad::find($id);
        $salesqad->status = 'SCO';
        $salesqad->save();

        $sales = new Sales;

        $latestsales = Sales::orderBy('created_at', 'desc')->first();
        if ($latestsales === null){
            $sales->sco_number = 'SCO-' . Carbon::now()->format('y') . '-00001';
        }
        else{
            $number = (int) substr($latestsales->sco_number,-5,5);
            $number ++;
            $sales->sco_number = 'SCO-' . Carbon::now()->format('y') .'-'.str_pad($number,5,'0',STR_PAD_LEFT );
        }

        $dt =  \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
        $sales->datetime = $dt;
        $sales->custName = $request->input('custName');
        $sales->purchaseOrder = $request->input('purchaseOrder');
        $sales->salesorder = $salesqad->Sales_Order;
        $sales->line = $salesqad->Line;
        $sales->salesline = $request->input('salesline');
        $dte  = \DateTime::createFromFormat('d/m/Y',$request->input('deliverDate'));
        $sales->deliverDate = $dte ;
        $sales->remark = $request->input('remark');
        $sales->lot =  $request->input('lot');
        $sales->mfgDate =  $request->input('mfgDate');
        $sales->expiryDate =  $request->input('expiryDate');
        $sales->dateFacNo =  $request->input('dateFacNo');
        $sales->packerID =  $request->input('packerID');
        $sales->status = 'Planning Dept';
        $sales->approval = $request->input('approval');
        $sales->confirmBy = $request->input('confirmBy');
        //if got any image insert
        $remark=$request->input('remark');
        $dom = new \DomDocument();
        $dom->loadHtml($remark, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
        $sales->remark = $dom->saveHTML();
        $sales->save();

        $items= new Item;

        $items->sales_id = $sales->id;
        $items->model = $request->input('model');
        $items->partDesc = $request->input('partDesc');
        $items->partNo = $request->input('partNo');
        $items->size = $request->input('size');
        $items->quantity = str_replace(",", "", $request->input('quantity'));
        $items->rawMaterial = $request->input('rawMaterial');
        $items->noPages = $request->input('noPages');
        $items->colour = $request->input('colour');
        $items->finishing = $request->input('finishing');
        $items->save();

        $sales->items_id = $items->id;
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
      // END file upload save
        return redirect()->route('frontend.slsmark.index')->withFlashSuccess('The data is saved and ready for action from planning dept.');

    }

    public function importedsales (Request $request)
    {
          DB::table('salesqads')->truncate();
          if(Input::hasFile('import_file_sales')){
            $path = Input::file('import_file_sales')->getRealPath();
            $rows = Excel::load($path, function($reader) {
                  $reader->toArray();
                  $reader->noHeading();
              })->get();

             foreach ($rows as $row) {
               $row8 = str_replace(",", "", $row[8]);
                     $item = array([
                      'Sales_Order' => $row[0],
                      'Purchase_Order' => $row[1],
                      'Sold_To' => $row[2],
                      'Name' => $row[3],
                      'Line' => $row[4],
                      'Item_Number' => $row[5],
                      'Description' => $row[6],
                      'Description_1' => $row[7],
                      'Quantity_Ordered' => $row8,
                      'Order_Date' => $row[9],
                      'Due_Date' => $row[10],
                  ]);
                  DB::table('salesqads')->insert($item );
              }
            }
            return redirect()->route('frontend.slsmark.index')->withFlashSuccess('The sales data is imported.');
    }

    //dah
    public function anyData()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
      $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
      ->select(['sales.salesline','sales.custName', 'items.partNo', 'items.partDesc' , 'sales.status','sales.repeat_from','sales.created_at', 'sales.id']);

      return Datatables::of($sales)

      ->editColumn('id', function ($sales) {
        //return $sales->action_buttons;
        $message = 'Are you sure you want to cancel '.$sales->sco_number.'?';
        return '<a href="'. route('frontend.slsmark.editscof', $sales->id) . '" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Edit </a>
        <a href="'. route('frontend.slsmark.show', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-check"></i> View </a>
        <a href="'. route('frontend.slsmark.destroy', $sales->id) . '" class="btn btn-xs btn-danger" onclick="return confirm(\'' . $message . ' \')"><i class="glyphicon glyphicon-remove"></i> Cancel </a>';
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
        ->select(['sales.salesline','sales.custName', 'items.partNo', 'items.partDesc' , 'sales.status','sales.repeat_from','sales.created_at', 'sales.id']);

        return Datatables::of($sales)

        ->editColumn('id', function ($sales) {
            //return $sales->action_buttons;
            return '
            <a href="'. route('frontend.slsmark.show', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-check"></i> View </a>
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

    //show the table for sales order to edit in product amendment form
    public function review()
    {
      $sales=Sales::all();
      $product=Product::all();

      return view('frontend.slsmark.review')->with('sales',$sales)->with('product', $product);
    }

    //show datatable
    public function product()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
          $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
          // ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
          ->select([ 'sales.sco_number','sales.salesline','sales.custName', 'items.partNo' ,'items.partDesc','sales.repeat_from', 'sales.id']);

          return Datatables::of($sales)

            ->editColumn('id', function ($sales) {
            //return $sales->action_buttons;
            return '<a href="'. route('frontend.slsmark.edit', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Create PAF </a>
            <a href="'. route('frontend.slsmark.addrepeat', $sales->id) . '" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-plus"></i> Repeat Order </a>';

          })
          ->escapeColumns([])
          ->where('sales.status', '=', "Approved")
          ->make();
        }
        else
        {
          $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
          // ->leftJoin('products', 'items.id', '=', 'products.items_id')
          ->select([ 'sales.sco_number' ,'sales.custName', 'items.partNo' ,'items.partDesc', 'sales.id']);

          return Datatables::of($sales)

            ->editColumn('id', function ($sales) {
            //return $sales->action_buttons;
            return '';

          })
          ->escapeColumns([])
          ->where('sales.status', '=', "Approved")
          ->make();
        }
    }

    public function showformTable()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
          // $product=Product::find($id);
          $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
                              ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
                              ->select(['products.paf_number', 'sales.custName','items.partNo','items.partDesc','products.rev', 'products.id' ])
                              ->where('sales.status', '=', 'Approved');

          return Datatables::of($product)
          // ->editColumn('created_at', function ($date) {
          //           return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          //       })
            ->editColumn('id', function ($product) {
            //return $sales->action_buttons;
            return '<a href="'. route('frontend.slsmark.editform', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit </a>
            <a href="'. route('frontend.slsmark.delete', $product->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancel </a>';
          })
          ->escapeColumns([])
          ->make();
        }
        elseif(access()->hasPermissions(['ctp']))
        {
          $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
                              ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
                              ->select(['products.paf_number', 'sales.custName','items.partNo','items.partDesc', 'products.id' ])
                              ->where('sales.status', '=', 'Approved');
          return Datatables::of($product)
          // ->editColumn('created_at', function ($date) {
          //           return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          //       })
            ->editColumn('id', function ($product) {
            //return $sales->action_buttons;
            return '<a href="'. route('frontend.slsmark.editform', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit </a>
            ';
          })
          ->escapeColumns([])
          ->make();
        }
        else
        {
          $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
                              ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
                              ->select(['products.paf_number', 'sales.custName','items.partNo','items.partDesc', 'products.id' ])
                              ->where('sales.status', '=', 'Approved');

          return Datatables::of($product)
          // ->editColumn('created_at', function ($date) {
          //           return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          //       })
            ->editColumn('id', function ($product) {
            //return $sales->action_buttons;
            return '';
          })
          ->escapeColumns([])
          ->make();
        }
    }

    public function showrepeatformTable()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
          // $product=Product::find($id);
          $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
                              ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
                              ->select(['products.paf_number', 'sales.custName','items.partNo','items.partDesc', 'products.id' ])
                              ->where('sales.repeat', '=', '1');

          return Datatables::of($product)
          // ->editColumn('created_at', function ($date) {
          //           return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          //       })
            ->editColumn('id', function ($product) {
            //return $sales->action_buttons;
            return '<a href="'. route('frontend.slsmark.editrepeatform', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit </a>
            <a href="'. route('frontend.slsmark.delete', $product->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancel </a>';
          })
          ->escapeColumns([])
          ->make();
        }
        elseif(access()->hasPermissions(['ctp']))
        {
          $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
                              ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
                              ->select(['products.paf_number', 'sales.custName','items.partNo','items.partDesc', 'products.id' ])
                              ->where('sales.repeat', '=', '1');

          return Datatables::of($product)
          // ->editColumn('created_at', function ($date) {
          //           return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          //       })
            ->editColumn('id', function ($product) {
            //return $sales->action_buttons;
            return '<a href="'. route('frontend.slsmark.editrepeatform', $product->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit </a>
            ';
          })
          ->escapeColumns([])
          ->make();
        }
        else
        {
          $product = Product::leftJoin('items', 'products.items_id', '=', 'items.id')
                              ->leftJoin('sales', 'items.sales_id', '=', 'sales.id')
                              ->select(['products.paf_number', 'sales.custName','items.partNo','items.partDesc', 'products.id' ])
                              ->where('sales.repeat', '=', '1');

          return Datatables::of($product)
          // ->editColumn('created_at', function ($date) {
          //           return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
          //       })
            ->editColumn('id', function ($product) {
            //return $sales->action_buttons;
            return '';
          })
          ->escapeColumns([])
          ->make();
        }
    }

    //dah
    //show the edit form for edit product amendment form
    public function edit ($id)
    {

      $sales = Sales::find($id);
      $items = Item::find($sales->items->id);
      $product = product::where('items_id', $items->id)->first();
      return view('frontend.slsmark.edit')->with('sales', $sales)->with('product', $product);

    }
    //dah
    //store the edit for product amendment form (this one later will be include in product amendment table)
    public function storeProd (Request  $request, $id)
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
      $product->approval =Input::get('approval');
      $product->remarkbig =Input::get('remarkbig');
      $product->material = Input::get('material');
      $product->data = Input::get('data');
      $product->artwork = Input::get('artwork');
      $product->diecut = Input::get('diecut');
      $product->attachment = Input::get('attachment');
      $product->revNo =Input::get('revNo');
      $product->newArtwork  =Input::get('newArtwork');
      $product->films =Input::get('films');
      $product->technicalDrawing =Input::get('technicalDrawing');
      $product->digitalProofing =Input::get('digitalProofing');
      $product->artworkDrawing =Input::get('artworkDrawing');
      $product->colorLimit =Input::get('colorLimit');
      $product->bluePrint =Input::get('bluePrint');
      $product->pmrf =Input::get('pmrf');
      $product->other =Input::get('other');
      $product->other_text =Input::get('other_text');

      $product->yes =Input::get('yes');
      $product->no =Input::get('no');

      $product->customer =Input::get('customer');
      $product->customer_text =Input::get('customer_text');
      $product->qa =Input::get('qa');
      $product->qa_text =Input::get('qa_text');
      $product->production =Input::get('production');
      $product->production_text =Input::get('production_text');
      $product->qtyOnHand =Input::get('qtyOnHand');
      $dtprod = \DateTime::createFromFormat('d/m/Y', Input::get("datetime"));
      $product->datetime =$dtprod;
      $product->productionProcess =Input::get('productionProcess');
      $product->handCutSubmission =Input::get('handCutSubmission');

      $product->yes1 =Input::get('yes1');
      $product->no1 =Input::get('no1');
      $product->wip =Input::get('wip');
      $product->fg =Input::get('fg');
      $product->rcp =Input::get('rcp');
      $product->cutoff =Input::get('cutoff');
      $product->kiv =Input::get('kiv');

      $product->workOrderID =Input::get('workOrderID');
      $product->notAvailable1 =Input::get('notAvailable1');

      $product->adviseBy =Input::get('adviseBy');
      $product->issueBy =Input::get('issueBy');
      $product->status ='product';

      $remarkbig=$request->input('remarkbig');
      $dom = new \DomDocument();
      $dom->loadHtml($remarkbig, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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

      $sales= Sales::find($id);
      $sales->lot =Input::get('lot');
      $sales->mfgDate =Input::get('mfgDate');
      $sales->expiryDate =Input::get('expiryDate');
      $sales->dateFacNo =Input::get('dateFacNo');
      $sales->packerID =Input::get('packerID');
      $sales->batchbar =Input::get('batchbar');
      $sales->lotcheck =Input::get('lotcheck');
      $sales->mfgcheck =Input::get('mfgcheck');
      $sales->expcheck =Input::get('expcheck');
      $sales->datecheck =Input::get('datecheck');
      $sales->packcheck =Input::get('packcheck');
      $sales->batchcheck =Input::get('batchcheck');

      $sales->save();

      $items = Item::find($sales->items->id);
      $items->rawMaterial =Input::get('rawMaterial');
      $items->rawcheck =Input::get('rawcheck');
      $items->save();

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

    public function editform ($id)
    {
      $product = Product::find($id);
      $items = Item::find($product->items_id);
      $sales = Sales::where('items_id', $items->id)->first();
      // show the edit form and pass the sales
        return view('frontend.slsmark.editform')->with('product', $product)->with('sales', $sales);

    }

    public function storeform (Request  $request, $id)
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

            $latestrevision = Product::orderby('created_at', 'desc')->first();
            if ($latestrevision === null){
                $product->rev = 'rev-'.'01';
            }
            else{
                $number = (int) substr($latestrevision->rev,-2,2);
                $number ++;
                $product->rev = 'rev-'. str_pad($number,2,'0',STR_PAD_LEFT );
            }

            $product->approval =Input::get('approval');
            $product->remarkbig =Input::get('remarkbig');
            $product->material = Input::get('material');
            $product->data = Input::get('data');
            $product->artwork = Input::get('artwork');
            $product->diecut = Input::get('diecut');
            $product->attachment = Input::get('attachment');

            $product->revNo =Input::get('revNo');

            $product->newArtwork  =Input::get('newArtwork');
            $product->films =Input::get('films');
            $product->technicalDrawing =Input::get('technicalDrawing');
            $product->digitalProofing =Input::get('digitalProofing');
            $product->artworkDrawing =Input::get('artworkDrawing');
            $product->colorLimit =Input::get('colorLimit');
            $product->bluePrint =Input::get('bluePrint');
            $product->pmrf =Input::get('pmrf');
            $product->other =Input::get('other');
            $product->other_text =Input::get('other_text');

            $product->yes =Input::get('yes');
            $product->no =Input::get('no');

            $product->customer =Input::get('customer');
            $product->customer_text =Input::get('customer_text');
            $product->qa =Input::get('qa');
            $product->qa_text =Input::get('qa_text');
            $product->production =Input::get('production');
            $product->production_text =Input::get('production_text');
            $product->qtyOnHand =Input::get('qtyOnHand');
            $dtprod = \DateTime::createFromFormat('d/m/Y', Input::get("datetime"));
            $product->datetime =$dtprod;
            $product->productionProcess =Input::get('productionProcess');
            $product->handCutSubmission =Input::get('handCutSubmission');

            $product->yes1 =Input::get('yes1');
            $product->no1 =Input::get('no1');
            $product->wip =Input::get('wip');
            $product->fg =Input::get('fg');
            $product->rcp =Input::get('rcp');
            $product->cutoff =Input::get('cutoff');
            $product->kiv =Input::get('kiv');

            $product->workOrderID =Input::get('workOrderID');
            $product->notAvailable1 =Input::get('notAvailable1');

            $product->adviseBy =Input::get('adviseBy');
            $product->issueBy =Input::get('issueBy');
            $product->status ='product';

            $remarkbig=$request->input('remarkbig');
            $dom = new \DomDocument();
            $dom->loadHtml($remarkbig, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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

            $sales= Sales::find($id);
            $sales->lot =Input::get('lot');
            $sales->mfgDate =Input::get('mfgDate');
            $sales->expiryDate =Input::get('expiryDate');
            $sales->dateFacNo =Input::get('dateFacNo');
            $sales->packerID =Input::get('packerID');
            $sales->batchbar =Input::get('batchbar');
            $sales->lotcheck =Input::get('lotcheck');
            $sales->mfgcheck =Input::get('mfgcheck');
            $sales->expcheck =Input::get('expcheck');
            $sales->datecheck =Input::get('datecheck');
            $sales->packcheck =Input::get('packcheck');
            $sales->batchcheck =Input::get('batchcheck');

            $sales->save();

            $items = Item::find($sales->items->id);
            $items->rawMaterial =Input::get('rawMaterial');
            $items->rawcheck =Input::get('rawcheck');
            $items->save();

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
      // $product->paf_number =$request->input('paf_number');

      $sales= Sales::find($id);
      $product = Product::where('paf_number', $request->input('paf_number'))->first();
      $product->remarkbig=Input::get('remarkbig');
      $product->notAvailable1=Input::get('notAvailable1');
      $product->dispose1=Input::get('dispose1');
      $product->ctpPlate_text=Input::get('ctpPlate_text');
      $product->notAvailable2=Input::get('notAvailable2');
      $product->dispose2=Input::get('dispose2');
      $product->film_text=Input::get('film_text');
      $product->issueBy=Input::get('issueBy');
      $product->save();

      return redirect()->route('frontend.slsmark.review')->withFlashSuccess('The data is saved.');
    }
  }

    public function show ($id)
    {   //return $request->all();

      $sales = Sales::find($id);
      return view('frontend.slsmark.show')->with('sales', $sales);
    }

    public function addrepeat ($id)
    {
      $sales = Sales::find($id);
      return view('frontend.slsmark.addrepeat')->with('sales', $sales);
    }

    //dah
    public function repeatstore (Request $request)
    {
        $sales = new Sales;
        $sales->repeat_from = $request->input('sco_number');
        $sales->salesline = $request->input('salesline');
        $sales->purchaseOrder = $request->input('purchaseOrder');

        $latestrepeat = Sales::orderBy('created_at', 'desc')->first();
        if ($latestrepeat === null){
            $sales->sco_number = 'SCO-' . Carbon::now()->format('y') . '-00001';
        }
        else{
            $number = (int) substr($latestrepeat->sco_number,-5,5);
            $number ++;
            $sales->sco_number = 'SCO-' . Carbon::now()->format('y') .'-'.str_pad($number,5,'0',STR_PAD_LEFT );
        }

        $sales->salesorder = $request->input('salesorder');
        $sales->line = $request->input('line');

        $sales->approval = $request->input('approval');
        $dtrepeat = \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
        $sales->datetime = $dtrepeat;
        $sales->custName = $request->input('custName');
        $dtdeliver = \DateTime::createFromFormat('d/m/Y', $request->input("deliverDate"));
        $sales->deliverDate = $dtdeliver;
        $sales->remark = $request->input('remark');
        $sales->lot =  $request->input('lot');
        $sales->mfgDate =  $request->input('mfgDate');
        $sales->expiryDate =  $request->input('expiryDate');
        $sales->dateFacNo =  $request->input('dateFacNo');
        $sales->packerID =  $request->input('packerID');
        $sales->status =  'Planning Dept';
        $sales->confirmBy = $request->input('confirmBy');
        $sales->repeat = 'yes';


        $remark=$request->input('remark');
        $dom = new \DomDocument();
        $dom->loadHtml($remark, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
        $sales->remark = $dom->saveHTML();
        $sales->save();

        $items= new Item;

        $items->sales_id = $sales->id;
        $items->model = $request->input('model');
        $items->partDesc = $request->input('partDesc');
        $items->partNo = $request->input('partNo');
        $items->size = $request->input('size');
        $items->quantity = $request->input('quantity');
        $items->qtyOnHand = $request->input('qtyOnHand');
        $items->rawMaterial = $request->input('rawMaterial');
        $items->noPages = $request->input('noPages');
        $items->colour = $request->input('colour');
        $items->finishing = $request->input('finishing');
        $items->save();

        $sales->items_id = $items->id;
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
        // // END file upload save

        return redirect()->route('frontend.slsmark.index')->withFlashSuccess('The Repetition Sales Confirmation Order Form is saved.');
    }

    //dah
    public function editscof($id)
    {
        $sales = Sales::find($id);
        return view('frontend.slsmark.editscof')
        ->with('sales',$sales);
    }

    //dah
    public function updatescof ($id,Request $request)
    {

        $sales = Sales::find($id);
        $sales->approval =$request->input('approval');
        $dtsales3 = \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
        $sales->datetime = $dtsales3;
        $sales->custName = $request->input('custName');
        $dtsales2 = \DateTime::createFromFormat('d/m/Y', $request->input("deliverDate"));
        $sales->deliverDate = $dtsales2;
        $sales->remark =$request->input('remark');
        $sales->lot =  $request->input('lot');
        $sales->mfgDate =  $request->input('mfgDate');
        $sales->expiryDate =  $request->input('expiryDate');
        $sales->dateFacNo =  $request->input('dateFacNo');
        $sales->packerID =  $request->input('packerID');
        $sales->confirmBy =  $request->input('confirmBy');
        //$sales->status = 'Planning Dept';

        $remark=$request->input('remark');
        $dom = new \DomDocument();
        $dom->loadHtml($remark, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
        $sales->remark = $dom->saveHTML();
        $sales->save();

        $items = Item::find($id);

        $items->model = $request->input('model');
        $items->partDesc = $request->input('partDesc');
        $items->partNo = $request->input('partNo');
        $items->size = $request->input('size');
        $items->quantity = $request->input('quantity');
        $items->rawMaterial = $request->input('rawMaterial');
        $items->noPages = $request->input('noPages');
        $items->colour = $request->input('colour');
        $items->finishing = $request->input('finishing');
        $items->save();

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


        return redirect()->route('frontend.slsmark.index')->withFlashSuccess('The data is saved and updated.');
    }
    //show the table for sales order to edit in product amendment form
    public function repeat()
    {
      $sales=Sales::all();
      return view('frontend.slsmark.repeat')->with('sales',$sales);
    }

    public function repeatTable()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->select(['sales.custName', 'items.partNo' , 'items.partDesc','sales.status', 'sales.id']);

        return Datatables::of($sales)
        ->editColumn('id', function ($sales) {
                //return $sales->action_buttons;
            return '<a href="'. route('frontend.slsmark.editrcof', $sales->id) . '" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Edit </a>
            <a href="'. route('frontend.slsmark.showrepeat', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-check"></i> View </a>
            <a href="'. route('frontend.slsmark.destroyrepeat', $sales->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancel </a>';
              })

        ->escapeColumns([])
        ->make();
      }
       elseif(access()->hasPermissions(['planning']))
      {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->select(['sales.custName', 'items.partNo' , 'items.partDesc','sales.status', 'sales.id']);

        return Datatables::of($sales)
        ->editColumn('id', function ($sales){
                //return $sales->action_buttons;
            return '<a href="'. route('frontend.slsmark.showrepeat', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-check"></i> View </a>';
              })

        ->escapeColumns([])
        ->make();
      }
      else
      {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->select(['sales.custName', 'items.partNo' , 'items.partDesc','sales.status', 'sales.id']);

        return Datatables::of($sales)
        ->editColumn('id', function ($sales){
                //return $sales->action_buttons;
            return '';
              })

        ->escapeColumns([])
        ->make();
      }
    }

    public function listStock()
    {
      $sales=Sales::all();
      return view('frontend.slsmark.updateStock')->with('sales',$sales);
    }

    //show datatable
    public function listTable()
    {
      if (access()->hasPermissions(['sales-marketing']))
      {
        $sales = Sales::leftJoin('items', 'sales.items_id', '=', 'items.id')
        ->select(['sales.salesline','sales.custName', 'items.partNo','items.partDesc', 'sales.id'])
        ->where('sales.status', '=', 'Approved');
        return Datatables::of($sales)
          ->editColumn('id', function ($sales) {
          //return $sales->action_buttons;
          return '<a href="'. route('frontend.slsmark.stock', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i>Stock</a>
          ';
          //  <a href="'. route('frontend.slsmark.viewstock', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-th-list"></i> List of Stock </a>
        })
        ->escapeColumns([])
        ->make();
      }
      else
      {
        $sales = Sales::leftJoin('items', 'sales.items_id', '=', 'items.id')
        ->select(['sales.salesline','sales.custName', 'items.partNo','items.partDesc', 'sales.id']);

        return Datatables::of($sales)
          ->editColumn('id', function ($sales)  {
          //return $sales->action_buttons;
          return '';
          //  <a href="'. route('frontend.slsmark.viewstock', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-th-list"></i> List of Stock </a>
        })
        ->escapeColumns([])
        ->make();
      }
    }

    public function stock($id)
    {
      $sales = Sales::find($id);
      $items = Item::find($sales->items_id);
      $stockupdate = Stockupdate::where('items_id', $items->id)->first();
      $stocks = Stock::where('item_number', $items->partNo)->first();
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
      ->with('stock', $stock);
    }

    public function storestock ($id, Request $request)
    {
      $this->validate($request,[
        'idNum' => 'max:10'
      ]);

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

      // $stocks = Stock::where('item_number', $sales->items->partNo)->first();
      return redirect()->route('frontend.slsmark.stock', $sales->id)->withFlashSuccess('The data is  saved.');
    }

    //show datatable
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
    //return $sales->action_buttons;
    return '<a href="'. route('frontend.slsmark.deletestock',$stockupdate->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancel </a>';

  })
  ->escapeColumns([])
  ->make();
    }

    public function wosotable(Request $request)
    {
      $stock = Stock::select(['status', 'reference','due_date', 'quantity_ordered'])
      ->where('item_number', '=', $request->input('partNo') );
      return Datatables::of($stock)
      ->escapeColumns([])
      ->make();
    }

    public function imported2 (Request $request)
  	{
      $stocks = Stock::where('status','=', 'WO')->forceDelete();
      // DB::table('stocks')->truncate();

      if(Input::hasFile('import_file')){
        $path = Input::file('import_file')->getRealPath();
        $rows = Excel::load($path, function($reader) {
              $reader->toArray();
              $reader->noHeading();
          })->get();

         foreach ($rows as $row) {
           $row4 = str_replace(",", "", $row[4]);
              DB::table('stocks')->insert(
              ['item_number'=> $row[0], 'reference' => $row[2], 'due_date'=> $row[8], 'quantity_ordered'=> $row4, 'status'=>'WO' ]);
          }
      }
          return redirect()->route('frontend.slsmark.listStock')->withFlashSuccess('The work order is saved.');
    }


    public function importso (Request $request)
  	{
      $stocks = Stock::where('status','=', 'SO')->delete();

      if(Input::hasFile('import_so')){
        $path = Input::file('import_so')->getRealPath();
        $rows = Excel::load($path, function($reader) {
              $reader->toArray();
              $reader->noHeading();
          })->get();

         foreach ($rows as $row) {
           $row4 = str_replace(",", "", $row[5]);
              DB::table('stocks')->insert(
              ['item_number'=> $row[0], 'reference' => $row[4], 'due_date'=> $row[2], 'quantity_ordered'=> '-'.$row4, 'status'=>'SO' ]);
          }
      }
        return redirect()->route('frontend.slsmark.listStock')->withFlashSuccess('The sales order is saved.');
    }

     public function editrcof($id)
     {
         $sales = Sales::find($id);
         return view('frontend.slsmark.editrcof')
         ->with('sales',$sales);
     }

     public function updatercof ($id,Request $request)
     {
         $sales = Sales::find($id);

         $dtrepeat2 = \DateTime::createFromFormat('d/m/Y', $request->input("datetime"));
         $sales->datetime = $dtrepeat2;
         $sales->custName = $request->input('custName');
         $dtdeliver2 = \DateTime::createFromFormat('d/m/Y', $request->input("deliverDate"));
         $sales->deliverDate = $dtdeliver2;
         $sales->remark = $request->input('remark');
         $sales->lot =  $request->input('lot');
         $sales->mfgDate =  $request->input('mfgDate');
         $sales->expiryDate =  $request->input('expiryDate');
         $sales->dateFacNo =  $request->input('dateFacNo');
         $sales->packerID =  $request->input('packerID');
         $sales->confirmBy =  $request->input('confirmBy');
         //$sales->status = 'Planning Dept';

         $remark=$request->input('remark');
         $dom = new \DomDocument();
         $dom->loadHtml($remark, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
         $sales->remark = $dom->saveHTML();
         $sales->save();

         $items = Item::where('id',$sales->items->id)->first();

         $items->model = $request->input('model');
         $items->partDesc = $request->input('partDesc');
         $items->partNo = $request->input('partNo');
         $items->size = $request->input('size');
         $items->quantity = $request->input('quantity');
         $items->rawMaterial = $request->input('rawMaterial');
         $items->noPages = $request->input('noPages');
         $items->colour = $request->input('colour');
         $items->finishing = $request->input('finishing');
         $items->save();

         // START file upload save
         $picture = '';

         if ($request->hasFile('images')) {
                 $files = $request->file('images');
                 $filename = $files->getClientOriginalName();
                 $extension = $files->getClientOriginalExtension();
                 $picture = $filename;
                 $destinationPath = base_path() . '/public/uploaded';

                 $files->move($destinationPath, $picture);

                 $fileUpload = new FileUpload;
                 $fileUpload->filename = $filename;
                 $fileUpload->sales_id = $sales->id;
                 $fileUpload->doc_id = $sales->sco_number;
                 $fileUpload->user_id = Auth::user()->id;
                 $fileUpload->save();
             }
         // END file upload save
         return redirect()->route('frontend.slsmark.index')->withFlashSuccess('The data is saved and updated.');
     }

     public function showrepeat ($id)
     {   //return $request->all();

       $sales = Sales::find($id);
       return view('frontend.slsmark.showrepeat')->with('sales', $sales);

     }

     public function showsales()
     {
         $sales =  Sales::all();
         $requisite = Requisite::all();
         return view('frontend.slsmark.showsales')
         ->with('sales',$sales)
         ->with('requisite',$requisite);
     }

     public function tablesample()
     {
         $sales = Sales::leftJoin('items', 'sales.items_id', '=', 'items.id')
         ->select(['sales.salesline','sales.custName', 'items.partNo', 'items.partDesc', 'sales.id']);

         return Datatables::of($sales)
         ->editColumn('id', function ($sales) {
           //return $sales->action_buttons;
           return '<a href="'. route('frontend.slsmark.samplerequisite', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i> New </a>';
         })

         ->escapeColumns([])
         ->make();
       }

       public function requisition()
       {
           $requisite = Requisite::select(['customerName', 'partNumberSRO', 'partDescSRO','revSRO', 'id']);

           return Datatables::of($requisite)
           ->escapeColumns([])
           ->editColumn('id', function ($requisite) {
             //return $sales->action_buttons;
             return '<a href="'. route('frontend.slsmark.editreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit </a>
             <a href="'. route('frontend.slsmark.viewreq', $requisite->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search"></i> View </a>
             <a href="'. route('frontend.slsmark.destroyreq', $requisite->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-search"></i> Cancel </a>
             ';
           })
           ->order(function ($requisite) {
                           $requisite->orderBy('created_at', 'desc');
                       })
           ->make();
         }


    public function editreq($id)
    {
      //  $sales = Sales::find($id);
       $requisite = Requisite::find($id);
       $process = Process::where('requisites_id', $requisite->id)->get();
       return view('frontend.slsmark.editreq')
       ->with('requisite', $requisite)
       ->with('process', $process);
    }

    public function viewreq($id)
    {
      //  $sales = Sales::find($id);
       $requisite = Requisite::find($id);
       $process = Process::where('requisites_id', $requisite->id)->get();
       return view('frontend.slsmark.viewreq')
       ->with('requisite', $requisite)
       ->with('process', $process);
    }

     //dah
     public function storeeditreq ($id, Request $request)
     {   //return $request->all();
         // $requisite = Requisite::find($id);
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

         $latestrevision = Requisite::orderby('created_at', 'desc')->first();
         if ($latestrevision === null){
             $requisite->revSRO = 'rev-'.'01';
         }
         else{
             $number = (int) substr($latestrevision->revSRO,-2,2);
             $number ++;
             $requisite->revSRO = 'rev-'. str_pad($number,2,'0',STR_PAD_LEFT );
         }

         // $requisite->revSRO = 'REVISION';
         $dtsro = \DateTime::createFromFormat('d/m/Y', $request->input("dateSRO"));
         $requisite->dateSRO = $dtsro;
         $requisite->release = $request->input('release');
         $requisite->customerName = $request->input('customerName');
         $requisite->modelSRO = $request->input('modelSRO');
         $requisite->partDescSRO = $request->input('partDescSRO');
         $requisite->partNumberSRO =  $request->input('partNumberSRO');
         $requisite->quantitySRO =  $request->input('quantitySRO');
         $requisite->sizeSRO =  $request->input('sizeSRO');
         $requisite->materialSRO =  $request->input('materialSRO');
        //  $requisite->other_sub =  $request->input('other_sub');
        //  $requisite->other_data =  $request->input('other_data');
         $requisite->remarksSRO = $request->input('remarksSRO');
         $dtreq = \DateTime::createFromFormat('d/m/Y', $request->input('requiredDate'));
         $requisite->requiredDate = $dtreq;
         $requisite->requestedBy = $request->input('requestedBy');
         $requisite->preparedBy = $request->input('preparedBy');

          //if got any image insert
          $remarksSRO=$request->input('remarksSRO');
          $dom = new \DomDocument();
          $dom->loadHtml($remarksSRO, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
         for($i = 0; $i < $counting; ++$i)
         {
           $process = new Process;
           $process->requisites_id  =   $requisite->id;
           $process->other_sub      =   $other_subnew[$i];
           $process->other_data     =   $other_datanew[$i];
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

     public function samplerequisite($id)
     {
        $sales = Sales::find($id);
        return view('frontend.slsmark.samplerequisite')
        ->with('sales', $sales);
     }

      //dah
      public function storereq (Request $request)
      {   //return $request->all();

          $this->validate($request,[

            ]);

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

          $dtsro = \DateTime::createFromFormat('d/m/Y', $request->input("dateSRO"));
          $requisite->dateSRO = $dtsro;
          $requisite->release = $request->input('release');
          $requisite->customerName = $request->input('customerName');
          $requisite->modelSRO = $request->input('modelSRO');
          $requisite->partDescSRO = $request->input('partDescSRO');
          $requisite->partNumberSRO =  $request->input('partNumberSRO');
          $requisite->quantitySRO =  $request->input('quantitySRO');
          $requisite->sizeSRO =  $request->input('sizeSRO');
          $requisite->materialSRO =  $request->input('materialSRO');
          // $requisite->other_sub =  $request->input('other_sub');
          // $requisite->other_data =  $request->input('other_data');
          $requisite->remarksSRO = $request->input('remarksSRO');
          $dtreq = \DateTime::createFromFormat('d/m/Y', $request->input('requiredDate'));
          $requisite->requiredDate = $dtreq;
          $requisite->requestedBy = $request->input('requestedBy');
          $requisite->preparedBy = $request->input('preparedBy');

            //if got any image insert
            $remarksSRO=$request->input('remarksSRO');
            $dom = new \DomDocument();
            $dom->loadHtml($remarksSRO, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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

            // $process = new Process;
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

    public function destroy($id)
    {
        $sales = Sales::find($id);
        $salesqad = Salesqad::where('Sales_Order',$sales->salesorder)->where('Line', $sales->line)->first();
        $salesqad->status = '' ;
        $salesqad->save();


        $sales = Sales::findOrFail($id)->forceDelete();
        // redirect
        return redirect()->route('frontend.slsmark.index')->withFlashSuccess('The data is cancelled.');
    }

    public function delete($id)
    {
      $product = Product::findOrFail($id)->forceDelete();
      // redirect
      return redirect()->route('frontend.slsmark.review')->withFlashSuccess('The data is cancelled.');
    }

    public function destroyrepeat($id)
    {
      $sales = Sales::findOrFail($id)->forceDelete();
      // redirect
      return redirect()->route('frontend.slsmark.index')->withFlashSuccess('The data is cancelled.');
    }

    public function deletestock($id)
    {
      $stockupdate = Stockupdate::findOrFail($id)->forceDelete();
      // redirect
      return redirect()->route('frontend.slsmark.listStock')->withFlashSuccess('The data is cancelled.');
    }
    public function destroyreq($id)
    {
      $requisite = Requisite::findOrFail($id)->forceDelete();
      // redirect
      return redirect()->route('frontend.slsmark.showsales')->withFlashSuccess('The data is cancelled.');
    }


}
