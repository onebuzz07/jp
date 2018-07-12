@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>
  @include('frontend.plan.includes.nav')
  @include('frontend.plan.includes.navroll')
    {{-- <div class="col-md-12" id="button"><a class="btn btn-md btn-primary" href="{!!route('frontend.plan.newroll')!!}"> Create New Roll</a></div> --}}
    <h4>List of Roll</h4>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
              <th>Part NO</th>
              <th>PO #</th>
              <th>Po Date</th>
              <th>GRN</th>
              <th>Date Received</th>
              <th>Location</th>
              <th>Supplier Code</th>
              <th>Supplier Name</th>
              <th>Size</th>
              <th>System QTY (MT)</th>
              <th>Actual QTY (MT)</th>
              {{-- <th>Actioxns</th> --}}
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
              ajax: '{!! route('frontend.plan.tablelisthist') !!}',

          });
      });
  </script>
@stop
