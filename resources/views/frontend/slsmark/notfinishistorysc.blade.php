@extends('frontend.layouts.app')

@section('content')
    <h1>Sales Marketing Department</h1>
  @include('frontend.slsmark.includes.nav')
    <div class="col-md-12">
      @include('frontend.slsmark.includes.navindex')
      @include('frontend.slsmark.includes.navtab2')
      </div>
    <h4>Sales Confirmation (History)</h4>
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
              <th>SC #</th>
              <th>ID</th>
              <th>Customer Name</th>
              <th>Part Number</th>
              <th>Part Description</th>
              <th>Part Description 2</th>
              <th>Rev</th>
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
              ajax: '{!! route('frontend.slsmark.unfinishtable') !!}',


          });
      });
      console.log(test);
  </script>
@stop
