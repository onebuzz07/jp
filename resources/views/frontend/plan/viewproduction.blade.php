@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>
  @include('frontend.plan.includes.nav')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
        <h3 class="box-title"> {{ trans('VIEW PRODUCTION') }} <small></small> </h3>

    <div class="row" id="app">
      <div class="col-lg-12">
        {!! Form::model($sales, array('route' => array('frontend.plan.index', $sales->id), 'method' => 'PUT')) !!}
        <div class="col-lg-12">
          {!! Form::label('sco_number', 'SCO NUMBER:', array('class' => 'col-md-2')) !!}
          <div class="col-md-2">{!! Form::text('sco_number', $sales->sco_number, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
          {!! Form::label('so_number', 'SO:  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-2">{!! Form::text('so_number', $sales->salesorder, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
          {!! Form::label('wo_number', 'WO:  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-2">{!! Form::text('wo_number', $sales->workorder, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
        </div>
        <br><br>
        @foreach ($stations as $pro)

          <div class="form-group row ">
            {!!Form::hidden('salesjob[]', $pro->salesjob)!!}
            {!! Form::hidden('operation[]',$pro->operation, array('class' => 'form-control', 'readonly'=>true)) !!}
            <table class="table ">
              <tr>
                <th>Station</th>
                <th>Remarks(qad)</th>
                <th>Description</th>
                <th>Remarks</th>
              </tr>
              <tr>

                <td>{!! Form::text('station[]', $pro->station, array('class' => 'form-control', 'readonly'=>true)) !!}</td>
                <td>{!! Form::text('remarksQAD[]',$pro->remarksQAD, array('class' => 'form-control', 'readonly'=>true)) !!}</td>
                <td>{!! Form::textarea('desc[]', $pro->desc, array('class' => 'form-control', 'readonly'=>true)) !!}</td>
                <td>{!! Form::textarea('remarks[]',$pro->remarks, array('class' => 'form-control', 'id'=>$pro->operation)) !!}</td>
              </tr>
            </table>
          </div>

        @endforeach


        <div class="form-group row">
            <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)">  </input>
        </div>

      </div>
    </div>
    {!!Form::close();!!}

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
    <script type="text/javascript">
    @foreach ($stations as $pro)

    $(document).ready(function() {
        $('#{!!$pro->operation!!}').summernote('disable',
        {
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
