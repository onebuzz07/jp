<?php

namespace App\Http\Controllers\Frontend;
// ini_set('max_execution_time', 300);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\Frontend\Config;
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
use App\Models\Access\User\User;
use App\Models\Access\Invqad;
use App\Models\Access\Salesorderqad;
use App\Models\Access\Prodstruct;
use App\Models\Access\Comment;
use App\Models\Access\Prodqads;
use App\Models\Access\Purchase;
use App\Models\Access\Transaction;

use Image;
use Carbon\Carbon;
use Session;
use Yajra\Datatables\Facades\Datatables;
use Maatwebsite\Excel\Facades\Excel;


class ImportedController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function imported()
     {
         return view('frontend.imported');
     }

     public function importedsales (Request $request)
     {
       if(Input::hasFile('import_file_sales')){
             $path = Input::file('import_file_sales')->getRealPath();

             $rows = Excel::load($path, function($reader) {
                   $reader->toArray();
                   $reader->noHeading();
               })->get();

               foreach ($rows as $r){
                 $addstocks = Addstock::where('items_number', $r[5])
                 ->where('so_number', $r[0])
                 ->first();

                 if($addstocks)
                 {
                   $row8 = str_replace(",", "", $r[10]);
                     $item = ([
                       'items_number' => $r[5],
                       'so_number' =>$r[0],
                      'soqty' => $row8

                   ]);
                   DB::table('addstocks')->where('so_number', $addstocks->so_number)->where('items_number', $addstocks->items_number)->update($item );
                 }
                 else
                 {
                   $row8 = str_replace(",", "", $r[10]);
                   $item = ([
                     'items_number' => $r[5],
                     'so_number' =>$r[0],
                     'soqty' => $row8

                ]);
                DB::table('addstocks')->insert($item );
                 }

               }

               foreach ($rows as $re){
                 $stock = Stock::where('item_number', $re[5])
                 ->where('soline', $re[0].'-'.$re[4])
                 ->distinct()
                 ->first();

                 if($stock)
                 {
                     $item = ([
                       'item_number' => $re[5],
                       'salesorder' => $re[0],
                       'line' => $re[4],
                       'soline' => $re[0].'-'.$re[4]

                   ]);
                   DB::table('stocks')->where('item_number', $stock->item_number)->where('soline', $stock->soline )->update($item );
                 }
                 else
                 {
                   $item = ([
                     'item_number' => $re[5],
                     'salesorder' => $re[0],
                     'line' => $re[4],
                     'soline' => $re[0].'-'.$re[4]

                ]);
                DB::table('stocks')->insert($item );
                 }

               }

              foreach ($rows as $row) {
                $salesqad = Salesqad::where('Item_Number', $row[5])->where('salesline', $row[0].'-'.$row[4])

                 ->first();

                 if ($salesqad)
                 {
                   // $row8 = str_replace(",", "", $row[10]);
                   // $row1 = str_replace(",", "", $row[11]);
                   // $row2 = str_replace(",", "", $row[13]);
                   // $date = \DateTime::createFromFormat('d/m/Y',$row[12]);
                   // $date2 = \DateTime::createFromFormat('d/m/Y',$row[22]);
                   //       $item = ([
                   //        'Sales_Order' => $row[0],
                   //        'Sold_To' => $row[1],
                   //        'Name' => $row[2],
                   //        'status' => $row[3],
                   //        'salesline' => $row[0].'-'.$row[4],
                   //        'Line' => $row[4],
                   //        'Item_Number' => $row[5],
                   //        'Customer_Item' => $row[6],
                   //        'Description' => $row[7],
                   //        'Description_1' => $row[8],
                   //        'Unit_Measure' => $row[9],
                   //        'Quantity_Ordered' => $row8,
                   //        'Quantity_Open' => $row1,
                   //        'Due_Date' => $date,
                   //        'Quantity_Shipped' => $row2,
                   //        'Quote' => $row[14],
                   //        'Ship_Type' => $row[15],
                   //        'Purchase_order' => $row[16],
                   //        'Ship_To' => $row[17],
                   //        'Site' => $row[18],
                   //        'Expires' => $row[19],
                   //        'Price' => $row[20],
                   //        'Channel' => $row[21],
                   //        'Order_Date' => $date2,
                   //        'lotserial' => $row[23],
                   //        'status_item' => 'R',
                   //        'record_status' => 'New'
                   //    ]);
                   //    DB::table('salesqads')->where('Item_Number', $salesqad->Item_Number)->where('salesline', $salesqad->salesline)->update($item );
                 }
                 else
                 {
                   $row8 = str_replace(",", "", $row[10]);
                   $row1 = str_replace(",", "", $row[11]);
                   $row2 = str_replace(",", "", $row[13]);
                   $date = \DateTime::createFromFormat('d/m/Y',$row[12]);
                   $date2 = \DateTime::createFromFormat('d/m/Y',$row[22]);
                         $item = ([
                          'Sales_Order' => $row[0],
                          'Sold_To' => $row[1],
                          'Name' => $row[2],
                          'status' => $row[3],
                          'salesline' => $row[0].'-'.$row[4],
                          'Line' => $row[4],
                          'Item_Number' => $row[5],
                          'Customer_Item' => $row[6],
                          'Description' => $row[7],
                          'Description_1' => $row[8],
                          'Unit_Measure' => $row[9],
                          'Quantity_Ordered' => $row8,
                          'Quantity_Open' => $row1,
                          'Due_Date' => $date,
                          'Quantity_Shipped' => $row2,
                          'Quote' => $row[14],
                          'Ship_Type' => $row[15],
                          'Purchase_order' => $row[16],
                          'Ship_To' => $row[17],
                          'Site' => $row[18],
                          'Expires' => $row[19],
                          'Price' => $row[20],
                          'Channel' => $row[21],
                          'Order_Date' => $date2,
                          'lotserial' => $row[23],
                          'status_item' => 'R',
                          'record_status' => 'New'
                      ]);
                      DB::table('salesqads')->insert($item );

               }

             }

           }
         return redirect()->route('frontend.imported')->withFlashSuccess('The sales data is imported.');
     }

     public function imported2 (Request $request)
   	{
       // $stocks = Stock::where('status','=', 'WO')->forceDelete();
       if(Input::hasFile('import_file')){
             $path = Input::file('import_file')->getRealPath();
             $rows = Excel::load($path, function($reader) {
                   $reader->toArray();
                   $reader->noHeading();
               })->get();

              foreach ($rows as $row) {
                $addstocks = Addstock::where('items_number', $row[0])
                 // ->where('wid', $row[3])
                 ->where('so_number', $row[9])
                 ->first();

               if ($addstocks)
               {
                 $row8 = str_replace(",", "", $row[5]);
                 $row1 = str_replace(",", "", $row[4]);
                 $date = \DateTime::createFromFormat('d/m/Y',$row[7]);
                       $item = ([
                        'items_number' => $row[0],
                        'wo_number' => $row[2],
                        'wid' => $row[3],
                        'stockqty' => $row1,
                        'woqty' => $row8,
                        'due_date' => $date,
                        'so_number' => $row[9]
                        // 'manual_qty' => '0',
                        // 'keep_qty' => '0'
                    ]);
                    DB::table('addstocks')->where('items_number', $addstocks->items_number)
                    ->where('so_number', $addstocks->so_number)
                    ->update($item );
               }
               else
               {
                 $row8 = str_replace(",", "", $row[5]);
                 $row1 = str_replace(",", "", $row[4]);
                 $date = \DateTime::createFromFormat('d/m/Y',$row[7]);
                       $item = array([
                        'items_number' => $row[0],
                        'wo_number' => $row[2],
                        'wid' => $row[3],
                        'stockqty' => $row1,
                        'woqty' => $row8,
                        'due_date' => $date,
                        'so_number' => $row[9]
                        // 'manual_qty' => '0',
                        // 'keep_qty' => '0'
                    ]);
                    DB::table('addstocks')->insert($item );

             }
           }

           foreach ($rows as $ro) {
             $stock = Stock::where('item_number', $ro[0])
              // ->where('wid', $ro[3])
              ->where('salesorder', $ro[9])
              ->first();

            if ($stock)
            {
              $row8 = str_replace(",", "", $ro[5]);
              $row1 = str_replace(",", "", $ro[4]);
              $date = \DateTime::createFromFormat('d/m/Y',$ro[7]);
                    $item = ([
                     // 'item_number' => $row[0],
                     'wid' => $ro[3],
                     'woqty' => $row8,
                     'due_date' => $date

                 ]);
                 DB::table('stocks')->where('item_number', $stock->item_number)
                 ->where('salesorder', $stock->salesorder)
                 // ->where('wid', $stock->wid)
                 ->update($item );
            }
            else
            {
              $row8 = str_replace(",", "", $ro[5]);
              $row1 = str_replace(",", "", $ro[4]);
              $date = \DateTime::createFromFormat('d/m/Y',$ro[7]);
                    $item = ([
                     'item_number' => $ro[0],
                     'wid' => $ro[3],
                     'woqty' => $row8,
                     'due_date' => $date

                 ]);
                 DB::table('stocks')
                 // ->where('item_number', $stock->item_number)
                 // ->where('salesorder', $stock->salesorder)
                 // ->where('wid', $stock->wid)
                 ->insert($item );

            }
        }

               foreach ($rows as $row1) {
                 $prodqads = Prodqads::where('item_number', $row1[0])
                  ->where('wid', $row1[3])
                  ->first();

                if ($prodqads)
                {
                  $item = ([
                    'item_number' => $row1[0],
                   'salesjob' => $row1[9],
                   'remarks' => $row1[12]
                     ]);
                     DB::table('prodqads')->where('item_number', $prodqads->item_number)->where('wid', $prodqads->wid)->update($item );
                }
                else
                {

              }
            }
         }
           return redirect()->route('frontend.imported')->withFlashSuccess('The work order is saved.');
     }

     // delivery use workorder detail data

     public function importps()
     {
       if(Input::hasFile('import_ps')){
             $path = Input::file('import_ps')->getRealPath();
             $rows = Excel::load($path, function($reader) {
                   $reader->toArray();
                   $reader->noHeading();
               })->get();

              foreach ($rows as $row) {
                $prodstruct = Prodstruct::where('items_number', $row[0])
                 ->where('component', $row[1])
                 ->first();

               if ($prodstruct)
               {
                 $item = ([
                  'items_number' => $row[0],
                  'component' => $row[1],
                  'group' => $row[2],
                  'sort_name' => $row[3]
                  ]);
                  DB::table('prodstructs')->where('items_number', $prodstruct->items_number)->where('component', '=', $prodstruct->component)->update($item );
               }
               else
               {
                 // $row8 = str_replace(",", "", $row[6]);
                 // $date = \DateTime::createFromFormat('d/m/Y',$row[7]);
                       $item = array([
                         'items_number' => $row[0],
                         'component' => $row[1],
                         'group' => $row[2],
                         'sort_name' => $row[3]
                        // 'status' => 'WO'
                    ]);
                    DB::table('prodstructs')->insert($item );
               }
             }
           }
         return redirect()->route('frontend.imported')->withFlashSuccess('The product structure is saved.');

     }

     public function importedprod (Request $request)
     {
         if(Input::hasFile('import_file_production')){
           $path = Input::file('import_file_production')->getRealPath();
           $rows = Excel::load($path, function($reader) {
                 $reader->toArray();
                 $reader->noHeading();
             })->get();

             foreach ($rows as $row) {
               $prodqads = Prodqads::where('item_number', $row[1])
                ->where('wid', $row[2])
                ->where('wo_name', $row[6])
                ->first();

              if ($prodqads)
              {
                $item = ([
                 'wo_number' => $row[0],
                 'item_number' => $row[1],
                 'wid' => $row[2],
                 'operation' => $row[4],
                 'desc' => $row[5],
                 'wo_name' => $row[6],
                 'machine' => $row[7]
                 ]);
                 DB::table('prodqads')->where('item_number', $prodqads->item_number)
                 ->where('wo_name', $prodqads->wo_name)
                 ->where('wid', '=', $prodqads->wid)->update($item );
              }
              else
              {
                // $row8 = str_replace(",", "", $row[6]);
                // $date = \DateTime::createFromFormat('d/m/Y',$row[7]);
                      $item = array([
                        'wo_number' => $row[0],
                        'item_number' => $row[1],
                        'wid' => $row[2],
                        'operation' => $row[4],
                        'desc' => $row[5],
                        'wo_name' => $row[6],
                        'machine' => $row[7]
                   ]);
                   DB::table('prodqads')->insert($item );
              }
         }
       }
         return redirect()->route('frontend.imported')->withFlashSuccess('The Routing file is saved.');
     }

     public function importth (Request $request)
     {
         if(Input::hasFile('import_th')){
           $path = Input::file('import_th')->getRealPath();
           $rows = Excel::load($path, function($reader) {
                 $reader->toArray();
                 $reader->noHeading();
             })->get();

             foreach ($rows as $ro) {

               $transaction = Transaction::where('items_number', $ro[0])
               ->where('transaction_number' ,$ro[6])
               // ->where('date', $ro[4])

               // ->where('transaction_type' , '=', 'CYC-RCNT')
               // ->orWhere('transaction_type' , '=', 'CYC-CNT')
               // ->orWhere('transaction_type' , '=', 'CYC-ERR')
               // ->orWhere('transaction_type' , '=', 'TAG-CNT')
                ->first();

                if ($transaction)
                {
                  $row8 = str_replace(",", "", $ro[4]);
                  $date = \DateTime::createFromFormat('d/m/Y',$ro[2]);
                        $item = ([
                         'items_number' => $ro[0],
                         'date' =>$date,
                         'transaction_type' => $ro[3],
                         'loc_qty_change' =>$row8,
                         'transaction_number' =>$ro[6],
                         'order' => $ro[7],
                         'trans_id' =>$ro[8]

                     ]);
                     DB::table('transactions')->where('items_number', $transaction->items_number)->where('transaction_number', $transaction->transaction_number)->update($item );
                }
                else
                {
                  $row8 = str_replace(",", "", $ro[4]);
                  $date = \DateTime::createFromFormat('d/m/Y',$ro[2]);
                        $item = ([
                         'items_number' => $ro[0],
                         'date' =>$date,
                         'transaction_type' => $ro[3],
                         'loc_qty_change' =>$row8,
                         'transaction_number' =>$ro[6],
                         'order' => $ro[7],
                         'trans_id' =>$ro[8]

                     ]);
                     DB::table('transactions')->insert($item );
                }
            }

            //  foreach ($rows as $row) {
            //
            //    $addstocks = Addstock::where('items_number', $row[0])
            //     ->first();
            //
            //     if ($addstocks)
            //     {
            //             $item = ([
            //              // 'items_number' => $row[0],
            //              'adj' => $row[4],
            //              'transaction_type' => $row[3]
            //          ]);
            //          DB::table('addstocks')->where('items_number', $addstocks->items_number)->orWhere('transaction_type', 'TAG-CNT')
            //          ->orWhere('transaction_type', 'CYC-RCNT ')->orWhere('transaction_type', 'CYC-ERR')
            //          ->orWhere('transaction_type', 'CYC-CNT')->update($item );
            //     }
            //     else
            //     {
            //       // $row8 = str_replace(",", "", $row[2]);
            //       // $date = \DateTime::createFromFormat('d/m/Y',$row[2]);
            //             $item = array([
            //               'items_number' => $row[0],
            //               'adj' => $row[4],
            //               'transaction_type' => $row[3]
            //          ]);
            //          DB::table('addstocks')->insert($item );
            //   }
            // }
         }
         return redirect()->route('frontend.imported')->withFlashSuccess('The tr is saved.');
     }

     public function importinv (Request $request)
     {
         if(Input::hasFile('import_inv')){
           $path = Input::file('import_inv')->getRealPath();
           $rows = Excel::load($path, function($reader) {
                 $reader->toArray();
                 $reader->noHeading();
             })->get();

            // return $rows;
             foreach ($rows as $row) {

               $invqad = Invqad::where('items_number', $row[0])
               ->where('location', $row[4])
               // ->orWhere('transaction_type' , '=', 'CYC-CNT')
               // ->orWhere('transaction_type' , '=', 'CYC-ERR')
               // ->orWhere('transaction_type' , '=', 'TAG-CNT')
                ->first();

                if ($invqad)
                {
                  $row8 = str_replace(",", "", $row[2]);
                  $row9 = str_replace(",", "", $row[3]);
                  // $date = \DateTime::createFromFormat('d/m/Y',$row[2]);
                        $item = ([
                          'items_number' => $row[0],
                          'qtyonhand_master' => $row8,
                          'qtyonhand_detail' => $row9,
                          'location' => $row[4],
                          'lotserial' => $row[5],
                          'ref' => $row[6],
                          'status' => $row[7],
                          'date_created' => $row[8]
                     ]);
                     DB::table('invqads')->where('items_number', $invqad->items_number)->where('location', $invqad->location)->update($item );
                }
                else
                {
                  $row8 = str_replace(",", "", $row[2]);
                  $row9 = str_replace(",", "", $row[3]);
                  // $date = \DateTime::createFromFormat('d/m/Y',$row[2]);
                        $item = array([
                          'items_number' => $row[0],
                          'qtyonhand_master' => $row8,
                          'qtyonhand_detail' => $row9,
                          'location' => $row[4],
                          'lotserial' => $row[5],
                          'ref' => $row[6],
                          'status' => $row[7],
                          'date_created' => $row[8]
                     ]);
                     DB::table('invqads')->insert($item );
              }
            }
         }
         return redirect()->route('frontend.imported')->withFlashSuccess('The Inventory File is saved.');
     }

     public function importbosch (Request $request)
     {
         if(Input::hasFile('import_bosch')){
           $path = Input::file('import_bosch')->getRealPath();

           \Config::set('excel.csv.delimiter', ';');
           $rows = Excel::load($path, function($reader) {
                 $reader->toArray();
                 $reader->noHeading();

             })->get();
		//return $rows;

            // return $rows;
             foreach ($rows as $row) {
                        $today = Carbon::today();
                        $item = array([
                          'cust_po' => $row[0],
                          'part_no' => $row[1],
                          'qty' => $row[2],
                          'date_upload' =>$today
                     ]);
                     DB::table('bosches')->insert($item );

            }
         }
         return redirect()->route('frontend.slsmark.daselect')->withFlashSuccess('The File is saved.');
     }

     public function importmanual (Request $request)
     {
         if(Input::hasFile('import_manual')){
           $path = Input::file('import_manual')->getRealPath();

           $rows = Excel::load($path, function($reader) {
                 $reader->toArray();
                 $reader->noHeading();

             })->get();

            // return $rows;
             foreach ($rows as $row) {
               $date = \DateTime::createFromFormat('d/m/Y',$row[6]);
                        $item = array([

                          // 'manual_id' => $row[0],
                          'part_no' => $row[1],
                          'child_part' => $row[2],
                          'soqty' => $row[3],
                          'keepqty' => $row[4],
                          'manualstock' => $row[5],
                          'duedate' => $date,
                          'custpo' => $row[7],
                          'sono' => $row[8],
                          'paper' => $row[9],
                          'status' => 'plan'
                     ]);
                     DB::table('manuals')->insert($item );

            }
         }
         return redirect()->route('frontend.slsmark.histmanualso')->withFlashSuccess('The File is saved.');
     }

     public function importcomment()
     {
        // $stocks = Stock::where('status','=', 'WO')->forceDelete();
        if(Input::hasFile('import_comm')){
              $path = Input::file('import_comm')->getRealPath();
              $rows = Excel::load($path, function($reader) {
                    $reader->toArray();
                    $reader->noHeading();
                })->get();

               foreach ($rows as $row) {
                 $comments = Comment::where('item_number', $row[0])
                 ->where('type', $row[2])
                 ->where('page', $row[1])
                  ->first();

                if ($comments)
                {
                        $item = ([
                         'item_number' => $row[0],
                         'page' => $row[1],
                         'type' => $row[2],
                         'language' => $row[3],
                         'comment_1' => $row[4],
                         'comment_2' => $row[5],
                         'comment_3' => $row[6],
                         'comment_4' => $row[7],
                         'comment_5' => $row[8],
                         'comment_6' => $row[9],
                         'comment_7' => $row[10],
                         'comment_8' => $row[11],
                         'comment_9' => $row[12],
                         'comment_10' => $row[13],
                         'comment_11' => $row[14],
                         'comment_12' => $row[15],
                         'comment_13' => $row[16],
                         'comment_14' => $row[17],
                         'comment_15' => $row[18]
                     ]);
                     DB::table('comments')->where('item_number', $comments->item_number)->where('page', $comments->page)->where('type', $comments->type)->update($item );
                }
                else
                {
                  $item = array([
                   'item_number' => $row[0],
                   'page' => $row[1],
                   'type' => $row[2],
                   'language' => $row[3],
                   'comment_1' => $row[4],
                   'comment_2' => $row[5],
                   'comment_3' => $row[6],
                   'comment_4' => $row[7],
                   'comment_5' => $row[8],
                   'comment_6' => $row[9],
                   'comment_7' => $row[10],
                   'comment_8' => $row[11],
                   'comment_9' => $row[12],
                   'comment_10' => $row[13],
                   'comment_11' => $row[14],
                   'comment_12' => $row[15],
                   'comment_13' => $row[16],
                   'comment_14' => $row[17],
                   'comment_15' => $row[18]
               ]);
                     DB::table('comments')->insert($item );

              }
            }
          }
            return redirect()->route('frontend.imported')->withFlashSuccess('The comments is saved.');
      }

      public function importedpo(Request $request)
      {
          if(Input::hasFile('import_po')){
            $path = Input::file('import_po')->getRealPath();
            $rows = Excel::load($path, function($reader) {
                  $reader->toArray();
                  $reader->noHeading();
              })->get();

              foreach ($rows as $row) {
                $purchase = Purchase::where('item_number', $row[1])
                 ->first();

               if ($purchase)
               {
                 $row8 = str_replace(",", "", $row[6]);
                 $row9 = str_replace(",", "", $row[16]);
                 $date1 = \DateTime::createFromFormat('d/m/Y',$row[8]);
                 $date2 = \DateTime::createFromFormat('d/m/Y',$row[9]);
                 $date3 = \DateTime::createFromFormat('d/m/Y',$row[15]);
                 $item = ([
                  'po' => $row[0],
                  'poline' => $row[1],
                  'site' => $row[2],
                  'supplier' => $row[3],
                  'name' => $row[4],
                  'item_number' => $row[5],
                  'quantity_open' => $row8,
                  'unit_of_measure' => $row[7],
                  'due_date' => $date1,
                  'order_date' => $date2,
                  'buyer' => $row[10],
                  'salesjob' => $row[11],
                  'wid' => $row[12],
                  'status' => $row[13],
                  'receiver' => $row[14],
                  'receipt_date' => $date3,
                  'receipt_quantity' => $row9
                  ]);
                  DB::table('purchases')->where('item_number', $purchase->item_number)
                  ->where('status','!=', $purchase->status)
                  ->update($item );
               }
               else
               {
                 $row8 = str_replace(",", "", $row[6]);
                 $row9 = str_replace(",", "", $row[16]);
                 $date1 = \DateTime::createFromFormat('d/m/Y',$row[8]);
                 $date2 = \DateTime::createFromFormat('d/m/Y',$row[9]);
                 $date3 = \DateTime::createFromFormat('d/m/Y',$row[15]);
                 $item = ([
                  'po' => $row[0],
                  'poline' => $row[1],
                  'site' => $row[2],
                  'supplier' => $row[3],
                  'name' => $row[4],
                  'item_number' => $row[5],
                  'quantity_open' => $row8,
                  'unit_of_measure' => $row[7],
                  'due_date' => $date1,
                  'order_date' => $date2,
                  'buyer' => $row[10],
                  'salesjob' => $row[11],
                  'wid' => $row[12],
                  'status' => $row[13],
                  'receiver' => $row[14],
                  'receipt_date' => $date3,
                  'receipt_quantity' => $row9
                  ]);
                DB::table('purchases')->insert($item );
               }
          }
        }
          return redirect()->route('frontend.imported')->withFlashSuccess('The purchase order is saved.');
      }


}
