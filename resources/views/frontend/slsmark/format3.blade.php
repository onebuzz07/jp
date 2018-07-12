@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<h4>{!!$custs->change!!}</h4>
  <div class="container-fluid">
    <div class="row" id="app">
      <div class="form-group row">
        <input type="button" class="btn btn-success" value="BACK" onclick="history.go(-1)"> </input>
      </div>
      <br><br>
      {!! Form::model($salesqad, array('route' => array('frontend.slsmark.updatef2', $salesqad->id), 'method' => 'POST', 'files'=>true)) !!}
      {!!Form::hidden('code[]', $custs->code)!!}
        @foreach($das as $d)
          <div class="form-group col-md-12">
            <div class="col-md-4">{!!Form::text('stand_by[]', date('d/m/Y', strtotime($d->stand_by)), array('class' => 'form-control'))!!}</div>
            <div class=" col-md-4">{!!Form::text('extra[]',  $d->extra, array('class' => 'form-control'))!!}</div>
            <div class=" col-md-4">{!!Form::text('extra2[]', $d->extra2, array('class' => 'form-control'))!!}</div>
          </div>
          <div class="form-group col-md-12">{!!Form::textarea('header[]', $d->header, array('class' => 'form-control'))!!}</div>
        @foreach ($d->dachilds as $dax)
          @foreach($name as $n)
            @if( $d->stand_by == $d->stand_by )
              {!!Form::hidden('item_number[]', $dax->item_number)!!}
                @if($dax->item_number == $n->Item_Number && $n->Sales_Order == $dax->so )
                  <table class="table table-bordered" id="users-table2">
                    <thead>
                      <tr>
                        <th class="col-md-2">No</th>
                        <th>Model/Part No</th>
                        <th>Qty</th>
                        <th>Location</th>
                        <th>COM Qty</th>
                        <th>Remarks</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>

                      <td>{!!$n->Line!!}</td>
                        <td>{!!$n->Item_Number!!}</td>
                        <td>{!!$n->Quantity_Ordered!!}</td>
                        <td>
                          @foreach ($n->invqads as $l)
                          {!!$l->location.'-'.$l->qtyonhand_detail !!}<br>
                          @endforeach
                        </td>
                        <td>
                          {!!Form::text('com_qty[]', $dax->com_qty, array('class' => 'form-control'))!!}
                        </td>
                        <td>{!!Form::text('remarks[]', $dax->remarks, array('class' => 'form-control'))!!}</td>
                        <td>{!!$n->Line!!}</td>
                      </tr>
                    </tbody>
                  </table>
                @endif
              @endif
            @endforeach
          @endforeach
        @endforeach
        <div class="form-group row">
        <input type="button" class="btn btn-success" value="BACK" onclick="history.go(-1)"> </input>
      </div>
      {!!Form::close();!!}
    </div>
  </div>
@endsection
