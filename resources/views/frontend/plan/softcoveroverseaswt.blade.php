@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
    <h3>Soft Cover of Overseas(W&Turn)</h3><small>(For colour and flexi job)</small>
<div class="row col-md-12 " id="app">
  {!! Form::model($sales, array('route' => array('frontend.plan.softcoveroverseawtStore', $sales->id), 'method' => 'POST')) !!}
  <div class="col-md-10 col-md-offset-1">
    <table class="table table-bordered" id="users-table">
      <thead>
          <tr>
            <th>{!! Form::number('none1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n1000a', 'v-model'=>'n1000a', 'readonly'=>true)) !!}</th>
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
          <td>{!! Form::number('covOrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n1', 'v-model'=>"n1")) !!}</td>
          <td>{!! Form::number('t1OrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2', 'v-model'=>"n2")) !!}</td>
          <td>{!! Form::number('t2OrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n3', 'v-model'=>"n3")) !!}</td>
          <td>{!! Form::number('t3OrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n4', 'v-model'=>"n4")) !!}</td>
          <td>{!! Form::number('statOrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n5', 'v-model'=>"n5")) !!}</td>
          <td>{!! Form::number('flexiOrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>

        </tr>
        <tr>
          <td>Up(s) per sheet</td>
          <td>{!! Form::number('covUpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n11', 'v-model'=>"n11")) !!}</td>
          <td>{!! Form::number('t1UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n12', 'v-model'=>"n12")) !!}</td>
          <td>{!! Form::number('t2UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n13', 'v-model'=>"n13")) !!}</td>
          <td>{!! Form::number('t3UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n14', 'v-model'=>"n14")) !!}</td>
          <td>{!! Form::number('statUpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n15', 'v-model'=>"n15")) !!}</td>
          <td>{!! Form::number('flexiUpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>

        </tr>
        <tr>
          <td>Signature/Spread(s)</td>
          <td>{!! Form::number('covSignC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n21', 'v-model'=>"n21")) !!}</td>
          <td>{!! Form::number('t1signC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n22', 'v-model'=>"n22")) !!}</td>
          <td>{!! Form::number('t2signC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n23', 'v-model'=>"n23")) !!}</td>
          <td>{!! Form::number('t3signC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n24', 'v-model'=>"n24")) !!}</td>
          <td>{!! Form::number('statSignC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n25', 'v-model'=>"n25")) !!}</td>
          <td>{!! Form::number('flexiSignC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>

        </tr>
        <tr>
          <td>Front Color</td>
          <td>{!! Form::number('covFrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n31', 'v-model'=>"n31")) !!}</td>
          <td>{!! Form::number('t1FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n32', 'v-model'=>"n32")) !!}</td>
          <td>{!! Form::number('t2FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n33', 'v-model'=>"n33")) !!}</td>
          <td>{!! Form::number('t3FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n34', 'v-model'=>"n34")) !!}</td>
          <td>{!! Form::number('statFrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n35', 'v-model'=>"n35")) !!}</td>
          <td>{!! Form::number('flexiFrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>

        </tr>
        <tr>
          <td>Back Color</td>
          <td>{!! Form::number('covBackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n41', 'v-model'=>"n41")) !!}</td>
          <td>{!! Form::number('t1BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n42', 'v-model'=>"n42")) !!}</td>
          <td>{!! Form::number('t2BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n43', 'v-model'=>"n43")) !!}</td>
          <td>{!! Form::number('t3BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n44', 'v-model'=>"n44")) !!}</td>
          <td>{!! Form::number('statBackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n45', 'v-model'=>"n45")) !!}</td>
          <td>{!! Form::number('flexiBackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n46', 'v-model'=>"n46")) !!}</td>

        </tr>
        <tr><td></td></tr>
        <tr>
          <td>Surface Finishing</td>
          <td>{!! Form::number('covSurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n51', 'v-model'=>"n51")) !!}</td>
          <td>{!! Form::number('t1SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n52', 'v-model'=>"n52")) !!}</td>
          <td>{!! Form::number('t2SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n53', 'v-model'=>"n53")) !!}</td>
          <td>{!! Form::number('t3SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n54', 'v-model'=>"n54")) !!}</td>
          <td>{!! Form::number('statSurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n55', 'v-model'=>"n55")) !!}</td>
          <td>{!! Form::number('flexiSurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n56', 'v-model'=>"n56")) !!}</td>

        </tr>
        <tr>
          <td>Trimming/Cutting</td>
          <td>{!! Form::number('covTrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n61', 'v-model'=>"n61")) !!}</td>
          <td>{!! Form::number('t1TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n62', 'v-model'=>"n62")) !!}</td>
          <td>{!! Form::number('t2TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n63', 'v-model'=>"n63")) !!}</td>
          <td>{!! Form::number('t3TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n64', 'v-model'=>"n64")) !!}</td>
          <td>{!! Form::number('statTrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n65', 'v-model'=>"n65")) !!}</td>
          <td>{!! Form::number('flexiTrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n66', 'v-model'=>"n66")) !!}</td>

        </tr>
        <tr>
          <td>Diecut</td>
          <td>{!! Form::number('covDieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n71', 'v-model'=>"n71")) !!}</td>
          <td>{!! Form::number('t1DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n72', 'v-model'=>"n72")) !!}</td>
          <td>{!! Form::number('t2DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n73', 'v-model'=>"n73")) !!}</td>
          <td>{!! Form::number('t3DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n74', 'v-model'=>"n74")) !!}</td>
          <td>{!! Form::number('statDieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n75', 'v-model'=>"n75")) !!}</td>
          <td>{!! Form::number('flexiDieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n76', 'v-model'=>"n76")) !!}</td>

        </tr>
        <tr>
          <td>Stripping</td>
          <td>{!! Form::number('covStripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n81', 'v-model'=>"n81")) !!}</td>
          <td>{!! Form::number('t1StripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n82', 'v-model'=>"n82")) !!}</td>
          <td>{!! Form::number('t2StripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n83', 'v-model'=>"n83")) !!}</td>
          <td>{!! Form::number('t3stripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n84', 'v-model'=>"n84")) !!}</td>
          <td>{!! Form::number('statStripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n85', 'v-model'=>"n85")) !!}</td>
          <td>{!! Form::number('flexiStripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n86', 'v-model'=>"n86")) !!}</td>

        </tr>
        <tr>
          <td>Folding</td>
          <td>{!! Form::number('covFoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n91', 'v-model'=>"n91")) !!}</td>
          <td>{!! Form::number('t1FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n92', 'v-model'=>"n92")) !!}</td>
          <td>{!! Form::number('t2FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n93', 'v-model'=>"n93")) !!}</td>
          <td>{!! Form::number('t3FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n94', 'v-model'=>"n94")) !!}</td>
          <td>{!! Form::number('statFoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n95', 'v-model'=>"n95")) !!}</td>
          <td>{!! Form::number('flexiFoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n96', 'v-model'=>"n96")) !!}</td>

        </tr>
        <tr>
          <td>Sewing</td>
          <td>{!! Form::number('covSewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n101', 'v-model'=>"n101")) !!}</td>
          <td>{!! Form::number('t1SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n102', 'v-model'=>"n102")) !!}</td>
          <td>{!! Form::number('t2SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n103', 'v-model'=>"n103")) !!}</td>
          <td>{!! Form::number('t3SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n104', 'v-model'=>"n104")) !!}</td>
          <td>{!! Form::number('statSewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n105', 'v-model'=>"n105")) !!}</td>
          <td>{!! Form::number('flexiSewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n106', 'v-model'=>"n106")) !!}</td>

        </tr>
        <tr>
          <td>Binding</td>
          <td>{!! Form::number('covBindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n111', 'v-model'=>"n111")) !!}</td>
          <td>{!! Form::number('t1BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n112', 'v-model'=>"n112")) !!}</td>
          <td>{!! Form::number('t2BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n113', 'v-model'=>"n113")) !!}</td>
          <td>{!! Form::number('t3BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n114', 'v-model'=>"n114")) !!}</td>
          <td>{!! Form::number('statBindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n115', 'v-model'=>"n115")) !!}</td>
          <td>{!! Form::number('flexiBindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n116', 'v-model'=>"n116")) !!}</td>
        </tr>
        <tr>
          <td>3 Knife Trim</td>
          <td>{!! Form::number('cov3C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n121', 'v-model'=>"n121")) !!}</td>
          <td>{!! Form::number('t13C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n122', 'v-model'=>"n122")) !!}</td>
          <td>{!! Form::number('t23C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n123', 'v-model'=>"n123")) !!}</td>
          <td>{!! Form::number('t33C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n124', 'v-model'=>"n124")) !!}</td>
          <td>{!! Form::number('stat3C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n125', 'v-model'=>"n125")) !!}</td>
          <td>{!! Form::number('flexi3C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n126', 'v-model'=>"n126")) !!}</td>
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
          <td>{!! Form::text('covPrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na131', 'v-model'=>"na131", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1PrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na132', 'v-model'=>"na132", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2PrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na133', 'v-model'=>"na133", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3PrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na134', 'v-model'=>"na134", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statPrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na135', 'v-model'=>"na135", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiPrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na136', 'v-model'=>"na136", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Surface Finishing</td>
          <td>{!! Form::text('covSurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na141', 'v-model'=>"na141", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1SurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na142', 'v-model'=>"na142", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2SurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na143', 'v-model'=>"na143", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3SurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na144', 'v-model'=>"na144", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statSurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na145', 'v-model'=>"na145", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiSurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na146', 'v-model'=>"na146", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Trimming/Cutting</td>
          <td>{!! Form::text('covTrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na151', 'v-model'=>"na151", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1TrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na152', 'v-model'=>"na152", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2TrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na153', 'v-model'=>"na153", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3TrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na154', 'v-model'=>"na154", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statTrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na155', 'v-model'=>"na155", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiTrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na156', 'v-model'=>"na156", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Diecut</td>
          <td>{!! Form::text('covDieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na161', 'v-model'=>"na161", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1DieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na162', 'v-model'=>"na162", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2DieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na163', 'v-model'=>"na163", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3DieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na164', 'v-model'=>"na164", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statDieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na165', 'v-model'=>"na165", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiDieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na166', 'v-model'=>"na166", 'readonly'=>true)) !!}</td>
        <tr>
          <td>Stripping</td>
          <td>{!! Form::text('covStripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na171', 'v-model'=>"na171", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1StripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na172', 'v-model'=>"na172", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2StripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na173', 'v-model'=>"na173", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3stripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na174', 'v-model'=>"na174", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statStripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na175', 'v-model'=>"na175", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiStripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na176', 'v-model'=>"na176", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Folding</td>
          <td>{!! Form::text('covFoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na181', 'v-model'=>"na181", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1FoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na182', 'v-model'=>"na182", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2FoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na183', 'v-model'=>"na183", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3FoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na184', 'v-model'=>"na184", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statFoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na185', 'v-model'=>"na185", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiFoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na186', 'v-model'=>"na186", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Sewing</td>
          <td>{!! Form::text('covSewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na191', 'v-model'=>"na191", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1SewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na192', 'v-model'=>"na192", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2SewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na193', 'v-model'=>"na193", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3SewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na194', 'v-model'=>"na194", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statSewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na195', 'v-model'=>"na195", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiSewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na196', 'v-model'=>"na196", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Binding</td>
          <td>{!! Form::text('covBindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na201', 'v-model'=>"na201", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1BindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na202', 'v-model'=>"na202", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2BindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na203', 'v-model'=>"na203", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3BindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na204', 'v-model'=>"na204", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statBindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na205', 'v-model'=>"na205", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiBindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na206', 'v-model'=>"na206", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>3 Knife Trim</td>
          <td>{!! Form::text('cov3C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na211', 'v-model'=>"na211", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t13C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na212', 'v-model'=>"na212", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t23C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na213', 'v-model'=>"na213", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t33C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na214', 'v-model'=>"na214", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('stat3C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na215', 'v-model'=>"na215", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexi3C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na216', 'v-model'=>"na216", 'readonly'=>true)) !!}</td>
        </tr><tr>
          <td>Packing</td>
          <td>{!! Form::text('covPackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na221', 'v-model'=>"na221", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t1PackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na222', 'v-model'=>"na222", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t2PackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na223', 'v-model'=>"na223", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('t3PackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na224', 'v-model'=>"na224", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('statPackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na225', 'v-model'=>"na225", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('flexiPackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na226', 'v-model'=>"na226", 'readonly'=>true)) !!}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-md-6">
    <table class="table table-bordered">
        <tr>
          <td colspan="3">Paper+wastage qty </td>
          <td>Required qty</td>
          <td>Paper Supply</td>

        </tr>
        <tr>
          <td>Cover</td >
          <td>{!! Form::text('ccover', '', array('class' => 'form-control', 'id'=>'n3000', 'v-model'=>"n3000", 'readonly'=>true)) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ccoverready', '', array('class' => 'form-control', 'id'=>'n3001', 'v-model'=>"n3001", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('ccoverwaste', '', array('class' => 'form-control', 'id'=>'n3002', 'v-model'=>"n3002", 'readonly'=>true)) !!}</td>

        </tr>
        <tr>
          <td>Flexi</td>
          <td>{!! Form::text('bwcover', '', array('class' => 'form-control', 'id'=>'n3003', 'v-model'=>"n3003", 'readonly'=>true)) !!}</td>
          <td>Flexi Job</td>
          <td>{!! Form::text('bwcoverready', '', array('class' => 'form-control', 'id'=>'n3004', 'v-model'=>"n3004", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('bwcoverwaste', '', array('class' => 'form-control', 'id'=>'n3005', 'v-model'=>"n3005", 'readonly'=>true)) !!}</td>
        </tr>

        <tr>
          <td>Text 1</td>
          <td>{!! Form::text('ct1', '', array('class' => 'form-control', 'id'=>'n3006', 'v-model'=>"n3006", 'readonly'=>true)) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct1ready', '', array('class' => 'form-control', 'id'=>'n3007', 'v-model'=>"n3007", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('ct1waste', '', array('class' => 'form-control', 'id'=>'n3008', 'v-model'=>"n3008", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Text 2</td>
          <td>{!! Form::text('ct2', '', array('class' => 'form-control', 'id'=>'n3009', 'v-model'=>"n3009", 'readonly'=>true)) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct2ready', '', array('class' => 'form-control', 'id'=>'n3010', 'v-model'=>"n3010", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('ct2waste', '', array('class' => 'form-control', 'id'=>'n3011', 'v-model'=>"n3011", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Text 3</td>
          <td>{!! Form::text('ct3', '', array('class' => 'form-control', 'id'=>'n3012', 'v-model'=>"n3012", 'readonly'=>true)) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct3ready', '', array('class' => 'form-control', 'id'=>'n3013', 'v-model'=>"n3013", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('ct3waste', '', array('class' => 'form-control', 'id'=>'n3014', 'v-model'=>"n3014", 'readonly'=>true)) !!}</td>
        </tr>
        <tr>
          <td>Stickers</td>
          <td>{!! Form::text('csticker', '', array('class' => 'form-control', 'id'=>'n3015', 'v-model'=>"n3015", 'readonly'=>true)) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('cstickerready', '', array('class' => 'form-control', 'id'=>'n3016', 'v-model'=>"n3016", 'readonly'=>true)) !!}</td>
          <td>{!! Form::text('cstickerwaste', '', array('class' => 'form-control', 'id'=>'n3017', 'v-model'=>"n3017", 'readonly'=>true)) !!}</td>
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
        <td>{!! Form::number('surfMake', '', array('class' => 'form-control','min'=>'0', 'id'=>'ma1', 'v-model'=>"ma1")) !!}</td>
        <td>{!! Form::number('surfWaste', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma2', 'v-model'=>"ma2")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Trimming/Cutting</td>
        <td>{!! Form::number('trimMake', '', array('class' => 'form-control','min'=>'0', 'id'=>'ma3', 'v-model'=>"ma3")) !!}</td>
        <td>{!! Form::number('trimWaste', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma4', 'v-model'=>"ma4")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Diecut</td>
        <td>{!! Form::number('dieMake', '', array('class' => 'form-control','min'=>'0', 'id'=>'ma5', 'v-model'=>"ma5")) !!}</td>
        <td>{!! Form::number('dieWaste', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma6', 'v-model'=>"ma6")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Stripping</td>
        <td>{!! Form::number('stripMake', '', array('class' => 'form-control','min'=>'0', 'id'=>'ma7', 'v-model'=>"ma7")) !!}</td>
        <td>{!! Form::number('stripWaste', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma8', 'v-model'=>"ma8")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Folding</td>
        <td>{!! Form::number('foldMake', '', array('class' => 'form-control','min'=>'0', 'id'=>'ma9', 'v-model'=>"ma9")) !!}</td>
        <td>{!! Form::number('foldWaste', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma10', 'v-model'=>"ma10")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Sewing</td>
        <td>{!! Form::number('sewMake', '', array('class' => 'form-control', 'id'=>'ma11', 'v-model'=>"ma11")) !!}</td>
        <td>{!! Form::number('sewWaste', '', array('class' => 'form-control','step'=>"any",  'id'=>'ma12', 'v-model'=>"ma12")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Binding</td>
        <td>{!! Form::number('bindMake', '', array('class' => 'form-control','min'=>'0', 'id'=>'ma13', 'v-model'=>"ma13")) !!}</td>
        <td>{!! Form::number('bindWaste', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma14', 'v-model'=>"ma14")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">3 Knife Trim</td>
        <td>{!! Form::number('threeMake', '', array('class' => 'form-control','min'=>'0', 'id'=>'ma15', 'v-model'=>"ma15")) !!}</td>
        <td>{!! Form::number('threeWaste', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma16', 'v-model'=>"ma16")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Packing</td>
        <td>{!! Form::number('PackMake', '', array('class' => 'form-control','min'=>'0', 'id'=>'ma17', 'v-model'=>"ma17")) !!}</td>
        <td>{!! Form::number('packWaste', '', array('class' => 'form-control','step'=>"any", 'min'=>'0', 'id'=>'ma18', 'v-model'=>"ma18")) !!}</td>
      </tr>
    </table>
    </div>
    <div class="col-md-6">
      <table class="table table-bordered">
        <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFront', '', array('class' => 'form-control','min'=>'0', 'id'=>'col1', 'v-model'=>"col1")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Make ready per color - Back </td>
          <td>{!! Form::number('colMakeBack', '', array('class' => 'form-control','min'=>'0', 'id'=>'col2', 'v-model'=>"col2")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Waste % </td>
          <td>{!! Form::number('colWaste', '', array('class' => 'form-control','step'=>"any", 'id'=>'col3', 'v-model'=>"col3")) !!}</td>
        </tr>
        {{-- <tr>
          <td colspan="2">(BLA) Make ready per side</td>
          <td>{!! Form::number('blaMake', '', array('class' => 'form-control','min'=>'0', 'id'=>'col4', 'v-model'=>"col4")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(BLA) Waste %</td>
          <td>{!! Form::number('blaWaste', '', array('class' => 'form-control','step'=>"any", 'id'=>'col5', 'v-model'=>"col5")) !!}</td>
        </tr> --}}
      </table>
      <table class="table table-bordered">
        <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFront1', '', array('class' => 'form-control','min'=>'0', 'id'=>'col6', 'v-model'=>"col6")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Make ready per color - Back </td>
          <td>{!! Form::number('colMakeBack1', '', array('class' => 'form-control','min'=>'0', 'id'=>'col7', 'v-model'=>"col7")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Waste % </td>
          <td>{!! Form::number('colWaste1', '', array('class' => 'form-control','step'=>"any", 'id'=>'col8', 'v-model'=>"col8")) !!}</td>
        </tr>
        {{-- <tr>
          <td colspan="2">(BLA) Make ready per side</td>
          <td>{!! Form::number('blaMake1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'col9', 'v-model'=>"col9")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(BLA) Waste %</td>
          <td>{!! Form::number('blaWaste1', '', array('class' => 'form-control','step'=>"any", 'id'=>'col10', 'v-model'=>"col10")) !!}</td>
        </tr> --}}
      </table>

      <table class="table table-bordered">
        <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFront2', '', array('class' => 'form-control', 'min'=>'0','id'=>'col11', 'v-model'=>"col11")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Make ready per color - Back </td>
          <td>{!! Form::number('colMakeBack2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'col12', 'v-model'=>"col12")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Waste % </td>
          <td>{!! Form::number('colWaste2', '', array('class' => 'form-control', 'step'=>"any",'id'=>'col13', 'v-model'=>"col13")) !!}</td>
        </tr>
        {{-- <tr>
          <td colspan="2">(BLA) Make ready per side</td>
          <td>{!! Form::number('blaMake2', '', array('class' => 'form-control','min'=>'0' ,'id'=>'col14', 'v-model'=>"col14")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(BLA) Waste %</td>
          <td>{!! Form::number('blaWaste2', '', array('class' => 'form-control', 'step'=>"any",'id'=>'col15', 'v-model'=>"col15")) !!}</td>
        </tr> --}}
      </table>
      <table class="table table-bordered">
        <p>For Back Colour</p>
        <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFrontcovback', '', array('class' => 'form-control', 'min'=>'0','id'=>'cover1', 'v-model'=>"cover1")) !!}</td>
        </tr>
      </table>
    </div>
    <div class="col-md-12">
      <div class="col-md-5">
        <table class="table table-bordered" >
          <tbody>
              <tr>
                <th>{!! Form::number('none2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n1000b', 'v-model'=>'n1000b', 'readonly'=>true)) !!}</th>
              <tr>
                <th></th>
                <th>Flexi</th>
              </tr>
              <tr>
                <td>P. Order Qty</td>
                <td>{!! Form::number('flexiOrderC2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na1', 'v-model'=>"na1")) !!}</td>

              </tr>
              <tr>
                <td>Up(s) per sheet</td>
                <td>{!! Form::number('flexiUpC2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na2', 'v-model'=>"na2")) !!}</td>

              </tr>
              <tr>
                <td>Signature/Spread(s)</td>
                <td>{!! Form::number('flexiSignC2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na3', 'v-model'=>"na3")) !!}</td>

              </tr>
              <tr>
                <td>Front Color</td>
                <td>{!! Form::number('flexiFrontC2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na4', 'v-model'=>"na4")) !!}</td>

              </tr>
              <tr>
                <td>Back Color</td>
                <td>{!! Form::number('flexiBackC2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na5', 'v-model'=>"na5")) !!}</td>

              </tr>
              <tr><td></td></tr>
              <tr>
                <td>Surface Finishing</td>
                <td>{!! Form::number('flexiSurfC2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na6', 'v-model'=>"na6")) !!}</td>

              </tr>
              <tr>
                <td>Trimming/Cutting</td>
                <td>{!! Form::number('flexiTrimC2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na7', 'v-model'=>"na7")) !!}</td>

              </tr>
              <tr>
                <td>Diecut</td>
                <td>{!! Form::number('flexiDieC2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na8', 'v-model'=>"na8")) !!}</td>

              </tr>
              <tr>
                <td>Stripping</td>
                <td>{!! Form::number('flexiStripC2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na9', 'v-model'=>"na9")) !!}</td>

              </tr>
              <tr>
                <td>Folding</td>
                <td>{!! Form::number('flexiFoldC2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na10', 'v-model'=>"na10")) !!}</td>

              </tr>
              <tr>
                <td>Sewing</td>
                <td>{!! Form::number('flexiSewC2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na11', 'v-model'=>"na11")) !!}</td>

              </tr>
              <tr>
                <td>Binding</td>
                <td>{!! Form::number('flexiBindC2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na12', 'v-model'=>"na12")) !!}</td>
              </tr>
              <tr>
                <td>3 Knife Trim</td>
                <td>{!! Form::number('flexi3C2', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na13', 'v-model'=>"na13")) !!}</td>
              </tr>
          </tbody>
        </table>
          </div>
          <div class="col-md-5">
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
                  <td>{!! Form::text('flexiPrintC3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'naa1', 'v-model'=>"naa1", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>Surface Finishing</td>
                  <td>{!! Form::text('flexiSurfC3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'naa2', 'v-model'=>"naa2", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>Trimming/Cutting</td>
                  <td>{!! Form::text('flexiTrimC3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'naa3', 'v-model'=>"naa3", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>Diecut</td>
                  <td>{!! Form::text('flexiDieC3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'naa4', 'v-model'=>"naa4", 'readonly'=>true)) !!}</td>
                <tr>
                  <td>Stripping</td>
                  <td>{!! Form::text('flexiStripC3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'naa5', 'v-model'=>"naa5", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>Folding</td>
                  <td>{!! Form::text('flexiFoldC3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'naa6', 'v-model'=>"naa6", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>Sewing</td>
                  <td>{!! Form::text('flexiSewC3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'naa7', 'v-model'=>"naa7", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>Binding</td>
                  <td>{!! Form::text('flexiBindC3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'naa8', 'v-model'=>"naa8", 'readonly'=>true)) !!}</td>
                </tr>
                <tr>
                  <td>3 Knife Trim</td>
                  <td>{!! Form::text('flexi3C3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'naa9', 'v-model'=>"naa9", 'readonly'=>true)) !!}</td>
                </tr><tr>
                  <td>Packing</td>
                  <td>{!! Form::text('flexiPackC3', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'naa10', 'v-model'=>"naa10", 'readonly'=>true)) !!}</td>
                </tr>
              </tbody>
            </table>
          </div>
          {{-- <div class="col-md-4">
            <table></table>
          </div> --}}
        </div>
        <div class="col-md-12">
          <div class="col-md-6">
            <table class="table table-bordered">
                <tr>
                  <td colspan="3">Paper+wastage qty </td>
                  <td>Required qty</td>
                  <td>Paper Supply</td>

                </tr>
                {{-- <tr>
                  <td>Cover</td >
                  <td>{!! Form::number('ccover1', '', array('class' => 'form-control', 'id'=>'na3000', 'v-model'=>"na3000")) !!}</td>
                  <td>Color Job</td>
                  <td>{!! Form::number('ccoverwaste1', '', array('class' => 'form-control', 'id'=>'na3001', 'v-model'=>"na3001")) !!}</td>
                  <td>{!! Form::number('ccoverwaste1', '', array('class' => 'form-control', 'id'=>'na3002', 'v-model'=>"na3002")) !!}</td>

                </tr> --}}
                <tr>
                  <td>Flexi</td>
                  <td>{!! Form::text('flexicover1', '', array('class' => 'form-control', 'id'=>'na3003', 'v-model'=>"na3003", 'readonly'=>true)) !!}</td>
                  <td>Flexi Job</td>
                  <td>{!! Form::text('flexicoverready1', '', array('class' => 'form-control', 'id'=>'na3004', 'v-model'=>"na3004", 'readonly'=>true)) !!}</td>
                  <td>{!! Form::text('flexicoverwaste1', '', array('class' => 'form-control', 'id'=>'na3005', 'v-model'=>"na3005", 'readonly'=>true)) !!}</td>
                </tr>

                {{-- <tr>
                  <td>Text 1</td>
                  <td>{!! Form::number('ct11', '', array('class' => 'form-control', 'id'=>'na3006', 'v-model'=>"na3006")) !!}</td>
                  <td>Color Job</td>
                  <td>{!! Form::number('ct1ready1', '', array('class' => 'form-control', 'id'=>'na3007', 'v-model'=>"na3007")) !!}</td>
                  <td>{!! Form::number('ct1waste1', '', array('class' => 'form-control', 'id'=>'na3008', 'v-model'=>"na3008")) !!}</td>
                </tr>
                <tr>
                  <td>Text 2</td>
                  <td>{!! Form::number('ct21', '', array('class' => 'form-control', 'id'=>'na3009', 'v-model'=>"na3009")) !!}</td>
                  <td>Color Job</td>
                  <td>{!! Form::number('ct2ready1', '', array('class' => 'form-control', 'id'=>'na3010', 'v-model'=>"na3010")) !!}</td>
                  <td>{!! Form::number('ct2waste1', '', array('class' => 'form-control', 'id'=>'na3011', 'v-model'=>"na3011")) !!}</td>
                </tr>
                <tr>
                  <td>Text 3</td>
                  <td>{!! Form::number('ct31', '', array('class' => 'form-control', 'id'=>'na3012', 'v-model'=>"na3012")) !!}</td>
                  <td>Color Job</td>
                  <td>{!! Form::number('ct3ready1', '', array('class' => 'form-control', 'id'=>'na3013', 'v-model'=>"na3013")) !!}</td>
                  <td>{!! Form::number('ct3waste1', '', array('class' => 'form-control', 'id'=>'na3014', 'v-model'=>"na3014")) !!}</td>
                </tr>
                <tr>
                  <td>Stickers</td>
                  <td>{!! Form::number('csticker1', '', array('class' => 'form-control', 'id'=>'na3015', 'v-model'=>"na3015")) !!}</td>
                  <td>Color Job</td>
                  <td>{!! Form::number('cstickerready1', '', array('class' => 'form-control', 'id'=>'na3016', 'v-model'=>"na3016")) !!}</td>
                  <td>{!! Form::number('cstickerwaste1', '', array('class' => 'form-control', 'id'=>'na3017', 'v-model'=>"na3017")) !!}</td>
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
                <td>{!! Form::number('surfMake1', '', array('class' => 'form-control', 'id'=>'ma19', 'v-model'=>"ma19")) !!}</td>
                <td>{!! Form::number('surfWaste1', '', array('class' => 'form-control','step'=>"any", 'id'=>'ma20', 'v-model'=>"ma20")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Trimming/Cutting</td>
                <td>{!! Form::number('trimMake1', '', array('class' => 'form-control', 'id'=>'ma21', 'v-model'=>"ma21")) !!}</td>
                <td>{!! Form::number('trimWaste1', '', array('class' => 'form-control','step'=>"any", 'id'=>'ma22', 'v-model'=>"ma22")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Diecut</td>
                <td>{!! Form::number('dieMake1', '', array('class' => 'form-control', 'id'=>'ma23', 'v-model'=>"ma23")) !!}</td>
                <td>{!! Form::number('dieWaste1', '', array('class' => 'form-control','step'=>"any", 'id'=>'ma24', 'v-model'=>"ma24")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Stripping</td>
                <td>{!! Form::number('stripMake1', '', array('class' => 'form-control', 'id'=>'ma25', 'v-model'=>"ma25")) !!}</td>
                <td>{!! Form::number('stripWaste1', '', array('class' => 'form-control','step'=>"any", 'id'=>'ma26', 'v-model'=>"ma26")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Folding</td>
                <td>{!! Form::number('foldMake1', '', array('class' => 'form-control', 'id'=>'ma27', 'v-model'=>"ma27")) !!}</td>
                <td>{!! Form::number('foldWaste1', '', array('class' => 'form-control','step'=>"any", 'id'=>'ma28', 'v-model'=>"ma28")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Sewing</td>
                <td>{!! Form::number('sewMake1', '', array('class' => 'form-control', 'id'=>'ma29', 'v-model'=>"ma29")) !!}</td>
                <td>{!! Form::number('sewWaste1', '', array('class' => 'form-control','step'=>"any", 'id'=>'ma30', 'v-model'=>"ma30")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Binding</td>
                <td>{!! Form::number('bindMake1', '', array('class' => 'form-control', 'id'=>'ma31', 'v-model'=>"ma31")) !!}</td>
                <td>{!! Form::number('bindWaste1', '', array('class' => 'form-control','step'=>"any", 'id'=>'ma32', 'v-model'=>"ma32")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">3 Knife Trim</td>
                <td>{!! Form::number('threeMake1', '', array('class' => 'form-control', 'id'=>'ma33', 'v-model'=>"ma33")) !!}</td>
                <td>{!! Form::number('threeWaste1', '', array('class' => 'form-control','step'=>"any", 'id'=>'ma34', 'v-model'=>"ma34")) !!}</td>
              </tr>
              <tr>
                <td colspan="2">Packing</td>
                <td>{!! Form::number('PackMake1', '', array('class' => 'form-control', 'id'=>'ma35', 'v-model'=>"ma35")) !!}</td>
                <td>{!! Form::number('packWaste1', '', array('class' => 'form-control','step'=>"any", 'id'=>'ma36', 'v-model'=>"ma36")) !!}</td>
              </tr>
            </table>
            </div>
            <div class="col-md-6">
              <table class="table table-bordered">
                <tr>
                  <td colspan="2">(COL) Make ready per color - Front </td>
                  <td>{!! Form::number('colMakeFront3', '', array('class' => 'form-control', 'id'=>'col16', 'v-model'=>"col16")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Make ready per color - Back </td>
                  <td>{!! Form::number('colMakeBack3', '', array('class' => 'form-control', 'id'=>'col17', 'v-model'=>"col17")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Waste % </td>
                  <td>{!! Form::number('colWaste3', '', array('class' => 'form-control','step'=>"any", 'id'=>'col18', 'v-model'=>"col18")) !!}</td>
                </tr>
                {{-- <tr>
                  <td colspan="2">(BLA) Make ready per side</td>
                  <td>{!! Form::number('blaMake3', '', array('class' => 'form-control', 'id'=>'col19', 'v-model'=>"col19")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(BLA) Waste %</td>
                  <td>{!! Form::number('blaWaste3', '', array('class' => 'form-control','step'=>"any", 'id'=>'col20', 'v-model'=>"col20")) !!}</td>
                </tr> --}}
              </table>

              <table class="table table-bordered">
                <tr>
                  <td colspan="2">(COL) Make ready per color - Front </td>
                  <td>{!! Form::number('colMakeFront4', '', array('class' => 'form-control', 'id'=>'col21', 'v-model'=>"col21")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Make ready per color - Back </td>
                  <td>{!! Form::number('colMakeBack4', '', array('class' => 'form-control', 'id'=>'col22', 'v-model'=>"col22")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Waste % </td>
                  <td>{!! Form::number('colWaste4', '', array('class' => 'form-control','step'=>"any", 'id'=>'col23', 'v-model'=>"col23")) !!}</td>
                </tr>
                {{-- <tr>
                  <td colspan="2">(BLA) Make ready per side</td>
                  <td>{!! Form::number('blaMake4', '', array('class' => 'form-control', 'id'=>'col24', 'v-model'=>"col24")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(BLA) Waste %</td>
                  <td>{!! Form::number('blaWaste4', '', array('class' => 'form-control','step'=>"any", 'id'=>'col25', 'v-model'=>"col25")) !!}</td>
                </tr> --}}
              </table>

              <table class="table table-bordered">
                <tr>
                  <td colspan="2">(COL) Make ready per color - Front </td>
                  <td>{!! Form::number('colMakeFront5', '', array('class' => 'form-control', 'id'=>'col26', 'v-model'=>"col26")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Make ready per color - Back </td>
                  <td>{!! Form::number('colMakeBack5', '', array('class' => 'form-control', 'id'=>'col27', 'v-model'=>"col27")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(COL) Waste % </td>
                  <td>{!! Form::number('colWaste5', '', array('class' => 'form-control','step'=>"any", 'id'=>'col28', 'v-model'=>"col28")) !!}</td>
                </tr>
                {{-- <tr>
                  <td colspan="2">(BLA) Make ready per side</td>
                  <td>{!! Form::number('blaMake5', '', array('class' => 'form-control', 'id'=>'col29', 'v-model'=>"col29")) !!}</td>
                </tr>
                <tr>
                  <td colspan="2">(BLA) Waste %</td>
                  <td>{!! Form::number('blaWaste5', '', array('class' => 'form-control','step'=>"any", 'id'=>'col30', 'v-model'=>"col30")) !!}</td>
                </tr> --}}
              </table>
              <table class="table table-bordered">
              <p>For Back Colour</p>
                <tr>
                  <td colspan="2">(COL) Make ready per color - Front </td>
                  <td>{!! Form::number('colMakeFrontcovback1', '', array('class' => 'form-control', 'min'=>'0','id'=>'cover11', 'v-model'=>"cover11")) !!}</td>
                </tr>
              </table>
            </div>
        </div>
        <div class="form-group row">
        <button type="submit" class="btn btn-success btn-block" >SAVE </button>
        </div>
    {!! Form::close()!!}
</div> {{-- end of id app --}}

@endsection
