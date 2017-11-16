@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>

@include('frontend.plan.includes.nav')
  <h4>Formula Template</h4>
    @include('frontend.plan.includes.navplan')
    <div class="row">
        <div class="col-md-4">
            {{ Form::open(array('route' => 'frontend.sr.select', 'method' => 'get', 'class' => 'form-horizontal')) }}

                <fieldset>

                    <!-- Form Name -->
                    <legend>Type</legend>

                    <!-- Multiple Radios -->
                    <div class="form-group">
                        <div class="col-md-12">

                            <div class="radio">
                                <label for="type">
                                  <input type="radio" name="type"  value="a">
                                    <strong>a.</strong> Chargeable with Invoice / Logistic
                                </label>
                            </div>

                            <div class="radio">
                                <label for="radio">
                                  <input type="radio" name="type"  value="b">
                                    <strong>b.</strong> Chargeable with DR to Finance </button>
                                </label>
                            </div>

                            <div class="radio">
                                <label for="radio">
                                  <input type="radio" name="type" value="c">
                                    <strong>c.</strong> Non-chargeable to Logistic/Sample
                                </label>
                            </div>

                            <div class="radio">
                                <label for="radi0">
                                  <input type="radio" name="type"  value="d">
                                    <strong>d.</strong> Non-chargeable / MISC / Returnable
                                </label>
                            </div>

                            <div class="radio">
                                <label for="radios-1">
                                  <input type="radio" name="type" value="e">
                                    <strong>e.</strong> Raw Material Return to Vendor
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
