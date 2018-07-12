@extends('frontend.layouts.app')

@section('content')
    <h1>Sales Marketing Department</h1>
  @include('frontend.slsmark.includes.nav')
    <div class="col-md-12">
      {{-- @include('frontend.slsmark.includes.navindex') --}}
    <h4>Repeat Order (History)</h4>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>SC #</th>
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
                <th>Action</th>
                <th>Rev</th>
                <th>Status</th>
            </tr>
        </thead>
    </table>
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
  <script>
      $(function() {
          $('#users-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('frontend.slsmark.tablerepeat') !!}',


          });
      });
      console.log(test);
  </script>
@stop
