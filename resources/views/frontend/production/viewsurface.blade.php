@extends('frontend.layouts.app')

@section('content')
  <h1>Production</h1>
@include('frontend.production.includes.nav')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
  <h3 class="box-title"> {{ trans('VIEW PRODUCTION') }} <small>(Surface Finishing)</small> </h3>
  <div class="row" id="app">
    <div class="col-lg-12">
      {!! Form::model($production, array( 'method' => 'PUT')) !!}
      @foreach ($station as $pro)
          <div class="form-group row ">
            {!!Form::hidden('job_id[]', $pro->job_id)!!}
            <table class="table ">
              <tr>
                <th>Remarks (QAD)</th>
                <th>Remarks</th>
              </tr>
              <tr>
                <td>{!! Form::textarea('remarksQAD[]',$pro->remarksQAD, array('class' => 'form-control', 'readonly'=>true)) !!}</td>
                <td>{!! Form::textarea('remarks[]',$pro->remarks, array('class' => 'form-control', 'id'=>$pro->job_id)) !!}</td>
              </tr>
            </table>
            </div>
            {!!Form::close();!!}
        @endforeach
    </div>

    {!!Form::model($production, array('route' => array('frontend.production.storesurf', $production->id), 'method' => 'POST'))!!}
    <div class="row col-md-12">
      <div class="col-md-12 row">
        {!! Form::label('code2', 'Input:', array('class' => 'col-md-2')) !!}
        <div class="col-md-10">{!! Form::text('code2', '', array('class' => 'form-control')) !!}</div>
      </div>
        <div class="col-md-3 row">
          <button type="submit" class="btn btn-success btn-block" value="SAVE"> CHECK </button>
        </div>
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
