@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')

  <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-lg-12">

          <div class="col-lg-12">
          @if (access()->hasPermissions(['sales-marketing', 'edit-sales']))
            {!! Form::open(array('route' => ('frontend.slsmark.updatewidview'), 'method' => 'POST', 'files'=>true)) !!}


            <table class="table table-bordered" id="users-table">
              <thead>
                  <tr>
                    {{-- <th>SO-line</th> --}}
                    <th>SO</th>
                    <th>Line</th>
                    <th>ID</th>
                    <th>PO</th>
                    <th>Name</th>
                    <th>Item #</th>
                    <th>1st Description</th>
                    <th>2nd Description</th>
                    <th>Qty Order</th>
                    <th>Keep Qty</th>
                    <th>Manual Qty</th>
                    <th>Stock Card Qty</th>
                    <th>Item Status</th>
                    <th>Wo Qty</th>
                    <th>Total WO Qty</th>
                    <th>Order Date</th>
                    <th>Due Date</th>
                    <th>Action</th>
                    <th>Record Status</th>
                    <th>WO ID Remark</th>
                    <th>SO Remark</th>
                    <th>SO Line Remark</th>
                  </tr>
              </thead>
            </table>
 
			<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
            {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
            {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}


          <script>
              $(function() {
                  $('#users-table').DataTable({
                      processing: true,
                      serverSide: true,
                      ajax: '{!! route('frontend.slsmark.tablewid') !!}',
                      "columns":[
                          {"orderable": false, "searchable": true},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": true},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": true},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          {"orderable": false, "searchable": false},
                          // {"v": false}
                      
                        ],
                      'order': [[ 1, 'asc' ]]
                  });
              });
          </script>

          <div class=" row">
              <button type="submit" class="btn btn-success " value="Submit"> Submit </button>
          </div>
            {!! Form::close() !!}
          @else
            <br>
            <label> Please choose your appropriate department </label>
            <br><br>
            <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)"></input>
          @endif
          </div>
        </div>

      	<div class="col-md-6">
      </div> {{-- row --}}
    </div>
</div> {{-- container-fluid --}}
@endsection
