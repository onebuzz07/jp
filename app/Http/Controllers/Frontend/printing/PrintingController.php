<?php

namespace App\Http\Controllers\Frontend\printing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Models\Access\printing;
use App\Models\Access\sales;
use App\Models\Access\ctp;
use App\Models\Access\plan;
use App\Models\Access\item;
use App\Models\Access\Repeat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;

class PrintingController extends Controller
{
      protected $users;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function index(){
  $select_wo_ids = DB::select("SELECT DISTINCT wo_id FROM prod_wo_trans");
  $select_work_centers = DB::select("SELECT DISTINCT work_center FROM prod_wo_trans");
  $select_wo_id_masters = DB::select("SELECT DISTINCT wo_lot AS wo_id FROM wo_mstr");
  $select_work_center_masters = DB::select("SELECT DISTINCT wc_wkctr as work_center FROM wc_wkctr;");
  $select_emp_name_masters = DB::select("SELECT emp_name FROM emp_mstr;");
  $select_um_masters = DB::select("SELECT um_code AS um FROM um_mstr;");

  return view('frontend.printing.index')->with('select_wo_ids',$select_wo_ids)
                                        ->with('select_work_centers',$select_work_centers)
                                        ->with('select_wo_id_masters',$select_wo_id_masters)
                                        ->with('select_work_center_masters',$select_work_center_masters)
                                        ->with('select_emp_name_masters',$select_emp_name_masters)
                                        ->with('select_um_masters',$select_um_masters);
}

public function index_plate(){
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
    $select_req_ids = DB::select("SELECT req_id AS req_id FROM ctp_mold_request WHERE status = 'Closed' AND IFNULL(plate_id,'') = ''");
    $select_plate_id_fds = DB::select("SELECT DISTINCT mold_id_fd FROM ctp_mold_info WHERE mold_cat = 'fd' AND IFNULL(mold_id_fd,'') <> ''");
    //$select_printers = DB::select("SELECT DISTINCT wr_mch AS printer FROM wr_route WHERE wr_mch IS NOT NULL");
    //$sales=Sales::where('status','CTP Dept')->get();


    return view('frontend.printing.index_plate')->with('mold_infos',$mold_infos)
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
                                        ->with('select_plate_id_fds',$select_plate_id_fds);
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
    $select_mac_no_dcs = DB::select("SELECT `value` FROM drop_down_list WHERE `type` = 'mac_no_dc'");
    $select_cust_no_masters = DB::select("SELECT DISTINCT cm_sort AS cust_no FROM cm_mstr");
    $select_part_no_masters = DB::select("SELECT DISTINCT pt_part AS part_no FROM pt_mstr");
    //$select_printers = DB::select("SELECT DISTINCT wr_mch AS printer FROM wr_route WHERE wr_mch IS NOT NULL");
    //$sales=Sales::where('status','CTP Dept')->get();


    return view('frontend.printing.index_dc')->with('mold_infos',$mold_infos)
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
                                        ->with('select_mac_no_dcs',$select_mac_no_dcs);
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


    return view('frontend.printing.index_fd')->with('mold_infos',$mold_infos)
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


    return view('frontend.printing.index_ff')->with('mold_infos',$mold_infos)
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
    return view('frontend.printing.drop_down');
    //return view('frontend.ctp.index',['mold_infos'=>$mold_infos]);
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


    return view('frontend.printing.trans')->with('mold_infos',$mold_infos)
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


    return view('frontend.printing.trans_dc')->with('mold_infos',$mold_infos)
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


    return view('frontend.printing.trans_fd')->with('mold_infos',$mold_infos)
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


    return view('frontend.printing.trans_ff')->with('mold_infos',$mold_infos)
                                        ->with('select_cust_nos',$select_cust_nos)
                                        ->with('select_part_nos',$select_part_nos)
                                        ->with('select_plate_ids',$select_plate_ids)
                                        ->with('select_statuss',$select_statuss)
                                        ->with('select_users',$select_users)
                                        ->with('select_wos',$select_wos)
                                        ->with('select_printers',$select_printers);
}

public function view(Request $request){
    $part_no = $request->part_no;
    $work_center = $request->work_center;
    //$fileName = "IHpmU4Kxs9jwvcSJ8x2jbnuHLGpUw4woZM2CwBNc.pdf";
    $type = 'file';
    //return response()->json(['error' => 'y', 'status' => 'error']);
    $fileName = DB::table('prod_wc_mstr')
    ->where(function ($query) use ($work_center,$part_no){
        $query->where('wc', $work_center)->where('part_no', $part_no);
    })
    ->value('file_store');

    if ($fileName == ''){
        return response()->json(['error' => 'No file to view.', 'status' => 'error']);
    }
    
    //$content = file_get_contents(storage_path('app/'.$type.'/'.$fileName));
    //$content = file_get_contents(storage_path('app/'.$type.'/IHpmU4Kxs9jwvcSJ8x2jbnuHLGpUw4woZM2CwBNc.pdf'));
    //$content = file_get_contents(storage_path('public/'.$fileName));
    //return response()->json(['error' => Storage::url($fileName), 'status' => 'error']);
    //return Storage::url($fileName);
    return response()->json(['msg' => Storage::url($fileName), 'status' => 'success']);
/* return Response($content, 200, [
'Content-Type' => 'application/pdf',
'Content-Disposition' => "inline; filename=\"$fileName\""
]); */

/* return response(Storage::disk('local')->get('temppdf/' . $pdfname), 200)
              ->header('Content-Type', 'application/pdf'); */
}

public function employee(){
    $select_emp_ids = DB::select("SELECT DISTINCT emp_id FROM emp_mstr");
    $select_emp_names = DB::select("SELECT DISTINCT emp_name FROM emp_mstr");
  
    return view('frontend.printing.employee')->with('select_emp_ids',$select_emp_ids)
                                             ->with('select_emp_names',$select_emp_names);
}

public function wc(){
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM prod_wc_mstr");
    $select_wcs = DB::select("SELECT DISTINCT wc FROM prod_wc_mstr");
    $select_part_no_masters = DB::select("SELECT DISTINCT pt_part AS part_no FROM pt_mstr WHERE pt_status = 'ACTIVE' AND pt_part_type LIKE 'FG%'");
    $select_wc_masters = DB::select("SELECT DISTINCT wc_wkctr AS wc FROM wc_wkctr");
  
    return view('frontend.printing.wc')->with('select_part_nos',$select_part_nos)
                                       ->with('select_wcs',$select_wcs)
                                       ->with('select_part_no_masters',$select_part_no_masters)
                                       ->with('select_wc_masters',$select_wc_masters);
                                       /* $fileName = "IHpmU4Kxs9jwvcSJ8x2jbnuHLGpUw4woZM2CwBNc.pdf";
                                       $type = 'file';
                                   
                                       $content = file_get_contents(storage_path('app/'.$type.'/'.$fileName));
                                       
                                       return Response($content, 200, [
                                        'Content-Type' => 'application/pdf',
                                        'Content-Disposition' => "inline; filename=\"$fileName\""
                                        ]);  */
                                       
}

public function pack(){
    $select_part_nos = DB::select("SELECT DISTINCT part_no FROM prod_pack_mstr");
    $select_part_no_masters = DB::select("SELECT DISTINCT pt_part AS part_no FROM pt_mstr WHERE pt_status = 'ACTIVE' AND pt_part_type LIKE 'FG%'");
    $select_wc_masters = DB::select("SELECT DISTINCT wc_wkctr AS wc FROM wc_wkctr");
    $select_um_masters = DB::select("SELECT um_code AS um FROM um_mstr;");
  
    return view('frontend.printing.pack')->with('select_part_nos',$select_part_nos)
                                         ->with('select_part_no_masters',$select_part_no_masters)
                                         ->with('select_wc_masters',$select_wc_masters)
                                         ->with('select_um_masters',$select_um_masters);
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


    return view('frontend.printing.request')->with('mold_infos',$mold_infos)
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

public function anyData(Request $request){
    $prod_wo_trans = DB::table('prod_wo_trans')
    ->select(["trans_id","wo_id","work_center","mac_no","wo_qty_ord","qty_complete","qty_complete_pack","um_qty_complete","qty_reject","qty_reject_pack","um_qty_reject","time_start","time_stop","status","created_by","created_at","transfer_by","transfer_at","emp_name","wo_part","wo_ptdesc","pt_um"])
    ->join('wo_mstr', 'wo_mstr.wo_lot', '=', 'prod_wo_trans.wo_id')
    ->join('pt_mstr','pt_mstr.pt_part', '=', 'wo_mstr.wo_part')
    ->where(function ($query) use ($request) {
        if ($request->has('work_center')) {
            $query->where('work_center', '=', $request->get('work_center')); 
        }

        if ($request->has('wo_id')) {
            $query->where('wo_id', '=', $request->get('wo_id'));
        }

        if ($request->has('status')) {
            $query->where('status', '=', $request->get('status'));
        }

        if ($request->has('work_center') == false && $request->has('wo_id') == false && $request->has('status') == false) {
            $query->where('wo_id', '=', ''); 
        }
    });    

    return Datatables::of($prod_wo_trans)
    ->make(true);
}

public function anyDataEmp(Request $request){
    $emp_mstr = DB::table('emp_mstr')
    ->select(["emp_id","emp_name","date_start","date_end"])
    ->where(function ($query) use ($request) {
        if ($request->has('emp_id')) {
            $query->where('emp_id', '=', $request->get('emp_id')); 
        }

        if ($request->has('emp_name')) {
            $query->where('emp_name', '=', $request->get('emp_name'));
        }

        if ($request->has('emp_id') == false && $request->has('emp_name') == false) {
            $query->where('emp_name', '=', ''); 
        }
    });    

    return Datatables::of($emp_mstr)
    ->make(true);
}

public function anyDataWc(Request $request){
    $prod_wc_mstr = DB::table('prod_wc_mstr')
    ->select(["part_no","wc","emp_flag","file_link"])
    ->where(function ($query) use ($request) {
        if ($request->has('part_no')) {
            $query->where('part_no', '=', $request->get('part_no')); 
        }

        if ($request->has('wc')) {
            $query->where('wc', '=', $request->get('wc'));
        }

        if ($request->has('part_no') == false && $request->has('wc') == false) {
            $query->where('part_no', '=', ''); 
        }
    });    

    return Datatables::of($prod_wc_mstr)
    ->make(true);
}

public function anyDataPack(Request $request){
    $prod_pack_mstr = DB::table('prod_pack_mstr')
    ->select(["part_no","pt_um","pt_custname","wc","pack_qty","pack_um"])
    ->join('pt_mstr', 'pt_mstr.pt_part', '=', 'prod_pack_mstr.part_no')
    ->where(function ($query) use ($request) {
        if ($request->has('part_no')) {
            $query->where('part_no', '=', $request->get('part_no')); 
        }

        if ($request->has('part_no') == false) {
            $query->where('part_no', '=', ''); 
        }
    });    

    return Datatables::of($prod_pack_mstr)
    ->make(true);
}

public function selectData(){
    $work_center = DB::select("SELECT DISTINCT work_center FROM prod_wo_trans");
    $wo_id = DB::select("SELECT DISTINCT wo_id FROM prod_wo_trans");

    return response()->json(array('work_center' => $work_center,'wo_id' => $wo_id));
}

public function selectDataEmp(){
    $emp_id = DB::select("SELECT DISTINCT emp_id FROM emp_mstr");
    $emp_name = DB::select("SELECT DISTINCT emp_name FROM emp_mstr");

    return response()->json(array('emp_id' => $emp_id,'emp_name' => $emp_name));
}

public function selectDataWc(){
    $part_no = DB::select("SELECT DISTINCT part_no FROM prod_wc_mstr");
    $wc = DB::select("SELECT DISTINCT wc FROM prod_wc_mstr");

    return response()->json(array('part_no' => $part_no,'wc' => $wc));
}

public function selectDataPack(){
    $part_no = DB::select("SELECT DISTINCT part_no FROM prod_pack_mstr");

    return response()->json(array('part_no' => $part_no));
}

public function selectDataWorkCenter(Request $request){
    $work_center = $request->work_center;

    $mac_no = DB::select("SELECT DISTINCT wc_mch AS mac_no FROM wc_wkctr WHERE wc_wkctr = '" . $work_center ."'");

    return response()->json(array('mac_no' => $mac_no));
}

public function selectDataWoId(Request $request){
    $wo_id = $request->wo_id;

    $qty_ordered = DB::table('wo_mstr')
    ->where(function ($query) use ($wo_id){
        $query->where('wo_lot', $wo_id);
    })
    ->value('wo_qty_ord');

    $qty_complete_tot = DB::table('prod_wo_trans')
    ->where(function ($query) use ($wo_id){
        $query->where('wo_id', $wo_id);
    })
    ->sum('qty_complete');

    $wo_part = DB::table('wo_mstr')
    ->where(function ($query) use ($wo_id){
        $query->where('wo_lot', $wo_id);
    })
    ->value('wo_part');

    if ($qty_ordered == ''){
        $qty_ordered = 0;
    }

    if ($qty_complete_tot == ''){
        $qty_complete_tot = 0;
    }
    return response()->json(array('qty_ordered' => $qty_ordered,'qty_complete_tot' => $qty_complete_tot,'wo_part' => $wo_part));
}

public function selectDataWoEmp(Request $request){
    $part_no = $request->part_no;
    $wc = $request->wc;

    $emp_flag = DB::table('prod_wc_mstr')
    ->where(function ($query) use ($part_no,$wc){
        $query->where('part_no', $part_no)->where('wc', $wc);
    })
    ->value('emp_flag');

    $pack_um = DB::select("SELECT pack_um AS pack_um FROM prod_pack_mstr WHERE part_no = '".$part_no."' AND wc = '".$wc."' UNION ALL SELECT pt_um AS pack_um FROM pt_mstr WHERE pt_part = '".$part_no."';");
    $pack_um_count = DB::table('prod_pack_mstr')
    ->where(function ($query) use ($part_no,$wc){
        $query->where('part_no', $part_no)->where('wc', $wc);
    })
    ->count();

    $part_um = DB::table('pt_mstr')
    ->where(function ($query) use ($part_no){
        $query->where('pt_part', $part_no);
    })
    ->value('pt_um');

    if ($pack_um_count == 0){
        $pack_um = DB::select("SELECT pt_um AS pack_um FROM pt_mstr WHERE pt_part = '".$part_no."';");
    }

    return response()->json(array('emp_flag' => $emp_flag,'pack_um' => $pack_um,'pack_um_count' => $pack_um_count,'part_um' => $part_um));
}

public function selectDataPartNo(Request $request){
    $part_no = $request->part_no;

    $pt_um = DB::table('pt_mstr')
    ->where(function ($query) use ($part_no){
        $query->where('pt_part', $part_no);
    })
    ->value('pt_um');

    $pt_custname = DB::table('pt_mstr')
    ->where(function ($query) use ($part_no){
        $query->where('pt_part', $part_no);
    })
    ->value('pt_custname');

    return response()->json(array('pt_um' => $pt_um,'pt_custname' => $pt_custname));
}

public function selectDataPartUm(Request $request){
    $part_no = $request->part_no;
    $um = $request->um;
    $wc = $request->wc;

    $pack_qty = DB::table('prod_pack_mstr')
    ->where(function ($query) use ($part_no,$um,$wc){
        $query->where('part_no', $part_no)->where('pack_um', $um)->where('wc', $wc);
    })
    ->value('pack_qty');

    if ($pack_qty == ''){
        $pack_qty = 1;
    }

    return response()->json(array('pack_qty' => $pack_qty));
}

public function insert(Request $request) {
    
    $wo_id = $request->wo_id;
    $work_center = $request->work_center;
    $mac_no = $request->mac_no;
    $qty_complete = $request->qty_complete;
    $qty_reject = $request->qty_reject;
    $time_start = $request->time_start;
    $time_stop = $request->time_stop;
    $qty_complete_pack = $request->qty_complete_pack;
    $qty_reject_pack = $request->qty_reject_pack;
    $um_qty_complete = $request->um_qty_complete;
    $um_qty_reject = $request->um_qty_reject;
    $user = $request->user()->email;

    $valReq = \Validator::make($request->all(), ['wo_id' => 'required:prod_wo_trans','work_center' => 'required:prod_wo_trans']);

    
    $valQtyComplate = \Validator::make($request->all(), ['qty_complete' => 'required|between:0,9999999999.99999999']);
    $valQtyReject = \Validator::make($request->all(), ['qty_reject' => 'required|between:0,9999999999.99999999']);


    if ($mac_no == ''){
        $existMacNo = DB::table('wc_wkctr')
        ->where(function ($query) use ($work_center,$mac_no){
            $query->where('wc_wkctr', $work_center)->where('wc_mch', '');
        })
        ->value('wc_wkctr');
    }else{
        $existMacNo = DB::table('wc_wkctr')
        ->where(function ($query) use ($work_center,$mac_no){
            $query->where('wc_wkctr', $work_center)->where('wc_mch', $mac_no);
        })
        ->value('wc_wkctr');
    }

    

    $existWoId = DB::table('wr_route')
    ->where(function ($query) use ($work_center,$wo_id){
        $query->where('wr_wkctr', $work_center)->where('wr_lot', $wo_id);
    })
    ->value('wr_wkctr');

    if ($valQtyComplate->fails()) {
        //return response()->json(['error' => $user, 'status' => 'error']);
        return response()->json(['error' => 'Quantity Complete format invalid.', 'status' => 'error']);
    }
    if ($valQtyReject->fails()) {
        return response()->json(['error' => 'Quantity Reject format invalid.', 'status' => 'error']);
    }

    if ($valReq->fails()) {
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }

    if ($existMacNo == '') {
        return response()->json(['error' => 'Work Center ['.$work_center.'] and Machine ['.$mac_no.'] does not exist.', 'status' => 'error']);
    }

    if ($existWoId == '') {
        return response()->json(['error' => 'Work Center ['.$work_center.'] and WO ID ['.$wo_id.'] does not exist.', 'status' => 'error']);
    }
   

    $id = DB::table('prod_wo_trans')
    ->insertGetId([
        'wo_id' => $wo_id,
        'work_center' => $work_center,
        'mac_no' => $mac_no,
        'qty_complete' => $qty_complete,
        'qty_reject' => $qty_reject,
        'time_start' => $time_start,
        'time_stop' => $time_stop,
        'status' => 'New',
        'qty_complete_pack' => $qty_complete_pack,
        'qty_reject_pack' => $qty_reject_pack,
        'um_qty_complete' => $um_qty_complete,
        'um_qty_reject' => $um_qty_reject,
        'created_by' => $user,
        'updated_by' => $user,
    ]);
    
    return response()->json(['success' => $id, 'status' => 'success', 'wo_id' => $wo_id, 'mac_no' => $mac_no]);
    // return 'error';
}

public function insertEmp(Request $request) {
    
    $emp_name = $request->emp_name;
    $date_start = $request->date_start;
    $user = $request->user()->email;

    $valReq = \Validator::make($request->all(), ['emp_name' => 'required:emp_mstr','date_start' => 'required:emp_mstr']);

    $existEmpName = DB::table('emp_mstr')
    ->where(function ($query) use ($emp_name){
        $query->where('emp_name', $emp_name);
    })
    ->value('emp_name');


    if ($valReq->fails()) {
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }

    if ($existEmpName != '') {
        return response()->json(['error' => 'Employee Name ['.$emp_name.'] already exist.', 'status' => 'error']);
    }
   

    $id = DB::table('emp_mstr')
    ->insertGetId([
        'emp_name' => $emp_name,
        'date_start' => $date_start,
        'created_by' => $user,
        'updated_by' => $user,
    ]);
    
    return response()->json(['success' => $id, 'status' => 'success', 'emp_id' => $id]);
    // return 'error';
}

public function insertWc(Request $request) {
    
    $filename = '';
    $path = '';
    $user = $request->user()->email;
    $wc = $request->select_work_center_new;
    $part_no = $request->select_part_no_new;
    if ($request->check_emp_flag_new == 'on'){
        $emp_flag = 1;
    }else{
        $emp_flag = 0;
    }

    if ($wc == NULL || $part_no == NULL) {
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }

    $uniquePartNoWc = DB::table('prod_wc_mstr')
    ->where(function ($query) use ($part_no,$wc){
        $query->where('part_no', $part_no)->where('wc', $wc);
    })
    ->value('part_no');

    if ($uniquePartNoWc != '') {
        // return response()->json(['error' => $validator->errors(), 'status' => 'error']);
        return response()->json(['error' => 'Item [' . $part_no . '] and Work Center [' . $wc . '] already exist.', 'status' => 'error']);
     }

    if($request->hasFile('document')){
        $uploadedFile = $request->file('document');  
        $filename = $uploadedFile->getClientOriginalName();      
    }

    if (strtolower(\File::extension($filename)) != 'pdf' && $filename != ''){
        return response()->json(['error' => 'File format invalid.', 'status' => 'error']);
    }

    if ($filename != ''){
        $path = $request->file('document')->store('public');
        $path = str_replace("public/","",$path);
    }

    DB::insert("INSERT INTO prod_wc_mstr (part_no, wc, emp_flag, file_link, file_store, created_by, updated_by)
    VALUES (?,?,?,?,?,?,?)",
    [$part_no,$wc,$emp_flag,$filename,$path,$user,$user]);


    return response()->json(['success' => $path, 'status' => 'success', 'part_no' => $part_no, 'wc' => $wc]);
    //return response()->json(['success' => $path, 'status' => 'success']);
    //return response()->file($path);
}

public function insertPack(Request $request) {
    
    $part_no = $request->part_no;
    $wc = $request->wc;
    $pack_qty = $request->pack_qty;
    $pack_um = $request->pack_um;
    $user = $request->user()->email;

    $valReq = \Validator::make($request->all(), ['part_no' => 'required:prod_pack_mstr','wc' => 'required:prod_pack_mstr','pack_um' => 'required:prod_pack_mstr']);

    $existPartNo = DB::table('prod_pack_mstr')
    ->where(function ($query) use ($part_no,$pack_um){
        $query->where('part_no', $part_no)->where('pack_um', $pack_um);
    })
    ->value('part_no');


    if ($valReq->fails()) {
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }

    if ($existPartNo != '') {
        return response()->json(['error' => 'Item ['.$part_no.'] and Packing UOM ['.$pack_um.'] already exist.', 'status' => 'error']);
    }
   
    DB::insert("INSERT INTO prod_pack_mstr(part_no, wc, pack_qty, pack_um, created_by, updated_by)
    VALUES (?,?,?,?,?,?)",
    [$part_no,$wc,$pack_qty,$pack_um,$user,$user]);
    
    return response()->json(['success' => $part_no, 'status' => 'success', 'part_no' => $part_no]);
    // return 'error';
}

public function modify(Request $request) {
    $wo_id = $request->wo_id;
    $work_center = $request->work_center;
    $mac_no = $request->mac_no;
    $qty_complete = $request->qty_complete;
    $qty_reject = $request->qty_reject;
    $time_start = $request->time_start;
    $time_stop = $request->time_stop;
    $qty_complete_pack = $request->qty_complete_pack;
    $qty_reject_pack = $request->qty_reject_pack;
    $um_qty_reject = $request->um_qty_reject;
    $um_qty_complete = $request->um_qty_complete;
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valQtyComplate = \Validator::make($request->all(), ['qty_complete' => 'required|between:0,9999999999.99999999']);
    $valQtyReject = \Validator::make($request->all(), ['qty_reject' => 'required|between:0,9999999999.99999999']);

    if ($mac_no == ''){
        $existMacNo = DB::table('wc_wkctr')
        ->where(function ($query) use ($work_center,$mac_no){
            $query->where('wc_wkctr', $work_center)->where('wc_mch', '');
        })
        ->value('wc_wkctr');
    }else{
        $existMacNo = DB::table('wc_wkctr')
        ->where(function ($query) use ($work_center,$mac_no){
            $query->where('wc_wkctr', $work_center)->where('wc_mch', $mac_no);
        })
        ->value('wc_wkctr');
    }
    

    if ($valQtyComplate->fails()) {
        //return response()->json(['error' => $user, 'status' => 'error']);
        return response()->json(['error' => 'Quantity Complete format invalid.', 'status' => 'error']);
    }
    if ($valQtyReject->fails()) {
        return response()->json(['error' => 'Quantity Reject format invalid.', 'status' => 'error']);
    }
    if ($existMacNo == '') {
        return response()->json(['error' => 'Work Center ['.$work_center.'] and Machine ['.$mac_no.'] does not exist.', 'status' => 'error']);
    }
    
    DB::statement("UPDATE prod_wo_trans SET mac_no = ?, qty_complete = ?, qty_reject = ?, time_start = ?, time_stop = ?, qty_complete_pack = ?, qty_reject_pack = ?, um_qty_complete = ?, um_qty_reject = ?, updated_by = ?, updated_at = ? WHERE trans_id = ?",
    [$mac_no,$qty_complete,$qty_reject,$time_start,$time_stop,$qty_complete_pack,$qty_reject_pack,$um_qty_complete,$um_qty_reject,$user,$now,$request->trans_id]);

   
}

public function modifyEmp(Request $request) {
    $emp_id = $request->emp_id;
    $date_start = $request->date_start;
    $date_end = $request->date_end;
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valReq = \Validator::make($request->all(), ['date_start' => 'required:emp_mstr']);

    if ($valReq->fails()) {
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }
    
    DB::statement("UPDATE emp_mstr SET date_start = ?, date_end = ?, updated_by = ?, updated_at = ? WHERE emp_id = ?",
    [$date_start,$date_end,$user,$now,$emp_id]);

   
}

public function modifyWc(Request $request) {
    $wc = $request->select_work_center_modify;
    $part_no = $request->select_part_no_modify;
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $filename = '';
    $path = '';
    
    //return response()->json(['success' => $request->check_emp_flag_modify, 'status' => 'success', 'part_no' => $part_no, 'wc' => $request->select_work_center_modify]);

    if ($request->check_emp_flag_modify == 'on'){
        $emp_flag = 1;
    }else{
        $emp_flag = 0;
    }


    if($request->hasFile('document_modify')){
        $uploadedFile = $request->file('document_modify');  
        $filename = $uploadedFile->getClientOriginalName();  
        //return response()->json(['success' => $filename, 'status' => 'success', 'part_no' => $part_no, 'wc' => $request->select_work_center_modify]);    
    }

    if (strtolower(\File::extension($filename)) != 'pdf' && $filename != ''){
        return response()->json(['error' => 'File format invalid.', 'status' => 'error']);
    }
    
    if ($filename != ''){
        $path = $request->file('document_modify')->store('public');
        $path = str_replace("public/","",$path);
    }
    
    $PrevFileStore = DB::table('prod_wc_mstr')
    ->where(function ($query) use ($part_no,$wc){
        $query->where('part_no', $part_no)->where('wc', $wc);
    })
    ->value('file_store');
    

    if ($PrevFileStore != ''){
        try {
            \Storage::disk('public')->delete($PrevFileStore);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'status' => 'error']);
        }
        
    }
    
    DB::statement("UPDATE prod_wc_mstr SET emp_flag = ?, file_link = ?, file_store = ?, updated_by = ?, updated_at = ? WHERE part_no = ? AND wc = ?",
    [$emp_flag,$filename,$path,$user,$now,$part_no,$wc]);
}

public function modifyPack(Request $request) {
    $part_no = $request->part_no;
    $pack_um = $request->pack_um;
    $wc = $request->wc;
    $pack_qty = $request->pack_qty;
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $valReq = \Validator::make($request->all(), ['wc' => 'required:prod_pack_mstr;']);

    if ($valReq->fails()) {
        return response()->json(['error' => 'Please fill in the required fiels (*).', 'status' => 'error']);
    }
    
    DB::statement("UPDATE prod_pack_mstr SET wc = ?, pack_qty = ?, updated_by = ?, updated_at = ? WHERE part_no = ? AND pack_um = ?",
    [$wc,$pack_qty,$user,$now,$part_no,$pack_um]);

   
}

public function delete(Request $request) {
    DB::statement("DELETE FROM prod_wo_trans where trans_id = ?",
                   [$request->trans_id]);
}

public function deleteEmp(Request $request) {
    DB::statement("DELETE FROM emp_mstr where emp_id = ?",
                   [$request->emp_id]);
}

public function deleteWc(Request $request) {
    $part_no = $request->part_no;
    $wc = $request->wc;

    $FileStore = DB::table('prod_wc_mstr')
    ->where(function ($query) use ($part_no,$wc){
        $query->where('part_no', $part_no)->where('wc', $wc);
    })
    ->value('file_store');
    
    Storage::disk('public')->delete($FileStore);

    DB::statement("DELETE FROM prod_wc_mstr where part_no = ? AND wc = ?",
                   [$part_no,$wc]);
}

public function deletePack(Request $request) {
    DB::statement("DELETE FROM prod_pack_mstr where part_no = ? AND pack_um = ?",
                   [$request->part_no,$request->pack_um]);
}

public function transfer(Request $request) {
    $user = $request->user()->email;
    $now = date('Y-m-d H:i:s');

    $prod_wo_trans=DB::table('prod_wo_trans')
    ->select('trans_id', 'wo_id', 'work_center', 'mac_no', 'qty_complete', 'qty_reject', 'time_start', 'time_stop')
    ->where('status', 'New')
    ->get();
    $tot_record_found=0;
    $file_path = "";
    if(count($prod_wo_trans)>0){
        $tot_record_found=count($prod_wo_trans);
         
        $CsvData=array('trans_id|wo_id|work_center|mac_no|qty_complete|qty_reject|date_start|date_stop|time_start|time_stop');          
        foreach($prod_wo_trans as $value){    
            $dt_start = date_create($value->time_start);
            $d_start =  date_format($dt_start, 'Y-m-d');     
            $t_start =  date_format($dt_start, 'H:i:s');   
            $dt_stop = date_create($value->time_stop);
            $d_stop =  date_format($dt_stop, 'Y-m-d');     
            $t_stop =  date_format($dt_stop, 'H:i:s');  
            $CsvData[]=$value->trans_id.'|'.$value->wo_id.'|'.$value->work_center.'|'.$value->mac_no.'|'.$value->qty_complete.'|'.$value->qty_reject.'|'.$d_start.'|'.$t_start.'|'.$d_stop.'|'.$t_stop;
            //$CsvData[]=$value->trans_id.'|'.$value->wo_id.'|'.$value->work_center.'|'.$value->mac_no.'|'.$value->qty_complete.'|'.$value->qty_reject.'|'.date($value->time_start,"Y-m-d").'|'.date($value->time_stop,"Y-m-d").'|'.date($value->time_start,"H:i:s").'|'.date($value->time_stop,"H:i:s");
        }
         
        $filename="prod_wo_trans_".date('Y_m_d_H_i_s').".csv";
        $file_path='c://temp/'.$filename; // Local testing output folder
        //$file_path='/var/tmp/cim/'.$filename; // JP Server output folder
        $file = fopen($file_path,"w+");
        foreach ($CsvData as $exp_data){
          fputcsv($file,explode(',',$exp_data));
        }   
        fclose($file);          
 
        $headers = ['Content-Type' => 'application/csv'];
    }

    DB::statement("UPDATE prod_wo_trans SET status = 'Transfer', transfer_by = ?, transfer_at = ? where status = 'New'",[$user,$now]);
    if ($tot_record_found > 0){
        $msg = $tot_record_found.' record(s) has been transfered. File generated : '.$file_path.'.';
    }else{
        $msg = '0 record has been transfered. No flie generated.';
    }
    return response()->json(['msg' => $msg, 'status' => 'error']);
    
}

public function verify(Request $request) {
    $wo_id = $request->wo_id;
    $barcode = $request->barcode;

    $WoPart = DB::table('wo_mstr')
    ->where(function ($query) use ($barcode,$wo_id){
        $query->where('wo_lot', $wo_id);
    })
    ->value('wo_part');

    $WoPartExist = DB::table('wo_mstr')
    ->where(function ($query) use ($barcode,$wo_id){
        $query->where('wo_part', $barcode)->where('wo_lot', $wo_id);
    })
    ->value('wo_part');

    if ($WoPart == ''){
        $msg = 'Invalid WO ID.';
    }else if ($WoPartExist == ''){
        $msg = 'WO Item ['.$WoPart.'] not match with Barcode Item ['.$barcode.']';
    }else{
        $msg = 'Match.';
    }
    return response()->json(['msg' => $msg, 'status' => 'error']);
}
    public function edit($id)
    {
        // get the sales
        $sales = Sales::find($id);
        // show the edit form and pass the sales
        return view('frontend.printing.edit')
            ->with('sales', $sales);
    }

    public function update($id, Request $request)
    {
          // process the login
          $sales = Sales::find($id);
          $items = Item::find($sales->items->id);

          $remark4 =$request->input('remark4');
          $dom = new \DomDocument();
          $dom->loadHtml($remark4, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
          $sales->remark4 = $dom->saveHTML();

          $sales->confirmby4 = Input::get('confirmby4');
          $sales->status = 'Approved';
          $sales->save();

            // redirect
            return redirect()->route('frontend.printing.index')->withFlashSuccess('The remark is saved.');

    }

   

    public function repeatEdit($id)
    {
        // get the sales
        $repeat = Repeat::find($id);
        // show the edit form and pass the sales
        return view('frontend.printing.repeatEdit')
            ->with('repeat', $repeat);
    }

    public function repeatUpdate($id, Request $request)
    {
          // process the login
          $repeat = Repeat::find($id);
          $items = Item::find($repeat->items->id);
          $remark4 =$request->input('remark4');
          $dom = new \DomDocument();
          $dom->loadHtml($remark4, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
          $repeat->remark4 = $dom->saveHTML();
          $repeat->status = 'Approved(repeat)';
          $repeat->save();

            // redirect
            return redirect()->route('frontend.printing.index')->withFlashSuccess('The remark is saved.');

    }

    public function repeatData()
    {
      if (access()->hasPermissions(['planning']))
      {
          $repeat = Repeat::leftJoin('items', 'items.repeats_id', '=', 'repeats.id' )
          ->select(['repeats.custName', 'items.partNo' , 'items.partDesc','repeats.status', 'repeats.id']);

          return Datatables::of($repeat)
            ->editColumn('id', function ($repeat) {
                      return '<a href="'. route('frontend.printing.repeatEdit', $repeat->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit </a>
                      ';
                  })

          ->escapeColumns([])
          ->where('status', '=', "Printing Dept(repeat)")
          ->make();
        }
        else {
          $repeat = Repeat::leftJoin('items', 'items.repeats_id', '=', 'repeats.id' )
          ->select(['repeats.custName', 'items.partNo' , 'items.partDesc','repeats.status', 'repeats.id']);

          return Datatables::of($repeat)
            ->editColumn('id', function ($repeat)  {
                      return '
                      ';
                  })

          ->escapeColumns([])
          ->where('status', '=', "Printing Dept(repeat)")
          ->make();
        }
    }

    // public function destroy($id)
    // {
    //     $sales = Sales::findOrFail($id)->delete();
    //     // redirect
    //     return redirect()->route('frontend.printing.index')->withFlashSuccess('The data is already deleted.');
    // }
}
