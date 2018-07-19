@extends('frontend.slsmark.includes.layout')

@section('content')
  <div class="container-fluid">
    <div class="row" id="app">
      @foreach($das as $da =>$v)
        @foreach ($v as $d)
          Name:{!!$d->cust->change!!}

          {{-- @foreach ($custs as $c) --}}
        <div class="form-group col-xs-12">
          {{-- <div class="col-xs-2">{!!$d->salesqad->Sold_To!!}</div> --}}

          <div class="col-xs-2">{!! date('d/m/Y', strtotime($d->stand_by))!!}</div>
          <div class=" col-xs-4">{!!  $d->extra!!}</div>
          <div class=" col-xs-4">{!!$d->extra2!!}</div>
        </div>
        <div class="form-group col-xs-12">{!!$d->header!!}</div>
        {!!Form::hidden('so[]', $d->so)!!}
        @foreach ($d->dachilds as $dax)
          @if( $d->stand_by == $d->stand_by )
            {{-- {!!Form::hidden('item_number[]', $dax->item_number)!!} --}}
              {{-- @if($dax->item_number == $n->Item_Number && $n->Sales_Order == $dax->so ) --}}
                <table class="table table-bordered" id="users-table2">
                  <thead>
                    <tr>
                      <th class="col-md-2">No</th>
                      <th>Model/Part No</th>
                      <th>Req Qty</th>
                      <th>Loc - Qty</th>
                      <th>COM Qty</th>
                      <th>Remarks</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

											<td>{!!$dax->salesqad->Line !!}</td>
                      <td>{!! $dax->salesqad->Item_Number !!}</td>
                      <td>{!! $dax->salesqad->Quantity_Ordered !!}</td>
                      <td>
                        @foreach ($dax->salesqad->invqads as $l)
													@if ($l->qtyonhand_detail > 0)
														{!!$l->location.'-'.$l->qtyonhand_detail !!}<br>
													@endif
                        @endforeach
                      </td>
                      <td>
                        {!! $dax->com_qty !!}
                      </td>
                      <td>{!! $dax->remarks !!}</td>
                      <td>{!! $dax->salesqad->Line !!}</td>
                    </tr>
                  </tbody>
                </table>
              @endif
          @endforeach
          {{-- @endforeach --}}
        @endforeach
      @endforeach
    @endsection
