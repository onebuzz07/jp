@extends('frontend.layouts.app')
@section('content')
 <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
   <h3>List of Item</h3><small>(That already been added formula)</small>
<div class="row col-md-12 " id="app">
  {{-- <h4>Formula Template</h4> --}}
    @include('frontend.plan.includes.navplan')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
              <th>ID</th>
              <th>Customer Name</th>
              <th>Part Number</th>
              {{-- <th>Formula</th> --}}
              {{-- <th>Date</th>
              <th>By</th> --}}
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
                ajax: '{!! route('frontend.plan.formulatable') !!}',

                "order": [[ 0, "desc" ]]
            });
        });


        //Being injected from FrontendController
        console.log(test);
    </script>


</div>
@endsection
