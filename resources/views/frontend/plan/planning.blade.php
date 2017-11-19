@extends('frontend.layouts.app')
@section('content')
<h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
  <h3 class="box-title"> Planning V1.4 </h3>
  <div class="row" id="app">
    {!! Form::model($sales, array('route' => array('frontend.plan.planningstore', $sales->id), 'method' => 'POST')) !!}
    <div class="col-md-6">
      <table class="table table-bordered">
          <tr>
            <td>{!! Form::number('aread', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n1', 'v-model'=>"n1")) !!}</td>
            <td>Area (D)</td>
            <td>{!! Form::number('incharead', '', array('class' => 'form-control', 'step'=>"any",  'min'=>'0', 'id'=>'n2', 'v-model'=>"n2", 'readonly'=>true)) !!}</td>
            <td>inch</td>
          </tr>
          <tr>
            <td>{!! Form::number('areaw', '', array('class' => 'form-control', 'step'=>"any",'min'=>'0', 'id'=>'n3', 'v-model'=>"n3")) !!}</td>
            <td>Area (W)</td>
            <td>{!! Form::number('inchareaw', '', array('class' => 'form-control', 'step'=>"any", 'min'=>'0', 'id'=>'n4', 'v-model'=>"n4", 'readonly'=>true)) !!}</td>
            <td>inch</td>
          </tr>
          <tr>
            <td></td>
            <td>Paper GSM</td>
            <td>{!! Form::number('papergsm', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n5', 'v-model'=>"n5")) !!}</td>
            <td>gsm</td>
          </tr>
          <tr>
            <td></td>
            <td>UP (S)</td>
            <td>{!! Form::number('up', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td>Qty</td>
            <td>{!! Form::number('qty', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n7', 'v-model'=>"n7")) !!}</td>
            <td>sheet(s)</td>
          </tr>
          <tr>
            <td></td>
            <td>Ink Coverage</td>
            <td>{!! Form::number('ink', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n8', 'v-model'=>"n8")) !!}</td>
            <td>%</td>
          </tr>
          <tr>
            <td></td>
            <td>Total Weight</td>
            <td>{!! Form::number('total', '', array('class' => 'form-control','step'=>"any",'step'=>"any",'step'=>"any", 'min'=>'0', 'id'=>'n9', 'v-model'=>"n9")) !!}</td>
            <td>MT</td>
          </tr>
        </table>
    </div>
    <div class="col-md-6">
      <table class="table table-bordered">
        <tr>
          <td>Calculations in Sheets</td>
          <td></td>
          <td>{!! Form::number('calcsheet', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n10', 'v-model'=>"n10", 'readonly'=>true)) !!}</td>
          <td>Sheets</td>
        </tr>
        <tr>
          <td>Calculations in MT</td>
          <td></td>
          <td>{!! Form::number('calcmt', '', array('class' => 'form-control', 'step'=>"any",'min'=>'0', 'id'=>'n11', 'v-model'=>"n11", 'readonly'=>true)) !!}</td>
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
            <td>{!! Form::number('paperink', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n12', 'v-model'=>"n12", 'readonly'=>true)) !!}</td>
            <td>Kg</td>
            <td>{!! Form::number('duplexink', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n13', 'v-model'=>"n13", 'readonly'=>true)) !!}</td>
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
            <td>{!! Form::number('paperissue', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n14', 'v-model'=>"n14", 'readonly'=>true)) !!}</td>
            <td>Kg</td>
            <td>{!! Form::number('duplexissue', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n15', 'v-model'=>"n15", 'readonly'=>true)) !!}</td>
            <td>Kg</td>
          </tr>
        </tbody>
      </table>
      <table class="table table-bordered">
        <tr>
          <td>{!! Form::number('calculation1', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16", 'readonly'=>true)) !!}</td>
          <td>{!! Form::number('calculation2', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n17', 'v-model'=>"n17", 'readonly'=>true)) !!}</td>
        </tr>
      </table>
    </div>
    <div class="col-md-12">
      <p> Sheeting Calculation with 5% Wastage Allocation </p>
      <div class="col-md-6">
      <table class="table table-bordered">
          <tr>
            <td>Cut Length</td>
            <td>{!! Form::number('length', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n18', 'v-model'=>"n18")) !!}</td>
            <td>mm</td>
          </tr>
          <tr>
            <td>Roll Width</td>
            <td>{!! Form::number('width', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n19', 'v-model'=>"n19")) !!}</td>
            <td>mm</td>
          </tr>
          <tr>
            <td>Paper Weight</td>
            <td>{!! Form::number('weight', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n20', 'v-model'=>"n20")) !!}</td>
            <td>gsm</td>
          </tr>
          <tr>
            <td>Paper Qty </td>
            <td>{!! Form::number('paperqty', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n21', 'v-model'=>"n21")) !!}</td>
            <td>sheets</td>
          </tr>
      </table>
      </div>
      <div class="col-md-6">
      <table class="table table-bordered">
          <tr>
            <td>Calculation in MT</td>
            <td></td>
            <td>{!! Form::number('calcinmt', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n22', 'v-model'=>"n22", 'readonly'=>true)) !!}</td>
            <td>MT</td>
          </tr>

        </table>
        <table class="table table-bordered">
          <tr>
            <td>{!! Form::number('permt', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n23', 'v-model'=>"n23", 'readonly'=>true)) !!}</td>
            <td>Per MT</td>
            <td>{!! Form::number('mt', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n24', 'v-model'=>"n24")) !!}</td>
            <td>MT</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>{!! Form::number('sh', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'n25', 'v-model'=>"n25", 'readonly'=>true)) !!}</td>
            <td>SH</td>
          </tr>
      </table>
      </div>
    </div>
    <div class="form-group row">
    <button type="submit" class="btn btn-success btn-block" >SAVE </button>
  </div>
    {!!Form::close()!!}
</div>
<script>
    var vm = new Vue
    ({
      el:'#app',
        data : {
          n1: 0, n3: 0, n5: 0, n6: 0, n7: 0, n8: 0, n9: 0, n18: 0, n19: 0, n20: 0, n21: 0, n24: 0
        },
        computed: {
          n2: function() {
            return (this.n1 / 25.4) || 0;
          },
          n4: function() {
            return (this.n3 / 25.4) || 0;
          },
          n10:function() {
            return (this.n9 * 1550054260 / (this.n2 * this.n4 * this.n5)).toFixed(0) ||0;
          },
          n11: function() {
            return (this.n2 * this.n4 * this.n5 * this.n7 / 1550054260).toFixed(3) ||0;
          },
          n12: function() {
            return (0.0000011 * this.n2 * this.n4 * this.n7 * this.n8 / 100 / this.n6) ||0;
          },
          n13: function() {
            return ( 0.0000015 * this.n2 * this.n4 * this.n7 * this.n8 /100 / this.n6) ||0;
          },
          n14: function() {
            return this.n12 ||0;
          },
          n15: function() {
            return this.n13 ||0;
          },
          n16: function() {
            return (this.n14 / this.n7) ||0;
          },
          n17: function() {
            return (this.n15 / this.n7) ||0;
          },
          n22: function() {
            return (this.n18 * this.n19 * this.n20 * this.n21 * 0.00000000000105) ||0;
          },
          n23:function() {
            return parseInt(this.n21 / this.n22) ||0;
          },
          n25:function() {
            return (this.n23 * this.n24).toFixed(0)||0;
          },
        }
    });
</script>

@endsection
