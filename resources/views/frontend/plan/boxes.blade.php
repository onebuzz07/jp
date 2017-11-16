@extends('frontend.layouts.app')
@section('content')
<h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
  <h3 class="box-title"> Boxes V1.3 </h3>
  {{-- <small>10/06/15 - ALL BOXES INCLUDING TOP GLOVE 432mm X 838mm</small>  --}}
    <div class="row" id="app">
      {!! Form::model($sales, array('route' => array('frontend.plan.boxesstore', $sales->id), 'method' => 'POST')) !!}
      <div class="col-md-6">
      <table class="table table-bordered">
          <thead>
            <tr>
              <th></th>
              <th colspan="2">Color</th>
              <th colspan="2">B/W Job</th>
            </tr>
            <tr>
              <th></th>
              <th>Card</th>
              <th>Flute</th>
              <th>Card</th>
              <th>Flute</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>P. Order Qty</td>
              <td>{!! Form::number('order1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n1', 'v-model'=>"n1")) !!}</td>
              <td>{!! Form::number('order2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2', 'v-model'=>"n2")) !!}</td>
              <td>{!! Form::number('order3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n3', 'v-model'=>"n3")) !!}</td>
              <td>{!! Form::number('order4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n4', 'v-model'=>"n4")) !!}</td>
            </tr>
            <tr>
              <td>Up(s) per sheet</td>
              <td>{!! Form::number('up1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n5', 'v-model'=>"n5")) !!}</td>
              <td>{!! Form::number('up2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>
              <td>{!! Form::number('up3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n7', 'v-model'=>"n7")) !!}</td>
              <td>{!! Form::number('up4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n8', 'v-model'=>"n8")) !!}</td>
            </tr>
            <tr>
              <td>Front Color</td>
              <td>{!! Form::number('front1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n9', 'v-model'=>"n9")) !!}</td>
              <td></td>
              <td>{!! Form::number('front2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n10', 'v-model'=>"n10")) !!}</td>
              <td></td>
            </tr>
            <tr>
              <td>Back Color</td>
              <td>{!! Form::number('back1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n11', 'v-model'=>"n11")) !!}</td>
              <td></td>
              <td>{!! Form::number('back2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n12', 'v-model'=>"n12")) !!}</td>
              <td></td>
            </tr>
            <tr><td></td></tr>
            <tr>
              <td>Surface finishing</td>
              <td>{!! Form::number('surf1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n13', 'v-model'=>"n13")) !!}</td>
              <td></td>
              <td>{!! Form::number('surf2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n14', 'v-model'=>"n14")) !!}</td>
              <td></td>
            </tr>
            <tr>
              <td>Trimming/Cutting</td>
              <td>{!! Form::number('trim1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n15', 'v-model'=>"n15")) !!}</td>
              <td>{!! Form::number('trim2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>
              <td>{!! Form::number('trim3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n17', 'v-model'=>"n17")) !!}</td>
              <td>{!! Form::number('trim4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n18', 'v-model'=>"n18")) !!}</td>
            </tr>
            <tr>
              <td>Flute Laminating</td>
              <td>{!! Form::number('flute1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n19', 'v-model'=>"n19")) !!}</td>
              <td>{!! Form::number('flute2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n20', 'v-model'=>"n20")) !!}</td>
              <td>{!! Form::number('flute3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n21', 'v-model'=>"n21")) !!}</td>
              <td>{!! Form::number('flute4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n22', 'v-model'=>"n22")) !!}</td>
            </tr>
            <tr>
              <td>Diecut</td>
              <td>{!! Form::number('die1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n23', 'v-model'=>"n23")) !!}</td>
              <td>{!! Form::number('die2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n24', 'v-model'=>"n24")) !!}</td>
              <td>{!! Form::number('die3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n25', 'v-model'=>"n25")) !!}</td>
              <td>{!! Form::number('die4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>
            </tr>
            <tr>
              <td>Stripping</td>
              <td>{!! Form::number('strip1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n27', 'v-model'=>"n27")) !!}</td>
              <td>{!! Form::number('strip2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n29', 'v-model'=>"n29")) !!}</td>
              <td>{!! Form::number('strip3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n30', 'v-model'=>"n30")) !!}</td>
              <td>{!! Form::number('strip4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n31', 'v-model'=>"n31")) !!}</td>
            </tr>
            <tr>
              <td>Windows Patching</td>
              <td>{!! Form::number('window1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n32', 'v-model'=>"n32")) !!}</td>
              <td>{!! Form::number('window2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n33', 'v-model'=>"n33")) !!}</td>
              <td>{!! Form::number('window3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n34', 'v-model'=>"n34")) !!}</td>
              <td>{!! Form::number('window4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n35', 'v-model'=>"n35")) !!}</td>
            </tr>
            <tr>
              <td>Gluing</td>
              <td>{!! Form::number('glue1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>
              <td>{!! Form::number('glue2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n37', 'v-model'=>"n37")) !!}</td>
              <td>{!! Form::number('glue3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n38', 'v-model'=>"n38")) !!}</td>
              <td>{!! Form::number('glue4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n39', 'v-model'=>"n39")) !!}</td>
            </tr>
          </tbody>
        </table>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th></th>
              <th>Card</th>
              <th>Flute</th>
              <th>Card</th>
              <th>Flute</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Printing</td>
              <td>{!! Form::text('print11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na1', 'v-model'=>"na1", 'readonly'=>true)) !!}</td>
              <td></td>
              <td>{!! Form::text('print12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na2', 'v-model'=>"na2", 'readonly'=>true)) !!}</td>
              <td></td>
            </tr>
            <tr>
              <td>Surface finishing</td>
              <td>{!! Form::text('surf11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na3', 'v-model'=>"na3", 'readonly'=>true)) !!}</td>
              <td></td>
              <td>{!! Form::text('surf12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na4', 'v-model'=>"na4", 'readonly'=>true)) !!}</td>
              <td></td>
            </tr>
            <tr>
              <td>Trimming/Cutting</td>
              <td>{!! Form::text('trim11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na5', 'v-model'=>"na5", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('trim12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na6', 'v-model'=>"na6", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('trim13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na7', 'v-model'=>"na7", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('trim14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na8', 'v-model'=>"na8", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Flute Laminating</td>
              <td>{!! Form::text('flute11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na9', 'v-model'=>"na9", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('flute12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na10', 'v-model'=>"na10", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('flute13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na11', 'v-model'=>"na11", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('flute14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na12', 'v-model'=>"na12", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Diecut</td>
              <td>{!! Form::text('die11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na13', 'v-model'=>"na13", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('die12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na14', 'v-model'=>"na14", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('die13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na15', 'v-model'=>"na15", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('die14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na16', 'v-model'=>"na16", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Stripping</td>
              <td>{!! Form::text('strip11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na17', 'v-model'=>"na17", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('strip12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na18', 'v-model'=>"na18", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('strip13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na19', 'v-model'=>"na19", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('strip14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na20', 'v-model'=>"na20", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Windows Patching</td>
              <td>{!! Form::text('window11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na21', 'v-model'=>"na21", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('window12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na22', 'v-model'=>"na22", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('window13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na23', 'v-model'=>"na23", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('window14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na24', 'v-model'=>"na24", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Gluing</td>
              <td>{!! Form::text('glue11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na25', 'v-model'=>"na25", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('glue12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na26', 'v-model'=>"na26", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('glue13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na27', 'v-model'=>"na27", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('glue14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na28', 'v-model'=>"na28", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Packing</td>
              <td>{!! Form::text('pack11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na29', 'v-model'=>"na29", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('pack12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na30', 'v-model'=>"na30", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('pack13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na31', 'v-model'=>"na31", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('pack14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na32', 'v-model'=>"na32", 'readonly'=>true)) !!}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <table class="table table-bordered">
          <thead>
            <th colspan="3">Waste Qty.</th>
            <th>Required Qty.</th>
            <th>Paper Supply</th>
          </thead>
          <tbody>
            <tr>
              <td>Card</td>
              <td>{!! Form::text('wastecardC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste1', 'v-model'=>"waste1", 'readonly'=>true)) !!}</td>
              <td>Color Job</td>
              <td>{!! Form::text('reqwastecardC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste2', 'v-model'=>"waste2", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('paperwastecardC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste3', 'v-model'=>"waste3", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td></td>
              <td>{!! Form::text('wastecardB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste4', 'v-model'=>"waste4", 'readonly'=>true)) !!}</td>
              <td>B/W Job</td>
              <td>{!! Form::text('reqwastecardB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste5', 'v-model'=>"waste5", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('paperwastecardB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste6', 'v-model'=>"waste6", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr>
              <td>Flute</td>
              <td>{!! Form::text('wastefluteC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste7', 'v-model'=>"waste7", 'readonly'=>true)) !!}</td>
              <td>Color Job</td>
              <td></td>
              <td>{!! Form::text('paperwastefluteC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste8', 'v-model'=>"waste8", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td></td>
              <td>{!! Form::text('wastefluteB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste9', 'v-model'=>"waste9", 'readonly'=>true)) !!}</td>
              <td>B/W Job</td>
              <td></td>
              <td>{!! Form::text('paperwastefluteB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste10', 'v-model'=>"waste10", 'readonly'=>true)) !!}</td>
            </tr>
          </tbody>
        </table>
        <table class="table table-bordered">
          <tr>
            <td>{!! Form::number('some1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'some1', 'v-model'=>"some1")) !!}</td>
            <td>{!! Form::number('some2', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'some2', 'v-model'=>"some2")) !!}</td>
            <td>{!! Form::text('some3', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'some3', 'v-model'=>"some3", 'readonly'=>true)) !!}</td>
          </tr>
          <tr>
            <td></td>
            <td>{!! Form::number('some4', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'some4', 'v-model'=>"some4")) !!}</td>
            <td>{!! Form::text('some5', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'some5', 'v-model'=>"some5", 'readonly'=>true)) !!}</td>
          </tr>
          <tr>
            <td>{!! Form::number('some6', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'some6', 'v-model'=>"some6")) !!}</td>
            <td>{!! Form::number('some7', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'some7', 'v-model'=>"some7")) !!}</td>
            <td>{!! Form::text('some8', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'some8', 'v-model'=>"some8", 'readonly'=>true)) !!}</td>
          </tr>
        </table>
          <table class="table table-bordered">
              <tr>
                <td colspan="2">(COL) Make ready per color - Front </td>
                <td>{!! Form::number('colMakeFront', '', array('class' => 'form-control', 'id'=>'n200', 'v-model'=>"n200")) !!}</td>

              </tr>
              <tr>
                <td colspan="2">(COL) Make ready per color - Back </td>
                <td>{!! Form::number('colMakeBack', '', array('class' => 'form-control', 'id'=>'n201', 'v-model'=>"n201")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">(COL) Waste % </td>
                <td>{!! Form::number('colWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n202', 'v-model'=>"n202")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">(BLA) Make ready per side</td>
                <td>{!! Form::number('blaMake', '', array('class' => 'form-control', 'id'=>'n203', 'v-model'=>"n203")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">(BLA) Waste %</td>
                <td>{!! Form::number('blaWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n204', 'v-model'=>"n204")) !!}</td>
              </tr>

              <tr>
                <td colspan="2"></td>
                <td>Make Ready</td>
                <td>Waste %</td>
              </tr>
              <tr>
                <td colspan="2">Surface Finishing</td>
                <td>{!! Form::number('surfMake', '', array('class' => 'form-control', 'id'=>'n205', 'v-model'=>"n205")) !!}</td>
                <td>{!! Form::number('surfWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n206', 'v-model'=>"n206")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Trimming/Cutting</td>
                <td>{!! Form::number('trimMake', '', array('class' => 'form-control', 'id'=>'n207', 'v-model'=>"n207")) !!}</td>
                <td>{!! Form::number('trimWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n208', 'v-model'=>"n208")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Flute Laminating</td>
                <td>{!! Form::number('flutemake', '', array('class' => 'form-control', 'id'=>'n209', 'v-model'=>"n209")) !!}</td>
                <td>{!! Form::number('flutewaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n210', 'v-model'=>"n210")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Diecut</td>
                <td>{!! Form::number('diemake', '', array('class' => 'form-control', 'id'=>'n211', 'v-model'=>"n211")) !!}</td>
                <td>{!! Form::number('diewaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n212', 'v-model'=>"n212")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Stripping</td>
                <td>{!! Form::number('stripmake', '', array('class' => 'form-control', 'id'=>'n213', 'v-model'=>"n213")) !!}</td>
                <td>{!! Form::number('stripwaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n214', 'v-model'=>"n214")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Windows Patching</td>
                <td>{!! Form::number('windowsmake', '', array('class' => 'form-control', 'id'=>'n215', 'v-model'=>"n215")) !!}</td>
                <td>{!! Form::number('windowswaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n216', 'v-model'=>"n216")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Gluing without Flute</td>
                <td>{!! Form::number('glueflutemake', '', array('class' => 'form-control', 'id'=>'n217', 'v-model'=>"n217")) !!}</td>
                <td>{!! Form::number('glueflutewaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n218', 'v-model'=>"n218")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Gluing with Flute</td>
                <td>{!! Form::number('gluemake', '', array('class' => 'form-control', 'id'=>'n219', 'v-model'=>"n219")) !!}</td>
                <td>{!! Form::number('gluewaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n220', 'v-model'=>"n220")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Packing</td>
                <td>{!! Form::number('PackMake', '', array('class' => 'form-control', 'id'=>'n221', 'v-model'=>"n221")) !!}</td>
                <td>{!! Form::number('PackWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n222', 'v-model'=>"n222")) !!}</td>
              </tr>

          </table>
      </div>
      <div class="form-group row">
      <button type="submit" class="btn btn-success btn-block" >SAVE </button>
      </div>
      {!! Form::close() !!}
    </div>

<script>
    var vm = new Vue
    ({
      el:'#app',
        data : {
            n1:0, n2:0, n3:0, n4:0, n5:0, n7:0, n9:0, n10:0
          , n11: 0 , n12:0, n13:0, n14:0, n15:0, n16:0, n17:0, n18:0, n19:0, n20:0
          , n21 : 0, n22:0, n23:0, n24:0, n25:0, n26:0, n27:0, n28:0, n29:0, n30:0
          , n31:0, n32:0, n33:0 , n34:0, n35:0, n36:0, n37:0, n38:0, n39:0
          , n200: 0, n201: 0, n202: 0, n203: 0, n204: 0, n205: 0, n206: 0, n208 : 0, n207 : 0, n209: 0, n210: 0
          , n211: 0, n212: 0, n213: 0, n214: 0, n215: 0, n216: 0, n217: 0, n218: 0, n219: 0, n220: 0, n221: 0, n222: 0
          , some1:0, some2:0, some4:0, some6:0, some7:0

        },
        methods: {
            f1: function(value){
                if(isNaN(value))
                {
                    return 0;
                }
                else
                {
                  if(isFinite(value))
                  {
                      return value.toFixed(0) ||0;
                  }
                  else
                  {
                    return 0;
                  }
                }
            },
        },
        computed: {
          n6: function() {
            return this.n5;
          },
          n8: function() {
            return this.n7;
          },
          na1: function(){
            var statement = ((parseFloat(this.n200 ) * parseFloat(this.n9)) + (parseFloat(this.n201) * parseFloat(this.n11)));
            var if1 = 0;
            var if2 = 0;

            if (statement < 300)
            {
                if2 = 300;
            } else{
                if2 = statement;
            }
            if( this.n1 == 0)
            {
                if1 = 0;
            } else{
                if1 = ((parseFloat(this.n1) / parseFloat(this.n5) * (parseFloat(this.n202) / 100) * parseFloat(this.n9) + parseFloat(if2)) );
              }
            return this.f1(if1);
          },
          na2: function() {
            var statement = ((parseFloat(this.n203 ) * parseFloat(this.n10)) + (parseFloat(this.n203) * parseFloat(this.n12)));
            var if1 = 0;
            var if2 = 0;

            if (statement < 100)
            {
                if2 = 100;
            } else{
                if2 = statement;
            }
            if( this.n1 == 0)
            {
                if1 = 0;
            } else{
                if1 = ((parseFloat(this.n3) / parseFloat(this.n7) * (parseFloat(this.n204) / 100) * parseFloat(this.n10) + parseFloat(this.n12) + parseFloat(if2)) );
              }
            return this.f1(if1);
          },
          na3: function(){
            var n141a =  (parseFloat(this.n1) / parseFloat(this.n5) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n13);
            return this.f1(n141a);
          },
          na4: function(){
            var n141a =  (parseFloat(this.n3) / parseFloat(this.n7) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n14);
            return this.f1(n141a);
          },
          //trim
          na5: function(){
            var n141a =  (parseFloat(this.n1) / parseFloat(this.n5) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n15);
            return this.f1(n141a);
          },
          na6: function(){
            var n141a =  (parseFloat(this.n2) / parseFloat(this.n6) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n16);
            return this.f1(n141a);
          },
          na7: function(){
            var n141a =  (parseFloat(this.n3) / parseFloat(this.n7) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n17);
            return this.f1(n141a);
          },
          na8: function(){
            var n141a =  (parseFloat(this.n4) / parseFloat(this.n8) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n18);
            return this.f1(n141a);
          },
          //flute
          na9: function(){
            var n141a =  (parseFloat(this.n1) / parseFloat(this.n5) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n19);
            return this.f1(n141a);
          },
          na10: function(){
            var n141a =  (parseFloat(this.n2) / parseFloat(this.n6) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n20);
            return this.f1(n141a);
          },
          na11: function(){
            var n141a =  (parseFloat(this.n3) / parseFloat(this.n7) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n21);
            return this.f1(n141a);
          },
          na12: function(){
            var n141a =  (parseFloat(this.n4) / parseFloat(this.n8) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n22);
            return this.f1(n141a);
          },
          //diecut
          na13: function(){
            var n141a =  ((parseFloat(this.n1) / parseFloat(this.n5) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n23));
            return this.f1(n141a);
          },
          na14: function(){
            var n141a =  ((parseFloat(this.n2) / parseFloat(this.n6) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n24));
            return this.f1(n141a);
          },
          na15: function(){
            var n141a =  ((parseFloat(this.n3) / parseFloat(this.n7) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n25));
            return this.f1(n141a);
          },
          na16: function(){
            var n141a =  ((parseFloat(this.n4) / parseFloat(this.n8) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n26));
            return this.f1(n141a);
          },
          //stripping
          na17: function(){
            var n141a =  (parseFloat(this.n1) / parseFloat(this.n5) * (parseFloat(this.n214)/ 100) + parseFloat(this.n213))* parseFloat(this.n27);
            return this.f1(n141a);
          },
          na18: function(){
            var n141a =  (parseFloat(this.n2) / parseFloat(this.n6) * (parseFloat(this.n214)/ 100) + parseFloat(this.n213))* parseFloat(this.n29);
            return this.f1(n141a);
          },
          na19: function(){
            var n141a =  (parseFloat(this.n3) / parseFloat(this.n7) * (parseFloat(this.n214)/ 100) + parseFloat(this.n213))* parseFloat(this.n30);
            return this.f1(n141a);
          },
          na20: function(){
            var n141a =  (parseFloat(this.n4) / parseFloat(this.n8) * (parseFloat(this.n214)/ 100) + parseFloat(this.n213))* parseFloat(this.n31);
            return this.f1(n141a);
          },
          //windows patching
          na21: function(){
            var n141a =  (parseFloat(this.n1) / parseFloat(this.n5) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n32);
            return this.f1(n141a);
          },
          na22: function(){
            var n141a =  (parseFloat(this.n2) / parseFloat(this.n6) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n33);
            return this.f1(n141a);
          },
          na23: function(){
            var n141a =  (parseFloat(this.n3) / parseFloat(this.n7) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n34);
            return this.f1(n141a);
          },
          na24: function(){
            var n141a =  (parseFloat(this.n4) / parseFloat(this.n8) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n35);
            return this.f1(n141a);
          },
          //gluing
          na25: function() {
            var na25a = ((parseFloat(this.n1) / parseFloat(this.n5) * (parseFloat(this.n218) / 100) + parseFloat(this.n217))* parseFloat(this.n36))
            var na25b = ((parseFloat(this.n1) / parseFloat(this.n5) * (parseFloat(this.n220) / 100) + parseFloat(this.n219)) * parseFloat(this.n36))
            if (isNaN(na25a) || isNaN(na25b)){
              return 0;
            }
            else {
              if (this.n1 == 0){
                return na25a.toFixed(0) ||0;
              }
              else {
                return na25b.toFixed(0) ||0;
              }
            }
          },
          na26: function() {
            var n141a =  (parseFloat(this.n2) / parseFloat(this.n6) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n37);
            return this.f1(n141a);
          },
          //SUPPPOSE TO BE NOT 0 , BUT LATER ASK GARY HOW TO PROCEED WITH (K150/100) BASED ON EXCEL FILE.
          na27: function() {
            var na27a = ((parseFloat(this.n3) / parseFloat(this.n7) * (0 / 100) + parseFloat(this.n217))* parseFloat(this.n38));
            var na27b = ((parseFloat(this.n3) / parseFloat(this.n7) * (0 / 100) + parseFloat(this.n219)) * parseFloat(this.n38));

            if (isNaN(na27a) || isNaN(na27b)){
              return 0;
            }
            else {
              if (this.n4 == 0){
                return na27a.toFixed(0) ||0;
              }
              else {
                return na27b.toFixed(0) ||0;
              }
            }
          },
          na28: function() {
            var n141a =  (parseFloat(this.n4) / parseFloat(this.n8) * (parseFloat(this.n218)/ 100) + parseFloat(this.n217))* parseFloat(this.n39);
            return this.f1(n141a);
          },
          //packing
          na29:function(){
            var anypack1 = (parseFloat(this.n1) / parseFloat(this.n5) * (parseFloat(this.n222) / 100) + parseFloat(this.n221));
            return this.f1(anypack1);
          },
          na30:function(){
            var anypack2 = (parseFloat(this.n2) / parseFloat(this.n6) * (parseFloat(this.n222) / 100) + parseFloat(this.n221));
            return this.f1(anypack2);
          },
          na31:function(){
            var anypack3 = (parseFloat(this.n3) / parseFloat(this.n7) * (parseFloat(this.n222) / 100) + parseFloat(this.n221));
            return this.f1(anypack3);
          },
          na32:function(){
            var anypack4 = (parseFloat(this.n4) / parseFloat(this.n8) * (parseFloat(this.n222) / 100) + parseFloat(this.n221));
            return this.f1(anypack4);
          },

          waste1:function(){
            var np = (parseFloat(this.na1) + parseFloat(this.na3) + parseFloat(this.na5) + parseFloat(this.na9) + parseFloat(this.na13 )+ parseFloat(this.na17) + parseFloat(this.na21) + parseFloat(this.na25) + parseFloat(this.na29));
            return this.f1(np);
          },
          waste2:function () {
            var waste2a = parseFloat(this.n1) / parseFloat(this.n5) + parseFloat(this.waste1) - parseFloat(this.na1);
            return this.f1(waste2a);
          },
          waste3: function() {
            var waste3a = ((parseFloat(this.n1) / parseFloat(this.n5)) + parseFloat(this.waste1)) ;
            return this.f1(waste3a);
          },
          waste4:function() {
            var np = (parseFloat(this.na2) + parseFloat(this.na4) + parseFloat(this.na7) + parseFloat(this.na11) + parseFloat(this.na15) + parseFloat(this.na19) + parseFloat(this.na23) + parseFloat(this.na27) + parseFloat(this.na31));
            return this.f1(np);
          },
          waste5:function() {
            var waste5a = ((parseFloat(this.n3) / parseFloat(this.n7)) + parseFloat(this.waste4) - parseFloat(this.na2));
            return this.f1(waste5a);
          },
          waste6: function() {
            var waste6a = ((parseFloat(this.n3) / parseFloat(this.n7)) + parseFloat(this.waste4));
            return this.f1(waste6a);
          },
          waste7: function(){
            var np = ((parseFloat(this.na10) + parseFloat(this.na14 )+ parseFloat(this.na18) + parseFloat(this.na22) + parseFloat(this.na26) + parseFloat(this.na30)) + (2.5 / 100) * parseFloat(this.n2) );
            return this.f1(np);
          },
          waste8: function () {
            var waste8a = ((parseFloat(this.n2) / parseFloat(this.n6)) + parseFloat(this.waste7));
            return this.f1(waste8a);
          },
          waste9: function () {
            var np = (parseFloat(this.na12) + parseFloat(this.na16) + parseFloat(this.na20) + parseFloat(this.na24) + parseFloat(this.na28) + parseFloat(this.na32));
            return this.f1(np);
          },
          waste10: function () {
            var waste10a = ((parseFloat(this.n4) / parseFloat(this.n8)) + parseFloat(this.waste9));
            return this.f1(waste10a);
          },
          some3:function() {
            var np = ((parseFloat(this.some1) * (parseFloat(this.some2)/100)) + parseFloat(this.some1));
            return this.f1(np);
          },
          some5: function() {
            var np =  ((parseFloat(this.some1) * (parseFloat(this.some4)/100)) + parseFloat(this.some1));
            return this.f1(np);
          },
          some8:function () {
            var np =  ((parseFloat(this.some6) * (parseFloat(this.some7)/100)) - parseFloat(this.some6));
            return this.f1(np);
          },

        }
    });
</script>

@endsection
