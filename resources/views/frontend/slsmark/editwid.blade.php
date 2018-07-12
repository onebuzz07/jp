@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
<h3 class="box-title"> {!! trans('EDIT WID') !!}</h3>
  <div class="container-fluid">
    <div class="row" id="app">
      <div class="col-lg-12">
        {!! Form::model($salesqad, array('route' => array('frontend.slsmark.editwidstore', $salesqad->id), 'method' => 'POST', 'files'=>true)) !!}
        <div class="form-group row ">
          {!! Form::label('wid', 'WID ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::text('wid', $salesqad->wid, array('class' => 'form-control')) !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('remark', 'Remarks  ', array('class' => 'col-md-2')) !!}
          <div class="col-md-10">{!! Form::textarea('remark', '', array('class' => 'form-control')) !!}</div>
        </div>

        <div class="form-group row">
            <button type="submit" class="btn btn-success" value="SAVE"> SAVE </button>
        </div>

        <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th>Item Number</th>
                    <th>1st Description</th>
                    <th>2nd Description</th>
                    <th>WID</th>
                    <th>Line</th>
                    <th>Sales Order</th>
                    <th>Action</th>

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
                  type: "POST",
                  ajax: {
                    url: '{!! route('frontend.slsmark.editwidtable') !!}',
                    data: function(d) {
                         d.wid = '{!! $salesqad->wid !!}';
                         d._token = '{{ csrf_token() }}';
                    }
                  },

                  'order': [[ 1, 'asc' ]]
              });
          });
      </script>
        {!!Form::close();!!}
      </div>
    </div>
  </div>
@endsection
