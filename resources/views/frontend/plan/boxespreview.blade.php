@extends('frontend.layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/planning.css') }}" />
@section('content')
<h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
  <h3 class="box-title"> Boxes V1.3   <small>10/06/15 - ALL BOXES INCLUDING TOP GLOVE 432mm X 838mm</small> </h3>

    <div class="row" id="app">
      {!! Form::model($boxes, array( 'method' => 'PUT')) !!}
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
              <td>{!! Form::text('order1', $boxes->order1, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n1', 'v-model'=>"n1")) !!}</td>
              <td>{!! Form::text('order2', $boxes->order2, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n2', 'v-model'=>"n2")) !!}</td>
              <td>{!! Form::text('order3', $boxes->order3, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n3', 'v-model'=>"n3")) !!}</td>
              <td>{!! Form::text('order4', $boxes->order4, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n4', 'v-model'=>"n4")) !!}</td>
            </tr>
            <tr>
              <td>Up(s) per sheet</td>
              <td>{!! Form::text('up1', $boxes->up1, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n5', 'v-model'=>"n5")) !!}</td>
              <td>{!! Form::text('up2', $boxes->up2, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>
              <td>{!! Form::text('up3', $boxes->up3, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n7', 'v-model'=>"n7")) !!}</td>
              <td>{!! Form::text('up4', $boxes->up4, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n8', 'v-model'=>"n8")) !!}</td>
            </tr>
            <tr>
              <td>Front Color</td>
              <td>{!! Form::text('front1', $boxes->front1, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n9', 'v-model'=>"n9")) !!}</td>
              <td></td>
              <td>{!! Form::text('front2', $boxes->front2, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n10', 'v-model'=>"n10")) !!}</td>
              <td></td>
            </tr>
            <tr>
              <td>Back Color</td>
              <td>{!! Form::text('back1', $boxes->back1, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n11', 'v-model'=>"n11")) !!}</td>
              <td></td>
              <td>{!! Form::text('back2', $boxes->back2, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n12', 'v-model'=>"n12")) !!}</td>
              <td></td>
            </tr>
            <tr><td></td></tr>
            <tr>
              <td>Surface finishing</td>
              <td>{!! Form::text('surf1', $boxes->surf1, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n13', 'v-model'=>"n13")) !!}</td>
              <td></td>
              <td>{!! Form::text('surf2', $boxes->surf2, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n14', 'v-model'=>"n14")) !!}</td>
              <td></td>
            </tr>
            <tr>
              <td>Trimming/Cutting</td>
              <td>{!! Form::text('trim1', $boxes->trim1, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n15', 'v-model'=>"n15")) !!}</td>
              <td>{!! Form::text('trim2', $boxes->trim2, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>
              <td>{!! Form::text('trim3', $boxes->trim3, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n17', 'v-model'=>"n17")) !!}</td>
              <td>{!! Form::text('trim4', $boxes->trim4, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n18', 'v-model'=>"n18")) !!}</td>
            </tr>
            <tr>
              <td>Flute Laminating</td>
              <td>{!! Form::text('flute1', $boxes->flute1, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n19', 'v-model'=>"n19")) !!}</td>
              <td>{!! Form::text('flute2', $boxes->flute2, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n20', 'v-model'=>"n20")) !!}</td>
              <td>{!! Form::text('flute3', $boxes->flute3, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n21', 'v-model'=>"n21")) !!}</td>
              <td>{!! Form::text('flute4', $boxes->flute4, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n22', 'v-model'=>"n22")) !!}</td>
            </tr>
            <tr>
              <td>Diecut</td>
              <td>{!! Form::text('die1', $boxes->die1, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n23', 'v-model'=>"n23")) !!}</td>
              <td>{!! Form::text('die2', $boxes->die2, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n24', 'v-model'=>"n24")) !!}</td>
              <td>{!! Form::text('die3', $boxes->die3, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n25', 'v-model'=>"n25")) !!}</td>
              <td>{!! Form::text('die4', $boxes->die4, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>
            </tr>
            <tr>
              <td>Stripping</td>
              <td>{!! Form::text('strip1', $boxes->strip1, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n27', 'v-model'=>"n27")) !!}</td>
              <td>{!! Form::text('strip2', $boxes->strip2, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n29', 'v-model'=>"n29")) !!}</td>
              <td>{!! Form::text('strip3', $boxes->strip3, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n30', 'v-model'=>"n30")) !!}</td>
              <td>{!! Form::text('strip4', $boxes->strip4, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n31', 'v-model'=>"n31")) !!}</td>
            </tr>
            <tr>
              <td>Windows Patching</td>
              <td>{!! Form::text('window1', $boxes->window1, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n32', 'v-model'=>"n32")) !!}</td>
              <td>{!! Form::text('window2', $boxes->window2, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n33', 'v-model'=>"n33")) !!}</td>
              <td>{!! Form::text('window3', $boxes->window3, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n34', 'v-model'=>"n34")) !!}</td>
              <td>{!! Form::text('window4', $boxes->window4, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n35', 'v-model'=>"n35")) !!}</td>
            </tr>
            <tr>
              <td>Gluing</td>
              <td>{!! Form::text('glue1', $boxes->glue1, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>
              <td>{!! Form::text('glue2', $boxes->glue2, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n37', 'v-model'=>"n37")) !!}</td>
              <td>{!! Form::text('glue3', $boxes->glue3, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n38', 'v-model'=>"n38")) !!}</td>
              <td>{!! Form::text('glue4', $boxes->glue4, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'n39', 'v-model'=>"n39")) !!}</td>
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
              <td>{!! Form::text('print11', $boxes->print11, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na1', 'v-model'=>"na1")) !!}</td>
              <td></td>
              <td>{!! Form::text('print12', $boxes->print12, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na2', 'v-model'=>"na2")) !!}</td>
              <td></td>
            </tr>
            <tr>
              <td>Surface finishing</td>
              <td>{!! Form::text('surf11', $boxes->surf11, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na3', 'v-model'=>"na3")) !!}</td>
              <td></td>
              <td>{!! Form::text('surf12', $boxes->surf12, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na4', 'v-model'=>"na4")) !!}</td>
              <td></td>
            </tr>
            <tr>
              <td>Trimming/Cutting</td>
              <td>{!! Form::text('trim11', $boxes->trim11, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na5', 'v-model'=>"na5")) !!}</td>
              <td>{!! Form::text('trim12', $boxes->trim12, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na6', 'v-model'=>"na6")) !!}</td>
              <td>{!! Form::text('trim13', $boxes->trim13, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na7', 'v-model'=>"na7")) !!}</td>
              <td>{!! Form::text('trim14', $boxes->trim14, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na8', 'v-model'=>"na8")) !!}</td>
            </tr>
            <tr>
              <td>Flute Laminating</td>
              <td>{!! Form::text('flute11', $boxes->flute11, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na9', 'v-model'=>"na9")) !!}</td>
              <td>{!! Form::text('flute12', $boxes->flute12, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na10', 'v-model'=>"na10")) !!}</td>
              <td>{!! Form::text('flute13', $boxes->flute13, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na11', 'v-model'=>"na11")) !!}</td>
              <td>{!! Form::text('flute14', $boxes->flute14, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na12', 'v-model'=>"na12")) !!}</td>
            </tr>
            <tr>
              <td>Diecut</td>
              <td>{!! Form::text('die11', $boxes->die11, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na13', 'v-model'=>"na13")) !!}</td>
              <td>{!! Form::text('die12', $boxes->die12, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na14', 'v-model'=>"na14")) !!}</td>
              <td>{!! Form::text('die13', $boxes->die13, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na15', 'v-model'=>"na15")) !!}</td>
              <td>{!! Form::text('die14', $boxes->die14, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na16', 'v-model'=>"na16")) !!}</td>
            </tr>
            <tr>
              <td>Stripping</td>
              <td>{!! Form::text('strip11', $boxes->strip11, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na17', 'v-model'=>"na17")) !!}</td>
              <td>{!! Form::text('strip12', $boxes->strip12, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na18', 'v-model'=>"na18")) !!}</td>
              <td>{!! Form::text('strip13', $boxes->strip13, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na19', 'v-model'=>"na19")) !!}</td>
              <td>{!! Form::text('strip14', $boxes->strip14, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na20', 'v-model'=>"na20")) !!}</td>
            </tr>
            <tr>
              <td>Windows Patching</td>
              <td>{!! Form::text('window11', $boxes->window11, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na21', 'v-model'=>"na21")) !!}</td>
              <td>{!! Form::text('window12', $boxes->window12, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na22', 'v-model'=>"na22")) !!}</td>
              <td>{!! Form::text('window13', $boxes->window13, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na23', 'v-model'=>"na23")) !!}</td>
              <td>{!! Form::text('window14', $boxes->window14, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na24', 'v-model'=>"na24")) !!}</td>
            </tr>
            <tr>
              <td>Gluing</td>
              <td>{!! Form::text('glue11', $boxes->glue11, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na25', 'v-model'=>"na25")) !!}</td>
              <td>{!! Form::text('glue12', $boxes->glue12, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na26', 'v-model'=>"na26")) !!}</td>
              <td>{!! Form::text('glue13', $boxes->glue13, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na27', 'v-model'=>"na27")) !!}</td>
              <td>{!! Form::text('glue14', $boxes->glue14, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na28', 'v-model'=>"na28")) !!}</td>
            </tr>
            <tr>
              <td>Packing</td>
              <td>{!! Form::text('pack11', $boxes->pack11, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na29', 'v-model'=>"na29")) !!}</td>
              <td>{!! Form::text('pack12', $boxes->pack12, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na30', 'v-model'=>"na30")) !!}</td>
              <td>{!! Form::text('pack13', $boxes->pack13, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na31', 'v-model'=>"na31")) !!}</td>
              <td>{!! Form::text('pack14', $boxes->pack14, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'na32', 'v-model'=>"na32")) !!}</td>
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
              <td>{!! Form::text('wastecardC', $boxes->wastecardC, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'waste1', 'v-model'=>"waste1")) !!}</td>
              <td>Color Job</td>
              <td>{!! Form::text('reqwastecardC', $boxes->reqwastecardC, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'waste2', 'v-model'=>"waste2")) !!}</td>
              <td>{!! Form::text('paperwastecardC', $boxes->paperwastecardC, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'waste3', 'v-model'=>"waste3")) !!}</td>
            </tr>
            <tr>
              <td></td>
              <td>{!! Form::text('wastecardB', $boxes->wastecardB, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'waste4', 'v-model'=>"waste4")) !!}</td>
              <td>B/W Job</td>
              <td>{!! Form::text('reqwastecardB', $boxes->reqwastecardB, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'waste5', 'v-model'=>"waste5")) !!}</td>
              <td>{!! Form::text('paperwastecardB', $boxes->paperwastecardB, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'waste6', 'v-model'=>"waste6")) !!}</td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr>
              <td>Flute</td>
              <td>{!! Form::text('wastefluteC', $boxes->wastefluteC, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'waste7', 'v-model'=>"waste7")) !!}</td>
              <td>Color Job</td>
              <td></td>
              <td>{!! Form::text('paperwastefluteC', $boxes->paperwastefluteC, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'waste8', 'v-model'=>"waste8")) !!}</td>
            </tr>
            <tr>
              <td></td>
              <td>{!! Form::text('wastefluteB', $boxes->wastefluteB, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'waste9', 'v-model'=>"waste9")) !!}</td>
              <td>B/W Job</td>
              <td></td>
              <td>{!! Form::text('paperwastefluteB', $boxes->paperwastefluteB, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'waste10', 'v-model'=>"waste10")) !!}</td>
            </tr>
          </tbody>
        </table>
        <table class="table table-bordered">
          <tr>
            <td>{!! Form::text('some1', $boxes->some1, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'some1', 'v-model'=>"some1")) !!}</td>
            <td>{!! Form::text('some2', $boxes->some2, array('class' => 'form-control', 'readonly'=>true, 'step'=>"any", 'min'=>'0', 'id'=>'some2', 'v-model'=>"some2")) !!}</td>
            <td>{!! Form::text('some3', $boxes->some3, array('class' => 'form-control', 'readonly'=>true, 'step'=>"any", 'min'=>'0', 'id'=>'some3', 'v-model'=>"some3")) !!}</td>
          </tr>
          <tr>
            <td></td>
            <td>{!! Form::text('some4', $boxes->some4, array('class' => 'form-control', 'readonly'=>true, 'step'=>"any", 'min'=>'0', 'id'=>'some4', 'v-model'=>"some4")) !!}</td>
            <td>{!! Form::text('some5', $boxes->some5, array('class' => 'form-control', 'readonly'=>true, 'step'=>"any", 'min'=>'0', 'id'=>'some5', 'v-model'=>"some5")) !!}</td>
          </tr>
          <tr>
            <td>{!! Form::text('some6', $boxes->some6, array('class' => 'form-control', 'readonly'=>true,  'min'=>'0', 'id'=>'some6', 'v-model'=>"some6")) !!}</td>
            <td>{!! Form::text('some7', $boxes->some7, array('class' => 'form-control', 'readonly'=>true, 'step'=>"any", 'min'=>'0', 'id'=>'some7', 'v-model'=>"some7")) !!}</td>
            <td>{!! Form::text('some8', $boxes->some8, array('class' => 'form-control', 'readonly'=>true, 'step'=>"any", 'min'=>'0', 'id'=>'some8', 'v-model'=>"some8")) !!}</td>
          </tr>
        </table>
          <table class="table table-bordered">
              <tr>
                <td colspan="2">(COL) Make ready per color - Front </td>
                <td>{!! Form::text('colMakeFront', $boxes->colMakeFront, array('class' => 'form-control', 'readonly'=>true,  'id'=>'n200', 'v-model'=>"n200")) !!}</td>

              </tr>
              <tr>
                <td colspan="2">(COL) Make ready per color - Back </td>
                <td>{!! Form::text('colMakeBack', $boxes->colMakeBack, array('class' => 'form-control', 'readonly'=>true,  'id'=>'n201', 'v-model'=>"n201")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">(COL) Waste % </td>
                <td>{!! Form::text('colWaste', $boxes->colWaste, array('class' => 'form-control', 'readonly'=>true,  'step'=>"any", 'id'=>'n202', 'v-model'=>"n202")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">(BLA) Make ready per side</td>
                <td>{!! Form::text('blaMake', $boxes->blaMake, array('class' => 'form-control', 'readonly'=>true,  'id'=>'n203', 'v-model'=>"n203")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">(BLA) Waste %</td>
                <td>{!! Form::text('blaWaste', $boxes->blaWaste, array('class' => 'form-control', 'readonly'=>true,  'step'=>"any", 'id'=>'n204', 'v-model'=>"n204")) !!}</td>
              </tr>

              <tr>
                <td colspan="2"></td>
                <td>Make Ready</td>
                <td>Waste %</td>
              </tr>
              <tr>
                <td colspan="2">Surface Finishing</td>
                <td>{!! Form::text('surfMake', $boxes->surfMake, array('class' => 'form-control', 'readonly'=>true,  'id'=>'n205', 'v-model'=>"n205")) !!}</td>
                <td>{!! Form::text('surfWaste', $boxes->surfWaste, array('class' => 'form-control', 'readonly'=>true,  'step'=>"any", 'id'=>'n206', 'v-model'=>"n206")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Trimming/Cutting</td>
                <td>{!! Form::text('trimMake', $boxes->trimMake, array('class' => 'form-control', 'readonly'=>true,  'id'=>'n207', 'v-model'=>"n207")) !!}</td>
                <td>{!! Form::text('trimWaste', $boxes->trimWaste, array('class' => 'form-control', 'readonly'=>true,  'step'=>"any", 'id'=>'n208', 'v-model'=>"n208")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Flute Laminating</td>
                <td>{!! Form::text('flutemake', $boxes->flutemake, array('class' => 'form-control', 'readonly'=>true,  'id'=>'n209', 'v-model'=>"n209")) !!}</td>
                <td>{!! Form::text('flutewaste', $boxes->flutewaste, array('class' => 'form-control', 'readonly'=>true,  'step'=>"any", 'id'=>'n210', 'v-model'=>"n210")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Diecut</td>
                <td>{!! Form::text('diemake', $boxes->diemake, array('class' => 'form-control', 'readonly'=>true,  'id'=>'n211', 'v-model'=>"n211")) !!}</td>
                <td>{!! Form::text('diewaste', $boxes->diewaste, array('class' => 'form-control', 'readonly'=>true,  'step'=>"any", 'id'=>'n212', 'v-model'=>"n212")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Stripping</td>
                <td>{!! Form::text('stripmake', $boxes->stripmake, array('class' => 'form-control', 'readonly'=>true,  'id'=>'n213', 'v-model'=>"n213")) !!}</td>
                <td>{!! Form::text('stripwaste', $boxes->stripwaste, array('class' => 'form-control', 'readonly'=>true,  'step'=>"any", 'id'=>'n214', 'v-model'=>"n214")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Windows Patching</td>
                <td>{!! Form::text('windowsmake', $boxes->windowsmake, array('class' => 'form-control', 'readonly'=>true,  'id'=>'n215', 'v-model'=>"n215")) !!}</td>
                <td>{!! Form::text('windowswaste', $boxes->windowswaste, array('class' => 'form-control', 'readonly'=>true,  'step'=>"any", 'id'=>'n216', 'v-model'=>"n216")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Gluing without Flute</td>
                <td>{!! Form::text('glueflutemake', $boxes->glueflutemake, array('class' => 'form-control', 'readonly'=>true,  'id'=>'n217', 'v-model'=>"n217")) !!}</td>
                <td>{!! Form::text('glueflutewaste', $boxes->glueflutewaste, array('class' => 'form-control', 'readonly'=>true,  'step'=>"any", 'id'=>'n218', 'v-model'=>"n218")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Gluing with Flute</td>
                <td>{!! Form::text('gluemake', $boxes->gluemake, array('class' => 'form-control', 'readonly'=>true,  'id'=>'n219', 'v-model'=>"n219")) !!}</td>
                <td>{!! Form::text('gluewaste', $boxes->gluewaste, array('class' => 'form-control', 'readonly'=>true,  'step'=>"any", 'id'=>'n220', 'v-model'=>"n220")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Packing</td>
                <td>{!! Form::text('PackMake', $boxes->PackMake, array('class' => 'form-control', 'readonly'=>true,  'id'=>'n221', 'v-model'=>"n221")) !!}</td>
                <td>{!! Form::text('packWaste', $boxes->packWaste, array('class' => 'form-control', 'readonly'=>true,  'step'=>"any", 'id'=>'n222', 'v-model'=>"n222")) !!}</td>
              </tr>

          </table>
      </div>
      <div class="form-group row">
      <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)">  </input>
    </div>
      {!! Form::close() !!}
    </div>

@endsection
