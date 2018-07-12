@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <h3 class="box-title"> {{ trans('Choose customer name or date range') }}</h3>
    <div class="" id="app">
      <div class="col-md-12 row">
        {!! Form::open(array('route' => array('frontend.slsmark.excel'), 'method' => 'PUT')) !!}
        <div class="form-group row ">
          {!! Form::label('Name', 'Customer Name: ', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('Name', '', array('class' => 'form-control')) !!}</div>
        </div>

        <div class="form-group row ">
          {!! Form::label('start', 'Date Start: ', array('class' => 'col-md-1')) !!}
            <div class="col-md-5">{!! Form::text('start', \Carbon\Carbon::now()->format('Y-m-d'), array('id'=>'1', 'class' => 'form-control')) !!}</div>
            {!! Form::label('end', 'Date End: ', array('class' => 'col-md-1')) !!}
              <div class="col-md-5">{!! Form::text('end', \Carbon\Carbon::now()->format('Y-m-d'), array('id'=>'2', 'class' => 'form-control')) !!}</div>
        </div>

        <div class="col-md-12 row">
          <div class="form-group row">
            <button type="submit" class="btn btn-success" value="Search">Export </button>
          </div>
        </div>
        {!!Form::close();!!}
      </div>
    </div>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#1" ).datepicker({
          dateFormat: "yy-mm-dd"
        });
      } );

      $( function() {
        $( "#2" ).datepicker({
          dateFormat: "yy-mm-dd"
        });
      } );
      </script>
@endsection
