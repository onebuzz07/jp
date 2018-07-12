@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<h3>Edit Name</h3>
  <div class="container-fluid">
    <div class="row col-md-12" id="app">
      {!! Form::open(array('route' => array('frontend.slsmark.storeeditname'), 'method' => 'POST', 'files'=>true)) !!}
      {!! Form::hidden('code', $name->Sold_To, array('class' => 'form-control')) !!}
      {!! Form::hidden('type', 'Etc', array('class' => 'form-control')) !!}
        <div class="form-group row ">
          {!! Form::label('ori', 'Original Name', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('ori', $name->Name, array('class' => 'form-control')) !!}</div>
        </div>
        @if (!empty($cust->code))
          <div class="form-group row ">
            {!! Form::label('change', 'Change Name', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('change', $cust->change, array('class' => 'form-control')) !!}</div>
          </div>
        @else
          <div class="form-group row ">
            {!! Form::label('change', 'Change Name', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('change', '', array('class' => 'form-control')) !!}</div>
          </div>
        @endif
        <div class="form-group row">
            <button type="submit" class="btn btn-success " value="SAVE"> SAVE </button>
        </div>
      {!!Form::close();!!}
    </div>
  </div>
@endsection
