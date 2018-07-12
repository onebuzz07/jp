@extends('frontend.layouts.app')

@section('content')
    <h1>Sales Marketing Department</h1>
  @include('frontend.slsmark.includes.nav')
  <div class="container-fluid">
    {!! Form::open(array('route' => array('frontend.slsmark.updatewidstore'), 'method' => 'POST', 'files'=>true)) !!}
      <div class="form-group row ">
        {!! Form::label('wid', 'ID ', array('class' => 'col-md-2')) !!}
        <div class="col-md-10">{!! Form::text('wid', '', array('class' => 'form-control')) !!}</div>
      </div>
      <div class="form-group row ">
        {!! Form::label('remark', 'Remarks  ', array('class' => 'col-md-2')) !!}
        <div class="col-md-10">{!! Form::textarea('remark', '', array('class' => 'form-control')) !!}</div>
      </div>
      @foreach ($salesqad as $s)
      {!!Form::hidden('id[]', $s->id)!!}
      {!!Form::hidden('salesorder[]', $s->Sales_Order)!!}
    @endforeach
    <div class=" row">
        <button type="submit" class="btn btn-success " value="Submit"> Submit </button>
    </div>
    {!!Form::close();!!}
  </div>
@endsection
