@extends('frontend.layouts.app')
@section('content')
	
	<h1>Sales Marketing Department</h1>
	@include('frontend.slsmark.includes.nav')
	
	<div class="page-header">
		<h3 class="box-title"> {!! trans('STOCK STATUS') !!}</h3>
	</div>

  <div class="container-fluid">
    <div class="col-md-12 row" id="app">
      {{-- {!! Form::open(array('route' => array('frontend.slsmark.storestocks1'))) !!} --}}
      <h4> Sales Order </h4>
      <table class="table table-bordered" id="stockTable1">
        <thead>
            <tr>
              <th>Part No.</th>
              <th>Child Part No.</th>
              <th>So No.</th>
              <th>Po. No.</th>
              <th>Wo ID</th>
              <th>SRO</th>
              <th>SC</th>
              <th>PAF</th>
              <th>Stock Qty.</th>
              <th>Wo Open Qty.</th>
              <th>So Open Qty</th>
              <th>Adj</th>
              <th>Date(Transaction)</th>
              <th>Balance</th>
              <th>Item Status</th>
              <th>Approval</th>
              <th>Date</th>
              <th>Remarks WO</th>
              <th>Remarks SO</th>
              <th>Remarks SO Line</th>
              <th>Remarks</th>
              <th>Remarks2</th>
              <th>Remarks3</th>
              <th>Remarks4</th>
              <th>Remarks5</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
          {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
          {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

        <script>
            $(function() {
                $('#stockTable1').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                      url:   '{!! route('frontend.slsmark.stocktables1') !!}',

                    }
                });
            });
        </script>
          <script>
          // var vm = new Vue
          // ({
            // el:'#app',
              // data : {
                // @foreach ($sales as $sale)
									// q{!!$sale->id!!}:  w{!!$sale->id!!}: 22 ,
                // @endforeach
                // , n=0
              // },
              // computed: {
                // @foreach ($sales as $sale)
                // n{!!$sale->id!!} :function(){
                  // return this.q{!!$sale->id!!}+2;
                // },
                // @endforeach
                // n:function(){
                  // return n=0;
                // }
              // }
            // });
          </script>

{{--
        <div class="form-group row">
        <button type="submit" class="btn btn-success " >SAVE </button>
        </div> --}}
        {{-- {!!form::close()!!} --}}
      </div>
      <div class="col-md-12 row">
        {!! Form::open(array('route' => array('frontend.slsmark.storestocks2'))) !!}
        <h4> Schedule Order </h4>
        <table class="table table-bordered" id="stockTable2">
          <thead>
              <tr>
                <th>Part No.</th>
                <th>Child Part No.</th>
                <th>Due Date</th>
                <th>Po. No.</th>
                <th>So No.</th>
                <th>So Qty</th>
                <th>Keep Quantity</th>
                <th>Manual Stock </th>
                <th>Stock card Qty</th>
                <th>Paper</th>
                <th>Remarks</th>
                <th>Remarks2</th>
                <th>Remarks3</th>
                <th>Remarks4</th>
                <th>Remarks5</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
            
            
           // <script>
              $(function() {
                  $('#stockTable2').DataTable({
                      processing: true,
                      serverSide: true,
                      ajax: {
                        url:   '{!! route('frontend.slsmark.stocktables2') !!}',

                      }


                  });
              });
              //console.log(test);
          </script>
    </div>
  </div>

@endsection
