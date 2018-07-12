@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <h3 class="box-title"> {{ trans('Create new') }}</h3>
    <div class="" id="app">
      <div class="col-md-12 row">
        {!! Form::model($stock, array('route' => array('frontend.slsmark.stockstores', $stock->id), 'method' => 'POST')) !!}
        <div class="form-group row ">
          {!! Form::label('Name', 'Item Number: ', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('Name', '', array('class' => 'form-control')) !!}</div>
        </div>
      </div>

      <div class="col-md-12 row">
        {!! Form::open(array('route' => array('frontend.slsmark.excel'), 'method' => 'PUT')) !!}
        <div class="form-group row ">
          {!! Form::label('keepqty', 'Keep Qty: ', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('keepqty', '', array('class' => 'form-control')) !!}</div>
        </div>
      </div>

      <div class="col-md-12 row">
        {!! Form::open(array('route' => array('frontend.slsmark.excel'), 'method' => 'PUT')) !!}
        <div class="form-group row ">
          {!! Form::label('manualstock', 'Manual Qty: ', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('manualstock', '', array('class' => 'form-control')) !!}</div>
        </div>
      </div>

      <div class="col-md-12 row">
        {!! Form::open(array('route' => array('frontend.slsmark.excel'), 'method' => 'PUT')) !!}
        <div class="form-group row ">
          {!! Form::label('stockqty', 'Stock Qty: ', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('stockqty', '', array('class' => 'form-control')) !!}</div>
        </div>
      </div>

      <div class="col-md-12 row">
        <div class="form-group row">
          <button type="submit" class="btn btn-success" value="submit">Submit </button>
        </div>
      </div>
    {!!Form::close();!!}

@endsection
