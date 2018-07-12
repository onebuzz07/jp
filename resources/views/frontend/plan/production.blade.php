@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>
  @include('frontend.plan.includes.nav')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
        <h3 class="box-title"> {{ trans('PRODUCTION') }} <small></small> </h3>

    <div class="row" id="app">
      <div class="col-lg-12">
        {!! Form::model($sales, array('route' => array('frontend.plan.storeproduction', $sales->id), 'method' => 'POST')) !!}
        <div class="col-lg-12">
          {!! Form::label('partNo', 'Item Number:', array('class' => 'col-md-2')) !!}
          <div class="col-md-2">{!! $sales->items->partNo !!}</div>
          {!! Form::label('so_number', 'SO No.  :  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-2">{!! $sales->salesorder !!}</div>
          {!! Form::label('wid', 'ID:  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-2">{!! $sales->wid !!}</div>
        </div>
        {!!Form::hidden('workorder', $sales->workorder)!!}
        <br><br>
        @if($prodqads == null)
          <div class="form-group row">
            <input type="button" class="btn btn-warning" value="BACK" onclick="history.go(-1)">  </input>
          </div>
      @else
        @foreach ($prodqads as $pro)

            <div class="form-group row ">
              {!!Form::hidden('salesjob[]', $pro->salesjob)!!}
              {!! Form::hidden('operation[]',$pro->operation, array('class' => 'form-control', 'readonly'=>true)) !!}
              <table class="table">
                <tr >
                  <th class="col-md-6">Station</th>
                  <th class="col-md-6">Description</th>
                </tr>
                <tr >
                  <td class="col-md-6">{!!$pro->wo_name !!}</td>
                  {!!Form::hidden('station[]',  $pro->wo_name) !!}
                  {!!Form::hidden('desc[]', $pro->desc) !!}
                  <td class="col-md-6">{!! $pro->desc !!}</td>
                </tr>
              </table>

              <table class=" col-md-12 table">
                <tr >
                  <th class="col-md-12">Remarks</th>
                </tr>
                <tr >
                  <td class="col-md-12">{!! Form::textarea('remarks[]',$pro->remarks, array('class' => 'form-control', 'id'=>$pro->operation)) !!}</td>
                </tr>
              </table>
            </div>

        @endforeach
        <div class="form-group row">
          <input type="button" class="btn btn-warning" value="BACK" onclick="history.go(-1)">  </input>
          <button type="submit" class="btn btn-success" value="SAVE"> SAVE </button>
        </div>

      @endif


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
