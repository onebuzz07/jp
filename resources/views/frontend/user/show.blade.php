@extends('frontend.layouts.app')

@section('content')

  <div class="page-header">
      <h3 class="box-title"> {{ trans('LIST OF SALES CONFIRMATION') }} <small></small> </h3>
  </div> <!--page-header-->
  <div class="container-fluid">
    <div class="row" id="app">
      <table class="table table-hover table-condensed table-responsive">
        <thead>
          <tr>
      			<th class="col-md-1">
      				SALES CONFIRMATION #
      			</th>
      			<th class="col-md-6">
      				CUSTOMER NAME
      			</th>
            <th class="col-md-3">
      				DATE CREATED
      			</th>
            <th class="col-md-3">
      				ACTION
      			</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sales as $sale)
          <tr>

            <td>{{$sale->sco_number}}</td>
            <td>{{$sale->custName}}</td>
            <td>{{$sale->created_at}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
