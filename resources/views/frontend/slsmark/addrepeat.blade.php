@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
  <div class="page-header">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <h3 class="box-title"> {!! trans('REPEAT SALES CONFIRMATION ORDER') !!} <small>( Without changing any part number and part description )</small>  </h3>
  </div> <!--page-header-->
  <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-lg-12">
            {{-- <p class="text-right">No:   {{$sales->sco_number}}  </p> --}}
          </div>
          <div class="col-lg-12">
            {!! Form::model($sales, array('route' => array('frontend.slsmark.repeatstore', $sales->id), 'method' => 'POST', 'files'=>true)) !!}
              {!! Form::hidden('sco_number', $sales->sco_number )!!}
              {!! Form::hidden('purchaseOrder', $sales->purchaseOrder )!!}
              @if (access()->hasPermissions(['sales-marketing']))
                {{-- {!! Form::hidden('salesline', $sales->salesorder.'-'.$sales->line) !!} --}}

                <div class="form-group row ">
                  {!! Form::label('approval', 'Customer Approval? ', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::checkbox('approval', 1, true, array('class' => 'field')) !!}</div>
                </div>

                <div class="form-group row ">
                  {!! Form::label('workorder', 'Work Order', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('workorder', $sales->workorder, array('class' => 'form-control')) !!}</div>
                </div>

                <div class="form-group row ">
                  {!! Form::label('wid', 'ID', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('wid', $sales->wid, array('class' => 'form-control')) !!}</div>
                </div>

                <div class="form-group row ">
                  {!! Form::label('salesorder', 'Sales Order ', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('salesorder', $sales->salesorder, array('class' => 'form-control')) !!}</div>
                </div>

                <div class="form-group row ">
                  {!! Form::label('line', 'Line', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('line', $sales->line, array('class' => 'form-control')) !!}</div>
                </div>



              <div class="form-group row {{ $errors->has('datetime') ? 'has-error' : '' }}">
                {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('datetime', \Carbon\Carbon::now()->format('d/m/Y'), array( 'id'=>'datepicker','placeholder'=>'dd/mm/yyyy', 'class' => 'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('datetime') }}</span>
              </div>

              <div class="form-group row {{ $errors->has('custName') ? 'has-error' : '' }}">
                {!! Form::label('custName', 'Customer Name', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('custName', $sales->custName, array('placeholder'=>'eg: AB Company', 'class'=>'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('custName') }}</span>
              </div>

              <div class="form-group row {{ $errors->has('model') ? 'has-error' : '' }}">
                {!! Form::label('model', 'Model', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('model', $sales->items->model , array('placeholder'=>'Model', 'class'=>'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('model') }}</span>
              </div>

              <div class="form-group row {{ $errors->has('partDesc') ? 'has-error' : '' }}">
                {!! Form::label('partDesc', 'Part Description', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('partDesc', $sales->items->partDesc , array('placeholder'=>'Part Description', 'class'=>'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('partDesc') }}</span>
              </div>

              <div class="form-group row {{ $errors->has('partNo') ? 'has-error' : '' }}">
                {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('partNo', $sales->items->partNo , array('placeholder'=>'Part Number', 'class'=>'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('partNo') }}</span>
              </div>

              <div class="form-group row {{ $errors->has('size') ? 'has-error' : '' }}">
                {!! Form::label('size', 'Size', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('size', $sales->items->size , array('placeholder'=>'Size', 'class'=>'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('size') }}</span>
              </div>

              <div class="form-group row {{ $errors->has('quantity') ? 'has-error' : '' }}">
                {!! Form::label('quantity', 'Quantity', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('quantity', $sales->items->quantity , array('placeholder'=>'Quantity', 'class'=>'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('quantity') }}</span>
              </div>

              {{-- <div class="form-group row {{ $errors->has('qtyOnHand') ? 'has-error' : '' }}">
                {!! Form::label('qtyOnHand', 'Quantity on Hand', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('qtyOnHand', $sales->items->qtyOnHand , array('placeholder'=>'Quantity on Hand', 'class'=>'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('qtyOnHand') }}</span>
              </div> --}}

              <div class="form-group row {{ $errors->has('rawMaterial') ? 'has-error' : '' }}">
                {!! Form::label('rawMaterial', 'Raw Material', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('rawMaterial', $sales->items->rawMaterial , array('placeholder'=>'Raw Material', 'class'=>'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('rawMaterial') }}</span>
              </div>

              <div class="form-group row {{ $errors->has('noPages') ? 'has-error' : '' }}">
                {!! Form::label('noPages', 'Number of Pages', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('noPages', $sales->items->noPages , array('placeholder'=>'Number of Pages', 'class'=>'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('noPages') }}</span>
              </div>

              <div class="form-group row {{ $errors->has('colour') ? 'has-error' : '' }}">
                {!! Form::label('colour', 'Colour', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('colour', $sales->items->colour , array('placeholder'=>'eg: CYMK', 'class'=>'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('colour') }}</span>
              </div>

              <div class="form-group row {{ $errors->has('finishing') ? 'has-error' : '' }}">
                {!! Form::label('finishing', 'Finishing', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('finishing', $sales->items->finishing , array('placeholder'=>'Finishing Material', 'class'=>'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('finishing') }}</span>
              </div>

              <div class="form-group row {{ $errors->has('deliverDate') ? 'has-error' : '' }}">
                {!! Form::label('deliverDate', 'Deliver Date', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('deliverDate', \Carbon\Carbon::now()->format('d/m/Y'), array( 'id'=>'datepicker2','placeholder'=>'dd/mm/yyyy', 'class'=>'form-control')) !!}</div>
                <span class="text-danger">{{ $errors->first('deliverDate') }}</span>
              </div>

              <div class="form-group row">

                {!! Form::label('lot', 'LOT', ['class' => 'col-md-2']) !!}<div class="col-md-10 {{ $errors->has('lot') ? 'has-error' : '' }}">{!! Form::text('lot', $sales->lot, array('placeholder'=>'' , 'class'=>'form-control')) !!}<span class="text-danger">{{ $errors->first('lot') }}</span></div>
                {!! Form::label('mfgDate', 'MFG Date', ['class' => 'col-md-2']) !!}<div class="col-md-10 {{ $errors->has('mfgDate') ? 'has-error' : '' }}">{!! Form::text('mfgDate', $sales->mfgDate , array('placeholder'=>'' , 'class'=>'form-control')) !!}<span class="text-danger">{{ $errors->first('mfgDate') }}</span></div>
                {!! Form::label('expiryDate', 'EXPIRY Date', ['class' => 'col-md-2']) !!}<div class="col-md-10 {{ $errors->has('expiryDate') ? 'has-error' : '' }}">{!! Form::text('expiryDate', $sales->expiryDate , array('placeholder'=>'' , 'class'=>'form-control')) !!}<span class="text-danger">{{ $errors->first('expiryDate') }}</span></div>
                {!! Form::label('dateFacNo', 'Date & Fac No', ['class' => 'col-md-2']) !!}<div class="col-md-10 {{ $errors->has('dateFacNo') ? 'has-error' : '' }}">{!! Form::text('dateFacNo', $sales->dateFacNo , array('placeholder'=>'' , 'class'=>'form-control')) !!}<span class="text-danger">{{ $errors->first('dateFacNo') }}</span></div>
                {!! Form::label('packerID', 'Packer\'s ID', ['class' => 'col-md-2']) !!}<div class="col-md-10 {{ $errors->has('packerID') ? 'has-error' : '' }}">{!! Form::text('packerID', $sales->packerID , array('placeholder'=>'', 'class'=>'form-control')) !!}<span class="text-danger">{{ $errors->first('packerID') }}</span></div>
                {!! Form::label('remark', 'Remarks', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::textarea('remark', $sales->remark , array('class'=>'form-control', 'id'=>'summernote')) !!}<span class="text-danger">{{ $errors->first('remark') }}</span></div>
              </div>

              <div class="form-group row ">
                {{ Form::label('images[]', 'Files(If any)', array('class' => 'control-label col-md-2')) }}
                <div class="col-md-10">
                <input multiple="multiple" class="btn btn-default btn-file " name="images[]" type="file" id="images[]">
                </div>
              </div>

              <div class="form-group row ">
                {!! Form::label('confirmBy', 'Confirm By', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('confirmBy',Auth::user()->first_name.' '.Auth::user()->last_name, array('class' => 'form-control')) !!}</div>
              </div>

            <div class="form-group row">
                <button type="submit" class="btn btn-success btn-block" value="SAVE"> SAVE </button>
            </div>
            <div class="form-group">
          </div>
          @else

            <p> Please select your own department to continue </p>

          @endif

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
           $('#summernote').summernote({
             height:150,
           });
       });
</script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
@endsection
