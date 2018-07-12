@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
  <div class="page-header">
      <h3 class="box-title"> {!! trans('List of Delivery Advice') !!}</h3>
  </div> <!--page-header-->

  <div class="container-fluid">
    <div class="row" id="app">
      <div class="col-lg-12">
        <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th>Item Number</th>
                    <th>Description</th>
                    <th>PO</th>
                    <th>Customer Code</th>
                    <th>Delivery Date</th>
                    <th>Quantity</th>
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
                    ajax: {
                      url : '{!! route('frontend.slsmark.searchdatable') !!}',
                      data: function(d) {
                           d.id = '{!! $item->id !!}';
                           d._token = '{{ csrf_token() }}';
                      }
                    }
                });
            });
            console.log(test);
        </script>
      </div>
    </div>
    <div class="row">
    <input type="button" class="btn btn-success " value="BACK" onclick="history.go(-1)">  </input>
  </div>
  </div>

@endsection
