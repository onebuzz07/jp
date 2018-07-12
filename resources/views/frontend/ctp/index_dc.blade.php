@extends('frontend.layouts.app1')

@section('content')
    {{--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">
    <!-- [Start] New Plate Modal -->
    <div class="modal fade" id="modalNew" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Printer Type</span>
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
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Size</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_plate_size">
                                        <option></option>
                                        <option>785</option>
                                        <option>790</option>
                                        <option>795</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Type Vendor</span>
                                    {{--  <input type="text" class="form-control form-control-custom-modal" id="text_type_vendor">  --}}
                                     <select class="selectpicker form-control form-control-custom-modal" id="text_type_vendor">
                                        {{--  <optgroup label="New">
                                            <option id="editable_type_vendor" class="editable" value="new">New Vendor Type</option>
                                        </optgroup>  --}}
                                        <option></option>
                                        @foreach ($select_type_vendors as $select_type_vendor)
                                            <option>{{ $select_type_vendor->value }}</option>
                                        @endforeach
                                        {{--  <input id="text_type_vendor_new" class="editOption form-control form-control-custom-modal" style="display:none;"></input>  --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Machine</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_mac_no">
                                        <option></option>
                                        <option>Roland</option>
                                        <option>KBA</option>
                                        <option>Heidelberg</option>
                                    </select>
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
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Location</span>
                                    <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                    {{--  <input type="text" class="form-control form-control-custom-modal" id="text_location">  --}}
                                    <select class="form-control form-control-custom-modal" id="text_location">
                                        <option></option>
                                        @foreach ($select_locs as $select_loc)
                                            <option>{{ $select_loc->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Print Req</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_print_req">
                                        <option></option>
                                        <option>Cover</option>
                                        <option>Text</option>
                                        <option>Sticker</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Quantity</span>
                                    {{--  <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />  --}}
                                    <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty" />
                                    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Life Span</span>
                                    <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_life" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Film Description</span>
                                    <input type="text" class="form-control form-control-custom-modal" id="text_film_desc">
                                    {{--  <select class="form-control form-control-custom-modal" id="select_film_desc">
                                    <option></option>
                                    </select>  --}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Film Quantity</span>
                                    <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_film" />
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
                        {{--  <div class="form-group row">
                            <div class="col-sm-6">
                                
                                <span class="input-group-addon">
                                    <input id="check_main_2" type="checkbox" aria-label="...">
                                </span>
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Send SMS on Creation</span>
                            </div>
                        </div>  --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnModalNewClose" type="button" class="btn btn-primary" title="Cancel"><i class="fa fa-ban"></i></button>
                    <button id="btnModalNewSave" type="button" class="btn btn-primary" title="Save"><i class="fa fa-floppy-o"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- [End] New Plate Modal -->

    <!-- [Start] Modify Plate Modal -->
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
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Printer Type</span>
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
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Size</span>
                                    <select class="selectpicker form-control form-control-custom-modal" id="select_plate_size_modify">
                                        <option></option>
                                        <option>785</option>
                                        <option>790</option>
                                        <option>795</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Type Vendor</span>
                                   {{--   <input type="text" class="form-control form-control-custom-modal" id="text_type_vendor_modify">  --}}
                                    <select class="form-control form-control-custom-modal" id="text_type_vendor_modify">
                                        <option></option>
                                        @foreach ($select_type_vendors as $select_type_vendor)
                                            <option>{{ $select_type_vendor->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Location</span>
                                    {{--  <input type="text" class="form-control form-control-custom-modal" id="text_location_modify">  --}}
                                    <select disabled class="form-control form-control-custom-modal" id="text_location_modify">
                                        <option></option>
                                        @foreach ($select_locs as $select_loc)
                                            <option>{{ $select_loc->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            {{--  <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Quantity</span>
                                    <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_modify" />
                                    
                                </div>
                            </div>  --}}
                             <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Print Req</span>
                                    <select class="form-control form-control-custom-modal" id="select_print_req_modify">
                                        <option></option>
                                        <option>Cover</option>
                                        <option>Text</option>
                                        <option>Sticker</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Life Span</span>
                                    <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_life_modify" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Film Description</span>
                                    <input type="text" class="form-control form-control-custom-modal" id="text_film_desc_modify">
                                    {{--  <select class="form-control form-control-custom-modal" id="select_film_desc">
                                    <option></option>
                                    </select>  --}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Film Quantity</span>
                                    <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_film_modify" />
                                </div>
                            </div>
                        </div>
                        {{--  <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Print Req</span>
                                    <select class="form-control form-control-custom-modal" id="select_print_req_modify">
                                        <option></option>
                                        <option>Cover</option>
                                        <option>Text</option>
                                        <option>Sticker</option>
                                    </select>
                                </div>
                            </div>
                        </div>  --}}
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Remarks</span>
                                    <textarea class="form-control" style="width:620px" id="text_remark_modify"></textarea>
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
    <!-- [End] Modify Plate Modal -->

    <!-- [Start] Plate Maintenance Modal -->
    <div class="modal fade" id="modalMaintenance" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
            <div class="modal-header modal-header-custom">
                <h3 class="modal-title modal-title-custom" id="modalMaintenanceTitle">Maintenance</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        {{--  <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Current Plate ID</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="selectpicker form-control form-control-custom-modal" id="select_plate_id_curr_main" data-live-search="true">
                                    <option></option>
                                    @foreach ($select_plate_ids as $select_plate_id)
                                        <option>{{ $select_plate_id->mold_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  --}}
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Printer Type</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="selectpicker form-control form-control-custom-modal" id="select_printer_main">
                                    <option></option>
                                    <option>H</option>
                                    <option>R</option>
                                    <option>KBA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Date</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <div class='input-group date form-control-custom-modal' id='datetimepicker2'>
                                    <input type='text' class="form-control" id="date_return"/>
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
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Reason</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="form-control form-control-custom-modal" id="text_reason_main">
                                    <option></option>
                                    @foreach ($select_reasons as $select_reason)
                                        <option>{{ $select_reason->value }}</option>
                                    @endforeach
                                   {{--   <option></option>
                                    <option>Spoil</option>
                                    <option>Bent</option>
                                    <option>Dent</option>
                                    <option>Scratches</option>
                                    <option>Worn off</option>
                                    <option>Expired</option>
                                    <option>Mc Machine</option>  --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">CTP</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="form-control form-control-custom-modal" id="select_ctp_main">
                                    <option></option>
                                    <option>New</option>
                                    <option>Modify</option>
                                    <option>Spoilt</option>
                                    <option>Others</option>
                                {{--  @foreach ($mold_infos as $mold_info)
                                    <option>{{ $mold_info->cust_no }}</option>
                                @endforeach  --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Add / Write Off</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="form-control form-control-custom-modal" id="text_addwrite_main">
                                    <option></option>
                                    <option>Add</option>
                                    <option>Write Off</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Quantity</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                {{--  <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />  --}}
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="input_qty_main" />
                                
                            </div>
                        </div>
                    </div>
                   {{--   <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">By</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <select class="selectpicker form-control form-control-custom-modal" id="select_pickup_by">
                                <option></option>
                                    @foreach ($select_users as $select_user)
                                        <option>{{ $select_user->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>  --}}
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnModalMaintenanceClose" type="button" class="btn btn-primary" title="Cancel"><i class="fa fa-ban"></i></button>
                <button id="btnModalMaintenanceSave" type="button" class="btn btn-primary" title="Replace"><i class="fa fa-wrench"></i></button>
            </div>
            </div>
        </div>
    </div>
    <!-- [End] Add Maintenance Modal -->

    {{--  Changed to plate move 20180227  --}}
    <!-- [Start] Plate Pickup Modal --> 
    <div class="modal fade" id="modalPickup" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
            <div class="modal-header modal-header-custom">
                <h3 class="modal-title modal-title-custom" id="modalPickupTitle">Move</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Move By</span>
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
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Move Date</span>
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
                    <div class="form-group row">
                        {{--  <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">From Location</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <input type="text" class="form-control form-control-custom-modal" id="text_pickup_from_loc">
                
                            </div>
                        </div>  --}}
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">To Location</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                {{--  <input type="text" class="form-control form-control-custom-modal" id="text_pickup_to_loc">  --}}
                                <select class="form-control form-control-custom-modal" id="text_pickup_to_loc">
                                    <option></option>
                                        @foreach ($select_locs as $select_loc)
                                            <option>{{ $select_loc->value }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Quantity</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                {{--  <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />  --}}
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="text_pickup_qty" />
                                
                            </div>
                        </div>
                    </div>
                    {{--  <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Quantity</span>
                                <span class="input-group-addon input-group-addon-custom-modal-required">*</span>
                                <input class="form-control currency form-control-custom-modal text-right" value="0" min="0" type="number" id="text_pickup_qty" />
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                    </div>  --}}
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-custom-modal" id="sizing-addon2">Remarks</span>
                                <textarea class="form-control" style="width:620px" id="text_pickup_remark"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnModalPickupClose"  type="button" class="btn btn-primary" title="Cancel"><i class="fa fa-ban"></i></button>
                <button id="btnModalPickupPickup" type="button" class="btn btn-primary" title="Pickup"><i class="fa fa-truck"></i></button>
            </div>
            </div>
        </div>
    </div>
    <!-- [End] Add Pickup Modal -->

   
    <div class="container-fluid">
        <div class="panel panel-info">
            @include('frontend.ctp.includes.nav', ['mainTitle' => 'CTP Department / Die Cut Maintenance'])
            <br>
            <div class="panel-body">
                {{-- [Start] Row 1 Selctions --}}
                <div class="row">
                    <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon input-group-addon-custom" id="sizing-addon2" >ID</span>
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
                    {{--  <div class="col-lg-3">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-custom" id="sizing-addon2">Status</span>
                            <select class="selectpicker form-control" id="select_status_form">
                                <option></option>
                                <option>New</option>
                                <option>Picked</option>
                                <option>Replaced</option>
                            </select>
                        </div>
                    </div>  --}}
                </div> 
                {{-- [End] Row 1 Selctions --}}
                <br>
                {{-- [Start] Row 2 Buttons --}}
                <div class="row">
                    <div class="col-lg-6">
                        <span>
                            <button type="button" id="btnMoldInfoSearch" class="btn btn-primary" title="Search"><i class="fa fa-search"></i></button>                      
                            <button id="btnPlateNew" type="button" class="btn btn-primary" data-toggle="modal" title="New"><i class="fa fa-plus-square-o"></i></button>
                            <button id="btnPlateModify" type="button" class="btn btn-primary" data-toggle="modal" title="Modify"><i class="fa fa-edit"></i></button>
                            <button id="btnPlateDelete" type="button" class="btn btn-primary"><i class="fa fa-trash-o" title="Delete"></i></button>
                            <button id="btnPlatePickup" type="button" class="btn btn-primary" data-toggle="modal" title="Move"><i class="fa fa-truck"></i></button>
                            <button id="btnPlateMaintain" type="button" class="btn btn-primary" data-toggle="modal" title="Maintain"><i class="fa fa-wrench"></i></button>  
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
                            <table id="ctp-table" class="table table-striped table-bordered dt-responsive" style="white-space:nowrap;" cellspacing="0" width="100%">
                                <thead  style="background-color:#d9edf7; color:#31708f">
                                <tr>
                                    <th>ID</th>
                                    <th>Printer Type</th>
                                    <th>Type Vendor</th>
                                    <th>Size (mm)</th>
                                    <th>Customer ID</th>
                                    <th>Customer FG Code</th>
                                    <th>Machine</th>
                                    <th>Qty</th>
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

                <h5 class="text-info" style="font-weight:bold">Maintenance Log</h3>

                {{--  [Start] Table  --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dataTables_wrapper">
                            <table id="main-table" class="table table-striped table-bordered dt-responsive" style="white-space:nowrap;" cellspacing="0" width="100%">
                                <thead  style="background-color:#d9edf7; color:#31708f">
                                <tr>
                                    <th>Date</th>
                                    <th>Printer Type</th>
                                    <th>Reason</th>
                                    <th>CTP</th>
                                    <th>Add / Write Off</th>
                                    <th>Quantity</th>
                                    <th>By</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                {{--  [End] Table  --}}

                <h5 class="text-info" style="font-weight:bold">Location Log</h3>

                {{--  [Start] Table  --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dataTables_wrapper">
                            <table id="move-table" class="table table-striped table-bordered dt-responsive" style="white-space:nowrap;" cellspacing="0" width="100%">
                                <thead  style="background-color:#d9edf7; color:#31708f">
                                <tr>
                                    <th>Date</th>
                                    <th>From Location</th>
                                    <th>To Location</th>
                                    <th>Moved By</th>
                                    <th>Quantity</th>
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
        //var djson = [{"part_no":"1"},{"cust_no":"1"},{"mac_no":"1"},{"cr_date":"1"},
        //                            {"location":"1"},{"description":"1"},{"qty":"1"},{"remark":"1"},{"qty_print":"1"},{"qty_print_bal":"1"}];

        var table = $('#ctp-table').DataTable( {
            "scrollY": false,
            "scrollX": true,
            "sScrollX": "100%",
            "sScrollXInner": "100%",
            /*"bScrollCollapse": true,*/
            "searching": false,
            "lengthChange": false,
            "iDisplayLength":2,
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
                                d.status = $('select[id="select_status_form"]').val();
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
                    $('#main-table').DataTable().draw();
                    $('#move-table').DataTable().draw();
                    
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

                $('#main-table').DataTable().draw();
                $('#move-table').DataTable().draw();
                
            }
            
        //alert( 'Clicked row id '+id );
        });

        var tableMain = $('#main-table').DataTable( {
            "scrollY": false,
            "scrollX": true,
            "sScrollX": "100%",
            "sScrollXInner": "100%",
            /*"bScrollCollapse": true,*/
            "searching": false,
            "lengthChange": false,
            "iDisplayLength":2,
            "retrieve": true,
            //"ajax":djson.json,
            processing: true,
            serverSide: true,
            //ajax:"{!! route('frontend.ctp.anyData') !!}"
            
            ajax: {
                    url: "/ctp/anyDataMain", 
                    data: function (d) {
                                d.mold_id = selectedMoldId;
                            }
            },
            
            columns: [
                        { data: 'date'},
                        { data: 'printer'},
                        { data: 'reason'},
                        { data: 'CTP'},
                        { data: 'add_write'},
                        { data: 'quantity'},
                        { data: 'created_by'},
                    ]
        });

        var tableWo = $('#move-table').DataTable( {
            "scrollY": false,
            "scrollX": true,
            "sScrollX": "100%",
            "sScrollXInner": "100%",
            /*"bScrollCollapse": true,*/
            "searching": false,
            "lengthChange": false,
            "iDisplayLength":2,
            "retrieve": true,
            //"ajax":djson.json,
            processing: true,
            serverSide: true,
            //ajax:"{!! route('frontend.ctp.anyData') !!}"
            
            ajax: {
                    url: "/ctp/anyDataMove", 
                    data: function (d) {
                                d.mold_id = selectedMoldId;
                            }
            },
            
            columns: [
                        { data: 'move_at'},
                        { data: 'from_location'},
                        { data: 'to_location'},
                        { data: 'move_by'},
                        { data: 'move_qty'},
                    ]
        });

    } ); 
    </script> 
    
    <script>
    
        
       // $('#datepicker').datetimepicker();
    </script>
    
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
        $("#btnMoldInfoSearch").click(function(){
            /*
        $("#mi-modal").modal('show');
        $("#modal-btn-no").on("click", function(){
            $("#mi-modal").modal('hide');
            });
        $("#modal-btn-si").on("click", function(){
            $.ajax({url: "/ctp/anyData", data: { part_no: 1 },
                    success: function(result){
                    //alert($('select[id="select_part_no"]').val());
                            var oTable = $('#ctp-table').DataTable();
                            //oTable.ajax.reload();
                                oTable.draw();
                            //result.preventDefault();
                            }});
            $("#mi-modal").modal('hide');
        });
        */
        
        $.ajax({url: "/ctp/anyData", data: { part_no: 1 },
                    success: function(result){
                    //alert($('select[id="select_part_no"]').val());
                            oTable = $('#ctp-table').DataTable();
                            //oTable.ajax.reload();
                                oTable.draw();
                                selectedMoldId = undefined;
                            //result.preventDefault();
                            }});
            
        });
    });
/*
    var table = $('#ctp-table').DataTable();
    $('#ctp-table').on( 'click', 'tr', function () {
    var id = table.row( this ).id();
    alert( 'Clicked row id '+id );
    });*/
    </script>

    {{--  [Start] Modal New Scripts  --}}
    <script>
    
        $(function(){
            $('#btnPlateNew').click(function(e){
                $("#select_cust_no").val('');
                $('#select_cust_no_new').val('new');
                $('#select_cust_no_new').hide();
                $("#select_part_no").val('');
                $('#select_part_no_new').val('new');
                $('#select_part_no_new').hide();
                $("#select_mac_no").val('');
                $("#select_plate_type").val('');
                $("#select_plate_size").val('');
                $("#text_type_vendor").val('');
                $("#text_type_vendor_new").val('new');
                $('#text_type_vendor_new').hide();
                $("#text_location").val('');
                $("#input_qty").val('0');
                $("#input_qty_life").val('0');
                $("#text_film_desc").val('');
                $("#input_qty_film").val('0');
                $("#select_print_req").val('');
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
                //theme: 'supervan', 
                buttons: {
                    Yes: function(yesButton){
                        
                         $.ajax({
                            url: "/ctp/insert", 
                            data: { 
                                mold_type : 'dc',
                                cust_no: $('select[id="select_cust_no"]').val(), 
                                part_no : $('select[id="select_part_no"]').val(), 
                                mac_no : $('select[id="select_mac_no"]').val(),
                                plate_type : $('select[id="select_plate_type"]').val(),
                                plate_size : $('select[id="select_plate_size"]').val(),
                                type_vendor : $('select[id="text_type_vendor"]').val(),
                                location : $('select[id="text_location"]').val(),
                                print_req : $('select[id="select_print_req"]').val(),
                                qty : $('input[id="input_qty"]').val(),
                                qty_life : $('input[id="input_qty_life"]').val(),
                                film_desc : $('input[id="text_film_desc"]').val(),
                                qty_film : $('input[id="input_qty_film"]').val(),
                                remark : $('textarea[id="text_remark"]').val(),
                                
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
                                    content: 'Record has been saved. ID : [' + result.success + ']',
                                    buttons: { OK : function (){
                                          $.get('/ctp/selectData', function(data) {
                                            $('#select_plate_id_form').empty().append('<option></option>');
                                            $('#select_plate_id_curr_main').empty().append('<option></option>');
                                            $('#select_plate_id_new_main').empty().append('<option></option>');
                                            $.each(data.mold_id, function(index,subCatObj){
                                                $('#select_plate_id_form').append('<option>'+subCatObj.mold_id+'</option>');
                                                $('#select_plate_id_curr_main').append('<option>'+subCatObj.mold_id+'</option>');
                                                $('#select_plate_id_new_main').append('<option>'+subCatObj.mold_id+'</option>');
                                            }); /*
                                            $('#select_cust_no').empty().append('<option></option>');
                                            $('#select_cust_no_form').empty().append('<option></option>');
                                            $('#select_part_no').empty().append('<option></option>');
                                            $('#select_part_no_form').empty().append('<option></option>');
                                            $('#text_type_vendor').empty().append('<option></option>');
                                            
                                            $.each(data.cust_no, function(index,subCatObj){
                                                $('#select_cust_no').append('<option>'+subCatObj.cust_no+'</option>');
                                                $('#select_cust_no_form').append('<option>'+subCatObj.cust_no+'</option>');
                                            });
                                            $.each(data.part_no, function(index,subCatObj){
                                                $('#select_part_no').append('<option>'+subCatObj.part_no+'</option>');
                                                $('#select_part_no_form').append('<option>'+subCatObj.part_no+'</option>');
                                            });
                                            $.each(data.type_vendor, function(index,subCatObj){
                                                $('#text_type_vendor').append('<option>'+subCatObj.type_vendor+'</option>');
                                            });           */
                                            $('.selectpicker').selectpicker('refresh');
                                            $("#select_plate_id_form").val(result.success);
                                            $('.selectpicker').selectpicker('refresh');
                                            $('#modalNew').modal('hide');
                                            $('.modal-backdrop').remove();
                                            $('#ctp-table').DataTable().draw();
                                        });  
                                        
                                        //$('#modalNew').modal('hide');
                                        //$('.modal-backdrop').remove();
                                        //$('.selectpicker').selectpicker({});
                                        //$('#select_plate_id_form').selectpicker('refresh');
                                        //$("#select_plate_id_form").val(result.success);
                                        //$('#ctp-table').DataTable().draw();
                                        
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
        /*
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

        var initialTextVendorType = $('#editable_type_vendor').val();
        $('#text_type_vendor_new').val(initialTextVendorType);

        $('#text_type_vendor').change(function(){
            var selectedTypeVendor = $('option:selected', this).attr('class');
            var optionTextTypeVendor= $('#editable_type_vendor').text();

            if(selectedTypeVendor == "editable"){
            $('#text_type_vendor_new').show();

            
            $('#text_type_vendor_new').keyup(function(){
                var editTextVendorType = $('#text_type_vendor_new').val();
                $('#editable_type_vendor').val(editTextVendorType);
            });

            }else{
            $('#text_type_vendor_new').hide();
            }
        });*/

        $('#select_plate_type').change(function(){
            if ($("#select_plate_type").val() == 'H'){
                $("#select_plate_size").val('790');
                $("#select_mac_no").val('Heidelberg');
            }else if ($("#select_plate_type").val() == 'R'){
                $("#select_plate_size").val('785');
                $("#select_mac_no").val('Roland');
            }else if ($("#select_plate_type").val() == 'KBA'){
                $("#select_plate_size").val('795');
                $("#select_mac_no").val('KBA');
            }else{
                $("#select_plate_size").val('');
                $("#select_mac_no").val('');
            }
            $('.selectpicker').selectpicker('refresh');
        });
        
    </script>
    {{--  [End] Modal New Scripts  --}}

    {{--  [Start] Modal Modify Scripts  --}}
    <script>
    
        $(function(){
            $('#btnPlateModify').click(function(e){
                if (selectedMoldId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record to be modified.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                //alert(selectedMoldId);
                $("#modalModifyTitle").text("Modify ( ID : " + selectedMoldId + ")");


                $("#select_plate_type_modify").val(selectedMoldType);
                $("#select_plate_size_modify").val(selectedMoldSize);
                $("#text_type_vendor_modify").val(selectedMoldTypeVendor);
                $("#text_location_modify").val(selectedLocation);
                //$("#input_qty_modify").val(selectedQty);
                $("#input_qty_life_modify").val(selectedQtyLife);
                $("#text_film_desc_modify").val(selectedFilmDesc);
                $("#input_qty_film_modify").val(selectedQtyFilm);
                $("#select_print_req_modify").val(selectedPrintReq);
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
                            url: "/ctp/modify", 
                            data: { 
                                mold_id : selectedMoldId,
                                plate_type : $('select[id="select_plate_type_modify"]').val(),
                                plate_size : $('select[id="select_plate_size_modify"]').val(),
                                type_vendor : $('select[id="text_type_vendor_modify"]').val(),
                                location : $('select[id="text_location_modify"]').val(),
                                print_req : $('select[id="select_print_req_modify"]').val(),
                                //qty : $('input[id="input_qty_modify"]').val(),
                                qty_life : $('input[id="input_qty_life_modify"]').val(),
                                film_desc : $('input[id="text_film_desc_modify"]').val(),
                                qty_film : $('input[id="input_qty_film_modify"]').val(),
                                remark : $('textarea[id="text_remark_modify"]').val(),
                                
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

    {{--  [Start] Modal Pickup Scripts  --}}
    <script>
    
        $(function(){
            $('#btnPlatePickup').click(function(e){
                $("#select_pickup_by").val('');
                $("#datetimepicker1").data('DateTimePicker').date(new Date());
                $("#text_pickup_from_loc").val('');
                $("#text_pickup_to_loc").val('');
                $("#text_pickup_qty").val('0');
                $('textarea[id="text_pickup_remark"]').val('');

                $('.selectpicker').selectpicker('refresh');

                if (selectedMoldId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record to be moved.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                //alert(selectedMoldId);
                $("#modalPickupTitle").text("Move ( ID : " + selectedMoldId + ")");
                //$("#modalPickupTitle").innerText = 'Plate Pickup ' + selectedMoldId;
                //$("#modalPickupTitle").val('Plate Pickup ' + selectedMoldId);
                e.preventDefault();
                $('#modalPickup').modal('show');
            });
        });

        $(function(){
            $('#btnModalPickupPickup').click(function(e){
            e.preventDefault();
            e.stopPropagation();
            $.confirm({
                icon: 'fa fa-info-circle',
                title: 'Moving',
                content: 'Confirm move?',
                type: 'blue', 
                //theme: 'supervan', 
                buttons: {
                    Yes: function(yesButton){
                        
                         $.ajax({
                            url: "/ctp/pickup", 
                            data: { 
                                mold_id: selectedMoldId,
                                picked_by: $('select[id="select_pickup_by"]').val(), 
                                picked_at : $("#datetimepicker1").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),  
                                picked_remark : $('textarea[id="text_pickup_remark"]').val(),
                                picked_from_loc : selectedLocation,
                                picked_to_loc : $("#text_pickup_to_loc").val(),
                                picked_qty : $("#text_pickup_qty").val(),
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
                                    title: 'Moved',
                                    content: 'Record has been moved.',
                                    buttons: { OK : function (){
                                        selectedMoldId = undefined;
                                        $('#modalPickup').modal('hide');
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
                ModalCloseWarning('#modalPickup');
            });
        });
        
    </script>
    {{--  [End] Modal Pickup Scripts  --}}

    {{--  [Start] Modal Delete Scripts  --}}
    <script>
    
        $(function(){
            $('#btnPlateDelete').click(function(e){
                if (selectedMoldId == undefined){
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
                    content: 'Are you sure you want to delete ID [' + selectedMoldId + ']?',
                    buttons: { 
                        Yes: function(yesButton){
                            $.ajax({
                                url: "/ctp/delete", 
                                data: { 
                                    mold_id: selectedMoldId,
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
                                            $.get('/ctp/selectData', function(data) {
                                                $('#select_plate_id_form').empty().append('<option></option>');
                                                $('#select_plate_id_curr_main').empty().append('<option></option>');
                                                $('#select_plate_id_new_main').empty().append('<option></option>');
                                                $.each(data.mold_id, function(index,subCatObj){
                                                    $('#select_plate_id_form').append('<option>'+subCatObj.mold_id+'</option>');
                                                    $('#select_plate_id_curr_main').append('<option>'+subCatObj.mold_id+'</option>');
                                                    $('#select_plate_id_new_main').append('<option>'+subCatObj.mold_id+'</option>');
                                                });
                                                $('.selectpicker').selectpicker('refresh');
                                                //$('#modalNew').modal('hide');
                                                //$('.modal-backdrop').remove();
                                                selectedMoldId = undefined;
                                                $('#ctp-table').DataTable().draw();
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

    {{--  [Start] Modal Maintenance Scripts  --}}
    <script>    
        $(function(){
            $('#btnPlateMaintain').click(function(e){
                $("#text_addwrite_main").val('');
                $("#input_qty_main").val('0');
                $("#select_printer_main").val('');
                $("#select_ctp_main").val('');
                $("#text_reason_main").val('');
                $("#datetimepicker2").data('DateTimePicker').date(new Date());

                $('.selectpicker').selectpicker('refresh');

                if (selectedMoldId == undefined){
                    $.confirm({
                        type: 'red', 
                        icon: 'fa fa-exclamation-circle',
                        title: 'Error',
                        content: 'Please select a record.',
                        buttons: { OK : function (){}}
                    });
                    return false;
                }
                //alert(selectedMoldId);
                $("#modalMaintenanceTitle").text("Maintenance ( ID : " + selectedMoldId + ")");
                //$("#modalPickupTitle").innerText = 'Plate Pickup ' + selectedMoldId;
                //$("#modalPickupTitle").val('Plate Pickup ' + selectedMoldId);

                e.preventDefault();
                $('#modalMaintenance').modal('show');
            });
        });

        $(function(){
            $('#btnModalMaintenanceSave').click(function(e){
            e.preventDefault();
            e.stopPropagation();
            $.confirm({
                icon: 'fa fa-info-circle',
                title: 'Maintaining',
                content: 'Confirm?',
                type: 'blue', 
                //theme: 'supervan', 
                buttons: {
                    Yes: function(yesButton){
                        
                         $.ajax({
                            url: "/ctp/replace", 
                            data: { 
                                mold_id : selectedMoldId,
                                printer : $("#select_printer_main").val(),
                                CTP: $("#select_ctp_main").val(),
                                reason : $("#text_reason_main").val(),
                                return_date : $("#datetimepicker2").data('DateTimePicker').date().format('YYYY-MM-DD HH:mm'),  
                                add_write : $("#text_addwrite_main").val(),
                                quantity : $("#input_qty_main").val(),
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
                                    title: 'Maintained',
                                    content: 'Record has been changed.',
                                    buttons: { OK : function (){
                                        selectedMoldId = undefined;
                                        $('#modalMaintenance').modal('hide');
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
                            
                        
                    },
                    No: function () {
                    }
                }
            });
            
            });
        });

        $(function(){
            $('#btnModalMaintenanceClose').click(function(e){
                e.preventDefault();
                ModalCloseWarning('#modalMaintenance');
            });
        });
    </script>
    {{--  [End] Modal Maintenance Scripts  --}}

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
