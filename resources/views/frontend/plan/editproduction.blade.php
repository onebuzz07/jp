@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>
  @include('frontend.plan.includes.nav')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
        <h3 class="box-title"> {{ trans('PRODUCTION') }} <small></small> </h3>

    <div class="row" id="app">
      <div class="col-lg-12">
        {!! Form::model($sales, array('route' => array('frontend.plan.updateproduction', $sales->id), 'method' => 'POST')) !!}
        <div class="col-lg-12">
          {!! Form::label('partNo', 'Item Number:', array('class' => 'col-md-2')) !!}
          <div class="col-md-2">{!! $sales->items->partNo!!}</div>
          {!! Form::label('so_number', 'SO:  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-2">{!! $sales->salesorder !!}</div>
          {!! Form::label('wo_number', 'WO:  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-2">{!! $sales->workorder !!}</div>
        </div>
        {!!Form::hidden('wid', $sales->wid)!!}
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

                  <td class="col-md-2">{!! $pro->station !!}</td>
                  <td class="col-md-3">{!! $pro->remarksQAD!!}</td>
                  <td class="col-md-3">{!! $pro->desc !!}</td>
                  <td class="col-md-4">{!! Form::textarea('remarks[]',$pro->remarks, array('class' => 'form-control', 'id'=>$pro->operation)) !!}</td>
                </tr>
              </table>
            </div>

        @endforeach


        <div class="form-group row">
            <button type="submit" class="btn btn-success btn-block" value="SAVE"> SAVE </button>
        </div>

      </div>
    </div>
    {!!Form::close();!!}

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
    <script type="text/javascript">
    @foreach ($prodqads as $pro)
      $(document).ready(function() {
               $('#{!!$pro->operation!!}').summernote({
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
