@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <h3 class="box-title"> {{ trans('SALES CONFIRMATION') }} <small>(For Planning department)</small> </h3>
  <div class="row" id="app">
    <div class="col-lg-12">
      <p class="text-right">No: {{$sales->sco_number}} </p>
    </div>
    <div class="col-lg-12">
            {!! Form::model($sales, array('route' => array('frontend.plan.update', $sales->id), 'method' => 'PUT')) !!}
            {!! Form::hidden('salesline', $sales->salesorder.'-'.$sales->line) !!}

            @if($change->workorder == 1)
              <div class="form-group row ">
                {!! Form::label('workorder', 'Work Order', array('class' => 'col-md-2')) !!}
                <div class="col-md-10"><input style="color:red;" name="workorder" type="text" value={!!$sales->workorder!!} class="form-control"></div>
              </div>
            @else
              <div class="form-group row ">
                {!! Form::label('workorder', 'Work Order', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('workorder', $sales->workorder, array('class'=>'form-control' )) !!}</div>
              </div>
            @endif

            @if($change->wid == 1)
              <div class="form-group row ">
                {!! Form::label('wid', 'ID', array('class' => 'col-md-2')) !!}
                <div class="col-md-10"><input style="color:red;" name="wid" type="text" value={!!$sales->wid!!} class="form-control"></div>
              </div>
            @else
              <div class="form-group row ">
                {!! Form::label('wid', 'ID', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('wid', $sales->wid, array('class'=>'form-control' )) !!}</div>
              </div>
            @endif

            @if($change->salesorder == 1)
              <div class="form-group row ">
                {!! Form::label('salesorder', 'Sales Order', array('class' => 'col-md-2')) !!}
                <div class="col-md-10"><input style="color:red;" name="salesorder" type="text" value={!!$sales->salesorder!!} class="form-control" readonly></div>
              </div>
            @else
              <div class="form-group row ">
                {!! Form::label('salesorder', 'Sales Order', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('salesorder', $sales->salesorder, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
              </div>
            @endif

            @if($change->line == 1)
              <div class="form-group row ">
                {!! Form::label('line', 'Line', array('class' => 'col-md-2')) !!}
                <div class="col-md-10"><input style="color:red;" name="line" type="text" value={!!$sales->line!!} class="form-control" readonly></div>
              </div>
            @else
              <div class="form-group row ">
                {!! Form::label('line', 'Line', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::text('line', $sales->line, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
              </div>
            @endif

            <div class="form-group row">
              {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
              <div class="col-md-10">{{ Form::text('datetime', $sales->datetime->format('d/m/Y'), array('id'=>'datepicker','class'=>'form-control', 'readonly'=>true )) }}</div>
            </div>

            @if($change->custName == 1)
              <div class="form-group row ">
                {!! Form::label('custName', 'Customer Name', array('class' => 'col-md-2')) !!}
                <div class="col-md-10"><input style="color:red;" name="custName" type="text" value={!!$sales->custName!!} class="form-control" readonly></div>
              </div>
            @else
              <div class="form-group row">
                {!! Form::label('custName', 'Customer Name', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('custName', $sales->custName, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
              </div>
            @endif


            @if($change->purchaseOrder == 1)
              <div class="form-group row ">
                {!! Form::label('purchaseOrder', 'Purchase Order', array('class' => 'col-md-2')) !!}
                <div class="col-md-10"><input style="color:red;" name="purchaseOrder" type="text" value={!!$sales->purchaseOrder!!} class="form-control" readonly></div>
              </div>
            @else
              <div class="form-group row ">
                {!! Form::label('purchaseOrder', 'Purchase Order', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('purchaseOrder', $sales->purchaseOrder, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
              </div>
            @endif


            @if($change->model == 1)
              <div class="form-group row ">
                {!! Form::label('model', 'Model', array('class' => 'col-md-2')) !!}
                <div class="col-md-10"><input style="color:red;" name="model" type="text" value={!!$sales->items->model!!} class="form-control" readonly></div>
              </div>
            @else
              <div class="form-group row">
                {!! Form::label('model', 'Model', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('model', $sales->items->model, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
              </div>
            @endif


              @if($change->partDesc == 1)
                <div class="form-group row ">
                  {!! Form::label('partDesc', 'Part Description', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10"><input style="color:red;" name="partDesc" type="text" value={!!$sales->items->partDesc!!} class="form-control" readonly></div>
                </div>
              @else
                <div class="form-group row">
                  {!! Form::label('partDesc', 'Part Description', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('partDesc', $sales->items->partDesc, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
                </div>
              @endif


              @if($change->partDesc2 == 1)
                <div class="form-group row ">
                  {!! Form::label('partDesc2', 'Part Description 2', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10"><input style="color:red;" name="partDesc2" type="text" value={!!$sales->items->partDesc2!!} class="form-control" readonly></div>
                </div>
              @else
                <div class="form-group row">
                  {!! Form::label('partDesc2', 'Part Description 2', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('partDesc2', $sales->items->partDesc2, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
                </div>
              @endif


              @if($change->partNo == 1)
                <div class="form-group row ">
                  {!! Form::label('partNo', 'Part Number', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10"><input style="color:red;" name="partNo" type="text" value={!!$sales->items->partNo!!} class="form-control" readonly></div>
                </div>
              @else
                <div class="form-group row">
                  {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('partNo', $sales->items->partNo, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
                </div>
              @endif


              @if($change->size == 1)
                <div class="form-group row ">
                  {!! Form::label('size', 'Size', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10"><input style="color:red;" name="size" type="text" value={!!$sales->items->size!!} class="form-control" readonly></div>
                </div>
              @else
                <div class="form-group row">
                  {!! Form::label('size', 'Size', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('size', $sales->items->size, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
                </div>
              @endif


              @if($change->quantity == 1)
                <div class="form-group row ">
                  {!! Form::label('quantity', 'Quantity', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10"><input style="color:red;" name="quantity" type="text" value={!!$sales->items->quantity!!} class="form-control" readonly></div>
                </div>
              @else
                <div class="form-group row">
                  {!! Form::label('quantity', 'Quantity', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('quantity', $sales->items->quantity, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
                </div>
              @endif


              @if($change->rawMaterial == 1)
                <div class="form-group row ">
                  {!! Form::label('rawMaterial', 'Raw Material', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10"><input style="color:red;" name="rawMaterial" type="text" value={!!$sales->items->rawMaterial!!} class="form-control"></div>
                </div>
              @else
                <div class="form-group row">
                  {!! Form::label('rawMaterial', 'Raw Material', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('rawMaterial', $sales->items->rawMaterial, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
                </div>
              @endif


              @if($change->noPages == 1)
                <div class="form-group row ">
                  {!! Form::label('noPages', 'Number of Pages', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10"><input style="color:red;" name="noPages" type="text" value={!!$sales->items->noPages!!} class="form-control"></div>
                </div>
              @else
                <div class="form-group row">
                  {!! Form::label('noPages', 'Number of Pages', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('noPages', $sales->items->noPages, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
                </div>
              @endif


              @if($change->colour == 1)
                <div class="form-group row ">
                  {!! Form::label('colour', 'Colour', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10"><input style="color:red;" name="colour" type="text" value={!!$sales->items->colour!!} class="form-control"></div>
                </div>
              @else
                <div class="form-group row">
                  {!! Form::label('colour', 'Colour', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('colour', $sales->items->colour, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
                </div>
              @endif


              @if($change->finishing == 1)
                <div class="form-group row ">
                  {!! Form::label('finishing', 'Finishing', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10"><input style="color:red;" name="finishing" type="text" value={!!$sales->items->finishing!!} class="form-control" readonly></div>
                </div>
              @else
                <div class="form-group row">
                  {!! Form::label('finishing', 'Finishing', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('finishing', $sales->items->finishing, array('class'=>'form-control', 'readonly'=>true )) !!}</div>
                </div>
              @endif


              <div class="form-group row">
                {!! Form::label('deliverDate', 'Deliver Date', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::text('deliverDate', date('d/m/Y', strtotime($sales->deliverDate)), array('id'=>'datepicker2','class'=>'form-control', 'readonly'=>true )) !!}</div>
              </div>

              <div class="form-group row">
                        {!! Form::label('images', 'Files', array('class' => 'control-label col-md-2')) !!}
                      <div class="col-md-10">
                        @foreach($sales->fileupload as $file)
                            <a href="{!! "/uploaded/$file->filename" !!}" download="{!! $file->filename !!}">{!! $file->filename !!}</a>
                            {!! '&nbsp;'!!}
                        @endforeach
                      </div>
              </div>

              <div class="form-group row">

                {!! Form::label('lot', 'LOT', ['class' => 'col-md-2']) !!}
                @if ($change->lot == 1)<div class="col-md-10"><input style="color:red;" name="lot" type="text" value={!!$sales->items->lot!!} class="form-control" readonly></div>
                @else <div class="col-md-10">{!! Form::text('lot', $sales->items->lot, array( 'class'=>'form-control', 'readonly'=>true )) !!}</div>
                @endif
                {!! Form::label('mfgDate', 'MFG Date', ['class' => 'col-md-2']) !!}
                @if ($change->mfgDate == 1)<div class="col-md-10"><input style="color:red;" name="mfgDate" type="text" value={!!$sales->items->mfgDate!!} class="form-control" readonly></div>
                @else <div class="col-md-10">{!! Form::text('mfgDate', $sales->items->mfgDate, array( 'class'=>'form-control', 'readonly'=>true )) !!}</div>
                @endif
                {!! Form::label('expiryDate', 'EXPIRY Date', ['class' => 'col-md-2']) !!}
                @if ($change->expiryDate == 1)<div class="col-md-10"><input style="color:red;" name="expiryDate" type="text" value={!!$sales->items->expiryDate!!} class="form-control" readonly></div>
                @else <div class="col-md-10">{!! Form::text('expiryDate', $sales->items->expiryDate, array( 'class'=>'form-control', 'readonly'=>true )) !!}</div>
                @endif
                {!! Form::label('dateFacNo', 'Date & Fac No', ['class' => 'col-md-2']) !!}
                @if ($change->dateFacNo == 1)<div class="col-md-10"><input style="color:red;" name="dateFacNo" type="text" value={!!$sales->items->dateFacNo!!} class="form-control" readonly></div>
                @else <div class="col-md-10">{!! Form::text('dateFacNo', $sales->items->dateFacNo, array( 'class'=>'form-control', 'readonly'=>true )) !!}</div>
                @endif
                {!! Form::label('packerID', 'Packer\'s ID', ['class' => 'col-md-2']) !!}
                @if ($change->packerID == 1)<div class="col-md-10"><input style="color:red;" name="packerID" type="text" value={!!$sales->items->packerID!!} class="form-control" readonly></div>
                @else <div class="col-md-10">{!! Form::text('packerID', $sales->items->packerID, array( 'class'=>'form-control', 'readonly'=>true )) !!}</div>
                @endif
                {!! Form::label('remark', 'Remarks', ['class' => 'col-md-2']) !!}
                <div class="col-md-10">{!! Form::textarea('remark', $sales->items->remark, array('class'=>'form-control', 'readonly'=>true , 'id'=>'summernote2')) !!}</div>
              </div>

              @if($sales->planning_bom == 'Y')
                <div class="form-group row">
                  <p> The bom been produced </p>
                <input type="button" class="btn btn-success" value="BACK" onclick="history.go(-1)"> </input>
              </div>

              @else
                <div class="form-group row">
                  <button type="submit" class="btn btn-success" value="Produce"> Produce BOM </button>
                </div>
              @endif



              {{-- <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)"></input> --}}
            {!! Form::close() !!}
          </div>
        </div>
      </div> {{-- container-fluid --}}
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
  <script type="text/javascript">
       $(document).ready(function() {
           $('#summernote2').summernote('disable');
           });
      $(document).ready(function() {
               $('#summernote').summernote({
                 height:150,
                   });
               });
  </script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
@endsection
