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
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Employee Name</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <input type="text" class="form-control form-control-custom-modal" id="select_emp_name_new">
                                {{--  <select class="selectpicker form-control form-control-custom-modal" id="select_work_center_new">
                                    <option></option>
                                    @foreach ($select_work_center_masters as $select_work_center_master)
                                        <option>{{ $select_work_center_master->work_center }}</option>
                                    @endforeach
                                </select>  --}}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Start Work Date</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <div class='input-group date form-control-custom-modal' id='datetimepicker1'>
                                    <input type='text' class="form-control" id="date_start"/>
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
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Start Work Date</span>
                                <div class='input-group date form-control-custom-modal' id='datetimepicker2'>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <input type='text' class="form-control" id="date_start_modify"/>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Resignation Date</span>
                                <div class='input-group date form-control-custom-modal' id='datetimepicker3'>
                                    <input type='text' class="form-control" id="date_end_modify"/>
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
                <button id="btnModalModifyClose" type="button" class="btn btn-primary" title="Cancel"><i class="fa fa-ban"></i></button>
                <button id="btnModalModifySave" type="button" class="btn btn-primary" title="Save"><i class="fa fa-floppy-o"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- [End] Modify Modal -->


<div class="container-fluid">
    <div class="panel panel-info">
        @include('frontend.printing.includes.nav', ['mainTitle' => 'Production Department / Employee Maintenance'])
        <br>
        <div class="panel-body">
            {{-- [Start] Row 1 Selctions --}}
            <div class="row">
                <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon input-group-addon-custom" id="sizing-addon2" >Employee ID</span>
                    <select class="selectpicker form-control" id="select_emp_id_form" data-live-search="true">
                        <option></option>
                        @foreach ($select_emp_ids as $select_emp_id)
                            <option>{{ $select_emp_id->emp_id }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">Employee Name</span>
                        <select class="selectpicker form-control" id="select_emp_name_form" data-live-search="true">
                            <option></option>  
                            @foreach ($select_emp_names as $select_emp_name)
                                <option>{{ $select_emp_name->emp_name }}</option>
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
                        <table id="emp-table" class="table table-striped table-bordered dt-responsive" style="white-space:nowrap;" cellspacing="0" width="100%">
                            <thead  style="background-color:#d9edf7; color:#31708f">
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Sart Date</th>
                                    <th>Resign Date</th>
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
var selectedEmpId;
var selectedEmpName;
var selectedDateStart;
var selectedDateEnd;
</script>

<script>
$(document).ready(function() {
    
    $('#datetimepicker1').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
    });

    $('#datetimepicker2').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
    }); 

    $('#datetimepicker3').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
    });  

    $(".selectpicker").selectpicker();
    $(".bootstrap-select").click(function () {
        $(this).addClass("open");
    });


    var table = $('#emp-table').DataTable( {
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
            url: "/printing/anyDataEmp", 
            data: function (d) {
                d.emp_id = $('#select_emp_id_form').val();
                d.emp_name = $('#select_emp_name_form').val();
            }
        },
        
        columns: [
                    { data: 'emp_id'},
                    { data: 'emp_name'},
                    { data: 'date_start'},
                    { data: 'date_end'},
                ]
    });

    $('#emp-table').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            selectedEmpId = undefined;
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            if (table.row( this ).data() == undefined){
                return;
            }
            selectedEmpId = table.row( this ).data().emp_id;
            selectedEmpName = table.row( this ).data().emp_name;
            selectedDateStart = table.row( this ).data().date_start;
            selectedDateEnd = table.row( this ).data().date_end;      
        }
    });

    $("#btnSearch").click(function(){  
        $.ajax({
            url: "/printing/anyDataEmp", 
            data: { emp_name: "" },
            success: function(result){
                oTable = $('#emp-table').DataTable();
                    oTable.draw();
                    selectedEmpId = undefined;
            }
        });
    });
}); 
</script> 



{{--  [Start] Modal New Scripts  --}}
<script>

    $(function(){
        $('#btnNew').click(function(e){
            $('#select_emp_name_new').val('');
            $("#datetimepicker1").data('DateTimePicker').date(new Date());

            $('.selectpicker').selectpicker('refresh');

            e.preventDefault();
            $('#modalNew').modal('show');
        });
    });

    $(function(){
        
        $('#btnModalNewSave').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        if ($("#datetimepicker1").data('DateTimePicker').date() == null){
            $date_start = '';
        }else{
            $date_start = $("#datetimepicker1").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm');
        }
        
        $.confirm({
            icon: 'fa fa-info-circle',
            title: 'Saving',
            content: 'Confirm save?',
            type: 'blue', 
            buttons: {
                Yes: function(yesButton){
                        $.ajax({
                        url: "/printing/insertEmp", 
                        data: { 
                            emp_name : $('#select_emp_name_new').val(),
                            date_start : $date_start,                          
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
                                    $.get('/printing/selectDataEmp', function(data) {
                                    
                                        $('#select_emp_id_form').empty().append('<option></option>');
                                        $('#select_emp_name_form').empty().append('<option></option>');
                                        $.each(data.emp_id, function(index,subCatObj){
                                            $('#select_emp_id_form').append('<option>'+subCatObj.emp_id+'</option>');
                                        }); 
                                        $.each(data.emp_name, function(index,subCatObj){
                                            $('#select_emp_name_form').append('<option>'+subCatObj.emp_name+'</option>');
                                        });
                                                
                                        $('.selectpicker').selectpicker('refresh');
                                        $('#select_emp_name_form').val('');
                                        $("#select_emp_id_form").val(result.emp_id);
                                        $('.selectpicker').selectpicker('refresh');
                                        $('#modalNew').modal('hide');
                                        //$('.modal-backdrop').remove();
                                        $('#emp-table').DataTable().draw();
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
            if (selectedEmpId == undefined){
                $.confirm({
                    type: 'red', 
                    icon: 'fa fa-exclamation-circle',
                    title: 'Error',
                    content: 'Please select a record to be modified.',
                    buttons: { OK : function (){}}
                });
                return false;
            }
            $("#modalModifyTitle").text("Modify ( ID : " + selectedEmpId + " | Name : " + selectedEmpName + " )");

            $("#datetimepicker2").data('DateTimePicker').date(new Date(selectedDateStart));
            $("#date_end_modify").val('');           

            e.preventDefault();
            $('#modalModify').modal('show');
        });
    });

    $(function(){
        $('#btnModalModifySave').click(function(e){
        if ($("#datetimepicker2").data('DateTimePicker').date() == null){
            $date_start = '';
        }else{
            $date_start = $("#datetimepicker2").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm');
        }
        if ($("#datetimepicker3").data('DateTimePicker').date() == null){
            $date_end = '';
        }else{
            $date_end = $("#datetimepicker3").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm');
        }
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
                        url: "/printing/modifyEmp", 
                        data: { 
                            emp_id : selectedEmpId,
                            date_start : $date_start,  
                            date_end : $date_end,  
                            
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
                                    selectedEmpId = undefined;
                                    $('#modalModify').modal('hide');
                                    //$('.modal-backdrop').remove();
                                    $('#emp-table').DataTable().draw();
                                    
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
            if (selectedEmpId == undefined){
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
                content: 'Are you sure you want to delete ID [' + selectedEmpId + ']?',
                buttons: { 
                    Yes: function(yesButton){
                        $.ajax({
                            url: "/printing/deleteEmp", 
                            data: { 
                                emp_id: selectedEmpId,
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
                                        $.get('/printing/selectDataEmp', function(data) {
                                    
                                            $('#select_emp_id_form').empty().append('<option></option>');
                                            $('#select_emp_name_form').empty().append('<option></option>');
                                            $.each(data.emp_id, function(index,subCatObj){
                                                $('#select_emp_id_form').append('<option>'+subCatObj.emp_id+'</option>');
                                            }); 
                                            $.each(data.emp_name, function(index,subCatObj){
                                                $('#select_emp_name_form').append('<option>'+subCatObj.emp_name+'</option>');
                                            });
                                                    
                                            $('.selectpicker').selectpicker('refresh');
                                            $('#select_emp_name_form').val('');
                                            $("#select_emp_id_form").val(result.emp_id);
                                            $('.selectpicker').selectpicker('refresh');
                                            selectedEmpId = undefined;
                                            $('#emp-table').DataTable().draw();
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
