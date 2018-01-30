@extends('frontend.layouts.app1')

@section('content')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">

    <!-- [Start] Plate Request Modal -->
    <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
            <div class="modal-header modal-header-custom">
                <h3 class="modal-title modal-title-custom" id="exampleModalLongTitle">New Request</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
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
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Remarks</span>
                                <textarea class="form-control" style="width:620px" id="text_request_remark"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnMoldRequestClose" type="button" class="btn btn-primary" title="Cancel"><i class="fa fa-ban"></i></button>
                <button id="btnMoldRequestRequest" type="button" class="btn btn-primary" title="Request"><i class="fa fa-hand-o-up"></i></button>
            </div>
            </div>
        </div>
    </div>
    <!-- [End] Add Request Modal -->

   
    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-weight:bold">CTP Department</h3>
                <br>
                <ul class="nav nav-tabs navbar-custom">
                    <li><a href="index">Plate Management</a></li>
                    <li class="active"><a href="trans">Plate Transactions</a></li>
                </ul>
            </div>
            <br>
            @include('frontend.ctp.includes.nav')

        
  
    
  
            <div class="panel-body">
                {{-- [Start] Row 1  --}}
                <div class="row">
                    <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon input-group-addon-custom" id="sizing-addon2" >Plate ID</span>
                        <select class="selectpicker form-control" id="select_plate_id_form" data-live-search="true">
                        <option></option>
                            @foreach ($select_plate_ids as $select_plate_id)
                                <option>{{ $select_plate_id->mold_id }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">Customer</span>
                            <select class="selectpicker form-control" id="select_cust_no_form" data-live-search="true">
                                <option></option>  
                                @foreach ($select_cust_nos as $select_cust_no)
                                    <option>{{ $select_cust_no->cust_no }}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">FG Code</span>
                            <select class="selectpicker form-control" id="select_part_no_form" data-live-search="true">
                            <option></option>
                                @foreach ($select_part_nos as $select_part_no)
                                    <option>{{ $select_part_no->part_no }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div> 
                {{-- [End] Row 1  --}}
                <br>
                {{-- [Start] Row 2  --}}
                <div class="row">
                    
                    <div class="col-lg-6">
                    <span>
                        <button type="button" id="btnMoldInfoSearch" class="btn btn-primary" title="Search"><i class="fa fa-search"></i></button>                      
                        <button type="button" id="btnMoldRequest" class="btn btn-primary" data-toggle="modal" title="Request"><i class="fa fa-hand-o-up"></i></button>
                    </span>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
                {{-- [End] Row 2  --}}
                </br>
                
                 
                
                {{--  [Start] Table  --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dataTables_wrapper">
                            <table id="ctp-table" class="table table-striped table-bordered dt-responsive" style="white-space:nowrap;" cellspacing="0" width="100%">
                                <thead  style="background-color:#d9edf7; color:#31708f">
                                <tr>
                                    <th>Plate ID</th>
                                    <th>Plate Type</th>
                                    <th>Type Vendor</th>
                                    <th>Plate Size (mm)</th>
                                    <th>Customer ID</th>
                                    <th>Customer FG Code</th>
                                    <th>Machine</th>
                                    <th>Plate Qty</th>
                                    <th>Location</th>
                                    <th>Life Span (Qty to print)</th>
                                    <th>Print Requirement</th>
                                    <th>Film Description</th>
                                    <th>Film Quantity</th>
                                    <th>Status</th>
                                    <th>Remark</th>
                                    <th>Print Qty</th>
                                    <th>Print Qty Bal</th>
                                    <th>Picked By</th>
                                    <th>Picked At</th>
                                    <th>Picked Remark</th>
                                </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
                {{--  [End] Table  --}}
                </br>
                {{--  [Start] Table  --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dataTables_wrapper">
                            <table id="wo-table" class="table table-striped table-bordered dt-responsive" style="white-space:nowrap;" cellspacing="0" width="100%">
                                <thead  style="background-color:#d9edf7; color:#31708f">
                                <tr>
                                    <th>WO No</th>
                                    <th>Printer</th>
                                    <th>Print Quantity</th>
                                    <th>Print By</th>
                                    <th>Print At</th>
                                </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
                {{--  [End] Table  --}}
                </br>
                {{-- [Start] Row 3  --}}
                <div class="row">
                    <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">Work Order ID</span>
                        <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                        <input type="text" class="form-control" id="text_wo_print">
                    </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">Printer</span>
                            <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                            <input type="text" class="form-control" id="text_printer_print">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">Print Quantity</span>
                            <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                            <input class="form-control currency  text-right" value="0" min="0" type="number" id="text_qty_print" />
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="pull-right">
                            <button type="button" id="btnMoldTranPrint" class="btn btn-primary" title="Print"><i class="fa fa-print"></i></button>   
                        </div>
                    </div>
                </div> 
                {{-- [End] Row 3  --}}
                </br>
                
                
            </div>
        </div>




    {{ Html::script("https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js") }}
    {{ Html::script("https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js") }}
    

    {{--  <script>
        $(function() {
            $('#ctp-table').DataTable({
                "scrollY": false,
                "scrollX": true,
                "sScrollX": "100%",
                "sScrollXInner": "100%",
                "bScrollCollapse": true,
                "searching": false,
                "lengthChange": false,
                "iDisplayLength":5,
                "retrieve": true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('frontend.ctp.anyData') !!}'
            });
        });


        //Being injected from FrontendController
        console.log(test);
    </script>    --}}
    <script>
        var oTable;
        var selectedMoldId = undefined;
        var selectedStatus;
        var selectedMoldType;
        var selectedMoldTypeVendor;
        var selectedMoldSize;
        var selectedQty;
        var selectedLocation;
        var selectedQtyLife;
        var selectedPrintReq;
        var selectedFilmDesc;
        var selectedQtyFilm;
        var selectedRemark;
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
        var table = $('#ctp-table').DataTable( {
            "scrollY": false,
            "scrollX": true,
            "sScrollX": "100%",
            "sScrollXInner": "100%",
            /*"bScrollCollapse": true,*/
            "searching": false,
            "lengthChange": false,
            "iDisplayLength":3,
            "retrieve": true,
            select: true,
            //"ajax":djson.json,
            processing: true,
            serverSide: true,
            //ajax:"{!! route('frontend.ctp.anyData') !!}"
            
            ajax: {
                    url: "/ctp/anyData", 
                    data: function (d) {
                                d.mold_id = $('select[id="select_plate_id_form"]').val();
                                d.part_no = $('select[id="select_part_no_form"]').val();
                                d.cust_no = $('select[id="select_cust_no_form"]').val();
                                d.status = 'P';
                            }
            },
            
            columns: [
                        { data: 'mold_id'},
                        { data: 'mold_type'},
                        { data: 'mold_type_vendor'},
                        { data: 'mold_size'},
                        { data: 'cust_no'},
                        { data: 'part_no'},
                        { data: 'mac_no'},
                        { data: 'qty'},
                        { data: 'location'},
                        { data: 'qty_life'},
                        { data: 'print_req'},
                        { data: 'film_desc'},
                        { data: 'qty_film'},
                        { data: 'status'},
                        { data: 'remark'},
                        { data: 'qty_print'},
                        { data: 'qty_print_bal'},
                        { data: 'picked_by'},
                        { data: 'picked_at'},
                        { data: 'picked_remark'},
                    ]
        });
        $('#ctp-table').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                    selectedMoldId = undefined;
                    $('#wo-table').DataTable().draw();
                }
                else {
                    
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    if (table.row( this ).data() == undefined){
                        return;
                    }
                    //alert(table.row( this ).data().mold_id);
                    selectedMoldId = table.row( this ).data().mold_id;
                    selectedMoldType = table.row( this ).data().mold_type;
                    selectedMoldTypeVendor = table.row( this ).data().mold_type_vendor;
                    selectedMoldSize = table.row( this ).data().mold_size;
                    selectedQty = table.row( this ).data().qty;
                    selectedLocation = table.row( this ).data().location;
                    selectedQtyLife = table.row( this ).data().qty_life;
                    selectedPrintReq = table.row( this ).data().print_req;
                    selectedFilmDesc = table.row( this ).data().film_desc;
                    selectedQtyFilm = table.row( this ).data().qty_film;
                    selectedStatus = table.row( this ).data().status;
                    selectedRemark = table.row( this ).data().remark;

                    $('#wo-table').DataTable().draw();
                }
            
        //alert( 'Clicked row id '+id );
        });

        var tableWo = $('#wo-table').DataTable( {
            "scrollY": false,
            "scrollX": true,
            "sScrollX": "100%",
            "sScrollXInner": "100%",
            /*"bScrollCollapse": true,*/
            "searching": false,
            "lengthChange": false,
            "iDisplayLength":3,
            "retrieve": true,
            //"ajax":djson.json,
            processing: true,
            serverSide: true,
            //ajax:"{!! route('frontend.ctp.anyData') !!}"
            
            ajax: {
                    url: "/ctp/anyDataWo", 
                    data: function (d) {
                                d.mold_id = selectedMoldId;
                            }
            },
            
            columns: [
                        { data: 'wo_no'},
                        { data: 'printer'},
                        { data: 'qty_print'},
                        { data: 'created_by'},
                        { data: 'created_at'},
                    ]
        });

    } ); 
    </script> 

    
    <script>
    $(document).ready(function(){
        $("#btnMoldInfoSearch").click(function(){
            $.ajax({url: "/ctp/anyData", data: { part_no: 1 },
                        success: function(result){
                                oTable = $('#ctp-table').DataTable();
                                    oTable.draw();
                                    selectedMoldId = undefined;
                                    $('#wo-table').DataTable().draw();
                                }});
            
        });
    });
    </script>

    {{--  [Start] Modal Request Scripts  --}}
    <script>
    
        $(function(){
            $('#btnMoldRequest').click(function(e){
                $("#select_request_by").val('');
                $("#datetimepicker1").data('DateTimePicker').date(new Date());
                $('textarea[id="text_request_remark"]').val('');

                $('.selectpicker').selectpicker('refresh');

                e.preventDefault();
                $('#modalRequest').modal('show');
            });
        });

        $(function(){
            $('#btnMoldRequestRequest').click(function(e){
            e.preventDefault();
            e.stopPropagation();
            $.confirm({
                icon: 'fa fa-info-circle',
                title: 'Requesting',
                content: 'Confirm request?',
                type: 'blue', 
                //theme: 'supervan', 
                buttons: {
                    Yes: function(yesButton){
                        $.confirm({
                            type: 'blue', 
                            icon: 'fa fa-info-circle',
                            title: 'Requested',
                            content: 'Plate has been requested.',
                            buttons: { OK : function (){
                                //selectedMoldId = undefined;
                                $('#modalRequest').modal('hide');
                                $('.modal-backdrop').remove();
                                //oTable.draw();
                                
                            }}
                        });
                        /*
                         $.ajax({
                            url: "/ctp/request", 
                            data: { 
                                mold_id: selectedMoldId,
                                picked_by: $('select[id="select_request_by"]').val(), 
                                picked_at : $("#datetimepicker1").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),  
                                picked_remark : $('textarea[id="text_request_remark"]').val(),
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
                                    title: 'Picked Up',
                                    content: 'Plate has been pick up.',
                                    buttons: { OK : function (){
                                        selectedMoldId = undefined;
                                        $('#modalRequest').modal('hide');
                                        $('.modal-backdrop').remove();
                                        oTable.draw();
                                        
                                    }}
                                });
                                return false;
                                
                            },
                            error: function (request, status, error) {
                                alert(error);
                                return false;
                            }});
                            */
                        
                    },
                    No: function () {
                    }
                }
            });
            
            });
        });

        $(function(){
            $('#btnMoldRequestClose').click(function(e){
                e.preventDefault();
                ModalCloseWarning('#modalRequest');
            });
        });
        
    </script>
    {{--  [End] Modal Request Scripts  --}}

    {{--  [Start] Modal Print Scripts  --}}
    <script>
    
        $(function(){
            $('#btnMoldTranPrint').click(function(e){
                if (selectedMoldId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a plate to be printed.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                $.confirm({
                    type: 'blue', 
                    icon: 'fa fa-info-circle',
                    title: 'Printing',
                    content: 'Confirm print?',
                    buttons: { 
                        Yes: function(yesButton){
                            $.ajax({
                                url: "/ctp/print", 
                                data: { 
                                    mold_id: selectedMoldId,
                                    wo_no : $("#text_wo_print").val(),
                                    printer : $("#text_printer_print").val(),
                                    qty_print : $("#text_qty_print").val(),
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
                                        title: 'Printed',
                                        content: 'Plate has been printed.',
                                        buttons: { OK : function (){
                                            selectedMoldId = undefined;
                                            $('#ctp-table').DataTable().draw();
                                            $('#wo-table').DataTable().draw();
                                            
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
    {{--  [End] Modal Print Scripts  --}}

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
