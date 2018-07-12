@extends('frontend.layouts.app')
@section('content')
  <h1>Sales Marketing Department</h1>
    @include('frontend.slsmark.includes.nav')
    <div  class="row col-md-12 ">
      @if (access()->hasPermissions(['sales-marketing']))
      {!! Form::open(array('route' => array('frontend.slsmark.imported2'), 'method'=>'POST', 'files'=>true)) !!}
            <div class="col-md-2">
                <button class="btn btn-primary" type="submit">Import Work Order</button>
            </div>
            <div class="col-md-3">
              <div class="form-control">

                <div class="col-md-10">{!! Form::file('import_file', null , array( 'class' => 'form-control ')) !!}</div>
              </div>

            </div>
        {!!form::close()!!}
        {!! Form::open(array('route' => array('frontend.slsmark.importso'), 'method'=>'POST', 'files'=>true)) !!}
              <div class="col-md-2">
                  <button class="btn btn-primary" type="submit">Import Sales Order</button>
              </div>
              <div class="col-md-3">
                <div class="form-control">

                  <div class="col-md-10">{!! Form::file('import_so', null , array( 'class' => 'form-control ')) !!}</div>
                </div>

              </div>
          {!!form::close()!!}
      @endif
    </div>
    <br>
    <div style="padding:10px" class="row col-md-12">
      <table class="table table-bordered" id="users-table">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Customer Name</th>
                  <th>Part Number</th>
                  <th>Part Description</th>
                  <th>Actions</th>
              </tr>
          </thead>
      </table>
    </div>

    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
      $(function() {
          $('#users-table').DataTable({
              processing: true,
              serverSide: true,
              type: "POST",
              ajax:{
                url: '{!! route('frontend.slsmark.listTable') !!}',
                data: function(d) {
                  {{-- d.id = '{!! $items->id !!}';  --}}
                     d._token = '{{ csrf_token() }}';
                }
              },
              "order": [[ 0, "desc" ]]
          });
      });
    </script>
@endsection
