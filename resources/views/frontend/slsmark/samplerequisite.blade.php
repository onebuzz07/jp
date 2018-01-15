@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <h3 class="box-title"> {{ trans('SAMPLE REQUISITION ORDER') }}  </h3>
  @if (access()->hasPermissions(['sales-marketing', 'edit-sales']))
  <div class="row" id="app">

    <div class="col-lg-12">

            {!! Form::model($sales, array('route' => array('frontend.slsmark.storereq', $sales->id), 'method' => ' PUT', 'files'=> true)) !!}
            {!!Form::hidden('salesorder', $sales->salesorder)!!}
            {!!Form::hidden('line', $sales->line)!!}
            {!! Form::hidden('salesline', $sales->salesorder.'-'.$sales->line) !!}

            <div class="form-group row ">
              {!! Form::label('release', 'Release? ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::checkbox('release', 1, '', array('class' => 'field')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('dateSRO', 'Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{{ Form::text('dateSRO', \Carbon\carbon::now()->format('d/m/Y'), array('id'=>'datepicker','class' => 'form-control')) }}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('customerName', 'Customer Name', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('customerName', $sales->custName, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('modelSRO', 'Model', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('modelSRO', $sales->items->model, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partDescSRO', 'Part Description', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partDescSRO', $sales->items->partDesc , array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('partNumberSRO', 'Part Number', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('partNumberSRO', $sales->items->partNo, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('quantitySRO', 'Quantity', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('quantitySRO', $sales->items->quantity, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('sizeSRO', 'Size', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('sizeSRO', $sales->items->size, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('materialSRO', 'Material', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('materialSRO', $sales->items->rawMaterial, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
            {!! Form::label('process', 'Type of Process', ['class' => 'col-md-2']) !!}
              <div class="col-md-10 form-group">
                {{-- <form name="add_name" id="add_name"> --}}
                              <div class="table-responsive">
                                   <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                             <td><input type="text" name="other_sub[]" placeholder="Enter your heading (Eg: Color)" class="form-control name_list" /></td>
                                             <td><input type="text" name="other_data[]" placeholder="Enter your data (Eg: CYMK)" class="form-control name_list" /></td>
                                             <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                        </tr>
                                   </table>
                                   {{-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />   --}}
                              </div>
                  {{-- </form> --}}
               </div>
            </div>

            <div class="form-group row">
              {!! Form::label('remarksSRO', 'Remarks', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::textarea('remarksSRO', '<br>', array('class' => 'form-control', 'id'=>'1')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('requiredDate', 'Required Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('requiredDate', \Carbon\carbon::now()->format('d/m/Y'), array('id'=>'datepicker3','class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('requestedBy', 'Requested By', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('requestedBy','', array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('preparedBy', 'Prepared By', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{!! Form::text('preparedBy',Auth::user()->first_name.' '.Auth::user()->last_name, array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              {!! Form::label('images[]', 'Files(If any)', array('class' => 'control-label col-md-2')) !!}
              <div class="col-md-10">
              {{-- {{ Form::fileimages[]', array('multiple' => 'multiple','class' => 'btn btn-default btn-file ')) }} --}}
              <input multiple="multiple" class="btn btn-default btn-file " name="images[]" type="file" id="images[]">
              </div>
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
                 $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="other_sub[]" placeholder="Enter your heading" class="form-control name_list" /></td><td><input type="text" name="other_data[]" placeholder="Enter your data" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });
            $(document).on('click', '.btn_remove', function(){
                 var button_id = $(this).attr("id");
                 $('#row'+button_id+'').remove();
            });
          });
       </script>

@endsection
