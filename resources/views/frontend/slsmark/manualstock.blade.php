@extends('frontend.layouts.app')

@section('content')
    <h1>Sales Marketing Department</h1>
  @include('frontend.slsmark.includes.nav')
    <div class="col-md-12">
      {{-- @include('frontend.slsmark.includes.navindex') --}}
      @include('frontend.slsmark.includes.navtab')
      </div>
    <h4>Key in your preferences</h4>

    {!! Form::model($sales, array('route' => array('frontend.slsmark.manualstore', $sales->id), 'method' => 'POST', 'files'=>true)) !!}

    <div class="form-group row">
      {!! Form::label('keepqty', 'Keep Qty: ', array('class' => 'col-md-2')) !!}
      <div class="col-md-10">{!! Form::text('keepqty', '', array('class' => 'form-control')) !!}</div>
    </div>

    <div class="form-group row">
      {!! Form::label('keepqty', 'Keep Qty: ', array('class' => 'col-md-2')) !!}
      <div class="col-md-10">{!! Form::text('keepqty', '', array('class' => 'form-control')) !!}</div>
    </div>

    <div class="form-group row">
      {!! Form::label('keepqty', 'Keep Qty: ', array('class' => 'col-md-2')) !!}
      <div class="col-md-10">{!! Form::text('keepqty', '', array('class' => 'form-control')) !!}</div>
    </div>

    {!!Form::close();!!}
@endsection
