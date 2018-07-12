@extends('frontend.layouts.app1')

@section('content')
    {{--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">
  
   
    <div class="container-fluid">
        <div class="panel panel-info">
            @include('frontend.ctp.includes.nav', ['mainTitle' => 'CTP Department / Drop Down Maintenance'])
            <br>
            <div class="panel-body">
                {{-- [Start] Row 1 Selctions --}}
                <div class="row">
                    <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">Dropdown Type</span>
                        <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                        <select class="selectpicker form-control" id="select_type" data-live-search="true">
                        <option></option>
                        <option value="type_vendor">Type Vendor</option>
                        <option value="loc">Location</option>
                        <option value="printer">Printer</option>
                        <option value="reason">Reason</option>
                        <option value="part_no">FG Code</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Value</span>
                            <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                            <input type="text" class="form-control form-control-custom-modal" id="text_value">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span>
                            <button id="btnSave" type="button" class="btn btn-primary" title="Save"><i class="fa fa-floppy-o"></i></button>
                        </span>
                    </div>
                </div> 
                {{-- [End] Row 1 Selctions --}}
                <br>

            </div>
        </div>




    {{ Html::script("https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js") }}
    {{ Html::script("https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js") }}
    

    <script>
        $(document).ready(function() {

            $(".selectpicker").selectpicker();
            $(".bootstrap-select").click(function () {
                $(this).addClass("open");
            });
        }); 
    </script> 
    
   {{--  [Start] Save Scripts  --}}
    <script>
        $(function(){
            
            $('#btnSave').click(function(e){
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
                            url: "/ctp/drop_down_insert", 
                            data: { 
                                type : $('select[id="select_type"]').val(), 
                                type_text: $("#select_type option:selected").text(),
                                value: $('input[id="text_value"]').val(), 
                                
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
                                        buttons: { OK : function (){
                                        }}
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
                                        $('select[id="select_type"]').val('');
                                        $('input[id="text_value"]').val('');
                                        $('.selectpicker').selectpicker('refresh');
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
                        $('.modal-backdrop').remove();
                    },
                    No: function () {
                    }
                }
            });
            });
        });
    </script>
    {{--  [End] SaveScripts  --}}
@stop
