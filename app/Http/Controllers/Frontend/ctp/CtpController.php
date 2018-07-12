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
public function index(){
    /* $mold_infos = DB::table('ctp_mold_info')
    ->select(["mold_id","mold_type","mold_type_vendor","mold_size","cust_no","part_no","mac_no","qty","location","qty_life","print_req","film_desc","qty_film"]); */
    $mold_infos = DB::select("SELECT DISTINCT cust_no, part_no, mac_no FROM ctp_mold_info WHERE mold_cat = 'plate'");
    $select_cust_nos = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info WHERE mold_cat = 'plate'");
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info WHERE mold_cat = 'plate'");
    $select_plate_ids = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info WHERE mold_cat = 'plate'");
    $select_statuss = DB::select("SELECT DISTINCT status FROM ctp_mold_info WHERE mold_cat = 'plate'");
    $select_users = DB::select("SELECT DISTINCT email FROM users");
    $select_type_vendors = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'type_vendor'");
    $select_locs = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'loc'");
    $select_printers = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'printer'");
    $select_reasons = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'reason'");
    $select_cust_no_masters = DB::select("SELECT DISTINCT cm_sort AS cust_no FROM cm_mstr");
    $select_part_no_masters = DB::select("SELECT DISTINCT pt_part AS part_no FROM pt_mstr");
    $select_req_ids = DB::select("SELECT req_id AS req_id FROM ctp_mold_request WHERE status = 'NEW'");
    //$select_printers = DB::select("SELECT DISTINCT wr_mch AS printer FROM wr_route WHERE wr_mch IS NOT NULL");
    //$sales=Sales::where('status','CTP Dept')->get();


    return view('frontend.ctp.index')->with('mold_infos',$mold_infos)
                                        ->with('select_cust_nos',$select_cust_nos)
                                        ->with('select_part_nos',$select_part_nos)
                                        ->with('select_plate_ids',$select_plate_ids)
                                        ->with('select_statuss',$select_statuss)
                                        ->with('select_users',$select_users)
                                        ->with('select_type_vendors',$select_type_vendors)
                                        ->with('select_locs',$select_locs)
                                        ->with('select_printers',$select_printers)
                                        ->with('select_reasons',$select_reasons)
                                        ->with('select_cust_no_masters',$select_cust_no_masters)
                                        ->with('select_part_no_masters',$select_part_no_masters)
                                        ->with('select_printers',$select_printers)
                                        ->with('select_req_ids',$select_req_ids);
    //return view('frontend.ctp.index',['mold_infos'=>$mold_infos]);
}

public function index_dc(){
    /* $mold_infos = DB::table('ctp_mold_info')
    ->select(["mold_id","mold_type","mold_type_vendor","mold_size","cust_no","part_no","mac_no","qty","location","qty_life","print_req","film_desc","qty_film"]); */
    $mold_infos = DB::select("SELECT DISTINCT cust_no, part_no, mac_no FROM ctp_mold_info WHERE mold_cat = 'dc'");
    $select_cust_nos = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info WHERE mold_cat = 'dc'");
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info WHERE mold_cat = 'dc'");
    $select_plate_ids = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info WHERE mold_cat = 'dc'");
    $select_statuss = DB::select("SELECT DISTINCT status FROM ctp_mold_info WHERE mold_cat = 'dc'");
    $select_users = DB::select("SELECT DISTINCT email FROM users");
    $select_type_vendors = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'type_vendor'");
    $select_locs = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'loc'");
    $select_printers = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'printer'");
    $select_reasons = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'reason'");
    $select_cust_no_masters = DB::select("SELECT DISTINCT cm_sort AS cust_no FROM cm_mstr");
    $select_part_no_masters = DB::select("SELECT DISTINCT pt_part AS part_no FROM pt_mstr");
    //$select_printers = DB::select("SELECT DISTINCT wr_mch AS printer FROM wr_route WHERE wr_mch IS NOT NULL");
    //$sales=Sales::where('status','CTP Dept')->get();


    return view('frontend.ctp.index_dc')->with('mold_infos',$mold_infos)
                                        ->with('select_cust_nos',$select_cust_nos)
                                        ->with('select_part_nos',$select_part_nos)
                                        ->with('select_plate_ids',$select_plate_ids)
                                        ->with('select_statuss',$select_statuss)
                                        ->with('select_users',$select_users)
                                        ->with('select_type_vendors',$select_type_vendors)
                                        ->with('select_locs',$select_locs)
                                        ->with('select_printers',$select_printers)
                                        ->with('select_reasons',$select_reasons)
                                        ->with('select_cust_no_masters',$select_cust_no_masters)
                                        ->with('select_part_no_masters',$select_part_no_masters)
                                        ->with('select_printers',$select_printers);
    //return view('frontend.ctp.index',['mold_infos'=>$mold_infos]);
}

public function index_fd(){
    /* $mold_infos = DB::table('ctp_mold_info')
    ->select(["mold_id","mold_type","mold_type_vendor","mold_size","cust_no","part_no","mac_no","qty","location","qty_life","print_req","film_desc","qty_film"]); */
    $mold_infos = DB::select("SELECT DISTINCT cust_no, part_no, mac_no FROM ctp_mold_info WHERE mold_cat = 'fd'");
    $select_cust_nos = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info WHERE mold_cat = 'fd'");
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info WHERE mold_cat = 'fd'");
    $select_plate_ids = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info WHERE mold_cat = 'fd'");
    $select_statuss = DB::select("SELECT DISTINCT status FROM ctp_mold_info WHERE mold_cat = 'fd'");
    $select_users = DB::select("SELECT DISTINCT email FROM users");
    $select_type_vendors = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'type_vendor'");
    $select_locs = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'loc'");
    $select_printers = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'printer'");
    $select_reasons = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'reason'");
    $select_cust_no_masters = DB::select("SELECT DISTINCT cm_sort AS cust_no FROM cm_mstr");
    $select_part_no_masters = DB::select("SELECT DISTINCT pt_part AS part_no FROM pt_mstr");
    //$select_printers = DB::select("SELECT DISTINCT wr_mch AS printer FROM wr_route WHERE wr_mch IS NOT NULL");
    //$sales=Sales::where('status','CTP Dept')->get();


    return view('frontend.ctp.index_fd')->with('mold_infos',$mold_infos)
                                        ->with('select_cust_nos',$select_cust_nos)
                                        ->with('select_part_nos',$select_part_nos)
                                        ->with('select_plate_ids',$select_plate_ids)
                                        ->with('select_statuss',$select_statuss)
                                        ->with('select_users',$select_users)
                                        ->with('select_type_vendors',$select_type_vendors)
                                        ->with('select_locs',$select_locs)
                                        ->with('select_printers',$select_printers)
                                        ->with('select_reasons',$select_reasons)
                                        ->with('select_cust_no_masters',$select_cust_no_masters)
                                        ->with('select_part_no_masters',$select_part_no_masters)
                                        ->with('select_printers',$select_printers);
    //return view('frontend.ctp.index',['mold_infos'=>$mold_infos]);
}

public function index_ff(){
    /* $mold_infos = DB::table('ctp_mold_info')
    ->select(["mold_id","mold_type","mold_type_vendor","mold_size","cust_no","part_no","mac_no","qty","location","qty_life","print_req","film_desc","qty_film"]); */
    $mold_infos = DB::select("SELECT DISTINCT cust_no, part_no, mac_no FROM ctp_mold_info WHERE mold_cat = 'ff'");
    $select_cust_nos = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info WHERE mold_cat = 'ff'");
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info WHERE mold_cat = 'ff'");
    $select_plate_ids = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info WHERE mold_cat = 'ff'");
    $select_statuss = DB::select("SELECT DISTINCT status FROM ctp_mold_info WHERE mold_cat = 'ff'");
    $select_users = DB::select("SELECT DISTINCT email FROM users");
    $select_type_vendors = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'type_vendor'");
    $select_locs = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'loc'");
    $select_printers = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'printer'");
    $select_reasons = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'reason'");
    $select_cust_no_masters = DB::select("SELECT DISTINCT cm_sort AS cust_no FROM cm_mstr");
    $select_part_no_masters = DB::select("SELECT DISTINCT pt_part AS part_no FROM pt_mstr");
    //$select_printers = DB::select("SELECT DISTINCT wr_mch AS printer FROM wr_route WHERE wr_mch IS NOT NULL");
    //$sales=Sales::where('status','CTP Dept')->get();


    return view('frontend.ctp.index_ff')->with('mold_infos',$mold_infos)
                                        ->with('select_cust_nos',$select_cust_nos)
                                        ->with('select_part_nos',$select_part_nos)
                                        ->with('select_plate_ids',$select_plate_ids)
                                        ->with('select_statuss',$select_statuss)
                                        ->with('select_users',$select_users)
                                        ->with('select_type_vendors',$select_type_vendors)
                                        ->with('select_locs',$select_locs)
                                        ->with('select_printers',$select_printers)
                                        ->with('select_reasons',$select_reasons)
                                        ->with('select_cust_no_masters',$select_cust_no_masters)
                                        ->with('select_part_no_masters',$select_part_no_masters)
                                        ->with('select_printers',$select_printers);
    //return view('frontend.ctp.index',['mold_infos'=>$mold_infos]);
}

public function drop_down(){
    return view('frontend.ctp.drop_down');
    //return view('frontend.ctp.index',['mold_infos'=>$mold_infos]);
}

public function request(){
    $mold_infos = DB::select("SELECT DISTINCT cust_no, part_no, mac_no FROM ctp_mold_info WHERE mold_cat = 'ff'");
    $select_plate_ids = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info WHERE mold_cat = 'ff'");
    $select_cust_nos = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_request");
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM ctp_mold_request");
    $select_statuss = DB::select("SELECT DISTINCT status FROM ctp_mold_request");
    $select_users = DB::select("SELECT DISTINCT email FROM users");
    $select_type_vendors = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'type_vendor'");
    $select_locs = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'loc'");
    $select_printers = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'printer'");
    $select_reasons = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'reason'");
    $select_cust_no_masters = DB::select("SELECT DISTINCT cm_sort AS cust_no FROM cm_mstr");
    $select_part_no_masters = DB::select("SELECT DISTINCT pt_part AS part_no FROM pt_mstr");
    $select_req_ids = DB::select("SELECT DISTINCT req_id FROM ctp_mold_request");
    $select_wo_ids = DB::select("SELECT DISTINCT wo_id FROM ctp_mold_request WHERE IFNULL(wo_id,'') <> ''");
    //$select_printers = DB::select("SELECT DISTINCT wr_mch AS printer FROM wr_route WHERE wr_mch IS NOT NULL");
    //$sales=Sales::where('status','CTP Dept')->get();


    return view('frontend.ctp.request')->with('mold_infos',$mold_infos)
                                        ->with('select_cust_nos',$select_cust_nos)
                                        ->with('select_part_nos',$select_part_nos)
                                        ->with('select_plate_ids',$select_plate_ids)
                                        ->with('select_statuss',$select_statuss)
                                        ->with('select_users',$select_users)
                                        ->with('select_type_vendors',$select_type_vendors)
                                        ->with('select_locs',$select_locs)
                                        ->with('select_printers',$select_printers)
                                        ->with('select_reasons',$select_reasons)
                                        ->with('select_cust_no_masters',$select_cust_no_masters)
                                        ->with('select_part_no_masters',$select_part_no_masters)
                                        ->with('select_printers',$select_printers)
                                        ->with('select_req_ids',$select_req_ids)
                                        ->with('select_wo_ids',$select_wo_ids);
    //return view('frontend.ctp.index',['mold_infos'=>$mold_infos]);
}

public function drop_down_insert(Request $request) {
    
    $type = $request->type;
    $type_text = $request->type_text;
    $value = $request->value;
    $user = $request->user()->email;
    

    $valReq = \Validator::make($request->all(), ['type' => 'required:drop_down_list','value' => 'required:drop_down_list']);

    if ($type == 'part_no'){
        $valUnique = \Validator::make($request->all(), [
            'value' => 'unique:pt_mstr,pt_part'
        ]);
    }else{
        $valUnique = \Validator::make($request->all(), [
            'type' => 
                Rule::unique('drop_down_list')->where(function ($query) use ($value){
                    $query->where('value', $value);
                })
        ]);
    }

    if ($valReq->fails()) {
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }

    if ($valUnique->fails()) {
       return response()->json(['error' => 'Dropdown Type [' . $type_text . '], Value [' . $value . '] already exist.', 'status' => 'error']);
    }

    if ($type == 'part_no'){
        DB::insert("INSERT INTO pt_mstr (pt_part)
        VALUES (?)",
        [$request->value]);
    }else{
        DB::insert("INSERT INTO drop_down_list (type, value, created_by)
        VALUES (?,?,?)",
        [$request->type,$request->value,$user]);
    }
    
   
    
    //return response()->json(['success' => $id, 'status' => 'success']);
    // return 'error';
} 

public function insert(Request $request) {
    //DB::insert("INSERT INTO ctp_mold_info (cust_no, part_no, mac_no) values ('c1','p1','m1')");
    //return response()->json(['error' => $request->url(), 'status' => 'error']);
    
    // $validator = \Validator::make($request->all(), ['cust_no' => 'unique:ctp_mold_info,cust_no,part_no,mac_no']);
    
    $mold_type = $request->mold_type;
    $cust_no = $request->cust_no;
    $part_no = $request->part_no;
    $mac_no = $request->mac_no;
    $printer = $request->printer;
    $plate_size = $request->plate_size;
    $mold_id_fd = $request->mold_id_fd;
    $location = $request->location;
    $print_req = $request->print_req;
    $qty = $request->qty;
    $qty_life = $request->qty_life;
    $film_desc = $request->film_desc;
    $qty_film = $request->qty_film;
    $remark = $request->remark;
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');
    $req_id = $request->req_id;
    $mold_id_dc = $request->mold_id_dc;
    $mac_no_dc = $request->mac_no_dc;
    $strip_board = $request->strip_board;

    $valReq = \Validator::make($request->all(), ['cust_no' => 'required:ctp_mold_info','part_no' => 'required:ctp_mold_info','mac_no' => 'required:ctp_mold_info','location' => 'required:ctp_mold_info']);

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
        'mold_cat' => $mold_type,
        'cust_no' => $cust_no,
        'part_no' => $part_no,
        'mac_no' => $mac_no,
        'printer' => $printer,
        'mold_id_fd' => $mold_id_fd,
        'mold_size' => $plate_size,
        'location' => $location,
        'print_req' => $print_req,
        'qty' => $qty,
        'qty_life' => $qty_life,
        'film_desc' => $film_desc,
        'qty_film' => $qty_film,
        'remark' => $remark,
        'mold_id_dc' => $mold_id_dc,
        'mac_no_dc' => $mac_no_dc,
        'strip_board' => $strip_board,
        'created_by' => $user,
        'updated_by' => $user,
    ]);

    DB::statement("UPDATE ctp_mold_request SET plate_id = ?, updated_by = ?, created_at = ? WHERE req_id = ?",
        [$id,$user,$now,$req_id]); 
    
    return response()->json(['success' => $id, 'status' => 'success']);
    // return 'error';
} 

public function insertRequest(Request $request) {
    
    $req_by = $request->req_by;
    $req_date = $request->req_date;
    $part_no = $request->part_no;
    $wo_id = $request->wo_id;
    $cust_no = $request->cust_no;
    $mold_type = $request->mold_type;
    $qty = $request->qty;
    $require_date = $request->require_date;
    $remark = $request->remark;
    $user = $request->user()->email;
    

    $valReq = \Validator::make($request->all(), ['cust_no' => 'required:ctp_mold_request','part_no' => 'required:ctp_mold_request',
                                                 'req_by' => 'required:ctp_mold_request','req_date' => 'required:ctp_mold_request','require_date' => 'required:ctp_mold_request']);

    $valUnique = \Validator::make($request->all(), [
        'cust_no' => 
            Rule::unique('ctp_mold_request')->where(function ($query) use ($part_no){
                $query->where('part_no', $part_no);
            })
    ]);
    
    $valQty = \Validator::make($request->all(), ['qty' => 'required|between:0,9999999999.99999999']);

    if ($valQty->fails()) {
        return response()->json(['error' => 'Quantity format invalid.', 'status' => 'error']);
    }

    if ($valReq->fails()) {
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
      
    }

    if ($valUnique->fails()) {
       return response()->json(['error' => 'Customer [' . $cust_no . '], FG Code [' . $part_no . '] already exist.', 'status' => 'error']);
    }
     


    $id = DB::table('ctp_mold_request')
    ->insertGetId([
        'status' => 'New',
        'req_by' => $req_by,
        'req_date' => $req_date,
        'part_no' => $part_no,
        'wo_id' => $wo_id,
        'cust_no' => $cust_no,
        'mold_type' => $mold_type,
        'qty' => $qty,
        'require_date' => $require_date,
        'remark' => $remark,
        'created_by' => $user,
        'updated_by' => $user,
    ]);
    
    return response()->json(['success' => $id, 'status' => 'success']);
    
} 

public function pickup(Request $request) {
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valReq = \Validator::make($request->all(), ['picked_by' => 'required:ctp_mold_info','picked_at' => 'required:ctp_mold_info',
                                                 'picked_from_loc' => 'required:ctp_mold_info','picked_to_loc' => 'required:ctp_mold_info','picked_qty' => 'required:ctp_mold_info']);
    if ($valReq->fails()) {
        //return response()->json(['error' => $now, 'status' => 'error']);
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }

    DB::insert("INSERT INTO ctp_mold_move (mold_id, from_location, to_location, move_qty, remark, move_at, move_by, created_by)
                  VALUES (?,?,?,?,?,?,?,?)",
                  [$request->mold_id,$request->picked_from_loc,$request->picked_to_loc,$request->picked_qty,$request->picked_remark,$request->picked_at,$request->picked_by,$user]);
    
    DB::statement("UPDATE ctp_mold_info SET location = ?, updated_by = ?, updated_at = ? where mold_id = ?",
    [$request->picked_to_loc,$user,$now,$request->mold_id]);
      
   
                  /*
    DB::statement("UPDATE ctp_mold_info SET status = 'Picked', picked_by = ?, picked_remark = ?, picked_at = ?, updated_by = ?, updated_at = ? where mold_id = ?",
                   [$request->picked_by,$request->picked_remark,$request->picked_at,$user,$now,$request->mold_id]);*/
}

public function delete(Request $request) {
    DB::statement("DELETE FROM ctp_mold_info where mold_id = ?",
                   [$request->mold_id]);
}

public function deleteRequest(Request $request) {
    DB::statement("DELETE FROM ctp_mold_request where req_id = ?",
                   [$request->req_id]);
}

public function modify(Request $request) {
    $printer = $request->printer;
    $plate_size = $request->plate_size;
    $mold_id_fd = $request->mold_id_fd;
    $location = $request->location;
    $print_req = $request->print_req;
    //$qty = $request->qty;
    $qty_life = $request->qty_life;
    $film_desc = $request->film_desc;
    $qty_film = $request->qty_film;
    $remark = $request->remark;
    $mold_id_dc = $request->mold_id_dc;
    $mac_no_dc = $request->mac_no_dc;
    $strip_board = $request->strip_board;
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    //$valQty = \Validator::make($request->all(), ['qty' => 'required|between:0,9999999999.99999999']);
    $valQtyLife = \Validator::make($request->all(), ['qty_life' => 'required|between:0,9999999999.99999999']);
    $valQtyFilm = \Validator::make($request->all(), ['qty_film' => 'required|between:0,9999999999.99999999']);

   /*  if ($valQty->fails()) {
        //return response()->json(['error' => $user, 'status' => 'error']);
        return response()->json(['error' => 'Quantity format invalid.', 'status' => 'error']);
    } */
    if ($valQtyLife->fails()) {
        return response()->json(['error' => 'Life Span format invalid.', 'status' => 'error']);
    }
    if ($valQtyFilm->fails()) {
        return response()->json(['error' => 'Film Quantity format invalid.', 'status' => 'error']);
    }
    
    DB::statement("UPDATE ctp_mold_info SET printer = ?, mold_id_fd = ?, mold_size = ?, location = ?, print_req = ?, qty_life = ?, film_desc = ?, qty_film = ?, remark = ?, mold_id_dc = ?, mac_no_dc = ?, strip_board = ?, updated_by = ?, updated_at = ? WHERE mold_id = ?",
    [$printer,$mold_id_fd,$plate_size,$location,$print_req,$qty_life,$film_desc,$qty_film,$remark,$mold_id_dc,$mac_no_dc,$strip_board,$user,$now,$request->mold_id]);

   
}

public function modifyRequest(Request $request) {
    $req_id = $request->req_id;
    $req_by = $request->req_by;
    $req_date = $request->req_date;
    $wo_id = $request->wo_id;
    $mold_type = $request->mold_type;
    $qty = $request->qty;
    $require_date = $request->require_date;
    $remark = $request->remark;
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valQty = \Validator::make($request->all(), ['qty' => 'required|between:0,9999999999.99999999']);

    if ($valQty->fails()) {
        //return response()->json(['error' => $user, 'status' => 'error']);
        return response()->json(['error' => 'Quantity format invalid.', 'status' => 'error']);
    } 
    
    DB::statement("UPDATE ctp_mold_request SET req_by = ?, req_date = ?, wo_id = ?, mold_type = ?, qty = ?, require_date = ?, remark = ?, updated_by = ?, updated_at = ? WHERE req_id = ?",
    [$req_by,$req_date,$wo_id,$mold_type,$qty,$require_date,$remark,$user,$now,$req_id]);

   
}

public function replace(Request $request) {
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valReq = \Validator::make($request->all(), ['printer' => 'required:ctp_mold_replace','CTP' => 'required:ctp_mold_replace','reason' => 'required:ctp_mold_replace'
                                                 ,'return_date' => 'required:ctp_mold_replace','add_write' => 'required:ctp_mold_replace']);
    if ($valReq->fails()) {
        //return response()->json(['error' => $now, 'status' => 'error']);
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }

    DB::insert("INSERT INTO ctp_mold_replace (mold_id, add_write, printer, CTP, reason, `date`, quantity, created_by, updated_by)
        VALUES (?,?,?,?,?,?,?,?,?)",
        [$request->mold_id,$request->add_write,$request->printer,$request->CTP,$request->reason,$request->return_date,$request->quantity,$user,$user]);

    if ($request->add_write == "Add"){
        DB::statement("UPDATE ctp_mold_info SET qty = qty + ? where mold_id = ?",
        [$request->quantity, $request->mold_id]);
    }else{
        DB::statement("UPDATE ctp_mold_info SET qty = qty - ? where mold_id = ?",
        [$request->quantity, $request->mold_id]);
    }
        

    /*

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
    }*/
}

public function complete(Request $request) {
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    DB::statement("UPDATE ctp_mold_info SET status = 'History', complete_by = ?, complete_at = ?, updated_by = ?, updated_at = ? WHERE mold_id = ?",
    [$user,$now,$user,$now,$request->mold_id]);

    DB::statement("UPDATE ctp_mold_request SET `status` = 'History', updated_by = ?, created_at = ? WHERE plate_id = ?",
        [$user,$now,$request->mold_id]); 
}

public function trans(){
    $mold_infos = DB::select("SELECT DISTINCT mold_id, mold_type, mold_size, cust_no, part_no, mac_no, qty, location, qty_life, print_req FROM ctp_mold_info WHERE mold_cat = 'plate'");
    $select_cust_nos = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info WHERE mold_cat = 'plate'");
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info WHERE mold_cat = 'plate'");
    $select_plate_ids = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info WHERE mold_cat = 'plate'");
    $select_statuss = DB::select("SELECT DISTINCT status FROM ctp_mold_info WHERE mold_cat = 'plate'");
    $select_users = DB::select("SELECT DISTINCT email FROM users");
    $select_wos = DB::select("SELECT wo_lot FROM wo_mstr");
    $select_printers = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'printer'");
    //$sales=Sales::where('status','CTP Dept')->get();


    return view('frontend.ctp.trans')->with('mold_infos',$mold_infos)
                                        ->with('select_cust_nos',$select_cust_nos)
                                        ->with('select_part_nos',$select_part_nos)
                                        ->with('select_plate_ids',$select_plate_ids)
                                        ->with('select_statuss',$select_statuss)
                                        ->with('select_users',$select_users)
                                        ->with('select_wos',$select_wos)
                                        ->with('select_printers',$select_printers);
}

public function trans_dc(){
    $mold_infos = DB::select("SELECT DISTINCT mold_id, mold_type, mold_size, cust_no, part_no, mac_no, qty, location, qty_life, print_req FROM ctp_mold_info WHERE mold_cat = 'dc'");
    $select_cust_nos = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info WHERE mold_cat = 'dc'");
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info WHERE mold_cat = 'dc'");
    $select_plate_ids = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info WHERE mold_cat = 'dc'");
    $select_statuss = DB::select("SELECT DISTINCT status FROM ctp_mold_info WHERE mold_cat = 'dc'");
    $select_users = DB::select("SELECT DISTINCT email FROM users");
    $select_wos = DB::select("SELECT wo_lot FROM wo_mstr");
    $select_printers = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'printer'");
    //$sales=Sales::where('status','CTP Dept')->get();


    return view('frontend.ctp.trans_dc')->with('mold_infos',$mold_infos)
                                        ->with('select_cust_nos',$select_cust_nos)
                                        ->with('select_part_nos',$select_part_nos)
                                        ->with('select_plate_ids',$select_plate_ids)
                                        ->with('select_statuss',$select_statuss)
                                        ->with('select_users',$select_users)
                                        ->with('select_wos',$select_wos)
                                        ->with('select_printers',$select_printers);
}

public function trans_fd(){
    $mold_infos = DB::select("SELECT DISTINCT mold_id, mold_type, mold_size, cust_no, part_no, mac_no, qty, location, qty_life, print_req FROM ctp_mold_info WHERE mold_cat = 'fd'");
    $select_cust_nos = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info WHERE mold_cat = 'fd'");
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info WHERE mold_cat = 'fd'");
    $select_plate_ids = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info WHERE mold_cat = 'fd'");
    $select_statuss = DB::select("SELECT DISTINCT status FROM ctp_mold_info WHERE mold_cat = 'fd'");
    $select_users = DB::select("SELECT DISTINCT email FROM users");
    $select_wos = DB::select("SELECT wo_lot FROM wo_mstr");
    $select_printers = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'printer'");
    //$sales=Sales::where('status','CTP Dept')->get();


    return view('frontend.ctp.trans_fd')->with('mold_infos',$mold_infos)
                                        ->with('select_cust_nos',$select_cust_nos)
                                        ->with('select_part_nos',$select_part_nos)
                                        ->with('select_plate_ids',$select_plate_ids)
                                        ->with('select_statuss',$select_statuss)
                                        ->with('select_users',$select_users)
                                        ->with('select_wos',$select_wos)
                                        ->with('select_printers',$select_printers);
}

public function trans_ff(){
    $mold_infos = DB::select("SELECT DISTINCT mold_id, mold_type, mold_size, cust_no, part_no, mac_no, qty, location, qty_life, print_req FROM ctp_mold_info WHERE mold_cat = 'ff'");
    $select_cust_nos = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info WHERE mold_cat = 'ff'");
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info WHERE mold_cat = 'ff'");
    $select_plate_ids = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info WHERE mold_cat = 'ff'");
    $select_statuss = DB::select("SELECT DISTINCT status FROM ctp_mold_info WHERE mold_cat = 'ff'");
    $select_users = DB::select("SELECT DISTINCT email FROM users");
    $select_wos = DB::select("SELECT wo_lot FROM wo_mstr");
    $select_printers = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'printer'");
    //$sales=Sales::where('status','CTP Dept')->get();


    return view('frontend.ctp.trans_ff')->with('mold_infos',$mold_infos)
                                        ->with('select_cust_nos',$select_cust_nos)
                                        ->with('select_part_nos',$select_part_nos)
                                        ->with('select_plate_ids',$select_plate_ids)
                                        ->with('select_statuss',$select_statuss)
                                        ->with('select_users',$select_users)
                                        ->with('select_wos',$select_wos)
                                        ->with('select_printers',$select_printers);
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


public function anyData(Request $request)
{
    $mold_infos = DB::table('ctp_mold_info')
    ->select(["mold_id","mold_type","mold_type_vendor","printer","mold_id_fd","mold_size","cust_no","part_no","mac_no","qty","location","qty_life","print_req","film_desc","qty_film","status","remark",
                "qty_print","qty_print_bal","picked_by","picked_at","picked_remark","complete_by","complete_at","mold_id_dc","mac_no_dc","strip_board"])
    ->where(function ($query) use ($request) {
        
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
            $query->where('status', '=', $request->get('status'));
        }

        if ($request->has('part_no') == false && $request->has('cust_no') == false && $request->has('mold_id') == false && $request->get('status') == 'P') {
            $query->where('part_no', '=', ''); 
        }
        
        if ($request->has('part_no') == false && $request->has('cust_no') == false && $request->has('mold_id') == false && $request->has('status') == false) {
            $query->where('part_no', '=', ''); 
        }  

    });    


    return Datatables::of($mold_infos)
    ->make(true);

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

public function anyDataMove(Request $request)
{
    //$part_no = $_GET['part_no'];
    // $mold_infos = DB::select("select * from ctp_mold_info");
    $mold_move = DB::table('ctp_mold_move')
    ->select(["move_at","from_location","to_location","move_by","move_qty"])//;
    ->where(function ($query) use ($request) {
        if ($request->has('mold_id')) {
            $query->where('mold_id', '=', $request->get('mold_id')); 
        }else{
            $query->where('mold_id', '=', ''); 
        }
    })
    ->orderBy('move_at', 'desc');
    return Datatables::of($mold_move)
    ->make(true);
}

public function anyDataMain(Request $request)
{
    //$part_no = $_GET['part_no'];
    // $mold_infos = DB::select("select * from ctp_mold_info");
    $mold_main = DB::table('ctp_mold_replace')
    ->select(["date","printer","reason","CTP","add_write","quantity","created_by"])//;
    ->where(function ($query) use ($request) {
        if ($request->has('mold_id')) {
            $query->where('mold_id', '=', $request->get('mold_id')); 
        }else{
            $query->where('mold_id', '=', ''); 
        }
    })
    ->orderBy('date', 'desc');
    return Datatables::of($mold_main)
    ->make(true);
}

// public function anyDataRequest(Request $request)
// {
//     $mold_reqs = DB::table('ctp_mold_request')
//     ->select(["req_id","status","req_by","req_date","part_no","wo_id","cust_no","mold_type","qty","require_date","remark"])
//     ->where(function ($query) use ($request) {
        
//         if ($request->has('status')) {
//             $query->where('status', '=', $request->get('status')); 
//         }

//         if ($request->has('part_no')) {
//             $query->where('part_no', '=', $request->get('part_no')); 
//         }

//         if ($request->has('cust_no')) {
//             $query->where('cust_no', '=', $request->get('cust_no'));
//         }

//         if ($request->has('req_by')) {
//             $query->where('req_by', '=', $request->get('req_by'));
//         }
        
//         if ($request->has('part_no') == false && $request->has('cust_no') == false && $request->has('req_by') == false && $request->has('status') == false) {
//             $query->where('part_no', '=', ''); 
//         }  

//     });    
//     $mold_reqs_ordered = $mold_reqs->orderBy('cust_no','DESC');

//     return Datatables::of($mold_reqs_ordered)
//     ->make(true);

// }

public function selectData(){
    // $data = Items::where('active', true)->orderBy('name')->pluck('name', 'id');
    $mold_id = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info");
    $cust_no = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info");
    $part_no = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info");
    $type_vendor = DB::select("SELECT DISTINCT vendor_type FROM ctp_vendor_type");
    $req_id = DB::select("SELECT req_id AS req_id FROM ctp_mold_request WHERE status = 'NEW'");
    //array_push($mold_id,$cust_no);
    //array_push($data,$cust_no);
    return response()->json(array('mold_id' => $mold_id,'cust_no' => $cust_no,'part_no' => $part_no,'type_vendor' => $type_vendor,'req_id' => $req_id));
    //return Response::json(array('data' => $categories));
}

public function selectDataWo(Request $request){
    $part_no = $request->part_no;
    $wo_lot = DB::select("SELECT DISTINCT wo_lot FROM wo_mstr WHERE wo_part = '" . $part_no ."'");

    return response()->json(array('wo_lot' => $wo_lot));
}

public function selectDataTran(Request $request){
    $wo = $request->wo;/*
    $wr_mch = DB::table('wr_route')
    ->distinct()
    ->select(["wr_mch"])
    ->where(function ($query) use ($wo){
        $query->where('wr_lot', $wo);
    })
    ->whereNotNull('wr_mch');*/
    // $data = Items::where('active', true)->orderBy('name')->pluck('name', 'id');
    $wr_mch = DB::select("SELECT DISTINCT wr_mch FROM wr_route WHERE wr_mch IS NOT NULL AND wr_lot = '" . $wo ."'");
    $qty_complete = DB::table('wo_mstr')
    ->where(function ($query) use ($wo){
        $query->where('wo_lot', $wo);
    })
    ->value('wr_qty_complete');

    //$qty_complete = DB::select("SELECT wr_qty_complete AS qty_complete FROM wo_mstr WHERE wo_lot = '" . $wo ."'");
    if ($qty_complete == ''){
        $qty_complete = 0;
    }
    /* $mold_id = DB::select("SELECT DISTINCT mold_id FROM ctp_mold_info");
    $cust_no = DB::select("SELECT DISTINCT cust_no FROM ctp_mold_info");
    $part_no = DB::select("SELECT DISTINCT part_no FROM ctp_mold_info");
    $type_vendor = DB::select("SELECT DISTINCT vendor_type FROM ctp_vendor_type"); */
    //array_push($mold_id,$cust_no);
    //array_push($data,$cust_no);
    return response()->json(array('wr_mch' => $wr_mch,'qty' => round($qty_complete,4)));
    //return Response::json(array('data' => $categories));
}

public function selectDataReq(Request $request){
    $req_id = $request->req_id;

    $part_no = DB::table('ctp_mold_request')
    ->where(function ($query) use ($req_id){
        $query->where('req_id', $req_id);
    })
    ->value('part_no');

    $cust_no = DB::table('ctp_mold_request')
    ->where(function ($query) use ($req_id){
        $query->where('req_id', $req_id);
    })
    ->value('cust_no');

    $mac_no = DB::table('ctp_mold_request')
    ->where(function ($query) use ($req_id){
        $query->where('req_id', $req_id);
    })
    ->value('mac_no');

    $print_req = DB::table('ctp_mold_request')
    ->where(function ($query) use ($req_id){
        $query->where('req_id', $req_id);
    })
    ->value('print_req');

    $qty = DB::table('ctp_mold_request')
    ->where(function ($query) use ($req_id){
        $query->where('req_id', $req_id);
    })
    ->value('qty');

    $film_desc = DB::table('ctp_mold_request')
    ->where(function ($query) use ($req_id){
        $query->where('req_id', $req_id);
    })
    ->value('film_desc');

    $qty_film = DB::table('ctp_mold_request')
    ->where(function ($query) use ($req_id){
        $query->where('req_id', $req_id);
    })
    ->value('qty_film');

    $remark = DB::table('ctp_mold_request')
    ->where(function ($query) use ($req_id){
        $query->where('req_id', $req_id);
    })
    ->value('remark');

    return response()->json(array('part_no' => $part_no,'cust_no' => $cust_no, 'mac_no' => $mac_no, 'print_req' => $print_req, 'qty' => $qty, 'film_desc' => $film_desc, 'qty_film' => $qty_film, 'remark' => $remark));
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


}
