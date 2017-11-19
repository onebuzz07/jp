@extends('frontend.layouts.app')

@section('content')
    <h1>CTP Department</h1>

    @include('frontend.ctp.includes.nav')

    <h4>Approval page</h4>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
              <th>Salesline</th>
              <th>Customer Name</th>
              <th>Part Number</th>
              <th>Part Description</th>
              <th>Repeat from?</th>
              <th>Created at</th>
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
                ajax: '{!! route('frontend.ctp.anyData') !!}',

                "order": [[ 0, "desc" ]]
            });
        });


        //Being injected from FrontendController
        console.log(test);
    </script>

@stop
