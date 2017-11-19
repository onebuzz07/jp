<?php ini_set('max_execution_time', 0); ?>
@extends('frontend.layouts.app')

@section('content')
    <h1>Plan Department</h1>

    @include('frontend.plan.includes.nav')
    <div style="padding:5px" class="row col-md-12">
      {{-- <a href="{{ route('frontend.plan.viewimport') }}" class="btn btn-primary">View all Stock </a> --}}
    </div>
    <div  class="row col-md-12 ">
      @if (access()->hasPermissions(['sales-marketing']))
      {!! Form::open(array('route' => array('frontend.plan.importwo'), 'method'=>'POST', 'files'=>true)) !!}
      {{-- <form action="{!! route('frontend.plan.import') !!}" method="post" enctype="multipart/form-data"> --}}
            <div class="col-md-2">
                <button class="btn btn-primary" type="submit">Import Work Order</button>
            </div>
            <div class="col-md-3">
              <div class="form-control">
                <div class="col-md-10">{!! Form::file('import_wo', null , array( 'class' => 'form-control ')) !!}</div>
              </div>

            </div>
        {!!form::close()!!}
        {!! Form::open(array('route' => array('frontend.plan.importpo'), 'method'=>'POST', 'files'=>true)) !!}
        {{-- <form action="{!! route('frontend.plan.import') !!}" method="post" enctype="multipart/form-data"> --}}
              <div class="col-md-2">
                  <button class="btn btn-primary" type="submit">Import Puchase Order</button>
              </div>
              <div class="col-md-3">
                <div class="form-control">
                  <div class="col-md-10">{!! Form::file('import_po', null , array( 'class' => 'form-control ')) !!}</div>
                </div>

              </div>
          {!!form::close()!!}
      @endif
        {{-- </form> --}}
    </div>
    <br>
    <div style="padding:10px" class="row col-md-12">
      <table class="table table-bordered" id="users-table">
          <thead>
              <tr>
                  <th>Sales Order-Line</th>
                  <th>Customer Name</th>
                  <th>Part Number</th>
                  <th>Part Description</th>
                  <th>Actions</th>
              </tr>
          </thead>
      </table>
    </div>



    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

  <script>
      $(function() {
          $('#users-table').DataTable({
              processing: true,
              serverSide: true,
                ajax: '{!! route('frontend.plan.listTable') !!}',

              "order": [[ 0, "desc" ]]
          });
      });


      //Being injected from FrontendController
      console.log(test);
  </script>
@stop
