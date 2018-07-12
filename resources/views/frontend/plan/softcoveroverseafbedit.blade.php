@extends('frontend.layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/planning.css') }}" />
@section('content')
 <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
   <h3>Soft Cover of Overseas(F and B)</h3><small>(For colour and flexi job)</small>
<div class="row col-md-12 " id="app">
 {!! Form::model($sales, array('route' => array('frontend.plan.softcoveroverseafbupdate', $sales->id), 'method' => 'POST')) !!}

 <div class="col-md-12 ">
   <table class="table table-bordered " id="users-table">
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
           <th></th>
           <th></th>
           <th></th>
           <th>Flexi Job</th>
           <th></th>

         </tr>
         <tr>
           <th></th>
           <th>Cover </th>
           <th>text1</th>
           <th>text2</th>
           <th>text3</th>
           <th>text4</th>
           <th>text5</th>
           <th>Sticker1</th>
           <th>Sticker2</th>
           <th>Flexi1</th>
           <th>Flexi2</th>

         </tr>

     </thead>
     <tbody>
       <tr>
         <td>P. Order Qty</td>
         <td>{!! Form::number('covOrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n1', 'v-model'=>"n1")) !!}</td>
         <td>{!! Form::number('t1OrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2', 'v-model'=>"n2")) !!}</td>
         <td>{!! Form::number('t2OrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n3', 'v-model'=>"n3")) !!}</td>
         <td>{!! Form::number('t3OrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n4', 'v-model'=>"n4")) !!}</td>
         <td>{!! Form::number('t4OrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n3e', 'v-model'=>"n3e")) !!}</td>
         <td>{!! Form::number('t5OrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n4e', 'v-model'=>"n4e")) !!}</td>
         <td>{!! Form::number('statOrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n5', 'v-model'=>"n5")) !!}</td>
         <td>{!! Form::number('stat2OrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n5e', 'v-model'=>"n5e")) !!}</td>
         <td>{!! Form::number('flexiOrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>
         <td>{!! Form::number('flexi2OrderC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n6e', 'v-model'=>"n6e")) !!}</td>

       </tr>
       <tr>
         <td>Up(s) per sheet</td>
         <td>{!! Form::number('covUpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n11', 'v-model'=>"n11")) !!}</td>
         <td>{!! Form::number('t1UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n12', 'v-model'=>"n12")) !!}</td>
         <td>{!! Form::number('t2UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n13', 'v-model'=>"n13")) !!}</td>
         <td>{!! Form::number('t3UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n14', 'v-model'=>"n14")) !!}</td>
         <td>{!! Form::number('t4UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n13e', 'v-model'=>"n13e")) !!}</td>
         <td>{!! Form::number('t5UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n14e', 'v-model'=>"n14e")) !!}</td>
         <td>{!! Form::number('statUpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n15', 'v-model'=>"n15")) !!}</td>
         <td>{!! Form::number('stat2UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n15e', 'v-model'=>"n15e")) !!}</td>
         <td>{!! Form::number('flexiUpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>
         <td>{!! Form::number('flexi2UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n16e', 'v-model'=>"n16e")) !!}</td>

       </tr>
       <tr>
         <td>Signature/Spread(s)</td>
         <td>{!! Form::number('covSignC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n21', 'v-model'=>"n21")) !!}</td>
         <td>{!! Form::number('t1signC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n22', 'v-model'=>"n22")) !!}</td>
         <td>{!! Form::number('t2signC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n23', 'v-model'=>"n23")) !!}</td>
         <td>{!! Form::number('t3signC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n24', 'v-model'=>"n24")) !!}</td>
         <td>{!! Form::number('t4signC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n23e', 'v-model'=>"n23e")) !!}</td>
         <td>{!! Form::number('t5signC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n24e', 'v-model'=>"n24e")) !!}</td>
         <td>{!! Form::number('statSignC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n25', 'v-model'=>"n25")) !!}</td>
         <td>{!! Form::number('stat2SignC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n25e', 'v-model'=>"n25e")) !!}</td>
         <td>{!! Form::number('flexiSignC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>
         <td>{!! Form::number('flexi2SignC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n26e', 'v-model'=>"n26e")) !!}</td>

       </tr>
       <tr>
         <td>Front Color</td>
         <td>{!! Form::number('covFrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n31', 'v-model'=>"n31")) !!}</td>
         <td>{!! Form::number('t1FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n32', 'v-model'=>"n32")) !!}</td>
         <td>{!! Form::number('t2FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n33', 'v-model'=>"n33")) !!}</td>
         <td>{!! Form::number('t3FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n34', 'v-model'=>"n34")) !!}</td>
         <td>{!! Form::number('t4FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n33e', 'v-model'=>"n33e")) !!}</td>
         <td>{!! Form::number('t5FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n34e', 'v-model'=>"n34e")) !!}</td>
         <td>{!! Form::number('statFrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n35', 'v-model'=>"n35")) !!}</td>
         <td>{!! Form::number('stat2FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n35e', 'v-model'=>"n35e")) !!}</td>
         <td>{!! Form::number('flexiFrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>
         <td>{!! Form::number('flexi2FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n36e', 'v-model'=>"n36e")) !!}</td>

       </tr>
       <tr>
         <td>Back Color</td>
         <td>{!! Form::number('covBackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n41', 'v-model'=>"n41")) !!}</td>
         <td>{!! Form::number('t1BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n42', 'v-model'=>"n42")) !!}</td>
         <td>{!! Form::number('t2BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n43', 'v-model'=>"n43")) !!}</td>
         <td>{!! Form::number('t3BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n44', 'v-model'=>"n44")) !!}</td>
         <td>{!! Form::number('t4BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n43e', 'v-model'=>"n43e")) !!}</td>
         <td>{!! Form::number('t5BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n44e', 'v-model'=>"n44e")) !!}</td>
         <td>{!! Form::number('statBackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n45', 'v-model'=>"n45")) !!}</td>
         <td>{!! Form::number('stat2BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n45e', 'v-model'=>"n45e")) !!}</td>
         <td>{!! Form::number('flexiBackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n46', 'v-model'=>"n46")) !!}</td>
         <td>{!! Form::number('flexi2BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n46e', 'v-model'=>"n46e")) !!}</td>

       </tr>
       <tr><td></td></tr>
       <tr>
         <td>Surface Finishing</td>
         <td>{!! Form::number('covSurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n51', 'v-model'=>"n51")) !!}</td>
         <td>{!! Form::number('t1SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n52', 'v-model'=>"n52")) !!}</td>
         <td>{!! Form::number('t2SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n53', 'v-model'=>"n53")) !!}</td>
         <td>{!! Form::number('t3SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n54', 'v-model'=>"n54")) !!}</td>
         <td>{!! Form::number('t4SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n53e', 'v-model'=>"n53e")) !!}</td>
         <td>{!! Form::number('t5SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n54e', 'v-model'=>"n54e")) !!}</td>
         <td>{!! Form::number('statSurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n55', 'v-model'=>"n55")) !!}</td>
         <td>{!! Form::number('stat2SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n55e', 'v-model'=>"n55e")) !!}</td>
         <td>{!! Form::number('flexiSurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n56', 'v-model'=>"n56")) !!}</td>
         <td>{!! Form::number('flexi2SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n56e', 'v-model'=>"n56e")) !!}</td>

       </tr>
       <tr>
         <td>Trimming/Cutting</td>
         <td>{!! Form::number('covTrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n61', 'v-model'=>"n61")) !!}</td>
         <td>{!! Form::number('t1TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n62', 'v-model'=>"n62")) !!}</td>
         <td>{!! Form::number('t2TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n63', 'v-model'=>"n63")) !!}</td>
         <td>{!! Form::number('t3TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n64', 'v-model'=>"n64")) !!}</td>
         <td>{!! Form::number('t4TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n63e', 'v-model'=>"n63e")) !!}</td>
         <td>{!! Form::number('t5TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n64e', 'v-model'=>"n64e")) !!}</td>
         <td>{!! Form::number('statTrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n65', 'v-model'=>"n65")) !!}</td>
         <td>{!! Form::number('stat2TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n65e', 'v-model'=>"n65e")) !!}</td>
         <td>{!! Form::number('flexiTrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n66', 'v-model'=>"n66")) !!}</td>
         <td>{!! Form::number('flexi2TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n66e', 'v-model'=>"n66e")) !!}</td>

       </tr>
       <tr>
         <td>Diecut</td>
         <td>{!! Form::number('covDieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n71', 'v-model'=>"n71")) !!}</td>
         <td>{!! Form::number('t1DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n72', 'v-model'=>"n72")) !!}</td>
         <td>{!! Form::number('t2DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n73', 'v-model'=>"n73")) !!}</td>
         <td>{!! Form::number('t3DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n74', 'v-model'=>"n74")) !!}</td>
         <td>{!! Form::number('t4DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n73e', 'v-model'=>"n73e")) !!}</td>
         <td>{!! Form::number('t5DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n74e', 'v-model'=>"n74e")) !!}</td>
         <td>{!! Form::number('statDieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n75', 'v-model'=>"n75")) !!}</td>
         <td>{!! Form::number('stat2DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n75e', 'v-model'=>"n75e")) !!}</td>
         <td>{!! Form::number('flexiDieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n76', 'v-model'=>"n76")) !!}</td>
         <td>{!! Form::number('flexi2DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n76e', 'v-model'=>"n76e")) !!}</td>

       </tr>
       <tr>
         <td>Stripping</td>
         <td>{!! Form::number('covStripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n81', 'v-model'=>"n81")) !!}</td>
         <td>{!! Form::number('t1StripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n82', 'v-model'=>"n82")) !!}</td>
         <td>{!! Form::number('t2StripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n83', 'v-model'=>"n83")) !!}</td>
         <td>{!! Form::number('t3stripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n84', 'v-model'=>"n84")) !!}</td>
         <td>{!! Form::number('t4StripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n83e', 'v-model'=>"n83e")) !!}</td>
         <td>{!! Form::number('t5stripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n84e', 'v-model'=>"n84e")) !!}</td>
         <td>{!! Form::number('statStripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n85', 'v-model'=>"n85")) !!}</td>
         <td>{!! Form::number('stat2StripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n85e', 'v-model'=>"n85e")) !!}</td>
         <td>{!! Form::number('flexiStripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n86', 'v-model'=>"n86")) !!}</td>
         <td>{!! Form::number('flexi2StripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n86e', 'v-model'=>"n86e")) !!}</td>

       </tr>
       <tr>
         <td>Folding</td>
         <td>{!! Form::number('covFoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n91', 'v-model'=>"n91")) !!}</td>
         <td>{!! Form::number('t1FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n92', 'v-model'=>"n92")) !!}</td>
         <td>{!! Form::number('t2FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n93', 'v-model'=>"n93")) !!}</td>
         <td>{!! Form::number('t3FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n94', 'v-model'=>"n94")) !!}</td>
         <td>{!! Form::number('t4FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n93e', 'v-model'=>"n93e")) !!}</td>
         <td>{!! Form::number('t5FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n94e', 'v-model'=>"n94e")) !!}</td>
         <td>{!! Form::number('statFoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n95', 'v-model'=>"n95")) !!}</td>
         <td>{!! Form::number('stat2FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n95e', 'v-model'=>"n95e")) !!}</td>
         <td>{!! Form::number('flexiFoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n96', 'v-model'=>"n96")) !!}</td>
         <td>{!! Form::number('flexi2FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n96e', 'v-model'=>"n96e")) !!}</td>

       </tr>
       <tr>
         <td>Sewing</td>
         <td>{!! Form::number('covSewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n101', 'v-model'=>"n101")) !!}</td>
         <td>{!! Form::number('t1SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n102', 'v-model'=>"n102")) !!}</td>
         <td>{!! Form::number('t2SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n103', 'v-model'=>"n103")) !!}</td>
         <td>{!! Form::number('t3SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n104', 'v-model'=>"n104")) !!}</td>
         <td>{!! Form::number('t4SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n103e', 'v-model'=>"n103e")) !!}</td>
         <td>{!! Form::number('t5SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n104e', 'v-model'=>"n104e")) !!}</td>
         <td>{!! Form::number('statSewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n105', 'v-model'=>"n105")) !!}</td>
         <td>{!! Form::number('stat2SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n105e', 'v-model'=>"n105e")) !!}</td>
         <td>{!! Form::number('flexiSewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n106', 'v-model'=>"n106")) !!}</td>
         <td>{!! Form::number('flexi2SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n106e', 'v-model'=>"n106e")) !!}</td>

       </tr>
       <tr>
         <td>Binding</td>
         <td>{!! Form::number('covBindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n111', 'v-model'=>"n111")) !!}</td>
         <td>{!! Form::number('t1BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n112', 'v-model'=>"n112")) !!}</td>
         <td>{!! Form::number('t2BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n113', 'v-model'=>"n113")) !!}</td>
         <td>{!! Form::number('t3BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n114', 'v-model'=>"n114")) !!}</td>
         <td>{!! Form::number('t4BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n113e', 'v-model'=>"n113e")) !!}</td>
         <td>{!! Form::number('t5BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n114e', 'v-model'=>"n114e")) !!}</td>
         <td>{!! Form::number('statBindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n115', 'v-model'=>"n115")) !!}</td>
         <td>{!! Form::number('stat2BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n115e', 'v-model'=>"n115e")) !!}</td>
         <td>{!! Form::number('flexiBindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n116', 'v-model'=>"n116")) !!}</td>
         <td>{!! Form::number('flexi2BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n116e', 'v-model'=>"n116e")) !!}</td>
       </tr>
       <tr>
         <td>3 Knife Trim</td>
         <td>{!! Form::number('cov3C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n121', 'v-model'=>"n121")) !!}</td>
         <td>{!! Form::number('t13C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n122', 'v-model'=>"n122")) !!}</td>
         <td>{!! Form::number('t23C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n123', 'v-model'=>"n123")) !!}</td>
         <td>{!! Form::number('t33C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n124', 'v-model'=>"n124")) !!}</td>
         <td>{!! Form::number('t43C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n123e', 'v-model'=>"n123e")) !!}</td>
         <td>{!! Form::number('t53C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n124e', 'v-model'=>"n124e")) !!}</td>
         <td>{!! Form::number('stat3C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n125', 'v-model'=>"n125")) !!}</td>
         <td>{!! Form::number('stat23C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n125e', 'v-model'=>"n125e")) !!}</td>
         <td>{!! Form::number('flexi3C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n126', 'v-model'=>"n126")) !!}</td>
         <td>{!! Form::number('flexi23C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n126e', 'v-model'=>"n126e")) !!}</td>
       </tr>
       <tr><td></td></tr>
     </tbody>
   {{-- </div>
   <div class="col-md-4">
   <table class="table table-bordered "> --}}
       <thead>
           <tr>
             <th></th>
             <th>Color</th>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
             <th>Flexi Job</th>
             <th></th>
           </tr>
           <tr>
             <th></th>
             <th>Cover</th>
             <th>text1</th>
             <th>text2</th>
             <th>text3</th>
             <th>text4</th>
             <th>text5</th>
             <th>Sticker1</th>
             <th>Sticker2</th>
             <th>Flexi1</th>
             <th>Flexi2</th>

           </tr>
       </thead>
       <tbody>

         <tr>
           <td>Printing</td>
           <td>{!! Form::text('covPrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na131', 'v-model'=>"na131", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t1PrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na132', 'v-model'=>"na132", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t2PrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na133', 'v-model'=>"na133", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t3PrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na134', 'v-model'=>"na134", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t4PrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na133e', 'v-model'=>"na133e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t5PrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na134e', 'v-model'=>"na134e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('statPrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na135', 'v-model'=>"na135", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('stat2PrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na135e', 'v-model'=>"na135e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexiPrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na136', 'v-model'=>"na136", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexi2PrintC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na136e', 'v-model'=>"na136e", 'readonly'=>true)) !!}</td>
         </tr>
         <tr>
           <td>Surface Finishing</td>
           <td>{!! Form::text('covSurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na141', 'v-model'=>"na141", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t1SurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na142', 'v-model'=>"na142", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t2SurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na143', 'v-model'=>"na143", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t3SurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na144', 'v-model'=>"na144", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t4SurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na143e', 'v-model'=>"na143e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t5SurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na144e', 'v-model'=>"na144e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('statSurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na145', 'v-model'=>"na145", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('stat2SurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na145e', 'v-model'=>"na145e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexiSurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na146', 'v-model'=>"na146", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexi2SurfC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na146e', 'v-model'=>"na146e", 'readonly'=>true)) !!}</td>
         </tr>
         <tr>
           <td>Trimming/Cutting</td>
           <td>{!! Form::text('covTrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na151', 'v-model'=>"na151", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t1TrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na152', 'v-model'=>"na152", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t2TrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na153', 'v-model'=>"na153", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t3TrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na154', 'v-model'=>"na154", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t4TrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na153e', 'v-model'=>"na153e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t5TrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na154e', 'v-model'=>"na154e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('statTrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na155', 'v-model'=>"na155", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('stat2TrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na155e', 'v-model'=>"na155e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexiTrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na156', 'v-model'=>"na156", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexi2TrimC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na156e', 'v-model'=>"na156e", 'readonly'=>true)) !!}</td>
         </tr>
         <tr>
           <td>Diecut</td>
           <td>{!! Form::text('covDieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na161', 'v-model'=>"na161", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t1DieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na162', 'v-model'=>"na162", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t2DieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na163', 'v-model'=>"na163", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t3DieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na164', 'v-model'=>"na164", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t4DieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na163e', 'v-model'=>"na163e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t5DieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na164e', 'v-model'=>"na164e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('statDieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na165', 'v-model'=>"na165", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('stat2DieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na165e', 'v-model'=>"na165e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexiDieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na166', 'v-model'=>"na166", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexi2DieC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na166e', 'v-model'=>"na166e", 'readonly'=>true)) !!}</td>
         <tr>
           <td>Stripping</td>
           <td>{!! Form::text('covStripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na171', 'v-model'=>"na171", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t1StripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na172', 'v-model'=>"na172", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t2StripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na173', 'v-model'=>"na173", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t3stripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na174', 'v-model'=>"na174", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t4StripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na173e', 'v-model'=>"na173e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t5stripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na174e', 'v-model'=>"na174e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('statStripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na175', 'v-model'=>"na175", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('stat2StripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na175e', 'v-model'=>"na175e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexiStripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na176', 'v-model'=>"na176", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexi2StripC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na176e', 'v-model'=>"na176e", 'readonly'=>true)) !!}</td>
         </tr>
         <tr>
           <td>Folding</td>
           <td>{!! Form::text('covFoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na181', 'v-model'=>"na181", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t1FoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na182', 'v-model'=>"na182", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t2FoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na183', 'v-model'=>"na183", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t3FoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na184', 'v-model'=>"na184", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t4FoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na183e', 'v-model'=>"na183e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t5FoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na184e', 'v-model'=>"na184e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('statFoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na185', 'v-model'=>"na185", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('stat2FoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na185e', 'v-model'=>"na185e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexiFoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na186', 'v-model'=>"na186", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexi2FoldC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na186e', 'v-model'=>"na186e", 'readonly'=>true)) !!}</td>
         </tr>
         <tr>
           <td>Sewing</td>
           <td>{!! Form::text('covSewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na191', 'v-model'=>"na191", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t1SewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na192', 'v-model'=>"na192", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t2SewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na193', 'v-model'=>"na193", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t3SewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na194', 'v-model'=>"na194", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t4SewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na193', 'v-model'=>"na193", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t5SewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na194', 'v-model'=>"na194", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('statSewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na195', 'v-model'=>"na195", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('stat2SewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na195', 'v-model'=>"na195", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexiSewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na196', 'v-model'=>"na196", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexi2SewC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na196', 'v-model'=>"na196", 'readonly'=>true)) !!}</td>
         </tr>
         <tr>
           <td>Binding</td>
           <td>{!! Form::text('covBindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na201', 'v-model'=>"na201", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t1BindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na202', 'v-model'=>"na202", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t2BindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na203', 'v-model'=>"na203", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t3BindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na204', 'v-model'=>"na204", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t4BindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na203e', 'v-model'=>"na203e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t5BindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na204e', 'v-model'=>"na204e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('statBindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na205', 'v-model'=>"na205", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('stat2BindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na205e', 'v-model'=>"na205e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexiBindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na206', 'v-model'=>"na206", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexi2BindC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na206e', 'v-model'=>"na206e", 'readonly'=>true)) !!}</td>
         </tr>
         <tr>
           <td>3 Knife Trim</td>
           <td>{!! Form::text('cov3C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na211', 'v-model'=>"na211", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t13C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na212', 'v-model'=>"na212", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t23C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na213', 'v-model'=>"na213", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t33C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na214', 'v-model'=>"na214", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t43C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na213e', 'v-model'=>"na213e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t53C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na214e', 'v-model'=>"na214e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('stat3C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na215', 'v-model'=>"na215", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('stat23C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na215e', 'v-model'=>"na215e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexi3C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na216', 'v-model'=>"na216", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexi23C1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na216e', 'v-model'=>"na216e", 'readonly'=>true)) !!}</td>
         </tr><tr>
           <td>Packing</td>
           <td>{!! Form::text('covPackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na221', 'v-model'=>"na221", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t1PackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na222', 'v-model'=>"na222", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t2PackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na223', 'v-model'=>"na223", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t3PackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na224', 'v-model'=>"na224", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t4PackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na223e', 'v-model'=>"na223e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('t5PackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na224e', 'v-model'=>"na224e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('statPackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na225', 'v-model'=>"na225", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('stat2PackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na225e', 'v-model'=>"na225e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexiPackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na226', 'v-model'=>"na226", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexi2PackC1', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'na226e', 'v-model'=>"na226e", 'readonly'=>true)) !!}</td>
         </tr>
       </tbody>
     </table>
   </div>
   <div class="col-md-12">
   <div class="row col-md-5">
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
           <td>Flexi1</td>
           <td>{!! Form::text('flexicover', '', array('class' => 'form-control', 'id'=>'n3003', 'v-model'=>"n3003", 'readonly'=>true)) !!}</td>
           <td>Flexi Job</td>
           <td>{!! Form::text('flexicoverready', '', array('class' => 'form-control', 'id'=>'n3004', 'v-model'=>"n3004", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexicoverwaste', '', array('class' => 'form-control', 'id'=>'n3005', 'v-model'=>"n3005", 'readonly'=>true)) !!}</td>
         </tr>

         <tr>
           <td>Flexi2</td>
           <td>{!! Form::text('flexicover2', '', array('class' => 'form-control', 'id'=>'n3003e', 'v-model'=>"n3003e", 'readonly'=>true)) !!}</td>
           <td>Flexi Job</td>
           <td>{!! Form::text('flexicoverready2', '', array('class' => 'form-control', 'id'=>'n3004e', 'v-model'=>"n3004e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('flexicoverwaste2', '', array('class' => 'form-control', 'id'=>'n3005e', 'v-model'=>"n3005e", 'readonly'=>true)) !!}</td>
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
           <td>Text 4</td>
           <td>{!! Form::text('ct4', '', array('class' => 'form-control', 'id'=>'n3012e', 'v-model'=>"n3012e", 'readonly'=>true)) !!}</td>
           <td>Color Job</td>
           <td>{!! Form::text('ct4ready', '', array('class' => 'form-control', 'id'=>'n3013e', 'v-model'=>"n3013e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('ct4waste', '', array('class' => 'form-control', 'id'=>'n3014e', 'v-model'=>"n3014e", 'readonly'=>true)) !!}</td>
         </tr>
         <tr>
           <td>Text 5</td>
           <td>{!! Form::text('ct5', '', array('class' => 'form-control', 'id'=>'n3012ee', 'v-model'=>"n3012ee", 'readonly'=>true)) !!}</td>
           <td>Color Job</td>
           <td>{!! Form::text('ct5ready', '', array('class' => 'form-control', 'id'=>'n3013ee', 'v-model'=>"n3013ee", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('ct5waste', '', array('class' => 'form-control', 'id'=>'n3014ee', 'v-model'=>"n3014ee", 'readonly'=>true)) !!}</td>
         </tr>
         <tr>
           <td>Stickers1</td>
           <td>{!! Form::text('csticker', '', array('class' => 'form-control', 'id'=>'n3015', 'v-model'=>"n3015", 'readonly'=>true)) !!}</td>
           <td>Color Job</td>
           <td>{!! Form::text('cstickerready', '', array('class' => 'form-control', 'id'=>'n3016', 'v-model'=>"n3016", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('cstickerwaste', '', array('class' => 'form-control', 'id'=>'n3017', 'v-model'=>"n3017", 'readonly'=>true)) !!}</td>
         </tr>

         <tr>
           <td>Stickers2</td>
           <td>{!! Form::text('csticker2', '', array('class' => 'form-control', 'id'=>'n3015e', 'v-model'=>"n3015e", 'readonly'=>true)) !!}</td>
           <td>Color Job</td>
           <td>{!! Form::text('cstickerready2', '', array('class' => 'form-control', 'id'=>'n3016e', 'v-model'=>"n3016e", 'readonly'=>true)) !!}</td>
           <td>{!! Form::text('cstickerwaste2', '', array('class' => 'form-control', 'id'=>'n3017e', 'v-model'=>"n3017e", 'readonly'=>true)) !!}</td>
         </tr>
     </table>
   </div>
   <div class="col-md-4">
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
     <div class="row col-md-3">
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
       </table>
     </div>
     </div>
     <div class="col-md-12 form-group row">
       <button type="submit" class="btn btn-warning" >EDIT </button>
       <input type="button" class="btn btn-primary " value="BACK" onclick="history.go(-1)">  </input>
     </div>
 {!! Form::close()!!}
</div> {{-- end of id app --}}

<script>
var vm = new Vue({
       el:'#app',
       data : {
         n1 : {!!$overseasfb->covOrderC!!}, n3 : {!!$overseasfb->t2OrderC!!}, n4 : {!!$overseasfb->t3OrderC!!}, n6 : {!!$overseasfb->flexiOrderC!!},
         n11 : {!!$overseasfb->covUpC!!}, n12 : {!!$overseasfb->t1UpC!!}, n13 : {!!$overseasfb->t2UpC!!}, n14 : {!!$overseasfb->t3UpC!!}, n15 : {!!$overseasfb->statUpC!!}, n16 : {!!$overseasfb->flexiUpC!!},
         n21 : {!!$overseasfb->covSignC!!}, n22 : {!!$overseasfb->t1signC!!}, n23 : {!!$overseasfb->t2signC!!}, n24 : {!!$overseasfb->t3signC!!}, n25 : {!!$overseasfb->statSignC!!}, n26 : {!!$overseasfb->flexiSignC!!},
         n31 : {!!$overseasfb->covFrontC!!}, n32 : {!!$overseasfb->t1FrontC!!}, n33 : {!!$overseasfb->t2FrontC!!}, n34 : {!!$overseasfb->t3FrontC!!}, n35 : {!!$overseasfb->statFrontC!!}, n36 : {!!$overseasfb->flexiFrontC!!},
         n41 : {!!$overseasfb->covBackC!!}, n42 : {!!$overseasfb->t1BackC!!}, n43 : {!!$overseasfb->t2BackC!!}, n44 : {!!$overseasfb->t3BackC!!}, n45 : {!!$overseasfb->statBackC!!}, n46 : {!!$overseasfb->flexiBackC!!},
         n51 : {!!$overseasfb->covSurfC!!}, n52 : {!!$overseasfb->t1SurfC!!}, n53 : {!!$overseasfb->t2SurfC!!}, n54 : {!!$overseasfb->t3SurfC!!}, n55 : {!!$overseasfb->statSurfC!!}, n56 : {!!$overseasfb->flexiSurfC!!},
         n61 : {!!$overseasfb->covTrimC!!}, n62 : {!!$overseasfb->t1TrimC!!}, n63 : {!!$overseasfb->t2TrimC!!}, n64 : {!!$overseasfb->t3TrimC!!}, n65 : {!!$overseasfb->statTrimC!!}, n66 : {!!$overseasfb->flexiTrimC!!},
         n71 : {!!$overseasfb->covDieC!!}, n72 : {!!$overseasfb->t1DieC!!}, n73 : {!!$overseasfb->t2DieC!!}, n74 : {!!$overseasfb->t3DieC!!}, n75 : {!!$overseasfb->statDieC!!}, n76 : {!!$overseasfb->flexiDieC!!},
         n81 : {!!$overseasfb->covStripC!!}, n82 : {!!$overseasfb->t1StripC!!}, n83 : {!!$overseasfb->t2StripC!!}, n84 : {!!$overseasfb->t3stripC!!}, n85 : {!!$overseasfb->statStripC!!}, n86 : {!!$overseasfb->flexiStripC!!},
         n91 : {!!$overseasfb->covFoldC!!}, n92 : {!!$overseasfb->t1FoldC!!}, n93 : {!!$overseasfb->t2FoldC!!}, n94 : {!!$overseasfb->t3FoldC!!}, n95 : {!!$overseasfb->statFoldC!!}, n96 : {!!$overseasfb->flexiFoldC!!},
         n101 : {!!$overseasfb->covSewC!!}, n102 : {!!$overseasfb->t1SewC!!}, n103 : {!!$overseasfb->t2SewC!!}, n104 : {!!$overseasfb->t3SewC!!}, n105 : {!!$overseasfb->statSewC!!}, n106 : {!!$overseasfb->flexiSewC!!},
         n111 : {!!$overseasfb->covBindC!!}, n112 : {!!$overseasfb->t1BindC!!}, n113 : {!!$overseasfb->t2BindC!!}, n114 : {!!$overseasfb->t3BindC!!}, n115 : {!!$overseasfb->statBindC!!}, n116 : {!!$overseasfb->flexiBindC!!},
         n121 : {!!$overseasfb->cov3C!!}, n122 : {!!$overseasfb->t13C!!}, n123 : {!!$overseasfb->t23C!!}, n124 : {!!$overseasfb->t33C!!}, n125 : {!!$overseasfb->stat3C!!}, n126 : {!!$overseasfb->flexi3C!!},

         ma1: {!!$overseasfb->surfMake!!}, ma2: {!!$overseasfb->surfWaste!!}, ma3: {!!$overseasfb->trimMake!!}, ma4: {!!$overseasfb->trimWaste!!}, ma5: {!!$overseasfb->dieMake!!}, ma6: {!!$overseasfb->dieWaste!!},
         ma7: {!!$overseasfb->stripMake!!}, ma8: {!!$overseasfb->stripWaste!!}, ma9: {!!$overseasfb->foldMake!!}, ma10: {!!$overseasfb->foldWaste!!},
         ma11: {!!$overseasfb->sewMake!!},ma12: {!!$overseasfb->sewWaste!!},ma13: {!!$overseasfb->bindMake!!},ma14: {!!$overseasfb->bindWaste!!},
         ma15: {!!$overseasfb->threeMake!!},ma16: {!!$overseasfb->threeWaste!!},ma17: {!!$overseasfb->PackMake!!},ma18: {!!$overseasfb->packWaste!!}
         ,col1: {!!$overseasfb->colMakeFront!!},col2: {!!$overseasfb->colMakeBack!!},col3: {!!$overseasfb->colWaste!!},col6: {!!$overseasfb->colMakeFront1!!},
         col7: {!!$overseasfb->colMakeBack1!!},col8: {!!$overseasfb->colWaste1!!},col11: {!!$overseasfb->colMakeFront2!!},
         col12: {!!$overseasfb->colMakeBack2!!},col13: {!!$overseasfb->colWaste2!!},

         n6e: {!!$overseasfb->flexi2OrderC!!}, n13e: {!!$overseasfb->t4UpC!!}, n14e: {!!$overseasfb->t5UpC!!}, n15e: {!!$overseasfb->stat2UpC!!}, n16e: {!!$overseasfb->flexi2UpC!!}
         , n23e:{!!$overseasfb->t4signC!!}, n24e:{!!$overseasfb->t5signC!!}, n25e: {!!$overseasfb->stat2SignC!!}, n26e:{!!$overseasfb->flexi2SignC!!}
         , n33e:{!!$overseasfb->t4FrontC!!}, n34e:{!!$overseasfb->t5FrontC!!}, n35e: {!!$overseasfb->stat2FrontC!!}, n36e:{!!$overseasfb->flexi2FrontC!!},
         n43e: {!!$overseasfb->t4BackC!!}, n44e: {!!$overseasfb->t5BackC!!}, n45e: {!!$overseasfb->stat2BackC!!}, n46e: {!!$overseasfb->flexi2BackC!!}
         , n53e:{!!$overseasfb->t4SurfC!!}, n54e:{!!$overseasfb->t5SurfC!!}, n55e: {!!$overseasfb->stat2SurfC!!}, n56e:{!!$overseasfb->flexi2SurfC!!}
         , n63e:{!!$overseasfb->t4TrimC!!}, n64e:{!!$overseasfb->t5TrimC!!}, n65e: {!!$overseasfb->stat2TrimC!!}, n66e:{!!$overseasfb->flexi2TrimC!!},
         n73e: {!!$overseasfb->t4DieC!!}, n74e: {!!$overseasfb->t5DieC!!}, n75e: {!!$overseasfb->stat2DieC!!}, n76e: {!!$overseasfb->flexi2DieC!!}
         , n83e:{!!$overseasfb->t4StripC!!}, n84e:{!!$overseasfb->t5stripC!!}, n85e: {!!$overseasfb->stat2StripC!!}, n86e:{!!$overseasfb->flexi2StripC!!}
         , n93e:{!!$overseasfb->t4FoldC!!}, n94e:{!!$overseasfb->t5FoldC!!}, n95e: {!!$overseasfb->stat2FoldC!!}, n96e:{!!$overseasfb->flexi2FoldC!!},
         n103e: {!!$overseasfb->t4SewC!!}, n104e: {!!$overseasfb->t5SewC!!}, n105e: {!!$overseasfb->stat2SewC!!}, n106e: {!!$overseasfb->flexi2SewC!!}
         , n113e:{!!$overseasfb->t4BindC!!}, n114e:{!!$overseasfb->t5BindC!!}, n115e: {!!$overseasfb->stat2BindC!!}, n116e:{!!$overseasfb->flexi2BindC!!}
         , n123e:{!!$overseasfb->t43C!!}, n124e:{!!$overseasfb->t53C!!}, n125e: {!!$overseasfb->stat23C!!}, n126e:{!!$overseasfb->flexi23C!!}
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
         n5: function(){
           return this.n1;
         },
         n6: function(){
           return this.n1;
         },
         n3e: function(){
           return this.n1;
         },
         n4e: function(){
           return this.n1;
         },
         n5e: function(){
           return this.n2;
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
           var statement = ((parseFloat(this.col6 ) * parseFloat(this.n31)) + (parseFloat(this.col7) * parseFloat(this.n41)));
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

         na133e: function(){
           var statement = ((parseFloat(this.col1) * parseFloat(this.n33e)) + (parseFloat(this.col2) * parseFloat(this.n43e)));
           var if1 = 0;
           var if2 = 0;

           if (statement < 300)
           {
               if2 = 300;
           } else{
               if2 = statement;
           }
           if( this.n3e == 0)
           {
               if1 = 0;
           } else{
               if1 = ((parseFloat(this.n3e) / parseFloat(this.n13e) * (parseFloat(this.col3) / 100) * (parseFloat(this.n33e) + parseFloat(this.n43e)) + parseFloat(if2)) * parseFloat(this.n23e));
             }
           return this.f1(if1);
         },
         na134e: function(){
           var statement = ((parseFloat(this.col6) * parseFloat(this.n34e)) + (parseFloat(this.col7) * parseFloat(this.n44e)));
           var if1 = 0;
           var if2 = 0;

           if (statement < 300)
           {
               if2 = 300;
           } else{
               if2 = statement;
           }
           if( this.n4e == 0)
           {
               if1 = 0;
           } else{
               if1 = ((parseFloat(this.n34e) / parseFloat(this.n14e) * (parseFloat(this.col8) / 100) * (parseFloat(this.n34e) + parseFloat(this.n44e)) + parseFloat(if2)) * parseFloat(this.n24e));
             }
           return this.f1(if1);
         },
         na135e: function(){
           var statement = ((parseFloat(this.col11) * parseFloat(this.n35e)) + (parseFloat(this.col12) * parseFloat(this.n45e)));
           var if1 = 0;
           var if2 = 0;

           if (statement < 160)
           {
               if2 = 160;
           } else{
               if2 = statement;
           }
           if( this.n5e == 0)
           {
               if1 = 0;
           } else{
               if1 = ((parseFloat(this.n5e) / parseFloat(this.n15e) * (parseFloat(this.col13) / 100) * (parseFloat(this.n35e) + parseFloat(this.n45e)) + parseFloat(if2)) * parseFloat(this.n25e));
             }
           return this.f1(if1);
         },
         na136e: function(){
           var statement = ((parseFloat(this.col6) * parseFloat(this.n36e)) + (parseFloat(this.col7) * parseFloat(this.n46e)));
           var if1 = 0;
           var if2 = 0;

           if (statement < 100)
           {
               if2 = 100;
           } else{
               if2 = statement;
           }
           if( this.n6e == 0)
           {
               if1 = 0;
           } else{
               if1 = ((parseFloat(this.n6e) / parseFloat(this.n16e) * (parseFloat(this.col8) / 100) * (parseFloat(this.n36e) + parseFloat(this.n46e)) + parseFloat(if2)) * parseFloat(this.n26e));
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
         na143e: function(){
           var n143a = ((parseFloat(this.n3e) / parseFloat(this.n13e) * (parseFloat(this.ma2)/ 100) + parseFloat(this.ma1))* parseFloat(this.n23e) * parseFloat(this.n53e));
           return this.f1(n143a);
         },
         na144e: function(){
           var n144a = ((parseFloat(this.n4e) / parseFloat(this.n14e) * (parseFloat(this.ma2)/ 100) + parseFloat(this.ma1))* parseFloat(this.n24e) * parseFloat(this.n54e));
           return this.f1(n144a);
         },
         na145e: function(){
           var n145a = ((parseFloat(this.n5e )/parseFloat( this.n15e) * (parseFloat(this.ma2)/ 100) + parseFloat(this.ma1))* parseFloat(this.n25e) * parseFloat(this.n55e)) ;
           return this.f1(n145a);
         },
         na146e: function(){
           var n146a = ((parseFloat(this.n6e) / parseFloat(this.n16e) * (parseFloat(this.ma2)/ 100) + parseFloat(this.ma1))*parseFloat(this.n26e) * parseFloat(this.n56e));
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
         na153e: function(){
           var n153a = ((parseFloat(this.n3e) / parseFloat(this.n13e) * (parseFloat(this.ma4)/ 100) + parseFloat(this.ma3))* parseFloat(this.n23e) * parseFloat(this.n63e));
           return this.f1(n153a);
         },
         na154e: function(){
           var n154a = ((parseFloat(this.n4e) / parseFloat(this.n14e )* (parseFloat(this.ma4)/ 100) + parseFloat(this.ma3))* parseFloat(this.n24e) * parseFloat(this.n64e));
           return this.f1(n154a);
         },
         na155e: function(){
           var n155a = ((parseFloat(this.n5e) / parseFloat(this.n15e) * (parseFloat(this.ma4)/ 100) + parseFloat(this.ma3))* parseFloat(this.n25e )* parseFloat(this.n65e)) ;
           return this.f1(n155a);
         },
         na156e: function(){
           var n156a = ((parseFloat(this.n6e) / parseFloat(this.n16e) * (parseFloat(this.ma4)/ 100) + parseFloat(this.ma3))* parseFloat(this.n26e) * parseFloat(this.n66e));
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
         na163e: function(){
           var n163a = ((parseFloat(this.n3e) / parseFloat(this.n13e) * (parseFloat(this.ma6)/ 100) + parseFloat(this.ma5))* parseFloat(this.n23e) * parseFloat(this.n73e));
           return this.f1(n163a);
         },
         na164e: function(){
           var n164a = ((parseFloat(this.n4e) / parseFloat(this.n14e) * (parseFloat(this.ma6)/ 100) + parseFloat(this.ma5))* parseFloat(this.n24e) * parseFloat(this.n74e));
           return this.f1(n164a);
         },
         na165e: function(){
           var n165a = ((parseFloat(this.n5e) / parseFloat(this.n15e) * (parseFloat(this.ma6)/ 100) + parseFloat(this.ma5))* parseFloat(this.n25e) * parseFloat(this.n75e));
           return this.f1(n165a);
         },
         na166e: function(){
           var n166a = (160 + (parseFloat(this.n6e) / parseFloat(this.n16e) * (0.5/100))) ;
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
         na173e: function(){
           var n173a = ((parseFloat(this.n3e) / parseFloat(this.n13e) * (parseFloat(this.ma8)/ 100) + parseFloat(this.ma7))* parseFloat(this.n23e) * parseFloat(this.n83e));
           return this.f1(n173a);
         },
         na174e: function(){
           var n174a = ((parseFloat(this.n4e) / parseFloat(this.n14e) * (parseFloat(this.ma8)/ 100) + parseFloat(this.ma7))* parseFloat(this.n24e) * parseFloat(this.n84e));
           return this.f1(n174a);
         },
         na175e: function(){
           var n175a = ((parseFloat(this.n5e) / parseFloat(this.n15e) * (parseFloat(this.ma8)/ 100) + parseFloat(this.ma7))* parseFloat(this.n25e) * parseFloat(this.n85e));
           return this.f1(n175a);
         },
         na176e: function(){
           var n176a = ((parseFloat(this.n6e) / parseFloat(this.n16e) * (parseFloat(this.ma8)/ 100) + parseFloat(this.ma7))* parseFloat(this.n26e) * parseFloat(this.n86e));
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
             na183e: function() {
               var if1 = 0;
               var if2 = 0;
               var if3 = 0;
               var if4 = 0;

               if (this.n3e > 19999)
               {
                   if4 = 50;
               } else{
                   if4 = 0;
               }

               if ( this.n3e > 9999)
               {
                   if3 = 75;
               } else{
                   if3 = 0;
               }

               if (this.n3e < 4000)
               {
                if2 = 50;
               } else {
                   if2 = if3;
               }

               if( this.n3e == 0)
               {
                   if1 = 0;
               } else{
                   if1 = (parseFloat(this.n3e) / parseFloat(this.n13e) * parseFloat(this.ma10) / 100 + parseFloat(this.ma9) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n23e)* parseFloat(this.n93e);
               }
               return this.f1(if1);
             },
             na184e: function()
             {
               var if1 = 0;
               var if2 = 0;
               var if3 = 0;
               var if4 = 0;

               if (this.n4e > 19999)
               {
                   if4 = 50;
               } else{
                   if4 = 0;
               }

               if ( this.n4e > 9999)
               {
                   if3 = 75;
               } else{
                   if3 = 0;
               }

               if (this.n4e < 4000)
               {
                if2 = 50;
               } else {
                   if2 = if3;
               }

               if( this.n4e == 0)
               {
                   if1 = 0;
               } else{
                   if1 = ((parseFloat(this.n4e) / parseFloat(this.n14e) * parseFloat(this.ma10) / 100 + parseFloat(this.ma9) + parseFloat(if2) + parseFloat(if4))  * parseFloat(this.n24e) * parseFloat(this.n94e));
               }
               return this.f1(if1);
             },
             na185e: function()
             {
               var if1 = 0;
               var if2 = 0;
               var if3 = 0;
               var if4 = 0;

               if (this.n5e> 19999)
               {
                   if4 = 50;
               } else{
                   if4 = 0;
               }

               if ( this.n5e > 9999)
               {
                   if3 = 75;
               } else{
                   if3 = 0;
               }

               if (this.n5e < 4000)
               {
                if2 = 50;
               } else {
                   if2 = if3;
               }

               if( this.n5e == 0)
               {
                   if1 = 0;
               } else{
                   if1 = (parseFloat(this.n5e) / parseFloat(this.n15e) * parseFloat(this.ma10 / 100 )+ parseFloat(this.ma9) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n25e) * parseFloat(this.n95e);
               }
               return this.f1(if1);
             },
             na186e: function()
             {
               var if1 = 0;
               var if2 = 0;
               var if3 = 0;
               var if4 = 0;

               if (this.n6e> 19999)
               {
                   if4 = 50;
               } else{
                   if4 = 0;
               }

               if ( this.n6e > 9999)
               {
                   if3 = 75;
               } else{
                   if3 = 0;
               }

               if (this.n6e < 4000)
               {
                if2 = 50;
               } else {
                   if2 = if3;
               }

               if( this.n6e == 0)
               {
                   if1 = 0;
               } else{
                   if1 = (parseFloat(this.n6e) / parseFloat(this.n16e) * parseFloat(this.ma10) / 100 + parseFloat(this.ma9) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n26e) * parseFloat(this.n96e);
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
             na193e: function(){
               var n193a = ((parseFloat(this.n3e) / parseFloat(this.n13e) * (parseFloat(this.ma12)/ 100) + parseFloat(this.ma11))* parseFloat(this.n23e) * parseFloat(this.n103e));
               return this.f1(n193a);
             },
             na194e: function(){
               var n194a = ((parseFloat(this.n4e) / parseFloat(this.n14e) * (parseFloat(this.ma12)/ 100) + parseFloat(this.ma11))* parseFloat(this.n24e) * parseFloat(this.n104e));
               return this.f1(n194a);
             },
             na195e: function(){
               var n195a = ((parseFloat(this.n5e) / parseFloat(this.n15e) * (parseFloat(this.ma12)/ 100) + parseFloat(this.ma11))* parseFloat(this.n25e) * parseFloat(this.n105e));
               return this.f1(n195a);
             },
             na196e: function(){
               var n196a = ((parseFloat(this.n6e) / parseFloat(this.n16e) * (parseFloat(this.ma12)/ 100) + parseFloat(this.ma11))* parseFloat(this.n26e) * parseFloat(this.n106e));
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
                 na203e: function() {
                     var if1 = 0;
                     var if2 = 0;
                     var if3 = 0;
                     var if4 = 0;

                     if (this.n3e > 19999)
                     {
                         if4 = 50;
                     } else{
                         if4 = 0;
                     }

                     if ( this.n3e > 9999)
                     {
                         if3 = 75;
                     } else{
                         if3 = 0;
                     }

                     if (this.n3e < 4000)
                     {
                      if2 = 50;
                     } else {
                         if2 = if3;
                     }

                     if( this.n3e == 0)
                     {
                         if1 = 0;
                     } else{
                         if1 = (parseFloat(this.n3e) / parseFloat(this.n13e) * parseFloat(this.ma14) / 100 + parseFloat(this.ma13) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n23e) * parseFloat(this.n113e);
                     }
                     return this.f1(if1);
                   },
                 na204e: function()
                   {
                     var if1 = 0;
                     var if2 = 0;
                     var if3 = 0;
                     var if4 = 0;

                     if (this.n4e > 19999)
                     {
                         if4 = 50;
                     } else{
                         if4 = 0;
                     }

                     if ( this.n4e > 9999)
                     {
                         if3 = 75;
                     } else{
                         if3 = 0;
                     }

                     if (this.n4e < 4000)
                     {
                      if2 = 50;
                     } else {
                         if2 = if3;
                     }

                     if( this.n4e == 0)
                     {
                         if1 = 0;
                     } else{
                         if1 = (parseFloat(this.n4e) / parseFloat(this.n14e) * parseFloat(this.ma14) / 100 + parseFloat(this.ma13) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n24e) * parseFloat(this.n114e);
                     }
                     return this.f1(if1);
                   },
                 na205e: function()
                   {
                     var if1 = 0;
                     var if2 = 0;
                     var if3 = 0;
                     var if4 = 0;

                     if (this.n5e> 19999)
                     {
                         if4 = 50;
                     } else{
                         if4 = 0;
                     }

                     if ( this.n5e > 9999)
                     {
                         if3 = 75;
                     } else{
                         if3 = 0;
                     }

                     if (this.n5e < 4000)
                     {
                      if2 = 50;
                     } else {
                         if2 = if3;
                     }

                     if( this.n5e == 0)
                     {
                         if1 = 0;
                     } else{
                         if1 = (parseFloat(this.n5e) / parseFloat(this.n15e) * parseFloat(this.ma14) / 100 + parseFloat(this.ma13) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n25e) * parseFloat(this.n115e);
                     }
                     return this.f1(if1);
                   },
                 na206e: function()
                   {
                     var if1 = 0;
                     var if2 = 0;
                     var if3 = 0;
                     var if4 = 0;

                     if (this.n6e> 19999)
                     {
                         if4 = 50;
                     } else{
                         if4 = 0;
                     }

                     if ( this.n6e > 9999)
                     {
                         if3 = 75;
                     } else{
                         if3 = 0;
                     }

                     if (this.n6e < 4000)
                     {
                      if2 = 50;
                     } else {
                         if2 = if3;
                     }

                     if( this.n6e == 0)
                     {
                         if1 = 0;
                     } else{
                         if1 = (parseFloat(this.n6e) / parseFloat(this.n16e) * parseFloat(this.ma14) / 100 + parseFloat(this.ma13) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n26e) * parseFloat(this.n116e);
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
                 na213e: function(){
                   var n2013a = ((parseFloat(this.n3e) / parseFloat(this.n13e) * (parseFloat(this.ma16)/ 100) + parseFloat(this.ma15))* parseFloat(this.n23e) * parseFloat(this.n123e));
                   return this.f1(n2013a);
                   },
                 na214e: function(){
                   var n2014a = ((parseFloat(this.n4e) / parseFloat(this.n14e) * (parseFloat(this.ma16)/ 100) + parseFloat(this.ma15))* parseFloat(this.n24e) * parseFloat(this.n124e));
                   return this.f1(n2014a);
                   },
                 na215e: function(){
                   var n2015a = ((parseFloat(this.n5e) / parseFloat(this.n15e) * (parseFloat(this.ma16)/ 100) + parseFloat(this.ma15))* parseFloat(this.n25e) * parseFloat(this.n125e));
                   return this.f1(n2015a);
                   },
                 na216e: function(){
                   var n2016a = ((parseFloat(this.n6e) / parseFloat(this.n16e) * (parseFloat(this.ma16)/ 100) + parseFloat(this.ma15))* parseFloat(this.n26e) * parseFloat(this.n126e));
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
               na223e:function() {
                 var n2023a = (parseFloat(this.n3e) / parseFloat(this.n13e) * parseFloat(this.n23e) * (parseFloat(this.ma18)/ 100));
                 return this.f1(n2023a);
                 },
               na224e:function() {
                 var n2024a = parseFloat((this.n4e) / parseFloat(this.n14e) * parseFloat(this.n24e) * (parseFloat(this.ma18)/ 100));
                 return this.f1(n2024a);
                 },
               na225e:function() {
                 var n2025a = (parseFloat(this.n5e) / parseFloat(this.n15e) * parseFloat(this.n25e) * (parseFloat(this.ma18)/ 100));
                 return this.f1(n2025a);
                 },
               na226e:function() {
                 var n2026a = (parseFloat(this.n6e) / parseFloat(this.n1e) * parseFloat(this.n26e) * (parseFloat(this.ma18)/ 100));
                 return this.f1(n2026a);
                 },

                 n3000: function(){
                     var na = (parseFloat(this.na131) + parseFloat(this.na141) + parseFloat(this.na151) + parseFloat(this.na161) + parseFloat(this.na171) + parseFloat(this.na181) + parseFloat(this.na191) + parseFloat(this.na201) + parseFloat(this.na211) + parseFloat(this.na221));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                 },
                 n3001: function(){
                   if (this.n3000 == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n3000) - parseFloat(this.na131) + (parseFloat(this.n1) / parseFloat(this.n11)));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3002: function(){
                   if (this.n3000 == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n1) / parseFloat(this.n11) + parseFloat(this.n3000));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3003: function(){
                   var na = (parseFloat(this.na136) + parseFloat(this.na146) + parseFloat(this.na156) + parseFloat(this.na166) + parseFloat(this.na176) + parseFloat(this.na186) + parseFloat(this.na196)+ parseFloat(this.na206) + parseFloat(this.na216) + parseFloat(this.na226));
                   var na1 = na.toString();
                   var last1=na1.substr(- 1); //Get 1 character
                   var last2 = na1.substr(-2);
                   var na11 = na1.substr(0, na1.length-2);
                   if (last1 < 5)
                   {
                     a = last2 - last1;

                   }
                   if(last1 > 5) {
                     a = last2 - last1 + 10;
                   }
                    return (na11 + a);
                 },
                 n3004: function(){
                   if (this.n3003 == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n3003) - parseFloat(this.na136) - parseFloat(this.na166) + parseFloat(this.n6) / parseFloat(this.n16));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3005: function(){
                   if (this.n3003 == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n6) / parseFloat(this.n16) + parseFloat(this.n3003));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },

                 n3003e: function(){
                   var na = (parseFloat(this.na136e) + parseFloat(this.na146e) + parseFloat(this.na156e) + parseFloat(this.na166e) + parseFloat(this.na176e) + parseFloat(this.na186e) + parseFloat(this.na196e)+ parseFloat(this.na206e) + parseFloat(this.na216e) + parseFloat(this.na226e));
                   var na1 = na.toString();
                   var last1=na1.substr(- 1); //Get 1 character
                   var last2 = na1.substr(-2);
                   var na11 = na1.substr(0, na1.length-2);
                   if (last1 < 5)
                   {
                     a = last2 - last1;

                   }
                   if(last1 > 5) {
                     a = last2 - last1 + 10;
                   }
                    return (na11 + a);
                 },
                 n3004e: function(){
                   if (this.n3003e == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n3003e) - parseFloat(this.na136e) - parseFloat(this.na166e) + parseFloat(this.n6e) / parseFloat(this.n16e));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3005e: function(){
                   if (this.n3003e == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n6e) / parseFloat(this.n16e) + parseFloat(this.n3003e));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3006:function(){
                   var na = (parseFloat(this.na132) + parseFloat(this.na142) + parseFloat(this.na152) + parseFloat(this.na162) + parseFloat(this.na172) + parseFloat(this.na182) + parseFloat(this.na192)+ parseFloat(this.na202) + parseFloat(this.na212) + parseFloat(this.na222));
                   var na1 = na.toString();
                   var last1=na1.substr(- 1); //Get 1 character
                   var last2 = na1.substr(-2);
                   var na11 = na1.substr(0, na1.length-2);
                   if (last1 < 5)
                   {
                     a = last2 - last1;

                   }
                   if(last1 > 5) {
                     a = last2 - last1 + 10;
                   }
                    return (na11 + a);
                 },
                 n3007: function(){
                   if (this.n3006 == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n3006) - parseFloat(this.na132) + parseFloat(this.n2) / parseFloat(this.n12));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3008: function(){
                   if (this.n3006 == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n2) / parseFloat(this.n12) + parseFloat(this.n3006));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3009: function(){
                   var na = (parseFloat(this.na133) + parseFloat(this.na143) + parseFloat(this.na153) + parseFloat(this.na163) + parseFloat(this.na173) + parseFloat(this.na183) + parseFloat(this.na193) + parseFloat(this.na203) + parseFloat(this.na213) + parseFloat(this.na223));
                   var na1 = na.toString();
                   var last1=na1.substr(- 1); //Get 1 character
                   var last2 = na1.substr(-2);
                   var na11 = na1.substr(0, na1.length-2);
                   if (last1 < 5)
                   {
                     a = last2 - last1;

                   }
                   if(last1 > 5) {
                     a = last2 - last1 + 10;
                   }
                    return (na11 + a);
                 },
                 n3010: function(){
                   if (this.n3009 == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n3009) -parseFloat( this.na133) + parseFloat(this.n3) / parseFloat(this.n13));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3011: function(){
                   if (this.n3009 == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n3) / parseFloat(this.n13) + parseFloat(this.n3009));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3012: function(){
                   var na = (parseFloat(this.na134) + parseFloat(this.na144) + parseFloat(this.na154) + parseFloat(this.na164) + parseFloat(this.na174) + parseFloat(this.na184) + parseFloat(this.na194)+ parseFloat(this.na204) + parseFloat(this.na214) + parseFloat(this.na224));
                   var na1 = na.toString();
                   var last1=na1.substr(- 1); //Get 1 character
                   var last2 = na1.substr(-2);
                   var na11 = na1.substr(0, na1.length-2);
                   if (last1 < 5)
                   {
                     a = last2 - last1;

                   }
                   if(last1 > 5) {
                     a = last2 - last1 + 10;
                   }
                    return (na11 + a);
                 },
                 n3013: function(){
                   if (this.n3012 == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n3012) - parseFloat(this.na134) + parseFloat(this.n4) / parseFloat(this.n14));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3014: function(){
                   if (this.n3012 == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n4) / parseFloat(this.n14) + parseFloat(this.n3012));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },

                 n3012e: function(){
                   var na = (parseFloat(this.na133e) + parseFloat(this.na143e) + parseFloat(this.na153e) + parseFloat(this.na163e) + parseFloat(this.na173e) + parseFloat(this.na183e) + parseFloat(this.na193e)+ parseFloat(this.na203e) + parseFloat(this.na213e) + parseFloat(this.na223e));
                   var na1 = na.toString();
                   var last1=na1.substr(- 1); //Get 1 character
                   var last2 = na1.substr(-2);
                   var na11 = na1.substr(0, na1.length-2);
                   if (last1 < 5)
                   {
                     a = last2 - last1;

                   }
                   if(last1 > 5) {
                     a = last2 - last1 + 10;
                   }
                    return (na11 + a);
                 },
                 n3013e: function(){
                   if (this.n3012e == 0)
                   {
                     return 0;
                   }
                   else {
                     var nad = (parseFloat(this.n3e) / parseFloat(this.n13e))+ (parseFloat(this.n3012e));
                     var nax = nad.toString();
                     var last1=nax.substr(- 1); //Get 1 character
                     var last2 = nax.substr(-2);
                     var na1x = nax.substr(0, nax.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na1x + a);
                   }
                 },
                 n3014e: function(){
                   if (this.n3012e == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n3e) / parseFloat(this.n13e) + parseFloat(this.n3012e));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },

                 n3012ee: function(){
                   var na = (parseFloat(this.na134e) + parseFloat(this.na144e) + parseFloat(this.na154e) + parseFloat(this.na164e) + parseFloat(this.na174e) + parseFloat(this.na184e) + parseFloat(this.na194e)+ parseFloat(this.na204e) + parseFloat(this.na214e) + parseFloat(this.na224e));
                   var na1 = na.toString();
                   var last1=na1.substr(- 1); //Get 1 character
                   var last2 = na1.substr(-2);
                   var na11 = na1.substr(0, na1.length-2);
                   if (last1 < 5)
                   {
                     a = last2 - last1;

                   }
                   if(last1 > 5) {
                     a = last2 - last1 + 10;
                   }
                    return (na11 + a);
                 },
                 n3013ee: function(){
                   if (this.n3012ee == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n3012ee) - parseFloat(this.na134e) + parseFloat(this.n4e) / parseFloat(this.n14e));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3014ee: function(){
                   if (this.n3012ee == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n4e) / parseFloat(this.n14e) + parseFloat(this.n3012ee));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3015: function(){
                   var na = (parseFloat(this.na135) + parseFloat(this.na145) + parseFloat(this.na155) + parseFloat(this.na165) + parseFloat(this.na175) + parseFloat(this.na185)+ parseFloat(this.na195)+ parseFloat(this.na205) + parseFloat(this.na215) + parseFloat(this.na225));
                   var na1 = na.toString();
                   var last1=na1.substr(- 1); //Get 1 character
                   var last2 = na1.substr(-2);
                   var na11 = na1.substr(0, na1.length-2);
                   if (last1 < 5)
                   {
                     a = last2 - last1;

                   }
                   if(last1 > 5) {
                     a = last2 - last1 + 10;
                   }
                    return (na11 + a);
                 },
                 n3016: function(){
                   if (this.n3015 == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n3015) - parseFloat(this.na135) + parseFloat(this.n5) / parseFloat(this.n15));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3017: function(){
                   if (this.n3015 == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n5) / parseFloat(this.n15) + parseFloat(this.n3015));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },

                 n3015e: function(){
                   var na = (parseFloat(this.na135e) + parseFloat(this.na145e) + parseFloat(this.na155e) + parseFloat(this.na165e) + parseFloat(this.na175e) + parseFloat(this.na185e)+ parseFloat(this.na195e)+ parseFloat(this.na205e) + parseFloat(this.na215e) + parseFloat(this.na225e));
                   var na1 = na.toString();
                   var last1=na1.substr(- 1); //Get 1 character
                   var last2 = na1.substr(-2);
                   var na11 = na1.substr(0, na1.length-2);
                   if (last1 < 5)
                   {
                     a = last2 - last1;

                   }
                   if(last1 > 5) {
                     a = last2 - last1 + 10;
                   }
                    return (na11 + a);
                 },
                 n3016e: function(){
                   if (this.n3015e == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n3015e) - parseFloat(this.na135e) + parseFloat(this.n5e) / parseFloat(this.n15e));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
                   }
                 },
                 n3017e: function(){
                   if (this.n3015e == 0)
                   {
                     return 0;
                   }
                   else {
                     var na = (parseFloat(this.n5e) / parseFloat(this.n15e) + parseFloat(this.n3015e));
                     var na1 = na.toString();
                     var last1=na1.substr(- 1); //Get 1 character
                     var last2 = na1.substr(-2);
                     var na11 = na1.substr(0, na1.length-2);
                     if (last1 < 5)
                     {
                       a = last2 - last1;

                     }
                     if(last1 > 5) {
                       a = last2 - last1 + 10;
                     }
                      return (na11 + a);
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
