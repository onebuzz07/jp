@extends('frontend.layouts.app')

@section('content')
    <h1>Sales Marketing Department</h1>
  @include('frontend.slsmark.includes.nav')
    <div class="col-md-12">
      @include('frontend.slsmark.includes.navmanual')
      </div>
    <h4>Manual SO Upload (New)</h4>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
              <th>ID</th>
              <th>Part No</th>
              <th>Child Part No</th>
              <th>So Qty</th>
              <th>Keep Qty</th>
              <th>Manual Stock Qty</th>
              <th>Due Date</th>
              <th>Cust PO No</th>
              <th>So No</th>
              <th>Paper</th>
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
              ajax: '{!! route('frontend.slsmark.newmanualtable') !!}',


          });
      });
      console.log(test);
  </script>
@stop
