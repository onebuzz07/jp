@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <h3 class="box-title"> {{ trans('ADD NEW ROLL') }}</h3>
    <div class="" id="app">
      {!! Form::open(array('route' => array('frontend.plan.storeroll'), 'method' => 'POST')) !!}
        <div class="col-md-12 row">
          <div class="form-group row ">
            {!! Form::label('partNo', 'Part No: ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('partNo', $po->item_number, array('class' => 'form-control')) !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('po', 'PO #', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('po',$po->po, array('class' => 'form-control')) !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('podate', 'PO Date', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('podate', \Carbon\Carbon::now()->format('d/m/Y'), array('id' => '1','class' => 'form-control')) !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('grn', 'GRN', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('grn', $po->receiver, array('class' => 'form-control')) !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('datereceived', 'Date Received', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('datereceived', \Carbon\Carbon::now()->format('d/m/Y'), array('id' => '2','class' => 'form-control')) !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('location', 'Location', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('location','', array('class' => 'form-control')) !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('suppliercode', 'Supplier Code', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('suppliercode', $po->supplier, array('class' => 'form-control')) !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('suppliername', 'Supplier Name', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('suppliername', $po->name, array('class' => 'form-control')) !!}</div>
          </div>

          <div class="form-group  row">
            {!! Form::label('size', 'Size', array('class' => 'col-md-2')) !!}
            <div class="col-md-5">{!! Form::text('size', '', array('class' => 'form-control')) !!}</div>
            {!! Form::label('qtyavail', 'Qty Available:', array('class' => 'col-md-1')) !!}
              <div class="col-md-3">{!! Form::number('qtyavail', $po->receipt_quantity, array('class' => 'form-control')) !!}</div>
              <div class="col-md-1">{!! Form::text('unit_of_measure', $po->unit_of_measure, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
          </div>

        </div>
      <br>
        <div class="col-md-12 row">
        <div class="form-group row">
          <button type="submit" class="btn btn-success" value="Create">Create </button>
        </div>


        </div>

      {!!Form::close();!!}

    </div>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#1" ).datepicker({
          dateFormat: "dd/mm/yy"
        });
      } );

      $( function() {
        $( "#2" ).datepicker({
          dateFormat: "dd/mm/yy"
        });
      } );
      </script>


@endsection
