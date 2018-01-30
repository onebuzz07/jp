<?php

namespace App\Http\Controllers\Frontend\ctp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Access\plan;
use App\Models\Access\sales;
use App\Models\Access\ctp;
use App\Models\Access\Repeat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Validation\Rule;
use DB;
use Auth;
class CtpController extends Controller
{
  protected $users;
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
  public function index()
  {
    /* $mold_infos = DB::table('ctp_mold_info')
    ->select(["mold_id","mold_type","mold_type_vendor","mold_size","cust_no","part_no","mac_no","qty","location","qty_life","print_req","film_desc","qty_film"]); */
    $mold_infos = DB::select("SELECT DISTINCT cust_no, part_no, mac_no FROM ctp_mold_info");
    $select_cust_nos = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info");
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info");
    $select_plate_ids = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info");
    $select_statuss = DB::select("SELECT DISTINCT status FROM ctp_mold_info");
    $select_users = DB::select("SELECT DISTINCT email FROM users");
    //$sales=Sales::where('status','CTP Dept')->get();

    
    return view('frontend.ctp.index')->with('mold_infos',$mold_infos)
                                     ->with('select_cust_nos',$select_cust_nos)
                                     ->with('select_part_nos',$select_part_nos)
                                     ->with('select_plate_ids',$select_plate_ids)
                                     ->with('select_statuss',$select_statuss)
                                     ->with('select_users',$select_users);
    //return view('frontend.ctp.index',['mold_infos'=>$mold_infos]);
  }
  

public function insert(Request $request) {
    //DB::insert("INSERT INTO ctp_mold_info (cust_no, part_no, mac_no) values ('c1','p1','m1')");
    //return json(['error' => 'Error msg', 'status' => 'error']);
    // $validator = \Validator::make($request->all(), ['cust_no' => 'unique:ctp_mold_info,cust_no,part_no,mac_no']);
    
    
    $cust_no = $request->cust_no;
    $part_no = $request->part_no;
    $mac_no = $request->mac_no;
    $plate_type = $request->plate_type;
    $plate_size = $request->plate_size;
    $type_vendor = $request->type_vendor;
    $location = $request->location;
    $print_req = $request->print_req;
    $qty = $request->qty;
    $qty_life = $request->qty_life;
    $film_desc = $request->film_desc;
    $qty_film = $request->qty_film;
    $remark = $request->remark;
    $user = $request->user()->email;
    

    $valReq = \Validator::make($request->all(), ['cust_no' => 'required:ctp_mold_info','part_no' => 'required:ctp_mold_info','mac_no' => 'required:ctp_mold_info']);

    $valUnique = \Validator::make($request->all(), [
        'cust_no' => 
            Rule::unique('ctp_mold_info')->where(function ($query) use ($part_no,$mac_no){
                $query->where('part_no', $part_no)->where('mac_no', $mac_no);
            })
    ]);
    
    $valQty = \Validator::make($request->all(), ['qty' => 'required|between:0,9999999999.99999999']);
    $valQtyLife = \Validator::make($request->all(), ['qty_life' => 'required|between:0,9999999999.99999999']);
    $valQtyFilm = \Validator::make($request->all(), ['qty_film' => 'required|between:0,9999999999.99999999']);

    if ($valQty->fails()) {
        //return response()->json(['error' => $user, 'status' => 'error']);
        return response()->json(['error' => 'Quantity format invalid.', 'status' => 'error']);
    }
    if ($valQtyLife->fails()) {
        return response()->json(['error' => 'Life Span format invalid.', 'status' => 'error']);
    }
    if ($valQtyFilm->fails()) {
        return response()->json(['error' => 'Film Quantity format invalid.', 'status' => 'error']);
    }

    if ($valReq->fails()) {
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
        //return response()->json(['error' => $request->path(), 'status' => 'error']);
    }

    if ($valUnique->fails()) {
       // return response()->json(['error' => $validator->errors(), 'status' => 'error']);
       return response()->json(['error' => 'Customer [' . $cust_no . '], FG Code [' . $part_no . '], Machine [' . $mac_no .'] already exist.', 'status' => 'error']);
    }
        //$p = $request->get('part_no');
        /* DB::table('ctp_mold_info')->insert(
            ['cust_no' => $request->get('cust_no'), 'part_no' => $request->get('part_no'), 'mac_no'=> $request->get('mac_no')]
        );  */
        
        /* $cust_no = \Request::get('cust_no');
        $part_no = \Request::get('part_no');
        $mac_no = \Request::get('mac_no'); */
        
        /* DB::table('ctp_mold_info')->insert(
            ['cust_no' => $cust_no, 'part_no' => $part_no, 'mac_no'=> $mac_no]
        ); */
   /*  DB::insert("INSERT INTO ctp_mold_info (cust_no, part_no, mac_no, mold_type, mold_type_vendor, mold_size, location, print_req, qty,  qty_life, film_desc, qty_film, remark,created_by,updated_by) 
                values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
                [$cust_no,$part_no,$mac_no,$plate_type,$type_vendor,$plate_size,$location,$print_req,$qty,$qty_life,$film_desc,$qty_film,$remark,$user,$user]); */
    


    $id = DB::table('ctp_mold_info')
    ->insertGetId([
        'cust_no' => $cust_no,
        'part_no' => $part_no,
        'mac_no' => $mac_no,
        'mold_type' => $plate_type,
        'mold_type_vendor' => $type_vendor,
        'mold_size' => $plate_size,
        'location' => $location,
        'print_req' => $print_req,
        'qty' => $qty,
        'qty_life' => $qty_life,
        'film_desc' => $film_desc,
        'qty_film' => $qty_film,
        'remark' => $remark,
        'created_by' => $user,
        'updated_by' => $user,
    ]);
    
    return response()->json(['success' => $id, 'status' => 'success']);
    // return 'error';
} 

public function pickup(Request $request) {
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valReq = \Validator::make($request->all(), ['picked_by' => 'required:ctp_mold_info','picked_at' => 'required:ctp_mold_info']);
    if ($valReq->fails()) {
        //return response()->json(['error' => $now, 'status' => 'error']);
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }

    DB::statement("UPDATE ctp_mold_info SET status = 'Picked', picked_by = ?, picked_remark = ?, picked_at = ?, updated_by = ?, updated_at = ? where mold_id = ?",
                   [$request->picked_by,$request->picked_remark,$request->picked_at,$user,$now,$request->mold_id]);
}

public function delete(Request $request) {
    DB::statement("DELETE FROM ctp_mold_info where mold_id = ?",
                   [$request->mold_id]);
}

public function modify(Request $request) {
    $plate_type = $request->plate_type;
    $plate_size = $request->plate_size;
    $type_vendor = $request->type_vendor;
    $location = $request->location;
    $print_req = $request->print_req;
    $qty = $request->qty;
    $qty_life = $request->qty_life;
    $film_desc = $request->film_desc;
    $qty_film = $request->qty_film;
    $remark = $request->remark;
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valQty = \Validator::make($request->all(), ['qty' => 'required|between:0,9999999999.99999999']);
    $valQtyLife = \Validator::make($request->all(), ['qty_life' => 'required|between:0,9999999999.99999999']);
    $valQtyFilm = \Validator::make($request->all(), ['qty_film' => 'required|between:0,9999999999.99999999']);

    if ($valQty->fails()) {
        //return response()->json(['error' => $user, 'status' => 'error']);
        return response()->json(['error' => 'Quantity format invalid.', 'status' => 'error']);
    }
    if ($valQtyLife->fails()) {
        return response()->json(['error' => 'Life Span format invalid.', 'status' => 'error']);
    }
    if ($valQtyFilm->fails()) {
        return response()->json(['error' => 'Film Quantity format invalid.', 'status' => 'error']);
    }
    
    DB::statement("UPDATE ctp_mold_info SET mold_type = ?, mold_type_vendor = ?, mold_size = ?, location = ?, print_req = ?, qty = ?,  qty_life = ?, film_desc = ?, qty_film = ?, remark = ?, updated_by = ?, updated_at = ? WHERE mold_id = ?",
    [$plate_type,$type_vendor,$plate_size,$location,$print_req,$qty,$qty_life,$film_desc,$qty_film,$remark,$user,$now,$request->mold_id]);

   
}

public function replace(Request $request) {
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valReq = \Validator::make($request->all(), ['old_mold_id' => 'required:ctp_mold_replace','new_mold_id' => 'required:ctp_mold_replace']);
    if ($valReq->fails()) {
        //return response()->json(['error' => $now, 'status' => 'error']);
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }

    $valExistNewInOld = \Validator::make($request->all(), ['new_mold_id' => 'exists:ctp_mold_replace,old_mold_id']);
    if ($valExistNewInOld->fails()) {

    }else{
        return response()->json(['error' => 'Plate ID : ' . $request->new_mold_id . ' has been replaced. Please select a new plate.', 'status' => 'error']);
    }


    if ($request->old_mold_id == $request->new_mold_id){
        return response()->json(['error' => 'Please select different plate to be replaced.', 'status' => 'error']);
    }

    $valExist = \Validator::make($request->all(), ['old_mold_id' => 'exists:ctp_mold_replace,old_mold_id']);
    if ($valExist->fails()) {
        DB::insert("INSERT INTO ctp_mold_replace (old_mold_id, new_mold_id, printer, CTP, reason, return_date, created_by, updated_by)
        VALUES (?,?,?,?,?,?,?,?)",
        [$request->old_mold_id,$request->new_mold_id,$request->printer,$request->CTP,$request->reason,$request->return_date,$user,$user]);

        DB::statement("UPDATE ctp_mold_info SET status = 'Replaced' where mold_id = ?",
        [$request->old_mold_id]);
    }else{
        DB::statement("UPDATE ctp_mold_replace SET new_mold_id = ?, printer = ?, CTP = ?, reason = ?, return_date = ?, updated_by = ?, updated_at = ? where old_mold_id = ?",
        [$request->new_mold_id,$request->printer,$request->CTP,$request->reason,$request->return_date,$user,$now,$request->old_mold_id]);
        //return response()->json(['error' => 'zzz', 'status' => 'error']);
    }
}

public function trans(){
    $mold_infos = DB::table('ctp_mold_info')
    ->select(["mold_id","mold_type","mold_size","cust_no","part_no","mac_no","qty","location","qty_life","print_req"]);
    $select_cust_nos = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info WHERE status = 'Picked'");
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info WHERE status = 'Picked'");
    $select_plate_ids = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info WHERE status = 'Picked'");
    $select_statuss = DB::select("SELECT DISTINCT status FROM ctp_mold_info");
    $select_users = DB::select("SELECT DISTINCT email FROM users");
    //$sales=Sales::where('status','CTP Dept')->get();


    return view('frontend.ctp.trans')->with('mold_infos',$mold_infos)
                                        ->with('select_cust_nos',$select_cust_nos)
                                        ->with('select_part_nos',$select_part_nos)
                                        ->with('select_plate_ids',$select_plate_ids)
                                        ->with('select_statuss',$select_statuss)
                                        ->with('select_users',$select_users);
}

public function print(Request $request) {
    $mold_id = $request->mold_id;
    $qty_print = $request->qty_print;
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valReq = \Validator::make($request->all(), ['mold_id' => 'required:ctp_mold_print','wo_no' => 'required:ctp_mold_print','printer' => 'required:ctp_mold_print']);
    if ($valReq->fails()) {
        //return response()->json(['error' => \URL::current() , 'status' => 'error']);
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }

    $valQty = \Validator::make($request->all(), ['qty_print' => 'required|between:0,9999999999.99999999']);
    if ($valQty->fails()) {
        //return response()->json(['error' => $user, 'status' => 'error']);
        return response()->json(['error' => 'Print Quantity format invalid.', 'status' => 'error']);
    }


    $QtyPrintBal = DB::table('ctp_mold_info')
    ->where(function ($query) use ($mold_id){
        $query->where('mold_id', $mold_id);
    })
    ->value('qty_print_bal');
    if ($qty_print > $QtyPrintBal){
        return response()->json(['error' => 'Quantity Print exceeded Quantity Print Balance.', 'status' => 'error']);
    }
    


    DB::insert("INSERT INTO ctp_mold_print (mold_id, wo_no, printer, qty_print, created_by, updated_by)
    VALUES (?,?,?,?,?,?)",
    [$request->mold_id,$request->wo_no,$request->printer,$request->qty_print,$user,$user]);
}

/*   public function edit($id)
  {
      // get the sales
      $sales = Sales::find($id);
      //$sales=Sales::all();
      // show the edit form and pass the sales
      return view('frontend.ctp.edit')
          ->with('sales', $sales);
  } */

  public function anyData(Request $request)
  {
       //$part_no = $_GET['part_no'];
       // $mold_infos = DB::select("select * from ctp_mold_info");
       $mold_infos = DB::table('ctp_mold_info')
       ->select(["mold_id","mold_type","mold_type_vendor","mold_size","cust_no","part_no","mac_no","qty","location","qty_life","print_req","film_desc","qty_film","status","remark",
                 "qty_print","qty_print_bal","picked_by","picked_at","picked_remark"])//;
       ->where(function ($query) use ($request) {
            //$query->where('part_no', '=',  $request->part_no); 
            
            if ($request->has('mold_id')) {
                $query->where('mold_id', '=', $request->get('mold_id')); 
            }

            if ($request->has('part_no')) {
                $query->where('part_no', '=', $request->get('part_no')); 
            }

            if ($request->has('cust_no')) {
                $query->where('cust_no', '=', $request->get('cust_no'));
            }

            if ($request->has('status')) {
                if ($request->get('status') == 'P'){
                    $query->where('status', '=', 'Picked');
                }else{
                    $query->where('status', '=', $request->get('status'));
                }
            }

            if ($request->has('part_no') == false && $request->has('cust_no') == false && $request->has('mold_id') == false && $request->get('status') == 'P') {
                $query->where('part_no', '=', ''); 
            }
            
            if ($request->has('part_no') == false && $request->has('cust_no') == false && $request->has('mold_id') == false && $request->has('status') == false) {
                $query->where('part_no', '=', ''); 
            }  

        });
       //->where('part_no', 'LIKE', '%' . $request->get('part_no') .'%');
       /* ->where(function ($query){
                if ($request->has('part_no')) {
                    $query->where('part_no', '=', $request->get('part_no')); 
                }
            }); */
       

        /*
        $datatables =  app('datatables')->of($mold_infos);
        if ($part_no = $request->get('part_no')) {
        $datatables->where('ctp_mold_info.part_no', '=', $part_no);
            //$mold_infos->whereIn('id', [1, 2, 3])->get();
            //$mold_infos->where('ctp_mold_info.part_no', '=', '$part_no%');
        }   
        return Datatables::of($mold_infos)->make(true);
        */      


        return Datatables::of($mold_infos)
        /*
         ->filter(function ($query) use ($request){
            
            if ($request->has('part_no')) {
                $query->where('part_no', '=', $request->get('part_no')); 
            }

            if ($request->has('cust_no')) {
                $query->where('cust_no', '=', $request->get('cust_no'));
            }

            if ($request->has('part_no') == false && $request->has('cust_no') == false ) {
                $query->where('part_no', '=', ''); 
            } 


        }) */
        ->make(true);

    /* if (access()->hasPermissions(['planning']))
    {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->select(['sales.salesline','sales.custName', 'items.partNo' , 'items.partDesc','sales.repeat_from','sales.created_at', 'sales.id']);

        return Datatables::of($sales)
          ->editColumn('id', function ($sales) {
                    return '<a href="'. route('frontend.ctp.edit', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search"></i> View </a>
                    ';
                })
          ->editColumn('created_at', function ($date) {
                    return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
                })
          ->order(function ($sales) {
                     $sales->orderBy('created_at', 'desc');
                 })

        ->escapeColumns([])
        ->where('status', '=', "CTP Dept")
        ->make();
      }
      else
      {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->select(['sales.salesline','sales.custName', 'items.partNo' , 'items.partDesc','sales.repeat_from','sales.created_at', 'sales.id']);
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
        ->where('status', '=', "CTP Dept")
        ->make();
      } */
  }

  public function anyDataWo(Request $request)
  {
       //$part_no = $_GET['part_no'];
       // $mold_infos = DB::select("select * from ctp_mold_info");
       $mold_prints = DB::table('ctp_mold_print')
       ->select(["wo_no","printer","qty_print","created_by","created_at"])//;
       ->where(function ($query) use ($request) {
            if ($request->has('mold_id')) {
                $query->where('mold_id', '=', $request->get('mold_id')); 
            }else{
                $query->where('mold_id', '=', ''); 
            }
        });
        return Datatables::of($mold_prints)
        ->make(true);
  }

  public function selectData(){
           // $data = Items::where('active', true)->orderBy('name')->pluck('name', 'id');
           $mold_id = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info");
           $cust_no = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info");
           $part_no = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info");
           //array_push($mold_id,$cust_no);
           //array_push($data,$cust_no);
           return response()->json(array('mold_id' => $mold_id,'cust_no' => $cust_no,'part_no' => $part_no));
           //return Response::json(array('data' => $categories));
  }


  public function repeatEdit($id)
  {
      // get the sales
      $repeat = Repeat::find($id);
      //$sales=Sales::all();
      // show the edit form and pass the sales
      return view('frontend.ctp.repeatEdit')
          ->with('repeat', $repeat);
  }

  public function repeatUpdate($id, Request $request)
  {
          $repeat = Repeat::find($id);
          $remark3 =$request->input('remark3');
          $dom = new \DomDocument();
          $dom->loadHtml($remark3, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
          $repeat->remark3 = $dom->saveHTML();
          $repeat->status = 'Printing Dept(repeat)';
          $repeat->save();

          // redirect
          return redirect()->route('frontend.ctp.index')->withFlashSuccess('The remark is saved and ready for action from Printing dept. ');

  }

  public function repeatData()
  {
    if (access()->hasPermissions(['planning']))
    {
        $repeat = Repeat::leftJoin('items', 'items.sales_id', '=', 'repeats.id' )
        ->select(['repeats.custName', 'items.partNo' , 'items.partDesc','repeats.status', 'repeats.id']);

        return Datatables::of($repeat)
          ->editColumn('id', function ($repeat) {
                    return '<a href="'. route('frontend.ctp.repeatEdit', $repeat->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit </a>
                    ';
                })

        ->escapeColumns([])
        ->where('status', '=', "CTP Dept(repeat)")
        ->make();
      }
      else {
        $repeat = Repeat::leftJoin('items', 'items.sales_id', '=', 'repeats.id' )
        ->select(['repeats.custName', 'items.partNo' , 'items.partDesc','repeats.status', 'repeats.id']);

        return Datatables::of($repeat)
          ->editColumn('id', function ($repeat){
                    return '';
                })

        ->escapeColumns([])
        ->where('status', '=', "CTP Dept(repeat)")
        ->make();
      }
  }

  // public function product($id)
  // {
  //   $product = Product::find($id);
  //
  //   $product->dispose1 =Input::get('dispose1');
  //   $product->ctpPlate_text =Input::get('ctpPlate_text');
  //   $product->notAvailable2 =Input::get('notAvailable2');
  //   $product->dispose2 =Input::get('dispose2');
  //   $product->film_text =Input::get('film_text');
  //   $product->save();
  // }
  //
  // public function destroy($id)
  // {
  //     $sales = Sales::findOrFail($id)->delete();
  //     // redirect
  //     return redirect()->route('frontend.ctp.index')->withFlashSuccess('The data is already deleted.');
  // }
}
