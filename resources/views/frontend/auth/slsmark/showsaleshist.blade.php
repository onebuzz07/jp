@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
@include('frontend.slsmark.includes.navsro')
  {{-- <div class="page-header">
      <h3 class="box-title"> {!! trans('') !!}</h3>
  </div> <!--page-header--> --}}
  <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-lg-12">
          <div class="col-lg-12">
          @if (access()->hasPermissions(['sales-marketing']))
            {!! Form::model($sales, array('route' => array('frontend.slsmark.index'), 'method' => 'POST', 'files'=>true)) !!}


          <h4> SRO (History)</h4>
          <table class="table table-bordered" id="users-table2">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Customer Name</th>
                      <th>Part Number</th>
                      <th>Part Description</th>
                      <th>Part Description 2</th>
                      <th>Rev</th>
                      <th>Action</th>

                  </tr>
              </thead>
          </table>

          {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
          {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}


        <script>
            $(function() {
                $('#users-table2').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('frontend.slsmark.requisition2') !!}',

                    "order": [[ 0, "desc" ]]
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
