@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <h3 class="box-title"> {{ trans('') }}</h3>
  <div class="" id="app">

    <div class="col-md-12">

      <table class="table table-bordered" id="users-table">
          <thead>
              <tr>
                <th>DATE</th>
                <th>JOB NO.</th>
                <th>GRN NO./MRN/GEIN</th>
                <th>IN (MT)</th>
                <th>OUT (MT)</th>
                <th>BALANCE (MT)</th>
                <th>REMARK</th>
                <th>ACTION</th>
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
                  ajax: '{!! route('frontend.plan.viewstocktable') !!}',

                  "order": [[ 0, "desc" ]]
              });
          });


          //Being injected from FrontendController
          console.log(test);
      </script>
    </div>

  </div>
@endsection
