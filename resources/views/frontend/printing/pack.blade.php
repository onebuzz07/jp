@extends('frontend.layouts.app1')

@section('content')
{{--  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">  --}}
<!-- [Start] New Modal -->
<div class="modal fade" style="z-index: 1049;" id="modalNew" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Item</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                {{--  <input type="text" class="form-control form-control-custom-modal" id="select_part_no_new">  --}}
                                <select class="selectpicker form-control form-control-custom-modal" id="select_part_no_new" data-live-search="true">
                                    <option></option>
                                    @foreach ($select_part_no_masters as $select_part_no_master)
                                        <option>{{ $select_part_no_master->part_no }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Item UOM</span>
                                <input type="text" class="form-control form-control-custom-modal" id="select_part_uom_new" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Packing Center</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                {{--  <input type="text" class="form-control form-control-custom-modal" id="select_part_no_new">  --}}
                                <select class="selectpicker form-control form-control-custom-modal" id="select_wc_new" data-live-search="true">
                                    <option></option>
                                    @foreach ($select_wc_masters as $select_wc_master)
                                        <option>{{ $select_wc_master->wc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Customer Name</span>
                                <input type="text" class="form-control form-control-custom-modal" id="select_cust_no_new" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Packing Qty</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_pack"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Packing UOM</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="selectpicker form-control form-control-custom-modal" id="select_pack_um_new" data-live-search="true">
                                    <option></option>
                                    @foreach ($select_um_masters as $select_um_master)
                                        <option>{{ $select_um_master->um }}</option>
                                    @endforeach
                                </select>
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
<!-- [End] New Modal -->

<!-- [Start] Modify Modal -->
<div class="modal fade" id="modalModify" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Item</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                {{--  <input type="text" class="form-control form-control-custom-modal" id="select_part_no_new">  --}}
                                <select class="selectpicker form-control form-control-custom-modal" id="select_part_no_modify" disabled>
                                    <option></option>
                                    @foreach ($select_part_no_masters as $select_part_no_master)
                                        <option>{{ $select_part_no_master->part_no }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Item UOM</span>
                                <input type="text" class="form-control form-control-custom-modal" id="select_part_uom_modify" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Packing Center</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                {{--  <input type="text" class="form-control form-control-custom-modal" id="select_part_no_new">  --}}
                                <select class="selectpicker form-control form-control-custom-modal" id="select_wc_modify" data-live-search="true">
                                    <option></option>
                                    @foreach ($select_wc_masters as $select_wc_master)
                                        <option>{{ $select_wc_master->wc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Customer Name</span>
                                <input type="text" class="form-control form-control-custom-modal" id="select_cust_no_modify" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Packing Qty</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_pack_modify"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Packing UOM</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="selectpicker form-control form-control-custom-modal" id="select_pack_um_modify" disabled>
                                    <option></option>
                                    @foreach ($select_um_masters as $select_um_master)
                                        <option>{{ $select_um_master->um }}</option>
                                    @endforeach
                                </select>
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
<!-- [End] Modify Modal -->


<div class="container-fluid">
    <div class="panel panel-info">
        @include('frontend.printing.includes.nav', ['mainTitle' => 'Production Department / Packing Size Maintenance'])
        <br>
        <div class="panel-body">
            {{-- [Start] Row 1 Selctions --}}
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon input-group-addon-custom" id="sizing-addon2" >Item</span>
                        <select class="selectpicker form-control" id="select_part_no_form" data-live-search="true">
                            <option></option>
                            @foreach ($select_part_nos as $select_part_no)
                                <option>{{ $select_part_no->part_no }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                </div>              
            </div> 
            {{-- [End] Row 1 Selctions --}}
            <br>
            {{-- [Start] Row 2 Buttons --}}
            <div class="row">
                <div class="col-lg-6">
                    <span>
                        <button type="button" id="btnSearch" class="btn btn-primary" title="Search"><i class="fa fa-search"></i></button>                      
                        <button id="btnNew" type="button" class="btn btn-primary" data-toggle="modal" title="New"><i class="fa fa-plus-square-o"></i></button>
                        <button id="btnModify" type="button" class="btn btn-primary" data-toggle="modal" title="Modify"><i class="fa fa-edit"></i></button>
                        <button id="btnDelete" type="button" class="btn btn-primary"><i class="fa fa-trash-o" title="Delete"></i></button>
                    </span>
                </div>
                <div class="col-lg-6">
                </div>
            </div>
            {{-- [End] Row 2 Buttons --}}
            </br>
            {{--  [Start] Table  --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="dataTables_wrapper"  >
                        <table id="pack-table" class="table table-striped table-bordered dt-responsive" style="white-space:nowrap;" cellspacing="0" width="100%">
                            <thead  style="background-color:#d9edf7; color:#31708f">
                                <tr>
                                    <th>Item</th>
                                    <th>Item UOM</th>
                                    <th>Customer</th>
                                    <th>Work Center</th>
                                    <th>Packing Qty</th>
                                    <th>Packing UOM</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            {{--  [End] Table  --}}
        </div>
    </div>
</div>



<script>
var selectedPartNo;
var selectedPartUom;
var selectedPartCustNo;
var selectedWorkCenter;
var selectedPackingQty;
var selectedPackingUom;
</script>

<script>
$(document).ready(function() {
     

    $(".selectpicker").selectpicker();
    $(".bootstrap-select").click(function () {
        $(this).addClass("open");
    });


    var table = $('#pack-table').DataTable( {
        "scrollY": false,
        "scrollX": true,
        "sScrollX": "100%",
        "sScrollXInner": "100%",
        "searching": false,
        "lengthChange": false,
        "iDisplayLength":10,
        "retrieve": true,
        select: true,
        processing: true,
        serverSide: true,
        
        ajax: {
            url: "/printing/anyDataPack", 
            data: function (d) {
                d.part_no = $('#select_part_no_form').val();
            }
        },
        
        columns: [
                    { data: 'part_no'},
                    { data: 'pt_um'},
                    { data: 'pt_custname'},
                    { data: 'wc'},
                    { data: 'pack_qty'},
                    { data: 'pack_um'},
                ]
    });

    $('#pack-table').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            selectedPartNo = undefined;
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            if (table.row( this ).data() == undefined){
                return;
            }
            selectedPartNo = table.row( this ).data().part_no;
            selectedWorkCenter = table.row( this ).data().wc;
            selectedPackQty = table.row( this ).data().pack_qty;
            selectedPackUom = table.row( this ).data().pack_um;   
            selectedPartUom = table.row( this ).data().pt_um;    
            selectedPartCustNo = table.row( this ).data().pt_custname; 
        }
    });

    $("#btnSearch").click(function(){  
        $.ajax({
            url: "/printing/anyDataPack", 
            data: { part_no: "" },
            success: function(result){
                oTable = $('#pack-table').DataTable();
                    oTable.draw();
                    selectedPartNo = undefined;
            }
        });
    });
}); 
</script> 



{{--  [Start] Modal New Scripts  --}}
<script>

    $(function(){
        $('#btnNew').click(function(e){
            $('#select_part_no_new').val('');
            $('#select_part_uom_new').val('');
            $('#select_wc_new').val('');
            $('#select_cust_no_new').val('');
            $('#input_qty_pack').val('0');
            $('#select_pack_um_new').val('');

            $('.selectpicker').selectpicker('refresh');

            e.preventDefault();
            $('#modalNew').modal('show');
        });

        $('#select_part_no_new').change(function(){           
        $('#select_part_uom_new').LoadingOverlay("show");
        $('#select_cust_no_new').LoadingOverlay("show");
        $.get('/printing/selectDataPartNo', {part_no: $('#select_part_no_new').val()},  function(data) {
            $('#select_part_uom_new').val(data.pt_um);
            $('#select_cust_no_new').val(data.pt_custname);
            $('#select_part_uom_new').LoadingOverlay("hide");
            $('#select_cust_no_new').LoadingOverlay("hide");
            $('.selectpicker').selectpicker('refresh');
        }); 
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
                        url: "/printing/insertPack", 
                        data: { 
                            part_no : $('#select_part_no_new').val(),
                            wc : $('#select_wc_new').val(),    
                            pack_qty : $('#input_qty_pack').val(), 
                            pack_um : $('#select_pack_um_new').val(),                      
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
                                content: 'Record has been saved.',
                                buttons: { OK : function (){                                   
                                    $.get('/printing/selectDataPack', function(data) {
                                    
                                        $('#select_part_no_form').empty().append('<option></option>');
                                        $.each(data.part_no, function(index,subCatObj){
                                            $('#select_part_no_form').append('<option>'+subCatObj.part_no+'</option>');
                                        }); 
                                                
                                        $('.selectpicker').selectpicker('refresh');
                                        $("#select_part_no_form").val(result.part_no);
                                        $('.selectpicker').selectpicker('refresh');
                                        $('#modalNew').modal('hide');
                                        //$('.modal-backdrop').remove();
                                        $('#pack-table').DataTable().draw();
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
                    //$('.modal-backdrop').remove();
                },
                No: function () {
                }
            }
        });
        
        });
    });
           
    
</script>
{{--  [End] Modal New Scripts  --}}

{{--  [Start] Modal Modify Scripts  --}}
<script>
    $(function(){
        $('#btnModify').click(function(e){
            if (selectedPartNo == undefined){
                $.confirm({
                    type: 'red', 
                    icon: 'fa fa-exclamation-circle',
                    title: 'Error',
                    content: 'Please select a record to be modified.',
                    buttons: { OK : function (){}}
                });
                return false;
            }
            $("#modalModifyTitle").text("Modify ( Item : " + selectedPartNo + " | Packing UOM : " + selectedPackUom + " )");

            $('#select_part_no_modify').val(selectedPartNo);
            $('#select_part_uom_modify').val(selectedPartUom);
            $('#select_wc_modify').val(selectedWorkCenter);
            $('#select_cust_no_modify').val(selectedPartCustNo);
            $('#input_qty_pack_modify').val(selectedPackQty);
            $('#select_pack_um_modify').val(selectedPackUom);

            $('.selectpicker').selectpicker('refresh');

            e.preventDefault();
            $('#modalModify').modal('show');
        });
    });

    $(function(){
        $('#btnModalModifySave').click(function(e){
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
                        url: "/printing/modifyPack", 
                        data: { 
                            part_no : selectedPartNo,
                            pack_um : selectedPackUom,  
                            wc : $('#select_wc_modify').val(),
                            pack_qty : $('#input_qty_pack_modify').val(),
                            
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
                                content: 'Record has been saved.',
                                buttons: { OK : function (){
                                    selectedPartNo = undefined;
                                    $('#modalModify').modal('hide');
                                    //$('.modal-backdrop').remove();
                                    $('#pack-table').DataTable().draw();
                                    
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
                    //$('.modal-backdrop').remove();
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
        $('#btnDelete').click(function(e){
            if (selectedPartNo == undefined){
                $.confirm({
                    type: 'red', 
                    icon: 'fa fa-exclamation-circle',
                    title: 'Error',
                    content: 'Please select a record to be deleted.',
                    buttons: { OK : function (){}}
                });
                return false;
            }
            $.confirm({
                type: 'blue', 
                icon: 'fa fa-info-circle',
                title: 'Deleting',
                content: 'Are you sure you want to delete?',
                buttons: { 
                    Yes: function(yesButton){
                        $.ajax({
                            url: "/printing/deletePack", 
                            data: { 
                                part_no: selectedPartNo,
                                pack_um: selectedPackUom,
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
                                        $.get('/printing/selectDataPack', function(data) {
                                    
                                            $('#select_part_no_form').empty().append('<option></option>');
                                            $.each(data.part_no, function(index,subCatObj){
                                                $('#select_part_no_form').append('<option>'+subCatObj.part_no+'</option>');
                                            }); 
                                                    
                                            $('.selectpicker').selectpicker('refresh');
                                            $("#select_part_no_form").val(result.part_no);
                                            $('.selectpicker').selectpicker('refresh');
                                            selectedPartNo = undefined;
                                            $('#pack-table').DataTable().draw();
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


@endsection
