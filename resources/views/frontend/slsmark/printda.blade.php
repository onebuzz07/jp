@extends('frontend.slsmark.includes.layout')

@section('content')
@foreach($da as $c )
  {!!$c->warehouse!!}
        <table class="table table-bordered" id="users-table2">
            <thead>
              <tr>
                <th>CUST PO</th>
                <th>PART NO</th>
                <th>QTY</th>
                <th>SO NO</th>
                <th>STOCK BALANCE</th>
                <th class="col-md-2">INV NO</th>
              </tr>
            </thead>
            @foreach($da as $b)
              @if ($b->warehouse == $c->warehouse)
                <tbody>
                <tr>
                    <td>{!!$b->customer_po!!}</td>
                    <td>{!!$b->item_number!!}</td>
                    <td>{!!$b->quantity!!}</td>
                    <td>{!!$b->so!!}</td>
                    <td></td>
                    <td></td>
                </tr>
              </tbody>
            @endif
        @endforeach
    </table>

  @endforeach

    <div class="col-xs-12 align-text-bottom">
          <div class="col-xs-2"><small class="align-text-bottom"> {{ "Printed Date: "}} </small></div>
          <div class="col-xs-4"><small class="align-text-bottom"> {{ \Carbon\Carbon::now()->format('d-F-Y H:i:s')}} </small></div>
          <div class="col-xs-4"><small class="align-text-bottom"> {{ 'Printed By: ' . Auth::user()->first_name }} </small></div>
      </div>
@endsection
