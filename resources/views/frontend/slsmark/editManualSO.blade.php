@extends('frontend.layouts.app')

@section('content')
    <h3>Sales Marketing Department</h3>
  @include('frontend.slsmark.includes.nav')
    {{ Form::model($mso, array('route' => 'frontend.slsmark.updateManualSO', $mso->id)) }}    
			<div class="form-group row ">
			
				{!! Form::hidden('id', null, array('class' => 'form-control')) !!}
          {!! Form::label('manualid', 'ID', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('manual_wid', null, array('class' => 'form-control')) !!}</div>
      </div>
			<div class="form-group row ">
          {!! Form::label('wo', 'Work Order', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('manual_wo', null, array('class' => 'form-control')) !!}</div>
      </div>
			<div class="form-group row ">
          {!! Form::label('part', 'Part', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('part_no', null, array('class' => 'form-control')) !!}</div>
      </div>
			<div class="form-group row ">
          {!! Form::label('child', 'Child Part', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('child_part', null, array('class' => 'form-control')) !!}</div>
      </div>
			<div class="form-group row ">
          {!! Form::label('soqty', 'SO Qty', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::number('so_qty', null, array('class' => 'form-control')) !!}</div>
      </div>
			<div class="form-group row ">
          {!! Form::label('keep', 'Keep Qty', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::number('keep_qty', null, array('class' => 'form-control')) !!}</div>
      </div>
			<div class="form-group row ">
          {!! Form::label('manual_stock', 'Manual Stock', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::number('manual_stock', null, array('class' => 'form-control')) !!}</div>
      </div>
			<div class="form-group row ">
          {!! Form::label('duedate', 'Due Date', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::date('duedate', null, array('class' => 'form-control')) !!}</div>
      </div>
			
			
			<div class="form-group row ">
          {!! Form::label('status', 'Status', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('status', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}</div>
      </div>
			
			<div class="form-group row ">
          {!! Form::label('custpo', 'Customer PO', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('custpo', null, array('class' => 'form-control')) !!}</div>
      </div>
			
			<div class="form-group row ">
          {!! Form::label('sono', 'SO Number', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('sono', null, array('class' => 'form-control')) !!}</div>
      </div>
			
			<div class="form-group row ">
          {!! Form::label('paper', 'Paper', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('paper', null, array('class' => 'form-control')) !!}</div>
      </div>
			<div class="form-group row ">
          {!! Form::label('remark1', 'Remark 1', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('remark1', null, array('class' => 'form-control')) !!}</div>
      </div>
			<div class="form-group row ">
          {!! Form::label('remark2', 'Remark 2', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('remark2', null, array('class' => 'form-control')) !!}</div>
      </div>
			<div class="form-group row ">
          {!! Form::label('remark3', 'Remark 3', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('remark3', null, array('class' => 'form-control')) !!}</div>
      </div>
			<div class="form-group row ">
          {!! Form::label('remark4', 'Remark 4', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('remark4', null, array('class' => 'form-control')) !!}</div>
      </div>
			<div class="form-group row ">
          {!! Form::label('remark5', 'Remark 5', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('remark5', null, array('class' => 'form-control')) !!}</div>
      </div>
			
			<div class="form-group row ">
          {!! Form::label('stockcard', 'Stock Card', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('stockcard', null, array('class' => 'form-control')) !!}</div>
      </div>
			<input type="submit" class="btn btn-info" value="Update"> 
			{!! Form::close() !!}	
		 
		
@stop
