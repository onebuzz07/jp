@extends('frontend.layouts.app')

@section('content')
  <h1>Production</h1>
@include('frontend.production.includes.nav')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
  <h3 class="box-title"> {{ trans('VIEW PRODUCTION') }} <small>(Surface Finishing)</small> </h3>
  <div class="row" id="app">
    <div class="col-lg-12">
      {!! Form::model($production, array('method' => 'PUT')) !!}
  @foreach ($station as $pro)

      <div class="form-group row ">
        {!!Form::hidden('job_id[]', $pro->job_id)!!}
        <div class="col-md-5">{!! Form::textarea('remarksQAD[]',$pro->remarksQAD, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
        <div class="col-md-5">{!! Form::textarea('remarks[]',$pro->remarks, array('class' => 'form-control', 'id'=>$pro->job_id)) !!}</div>
      </div>

  @endforeach
    </div>
    <div class="form-group row">
        <input type="button" class="btn btn-success btn-block" value="CHECK" onclick="history.go(-1)">  </input>
    </div>
  </div>
  {!!Form::close();!!}

  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
  <script type="text/javascript">
  @foreach ($station as $pro)

    $(document).ready(function() {
        $('#{!!$pro->job_id!!}').summernote({
          toolbar: [
             ['style', ['bold', 'italic', 'underline', 'clear']],
             ['fontsize', ['fontsize']],
             ['color', ['color']],
             ['para', ['ul', 'ol', 'paragraph']]
          ],

          height:175,
            });
    });

  @endforeach
  </script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
  @endsection
