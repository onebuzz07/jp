 {{-- phpinfo();  --}}
@extends('frontend.layouts.app')

@section('content')
<div class="row col-md-12">
  <h1>Import Your File Here</h1>
</div>

  {{-- index slsmark --}}
  <div class="row col-md-12">
    {!! Form::open(array('route' => array('frontend.importedsales'), 'method'=>'POST', 'files'=>true)) !!}
      <div class="col-md-12 row">
        <div class="col-md-4">
            <label>Import your Sales order here.(SO Det)</label>
        </div>
        <div class="col-md-6">
          <div class="col-md-10">{!! Form::file('import_file_sales', null , array( 'class' => 'form-control ')) !!}</div>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Import</button>
        </div>

        </div>
      </div>
    {!!form::close()!!}

    {{-- index plan --}}
    <div class="col-md-12 row">
    {!! Form::open(array('route' => array('frontend.importps'), 'method'=>'POST', 'files'=>true)) !!}
      <div class="col-md-12 row">
        <div class="col-md-4">
            <label>Import your Product Structure here.</label>
        </div>
        <div class="col-md-6">
          <div class="col-md-10">{!! Form::file('import_ps', null , array( 'class' => 'form-control ')) !!}</div>
        </div>
        <div class="col-md-2">
          <button class="btn btn-primary" type="submit">Import</button>
        </div>
      </div>
      </div>
      {!!Form::close();!!}

      {{-- stocklist slsmark--}}
      <div class="row col-md-12">
        {!! Form::open(array('route' => array('frontend.imported2'), 'method'=>'POST', 'files'=>true)) !!}
          <div class="col-md-12 row">
            <div class="col-md-4">
                <label>Import your Work order here.(WO det)</label>
            </div>
            <div class="col-md-6">
                <div class="col-md-10">{!! Form::file('import_file', null , array( 'class' => 'form-control ')) !!}</div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary" type="submit">Import</button>
            </div>
          </div>
        </div>

        {{-- stocklist slsmark --}}
        {!!form::close()!!}
        {{-- <div class="row col-md-12">
          {!! Form::open(array('route' => array('frontend.importso'), 'method'=>'POST', 'files'=>true)) !!}
            <div class="col-md-12 row">
              <div class="col-md-4">
                  <label>Import your Sales order here.(SO)</label>
              </div>
              <div class="col-md-6">
                  <div class="col-md-10">{!! Form::file('import_so', null , array( 'class' => 'form-control ')) !!}</div>
              </div>
              <div class="col-md-2">
                  <button class="btn btn-primary" type="submit">Import</button>
              </div>
            </div>
          </div>
        {!!form::close()!!} --}}

        {{-- production plan --}}
        <div class="row col-md-12">
          {!! Form::open(array('route' => array('frontend.importedprod'), 'method'=>'POST', 'files'=>true)) !!}
            <div class="col-md-12 row">
              <div class="col-md-4">
                  <label>Import your Routing here.(Routing)</label>
              </div>
              <div class="col-md-6">
                  <div class="col-md-5">{!! Form::file('import_file_production', null , array( 'class' => ' ')) !!}</div>
              </div>
              <div class="col-md-2">
                  <button class="btn btn-primary" type="submit">Import</button>
              </div>
            </div>
          </div>
        {!!form::close()!!}

        <div class="row col-md-12">
          {!! Form::open(array('route' => array('frontend.importth'), 'method'=>'POST', 'files'=>true)) !!}
            <div class="col-md-12 row">
              <div class="col-md-4">
                  <label>Import your Transaction History  here.(tr_master)</label>
              </div>
              <div class="col-md-6">
                <div class="col-md-10">{!! Form::file('import_th', null , array( 'class' => 'form-control ')) !!}</div>
              </div>
              <div class="col-md-2">
                  <button class="btn btn-primary" type="submit">Import</button>
              </div>

              </div>
            </div>
          {!!form::close()!!}

          <div class="row col-md-12">
            {!! Form::open(array('route' => array('frontend.importinv'), 'method'=>'POST', 'files'=>true)) !!}
              <div class="col-md-12 row">
                <div class="col-md-4">
                    <label>Import your Inventory  here.</label>
                </div>
                <div class="col-md-6">
                  <div class="col-md-10">{!! Form::file('import_inv', null , array( 'class' => 'form-control ')) !!}</div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" type="submit">Import</button>
                </div>

                </div>
              </div>
            {!!form::close()!!}

            <div class="row col-md-12">
              {!! Form::open(array('route' => array('frontend.importcomment'), 'method'=>'POST', 'files'=>true)) !!}
                <div class="col-md-12 row">
                  <div class="col-md-4">
                      <label>Import your master comment</label>
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-10">{!! Form::file('import_comm', null , array( 'class' => 'form-control ')) !!}</div>
                  </div>
                  <div class="col-md-2">
                      <button class="btn btn-primary" type="submit">Import</button>
                  </div>

                  </div>
                </div>
              {!!form::close()!!}

              <div class="row col-md-12">
                {!! Form::open(array('route' => array('frontend.importedpo'), 'method'=>'POST', 'files'=>true)) !!}
                  <div class="col-md-12 row">
                    <div class="col-md-4">
                        <label>Import your purchase order</label>
                    </div>
                    <div class="col-md-6">
                      <div class="col-md-10">{!! Form::file('import_po', null , array( 'class' => 'form-control ')) !!}</div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" type="submit">Import</button>
                    </div>

                    </div>
                  </div>
                {!!form::close()!!}

@endsection
