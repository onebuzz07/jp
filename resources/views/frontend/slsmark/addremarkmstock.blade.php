@extends('frontend.layouts.app')
@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
{{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"> --}}
  <div class="page-header">
      <h3 class="box-title"> {!! 'STOCK STATUS' !!}</h3>
  </div>
  <div class="container-fluid">
    <div class="col-md-12 row" id="app">
      {!! Form::model($manual, array('route' => array('frontend.slsmark.storeremarkmanual', $manual->id), 'method' => 'POST', 'files'=>true)) !!}
          <div class="form-group row ">
            {!! Form::label('part_no', 'Part #', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('part_no', $manual->partNo, array('class' => 'form-control', 'readonly' => 'readonly')) !!}</div>
          </div>

      @if (!empty($manual->remark))
        <div class="form-group row ">
          {!! Form::label('remark', 'remark ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remark',$statusstock->remark, array('class' => 'form-control')) !!}</div>
        </div>
      @else
        <div class="form-group row ">
          {!! Form::label('remark1', 'remark ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remark1','', array('class' => 'form-control')) !!}</div>
        </div>
      @endif
      @if (!empty($manual->remark2))
        <div class="form-group row ">
          {!! Form::label('remark2', 'remark (2nd) ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remark2',$statusstock->remark2, array('class' => 'form-control')) !!}</div>
        </div>
      @else
        <div class="form-group row ">
          {!! Form::label('remark2', 'remark (2nd)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remark2','', array('class' => 'form-control')) !!}</div>
        </div>
      @endif
      @if (!empty($manual->remark3))
        <div class="form-group row ">
          {!! Form::label('remark3', 'remark (3rd)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remark3',$statusstock->remark3, array('class' => 'form-control')) !!}</div>
        </div>
      @else
        <div class="form-group row ">
          {!! Form::label('remark3', 'remark (3rd)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remark3','', array('class' => 'form-control')) !!}</div>
        </div>
      @endif
      @if (!empty($manual->remark4))
        <div class="form-group row ">
          {!! Form::label('remark4', 'remark (4th)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remark4',$statusstock->remark4, array('class' => 'form-control')) !!}</div>
        </div>
      @else
        <div class="form-group row ">
          {!! Form::label('remark4', 'remark (4th)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remark4','', array('class' => 'form-control')) !!}</div>
        </div>
      @endif
      @if (!empty($manual->remark5))
        <div class="form-group row ">
          {!! Form::label('remark5', 'remark (5th)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remark5',$statusstock->remark5, array('class' => 'form-control')) !!}</div>
        </div>
      @else
        <div class="form-group row ">
          {!! Form::label('remark5', 'remark (5th)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remark5','', array('class' => 'form-control')) !!}</div>
        </div>
      @endif

        <div class="form-group row">
            <button type="submit" class="btn btn-success" value="SAVE"> SAVE </button>
        </div>
      {!!Form::close();!!}
    </div>
  </div>

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
