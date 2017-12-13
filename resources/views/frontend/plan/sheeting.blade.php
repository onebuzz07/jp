@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <h3 class="box-title"> {{ trans('PURCHASE/SHEETING') }}</h3>
  <div class="" id="app">
    {!! Form::model($sales, array('route' => array('frontend.plan.sheetingstore', $sales->id), 'method' => 'POST')) !!}
      <div class="col-md-12 row">
        <div class="form-group row ">
          {!! Form::label('supplier', 'Supplier', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('supplier', $sales->supplier, array('class' => 'form-control')) !!}</div>
        </div>

        <div class="form-group row ">
          {!! Form::label('item_number', 'Item Number', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('item_number', $sales->items->partNo, array('class' => 'form-control')) !!}</div>
        </div>

        <div class="form-group row ">
          {!! Form::label('desc', 'Description', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('desc', $sales->items->partDesc, array('class' => 'form-control')) !!}</div>
        </div>

        <div class="form-group row ">
          {!! Form::label('qty', 'Quantity', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('qty', $sales->items->quantity, array('class' => 'form-control')) !!}</div>
        </div>

        <div class="form-group row ">
          {!! Form::label('due_date', 'Due Date', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('due_date', $sales->deliverDate->format('d/m/Y'), array('class' => 'form-control')) !!}</div>
        </div>

        <div class="form-group  row">
          {!! Form::label('customerid', 'ID/Customer', array('class' => 'col-md-2')) !!}
          <div class="col-md-5">{!! Form::text('customerid', '', array('class' => 'form-control')) !!}</div>
          {!! Form::label('partNo', 'Part No.:', array('class' => 'col-md-1')) !!}
          <div class="col-md-4">{!! Form::text('partNo', '', array('class' => 'form-control')) !!}</div>
        </div>

        <div class="form-group row">
          <button type="submit" class="btn btn-success btn-block" value="Create">Create </button>
        </div>

      </div>

      {!!Form::close();!!}

@endsection
