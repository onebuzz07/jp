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
  {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

  {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
  {{-- {{ Html::style("https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css") }} --}}
<script>
    $(function() {
        $('#users-table2').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('frontend.slsmark.showformhistTable') !!}',

            "order": [[ 0, "desc" ]]
        });
    });


    //Being injected from FrontendController
    console.log(test);
</script>


@stop
