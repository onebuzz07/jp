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
                <form enctype="multipart/form-data" id="modal_form_id"  method="POST" >
                {{--  <form>  --}}
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group" id="divItemSelect">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Item</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                {{--  <input type="text" class="form-control form-control-custom-modal" id="select_part_no_new">  --}}
                                <select class="selectpicker form-control form-control-custom-modal" id="select_part_no_new" name="select_part_no_new" data-live-search="true">
                                    <option></option>
                                    @foreach ($select_part_no_masters as $select_part_no_master)
                                        <option>{{ $select_part_no_master->part_no }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Work Center</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="selectpicker form-control form-control-custom-modal" id="select_work_center_new" name="select_work_center_new" data-live-search="true">
                                    <option></option>
                                    @foreach ($select_wc_masters as $select_wc_master)
                                        <option>{{ $select_wc_master->wc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input id="check_emp_flag_new" name="check_emp_flag_new" type="checkbox" aria-label="...">
                                </span>
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Employee</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">File Link</span>
                                <input type="file" name="document" class="file" id="result_file" accept=".pdf"  style="display:none;">
                                <div class="input-group col-xs-12" style="width:620px">
                                    <input id="input_file_link" type="text" class="form-control form-control-custom-modal-full" disabled placeholder="Upload File">
                                    <span class="input-group-btn">
                                        {{--  <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>  --}}
                                        <button class="browse btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                                    </span>
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
<!-- [End] New Modal -->

<!-- [Start] Modify Modal -->
<div class="modal fade" id="modalModify" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-custom" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-custom">
                <h3 class="modal-title modal-title-custom" id="modalModifyTitle">Modify</h3>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="modal_form_modify_id"  method="POST" >
                {{--  <form>  --}}
                    <div class="form-group row" style="display: none;">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Item</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                {{--  <input type="text" class="form-control form-control-custom-modal" id="select_part_no_new">  --}}
                                
                                <select class="selectpicker form-control form-control-custom-modal" id="select_part_no_modify" name="select_part_no_modify">
                                    <option></option>
                                    @foreach ($select_part_no_masters as $select_part_no_master)
                                        <option>{{ $select_part_no_master->part_no }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Work Center</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="selectpicker form-control form-control-custom-modal" id="select_work_center_modify" name="select_work_center_modify">
                                    <option></option>
                                    @foreach ($select_wc_masters as $select_wc_master)
                                        <option>{{ $select_wc_master->wc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input id="check_emp_flag_modify" name="check_emp_flag_modify" type="checkbox" aria-label="...">
                                </span>
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Employee</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">File Link</span>
                                <input type="file" name="document_modify" class="file" id="result_file_modify" accept=".pdf" style="display:none;">
                                <div class="input-group col-xs-12" style="width:620px">
                                    <input id="input_file_link_modify" type="text" class="form-control form-control-custom-modal-full" disabled placeholder="Upload File">
                                    <span class="input-group-btn">
                                        {{--  <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>  --}}
                                        <button id="btnFileRemove" class="btn btn-primary" type="button"><i class="fa fa-trash-o"></i></button>
                                        <button class="browse btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                                    </span>
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
<!-- [End] Modify Modal -->




<div class="container-fluid">
    <div class="panel panel-info">
        @include('frontend.printing.includes.nav', ['mainTitle' => 'Production Department / Work Center Maintenance'])
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
                    <div class="input-group">
                        <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">Work Center</span>
                        <select class="selectpicker form-control" id="select_wc_form" data-live-search="true">
                            <option></option>  
                            @foreach ($select_wcs as $select_wc)
                                <option>{{ $select_wc->wc }}</option>
                            @endforeach
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
                        <table id="wc-table" class="table table-striped table-bordered dt-responsive" style="white-space:nowrap;" cellspacing="0" width="100%">
                            <thead  style="background-color:#d9edf7; color:#31708f">
                                <tr>
                                    <th>Item</th>
                                    <th>Work Center</th>
                                    <th>Employee</th>
                                    <th>File Link</th>
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
    $(document).on('click', '.browse', function(){
        
        var file = $(this).parent().parent().parent().find('.file');
        file.trigger('click');
    });


    $(document).on('change', '.file', function(){       
        //$.LoadingOverlay("show"); 
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));     
        //$.LoadingOverlay("hide");       
    });




    /*  $('#input_file_link').change(function(){
        $('#input_file_link').LoadingOverlay("hide");
    });  */
</script>


<script>
var selectedPartNo;
var selectedWc;
var selectedEmpFlag;
var selectedFileLink;
</script>

<script>
$(document).ready(function() {
    

    $(".selectpicker").selectpicker();
    $(".bootstrap-select").click(function () {
        $(this).addClass("open");
    });


    var table = $('#wc-table').DataTable( {
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
        'columnDefs': [{
                    'targets': [2],
                    'searchable':false,
                    'orderable':false,
                    'className': 'dt-body-center',
                    'render': function (data, type, full, meta){
                        return '<input type="checkbox" disabled ' + (data ? ' checked' : '') + '>';
                    }
                }],
        ajax: {
            url: "/printing/anyDataWc", 
            data: function (d) {
                d.part_no = $('#select_part_no_form').val();
                d.wc = $('#select_wc_form').val();
            }
        },
        
        columns: [
                    { data: 'part_no'},
                    { data: 'wc'},
                    { data: 'emp_flag'},
                    { data: 'file_link'},
                ]
    });

    $('#wc-table').on( 'click', 'tr', function () {
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
            selectedWc = table.row( this ).data().wc;
            selectedEmpFlag = table.row( this ).data().emp_flag;
            selectedFileLink = table.row( this ).data().file_link;      
        }
    });

    $("#btnSearch").click(function(){  
        $.ajax({
            url: "/printing/anyDataWc", 
            data: { part_no: "" },
            success: function(result){
                oTable = $('#wc-table').DataTable();
                oTable.draw();
                selectedPartNo = undefined;
            }
        });
    });
}); 
</script> 



{{--  [Start] Modal New Scripts  --}}
<script>


$('#divItemSelect .form-control').on('keyup',function(){
    alert('a');
});


    $(function(){
        $('#btnNew').click(function(e){
            $('#select_part_no_new').val('');
            $('#select_work_center_new').val('');
            $("#check_emp_flag_new").prop("checked", false);
            $('#input_file_link').val('');
            $('#result_file').val('');

            $('.selectpicker').selectpicker('refresh');

            e.preventDefault();
            $('#modalNew').modal('show');
        });
    });

    $(function(){
        
        $('#btnModalNewSave').click(function(e){
        e.preventDefault();
        e.stopPropagation();

        var formData = new FormData($("#modal_form_id")[0]);
        
        $.confirm({
            icon: 'fa fa-info-circle',
            title: 'Saving',
            content: 'Confirm save?',
            type: 'blue', 
            buttons: {
                Yes: function(yesButton){
                    $.ajax({
                        url: "/printing/insertWc",
                        type: 'POST',
                        data:  formData,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(result){
                            console.log(result);
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
                                    $.get('/printing/selectDataWc', function(data) {
                                        $('#select_part_no_form').empty().append('<option></option>');
                                        $('#select_wc_form').empty().append('<option></option>');
                                        $.each(data.part_no, function(index,subCatObj){
                                            $('#select_part_no_form').append('<option>'+subCatObj.part_no+'</option>');
                                        }); 
                                        $.each(data.wc, function(index,subCatObj){
                                            $('#select_wc_form').append('<option>'+subCatObj.wc+'</option>');
                                        });
                                                
                                        $('.selectpicker').selectpicker('refresh');
                                        $('#select_part_no_form').val(result.part_no);
                                        $("#select_wc_form").val(result.wc);
                                        $('.selectpicker').selectpicker('refresh');
                                        $('#modalNew').modal('hide');
                                        //$('.modal-backdrop').remove();
                                        $('#wc-table').DataTable().draw();
                                    });   
                                    
                                }}
                            });
                            return false;
                        },
                        error: function (request, status, error) {
                            alert(error);
                            return false;
                        }
                    });
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
        $("#btnFileRemove").click(function(){  
            $('#input_file_link_modify').val('');
            $('#result_file_modify').val('');
        });
        
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
            $("#modalModifyTitle").text("Modify ( Item : " + selectedPartNo + " | Work Center : " + selectedWc + " )"); 
            $('#select_part_no_modify').val(selectedPartNo);
            $('#select_work_center_modify').val(selectedWc);
            if (selectedEmpFlag == 0){$("#check_emp_flag_modify").prop("checked", false)}else{$("#check_emp_flag_modify").prop("checked", true)};
            $('#input_file_link_modify').val(selectedFileLink);
            $('#result_file_modify').val('');
            
            $('.selectpicker').selectpicker('refresh');
            e.preventDefault();
            $('#modalModify').modal('show');
        });
    });

    $(function(){
        $('#btnModalModifySave').click(function(e){
            var formData = new FormData($("#modal_form_modify_id")[0]);
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
                            url: "/printing/modifyWc",
                            type: 'POST',
                            data:  formData,
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(result){
                                console.log(result);
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
                                        $('#wc-table').DataTable().draw();
                                       
                                        
                                    }}
                                });
                                
                                return false;
                            },
                            error: function (request, status, error) {
                                alert(error);
                                return false;
                            }
                        });
                            
                        
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
                content: 'Are you sure you want to delete this record?',
                buttons: { 
                    Yes: function(yesButton){
                        $.ajax({
                            url: "/printing/deleteWc", 
                            data: { 
                                part_no: selectedPartNo,
                                wc : selectedWc,
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
                                        $.get('/printing/selectDataWc', function(data) {
                                            $('#select_part_no_form').empty().append('<option></option>');
                                            $('#select_wc_form').empty().append('<option></option>');
                                            $.each(data.part_no, function(index,subCatObj){
                                                $('#select_part_no_form').append('<option>'+subCatObj.part_no+'</option>');
                                            }); 
                                            $.each(data.wc, function(index,subCatObj){
                                                $('#select_wc_form').append('<option>'+subCatObj.wc+'</option>');
                                            });
                                                    
                                            $('.selectpicker').selectpicker('refresh');
                                            $('#select_part_no_form').val(result.part_no);
                                            $("#select_wc_form").val(result.wc);
                                            $('.selectpicker').selectpicker('refresh');
                                            selectedPartNo = undefined;
                                            $('#wc-table').DataTable().draw();
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
