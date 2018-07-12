@extends('frontend.report.includes.layout')


@section('content')

  <div class="col-xs-12 row">

    <div class="col-xs-12 row">
          {!! "Customer Name: " .$sales->custName !!}
    </div>

    <div class="col-xs-12 row">
          {!! "WO NO.: " .$sales->workorder !!}

    </div>

    <div class="col-xs-12 row">
        {!! "ID: " .$sales->wid !!}
    </div>

    <div class="col-xs-12 row">
        {!! "Batch: " .$sales->batchbar !!}
    </div>

    <div class="col-xs-12 row">
      <div class="col-xs-6 row">
          {!! "Item Number: " .$sales->items->partNo  !!}
      </div>

      <div class="col-xs-5 row">
        {!! "Work Order Due Date: " .$workorder->due_date  !!}
      </div>

    </div>
    <div class="col-xs-12 row">
        {!! "Description: " .$sales->items->partDesc !!}
    </div>

    <div class="col-xs-12 row">
      <div class="col-xs-6 row">
          {!!"Qty Ordered: " .$sales->items->quantity. "PCS "!!}
      </div>
      <div class="col-xs-5 row">
          {!!"Sales Order: " .$sales->salesorder!!}
      </div>
    </div>
    <div class="col-xs-12 row">
      {!!"Model: " .$sales->items->model!!}
    </div>

    <div class="col-xs-12 row">
      @if ($wotype->paper_sup == null)
        {!! "Paper Supply:" !!}
      @else
        {!! "Paper Supply: " .$wotype->paper_sup!!}
      @endif
    </div>

    <div class="col-xs-12 row">

      @if ($wotype->printqty == null)
        {!! "Printing Qty: " !!}
      @else
        {!! "Printing Qty: " .$wotype->printqty!!}
      @endif

    </div>


    <div class="col-xs-12 row">
        {!! "Size: " .$sales->items->size !!}
    </div>
    <br>
    <br>
  </div>

      <div class="row col-md-12">
        <table class="table row group table-bordered">
          <thead>
            <tr style="background-color: #f47373;">
              <th class="col-sm-1">Op No.</th>
              <th class="col-sm-1">Station</th>
              <th class="col-sm-1">Remarks (QAD)</th>
              <th class="col-sm-2">Description</th>
              <th class="col-sm-3">Remarks</th>
            </tr>
          </thead>
           @if ($station == null)
          @else

            @foreach ($station as $s)
              <tbody>
                <tr>
                  <td>{!!$s->operation!!}</td>
                  <td>{!!$s->station!!}</td>
                  <td>{!!$s->remarksQAD!!}</td>
                  <td>{!!$s->desc!!}</td>
                  <td>{!!$s->remarks!!}</td>
                </tr>
              </tbody>
            @endforeach

          @endif
            {{-- @foreach ($station as $s)

           @endforeach --}}

        </table>

      </div>

      <div class="col-xs-12 align-text-bottom">
            <div class="col-xs-2"><small class="align-text-bottom"> {{ "Printed Date: "}} </small></div>
            <div class="col-xs-4"><small class="align-text-bottom"> {{ \Carbon\Carbon::now()->format('d-F-Y H:i:s')}} </small></div>
            <div class="col-xs-4"><small class="align-text-bottom"> {{ 'Printed By: ' . Auth::user()->first_name }} </small></div>
        </div>


@endsection
