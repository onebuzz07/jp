@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <div class="page-header">
      <h3 class="box-title"> {!! trans('FORECAST STOCK') !!}</h3>
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

              <div class="col-md-4" id="n1">
                <label> Stock(On hand):
                  {{ $inventory}}
                  </label>
              </div>
              <div class="col-md-2">
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
                            <th>Ref</th>
                            <th>Due Date</th>
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
                                 url: '{!! route('frontend.slsmark.wosotable') !!}',
                                 data: function(d) {
                                      d.partNo = '{!! $sales->items->partNo !!}';
                                      d._token = '{{ csrf_token() }}';
                                 }
                            },
                      });
                  });
                  </script>
                  <label>
                    Stock(QAD):{!!$balance + $inventory!!}
                      {{-- {!!($salesorders) ? $salesorders->Quantity_Ordered : 'Please Import Data'  !!} --}}
                    </label>
              </div>

            <br>

            <table class="table table-bordered" id="users-table2">
                <thead>
                    <tr>
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
                  $('#users-table2').DataTable({
                      processing: true,
                      serverSide: true,
                      method:"POST",
                      ajax: {
                             url: '{!! route('frontend.slsmark.viewstocktable') !!}',
                             data: function(d) {
                                  d.id = {!! $sales->id !!};
                                  d._token = '{{ csrf_token() }}';
                             }
                        },
                  });
              });
              </script>
          </div>

            {!! Form::open(array('route' => array('frontend.slsmark.storestock', $sales->id))) !!}
            <table class="table table-bordered" id="stockTable">
                <thead>
                  <tr>
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

                  <tr id="Add">
                    <td>{!! Form::text('idNum', '', array( 'class'=>'form-control', 'required'=>'required')) !!}</td>
                    <td>{!! Form::number('POQuantity', '', array( 'class'=>'form-control', 'required'=>'required')) !!}</td>
                    <td>{!! Form::number('stock_taken', '', array( 'class'=>'form-control', 'required'=>'required')) !!}</td>
                    <td>{!! Form::number('adj', '', array( 'class'=>'form-control', 'required'=>'required')) !!}</td>
                    <td>{!! Form::number('balance','', array( 'class'=>'form-control', 'required'=>'required')) !!}</td>
                    <td>{!! Form::text('receiveDate', \Carbon\Carbon::now()->format('d/m/Y'), array('id'=>'datepicker', 'class'=>'form-control', 'required'=>'required')) !!}</td>
                    <td>{!! Form::text('remarkStock', '', array( 'class'=>'form-control', 'required'=>'required')) !!}</td>
                  </tr>
                </tbody>
              </table>

              <div class="form-group row">
              <button type="submit" class="btn btn-success btn-block" >SAVE </button>
              </div>
              {!!form::close()!!}

          </div>

        </div>

      	<div class="col-md-6">
      </div> {{-- row --}}
    </div> {{-- container-fluid --}}

<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "dd/mm/yy"
    });
  } );
</script>

@endsection
