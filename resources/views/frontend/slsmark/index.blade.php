@extends('frontend.layouts.app')

@section('content')
    <h1>Sales Marketing Department</h1>
  @include('frontend.slsmark.includes.nav')
    {{-- <form action="{!! route('frontend.slsmark.import') !!}" method="post" enctype="multipart/form-data"> --}}
    <div class="col-md-12">
      <h4>Import sales order</h4>
      {!! Form::open(array('route' => array('frontend.slsmark.importedsales'), 'method'=>'POST', 'files'=>true)) !!}
        <div class="col-md-6">

          <div class="col-md-2">
              <button class="btn btn-primary" type="submit">Import</button>
          </div>
          <div class="col-md-10">
            <div class="form-control">

              <div class="">{!! Form::file('import_file_sales', null , array( 'class' => 'form-control ')) !!}</div>
            </div>

          </div>
        </div>
      {!!form::close()!!}

      </div>
      <br><br><br><br>
    <h4>Sales Confirmation Order</h4>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Salesline</th>
                <th>Customer Name</th>
                <th>Part Number</th>
                <th>Part Description</th>
                <th>Status</th>
                <th>Repeat?</th>
                <th>Created at </th>
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
              ajax: '{!! route('frontend.slsmark.dataTable') !!}',


          });
      });
      console.log(test);
  </script>
@stop
