@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>

@include('frontend.plan.includes.nav')
  <h4>Formula Template</h4>
    @include('frontend.plan.includes.navplan')

    <div class="col-md-12 row">

      <div class="col-md-3">

        <div class="form-group row ">
          {!! Form::label('workorder', 'Work Order', array('class' => 'col-md-3')) !!}
          <div class="col-md-9">{!! Form::text('workorder', $sales->workorder, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('workorderid', 'ID', array('class' => 'col-md-3')) !!}
          <div class="col-md-9">{!! Form::text('workorderid', $sales->workorder, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('batchbar', 'Batch', array('class' => 'col-md-3')) !!}
          <div class="col-md-9">{!! Form::text('batchbar', $sales->batchbar, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('partNo', 'Item Number', array('class' => 'col-md-3')) !!}
          <div class="col-md-9">{!! Form::text('partNo', $sales->items->partNo, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
        </div>

      </div>
        <div class="col-md-5">

          <div class="form-group row ">
            {!! Form::label('partDesc', 'Description  ', array('class' => 'col-md-3')) !!}
            <div class="col-md-9">{!! Form::text('partDesc', $sales->items->partDesc, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('quantity', 'Quantity Ordered', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('quantity', $sales->items->quantity, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
          </div>
          <div class="form-group row ">
            {!! Form::label('custName', 'Customer Name', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('custName', $sales->custName, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
          </div>
          <div class="form-group row ">
            {!! Form::label('salesorder', 'Sales/Job', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('salesorder', $sales->salesorder, array('class' => 'form-control', 'readonly'=>true)) !!}</div>
          </div>
        </div>

        <div class="col-md-3">
            {!! Form::model($sales, array('route' => array('frontend.plan.selectformula', $sales->id), 'method' => 'GET', 'class' => 'form-horizontal')) !!}
                <fieldset>
                  <!-- Form Name -->
                    <legend>Type of formula</legend>

                    <!-- Multiple Radios -->
                    <div class="form-group">
                        <div class="col-md-12">

                            <div class="radio">
                                <label for="type">
                                  <input type="radio" name="type"  value="a">
                                    <strong>a.</strong> Soft Cover V1.5
                                </label>
                            </div>

                            <div class="radio">
                                <label for="radio">
                                  <input type="radio" name="type"  value="b">
                                    <strong>b.</strong> Soft Cover V1.5 (BW)
                                </label>
                            </div>

                            <div class="radio">
                                <label for="radio">
                                  <input type="radio" name="type" value="c">
                                    <strong>c.</strong> Soft Cover Overseas (F and B)
                                </label>
                            </div>

                            <div class="radio">
                                <label for="radi0">
                                  <input type="radio" name="type"  value="d">
                                    <strong>d.</strong> Soft Cover Overseas (W and T)
                                </label>
                            </div>

                            <div class="radio">
                                <label for="radios-1">
                                  <input type="radio" name="type" value="e">
                                    <strong>e.</strong> Boxes V1.3
                                </label>
                            </div>

                            <div class="radio">
                                <label for="radios-1">
                                  <input type="radio" name="type" value="f">
                                    <strong>f.</strong> Planning V1.4
                                </label>
                            </div>

                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">

                        <div class="col-md-4">
                        <button type="submit"  class="btn btn-primary">Continue</button>
                        </div>
                    </div>

                </fieldset>



            {{ Form::close() }}
        </div>
    </div>

<script>

  $(document).ready(function() {
      $('#summernote2').summernote('disable');
      });

</script>

@endsection
