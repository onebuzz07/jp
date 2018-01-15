@extends('frontend.layouts.app')

@section('content')
  <h1>Report</h1>
@include('frontend.report.includes.nav')
  {{-- <div class="page-header">
      <h3 class="box-title"> {!! trans('') !!}</h3>
  </div> <!--page-header--> --}}
  <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-lg-12">

          <div class="col-lg-12">
            {!! Form::model($sales, array('route' => array('frontend.report.index'), 'method' => 'POST', 'files'=>true)) !!}

            <table class="table table-bordered" id="users-table">
                <thead>
                    <tr>
                      <th>Salesline</th>
                      <th>Work Order NO.</th>
                      <th>Operation Number</th>
                      <th>Station</th>
                      <th>Customer Name</th>
                      <th>Part Number</th>
                      <th>Part Description</th>
                      <th>Repeat?</th>
                      <th>Created at </th>
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
                      ajax:
                      {
                          url: '{!! route('frontend.report.slsmarktable') !!}',
                          data: function(d) {
                               d.wo_number = '{!! $sales->wo_number !!}';
                               d._token = '{{ csrf_token() }}';
                             }
                      },

                      "order": [[ 0, "desc" ]]
                  });
              });


              //Being injected from FrontendController
              console.log(test);
          </script>

            {!! Form::close() !!}

          </div>
        </div>

      	<div class="col-md-6">
      </div> {{-- row --}}
    </div>
</div> {{-- container-fluid --}}
@endsection
