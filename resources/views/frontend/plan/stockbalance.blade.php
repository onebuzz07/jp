@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <h3 class="box-title"> {{ trans('STOCK BALANCE') }}</h3>
    <div class="" id="app">
      {!! Form::model($sales, array('route' => array('frontend.plan.balancestore', $sales->id), 'method' => 'POST')) !!}
        <div class="col-md-12 row">
          <div class="form-group row ">
            {!! Form::label('supplier', 'Supplier', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('supplier', $sales->supplier, array('class' => 'form-control')) !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('price', 'Price', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('price', $sales->price, array('class' => 'form-control')) !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('partNo', 'Item Number', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('partNo', $sales->items->partNo, array('class' => 'form-control')) !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('partDesc', 'Description', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('partDesc', $sales->items->partDesc, array('class' => 'form-control')) !!}</div>
          </div>

          <div class="form-group  row">
            {!! Form::label('size', 'Size', array('class' => 'col-md-2')) !!}
            <div class="col-md-5">{!! Form::text('Size', $sales->items->size, array('class' => 'form-control')) !!}</div>
            {!! Form::label('size', 'Page No.', array('class' => 'col-md-1')) !!}
            <div class="col-md-4">{!! Form::text('size', '', array('class' => 'form-control')) !!}</div>
          </div>

        </div>
      <br>
        <div class="col-md-12 row">
          <table class="table table-bordered" >
            <thead>
                <tr>
                  <th>DATE</th>
                  <th>JOB NO.</th>
                  <th>GRN NO./MRN/GEIN</th>
                  <th>IN (MT)</th>
                  <th>OUT (MT)</th>
                  <th>BALANCE (MT)</th>
                  <th>REMARK</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{!! Form::text('date', \Carbon\Carbon::now()->format('d/m/Y'), array('id'=>'datepicker', 'class'=>'form-control')) !!}</td>
                  <td>{!! Form::text('job_no', '', array('class' => 'form-control')) !!}</td>
                  <td>{!! Form::text('grn_no', '', array('class' => 'form-control')) !!}</td>
                  <td>{!! Form::number('inmt', '', array('class' => 'form-control')) !!}</td>
                  <td>{!! Form::number('outmt', '', array('class' => 'form-control')) !!}</td>
                  <td>{!! Form::number('balance', '', array('class' => 'form-control')) !!}</td>
                  <td>{!! Form::text('remark', '', array('class' => 'form-control')) !!}</td>
                </tr>
              </tbody>
          </table>

        <div class="form-group row">
          <button type="submit" class="btn btn-success" value="Create">Create </button>
        </div>

        <div class="col-md-12">

          <table class="table table-bordered" id="users-table">
              <thead>
                  <tr>
                    <th>DATE</th>
                    <th>JOB NO.</th>
                    <th>GRN NO./MRN/GEIN</th>
                    <th>IN (MT)</th>
                    <th>OUT (MT)</th>
                    <th>BALANCE (MT)</th>
                    <th>REMARK</th>
                    <th>ACTION</th>
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
                      ajax: '{!! route('frontend.plan.tablebalance') !!}',

                      "order": [[ 0, "desc" ]]
                  });
              });


              //Being injected from FrontendController
              console.log(test);
          </script>
        </div>
        </div>

      {!!Form::close();!!}

    </div>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#datepicker" ).datepicker({
          dateFormat: "dd/mm/yy"
        });
      } );
      </script>
@endsection
