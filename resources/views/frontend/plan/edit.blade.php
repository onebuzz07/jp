@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <h3 class="box-title"> {{ trans('SALES CONFIRMATION') }} <small>(For Planning department)</small> </h3>
  <div class="row" id="app">
    <div class="col-lg-12">
      <p class="text-right">No: {{$sales->sco_number}} </p>
    </div>
    <div class="col-lg-12">
            {!! Form::model($sales, array('route' => array('frontend.plan.update', $sales->id), 'method' => 'PUT')) !!}

            <div class="form-group row ">
              {!! Form::label('salesline', 'Sales Order-Line ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('salesline', $sales->salesline, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row ">
              {!! Form::label('approval', 'Customer Approval? ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::checkbox('approval', 1, $sales->approval, array('class' => 'field', 'disabled'=>'disabled')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{{ Form::text('datetime', $sales->datetime->format('d/m/Y'), array('id'=>'datepicker','class' => 'form-control','disabled'=>'disabled')) }}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('custName', 'Customer Name', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('custName', $sales->custName, array('class' => 'form-control','disabled'=>'disabled')) !!}</div>
            </div>

            <div class="form-group row ">
              {!! Form::label('purchaseOrder', 'Purchase Order', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('purchaseOrder', $sales->purchaseOrder, array('class' => 'form-control', 'disabled'=>'disabled')) !!}</div>
            </div>

              <div class="form-group row">
                {!! Form::label('model', 'Model', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('model', $sales->items->model, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('partDesc', 'Part Description', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('partDesc', $sales->items->partDesc, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('partNo', $sales->items->partNo, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('size', 'Size', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('size', $sales->items->size, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('quantity', 'Quantity', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('quantity', $sales->items->quantity, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('rawMaterial', 'Raw Material', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('rawMaterial', $sales->items->rawMaterial, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('noPages', 'Number of Pages', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('noPages', $sales->items->noPages, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('colour', 'Colour', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('colour', $sales->items->colour, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('finishing', 'Finishing', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('finishing', $sales->items->finishing, array('class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('deliverDate', 'Deliver Date', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('deliverDate', $sales->deliverDate->format('d/m/Y'), array('id'=>'datepicker2','class' => 'form-control', 'disabled' => 'disabled')) !!}</div>
              </div>

              <div class="form-group row">
                        {!! Form::label('images', 'Files', array('class' => 'control-label col-md-2')) !!}
                      <div class="col-md-10">
                        @foreach($sales->fileupload as $file)
                            <a href="{!! "/uploaded/$file->filename" !!}" download="{!! $file->filename !!}">{!! $file->filename !!}</a>
                            {!! '&nbsp;'!!}
                        @endforeach
                      </div>
              </div>

              <div class="form-group row">

                {!! Form::label('lot', 'LOT', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('lot', $sales->lot, array('disabled' => 'disabled', 'class'=>'form-control', 'required'=>'required')) !!}</div>
                {!! Form::label('mfgDate', 'MFG Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('mfgDate', $sales->mfgDate, array('disabled' => 'disabled', 'class'=>'form-control', 'required'=>'required')) !!}</div>
                {!! Form::label('expiryDate', 'EXPIRY Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('expiryDate', $sales->expiryDate, array('disabled' => 'disabled', 'class'=>'form-control', 'required'=>'required')) !!}</div>
                {!! Form::label('dateFacNo', 'Date & Fac No', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('dateFacNo', $sales->dateFacNo, array('disabled' => 'disabled', 'class'=>'form-control', 'required'=>'required')) !!}</div>
                {!! Form::label('packerID', 'Packer\'s ID', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('packerID', $sales->packerID, array('disabled' => 'disabled', 'class'=>'form-control', 'required'=>'required')) !!}</div>
                {!! Form::label('remark', 'Remarks', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::textarea('remark', $sales->remark, array('class' => 'form-control', 'disabled'=>'disabled', 'id'=>'summernote2')) !!}</div>
              </div>

              @permission('plan')
              <div class="form-group row {{ $errors->has('remark2') ? 'has-error' : '' }}">
                {!! Form::label('remark2', 'Remarks (for Planning department)', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::textarea('remark2', '<br>', array('class' => 'form-control', 'id'=>'summernote')) !!}</div>
                <span class="text-danger">{{ $errors->first('remark2') }}</span>

              </div>

              <div class="form-group row">
              <button type="submit" class="btn btn-success btn-block" value="Create">APPROVE </button>
            </div>
            @endauth

            {!! Form::close() !!}
          </div>
        </div>
      </div> {{-- container-fluid --}}
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<script type="text/javascript">
     $(document).ready(function() {
         $('#summernote2').summernote('disable');
         });
    $(document).ready(function() {
             $('#summernote').summernote({
               height:150,
                 });
             });
</script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
@endsection
