@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
      <h3 class="box-title"> {{ trans('REPEAT CONFIRMATION ORDER') }} <small>(For Planning department)</small> </h3>
  <div class="row" id="app">
    <div class="col-lg-12">
      <p class="text-right">No: {{$repeat->rsc_number}} </p>
    </div>
    <div class="col-lg-12">
            {!! Form::model($repeat, array('route' => array('frontend.plan.update', $repeat->id), 'method' => 'PUT')) !!}

              <div class="form-group row">
                {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{{ Form::date('datetime', $repeat->datetime, array('class' => 'form-control', 'disabled' => 'disabled')) }}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('custName', 'Customer Name', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('custName', $repeat->custName, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('model', 'Model', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('model', $repeat->items->model, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('partDesc', 'Part Description', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('partDesc', $repeat->items->partDesc, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('partNo', $repeat->items->partNo, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('size', 'Size', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('size', $repeat->items->size, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('quantity', 'Quantity', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('quantity', $repeat->items->quantity, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('rawMaterial', 'Raw Material', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('rawMaterial', $repeat->items->rawMaterial, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('noPages', 'Number of Pages', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('noPages', $repeat->items->noPages, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('colour', 'Colour', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('colour', $repeat->items->colour, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('finishing', 'Finishing', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('finishing', $repeat->items->finishing, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('deliverDate', 'Deliver Date', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::date('deliverDate', $repeat->deliverDate, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">

                {!! Form::label('lot', 'LOT', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('lot', $repeat->lot, array('disabled' => 'disabled', 'class'=>'form-control', 'required'=>'required')) !!}</div>
                {!! Form::label('mfgDate', 'MFG Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('mfgDate', $repeat->mfgDate, array('disabled' => 'disabled', 'class'=>'form-control', 'required'=>'required')) !!}</div>
                {!! Form::label('expiryDate', 'EXPIRY Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('expiryDate', $repeat->expiryDate, array('disabled' => 'disabled', 'class'=>'form-control', 'required'=>'required')) !!}</div>
                {!! Form::label('dateFacNo', 'Date & Fac No', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('dateFacNo', $repeat->dateFacNo, array('disabled' => 'disabled', 'class'=>'form-control', 'required'=>'required')) !!}</div>
                {!! Form::label('packerID', 'Packer\'s ID', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('packerID', $repeat->packerID, array('disabled' => 'disabled', 'class'=>'form-control', 'required'=>'required')) !!}</div>
                {!! Form::label('remark', 'Remarks', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::textarea('remark', $repeat->remark, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row {{ $errors->has('remark2') ? 'has-error' : '' }}">
                {!! Form::label('remark2', 'Remarks (for Planning department)', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::textarea('remark2', '', array('class' => 'form-control', 'required'=>'required')) !!}</div>
                <span class="text-danger">{{ $errors->first('remark2') }}</span>

              </div>

              {{-- <div class="form-group row">
                {{ Form::label('approval', 'Approval', ['class' => 'col-md-2'])) }}
                <div class="col-md-10">{{ Form::select('approval', array('0' => 'Select one', '1' => 'yes', '2' => 'no'), array('class' => 'form-control')) }}</div>
              </div> --}}

              <div class="row">
              <button type="submit" class="btn btn-success btn-block" value="Create">APPROVE </button>
            </div>

            {!! Form::close() !!}
          </div>
        </div>


</div> {{-- container-fluid --}}

@endsection
