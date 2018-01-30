<?php

namespace App\Http\Controllers\Frontend\request;

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
class RequestController extends Controller
{
  protected $users;
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
  public function index()
  {
    $select_req_ids = DB::select("SELECT DISTINCT req_id FROM maint_request_info");

    return view('frontend.request.index')->with('select_req_ids',$select_req_ids);
  }
  
  public function anyData(Request $request)
  {
       //$part_no = $_GET['part_no'];
       // $mold_infos = DB::select("select * from ctp_mold_info");
       $req_infos = DB::table('maint_request_info')
       ->select(["req_id","department","machine",
                 DB::raw("(CASE WHEN eta_lvl = 1 THEN 'Very Urgent' WHEN eta_lvl = 2 THEN 'Urgent' WHEN eta_lvl = 3 THEN 'Normal' ELSE '' END) AS eta_lvl"),
                 "request_date","status",
                 DB::raw("(CASE WHEN prob_category = 'E' THEN 'Electical/Electronic' WHEN prob_category = 'M' THEN 'Mechanical' WHEN prob_category = 'O' THEN 'Others' ELSE '' END) AS prob_category"),
                 "prob_main_1","prob_main_2","prob_main_3","prob_main_4","prob_main_5","prob_main_6",
                 "prob_feeder","prob_delivery","prob_details","created_by"])//;
       ->where(function ($query) use ($request) {
            //$query->where('part_no', '=',  $request->part_no); 
            
            if ($request->has('req_id')) {
                $query->where('req_id', '=', $request->get('req_id')); 
            }

            if ($request->has('eta_lvl')) {
                $query->where('eta_lvl', '=', $request->get('eta_lvl')); 
            }

            if ($request->has('prob_category')) {
                $query->where('prob_category', '=', $request->get('prob_category'));
            }

            if ($request->has('status')) {
                    $query->where('status', '=', $request->get('status'));
            }

            if ($request->has('req_id') == false && $request->has('eta_lvl') == false && $request->has('prob_category') == false && $request->has('status') == false) {
                $query->where('req_id', '=', 0); 
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


        return Datatables::of($req_infos)
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
  }

  public function insert(Request $request) {
    //DB::insert("INSERT INTO ctp_mold_info (cust_no, part_no, mac_no) values ('c1','p1','m1')");
    //return json(['error' => 'Error msg', 'status' => 'error']);
    // $validator = \Validator::make($request->all(), ['cust_no' => 'unique:ctp_mold_info,cust_no,part_no,mac_no']);
    
    
    $department = $request->department;
    $machine = $request->machine;
    $eta_lvl = $request->eta_lvl;
    $request_date = $request->request_date;
    $prob_category = $request->prob_category;
    $prob_main_1 = $request->prob_main_1;
    $prob_main_2 = $request->prob_main_2;
    $prob_main_3 = $request->prob_main_3;
    $prob_main_4 = $request->prob_main_4;
    $prob_main_5 = $request->prob_main_5;
    $prob_main_6 = $request->prob_main_6;
    $prob_feeder = $request->prob_feeder;
    $prob_delivery = $request->prob_delivery;
    $prob_details = $request->prob_details;
    $user = $request->user()->email;
    
    //return response()->json(['error' => $prob_main_1, 'status' => 'error']);
    
    $valReq = \Validator::make($request->all(), ['department' => 'required:maint_request_info',
                                                 'machine' => 'required:maint_request_info',
                                                 'eta_lvl' => 'required:maint_request_info',
                                                 'prob_category' => 'required:maint_request_info',
                                                 'request_date' => 'required:maint_request_info']);

    if ($valReq->fails()) {
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
        //return response()->json(['error' => $prob_main_1, 'status' => 'error']);
    }
    
    $id = DB::table('maint_request_info')
    ->insertGetId([
        'department' => $department,
        'machine' => $machine,
        'eta_lvl' => $eta_lvl,
        'request_date' => $request_date,
        'prob_category' => $prob_category,
        'prob_main_1' => $prob_main_1,
        'prob_main_2' => $prob_main_2,
        'prob_main_3' => $prob_main_3,
        'prob_main_4' => $prob_main_4,
        'prob_main_5' => $prob_main_5,
        'prob_main_6' => $prob_main_6,
        'prob_feeder' => $prob_feeder,
        'prob_delivery' => $prob_delivery,
        'prob_details' => $prob_details,
        'created_by' => $user,
        'updated_by' => $user,
    ]);
    
    return response()->json(['success' => $id, 'status' => 'success']); 
    // return 'error';
  } 

  public function modify(Request $request) {
    $req_id = $request->req_id;
    $department = $request->department;
    $machine = $request->machine;
    $eta_lvl = $request->eta_lvl;
    $request_date = $request->request_date;
    $prob_category = $request->prob_category;
    $prob_main_1 = $request->prob_main_1;
    $prob_main_2 = $request->prob_main_2;
    $prob_main_3 = $request->prob_main_3;
    $prob_main_4 = $request->prob_main_4;
    $prob_main_5 = $request->prob_main_5;
    $prob_main_6 = $request->prob_main_6;
    $prob_feeder = $request->prob_feeder;
    $prob_delivery = $request->prob_delivery;
    $prob_details = $request->prob_details;
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valReq = \Validator::make($request->all(), ['department' => 'required:maint_request_info',
        'machine' => 'required:maint_request_info',
        'eta_lvl' => 'required:maint_request_info',
        'prob_category' => 'required:maint_request_info',
        'request_date' => 'required:maint_request_info']);

    if ($valReq->fails()) {
    return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    //return response()->json(['error' => $prob_main_1, 'status' => 'error']);
    }
    
    DB::statement("UPDATE maint_request_info SET department = ?, machine = ?, eta_lvl = ?, request_date = ?, prob_category = ?, prob_main_1 = ?,  prob_main_2 = ?, prob_main_3 = ?, prob_main_4 = ?, prob_main_5 = ?, prob_main_6 = ?, prob_feeder = ?, prob_delivery = ?, prob_details = ?, updated_by = ?, updated_at = ? WHERE req_id = ?",
    [$department,$machine,$eta_lvl,$request_date,$prob_category,$prob_main_1,$prob_main_2,$prob_main_3,$prob_main_4,$prob_main_5,$prob_main_6,$prob_feeder,$prob_delivery,$prob_details,$user,$now,$request->req_id]);
  }

  public function delete(Request $request) {
    DB::statement("DELETE FROM maint_request_info where req_id = ?",
                   [$request->req_id]);
  }

  public function approve(Request $request) {
    DB::statement("UPDATE maint_request_info SET status = 'Approved' where req_id = ?",
                   [$request->req_id]);
  }

  public function close(Request $request) {
    DB::statement("UPDATE maint_request_info SET status = 'Closed' where req_id = ?",
                   [$request->req_id]);
  }

  public function selectData(){
    $req_id = DB::select("SELECT DISTINCT req_id FROM maint_request_info");
    return response()->json(array('req_id' => $req_id));
    //return Response::json(array('data' => $categories));
  }
}
