@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<h4>Print Bosch</h4>
  <div class="container-fluid">
    <div class="row" id="app">
      {!! Form::open(array('route' => array('frontend.slsmark.boschpdf'), 'method' => 'POST', 'files'=>true)) !!}
      @foreach($bosch2 as $b)

        {!!$b->warehouse!!} {!!Form::checkbox('warehouse[]', $b->warehouse)!!}

            <table class="table table-bordered" id="users-table2">
                <thead>
                  <tr>
                    <th>CUST PO</th>
                    <th>PART NO</th>
                    <th>QTY</th>
                    <th>SO NO</th>
                    <th>STOCK BALANCE</th>
                    <th class="col-md-2">INV NO</th>
                    {{-- <th class="col-md-2">WAREHOUSE</th> --}}
                    {{-- <th class="col-md-2">Action</th> --}}
                  </tr>
                </thead>
                @foreach($bosch1 as $d)
                  @if ($d->date_upload == \Carbon\Carbon::today()->format('Y-m-d'))
                  @if ($d->warehouse == $b->warehouse)
                <tbody>
                <tr>
                    <td>{!!$d->cust_po!!}</td>
                    <td>{!!$d->part_no!!}</td>
                    <td>{!!$d->qty!!}</td>
                    @if (!empty($d->salesqad->Sales_Order))
                      <td>{!!$d->salesqad->Sales_Order!!}</td>
                    @else
                      <td></td>
                    @endif
                    <td>
                      {{-- @foreach ($b->invqad as $f) --}}
                    @if(!empty($d->invqad->location))
                      {!!$d->invqad->location.'-'.$d->invqad->qtyonhand_detail!!}<br>
                    {{-- @else
                      <td></td> --}}
                    @endif
                  {{-- @endforeach --}}
                </td>
                    <td>{!!$d->inv!!}</td>
                    {{-- <td>{!!$d->warehouse!!}</td> --}}
                    {{-- <td>{!!Form::checkbox('warehouse[]', $d->warehouse)!!}</td> --}}
                </tr>
              </tbody>
            @endif
            @endif
          @endforeach
        </table>
      @endforeach
      <div class="form-group row">
        <button type="submit" class="btn btn-success " value="SAVE"> SAVE </button>
      </div>
      {!!Form::close();!!}
    </div>
  </div>
@endsection
