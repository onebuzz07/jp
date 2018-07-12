@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <h3 class="box-title"> {{ trans('REPEAT CONFIRMATION ORDER') }} </h3>
  <div class="row" id="app">
    <div class="col-lg-12">
      <p class="text-right">No:   {{$repeat->sco_number}}  </p>
    </div>
    <div class="col-lg-12">
            {!! Form::model($repeat, array('route' => array('frontend.printing.index'), 'method' => 'PUT')) !!}

            <div class="form-group row ">
              {!! Form::label('approval', 'Customer Approval? ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::checkbox('approval', 1, $repeat->approval, array('class' => 'field', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{{ Form::text('datetime', $repeat->datetime->format('d/m/Y'), array('id'=>'datepicker','class' => 'form-control', 'readonly'=>true)) }}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('custName', 'Customer Name', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('custName', $repeat->custName, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('model', 'Model', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('model', $repeat->items->model, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partDesc', 'Part Description', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partDesc', $repeat->items->partDesc, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partDesc2', 'Part Description 2', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partDesc2', $repeat->items->partDesc2, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partNo', $repeat->items->partNo, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('size', 'Size', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('size', $repeat->items->size, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('quantity', 'Quantity', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('quantity', $repeat->items->quantity, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('qtyOnHand', 'Quantity (On hand)', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('qtyOnHand', $repeat->items->qtyOnHand, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('rawMaterial', 'Raw Material', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('rawMaterial', $repeat->items->rawMaterial, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('noPages', 'Number of Pages', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('noPages', $repeat->items->noPages, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('colour', 'Colour', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('colour', $repeat->items->colour, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('finishing', 'Finishing', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('finishing', $repeat->items->finishing, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('deliverDate', 'Deliver Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('deliverDate', $repeat->deliverDate->format('d/m/Y'), array('id'=>'datepicker2','class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
                      {!! Form::label('images', 'Files', array('class' => 'control-label col-md-2')) !!}
                    <div class="col-md-10">
                      @foreach($repeat->fileupload as $file)
                          <a href="{!! "/uploaded/$file->filename" !!}" download="{!! $file->filename !!}">{!! $file->filename !!}</a>
                          {!! '&nbsp;'!!}
                      @endforeach
                    </div>
            </div>

            <div class="form-group row">

              {!! Form::label('lot', 'LOT', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('lot', $repeat->lot, array('readonly'=>true, 'class'=>'form-control', 'required'=>'required')) !!}</div>
              {!! Form::label('mfgDate', 'MFG Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('mfgDate', $repeat->mfgDate, array('readonly'=>true, 'class'=>'form-control', 'required'=>'required')) !!}</div>
              {!! Form::label('expiryDate', 'EXPIRY Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('expiryDate', $repeat->expiryDate, array('readonly'=>true, 'class'=>'form-control', 'required'=>'required')) !!}</div>
              {!! Form::label('dateFacNo', 'Date & Fac No', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('dateFacNo', $repeat->dateFacNo, array('readonly'=>true, 'class'=>'form-control', 'required'=>'required')) !!}</div>
              {!! Form::label('packerID', 'Packer\'s ID', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('packerID', $repeat->packerID, array('readonly'=>true, 'class'=>'form-control', 'required'=>'required')) !!}</div>
              {!! Form::label('remark', 'Remarks', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::textarea('remark', $repeat->remark, array('class' => 'form-control', 'id'=>'1','readonly'=>true)) !!}</div>
            </div>
              <div class="form-group row">
                {!! Form::label('remark2', 'Remarks (for Planning department)', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::textarea('remark2', $repeat->remark2, array('class' => 'form-control','id'=>'2', 'readonly'=>true)) !!}</div>
              </div>

              <div class="form-group row">
                {!! Form::label('remark3', 'Remarks (for CTP department)', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::textarea('remark3', $repeat->remark3, array('class' => 'form-control','id'=>'3', 'readonly'=>true)) !!}</div>
              </div>
              <div class="form-group row ">
                {!! Form::label('remark4', 'Remarks (for Printing department)', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::textarea('remark4', $repeat->remark4, array('class' => 'form-control' ,'id'=>'4', 'readonly'=>true)) !!}</div>
              </div>

              <div class="form-group row">
              <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)"> </input>
            </div>

            {!! Form::close() !!}
          </div>
        </div>

        <div class="col-md-6">
      </div> {{-- row --}}
    </div> {{-- container-fluid --}}
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#datepicker" ).datepicker({
          dateFormat: "dd/mm/yy"
        });
      } );

      $( function() {
        $( "#datepicker2" ).datepicker({
          dateFormat: "dd/mm/yy"
        });
      } );
      </script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
      <script type="text/javascript">
      $(document).ready(function() {
          $('#1').summernote('disable');
      });

      $(document).ready(function() {
          $('#2').summernote('disable');
      });

      $(document).ready(function() {
          $('#3').summernote('disable');
      });

      $(document).ready(function() {
          $('#4').summernote('disable');
      });
      </script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

@endsection
