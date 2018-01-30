@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>

@include('frontend.plan.includes.nav')
  <h4>Formula Template</h4>
    @include('frontend.plan.includes.navplan')

    <div class="col-md-12 row">

      <div class="col-md-3">

        <div class="form-group row ">
          {!! Form::label('workorder', 'Work Order:', array('class' => 'col-md-3')) !!}
          <div class="col-md-9">{!! $sales->workorder!!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('workorderid', 'ID:', array('class' => 'col-md-3')) !!}
          <div class="col-md-9">{!! $sales->workorder !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('batchbar', 'Batch:', array('class' => 'col-md-3')) !!}
          <div class="col-md-9">{!! $sales->batchbar !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('partNo', 'Item Number:', array('class' => 'col-md-3')) !!}
          <div class="col-md-9">{!! $sales->items->partNo!!}</div>
        </div>

      </div>
        <div class="col-md-5">

          <div class="form-group row ">
            {!! Form::label('partDesc', 'Description:', array('class' => 'col-md-3')) !!}
            <div class="col-md-9">{!! $sales->items->partDesc !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('quantity', 'Quantity Ordered:', array('class' => 'col-md-3')) !!}
            <div class="col-md-9">{!!$sales->items->quantity !!}</div>
          </div>
          <div class="form-group row ">
            {!! Form::label('custName', 'Customer Name:', array('class' => 'col-md-3')) !!}
            <div class="col-md-9">{!! $sales->custName !!}</div>
          </div>
          <div class="form-group row ">
            {!! Form::label('salesorder', 'Sales/Job:', array('class' => 'col-md-3')) !!}
            <div class="col-md-9">{!! $sales->salesorder !!}</div>
          </div>
        </div>


        <div class="col-md-3">
            {!! Form::model($sales, array('route' => array('frontend.plan.selectformula', $sales->id), 'method' => 'GET', 'class' => 'form-horizontal')) !!}
                <fieldset>
                  @if ($workorder->wotypes_id == null)
                  <!-- Form Name -->
                    <legend>Choose one of the formula:</legend>

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

                  @else
                    <div class="form-group">

                          <p> You already pick formula </p>
                    </div>

                  @endif

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
