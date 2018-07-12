@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<h3>Please Choose Selected Customer Name</h3>
  <div class="container-fluid">
    <div class="row" id="app">
      {!! Form::open( array('route' => array('frontend.slsmark.otherpdf'), 'method' => 'POST', 'files'=>true)) !!}
        <table class="table table-bordered" id="users-table2">
            <thead>
                <tr>
                    <th>Name </th>
                    <th>Customer Code</th>
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
                    ajax: '{!! route('frontend.slsmark.otherformattable') !!}',

                    "order": [[ 0, "desc" ]]
                });
            });
        </script>
        <div class="form-group row">
          <button type="submit" class="btn btn-success " value="SAVE"> SAVE </button>
        </div>
    </div>
    {!!Form::close();!!}
  </div>
@endsection
