@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>
  @include('frontend.plan.includes.nav')
    {{-- <form action="{!! route('frontend.plan.import') !!}" method="post" enctype="multipart/form-data"> --}}
    {!! Form::open(array('route' => array('frontend.plan.importedprod'), 'method'=>'POST', 'files'=>true)) !!}
      <div class="col-md-6">

        <div class="col-md-4 row">
            <button class="btn btn-primary" type="submit">Import Routing file</button>
        </div>
        <div class="col-md-8 row">
          <div class="form-control">
            <div class="col-md-5">{!! Form::file('import_file_production', null , array( 'class' => ' ')) !!}</div>
          </div>
        </div>
      </div>
    {!!form::close()!!}
    <div class="col-md-12 row">
    <h4>Sales Confirmation Order </h4>
    <table class="table table-bordered" id="users-table1">
        <thead>
            <tr>
                <th class="col-md-1">Salesline</th>
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
