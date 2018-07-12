@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
@include('frontend.slsmark.includes.navtab2')

  <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-lg-12">

          <div class="col-lg-12">
          @if (access()->hasPermissions(['sales-marketing', 'edit-sales']))
            {!! Form::model($sales, array('route' => array('frontend.slsmark.index'), 'method' => 'POST', 'files'=>true)) !!}


            <table class="table table-bordered" id="users-table">
                <thead>
                  <tr>
                    <th>SO</th>
                    <th>Line</th>
                    <th>ID</th>
                    <th>PO</th>
                    <th>Name</th>
                    <th>Item Number</th>
                    <th>1st Description</th>
                    <th>2nd Description</th>
                    <th>Qty</th>
                    <th>Item Status</th>
                    <th>Order Date</th>
                    <th>Due Date</th>
                    {{-- <th>Action</th> --}}
                  </tr>
                </thead>
            </table>


            {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
            {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

          <script>
              $(function() {
                  $('#users-table').DataTable({
                      processing: true,
                      serverSide: true,
                      ajax: '{!! route('frontend.slsmark.createcanceltable') !!}',

                      'order': [[ 1, 'asc' ]]
                  });
              });
          </script>
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
