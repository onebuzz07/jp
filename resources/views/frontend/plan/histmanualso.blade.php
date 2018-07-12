<?php
ini_set('max_execution_time', 0);
?>
@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>

    @include('frontend.plan.includes.nav')
    @include('frontend.plan.includes.navmanual')
    <h4>Manual SO Upload (History)</h4>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
              <th>ID</th>
              <th>WO #</th>
              <th>Part No</th>
              <th>Child Part No</th>
              <th>So Qty</th>
              <th>Keep Qty</th>
              <th>Manual Stock Qty</th>
              <th>Due Date</th>
              <th>Cust PO No</th>
              <th>So No</th>
              <th>Paper</th>
              <th>Status</th>
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
                ajax: '{!! route('frontend.plan.histmanualtable') !!}',

                "order": [[ 0, "desc" ]]
            });
        });
    </script>

@endsection
