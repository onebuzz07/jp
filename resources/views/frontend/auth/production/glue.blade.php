@extends('frontend.layouts.app')

@section('content')
    <h1>Production</h1>

    @include('frontend.production.includes.nav')

    @include('frontend.production.includes.navprod')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
              <th>Sales-line</th>
              <th>WO Number</th>
              <th>Customer Name</th>
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
                ajax: '{!! route('frontend.production.gluetable') !!}',

                "order": [[ 0, "desc" ]]
            });
        });


        //Being injected from FrontendController
        console.log(test);
    </script>

@endsection
