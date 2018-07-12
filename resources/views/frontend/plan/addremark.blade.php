@extends('frontend.layouts.app')
@section('content')
<h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
  <h3 class="box-title"> Add Remarks</h3>

    <div class="row" id="app">
      @if(!empty($remark))
      <div class="col-md-12">
        {!! Form::model($workorder, array('route' => array('frontend.plan.updateremark', $workorder->id), 'method' => 'POST')) !!}

        <div class="form-group row ">
          {!! Form::label('workorder', 'Work Order', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! $remark->workorder !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('wid', 'ID', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!!$remark->wid!!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('batch', 'Batch', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! $remark->batch!!}</div>
        </div>
        <div class="form-group row ">
          <div class="col-md-6 row">
            {!! Form::label('partNo', 'Item Number', array('class' => 'col-md-4')) !!}
            <div class="col-md-8">{!! $remark->partNo !!}</div>
          </div>
          <div class="col-md-6 row">
            {!! Form::label('due_date', 'Due Date', array('class' => 'col-md-2')) !!}
            <div class="col-md-8">{!! date('d/m/Y', strtotime($remark->due_date))!!}</div>
          </div>
        </div>
        <div class="form-group row ">
          <div class="col-md-6 row">
            {!! Form::label('partDesc', 'Description', array('class' => 'col-md-4')) !!}
            <div class="col-md-8">{!!$remark->partDesc!!}</div>
          </div>
          <div class="col-md-6 row">
            {!! Form::label('partDesc2', 'Description 2', array('class' => 'col-md-4')) !!}
            <div class="col-md-8">{!!$remark->partDesc2!!}</div>
          </div>

        </div>
        <div class="form-group row">
          <div class="col-md-6 row">
            {!! Form::label('salesjob', 'Sales/Job', array('class' => 'col-md-4')) !!}
            <div class="col-md-8">{!!$remark->salesjob!!}</div>
          </div>
        </div>
        {{-- <div class="form-group row">
          <div class="col-md-6 row">
            {!! Form::label('remarkswo', 'Remarks', array('class' => 'col-md-4')) !!}
            <div class="col-md-8">{!!$remark->remarkswo!!}</div>
          </div>
        </div> --}}
        <div class="form-group row ">
          <div class="col-md-6 row">
            {!! Form::label('quantity_ordered', 'Qty Ordered', array('class' => 'col-md-4')) !!}
            <div class="col-md-8">{!!$remark->quantity_ordered!!} PC</div>
          </div>
          <div class="col-md-6 row">
            {!! Form::label('deliverto', 'Deliver To', array('class' => 'col-md-2')) !!}
            <div class="col-md-8">{!!$remark->deliverto!!}</div>
          </div>
        </div>
        <div class="form-group row ">
          {!! Form::label('custName', 'Customer', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! $remark->custName !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('model', 'Model', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('model', $remark->model, array('class' => 'form-control'))!!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('noPage', 'No of Pages', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('noPage', $remark->noPage, array('class' => 'form-control')) !!}</div>
        </div>
        @foreach ($wotype as $w)
          @if($w->typeofformula == 'Boxes')
            <div class="form-group row ">
              {!! Form::label('boxespaper', 'Paper Supply:', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('boxespaper', $resultb, array('class' => 'form-control')) !!}</div>
            </div>
            <div class="form-group row ">
              {!! Form::label('boxesprinting', 'Printing Qty: ', array('class' => 'col-md-2')) !!}
              <div class="col-md-10">{!! Form::text('boxesprinting', $resultb1, array('class' => 'form-control')) !!}</div>
            </div>
          @else

            @if ($w->covertotalqty != 0)
              @if ($w->typeofformula == 'Soft Cover')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('covername', 'Cover', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('coverqty', $resultc, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('coverpaper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('coverpaper', $resultc1, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Soft Cover BW')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('covername', 'Cover', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('coverqty', $resultc, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('coverpaper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('coverpaper', $resultc1, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if($w->typeofformula == 'Overseas FB')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('covername', 'Cover', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('coverqty', $resultc, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('coverpaper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('coverpaper', $resultc1, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if($w->typeofformula == 'Overseas WT')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('covername', 'Cover', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('coverqty', $resultc, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('coverpaper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('coverpaper', $resultc1, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
            @endif

            @if ($w->text1totallqty != 0)
              @if ($w->typeofformula == 'Soft Cover')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t1name', 'Text 1', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t1qty', $resultt1, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t1paper', $resultt11, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Soft Cover BW')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t1name', 'Text 1', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t1qty', $resultt1, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t3paper', $resultt11, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas FB')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t1name', 'Text 1', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t1qty', $resultt1, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t1paper', $resultt11, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas WT')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t1name', 'Text 1', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t1qty', $resultt1, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t1paper', $resultt11, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
            @endif

            @if ($w->text2totalqty != 0)
              @if ($w->typeofformula == 'Soft Cover')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t2name', 'Text 2', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t3qty', $resultt2, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t2paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t2paper', $resultt21, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Soft Cover BW')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t2name', 'Text 2', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t2qty', $resultt2, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t2paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t2paper', $resultt21, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas FB')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t2name', 'Text 2', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t2qty', $resultt2, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t2paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t2paper', $resultt21, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas WT')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t2name', 'Text 2', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t3qty', $resultt2, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t2paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t2paper', $resultt21, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
            @endif

            @if ($w->text3totalqty != 0)
              @if ($w->typeofformula == 'Soft Cover')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t3name', 'Text 3', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t3qty', $resultt3, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t3paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t3paper', $resultt31, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Soft Cover BW')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t3name', 'Text 3', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t3qty', $resultt3, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t3paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t3paper', $resultt31, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas FB')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t3name', 'Text 3', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t3qty', $resultt3, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t3paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t3paper', $resultt31, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas WT')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t3name', 'Text 3', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t3qty', $resultt3, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t3paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t3paper', $resultt31, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
            @endif

            @if ($w->text4totalqty != 0)
              @if ($w->typeofformula == 'Soft Cover')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t4name', 'Text 4', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t4qty', $resultt4, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t4paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t4paper', $resultt41, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Soft Cover BW')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t4name', 'Text 4', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t4qty', $resultt4, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t4paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t4paper', $resultt41, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas FB')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t4name', 'Text 4', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t4qty', $resultt4, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t4paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t4paper', $resultt41, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas WT')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t4name', 'Text 4', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t4qty', $resultt4, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t4paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t4paper', $resultt41, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
            @endif

            @if ($w->text5totalqty != 0)
              @if ($w->typeofformula == 'Soft Cover')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t5name', 'Text 5', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t5qty', $resultt5, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t5paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t5paper', $resultt51, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Soft Cover BW')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t5name', 'Text 5', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t5qty', $resultt5, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t5paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t5paper', $resultt51, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas FB')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t5name', 'Text 5', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t5qty', $resultt5, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t5paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t5paper', $resultt51, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas WT')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('t5name', 'Text 5', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t5qty', $resultt5, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('t5paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('t5paper', $resultt51, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
            @endif

            @if ($w->sticker1totalqty != 0)
              @if ($w->typeofformula == 'Soft Cover')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('stick1name', 'Sticker 1', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('stick1qty', $results1, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('stick1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('stick1paper', $results11, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Soft Cover BW')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('stick1name', 'Sticker 1', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('stick1qty', $results1, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('stick1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('stick1paper', $results11, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas FB')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('stick1name', 'Sticker 1', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('stick1qty', $results1, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('stick1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('stick1paper', $results11, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas WT')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('stick1name', 'Sticker 1', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('stick1qty', $results1, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('stick1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('stick1paper', $results11, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
            @endif

            @if ($w->sticker2totalpaper != 0)
              @if ($w->typeofformula == 'Overseas FB')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('stick2name', 'Sticker 2', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('stick2qty', $results2, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('stick2paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('stick2paper', $results21, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas WT')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('stick2name', 'Sticker 2', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('t4qty', $resultt5, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('stick2paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('stick2paper', $resultt51, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
            @endif

            @if ($w->flexi1totalqty != 0)
              @if ($w->typeofformula == 'Overseas FB')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('flexi1name', 'Flexi 2', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('flexi1qty', $resultf1, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('flexi1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('flexi1paper', $resultf11, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas WT')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('flexi1name', 'Flexi 2', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('flexi2qty', $resultf1, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('flexi1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('flexi1paper', $resultf11, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
            @endif

            @if ($w->flexi2totalqty != 0)
              @if ($w->typeofformula == 'Overseas FB')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('flexi2name', 'Flexi 2', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('flexi2qty', $resultf2, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('flexi2name', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('flexi2paper', $resultf21, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
              @if ($w->typeofformula == 'Overseas WT')
                <div class="form-group row col-md-8 ">
                  {!! Form::text('flexi2name', 'Flexi 2', array('class' => 'col-md-3')) !!}
                  <div class="col-md-9">{!! Form::text('flexi2qty', $resultf2, array('class' => 'form-control')) !!}</div>
                </div>
                <div class="form-group row col-md-4">
                  {!! Form::label('flecipaper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::text('flexi2paper', $resultf21, array('class' => 'form-control')) !!}</div>
                </div>
              @endif
            @endif
          @endif
        @endforeach
      <div class="form-group row ">
        {!! Form::label('size', 'Size', array('class' => 'col-md-2')) !!}
        <div class="col-md-10">{!!Form::text('size', $sales->items->size, array('class' => 'form-control'))  !!}</div>
      </div>
      @if(!empty($comments))
        <div class="form-group row ">
          {!! Form::label('remarks', 'Any remarks', array('class' => 'col-md-2')) !!}
          <textarea class="form-control" name="remarks" cols="100" rows="10" id="remarks">{!!$comments->comment_1!!}&#13;&#10;{!!$comments->comment_2!!}
            &#13;&#10;{!!$comments->comment_3!!}&#13;&#10;{!!$comments->comment_4!!}&#13;&#10;{!!$comments->comment_5!!}&#13;&#10;{!!$comments->comment_6!!}
            &#13;&#10;{!!$comments->comment_7!!}&#13;&#10;{!!$comments->comment_8!!}&#13;&#10;{!!$comments->comment_9!!}&#13;&#10;{!!$comments->comment_10!!}
            &#13;&#10;{!!$comments->comment_11!!}&#13;&#10;{!!$comments->comment_12!!}&#13;&#10;{!!$comments->comment_13!!}&#13;&#10;{!!$comments->comment_14!!}
            &#13;&#10;{!!$comments->comment_15!!}
          </textarea>
          <input type="hidden" name="remarkqad" value="{!!$comments->comment_1!!}&#13;&#10;{!!$comments->comment_2!!}
            &#13;&#10;{!!$comments->comment_3!!}&#13;&#10;{!!$comments->comment_4!!}&#13;&#10;{!!$comments->comment_5!!}&#13;&#10;{!!$comments->comment_6!!}
            &#13;&#10;{!!$comments->comment_7!!}&#13;&#10;{!!$comments->comment_8!!}&#13;&#10;{!!$comments->comment_9!!}&#13;&#10;{!!$comments->comment_10!!}
            &#13;&#10;{!!$comments->comment_11!!}&#13;&#10;{!!$comments->comment_12!!}&#13;&#10;{!!$comments->comment_13!!}&#13;&#10;{!!$comments->comment_14!!}
            &#13;&#10;{!!$comments->comment_15!!}"> </input>
          {{-- <div class="col-md-10">{!! Form::textarea('remarks', $comments->comment_1 , array('class' => 'form-control')) !!}</div> --}}
        </div>
      @else
        <div class="form-group row ">
          {!! Form::label('remarks', 'Any remarks', array('class' => 'col-md-2')) !!}
          <textarea class="form-control" name="remarks" cols="100" rows="10" id="remarks">
          </textarea>
          {{-- <div class="col-md-10">{!! Form::textarea('remarks', $comments->comment_1 , array('class' => 'form-control')) !!}</div> --}}
        </div>
      @endif

      <div class="form-group row">
      <input type="submit" name="create" id="create" class="btn btn-success " value="Save without saving the (changes)remarks">
      <input type="submit" name="create" id="save" class="btn btn-success " value="Save">
      {{-- {{ Form::submit( 'Save without change the original remarks', ['class' => 'btn btn-default', 'name' => 'create', 'value' => 'Save']) }} --}}
      </div>
      {!!Form::close();!!}
    </div>
  @else
    <div class="col-md-12">
      {!! Form::model($workorder, array('route' => array('frontend.plan.remarkstore', $workorder->id), 'method' => 'POST')) !!}

      <div class="form-group row ">
        {!! Form::label('workorder', 'Work Order', array('class' => 'col-md-2')) !!}
        <div class="col-md-10">{!! $sales->workorder !!}</div>
      </div>
      <div class="form-group row ">
        {!! Form::label('wid', 'ID', array('class' => 'col-md-2')) !!}
        <div class="col-md-10">{!!$sales->wid!!}</div>
      </div>
      <div class="form-group row ">
        {!! Form::label('batch', 'Batch', array('class' => 'col-md-2')) !!}
        <div class="col-md-10">{!! $sales->batchbar!!}</div>
      </div>
      <div class="form-group row ">
        <div class="col-md-6 row">
          {!! Form::label('partNo', 'Item Number', array('class' => 'col-md-4')) !!}
          <div class="col-md-8">{!! $sales->items->partNo !!}</div>
        </div>
        <div class="col-md-6 row">
          {!! Form::label('due_date', 'Due Date', array('class' => 'col-md-2')) !!}
          <div class="col-md-8">{!! date('d/m/Y', strtotime($sales->due_date))!!}</div>
        </div>
      </div>
      <div class="form-group row ">
        <div class="col-md-6 row">
          {!! Form::label('partDesc', 'Description', array('class' => 'col-md-4')) !!}
          <div class="col-md-8">{!!$sales->items->partDesc!!}</div>
        </div>

        <div class="col-md-6 row">
          {!! Form::label('partDesc2', 'Description 2', array('class' => 'col-md-2')) !!}
          <div class="col-md-8">{!!$sales->items->partDesc2!!}</div>
        </div>

      </div>
      <div class="form-group row">
        <div class="col-md-6 row">
          {!! Form::label('salesjob', 'Sales/Job', array('class' => 'col-md-4')) !!}
          <div class="col-md-8">{!!$sales->salesorder!!}</div>
        </div>
      </div>

      <div class="form-group row ">
        <div class="col-md-6 row">
          {!! Form::label('quantity_ordered', 'Qty Ordered', array('class' => 'col-md-4')) !!}
          <div class="col-md-8">{!!$sales->items->quantity!!} PC</div>
        </div>
        <div class="col-md-6 row">
          {!! Form::label('deliverto', 'Deliver To', array('class' => 'col-md-2')) !!}
          <div class="col-md-8">{!!$sales->deliver_to!!}</div>
        </div>
      </div>
      <div class="form-group row ">
        {!! Form::label('custName', 'Customer', array('class' => 'col-md-2')) !!}
        <div class="col-md-10">{!! $sales->custName !!}</div>
      </div>
      <div class="form-group row ">
        {!! Form::label('model', 'Model', array('class' => 'col-md-2')) !!}
        <div class="col-md-10">{!! Form::text('model', $sales->items->model, array('class' => 'form-control'))!!}</div>
      </div>
      <div class="form-group row ">
        {!! Form::label('noPage', 'No of Pages', array('class' => 'col-md-2')) !!}
        <div class="col-md-10">{!! Form::text('noPage', '', array('class' => 'form-control')) !!}</div>
      </div>
      @foreach ($wotype as $w)
        @if($w->typeofformula == 'Boxes')
          <div class="form-group row ">
            {!! Form::label('boxespaper', 'Paper Supply:', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('boxespaper', $resultb, array('class' => 'form-control')) !!}</div>
          </div>
          <div class="form-group row ">
            {!! Form::label('boxesprinting', 'Printing Qty: ', array('class' => 'col-md-2')) !!}
            <div class="col-md-10">{!! Form::text('boxesprinting', $resultb1, array('class' => 'form-control')) !!}</div>
          </div>
        @else

          @if ($w->covertotalqty != 0)
            @if ($w->typeofformula == 'Soft Cover')
              <div class="form-group row col-md-8 ">
                {!! Form::text('covername', 'Cover', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('coverqty', $resultc, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('coverpaper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('coverpaper', $resultc1, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Soft Cover BW')
              <div class="form-group row col-md-8 ">
                {!! Form::text('covername', 'Cover', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('coverqty', $resultc, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('coverpaper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('coverpaper', $resultc1, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if($w->typeofformula == 'Overseas FB')
              <div class="form-group row col-md-8 ">
                {!! Form::text('covername', 'Cover', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('coverqty', $resultc, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('coverpaper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('coverpaper', $resultc1, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if($w->typeofformula == 'Overseas WT')
              <div class="form-group row col-md-8 ">
                {!! Form::text('covername', 'Cover', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('coverqty', $resultc, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('coverpaper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('coverpaper', $resultc1, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
          @endif

          @if ($w->text1totallqty != 0)
            @if ($w->typeofformula == 'Soft Cover')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t1name', 'Text 1', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t1qty', $resultt1, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t1paper', $resultt11, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Soft Cover BW')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t1name', 'Text 1', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t1qty', $resultt1, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t3paper', $resultt11, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas FB')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t1name', 'Text 1', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t1qty', $resultt1, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t1paper', $resultt11, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas WT')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t1name', 'Text 1', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t1qty', $resultt1, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t1paper', $resultt11, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
          @endif

          @if ($w->text2totalqty != 0)
            @if ($w->typeofformula == 'Soft Cover')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t2name', 'Text 2', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t3qty', $resultt2, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t2paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t2paper', $resultt21, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Soft Cover BW')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t2name', 'Text 2', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t2qty', $resultt2, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t2paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t2paper', $resultt21, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas FB')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t2name', 'Text 2', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t2qty', $resultt2, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t2paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t2paper', $resultt21, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas WT')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t2name', 'Text 2', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t3qty', $resultt2, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t2paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t2paper', $resultt21, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
          @endif

          @if ($w->text3totalqty != 0)
            @if ($w->typeofformula == 'Soft Cover')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t3name', 'Text 3', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t3qty', $resultt3, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t3paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t3paper', $resultt31, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Soft Cover BW')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t3name', 'Text 3', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t3qty', $resultt3, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t3paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t3paper', $resultt31, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas FB')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t3name', 'Text 3', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t3qty', $resultt3, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t3paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t3paper', $resultt31, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas WT')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t3name', 'Text 3', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t3qty', $resultt3, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t3paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t3paper', $resultt31, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
          @endif

          @if ($w->text4totalqty != 0)
            @if ($w->typeofformula == 'Soft Cover')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t4name', 'Text 4', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t4qty', $resultt4, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t4paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t4paper', $resultt41, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Soft Cover BW')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t4name', 'Text 4', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t4qty', $resultt4, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t4paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t4paper', $resultt41, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas FB')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t4name', 'Text 4', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t4qty', $resultt4, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t4paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t4paper', $resultt41, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas WT')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t4name', 'Text 4', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t4qty', $resultt4, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t4paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t4paper', $resultt41, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
          @endif

          @if ($w->text5totalqty != 0)
            @if ($w->typeofformula == 'Soft Cover')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t5name', 'Text 5', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t5qty', $resultt5, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t5paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t5paper', $resultt51, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Soft Cover BW')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t5name', 'Text 5', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t5qty', $resultt5, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t5paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t5paper', $resultt51, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas FB')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t5name', 'Text 5', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t5qty', $resultt5, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t5paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t5paper', $resultt51, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas WT')
              <div class="form-group row col-md-8 ">
                {!! Form::text('t5name', 'Text 5', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t5qty', $resultt5, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('t5paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('t5paper', $resultt51, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
          @endif

          @if ($w->sticker1totalqty != 0)
            @if ($w->typeofformula == 'Soft Cover')
              <div class="form-group row col-md-8 ">
                {!! Form::text('stick1name', 'Sticker 1', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('stick1qty', $results1, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('stick1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('stick1paper', $results11, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Soft Cover BW')
              <div class="form-group row col-md-8 ">
                {!! Form::text('stick1name', 'Sticker 1', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('stick1qty', $results1, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('stick1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('stick1paper', $results11, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas FB')
              <div class="form-group row col-md-8 ">
                {!! Form::text('stick1name', 'Sticker 1', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('stick1qty', $results1, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('stick1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('stick1paper', $results11, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas WT')
              <div class="form-group row col-md-8 ">
                {!! Form::text('stick1name', 'Sticker 1', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('stick1qty', $results1, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('stick1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('stick1paper', $results11, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
          @endif

          @if ($w->sticker2totalpaper != 0)
            @if ($w->typeofformula == 'Overseas FB')
              <div class="form-group row col-md-8 ">
                {!! Form::text('stick2name', 'Sticker 2', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('stick2qty', $results2, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('stick2paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('stick2paper', $results21, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas WT')
              <div class="form-group row col-md-8 ">
                {!! Form::text('stick2name', 'Sticker 2', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('t4qty', $resultt5, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('stick2paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('stick2paper', $resultt51, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
          @endif

          @if ($w->flexi1totalqty != 0)
            @if ($w->typeofformula == 'Overseas FB')
              <div class="form-group row col-md-8 ">
                {!! Form::text('flexi1name', 'Flexi 2', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('flexi1qty', $resultf1, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('flexi1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('flexi1paper', $resultf11, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas WT')
              <div class="form-group row col-md-8 ">
                {!! Form::text('flexi1name', 'Flexi 2', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('flexi2qty', $resultf1, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('flexi1paper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('flexi1paper', $resultf11, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
          @endif

          @if ($w->flexi2totalqty != 0)
            @if ($w->typeofformula == 'Overseas FB')
              <div class="form-group row col-md-8 ">
                {!! Form::text('flexi2name', 'Flexi 2', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('flexi2qty', $resultf2, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('flexi2name', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('flexi2paper', $resultf21, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
            @if ($w->typeofformula == 'Overseas WT')
              <div class="form-group row col-md-8 ">
                {!! Form::text('flexi2name', 'Flexi 2', array('class' => 'col-md-3')) !!}
                <div class="col-md-9">{!! Form::text('flexi2qty', $resultf2, array('class' => 'form-control')) !!}</div>
              </div>
              <div class="form-group row col-md-4">
                {!! Form::label('flecipaper', '[P.QTY]', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('flexi2paper', $resultf21, array('class' => 'form-control')) !!}</div>
              </div>
            @endif
          @endif
        @endif
      @endforeach
    <div class="form-group row ">
      {!! Form::label('size', 'Size', array('class' => 'col-md-2')) !!}
      <div class="col-md-10">{!!Form::text('size', $sales->items->size, array('class' => 'form-control'))  !!}</div>
    </div>
    @if(!empty($comments))
      <div class="form-group row ">
        {!! Form::label('remarks', 'Any remarks', array('class' => 'col-md-2')) !!}
        <textarea class="form-control" name="remarks" cols="100" rows="10" id="remarks">{!!$comments->comment_1!!}&#13;&#10;{!!$comments->comment_2!!}
          &#13;&#10;{!!$comments->comment_3!!}&#13;&#10;{!!$comments->comment_4!!}&#13;&#10;{!!$comments->comment_5!!}&#13;&#10;{!!$comments->comment_6!!}
          &#13;&#10;{!!$comments->comment_7!!}&#13;&#10;{!!$comments->comment_8!!}&#13;&#10;{!!$comments->comment_9!!}&#13;&#10;{!!$comments->comment_10!!}
          &#13;&#10;{!!$comments->comment_11!!}&#13;&#10;{!!$comments->comment_12!!}&#13;&#10;{!!$comments->comment_13!!}&#13;&#10;{!!$comments->comment_14!!}
          &#13;&#10;{!!$comments->comment_15!!}
        </textarea>
        <input type="hidden" name="remarkqad" value="{!!$comments->comment_1!!}&#13;&#10;{!!$comments->comment_2!!}
          &#13;&#10;{!!$comments->comment_3!!}&#13;&#10;{!!$comments->comment_4!!}&#13;&#10;{!!$comments->comment_5!!}&#13;&#10;{!!$comments->comment_6!!}
          &#13;&#10;{!!$comments->comment_7!!}&#13;&#10;{!!$comments->comment_8!!}&#13;&#10;{!!$comments->comment_9!!}&#13;&#10;{!!$comments->comment_10!!}
          &#13;&#10;{!!$comments->comment_11!!}&#13;&#10;{!!$comments->comment_12!!}&#13;&#10;{!!$comments->comment_13!!}&#13;&#10;{!!$comments->comment_14!!}
          &#13;&#10;{!!$comments->comment_15!!}"> </input>
        {{-- <div class="col-md-10">{!! Form::textarea('remarks', $comments->comment_1 , array('class' => 'form-control')) !!}</div> --}}
      </div>
    @else
      <div class="form-group row ">
        {!! Form::label('remarks', 'Any remarks', array('class' => 'col-md-2')) !!}
        <textarea class="form-control" name="remarks" cols="100" rows="10" id="remarks">
        </textarea>
        {{-- <div class="col-md-10">{!! Form::textarea('remarks', $comments->comment_1 , array('class' => 'form-control')) !!}</div> --}}
      </div>
    @endif

    <div class="form-group row">
      <input type="submit" name="create" id="create" class="btn btn-success " value="Save without saving the (changes) remarks">
      <input type="submit" name="create" id="save" class="btn btn-success " value="Save">
    </div>
    {!!Form::close();!!}
  </div>
  @endif
  </div>

@endsection
