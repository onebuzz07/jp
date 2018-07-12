<?php ini_set('max_execution_time', 0); ?>
@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>

    @include('frontend.plan.includes.nav')
    <div style="padding:5px" class="row col-md-12">
    </div>
    <br>
    <div style="padding:10px" class="row col-md-12">
      <table class="table table-bordered" id="users-table">
          <thead>
              <tr>
                  <th>Sales Order-Line</th>
                  <th>Customer Name</th>
                  <th>Part Number</th>
                  <th>Part Description</th>
                  <th>Part Description 2</th>
                  <th>Actions</th>

              </tr>
          </thead>
      </table>
    </div>

    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

  <script>
      $(function() {
          $('#users-table').DataTable({
              processing: true,
              serverSide: true,
                ajax: '{!! route('frontend.plan.listTable') !!}',

              "order": [[ 0, "desc" ]]
          });
      });
  </script>
@stop
