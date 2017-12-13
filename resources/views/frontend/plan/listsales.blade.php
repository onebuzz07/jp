@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>
  @include('frontend.plan.includes.nav')
    {{-- <form action="{!! route('frontend.plan.import') !!}" method="post" enctype="multipart/form-data"> --}}

    <h4>Sales Confirmation Order</h4>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Salesline</th>
                <th>Customer Name</th>
                <th>Part Number</th>
                <th>Part Description</th>
                <th>Actions</th>
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
              ajax: '{!! route('frontend.plan.prodtable') !!}',


          });
      });
      console.log(test);
  </script>

  <h4>Production</h4>
  <table class="table table-bordered" id="users-table1">
      <thead>
          <tr>
              <th>SCO</th>
              <th>Salesorder-line</th>
              <th>Customer Name</th>
              <th>Actions</th>
          </tr>
      </thead>
  </table>
  {{-- {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
  {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }} --}}
<script>
    $(function() {
        $('#users-table1').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('frontend.plan.productiontable') !!}',


        });
    });
    console.log(test);
</script>
@stop
