@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<h4>Bosch</h4>
  <div class="container-fluid">
    <div class="row" id="app">
      {{-- <div class="col-md-6" id="button"><a class="btn btn-md btn-primary" href="{!!route('frontend.slsmark.bosch')!!}">Print</a></div> --}}
      {{-- <br><br> --}}
      <table class="table table-bordered" id="users-table2">
          <thead>
              <tr>
                <th>CUST PO</th>
                <th>PART NO</th>
                <th>QTY</th>
                <th>SO NO</th>
                <th>STOCK BALANCE</th>
                <th class="col-md-2">INV NO</th>
                <th class="col-md-2">WAREHOUSE</th>
                <th class="col-md-2">Action</th>
              </tr>
          </thead>
          <tbody>
            {!! Form::open(array('route' => array('frontend.slsmark.changebosch'), 'method' => 'POST', 'files'=>true)) !!}
            @foreach($bosch1 as $b)
              @if ($b->date_upload == \Carbon\Carbon::today()->format('Y-m-d'))
              <tr>
                  <td>{!!$b->cust_po!!}</td>
                  <td>{!!$b->part_no!!}</td>
                  <td>{!!$b->qty!!}</td>
                  @if (!empty($b->salesqad->Sales_Order))
                    <td>{!!$b->salesqad->Sales_Order!!}</td>
                  @else
                    <td></td>
                  @endif
                  @if(!empty($b->invqad->location))
                    <td>
                      {!!$b->invqad->location.'-'.$b->invqad->qtyonhand_detail!!}<br>
                    </td>
                  @else
                  <td></td>
                  @endif
                    @if(!empty($b->inv))
                      <td>{!!$b->inv!!}</td>
                    @else
                      <td>
                      </td>
                    @endif
                    @if(!empty($b->warehouse))
                    <td>
                      {!!$b->warehouse!!}
                    </td>
                  @else
                    <td></td>
                  @endif
                <td>{!!Form::checkbox('stor[]', $b->id)!!}</td>
              </tr>
            @endif
            @endforeach
          </tbody>

      </table>
      <div class="form-group row">
        <button type="submit" class="btn btn-success " value="SUBMIT"> SUBMIT </button>
      </div>
      {!!Form::close();!!}
    </div>
  </div>
@endsection
