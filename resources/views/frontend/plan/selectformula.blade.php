@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>

@include('frontend.plan.includes.nav')
  <h4>Formula Template</h4>
    @include('frontend.plan.includes.navplan')
    <div class="row">
        <div class="col-md-4">
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
                                    <strong>c.</strong> Soft Cover Overseas (F&B)
                                </label>
                            </div>

                            <div class="radio">
                                <label for="radi0">
                                  <input type="radio" name="type"  value="d">
                                    <strong>d.</strong> Soft Cover Overseas (W&T)
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


@endsection
