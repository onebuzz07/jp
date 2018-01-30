@extends('frontend.layouts.app1')

@section('content')
    <!-- [Start] New Request Modal -->
    <div class="modal fade" id="modalNew" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h3 class="modal-title modal-title-custom" id="exampleModalLongTitle">New Request</h3>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Department</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <input type="text" class="form-control form-control-custom-modal" id="text_dept">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Machine</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <input type="text" class="form-control form-control-custom-modal" id="text_mac">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">ETA Level</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_eta_lvl" data-live-search="true">
                                        <option></option>
                                        <option value="1">Very Urgent (Immediate)</option>
                                        <option value="2">Urgent (Within 24 Hrs)</option>
                                        <option value="3">Normal</option>
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
                        <div class="panel panel-info">
                            <div class="panel-heading" style="font-weight:bold">
                                Type of Problem
                            </div>
                            <div class="panel-body">
                                
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Category</span>
                                            <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                            <select class="selectpicker form-control form-control-custom-modal" id="select_pro_cat" data-live-search="true">
                                                <option></option>
                                                <option value="E">Electical/Electronic</option>
                                                <option value="M">Mechanical</option>
                                                <option value="O">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Main Body Section</span>
                                            <span class="input-group-addon">
                                                <input id="check_main_1" type="checkbox" aria-label="...">
                                            </span>
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">1</span>
                                            <span class="input-group-addon">
                                                <input id="check_main_2" type="checkbox" aria-label="...">
                                            </span>
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">2</span>
                                            <span class="input-group-addon">
                                                <input id="check_main_3" type="checkbox" aria-label="...">
                                            </span>
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">3</span>
                                            <span class="input-group-addon">
                                                <input id="check_main_4" type="checkbox" aria-label="...">
                                            </span>
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">4</span>
                                            <span class="input-group-addon">
                                                <input id="check_main_5" type="checkbox" aria-label="...">
                                            </span>
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">5</span>
                                            <span class="input-group-addon">
                                                <input id="check_main_6" type="checkbox" aria-label="...">
                                            </span>
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">6</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div class="col-lg-6">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <input id="check_feeder" type="checkbox" aria-label="...">
                                        </span>
                                        <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Feeder Section</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <input id="check_delivery" type="checkbox" aria-label="...">
                                        </span>
                                        <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Delivery Section</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Details</span>
                                            <textarea class="form-control" style="width:620px" id="text_details"></textarea>
                                        </div>
                                    </div>
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
    </div>
    <!-- [End] New Request Modal -->

    <!-- [Start] Modify Request Modal -->
    <div class="modal fade" id="modalModify" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h3 class="modal-title modal-title-custom" id="exampleModalLongTitle">Modify Request</h3>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Department</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <input type="text" class="form-control form-control-custom-modal" id="text_dept_modify">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Machine</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <input type="text" class="form-control form-control-custom-modal" id="text_mac_modify">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">ETA Level</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_eta_lvl_modify" data-live-search="true">
                                        <option></option>
                                        <option value="1">Very Urgent (Immediate)</option>
                                        <option value="2">Urgent (Within 24 Hrs)</option>
                                        <option value="3">Normal</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Request Date</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <div class='input-group date form-control-custom-modal' id='datetimepicker2'>
                                    <input type='text' class="form-control" id="date_request_modify"/>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Type of Problem
                            </div>
                            <div class="panel-body">
                                
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Category</span>
                                            <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                            <select class="selectpicker form-control form-control-custom-modal" id="select_pro_cat_modify" data-live-search="true">
                                                <option></option>
                                                <option value="E">Electical/Electronic</option>
                                                <option value="M">Mechanical</option>
                                                <option value="O">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Main Body Section</span>
                                            <span class="input-group-addon">
                                                <input id="check_main_1_modify" type="checkbox" aria-label="...">
                                            </span>
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">1</span>
                                            <span class="input-group-addon">
                                                <input id="check_main_2_modify" type="checkbox" aria-label="...">
                                            </span>
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">2</span>
                                            <span class="input-group-addon">
                                                <input id="check_main_3_modify" type="checkbox" aria-label="...">
                                            </span>
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">3</span>
                                            <span class="input-group-addon">
                                                <input id="check_main_4_modify" type="checkbox" aria-label="...">
                                            </span>
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">4</span>
                                            <span class="input-group-addon">
                                                <input id="check_main_5_modify" type="checkbox" aria-label="...">
                                            </span>
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">5</span>
                                            <span class="input-group-addon">
                                                <input id="check_main_6_modify" type="checkbox" aria-label="...">
                                            </span>
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">6</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div class="col-lg-6">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <input id="check_feeder_modify" type="checkbox" aria-label="...">
                                        </span>
                                        <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Feeder Section</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <input id="check_delivery_modify" type="checkbox" aria-label="...">
                                        </span>
                                        <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Delivery Section</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Details</span>
                                            <textarea class="form-control" style="width:620px" id="text_details_modify"></textarea>
                                        </div>
                                    </div>
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
    </div>
    <!-- [End] Modify Request Modal -->

    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-weight:bold">Maintenance Request</h3>
                {{--  <br>
                <ul class="nav nav-tabs navbar-custom">
                    <li class="active"><a href="index">New</a></li>
                    <li><a href="trans">In Progress</a></li>
                </ul>  --}}
            </div>
            <br>

        
  
    
  
            <div class="panel-body">
                {{-- [Start] Row 1 Selctions --}}
                <div class="row">
                    <div class="col-lg-3">
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
                    <div class="col-lg-3">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">ETA Level</span>
                            <select class="selectpicker form-control" id="select_eta_lvl_form" data-live-search="true">
                                <option></option>
                                <option value="1">Very Urgent (Immediate)</option>
                                <option value="2">Urgent (Within 24 Hrs)</option>
                                <option value="3">Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">Category</span>
                            <select class="selectpicker form-control" id="select_prob_cat_form" data-live-search="true">
                                <option></option>
                                <option value="E">Electical/Electronic</option>
                                <option value="M">Mechanical</option>
                                <option value="O">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">Status</span>
                            <select class="selectpicker form-control" id="select_status_form">
                                <option></option>
                                <option>New</option>
                                <option>Approved</option>
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
                            <button type="button" id="btnReqSearch" class="btn btn-primary" title="Search"><i class="fa fa-search"></i></button>                      
                            <button id="btnReqNew" type="button" class="btn btn-primary" data-toggle="modal" title="New"><i class="fa fa-plus-square-o"></i></button>
                            <button id="btnReqModify" type="button" class="btn btn-primary" data-toggle="modal" title="Modify"><i class="fa fa-edit"></i></button>
                            <button id="btnReqDelete" type="button" class="btn btn-primary"><i class="fa fa-trash-o" title="Delete"></i></button>
                            <button id="btnReqApprove" type="button" class="btn btn-primary" data-toggle="modal" title="Approve"><i class="fa fa-check-square-o"></i></button>
                            <button id="btnReqClose" type="button" class="btn btn-primary" data-toggle="modal" title="Close"><i class="fa fa-window-close-o"></i></button>  
                        </span>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
                {{-- [End] Row 2 Buttons --}}

                <br>

                {{--  [Start] Table  --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dataTables_wrapper"  >
                            <table id="request-table" class="table table-striped table-bordered dt-responsive" style="white-space:nowrap;" cellspacing="0" width="100%">
                                <thead  style="background-color:#d9edf7; color:#31708f">
                                <tr>
                                    <th rowspan="2" scope="rowgroup" style="vertical-align: middle;">Request ID </th>
                                    <th rowspan="2" scope="rowgroup" style="vertical-align: middle;">Department</th>
                                    <th rowspan="2" scope="rowgroup" style="vertical-align: middle;">Machine</th>
                                    <th rowspan="2" scope="rowgroup" style="vertical-align: middle;">ETA Level</th>
                                    <th rowspan="2" scope="rowgroup" style="vertical-align: middle;">Request Date</th>
                                    <th rowspan="2" scope="rowgroup" style="vertical-align: middle;">Status</th>
                                    <th colspan="10" scope="colgroup" style="text-align: center;">Type of Problem</th>
                                    <th rowspan="2" scope="rowgroup" style="vertical-align: middle;">Request By</th>
                                </tr>
                                    <tr>
                                        <th>Category</th>
                                        <th>Feeder</th>
                                        <th>Delivery</th>
                                        <th>Main Body 1</th>
                                        <th>Main Body 2</th>
                                        <th>Main Body 3</th>
                                        <th>Main Body 4</th>
                                        <th>Main Body 5</th>
                                        <th>Main Body 6</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var oTable;
        var selectedReqId = undefined;
        var selectedDept;
        var selectedMachine;
        var selectedEtaLvl;
        var selectedReqDate;
        var selectedProbCat;
        var selectedProbMain1;
        var selectedProbMain2;
        var selectedProbMain3;
        var selectedProbMain4;
        var selectedProbMain5;
        var selectedProbMain6;
        var selectedProbFeeder;
        var selectedProbDelivery;
        var selectedProbDetails;
    </script>
    <script>
        $(document).ready(function() {
            
            $('#datetimepicker1').datetimepicker({
                format: 'DD/MM/YYYY HH:mm',
            });

            $('#datetimepicker2').datetimepicker({
                format: 'DD/MM/YYYY HH:mm',
            });

            $(".selectpicker").selectpicker();
            $(".bootstrap-select").click(function () {
                $(this).addClass("open");
            });

            var table = $('#request-table').DataTable( {
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
                //ajax:"{!! route('frontend.request.anyData') !!}"
                'columnDefs': [{
                    'targets': [7,8,9,10,11,12,13,14],
                    'searchable':false,
                    'orderable':false,
                    'className': 'dt-body-center',
                    'render': function (data, type, full, meta){
                        return '<input type="checkbox" disabled ' + (data ? ' checked' : '') + '>';
                    }
                }],
                ajax: {
                        url: "/request/anyData", 
                        data: function (d) {
                                    d.req_id = $('select[id="select_req_id_form"]').val();
                                    d.eta_lvl = $('select[id="select_eta_lvl_form"]').val();
                                    d.prob_category = $('select[id="select_prob_cat_form"]').val();
                                    d.status = $('select[id="select_status_form"]').val();
                                }
                },
                columns: [
                            { data: 'req_id'},
                            { data: 'department'},
                            { data: 'machine'},
                            { data: 'eta_lvl'},
                            { data: 'request_date'},
                            { data: 'status'},
                            { data: 'prob_category'},
                            { data: 'prob_feeder'},
                            { data: 'prob_delivery'},
                            { data: 'prob_main_1'},
                            { data: 'prob_main_2'},
                            { data: 'prob_main_3'},
                            { data: 'prob_main_4'},
                            { data: 'prob_main_5'},
                            { data: 'prob_main_6'},
                            { data: 'prob_details'},
                            { data: 'created_by'},
                        ] 
            });
            $('#request-table').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                    selectedReqId = undefined;
                }
                else {
                    
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    if (table.row( this ).data() == undefined){
                        return;
                    }
                    selectedReqId = table.row( this ).data().req_id;
                    selectedDept = table.row( this ).data().department;
                    selectedMachine = table.row( this ).data().machine;
                    selectedEtaLvl = table.row( this ).data().eta_lvl;
                    if (selectedEtaLvl == 'Very Urgent'){selectedEtaLvl = 1}else if(selectedEtaLvl == 'Urgent'){selectedEtaLvl = 2}else if(selectedEtaLvl == 'Normal'){selectedEtaLvl = 3};
                    selectedReqDate = table.row( this ).data().request_date;
                    selectedProbCat = table.row( this ).data().prob_category;
                    if (selectedProbCat == 'Electical/Electronic'){selectedProbCat = 'E'}else if (selectedProbCat == 'Mechanical'){selectedProbCat = 'M'}else if (selectedProbCat == 'Others'){selectedProbCat = 'O'}
                    selectedProbMain1 = table.row( this ).data().prob_main_1;
                    selectedProbMain2 = table.row( this ).data().prob_main_2;
                    selectedProbMain3 = table.row( this ).data().prob_main_3;
                    selectedProbMain4 = table.row( this ).data().prob_main_4;
                    selectedProbMain5 = table.row( this ).data().prob_main_5;
                    selectedProbMain6 = table.row( this ).data().prob_main_6;
                    selectedProbFeeder = table.row( this ).data().prob_feeder;
                    selectedProbDelivery = table.row( this ).data().prob_delivery;
                    selectedProbDetails = table.row( this ).data().prob_details;
                    selectedStatus = table.row( this ).data().status;
                    //alert(selectedProbMain1);
                }
            });
        });
    </script>

    {{--  [Start] Modal New Scripts  --}}
    <script>
    
        $(function(){
            $('#btnReqNew').click(function(e){
                $("#text_dept").val('');
                $("#text_mac").val('');
                $("#select_eta_lvl").val('');
                $("#datetimepicker1").data('DateTimePicker').date(new Date());
                $("#select_pro_cat").val('');
                $("#check_main_1").prop("checked", false);
                $("#check_main_2").prop("checked", false);
                $("#check_main_3").prop("checked", false);
                $("#check_main_4").prop("checked", false);
                $("#check_main_5").prop("checked", false);
                $("#check_main_6").prop("checked", false);
                $("#check_feeder").prop("checked", false);
                $("#check_delivery").prop("checked", false);
                $("#text_details").val('');

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
                //theme: 'supervan', 
                buttons: {
                    Yes: function(yesButton){

                        if ($("#check_main_1").is(':checked')){$check_main_1 = 1;}else{$check_main_1 = 0;}
                        if ($("#check_main_2").is(':checked')){$check_main_2 = 1;}else{$check_main_2 = 0;}
                        if ($("#check_main_3").is(':checked')){$check_main_3 = 1;}else{$check_main_3 = 0;}
                        if ($("#check_main_4").is(':checked')){$check_main_4 = 1;}else{$check_main_4 = 0;}
                        if ($("#check_main_5").is(':checked')){$check_main_5 = 1;}else{$check_main_5 = 0;}
                        if ($("#check_main_6").is(':checked')){$check_main_6 = 1;}else{$check_main_6 = 0;}
                        if ($("#check_feeder").is(':checked')){$check_feeder = 1;}else{$check_feeder = 0;}
                        if ($("#check_delivery").is(':checked')){$check_delivery = 1;}else{$check_delivery = 0;}

                        
                        
                         $.ajax({
                            url: "/request/insert", 
                            data: { 
                                department: $("#text_dept").val(), 
                                machine : $("#text_mac").val(), 
                                eta_lvl : $("#select_eta_lvl").val(),
                                request_date : $("#datetimepicker1").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'), 
                                prob_category : $("#select_pro_cat").val(),
                                prob_main_1 : $check_main_1,
                                prob_main_2 : $check_main_2,
                                prob_main_3 : $check_main_3,
                                prob_main_4 : $check_main_4,
                                prob_main_5 : $check_main_5,
                                prob_main_6 : $check_main_6,
                                prob_feeder : $check_feeder,
                                prob_delivery : $check_delivery,
                                prob_details : $("#text_details").val(),
                                
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
                                    content: 'Record has been saved. New request ID : [' + result.success + ']',
                                    buttons: { OK : function (){
                                        $.get('/request/selectData', function(data) {
                                            $('#select_req_id_form').empty().append('<option></option>');
                                            $.each(data.req_id, function(index,subCatObj){
                                                $('#select_req_id_form').append('<option>'+subCatObj.req_id+'</option>');
                                            });
                                            $('.selectpicker').selectpicker('refresh');
                                            $("#select_req_id_form").val(result.success);
                                            $('.selectpicker').selectpicker('refresh');
                                            $('#modalNew').modal('hide');
                                            $('.modal-backdrop').remove();
                                            $('#request-table').DataTable().draw();
                                        });
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
            
            /*
            $.post('http://path/to/post', 
                $('#myForm').serialize(), 
                function(data, status, xhr){
                // do something here with response;
                });
            */
            });
        });


        $(function(){
            $('#btnModalNewClose').click(function(e){
            e.preventDefault();
            $.confirm({
                type: 'orange',
                icon: 'fa fa-warning',
                title: 'Warning',
                content: 'Record not saved, comfirm close?',
                buttons: {
                    Yes: function(yesButton){
                        $('#modalNew').modal('hide');
                        $('.modal-backdrop').remove();
                    },
                    No: function () {
                    }
                }
            });
            //$('#myModal').modal('hide')
            /*
            $.post('http://path/to/post', 
                $('#myForm').serialize(), 
                function(data, status, xhr){
                // do something here with response;
                });
            */
            });
        });

        var initialText = $('#editable_cust').val();
        $('#select_cust_no_new').val(initialText);

        $('#select_cust_no').change(function(){
            var selected = $('option:selected', this).attr('class');
            var optionText = $('#editable_cust').text();

            if(selected == "editable"){
            $('#select_cust_no_new').show();

            
            $('#select_cust_no_new').keyup(function(){
                var editText = $('#select_cust_no_new').val();
                $('#editable_cust').val(editText);
                //$('#editable_cust').html(editText);
            });

            }else{
            $('#select_cust_no_new').hide();
            }
        });

        var initialTextPart = $('#editable_part').val();
        $('#select_part_no_new').val(initialTextPart);

        $('#select_part_no').change(function(){
            var selectedPart = $('option:selected', this).attr('class');
            var optionTextPart = $('#editable_part').text();

            if(selectedPart == "editable"){
            $('#select_part_no_new').show();

            
            $('#select_part_no_new').keyup(function(){
                var editTextPart = $('#select_part_no_new').val();
                $('#editable_part').val(editTextPart);
                //$('#editable_part').html(editTextPart);
            });

            }else{
            $('#select_part_no_new').hide();
            }
        });
        
    </script>
    {{--  [End] Modal New Scripts  --}}
    
    {{--  [Start] Modal Modify Scripts  --}}
    <script>
    
        $(function(){
            $('#btnReqModify').click(function(e){
                if (selectedReqId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a request to be modified.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                if (selectedStatus != "New"){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Only request with status [New] is allow to be modified.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                //alert(selectedProbFeeder);
                $("#modalModifyTitle").text("Request Modify ( Request ID : " + selectedReqId + ")");
                $("#text_dept_modify").val(selectedDept);
                $("#text_mac_modify").val(selectedMachine);
                $("#select_eta_lvl_modify").val(selectedEtaLvl);
                $("#datetimepicker2").data('DateTimePicker').date(new Date(selectedReqDate));
                $("#select_pro_cat_modify").val(selectedProbCat);
                if (selectedProbMain1 == 0){$("#check_main_1_modify").prop("checked", false)}else{$("#check_main_1_modify").prop("checked", true)};
                if (selectedProbMain2 == 0){$("#check_main_2_modify").prop("checked", false)}else{$("#check_main_2_modify").prop("checked", true)};
                if (selectedProbMain3 == 0){$("#check_main_3_modify").prop("checked", false)}else{$("#check_main_3_modify").prop("checked", true)};
                if (selectedProbMain4 == 0){$("#check_main_4_modify").prop("checked", false)}else{$("#check_main_4_modify").prop("checked", true)};
                if (selectedProbMain5 == 0){$("#check_main_5_modify").prop("checked", false)}else{$("#check_main_5_modify").prop("checked", true)};
                if (selectedProbMain6 == 0){$("#check_main_6_modify").prop("checked", false)}else{$("#check_main_6_modify").prop("checked", true)};
                if (selectedProbFeeder == 0){$("#check_feeder_modify").prop("checked", false)}else{$("#check_feeder_modify").prop("checked", true)};
                if (selectedProbDelivery == 0){$("#check_delivery_modify").prop("checked", false)}else{$("#check_delivery_modify").prop("checked", true)};
                $("#text_details_modify").val(selectedProbDetails);


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
                        if ($("#check_main_1_modify").is(':checked')){$check_main_1_modify = 1;}else{$check_main_1_modify = 0;}
                        if ($("#check_main_2_modify").is(':checked')){$check_main_2_modify = 1;}else{$check_main_2_modify = 0;}
                        if ($("#check_main_3_modify").is(':checked')){$check_main_3_modify = 1;}else{$check_main_3_modify = 0;}
                        if ($("#check_main_4_modify").is(':checked')){$check_main_4_modify = 1;}else{$check_main_4_modify = 0;}
                        if ($("#check_main_5_modify").is(':checked')){$check_main_5_modify = 1;}else{$check_main_5_modify = 0;}
                        if ($("#check_main_6_modify").is(':checked')){$check_main_6_modify = 1;}else{$check_main_6_modify = 0;}
                        if ($("#check_feeder_modify").is(':checked')){$check_feeder_modify = 1;}else{$check_feeder_modify = 0;}
                        if ($("#check_delivery_modify").is(':checked')){$check_delivery_modify = 1;}else{$check_delivery_modify = 0;}

                        $.ajax({
                            url: "/request/modify", 
                            data: { 
                                req_id : selectedReqId,
                                department: $("#text_dept_modify").val(), 
                                machine : $("#text_mac_modify").val(), 
                                eta_lvl : $("#select_eta_lvl_modify").val(),
                                request_date : $("#datetimepicker2").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'), 
                                prob_category : $("#select_pro_cat_modify").val(),
                                prob_main_1 : $check_main_1_modify,
                                prob_main_2 : $check_main_2_modify,
                                prob_main_3 : $check_main_3_modify,
                                prob_main_4 : $check_main_4_modify,
                                prob_main_5 : $check_main_5_modify,
                                prob_main_6 : $check_main_6_modify,
                                prob_feeder : $check_feeder_modify,
                                prob_delivery : $check_delivery_modify,
                                prob_details : $("#text_details_modify").val(),
                                
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
                                        selectedReqId = undefined;
                                        $('#modalModify').modal('hide');
                                        $('.modal-backdrop').remove();
                                        $('#request-table').DataTable().draw();
                                        
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
            $.confirm({
                type: 'orange',
                icon: 'fa fa-warning',
                title: 'Warning',
                content: 'Record not saved, comfirm close?',
                buttons: {
                    Yes: function(yesButton){
                        $('#modalModify').modal('hide');
                        $('.modal-backdrop').remove();
                    },
                    No: function () {
                    }
                }
            });
            });
        });
        
    </script>
    {{--  [End] Modal Modify Scripts  --}}

    {{--  [Start] Modal Delete Scripts  --}}
    <script>
    
        $(function(){
            $('#btnReqDelete').click(function(e){
                if (selectedReqId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a request to be deleted.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                if (selectedStatus != 'New'){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Only request with status [New] is allow to be deleted.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                $.confirm({
                    type: 'blue', 
                    icon: 'fa fa-info-circle',
                    title: 'Deleting',
                    content: 'Are you sure you want to delete Request ID [' + selectedReqId + ']?',
                    buttons: { 
                        Yes: function(yesButton){
                            $.ajax({
                                url: "/request/delete", 
                                data: { 
                                    req_id: selectedReqId,
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
                                        title: 'Deleted',
                                        content: 'Record has been deleted.',
                                        buttons: { OK : function (){
                                            $.get('/request/selectData', function(data) {
                                                $('#select_req_id_form').empty().append('<option></option>');
                                                $.each(data.mold_id, function(index,subCatObj){
                                                    $('#select_req_id_form').append('<option>'+subCatObj.mold_id+'</option>');
                                                });
                                                $('.selectpicker').selectpicker('refresh');
                                                //$('#modalNew').modal('hide');
                                                //$('.modal-backdrop').remove();
                                                selectedReqId = undefined;
                                                $('#request-table').DataTable().draw();
                                            });
                                            
                                            
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

    {{--  [Start] Modal Approve Scripts  --}}
    <script>
    
        $(function(){
            $('#btnReqApprove').click(function(e){
                if (selectedReqId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a request to be approved.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                if (selectedStatus != 'New'){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Only request with status [New] is allow to be approved.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                $.confirm({
                    type: 'blue', 
                    icon: 'fa fa-info-circle',
                    title: 'Approving',
                    content: 'Are you sure you want to approve Request ID [' + selectedReqId + ']?',
                    buttons: { 
                        Yes: function(yesButton){
                            $.ajax({
                                url: "/request/approve", 
                                data: { 
                                    req_id: selectedReqId,
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
                                        title: 'Approved',
                                        content: 'Record has been approved.',
                                        buttons: { OK : function (){
                                            $.get('/request/selectData', function(data) {
                                                selectedReqId = undefined;
                                                $('#request-table').DataTable().draw();
                                            });
                                            
                                            
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
    {{--  [End] Modal Approve Scripts  --}}

    {{--  [Start] Modal Close Scripts  --}}
    <script>
    
        $(function(){
            $('#btnReqClose').click(function(e){
                if (selectedReqId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a request to be closed.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                if (selectedStatus != 'Approved'){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Only request with status [Approved] is allow to be closed.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                $.confirm({
                    type: 'blue', 
                    icon: 'fa fa-info-circle',
                    title: 'Closing',
                    content: 'Are you sure you want to close Request ID [' + selectedReqId + ']?',
                    buttons: { 
                        Yes: function(yesButton){
                            $.ajax({
                                url: "/request/close", 
                                data: { 
                                    req_id: selectedReqId,
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
                                        title: 'Closed',
                                        content: 'Record has been closed.',
                                        buttons: { OK : function (){
                                            $.get('/request/selectData', function(data) {
                                                selectedReqId = undefined;
                                                $('#request-table').DataTable().draw();
                                            });
                                            
                                            
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
    {{--  [End] Modal Close Scripts  --}}

    <script> 

    /*
    $(function(){
        $('#btnMoldInfoSearch').click(function(){
            $.ajax({
                url: "ctp",
                success: function( response ) {
                alert("testong");
                }
            });
        });
    });*/

    $(document).ready(function(){
        $("#btnReqSearch").click(function(){
            $.ajax({url: "/request/anyData", data: { part_no: 1 },
                            success: function(result){
                            //alert($('select[id="select_part_no"]').val());
                                    oTable = $('#request-table').DataTable();
                                        oTable.draw();
                                    }});
            });
    });
    </script>
@stop
