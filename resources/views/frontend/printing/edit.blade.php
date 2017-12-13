@extends('frontend.layouts.app')

@section('content')
  <h1>Printing Department</h1>
@include('frontend.printing.includes.nav')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <h3 class="box-title"> {{ trans('SALES CONFIRMATION') }} <small>(For Printing department)</small> </h3>

  <div class="row" id="app">
    <div class="col-lg-12">
      <p class="text-right">No:   {{$sales->sco_number}}  </p>
    </div>
    <div class="col-lg-12">
            {!! Form::model($sales, array('route' => array('frontend.printing.update', $sales->id), 'method' => 'PUT')) !!}
            {!! Form::hidden('salesline', $sales->salesorder.'-'.$sales->line) !!}
                <div class="form-group row ">
                  {!! Form::label('approval', 'Customer Approval? ', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::checkbox('approval', 1, $sales->approval, array('class' => 'field', 'disabled'=>'disabled')) !!}</div>
                </div>

                <div class="form-group row ">
                  {!! Form::label('workorder', 'Work Order ', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('workorder', $sales->workorder, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
                </div>

                <div class="form-group row ">
                  {!! Form::label('wid', 'ID', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('wid', $sales->wid, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
                </div>

                <div class="form-group row ">
                  {!! Form::label('salesorder', 'Sales Order ', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('salesorder', $sales->salesorder, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
                </div>

                <div class="form-group row ">
                  {!! Form::label('line', 'Line', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('line', $sales->line, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
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
              <div class="col-md-10">{!! Form::text('model', $sales->items->model, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partDesc', 'Part Description', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partDesc', $sales->items->partDesc, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partNo', $sales->items->partNo, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('size', 'Size', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('size', $sales->items->size, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('quantity', 'Quantity', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('quantity', $sales->items->quantity, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('rawMaterial', 'Raw Material', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('rawMaterial', $sales->items->rawMaterial, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('noPages', 'Number of Pages', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('noPages', $sales->items->noPages, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('colour', 'Colour', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('colour', $sales->items->colour, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('finishing', 'Finishing', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('finishing', $sales->items->finishing, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('deliverDate', 'Deliver Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('deliverDate', $sales->deliverDate->format('d/m/Y'), array('class' => 'form-control', 'readonly'=>true)) !!}</div>
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

              {!! Form::label('lot', 'LOT', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('lot', $sales->lot, array('readonly'=>true, 'class'=>'form-control', 'required'=>'required')) !!}</div>
              {!! Form::label('mfgDate', 'MFG Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('mfgDate', $sales->mfgDate, array('readonly'=>true, 'class'=>'form-control', 'required'=>'required')) !!}</div>
              {!! Form::label('expiryDate', 'EXPIRY Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('expiryDate', $sales->expiryDate, array('readonly'=>true, 'class'=>'form-control', 'required'=>'required')) !!}</div>
              {!! Form::label('dateFacNo', 'Date & Fac No', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('dateFacNo', $sales->dateFacNo, array('readonly'=>true, 'class'=>'form-control', 'required'=>'required')) !!}</div>
              {!! Form::label('packerID', 'Packer\'s ID', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('packerID', $sales->packerID, array('readonly'=>true, 'class'=>'form-control', 'required'=>'required')) !!}</div>
              {!! Form::label('remark', 'Remarks', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::textarea('remark', $sales->remark, array('class' => 'form-control', 'id'=>'4')) !!}</div>
            </div>
              <div class="form-group row">
                {!! Form::label('remark2', 'Remarks (for Planning department)', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::textarea('remark2', $sales->remark2, array('class' => 'form-control', 'id'=>'1')) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('remark3', 'Remarks (for CTP department)', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::textarea('remark3', $sales->remark3, array('class' => 'form-control', 'id'=>'2')) !!}</div>
              </div>
              @permission('printing')
              <div class="form-group row {{ $errors->has('remark4') ? 'has-error' : '' }}">
                {!! Form::label('remark4', 'Remarks (for printing department)', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::textarea('remark4', '<br>', array('class' => 'form-control' , 'id'=>'3')) !!}</div>
                <span class="text-danger">{{ $errors->first('remark4') }}</span>
              </div>

              <div class="form-group row ">
                {!! Form::label('confirmby4', 'Confirm By', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('confirmby4', Auth::user()->first_name.' '.Auth::user()->last_name, array('class' => 'form-control', 'id'=>'summernote')) !!}</div>
              </div>

              <div class="form-group row">
              <button type="submit" class="btn btn-success btn-block" value="Create"> APPROVE </button>
            </div>
            @endauth
            {!! Form::close() !!}
          </div>
        </div>

        <div class="col-md-6">
      </div> {{-- row --}}
    </div> {{-- container-fluid --}}
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
       $('#1').summernote('disable');
       });

       $(document).ready(function() {
         $('#2').summernote('disable');
       });

       $(document).ready(function() {
         $('#4').summernote('disable');
       });

       $(document).ready(function() {
         $('#3').summernote({
             height:150,
           });
       });
</script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
@endsection
