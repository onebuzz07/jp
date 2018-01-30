@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')

  <div class="container-fluid">
    <div class="row" id="app">
      <div class="col-lg-12">
        {!! Form::open(array('route' => array('frontend.slsmark.importda'), 'method'=>'POST', 'files'=>true)) !!}
          <div class="col-md-9 row">
            <div class="col-md-4">
                <label>Import your Delivery Advice here.</label>
            </div>
            <div class="col-md-6">
              <div class="">{!! Form::file('import_da', null , array( 'class' => 'form-control ')) !!}</div>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary" type="submit">Import</button>
            </div>
          </div>
          {!!Form::close();!!}
          <br></br>
      </div>
      <div class="col-lg-12">
        <h4>List of items</h4>
          <table class="table table-bordered" id="users-table">
              <thead>
                  <tr>
                      <th>Sales Order - Line</th>
                      <th>Item Number</th>
                      <th>Description</th>
                      <th>Model</th>
                      <th>Customer Name</th>
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
                    ajax: '{!! route('frontend.slsmark.datable') !!}',


                });
            });
            console.log(test);
        </script>
      </div>
    </div>
  </div>
@endsection
