@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
@include('frontend.plan.includes.navsro')
  <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-lg-12">
          <h4> Sample Requisition Order <small>History</small></h4>
          <table class="table table-bordered" id="users-table2">
              <thead>
                  <tr>
                      {{-- <th>ID</th> --}}
                      <th>Customer Name</th>
                      <th>Part Number</th>
                      <th>Part Description</th>
                      <th>Part Description 2</th>
                      <th>Rev</th>
                      <th>Confirm?</th>
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
                    ajax: '{!! route('frontend.plan.requisition2') !!}',

                    "order": [[ 0, "desc" ]]
                });
            });
        </script>
      </div>
    </div>
</div> {{-- container-fluid --}}
@endsection
