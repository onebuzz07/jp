@extends('frontend.layouts.app')

@section('content')
    <h1>Sales Marketing Department</h1>

    @include('frontend.slsmark.includes.nav')

    <h4>Sales Confirmation Order</h4>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>SCO No</th>
                <th>Salesline</th>
                <th>Customer Name</th>
                <th>Part Number</th>
                <th>Part Description</th>
                <th>Repeat From</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>


    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
    {{ Html::style("https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css") }}

  <script>
      $(function() {
          $('#users-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('frontend.slsmark.product') !!}',

              "order": [[ 0, "desc" ]]
          });
      });


      //Being injected from FrontendController
      console.log(test);
  </script>

  <h4>Revise PAF</h4>

  <table class="table table-bordered" id="users-table2">
      <thead>
          <tr>
              <th>PAF #</th>
              <th>Customer Name</th>
              <th>Part Number</th>
              <th>Part Description</th>
              <th>Revision</th>
              <th>Actions</th>
          </tr>
      </thead>
  </table>
<script>
    $(function() {
        $('#users-table2').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('frontend.slsmark.showformTable') !!}',

            "order": [[ 0, "desc" ]]
        });
    });


    //Being injected from FrontendController
    console.log(test);
</script>


@stop
