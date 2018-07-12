@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<h4>{!!$custs->change!!}</h4>
  <div class="container-fluid">
    <div class="row" id="app">
    @if ($das->isEmpty())
      {!! Form::model($salesqad, array('route' => array('frontend.slsmark.savef2', $salesqad->id), 'method' => 'POST', 'files'=>true)) !!}
      <div class="form-group row">
          <button type="submit" class="btn btn-success " value="SAVE"> SAVE </button>
      </div>
      {!!Form::hidden('code[]', $custs->code)!!}
        @foreach($date as $d)
          <div class="form-group col-md-12">
            <div class="col-md-4">{!!Form::text('stand_by[]', date('d/m/Y', strtotime($d->Due_Date)), array('id'=> ++$no , 'class' => 'form-control'))!!}</div>
            <div class=" col-md-4">{!!Form::text('extra[]', '', array('class' => 'form-control'))!!}</div>
            <div class=" col-md-4">{!!Form::text('extra2[]', '', array('class' => 'form-control'))!!}</div>
          </div>
          {{-- {!!Form::hidden('sales[]', $d->Sales_Order)!!} --}}
          <div class="form-group col-md-12">{!!Form::textarea('header[]', 'REF:', array('class' => 'form-control'))!!}</div>

          @foreach($name as $n)

            @if($d->Due_Date  == $n->Due_Date && $d->Sales_Order == $n->Sales_Order)
              {!!Form::hidden('sid[]',$n->id)!!}
              {!!Form::hidden('date[]',date('d/m/Y', strtotime($n->Due_Date)))!!}
              {!!Form::hidden('item[]', $n->Item_Number)!!}
              {!!Form::hidden('so[]', $n->Sales_Order)!!}

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
                    <td>@foreach ($n->invqads as $l)
                      {!!$l->location.'-'.$l->qtyonhand_detail !!}<br>
                    @endforeach</td>
                    <td>{!!Form::text('com_qty[]', '', array('class' => 'form-control'))!!}</td>
                    <td>{!!Form::text('remarks[]', $n->Sales_Order.'-'.$n->Purchase_order, array('class' => 'form-control'))!!}</td>
                    <td>{!!$n->Line!!}</td>
                  </tr>
              </tbody>
              </table>
            @endif
          @endforeach
          <script src="//code.jquery.com/jquery-1.10.2.js"></script>
          <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
          <script>
          $( function() {
            $( "#{!!$no!!}" ).datepicker({
            dateFormat: "dd/mm/yy"
            });
          } );

          </script>
        @endforeach



        <div class="form-group row">
            <button type="submit" class="btn btn-success " value="SAVE"> SAVE </button>
        </div>
      {!!Form::close();!!}

    @else

    {!! Form::model($salesqad, array('route' => array('frontend.slsmark.updatef2', $salesqad->id), 'method' => 'POST', 'files'=>true)) !!}
    {!!Form::hidden('code[]', $custs->code)!!}
      @foreach($das as $d)
        <div class="form-group col-md-12">
          <div class="col-md-4">{!!Form::text('stand_by[]', date('d/m/Y', strtotime($d->stand_by)), array('id'=> ++$no, 'class' => 'form-control'))!!}</div>
          <div class=" col-md-4">{!!Form::text('extra[]',  $d->extra, array('class' => 'form-control'))!!}</div>
          <div class=" col-md-4">{!!Form::text('extra2[]', $d->extra2, array('class' => 'form-control'))!!}</div>
        </div>
        <div class="form-group col-md-12">{!!Form::textarea('header[]', $d->header, array('class' => 'form-control'))!!}</div>
      @foreach ($d->dachilds as $dax)
        {{-- @foreach($name as $n) --}}
          @if( $d->stand_by == $d->stand_by )
            {{-- {!!Form::hidden('item_number[]', $dax->item_number)!!} --}}
              {{-- @if($dax->item_number == $n->Item_Number && $n->Sales_Order == $dax->so ) --}}
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

                    <td>{!!$dax->salesqad->Line!!}</td>
                      <td>{!!$dax->salesqad->Item_Number!!}</td>
                      <td>{!!$dax->salesqad->Quantity_Ordered!!}</td>
                      <td>
                        @foreach ($dax->salesqad->invqads as $l)
                        {!!$l->location.'-'.$l->qtyonhand_detail !!}<br>
                        @endforeach
                      </td>
                      <td>
                        {!!Form::text('com_qty[]', $dax->com_qty, array('class' => 'form-control'))!!}
                      </td>
                      <td>{!! $dax->remarks!!}</td>
                      <td>{!!$dax->salesqad->Line!!}</td>
                    </tr>
                  </tbody>
                </table>
              @endif
            {{-- @endif --}}
          {{-- @endforeach --}}
        @endforeach
      @endforeach
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
      <script>
          $( function() {
            $( "#{!! $no!!}" ).datepicker({
            dateFormat: "dd/mm/yy"
            });
          } );

      </script>
      <div class="form-group row">
      <input type="button" class="btn btn-success" value="BACK" onclick="history.go(-1)"> </input>
    </div>
    {!!Form::close();!!}
    @endif
    </div>
  </div>

@endsection
