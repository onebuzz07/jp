@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <h3 class="box-title"> {{ trans('SAMPLE REQUISITION ORDER') }}  </h3>
  @if (access()->hasPermissions(['sales-marketing', 'edit-sales']))
  <div class="row" id="app">

    <div class="col-lg-12">

            {!! Form::model($requisite, array('route' => array('frontend.slsmark.storeeditreq', $requisite->id), 'method' => ' PUT', 'files'=> true)) !!}
            {{ Form::hidden('requisites_id', $requisite->id)}}
            {!!Form::hidden('salesorder', $requisite->salesorder)!!}
            {!!Form::hidden('line', $requisite->line)!!}
            {!! Form::hidden('salesline', $requisite->salesorder.'-'.$requisite->line) !!}

            {{-- <div class="form-group row ">
              {!! Form::label('release', 'Release? ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::checkbox('release', 1, $requisite->release, array('class' => 'field')) !!}</div>
            </div> --}}

            <div class="form-group row">
              {!! Form::label('dateSRO', 'Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{{ Form::text('dateSRO', \Carbon\carbon::now()->format('d/m/Y'), array('id'=>'datepicker','class' => 'form-control')) }}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('customerName', 'Customer Name', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('customerName', $requisite->customerName, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('modelSRO', 'Model', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('modelSRO', $requisite->modelSRO, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partDescSRO', 'Part Description', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partDescSRO', $requisite->partDescSRO , array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partDesc2SRO', 'Part Description 2', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partDesc2SRO', $requisite->partDesc2SRO , array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partNumberSRO', 'Part Number', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partNumberSRO', $requisite->partNumberSRO, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('quantitySRO', 'Quantity', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('quantitySRO', $requisite->quantitySRO, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('sizeSRO', 'Size', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('sizeSRO',$requisite->sizeSRO, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('materialSRO', 'Material', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('materialSRO', $requisite->materialSRO, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
            {!! Form::label('process', 'Type of Process', ['class' => 'col-md-2']) !!}
              <div class="col-md-10 form-group">
                @foreach ($process as $p)
                       <table class="table table-bordered" >
                            <tr>
                                 <input type="hidden" name="id[]" value={!!$p->id!!} />
                                 <td><input type="text" name="other_sub[]" value="{!!$p->other_sub!!}" class="form-control " /></td>
                                 <td><input type="text" name="other_data[]" value="{!!$p->other_data!!}" class="form-control" /></td>
                            </tr>
                       </table>
                @endforeach
                <table class="table table-bordered" id="dynamic_field">
                     <tr>
                          <td><input type="text" name="other_subnew[]"  class="form-control name_list" /></td>
                          <td><input type="text" name="other_datanew[]"  class="form-control name_list" /></td>
                          <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                     </tr>
                </table>
               </div>
            </div>


            <div class="form-group row">
              {!! Form::label('remarksSRO', 'Remarks', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::textarea('remarksSRO', $requisite->remarksSRO, array('class' => 'form-control', 'id'=>'1')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('requiredDate', 'Required Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('requiredDate', $requisite->requiredDate->format('d/m/Y'), array('id'=>'datepicker3','class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('requestedBy', 'Requested By', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('requestedBy',$requisite->requestedBy, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('preparedBy', 'Prepared By', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('preparedBy',Auth::user()->first_name.' '.Auth::user()->last_name, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row ">
              {{ Form::label('images[]', 'Files(If any)', array('class' => 'control-label col-md-2')) }}
              <div class="col-md-10">
              <input multiple="multiple" class="btn btn-default btn-file " name="images[]" type="file" id="images[]">
              </div>
            </div>

            <div class="form-group row">
                      {!! Form::label('images', 'Files', array('class' => 'control-label col-md-2')) !!}
                    <div class="col-md-10">
                      @foreach($fileUpload as $file)
                        <a href="{!! "/uploaded/$file->filename" !!}" download="{!! $file->filename !!}" >{!! $file->filename !!}</a>&nbsp;<a href=" {!!route('frontend.slsmark.deletereqfile', $file->id)!!} " class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" onclick="return confirm('Are you sure you want to delete this item?');" title="delete"></i></a>
                            {!! '&nbsp;'!!}
                      @endforeach
                    </div>
            </div>

            <div class="form-group row">
              <input type="button" class="btn btn-warning" value="BACK" onclick="history.go(-1)"> </input>
                <button type="submit" class="btn btn-success" value="SAVE"> SAVE </button>
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
        $( "#datepicker3" ).datepicker({
          dateFormat: "dd/mm/yy"
        });
      } );

      </script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
      <script type="text/javascript">
             $(document).ready(function() {
                 $('#1').summernote({
                   height:150,
                 });
             });

      </script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
      <script>
       $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                 i++;
                 $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="other_sub[]"  class="form-control name_list" /></td><td><input type="text" name="other_data[]"  class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });
            $(document).on('click', '.btn_remove', function(){
                 var button_id = $(this).attr("id");
                 $('#row'+button_id+'').remove();
            });
          });
       </script>
@endsection
