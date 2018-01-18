@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>

    @include('frontend.plan.includes.nav')
  <h4>Product Amendment Form</h4>
  <table class="table table-bordered" id="users-table2">
      <thead>
          <tr>
            <th>PAF #</th>
            <th>Sales-line</th>
            <th>Customer Name</th>
            <th>Part Number</th>
            <th>Part Description</th>
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
            ajax: '{!! route('frontend.plan.pafTable') !!}',

            "order": [[ 0, "desc" ]]
        });
    });
    //Being injected from FrontendController
    console.log(test);
</script>
@endsection
