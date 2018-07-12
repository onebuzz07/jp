@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <h3 class="box-title"> {{ trans('Edit balance') }}</h3>
  <div class="row" id="app">
    <div class="col-md-12">
      {!! Form::model($balance, array('route' => array('frontend.plan.storeeditbalance', $balance->id), 'method' => 'POST')) !!}
      <div class="form-group row">
        {!! Form::label('wodate', 'WO Date', ['class' => 'col-md-2']) !!}
        <div class="col-md-10">{{ Form::text('wodate',date('d/m/Y', strtotime($balance->wodate)) , array('id'=>'1','class' => 'form-control')) }}</div>
      </div>
      <div class="form-group row">
        {!! Form::label('wid', 'Work Order ID', ['class' => 'col-md-2']) !!}
        <div class="col-md-10">{{ Form::text('wid', $balance->wid, array('class' => 'form-control')) }}</div>
      </div>
      <div class="form-group row">
        {!! Form::label('woqty', 'WO Qty', ['class' => 'col-md-2']) !!}
        <div class="col-md-10">{{ Form::number('woqty', $balance->woqty, array('class' => 'form-control', 'min'=>'0' , 'max'=>''.$balance->balwoqty.'','step'=>"any", 'id'=>'a11', 'v-model'=>'a11')) }}</div>
      </div>
      <div class="form-group row">
        {!! Form::label('balwoqty', 'Balance WO Qty', ['class' => 'col-md-2']) !!}
        <div class="col-md-10">{{ Form::number('balwoqty', $balance->balwoqty, array('class' => 'form-control', 'min'=>'0','step'=>"any", 'id'=>'a21', 'v-model'=>"a21", 'readonly'=>true)) }}</div>
      </div>
      <div class="form-group row">
        {!! Form::label('actqty', 'Actual Qty', ['class' => 'col-md-2']) !!}
        <div class="col-md-10">{{ Form::number('actqty', $balance->actqty, array('class' => 'form-control', 'min'=>'0', 'max'=>''.$balance->balactqty.'','step'=>"any", 'id'=>'a1', 'v-model'=>"a1")) }}</div>
      </div>
      <div class="form-group row">
        {!! Form::label('balactqty', 'Balance Actual Qty', ['class' => 'col-md-2']) !!}
        <div class="col-md-10">{{ Form::number('balactqty', $balance->balactqty, array('class' => 'form-control', 'min'=>'0','step'=>"any", 'id'=>'a2', 'v-model'=>"a2", 'readonly'=>true)) }}</div>
      </div>
      <div class="form-group row">
        {!! Form::label('remarks', 'Remarks', ['class' => 'col-md-2']) !!}
        <div class="col-md-10">{{ Form::text('remarks', $balance->remarks, array('class' => 'form-control')) }}</div>
      </div>

      <div class="form-group row">
        <input type="button" class="btn btn-warning" value="BACK" onclick="history.go(-1)"> </input>
          <button type="submit" class="btn btn-success" value="SAVE"> SAVE </button>
      </div>
      {!! Form::close() !!}
    </div>
</div>
</div> {{-- container-fluid --}}
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<script>
  $( function() {
    $( "#1" ).datepicker({
      dateFormat: "dd/mm/yy"
    });
  } );
  </script>
  <script>
  var vm = new Vue
  ({
          el:'#app',
          data : {
            a1: {!!$balance->actqty!!}, a11:{!!$balance->woqty!!}
          },

          computed: {
            a2: function() {

              var total=({!!$balance->balactqty!!} - parseFloat(this.a1));
              return total;
            },
            a21: function() {
              var total=({!!$balance->balwoqty!!} - parseFloat(this.a11));
              return total;
            },

            a31: function() {
              var total=({!!$balance->balwoqty!!} - parseFloat(this.a11));
              return total;
            },
          },
  });
  </script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
@endsection
