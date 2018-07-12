@extends('frontend.layouts.app')
@section('content')
<h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
  <h3 class="box-title"> Add Workorder ID and Number for Manual Stock</h3>
    <div class="row form-group col-md-12" id="app">
      {!! Form::model($manual, array('route' => array('frontend.plan.storemanual', $manual->id), 'method' => 'POST')) !!}
        <div class="form-group row ">
          {!! Form::label('manual_wo', 'Workorder #', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('manual_wo', '', array('class' => 'form-control'))!!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('manual_wid', 'Workorder ID', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('manual_wid', '', array('class' => 'form-control'))!!}</div>
        </div>
        <div class="form-group row">
          <input type="submit" name="create" id="save" class="btn btn-success " value="Save">
        </div>
      {!!Form::close();!!}
    </div>

@endsection
