@extends('frontend.layouts.app')
@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <div class="page-header">
      <h3 class="box-title"> {!! trans('STOCK STATUS') !!}</h3>
  </div>
  <div class="container-fluid">
    <div class="col-md-12 row" id="app">
      {!! Form::model($sales, array('route' => array('frontend.slsmark.storestocks1', $sales->id), 'method' => 'POST', 'files'=>true)) !!}
        @if(!empty($statusstock->stock_status))
          <div class="form-group row ">
            {!! Form::label('stock_status', 'Item Status', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::select('stock_status', ['R' => 'R', 'N' => 'N', 'M' => 'M'], 'R') !!}</div>
          </div>
        @else
          <div class="form-group row ">
            {!! Form::label('stock_status', 'Item Status', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::select('stock_status', [ 'R' => 'R', 'N' => 'N', 'M' => 'M'], 'R') !!}</div>
          </div>
        @endif
        <div class="form-group row ">
          {!! Form::label('cust_approval', 'Approval', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::select('cust_approval', ['Y' => 'Yes', 'N' => 'No'], 'Y') !!}</div>
        </div>
        @if (!empty($statusstock->app_date))
        <div class="form-group row ">
          {!! Form::label('app_date', 'Date', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('app_date', $statusstock->app_date, array( 'id'=>'1','placeholder'=>'dd/mm/yyyy','class' => 'form-control')) !!}</div>
        </div>
      @else
        <div class="form-group row ">
          {!! Form::label('app_date', 'Date', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('app_date', $sales->deliverDate->format('d/m/Y'), array( 'id'=>'2','placeholder'=>'dd/mm/yyyy','class' => 'form-control')) !!}</div>
        </div>
      @endif
      @if (!empty($statusstock->remarks))
        <div class="form-group row ">
          {!! Form::label('remarks', 'Remarks ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remarks',$statusstock->remarks, array('class' => 'form-control')) !!}</div>
        </div>
      @else
        <div class="form-group row ">
          {!! Form::label('remarks', 'Remarks ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remarks','', array('class' => 'form-control')) !!}</div>
        </div>
      @endif
      @if (!empty($statusstock->remarks2))
        <div class="form-group row ">
          {!! Form::label('remarks2', 'Remarks (2nd) ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remarks2',$statusstock->remarks2, array('class' => 'form-control')) !!}</div>
        </div>
      @else
        <div class="form-group row ">
          {!! Form::label('remarks2', 'Remarks (2nd)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remarks2','', array('class' => 'form-control')) !!}</div>
        </div>
      @endif
      @if (!empty($statusstock->remarks3))
        <div class="form-group row ">
          {!! Form::label('remarks3', 'Remarks (3rd)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remarks3',$statusstock->remarks3, array('class' => 'form-control')) !!}</div>
        </div>
      @else
        <div class="form-group row ">
          {!! Form::label('remarks3', 'Remarks (3rd)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remarks3','', array('class' => 'form-control')) !!}</div>
        </div>
      @endif
      @if (!empty($statusstock->remarks4))
        <div class="form-group row ">
          {!! Form::label('remarks4', 'Remarks (4th)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remarks4',$statusstock->remarks4, array('class' => 'form-control')) !!}</div>
        </div>
      @else
        <div class="form-group row ">
          {!! Form::label('remarks4', 'Remarks (4th)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remarks4','', array('class' => 'form-control')) !!}</div>
        </div>
      @endif
      @if (!empty($statusstock->remarks5))
        <div class="form-group row ">
          {!! Form::label('remarks5', 'Remarks (5th)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remarks5',$statusstock->remarks5, array('class' => 'form-control')) !!}</div>
        </div>
      @else
        <div class="form-group row ">
          {!! Form::label('remarks5', 'Remarks (5th)', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remarks5','', array('class' => 'form-control')) !!}</div>
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
