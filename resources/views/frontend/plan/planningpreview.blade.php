@extends('frontend.layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/planning.css') }}" />
@section('content')
<h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
  <h3 class="box-title"> Planning V1.4 </h3>
  <div class="row" id="app">
    {!! Form::model($plannings, array( 'method' => 'PUT')) !!}
    <div class="col-md-6">
      <table class="table table-bordered">
          <tr>
            <td>{!! Form::number('aread', $plannings->aread, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n1', 'v-model'=>"n1", 'readonly'=>true)) !!}</td>
            <td>Area (D)</td>
            <td>{!! Form::number('incharead', $plannings->incharead, array('class' => 'form-control', 'step'=>"any",  'min'=>'0', 'id'=>'n2', 'v-model'=>"n2", 'readonly'=>true)) !!}</td>
            <td>inch</td>
          </tr>
          <tr>
            <td>{!! Form::number('areaw', $plannings->areaw, array('class' => 'form-control', 'step'=>"any",'min'=>'0', 'id'=>'n3', 'v-model'=>"n3", 'readonly'=>true)) !!}</td>
            <td>Area (W)</td>
            <td>{!! Form::number('inchareaw', $plannings->inchareaw, array('class' => 'form-control', 'step'=>"any", 'min'=>'0', 'id'=>'n4', 'v-model'=>"n4", 'readonly'=>true)) !!}</td>
            <td>inch</td>
          </tr>
          <tr>
            <td></td>
            <td>Paper GSM</td>
            <td>{!! Form::number('papergsm', $plannings->papergsm, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n5', 'v-model'=>"n5", 'readonly'=>true)) !!}</td>
            <td>gsm</td>
          </tr>
          <tr>
            <td></td>
            <td>UP (S)</td>
            <td>{!! Form::number('up', $plannings->up, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6", 'readonly'=>true)) !!}</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td>Qty</td>
            <td>{!! Form::number('qty', $plannings->qty, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n7', 'v-model'=>"n7", 'readonly'=>true)) !!}</td>
            <td>sheet(s)</td>
          </tr>
          <tr>
            <td></td>
            <td>Ink Coverage</td>
            <td>{!! Form::number('ink', $plannings->ink, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n8', 'v-model'=>"n8", 'readonly'=>true)) !!}</td>
            <td>%</td>
          </tr>
          <tr>
            <td></td>
            <td>Total Weight</td>
            <td>{!! Form::number('total', $plannings->total, array('class' => 'form-control','step'=>"any",'step'=>"any",'step'=>"any", 'min'=>'0', 'id'=>'n9', 'v-model'=>"n9", 'readonly'=>true)) !!}</td>
            <td>MT</td>
          </tr>
        </table>
    </div>
    <div class="col-md-6">
      <table class="table table-bordered">
        <tr>
          <td>Calculations in Sheets</td>
          <td></td>
          <td>{!! Form::number('calcsheet', $plannings->calcsheet, array('class' => 'form-control', 'min'=>'0', 'id'=>'n10', 'v-model'=>"n10", 'readonly'=>true)) !!}</td>
          <td>Sheets</td>
        </tr>
        <tr>
          <td>Calculations in MT</td>
          <td></td>
          <td>{!! Form::number('calcmt', $plannings->calcmt, array('class' => 'form-control', 'step'=>"any",'min'=>'0', 'id'=>'n11', 'v-model'=>"n11", 'readonly'=>true)) !!}</td>
          <td>MT</td>
        </tr>
      </table>
      <table class="table table-bordered">
        <thead>
          <th>
            Ink required
          </th>
        </thead>
        <tbody>
          <tr>
            <td>Paper</td>
            <td></td>
            <td>Duplex/Card</td>
            <td></td>
          </tr>
          <tr>
            <td>{!! Form::number('paperink', $plannings->paperink, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n12', 'v-model'=>"n12", 'readonly'=>true)) !!}</td>
            <td>Kg</td>
            <td>{!! Form::number('duplexink', $plannings->duplexink, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n13', 'v-model'=>"n13", 'readonly'=>true)) !!}</td>
            <td>Kg</td>
          </tr>
        </tbody>
      </table>
      <table class="table table-bordered">
        <thead>
          <th>
            Ink Issue Qty
          </th>
        </thead>
        <tbody>
          <tr>
            <td>Paper</td>
            <td></td>
            <td>Duplex/Card</td>
            <td></td>
          </tr>
          <tr>
            <td>{!! Form::number('paperissue', $plannings->paperissue, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n14', 'v-model'=>"n14", 'readonly'=>true)) !!}</td>
            <td>Kg</td>
            <td>{!! Form::number('duplexissue', $plannings->duplexissue, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n15', 'v-model'=>"n15", 'readonly'=>true)) !!}</td>
            <td>Kg</td>
          </tr>
        </tbody>
      </table>
      <table class="table table-bordered">
        <tr>
          <td>{!! Form::number('calculation1', $plannings->calculation1, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16", 'readonly'=>true)) !!}</td>
          <td>{!! Form::number('calculation2', $plannings->calculation2, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n17', 'v-model'=>"n17", 'readonly'=>true)) !!}</td>
        </tr>
      </table>
    </div>
    <div class="col-md-12">
      <p> Sheeting Calculation with 5% Wastage Allocation </p>
      <div class="col-md-6">
      <table class="table table-bordered">
          <tr>
            <td>Cut Length</td>
            <td>{!! Form::number('length', $plannings->length, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n18', 'v-model'=>"n18", 'readonly'=>true)) !!}</td>
            <td>mm</td>
          </tr>
          <tr>
            <td>Roll Width</td>
            <td>{!! Form::number('width', $plannings->width, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n19', 'v-model'=>"n19", 'readonly'=>true)) !!}</td>
            <td>mm</td>
          </tr>
          <tr>
            <td>Paper Weight</td>
            <td>{!! Form::number('weight', $plannings->weight, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n20', 'v-model'=>"n20", 'readonly'=>true)) !!}</td>
            <td>gsm</td>
          </tr>
          <tr>
            <td>Paper Qty </td>
            <td>{!! Form::number('paperqty', $plannings->paperqty, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n21', 'v-model'=>"n21", 'readonly'=>true)) !!}</td>
            <td>sheets</td>
          </tr>
      </table>
      </div>
      <div class="col-md-6">
      <table class="table table-bordered">
          <tr>
            <td>Calculation in MT</td>
            <td></td>
            <td>{!! Form::number('calcinmt', $plannings->calcinmt, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n22', 'v-model'=>"n22", 'readonly'=>true)) !!}</td>
            <td>MT</td>
          </tr>

        </table>
        <table class="table table-bordered">
          <tr>
            <td>{!! Form::number('permt', $plannings->permt, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n23', 'v-model'=>"n23", 'readonly'=>true)) !!}</td>
            <td>Per MT</td>
            <td>{!! Form::number('mt', $plannings->mt, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n24', 'v-model'=>"n24", 'readonly'=>true)) !!}</td>
            <td>MT</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>{!! Form::number('sh', $plannings->sh, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n25', 'v-model'=>"n25", 'readonly'=>true)) !!}</td>
            <td>SH</td>
          </tr>
      </table>
      </div>
    </div>
    <div class="form-group row">
    <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)">  </input>
  </div>
    {!!Form::close()!!}
</div>

@endsection
