@extends('frontend.layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/planning.css') }}" />
@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
    <h3>Soft Cover of Overseas(W and Turn)</h3><small>(For colour and flexi job)</small>
<div class="row col-md-12 " id="app">
  {!! Form::model($overseaswt, array('route' => array('frontend.plan.softcoveroverseawtStore', $overseaswt->id), 'method' => 'POST')) !!}
  <div class="col-md-8">
    <table class="table table-bordered" id="users-table">
      <thead>
          <tr>
            <th>{!! Form::number('none1', $overseaswt->none1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n1000a', 'v-model'=>'n1000a')) !!}</th>
          </tr>
          <tr>
            <th>1/4</th>
            <th>Color</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Flexi Job</th>

          </tr>
          <tr>
            <th></th>
            <th>Cover </th>
            <th>number1</th>
            <th>number2</th>
            <th>number3</th>
            <th>Sticker</th>
            <th>Flexi</th>

          </tr>

      </thead>
      <tbody>
        <tr>
          <td>P. Order Qty</td>
          <td>{!! Form::number('covOrderC', $overseaswt->covOrderC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n1', 'v-model'=>"n1")) !!}</td>
          <td>{!! Form::number('t1OrderC', $overseaswt->t1OrderC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2', 'v-model'=>"n2")) !!}</td>
          <td>{!! Form::number('t2OrderC', $overseaswt->t2OrderC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n3', 'v-model'=>"n3")) !!}</td>
          <td>{!! Form::number('t3OrderC', $overseaswt->t3OrderC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n4', 'v-model'=>"n4")) !!}</td>
          <td>{!! Form::number('statOrderC', $overseaswt->statOrderC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n5', 'v-model'=>"n5")) !!}</td>
          <td>{!! Form::number('flexiOrderC', $overseaswt->flexiOrderC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>

        </tr>
        <tr>
          <td>Up(s) per sheet</td>
          <td>{!! Form::number('covUpC', $overseaswt->covUpC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n11', 'v-model'=>"n11")) !!}</td>
          <td>{!! Form::number('t1UpC', $overseaswt->t1UpC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n12', 'v-model'=>"n12")) !!}</td>
          <td>{!! Form::number('t2UpC', $overseaswt->t2UpC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n13', 'v-model'=>"n13")) !!}</td>
          <td>{!! Form::number('t3UpC', $overseaswt->t3UpC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n14', 'v-model'=>"n14")) !!}</td>
          <td>{!! Form::number('statUpC', $overseaswt->statUpC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n15', 'v-model'=>"n15")) !!}</td>
          <td>{!! Form::number('flexiUpC', $overseaswt->flexiUpC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>

        </tr>
        <tr>
          <td>Signature/Spread(s)</td>
          <td>{!! Form::number('covSignC', $overseaswt->covSignC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n21', 'v-model'=>"n21")) !!}</td>
          <td>{!! Form::number('t1signC', $overseaswt->t1signC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n22', 'v-model'=>"n22")) !!}</td>
          <td>{!! Form::number('t2signC', $overseaswt->t2signC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n23', 'v-model'=>"n23")) !!}</td>
          <td>{!! Form::number('t3signC', $overseaswt->t3signC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n24', 'v-model'=>"n24")) !!}</td>
          <td>{!! Form::number('statSignC', $overseaswt->statSignC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n25', 'v-model'=>"n25")) !!}</td>
          <td>{!! Form::number('flexiSignC', $overseaswt->flexiSignC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>

        </tr>
        <tr>
          <td>Front Color</td>
          <td>{!! Form::number('covFrontC', $overseaswt->covFrontC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n31', 'v-model'=>"n31")) !!}</td>
          <td>{!! Form::number('t1FrontC', $overseaswt->t1FrontC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n32', 'v-model'=>"n32")) !!}</td>
          <td>{!! Form::number('t2FrontC', $overseaswt->t2FrontC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n33', 'v-model'=>"n33")) !!}</td>
          <td>{!! Form::number('t3FrontC', $overseaswt->t3FrontC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n34', 'v-model'=>"n34")) !!}</td>
          <td>{!! Form::number('statFrontC', $overseaswt->statFrontC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n35', 'v-model'=>"n35")) !!}</td>
          <td>{!! Form::number('flexiFrontC', $overseaswt->flexiFrontC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>

        </tr>
        <tr>
          <td>Back Color</td>
          <td>{!! Form::number('covBackC', $overseaswt->covBackC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n41', 'v-model'=>"n41")) !!}</td>
          <td>{!! Form::number('t1BackC', $overseaswt->t1BackC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n42', 'v-model'=>"n42")) !!}</td>
          <td>{!! Form::number('t2BackC', $overseaswt->t2BackC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n43', 'v-model'=>"n43")) !!}</td>
          <td>{!! Form::number('t3BackC', $overseaswt->t3BackC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n44', 'v-model'=>"n44")) !!}</td>
          <td>{!! Form::number('statBackC', $overseaswt->statBackC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n45', 'v-model'=>"n45")) !!}</td>
          <td>{!! Form::number('flexiBackC', $overseaswt->flexiBackC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n46', 'v-model'=>"n46")) !!}</td>

        </tr>
        <tr><td></td></tr>
        <tr>
          <td>Surface Finishing</td>
          <td>{!! Form::number('covSurfC', $overseaswt->covSurfC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n51', 'v-model'=>"n51")) !!}</td>
          <td>{!! Form::number('t1SurfC', $overseaswt->t1SurfC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n52', 'v-model'=>"n52")) !!}</td>
          <td>{!! Form::number('t2SurfC', $overseaswt->t2SurfC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n53', 'v-model'=>"n53")) !!}</td>
          <td>{!! Form::number('t3SurfC', $overseaswt->t3SurfC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n54', 'v-model'=>"n54")) !!}</td>
          <td>{!! Form::number('statSurfC', $overseaswt->statSurfC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n55', 'v-model'=>"n55")) !!}</td>
          <td>{!! Form::number('flexiSurfC', $overseaswt->flexiSurfC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n56', 'v-model'=>"n56")) !!}</td>

        </tr>
        <tr>
          <td>Trimming/Cutting</td>
          <td>{!! Form::number('covTrimC', $overseaswt->covTrimC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n61', 'v-model'=>"n61")) !!}</td>
          <td>{!! Form::number('t1TrimC', $overseaswt->t1TrimC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n62', 'v-model'=>"n62")) !!}</td>
          <td>{!! Form::number('t2TrimC', $overseaswt->t2TrimC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n63', 'v-model'=>"n63")) !!}</td>
          <td>{!! Form::number('t3TrimC', $overseaswt->t3TrimC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n64', 'v-model'=>"n64")) !!}</td>
          <td>{!! Form::number('statTrimC', $overseaswt->statTrimC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n65', 'v-model'=>"n65")) !!}</td>
          <td>{!! Form::number('flexiTrimC', $overseaswt->flexiTrimC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n66', 'v-model'=>"n66")) !!}</td>

        </tr>
        <tr>
          <td>Diecut</td>
          <td>{!! Form::number('covDieC', $overseaswt->covDieC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n71', 'v-model'=>"n71")) !!}</td>
          <td>{!! Form::number('t1DieC', $overseaswt->t1DieC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n72', 'v-model'=>"n72")) !!}</td>
          <td>{!! Form::number('t2DieC', $overseaswt->t2DieC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n73', 'v-model'=>"n73")) !!}</td>
          <td>{!! Form::number('t3DieC', $overseaswt->t3DieC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n74', 'v-model'=>"n74")) !!}</td>
          <td>{!! Form::number('statDieC', $overseaswt->statDieC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n75', 'v-model'=>"n75")) !!}</td>
          <td>{!! Form::number('flexiDieC', $overseaswt->flexiDieC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n76', 'v-model'=>"n76")) !!}</td>

        </tr>
        <tr>
          <td>Stripping</td>
          <td>{!! Form::number('covStripC', $overseaswt->covStripC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n81', 'v-model'=>"n81")) !!}</td>
          <td>{!! Form::number('t1StripC', $overseaswt->t1StripC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n82', 'v-model'=>"n82")) !!}</td>
          <td>{!! Form::number('t2StripC', $overseaswt->t2StripC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n83', 'v-model'=>"n83")) !!}</td>
          <td>{!! Form::number('t3stripC', $overseaswt->t3stripC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n84', 'v-model'=>"n84")) !!}</td>
          <td>{!! Form::number('statStripC', $overseaswt->statStripC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n85', 'v-model'=>"n85")) !!}</td>
          <td>{!! Form::number('flexiStripC', $overseaswt->flexiStripC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n86', 'v-model'=>"n86")) !!}</td>

        </tr>
        <tr>
          <td>Folding</td>
          <td>{!! Form::number('covFoldC', $overseaswt->covFoldC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n91', 'v-model'=>"n91")) !!}</td>
          <td>{!! Form::number('t1FoldC', $overseaswt->t1FoldC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n92', 'v-model'=>"n92")) !!}</td>
          <td>{!! Form::number('t2FoldC', $overseaswt->t2FoldC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n93', 'v-model'=>"n93")) !!}</td>
          <td>{!! Form::number('t3FoldC', $overseaswt->t3FoldC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n94', 'v-model'=>"n94")) !!}</td>
          <td>{!! Form::number('statFoldC', $overseaswt->statFoldC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n95', 'v-model'=>"n95")) !!}</td>
          <td>{!! Form::number('flexiFoldC', $overseaswt->flexiFoldC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n96', 'v-model'=>"n96")) !!}</td>

        </tr>
        <tr>
          <td>Sewing</td>
          <td>{!! Form::number('covSewC', $overseaswt->covSewC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n101', 'v-model'=>"n101")) !!}</td>
          <td>{!! Form::number('t1SewC', $overseaswt->t1SewC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n102', 'v-model'=>"n102")) !!}</td>
          <td>{!! Form::number('t2SewC', $overseaswt->t2SewC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n103', 'v-model'=>"n103")) !!}</td>
          <td>{!! Form::number('t3SewC', $overseaswt->t3SewC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n104', 'v-model'=>"n104")) !!}</td>
          <td>{!! Form::number('statSewC', $overseaswt->statSewC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n105', 'v-model'=>"n105")) !!}</td>
          <td>{!! Form::number('flexiSewC', $overseaswt->flexiSewC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n106', 'v-model'=>"n106")) !!}</td>

        </tr>
        <tr>
          <td>Binding</td>
          <td>{!! Form::number('covBindC', $overseaswt->covBindC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n111', 'v-model'=>"n111")) !!}</td>
          <td>{!! Form::number('t1BindC', $overseaswt->t1BindC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n112', 'v-model'=>"n112")) !!}</td>
          <td>{!! Form::number('t2BindC', $overseaswt->t2BindC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n113', 'v-model'=>"n113")) !!}</td>
          <td>{!! Form::number('t3BindC', $overseaswt->t3BindC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n114', 'v-model'=>"n114")) !!}</td>
          <td>{!! Form::number('statBindC', $overseaswt->statBindC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n115', 'v-model'=>"n115")) !!}</td>
          <td>{!! Form::number('flexiBindC', $overseaswt->flexiBindC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n116', 'v-model'=>"n116")) !!}</td>
        </tr>
        <tr>
          <td>3 Knife Trim</td>
          <td>{!! Form::number('cov3C', $overseaswt->cov3C, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n121', 'v-model'=>"n121")) !!}</td>
          <td>{!! Form::number('t13C', $overseaswt->t13C, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n122', 'v-model'=>"n122")) !!}</td>
          <td>{!! Form::number('t23C', $overseaswt->t23C, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n123', 'v-model'=>"n123")) !!}</td>
          <td>{!! Form::number('t33C', $overseaswt->t33C, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n124', 'v-model'=>"n124")) !!}</td>
          <td>{!! Form::number('stat3C', $overseaswt->stat3C, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n125', 'v-model'=>"n125")) !!}</td>
          <td>{!! Form::number('flexi3C', $overseaswt->flexi3C, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n126', 'v-model'=>"n126")) !!}</td>
        </tr>
        <tr><td></td></tr>
      </tbody>
      <thead>
          <tr>
            <th></th>
            <th>Color</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Flexi Job</th>
          </tr>
          <tr>
            <th></th>
            <th>Cover</th>
            <th>number1</th>
            <th>number2</th>
            <th>number3</th>
            <th>Sticker</th>
            <th>Flexi</th>

          </tr>
      </thead>
      <tbody>

        <tr>
          <td>Printing</td>
          <td>{!! Form::text('covPrintC1', $overseaswt->covPrintC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na131', 'v-model'=>"na131")) !!}</td>
          <td>{!! Form::text('t1PrintC1', $overseaswt->t1PrintC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na132', 'v-model'=>"na132")) !!}</td>
          <td>{!! Form::text('t2PrintC1', $overseaswt->t2PrintC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na133', 'v-model'=>"na133")) !!}</td>
          <td>{!! Form::text('t3PrintC1', $overseaswt->t3PrintC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na134', 'v-model'=>"na134")) !!}</td>
          <td>{!! Form::text('statPrintC1', $overseaswt->statPrintC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na135', 'v-model'=>"na135")) !!}</td>
          <td>{!! Form::text('flexiPrintC1', $overseaswt->flexiPrintC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na136', 'v-model'=>"na136")) !!}</td>
        </tr>
        <tr>
          <td>Surface Finishing</td>
          <td>{!! Form::text('covSurfC1', $overseaswt->covSurfC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na141', 'v-model'=>"na141")) !!}</td>
          <td>{!! Form::text('t1SurfC1', $overseaswt->t1SurfC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na142', 'v-model'=>"na142")) !!}</td>
          <td>{!! Form::text('t2SurfC1', $overseaswt->t2SurfC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na143', 'v-model'=>"na143")) !!}</td>
          <td>{!! Form::text('t3SurfC1', $overseaswt->t3SurfC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na144', 'v-model'=>"na144")) !!}</td>
          <td>{!! Form::text('statSurfC1', $overseaswt->statSurfC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na145', 'v-model'=>"na145")) !!}</td>
          <td>{!! Form::text('flexiSurfC1', $overseaswt->flexiSurfC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na146', 'v-model'=>"na146")) !!}</td>
        </tr>
        <tr>
          <td>Trimming/Cutting</td>
          <td>{!! Form::text('covTrimC1', $overseaswt->covTrimC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na151', 'v-model'=>"na151")) !!}</td>
          <td>{!! Form::text('t1TrimC1', $overseaswt->t1TrimC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na152', 'v-model'=>"na152")) !!}</td>
          <td>{!! Form::text('t2TrimC1', $overseaswt->t2TrimC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na153', 'v-model'=>"na153")) !!}</td>
          <td>{!! Form::text('t3TrimC1', $overseaswt->t3TrimC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na154', 'v-model'=>"na154")) !!}</td>
          <td>{!! Form::text('statTrimC1', $overseaswt->statTrimC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na155', 'v-model'=>"na155")) !!}</td>
          <td>{!! Form::text('flexiTrimC1', $overseaswt->flexiTrimC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na156', 'v-model'=>"na156")) !!}</td>
        </tr>
        <tr>
          <td>Diecut</td>
          <td>{!! Form::text('covDieC1', $overseaswt->covDieC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na161', 'v-model'=>"na161")) !!}</td>
          <td>{!! Form::text('t1DieC1', $overseaswt->t1DieC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na162', 'v-model'=>"na162")) !!}</td>
          <td>{!! Form::text('t2DieC1', $overseaswt->t2DieC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na163', 'v-model'=>"na163")) !!}</td>
          <td>{!! Form::text('t3DieC1', $overseaswt->t3DieC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na164', 'v-model'=>"na164")) !!}</td>
          <td>{!! Form::text('statDieC1', $overseaswt->statDieC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na165', 'v-model'=>"na165")) !!}</td>
          <td>{!! Form::text('flexiDieC1', $overseaswt->flexiDieC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na166', 'v-model'=>"na166")) !!}</td>
        <tr>
          <td>Stripping</td>
          <td>{!! Form::text('covStripC1', $overseaswt->covStripC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na171', 'v-model'=>"na171")) !!}</td>
          <td>{!! Form::text('t1StripC1', $overseaswt->t1StripC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na172', 'v-model'=>"na172")) !!}</td>
          <td>{!! Form::text('t2StripC1', $overseaswt->t2StripC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na173', 'v-model'=>"na173")) !!}</td>
          <td>{!! Form::text('t3stripC1', $overseaswt->t3stripC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na174', 'v-model'=>"na174")) !!}</td>
          <td>{!! Form::text('statStripC1', $overseaswt->statStripC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na175', 'v-model'=>"na175")) !!}</td>
          <td>{!! Form::text('flexiStripC1', $overseaswt->flexiStripC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na176', 'v-model'=>"na176")) !!}</td>
        </tr>
        <tr>
          <td>Folding</td>
          <td>{!! Form::text('covFoldC1', $overseaswt->covFoldC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na181', 'v-model'=>"na181")) !!}</td>
          <td>{!! Form::text('t1FoldC1', $overseaswt->t1FoldC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na182', 'v-model'=>"na182")) !!}</td>
          <td>{!! Form::text('t2FoldC1', $overseaswt->t2FoldC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na183', 'v-model'=>"na183")) !!}</td>
          <td>{!! Form::text('t3FoldC1', $overseaswt->t3FoldC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na184', 'v-model'=>"na184")) !!}</td>
          <td>{!! Form::text('statFoldC1', $overseaswt->statFoldC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na185', 'v-model'=>"na185")) !!}</td>
          <td>{!! Form::text('flexiFoldC1', $overseaswt->flexiFoldC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na186', 'v-model'=>"na186")) !!}</td>
        </tr>
        <tr>
          <td>Sewing</td>
          <td>{!! Form::text('covSewC1', $overseaswt->covSewC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na191', 'v-model'=>"na191")) !!}</td>
          <td>{!! Form::text('t1SewC1', $overseaswt->t1SewC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na192', 'v-model'=>"na192")) !!}</td>
          <td>{!! Form::text('t2SewC1', $overseaswt->t2SewC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na193', 'v-model'=>"na193")) !!}</td>
          <td>{!! Form::text('t3SewC1', $overseaswt->t3SewC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na194', 'v-model'=>"na194")) !!}</td>
          <td>{!! Form::text('statSewC1', $overseaswt->statSewC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na195', 'v-model'=>"na195")) !!}</td>
          <td>{!! Form::text('flexiSewC1', $overseaswt->flexiSewC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na196', 'v-model'=>"na196")) !!}</td>
        </tr>
        <tr>
          <td>Binding</td>
          <td>{!! Form::text('covBindC1', $overseaswt->covBindC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na201', 'v-model'=>"na201")) !!}</td>
          <td>{!! Form::text('t1BindC1', $overseaswt->t1BindC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na202', 'v-model'=>"na202")) !!}</td>
          <td>{!! Form::text('t2BindC1', $overseaswt->t2BindC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na203', 'v-model'=>"na203")) !!}</td>
          <td>{!! Form::text('t3BindC1', $overseaswt->t3BindC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na204', 'v-model'=>"na204")) !!}</td>
          <td>{!! Form::text('statBindC1', $overseaswt->statBindC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na205', 'v-model'=>"na205")) !!}</td>
          <td>{!! Form::text('flexiBindC1', $overseaswt->flexiBindC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na206', 'v-model'=>"na206")) !!}</td>
        </tr>
        <tr>
          <td>3 Knife Trim</td>
          <td>{!! Form::text('cov3C1', $overseaswt->cov3C1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na211', 'v-model'=>"na211")) !!}</td>
          <td>{!! Form::text('t13C1', $overseaswt->t13C1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na212', 'v-model'=>"na212")) !!}</td>
          <td>{!! Form::text('t23C1', $overseaswt->t23C1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na213', 'v-model'=>"na213")) !!}</td>
          <td>{!! Form::text('t33C1', $overseaswt->t33C1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na214', 'v-model'=>"na214")) !!}</td>
          <td>{!! Form::text('stat3C1', $overseaswt->stat3C1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na215', 'v-model'=>"na215")) !!}</td>
          <td>{!! Form::text('flexi3C1', $overseaswt->flexi3C1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na216', 'v-model'=>"na216")) !!}</td>
        </tr><tr>
          <td>Packing</td>
          <td>{!! Form::text('covPackC1', $overseaswt->covPackC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na221', 'v-model'=>"na221")) !!}</td>
          <td>{!! Form::text('t1PackC1', $overseaswt->t1PackC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na222', 'v-model'=>"na222")) !!}</td>
          <td>{!! Form::text('t2PackC1', $overseaswt->t2PackC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na223', 'v-model'=>"na223")) !!}</td>
          <td>{!! Form::text('t3PackC1', $overseaswt->t3PackC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na224', 'v-model'=>"na224")) !!}</td>
          <td>{!! Form::text('statPackC1', $overseaswt->statPackC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na225', 'v-model'=>"na225")) !!}</td>
          <td>{!! Form::text('flexiPackC1', $overseaswt->flexiPackC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na226', 'v-model'=>"na226")) !!}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row col-md-4">
    <table class="table table-bordered">
        <tr>
          <td colspan="3">Paper+wastage qty </td>
          <td>Required qty</td>
          <td>Paper Supply</td>

        </tr>
        <tr>
          <td>Cover</td >
          <td>{!! Form::text('ccover', $overseaswt->ccover, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3000', 'v-model'=>"n3000")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ccoverready', $overseaswt->ccoverready, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3001', 'v-model'=>"n3001")) !!}</td>
          <td>{!! Form::text('ccoverwaste', $overseaswt->ccoverwaste, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3002', 'v-model'=>"n3002")) !!}</td>

        </tr>
        <tr>
          <td>Flexi</td>
          <td>{!! Form::text('flexicover', $overseaswt->flexicover, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3003', 'v-model'=>"n3003")) !!}</td>
          <td>Flexi Job</td>
          <td>{!! Form::text('flexicoverready', $overseaswt->flexicoverready, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3004', 'v-model'=>"n3004")) !!}</td>
          <td>{!! Form::text('flexicoverwaste', $overseaswt->flexicoverwaste, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3005', 'v-model'=>"n3005")) !!}</td>
        </tr>

        <tr>
          <td>Text 1</td>
          <td>{!! Form::text('ct1', $overseaswt->ct1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3006', 'v-model'=>"n3006")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct1ready', $overseaswt->ct1ready, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3007', 'v-model'=>"n3007")) !!}</td>
          <td>{!! Form::text('ct1waste', $overseaswt->ct1waste, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3008', 'v-model'=>"n3008")) !!}</td>
        </tr>
        <tr>
          <td>Text 2</td>
          <td>{!! Form::text('ct2', $overseaswt->ct2, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3009', 'v-model'=>"n3009")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct2ready', $overseaswt->ct2ready, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3010', 'v-model'=>"n3010")) !!}</td>
          <td>{!! Form::text('ct2waste', $overseaswt->ct2waste, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3011', 'v-model'=>"n3011")) !!}</td>
        </tr>
        <tr>
          <td>Text 3</td>
          <td>{!! Form::text('ct3', $overseaswt->ct3, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3012', 'v-model'=>"n3012")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct3ready', $overseaswt->ct3ready, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3013', 'v-model'=>"n3013")) !!}</td>
          <td>{!! Form::text('ct3waste', $overseaswt->ct3waste, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3014', 'v-model'=>"n3014")) !!}</td>
        </tr>
        <tr>
          <td>Stickers</td>
          <td>{!! Form::text('csticker', $overseaswt->csticker, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3015', 'v-model'=>"n3015")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('cstickerready', $overseaswt->cstickerready, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3016', 'v-model'=>"n3016")) !!}</td>
          <td>{!! Form::text('cstickerwaste', $overseaswt->cstickerwaste, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3017', 'v-model'=>"n3017")) !!}</td>
        </tr>
    </table>
    <table class="table table-bordered">
      <tr>
        <td colspan="2"></td>
        <td>Make Ready</td>
        <td>Waste %</td>
      </tr>
      <tr>
        <td colspan="2">Surface Finishing</td>
        <td>{!! Form::number('surfMake', $overseaswt->surfMake, array('class' => 'form-control', 'readonly'=>true ,'min'=>'0', 'id'=>'ma1', 'v-model'=>"ma1")) !!}</td>
        <td>{!! Form::number('surfWaste', $overseaswt->surfWaste, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'min'=>'0', 'id'=>'ma2', 'v-model'=>"ma2")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Trimming/Cutting</td>
        <td>{!! Form::number('trimMake', $overseaswt->trimMake, array('class' => 'form-control', 'readonly'=>true ,'min'=>'0', 'id'=>'ma3', 'v-model'=>"ma3")) !!}</td>
        <td>{!! Form::number('trimWaste', $overseaswt->trimWaste, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'min'=>'0', 'id'=>'ma4', 'v-model'=>"ma4")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Diecut</td>
        <td>{!! Form::number('dieMake', $overseaswt->dieMake, array('class' => 'form-control', 'readonly'=>true ,'min'=>'0', 'id'=>'ma5', 'v-model'=>"ma5")) !!}</td>
        <td>{!! Form::number('dieWaste', $overseaswt->dieWaste, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'min'=>'0', 'id'=>'ma6', 'v-model'=>"ma6")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Stripping</td>
        <td>{!! Form::number('stripMake', $overseaswt->stripMake, array('class' => 'form-control', 'readonly'=>true ,'min'=>'0', 'id'=>'ma7', 'v-model'=>"ma7")) !!}</td>
        <td>{!! Form::number('stripWaste', $overseaswt->stripWaste, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'min'=>'0', 'id'=>'ma8', 'v-model'=>"ma8")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Folding</td>
        <td>{!! Form::number('foldMake', $overseaswt->foldMake, array('class' => 'form-control', 'readonly'=>true ,'min'=>'0', 'id'=>'ma9', 'v-model'=>"ma9")) !!}</td>
        <td>{!! Form::number('foldWaste', $overseaswt->foldWaste, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'min'=>'0', 'id'=>'ma10', 'v-model'=>"ma10")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Sewing</td>
        <td>{!! Form::number('sewMake', $overseaswt->sewMake, array('class' => 'form-control', 'readonly'=>true , 'id'=>'ma11', 'v-model'=>"ma11")) !!}</td>
        <td>{!! Form::number('sewWaste', $overseaswt->sewWaste, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any",  'id'=>'ma12', 'v-model'=>"ma12")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Binding</td>
        <td>{!! Form::number('bindMake', $overseaswt->bindMake, array('class' => 'form-control', 'readonly'=>true ,'min'=>'0', 'id'=>'ma13', 'v-model'=>"ma13")) !!}</td>
        <td>{!! Form::number('bindWaste', $overseaswt->bindWaste, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'min'=>'0', 'id'=>'ma14', 'v-model'=>"ma14")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">3 Knife Trim</td>
        <td>{!! Form::number('threeMake', $overseaswt->threeMake, array('class' => 'form-control', 'readonly'=>true ,'min'=>'0', 'id'=>'ma15', 'v-model'=>"ma15")) !!}</td>
        <td>{!! Form::number('threeWaste', $overseaswt->threeWaste, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'min'=>'0', 'id'=>'ma16', 'v-model'=>"ma16")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Packing</td>
        <td>{!! Form::number('PackMake', $overseaswt->PackMake, array('class' => 'form-control', 'readonly'=>true ,'min'=>'0', 'id'=>'ma17', 'v-model'=>"ma17")) !!}</td>
        <td>{!! Form::number('packWaste', $overseaswt->packWaste, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'min'=>'0', 'id'=>'ma18', 'v-model'=>"ma18")) !!}</td>
      </tr>
    </table>
    </div>

    <div class="row col-md-4">
      <table class="table table-bordered">
        <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFront', $overseaswt->colMakeFront, array('class' => 'form-control', 'readonly'=>true ,'min'=>'0', 'id'=>'col1', 'v-model'=>"col1")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Make ready per color - Back </td>
          <td>{!! Form::number('colMakeBack', $overseaswt->colMakeBack, array('class' => 'form-control', 'readonly'=>true ,'min'=>'0', 'id'=>'col2', 'v-model'=>"col2")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Waste % </td>
          <td>{!! Form::number('colWaste', $overseaswt->colWaste, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'col3', 'v-model'=>"col3")) !!}</td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFront1', $overseaswt->colMakeFront1, array('class' => 'form-control', 'readonly'=>true ,'min'=>'0', 'id'=>'col6', 'v-model'=>"col6")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Make ready per color - Back </td>
          <td>{!! Form::number('colMakeBack1', $overseaswt->colMakeBack1, array('class' => 'form-control', 'readonly'=>true ,'min'=>'0', 'id'=>'col7', 'v-model'=>"col7")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Waste % </td>
          <td>{!! Form::number('colWaste1', $overseaswt->colWaste1, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'col8', 'v-model'=>"col8")) !!}</td>
        </tr>
      </table>

      <table class="table table-bordered">
        <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFront2', $overseaswt->colMakeFront2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0','id'=>'col11', 'v-model'=>"col11")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Make ready per color - Back </td>
          <td>{!! Form::number('colMakeBack2', $overseaswt->colMakeBack2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'col12', 'v-model'=>"col12")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Waste % </td>
          <td>{!! Form::number('colWaste2', $overseaswt->colWaste2, array('class' => 'form-control', 'readonly'=>true , 'step'=>"any",'id'=>'col13', 'v-model'=>"col13")) !!}</td>
        </tr>
      </table>
      <table class="table table-bordered">
        <p>For Back Colour</p>
        <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFrontcovback', $overseaswt->colMakeFrontcovback, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0','id'=>'cover1', 'v-model'=>"cover1")) !!}</td>
        </tr>
      </table>
    </div>
    <div class="row col-md-12">
      <div class="row col-md-3">
        <table class="table table-bordered" >
          <tbody>
              <tr>
                <th>{!! Form::number('none2', $overseaswt->none2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n1000b', 'v-model'=>'n1000b')) !!}</th>
              <tr>
                <th></th>
                <th>Flexi</th>
              </tr>
              <tr>
                <td>P. Order Qty</td>
                <td>{!! Form::number('flexiOrderC2', $overseaswt->flexiOrderC2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na1', 'v-model'=>"na1")) !!}</td>

              </tr>
              <tr>
                <td>Up(s) per sheet</td>
                <td>{!! Form::number('flexiUpC2', $overseaswt->flexiUpC2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na2', 'v-model'=>"na2")) !!}</td>

              </tr>
              <tr>
                <td>Signature/Spread(s)</td>
                <td>{!! Form::number('flexiSignC2', $overseaswt->flexiSignC2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na3', 'v-model'=>"na3")) !!}</td>

              </tr>
              <tr>
                <td>Front Color</td>
                <td>{!! Form::number('flexiFrontC2', $overseaswt->flexiFrontC2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na4', 'v-model'=>"na4")) !!}</td>

              </tr>
              <tr>
                <td>Back Color</td>
                <td>{!! Form::number('flexiBackC2', $overseaswt->flexiBackC2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na5', 'v-model'=>"na5")) !!}</td>

              </tr>
              <tr><td></td></tr>
              <tr>
                <td>Surface Finishing</td>
                <td>{!! Form::number('flexiSurfC2', $overseaswt->flexiSurfC2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na6', 'v-model'=>"na6")) !!}</td>

              </tr>
              <tr>
                <td>Trimming/Cutting</td>
                <td>{!! Form::number('flexiTrimC2', $overseaswt->flexiTrimC2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na7', 'v-model'=>"na7")) !!}</td>

              </tr>
              <tr>
                <td>Diecut</td>
                <td>{!! Form::number('flexiDieC2', $overseaswt->flexiDieC2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na8', 'v-model'=>"na8")) !!}</td>

              </tr>
              <tr>
                <td>Stripping</td>
                <td>{!! Form::number('flexiStripC2', $overseaswt->flexiStripC2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na9', 'v-model'=>"na9")) !!}</td>

              </tr>
              <tr>
                <td>Folding</td>
                <td>{!! Form::number('flexiFoldC2', $overseaswt->flexiFoldC2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na10', 'v-model'=>"na10")) !!}</td>

              </tr>
              <tr>
                <td>Sewing</td>
                <td>{!! Form::number('flexiSewC2', $overseaswt->flexiSewC2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na11', 'v-model'=>"na11")) !!}</td>

              </tr>
              <tr>
                <td>Binding</td>
                <td>{!! Form::number('flexiBindC2', $overseaswt->flexiBindC2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na12', 'v-model'=>"na12")) !!}</td>
              </tr>
              <tr>
                <td>3 Knife Trim</td>
                <td>{!! Form::number('flexi3C2', $overseaswt->flexi3C2, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'na13', 'v-model'=>"na13")) !!}</td>
              </tr>
          </tbody>
        </table>
          </div>
          <div class="col-md-3">
            <table class="table table-bordered">
              <thead>
                  <tr>
                    <th></th>
                    <th>Flexi</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Printing</td>
                  <td>{!! Form::text('flexiPrintC3', $overseaswt->flexiPrintC3, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'naa1', 'v-model'=>"naa1")) !!}</td>
                </tr>
                <tr>
                  <td>Surface Finishing</td>
                  <td>{!! Form::text('flexiSurfC3', $overseaswt->flexiSurfC3, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'naa2', 'v-model'=>"naa2")) !!}</td>
                </tr>
                <tr>
                  <td>Trimming/Cutting</td>
                  <td>{!! Form::text('flexiTrimC3', $overseaswt->flexiTrimC3, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'naa3', 'v-model'=>"naa3")) !!}</td>
                </tr>
                <tr>
                  <td>Diecut</td>
                  <td>{!! Form::text('flexiDieC3', $overseaswt->flexiDieC3, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'naa4', 'v-model'=>"naa4")) !!}</td>
                <tr>
                  <td>Stripping</td>
                  <td>{!! Form::text('flexiStripC3', $overseaswt->flexiStripC3, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'naa5', 'v-model'=>"naa5")) !!}</td>
                </tr>
                <tr>
                  <td>Folding</td>
                  <td>{!! Form::text('flexiFoldC3', $overseaswt->flexiFoldC3, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'naa6', 'v-model'=>"naa6")) !!}</td>
                </tr>
                <tr>
                  <td>Sewing</td>
                  <td>{!! Form::text('flexiSewC3', $overseaswt->flexiSewC3, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'naa7', 'v-model'=>"naa7")) !!}</td>
                </tr>
                <tr>
                  <td>Binding</td>
                  <td>{!! Form::text('flexiBindC3', $overseaswt->flexiBindC3, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'naa8', 'v-model'=>"naa8")) !!}</td>
                </tr>
                <tr>
                  <td>3 Knife Trim</td>
                  <td>{!! Form::text('flexi3C3', $overseaswt->flexi3C3, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'naa9', 'v-model'=>"naa9")) !!}</td>
                </tr><tr>
                  <td>Packing</td>
                  <td>{!! Form::text('flexiPackC3', $overseaswt->flexiPackC3, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'naa10', 'v-model'=>"naa10")) !!}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row col-md-4">
            <table class="table table-bordered">
                <tr>
                  <td colspan="3">Paper+wastage qty </td>
                  <td>Required qty</td>
                  <td>Paper Supply</td>

                </tr>
                <tr>
                  <td>Flexi</td>
                  <td>{!! Form::text('flexicover1', $overseaswt->flexicover1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'na3003', 'v-model'=>"na3003")) !!}</td>
                  <td>Flexi Job</td>
                  <td>{!! Form::text('flexicoverready1', $overseaswt->flexicoverready1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'na3004', 'v-model'=>"na3004")) !!}</td>
                  <td>{!! Form::text('flexicoverwaste1', $overseaswt->flexicoverwaste1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'na3005', 'v-model'=>"na3005")) !!}</td>
                </tr>
            </table>

            <table class="table table-bordered">
              <tr>
                <td colspan="2"></td>
                <td>Make Ready</td>
                <td>Waste %</td>
              </tr>
              <tr>
                <td colspan="2">Surface Finishing</td>
                <td>{!! Form::number('surfMake1', $overseaswt->surfMake1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'ma19', 'v-model'=>"ma19")) !!}</td>
                <td>{!! Form::number('surfWaste1', $overseaswt->surfWaste1, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'ma20', 'v-model'=>"ma20")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Trimming/Cutting</td>
                <td>{!! Form::number('trimMake1', $overseaswt->trimMake1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'ma21', 'v-model'=>"ma21")) !!}</td>
                <td>{!! Form::number('trimWaste1', $overseaswt->trimWaste1, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'ma22', 'v-model'=>"ma22")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Diecut</td>
                <td>{!! Form::number('dieMake1', $overseaswt->dieMake1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'ma23', 'v-model'=>"ma23")) !!}</td>
                <td>{!! Form::number('dieWaste1', $overseaswt->dieWaste1, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'ma24', 'v-model'=>"ma24")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Stripping</td>
                <td>{!! Form::number('stripMake1', $overseaswt->stripMake1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'ma25', 'v-model'=>"ma25")) !!}</td>
                <td>{!! Form::number('stripWaste1', $overseaswt->stripWaste1, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'ma26', 'v-model'=>"ma26")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Folding</td>
                <td>{!! Form::number('foldMake1', $overseaswt->foldMake1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'ma27', 'v-model'=>"ma27")) !!}</td>
                <td>{!! Form::number('foldWaste1', $overseaswt->foldWaste1, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'ma28', 'v-model'=>"ma28")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Sewing</td>
                <td>{!! Form::number('sewMake1', $overseaswt->sewMake1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'ma29', 'v-model'=>"ma29")) !!}</td>
                <td>{!! Form::number('sewWaste1', $overseaswt->sewWaste1, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'ma30', 'v-model'=>"ma30")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Binding</td>
                <td>{!! Form::number('bindMake1', $overseaswt->bindMake1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'ma31', 'v-model'=>"ma31")) !!}</td>
                <td>{!! Form::number('bindWaste1', $overseaswt->bindWaste1, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'ma32', 'v-model'=>"ma32")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">3 Knife Trim</td>
                <td>{!! Form::number('threeMake1', $overseaswt->threeMake1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'ma33', 'v-model'=>"ma33")) !!}</td>
                <td>{!! Form::number('threeWaste1', $overseaswt->threeWaste1, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'ma34', 'v-model'=>"ma34")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Packing</td>
                <td>{!! Form::number('PackMake1', $overseaswt->PackMake1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'ma35', 'v-model'=>"ma35")) !!}</td>
                <td>{!! Form::number('packWaste1', $overseaswt->packWaste1, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'ma36', 'v-model'=>"ma36")) !!}</td>
              </tr>
            </table>
            </div>
            <div class="row col-md-3">
              <table class="table table-bordered">
                <tr>
                  <td colspan="2">(COL) Make ready per color - Front </td>
                  <td>{!! Form::number('colMakeFront3', $overseaswt->colMakeFront3, array('class' => 'form-control', 'readonly'=>true , 'id'=>'col16', 'v-model'=>"col16")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Make ready per color - Back </td>
                  <td>{!! Form::number('colMakeBack3', $overseaswt->colMakeBack3, array('class' => 'form-control', 'readonly'=>true , 'id'=>'col17', 'v-model'=>"col17")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Waste % </td>
                  <td>{!! Form::number('colWaste3', $overseaswt->colWaste3, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'col18', 'v-model'=>"col18")) !!}</td>
                </tr>
              </table>

              <table class="table table-bordered">
                <tr>
                  <td colspan="2">(COL) Make ready per color - Front </td>
                  <td>{!! Form::number('colMakeFront4', $overseaswt->colMakeFront4, array('class' => 'form-control', 'readonly'=>true , 'id'=>'col21', 'v-model'=>"col21")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Make ready per color - Back </td>
                  <td>{!! Form::number('colMakeBack4', $overseaswt->colMakeBack4, array('class' => 'form-control', 'readonly'=>true , 'id'=>'col22', 'v-model'=>"col22")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Waste % </td>
                  <td>{!! Form::number('colWaste4', $overseaswt->colWaste4, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'col23', 'v-model'=>"col23")) !!}</td>
                </tr>
              </table>

              <table class="table table-bordered">
                <tr>
                  <td colspan="2">(COL) Make ready per color - Front </td>
                  <td>{!! Form::number('colMakeFront5', $overseaswt->colMakeFront5, array('class' => 'form-control', 'readonly'=>true , 'id'=>'col26', 'v-model'=>"col26")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Make ready per color - Back </td>
                  <td>{!! Form::number('colMakeBack5', $overseaswt->colMakeBack5, array('class' => 'form-control', 'readonly'=>true , 'id'=>'col27', 'v-model'=>"col27")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Waste % </td>
                  <td>{!! Form::number('colWaste5', $overseaswt->colWaste5, array('class' => 'form-control', 'readonly'=>true ,'step'=>"any", 'id'=>'col28', 'v-model'=>"col28")) !!}</td>
                </tr>
              </table>
              <table class="table table-bordered">
              <p>For Back Colour</p>
                <tr>
                  <td colspan="2">(COL) Make ready per color - Front </td>
                  <td>{!! Form::number('colMakeFrontcovback1', $overseaswt->colMakeFrontcovback1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0','id'=>'cover11', 'v-model'=>"cover11")) !!}</td>
                </tr>
              </table>
            </div>
        </div>
        <div class="form-group row">
        <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)">  </input>
      </div>
    {!! Form::close()!!}
</div> {{-- end of id app --}}

@endsection
