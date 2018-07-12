@extends('frontend.layouts.app')

@section('content')
    <h1>Report</h1>
  @include('frontend.report.includes.nav')
  <div class="container-fluid">
    <div class="row">

        {!! Form::model($sales,  array('route' => array('frontend.report.indexpdf'), 'method' => 'POST', 'files'=>true, 'id'=>'example')) !!}
          <label> Search by Work Order ID or Customer Name</label>
            <table class="table table-bordered" id="report">
                <thead>
                    <tr>
                        <th class="col-md-1">Select </th>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-3">Cust Name</th>
                        <th class="col-md-1">Item No.</th>
                        <th class="col-md-3">Part Desc.</th>
                        <th class="col-md-1">SO No</th>
                        <th class="col-md-1">WO No</th>
                        <th class="col-md-1">(Op No.) &Name</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
{{-- <input name="select_all" value="1" id="example-select-all" type="checkbox" /> --}}

                {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
                {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}


                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#report').DataTable({

                            processing: true,
                            serverSide: true,
                            ajax:'{!! route('frontend.report.anydata') !!}',
                            columns:[
                                {"searchable": false},
                                {"searchable": true},
                                {"searchable": false},
                                { "searchable": false},
                                {"searchable": false},
                                {"searchable": false},
                                { "searchable": true},
                                {"searchable": false}
                              ],

                            'order': [[ 1, 'asc']]

                        });
                    });
                  </script>

            </table>
            <div class=" row">
                <button type="submit" class="btn btn-success " value="Submit"> Submit </button>
            </div>
          {!!Form::close();!!}

        </div>
      </div>




@endsection
