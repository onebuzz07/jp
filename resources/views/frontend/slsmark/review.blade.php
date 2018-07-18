@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>

  @include('frontend.slsmark.includes.nav')

  <h4>PAF (History)</h4>

  <table class="table table-bordered" id="users-table2">
      <thead>
          <tr>
              <th>PAF #</th>
              <th>SO</th>
              <th>Line</th>
              <th>ID</th>
              <th>PO</th>
              <th>Name</th>
              <th>Item #</th>
              <th>1st Description</th>
              <th>2nd Description</th>
              <th>Qty Order</th>
              <th>Keep Qty</th>
              <th>Manual Qty</th>
              <th>Stock Card Qty</th>
              <th>Item Status</th>
              <th>Wo Qty</th>
              <th>Total WO Qty</th>
              <th>Delivery Date</th>
              <th>Action</th>
              <th>Rev</th>
              <th>Done?</th>
          </tr>
      </thead>
  </table>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
  {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

  {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
  
<script>
    $(function() {
        $('#users-table2').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('frontend.slsmark.showformhistTable') !!}',
						"columns":[
                          {"name": "paf",    "orderable": true, "searchable": true},
                          {"name": "sales.salesorder",    "orderable": false, "searchable": false},
                          {"name": "sales.line",          "orderable": false, "searchable": false},
                          {"name": "sales.wid",           "orderable": false, "searchable": false},
                          {"name": "sales.purchaseOrder", "orderable": false, "searchable": false},
                          {"name": "sales.custName",      "orderable": false, "searchable": false},
                          {"name": "items.partNo",        "orderable": false, "searchable": false},
                          {"name": "items.partDesc",      "orderable": false, "searchable": false},
                          {"name": "items.partDesc2",     "orderable": false, "searchable": false},
                          {"name": "items.quantity",      "orderable": false, "searchable": false},
                          {"name": "addstocks.keep_qty",      "orderable": false, "searchable": false},
                          {"name": "addstocks.manual_qty",    "orderable": false, "searchable": false},
                          {"name": "addstocks.stockqty",      "orderable": false, "searchable": false},
                          {"name": "sales.status_item",   "orderable": false, "searchable": false},
                          {"name": "addstocks.woqty",         "orderable": false, "searchable": false},
                          {"name": "addstocks.totalwoqty",    "orderable": false, "searchable": false},
                          {"name": "sales.deliverDate",   "orderable": false, "searchable": false},
                          {"name": "products.id",            "orderable": false, "searchable": false},
                          {"name": "products.rev",           "orderable": false, "searchable": false},
                          {"name": "producst.done",          "orderable": false, "searchable": false},
                        ],
            //"order": [[ 0, "desc" ]]
        });
    });


    //Being injected from FrontendController
    //console.log(test);
</script>


@stop
