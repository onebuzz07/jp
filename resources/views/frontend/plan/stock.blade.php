@extends('frontend.layouts.app')

@section('content')
  <h1>Plan Department</h1>
@include('frontend.plan.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <div class="page-header">
      <h3 class="box-title"> {!! trans('FORECAST STOCK ') !!}</h3>
  </div> <!--page-header-->
  <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-lg-12">
            <div class="col-md-12">
              <div class="col-md-3">
                <label>Part No: {!!$sales->items->partNo!!} </label>
              </div>

              <div class="col-md-5">
                <label> Customer : {!!$sales->custName!!} </label>
              </div>

              <div class="col-md-2">
                <label> Stock(On hand):
                    {{-- {!!($stocklist) ? $stocklist->Quantity_Change : 'Please import data'  !!} </label> --}}
              </div>
              <div class="col-md-2">
                {{-- <label>Remaining : --}}
                {{-- {!!($stockupdate) ? $stockupdate->stock_taken : ''  !!} (contoh kalau x nak null) --}}
                {{-- {!!((int)$stockupdate['stock_qad'] - (int)$balance)!!} --}}
                </label>
              </div>
              </div>
              <br>
              <br>
              <div class="col-md-12">
                <table class="table table-bordered" id="users-table21">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Finished Goods</th>
                            <th>Raw Material</th>
                            <th>ID</th>
                            <th>Due Date</th>
                            <th>Job</th>
                            <th>Quantity Ordered</th>
                        </tr>
                    </thead>
                </table>

                {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
                {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

                <script>
                  $(function() {
                      $('#users-table21').DataTable({
                          pageLength: 100,
                          processing: true,
                          serverSide: true,
                          method:"POST",
                          ajax: {
                                 url: '{!! route('frontend.plan.powotable') !!}',
                                 data: function(d) {
                                      d.partNo = '{!! $sales->items->partNo !!}';
                                      d._token = '{{ csrf_token() }}';
                                 }

                            },

                      });
                  });
                  </script>
                <label>
                  Stock(QAD): {!!$balance!!}
                </label>
            </div>
            <br>

            <table class="table table-bordered" id="users-table20">
                <thead>
                    <tr>
                        {{-- <th>Part Number</th> --}}
                        <th>ID Num</th>
                        <th>P/O quantity</th>
                        <th>Stock Taken</th>
                        <th>Adj</th>
                        <th>Balance</th>
                        <th>Receive Date</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>

            <script>
              $(function() {
                  $('#users-table20').DataTable({
                      processing: true,
                      serverSide: true,
                      method:"POST",
                      ajax: {
                             url: '{!! route('frontend.plan.viewstocktable') !!}',
                             data: function(d) {
                                  d.id = {!! $sales->id !!};
                                  d._token = '{{ csrf_token() }}';
                             }

                        },

                  });
              });


              //Being injected from FrontendController
              // console.log(test);
              </script>
          </div>
          <div>
              {{-- Remaining stock: {!!((int)$stockupdate->stock -(int)$stockupdate->stock_taken);!!} --}}
          </div>
            {{-- <form name="stock" id="stock" method="POST" action ="{!! route('frontend.plan.storestock', $sales->id) !!}"> --}}
            {!! Form::open(array('route' => array('frontend.plan.storestock', $sales->id))) !!}
            <table class="table table-bordered" id="stockTable">
                <thead>
                  <tr>
                    {{-- <th>No.</th> --}}
                    <th>ID No</th>
                    <th>P/O Qty</th>
                    <th>Stock Taken</th>
                    <th>Adj</th>
                    <th>Balance</th>
                    <th>Received Date</th>
                    <th>Remarks</th>

                  </tr>
                </thead>
                <tbody>
                   {{-- @for ($i = 1; $i < 11; $i++) --}}

                  <tr id="Add">
                    {{-- <td></td> --}}
                    <td>{!! Form::text('idNum', '', array( 'class'=>'form-control', 'required'=>'required')) !!}</td>
                    <td>{!! Form::text('POQuantity', '', array( 'class'=>'form-control', 'required'=>'required')) !!}</td>
                    <td>{!! Form::text('stock_taken', '', array( 'class'=>'form-control', 'required'=>'required')) !!}</td>
                    <td>{!! Form::text('adj', '', array( 'class'=>'form-control', 'required'=>'required')) !!}</td>
                    <td>{!! Form::text('balance', $stock, array( 'class'=>'form-control', 'required'=>'required')) !!}</td>
                    <td>{!! Form::text('receiveDate', \Carbon\Carbon::now()->format('d/m/Y'), array('id'=>'datepicker', 'class'=>'form-control', 'required'=>'required')) !!}</td>
                    <td>{!! Form::text('remarkStock', '', array( 'class'=>'form-control', 'required'=>'required')) !!}</td>
                  </tr>
                {{-- @endfor --}}
                </tbody>
              </table>

              <div class="form-group row">
              <button type="submit" class="btn btn-success btn-block" >SAVE </button>
              </div>
            {{-- </form> --}}
              {!!form::close()!!}

          </div>

        </div>

      	<div class="col-md-6">
      </div> {{-- row --}}
</div> {{-- container-fluid --}}

{{-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> --}}
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "dd/mm/yy"
    });
  } );
  </script>
@endsection
