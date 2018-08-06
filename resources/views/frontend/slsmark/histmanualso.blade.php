@extends('frontend.layouts.app')

@section('content')
    <h3>Sales Marketing Department</h3>
  @include('frontend.slsmark.includes.nav')
    <div class="col-md-12">
      </div>
    <h4>Manual SO upload (History)</h4>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
              <th>Customer Name</th>
              <th>ID</th>
              <th>WO #</th>
              <th>Part No</th>
              <th>Child Part No</th>
              <th>So Qty</th>
              <th>Keep Qty</th>
              <th>Manual Stock Qty</th>
              <th>Stock Card Qty</th>
              <th>Due Date</th>
              <th>Cust PO No</th>
              <th>So No</th>
              <th>Paper</th>
              <th>Status</th>
							<th>Actions</th>
            </tr>
        </thead>
    </table>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
  <script>
      $(function() {
          $('#users-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('frontend.slsmark.histmanualtable') !!}',


          });
      });
      console.log(test);
  </script>
@stop
