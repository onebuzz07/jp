@extends('frontend.layouts.app1')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">

    <!-- [Start] New Request Modal -->
    <!-- <div class="modal fade" id="modalNew" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h3 class="modal-title modal-title-custom" id="exampleModalLongTitle">Add New</h3>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Request By</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_request_by">
                                    <option></option>
                                        @foreach ($select_users as $select_user)
                                            <option>{{ $select_user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Request Date</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <div class='input-group date form-control-custom-modal' id='datetimepicker1'>
                                        <input type='text' class="form-control" id="date_request"/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Customer</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_cust_no" data-live-search="true">
                                        {{--  <optgroup label="New">
                                            <option id="editable_cust" class="editable" value="new">New Customer</option>
                                        </optgroup>  --}}
                                        <option></option>
                                        @foreach ($select_cust_no_masters as $select_cust_no_master)
                                            <option>{{ $select_cust_no_master->cust_no }}</option>
                                        @endforeach
                                        {{--  <input id="select_cust_no_new" class="editOption form-control form-control-custom-modal" style="display:none;"></input>  --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">FG Code</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_part_no" data-live-search="true">  
                                        {{--  <optgroup label="New">
                                            <option id="editable_part" class="editable" value="new">New FG Code</option>
                                        </optgroup>  --}}
                                        <option></option>
                                        @foreach ($select_part_no_masters as $select_part_no_master)
                                            <option>{{ $select_part_no_master->part_no }}</option>
                                        @endforeach
                                        
                                        {{--  <input id="select_part_no_new" class="editOption form-control form-control-custom-modal" style="display:none;"></input>  --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Plate Type</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_plate_type">
                                        <option></option>
                                        <option>H</option>
                                        <option>R</option>
                                        <option>KBA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Quantity</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">WO ID</span>
                                    <input type="text" class="form-control form-control-custom-modal" id="text_wo_id">
                                     {{--  <select class="selectpicker form-control form-control-custom-modal" id="text_wo_id">
                                        <option></option>
                                        @foreach ($select_type_vendors as $select_type_vendor)
                                            <option>{{ $select_type_vendor->value }}</option>
                                        @endforeach
                                    </select>  --}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Require Date</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <div class='input-group date form-control-custom-modal' id='datetimepicker2'>
                                        <input type='text' class="form-control" id="date_require"/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Remarks</span>
                                    <textarea class="form-control" style="width:610px" id="text_remark"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnModalNewClose" type="button" class="btn btn-primary" title="Cancel"><i class="fa fa-ban"></i></button>
                    <button id="btnModalNewSave" type="button" class="btn btn-primary" title="Save"><i class="fa fa-floppy-o"></i></button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- [End] New Request Modal -->

    <!-- [Start] Modify Request Modal -->
    <!-- <div class="modal fade" id="modalModify" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h3 class="modal-title modal-title-custom" id="modalModifyTitle">Modify</h3>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Request By</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_request_by_modify">
                                    <option></option>
                                        @foreach ($select_users as $select_user)
                                            <option>{{ $select_user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Request Date</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <div class='input-group date form-control-custom-modal' id='datetimepicker3'>
                                        <input type='text' class="form-control" id="date_request_modify"/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Plate Type</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_plate_type_modify">
                                        <option></option>
                                        <option>H</option>
                                        <option>R</option>
                                        <option>KBA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Quantity</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_modify" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">WO ID</span>
                                    <input type="text" class="form-control form-control-custom-modal" id="text_wo_id_modify">
                                     {{--  <select class="selectpicker form-control form-control-custom-modal" id="text_wo_id">
                                        <option></option>
                                        @foreach ($select_type_vendors as $select_type_vendor)
                                            <option>{{ $select_type_vendor->value }}</option>
                                        @endforeach
                                    </select>  --}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Require Date</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <div class='input-group date form-control-custom-modal' id='datetimepicker4'>
                                        <input type='text' class="form-control" id="date_require_modify"/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Remarks</span>
                                    <textarea class="form-control" style="width:610px" id="text_remark_modify"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnModalModifyClose" type="button" class="btn btn-primary" title="Cancel"><i class="fa fa-ban"></i></button>
                    <button id="btnModalModifySave" type="button" class="btn btn-primary" title="Save"><i class="fa fa-floppy-o"></i></button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- [End] Modify Request Modal -->

    <!-- [Start] Complete Request Modal -->
    <div class="modal fade" id="modalComplete" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h3 class="modal-title modal-title-custom" id="modalCompleteTitle">Complete Request</h3>
                </div>
                
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Completed By</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_completed_by">
                                    <option></option>
                                        @foreach ($select_users as $select_user)
                                            <option>{{ $select_user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Completed Date</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <div class='input-group date form-control-custom-modal' id='datetimepicker3'>
                                        <input type='text' class="form-control" id="date_completed"/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Qty New</span>
                                    <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_new" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Qty Modify</span>
                                    <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_modify" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Qty Spoil</span>
                                    <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_spoil" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Qty Other</span>
                                    <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_other" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="modal-footer">
                    <button id="btnModalCompleteClose" type="button" class="btn btn-primary" title="Cancel"><i class="fa fa-ban"></i></button>
                    <button id="btnModalCompleteSave" type="button" class="btn btn-primary" title="Save"><i class="fa fa-check"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- [End] Complete Request Modal -->
   
    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-weight:bold">CTP / Job Request</h3>
                <br>
            </div> 
            {{--  @include('frontend.ctp.includes.nav')  --}}
            <!-- @if (access()->hasPermissions(['ctp']))                                 -->
            <div class="panel-body">
                {{-- [Start] Row 1 Selctions --}}
                <div class="row">
                    <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon input-group-addon-custom" id="sizing-addon2" >Request ID</span>
                        <select class="selectpicker form-control" id="select_req_id_form" data-live-search="true">
                        <option></option>
                            @foreach ($select_req_ids as $select_req_id)
                                <option>{{ $select_req_id->req_id }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">WO ID</span>
                            <select class="selectpicker form-control" id="select_wo_id_form" data-live-search="true">
                                <option></option>  
                                @foreach ($select_wo_ids as $select_wo_id)
                                    <option>{{ $select_wo_id->wo_id }}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">Status</span>
                            <select class="selectpicker form-control" id="select_status_form">
                                <option></option>
                                <option selected="selected">New</option>
                                <option>Started</option>
                                <option>Completed</option>
                                <option>Closed</option>
                            </select>
                        </div>
                    </div>
                    
                </div> 
                {{-- [End] Row 1 Selctions --}}
                <br>
                {{-- [Start] Row 2 Buttons --}}
                <div class="row">
                    <div class="col-lg-6">
                        <span>
                            <button type="button" id="btnMoldInfoSearch" class="btn btn-primary" title="Search"><i class="fa fa-search"></i></button>                      
                            <!-- <button id="btnPlateNew" type="button" class="btn btn-primary" data-toggle="modal" title="New"><i class="fa fa-plus-square-o"></i></button>
                            <button id="btnPlateModify" type="button" class="btn btn-primary" data-toggle="modal" title="Modify"><i class="fa fa-edit"></i></button>
                            <button id="btnPlateDelete" type="button" class="btn btn-primary"><i class="fa fa-trash-o" title="Delete"></i></button>  -->
                            <button id="btnStart" type="button" class="btn btn-primary" title="Start Job"><i class="fa fa-play"></i></button>
                            <button id="btnComplete" type="button" class="btn btn-primary" data-toggle="modal" title="Complete Job"><i class="fa fa-check"></i></button> 
                        </span>
                    </div>
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-4">
                        <!-- <div class="input-group">
                            <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">Status</span>
                            <select class="selectpicker form-control" id="select_status_form">
                                <option></option>
                                <option>New</option>
                                <option>Created</option>
                                <option>History</option>
                            </select>
                        </div> -->
                    </div>
                </div>
                {{-- [End] Row 2 Buttons --}}
                </br>
                
                 
                
                {{--  [Start] Table  --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dataTables_wrapper"  >
                            <table id="ctp-table" class="table table-striped table-bordered dt-responsive" style="white-space:nowrap;" cellspacing="0" width="100%">
                                <thead  style="background-color:#d9edf7; color:#31708f">
                                <tr>
                                    <th>Req ID</th>
                                    <th>Status</th>
                                    <th>WO ID</th>
                                    <th>Part No</th>
                                    <th>Customer</th>
                                    <th>Qty</th>
                                    <th>Film Desc</th>
                                    <th>Film Qty</th>
                                    <th>Request By</th>
                                    <th>Request Date</th>
                                    <th>Machine</th>
                                    <th>Print Req</th>
                                    <th>Received By</th>
                                    <th>Required Date</th>
                                    <th>Remark</th>
                                    <th>Qty Scratch MAC</th>
                                    <th>Qty Scratch PM</th>
                                    <th>Qty Dent Mac</th>
                                    <th>Qty Dent PM</th>
                                    <th>Qty Worn Mac</th>
                                    <th>Qty Worn PM</th>
                                    <th>Qty Dirty Mac</th>
                                    <th>Qty Dirty PM</th>
                                    <th>Qty Exp Time</th>
                                    <th>Qty Prod Modify</th>
                                    <th>Completed By</th>
                                    <th>Completed At</th> 
                                    <th>Qty New</th>
                                    <th>Qty Modify</th>
                                    <th>Qty Spoil</th>
                                    <th>Qty Other</th>
                                </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
                {{--  [End] Table  --}}

            </div>
            <!-- @endif -->
        </div>




    {{ Html::script("https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js") }}
    {{ Html::script("https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js") }}
    
    <script>
        var oTable;
        var selectedReqId = undefined;
        var selectedStatus;
        var selectedReqBy;
        var selectedReqDate;
        var selectedPartNo;
        var selectedWoId;
        var selectedCustNo;
        var selectedMoldType;
        var selectedQty;
        var selectedRequireDate;
        var selectedRemark;
    </script>
    <script>
    $(document).ready(function(){
        $('#datetimepicker1').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
        });

        $('#datetimepicker2').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
        });

        $('#datetimepicker3').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
        });

        $('#datetimepicker4').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
        });

        $(".selectpicker").selectpicker();
        $(".bootstrap-select").click(function () {
            $(this).addClass("open");
        });

        var table = $('#ctp-table').DataTable( {
            "scrollY": false,
            "scrollX": true,
            "sScrollX": "100%",
            "sScrollXInner": "100%",
            /*"bScrollCollapse": true,*/
            "searching": false,
            "lengthChange": false,
            "iDisplayLength":10,
            "retrieve": true,
            select: true,
            //"ajax":djson.json,
            processing: true,
            serverSide: true,
            //ajax:"{!! route('frontend.ctp.anyData') !!}"
            
            ajax: {
                    url: "/jobreq/anyDataRequest", 
                    data: function (d) {
                        d.req_id = $('select[id="select_req_id_form"]').val();
                                d.wo_id = $('select[id="select_wo_id_form"]').val();
                                d.status = $('select[id="select_status_form"]').val();
                            }
            },
            
            columns: [
                { data : 'req_id'},
                { data : 'status'},
                { data : 'wo_id'},
                { data : 'part_no'},
                { data : 'cust_no'},
                { data : 'qty'},
                { data : 'film_desc'},
                { data : 'qty_film'},
                { data : 'req_by'},
                { data : 'req_date'},
                { data : 'mac_no'},
                { data : 'print_req'},
                { data : 'received_by'},
                { data : 'require_date'},
                { data : 'remark'},
                { data : 'qty_scratch_mac'},
                { data : 'qty_scratch_pm'},
                { data : 'qty_dent_mac'},
                { data : 'qty_dent_pm'},
                { data : 'qty_worn_mac'},
                { data : 'qty_worn_pm'},
                { data : 'qty_dirty_mac'},
                { data : 'qty_dirty_pm'},
                { data : 'qty_exp_time'},
                { data : 'qty_prod_modify'},
                { data : 'completed_by'},
                { data : 'completed_at'},
                { data : 'qty_new'},
                { data : 'qty_modify'},
                { data : 'qty_spoil'},
                { data : 'qty_other'},
                    ]
        });

        $('#ctp-table').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
                selectedReqId = undefined;
            }else {                   
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                if (table.row( this ).data() == undefined){
                    return;
                }
                selectedReqId = table.row( this ).data().req_id;;
                selectedStatus = table.row( this ).data().status;
                selectedReqBy = table.row( this ).data().req_by;
                selectedReqDate = table.row( this ).data().req_date;
                selectedPartNo = table.row( this ).data().part_no;
                selectedWoId = table.row( this ).data().wo_id;
                selectedCustNo = table.row( this ).data().cust_no;
                selectedMoldType = table.row( this ).data().mold_type;
                selectedQty = table.row( this ).data().qty;
                selectedRequireDate = table.row( this ).data().require_date;
                selectedRemark = table.row( this ).data().remark;
            }
        });
    }); 
    </script> 

    
    <script>
    $(document).ready(function(){
        $("#btnMoldInfoSearch").click(function(){
            $.ajax({url: "/jobreq/anyDataRequest", data: { part_no: 1 },
                success: function(result){
                    oTable = $('#ctp-table').DataTable();
                    oTable.draw();
                    selectedReqId = undefined;
                }
            });
        });
    });
    </script>

    {{--  [Start] Modal New Scripts  --}}
    <!-- <script>
        $(function(){
            $('#btnPlateNew').click(function(e){
                $("#select_request_by").val('');
                $("#datetimepicker1").data('DateTimePicker').date(new Date());
                $("#select_cust_no").val('');
                $("#select_part_no").val('');
                $("#select_plate_type").val('');
                $("#input_qty").val('0');
                $("#text_wo_id").val('');
                $("#datetimepicker2").data('DateTimePicker').date(new Date());
                $("#text_remark").val('');

                $('.selectpicker').selectpicker('refresh');

                e.preventDefault();
                $('#modalNew').modal('show');
            });
        });

        $(function(){
            $('#btnModalNewSave').click(function(e){
                e.preventDefault();
                e.stopPropagation();
                $.confirm({
                    icon: 'fa fa-info-circle',
                    title: 'Saving',
                    content: 'Confirm save?',
                    type: 'blue', 
                    buttons: {
                        Yes: function(yesButton){
                            $.ajax({
                                url: "/ctp/insertRequest", 
                                data: { 
                                    req_by : $("#select_request_by").val(),
                                    req_date: $("#datetimepicker1").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),   
                                    part_no : $("#select_part_no").val(), 
                                    wo_id : $("#text_wo_id").val(),
                                    cust_no : $("#select_cust_no").val(),
                                    mold_type : $("#select_plate_type").val(),
                                    qty : $("#input_qty").val(),
                                    require_date : $("#datetimepicker2").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),
                                    remark : $("#text_remark").val(),
                                },
                                success: function(result){
                                    if (result.error){
                                        $.confirm({
                                            type: 'red', 
                                            icon: 'fa fa-exclamation-circle',
                                            title: 'Error',
                                            content: result.error,
                                            buttons: { OK : function (){}}
                                        });
                                        return false;
                                    }
                                    $.confirm({
                                        type: 'blue', 
                                        icon: 'fa fa-info-circle',
                                        title: 'Saved',
                                        content: 'Record has been saved. ID : [' + result.success + ']',
                                        buttons: { OK : function (){
                                            $('#modalNew').modal('hide');
                                            $('.modal-backdrop').remove();
                                            $('#ctp-table').DataTable().draw();
                                        }}
                                    });
                                    return false;
                                },
                                error: function (request, status, error) {
                                    alert(error);
                                    return false;
                                }});
                        },
                        No: function () {}
                    }
                });
            });
        });


        $(function(){
            $('#btnModalNewClose').click(function(e){
                e.preventDefault();
                ModalCloseWarning('#modalNew');
            });
        });
       
    </script> -->
    {{--  [End] Modal New Scripts  --}}

    {{--  [Start] Modal Modify Scripts  --}}
    <!-- <script>
        $(function(){
            $('#btnPlateModify').click(function(e){
                if (selectedReqId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record to be modified.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                if (selectedStatus != 'New'){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record with status [New] to be modified.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                $("#modalModifyTitle").text("Modify ( ID : " + selectedReqId + ")");


                $("#select_request_by_modify").val(selectedReqBy);
                $("#datetimepicker3").data('DateTimePicker').date(new Date(selectedReqDate));
                $("#select_plate_type_modify").val(selectedMoldType);
                $("#input_qty_modify").val(selectedQty);
                $("#text_wo_id_modify").val(selectedWoId);
                $("#datetimepicker4").data('DateTimePicker').date(new Date(selectedRequireDate));
                $("#text_remark_modify").val(selectedRemark);

                $('.selectpicker').selectpicker('refresh');

                e.preventDefault();
                $('#modalModify').modal('show');
            });
        });

        $(function(){
            $('#btnModalModifySave').click(function(e){
               // $('#formNew').validator();
            e.preventDefault();
            e.stopPropagation();
            $.confirm({
                icon: 'fa fa-info-circle',
                title: 'Saving',
                content: 'Confirm save?',
                type: 'blue', 
                //theme: 'supervan', 
                buttons: {
                    Yes: function(yesButton){
                        
                         $.ajax({
                            url: "/ctp/modifyRequest", 
                            data: { 
                                req_id : selectedReqId,
                                req_by : $("#select_request_by_modify").val(),
                                req_date: $("#datetimepicker3").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),   
                                wo_id : $("#text_wo_id_modify").val(),
                                mold_type : $("#select_plate_type_modify").val(),
                                qty : $("#input_qty_modify").val(),
                                require_date : $("#datetimepicker4").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),
                                remark : $("#text_remark_modify").val(),
                                
                            },
                            success: function(result){
                                if (result.error){
                                    //alert(result.error.cust_no[0]);
                                    //alert(result.error);
                                    $.confirm({
                                        //theme: 'supervan',
                                        type: 'red', 
                                        icon: 'fa fa-exclamation-circle',
                                        title: 'Error',
                                        content: result.error,
                                        buttons: { OK : function (){}}
                                    });
                                    return false;
                                }
                                $.confirm({
                                    //theme: 'supervan',
                                    type: 'blue', 
                                    icon: 'fa fa-info-circle',
                                    title: 'Saved',
                                    content: 'Record has been saved.',
                                    buttons: { OK : function (){
                                        selectedMoldId = undefined;
                                        $('#modalModify').modal('hide');
                                        $('.modal-backdrop').remove();
                                        $('#ctp-table').DataTable().draw();
                                        
                                    }}
                                });
                                
                                return false;
                            },
                            error: function (request, status, error) {
                                alert(error);
                                return false;
                            }});
                            
                        
                    },
                    No: function () {
                    }
                }
            });
            });
        });

        $(function(){
            $('#btnModalModifyClose').click(function(e){
                e.preventDefault();
                ModalCloseWarning('#modalModify')           
            });
        });
        
    </script> -->
    {{--  [End] Modal Modify Scripts  --}}

    {{--  [Start] Modal Delete Scripts  --}}
    <script>
        $(function(){
            $('#btnPlateDelete').click(function(e){
                if (selectedReqId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record to be deleted.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                if (selectedStatus != 'New'){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record with status [New] to be deleted.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                $.confirm({
                    type: 'blue', 
                    icon: 'fa fa-info-circle',
                    title: 'Deleting',
                    content: 'Are you sure you want to delete ID [' + selectedReqId + ']?',
                    buttons: { 
                        Yes: function(yesButton){
                            $.ajax({
                                url: "/ctp/deleteRequest", 
                                data: { 
                                    req_id: selectedReqId,
                                },
                                success: function(result){
                                    if (result.error){
                                        $.confirm({
                                            type: 'red', 
                                            icon: 'fa fa-exclamation-circle',
                                            title: 'Error',
                                            content: result.error,
                                            buttons: { OK : function (){}}
                                        });
                                        return false;
                                    }
                                    $.confirm({
                                        type: 'blue', 
                                        icon: 'fa fa-info-circle',
                                        title: 'Deleted',
                                        content: 'Record has been deleted.',
                                        buttons: { OK : function (){
                                            $('.selectpicker').selectpicker('refresh');
                                            selectedReqId = undefined;
                                            $('#ctp-table').DataTable().draw();  
                                        }}
                                    });
                                    return false;
                                    
                                },
                                error: function (request, status, error) {
                                    alert(error);
                                    return false;
                                }});
                        },No: function () {
                        }
                    }
                });
                return false;
            });
        });
    </script>
    {{--  [End] Modal Delete Scripts  --}}

    {{--  [Start] Modal Start Job Scripts  --}}
    <script>
        $(function(){
            $('#btnStart').click(function(e){
                if (selectedReqId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record to start.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                if (selectedStatus != 'New'){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record with status [New] to start.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                $.confirm({
                    type: 'blue', 
                    icon: 'fa fa-info-circle',
                    title: 'Starting',
                    content: 'Are you sure you want to start Request ID [' + selectedReqId + ']?',
                    buttons: { 
                        Yes: function(yesButton){
                            $.ajax({
                                url: "/jobreq/startRequest", 
                                data: { 
                                    req_id: selectedReqId,
                                },
                                success: function(result){
                                    if (result.error){
                                        $.confirm({
                                            type: 'red', 
                                            icon: 'fa fa-exclamation-circle',
                                            title: 'Error',
                                            content: result.error,
                                            buttons: { OK : function (){}}
                                        });
                                        return false;
                                    }
                                    $.confirm({
                                        type: 'blue', 
                                        icon: 'fa fa-info-circle',
                                        title: 'Started',
                                        content: 'Record has been started.',
                                        buttons: { OK : function (){
                                            $('.selectpicker').selectpicker('refresh');
                                            selectedReqId = undefined;
                                            $('#ctp-table').DataTable().draw();  
                                        }}
                                    });
                                    return false;
                                    
                                },
                                error: function (request, status, error) {
                                    alert(error);
                                    return false;
                                }});
                        },No: function () {
                        }
                    }
                });
                return false;
            });
        });
    </script>
    {{--  [End] Modal Start Job Scripts  --}}

    {{--  [Start] Modal Complete Scripts  --}}
    <script>
        $(function(){
            $('#btnComplete').click(function(e){
                if (selectedReqId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record to complete.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                if (selectedStatus != 'Started'){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record with status [Started] to complete.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                $("#modalCompleteTitle").text("Complete Request ( ID : " + selectedReqId + ")");


                $("#select_completed_by").val('');
                $("#datetimepicker3").data('DateTimePicker').date(new Date());
                $("#input_qty_new").val('0');
                $("#input_qty_modify").val('0');
                $("#input_qty_spoil").val('0');
                $("#input_qty_other").val('0');

                $('.selectpicker').selectpicker('refresh');

                e.preventDefault();
                $('#modalComplete').modal('show');
            });
        });

        $(function(){
            $('#btnModalCompleteSave').click(function(e){
               // $('#formNew').validator();
            e.preventDefault();
            e.stopPropagation();
            $.confirm({
                icon: 'fa fa-info-circle',
                title: 'Saving',
                content: 'Confirm complete?',
                type: 'blue', 
                //theme: 'supervan', 
                buttons: {
                    Yes: function(yesButton){
                        
                         $.ajax({
                            url: "/jobreq/completeRequest", 
                            data: { 
                                req_id : selectedReqId,
                                completed_by : $("#select_completed_by").val(),
                                completed_at: $("#datetimepicker3").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),   
                                qty_new : $("#input_qty_new").val(),
                                qty_modify : $("#input_qty_modify").val(),
                                qty_spoil : $("#input_qty_spoil").val(),
                                qty_other : $("#input_qty_other").val(),
                                
                            },
                            success: function(result){
                                if (result.error){
                                    //alert(result.error.cust_no[0]);
                                    //alert(result.error);
                                    $.confirm({
                                        //theme: 'supervan',
                                        type: 'red', 
                                        icon: 'fa fa-exclamation-circle',
                                        title: 'Error',
                                        content: result.error,
                                        buttons: { OK : function (){}}
                                    });
                                    return false;
                                }
                                $.confirm({
                                    //theme: 'supervan',
                                    type: 'blue', 
                                    icon: 'fa fa-info-circle',
                                    title: 'Saved',
                                    content: 'Record has been completed.',
                                    buttons: { OK : function (){
                                        selectedMoldId = undefined;
                                        $('#modalComplete').modal('hide');
                                        $('.modal-backdrop').remove();
                                        $('#ctp-table').DataTable().draw();
                                        
                                    }}
                                });
                                
                                return false;
                            },
                            error: function (request, status, error) {
                                alert(error);
                                return false;
                            }});
                            
                        
                    },
                    No: function () {
                    }
                }
            });
            });
        });

        $(function(){
            $('#btnModalCompleteClose').click(function(e){
                e.preventDefault();
                ModalCloseWarning('#modalComplete')           
            });
        });
        
    </script>
    {{--  [End] Modal Complete Scripts  --}}

    <script>
        function ModalCloseWarning(modalName){
            $.confirm({
                type: 'orange',
                icon: 'fa fa-warning',
                title: 'Warning',
                content: 'Record not saved, comfirm close?',
                buttons: {
                    Yes: function(yesButton){
                        $(modalName).modal('hide');
                        $('.modal-backdrop').remove();
                    },
                    No: function () {
                    }
                }
            });
        };
    </script>

  
@stop
