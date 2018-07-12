<?php

namespace App\Http\Controllers\Frontend\jobreq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Validation\Rule;
use DB;
use Auth;
class JobReqController extends Controller
{
  protected $users;
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */


public function index(){
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


    return view('frontend.jobreq.index')->with('mold_infos',$mold_infos)
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
    $received_by = $request->received_by;
    $film_desc = $request->film_desc;
    $qty_film = $request->qty_film;
    $print_req = $request->print_req;
    $mac_no = $request->mac_no;
    $qty_scratch_mac = $request->qty_scratch_mac;
    $qty_scratch_pm = $request->qty_scratch_pm;
    $qty_dent_mac = $request->qty_dent_mac;
    $qty_dent_pm = $request->qty_dent_pm;
    $qty_worn_mac = $request->qty_worn_mac;
    $qty_worn_pm = $request->qty_worn_pm;
    $qty_dirty_mac = $request->qty_dirty_mac;
    $qty_dirty_pm = $request->qty_dirty_pm;
    $qty_exp_time = $request->qty_exp_time;
    $qty_prod_modify = $request->qty_prod_modify;
    $user = $request->user()->email;
    

    $valReq = \Validator::make($request->all(), ['cust_no' => 'required:ctp_mold_request','part_no' => 'required:ctp_mold_request','wo_id' => 'required:ctp_mold_request',
                                                 'req_by' => 'required:ctp_mold_request','req_date' => 'required:ctp_mold_request','require_date' => 'required:ctp_mold_request']);

    $valUnique = \Validator::make($request->all(), [
        'cust_no' => 
            Rule::unique('ctp_mold_request')->where(function ($query) use ($part_no, $mac_no){
                $query->where('part_no', $part_no)->where('mac_no', $mac_no);
            })
    ]);
    
    $valQty = \Validator::make($request->all(), ['qty' => 'required|between:0,9999999999.99999999']);
    $valQtyFilm = \Validator::make($request->all(), ['qty_film' => 'required|between:0,9999999999.99999999']);

    if ($valQty->fails()) {
        return response()->json(['error' => 'Quantity format invalid.', 'status' => 'error']);
    }
    if ($valQty->fails()) {
        return response()->json(['error' => 'Film Quantity format invalid.', 'status' => 'error']);
    }

    if ($valReq->fails()) {
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
      
    }

    if ($valUnique->fails()) {
       return response()->json(['error' => 'Customer [' . $cust_no . '], FG Code [' . $part_no . '], Machine [' . $mac_no . '] already exist.', 'status' => 'error']);
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
        'received_by' => $received_by,
        'film_desc' => $film_desc,
        'qty_film' => $qty_film,
        'print_req' => $print_req,
        'mac_no' => $mac_no,
        'qty_scratch_mac' => $qty_scratch_mac,
        'qty_scratch_pm' => $qty_scratch_pm,
        'qty_dent_mac' => $qty_dent_mac,
        'qty_dent_pm' => $qty_dent_pm,
        'qty_worn_mac' => $qty_worn_mac,
        'qty_worn_pm' => $qty_worn_pm,
        'qty_dirty_mac' => $qty_dirty_mac,
        'qty_dirty_pm' => $qty_dirty_pm,
        'qty_exp_time' => $qty_exp_time,
        'qty_prod_modify' => $qty_prod_modify,
        'created_by' => $user,
        'updated_by' => $user,
    ]);
    
    return response()->json(['success' => $id, 'status' => 'success']);
    
} 

public function deleteRequest(Request $request) {
    DB::statement("DELETE FROM ctp_mold_request where req_id = ?",
                   [$request->req_id]);
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
    $received_by = $request->received_by;
    $film_desc = $request->film_desc;
    $qty_film = $request->qty_film;
    $print_req = $request->print_req;
    $mac_no = $request->mac_no;
    $qty_scratch_mac = $request->qty_scratch_mac;
    $qty_scratch_pm = $request->qty_scratch_pm;
    $qty_dent_mac = $request->qty_dent_mac;
    $qty_dent_pm = $request->qty_dent_pm;
    $qty_worn_mac = $request->qty_worn_mac;
    $qty_worn_pm = $request->qty_worn_pm;
    $qty_dirty_mac = $request->qty_dirty_mac;
    $qty_dirty_pm = $request->qty_dirty_pm;
    $qty_exp_time = $request->qty_exp_time;
    $qty_prod_modify = $request->qty_prod_modify;
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valQty = \Validator::make($request->all(), ['qty' => 'required|between:0,9999999999.99999999']);
    $valQtyFilm = \Validator::make($request->all(), ['qty_film' => 'required|between:0,9999999999.99999999']);

    if ($valQty->fails()) {
        //return response()->json(['error' => $user, 'status' => 'error']);
        return response()->json(['error' => 'Quantity format invalid.', 'status' => 'error']);
    } 
    if ($valQtyFilm->fails()) {
        return response()->json(['error' => 'Film Quantity format invalid.', 'status' => 'error']);
    } 
    
    DB::statement("UPDATE ctp_mold_request SET req_by = ?, req_date = ?, wo_id = ?, mold_type = ?, qty = ?, require_date = ?, remark = ?, received_by = ?, film_desc = ?, qty_film = ?, print_req = ?, mac_no = ?, 
                  qty_scratch_mac = ?, qty_scratch_pm = ?, qty_dent_mac = ?, qty_dent_pm = ?, qty_worn_mac = ?, qty_worn_pm = ?, qty_dirty_mac = ?, qty_dirty_pm = ?, qty_exp_time = ?, qty_prod_modify = ?,
                  updated_by = ?, updated_at = ? WHERE req_id = ?",
    [$req_by,$req_date,$wo_id,$mold_type,$qty,$require_date,$remark,$received_by,$film_desc,$qty_film,$print_req,$mac_no,
     $qty_scratch_mac, $qty_scratch_pm, $qty_dent_mac, $qty_dent_pm, $qty_worn_mac, $qty_worn_pm, $qty_dirty_mac, $qty_dirty_pm, $qty_exp_time, $qty_prod_modify, 
     $user,$now,$req_id]);

   
}

public function startRequest(Request $request) {
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');
    DB::statement("UPDATE ctp_mold_request SET status = 'Started', started_at = ?, updated_by = ?, updated_at = ? where req_id = ?",
                   [$now, $user, $now, $request->req_id]);
}

public function completeRequest(Request $request) {
    $completed_by = $request->completed_by;
    $completed_at = $request->completed_at;
    $qty_new = $request->qty_new;
    $qty_modify = $request->qty_modify;
    $qty_spoil = $request->qty_spoil;
    $qty_other = $request->qty_other;
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');
    DB::statement("UPDATE ctp_mold_request SET status = 'Completed', completed_by = ?, completed_at = ?, qty_new = ?, qty_modify = ?, qty_spoil = ?, qty_other = ?, updated_by = ?, updated_at = ? where req_id = ?",
                   [$completed_by, $completed_at, $qty_new, $qty_modify, $qty_spoil, $qty_other, $user, $now, $request->req_id]);
}

public function pickupRequest(Request $request) {
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valReq = \Validator::make($request->all(), ['picked_by' => 'required:ctp_mold_request','picked_at' => 'required:ctp_mold_request']);
    if ($valReq->fails()) {
        //return response()->json(['error' => $now, 'status' => 'error']);
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }
    
    DB::statement("UPDATE ctp_mold_request SET status = 'Closed', picked_by = ?, picked_at = ?, updated_by = ?, updated_at = ? where req_id = ?",
    [$request->picked_by,$request->picked_at,$user,$now,$request->req_id]);
}

public function anyDataRequest(Request $request){
    $mold_reqs = DB::table('ctp_mold_request')
    ->select(["req_id","status","wo_id","part_no","cust_no","qty","film_desc","qty_film","req_by","req_date","mac_no","print_req","received_by","require_date","remark",
               "qty_scratch_mac","qty_scratch_pm","qty_dent_mac","qty_dent_pm","qty_worn_mac","qty_worn_pm","qty_dirty_mac","qty_dirty_pm","qty_exp_time","qty_prod_modify",
               "completed_by","completed_at","qty_new","qty_modify","qty_spoil","qty_other",
               "picked_by","picked_at"])
    ->where(function ($query) use ($request) {
        
        if ($request->has('status')) {
            $query->where('status', '=', $request->get('status')); 
        }

        if ($request->has('wo_id')) {
            $query->where('wo_id', '=', $request->get('wo_id')); 
        }

        if ($request->has('req_id')) {
            $query->where('req_id', '=', $request->get('req_id'));
        }

        // if ($request->has('req_by')) {
        //     $query->where('req_by', '=', $request->get('req_by'));
        // }
        
        if ($request->has('wo_id') == false && $request->has('req_id') == false && $request->has('status') == false) {
            $query->where('req_id', '=', ''); 
        }  

    })
    ->orderBy('require_date');    


    return Datatables::of($mold_reqs)
    ->make(true);

}

public function selectDataRequest(){
    $req_id = DB::select("SELECT DISTINCT req_id FROM ctp_mold_request");
    $wo_id = DB::select("SELECT DISTINCT wo_id FROM ctp_mold_request");

    return response()->json(array('req_id' => $req_id,'wo_id' => $wo_id));
}


}
