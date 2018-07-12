@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
  <div class="page-header">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
      <h3 class="box-title"> {!! trans('Delivery Advice') !!}</h3>
  </div> <!--page-header-->

  <div class="container-fluid">
    <div class="row" id="app">
      <div class="col-lg-12">
        {!! Form::open(array('route' => array('frontend.slsmark.dastore', $item->id), 'method'=>'POST', 'files'=>true)) !!}
        <div class="form-group row ">
          {!! Form::label('item_number', 'Item Number ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('item_number', $item->partNo, array('class' => 'form-control')) !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('po', 'Purchase Order ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('po', $sales->purchaseOrder, array('class' => 'form-control')) !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('custCode', 'Customer Code', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('custCode', '', array('class' => 'form-control')) !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('delDate', 'Date', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('delDate', \Carbon\Carbon::now()->format('d/m/Y'), array( 'id'=>'datepicker','placeholder'=>'dd/mm/yyyy', 'class' => 'form-control')) !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('delQty', 'Delivery Quantity ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('delQty', '', array('class' => 'form-control')) !!}</div>
        </div>
        <div class="form-group row">
            <button type="submit" class="btn btn-success btn-block" value="SAVE"> SAVE </button>
        </div>

        {!!Form::close();!!}
      </div>
    </div>
  </div>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
      $( function() {
        $( "#datepicker" ).datepicker({
        dateFormat: "dd/mm/yy"
        });
      } );

  </script>
@endsection
