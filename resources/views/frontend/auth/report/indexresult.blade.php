@extends('frontend.report.includes.layout')


@section('content')


  <div class="col-xs-12 row">

    <div class="col-xs-12 row">
          {!! "WO NO.: " .$sales->workorder!!}

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
        {!! "Work Order Due Date: " .date('d/m/Y', strtotime($workorder->due_date))  !!}
      </div>

    </div>
    <div class="col-xs-12 row">
        {!! "Description: " .$sales->items->partDesc !!}
    </div>

    <div class="col-xs-12 row">
      <div class="col-xs-6 row">
          {!!"Qty Ordered: " .$sales->items->quantity. " PC "!!}
      </div>
      <div class="col-xs-5 row">
          {!!"Sales Order: " .$sales->salesorder!!}
      </div>
    </div>

    <div class="col-xs-12 row">
        {!! "Customer Name: " .$sales->deliver_to .' '.$sales->custName !!}
    </div>

    <div class="col-xs-12 row">
      <div class="col-xs-6 row"> {!!"Model: " .$sales->items->model!!} </div>
      <div class="col-xs-6 row"> {!!"Deliver To: " .$sales->deliver_to!!} </div>
    </div>

    <div class="col-xs-12 row">
        {!! "Size: " .$sales->size !!}
    </div>

@if(!empty($remark))
    @if($wotypes->typeofformula =='Boxes')
      <div class="col-xs-12 row">
          <div class="col-xs-6  row"> {!! "Paper Supply: " .$remark->boxespaper !!} </div>
      </div>

      <div class="col-xs-12 row">
          <div class="col-xs-6  row"> {!! "Printing: " .$remark->boxesprinting !!} </div>
      </div>
    @else
    <div class="col-xs-12 row">
        {!! "No of Pages: " .$remark->noPage!!}
    </div>
    @if ($remark->covername == null)
    @else
      <div class="col-xs-12 row">
          <div class="col-xs-6 row"> {!! "$remark->covername: " .$remark->coverqty !!} </div>
          <div class="col-xs-6 row"> {!! "[P.Qty]: " .$remark->coverpaper !!} </div>
      </div>
    @endif

    @if ($remark->t1name == null)
    @else
    <div class="col-xs-12 row">
        <div class="col-xs-6 row"> {!! "$remark->t1name " .$remark->t1qty !!} </div>
          <div class="col-xs-6 row"> {!! "[P.Qty]: " .$remark->t1paper !!}</div>
    </div>
    @endif

    @if ($remark->t2name == null)
    @else
    <div class="col-xs-12 row">
        <div class="col-xs-6 row"> {!! "$remark->t2name: " .$remark->t2qty !!}</div>
        <div class="col-xs-6 row">{!! "[P.Qty]: " .$remark->t2paper !!}</div>
    </div>
    @endif

    @if ($remark->t3name == null)
    @else
    <div class="col-xs-12 row">
        <div class="col-xs-6 row"> {!! "$remark->t3name: " .$remark->t3qty !!}</div>
        <div class="col-xs-6 row"> {!! "[P.Qty]: " .$remark->t3paper !!}</div>
    </div>
    @endif

    @if ($remark->t4name == null)
    @else
    <div class="col-xs-12 row">
        <div class="col-xs-6 row"> {!! "$remark->t4name: " .$remark->t4qty !!}</div>
        <div class="col-xs-6 row"> {!! "[P.Qty]: " .$remark->t4paper !!}</div>
    </div>
    @endif

    @if ($remark->t5name == null)
    @else
    <div class="col-xs-12 row">
        <div class="col-xs-6 row"> {!! "$remark->t5name: " .$remark->t5qty !!}</div>
        <div class="col-xs-6 row"> {!! "[P.Qty]: " .$remark->t5paper !!}</div>
    </div>
    @endif

    @if ($remark->stick1name == null)
    @else
    <div class="col-xs-12 row">
      <div class="col-xs-6 row">   {!! "$remark->stick1name: " .$remark->stick1qty !!}</div>
      <div class="col-xs-6 row">{!! "[P.Qty]: " .$remark->stick1paper !!} </div>
    </div>
    @endif

    @if ($remark->stick2name == null)
    @else
    <div class="col-xs-12 row">
      <div class="col-xs-6 row">   {!! "$remark->stick2name: " .$remark->stick2qty !!}</div>
      <div class="col-xs-6 row">{!! "[P.Qty]: " .$remark->stick2paper !!} </div>
    </div>
    @endif

    @if ($remark->flexi1name == null)
    @else
    <div class="col-xs-12 row">
      <div class="col-xs-6 row">   {!! "$remark->flexi1name: " .$remark->flexi1qty !!}</div>
      <div class="col-xs-6 row">{!! "[P.Qty]: " .$remark->flexi1paper !!} </div>
    </div>
    @endif
    @if ($remark->flexi2name == null)
    @else
      <div class="col-xs-12 row">
        <div class="col-xs-6 row">   {!! "$remark->flexi2name: " .$remark->flexi2qty !!}</div>
        <div class="col-xs-6 row">{!! "[P.Qty]: " .$remark->flexi2paper !!} </div>
      </div>
    @endif


    <div class="col-xs-12 row">
        {!! "Other remarks: " .$remark->remarks !!}
    </div>
  @endif

    <br>
    <br>
  </div>
@else
  <div class="col-xs-12">
  <label>You need to create formula template first to see this part.</label>
</div>
@endif

      <div class="row col-md-12">
         @if ($station == null)
          @else

            @foreach ($station as $s)
              <table class="table row group table-bordered">
                <thead>
                  <tr style="background-color: #f47373;">
                    <th class="col-sm-1">Op No.</th>
                    <th class="col-sm-1">Station</th>
                    <th class="col-sm-2">Description</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                  <td>{!!$s->operation!!}</td>
                  <td>{!!$s->station!!}</td>
                  <td>{!!$s->desc!!}</td>
                </tr>
              </tbody>
            </table>
            <table class="table row group table-bordered">
            </thead>
              <tr style="background-color: #f47373;"><th class="col-sm-12">Remarks</th></tr>
            </thead>
            <tbody>
              <tr><td>{!!$s->remarks!!}</td></tr>
            </tbody>
            </table>
            @endforeach
          @endif
      </div>

      <div class="col-xs-12 align-text-bottom">
            <div class="col-xs-2"><small class="align-text-bottom"> {{ "Printed Date: "}} </small></div>
            <div class="col-xs-4"><small class="align-text-bottom"> {{ \Carbon\Carbon::now()->format('d-F-Y H:i:s')}} </small></div>
            <div class="col-xs-4"><small class="align-text-bottom"> {{ 'Printed By: ' . Auth::user()->first_name }} </small></div>
        </div>


@endsection
