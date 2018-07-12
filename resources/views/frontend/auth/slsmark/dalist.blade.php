@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')

  <div class="container-fluid">
    <div class="row" id="app">
      <div class="col-lg-12">
        <div class="col-md-12">
          <div class="row" id="app">
            {!! Form::open(array('route' => array('frontend.importbosch'), 'method'=>'POST', 'files'=>true)) !!}
              <div class="col-md-12 row">
                <div class="col-md-3">
                    <label>Import Robert Bosch data here</label>
                </div>
                <div class="col-md-3">
                  <div class="col-md-10">{!! Form::file('import_bosch', null , array( 'class' => 'form-control ')) !!}</div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" type="submit">Import</button>
                </div>
                <div class="col-md-4" id="button"><a class="btn btn-md btn-success" href="{!!route('frontend.slsmark.bosch')!!}">Print Bosch</a>&nbsp<a class="btn btn-md btn-success" href="{!!route('frontend.slsmark.otherformat')!!}">Print Other</a></div>

                </div>
              </div>
            {!!form::close()!!}
            <br>
            {!! Form::open(array('route' => array('frontend.slsmark.dalist'), 'method' => 'GET', 'class' => 'form-horizontal')) !!}
                <fieldset>
                  <!-- Form Name -->
                    <legend>Choose one of the type:</legend>
                      <!-- Multiple Radios -->
                      <div class="form-group">
                          <div class="form-group col-md-12">

                              <div class="radio">
                                  <label for="type">
                                    <input type="radio" name="type"  value="a">
                                      <strong>a.</strong> Bosch
                                      <input type="hidden" value="TDH0010">
                                  </label>
                              </div>

                              <div class="radio">
                                  <label for="radio">
                                    <input type="radio" name="type" class="minimal" value="none">
                                      <strong>b.</strong> Other
                                  </label>
                              </div>

                              <div class="form-group triggerDiv type_none" style="display: none;">
                                <label class="col-sm-4 control-label" for=""></label>
                                <div class="col-sm-8">
                                  <select name="Sold_To" class='form-control'>
                                  @foreach ($salesqad as $s)
                                      <option  value="{!!$s->Sold_To!!}">{!!$s->Name!!} </option>
                                  @endforeach
                                </select>
                                </div>
                              </div>
                      </div>
                      <!-- Button -->
                      <br>
                      <div class="form-group">
                          <div class="form-group col-md-4">
                          <button type="submit"  class="btn btn-primary">Continue</button>
                          </div>
                      </div>

                  </fieldset>
              {{ Form::close() }}
          </div>

      </div>
    </div>
  </div>

  <script>
  $('document').ready(function(){
    $('input[name="type"]').change(function(){
      var val = $('input[name="type"]:checked').val();
      $('.form-group.triggerDiv').hide();
      $('.form-group.triggerDiv.type_'+val).show();
    });

    var val_ref = $('input[name="type"]:checked').val();
    $('.form-group.triggerDiv.type_'+val_ref).show();
  });
</script>
@endsection
