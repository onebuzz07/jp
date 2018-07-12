@extends('frontend.layouts.app1')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">

    <!-- [Start] Complete Request Modal -->
    <div class="modal fade" id="modalPickup" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h3 class="modal-title modal-title-custom" id="modalPickupTitle">Pick Up</h3>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Pick Up By</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_pickup_by">
                                    <option></option>
                                        @foreach ($select_users as $select_user)
                                            <option>{{ $select_user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Pick Up Date</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <div class='input-group date form-control-custom-modal' id='datetimepicker1'>
                                        <input type='text' class="form-control" id="date_pickup"/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnModalPickupClose" type="button" class="btn btn-primary" title="Cancel"><i class="fa fa-ban"></i></button>
                    <button id="btnModalPickupSave" type="button" class="btn btn-primary" title="Save"><i class="fa fa-truck"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- [End] Complete Request Modal -->
   
    <div class="container-fluid">
        <div class="panel panel-info">
            @include('frontend.printing.includes.nav', ['mainTitle' => 'Production Department / Request'])
                <br>
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
                                <option>New</option>
                                <option>Started</option>
                                <option selected="selected">Completed</option>
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
                            <button id="btnPickup" type="button" class="btn btn-primary" title="Pick Up"><i class="fa fa-truck"></i></button>
                        </span>
                    </div>
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-4">
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
                                    <th>Pick Up By</th>
                                    <th>Pick Up At</th>
                                </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
                {{--  [End] Table  --}}

            </div>
        </div>




    {{ Html::script("https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js") }}
    {{ Html::script("https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js") }}
    
    <script>
        var oTable;
        var selectedReqId = undefined;
    </script>
    <script>
    $(document).ready(function(){
        $('#datetimepicker1').datetimepicker({
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
                { data : 'picked_by'},
                { data : 'picked_at'},
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
                selectedReqId = table.row( this ).data().req_id;
                selectedStatus = table.row( this ).data().status;
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

    {{--  [Start] Modal Pickup Scripts  --}}
    <script>
        $(function(){
            $('#btnPickup').click(function(e){
                if (selectedReqId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record to pickup.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                if (selectedStatus != 'Completed'){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record with status [Completed] to pickup.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                $("#modalPickupTitle").text("Pickup ( Request ID : " + selectedReqId + ")");

                $("#select_pickup_by").val('');
                $("#datetimepicker1").data('DateTimePicker').date(new Date());

                $('.selectpicker').selectpicker('refresh');

                e.preventDefault();
                $('#modalPickup').modal('show');
            });
        });

        $(function(){
            $('#btnModalPickupSave').click(function(e){
               // $('#formNew').validator();
            e.preventDefault();
            e.stopPropagation();
            $.confirm({
                icon: 'fa fa-info-circle',
                title: 'Pick Up',
                content: 'Confirm [pickup]?',
                type: 'blue', 
                //theme: 'supervan', 
                buttons: {
                    Yes: function(yesButton){
                        
                         $.ajax({
                            url: "/jobreq/pickupRequest", 
                            data: { 
                                req_id : selectedReqId,
                                picked_by : $("#select_pickup_by").val(),
                                picked_at: $("#datetimepicker1").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),   
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
                                    content: 'Record has been picked up.',
                                    buttons: { OK : function (){
                                        selectedMoldId = undefined;
                                        $('#modalPickup').modal('hide');
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
            $('#btnModalPickupClose').click(function(e){
                e.preventDefault();
                ModalCloseWarning('#modalPickup')           
            });
        });
        
    </script>
    {{--  [End] Modal Pickup Scripts  --}}

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
