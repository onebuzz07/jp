@extends('frontend.layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/planning.css') }}" />
@section('content')
 <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
   <h3>Soft Cover of Overseas(F and B)</h3><small>(For colour and flexi job)</small>
<div class="row col-md-12 " id="app">
 {!! Form::model($overseasfb, array('route' => array('frontend.plan.softcoveroverseaspreview', $overseasfb->id), 'method' => 'PUT')) !!}
 <div class="col-md-8 ">
   <table class="table table-bordered" id="users-table">
     <thead>
         <tr>
           <th>{!! Form::text('none1', $overseasfb->none1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n1000a', 'v-model'=>'n1000a')) !!}</th>
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
           <th>text1</th>
           <th>text2</th>
           <th>text3</th>
           <th>Sticker</th>
           <th>Flexi</th>

         </tr>

     </thead>
     <tbody>
       <tr>
         <td>P. Order Qty</td>
         <td>{!! Form::text('covOrderC', $overseasfb->covOrderC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n1', 'v-model'=>"n1")) !!}</td>
         <td>{!! Form::text('t1OrderC', $overseasfb->t1OrderC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2', 'v-model'=>"n2")) !!}</td>
         <td>{!! Form::text('t2OrderC', $overseasfb->t2OrderC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n3', 'v-model'=>"n3")) !!}</td>
         <td>{!! Form::text('t3OrderC', $overseasfb->t3OrderC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n4', 'v-model'=>"n4")) !!}</td>
         <td>{!! Form::text('statOrderC', $overseasfb->statOrderC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n5', 'v-model'=>"n5")) !!}</td>
         <td>{!! Form::text('flexiOrderC', $overseasfb->flexiOrderC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>

       </tr>
       <tr>
         <td>Up(s) per sheet</td>
         <td>{!! Form::text('covUpC', $overseasfb->covUpC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n11', 'v-model'=>"n11")) !!}</td>
         <td>{!! Form::text('t1UpC', $overseasfb->t1UpC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n12', 'v-model'=>"n12")) !!}</td>
         <td>{!! Form::text('t2UpC', $overseasfb->t2UpC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n13', 'v-model'=>"n13")) !!}</td>
         <td>{!! Form::text('t3UpC', $overseasfb->t3UpC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n14', 'v-model'=>"n14")) !!}</td>
         <td>{!! Form::text('statUpC', $overseasfb->statUpC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n15', 'v-model'=>"n15")) !!}</td>
         <td>{!! Form::text('flexiUpC', $overseasfb->flexiUpC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>

       </tr>
       <tr>
         <td>Signature/Spread(s)</td>
         <td>{!! Form::text('covSignC', $overseasfb->covSignC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n21', 'v-model'=>"n21")) !!}</td>
         <td>{!! Form::text('t1signC', $overseasfb->t1signC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n22', 'v-model'=>"n22")) !!}</td>
         <td>{!! Form::text('t2signC', $overseasfb->t2signC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n23', 'v-model'=>"n23")) !!}</td>
         <td>{!! Form::text('t3signC', $overseasfb->t3signC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n24', 'v-model'=>"n24")) !!}</td>
         <td>{!! Form::text('statSignC', $overseasfb->statSignC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n25', 'v-model'=>"n25")) !!}</td>
         <td>{!! Form::text('flexiSignC', $overseasfb->flexiSignC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>

       </tr>
       <tr>
         <td>Front Color</td>
         <td>{!! Form::text('covFrontC', $overseasfb->covFrontC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n31', 'v-model'=>"n31")) !!}</td>
         <td>{!! Form::text('t1FrontC', $overseasfb->t1FrontC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n32', 'v-model'=>"n32")) !!}</td>
         <td>{!! Form::text('t2FrontC', $overseasfb->t2FrontC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n33', 'v-model'=>"n33")) !!}</td>
         <td>{!! Form::text('t3FrontC', $overseasfb->t3FrontC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n34', 'v-model'=>"n34")) !!}</td>
         <td>{!! Form::text('statFrontC', $overseasfb->statFrontC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n35', 'v-model'=>"n35")) !!}</td>
         <td>{!! Form::text('flexiFrontC', $overseasfb->flexiFrontC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>

       </tr>
       <tr>
         <td>Back Color</td>
         <td>{!! Form::text('covBackC', $overseasfb->covBackC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n41', 'v-model'=>"n41")) !!}</td>
         <td>{!! Form::text('t1BackC', $overseasfb->t1BackC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n42', 'v-model'=>"n42")) !!}</td>
         <td>{!! Form::text('t2BackC', $overseasfb->t2BackC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n43', 'v-model'=>"n43")) !!}</td>
         <td>{!! Form::text('t3BackC', $overseasfb->t3BackC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n44', 'v-model'=>"n44")) !!}</td>
         <td>{!! Form::text('statBackC', $overseasfb->statBackC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n45', 'v-model'=>"n45")) !!}</td>
         <td>{!! Form::text('flexiBackC', $overseasfb->flexiBackC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n46', 'v-model'=>"n46")) !!}</td>

       </tr>
       <tr><td></td></tr>
       <tr>
         <td>Surface Finishing</td>
         <td>{!! Form::text('covSurfC', $overseasfb->covSurfC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n51', 'v-model'=>"n51")) !!}</td>
         <td>{!! Form::text('t1SurfC', $overseasfb->t1SurfC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n52', 'v-model'=>"n52")) !!}</td>
         <td>{!! Form::text('t2SurfC', $overseasfb->t2SurfC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n53', 'v-model'=>"n53")) !!}</td>
         <td>{!! Form::text('t3SurfC', $overseasfb->t3SurfC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n54', 'v-model'=>"n54")) !!}</td>
         <td>{!! Form::text('statSurfC', $overseasfb->statSurfC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n55', 'v-model'=>"n55")) !!}</td>
         <td>{!! Form::text('flexiSurfC', $overseasfb->flexiSurfC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n56', 'v-model'=>"n56")) !!}</td>

       </tr>
       <tr>
         <td>Trimming/Cutting</td>
         <td>{!! Form::text('covTrimC', $overseasfb->covTrimC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n61', 'v-model'=>"n61")) !!}</td>
         <td>{!! Form::text('t1TrimC', $overseasfb->t1TrimC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n62', 'v-model'=>"n62")) !!}</td>
         <td>{!! Form::text('t2TrimC', $overseasfb->t2TrimC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n63', 'v-model'=>"n63")) !!}</td>
         <td>{!! Form::text('t3TrimC', $overseasfb->t3TrimC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n64', 'v-model'=>"n64")) !!}</td>
         <td>{!! Form::text('statTrimC', $overseasfb->statTrimC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n65', 'v-model'=>"n65")) !!}</td>
         <td>{!! Form::text('flexiTrimC', $overseasfb->flexiTrimC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n66', 'v-model'=>"n66")) !!}</td>

       </tr>
       <tr>
         <td>Diecut</td>
         <td>{!! Form::text('covDieC', $overseasfb->covDieC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n71', 'v-model'=>"n71")) !!}</td>
         <td>{!! Form::text('t1DieC', $overseasfb->t1DieC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n72', 'v-model'=>"n72")) !!}</td>
         <td>{!! Form::text('t2DieC', $overseasfb->t2DieC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n73', 'v-model'=>"n73")) !!}</td>
         <td>{!! Form::text('t3DieC', $overseasfb->t3DieC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n74', 'v-model'=>"n74")) !!}</td>
         <td>{!! Form::text('statDieC', $overseasfb->statDieC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n75', 'v-model'=>"n75")) !!}</td>
         <td>{!! Form::text('flexiDieC', $overseasfb->flexiDieC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n76', 'v-model'=>"n76")) !!}</td>

       </tr>
       <tr>
         <td>Stripping</td>
         <td>{!! Form::text('covStripC', $overseasfb->covStripC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n81', 'v-model'=>"n81")) !!}</td>
         <td>{!! Form::text('t1StripC', $overseasfb->t1StripC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n82', 'v-model'=>"n82")) !!}</td>
         <td>{!! Form::text('t2StripC', $overseasfb->t2StripC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n83', 'v-model'=>"n83")) !!}</td>
         <td>{!! Form::text('t3stripC', $overseasfb->t3stripC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n84', 'v-model'=>"n84")) !!}</td>
         <td>{!! Form::text('statStripC', $overseasfb->statStripC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n85', 'v-model'=>"n85")) !!}</td>
         <td>{!! Form::text('flexiStripC', $overseasfb->flexiStripC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n86', 'v-model'=>"n86")) !!}</td>

       </tr>
       <tr>
         <td>Folding</td>
         <td>{!! Form::text('covFoldC', $overseasfb->covFoldC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n91', 'v-model'=>"n91")) !!}</td>
         <td>{!! Form::text('t1FoldC', $overseasfb->t1FoldC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n92', 'v-model'=>"n92")) !!}</td>
         <td>{!! Form::text('t2FoldC', $overseasfb->t2FoldC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n93', 'v-model'=>"n93")) !!}</td>
         <td>{!! Form::text('t3FoldC', $overseasfb->t3FoldC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n94', 'v-model'=>"n94")) !!}</td>
         <td>{!! Form::text('statFoldC', $overseasfb->statFoldC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n95', 'v-model'=>"n95")) !!}</td>
         <td>{!! Form::text('flexiFoldC', $overseasfb->flexiFoldC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n96', 'v-model'=>"n96")) !!}</td>

       </tr>
       <tr>
         <td>Sewing</td>
         <td>{!! Form::text('covSewC', $overseasfb->covSewC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n101', 'v-model'=>"n101")) !!}</td>
         <td>{!! Form::text('t1SewC', $overseasfb->t1SewC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n102', 'v-model'=>"n102")) !!}</td>
         <td>{!! Form::text('t2SewC', $overseasfb->t2SewC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n103', 'v-model'=>"n103")) !!}</td>
         <td>{!! Form::text('t3SewC', $overseasfb->t3SewC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n104', 'v-model'=>"n104")) !!}</td>
         <td>{!! Form::text('statSewC', $overseasfb->statSewC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n105', 'v-model'=>"n105")) !!}</td>
         <td>{!! Form::text('flexiSewC', $overseasfb->flexiSewC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n106', 'v-model'=>"n106")) !!}</td>

       </tr>
       <tr>
         <td>Binding</td>
         <td>{!! Form::text('covBindC', $overseasfb->covBindC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n111', 'v-model'=>"n111")) !!}</td>
         <td>{!! Form::text('t1BindC', $overseasfb->t1BindC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n112', 'v-model'=>"n112")) !!}</td>
         <td>{!! Form::text('t2BindC', $overseasfb->t2BindC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n113', 'v-model'=>"n113")) !!}</td>
         <td>{!! Form::text('t3BindC', $overseasfb->t3BindC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n114', 'v-model'=>"n114")) !!}</td>
         <td>{!! Form::text('statBindC', $overseasfb->statBindC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n115', 'v-model'=>"n115")) !!}</td>
         <td>{!! Form::text('flexiBindC', $overseasfb->flexiBindC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n116', 'v-model'=>"n116")) !!}</td>
       </tr>
       <tr>
         <td>3 Knife Trim</td>
         <td>{!! Form::text('cov3C', $overseasfb->cov3C, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n121', 'v-model'=>"n121")) !!}</td>
         <td>{!! Form::text('t13C', $overseasfb->t13C, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n122', 'v-model'=>"n122")) !!}</td>
         <td>{!! Form::text('t23C', $overseasfb->t23C, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n123', 'v-model'=>"n123")) !!}</td>
         <td>{!! Form::text('t33C', $overseasfb->t33C, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n124', 'v-model'=>"n124")) !!}</td>
         <td>{!! Form::text('stat3C', $overseasfb->stat3C, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n125', 'v-model'=>"n125")) !!}</td>
         <td>{!! Form::text('flexi3C', $overseasfb->flexi3C, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n126', 'v-model'=>"n126")) !!}</td>
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
           <th>text1</th>
           <th>text2</th>
           <th>text3</th>
           <th>Sticker</th>
           <th>Flexi</th>

         </tr>
     </thead>
     <tbody>

       <tr>
         <td>Printing</td>
         <td>{!! Form::text('covPrintC1', $overseasfb->covPrintC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na131', 'v-model'=>"na131")) !!}</td>
         <td>{!! Form::text('t1PrintC1', $overseasfb->t1PrintC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na132', 'v-model'=>"na132")) !!}</td>
         <td>{!! Form::text('t2PrintC1', $overseasfb->t2PrintC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na133', 'v-model'=>"na133")) !!}</td>
         <td>{!! Form::text('t3PrintC1', $overseasfb->t3PrintC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na134', 'v-model'=>"na134")) !!}</td>
         <td>{!! Form::text('statPrintC1', $overseasfb->statPrintC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na135', 'v-model'=>"na135")) !!}</td>
         <td>{!! Form::text('flexiPrintC1', $overseasfb->flexiPrintC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na136', 'v-model'=>"na136")) !!}</td>
       </tr>
       <tr>
         <td>Surface Finishing</td>
         <td>{!! Form::text('covSurfC1', $overseasfb->covSurfC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na141', 'v-model'=>"na141")) !!}</td>
         <td>{!! Form::text('t1SurfC1', $overseasfb->t1SurfC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na142', 'v-model'=>"na142")) !!}</td>
         <td>{!! Form::text('t2SurfC1', $overseasfb->t2SurfC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na143', 'v-model'=>"na143")) !!}</td>
         <td>{!! Form::text('t3SurfC1', $overseasfb->t3SurfC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na144', 'v-model'=>"na144")) !!}</td>
         <td>{!! Form::text('statSurfC1', $overseasfb->statSurfC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na145', 'v-model'=>"na145")) !!}</td>
         <td>{!! Form::text('flexiSurfC1', $overseasfb->flexiSurfC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na146', 'v-model'=>"na146")) !!}</td>
       </tr>
       <tr>
         <td>Trimming/Cutting</td>
         <td>{!! Form::text('covTrimC1', $overseasfb->covTrimC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na151', 'v-model'=>"na151")) !!}</td>
         <td>{!! Form::text('t1TrimC1', $overseasfb->t1TrimC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na152', 'v-model'=>"na152")) !!}</td>
         <td>{!! Form::text('t2TrimC1', $overseasfb->t2TrimC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na153', 'v-model'=>"na153")) !!}</td>
         <td>{!! Form::text('t3TrimC1', $overseasfb->t3TrimC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na154', 'v-model'=>"na154")) !!}</td>
         <td>{!! Form::text('statTrimC1', $overseasfb->statTrimC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na155', 'v-model'=>"na155")) !!}</td>
         <td>{!! Form::text('flexiTrimC1', $overseasfb->flexiTrimC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na156', 'v-model'=>"na156")) !!}</td>
       </tr>
       <tr>
         <td>Diecut</td>
         <td>{!! Form::text('covDieC1', $overseasfb->covDieC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na161', 'v-model'=>"na161")) !!}</td>
         <td>{!! Form::text('t1DieC1', $overseasfb->t1DieC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na162', 'v-model'=>"na162")) !!}</td>
         <td>{!! Form::text('t2DieC1', $overseasfb->t2DieC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na163', 'v-model'=>"na163")) !!}</td>
         <td>{!! Form::text('t3DieC1', $overseasfb->t3DieC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na164', 'v-model'=>"na164")) !!}</td>
         <td>{!! Form::text('statDieC1', $overseasfb->statDieC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na165', 'v-model'=>"na165")) !!}</td>
         <td>{!! Form::text('flexiDieC1', $overseasfb->flexiDieC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na166', 'v-model'=>"na166")) !!}</td>
       <tr>
         <td>Stripping</td>
         <td>{!! Form::text('covStripC1', $overseasfb->covStripC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na171', 'v-model'=>"na171")) !!}</td>
         <td>{!! Form::text('t1StripC1', $overseasfb->t1StripC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na172', 'v-model'=>"na172")) !!}</td>
         <td>{!! Form::text('t2StripC1', $overseasfb->t2StripC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na173', 'v-model'=>"na173")) !!}</td>
         <td>{!! Form::text('t3stripC1', $overseasfb->t3stripC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na174', 'v-model'=>"na174")) !!}</td>
         <td>{!! Form::text('statStripC1', $overseasfb->statStripC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na175', 'v-model'=>"na175")) !!}</td>
         <td>{!! Form::text('flexiStripC1', $overseasfb->flexiStripC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na176', 'v-model'=>"na176")) !!}</td>
       </tr>
       <tr>
         <td>Folding</td>
         <td>{!! Form::text('covFoldC1', $overseasfb->covFoldC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na181', 'v-model'=>"na181")) !!}</td>
         <td>{!! Form::text('t1FoldC1', $overseasfb->t1FoldC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na182', 'v-model'=>"na182")) !!}</td>
         <td>{!! Form::text('t2FoldC1', $overseasfb->t2FoldC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na183', 'v-model'=>"na183")) !!}</td>
         <td>{!! Form::text('t3FoldC1', $overseasfb->t3FoldC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na184', 'v-model'=>"na184")) !!}</td>
         <td>{!! Form::text('statFoldC1', $overseasfb->statFoldC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na185', 'v-model'=>"na185")) !!}</td>
         <td>{!! Form::text('flexiFoldC1', $overseasfb->flexiFoldC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na186', 'v-model'=>"na186")) !!}</td>
       </tr>
       <tr>
         <td>Sewing</td>
         <td>{!! Form::text('covSewC1', $overseasfb->covSewC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na191', 'v-model'=>"na191")) !!}</td>
         <td>{!! Form::text('t1SewC1', $overseasfb->t1SewC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na192', 'v-model'=>"na192")) !!}</td>
         <td>{!! Form::text('t2SewC1', $overseasfb->t2SewC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na193', 'v-model'=>"na193")) !!}</td>
         <td>{!! Form::text('t3SewC1', $overseasfb->t3SewC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na194', 'v-model'=>"na194")) !!}</td>
         <td>{!! Form::text('statSewC1', $overseasfb->statSewC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na195', 'v-model'=>"na195")) !!}</td>
         <td>{!! Form::text('flexiSewC1', $overseasfb->flexiSewC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na196', 'v-model'=>"na196")) !!}</td>
       </tr>
       <tr>
         <td>Binding</td>
         <td>{!! Form::text('covBindC1', $overseasfb->covBindC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na201', 'v-model'=>"na201")) !!}</td>
         <td>{!! Form::text('t1BindC1', $overseasfb->t1BindC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na202', 'v-model'=>"na202")) !!}</td>
         <td>{!! Form::text('t2BindC1', $overseasfb->t2BindC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na203', 'v-model'=>"na203")) !!}</td>
         <td>{!! Form::text('t3BindC1', $overseasfb->t3BindC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na204', 'v-model'=>"na204")) !!}</td>
         <td>{!! Form::text('statBindC1', $overseasfb->statBindC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na205', 'v-model'=>"na205")) !!}</td>
         <td>{!! Form::text('flexiBindC1', $overseasfb->flexiBindC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na206', 'v-model'=>"na206")) !!}</td>
       </tr>
       <tr>
         <td>3 Knife Trim</td>
         <td>{!! Form::text('cov3C1', $overseasfb->cov3C1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na211', 'v-model'=>"na211")) !!}</td>
         <td>{!! Form::text('t13C1', $overseasfb->t13C1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na212', 'v-model'=>"na212")) !!}</td>
         <td>{!! Form::text('t23C1', $overseasfb->t23C1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na213', 'v-model'=>"na213")) !!}</td>
         <td>{!! Form::text('t33C1', $overseasfb->t33C1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na214', 'v-model'=>"na214")) !!}</td>
         <td>{!! Form::text('stat3C1', $overseasfb->stat3C1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na215', 'v-model'=>"na215")) !!}</td>
         <td>{!! Form::text('flexi3C1', $overseasfb->flexi3C1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na216', 'v-model'=>"na216")) !!}</td>
       </tr><tr>
         <td>Packing</td>
         <td>{!! Form::text('covPackC1', $overseasfb->covPackC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na221', 'v-model'=>"na221")) !!}</td>
         <td>{!! Form::text('t1PackC1', $overseasfb->t1PackC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na222', 'v-model'=>"na222")) !!}</td>
         <td>{!! Form::text('t2PackC1', $overseasfb->t2PackC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na223', 'v-model'=>"na223")) !!}</td>
         <td>{!! Form::text('t3PackC1', $overseasfb->t3PackC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na224', 'v-model'=>"na224")) !!}</td>
         <td>{!! Form::text('statPackC1', $overseasfb->statPackC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na225', 'v-model'=>"na225")) !!}</td>
         <td>{!! Form::text('flexiPackC1', $overseasfb->flexiPackC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na226', 'v-model'=>"na226")) !!}</td>
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
         <td>{!! Form::text('ccover', $overseasfb->ccover, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3000', 'v-model'=>"n3000")) !!}</td>
         <td>Color Job</td>
         <td>{!! Form::text('ccoverready', $overseasfb->ccoverready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3001', 'v-model'=>"n3001")) !!}</td>
         <td>{!! Form::text('ccoverwaste', $overseasfb->ccoverwaste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3002', 'v-model'=>"n3002")) !!}</td>

       </tr>
       <tr>
         <td>Flexi</td>
         <td>{!! Form::text('flexicover', $overseasfb->flexicover, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3003', 'v-model'=>"n3003")) !!}</td>
         <td>Flexi Job</td>
         <td>{!! Form::text('flexicoverready', $overseasfb->flexicoverready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3004', 'v-model'=>"n3004")) !!}</td>
         <td>{!! Form::text('flexicoverwaste', $overseasfb->flexicoverwaste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3005', 'v-model'=>"n3005")) !!}</td>
       </tr>

       <tr>
         <td>Text 1</td>
         <td>{!! Form::text('ct1', $overseasfb->ct1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3006', 'v-model'=>"n3006")) !!}</td>
         <td>Color Job</td>
         <td>{!! Form::text('ct1ready', $overseasfb->ct1ready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3007', 'v-model'=>"n3007")) !!}</td>
         <td>{!! Form::text('ct1waste', $overseasfb->ct1waste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3008', 'v-model'=>"n3008")) !!}</td>
       </tr>
       <tr>
         <td>Text 2</td>
         <td>{!! Form::text('ct2', $overseasfb->ct2, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3009', 'v-model'=>"n3009")) !!}</td>
         <td>Color Job</td>
         <td>{!! Form::text('ct2ready', $overseasfb->ct2ready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3010', 'v-model'=>"n3010")) !!}</td>
         <td>{!! Form::text('ct2waste', $overseasfb->ct2waste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3011', 'v-model'=>"n3011")) !!}</td>
       </tr>
       <tr>
         <td>Text 3</td>
         <td>{!! Form::text('ct3', $overseasfb->ct3, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3012', 'v-model'=>"n3012")) !!}</td>
         <td>Color Job</td>
         <td>{!! Form::text('ct3ready', $overseasfb->ct3ready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3013', 'v-model'=>"n3013")) !!}</td>
         <td>{!! Form::text('ct3waste', $overseasfb->ct3waste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3014', 'v-model'=>"n3014")) !!}</td>
       </tr>
       <tr>
         <td>Stickers</td>
         <td>{!! Form::text('csticker', $overseasfb->csticker, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3015', 'v-model'=>"n3015")) !!}</td>
         <td>Color Job</td>
         <td>{!! Form::text('cstickerready', $overseasfb->cstickerready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3016', 'v-model'=>"n3016")) !!}</td>
         <td>{!! Form::text('cstickerwaste', $overseasfb->cstickerwaste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3017', 'v-model'=>"n3017")) !!}</td>
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
       <td>{!! Form::text('surfMake', $overseasfb->surfMake, array('class' => 'form-control', 'readonly'=>true,'min'=>'0', 'id'=>'ma1', 'v-model'=>"ma1")) !!}</td>
       <td>{!! Form::text('surfWaste', $overseasfb->surfWaste, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'min'=>'0', 'id'=>'ma2', 'v-model'=>"ma2")) !!}</td>
     </tr>
     <tr>
       <td colspan="2">Trimming/Cutting</td>
       <td>{!! Form::text('trimMake', $overseasfb->trimMake, array('class' => 'form-control', 'readonly'=>true,'min'=>'0', 'id'=>'ma3', 'v-model'=>"ma3")) !!}</td>
       <td>{!! Form::text('trimWaste', $overseasfb->trimWaste, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'min'=>'0', 'id'=>'ma4', 'v-model'=>"ma4")) !!}</td>
     </tr>
     <tr>
       <td colspan="2">Diecut</td>
       <td>{!! Form::text('dieMake', $overseasfb->dieMake, array('class' => 'form-control', 'readonly'=>true,'min'=>'0', 'id'=>'ma5', 'v-model'=>"ma5")) !!}</td>
       <td>{!! Form::text('dieWaste', $overseasfb->dieWaste, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'min'=>'0', 'id'=>'ma6', 'v-model'=>"ma6")) !!}</td>
     </tr>
     <tr>
       <td colspan="2">Stripping</td>
       <td>{!! Form::text('stripMake', $overseasfb->stripMake, array('class' => 'form-control', 'readonly'=>true,'min'=>'0', 'id'=>'ma7', 'v-model'=>"ma7")) !!}</td>
       <td>{!! Form::text('stripWaste', $overseasfb->stripWaste, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'min'=>'0', 'id'=>'ma8', 'v-model'=>"ma8")) !!}</td>
     </tr>
     <tr>
       <td colspan="2">Folding</td>
       <td>{!! Form::text('foldMake', $overseasfb->foldMake, array('class' => 'form-control', 'readonly'=>true,'min'=>'0', 'id'=>'ma9', 'v-model'=>"ma9")) !!}</td>
       <td>{!! Form::text('foldWaste', $overseasfb->foldWaste, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'min'=>'0', 'id'=>'ma10', 'v-model'=>"ma10")) !!}</td>
     </tr>
     <tr>
       <td colspan="2">Sewing</td>
       <td>{!! Form::text('sewMake', $overseasfb->sewMake, array('class' => 'form-control', 'readonly'=>true, 'id'=>'ma11', 'v-model'=>"ma11")) !!}</td>
       <td>{!! Form::text('sewWaste', $overseasfb->sewWaste, array('class' => 'form-control', 'readonly'=>true,'step'=>"any",  'id'=>'ma12', 'v-model'=>"ma12")) !!}</td>
     </tr>
     <tr>
       <td colspan="2">Binding</td>
       <td>{!! Form::text('bindMake', $overseasfb->bindMake, array('class' => 'form-control', 'readonly'=>true,'min'=>'0', 'id'=>'ma13', 'v-model'=>"ma13")) !!}</td>
       <td>{!! Form::text('bindWaste', $overseasfb->bindWaste, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'min'=>'0', 'id'=>'ma14', 'v-model'=>"ma14")) !!}</td>
     </tr>
     <tr>
       <td colspan="2">3 Knife Trim</td>
       <td>{!! Form::text('threeMake', $overseasfb->threeMake, array('class' => 'form-control', 'readonly'=>true,'min'=>'0', 'id'=>'ma15', 'v-model'=>"ma15")) !!}</td>
       <td>{!! Form::text('threeWaste', $overseasfb->threeWaste, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'min'=>'0', 'id'=>'ma16', 'v-model'=>"ma16")) !!}</td>
     </tr>
     <tr>
       <td colspan="2">Packing</td>
       <td>{!! Form::text('PackMake', $overseasfb->PackMake, array('class' => 'form-control', 'readonly'=>true,'min'=>'0', 'id'=>'ma17', 'v-model'=>"ma17")) !!}</td>
       <td>{!! Form::text('packWaste', $overseasfb->packWaste, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'min'=>'0', 'id'=>'ma18', 'v-model'=>"ma18")) !!}</td>
     </tr>
   </table>
   </div>
    <div class="row col-md-3">
     <table class="table table-bordered">
       <tr>
         <td colspan="2">(COL) Make ready per color - Front </td>
         <td>{!! Form::text('colMakeFront', $overseasfb->colMakeFront, array('class' => 'form-control', 'readonly'=>true,'min'=>'0', 'id'=>'col1', 'v-model'=>"col1")) !!}</td>
       </tr>
       <tr>
         <td colspan="2">(COL) Make ready per color - Back </td>
         <td>{!! Form::text('colMakeBack', $overseasfb->colMakeBack, array('class' => 'form-control', 'readonly'=>true,'min'=>'0', 'id'=>'col2', 'v-model'=>"col2")) !!}</td>
       </tr>
       <tr>
         <td colspan="2">(COL) Waste % </td>
         <td>{!! Form::text('colWaste', $overseasfb->colWaste, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'col3', 'v-model'=>"col3")) !!}</td>
       </tr>
     </table>
     <table class="table table-bordered">
       <tr>
         <td colspan="2">(COL) Make ready per color - Front </td>
         <td>{!! Form::text('colMakeFront1', $overseasfb->colMakeFront1, array('class' => 'form-control', 'readonly'=>true,'min'=>'0', 'id'=>'col6', 'v-model'=>"col6")) !!}</td>
       </tr>
       <tr>
         <td colspan="2">(COL) Make ready per color - Back </td>
         <td>{!! Form::text('colMakeBack1', $overseasfb->colMakeBack1, array('class' => 'form-control', 'readonly'=>true,'min'=>'0', 'id'=>'col7', 'v-model'=>"col7")) !!}</td>
       </tr>
       <tr>
         <td colspan="2">(COL) Waste % </td>
         <td>{!! Form::text('colWaste1', $overseasfb->colWaste1, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'col8', 'v-model'=>"col8")) !!}</td>
       </tr>
     </table>

     <table class="table table-bordered">
       <tr>
         <td colspan="2">(COL) Make ready per color - Front </td>
         <td>{!! Form::text('colMakeFront2', $overseasfb->colMakeFront2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0','id'=>'col11', 'v-model'=>"col11")) !!}</td>
       </tr>
       <tr>
         <td colspan="2">(COL) Make ready per color - Back </td>
         <td>{!! Form::text('colMakeBack2', $overseasfb->colMakeBack2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'col12', 'v-model'=>"col12")) !!}</td>
       </tr>
       <tr>
         <td colspan="2">(COL) Waste % </td>
         <td>{!! Form::text('colWaste2', $overseasfb->colWaste2, array('class' => 'form-control', 'readonly'=>true, 'step'=>"any",'id'=>'col13', 'v-model'=>"col13")) !!}</td>
       </tr>
     </table>
   </div>
   <div class="row col-md-12">
     <div class="row col-md-3">
       <table class="table table-bordered" >
         <tbody>
             <tr>
               <th>{!! Form::text('none2', $overseasfb->none2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n1000b', 'v-model'=>'n1000b')) !!}</th>
             <tr>
               <th></th>
               <th>Flexi</th>
             </tr>
             <tr>
               <td>P. Order Qty</td>
               <td>{!! Form::text('flexiOrderC2', $overseasfb->flexiOrderC2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na1', 'v-model'=>"na1")) !!}</td>

             </tr>
             <tr>
               <td>Up(s) per sheet</td>
               <td>{!! Form::text('flexiUpC2', $overseasfb->flexiUpC2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na2', 'v-model'=>"na2")) !!}</td>

             </tr>
             <tr>
               <td>Signature/Spread(s)</td>
               <td>{!! Form::text('flexiSignC2', $overseasfb->flexiSignC2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na3', 'v-model'=>"na3")) !!}</td>

             </tr>
             <tr>
               <td>Front Color</td>
               <td>{!! Form::text('flexiFrontC2', $overseasfb->flexiFrontC2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na4', 'v-model'=>"na4")) !!}</td>

             </tr>
             <tr>
               <td>Back Color</td>
               <td>{!! Form::text('flexiBackC2', $overseasfb->flexiBackC2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na5', 'v-model'=>"na5")) !!}</td>

             </tr>
             <tr><td></td></tr>
             <tr>
               <td>Surface Finishing</td>
               <td>{!! Form::text('flexiSurfC2', $overseasfb->flexiSurfC2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na6', 'v-model'=>"na6")) !!}</td>

             </tr>
             <tr>
               <td>Trimming/Cutting</td>
               <td>{!! Form::text('flexiTrimC2', $overseasfb->flexiTrimC2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na7', 'v-model'=>"na7")) !!}</td>

             </tr>
             <tr>
               <td>Diecut</td>
               <td>{!! Form::text('flexiDieC2', $overseasfb->flexiDieC2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na8', 'v-model'=>"na8")) !!}</td>

             </tr>
             <tr>
               <td>Stripping</td>
               <td>{!! Form::text('flexiStripC2', $overseasfb->flexiStripC2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na9', 'v-model'=>"na9")) !!}</td>

             </tr>
             <tr>
               <td>Folding</td>
               <td>{!! Form::text('flexiFoldC2', $overseasfb->flexiFoldC2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na10', 'v-model'=>"na10")) !!}</td>

             </tr>
             <tr>
               <td>Sewing</td>
               <td>{!! Form::text('flexiSewC2', $overseasfb->flexiSewC2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na11', 'v-model'=>"na11")) !!}</td>

             </tr>
             <tr>
               <td>Binding</td>
               <td>{!! Form::text('flexiBindC2', $overseasfb->flexiBindC2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na12', 'v-model'=>"na12")) !!}</td>
             </tr>
             <tr>
               <td>3 Knife Trim</td>
               <td>{!! Form::text('flexi3C2', $overseasfb->flexi3C2, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'na13', 'v-model'=>"na13")) !!}</td>
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
                 <td>{!! Form::text('flexiPrintC3', $overseasfb->flexiPrintC3, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'naa1', 'v-model'=>"naa1")) !!}</td>
               </tr>
               <tr>
                 <td>Surface Finishing</td>
                 <td>{!! Form::text('flexiSurfC3', $overseasfb->flexiSurfC3, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'naa2', 'v-model'=>"naa2")) !!}</td>
               </tr>
               <tr>
                 <td>Trimming/Cutting</td>
                 <td>{!! Form::text('flexiTrimC3', $overseasfb->flexiTrimC3, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'naa3', 'v-model'=>"naa3")) !!}</td>
               </tr>
               <tr>
                 <td>Diecut</td>
                 <td>{!! Form::text('flexiDieC3', $overseasfb->flexiDieC3, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'naa4', 'v-model'=>"naa4")) !!}</td>
               <tr>
                 <td>Stripping</td>
                 <td>{!! Form::text('flexiStripC3', $overseasfb->flexiStripC3, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'naa5', 'v-model'=>"naa5")) !!}</td>
               </tr>
               <tr>
                 <td>Folding</td>
                 <td>{!! Form::text('flexiFoldC3', $overseasfb->flexiFoldC3, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'naa6', 'v-model'=>"naa6")) !!}</td>
               </tr>
               <tr>
                 <td>Sewing</td>
                 <td>{!! Form::text('flexiSewC3', $overseasfb->flexiSewC3, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'naa7', 'v-model'=>"naa7")) !!}</td>
               </tr>
               <tr>
                 <td>Binding</td>
                 <td>{!! Form::text('flexiBindC3', $overseasfb->flexiBindC3, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'naa8', 'v-model'=>"naa8")) !!}</td>
               </tr>
               <tr>
                 <td>3 Knife Trim</td>
                 <td>{!! Form::text('flexi3C3', $overseasfb->flexi3C3, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'naa9', 'v-model'=>"naa9")) !!}</td>
               </tr><tr>
                 <td>Packing</td>
                 <td>{!! Form::text('flexiPackC3', $overseasfb->flexiPackC3, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'naa10', 'v-model'=>"naa10")) !!}</td>
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
                 <td>{!! Form::text('flexicover1', $overseasfb->flexicover1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'na3003', 'v-model'=>"na3003")) !!}</td>
                 <td>Flexi Job</td>
                 <td>{!! Form::text('flexicoverready1', $overseasfb->flexicoverready1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'na3004', 'v-model'=>"na3004")) !!}</td>
                 <td>{!! Form::text('flexicoverwaste1', $overseasfb->flexicoverwaste1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'na3005', 'v-model'=>"na3005")) !!}</td>
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
               <td>{!! Form::text('surfMake1', $overseasfb->surfMake1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'ma19', 'v-model'=>"ma19")) !!}</td>
               <td>{!! Form::text('surfWaste1', $overseasfb->surfWaste1, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'ma20', 'v-model'=>"ma20")) !!}</td>
             </tr>
             <tr>
               <td colspan="2">Trimming/Cutting</td>
               <td>{!! Form::text('trimMake1', $overseasfb->trimMake1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'ma21', 'v-model'=>"ma21")) !!}</td>
               <td>{!! Form::text('trimWaste1', $overseasfb->trimWaste1, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'ma22', 'v-model'=>"ma22")) !!}</td>
             </tr>
             <tr>
               <td colspan="2">Diecut</td>
               <td>{!! Form::text('dieMake1', $overseasfb->dieMake1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'ma23', 'v-model'=>"ma23")) !!}</td>
               <td>{!! Form::text('dieWaste1', $overseasfb->dieWaste1, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'ma24', 'v-model'=>"ma24")) !!}</td>
             </tr>
             <tr>
               <td colspan="2">Stripping</td>
               <td>{!! Form::text('stripMake1', $overseasfb->stripMake1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'ma25', 'v-model'=>"ma25")) !!}</td>
               <td>{!! Form::text('stripWaste1', $overseasfb->stripWaste1, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'ma26', 'v-model'=>"ma26")) !!}</td>
             </tr>
             <tr>
               <td colspan="2">Folding</td>
               <td>{!! Form::text('foldMake1', $overseasfb->foldMake1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'ma27', 'v-model'=>"ma27")) !!}</td>
               <td>{!! Form::text('foldWaste1', $overseasfb->foldWaste1, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'ma28', 'v-model'=>"ma28")) !!}</td>
             </tr>
             <tr>
               <td colspan="2">Sewing</td>
               <td>{!! Form::text('sewMake1', $overseasfb->sewMake1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'ma29', 'v-model'=>"ma29")) !!}</td>
               <td>{!! Form::text('sewWaste1', $overseasfb->sewWaste1, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'ma30', 'v-model'=>"ma30")) !!}</td>
             </tr>
             <tr>
               <td colspan="2">Binding</td>
               <td>{!! Form::text('bindMake1', $overseasfb->bindMake1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'ma31', 'v-model'=>"ma31")) !!}</td>
               <td>{!! Form::text('bindWaste1', $overseasfb->bindWaste1, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'ma32', 'v-model'=>"ma32")) !!}</td>
             </tr>
             <tr>
               <td colspan="2">3 Knife Trim</td>
               <td>{!! Form::text('threeMake1', $overseasfb->threeMake1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'ma33', 'v-model'=>"ma33")) !!}</td>
               <td>{!! Form::text('threeWaste1', $overseasfb->threeWaste1, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'ma34', 'v-model'=>"ma34")) !!}</td>
             </tr>
             <tr>
               <td colspan="2">Packing</td>
               <td>{!! Form::text('PackMake1', $overseasfb->PackMake1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'ma35', 'v-model'=>"ma35")) !!}</td>
               <td>{!! Form::text('packWaste1', $overseasfb->packWaste1, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'ma36', 'v-model'=>"ma36")) !!}</td>
             </tr>
           </table>
           </div>
           <div class="row col-md-3">
             <table class="table table-bordered">
               <tr>
                 <td colspan="2">(COL) Make ready per color - Front </td>
                 <td>{!! Form::text('colMakeFront3', $overseasfb->colMakeFront3, array('class' => 'form-control', 'readonly'=>true, 'id'=>'col16', 'v-model'=>"col16")) !!}</td>
               </tr>
               <tr>
                 <td colspan="2">(COL) Make ready per color - Back </td>
                 <td>{!! Form::text('colMakeBack3', $overseasfb->colMakeBack3, array('class' => 'form-control', 'readonly'=>true, 'id'=>'col17', 'v-model'=>"col17")) !!}</td>
               </tr>
               <tr>
                 <td colspan="2">(COL) Waste % </td>
                 <td>{!! Form::text('colWaste3', $overseasfb->colWaste3, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'col18', 'v-model'=>"col18")) !!}</td>
               </tr>
             </table>

             <table class="table table-bordered">
               <tr>
                 <td colspan="2">(COL) Make ready per color - Front </td>
                 <td>{!! Form::text('colMakeFront4', $overseasfb->colMakeFront4, array('class' => 'form-control', 'readonly'=>true, 'id'=>'col21', 'v-model'=>"col21")) !!}</td>
               </tr>
               <tr>
                 <td colspan="2">(COL) Make ready per color - Back </td>
                 <td>{!! Form::text('colMakeBack4', $overseasfb->colMakeBack4, array('class' => 'form-control', 'readonly'=>true, 'id'=>'col22', 'v-model'=>"col22")) !!}</td>
               </tr>
               <tr>
                 <td colspan="2">(COL) Waste % </td>
                 <td>{!! Form::text('colWaste4', $overseasfb->colWaste4, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'col23', 'v-model'=>"col23")) !!}</td>
               </tr>
             </table>

             <table class="table table-bordered">
               <tr>
                 <td colspan="2">(COL) Make ready per color - Front </td>
                 <td>{!! Form::text('colMakeFront5', $overseasfb->colMakeFront5, array('class' => 'form-control', 'readonly'=>true, 'id'=>'col26', 'v-model'=>"col26")) !!}</td>
               </tr>
               <tr>
                 <td colspan="2">(COL) Make ready per color - Back </td>
                 <td>{!! Form::text('colMakeBack5', $overseasfb->colMakeBack5, array('class' => 'form-control', 'readonly'=>true, 'id'=>'col27', 'v-model'=>"col27")) !!}</td>
               </tr>
               <tr>
                 <td colspan="2">(COL) Waste % </td>
                 <td>{!! Form::text('colWaste5', $overseasfb->colWaste5, array('class' => 'form-control', 'readonly'=>true,'step'=>"any", 'id'=>'col28', 'v-model'=>"col28")) !!}</td>
               </tr>
             </table>
           </div>
       {{-- </div> --}}
       <div class="form-group row">
      <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)">  </input>
    </div>
   {!! Form::close()!!}
</div> {{-- end of id app --}}
@endsection
