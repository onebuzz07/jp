@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <h3 class="box-title"> {{ trans('SALES CONFIRMATION ORDER') }}  </h3>
  @if (access()->hasPermissions(['sales-marketing', 'edit-sales']))
  <div class="row" id="app">
    <div class="col-lg-12">
        {!! Form::model($salesqad, array('route' => array('frontend.slsmark.store', $salesqad->id), 'method' => ' PUT', 'files'=> true, 'id'=>'form' )) !!}
        {!! Form::hidden('id', $salesqad->id) !!}
            <div class="form-group row ">
              {!! Form::label('salesline', 'Sales Order-Line ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('salesline', $salesqad->Sales_Order.'-'.$salesqad->Line, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row ">
              {!! Form::label('approval', 'Customer Approval? ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::checkbox('approval', 1, true, array('class' => 'field')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{{ Form::text('datetime',\Carbon\Carbon::now()->format('d/m/Y'), array('id' => 'datepicker','class' => 'form-control')) }}</div>
              <span class="text-danger">{{ $errors->first('datetime') }}</span>
            </div>

            <div class="form-group row {{ $errors->has('custName') ? 'has-error' : '' }}">
              {!! Form::label('custName', 'Customer Name', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('custName', $salesqad->Name, array('class' => 'form-control')) !!}</div>
              <span class="text-danger">{{ $errors->first('custName') }}</span>
            </div>

            <div class="form-group row {{ $errors->has('purchaseOrder') ? 'has-error' : '' }}">
              {!! Form::label('purchaseOrder', 'Purchase Order', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('purchaseOrder', $salesqad->Purchase_order, array('class' => 'form-control')) !!}</div>
              <span class="text-danger">{{ $errors->first('purchaseOrder') }}</span>
            </div>

            <div class="form-group row {{ $errors->has('model') ? 'has-error' : '' }}">
              {!! Form::label('model', 'Model', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('model', '', array('class' => 'form-control')) !!}</div>
              <span class="text-danger">{{ $errors->first('model') }}</span>
            </div>

            <div class="form-group row {{ $errors->has('partDesc') ? 'has-error' : '' }}">
              {!! Form::label('partDesc', 'Part Description', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partDesc', $salesqad->Description . ' ('.$salesqad->Description_1.')', array('class' => 'form-control')) !!}</div>
              <span class="text-danger">{{ $errors->first('partDesc') }}</span>
            </div>

            <div class="form-group row {{ $errors->has('partNo') ? 'has-error' : '' }}">
              {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partNo', $salesqad->Item_Number, array('class' => 'form-control')) !!}</div>
              <span class="text-danger">{{ $errors->first('partNo') }}</span>
            </div>

            <div class="form-group row {{ $errors->has('size') ? 'has-error' : '' }}">
              {!! Form::label('size', 'Size', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('size', '', array('class' => 'form-control')) !!}</div>
              <span class="text-danger">{{ $errors->first('size') }}</span>
            </div>

            <div class="form-group row {{ $errors->has('quantity') ? 'has-error' : '' }}">
              {!! Form::label('quantity', 'Quantity', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('quantity', $salesqad->Quantity_Ordered, array('class' => 'form-control')) !!}</div>
              <span class="text-danger">{{ $errors->first('quantity') }}</span>
            </div>

            <div class="form-group row {{ $errors->has('rawMaterial') ? 'has-error' : '' }}">
              {!! Form::label('rawMaterial', 'Raw Material', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('rawMaterial', '', array('class' => 'form-control')) !!}</div>
              <span class="text-danger">{{ $errors->first('rawMaterial') }}</span>
            </div>

            <div class="form-group row{{ $errors->has('noPages') ? 'has-error' : '' }}">
              {!! Form::label('noPages', 'Number of Pages', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('noPages','', array('class' => 'form-control')) !!}</div>
              <span class="text-danger">{{ $errors->first('noPages') }}</span>
            </div>

            <div class="form-group row {{ $errors->has('colour') ? 'has-error' : '' }}">
              {!! Form::label('colour', 'Colour', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('colour','', array('class' => 'form-control')) !!}</div>
              <span class="text-danger">{{ $errors->first('colour') }}</span>
            </div>

            <div class="form-group row {{ $errors->has('finishing') ? 'has-error' : '' }}">
              {!! Form::label('finishing', 'Finishing', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('finishing', '', array('class' => 'form-control')) !!}</div>
              <span class="text-danger">{{ $errors->first('finishing') }}</span>
            </div>

            <div class="form-group row {{ $errors->has('deliverDate') ? 'has-error' : '' }}">
              {!! Form::label('deliverDate', 'Deliver Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('deliverDate',$salesqad->Due_Date, array('id'=>'datepicker2','class' => 'form-control')) !!}</div>
              <span class="text-danger">{{ $errors->first('deliverDate') }}</span>
            </div>

            <div class="form-group row">

              {!! Form::label('lot', 'LOT', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('lot', '', array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('mfgDate', 'MFG Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('mfgDate', '', array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('expiryDate', 'EXPIRY Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('expiryDate', '', array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('dateFacNo', 'Date & Fac No', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('dateFacNo', '', array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('packerID', 'Packer\'s ID', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('packerID', '', array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('remark', 'Remarks', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::textarea('remark', '<br>', array('class' => 'form-control', 'id'=> '3')) !!}</div>
            </div>

            <div class="form-group row ">
              {{ Form::label('images[]', 'Files(If any)', array('class' => 'control-label col-md-2')) }}
              <div class="col-md-10">
              <input multiple="multiple" class="btn btn-default btn-file " name="images[]" type="file" id="images[]">
              </div>
            </div>

            <div class="form-group row">
              {!! Form::label('confirmBy', 'Confirmed By', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('confirmBy',Auth::user()->first_name.' '.Auth::user()->last_name, array('class' => 'form-control')) !!}</div>
            </div>

              <div class="form-group row">
              <button type="submit" class="btn btn-success btn-block" value="SAVE"> SAVE </button>
            </div>

            {!! Form::close() !!}
          @else
            <br>
            <label> Please choose your appropriate department </label>
            <br><br>
            <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)"></input>
          @endif

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
             $('#3').summernote({
               height:150,
             });
         });
  </script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

@endsection
