@extends('frontend.layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/planning.css') }}" />
@section('content')
<h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
  <h3 class="box-title"> Boxes V1.3 <small>10/06/15 - ALL BOXES INCLUDING TOP GLOVE 432mm X 838mm</small> </h3>
    <div class="row" id="app">
      {!! Form::model($sales, array('route' => array('frontend.plan.boxesstore', $sales->id), 'method' => 'POST')) !!}
      <div class="col-md-12">
        <table class="table ">
          <tr class="col-md-6">
            <td>For Color</td>
            <td>{!! Form::number('some1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'some1', 'v-model'=>"some1")) !!}</td>
            <td>{!! Form::number('some2', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'some2', 'v-model'=>"some2")) !!}</td>
            <td>{!! Form::text('some3', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'some3', 'v-model'=>"some3", 'readonly'=>true)) !!}</td>
          </tr>

          <tr class="col-md-6">
            <td>For B/W</td>
            <td>{!! Form::number('some11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'some11', 'v-model'=>"some11")) !!}</td>
            <td>{!! Form::number('some21', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'some21', 'v-model'=>"some21")) !!}</td>
            <td>{!! Form::text('some31', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'some31', 'v-model'=>"some31", 'readonly'=>true)) !!}</td>
          </tr>
        </table>
      <table class="table table-bordered">
          <thead>
            <tr>
              <th></th>
              <th colspan="4">Color Job</th>
              <th colspan="4">B/W Job</th>
            </tr>
            <tr>
              <th></th>
              <th>Card1</th>
              <th>Card2</th>
              <th>Flute1</th>
              <th>Flute2</th>
              <th>Card1</th>
              <th>Card2</th>
              <th>Flute1</th>
              <th>Flute2</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>P. Order Qty</td>
              <td>{!! Form::number('order1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n1', 'v-model'=>"n1")) !!}</td>
              <td>{!! Form::number('order2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2', 'v-model'=>"n2")) !!}</td>
              <td>{!! Form::number('order1e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n1e', 'v-model'=>"n1e")) !!}</td>
              <td>{!! Form::number('order2e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2e', 'v-model'=>"n2e")) !!}</td>
              <td>{!! Form::number('order3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n3', 'v-model'=>"n3")) !!}</td>
              <td>{!! Form::number('order4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n4', 'v-model'=>"n4")) !!}</td>
              <td>{!! Form::number('order3e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n3e', 'v-model'=>"n3e")) !!}</td>
              <td>{!! Form::number('order4e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n4e', 'v-model'=>"n4e")) !!}</td>
            </tr>
            <tr>
              <td>Up(s) per sheet</td>
              <td>{!! Form::number('up1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n5', 'v-model'=>"n5")) !!}</td>
              <td>{!! Form::number('up2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>
              <td>{!! Form::number('up1e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n5e', 'v-model'=>"n5e")) !!}</td>
              <td>{!! Form::number('up2e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n6e', 'v-model'=>"n6e")) !!}</td>
              <td>{!! Form::number('up3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n7', 'v-model'=>"n7")) !!}</td>
              <td>{!! Form::number('up4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n8', 'v-model'=>"n8")) !!}</td>
              <td>{!! Form::number('up3e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n7e', 'v-model'=>"n7e")) !!}</td>
              <td>{!! Form::number('up4e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n8e', 'v-model'=>"n8e")) !!}</td>
            </tr>
            <tr>
              <td>Front Color</td>
              <td>{!! Form::number('front1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n9', 'v-model'=>"n9")) !!}</td>
              <td>{!! Form::number('front1e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n9e', 'v-model'=>"n9e")) !!}</td>
              <td></td>
              <td></td>
              <td>{!! Form::number('front2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n10', 'v-model'=>"n10")) !!}</td>
              <td>{!! Form::number('front2e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n10e', 'v-model'=>"n10e")) !!}</td>
              <td></td>
              <td></td>

            </tr>
            <tr>
              <td>Back Color</td>
              <td>{!! Form::number('back1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n11', 'v-model'=>"n11")) !!}</td>
              <td>{!! Form::number('back1e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n11e', 'v-model'=>"n11e")) !!}</td>
              <td></td>
              <td></td>
              <td>{!! Form::number('back2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n12', 'v-model'=>"n12")) !!}</td>
              <td>{!! Form::number('back2e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n12e', 'v-model'=>"n12e")) !!}</td>
              <td></td>
              <td></td>
            </tr>
            <tr><td></td></tr>
            <tr>
              <td>Surface finishing</td>
              <td>{!! Form::number('surf1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n13', 'v-model'=>"n13")) !!}</td>
              <td>{!! Form::number('surf3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n13w', 'v-model'=>"n13w")) !!}</td>
              <td>{!! Form::number('surf1e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n13q', 'v-model'=>"n13q")) !!}</td>
              <td>{!! Form::number('surf3e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n13e', 'v-model'=>"n13e")) !!}</td>
              <td>{!! Form::number('surf2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n14', 'v-model'=>"n14")) !!}</td>
              <td>{!! Form::number('surf4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n14w', 'v-model'=>"n14w")) !!}</td>
              <td>{!! Form::number('surf2e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n14q', 'v-model'=>"n14q")) !!}</td>
              <td>{!! Form::number('surf4e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n14e', 'v-model'=>"n14e")) !!}</td>
            </tr>
            <tr>
              <td>Trimming/Cutting</td>
              <td>{!! Form::number('trim1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n15', 'v-model'=>"n15")) !!}</td>
              <td>{!! Form::number('trim2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>
              <td>{!! Form::number('trim1e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n15e', 'v-model'=>"n15e")) !!}</td>
              <td>{!! Form::number('trim2e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n16e', 'v-model'=>"n16e")) !!}</td>
              <td>{!! Form::number('trim3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n17', 'v-model'=>"n17")) !!}</td>
              <td>{!! Form::number('trim4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n18', 'v-model'=>"n18")) !!}</td>
              <td>{!! Form::number('trim3e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n17e', 'v-model'=>"n17e")) !!}</td>
              <td>{!! Form::number('trim4e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n18e', 'v-model'=>"n18e")) !!}</td>
            </tr>
            <tr>
              <td>Flute Laminating</td>
              <td>{!! Form::number('flute1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n19', 'v-model'=>"n19")) !!}</td>
              <td>{!! Form::number('flute2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n20', 'v-model'=>"n20")) !!}</td>
              <td>{!! Form::number('flute1e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n19e', 'v-model'=>"n19e")) !!}</td>
              <td>{!! Form::number('flute2e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n20e', 'v-model'=>"n20e")) !!}</td>
              <td>{!! Form::number('flute3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n21', 'v-model'=>"n21")) !!}</td>
              <td>{!! Form::number('flute4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n22', 'v-model'=>"n22")) !!}</td>
              <td>{!! Form::number('flute3e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n21e', 'v-model'=>"n21e")) !!}</td>
              <td>{!! Form::number('flute4e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n22e', 'v-model'=>"n22e")) !!}</td>
            </tr>
            <tr>
              <td>Diecut</td>
              <td>{!! Form::number('die1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n23', 'v-model'=>"n23")) !!}</td>
              <td>{!! Form::number('die2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n24', 'v-model'=>"n24")) !!}</td>
              <td>{!! Form::number('die1e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n23e', 'v-model'=>"n23e")) !!}</td>
              <td>{!! Form::number('die2e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n24e', 'v-model'=>"n24e")) !!}</td>
              <td>{!! Form::number('die3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n25', 'v-model'=>"n25")) !!}</td>
              <td>{!! Form::number('die4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>
              <td>{!! Form::number('die3e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n25e', 'v-model'=>"n25e")) !!}</td>
              <td>{!! Form::number('die4e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n26e', 'v-model'=>"n26e")) !!}</td>
            </tr>
            <tr>
              <td>Stripping</td>
              <td>{!! Form::number('strip1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n27', 'v-model'=>"n27")) !!}</td>
              <td>{!! Form::number('strip2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n29', 'v-model'=>"n29")) !!}</td>
              <td>{!! Form::number('strip1e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n27e', 'v-model'=>"n27e")) !!}</td>
              <td>{!! Form::number('strip2e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n29e', 'v-model'=>"n29e")) !!}</td>
              <td>{!! Form::number('strip3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n30', 'v-model'=>"n30")) !!}</td>
              <td>{!! Form::number('strip4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n31', 'v-model'=>"n31")) !!}</td>
              <td>{!! Form::number('strip3e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n30e', 'v-model'=>"n30e")) !!}</td>
              <td>{!! Form::number('strip4e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n31e', 'v-model'=>"n31e")) !!}</td>
            </tr>
            <tr>
              <td>Windows Patching</td>
              <td>{!! Form::number('window1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n32', 'v-model'=>"n32")) !!}</td>
              <td>{!! Form::number('window2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n33', 'v-model'=>"n33")) !!}</td>
              <td>{!! Form::number('window1e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n32e', 'v-model'=>"n32e")) !!}</td>
              <td>{!! Form::number('window2e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n33e', 'v-model'=>"n33e")) !!}</td>
              <td>{!! Form::number('window3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n34', 'v-model'=>"n34")) !!}</td>
              <td>{!! Form::number('window4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n35', 'v-model'=>"n35")) !!}</td>
              <td>{!! Form::number('window3e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n34e', 'v-model'=>"n34e")) !!}</td>
              <td>{!! Form::number('window4e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n35e', 'v-model'=>"n35e")) !!}</td>
            </tr>
            <tr>
              <td>Gluing</td>
              <td>{!! Form::number('glue1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>
              <td>{!! Form::number('glue2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n37', 'v-model'=>"n37")) !!}</td>
              <td>{!! Form::number('glue1e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n36e', 'v-model'=>"n36e")) !!}</td>
              <td>{!! Form::number('glue2e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n37e', 'v-model'=>"n37e")) !!}</td>
              <td>{!! Form::number('glue3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n38', 'v-model'=>"n38")) !!}</td>
              <td>{!! Form::number('glue4', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n39', 'v-model'=>"n39")) !!}</td>
              <td>{!! Form::number('glue3e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n38e', 'v-model'=>"n38e")) !!}</td>
              <td>{!! Form::number('glue4e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n39e', 'v-model'=>"n39e")) !!}</td>
            </tr>
          </tbody>
        </table>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th></th>
              <th>Card1</th>
              <th>Card2</th>
              <th>Flute1</th>
              <th>Flute2</th>
              <th>Card1</th>
              <th>Card2</th>
              <th>Flute1</th>
              <th>Flute2</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Printing</td>
              <td>{!! Form::text('print11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na1', 'v-model'=>"na1", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('print11e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na1e', 'v-model'=>"na1e", 'readonly'=>true)) !!}</td>
              <td></td>
              <td></td>
              <td>{!! Form::text('print12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na2', 'v-model'=>"na2", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('print12e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na2e', 'v-model'=>"na2e", 'readonly'=>true)) !!}</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>Surface finishing</td>
              <td>{!! Form::text('surf11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na3', 'v-model'=>"na3", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('surf11e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na3e', 'v-model'=>"na3e", 'readonly'=>true)) !!}</td>
              <td></td>
              <td></td>
              <td>{!! Form::text('surf12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na4', 'v-model'=>"na4", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('surf12e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na4e', 'v-model'=>"na4e", 'readonly'=>true)) !!}</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>Trimming/Cutting</td>
              <td>{!! Form::text('trim11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na5', 'v-model'=>"na5", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('trim12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na6', 'v-model'=>"na6", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('trim11e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na5e', 'v-model'=>"na5e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('trim12e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na6e', 'v-model'=>"na6e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('trim13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na7', 'v-model'=>"na7", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('trim14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na8', 'v-model'=>"na8", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('trim13e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na7e', 'v-model'=>"na7e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('trim14e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na8e', 'v-model'=>"na8e", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Flute Laminating</td>
              <td>{!! Form::text('flute11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na9', 'v-model'=>"na9", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('flute12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na10', 'v-model'=>"na10", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('flute11e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na9e', 'v-model'=>"na9e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('flute12e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na10e', 'v-model'=>"na10e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('flute13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na11', 'v-model'=>"na11", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('flute14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na12', 'v-model'=>"na12", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('flute13e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na11e', 'v-model'=>"na11e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('flute14e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na12e', 'v-model'=>"na12e", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Diecut</td>
              <td>{!! Form::text('die11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na13', 'v-model'=>"na13", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('die12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na14', 'v-model'=>"na14", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('die11e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na13e', 'v-model'=>"na13e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('die12e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na14e', 'v-model'=>"na14e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('die13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na15', 'v-model'=>"na15", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('die14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na16', 'v-model'=>"na16", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('die13e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na15e', 'v-model'=>"na15e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('die14e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na16e', 'v-model'=>"na16e", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Stripping</td>
              <td>{!! Form::text('strip11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na17', 'v-model'=>"na17", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('strip12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na18', 'v-model'=>"na18", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('strip11e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na17e', 'v-model'=>"na17e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('strip12e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na18e', 'v-model'=>"na18e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('strip13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na19', 'v-model'=>"na19", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('strip14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na20', 'v-model'=>"na20", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('strip13e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na19e', 'v-model'=>"na19e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('strip14e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na20e', 'v-model'=>"na20e", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Windows Patching</td>
              <td>{!! Form::text('window11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na21', 'v-model'=>"na21", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('window12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na22', 'v-model'=>"na22", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('window11e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na21e', 'v-model'=>"na21e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('window12e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na22e', 'v-model'=>"na22e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('window13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na23', 'v-model'=>"na23", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('window14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na24', 'v-model'=>"na24", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('window13e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na23e', 'v-model'=>"na23e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('window14e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na24e', 'v-model'=>"na24e", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Gluing</td>
              <td>{!! Form::text('glue11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na25', 'v-model'=>"na25", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('glue12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na26', 'v-model'=>"na26", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('glue11e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na25e', 'v-model'=>"na25e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('glue12e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na26e', 'v-model'=>"na26e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('glue13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na27', 'v-model'=>"na27", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('glue14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na28', 'v-model'=>"na28", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('glue13e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na27e', 'v-model'=>"na27e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('glue14e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na28e', 'v-model'=>"na28e", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Packing</td>
              <td>{!! Form::text('pack11', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na29', 'v-model'=>"na29", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('pack12', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na30', 'v-model'=>"na30", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('pack11e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na29e', 'v-model'=>"na29e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('pack12e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na30e', 'v-model'=>"na30e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('pack13', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na31', 'v-model'=>"na31", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('pack14', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na32', 'v-model'=>"na32", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('pack13e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na31e', 'v-model'=>"na31e", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('pack14e', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na32e', 'v-model'=>"na32e", 'readonly'=>true)) !!}</td>
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
              <td>Card1</td>
              <td>{!! Form::text('wastecardC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste1', 'v-model'=>"waste1", 'readonly'=>true)) !!}</td>
              <td>Color Job</td>
              <td>{!! Form::text('reqwastecardC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste2', 'v-model'=>"waste2", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('paperwastecardC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste3', 'v-model'=>"waste3", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Card2</td>
              <td>{!! Form::text('wastecardC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste11', 'v-model'=>"waste11", 'readonly'=>true)) !!}</td>
              <td>Color Job</td>
              <td>{!! Form::text('reqwastecardC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste21', 'v-model'=>"waste21", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('paperwastecardC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste31', 'v-model'=>"waste31", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Card1</td>
              <td>{!! Form::text('wastecardB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste4', 'v-model'=>"waste4", 'readonly'=>true)) !!}</td>
              <td>B/W Job</td>
              <td>{!! Form::text('reqwastecardB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste5', 'v-model'=>"waste5", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('paperwastecardB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste6', 'v-model'=>"waste6", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Card2</td>
              <td>{!! Form::text('wastecardB1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste41', 'v-model'=>"waste41", 'readonly'=>true)) !!}</td>
              <td>B/W Job</td>
              <td>{!! Form::text('reqwastecardB1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste51', 'v-model'=>"waste51", 'readonly'=>true)) !!}</td>
              <td>{!! Form::text('paperwastecardB1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste61', 'v-model'=>"waste61", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr>
              <td>Flute1</td>
              <td>{!! Form::text('wastefluteC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste7', 'v-model'=>"waste7", 'readonly'=>true)) !!}</td>
              <td>Color Job</td>
              <td></td>
              <td>{!! Form::text('paperwastefluteC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste8', 'v-model'=>"waste8", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td>Flute2</td>
              <td>{!! Form::text('wastefluteC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste71', 'v-model'=>"waste71", 'readonly'=>true)) !!}</td>
              <td>Color Job</td>
              <td></td>
              <td>{!! Form::text('paperwastefluteC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste81', 'v-model'=>"waste81", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td></td>
              <td>{!! Form::text('wastefluteB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste9', 'v-model'=>"waste9", 'readonly'=>true)) !!}</td>
              <td>B/W Job</td>
              <td></td>
              <td>{!! Form::text('paperwastefluteB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste10', 'v-model'=>"waste10", 'readonly'=>true)) !!}</td>
            </tr>
            <tr>
              <td></td>
              <td>{!! Form::text('wastefluteB1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste91', 'v-model'=>"waste91", 'readonly'=>true)) !!}</td>
              <td>B/W Job</td>
              <td></td>
              <td>{!! Form::text('paperwastefluteB1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'waste101', 'v-model'=>"waste101", 'readonly'=>true)) !!}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
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
                <td>{!! Form::number('packWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n222', 'v-model'=>"n222")) !!}</td>
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
            n2:0, n4:0, n5:0, n7:0, n6:0, n8:0, n9:0, n10:0
          , n11: 0 , n12:0, n13:0, n14:0, n15:0, n16:0, n17:0, n18:0, n19:0, n20:0
          , n21 : 0, n22:0, n23:0, n24:0, n25:0, n26:0, n27:0, n29:0, n30:0
          , n31:0, n32:0, n33:0 , n34:0, n35:0, n36:0, n37:0, n38:0, n39:0,
          n1e:0, n2e:0, n3e:0, n4e:0, n5e:0,n6e:0, n7e:0,n8e:0, n9e:0, n10e:0
          , n11e: 0 , n12e:0, n13e:0,n13q:0,n13w:0 ,n14e:0,n14q:0,n14w:0, n15e:0, n16e:0, n17e:0, n18e:0, n19e:0, n20e:0
          , n21e : 0, n22e:0, n23e:0, n24e:0, n25e:0, n26e:0, n27e:0, n29e:0, n30e:0
          , n31e:0, n32e:0, n33e:0 , n34e:0, n35e:0, n36e:0, n37e:0, n38e:0, n39e:0
          , n200:80, n201: 60, n202: 0.5, n203: 30, n204: 0.75, n205: 20, n206: 0.5, n208 : 0, n207 : 5, n209: 20, n210: 0.5
          , n211: 20, n212: 0.5, n213: 0, n214: 0.1, n215: 20, n216: 0.5, n217: 20, n218: 0.5, n219: 30, n220: 0.75, n221: 0, n222: 0.1
          , some1:0, some2:0
          , some11:0, some21:0

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
          n1: function(){
            return this.some3;
          },

          n3: function(){
            return this.some31;
          },

          // n6: function() {
          //   return this.n5;
          // },
          // n8: function() {
          //   return this.n7;
          // },
          na1: function(){
            var statement = ((parseFloat(this.n200 ) * parseFloat(this.n9)) + (parseFloat(this.n201) * parseFloat(this.n11)));
            var if3 = (parseFloat(this.n1) / parseFloat(this.n5) * (parseFloat(this.n202) / 100) * (parseFloat(this.n9)));

            if (statement < 300)
            {
                if2 = 300;
            } else{
                if2 = statement;
            }

            if1 = ( parseFloat(if3) + parseFloat(if2));
            return this.f1(if1);
          },
          na1e: function() {
            var statement = ((parseFloat(this.n200 ) * parseFloat(this.n9e)) + (parseFloat(this.n201) * parseFloat(this.n11e)));
            var if3 = (parseFloat(this.n2) / parseFloat(this.n6) * (parseFloat(this.n202) / 100) * (parseFloat(this.n9e)));

            if (statement < 300)
            {
                if2 = 300;
            } else{
                if2 = statement;
            }

            if1 = ( parseFloat(if3) + parseFloat(if2));
            return this.f1(if1);
          },
          na2: function(){
            var statement = ((parseFloat(this.n203 ) * parseFloat(this.n10)) + (parseFloat(this.n203) * parseFloat(this.n12)));
            var if3 = (parseFloat(this.n3) / parseFloat(this.n7) * (parseFloat(this.n204) / 100) * (parseFloat(this.n10) + parseFloat(this.n12)));

            if (statement < 100)
            {
                if2 = 100;
            } else{
                if2 = statement;
            }

            if1 = ( parseFloat(if3) + parseFloat(if2));
            return this.f1(if1);
          },
          na2e: function() {
            var statement = ((parseFloat(this.n203 ) * parseFloat(this.n10e)) + (parseFloat(this.n203) * parseFloat(this.n12e)));
            var if3 = (parseFloat(this.n4) / parseFloat(this.n8) * (parseFloat(this.n204) / 100) *( parseFloat(this.n10e) + parseFloat(this.n12e)));
            // var if1 = 0;
            // var if2 = 0;

            if (statement < 100)
            {
                if2 = 100;

            } else{
                if2 = statement;
            }
            if1 = (parseFloat(if3) + parseFloat(if2));
            return this.f1(if1);


          },
          na3: function(){
            var n141a =  (parseFloat(this.n1) / parseFloat(this.n5) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n13);
            return this.f1(n141a);
          },
          na3e: function(){
            var n141a =  (parseFloat(this.n2) / parseFloat(this.n6) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n13w);
            return this.f1(n141a);
          },
          na4: function(){
            var n141a =  (parseFloat(this.n3) / parseFloat(this.n7) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n14);
            return this.f1(n141a);
          },
          na4e: function(){
            var n141a =  (parseFloat(this.n4) / parseFloat(this.n8) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n14w);
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
          na5e: function(){
            var n141a =  (parseFloat(this.n1e) / parseFloat(this.n5e) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n15e);
            return this.f1(n141a);
          },
          na6e: function(){
            var n141a =  (parseFloat(this.n2e) / parseFloat(this.n6e) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n16e);
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
          na7e: function(){
            var n141a =  (parseFloat(this.n3e) / parseFloat(this.n7e) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n17e);
            return this.f1(n141a);
          },
          na8e: function(){
            var n141a =  (parseFloat(this.n4e) / parseFloat(this.n8e) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n18e);
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
          na9e: function(){
           var n141a =  (parseFloat(this.n1e) / parseFloat(this.n5) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n19e);
           return this.f1(n141a);
         },
         na10e: function(){
           var n141a =  (parseFloat(this.n2e) / parseFloat(this.n6e) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n20e);
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
          na11e: function(){
            var n141a =  (parseFloat(this.n3e) / parseFloat(this.n7e) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n21e);
            return this.f1(n141a);
          },
          na12e: function(){
            var n141a =  (parseFloat(this.n4e) / parseFloat(this.n8e) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n22e);
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
          na13e: function(){
            var n141a =  ((parseFloat(this.n1e) / parseFloat(this.n5e) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n23e));
            return this.f1(n141a);
          },
          na14e: function(){
            var n141a =  ((parseFloat(this.n2e) / parseFloat(this.n6e) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n24e));
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
          na15e: function(){
            var n141a =  ((parseFloat(this.n3e) / parseFloat(this.n7e) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n25e));
            return this.f1(n141a);
          },
          na16e: function(){
            var n141a =  ((parseFloat(this.n4e) / parseFloat(this.n8e) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n26e));
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
          na17e: function(){
            var n141a =  (parseFloat(this.n1e) / parseFloat(this.n5e) * (parseFloat(this.n214)/ 100) + parseFloat(this.n213))* parseFloat(this.n27e);
            return this.f1(n141a);
          },
          na18e: function(){
            var n141a =  (parseFloat(this.n2e) / parseFloat(this.n6e) * (parseFloat(this.n214)/ 100) + parseFloat(this.n213))* parseFloat(this.n29e);
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
          na19e: function(){
            var n141a =  (parseFloat(this.n3e) / parseFloat(this.n7e) * (parseFloat(this.n214)/ 100) + parseFloat(this.n213))* parseFloat(this.n30e);
            return this.f1(n141a);
          },
          na20e: function(){
            var n141a =  (parseFloat(this.n4e) / parseFloat(this.n8e) * (parseFloat(this.n214)/ 100) + parseFloat(this.n213))* parseFloat(this.n31e);
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
          na21e: function(){
            var n141a =  (parseFloat(this.n1e) / parseFloat(this.n5e) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n32e);
            return this.f1(n141a);
          },
          na22e: function(){
            var n141a =  (parseFloat(this.n2e) / parseFloat(this.n6e) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n33e);
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
          na23e: function(){
            var n141a =  (parseFloat(this.n3e) / parseFloat(this.n7e) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n34e);
            return this.f1(n141a);
          },
          na24e: function(){
            var n141a =  (parseFloat(this.n4e) / parseFloat(this.n8e) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n35e);
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
              if (this.n2 == 0){
                return this.f1(na25a);
              }
              else {
                return this.f1(na25b);
              }
            }
          },
          na26: function() {
            var n141a =  (parseFloat(this.n2) / parseFloat(this.n6) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n37);
            return this.f1(n141a);
          },
          na25e: function() {
            var na25a = ((parseFloat(this.n1e) / parseFloat(this.n5e) * (parseFloat(this.n218) / 100) + parseFloat(this.n217))* parseFloat(this.n36e))
            var na25b = ((parseFloat(this.n1e) / parseFloat(this.n5e) * (parseFloat(this.n220) / 100) + parseFloat(this.n219)) * parseFloat(this.n36e))
            if (isNaN(na25a) || isNaN(na25b)){
              return 0;
            }
            else {
              if (this.n1e == 0){
                return na25a.toFixed(0) ||0;
              }
              else {
                return na25b.toFixed(0) ||0;
              }
            }
          },
          na26e: function() {
            var n141a =  (parseFloat(this.n2e) / parseFloat(this.n6e) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n37e);
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
              if (this.n3e == 0){
                return this.f1(na27a);
              }
              else {
                return this.f1(na27b);
              }
            }
          },
          na28: function() {
            var na27a = ((parseFloat(this.n4) / parseFloat(this.n8) * (0 / 100) + parseFloat(this.n217))* parseFloat(this.n39));
            var na27b = ((parseFloat(this.n4) / parseFloat(this.n8) * (0 / 100) + parseFloat(this.n219)) * parseFloat(this.n39));

            if (isNaN(na27a) || isNaN(na27b)){
              return 0;
            }
            else {
              if (this.n3e == 0){
                return this.f1(na27a);
              }
              else {
                return this.f1(na27b);
              }
            }
          },
          na27e: function() {
            var anypack1 = ((parseFloat(this.n3e) / parseFloat(this.n7e) * (parseFloat(this.n218) / 100) + parseFloat(this.n217))* parseFloat(this.n38e));
            return this.f1(anypack1);
          },
          na28e: function() {
            var n141a =  (parseFloat(this.n4e) / parseFloat(this.n8e) * (parseFloat(this.n218)/ 100) + parseFloat(this.n217))* parseFloat(this.n39e);
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
          na29e:function(){
            var anypack1 = (parseFloat(this.n1e) / parseFloat(this.n5e) * (parseFloat(this.n222) / 100) + parseFloat(this.n221));
            return this.f1(anypack1);
          },
          na30e:function(){
            var anypack2 = (parseFloat(this.n2e) / parseFloat(this.n6e) * (parseFloat(this.n222) / 100) + parseFloat(this.n221));
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
          na31e:function(){
            var anypack3 = (parseFloat(this.n3e) / parseFloat(this.n7e) * (parseFloat(this.n222) / 100) + parseFloat(this.n221));
            return this.f1(anypack3);
          },
          na32e:function(){
            var anypack4 = (parseFloat(this.n4e) / parseFloat(this.n8e) * (parseFloat(this.n222) / 100) + parseFloat(this.n221));
            return this.f1(anypack4);
          },

          waste1:function(){
            var np = (parseFloat(this.na1) + parseFloat(this.na3) + parseFloat(this.na5) + parseFloat(this.na9) + parseFloat(this.na13 )+ parseFloat(this.na17) + parseFloat(this.na21) + parseFloat(this.na25) + parseFloat(this.na29));
            var nx = np.toString();
            var last1=nx.substr(- 1); //Get 1 character
            var last2 = nx.substr(-2);
            var nxx = nx.substr(0, nx.length-2);
            if (last1 < 5)
            {
              a = last2 - last1;

            }
            if(last1 > 5) {
              a = last2 - last1 + 10;
            }

            return (nxx+a);
          },
          waste2:function () {
            if (this.waste1 == 0)
            {
              return 0;
            }
            else {
              var np = parseFloat(this.n1) / parseFloat(this.n5) + parseFloat(this.waste1) - parseFloat(this.na1);
              var nx = np.toString();
              var last1=nx.substr(- 1); //Get 1 character
              var last2 = nx.substr(-2);
              var nxx = nx.substr(0, nx.length-2);
              if (last1 < 5)
              {
                a = last2 - last1;

              }
              if(last1 > 5) {
                a = last2 - last1 + 10;
              }

              return (nxx+a);
            }
          },
          waste3: function() {
            if (this.waste1 == 0)
            {
              return 0;
            }
            else {
              var np = ((parseFloat(this.n1) / parseFloat(this.n5)) + parseFloat(this.waste1)) ;
              var nx = np.toString();
              var last1=nx.substr(- 1); //Get 1 character
              var last2 = nx.substr(-2);
              var nxx = nx.substr(0, nx.length-2);
              if (last1 < 5)
              {
                a = last2 - last1;

              }
              if(last1 > 5) {
                a = last2 - last1 + 10;
              }

              return (nxx+a);
            }
          },

          waste11:function(){
            var np = (parseFloat(this.na1e) + parseFloat(this.na3e) + parseFloat(this.na5e) + parseFloat(this.na9e) + parseFloat(this.na13e )+ parseFloat(this.na17e) + parseFloat(this.na21e) + parseFloat(this.na25e) + parseFloat(this.na29e));
            var nx = np.toString();
            var last1=nx.substr(- 1); //Get 1 character
            var last2 = nx.substr(-2);
            var nxx = nx.substr(0, nx.length-2);
            if (last1 < 5)
            {
              a = last2 - last1;

            }
            if(last1 > 5) {
              a = last2 - last1 + 10;
            }

            return (nxx+a);
          },
          waste21:function () {
            if (this.waste11 == 0)
            {
              return 0;
            }
            else {
              var np = parseFloat(this.n1e) / parseFloat(this.n5e) + parseFloat(this.waste11) - parseFloat(this.na1e);
              var nx = np.toString();
              var last1=nx.substr(- 1); //Get 1 character
              var last2 = nx.substr(-2);
              var nxx = nx.substr(0, nx.length-2);
              if (last1 < 5)
              {
                a = last2 - last1;

              }
              if(last1 > 5) {
                a = last2 - last1 + 10;
              }

              return (nxx+a);
            }
          },
          waste31: function() {
            if (this.waste11 == 0)
            {
              return 0;
            }
            else {
              var np = ((parseFloat(this.n1e) / parseFloat(this.n5e)) + parseFloat(this.waste11)) ;
              var nx = np.toString();
              var last1=nx.substr(- 1); //Get 1 character
              var last2 = nx.substr(-2);
              var nxx = nx.substr(0, nx.length-2);
              if (last1 < 5)
              {
                a = last2 - last1;

              }
              if(last1 > 5) {
                a = last2 - last1 + 10;
              }

              return (nxx+a);
            }
          },
          waste4:function() {
            var np = (parseFloat(this.na2) + parseFloat(this.na4) + parseFloat(this.na7) + parseFloat(this.na11) + parseFloat(this.na15) + parseFloat(this.na19) + parseFloat(this.na23) + parseFloat(this.na27) + parseFloat(this.na31));
            var nx = np.toString();
            var last1=nx.substr(- 1); //Get 1 character
            var last2 = nx.substr(-2);
            var nxx = nx.substr(0, nx.length-2);
            if (last1 < 5)
            {
              a = last2 - last1;

            }
            if(last1 > 5) {
              a = last2 - last1 + 10;
            }

            return (nxx+a);
          },
          waste5:function() {
            if (this.waste4 == 0)
            {
              return 0;
            }
            else {
              var np = ((parseFloat(this.n3) / parseFloat(this.n7)) + parseFloat(this.waste4) - parseFloat(this.na2));
              var nx = np.toString();
              var last1=nx.substr(- 1); //Get 1 character
              var last2 = nx.substr(-2);
              var nxx = nx.substr(0, nx.length-2);
              if (last1 < 5)
              {
                a = last2 - last1;

              }
              if(last1 > 5) {
                a = last2 - last1 + 10;
              }

              return (nxx+a);
            }
          },
          waste6: function() {
            if (this.waste4 == 0)
            {
              return 0;
            }
            else {
              var np = ((parseFloat(this.n3) / parseFloat(this.n7)) + parseFloat(this.waste4));
              var nx = np.toString();
              var last1=nx.substr(- 1); //Get 1 character
              var last2 = nx.substr(-2);
              var nxx = nx.substr(0, nx.length-2);
              if (last1 < 5)
              {
                a = last2 - last1;

              }
              if(last1 > 5) {
                a = last2 - last1 + 10;
              }

              return (nxx+a);
            }
          },
          waste41:function() {
            var np = (parseFloat(this.na2e) + parseFloat(this.na4e) + parseFloat(this.na7e) + parseFloat(this.na11e) + parseFloat(this.na15e) + parseFloat(this.na19e) + parseFloat(this.na23e) + parseFloat(this.na27e) + parseFloat(this.na31e));
            var nx = np.toString();
            var last1=nx.substr(- 1); //Get 1 character
            var last2 = nx.substr(-2);
            var nxx = nx.substr(0, nx.length-2);
            if (last1 < 5)
            {
              a = last2 - last1;

            }
            if(last1 > 5) {
              a = last2 - last1 + 10;
            }

            return (nxx+a);
          },
          waste51:function() {
            if (this.waste41 == 0)
            {
              return 0;
            }
            else {
              var np = ((parseFloat(this.n3e) / parseFloat(this.n7e)) + parseFloat(this.waste41) - parseFloat(this.na2e));
              var nx = np.toString();
              var last1=nx.substr(- 1); //Get 1 character
              var last2 = nx.substr(-2);
              var nxx = nx.substr(0, nx.length-2);
              if (last1 < 5)
              {
                a = last2 - last1;

              }
              if(last1 > 5) {
                a = last2 - last1 + 10;
              }

              return (nxx+a);
            }
          },
          waste61: function() {
            if (this.waste41 == 0)
            {
              return 0;
            }
            else {
              var np = ((parseFloat(this.n3e) / parseFloat(this.n7e)) + parseFloat(this.waste41));
              var nx = np.toString();
              var last1=nx.substr(- 1); //Get 1 character
              var last2 = nx.substr(-2);
              var nxx = nx.substr(0, nx.length-2);
              if (last1 < 5)
              {
                a = last2 - last1;

              }
              if(last1 > 5) {
                a = last2 - last1 + 10;
              }

              return (nxx+a);
            }
          },
          waste7: function(){
            var np = ((parseFloat(this.na10) + parseFloat(this.na14 )+ parseFloat(this.na18) + parseFloat(this.na22) + parseFloat(this.na26) + parseFloat(this.na30)) + (2.5 / 100) * parseFloat(this.n2) );
            var nx = np.toString();
            var last1=nx.substr(- 1); //Get 1 character
            var last2 = nx.substr(-2);
            var nxx = nx.substr(0, nx.length-2);
            if (last1 < 5)
            {
              a = last2 - last1;

            }
            if(last1 > 5) {
              a = last2 - last1 + 10;
            }

            return (nxx+a);
          },
          waste8: function () {
            if (this.waste7 == 0)
            {
              return 0;
            }
            else {
              var np = ((parseFloat(this.n2) / parseFloat(this.n6)) + parseFloat(this.waste7));
              var nx = np.toString();
              var last1=nx.substr(- 1); //Get 1 character
              var last2 = nx.substr(-2);
              var nxx = nx.substr(0, nx.length-2);
              if (last1 < 5)
              {
                a = last2 - last1;

              }
              if(last1 > 5) {
                a = last2 - last1 + 10;
              }

              return (nxx+a);
            }
          },
          waste9: function () {

            var np = (parseFloat(this.na12) + parseFloat(this.na16) + parseFloat(this.na20) + parseFloat(this.na24) + parseFloat(this.na28) + parseFloat(this.na32));
            var nx = np.toString();
            var last1=nx.substr(- 1); //Get 1 character
            var last2 = nx.substr(-2);
            var nxx = nx.substr(0, nx.length-2);
            if (last1 < 5)
            {
              a = last2 - last1;

            }
            if(last1 > 5) {
              a = last2 - last1 + 10;
            }

            return (nxx+a);
          },
          waste10: function () {
            if (this.waste9 == 0)
            {
              return 0;
            }
            else {
              var np = ((parseFloat(this.n4) / parseFloat(this.n8)) + parseFloat(this.waste9));
              var nx = np.toString();
              var last1=nx.substr(- 1); //Get 1 character
              var last2 = nx.substr(-2);
              var nxx = nx.substr(0, nx.length-2);
              if (last1 < 5)
              {
                a = last2 - last1;

              }
              if(last1 > 5) {
                a = last2 - last1 + 10;
              }

              return (nxx+a);
            }
          },
          waste71: function(){
            var np = ((parseFloat(this.na10e) + parseFloat(this.na14e )+ parseFloat(this.na18e) + parseFloat(this.na22e) + parseFloat(this.na26e) + parseFloat(this.na30e)) + (2.5 / 100) * parseFloat(this.n2e) );
            var nx = np.toString();
            var last1=nx.substr(- 1); //Get 1 character
            var last2 = nx.substr(-2);
            var nxx = nx.substr(0, nx.length-2);
            if (last1 < 5)
            {
              a = last2 - last1;

            }
            if(last1 > 5) {
              a = last2 - last1 + 10;
            }

            return (nxx+a);
          },
          waste81: function () {
            if (this.waste71 == 0)
            {
              return 0;
            }
            else {
              var np = ((parseFloat(this.n2e) / parseFloat(this.n6e)) + parseFloat(this.waste71));
              var nx = np.toString();
              var last1=nx.substr(- 1); //Get 1 character
              var last2 = nx.substr(-2);
              var nxx = nx.substr(0, nx.length-2);
              if (last1 < 5)
              {
                a = last2 - last1;

              }
              if(last1 > 5) {
                a = last2 - last1 + 10;
              }

              return (nxx+a);
            }
          },
          waste91: function () {
            var np = (parseFloat(this.na12e) + parseFloat(this.na16e) + parseFloat(this.na20e) + parseFloat(this.na24e) + parseFloat(this.na28e) + parseFloat(this.na32e));
            var nx = np.toString();
            var last1=nx.substr(- 1); //Get 1 character
            var last2 = nx.substr(-2);
            var nxx = nx.substr(0, nx.length-2);
            if (last1 < 5)
            {
              a = last2 - last1;

            }
            if(last1 > 5) {
              a = last2 - last1 + 10;
            }

            return (nxx+a);
          },
          waste101: function () {
            if (this.waste91 == 0)
            {
              return 0;
            }
              else {
              var np = ((parseFloat(this.n4e) / parseFloat(this.n8e)) + parseFloat(this.waste91));
              var nx = np.toString();
              var last1=nx.substr(- 1); //Get 1 character
              var last2 = nx.substr(-2);
              var nxx = nx.substr(0, nx.length-2);
              if (last1 < 5)
              {
                a = last2 - last1;

              }
              if(last1 > 5) {
                a = last2 - last1 + 10;
              }

              return (nxx+a);
            }
          },
          some3:function() {
            var np = ((parseFloat(this.some1) * (parseFloat(this.some2)/100)) + parseFloat(this.some1));
            return this.f1(np);
          },

          some31:function() {
            var np = ((parseFloat(this.some11) * (parseFloat(this.some21)/100)) + parseFloat(this.some11));
            return this.f1(np);
          },
          some5: function() {
            if (this.some4 == 0){
              return 0;
            }
            else{
              var np =  ((parseFloat(this.some1) * (parseFloat(this.some4)/100)) + parseFloat(this.some1));
              return this.f1(np);
            }

          },
          some8:function () {
            var np =  ((parseFloat(this.some6) * (parseFloat(this.some7)/100)) - parseFloat(this.some6));
            return this.f1(np);
          },

        }
    });
</script>

@endsection
