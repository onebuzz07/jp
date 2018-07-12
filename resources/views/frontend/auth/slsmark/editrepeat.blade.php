@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <h3 class="box-title"> {{ trans('Repeat') }}</h3>
{!! Form::model($salesqad, array('route' => array('frontend.slsmark.storeeditrepeat', $salesqad->id), 'method' => 'POST', 'files'=>true)) !!}
  <div class="row" id="app">
    <div class="col-lg-12">
    </div>
    <div class="col-lg-12">

          {{-- <div class="form-group row ">
            {!! Form::label('workorder', 'Work Order ', array('class' => 'col-md-2')) !!}
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

          <div class="form-group row ">
            {!! Form::label('purchaseOrder', 'Purchase Order', ['class' => 'col-md-2']) !!}
            <div class="col-md-10">{!! Form::text('purchaseOrder', $sales->purchaseOrder, array('class' => 'form-control')) !!}</div>
          </div> --}}
            <div class="form-group row ">
              {!! Form::label('workorder', 'Work Order ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('workorder','', array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row ">
              {!! Form::label('wid', 'ID', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('wid','', array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row ">
              {!! Form::label('salesorder', 'Sales Order ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('salesorder', '', array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row ">
              {!! Form::label('line', 'Line', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('line', '', array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row ">
              {!! Form::label('purchaseOrder', 'Purchase Order', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('purchaseOrder', '', array('class' => 'form-control')) !!}</div>
            </div>


            <div class="form-group row">
              {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{{ Form::text('datetime',\Carbon\Carbon::now()->format('d/m/Y'), array('id'=>'datepicker','class' => 'form-control')) }}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('custName', 'Customer Name', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('custName', $salesqad->Name, array('class' => 'form-control')) !!}</div>
            </div>


            <div class="form-group row">
              {!! Form::label('model', 'Model', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('model','', array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partDesc', 'Part Description', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partDesc', $salesqad->Description, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partDesc2', 'Part Description 2', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partDesc2', $salesqad->Description_1, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partNo', $salesqad->Item_Number, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('size', 'Size', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('size', '', array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('quantity', 'Quantity', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('quantity', $salesqad->Quantity_Ordered, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('rawMaterial', 'Raw Material', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('rawMaterial','', array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('noPages', 'Number of Pages', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('noPages','', array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('colour', 'Colour', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('colour', '', array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('finishing', 'Finishing', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('finishing', '', array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('deliverDate', 'Deliver Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('deliverDate', date('d/m/Y', strtotime($salesqad->Due_Date)), array('id'=>'datepicker2','class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">

              {!! Form::label('lot', 'LOT', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('lot', '', array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('mfgDate', 'MFG Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('mfgDate', '', array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('expiryDate', 'EXPIRY Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('expiryDate','', array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('dateFacNo', 'Date & Fac No', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('dateFacNo', '', array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('packerID', 'Packer\'s ID', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('packerID', '', array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('remark', 'Remarks', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::textarea('remark', '<br>', array('class' => 'form-control', 'id'=>'1')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('confirmBy', 'Created By', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('confirmBy',Auth::user()->first_name .' '.Auth::user()->last_name , array('class' => 'form-control' , 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
                {{ Form::label('images[]', 'Files(If any)', array('class' => 'control-label col-md-2')) }}
                <div class="col-md-10">
                <input multiple="multiple" class="btn btn-default btn-file " name="images[]" type="file" id="images[]">
              </div>

            </div>

            <div class="form-group row ">
              {!! Form::label('finish', 'Finish fill the form?', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::select('finish', [ 'N' => 'No','planner' => 'Yes'], 'No', array('class' => 'form-control')); !!}</div>
            </div>

              <div class="form-group row">
                <input type="button" class="btn btn-primary" value="BACK" onclick="history.go(-1)">  </input>
                <button type="submit" class="btn btn-success" value="SAVE"> SAVE </button>
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

            @if (access()->hasPermissions(['sales-marketing', 'edit-sales']))
            <script type="text/javascript">
             $(document).ready(function() {
                 $('#1').summernote({
                   height:150,
                 });
             });
             $(document).ready(function() {
                 $('#2').summernote('disable');
             });

             $(document).ready(function() {
                 $('#4').summernote('disable');
             });

             $(document).ready(function() {
                 $('#3').summernote('disable');
             });
             </script>
             @elseif (access()->hasPermissions(['planning', 'edit-plan']))
               <script type="text/javascript">
             $(document).ready(function() {
               $('#2').summernote({
                 height:150,
               });
             });
             $(document).ready(function() {
                 $('#1').summernote('disable');
             });

             $(document).ready(function() {
                 $('#4').summernote('disable');
             });

             $(document).ready(function() {
                 $('#3').summernote('disable');
             });
             </script>
             @elseif (access()->hasPermissions(['ctp', 'edit-ctp']))
               <script type="text/javascript">
             $(document).ready(function() {
               $('#3').summernote({
                 height:150,
               });
             });
             $(document).ready(function() {
                 $('#1').summernote('disable');
             });

             $(document).ready(function() {
                 $('#2').summernote('disable');
             });

             $(document).ready(function() {
                 $('#4').summernote('disable');
             });
             </script>
             @elseif (access()->hasPermissions(['printing', 'edit-print']))
             <script type="text/javascript">
             $(document).ready(function() {
               $('#4').summernote({
                 height:150,
               });
             });
             $(document).ready(function() {
                 $('#1').summernote('disable');
             });

             $(document).ready(function() {
                 $('#2').summernote('disable');
             });

             $(document).ready(function() {
                 $('#3').summernote('disable');
             });
             </script>
             @else
               <script type="text/javascript">
             $(document).ready(function() {
               $('#1').summernote({
                 height:150,
               });
             });
             $(document).ready(function() {
               $('#2').summernote({
                 height:150,
               });
             });
             $(document).ready(function() {
               $('#3').summernote({
                 height:150,
               });
             });
             $(document).ready(function() {
               $('#4').summernote({
                 height:150,
               });
             });
            </script>
             @endif

      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

@endsection
