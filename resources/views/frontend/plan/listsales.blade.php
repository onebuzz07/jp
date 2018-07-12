@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>
  @include('frontend.plan.includes.nav')
    {{-- <form action="{!! route('frontend.plan.import') !!}" method="post" enctype="multipart/form-data"> --}}
    
    <div class="col-md-12 row">
    <table class="table table-bordered" id="users-table1">
        <thead>
            <tr>
                <th class="col-md-1">ID</th>
                <th class="col-md-2">Customer Name</th>
                <th class="col-md-2">Part Number</th>
                <th class="col-md-3">Part Description</th>
                <th class="col-md-1">Actions</th>
            </tr>
        </thead>
    </table>
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
  <script>
      $(function() {
          $('#users-table1').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('frontend.plan.prodtable') !!}',
          });
      });
  </script>
</div>
@stop
