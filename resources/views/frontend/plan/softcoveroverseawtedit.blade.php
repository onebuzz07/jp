@extends('frontend.layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/planning.css') }}" />
@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
    <h3>Soft Cover of Overseas(W and Turn)</h3><small>(For colour and flexi job)</small>
<div class="row col-md-12 " id="app">
  {!! Form::model($sales, array('route' => array('frontend.plan.softcoveroverseawtupdate', $sales->id), 'method' => 'POST')) !!}
  <div class="col-md-8">
    <table class="table table-bordered" id="users-table">
      <thead>
          <tr>
            <th>{!! Form::number('none1', $overseaswt->none1, array('class' => 'form-control', 'min'=>'0', 'id'=>'n1000a', 'v-model'=>'n1000a', 'readonly'=>true)) !!}</th>
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
          <td>{!! Form::number('covOrderC', $overseaswt->covOrderC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n1', 'v-model'=>"n1")) !!}</td>
          <td>{!! Form::number('t1OrderC', $overseaswt->t1OrderC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n2', 'v-model'=>"n2")) !!}</td>
          <td>{!! Form::number('t2OrderC', $overseaswt->t2OrderC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n3', 'v-model'=>"n3")) !!}</td>
          <td>{!! Form::number('t3OrderC', $overseaswt->t3OrderC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n4', 'v-model'=>"n4")) !!}</td>
          <td>{!! Form::number('statOrderC', $overseaswt->statOrderC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n5', 'v-model'=>"n5")) !!}</td>
          <td>{!! Form::number('flexiOrderC', $overseaswt->flexiOrderC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>

        </tr>
        <tr>
          <td>Up(s) per sheet</td>
          <td>{!! Form::number('covUpC', $overseaswt->covUpC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n11', 'v-model'=>"n11")) !!}</td>
          <td>{!! Form::number('t1UpC', $overseaswt->t1UpC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n12', 'v-model'=>"n12")) !!}</td>
          <td>{!! Form::number('t2UpC', $overseaswt->t2UpC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n13', 'v-model'=>"n13")) !!}</td>
          <td>{!! Form::number('t3UpC', $overseaswt->t3UpC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n14', 'v-model'=>"n14")) !!}</td>
          <td>{!! Form::number('statUpC', $overseaswt->statUpC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n15', 'v-model'=>"n15")) !!}</td>
          <td>{!! Form::number('flexiUpC', $overseaswt->flexiUpC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>

        </tr>
        <tr>
          <td>Signature/Spread(s)</td>
          <td>{!! Form::number('covSignC', $overseaswt->covSignC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n21', 'v-model'=>"n21")) !!}</td>
          <td>{!! Form::number('t1signC', $overseaswt->t1signC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n22', 'v-model'=>"n22")) !!}</td>
          <td>{!! Form::number('t2signC', $overseaswt->t2signC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n23', 'v-model'=>"n23")) !!}</td>
          <td>{!! Form::number('t3signC', $overseaswt->t3signC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n24', 'v-model'=>"n24")) !!}</td>
          <td>{!! Form::number('statSignC', $overseaswt->statSignC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n25', 'v-model'=>"n25")) !!}</td>
          <td>{!! Form::number('flexiSignC', $overseaswt->flexiSignC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>

        </tr>
        <tr>
          <td>Front Color</td>
          <td>{!! Form::number('covFrontC', $overseaswt->covFrontC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n31', 'v-model'=>"n31")) !!}</td>
          <td>{!! Form::number('t1FrontC', $overseaswt->t1FrontC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n32', 'v-model'=>"n32")) !!}</td>
          <td>{!! Form::number('t2FrontC', $overseaswt->t2FrontC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n33', 'v-model'=>"n33")) !!}</td>
          <td>{!! Form::number('t3FrontC', $overseaswt->t3FrontC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n34', 'v-model'=>"n34")) !!}</td>
          <td>{!! Form::number('statFrontC', $overseaswt->statFrontC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n35', 'v-model'=>"n35")) !!}</td>
          <td>{!! Form::number('flexiFrontC', $overseaswt->flexiFrontC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>

        </tr>
        <tr>
          <td>Back Color</td>
          <td>{!! Form::number('covBackC', $overseaswt->covBackC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n41', 'v-model'=>"n41")) !!}</td>
          <td>{!! Form::number('t1BackC', $overseaswt->t1BackC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n42', 'v-model'=>"n42")) !!}</td>
          <td>{!! Form::number('t2BackC', $overseaswt->t2BackC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n43', 'v-model'=>"n43")) !!}</td>
          <td>{!! Form::number('t3BackC', $overseaswt->t3BackC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n44', 'v-model'=>"n44")) !!}</td>
          <td>{!! Form::number('statBackC', $overseaswt->statBackC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n45', 'v-model'=>"n45")) !!}</td>
          <td>{!! Form::number('flexiBackC', $overseaswt->flexiBackC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n46', 'v-model'=>"n46")) !!}</td>

        </tr>
        <tr><td></td></tr>
        <tr>
          <td>Surface Finishing</td>
          <td>{!! Form::number('covSurfC', $overseaswt->covSurfC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n51', 'v-model'=>"n51")) !!}</td>
          <td>{!! Form::number('t1SurfC', $overseaswt->t1SurfC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n52', 'v-model'=>"n52")) !!}</td>
          <td>{!! Form::number('t2SurfC', $overseaswt->t2SurfC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n53', 'v-model'=>"n53")) !!}</td>
          <td>{!! Form::number('t3SurfC', $overseaswt->t3SurfC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n54', 'v-model'=>"n54")) !!}</td>
          <td>{!! Form::number('statSurfC', $overseaswt->statSurfC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n55', 'v-model'=>"n55")) !!}</td>
          <td>{!! Form::number('flexiSurfC', $overseaswt->flexiSurfC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n56', 'v-model'=>"n56")) !!}</td>

        </tr>
        <tr>
          <td>Trimming/Cutting</td>
          <td>{!! Form::number('covTrimC', $overseaswt->covTrimC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n61', 'v-model'=>"n61")) !!}</td>
          <td>{!! Form::number('t1TrimC', $overseaswt->t1TrimC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n62', 'v-model'=>"n62")) !!}</td>
          <td>{!! Form::number('t2TrimC', $overseaswt->t2TrimC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n63', 'v-model'=>"n63")) !!}</td>
          <td>{!! Form::number('t3TrimC', $overseaswt->t3TrimC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n64', 'v-model'=>"n64")) !!}</td>
          <td>{!! Form::number('statTrimC', $overseaswt->statTrimC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n65', 'v-model'=>"n65")) !!}</td>
          <td>{!! Form::number('flexiTrimC', $overseaswt->flexiTrimC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n66', 'v-model'=>"n66")) !!}</td>

        </tr>
        <tr>
          <td>Diecut</td>
          <td>{!! Form::number('covDieC', $overseaswt->covDieC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n71', 'v-model'=>"n71")) !!}</td>
          <td>{!! Form::number('t1DieC', $overseaswt->t1DieC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n72', 'v-model'=>"n72")) !!}</td>
          <td>{!! Form::number('t2DieC', $overseaswt->t2DieC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n73', 'v-model'=>"n73")) !!}</td>
          <td>{!! Form::number('t3DieC', $overseaswt->t3DieC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n74', 'v-model'=>"n74")) !!}</td>
          <td>{!! Form::number('statDieC', $overseaswt->statDieC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n75', 'v-model'=>"n75")) !!}</td>
          <td>{!! Form::number('flexiDieC', $overseaswt->flexiDieC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n76', 'v-model'=>"n76")) !!}</td>

        </tr>
        <tr>
          <td>Stripping</td>
          <td>{!! Form::number('covStripC', $overseaswt->covStripC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n81', 'v-model'=>"n81")) !!}</td>
          <td>{!! Form::number('t1StripC', $overseaswt->t1StripC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n82', 'v-model'=>"n82")) !!}</td>
          <td>{!! Form::number('t2StripC', $overseaswt->t2StripC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n83', 'v-model'=>"n83")) !!}</td>
          <td>{!! Form::number('t3stripC', $overseaswt->t3stripC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n84', 'v-model'=>"n84")) !!}</td>
          <td>{!! Form::number('statStripC', $overseaswt->statStripC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n85', 'v-model'=>"n85")) !!}</td>
          <td>{!! Form::number('flexiStripC', $overseaswt->flexiStripC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n86', 'v-model'=>"n86")) !!}</td>

        </tr>
        <tr>
          <td>Folding</td>
          <td>{!! Form::number('covFoldC', $overseaswt->covFoldC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n91', 'v-model'=>"n91")) !!}</td>
          <td>{!! Form::number('t1FoldC', $overseaswt->t1FoldC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n92', 'v-model'=>"n92")) !!}</td>
          <td>{!! Form::number('t2FoldC', $overseaswt->t2FoldC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n93', 'v-model'=>"n93")) !!}</td>
          <td>{!! Form::number('t3FoldC', $overseaswt->t3FoldC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n94', 'v-model'=>"n94")) !!}</td>
          <td>{!! Form::number('statFoldC', $overseaswt->statFoldC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n95', 'v-model'=>"n95")) !!}</td>
          <td>{!! Form::number('flexiFoldC', $overseaswt->flexiFoldC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n96', 'v-model'=>"n96")) !!}</td>

        </tr>
        <tr>
          <td>Sewing</td>
          <td>{!! Form::number('covSewC', $overseaswt->covSewC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n101', 'v-model'=>"n101")) !!}</td>
          <td>{!! Form::number('t1SewC', $overseaswt->t1SewC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n102', 'v-model'=>"n102")) !!}</td>
          <td>{!! Form::number('t2SewC', $overseaswt->t2SewC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n103', 'v-model'=>"n103")) !!}</td>
          <td>{!! Form::number('t3SewC', $overseaswt->t3SewC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n104', 'v-model'=>"n104")) !!}</td>
          <td>{!! Form::number('statSewC', $overseaswt->statSewC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n105', 'v-model'=>"n105")) !!}</td>
          <td>{!! Form::number('flexiSewC', $overseaswt->flexiSewC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n106', 'v-model'=>"n106")) !!}</td>

        </tr>
        <tr>
          <td>Binding</td>
          <td>{!! Form::number('covBindC', $overseaswt->covBindC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n111', 'v-model'=>"n111")) !!}</td>
          <td>{!! Form::number('t1BindC', $overseaswt->t1BindC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n112', 'v-model'=>"n112")) !!}</td>
          <td>{!! Form::number('t2BindC', $overseaswt->t2BindC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n113', 'v-model'=>"n113")) !!}</td>
          <td>{!! Form::number('t3BindC', $overseaswt->t3BindC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n114', 'v-model'=>"n114")) !!}</td>
          <td>{!! Form::number('statBindC', $overseaswt->statBindC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n115', 'v-model'=>"n115")) !!}</td>
          <td>{!! Form::number('flexiBindC', $overseaswt->flexiBindC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n116', 'v-model'=>"n116")) !!}</td>
        </tr>
        <tr>
          <td>3 Knife Trim</td>
          <td>{!! Form::number('cov3C', $overseaswt->cov3C, array('class' => 'form-control', 'min'=>'0', 'id'=>'n121', 'v-model'=>"n121")) !!}</td>
          <td>{!! Form::number('t13C', $overseaswt->t13C, array('class' => 'form-control', 'min'=>'0', 'id'=>'n122', 'v-model'=>"n122")) !!}</td>
          <td>{!! Form::number('t23C', $overseaswt->t23C, array('class' => 'form-control', 'min'=>'0', 'id'=>'n123', 'v-model'=>"n123")) !!}</td>
          <td>{!! Form::number('t33C', $overseaswt->t33C, array('class' => 'form-control', 'min'=>'0', 'id'=>'n124', 'v-model'=>"n124")) !!}</td>
          <td>{!! Form::number('stat3C', $overseaswt->stat3C, array('class' => 'form-control', 'min'=>'0', 'id'=>'n125', 'v-model'=>"n125")) !!}</td>
          <td>{!! Form::number('flexi3C', $overseaswt->flexi3C, array('class' => 'form-control', 'min'=>'0', 'id'=>'n126', 'v-model'=>"n126")) !!}</td>
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
          <td>{!! Form::text('covPrintC1', $overseaswt->covPrintC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na131', 'v-model'=>"na131", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1PrintC1', $overseaswt->t1PrintC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na132', 'v-model'=>"na132", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2PrintC1', $overseaswt->t2PrintC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na133', 'v-model'=>"na133", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3PrintC1', $overseaswt->t3PrintC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na134', 'v-model'=>"na134", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statPrintC1', $overseaswt->statPrintC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na135', 'v-model'=>"na135", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiPrintC1', $overseaswt->flexiPrintC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na136', 'v-model'=>"na136", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Surface Finishing</td>
          <td>{!! Form::text('covSurfC1', $overseaswt->covSurfC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na141', 'v-model'=>"na141", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1SurfC1', $overseaswt->t1SurfC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na142', 'v-model'=>"na142", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2SurfC1', $overseaswt->t2SurfC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na143', 'v-model'=>"na143", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3SurfC1', $overseaswt->t3SurfC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na144', 'v-model'=>"na144", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statSurfC1', $overseaswt->statSurfC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na145', 'v-model'=>"na145", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiSurfC1', $overseaswt->flexiSurfC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na146', 'v-model'=>"na146", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Trimming/Cutting</td>
          <td>{!! Form::text('covTrimC1', $overseaswt->covTrimC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na151', 'v-model'=>"na151", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1TrimC1', $overseaswt->t1TrimC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na152', 'v-model'=>"na152", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2TrimC1', $overseaswt->t2TrimC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na153', 'v-model'=>"na153", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3TrimC1', $overseaswt->t3TrimC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na154', 'v-model'=>"na154", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statTrimC1', $overseaswt->statTrimC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na155', 'v-model'=>"na155", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiTrimC1', $overseaswt->flexiTrimC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na156', 'v-model'=>"na156", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Diecut</td>
          <td>{!! Form::text('covDieC1', $overseaswt->covDieC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na161', 'v-model'=>"na161", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1DieC1', $overseaswt->t1DieC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na162', 'v-model'=>"na162", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2DieC1', $overseaswt->t2DieC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na163', 'v-model'=>"na163", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3DieC1', $overseaswt->t3DieC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na164', 'v-model'=>"na164", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statDieC1', $overseaswt->statDieC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na165', 'v-model'=>"na165", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiDieC1', $overseaswt->flexiDieC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na166', 'v-model'=>"na166", 'readonly'=>true)) !!}</td>
        <tr>
          <td>Stripping</td>
          <td>{!! Form::text('covStripC1', $overseaswt->covStripC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na171', 'v-model'=>"na171", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1StripC1', $overseaswt->t1StripC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na172', 'v-model'=>"na172", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2StripC1', $overseaswt->t2StripC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na173', 'v-model'=>"na173", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3stripC1', $overseaswt->t3stripC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na174', 'v-model'=>"na174", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statStripC1', $overseaswt->statStripC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na175', 'v-model'=>"na175", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiStripC1', $overseaswt->flexiStripC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na176', 'v-model'=>"na176", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Folding</td>
          <td>{!! Form::text('covFoldC1', $overseaswt->covFoldC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na181', 'v-model'=>"na181", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1FoldC1', $overseaswt->t1FoldC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na182', 'v-model'=>"na182", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2FoldC1', $overseaswt->t2FoldC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na183', 'v-model'=>"na183", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3FoldC1', $overseaswt->t3FoldC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na184', 'v-model'=>"na184", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statFoldC1', $overseaswt->statFoldC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na185', 'v-model'=>"na185", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiFoldC1', $overseaswt->flexiFoldC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na186', 'v-model'=>"na186", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Sewing</td>
          <td>{!! Form::text('covSewC1', $overseaswt->covSewC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na191', 'v-model'=>"na191", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1SewC1', $overseaswt->t1SewC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na192', 'v-model'=>"na192", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2SewC1', $overseaswt->t2SewC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na193', 'v-model'=>"na193", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3SewC1', $overseaswt->t3SewC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na194', 'v-model'=>"na194", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statSewC1', $overseaswt->statSewC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na195', 'v-model'=>"na195", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiSewC1', $overseaswt->flexiSewC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na196', 'v-model'=>"na196", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Binding</td>
          <td>{!! Form::text('covBindC1', $overseaswt->covBindC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na201', 'v-model'=>"na201", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1BindC1', $overseaswt->t1BindC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na202', 'v-model'=>"na202", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2BindC1', $overseaswt->t2BindC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na203', 'v-model'=>"na203", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3BindC1', $overseaswt->t3BindC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na204', 'v-model'=>"na204", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statBindC1', $overseaswt->statBindC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na205', 'v-model'=>"na205", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiBindC1', $overseaswt->flexiBindC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na206', 'v-model'=>"na206", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>3 Knife Trim</td>
          <td>{!! Form::text('cov3C1', $overseaswt->cov3C1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na211', 'v-model'=>"na211", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t13C1', $overseaswt->t13C1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na212', 'v-model'=>"na212", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t23C1', $overseaswt->t23C1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na213', 'v-model'=>"na213", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t33C1', $overseaswt->t33C1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na214', 'v-model'=>"na214", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('stat3C1', $overseaswt->stat3C1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na215', 'v-model'=>"na215", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexi3C1', $overseaswt->flexi3C1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na216', 'v-model'=>"na216", 'readonly'=>true)) !!}</td>
        </tr><tr>
          <td>Packing</td>
          <td>{!! Form::text('covPackC1', $overseaswt->covPackC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na221', 'v-model'=>"na221", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1PackC1', $overseaswt->t1PackC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na222', 'v-model'=>"na222", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2PackC1', $overseaswt->t2PackC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na223', 'v-model'=>"na223", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3PackC1', $overseaswt->t3PackC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na224', 'v-model'=>"na224", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statPackC1', $overseaswt->statPackC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na225', 'v-model'=>"na225", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiPackC1', $overseaswt->flexiPackC1, array('class' => 'form-control', 'min'=>'0', 'id'=>'na226', 'v-model'=>"na226", 'readonly'=>true)) !!}</td>
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
          <td>{!! Form::text('ccover', $overseaswt->ccover, array('class' => 'form-control', 'id'=>'n3000', 'v-model'=>"n3000", 'readonly'=>true)) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ccoverready', $overseaswt->ccoverready, array('class' => 'form-control', 'id'=>'n3001', 'v-model'=>"n3001", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('ccoverwaste', $overseaswt->ccoverwaste, array('class' => 'form-control', 'id'=>'n3002', 'v-model'=>"n3002", 'readonly'=>true)) !!}</td>

        </tr>
        <tr>
          <td>Flexi</td>
          <td>{!! Form::text('flexicover', $overseaswt->flexicover, array('class' => 'form-control', 'id'=>'n3003', 'v-model'=>"n3003", 'readonly'=>true)) !!}</td>
          <td>Flexi Job</td>
          <td>{!! Form::text('flexicoverready', $overseaswt->flexicoverready, array('class' => 'form-control', 'id'=>'n3004', 'v-model'=>"n3004", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexicoverwaste', $overseaswt->flexicoverwaste, array('class' => 'form-control', 'id'=>'n3005', 'v-model'=>"n3005", 'readonly'=>true)) !!}</td>
        </tr>

        <tr>
          <td>Text 1</td>
          <td>{!! Form::text('ct1', $overseaswt->ct1, array('class' => 'form-control', 'id'=>'n3006', 'v-model'=>"n3006", 'readonly'=>true)) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct1ready', $overseaswt->ct1ready, array('class' => 'form-control', 'id'=>'n3007', 'v-model'=>"n3007", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('ct1waste', $overseaswt->ct1waste, array('class' => 'form-control', 'id'=>'n3008', 'v-model'=>"n3008", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Text 2</td>
          <td>{!! Form::text('ct2', $overseaswt->ct2, array('class' => 'form-control', 'id'=>'n3009', 'v-model'=>"n3009", 'readonly'=>true)) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct2ready', $overseaswt->ct2ready, array('class' => 'form-control', 'id'=>'n3010', 'v-model'=>"n3010", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('ct2waste', $overseaswt->ct2waste, array('class' => 'form-control', 'id'=>'n3011', 'v-model'=>"n3011", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Text 3</td>
          <td>{!! Form::text('ct3', $overseaswt->ct3, array('class' => 'form-control', 'id'=>'n3012', 'v-model'=>"n3012", 'readonly'=>true)) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct3ready', $overseaswt->ct3ready, array('class' => 'form-control', 'id'=>'n3013', 'v-model'=>"n3013", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('ct3waste', $overseaswt->ct3waste, array('class' => 'form-control', 'id'=>'n3014', 'v-model'=>"n3014", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Stickers</td>
          <td>{!! Form::text('csticker', $overseaswt->csticker, array('class' => 'form-control', 'id'=>'n3015', 'v-model'=>"n3015", 'readonly'=>true)) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('cstickerready', $overseaswt->cstickerready, array('class' => 'form-control', 'id'=>'n3016', 'v-model'=>"n3016", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('cstickerwaste', $overseaswt->cstickerwaste, array('class' => 'form-control', 'id'=>'n3017', 'v-model'=>"n3017", 'readonly'=>true)) !!}</td>
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
        <td>{!! Form::number('surfMake', $overseaswt->surfMake, array('class' => 'form-control','min'=>'0', 'id'=>'ma1', 'v-model'=>"ma1")) !!}</td>
        <td>{!! Form::number('surfWaste', $overseaswt->surfWaste, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma2', 'v-model'=>"ma2")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Trimming/Cutting</td>
        <td>{!! Form::number('trimMake', $overseaswt->trimMake, array('class' => 'form-control','min'=>'0', 'id'=>'ma3', 'v-model'=>"ma3")) !!}</td>
        <td>{!! Form::number('trimWaste', $overseaswt->trimWaste, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma4', 'v-model'=>"ma4")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Diecut</td>
        <td>{!! Form::number('dieMake', $overseaswt->dieMake, array('class' => 'form-control','min'=>'0', 'id'=>'ma5', 'v-model'=>"ma5")) !!}</td>
        <td>{!! Form::number('dieWaste', $overseaswt->dieWaste, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma6', 'v-model'=>"ma6")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Stripping</td>
        <td>{!! Form::number('stripMake', $overseaswt->stripMake, array('class' => 'form-control','min'=>'0', 'id'=>'ma7', 'v-model'=>"ma7")) !!}</td>
        <td>{!! Form::number('stripWaste', $overseaswt->stripWaste, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma8', 'v-model'=>"ma8")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Folding</td>
        <td>{!! Form::number('foldMake', $overseaswt->foldMake, array('class' => 'form-control','min'=>'0', 'id'=>'ma9', 'v-model'=>"ma9")) !!}</td>
        <td>{!! Form::number('foldWaste', $overseaswt->foldWaste, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma10', 'v-model'=>"ma10")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Sewing</td>
        <td>{!! Form::number('sewMake', $overseaswt->sewMake, array('class' => 'form-control', 'id'=>'ma11', 'v-model'=>"ma11")) !!}</td>
        <td>{!! Form::number('sewWaste', $overseaswt->sewWaste, array('class' => 'form-control','step'=>"any",  'id'=>'ma12', 'v-model'=>"ma12")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Binding</td>
        <td>{!! Form::number('bindMake', $overseaswt->bindMake, array('class' => 'form-control','min'=>'0', 'id'=>'ma13', 'v-model'=>"ma13")) !!}</td>
        <td>{!! Form::number('bindWaste', $overseaswt->bindWaste, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma14', 'v-model'=>"ma14")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">3 Knife Trim</td>
        <td>{!! Form::number('threeMake', $overseaswt->threeMake, array('class' => 'form-control','min'=>'0', 'id'=>'ma15', 'v-model'=>"ma15")) !!}</td>
        <td>{!! Form::number('threeWaste', $overseaswt->threeWaste, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma16', 'v-model'=>"ma16")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Packing</td>
        <td>{!! Form::number('PackMake', $overseaswt->PackMake, array('class' => 'form-control','min'=>'0', 'id'=>'ma17', 'v-model'=>"ma17")) !!}</td>
        <td>{!! Form::number('packWaste', $overseaswt->packWaste, array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma18', 'v-model'=>"ma18")) !!}</td>
      </tr>
    </table>
    </div>
    <div class="row col-md-4">
      <table class="table table-bordered">
        <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFront', $overseaswt->colMakeFront, array('class' => 'form-control','min'=>'0', 'id'=>'col1', 'v-model'=>"col1")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Make ready per color - Back </td>
          <td>{!! Form::number('colMakeBack', $overseaswt->colMakeBack, array('class' => 'form-control','min'=>'0', 'id'=>'col2', 'v-model'=>"col2")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Waste % </td>
          <td>{!! Form::number('colWaste', $overseaswt->colWaste, array('class' => 'form-control','step'=>"any", 'id'=>'col3', 'v-model'=>"col3")) !!}</td>
        </tr>
        {{-- <tr>
          <td colspan="2">(BLA) Make ready per side</td>
          <td>{!! Form::number('blaMake', $overseaswt->, array('class' => 'form-control','min'=>'0', 'id'=>'col4', 'v-model'=>"col4")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(BLA) Waste %</td>
          <td>{!! Form::number('blaWaste', $overseaswt->, array('class' => 'form-control','step'=>"any", 'id'=>'col5', 'v-model'=>"col5")) !!}</td>
        </tr> --}}
      </table>
      <table class="table table-bordered">
        <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFront1', $overseaswt->colMakeFront1, array('class' => 'form-control','min'=>'0', 'id'=>'col6', 'v-model'=>"col6")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Make ready per color - Back </td>
          <td>{!! Form::number('colMakeBack1', $overseaswt->colMakeBack1, array('class' => 'form-control','min'=>'0', 'id'=>'col7', 'v-model'=>"col7")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Waste % </td>
          <td>{!! Form::number('colWaste1', $overseaswt->colWaste1, array('class' => 'form-control','step'=>"any", 'id'=>'col8', 'v-model'=>"col8")) !!}</td>
        </tr>
        {{-- <tr>
          <td colspan="2">(BLA) Make ready per side</td>
          <td>{!! Form::number('blaMake1', $overseaswt->, array('class' => 'form-control', 'min'=>'0', 'id'=>'col9', 'v-model'=>"col9")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(BLA) Waste %</td>
          <td>{!! Form::number('blaWaste1', $overseaswt->, array('class' => 'form-control','step'=>"any", 'id'=>'col10', 'v-model'=>"col10")) !!}</td>
        </tr> --}}
      </table>

      <table class="table table-bordered">
        <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFront2', $overseaswt->colMakeFront2, array('class' => 'form-control', 'min'=>'0','id'=>'col11', 'v-model'=>"col11")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Make ready per color - Back </td>
          <td>{!! Form::number('colMakeBack2', $overseaswt->colMakeBack2, array('class' => 'form-control', 'min'=>'0', 'id'=>'col12', 'v-model'=>"col12")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Waste % </td>
          <td>{!! Form::number('colWaste2', $overseaswt->colWaste2, array('class' => 'form-control', 'step'=>"any",'id'=>'col13', 'v-model'=>"col13")) !!}</td>
        </tr>
        {{-- <tr>
          <td colspan="2">(BLA) Make ready per side</td>
          <td>{!! Form::number('blaMake2', $overseaswt->, array('class' => 'form-control','min'=>'0' ,'id'=>'col14', 'v-model'=>"col14")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(BLA) Waste %</td>
          <td>{!! Form::number('blaWaste2', $overseaswt->, array('class' => 'form-control', 'step'=>"any",'id'=>'col15', 'v-model'=>"col15")) !!}</td>
        </tr> --}}
      </table>
      <table class="table table-bordered">
        <p>For Back Colour</p>
        <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFrontcovback', $overseaswt->colMakeFrontcovback, array('class' => 'form-control', 'min'=>'0','id'=>'cover1', 'v-model'=>"cover1")) !!}</td>
        </tr>
      </table>
    </div>

    {{-- flexi --}}
    <div class="row col-md-12">
      <div class="row col-md-3">
        <table class="table table-bordered" >
          <tbody>
              <tr>
                <th>{!! Form::number('none2', $overseaswt->none2, array('class' => 'form-control', 'min'=>'0', 'id'=>'n1000b', 'v-model'=>'n1000b', 'readonly'=>true)) !!}</th>
              <tr>
                <th></th>
                <th>Flexi</th>
              </tr>
              <tr>
                <td>P. Order Qty</td>
                <td>{!! Form::number('flexiOrderC2', $overseaswt->flexiOrderC2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na1', 'v-model'=>"na1")) !!}</td>

              </tr>
              <tr>
                <td>Up(s) per sheet</td>
                <td>{!! Form::number('flexiUpC2', $overseaswt->flexiUpC2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na2', 'v-model'=>"na2")) !!}</td>

              </tr>
              <tr>
                <td>Signature/Spread(s)</td>
                <td>{!! Form::number('flexiSignC2', $overseaswt->flexiSignC2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na3', 'v-model'=>"na3")) !!}</td>

              </tr>
              <tr>
                <td>Front Color</td>
                <td>{!! Form::number('flexiFrontC2', $overseaswt->flexiFrontC2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na4', 'v-model'=>"na4")) !!}</td>

              </tr>
              <tr>
                <td>Back Color</td>
                <td>{!! Form::number('flexiBackC2', $overseaswt->flexiBackC2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na5', 'v-model'=>"na5")) !!}</td>

              </tr>
              <tr><td></td></tr>
              <tr>
                <td>Surface Finishing</td>
                <td>{!! Form::number('flexiSurfC2', $overseaswt->flexiSurfC2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na6', 'v-model'=>"na6")) !!}</td>

              </tr>
              <tr>
                <td>Trimming/Cutting</td>
                <td>{!! Form::number('flexiTrimC2', $overseaswt->flexiTrimC2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na7', 'v-model'=>"na7")) !!}</td>

              </tr>
              <tr>
                <td>Diecut</td>
                <td>{!! Form::number('flexiDieC2', $overseaswt->flexiDieC2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na8', 'v-model'=>"na8")) !!}</td>

              </tr>
              <tr>
                <td>Stripping</td>
                <td>{!! Form::number('flexiStripC2', $overseaswt->flexiStripC2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na9', 'v-model'=>"na9")) !!}</td>

              </tr>
              <tr>
                <td>Folding</td>
                <td>{!! Form::number('flexiFoldC2', $overseaswt->flexiFoldC2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na10', 'v-model'=>"na10")) !!}</td>

              </tr>
              <tr>
                <td>Sewing</td>
                <td>{!! Form::number('flexiSewC2', $overseaswt->flexiSewC2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na11', 'v-model'=>"na11")) !!}</td>

              </tr>
              <tr>
                <td>Binding</td>
                <td>{!! Form::number('flexiBindC2', $overseaswt->flexiBindC2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na12', 'v-model'=>"na12")) !!}</td>
              </tr>
              <tr>
                <td>3 Knife Trim</td>
                <td>{!! Form::number('flexi3C2', $overseaswt->flexi3C2, array('class' => 'form-control', 'min'=>'0', 'id'=>'na13', 'v-model'=>"na13")) !!}</td>
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
                  <td>{!! Form::text('flexiPrintC3', $overseaswt->flexiPrintC3, array('class' => 'form-control', 'min'=>'0', 'id'=>'naa1', 'v-model'=>"naa1", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>Surface Finishing</td>
                  <td>{!! Form::text('flexiSurfC3', $overseaswt->flexiSurfC3, array('class' => 'form-control', 'min'=>'0', 'id'=>'naa2', 'v-model'=>"naa2", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>Trimming/Cutting</td>
                  <td>{!! Form::text('flexiTrimC3', $overseaswt->flexiTrimC3, array('class' => 'form-control', 'min'=>'0', 'id'=>'naa3', 'v-model'=>"naa3", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>Diecut</td>
                  <td>{!! Form::text('flexiDieC3', $overseaswt->flexiDieC3, array('class' => 'form-control', 'min'=>'0', 'id'=>'naa4', 'v-model'=>"naa4", 'readonly'=>true)) !!}</td>
                <tr>
                  <td>Stripping</td>
                  <td>{!! Form::text('flexiStripC3', $overseaswt->flexiStripC3, array('class' => 'form-control', 'min'=>'0', 'id'=>'naa5', 'v-model'=>"naa5", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>Folding</td>
                  <td>{!! Form::text('flexiFoldC3', $overseaswt->flexiFoldC3, array('class' => 'form-control', 'min'=>'0', 'id'=>'naa6', 'v-model'=>"naa6", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>Sewing</td>
                  <td>{!! Form::text('flexiSewC3', $overseaswt->flexiSewC3, array('class' => 'form-control', 'min'=>'0', 'id'=>'naa7', 'v-model'=>"naa7", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>Binding</td>
                  <td>{!! Form::text('flexiBindC3', $overseaswt->flexiBindC3, array('class' => 'form-control', 'min'=>'0', 'id'=>'naa8', 'v-model'=>"naa8", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>3 Knife Trim</td>
                  <td>{!! Form::text('flexi3C3', $overseaswt->flexi3C3, array('class' => 'form-control', 'min'=>'0', 'id'=>'naa9', 'v-model'=>"naa9", 'readonly'=>true)) !!}</td>
                </tr><tr>
                  <td>Packing</td>
                  <td>{!! Form::text('flexiPackC3', $overseaswt->flexiPackC3, array('class' => 'form-control', 'min'=>'0', 'id'=>'naa10', 'v-model'=>"naa10", 'readonly'=>true)) !!}</td>
                </tr>
              </tbody>
            </table>
          </div>
          {{-- <div class="col-md-4">
            <table></table>
          </div> --}}
        {{-- </div> --}}
        {{-- <div class="col-md-12"> --}}
          <div class="row col-md-4">
            <table class="table table-bordered">
                <tr>
                  <td colspan="3">Paper+wastage qty </td>
                  <td>Required qty</td>
                  <td>Paper Supply</td>

                </tr>
                {{-- <tr>
                  <td>Cover</td >
                  <td>{!! Form::number('ccover1', $overseaswt->, array('class' => 'form-control', 'id'=>'na3000', 'v-model'=>"na3000")) !!}</td>
                  <td>Color Job</td>
                  <td>{!! Form::number('ccoverwaste1', $overseaswt->, array('class' => 'form-control', 'id'=>'na3001', 'v-model'=>"na3001")) !!}</td>
                  <td>{!! Form::number('ccoverwaste1', $overseaswt->, array('class' => 'form-control', 'id'=>'na3002', 'v-model'=>"na3002")) !!}</td>

                </tr> --}}
                <tr>
                  <td>Flexi</td>
                  <td>{!! Form::text('flexicover1', $overseaswt->flexicover1, array('class' => 'form-control', 'id'=>'na3003', 'v-model'=>"na3003", 'readonly'=>true)) !!}</td>
                  <td>Flexi Job</td>
                  <td>{!! Form::text('flexicoverready1', $overseaswt->flexicoverready1, array('class' => 'form-control', 'id'=>'na3004', 'v-model'=>"na3004", 'readonly'=>true)) !!}</td>
                  <td>{!! Form::text('flexicoverwaste1', $overseaswt->flexicoverwaste1, array('class' => 'form-control', 'id'=>'na3005', 'v-model'=>"na3005", 'readonly'=>true)) !!}</td>
                </tr>

                {{-- <tr>
                  <td>Text 1</td>
                  <td>{!! Form::number('ct11', $overseaswt->, array('class' => 'form-control', 'id'=>'na3006', 'v-model'=>"na3006")) !!}</td>
                  <td>Color Job</td>
                  <td>{!! Form::number('ct1ready1', $overseaswt->, array('class' => 'form-control', 'id'=>'na3007', 'v-model'=>"na3007")) !!}</td>
                  <td>{!! Form::number('ct1waste1', $overseaswt->, array('class' => 'form-control', 'id'=>'na3008', 'v-model'=>"na3008")) !!}</td>
                </tr>
                <tr>
                  <td>Text 2</td>
                  <td>{!! Form::number('ct21', $overseaswt->, array('class' => 'form-control', 'id'=>'na3009', 'v-model'=>"na3009")) !!}</td>
                  <td>Color Job</td>
                  <td>{!! Form::number('ct2ready1', $overseaswt->, array('class' => 'form-control', 'id'=>'na3010', 'v-model'=>"na3010")) !!}</td>
                  <td>{!! Form::number('ct2waste1', $overseaswt->, array('class' => 'form-control', 'id'=>'na3011', 'v-model'=>"na3011")) !!}</td>
                </tr>
                <tr>
                  <td>Text 3</td>
                  <td>{!! Form::number('ct31', $overseaswt->, array('class' => 'form-control', 'id'=>'na3012', 'v-model'=>"na3012")) !!}</td>
                  <td>Color Job</td>
                  <td>{!! Form::number('ct3ready1', $overseaswt->, array('class' => 'form-control', 'id'=>'na3013', 'v-model'=>"na3013")) !!}</td>
                  <td>{!! Form::number('ct3waste1', $overseaswt->, array('class' => 'form-control', 'id'=>'na3014', 'v-model'=>"na3014")) !!}</td>
                </tr>
                <tr>
                  <td>Stickers</td>
                  <td>{!! Form::number('csticker1', $overseaswt->, array('class' => 'form-control', 'id'=>'na3015', 'v-model'=>"na3015")) !!}</td>
                  <td>Color Job</td>
                  <td>{!! Form::number('cstickerready1', $overseaswt->, array('class' => 'form-control', 'id'=>'na3016', 'v-model'=>"na3016")) !!}</td>
                  <td>{!! Form::number('cstickerwaste1', $overseaswt->, array('class' => 'form-control', 'id'=>'na3017', 'v-model'=>"na3017")) !!}</td>
                </tr> --}}
            </table>

            <table class="table table-bordered">
              <tr>
                <td colspan="2"></td>
                <td>Make Ready</td>
                <td>Waste %</td>
              </tr>
              <tr>
                <td colspan="2">Surface Finishing</td>
                <td>{!! Form::number('surfMake1', $overseaswt->surfMake1, array('class' => 'form-control', 'id'=>'ma19', 'v-model'=>"ma19")) !!}</td>
                <td>{!! Form::number('surfWaste1', $overseaswt->surfWaste1, array('class' => 'form-control','step'=>"any", 'id'=>'ma20', 'v-model'=>"ma20")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Trimming/Cutting</td>
                <td>{!! Form::number('trimMake1', $overseaswt->trimMake1, array('class' => 'form-control', 'id'=>'ma21', 'v-model'=>"ma21")) !!}</td>
                <td>{!! Form::number('trimWaste1', $overseaswt->trimWaste1, array('class' => 'form-control','step'=>"any", 'id'=>'ma22', 'v-model'=>"ma22")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Diecut</td>
                <td>{!! Form::number('dieMake1', $overseaswt->dieMake1, array('class' => 'form-control', 'id'=>'ma23', 'v-model'=>"ma23")) !!}</td>
                <td>{!! Form::number('dieWaste1', $overseaswt->dieWaste1, array('class' => 'form-control','step'=>"any", 'id'=>'ma24', 'v-model'=>"ma24")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Stripping</td>
                <td>{!! Form::number('stripMake1', $overseaswt->stripMake1, array('class' => 'form-control', 'id'=>'ma25', 'v-model'=>"ma25")) !!}</td>
                <td>{!! Form::number('stripWaste1', $overseaswt->stripWaste1, array('class' => 'form-control','step'=>"any", 'id'=>'ma26', 'v-model'=>"ma26")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Folding</td>
                <td>{!! Form::number('foldMake1', $overseaswt->foldMake1, array('class' => 'form-control', 'id'=>'ma27', 'v-model'=>"ma27")) !!}</td>
                <td>{!! Form::number('foldWaste1', $overseaswt->foldWaste1, array('class' => 'form-control','step'=>"any", 'id'=>'ma28', 'v-model'=>"ma28")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Sewing</td>
                <td>{!! Form::number('sewMake1', $overseaswt->sewMake1, array('class' => 'form-control', 'id'=>'ma29', 'v-model'=>"ma29")) !!}</td>
                <td>{!! Form::number('sewWaste1', $overseaswt->sewWaste1, array('class' => 'form-control','step'=>"any", 'id'=>'ma30', 'v-model'=>"ma30")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Binding</td>
                <td>{!! Form::number('bindMake1', $overseaswt->bindMake1, array('class' => 'form-control', 'id'=>'ma31', 'v-model'=>"ma31")) !!}</td>
                <td>{!! Form::number('bindWaste1', $overseaswt->bindWaste1, array('class' => 'form-control','step'=>"any", 'id'=>'ma32', 'v-model'=>"ma32")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">3 Knife Trim</td>
                <td>{!! Form::number('threeMake1', $overseaswt->threeMake1, array('class' => 'form-control', 'id'=>'ma33', 'v-model'=>"ma33")) !!}</td>
                <td>{!! Form::number('threeWaste1', $overseaswt->threeWaste1, array('class' => 'form-control','step'=>"any", 'id'=>'ma34', 'v-model'=>"ma34")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Packing</td>
                <td>{!! Form::number('PackMake1', $overseaswt->PackMake1, array('class' => 'form-control', 'id'=>'ma35', 'v-model'=>"ma35")) !!}</td>
                <td>{!! Form::number('packWaste1', $overseaswt->packWaste1, array('class' => 'form-control','step'=>"any", 'id'=>'ma36', 'v-model'=>"ma36")) !!}</td>
              </tr>
            </table>
            </div>
            <div class="row col-md-3">
              <table class="table table-bordered">
                <tr>
                  <td colspan="2">(COL) Make ready per color - Front </td>
                  <td>{!! Form::number('colMakeFront3', $overseaswt->colMakeFront3, array('class' => 'form-control', 'id'=>'col16', 'v-model'=>"col16")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Make ready per color - Back </td>
                  <td>{!! Form::number('colMakeBack3', $overseaswt->colMakeBack3, array('class' => 'form-control', 'id'=>'col17', 'v-model'=>"col17")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Waste % </td>
                  <td>{!! Form::number('colWaste3', $overseaswt->colWaste3, array('class' => 'form-control','step'=>"any", 'id'=>'col18', 'v-model'=>"col18")) !!}</td>
                </tr>
                {{-- <tr>
                  <td colspan="2">(BLA) Make ready per side</td>
                  <td>{!! Form::number('blaMake3', $overseaswt->, array('class' => 'form-control', 'id'=>'col19', 'v-model'=>"col19")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(BLA) Waste %</td>
                  <td>{!! Form::number('blaWaste3', $overseaswt->, array('class' => 'form-control','step'=>"any", 'id'=>'col20', 'v-model'=>"col20")) !!}</td>
                </tr> --}}
              </table>

              <table class="table table-bordered">
                <tr>
                  <td colspan="2">(COL) Make ready per color - Front </td>
                  <td>{!! Form::number('colMakeFront4', $overseaswt->colMakeFront4, array('class' => 'form-control', 'id'=>'col21', 'v-model'=>"col21")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Make ready per color - Back </td>
                  <td>{!! Form::number('colMakeBack4', $overseaswt->colMakeBack4, array('class' => 'form-control', 'id'=>'col22', 'v-model'=>"col22")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Waste % </td>
                  <td>{!! Form::number('colWaste4', $overseaswt->colWaste4, array('class' => 'form-control','step'=>"any", 'id'=>'col23', 'v-model'=>"col23")) !!}</td>
                </tr>
                {{-- <tr>
                  <td colspan="2">(BLA) Make ready per side</td>
                  <td>{!! Form::number('blaMake4', $overseaswt->, array('class' => 'form-control', 'id'=>'col24', 'v-model'=>"col24")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(BLA) Waste %</td>
                  <td>{!! Form::number('blaWaste4', $overseaswt->, array('class' => 'form-control','step'=>"any", 'id'=>'col25', 'v-model'=>"col25")) !!}</td>
                </tr> --}}
              </table>

              <table class="table table-bordered">
                <tr>
                  <td colspan="2">(COL) Make ready per color - Front </td>
                  <td>{!! Form::number('colMakeFront5', $overseaswt->colMakeFront5, array('class' => 'form-control', 'id'=>'col26', 'v-model'=>"col26")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Make ready per color - Back </td>
                  <td>{!! Form::number('colMakeBack5', $overseaswt->colMakeBack5, array('class' => 'form-control', 'id'=>'col27', 'v-model'=>"col27")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Waste % </td>
                  <td>{!! Form::number('colWaste5', $overseaswt->colWaste5, array('class' => 'form-control','step'=>"any", 'id'=>'col28', 'v-model'=>"col28")) !!}</td>
                </tr>
                {{-- <tr>
                  <td colspan="2">(BLA) Make ready per side</td>
                  <td>{!! Form::number('blaMake5', $overseaswt->, array('class' => 'form-control', 'id'=>'col29', 'v-model'=>"col29")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(BLA) Waste %</td>
                  <td>{!! Form::number('blaWaste5', $overseaswt->, array('class' => 'form-control','step'=>"any", 'id'=>'col30', 'v-model'=>"col30")) !!}</td>
                </tr> --}}
              </table>
              <table class="table table-bordered">
              <p>For Back Colour</p>
                <tr>
                  <td colspan="2">(COL) Make ready per color - Front </td>
                  <td>{!! Form::number('colMakeFrontcovback1', $overseaswt->colMakeFrontcovback1, array('class' => 'form-control', 'min'=>'0','id'=>'cover11', 'v-model'=>"cover11")) !!}</td>
                </tr>
              </table>
            </div>
        </div>
        <div class="form-group row">
        <button type="submit" class="btn btn-success btn-block" >SAVE </button>
        </div>
    {!! Form::close()!!}
</div> {{-- end of id app --}}

<script>
var vm = new Vue({
        el:'#app',
        data : {
                    n1 : {!!$overseaswt->covOrderC!!}, n5 : {!!$overseaswt->statOrderC!!}, n4 : {!!$overseaswt->t3OrderC!!},
                    n11 : {!!$overseaswt->covUpC!!}, n12 : {!!$overseaswt->t1UpC!!}, n13 : {!!$overseaswt->t2UpC!!}, n14 : {!!$overseaswt->t3UpC!!}, n15 : {!!$overseaswt->statUpC!!}, n16 : {!!$overseaswt->flexiUpC!!},
                    n21 : {!!$overseaswt->covSignC!!}, n22 : {!!$overseaswt->t1signC!!}, n23 : {!!$overseaswt->t2signC!!}, n24 : {!!$overseaswt->t3signC!!}, n25 : {!!$overseaswt->statSignC!!}, n26 : {!!$overseaswt->flexiSignC!!},
                    n31 : {!!$overseaswt->covFrontC!!}, n32 : {!!$overseaswt->t1FrontC!!}, n33 : {!!$overseaswt->t2FrontC!!}, n34 : {!!$overseaswt->t3FrontC!!}, n35 : {!!$overseaswt->statFrontC!!}, n36 : {!!$overseaswt->flexiFrontC!!},
                    n41 : {!!$overseaswt->covBackC!!}, n42 : {!!$overseaswt->t1BackC!!}, n43 : {!!$overseaswt->t2BackC!!}, n44 : {!!$overseaswt->t3BackC!!}, n45 : {!!$overseaswt->statBackC!!}, n46 : {!!$overseaswt->flexiBackC!!},
                    n51 : {!!$overseaswt->covSurfC!!}, n52 : {!!$overseaswt->t1SurfC!!}, n53 : {!!$overseaswt->t2SurfC!!}, n54 : {!!$overseaswt->t3SurfC!!}, n55 : {!!$overseaswt->statSurfC!!}, n56 : {!!$overseaswt->flexiSurfC!!},
                    n61 : {!!$overseaswt->covTrimC!!}, n62 : {!!$overseaswt->t1TrimC!!}, n63 : {!!$overseaswt->t2TrimC!!}, n64 : {!!$overseaswt->t3TrimC!!}, n65 : {!!$overseaswt->statTrimC!!}, n66 : {!!$overseaswt->flexiTrimC!!},
                    n71 : {!!$overseaswt->covDieC!!}, n72 : {!!$overseaswt->t1DieC!!}, n73 : {!!$overseaswt->t2DieC!!}, n74 : {!!$overseaswt->t3DieC!!}, n75 : {!!$overseaswt->statDieC!!}, n76 : {!!$overseaswt->flexiDieC!!},
                    n81 : {!!$overseaswt->covStripC!!}, n82 : {!!$overseaswt->t1StripC!!}, n83 : {!!$overseaswt->t2StripC!!}, n84 : {!!$overseaswt->t3stripC!!}, n85 : {!!$overseaswt->statStripC!!}, n86 : {!!$overseaswt->flexiStripC!!},
                    n91 : {!!$overseaswt->covFoldC!!}, n92 : {!!$overseaswt->t1FoldC!!}, n93 : {!!$overseaswt->t2FoldC!!}, n94 : {!!$overseaswt->t3FoldC!!}, n95 : {!!$overseaswt->statFoldC!!}, n96 : {!!$overseaswt->flexiFoldC!!},
                    n101 : {!!$overseaswt->covSewC!!}, n102 : {!!$overseaswt->t1SewC!!}, n103 : {!!$overseaswt->t2SewC!!}, n104 : {!!$overseaswt->t3SewC!!}, n105 : {!!$overseaswt->statSewC!!}, n106 : {!!$overseaswt->flexiSewC!!},
                    n111 : {!!$overseaswt->covBindC!!}, n112 : {!!$overseaswt->t1BindC!!}, n113 : {!!$overseaswt->t2BindC!!}, n114 : {!!$overseaswt->t3BindC!!}, n115 : {!!$overseaswt->statBindC!!}, n116 : {!!$overseaswt->flexiBindC!!},
                    n121 : {!!$overseaswt->cov3C!!}, n122 : {!!$overseaswt->t13C!!}, n123 : {!!$overseaswt->t23C!!}, n124 : {!!$overseaswt->t33C!!}, n125 : {!!$overseaswt->stat3C!!}, n126 : {!!$overseaswt->flexi3C!!},

                    n2005: 0, n2006: 0, n2007: 0, n2008: 0, n2009: 0, n2010: 0, n2011: 0, n2012: 0,
                    n2013: 0, n2014: 0, n2015: 0, n2016: 0, n2017: 0, n2018: 0, n2019: 0, n2020: 0, n2021: 0, n2022: 0,

                    na2:{!!$overseaswt->flexiUpC2!!}, na3:{!!$overseaswt->flexiSignC2!!}, na4:{!!$overseaswt->flexiFrontC2!!}, na5:{!!$overseaswt->flexiBackC2!!}, na6:{!!$overseaswt->flexiSurfC2!!}, na7:{!!$overseaswt->flexiTrimC2!!}, na8:{!!$overseaswt->flexiDieC2!!}, na9:{!!$overseaswt->flexiStripC2!!},
                    na10:{!!$overseaswt->flexiFoldC2!!}, na11:{!!$overseaswt->flexiSewC2!!}, na12:{!!$overseaswt->flexiBindC2!!},na13:{!!$overseaswt->flexi3C2!!},

                    ma1: {!!$overseaswt->surfMake!!}, ma2: {!!$overseaswt->surfWaste!!}, ma3: {!!$overseaswt->trimMake!!}, ma4: {!!$overseaswt->trimWaste!!}, ma5: {!!$overseaswt->dieMake!!}, ma6: {!!$overseaswt->dieWaste!!}, ma7: {!!$overseaswt->stripMake!!}, ma8: {!!$overseaswt->stripWaste!!}, ma9: {!!$overseaswt->foldMake!!}, ma10: {!!$overseaswt->foldWaste!!},
                    ma11: {!!$overseaswt->sewMake!!},ma12: {!!$overseaswt->sewWaste!!},ma13: {!!$overseaswt->bindMake!!},ma14: {!!$overseaswt->bindWaste!!},ma15: {!!$overseaswt->threeMake!!},ma16: {!!$overseaswt->threeWaste!!},ma17: {!!$overseaswt->PackMake!!},ma18: {!!$overseaswt->packWaste!!},ma19: {!!$overseaswt->surfMake1!!},ma20: {!!$overseaswt->surfWaste1!!},
                    ma21: {!!$overseaswt->trimMake1!!},ma22: {!!$overseaswt->trimWaste1!!},ma23: {!!$overseaswt->dieMake1!!},ma24: {!!$overseaswt->dieWaste1!!},ma25: {!!$overseaswt->stripMake1!!},ma26: {!!$overseaswt->stripWaste1!!},ma27: {!!$overseaswt->foldMake1!!},ma28: {!!$overseaswt->foldWaste1!!},ma29: {!!$overseaswt->sewMake1!!},ma30: {!!$overseaswt->sewWaste1!!},
                    ma31: {!!$overseaswt->bindMake1!!},ma32: {!!$overseaswt->bindWaste1!!},ma33: {!!$overseaswt->threeMake1!!},ma34: {!!$overseaswt->threeWaste1!!},ma35: {!!$overseaswt->PackMake1!!},ma36: {!!$overseaswt->packWaste1!!},

                    col1: {!!$overseaswt->colMakeFront!!},col2: {!!$overseaswt->colMakeBack!!},col3: {!!$overseaswt->colWaste!!},col4: 0,col5: 0,col6: {!!$overseaswt->colMakeFront1!!},col7: {!!$overseaswt->colMakeBack1!!},col8: {!!$overseaswt->colWaste1!!},col9: 0,col10: 0,col11: {!!$overseaswt->colMakeFront2!!},
                    col12: {!!$overseaswt->colMakeBack2!!},col13: {!!$overseaswt->colWaste2!!},col14: 0,col15: 0,col16: {!!$overseaswt->colMakeFront3!!},col17: {!!$overseaswt->colMakeBack3!!},col18: {!!$overseaswt->colWaste3!!},col19: 0,col20: 0,
                    col21: {!!$overseaswt->colMakeFront4!!},col22: {!!$overseaswt->colMakeBack4!!},col23: {!!$overseaswt->colWaste4!!},col24: 0,col25: 0,col26: {!!$overseaswt->colMakeFront5!!},col27: {!!$overseaswt->colMakeBack5!!},col28: {!!$overseaswt->colWaste5!!},col29: 0,col30:0,
                    cover1:{!!$overseaswt->colMakeFrontcovback!!}, cover11:{!!$overseaswt->colMakeFrontcovback1!!}

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
          n2: function(){
            return this.n1;
          },
          n3: function(){
            return this.n1;
          },
          n6: function(){
            return this.n1;
          },
          n1000a: function(){
            if (this.n1 == 0){
              return this.n1;
            }
            else {
              return this.n1/4;
            }
          },
          na131: function(){
            var statement = ((parseFloat(this.col6 ) * parseFloat(this.n31)) + (parseFloat(this.cover1) * parseFloat(this.n41)));
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
                if1 = ((parseFloat(this.n1) / parseFloat(this.n11) * (parseFloat(this.col8) / 100) * (parseFloat(this.n31) + parseFloat(this.n41)) + parseFloat(if2)) );
              }
            return this.f1(if1);
          },
          na132: function(){
            var statement = ((parseFloat(this.col6) * parseFloat(this.n32)) + (parseFloat(this.col7) * parseFloat(this.n42)));
            var if1 = 0;
            var if2 = 0;

            if (statement < 300)
            {
                if2 = 300;
            } else{
                if2 = statement;
            }
            if( this.n2 == 0)
            {
                if1 = 0;
            } else{
                if1 = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.col8) / 100) * (parseFloat(this.n32) + parseFloat(this.n42)) + parseFloat(if2)) * parseFloat(this.n22));
              }
            return this.f1(if1);
          },
          na133: function(){
            var statement = ((parseFloat(this.col1) * parseFloat(this.n33)) + (parseFloat(this.col2) * parseFloat(this.n43)));
            var if1 = 0;
            var if2 = 0;

            if (statement < 300)
            {
                if2 = 300;
            } else{
                if2 = statement;
            }
            if( this.n3 == 0)
            {
                if1 = 0;
            } else{
                if1 = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.col3) / 100) * (parseFloat(this.n33) + parseFloat(this.n43)) + parseFloat(if2)) * parseFloat(this.n23));
              }
            return this.f1(if1);
          },
          na134: function(){
            var statement = ((parseFloat(this.col6) * parseFloat(this.n34)) + (parseFloat(this.col7) * parseFloat(this.n44)));
            var if1 = 0;
            var if2 = 0;

            if (statement < 300)
            {
                if2 = 300;
            } else{
                if2 = statement;
            }
            if( this.n4 == 0)
            {
                if1 = 0;
            } else{
                if1 = ((parseFloat(this.n34) / parseFloat(this.n14) * (parseFloat(this.col8) / 100) * (parseFloat(this.n34) + parseFloat(this.n44)) + parseFloat(if2)) * parseFloat(this.n24));
              }
            return this.f1(if1);
          },
          na135: function(){
            var statement = ((parseFloat(this.col11) * parseFloat(this.n35)) + (parseFloat(this.col12) * parseFloat(this.n45)));
            var if1 = 0;
            var if2 = 0;

            if (statement < 160)
            {
                if2 = 160;
            } else{
                if2 = statement;
            }
            if( this.n5 == 0)
            {
                if1 = 0;
            } else{
                if1 = ((parseFloat(this.n5) / parseFloat(this.n15) * (parseFloat(this.col13) / 100) * (parseFloat(this.n35) + parseFloat(this.n45)) + parseFloat(if2)) * parseFloat(this.n25));
              }
            return this.f1(if1);
          },
          na136: function(){
            var statement = ((parseFloat(this.col6) * parseFloat(this.n36)) + (parseFloat(this.col7) * parseFloat(this.n46)));
            var if1 = 0;
            var if2 = 0;

            if (statement < 100)
            {
                if2 = 100;
            } else{
                if2 = statement;
            }
            if( this.n6 == 0)
            {
                if1 = 0;
            } else{
                if1 = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.col8) / 100) * (parseFloat(this.n36) + parseFloat(this.n46)) + parseFloat(if2)) * parseFloat(this.n26));
              }
            return this.f1(if1);
          },
          na141: function(){
            var n141a =  (parseFloat(this.n1) / parseFloat(this.n11) * (parseFloat(this.ma2)/ 100) + parseFloat(this.ma1))* parseFloat(this.n21) * parseFloat(this.n51) ;
            return this.f1(n141a);
          },

          na142: function(){
            var n142a = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.ma2)/ 100) + parseFloat(this.ma1))* parseFloat(this.n22) * parseFloat(this.n52));
            return this.f1(n142a);
          },
          na143: function(){
            var n143a = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.ma2)/ 100) + parseFloat(this.ma1))* parseFloat(this.n23) * parseFloat(this.n53));
            return this.f1(n143a);
          },
          na144: function(){
            var n144a = ((parseFloat(this.n4) / parseFloat(this.n14) * (parseFloat(this.ma2)/ 100) + parseFloat(this.ma1))* parseFloat(this.n24) * parseFloat(this.n54));
            return this.f1(n144a);
          },
          na145: function(){
            var n145a = ((parseFloat(this.n5 )/parseFloat( this.n15) * (parseFloat(this.ma2)/ 100) + parseFloat(this.ma1))* parseFloat(this.n25) * parseFloat(this.n55)) ;
            return this.f1(n145a);
          },
          na146: function(){
            var n146a = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.ma2)/ 100) + parseFloat(this.ma1))*parseFloat(this.n26) * parseFloat(this.n56));
            return this.f1(n146a);
          },
          na151: function(){
            var n151a = (parseFloat(this.n1) / parseFloat(this.n11) * (parseFloat(this.ma4)/ 100) + parseFloat(this.ma3))* parseFloat(this.n21) * parseFloat(this.n61);
             return this.f1(n151a);
          },

          na152: function(){
            var n152a = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.ma4)/ 100) +parseFloat( this.ma3))* parseFloat(this.n22) * parseFloat(this.n62));
            return this.f1(n152a);
          },
          na153: function(){
            var n153a = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.ma4)/ 100) + parseFloat(this.ma3))* parseFloat(this.n23) * parseFloat(this.n63));
            return this.f1(n153a);
          },
          na154: function(){
            var n154a = ((parseFloat(this.n4) / parseFloat(this.n14 )* (parseFloat(this.ma4)/ 100) + parseFloat(this.ma3))* parseFloat(this.n24) * parseFloat(this.n64));
            return this.f1(n154a);
          },
          na155: function(){
            var n155a = ((parseFloat(this.n5) / parseFloat(this.n15) * (parseFloat(this.ma4)/ 100) + parseFloat(this.ma3))* parseFloat(this.n25 )* parseFloat(this.n65)) ;
            return this.f1(n155a);
          },
          na156: function(){
            var n156a = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.ma4)/ 100) + parseFloat(this.ma3))* parseFloat(this.n26) * parseFloat(this.n66));
            return this.f1(n156a);
          },
          na161: function(){
            var n161a = (parseFloat(this.n1) / parseFloat(this.n11) * (parseFloat(this.ma6)/ 100) + parseFloat(this.ma5))* parseFloat(this.n21) * parseFloat(this.n71);
            return this.f1(n161a);
          },

          na162: function(){
            var n162a = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.ma6)/ 100) + parseFloat(this.ma5))* parseFloat(this.n22) * parseFloat(this.n72));
            return this.f1(n162a);
          },
          na163: function(){
            var n163a = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.ma6)/ 100) + parseFloat(this.ma5))* parseFloat(this.n23) * parseFloat(this.n73));
            return this.f1(n163a);
          },
          na164: function(){
            var n164a = ((parseFloat(this.n4) / parseFloat(this.n14) * (parseFloat(this.ma6)/ 100) + parseFloat(this.ma5))* parseFloat(this.n24) * parseFloat(this.n74));
            return this.f1(n164a);
          },
          na165: function(){
            var n165a = ((parseFloat(this.n5) / parseFloat(this.n15) * (parseFloat(this.ma6)/ 100) + parseFloat(this.ma5))* parseFloat(this.n25) * parseFloat(this.n75));
            return this.f1(n165a);
          },
          na166: function(){
            var n166a = (160 + (parseFloat(this.n6) / parseFloat(this.n16) * (0.5/100))) ;
            return this.f1(n166a);
          },
          na171: function(){
            var n171a = (parseFloat(this.n1) / parseFloat(this.n11) * (parseFloat(this.ma8)/ 100) + parseFloat(this.ma7))* parseFloat(this.n21) * parseFloat(this.n81);
            return this.f1(n171a);
          },

          na172: function(){
            var n172a = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.ma8)/ 100) + parseFloat(this.ma7))* parseFloat(this.n22) * parseFloat(this.n82));
            return this.f1(n172a);
          },
          na173: function(){
            var n173a = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.ma8)/ 100) + parseFloat(this.ma7))* parseFloat(this.n23) * parseFloat(this.n83));
            return this.f1(n173a);
          },
          na174: function(){
            var n174a = ((parseFloat(this.n4) / parseFloat(this.n14) * (parseFloat(this.ma8)/ 100) + parseFloat(this.ma7))* parseFloat(this.n24) * parseFloat(this.n84));
            return this.f1(n174a);
          },
          na175: function(){
            var n175a = ((parseFloat(this.n5) / parseFloat(this.n15) * (parseFloat(this.ma8)/ 100) + parseFloat(this.ma7))* parseFloat(this.n25) * parseFloat(this.n85));
            return this.f1(n175a);
          },
          na176: function(){
            var n176a = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.ma8)/ 100) + parseFloat(this.ma7))* parseFloat(this.n26) * parseFloat(this.n86));
            return this.f1(n176a);
          },
          na181: function(){
            var if1 = 0;
            var if2 = 0;
            var if3 = 0;
            var if4 = 0;

            if (this.n1 > 19999)
            {
                if4 = 50;
            } else{
                if4 = 0;
            }

            if ( this.n1 > 9999)
            {
                if3 = 75;
            } else{
                if3 = 0;
            }

            if (this.n1 < 4000)
            {
             if2 = 50;
            } else {
                if2 = if3;
            }

            if( this.n1 == 0)
            {
                if1 = 0;
            } else{
                if1 = (parseFloat(this.n1) / parseFloat(this.n11) * parseFloat(this.ma10) / 100 + parseFloat(this.ma9) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n91);
            }
            return this.f1(if1);

        },
        na182: function(){

              var if1 = 0;
              var if2 = 0;
              var if3 = 0;
              var if4 = 0;

              if (this.n2 > 19999)
              {
                  if4 = 50;
              } else{
                  if4 = 0;
              }

              if ( this.n2 > 9999)
              {
                  if3 = 75;
              } else{
                  if3 = 0;
              }

              if (this.n2 < 4000)
              {
               if2 = 50;
              } else {
                  if2 = if3;
              }

              if( this.n2 == 0)
              {
                  if1 = 0;
              } else{
                  if1 = (parseFloat(this.n2) / parseFloat(this.n12) * parseFloat(this.ma10) / 100 + parseFloat(this.ma9) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n22) * parseFloat(this.n92);
              }
              return this.f1(if1);
            },
            na183: function() {
              var if1 = 0;
              var if2 = 0;
              var if3 = 0;
              var if4 = 0;

              if (this.n3 > 19999)
              {
                  if4 = 50;
              } else{
                  if4 = 0;
              }

              if ( this.n3 > 9999)
              {
                  if3 = 75;
              } else{
                  if3 = 0;
              }

              if (this.n3 < 4000)
              {
               if2 = 50;
              } else {
                  if2 = if3;
              }

              if( this.n3 == 0)
              {
                  if1 = 0;
              } else{
                  if1 = (parseFloat(this.n3) / parseFloat(this.n13) * parseFloat(this.ma10) / 100 + parseFloat(this.ma9) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n23)* parseFloat(this.n93);
              }
              return this.f1(if1);
            },
            na184: function()
            {
              var if1 = 0;
              var if2 = 0;
              var if3 = 0;
              var if4 = 0;

              if (this.n4 > 19999)
              {
                  if4 = 50;
              } else{
                  if4 = 0;
              }

              if ( this.n4 > 9999)
              {
                  if3 = 75;
              } else{
                  if3 = 0;
              }

              if (this.n4 < 4000)
              {
               if2 = 50;
              } else {
                  if2 = if3;
              }

              if( this.n4 == 0)
              {
                  if1 = 0;
              } else{
                  if1 = ((parseFloat(this.n4) / parseFloat(this.n14) * parseFloat(this.ma10) / 100 + parseFloat(this.ma9) + parseFloat(if2) + parseFloat(if4))  * parseFloat(this.n24) * parseFloat(this.n94));
              }
              return this.f1(if1);
            },
            na185: function()
            {
              var if1 = 0;
              var if2 = 0;
              var if3 = 0;
              var if4 = 0;

              if (this.n5> 19999)
              {
                  if4 = 50;
              } else{
                  if4 = 0;
              }

              if ( this.n5 > 9999)
              {
                  if3 = 75;
              } else{
                  if3 = 0;
              }

              if (this.n5 < 4000)
              {
               if2 = 50;
              } else {
                  if2 = if3;
              }

              if( this.n5 == 0)
              {
                  if1 = 0;
              } else{
                  if1 = (parseFloat(this.n5) / parseFloat(this.n15) * parseFloat(this.ma10 / 100 )+ parseFloat(this.ma9) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n25) * parseFloat(this.n95);
              }
              return this.f1(if1);
            },
            na186: function()
            {
              var if1 = 0;
              var if2 = 0;
              var if3 = 0;
              var if4 = 0;

              if (this.n6> 19999)
              {
                  if4 = 50;
              } else{
                  if4 = 0;
              }

              if ( this.n6 > 9999)
              {
                  if3 = 75;
              } else{
                  if3 = 0;
              }

              if (this.n6 < 4000)
              {
               if2 = 50;
              } else {
                  if2 = if3;
              }

              if( this.n6 == 0)
              {
                  if1 = 0;
              } else{
                  if1 = (parseFloat(this.n6) / parseFloat(this.n16) * parseFloat(this.ma10) / 100 + parseFloat(this.ma9) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n26) * parseFloat(this.n96);
              }
              return this.f1(if1);
            },
            na191: function(){
              var n191a = ((parseFloat(this.n1) / parseFloat(this.n11) * (parseFloat(this.ma12)/ 100) + parseFloat(this.ma11))* parseFloat(this.n21) * parseFloat(this.n101));
              return this.f1(n191a);
            },

            na192: function(){
              var n192a = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.ma12)/ 100) + parseFloat(this.ma11))* parseFloat(this.n22) * parseFloat(this.n102));
              return this.f1(n192a);
            },
            na193: function(){
              var n193a = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.ma12)/ 100) + parseFloat(this.ma11))* parseFloat(this.n23) * parseFloat(this.n103));
              return this.f1(n193a);
            },
            na194: function(){
              var n194a = ((parseFloat(this.n4) / parseFloat(this.n14) * (parseFloat(this.ma12)/ 100) + parseFloat(this.ma11))* parseFloat(this.n24) * parseFloat(this.n104));
              return this.f1(n194a);
            },
            na195: function(){
              var n195a = ((parseFloat(this.n5) / parseFloat(this.n15) * (parseFloat(this.ma12)/ 100) + parseFloat(this.ma11))* parseFloat(this.n25) * parseFloat(this.n105));
              return this.f1(n195a);
            },
            na196: function(){
              var n196a = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.ma12)/ 100) + parseFloat(this.ma11))* parseFloat(this.n26) * parseFloat(this.n106));
              return this.f1(n196a);
            },
            na201: function(){

                var if1 = 0;
                var if2 = 0;
                var if3 = 0;
                var if4 = 0;

                if (this.n1 > 19999)
                {
                    if4 = 50;
                } else{
                    if4 = 0;
                }

                if ( this.n1 > 9999)
                {
                    if3 = 75;
                } else{
                    if3 = 0;
                }

                if (this.n1 < 4000)
                {
                 if2 = 50;
                } else {
                    if2 = if3;
                }

                if( this.n1 == 0)
                {
                    if1 = 0;
                } else{
                    if1 = (parseFloat(this.n1) / parseFloat(this.n11) * parseFloat(this.ma14) / 100 + parseFloat(this.ma13) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n111);
                }
                return this.f1(if1);

            },
            na202: function(){

                  var if1 = 0;
                  var if2 = 0;
                  var if3 = 0;
                  var if4 = 0;

                  if (this.n2 > 19999)
                  {
                      if4 = 50;
                  } else{
                      if4 = 0;
                  }

                  if ( this.n2 > 9999)
                  {
                      if3 = 75;
                  } else{
                      if3 = 0;
                  }

                  if (this.n2 < 4000)
                  {
                   if2 = 50;
                  } else {
                      if2 = if3;
                  }

                  if( this.n2 == 0)
                  {
                      if1 = 0;
                  } else{
                      if1 = (parseFloat(this.n2) / parseFloat(this.n12) * parseFloat(this.ma14) / 100 + parseFloat(this.ma13) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n22) * parseFloat(this.n112);
                  }
                  return this.f1(if1);
                },
              na203: function() {
                  var if1 = 0;
                  var if2 = 0;
                  var if3 = 0;
                  var if4 = 0;

                  if (this.n3 > 19999)
                  {
                      if4 = 50;
                  } else{
                      if4 = 0;
                  }

                  if ( this.n3 > 9999)
                  {
                      if3 = 75;
                  } else{
                      if3 = 0;
                  }

                  if (this.n3 < 4000)
                  {
                   if2 = 50;
                  } else {
                      if2 = if3;
                  }

                  if( this.n3 == 0)
                  {
                      if1 = 0;
                  } else{
                      if1 = (parseFloat(this.n3) / parseFloat(this.n13) * parseFloat(this.ma14) / 100 + parseFloat(this.ma13) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n23) * parseFloat(this.n113);
                  }
                  return this.f1(if1);
                },
              na204: function()
                {
                  var if1 = 0;
                  var if2 = 0;
                  var if3 = 0;
                  var if4 = 0;

                  if (this.n4 > 19999)
                  {
                      if4 = 50;
                  } else{
                      if4 = 0;
                  }

                  if ( this.n4 > 9999)
                  {
                      if3 = 75;
                  } else{
                      if3 = 0;
                  }

                  if (this.n4 < 4000)
                  {
                   if2 = 50;
                  } else {
                      if2 = if3;
                  }

                  if( this.n4 == 0)
                  {
                      if1 = 0;
                  } else{
                      if1 = (parseFloat(this.n4) / parseFloat(this.n14) * parseFloat(this.ma14) / 100 + parseFloat(this.ma13) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n24) * parseFloat(this.n114);
                  }
                  return this.f1(if1);
                },
              na205: function()
                {
                  var if1 = 0;
                  var if2 = 0;
                  var if3 = 0;
                  var if4 = 0;

                  if (this.n5> 19999)
                  {
                      if4 = 50;
                  } else{
                      if4 = 0;
                  }

                  if ( this.n5 > 9999)
                  {
                      if3 = 75;
                  } else{
                      if3 = 0;
                  }

                  if (this.n5 < 4000)
                  {
                   if2 = 50;
                  } else {
                      if2 = if3;
                  }

                  if( this.n5 == 0)
                  {
                      if1 = 0;
                  } else{
                      if1 = (parseFloat(this.n5) / parseFloat(this.n15) * parseFloat(this.ma14) / 100 + parseFloat(this.ma13) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n25) * parseFloat(this.n115);
                  }
                  return this.f1(if1);
                },
              na206: function()
                {
                  var if1 = 0;
                  var if2 = 0;
                  var if3 = 0;
                  var if4 = 0;

                  if (this.n6> 19999)
                  {
                      if4 = 50;
                  } else{
                      if4 = 0;
                  }

                  if ( this.n6 > 9999)
                  {
                      if3 = 75;
                  } else{
                      if3 = 0;
                  }

                  if (this.n6 < 4000)
                  {
                   if2 = 50;
                  } else {
                      if2 = if3;
                  }

                  if( this.n6 == 0)
                  {
                      if1 = 0;
                  } else{
                      if1 = (parseFloat(this.n6) / parseFloat(this.n16) * parseFloat(this.ma14) / 100 + parseFloat(this.ma13) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n26) * parseFloat(this.n116);
                  }
                  return this.f1(if1);
                },
                na211: function(){
                  var n2011a = (parseFloat(this.n1) / parseFloat(this.n11) * parseFloat(this.ma16/ 100) + parseFloat(this.ma15))* parseFloat(this.n21) * parseFloat(this.n121) ;
                  return this.f1(n2011a);
                  },

                na212: function(){
                  var n2012a = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.ma16)/ 100) + parseFloat(this.ma15))* parseFloat(this.n22) * parseFloat(this.n122));
                  return this.f1(n2012a);
                  },
                na213: function(){
                  var n2013a = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.ma16)/ 100) + parseFloat(this.ma15))* parseFloat(this.n23) * parseFloat(this.n123));
                  return this.f1(n2013a);
                  },
                na214: function(){
                  var n2014a = ((parseFloat(this.n4) / parseFloat(this.n14) * (parseFloat(this.ma16)/ 100) + parseFloat(this.ma15))* parseFloat(this.n24) * parseFloat(this.n124));
                  return this.f1(n2014a);
                  },
                na215: function(){
                  var n2015a = ((parseFloat(this.n5) / parseFloat(this.n15) * (parseFloat(this.ma16)/ 100) + parseFloat(this.ma15))* parseFloat(this.n25) * parseFloat(this.n125));
                  return this.f1(n2015a);
                  },
                na216: function(){
                  var n2016a = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.ma16)/ 100) + parseFloat(this.ma15))* parseFloat(this.n26) * parseFloat(this.n126));
                  return this.f1(n2016a);
                  },
                na221:function() {
                  var n2021a = (parseFloat(this.n1) / parseFloat(this.n11) * parseFloat(this.n21) * parseFloat(this.ma18/ 100));
                  return this.f1(n2021a);
                  },
                na222:function() {
                  var n2022a = (parseFloat(this.n2) / parseFloat(this.n12) * parseFloat(this.n22) * (parseFloat(this.ma18)/ 100));
                  return this.f1(n2022a);
                  },
                na223:function() {
                  var n2023a = (parseFloat(this.n3) / parseFloat(this.n13) * parseFloat(this.n23) * (parseFloat(this.ma18)/ 100));
                  return this.f1(n2023a);
                  },
                na224:function() {
                  var n2024a = parseFloat((this.n4) / parseFloat(this.n14) * parseFloat(this.n24) * (parseFloat(this.ma18)/ 100));
                  return this.f1(n2024a);
                  },
                na225:function() {
                  var n2025a = (parseFloat(this.n5) / parseFloat(this.n15) * parseFloat(this.n25) * (parseFloat(this.ma18)/ 100));
                  return this.f1(n2025a);
                  },
                na226:function() {
                  var n2026a = (parseFloat(this.n6) / parseFloat(this.n16) * parseFloat(this.n26) * (parseFloat(this.ma18)/ 100));
                  return this.f1(n2026a);
                  },
                  n3000: function(){
                      return (parseFloat(this.na131) + parseFloat(this.na141) + parseFloat(this.na151) + parseFloat(this.na161) + parseFloat(this.na171) + parseFloat(this.na181) + parseFloat(this.na191) + parseFloat(this.na201) + parseFloat(this.na211) + parseFloat(this.na221));
                  },
                  n3001: function(){
                    if (this.n3000 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nn1 = (parseFloat(this.n3000) - parseFloat(this.na131) + (parseFloat(this.n1) / parseFloat(this.n11)));
                      return this.f1(nn1);
                    }
                  },
                  n3002: function(){
                    if (this.n3000 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nn2 = (parseFloat(this.n1) / parseFloat(this.n11) + parseFloat(this.n3000));
                      return this.f1(nn2);
                    }
                  },
                  n3003: function(){
                    return (parseFloat(this.na136) + parseFloat(this.na146) + parseFloat(this.na156) + parseFloat(this.na166) + parseFloat(this.na176) + parseFloat(this.na186) + parseFloat(this.na196)+ parseFloat(this.na206) + parseFloat(this.na216) + parseFloat(this.na226));
                  },
                  n3004: function(){
                    if (this.n3003 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nn3 = (parseFloat(this.n3003) - parseFloat(this.na136) - parseFloat(this.na166) + parseFloat(this.n6) / parseFloat(this.n16));
                      return this.f1(nn3);
                    }
                  },
                  n3005: function(){
                    if (this.n3003 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nn4 = (parseFloat(this.n6) / parseFloat(this.n16) + parseFloat(this.n3003));
                      return this.f1(nn4);
                    }
                  },
                  n3006:function(){
                    return (parseFloat(this.na132) + parseFloat(this.na142) + parseFloat(this.na152) + parseFloat(this.na162) + parseFloat(this.na172) + parseFloat(this.na182) + parseFloat(this.na192)+ parseFloat(this.na202) + parseFloat(this.na212) + parseFloat(this.na222));
                  },
                  n3007: function(){
                    if (this.n3006 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nn5 = (parseFloat(this.n3006) - parseFloat(this.na132) + parseFloat(this.n2 )/ parseFloat(this.n12));
                      return this.f1(nn5);
                    }
                  },
                  n3008: function(){
                    if (this.n3006 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nn6 = (parseFloat(this.n2) / parseFloat(this.n12) + parseFloat(this.n3006));
                      return this.f1(nn6);
                    }
                  },
                  n3009: function(){
                    return (parseFloat(this.na133) + parseFloat(this.na143) + parseFloat(this.na153) + parseFloat(this.na163) + parseFloat(this.na173) + parseFloat(this.na183) + parseFloat(this.na193) + parseFloat(this.na203) + parseFloat(this.na213) + parseFloat(this.na223));
                  },
                  n3010: function(){
                    if (this.n3009 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nn7 = (parseFloat(this.n3009) - parseFloat(this.na133) + parseFloat(this.n3) / parseFloat(this.n13));
                      return this.f1(nn7);
                    }
                  },
                  n3011: function(){
                    if (this.n3009 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nn8 = (parseFloat(this.n3) / parseFloat(this.n13) + parseFloat(this.n3009));
                      return this.f1(nn8);
                    }
                  },
                  n3012: function(){
                    return (parseFloat(this.na134) + parseFloat(this.na144) + parseFloat(this.na154) + parseFloat(this.na164) + parseFloat(this.na174) + parseFloat(this.na184) + parseFloat(this.na194)+ parseFloat(this.na204) + parseFloat(this.na214) + parseFloat(this.na224));
                  },
                  n3013: function(){
                    if (this.n3012 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nn9 = (parseFloat(this.n3012) - parseFloat(this.na134) + parseFloat(this.n4 )/ parseFloat(this.n14));
                      return this.f1(nn9);
                    }
                  },
                  n3014: function(){
                    if (this.n3012 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nn10 = (parseFloat(this.n4) / parseFloat(this.n14) + parseFloat(this.n3012));
                      return this.f1(nn10);
                    }
                  },
                  n3015: function(){
                    return (parseFloat(this.na135) + parseFloat(this.na145) + parseFloat(this.na155) + parseFloat(this.na165) + parseFloat(this.na175) + parseFloat(this.na185)+ parseFloat(this.na195)+ parseFloat(this.na205) + parseFloat(this.na215) + parseFloat(this.na225));
                  },
                  n3016: function(){
                    if (this.n3015 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nn11 = (parseFloat(this.n3015) - parseFloat(this.na135) + parseFloat(this.n5) / parseFloat(this.n15));
                      return this.f1(nn11);
                    }
                  },
                  n3017: function(){
                    if (this.n3015 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nn12 = (parseFloat(this.n5) / parseFloat(this.n15) + parseFloat(this.n3015));
                      return this.f1(nn12);
                    }
                  },

                  n1000b:function(){
                    return 0;
                  },
                  na1: function(){
                    return this.n1;
                  },
                  naa1:function(){
                    var statement = ((parseFloat(this.col21) * parseFloat(this.na4)) + (parseFloat(this.col22) * parseFloat(this.na5)));
                    var if1 = 0;
                    var if2 = 0;

                    if (statement < 300)
                    {
                        if2 = 300;
                    } else{
                        if2 = statement;
                    }
                    if( this.na1 == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = ((parseFloat(this.na1) / parseFloat(this.na2) * (parseFloat(this.col23) / 100) * (parseFloat(this.na4) + parseFloat(this.na5)) + parseFloat(if2))* parseFloat(this.na3));
                      }
                    return this.f1(if1);
                  },
                  naa2: function(){
                    var n142a = ((parseFloat(this.na1) / parseFloat(this.na2) * (parseFloat(this.ma20)/ 100) + parseFloat(this.ma19))* parseFloat(this.na3) * parseFloat(this.na6));
                    return this.f1(n142a);
                  },
                  naa3: function(){
                    var n142a = ((parseFloat(this.na1) / parseFloat(this.na2) * (parseFloat(this.ma22)/ 100) + parseFloat(this.ma21))* parseFloat(this.na3) * parseFloat(this.na7));
                    return this.f1(n142a);
                  },
                  naa4:function() {
                    var n142a = (160 + (parseFloat(this.na1) / parseFloat(this.na2) * (0.5/100)));
                    return this.f1(n142a);
                  },
                  naa5: function(){
                    var n142a = ((parseFloat(this.na1) / parseFloat(this.na2) * (parseFloat(this.ma26)/ 100) + parseFloat(this.ma25))* parseFloat(this.na3) * parseFloat(this.na9));
                    return this.f1(n142a);
                  },
                  naa6 : function() {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.na1 > 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.na1 > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.na1 < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }

                    if( this.na1 == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = (parseFloat(this.na1) / parseFloat(this.na2) * (parseFloat(this.ma28) / 100) + parseFloat(this.ma27) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.na3) * parseFloat(this.na10);
                    }
                    return this.f1(if1);
                  },
                  naa7: function(){
                    var n142a = ((parseFloat(this.na1) / parseFloat(this.na2) * (parseFloat(this.ma30)/ 100) + parseFloat(this.ma29))* parseFloat(this.na3) * parseFloat(this.na11));
                    return this.f1(n142a);
                  },
                  naa8: function() {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.na1 > 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.na1 > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.na1 < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }

                    if( this.na1 == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = (parseFloat(this.na1) / parseFloat(this.na2) * parseFloat(this.ma32) / 100 + parseFloat(this.ma31) + parseFloat(if2) + parseFloat(if4))* parseFloat(this.na3) * parseFloat(this.na12);
                    }
                    return this.f1(if1);
                  },
                  naa9: function(){
                    var n142a = ((parseFloat(this.na1) / parseFloat(this.na2) * (parseFloat(this.ma34)/ 100) + parseFloat(this.ma33))* parseFloat(this.na3) * parseFloat(this.na12));
                    return this.f1(n142a);
                  },
                  naa10: function() {
                    var n142a = (parseFloat(this.na1) / parseFloat(this.na2) / parseFloat(this.na3) * (parseFloat(this.ma36)/ 100));
                    return this.f1(n142a);
                  },
                  na3003:function(){
                    return (parseFloat(this.naa1) + parseFloat(this.naa2) + parseFloat(this.naa3) + parseFloat(this.naa4) + parseFloat(this.naa5) + parseFloat(this.naa6) + parseFloat(this.naa7) + parseFloat(this.naa8) + parseFloat(this.naa9) + parseFloat(this.naa10));
                  },
                  na3004: function() {
                    if (this.na3003 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nm1 = (parseFloat(this.na3003) - parseFloat(this.naa1) - parseFloat(this.naa4) + parseFloat(this.na1) / parseFloat(this.na2));
                      return this.f1(nm1);
                    }
                  },
                  na3005: function(){
                    if (this.na3003 == 0)
                    {
                      return 0;
                    }
                    else {
                      var nm2 = (parseFloat(this.na1) / parseFloat(this.na2) + parseFloat(this.na3003));
                      return this.f1(nm2);
                    }
                  },
            }
        });

</script>

@endsection
