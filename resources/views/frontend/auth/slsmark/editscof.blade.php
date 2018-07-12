@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <h3 class="box-title"> {{ trans('Edit page') }}  </h3>
{!! Form::model($sales, array('route' => array('frontend.slsmark.updatescof', $sales->id), 'method' => 'PUT', 'files'=>true)) !!}
  <div class="row" id="app">
    <div class="col-lg-12">
      <p class="text-right">No:   {{$sales->sco_number}}  </p>
    </div>
    <div class="col-lg-12">

        {!! Form::hidden('sco_number', $sales->sco_number) !!}
        {!! Form::hidden('salesline', $sales->salesorder.'-'.$sales->line) !!}
          @if (access()->hasPermissions(['sales-marketing', 'edit-sales']))
            <div class="form-group row ">
              {!! Form::label('rev', 'Rev # ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('rev', $sales->rev, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row ">
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

            <div class="form-group row">
              {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{{ Form::text('datetime', date('d/m/Y', strtotime($sales->datetime)), array('id'=>'datepicker','class' => 'form-control')) }}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('custName', 'Customer Name', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('custName', $sales->custName, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row ">
              {!! Form::label('purchaseOrder', 'Purchase Order', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('purchaseOrder', $sales->purchaseOrder, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('model', 'Model', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('model', $sales->items->model, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partDesc', 'Part Description', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partDesc', $sales->items->partDesc, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partDesc2', 'Part Description 2', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partDesc2', $sales->items->partDesc2, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partNo', $sales->items->partNo, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('size', 'Size', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('size', $sales->items->size, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('quantity', 'Quantity', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('quantity', $sales->items->quantity, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('rawMaterial', 'Raw Material', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('rawMaterial', $sales->items->rawMaterial, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('noPages', 'Number of Pages', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('noPages', $sales->items->noPages, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('colour', 'Colour', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('colour', $sales->items->colour, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('finishing', 'Finishing', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('finishing', $sales->items->finishing, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('deliverDate', 'Deliver Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('deliverDate', date('d/m/Y', strtotime($sales->deliverDate)), array('id'=>'datepicker2','class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">

              {!! Form::label('lot', 'LOT', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('lot', $sales->items->lot, array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('mfgDate', 'MFG Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('mfgDate', $sales->items->mfgDate, array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('expiryDate', 'EXPIRY Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('expiryDate', $sales->items->expiryDate, array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('dateFacNo', 'Date & Fac No', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('dateFacNo', $sales->items->dateFacNo, array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('packerID', 'Packer\'s ID', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('packerID', $sales->items->packerID, array( 'class'=>'form-control')) !!}</div>
              {!! Form::label('remark', 'Remarks', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::textarea('remark', '<br>'.$sales->items->remark, array('class' => 'form-control', 'id'=>'1')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('edit_user', 'Edit By', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('edit_user',Auth::user()->first_name .' '.Auth::user()->last_name , array('class' => 'form-control' , 'readonly'=>true)) !!}</div>
            </div>

            <div class="form-group row">
                {{ Form::label('images[]', 'Files(If any)', array('class' => 'control-label col-md-2')) }}
                <div class="col-md-10">
                <input multiple="multiple" class="btn btn-default btn-file " name="images[]" type="file" id="images[]">
              </div>
                {!! Form::label('images', 'Files uploaded', array('class' => 'control-label col-md-2')) !!}
                <div class="col-md-10">
                  @foreach($fileUpload as $file)
                    <a href="{!! "/uploaded/$file->filename" !!}" download="{!! $file->filename !!}">{!! $file->filename !!}</a>&nbsp;<a href=" {!!route('frontend.slsmark.deletefile', $file->id)!!} " class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="delete"  onclick="return confirm('Are you sure you want to delete this item?');"></i></a>
                        {!! '&nbsp;'!!}
                  @endforeach
                </div>
            </div>

            <div class="form-group row ">
              {!! Form::label('finish', 'Finish fill the form?', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::select('finish', ['planner' => 'Yes', 'N' => 'No'], 'Yes', array('class' => 'form-control')); !!}</div>
            </div>

            <div class="form-group row">
              <input type="button" class="btn btn-primary" value="BACK" onclick="history.go(-1)">  </input>
            <button type="submit" class="btn btn-success" value="SAVE"> SAVE </button>
          </div>
          <div class="form-group row">
        </div>

          @else
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
            <div class="col-md-10">{{ Form::text('datetime', $sales->datetime->format('d/m/Y'), array('id'=>'datepicker','class' => 'form-control', 'readonly'=>true)) }}</div>
          </div>

          <div class="form-group row">
            {!! Form::label('custName', 'Customer Name', ['class' => 'col-md-2']) !!}
            <div class="col-md-10">{!! Form::text('custName', $sales->custName, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
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
            <div class="col-md-10">{!! Form::text('deliverDate', $sales->deliverDate->format('d/m/Y'), array('id'=>'datepicker2','class' => 'form-control', 'readonly'=>true)) !!}</div>
          </div>

          <div class="form-group row">

            {!! Form::label('lot', 'LOT', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('lot', $sales->items->lot, array( 'class'=>'form-control', 'readonly'=>true)) !!}</div>
            {!! Form::label('mfgDate', 'MFG Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('mfgDate', $sales->items->mfgDate, array( 'class'=>'form-control', 'readonly'=>true)) !!}</div>
            {!! Form::label('expiryDate', 'EXPIRY Date', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('expiryDate', $sales->items->expiryDate, array( 'class'=>'form-control', 'readonly'=>true)) !!}</div>
            {!! Form::label('dateFacNo', 'Date & Fac No', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('dateFacNo', $sales->items->dateFacNo, array( 'class'=>'form-control', 'readonly'=>true)) !!}</div>
            {!! Form::label('packerID', 'Packer\'s ID', ['class' => 'col-md-2']) !!}<div class="col-md-10">{!! Form::text('packerID', $sales->items->packerID, array( 'class'=>'form-control', 'readonly'=>true)) !!}</div>
            {!! Form::label('remark', 'Remarks', ['class' => 'col-md-2']) !!}
            <div class="col-md-10">{!! Form::textarea('remark', $sales->items->remark, array('class' => 'form-control', 'id'=>'1')) !!}</div>
          </div>

          <div class="form-group row">
            {!! Form::label('confirmBy', 'Created By', ['class' => 'col-md-2']) !!}
            <div class="col-md-10">{!! Form::text('confirmBy',$sales->confirmBy, array('class' => 'form-control' , 'readonly'=>true)) !!}</div>
          </div>



          <div class="form-group row">
              {{ Form::label('images[]', 'Files(If any)', array('class' => 'control-label col-md-2')) }}
              <div class="col-md-10">
              <input multiple="multiple" class="btn btn-default btn-file " name="images[]" type="file" id="images[]">
            </div>
              {!! Form::label('images', 'Files uploaded', array('class' => 'control-label col-md-2')) !!}
              <div class="col-md-10">
                @foreach($sales->fileupload as $file)
                  <a href="{!! "/uploaded/$file->filename" !!}" download="{!! $file->filename !!}">{!! $file->filename !!}</a>
                      {!! '&nbsp;'!!}
                @endforeach
              </div>
          </div>

          <div class="form-group row">
            <input type="button" class="btn btn-warning" value="BACK" onclick="history.go(-1)"> </input>
              <button type="submit" class="btn btn-success" value="SAVE"> SAVE </button>
          </div>
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
