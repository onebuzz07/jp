@extends('frontend.layouts.app')

@section('content')
    <h1>Report</h1>
  @include('frontend.report.includes.nav')
  <div class="container-fluid">
    {!! Form::model($sales,  array('route' => array('frontend.report.reportsearch'), 'method' => 'POST', 'files'=>true)) !!}

        <div class="row" id="app">
          <div class="col-md-12">
            <div class="row">
                {{ Form::label('wid', 'Work Order ID', array('class' => 'control-label col-sm-2')) }}
                    <div class="col-sm-5">
                      {!! Form::text('wid','', array('class' => 'form-control', 'placeholder'=>'Please enter your work order ID')) !!}

                    </div>
                </div>
              </div>
          </div>
        <div class="row">
              {{ Form::submit( 'Search', ['class' => 'btn btn-default', 'name' => 'search', 'value' => 'search']) }}
          </div>
          <br>
      {!!Form::close();!!}


    <div class="row">
        @if (isset($sales))
        {!! Form::model($sales,  array('route' => array('frontend.report.indexpdf'), 'method' => 'POST', 'files'=>true)) !!}
            <table class="table table-bordered" id="report">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Customer Name</th>
                        <th>Item No.</th>
                        <th>Part Description</th>
                        <th>Sales Order No</th>
                        <th>Work Order No</th>
                        <th>Work Order ID</th>
                        <th>Operation No.</th>
                    </tr>
                </thead>

                @foreach($sales as $s)
                  @foreach ($s->station as $station)
                <tbody>


                            <tr>
                              <td> {!!form::checkbox('operation[]', $station->operation)!!}</td>
                              <td> {!!$s->custName!!}</td>
                              <td>{!!$s->items->partNo!!}</td>
                              <td>{!!$s->items->partDesc!!}</td>
                              <td>{!!$s->salesorder!!}</td>
                              <td>{!!form::text('workorder[]', $s->workorder, array('class' => 'form-control', 'readonly'=>true))!!}</td>
                              <td>{!!$station->wid!!}</td>
                              <td>{!!$station->operation!!}</td>
                            </tr>

                </tbody>
              @endforeach
            @endforeach

            </table>
            <div class=" row">
                <button type="submit" class="btn btn-success " value="Submit"> Submit </button>
            </div>
          {!!Form::close();!!}

        @endif
        </div>
      </div>

      {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
      {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#report').DataTable({
              
                "order": [[ 0, "desc" ]]
            });
        });
    </script>


@endsection
