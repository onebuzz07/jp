@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
@include('frontend.plan.includes.navrep')
  <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-lg-12">
          <h4> Repeat Order <small>History</small></h4>
          <table class="table table-bordered" id="users-table2">
              <thead>
                  <tr>
                    <th>SC #</th>
                    <th>ID</th>
                    <th>WO #</th>
                    <th>Customer Name</th>
                    <th>Part No</th>
                    <th>Quantity</th>
                    <th>Due Date</th>
                    <th>Cust PO No</th>
                    <th>SO No</th>
                    <th>Rev</th>
                    <th>Actions</th>

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
                    ajax: '{!! route('frontend.plan.repeattable2') !!}',

                    "order": [[ 0, "desc" ]]
                });
            });
        </script>
      </div>
    </div>
</div> {{-- container-fluid --}}
@endsection
