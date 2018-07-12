@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
@include('frontend.slsmark.includes.nav')
@include('frontend.slsmark.includes.navtab2')

  <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-md-4">
            <div class="col-md-6" id="button"><a class="btn btn-md btn-primary" href="{!!route('frontend.slsmark.createsc')!!}">Create SC(Blank)</a></div>
            <div class="col-md-6" id="button"><a class="btn btn-md btn-primary" href="{!!route('frontend.slsmark.samplereq')!!}">Create SRO(Blank)</a></div>
              </div>

              <br><br><br>
              <div class="row col-md-12">
                {!! Form::open(array('route' => array('frontend.importmanual'), 'method'=>'POST', 'files'=>true)) !!}
                <div class="col-md-12 row">
                  <div class="col-md-4">
                    <label>Import your Manual SO here</label>
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-10">{!! Form::file('import_manual', null , array( 'class' => 'form-control ')) !!}</div>
                  </div>
                  <div class="col-md-2">
                    <button class="btn btn-primary" type="submit">Import</button>
                  </div>
                </div>
                {!!form::close()!!}
              </div>
        <br><br><br>
          <div class="col-lg-12">

          <div class="col-lg-12">
          @if (access()->hasPermissions(['sales-marketing', 'edit-sales']))
            {!! Form::model($sales, array('route' => array('frontend.slsmark.index'), 'method' => 'POST', 'files'=>true)) !!}


            <table class="table table-bordered" id="users-table">
                <thead>
                    <tr>
                      {{-- <th>SO-line</th> --}}
                      <th>SO</th>
                      <th>Line</th>
                      <th>ID</th>
                      <th>PO</th>
                      <th>Name</th>
                      <th>Item #</th>
                      <th>1st Description</th>
                      <th>2nd Description</th>
                      <th>Qty Order</th>
                      <th>Keep Qty</th>
                      <th>Manual Qty</th>
                      <th>Stock Card Qty</th>
                      <th>Item Status</th>
                      <th>Wo Qty</th>
                      <th>Total WO Qty</th>
                      <th>Order Date</th>
                      <th>Due Date</th>
                      <th>Action</th>
                      <th>Record Status</th>
                      <th>WO ID Remark</th>
                      <th>SO Remark</th>
                      <th>SO Line Remark</th>
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
                      ajax: '{!! route('frontend.slsmark.createtable') !!}',

                  });
              });
          </script>
            {!! Form::close() !!}
          @else
            <br>
            <label> Please choose your appropriate department </label>
            <br><br>
            <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)"></input>
          @endif
          </div>
        </div>

      	<div class="col-md-6">
      </div> {{-- row --}}
    </div>
</div> {{-- container-fluid --}}
@endsection
