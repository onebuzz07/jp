@extends('frontend.layouts.app')

@section('content')
    <h1>Sales Marketing Department</h1>
  @include('frontend.slsmark.includes.nav')
  <div class="container-fluid">
    {!! Form::open(array('route' => array('frontend.slsmark.storebosch'), 'method' => 'POST', 'files'=>true)) !!}
      <div class="form-group row ">
        @foreach($bosch as $b)
          {!! Form::hidden('id[]', $b->id, array('class' => 'form-control')) !!}
          @if(!empty($b->cust_po))
            {!! Form::label('cust_po', 'Customer PO: ', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('warehouse', $b->cust_po, array('class' => 'form-control')) !!}</div>
          @else
          @endif
          @if (($b->warehouse)!= null)
            {!! Form::label('warehouse', 'Warehouse: ', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('warehouse', $b->warehouse, array('class' => 'form-control')) !!}</div>
          @else
            {!! Form::label('warehouse', 'Warehouse: ', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('warehouse', '', array('class' => 'form-control')) !!}</div>
          @endif
          @if(!empty($b->inv))
            {!! Form::label('inv', 'Inv: ', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('inv[]', $b->inv, array('class' => 'form-control')) !!}</div>
          @else
            {!! Form::label('inv', 'Inv: ', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('inv[]', '', array('class' => 'form-control')) !!}</div>
          @endif
        @endforeach

      </div>
    <div class=" row">
        <button type="submit" class="btn btn-success " value="Submit"> Submit </button>
    </div>
    {!!Form::close();!!}
  </div>
@endsection
