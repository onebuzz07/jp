@extends('frontend.layouts.app')

@section('content')
    <h1>Sales Marketing Department</h1>
  @include('frontend.slsmark.includes.nav')
  <div class="container-fluid">
    {!! Form::model($salesqad, array('route' => array('frontend.slsmark.storeremarkso', $salesqad->id), 'method' => 'POST', 'files'=>true)) !!}
      <div class="form-group row ">
          {!! Form::label('Sales_Order', 'Sales Order ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! $salesqad->Sales_Order !!}</div>
      </div>
      <div class="form-group row ">
        {!! Form::label('Line', 'Line ', array('class' => 'col-md-2')) !!}
        <div class="col-md-10">{!! $salesqad->Line!!}</div>
      </div>

      <div class="form-group row ">
        @if($salesqad->wid != null)
          {!! Form::label('wid', 'Work Order ID', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('wid', $salesqad->wid, array('class' => 'form-control')) !!}</div>
        @else
          {!! Form::label('wid', 'Work Order ID', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('wid', '', array('class' => 'form-control')) !!}</div>
        @endif

      </div>
      <div class="form-group row ">
        @if($salesqad->status_item != null)
          {!! Form::label('status_item', 'Item Status', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::select('status_item', ['R' => 'R', 'N' => 'N', 'M' => 'M'], 'R') !!}</div>
        @else
          {!! Form::label('status_item', 'Item Status', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::select('status_item', ['R' => 'R', 'N' => 'N', 'M' => 'M'], 'R') !!}</div>
        @endif

      </div>
      <div class="form-group row ">
        @if($stock->keepqty != null)
          {!! Form::label('keepqty', 'Keep Quantity', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('keepqty', $stock->keepqty, array('class' => 'form-control')) !!}</div>
        @else
          {!! Form::label('keepqty', 'Keep Quantity', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('keepqty', '', array('class' => 'form-control')) !!}</div>
        @endif

      </div>
      <div class="form-group row ">
        @if($stock->manualstock != null)
          {!! Form::label('manualstock', 'Manual Quantity', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('manualstock',$stock->manualstock, array('class' => 'form-control')) !!}</div>
        @else
          {!! Form::label('manualstock', 'Manual Quantity', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('manualstock', '', array('class' => 'form-control')) !!}</div>
        @endif

      </div>
      <div class="form-group row ">
        @if($salesqad->widremark != null)
          {!! Form::label('widremark', 'Work Order ID Remarks  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('widremark', $salesqad->widremark, array('class' => 'form-control')) !!}</div>
        @else
          {!! Form::label('widremark', 'Work Order ID Remarks  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('widremark', '', array('class' => 'form-control')) !!}</div>
        @endif

      </div>
      <div class="form-group row ">
        @if($salesqad->soremark != null)
          {!! Form::label('soremark', 'Sales Order Remarks  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('soremark', $salesqad->soremark, array('class' => 'form-control')) !!}</div>
        @else
          {!! Form::label('soremark', 'Sales Order Remarks  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('soremark', '', array('class' => 'form-control')) !!}</div>
        @endif

      </div>
      <div class="form-group row ">
        @if($salesqad->solineremark != null)
          {!! Form::label('solineremark', 'Sales Order (Line) Remarks  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('solineremark', $salesqad->solineremark, array('class' => 'form-control')) !!}</div>
        @else
          {!! Form::label('solineremark', 'Sales Order (Line) Remarks  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('solineremark', '', array('class' => 'form-control')) !!}</div>
        @endif
      </div>
    <div class=" row">
        <button type="submit" class="btn btn-success " value="Submit"> Submit </button>
    </div>
    {!!Form::close();!!}
  </div>
@endsection
