@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <h3 class="box-title"> {{ trans('Choose your Part No or Purchase Order') }}</h3>
    <div>
      {!! Form::open(array('route' => array('frontend.plan.chooseposearch'), 'method' => 'POST')) !!}
        <div class="col-md-12 row">
          <div class="form-group row ">
            {!! Form::label('input', 'Part No/Purchase Order #: ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('input', '', array('class' => 'form-control')) !!}</div>
          </div>
          {{-- <div class="form-group row ">
            {!! Form::label('po', 'Purchase Order: ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('po', '', array('class' => 'form-control')) !!}</div>
          </div> --}}
        </div>
      <br>
      <div class="col-md-12 row">
        <div class="form-group row">
          <button type="submit" class="btn btn-success" value="Search">Search </button>
        </div>
      </div>
    {!!Form::close();!!}

    </div>
    <div class="col-md-12">
      @if(!empty($choose))
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>PO #</th>
            <th>Supplier Code</th>
            <th>Supplier Name</th>
            <th>Item Number</th>
            <th>GRN #</th>
            <th>Qty Receipt</th>
            <th>Unit</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($choose as $c)
            <tr>
              <td>{!!$c->po!!}</td>
              <td>{!!$c->supplier!!}</td>
              <td>{!!$c->name!!}</td>
              <td>{!!$c->item_number!!}</td>
              <td>{!!$c->receiver!!}</td>
              <td>{!!$c->receipt_quantity!!}</td>
              <td>{!!$c->unit_of_measure!!}</td>
              <td><a href="{!!route('frontend.plan.newroll', $c->id)!!}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Create Roll"></i></a></td>
            </tr>
          @endforeach

        </tbody>

      </table>
      @else
      @endif
    </div>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#1" ).datepicker({
          dateFormat: "dd/mm/yy"
        });
      } );

      $( function() {
        $( "#2" ).datepicker({
          dateFormat: "dd/mm/yy"
        });
      } );
      </script>


@endsection
