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
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Work Center</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <input type="text" class="form-control form-control-custom-modal" id="select_work_center_new">
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
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Machine</span>
                                <input type="text" class="form-control form-control-custom-modal" id="select_mac_no_new">
                                {{--  <select class="selectpicker form-control form-control-custom-modal" id="select_mac_no_new">                                  
                                </select>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">WO ID</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <input type="text" class="form-control form-control-custom-modal" id="select_wo_id_new">
                                {{--  <select class="selectpicker form-control form-control-custom-modal" id="select_wo_id_new">
                                    <option></option>
                                    @foreach ($select_wo_id_masters as $select_wo_id_master)
                                        <option>{{ $select_wo_id_master->wo_id }}</option>
                                    @endforeach
                                </select>  --}}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Employee</span>
                                {{--  <input type="text" class="form-control form-control-custom-modal" id="select_emp_name_new">  --}}
                                <select class="selectpicker form-control form-control-custom-modal" id="select_emp_name_new">
                                    <option></option>
                                    @foreach ($select_emp_name_masters as $select_emp_name_master)
                                        <option>{{ $select_emp_name_master->emp_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>                   
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Ordered Qty</span>
                                {{--  <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />  --}}
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_order" disabled/>
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">UOM</span>
                                <input type="text" class="form-control form-control-custom-modal" id="input_qty_order_um" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Total Completed Qty</span>
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_complete_total" disabled/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">UOM</span>
                                <input type="text" class="form-control form-control-custom-modal" id="input_qty_complete_total_um" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Complete Qty Pack</span>
                                {{--  <span class="input-group-addon input-group-addon-custom-modal-required">*</span>  --}}
                                {{--  <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />  --}}
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_complete_pack" />
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">UOM</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="selectpicker form-control form-control-custom-modal" id="input_qty_complete_um">
                                   {{--   @foreach ($select_wo_id_masters as $select_wo_id_master)
                                        <option>{{ $select_wo_id_master->wo_id }}</option>
                                    @endforeach  --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Reject Qty Pack</span>
                                {{--  <span class="input-group-addon input-group-addon-custom-modal-required">*</span>  --}}
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_reject_pack" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">UOM</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="selectpicker form-control form-control-custom-modal" id="input_qty_reject_um">
                                    {{--  <option></option>
                                    @foreach ($select_wo_id_masters as $select_wo_id_master)
                                        <option>{{ $select_wo_id_master->wo_id }}</option>
                                    @endforeach  --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Complete Qty</span>
                                {{--  <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />  --}}
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_complete" disabled/>
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Reject Qty</span>
                                {{--  <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />  --}}
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_reject" disabled/>
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Start</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <div class='input-group date form-control-custom-modal' id='datetimepicker1'>
                                    <input type='text' class="form-control" id="date_start"/>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Stop</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <div class='input-group date form-control-custom-modal' id='datetimepicker2'>
                                    <input type='text' class="form-control" id="date_stop"/>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-custom-modal" id="select_part_no_new">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control form-control-custom-modal" id="select_pack_qty_complete_new">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control form-control-custom-modal" id="select_pack_qty_reject_new">
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
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Work Center</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <input type="text" class="form-control form-control-custom-modal" id="select_work_center_modify" disabled>
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
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Machine</span>
                                <input type="text" class="form-control form-control-custom-modal" id="select_mac_no_modify">
                                {{--  <select class="selectpicker form-control form-control-custom-modal" id="select_mac_no_new">                                  
                                </select>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">WO ID</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <input type="text" class="form-control form-control-custom-modal" id="select_wo_id_modify" disabled>
                                {{--  <select class="selectpicker form-control form-control-custom-modal" id="select_wo_id_new">
                                    <option></option>
                                    @foreach ($select_wo_id_masters as $select_wo_id_master)
                                        <option>{{ $select_wo_id_master->wo_id }}</option>
                                    @endforeach
                                </select>  --}}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Employee</span>
                                {{--  <input type="text" class="form-control form-control-custom-modal" id="select_emp_name_new">  --}}
                                <select class="selectpicker form-control form-control-custom-modal" id="select_emp_name_modify">
                                    <option></option>
                                    @foreach ($select_emp_name_masters as $select_emp_name_master)
                                        <option>{{ $select_emp_name_master->emp_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>                   
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Ordered Qty</span>
                                {{--  <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />  --}}
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_order_modify" disabled/>
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">UOM</span>
                                <input type="text" class="form-control form-control-custom-modal" id="input_qty_order_um_modify" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Total Completed Qty</span>
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_complete_total_modify" disabled/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">UOM</span>
                                <input type="text" class="form-control form-control-custom-modal" id="input_qty_complete_total_um_modify" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Complete Qty Pack</span>
                                {{--  <span class="input-group-addon input-group-addon-custom-modal-required">*</span>  --}}
                                {{--  <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />  --}}
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_complete_pack_modify" />
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">UOM</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="selectpicker form-control form-control-custom-modal" id="input_qty_complete_um_modify">
                                   {{--   @foreach ($select_wo_id_masters as $select_wo_id_master)
                                        <option>{{ $select_wo_id_master->wo_id }}</option>
                                    @endforeach  --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Reject Qty Pack</span>
                                {{--  <span class="input-group-addon input-group-addon-custom-modal-required">*</span>  --}}
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_reject_pack_modify" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">UOM</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="selectpicker form-control form-control-custom-modal" id="input_qty_reject_um_modify">
                                    {{--  <option></option>
                                    @foreach ($select_wo_id_masters as $select_wo_id_master)
                                        <option>{{ $select_wo_id_master->wo_id }}</option>
                                    @endforeach  --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Complete Qty</span>
                                {{--  <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />  --}}
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_complete_modify" disabled/>
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Reject Qty</span>
                                {{--  <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />  --}}
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_reject_modify" disabled/>
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Start</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <div class='input-group date form-control-custom-modal' id='datetimepicker3'>
                                    <input type='text' class="form-control" id="date_start_modify"/>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Stop</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <div class='input-group date form-control-custom-modal' id='datetimepicker4'>
                                    <input type='text' class="form-control" id="date_stop_modify"/>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-custom-modal" id="select_part_no_modify">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control form-control-custom-modal" id="select_pack_qty_complete_modify">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control form-control-custom-modal" id="select_pack_qty_reject_modify">
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

<!-- [Start] Verify Modal -->
<div class="modal fade" id="modalVerify" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-custom" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-custom">
                <h3 class="modal-title modal-title-custom" id="modalVerifyTitle">Verify</h3>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">WO ID</span>
                                <input type="text" class="form-control form-control-custom-modal-12" id="select_wo_id_verify">
                                {{--  <select class="selectpicker form-control form-control-custom-modal-12" id="select_wo_id_verify">
                                    <option></option>
                                    @foreach ($select_wo_id_masters as $select_wo_id_master)
                                        <option>{{ $select_wo_id_master->wo_id }}</option>
                                    @endforeach
                                </select>  --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Barcode</span>
                                    <input type="text" class="form-control form-control-custom-modal-12" id="barcode_verify">
                                    {{--  <select class="form-control form-control-custom-modal" id="select_film_desc">
                                    <option></option>
                                    </select>  --}}
                                </div>
                        </div>                   
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnModalVerifyClose" type="button" class="btn btn-primary" title="Cancel"><i class="fa fa-ban"></i></button>
                <button id="btnModalVerifyVerify" type="button" class="btn btn-primary" title="Verify"><i class="fa fa-check-square-o"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- [End] Verify Modal -->

<!-- [Start] View Modal -->
<div class="modal fade" id="modalView" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-custom" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-custom">
                <h3 class="modal-title modal-title-custom" id="modalVerifyTitle">Verify</h3>
            </div>
            <div class="modal-body">
                {{--  <embed :src="/storage/IHpmU4Kxs9jwvcSJ8x2jbnuHLGpUw4woZM2CwBNc.pdf" width="100%" height="600" type='application/pdf'>  --}}
                {{--  <iframe src="/storage/IHpmU4Kxs9jwvcSJ8x2jbnuHLGpUw4woZM2CwBNc.pdf"></iframe>  --}}
                <object id="objectView" data="preview" type="application/pdf" width="100%" height="850">
                </object>

            </div>
            <div class="modal-footer">
                <button id="btnModalViewClose" type="button" class="btn btn-primary" title="Cancel"><i class="fa fa-ban"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- [End] View Modal -->

<div class="container-fluid">
    <div class="panel panel-info">
        @include('frontend.printing.includes.nav', ['mainTitle' => 'Production Department / Work Order Transactions'])
        <br>
        <div class="panel-body">
            {{-- [Start] Row 1 Selctions --}}
            <div class="row">
                <div class="col-lg-4">
                <div class="input-group">
                    <span class="input-group-addon input-group-addon-custom" id="sizing-addon2" >Work Center</span>
                    <select class="selectpicker form-control" id="select_work_center_form" data-live-search="true">
                        <option></option>
                        @foreach ($select_work_centers as $select_work_center)
                            <option>{{ $select_work_center->work_center }}</option>
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
                        <select class="selectpicker form-control" id="select_status_form" data-live-search="true">
                            <option></option>
                            <option>New</option>
                            <option>Transfer</option>
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
                        <button id="btnVerify" type="button" class="btn btn-primary" data-toggle="modal" title="Verify"><i class="fa fa-check-square-o"></i></button>
                        <button id="btnView" type="button" class="btn btn-primary" data-toggle="modal" title="View Work Instruction"><i class="fa fa-eye"></i></button>  
                        <button id="btnTransfer" type="button" class="btn btn-primary" data-toggle="modal" title="Confirm and Transfer"><i class="fa fa-upload"></i></button>  
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
                        <table id="wo-trans-table" class="table table-striped table-bordered dt-responsive" style="white-space:nowrap;" cellspacing="0" width="100%">
                            <thead  style="background-color:#d9edf7; color:#31708f">
                                <tr>
                                    <th>Trans ID</th>
                                    <th>WO ID</th>
                                    <th>WO Item</th>
                                    <th>Item Description</th>
                                    <th>Work Center</th>
                                    <th>Machine</th>
                                    <th>Qty Ordered</th>
                                    <th>Qty Ordered Uom</th>
                                    <th>Qty Complete</th>
                                    <th>Qty Complete Pack</th>
                                    <th>Qty Complete Uom</th>
                                    <th>Qty Reject</th>
                                    <th>Qty Reject Pack</th>
                                    <th>Qty Reject Uom</th>
                                    <th>Start Time</th>
                                    <th>Stop Time</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Transfer By</th>
                                    <th>Transfer At</th>
                                    <th>Employee</th>
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

<script type="text/javascript">

// Set NumPad defaults for jQuery mobile. 
// These defaults will be applied to all NumPads within this document!
$.fn.numpad.defaults.gridTpl = '<table class="table modal-content" style="width:100px;"></table>';
$.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in" style="z-index: 1300;"></div>';
$.fn.numpad.defaults.displayTpl = '<input type="text" class="form-control" />';
$.fn.numpad.defaults.buttonNumberTpl =  '<button type="button" class="btn btn-default"></button>';
$.fn.numpad.defaults.buttonFunctionTpl = '<button type="button" class="btn" style="width: 100%;"></button>';
$.fn.numpad.defaults.onKeypadCreate = function(){$(this).find('.done').addClass('btn-primary');};


  
</script>

<script>
var selectedTransId;
var selectedWoId;
var selectedWorkCenter;
var selectedMacNo;
var selectedQtyOrdered;
var selectedQtyComplete;
var selectedQtyReject;
var selectedTimeStart;
var selectedTimeStop;
var selectedStatus;   
var selectedQtyCompletePack;
var selectedQtyRejectPack;
var selectedEmpNum;
var selectedPtUm;
var selectedUmQtyComplete;
var selectedUmQtyReject;
var selectedPartNo;
</script>

<script>
$(document).ready(function() {
    $("#input_qty_complete_pack").numpad();
    $("#input_qty_reject_pack").numpad();
    $("#input_qty_complete_pack_modify").numpad();
    $("#input_qty_reject_pack_modify").numpad();
    
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


    var table = $('#wo-trans-table').DataTable( {
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
            url: "/printing/anyData", 
            data: function (d) {
                d.work_center = $('select[id="select_work_center_form"]').val();
                d.wo_id = $('select[id="select_wo_id_form"]').val();
                d.status = $('select[id="select_status_form"]').val();
            }
        },
        
        columns: [
                    { data: 'trans_id'},
                    { data: 'wo_id'},
                    { data: 'wo_part'},
                    { data: 'wo_ptdesc'},
                    { data: 'work_center'},
                    { data: 'mac_no'},
                    { data: 'wo_qty_ord'},
                    { data: 'pt_um'},
                    { data: 'qty_complete'},
                    { data: 'qty_complete_pack'},
                    { data: 'um_qty_complete'},
                    { data: 'qty_reject'},
                    { data: 'qty_reject_pack'},
                    { data: 'um_qty_reject'},
                    { data: 'time_start'},
                    { data: 'time_stop'},
                    { data: 'status'},
                    { data: 'created_by'},
                    { data: 'created_at'},
                    { data: 'transfer_by'},
                    { data: 'transfer_at'},
                    { data: 'emp_name'},
                ]
    });

    $('#wo-trans-table').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            selectedTransId = undefined;
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            if (table.row( this ).data() == undefined){
                return;
            }
            selectedTransId = table.row( this ).data().trans_id;
            selectedWoId = table.row( this ).data().wo_id;
            selectedWorkCenter = table.row( this ).data().work_center;
            selectedMacNo = table.row( this ).data().mac_no;
            selectedQtyOrdered = table.row( this ).data().qty_ordered;
            selectedQtyComplete = table.row( this ).data().qty_complete;
            selectedQtyReject = table.row( this ).data().qty_reject;
            selectedTimeStart = table.row( this ).data().time_start;
            selectedTimeStop = table.row( this ).data().time_stop;
            selectedStatus = table.row( this ).data().status;      
            selectedQtyCompletePack = table.row( this ).data().qty_complete_pack;
            selectedQtyRejectPack = table.row( this ).data().qty_reject_pack; 
            selectedEmpNum = table.row( this ).data().emp_name;
            selectedPtUm = table.row( this ).data().pt_um;
            selectedUmQtyComplete = table.row( this ).data().um_qty_complete;
            selectedUmQtyReject = table.row( this ).data().um_qty_reject;
            selectedPartNo = table.row( this ).data().wo_part;
        }
    });

    $("#btnSearch").click(function(){  
        $.ajax({
            url: "/printing/anyData", 
            data: { status: "" },
            success: function(result){
                oTable = $('#wo-trans-table').DataTable();
                    oTable.draw();
                    selectedTransId = undefined;
            }
        });
    });
}); 
</script> 



{{--  [Start] Modal New Scripts  --}}
<script>

    $(function(){
        $('#btnNew').click(function(e){
            
            $('#select_emp_name_new').prop('disabled', true);

            $('#select_work_center_new').val('');
            $("#select_mac_no_new").val('');
            $('#select_mac_no_new').empty();
            $('#select_wo_id_new').val('');
            $("#datetimepicker1").data('DateTimePicker').date(new Date());
            $("#datetimepicker2").data('DateTimePicker').date(new Date());
            $("#input_qty_order").val('0');
            $('#input_qty_complete_total').val('0');
            $("#input_qty_complete").val('0');
            $("#input_qty_reject").val('0');
            $("#input_qty_complete_pack").val('0');
            $("#input_qty_reject_pack").val('0');

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
                        url: "/printing/insert", 
                        data: { 
                            wo_id : $('#select_wo_id_new').val(),
                            work_center: $('#select_work_center_new').val(),
                            mac_no : $('#select_mac_no_new').val(),
                            qty_complete : $('#input_qty_complete').val(),
                            qty_reject : $('#input_qty_reject').val(),
                            qty_complete_pack : $('#input_qty_complete_pack').val(),
                            qty_reject_pack : $('#input_qty_reject_pack').val(),
                            time_start : $("#datetimepicker1").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),
                            time_stop : $("#datetimepicker2").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),   
                            um_qty_reject : $('#input_qty_reject_um').val(),
                            um_qty_complete : $('#input_qty_complete_um').val(),                                              
                        },
                        success: function(result){
                            console.log(result);
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
                                type: 'blue', 
                                icon: 'fa fa-info-circle',
                                title: 'Saved',
                                content: 'Record has been saved. ID : [' + result.success + ']',
                                buttons: { OK : function (){
                                    $.get('/printing/selectData', function(data) {
                                    
                                        $('#select_work_center_form').empty().append('<option></option>');
                                        $('#select_wo_id_form').empty().append('<option></option>');
                                        $.each(data.work_center, function(index,subCatObj){
                                            $('#select_work_center_form').append('<option>'+subCatObj.work_center+'</option>');
                                        }); 
                                        $.each(data.wo_id, function(index,subCatObj){
                                            $('#select_wo_id_form').append('<option>'+subCatObj.wo_id+'</option>');
                                        });
                                                
                                        $('.selectpicker').selectpicker('refresh');
                                        $('#select_work_center_form').val('');
                                        $('#select_status_form').val('New');
                                        $("#select_wo_id_form").val(result.wo_id);
                                        $('.selectpicker').selectpicker('refresh');
                                        $('#modalNew').modal('hide');
                                        //$('.modal-backdrop').remove();
                                        $('#wo-trans-table').DataTable().draw();
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
           
    $('#select_work_center_new').focusout(function(){
        GetEmpFlag();
        /*           
        $('#select_mac_no_new').LoadingOverlay("show");
        $("#select_mac_no_new").prop('disabled',true);
        $.get('/printing/selectDataWorkCenter', {work_center: $('#select_work_center_new').val()},  function(data) {
            $('#select_mac_no_new').empty();             
            $.each(data.mac_no, function(index,subCatObj){
                $('#select_mac_no_new').append('<option>'+subCatObj.mac_no+'</option>');                
            }); 
            //$('#select_mac_no_new').val(data.mac_no);
            $('#select_mac_no_new').LoadingOverlay("hide");
            $("#select_mac_no_new").prop('disabled',false);
            $('.selectpicker').selectpicker('refresh');
        }); */
    });



    $('#select_wo_id_new').focusout(function(){           
        $('#modalNew').LoadingOverlay("show");
        //$('#select_emp_name_new').LoadingOverlay("show");
        $.get('/printing/selectDataWoId', {wo_id: $('#select_wo_id_new').val()},  function(data) {
            $('#input_qty_order').val(data.qty_ordered);
            $('#input_qty_complete_total').val(data.qty_complete_tot);
            $('#select_part_no_new').val(data.wo_part);          
            $('.selectpicker').selectpicker('refresh');
            $('#modalNew').LoadingOverlay("hide");
            GetEmpFlag();
        }); 
    });

    $('#input_qty_complete_pack').change(function(){
        $('#modalNew').LoadingOverlay("show");
        $("#input_qty_complete").val($('#select_pack_qty_reject_new').val() * $("#input_qty_complete_pack").val());
        $('#modalNew').LoadingOverlay("hide");
    });

    $('#input_qty_reject_pack').change(function(){
        $('#input_qty_reject').LoadingOverlay("show");
        $("#input_qty_reject").val($('#select_pack_qty_reject_new').val() * $("#input_qty_reject_pack").val());
        $('#input_qty_reject').LoadingOverlay("hide");
    });

    $('#input_qty_complete_um').change(function(){
        GetPackQtyComplete();
    });

    $('#input_qty_reject_um').change(function(){
        GetPackQtyReject();
    });

    function GetEmpFlag(){
        $('.selectpicker').selectpicker('refresh');
        $('#modalNew').LoadingOverlay("show");
        $.get('/printing/selectDataWoEmp', {part_no: $('#select_part_no_new').val(), wc: $('#select_work_center_new').val()},  function(data) {
            if (data.emp_flag == '1'){
                $('#select_emp_name_new').prop('disabled', false);
            }else{
                $('#select_emp_name_new').val('');
                $('#select_emp_name_new').prop('disabled', true);
            }

            $('#input_qty_reject_um').empty();
            $('#input_qty_complete_um').empty();
            $.each(data.pack_um, function(index,subCatObj){
                $('#input_qty_reject_um').append('<option>'+subCatObj.pack_um+'</option>');
                $('#input_qty_complete_um').append('<option>'+subCatObj.pack_um+'</option>');
            }); 
            console.log(data.pack_um_count);
            if (data.pack_um_count == 0){
                $('#input_qty_reject_um').prop('disabled', true);
                $('#input_qty_complete_um').prop('disabled', true);
            }else{
                $('#input_qty_reject_um').prop('disabled', false);
                $('#input_qty_complete_um').prop('disabled', false);
            }
            GetPackQtyComplete();
            GetPackQtyReject();
            $('#input_qty_complete_total_um').val(data.part_um);
            $('#input_qty_order_um').val(data.part_um);
            $('#modalNew').LoadingOverlay("hide");
        }); 
    }

    function GetPackQtyComplete(){
        $('#modalNew').LoadingOverlay("show");
        $('.selectpicker').selectpicker('refresh');
        $.get('/printing/selectDataPartUm', {part_no: $('#select_part_no_new').val(), um: $('#input_qty_complete_um').val(), wc: $('#select_work_center_new').val()},  function(data) {
            $('#select_pack_qty_complete_new').val(data.pack_qty);
            $("#input_qty_complete").val(data.pack_qty * $("#input_qty_complete_pack").val());
            $('#modalNew').LoadingOverlay("hide");
        }); 
    }

    function GetPackQtyReject(){
        $('#modalNew').LoadingOverlay("show");
        $('.selectpicker').selectpicker('refresh');
        $.get('/printing/selectDataPartUm', {part_no: $('#select_part_no_new').val(), um: $('#input_qty_reject_um').val(), wc: $('#select_work_center_new').val()},  function(data) {
            $('#select_pack_qty_reject_new').val(data.pack_qty);
            $("#input_qty_reject").val(data.pack_qty * $("#input_qty_reject_pack").val());
            $('#modalNew').LoadingOverlay("hide");
        }); 
    }

    
    
</script>
{{--  [End] Modal New Scripts  --}}

{{--  [Start] Modal Modify Scripts  --}}
<script>
    $(function(){
        $('#btnModify').click(function(e){
            if (selectedTransId == undefined){
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
            $("#modalModifyTitle").text("Modify ( ID : " + selectedTransId + ")");


            $('#select_emp_name_modify').prop('disabled', true);

            $('#select_work_center_modify').val(selectedWorkCenter);
            $("#select_mac_no_modify").val(selectedMacNo);
            $('#select_wo_id_modify').val(selectedWoId);
            $("#datetimepicker3").data('DateTimePicker').date(new Date(selectedTimeStart));
            $("#datetimepicker4").data('DateTimePicker').date(new Date(selectedTimeStop));
            $("#input_qty_order_modify").val(selectedQtyOrdered);
            //$('#input_qty_complete_total_modify').val('0');
            $("#input_qty_complete_modify").val(selectedQtyComplete);
            $("#input_qty_reject_modify").val(selectedQtyReject);
            $("#input_qty_complete_pack_modify").val(selectedQtyCompletePack);
            $("#input_qty_reject_pack_modify").val(selectedQtyRejectPack);
            $("#select_emp_name_modify").val(selectedEmpNum);
            $("#input_qty_order_um_modify").val(selectedPtUm);
            $("#input_qty_complete_total_um_modify").val(selectedPtUm);
            SelectDataWoId(1);
            
/*
            $('#select_mac_no_modify').LoadingOverlay("show");
            $("#select_mac_no_modify").prop('disabled',true);
            $.get('/printing/selectDataWorkCenter', {work_center: $('#select_work_center_modify').val()},  function(data) {
                $('#select_mac_no_modify').empty();             
                $.each(data.mac_no, function(index,subCatObj){
                    $('#select_mac_no_modify').append('<option>'+subCatObj.mac_no+'</option>');                
                }); 
                $('#select_mac_no_modify').LoadingOverlay("hide");
                $("#select_mac_no_modify").prop('disabled',false);
                $("#select_mac_no_modify").val(selectedMacNo);
                $('.selectpicker').selectpicker('refresh');
            }); */
            

            $('#input_qty_order_modify').LoadingOverlay("show");
            $('#input_qty_complete_total_modify').LoadingOverlay("show");
            $.get('/printing/selectDataWoId', {wo_id: $('#select_wo_id_modify').val()},  function(data) {
                $('#input_qty_order_modify').val(data.qty_ordered);
                $('#input_qty_complete_total_modify').val(data.qty_complete_tot);
                $('#input_qty_order_modify').LoadingOverlay("hide");
                $('#input_qty_complete_total_modify').LoadingOverlay("hide");
            }); 

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
                        url: "/printing/modify", 
                        data: { 
                            trans_id : selectedTransId,

                            wo_id : $('#select_wo_id_modify').val(),
                            work_center: $('#select_work_center_modify').val(),
                            mac_no : $('#select_mac_no_modify').val(),
                            qty_complete : $('#input_qty_complete_modify').val(),
                            qty_reject : $('#input_qty_reject_modify').val(),
                            qty_complete_pack : $('#input_qty_complete_pack_modify').val(),
                            qty_reject_pack : $('#input_qty_reject_pack_modify').val(),
                            time_start : $("#datetimepicker3").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),
                            time_stop : $("#datetimepicker4").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),   
                            um_qty_reject : $('#input_qty_reject_um_modify').val(),
                            um_qty_complete : $('#input_qty_complete_um_modify').val(),   
                            
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
                                    //$('.modal-backdrop').remove();
                                    $('#wo-trans-table').DataTable().draw();
                                    
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

    $('#select_work_center_new').focusout(function(){
        GetEmpFlagModify(0);
        /*           
        $('#select_mac_no_new').LoadingOverlay("show");
        $("#select_mac_no_new").prop('disabled',true);
        $.get('/printing/selectDataWorkCenter', {work_center: $('#select_work_center_new').val()},  function(data) {
            $('#select_mac_no_new').empty();             
            $.each(data.mac_no, function(index,subCatObj){
                $('#select_mac_no_new').append('<option>'+subCatObj.mac_no+'</option>');                
            }); 
            //$('#select_mac_no_new').val(data.mac_no);
            $('#select_mac_no_new').LoadingOverlay("hide");
            $("#select_mac_no_new").prop('disabled',false);
            $('.selectpicker').selectpicker('refresh');
        }); */
    });



    $('#select_wo_id_modify').focusout(function(){           
        $('#modalModify').LoadingOverlay("show");
        //$('#select_emp_name_new').LoadingOverlay("show");
        SelectDataWoId(0);
    });

    $('#input_qty_complete_pack_modify').change(function(){
        $('#modalModify').LoadingOverlay("show");
        $("#input_qty_complete_modify").val($('#select_pack_qty_reject_modify').val() * $("#input_qty_complete_pack_modify").val());
        $('#modalModify').LoadingOverlay("hide");
    });

    $('#input_qty_reject_pack_modify').change(function(){
        $('#input_qty_reject_modify').LoadingOverlay("show");
        $("#input_qty_reject_modify").val($('#select_pack_qty_reject_modify').val() * $("#input_qty_reject_pack_modify").val());
        $('#input_qty_reject_modify').LoadingOverlay("hide");
    });

    $('#input_qty_complete_um_modify').change(function(){
        GetPackQtyCompleteModify();
    });

    $('#input_qty_reject_um_modify').change(function(){
        GetPackQtyRejectModify();
    });

    function SelectDataWoId(isInit){
        $.get('/printing/selectDataWoId', {wo_id: $('#select_wo_id_modify').val()},  function(data) {
            $('#input_qty_order_modify').val(data.qty_ordered);
            $('#input_qty_complete_total_modify').val(data.qty_complete_tot);
            $('#select_part_no_modify').val(data.wo_part);          
            $('.selectpicker').selectpicker('refresh');
            $('#modalModify').LoadingOverlay("hide");
            GetEmpFlagModify(isInit);
        }); 
    }

    function GetEmpFlagModify(isInit){
        $('.selectpicker').selectpicker('refresh');
        $('#modalModify').LoadingOverlay("show");
        $.get('/printing/selectDataWoEmp', {part_no: $('#select_part_no_modify').val(), wc: $('#select_work_center_modify').val()},  function(data) {
            if (data.emp_flag == '1'){
                $('#select_emp_name_modify').prop('disabled', false);
            }else{
                $('#select_emp_name_modify').val('');
                $('#select_emp_name_modify').prop('disabled', true);
            }

            $('#input_qty_reject_um_modify').empty();
            $('#input_qty_complete_um_modify').empty();
            $.each(data.pack_um, function(index,subCatObj){
                $('#input_qty_reject_um_modify').append('<option>'+subCatObj.pack_um+'</option>');
                $('#input_qty_complete_um_modify').append('<option>'+subCatObj.pack_um+'</option>');
            }); 
            console.log(data.pack_um_count);
            if (data.pack_um_count == 0){
                $('#input_qty_reject_um_modify').prop('disabled', true);
                $('#input_qty_complete_um_modify').prop('disabled', true);
            }else{
                $('#input_qty_reject_um_modify').prop('disabled', false);
                $('#input_qty_complete_um_modify').prop('disabled', false);
            }

            if (isInit == 1){
                $("#input_qty_complete_um_modify").val(selectedUmQtyComplete);
                $("#input_qty_reject_um_modify").val(selectedUmQtyReject);
                $('.selectpicker').selectpicker('refresh');
            }
            GetPackQtyCompleteModify();
            GetPackQtyRejectModify();
            $('#input_qty_complete_total_um_modify').val(data.part_um);
            $('#input_qty_order_um_modify').val(data.part_um);
            $('#modalModify').LoadingOverlay("hide");
        }); 
    }

    function GetPackQtyCompleteModify(){
        $('#modalModify').LoadingOverlay("show");
        $('.selectpicker').selectpicker('refresh');
        $.get('/printing/selectDataPartUm', {part_no: $('#select_part_no_modify').val(), um: $('#input_qty_complete_um_modify').val(), wc: $('#select_work_center_modify').val()},  function(data) {
            $('#select_pack_qty_complete_modify').val(data.pack_qty);
            $("#input_qty_complete_modify").val(data.pack_qty * $("#input_qty_complete_pack_modify").val());
            $('#modalModify').LoadingOverlay("hide");
        }); 
    }

    function GetPackQtyRejectModify(){
        $('#modalModify').LoadingOverlay("show");
        $('.selectpicker').selectpicker('refresh');
        $.get('/printing/selectDataPartUm', {part_no: $('#select_part_no_modify').val(), um: $('#input_qty_reject_um_modify').val(), wc: $('#select_work_center_modify').val()},  function(data) {
            $('#select_pack_qty_reject_modify').val(data.pack_qty);
            $("#input_qty_reject_modify").val(data.pack_qty * $("#input_qty_reject_pack_modify").val());
            $('#modalModify').LoadingOverlay("hide");
        }); 
    }
    
</script>
{{--  [End] Modal Modify Scripts  --}}

{{--  [Start] Modal Delete Scripts  --}}
<script>
    $(function(){
        $('#btnDelete').click(function(e){
            if (selectedTransId == undefined){
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
                content: 'Are you sure you want to delete ID [' + selectedTransId + ']?',
                buttons: { 
                    Yes: function(yesButton){
                        $.ajax({
                            url: "/printing/delete", 
                            data: { 
                                trans_id: selectedTransId,
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
                                    buttons: { OK : function (){/*
                                        $.get('/printing/selectData', function(data) {
                                        
                                            $('#select_work_center_form').empty().append('<option></option>');
                                            $('#select_wo_id_form').empty().append('<option></option>');
                                            $.each(data.work_center, function(index,subCatObj){
                                                $('#select_work_center_form').append('<option>'+subCatObj.work_center+'</option>');
                                            }); 
                                            $.each(data.wo_id, function(index,subCatObj){
                                                $('#select_wo_id_form').append('<option>'+subCatObj.wo_id+'</option>');
                                            });
                                                    
                                            $('.selectpicker').selectpicker('refresh');
                                            selectedTransId = undefined;
                                            $('#wo-trans-table').DataTable().draw();
                                        });*/
                                        selectedTransId = undefined;
                                        $('#wo-trans-table').DataTable().draw();
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

{{--  [Start] Modal Verify Scripts  --}}
<script>

    $(function(){
        $('#btnVerify').click(function(e){          
            e.preventDefault();
            $('#modalVerify').modal('show');
            $('#select_wo_id_verify').val('');
            $('#barcode_verify').val('');
        });
    });

    $(function(){
        $('#btnModalVerifyVerify').click(function(e){     
            e.preventDefault();
            e.stopPropagation();
            

            $.ajax({
                url: "/printing/verify", 
                data: { 
                    wo_id : $('#select_wo_id_verify').val(),
                    barcode : $('#barcode_verify').val(),
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
                        title: 'Verified',
                        content: result.msg,
                        buttons: { OK : function (){8
                        }}
                    });
                    return false;
                    
                },
                error: function (request, status, error) {
                    alert(error);
                    return false;
                }
            });
            /*   
            var wo_id_v = $('#select_wo_id_verify').val();
            var barcode_v = $('#barcode_verify').val();
            if (wo_id_v != barcode_v){
                $.confirm({
                    type: 'red', 
                    icon: 'fa fa-exclamation-circle',
                    title: 'Verified',
                    content: 'Not match.',
                    buttons: { OK : function (){}}
                });
                return false;
            }else{
                $.confirm({ 
                    type: 'blue', 
                    icon: 'fa fa-info-circle',
                    title: 'Verified',
                    content: 'Match.',4
                    buttons: { OK : function (){}}
                });
                return false;
            };*/
        });
    });

    $(function(){
        $('#btnModalVerifyClose').click(function(e){
            e.preventDefault();
            $('#modalVerify').modal('hide');
        });
    });
    
</script>
{{--  [End] Modal Verify Scripts  --}}

{{--  [Start] Modal View Scripts  --}}
<script>

    $(function(){
        $('#btnView').click(function(e){          
            e.preventDefault();
            if (selectedTransId == undefined){
                $.confirm({
                    type: 'red', 
                    icon: 'fa fa-exclamation-circle',
                    title: 'Error',
                    content: 'Please select a record to view.',
                    buttons: { OK : function (){}}
                });
                return false;
            }
            //$('#objectView').LoadingOverlay("show");
            $.ajax({
                url: "/printing/view", 
                data: { 
                    trans_id : selectedTransId,
                    part_no : selectedPartNo,
                    work_center: selectedWorkCenter,
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
                    $('#objectView').prop('data', result.msg);
                    $('#modalView').modal('show');
                    //$('#objectView').LoadingOverlay("hide");
                    return false;
                    //
                    
                },
                error: function (request, status, error) {
                    alert(error);
                    return false;
                }
                
            });
            
        });
        
    });



    $(function(){
        $('#btnModalViewClose').click(function(e){
            e.preventDefault();
            $('#modalView').modal('hide');
        });
    });
    
</script>
{{--  [End] Modal View Scripts  --}}

{{--  [Start] Modal Transfer Scripts  --}}
<script>
    $(function(){
        $('#btnTransfer').click(function(e){
            $.confirm({
                type: 'blue', 
                icon: 'fa fa-info-circle',
                title: 'Transfering',
                content: 'Are you sure you want to transfer all records with status [New]?',
                buttons: { 
                    Yes: function(yesButton){
                        $.ajax({
                            url: "/printing/transfer", 
                            data: { 
                                trans_id: selectedTransId,
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
                                    title: 'Transfered',
                                    content: result.msg,
                                    buttons: { OK : function (){
                                        $('#wo-trans-table').DataTable().draw();
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
{{--  [End] Modal Transfer Scripts  --}}

{{--  <script>
$(document).ajaxStart(function(){
   $.LoadingOverlay("show");
});

$(document).ajaxComplete(function(){
    $.LoadingOverlay("hide");
});
</script>  --}}
@endsection
