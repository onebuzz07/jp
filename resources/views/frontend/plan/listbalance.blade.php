@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>
  @include('frontend.plan.includes.nav')

    <h4>List of Workorder</h4>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Work Order</th>
                <th>Model</th>
                <th>Part Number</th>
                <th>Part Description</th>
                <th>Actions</th>
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
              ajax: '{!! route('frontend.plan.tablelist') !!}',

          });
      });
  </script>
@stop
