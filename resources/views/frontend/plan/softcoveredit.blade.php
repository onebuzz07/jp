@extends('frontend.layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/planning.css') }}" />
@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
    <h3>Soft Cover v1.5 <small>(For colour and black & white)</small></h3>
<div class="row col-md-12" id="app">
{!! Form::model($sales, array('route' => array('frontend.plan.softcoverupdate', $sales->id), 'method' => 'POST')) !!}
  <table class="table table-bordered" id="users-table">
      <thead>
          <tr>
            <th>{!! Form::number('half', $softcover->half, array('class' => 'form-control', 'min'=>'0', 'id'=>'n1000a', 'v-model'=>'n1000a', 'readonly'=>true)) !!}</th>

          </tr>
          <tr>
            <th>1/2</th>
            <th>Color</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>B/W</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th></th>
            <th>Cover</th>
            <th>Text1</th>
            <th>Text2</th>
            <th>Text3</th>
            <th>Sticker</th>
            <th></th>
            <th>Cover</th>
            <th>Text1</th>
            <th>Text2</th>
            <th>Text3</th>
            <th>Sticker</th>
          </tr>

      </thead>
      <tbody>
        <tr>
          <td>P. Order Qty</td>
          <td>{!! Form::number('covOrderC', $softcover->covOrderC , array('class' => 'form-control', 'min'=>'0', 'id'=>'n1', 'v-model'=>"n1")) !!}</td>
          <td>{!! Form::number('t1OrderC', $softcover->t1OrderC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n2', 'v-model'=>"n2")) !!}</td>
          <td>{!! Form::number('t2OrderC', $softcover->t2OrderC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n3', 'v-model'=>"n3")) !!}</td>
          <td>{!! Form::number('t3OrderC', $softcover->t3OrderC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n4', 'v-model'=>"n4")) !!}</td>
          <td>{!! Form::number('statOrderC', $softcover->statOrderC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n5', 'v-model'=>"n5")) !!}</td>
          <td></td>
          <td>{!! Form::number('covOrderB', $softcover->covOrderB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>
          <td>{!! Form::number('t1OrderB', $softcover->t1OrderB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n7', 'v-model'=>"n7")) !!}</td>
          <td>{!! Form::number('t2OrderB', $softcover->t2OrderB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n8', 'v-model'=>"n8")) !!}</td>
          <td>{!! Form::number('t3OrderB', $softcover->t3OrderB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n9', 'v-model'=>"n9")) !!}</td>
          <td>{!! Form::number('statOrderB', $softcover->statOrderB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n10', 'v-model'=>"n10")) !!}</td>
        </tr>
        <tr>
          <td>Up(s) per sheet</td>
          <td>{!! Form::number('covUpC', $softcover->covUpC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n11', 'v-model'=>"n11")) !!}</td>
          <td>{!! Form::number('t1UpC', $softcover->t1UpC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n12', 'v-model'=>"n12")) !!}</td>
          <td>{!! Form::number('t2UpC', $softcover->t2UpC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n13', 'v-model'=>"n13")) !!}</td>
          <td>{!! Form::number('t3UpC', $softcover->t3UpC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n14', 'v-model'=>"n14")) !!}</td>
          <td>{!! Form::number('statUpC', $softcover->statUpC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n15', 'v-model'=>"n15")) !!}</td>
          <td></td>
          <td>{!! Form::number('covUpB', $softcover->covUpB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>
          <td>{!! Form::number('t1UpB', $softcover->t1UpB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n17', 'v-model'=>"n17")) !!}</td>
          <td>{!! Form::number('t2UpB', $softcover->t2UpB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n18', 'v-model'=>"n18")) !!}</td>
          <td>{!! Form::number('t3UpB', $softcover->t3UpB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n19', 'v-model'=>"n19")) !!}</td>
          <td>{!! Form::number('statUpB', $softcover->statUpB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n20', 'v-model'=>"n20")) !!}</td>
        </tr>
        <tr>
          <td>Signature/Spread(s)</td>
          <td>{!! Form::number('covSignC', $softcover->covSignC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n21', 'v-model'=>"n21")) !!}</td>
          <td>{!! Form::number('t1signC', $softcover->t1signC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n22', 'v-model'=>"n22")) !!}</td>
          <td>{!! Form::number('t2signC', $softcover->t2signC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n23', 'v-model'=>"n23")) !!}</td>
          <td>{!! Form::number('t3signC', $softcover->t3signC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n24', 'v-model'=>"n24")) !!}</td>
          <td>{!! Form::number('statSignC', $softcover->statSignC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n25', 'v-model'=>"n25")) !!}</td>
          <td></td>
          <td>{!! Form::number('covSignB', $softcover->covSignB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>
          <td>{!! Form::number('t1signB', $softcover->t1signB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n27', 'v-model'=>"n27")) !!}</td>
          <td>{!! Form::number('t2signB', $softcover->t2signB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n28', 'v-model'=>"n28")) !!}</td>
          <td>{!! Form::number('t3signB', $softcover->t3signB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n29', 'v-model'=>"n29")) !!}</td>
          <td>{!! Form::number('statSignB', $softcover->statSignB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n30', 'v-model'=>"n30")) !!}</td>
        </tr>
        <tr>
          <td>Front Color</td>
          <td>{!! Form::number('covFrontC', $softcover->covFrontC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n31', 'v-model'=>"n31")) !!}</td>
          <td>{!! Form::number('t1FrontC', $softcover->t1FrontC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n32', 'v-model'=>"n32")) !!}</td>
          <td>{!! Form::number('t2FrontC', $softcover->t2FrontC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n33', 'v-model'=>"n33")) !!}</td>
          <td>{!! Form::number('t3FrontC', $softcover->t3FrontC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n34', 'v-model'=>"n34")) !!}</td>
          <td>{!! Form::number('statFrontC', $softcover->statFrontC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n35', 'v-model'=>"n35")) !!}</td>
          <td></td>
          <td>{!! Form::number('covFrontB', $softcover->covFrontB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>
          <td>{!! Form::number('t1FrontB', $softcover->t1FrontB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n37', 'v-model'=>"n37")) !!}</td>
          <td>{!! Form::number('t2FrontB', $softcover->t2FrontB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n38', 'v-model'=>"n38")) !!}</td>
          <td>{!! Form::number('t3FrontB', $softcover->t3FrontB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n39', 'v-model'=>"n39")) !!}</td>
          <td>{!! Form::number('statFrontB', $softcover->statFrontB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n40', 'v-model'=>"n40")) !!}</td>
        </tr>
        <tr>
          <td>Back Color</td>
          <td>{!! Form::number('covBackC', $softcover->covBackC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n41', 'v-model'=>"n41")) !!}</td>
          <td>{!! Form::number('t1BackC', $softcover->t1BackC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n42', 'v-model'=>"n42")) !!}</td>
          <td>{!! Form::number('t2BackC', $softcover->t2BackC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n43', 'v-model'=>"n43")) !!}</td>
          <td>{!! Form::number('t3BackC', $softcover->t3BackC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n44', 'v-model'=>"n44")) !!}</td>
          <td>{!! Form::number('statBackC', $softcover->statBackC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n45', 'v-model'=>"n45")) !!}</td>
          <td></td>
          <td>{!! Form::number('covBackB', $softcover->covBackB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n46', 'v-model'=>"n46")) !!}</td>
          <td>{!! Form::number('t1BackB', $softcover->t1BackB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n47', 'v-model'=>"n47")) !!}</td>
          <td>{!! Form::number('t2BackB', $softcover->t2BackB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n48', 'v-model'=>"n48")) !!}</td>
          <td>{!! Form::number('t3BackB', $softcover->t3BackB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n49', 'v-model'=>"n49")) !!}</td>
          <td>{!! Form::number('statBackB', $softcover->statBackB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n50', 'v-model'=>"n50")) !!}</td>
        </tr>
        <tr><td></td></tr>
        <tr>
          <td>Surface Finishing</td>
          <td>{!! Form::number('covSurfC', $softcover->covSurfC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n51', 'v-model'=>"n51")) !!}</td>
          <td>{!! Form::number('t1SurfC', $softcover->t1SurfC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n52', 'v-model'=>"n52")) !!}</td>
          <td>{!! Form::number('t2SurfC', $softcover->t2SurfC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n53', 'v-model'=>"n53")) !!}</td>
          <td>{!! Form::number('t3SurfC', $softcover->t3SurfC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n54', 'v-model'=>"n54")) !!}</td>
          <td>{!! Form::number('statSurfC', $softcover->statSurfC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n55', 'v-model'=>"n55")) !!}</td>
          <td></td>
          <td>{!! Form::number('covSurfB', $softcover->covSurfB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n56', 'v-model'=>"n56")) !!}</td>
          <td>{!! Form::number('t1SurfB', $softcover->t1SurfB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n57', 'v-model'=>"n57")) !!}</td>
          <td>{!! Form::number('t2SurfB', $softcover->t2SurfB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n58', 'v-model'=>"n58")) !!}</td>
          <td>{!! Form::number('t3SurfB', $softcover->t3SurfB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n59', 'v-model'=>"n59")) !!}</td>
          <td>{!! Form::number('statSurfB', $softcover->statSurfB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n60', 'v-model'=>"n60")) !!}</td>
        </tr>
        <tr>
          <td>Trimming/Cutting</td>
          <td>{!! Form::number('covTrimC', $softcover->covTrimC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n61', 'v-model'=>"n61")) !!}</td>
          <td>{!! Form::number('t1TrimC', $softcover->t1TrimC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n62', 'v-model'=>"n62")) !!}</td>
          <td>{!! Form::number('t2TrimC', $softcover->t2TrimC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n63', 'v-model'=>"n63")) !!}</td>
          <td>{!! Form::number('t3TrimC', $softcover->t3TrimC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n64', 'v-model'=>"n64")) !!}</td>
          <td>{!! Form::number('statTrimC', $softcover->statTrimC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n65', 'v-model'=>"n65")) !!}</td>
          <td></td>
          <td>{!! Form::number('covTrimB', $softcover->covTrimB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n66', 'v-model'=>"n66")) !!}</td>
          <td>{!! Form::number('t1TrimB', $softcover->t1TrimB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n67', 'v-model'=>"n67")) !!}</td>
          <td>{!! Form::number('t2TrimB', $softcover->t2TrimB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n68', 'v-model'=>"n68")) !!}</td>
          <td>{!! Form::number('t3TrimB', $softcover->t3TrimB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n69', 'v-model'=>"n69")) !!}</td>
          <td>{!! Form::number('statTrimB', $softcover->statTrimB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n70', 'v-model'=>"n70")) !!}</td>
        </tr>
        <tr>
          <td>Diecut</td>
          <td>{!! Form::number('covDieC', $softcover->covDieC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n71', 'v-model'=>"n71")) !!}</td>
          <td>{!! Form::number('t1DieC', $softcover->t1DieC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n72', 'v-model'=>"n72")) !!}</td>
          <td>{!! Form::number('t2DieC', $softcover->t2DieC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n73', 'v-model'=>"n73")) !!}</td>
          <td>{!! Form::number('t3DieC', $softcover->t3DieC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n74', 'v-model'=>"n74")) !!}</td>
          <td>{!! Form::number('statDieC', $softcover->statDieC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n75', 'v-model'=>"n75")) !!}</td>
          <td></td>
          <td>{!! Form::number('covDieB', $softcover->covDieB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n76', 'v-model'=>"n76")) !!}</td>
          <td>{!! Form::number('t1DieB', $softcover->t1DieB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n77', 'v-model'=>"n77")) !!}</td>
          <td>{!! Form::number('t2DieB', $softcover->t2DieB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n78', 'v-model'=>"n78")) !!}</td>
          <td>{!! Form::number('t3DieB', $softcover->t3DieB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n79', 'v-model'=>"n79")) !!}</td>
          <td>{!! Form::number('statDieB', $softcover->statDieB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n80', 'v-model'=>"n80")) !!}</td>
        </tr>
        <tr>
          <td>Stripping</td>
          <td>{!! Form::number('covStripC', $softcover->covStripC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n81', 'v-model'=>"n81")) !!}</td>
          <td>{!! Form::number('t1StripC', $softcover->t1StripC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n82', 'v-model'=>"n82")) !!}</td>
          <td>{!! Form::number('t2StripC', $softcover->t2StripC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n83', 'v-model'=>"n83")) !!}</td>
          <td>{!! Form::number('t3stripC', $softcover->t3stripC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n84', 'v-model'=>"n84")) !!}</td>
          <td>{!! Form::number('statStripC', $softcover->statStripC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n85', 'v-model'=>"n85")) !!}</td>
          <td></td>
          <td>{!! Form::number('covStripB', $softcover->covStripB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n86', 'v-model'=>"n86")) !!}</td>
          <td>{!! Form::number('t1StripB', $softcover->t1StripB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n87', 'v-model'=>"n87")) !!}</td>
          <td>{!! Form::number('t2StripB', $softcover->t2StripB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n88', 'v-model'=>"n88")) !!}</td>
          <td>{!! Form::number('t3stripB', $softcover->t3stripB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n89', 'v-model'=>"n89")) !!}</td>
          <td>{!! Form::number('statStripB', $softcover->statStripB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n90', 'v-model'=>"n90")) !!}</td>
        </tr>
        <tr>
          <td>Folding</td>
          <td>{!! Form::number('covFoldC', $softcover->covFoldC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n91', 'v-model'=>"n91")) !!}</td>
          <td>{!! Form::number('t1FoldC', $softcover->t1FoldC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n92', 'v-model'=>"n92")) !!}</td>
          <td>{!! Form::number('t2FoldC', $softcover->t2FoldC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n93', 'v-model'=>"n93")) !!}</td>
          <td>{!! Form::number('t3FoldC', $softcover->t3FoldC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n94', 'v-model'=>"n94")) !!}</td>
          <td>{!! Form::number('statFoldC', $softcover->statFoldC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n95', 'v-model'=>"n95")) !!}</td>
          <td></td>
          <td>{!! Form::number('covFoldB', $softcover->covFoldB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n96', 'v-model'=>"n96")) !!}</td>
          <td>{!! Form::number('t1FoldB', $softcover->t1FoldB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n97', 'v-model'=>"n97")) !!}</td>
          <td>{!! Form::number('t2FoldB', $softcover->t2FoldB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n98', 'v-model'=>"n98")) !!}</td>
          <td>{!! Form::number('t3FoldB', $softcover->t3FoldB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n99', 'v-model'=>"n99")) !!}</td>
          <td>{!! Form::number('statFoldB', $softcover->statFoldB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n100', 'v-model'=>"n100")) !!}</td>
        </tr>
        <tr>
          <td>Sewing</td>
          <td>{!! Form::number('covSewC', $softcover->covSewC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n101', 'v-model'=>"n101")) !!}</td>
          <td>{!! Form::number('t1SewC', $softcover->t1SewC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n102', 'v-model'=>"n102")) !!}</td>
          <td>{!! Form::number('t2SewC', $softcover->t2SewC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n103', 'v-model'=>"n103")) !!}</td>
          <td>{!! Form::number('t3SewC', $softcover->t3SewC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n104', 'v-model'=>"n104")) !!}</td>
          <td>{!! Form::number('statSewC', $softcover->statSewC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n105', 'v-model'=>"n105")) !!}</td>
          <td></td>
          <td>{!! Form::number('covSewB', $softcover->covSewB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n106', 'v-model'=>"n106")) !!}</td>
          <td>{!! Form::number('t1SewB', $softcover->t1SewB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n107', 'v-model'=>"n107")) !!}</td>
          <td>{!! Form::number('t2SewB', $softcover->t2SewB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n108', 'v-model'=>"n108")) !!}</td>
          <td>{!! Form::number('t3SewB', $softcover->t3SewB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n109', 'v-model'=>"n109")) !!}</td>
          <td>{!! Form::number('statSewB', $softcover->statSewB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n110', 'v-model'=>"n110")) !!}</td>
        </tr>
        <tr>
          <td>Binding</td>
          <td>{!! Form::number('covBindC', $softcover->covBindC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n111', 'v-model'=>"n111")) !!}</td>
          <td>{!! Form::number('t1BindC', $softcover->t1BindC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n112', 'v-model'=>"n112")) !!}</td>
          <td>{!! Form::number('t2BindC', $softcover->t2BindC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n113', 'v-model'=>"n113")) !!}</td>
          <td>{!! Form::number('t3BindC', $softcover->t3BindC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n114', 'v-model'=>"n114")) !!}</td>
          <td>{!! Form::number('statBindC', $softcover->statBindC, array('class' => 'form-control', 'min'=>'0', 'id'=>'n115', 'v-model'=>"n115")) !!}</td>
          <td></td>
          <td>{!! Form::number('covBindB', $softcover->covBindB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n116', 'v-model'=>"n116")) !!}</td>
          <td>{!! Form::number('t1BindB', $softcover->t1BindB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n117', 'v-model'=>"n117")) !!}</td>
          <td>{!! Form::number('t2BindB', $softcover->t2BindB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n118', 'v-model'=>"n118")) !!}</td>
          <td>{!! Form::number('t3BindB', $softcover->t3BindB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n119', 'v-model'=>"n119")) !!}</td>
          <td>{!! Form::number('statBindB', $softcover->statBindB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n120', 'v-model'=>"n120")) !!}</td>
        </tr>
        <tr>
          <td>3 Knife Trim</td>
          <td>{!! Form::number('cov3C', $softcover->cov3C, array('class' => 'form-control', 'min'=>'0', 'id'=>'n121', 'v-model'=>"n121")) !!}</td>
          <td>{!! Form::number('t13C', $softcover->t13C, array('class' => 'form-control', 'min'=>'0', 'id'=>'n122', 'v-model'=>"n122")) !!}</td>
          <td>{!! Form::number('t23C', $softcover->t23C, array('class' => 'form-control', 'min'=>'0', 'id'=>'n123', 'v-model'=>"n123")) !!}</td>
          <td>{!! Form::number('t33C', $softcover->t33C, array('class' => 'form-control', 'min'=>'0', 'id'=>'n124', 'v-model'=>"n124")) !!}</td>
          <td>{!! Form::number('stat3C', $softcover->stat3C, array('class' => 'form-control', 'min'=>'0', 'id'=>'n125', 'v-model'=>"n125")) !!}</td>
          <td></td>
          <td>{!! Form::number('cov3B', $softcover->cov3B, array('class' => 'form-control', 'min'=>'0', 'id'=>'n126', 'v-model'=>"n126")) !!}</td>
          <td>{!! Form::number('t13B', $softcover->t13B, array('class' => 'form-control', 'min'=>'0', 'id'=>'n127', 'v-model'=>"n127")) !!}</td>
          <td>{!! Form::number('t23B', $softcover->t23B, array('class' => 'form-control', 'min'=>'0', 'id'=>'n128', 'v-model'=>"n128")) !!}</td>
          <td>{!! Form::number('t33B', $softcover->t33B, array('class' => 'form-control', 'min'=>'0', 'id'=>'n129', 'v-model'=>"n129")) !!}</td>
          <td>{!! Form::number('stat3B', $softcover->stat3B, array('class' => 'form-control', 'min'=>'0', 'id'=>'n130', 'v-model'=>"n130")) !!}</td>
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
            <th></th>
            <th>B/W</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th></th>
            <th>Cover</th>
            <th>Text1</th>
            <th>Text2</th>
            <th>Text3</th>
            <th>Sticker</th>
            <th></th>
            <th>Cover</th>
            <th>Text1</th>
            <th>Text2</th>
            <th>Text3</th>
            <th>Sticker</th>

          </tr>
      </thead>
      <tbody>

        <tr>
          <td>Printing</td>
          <td>{!! Form::text('covPrintC', $softcover->covPrintC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n131', 'v-model.number'=>"n131")) !!}</td>
          <td>{!! Form::text('t1PrintC', $softcover->t1PrintC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n132', 'v-model'=>"n132")) !!}</td>
          <td>{!! Form::text('t2PrintC', $softcover->t2PrintC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n133', 'v-model'=>"n133")) !!}</td>
          <td>{!! Form::text('t3PrintC', $softcover->t3PrintC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n134', 'v-model'=>"n134")) !!}</td>
          <td>{!! Form::text('statPrintC', $softcover->statPrintC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n135', 'v-model'=>"n135")) !!}</td>
          <td></td>
          <td>{!! Form::text('covPrintB', $softcover->covPrintB, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n136', 'v-model'=>"n136")) !!}</td>
          <td>{!! Form::text('t1PrintB', $softcover->t1PrintB, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n137', 'v-model'=>"n137")) !!}</td>
          <td>{!! Form::text('t2PrintB', $softcover->t2PrintB, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n138', 'v-model'=>"n138")) !!}</td>
          <td>{!! Form::text('t3PrintB', $softcover->t3PrintB, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n139', 'v-model'=>"n139")) !!}</td>
          <td>{!! Form::text('statPrintB', $softcover->statPrintB, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n140', 'v-model'=>"n140")) !!}</td>
        </tr>
        <tr>
          <td>Surface Finishing</td>
          <td>{!! Form::text('covSurfC1', $softcover->covSurfC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n141', 'v-model'=>"n141")) !!}</td>
          <td>{!! Form::text('t1SurfC1', $softcover->t1SurfC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n142', 'v-model'=>"n142")) !!}</td>
          <td>{!! Form::text('t2SurfC1', $softcover->t2SurfC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n143', 'v-model'=>"n143")) !!}</td>
          <td>{!! Form::text('t3SurfC1', $softcover->t3SurfC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n144', 'v-model'=>"n144")) !!}</td>
          <td>{!! Form::text('statSurfC1', $softcover->statSurfC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n145', 'v-model'=>"n145")) !!}</td>
          <td></td>
          <td>{!! Form::text('covSurfB1', $softcover->covSurfB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n146', 'v-model'=>"n146")) !!}</td>
          <td>{!! Form::text('t1SurfB1', $softcover->t1SurfB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n147', 'v-model'=>"n147")) !!}</td>
          <td>{!! Form::text('t2SurfB1', $softcover->t2SurfB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n148', 'v-model'=>"n148")) !!}</td>
          <td>{!! Form::text('t3SurfB1', $softcover->t3SurfB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n149', 'v-model'=>"n149")) !!}</td>
          <td>{!! Form::text('statSurfB1', $softcover->statSurfB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n150', 'v-model'=>"n150")) !!}</td>
        </tr>
        <tr>
          <td>Trimming/Cutting</td>
          <td>{!! Form::text('covTrimC1', $softcover->covTrimC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n151', 'v-model'=>"n151")) !!}</td>
          <td>{!! Form::text('t1TrimC1', $softcover->t1TrimC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n152', 'v-model'=>"n152")) !!}</td>
          <td>{!! Form::text('t2TrimC1', $softcover->t2TrimC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n153', 'v-model'=>"n153")) !!}</td>
          <td>{!! Form::text('t3TrimC1', $softcover->t3TrimC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n154', 'v-model'=>"n154")) !!}</td>
          <td>{!! Form::text('statTrimC1', $softcover->statTrimC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n155', 'v-model'=>"n155")) !!}</td>
          <td></td>
          <td>{!! Form::text('covTrimB1', $softcover->covTrimB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n156', 'v-model'=>"n156")) !!}</td>
          <td>{!! Form::text('t1TrimB1', $softcover->t1TrimB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n157', 'v-model'=>"n157")) !!}</td>
          <td>{!! Form::text('t2TrimB1', $softcover->t2TrimB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n158', 'v-model'=>"n158")) !!}</td>
          <td>{!! Form::text('t3TrimB1', $softcover->t3TrimB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n159', 'v-model'=>"n159")) !!}</td>
          <td>{!! Form::text('statTrimB1', $softcover->statTrimB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n160', 'v-model'=>"n160")) !!}</td>
        </tr>
        <tr>
          <td>Diecut</td>
          <td>{!! Form::text('covDieC1', $softcover->covDieC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n161', 'v-model.number'=>"n161")) !!}</td>
          <td>{!! Form::text('t1DieC1', $softcover->t1DieC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n162', 'v-model'=>"n162")) !!}</td>
          <td>{!! Form::text('t2DieC1', $softcover->t2DieC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n163', 'v-model'=>"n163")) !!}</td>
          <td>{!! Form::text('t3DieC1', $softcover->t3DieC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n164', 'v-model'=>"n164")) !!}</td>
          <td>{!! Form::text('statDieC1', $softcover->statDieC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n165', 'v-model'=>"n165")) !!}</td>
          <td></td>
          <td>{!! Form::text('covDieB1', $softcover->covDieB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n166', 'v-model'=>"n166")) !!}</td>
          <td>{!! Form::text('t1DieB1', $softcover->t1DieB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n167', 'v-model'=>"n167")) !!}</td>
          <td>{!! Form::text('t2DieB1',$softcover->t2DieB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n168', 'v-model'=>"n168")) !!}</td>
          <td>{!! Form::text('t3DieB1', $softcover->t3DieB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n169', 'v-model'=>"n169")) !!}</td>
          <td>{!! Form::text('statDieB1', $softcover->statDieB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n170', 'v-model'=>"n170")) !!}</td>
        </tr>
        <tr>
          <td>Stripping</td>
          <td>{!! Form::text('covStripC1', $softcover->covStripC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n171', 'v-model.number'=>"n171")) !!}</td>
          <td>{!! Form::text('t1StripC1', $softcover->t1StripC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n172', 'v-model'=>"n172")) !!}</td>
          <td>{!! Form::text('t2StripC1', $softcover->t2StripC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n173', 'v-model'=>"n173")) !!}</td>
          <td>{!! Form::text('t3stripC1', $softcover->t3stripC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n174', 'v-model'=>"n174")) !!}</td>
          <td>{!! Form::text('statStripC1', $softcover->statStripC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n175', 'v-model'=>"n175")) !!}</td>
          <td></td>
          <td>{!! Form::text('covStripB1', $softcover->covStripB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n176', 'v-model'=>"n176")) !!}</td>
          <td>{!! Form::text('t1StripB1', $softcover->t1StripB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n177', 'v-model'=>"n177")) !!}</td>
          <td>{!! Form::text('t2StripB1', $softcover->t2StripB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n178', 'v-model'=>"n178")) !!}</td>
          <td>{!! Form::text('t3stripB1', $softcover->t3stripB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n179', 'v-model'=>"n179")) !!}</td>
          <td>{!! Form::text('statStripB1', $softcover->statStripB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n180', 'v-model'=>"n180")) !!}</td>
        </tr>
        <tr>
          <td>Folding</td>
          <td>{!! Form::text('covFoldC1', $softcover->covFoldC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n181', 'v-model.number'=>"n181")) !!}</td>
          <td>{!! Form::text('t1FoldC1', $softcover->t1FoldC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n182', 'v-model'=>"n182")) !!}</td>
          <td>{!! Form::text('t2FoldC1', $softcover->t2FoldC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n183', 'v-model'=>"n183")) !!}</td>
          <td>{!! Form::text('t3FoldC1', $softcover->t3FoldC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n184', 'v-model'=>"n184")) !!}</td>
          <td>{!! Form::text('statFoldC1', $softcover->statFoldC1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n185', 'v-model'=>"n185")) !!}</td>
          <td></td>
          <td>{!! Form::text('covFoldB1', $softcover->covFoldB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n186', 'v-model'=>"n186")) !!}</td>
          <td>{!! Form::text('t1FoldB1', $softcover->t1FoldB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n187', 'v-model'=>"n187")) !!}</td>
          <td>{!! Form::text('t2FoldB1', $softcover->t2FoldB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n188', 'v-model'=>"n188")) !!}</td>
          <td>{!! Form::text('t3FoldB1', $softcover->t3FoldB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n189', 'v-model'=>"n189")) !!}</td>
          <td>{!! Form::text('statFoldB1', $softcover->statFoldB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n190', 'v-model'=>"n190")) !!}</td>
        </tr>
        <tr>
          <td>Sewing</td>
          <td>{!! Form::text('covSewC1', $softcover->covSewC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n191', 'v-model'=>"n191")) !!}</td>
          <td>{!! Form::text('t1SewC1', $softcover->t1SewC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n192', 'v-model'=>"n192")) !!}</td>
          <td>{!! Form::text('t2SewC1',$softcover->t2SewC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n193', 'v-model'=>"n193")) !!}</td>
          <td>{!! Form::text('t3SewC1', $softcover->t3SewC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n194', 'v-model'=>"n194")) !!}</td>
          <td>{!! Form::text('statSewC1', $softcover->statSewC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n195', 'v-model'=>"n195")) !!}</td>
          <td></td>
          <td>{!! Form::text('covSewB1', $softcover->covSewB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n196', 'v-model'=>"n196")) !!}</td>
          <td>{!! Form::text('t1SewB1', $softcover->t1SewB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n197', 'v-model'=>"n197")) !!}</td>
          <td>{!! Form::text('t2SewB1', $softcover->t2SewB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n198', 'v-model'=>"n198")) !!}</td>
          <td>{!! Form::text('t3SewB1', $softcover->t3SewB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n199', 'v-model'=>"n199")) !!}</td>
          <td>{!! Form::text('statSewB1', $softcover->statSewB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2000', 'v-model'=>"n2000")) !!}</td>
        </tr>
        <tr>
          <td>Binding</td>
          <td>{!! Form::text('covBindC1', $softcover->covBindC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2001', 'v-model.number'=>"n2001")) !!}</td>
          <td>{!! Form::text('t1BindC1', $softcover->t1BindC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2002', 'v-model'=>"n2002")) !!}</td>
          <td>{!! Form::text('t2BindC1', $softcover->t2BindC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2003', 'v-model'=>"n2003")) !!}</td>
          <td>{!! Form::text('t3BindC1', $softcover->t3BindC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2004', 'v-model'=>"n2004")) !!}</td>
          <td>{!! Form::text('statBindC1', $softcover->statBindC1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2005', 'v-model'=>"n2005")) !!}</td>
          <td></td>
          <td>{!! Form::text('covBindB1', $softcover->covBindB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2006', 'v-model'=>"n2006")) !!}</td>
          <td>{!! Form::text('t1BindB1', $softcover->t1BindB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2007', 'v-model'=>"n2007")) !!}</td>
          <td>{!! Form::text('t2BindB1', $softcover->t2BindB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2008', 'v-model'=>"n2008")) !!}</td>
          <td>{!! Form::text('t3BindB1', $softcover->t3BindB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2009', 'v-model'=>"n2009")) !!}</td>
          <td>{!! Form::text('statBindB1', $softcover->statBindB1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2010', 'v-model'=>"n2010")) !!}</td>
        </tr>
        <tr>
          <td>3 Knife Trim</td>
          <td>{!! Form::text('cov3C1', $softcover->cov3C1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2011', 'v-model'=>"n2011")) !!}</td>
          <td>{!! Form::text('t13C1', $softcover->t13C1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2012', 'v-model'=>"n2012")) !!}</td>
          <td>{!! Form::text('t23C1', $softcover->t23C1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2013', 'v-model'=>"n2013")) !!}</td>
          <td>{!! Form::text('t33C1', $softcover->t33C1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2014', 'v-model'=>"n2014")) !!}</td>
          <td>{!! Form::text('stat3C1',$softcover->stat3C1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2015', 'v-model'=>"n2015")) !!}</td>
          <td></td>
          <td>{!! Form::text('cov3B1', $softcover->cov3B1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2016', 'v-model'=>"n2016")) !!}</td>
          <td>{!! Form::text('t13B1', $softcover->t13B1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2017', 'v-model'=>"n2017")) !!}</td>
          <td>{!! Form::text('t23B1', $softcover->t23B1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2018', 'v-model'=>"n2018")) !!}</td>
          <td>{!! Form::text('t33B1', $softcover->t33B1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2019', 'v-model'=>"n2019")) !!}</td>
          <td>{!! Form::text('stat3B1', $softcover->stat3B1 , array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2020', 'v-model'=>"n2020")) !!}</td>
        </tr><tr>
          <td>Packing</td>
          <td>{!! Form::text('covPackC', $softcover->covPackC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2021', 'v-model'=>"n2021")) !!}</td>
          <td>{!! Form::text('t1PackC', $softcover->t1PackC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2022', 'v-model'=>"n2022")) !!}</td>
          <td>{!! Form::text('t2PackC', $softcover->t2PackC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2023', 'v-model'=>"n2023")) !!}</td>
          <td>{!! Form::text('t3PackC', $softcover->t3PackC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2024', 'v-model'=>"n2024")) !!}</td>
          <td>{!! Form::text('statPackC', $softcover->statPackC, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2025', 'v-model'=>"n2025")) !!}</td>
          <td></td>
          <td>{!! Form::text('covPackB', $softcover->covPackB, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2026', 'v-model'=>"n2026")) !!}</td>
          <td>{!! Form::text('t1PackB', $softcover->t1PackB, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2027', 'v-model'=>"n2027")) !!}</td>
          <td>{!! Form::text('t2PackB', $softcover->t2PackB, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2028', 'v-model'=>"n2028")) !!}</td>
          <td>{!! Form::text('t3PackB', $softcover->t3PackB, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2029', 'v-model'=>"n2029")) !!}</td>
          <td>{!! Form::text('statPackB', $softcover->statPackB, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2030', 'v-model'=>"n2030")) !!}</td>
        </tr>

      </tbody>
  </table>


<div class="col-md-6">
  <table class="table table-bordered">
      <tr>
        <td colspan="3">Paper+wastage qty </td>
        <td>Required qty</td>
        <td>Paper Supply</td>

      </tr>
      <tr>
        <td>Cover</td>
        <td>{!! Form::text('ccover', $softcover->ccover, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3000', 'v-model'=>"n3000")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::text('ccoverready', $softcover->ccoverready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3001', 'v-model'=>"n3001")) !!}</td>
        <td>{!! Form::text('ccoverwaste', $softcover->ccoverwaste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3002', 'v-model'=>"n3002")) !!}</td>

      </tr>
      <tr>
        <td></td>
        <td>{!! Form::text('bwcover', $softcover->bwcover, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3003', 'v-model'=>"n3003")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::text('bwcoverready', $softcover->bwcoverready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3004', 'v-model'=>"n3004")) !!}</td>
        <td>{!! Form::text('bwcoverwaste', $softcover->bwcoverwaste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3005', 'v-model'=>"n3005")) !!}</td>
      </tr>

      <tr>
        <td>Text 1</td>
        <td>{!! Form::text('ct1', $softcover->ct1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3006', 'v-model'=>"n3006")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::text('ct1ready', $softcover->ct1ready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3007', 'v-model'=>"n3007")) !!}</td>
        <td>{!! Form::text('ct1waste', $softcover->ct1waste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3008', 'v-model'=>"n3008")) !!}</td>
      </tr>
      <tr>
        <td></td>
        <td>{!! Form::text('bwt1', $softcover->bwt1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3009', 'v-model'=>"n3009")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::text('bwt1ready', $softcover->bwt1ready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3010', 'v-model'=>"n3010")) !!}</td>
        <td>{!! Form::text('bwt1waste', $softcover->bwt1waste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3011', 'v-model'=>"n3011")) !!}</td>
      </tr>

      <tr>
        <td>Text 2</td>
        <td>{!! Form::text('ct2', $softcover->ct2, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3012', 'v-model'=>"n3012")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::text('ct2ready', $softcover->ct2ready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3013', 'v-model'=>"n3013")) !!}</td>
        <td>{!! Form::text('ct2waste', $softcover->ct2waste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3014', 'v-model'=>"n3014")) !!}</td>
      </tr>
      <tr>
        <td></td>
        <td>{!! Form::text('bwt2', $softcover->bwt2, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3015', 'v-model'=>"n3015")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::text('bwt2ready', $softcover->bwt2ready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3016', 'v-model'=>"n3016")) !!}</td>
        <td>{!! Form::text('bwt2waste', $softcover->bwt2waste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3017', 'v-model'=>"n3017")) !!}</td>
      </tr>

      <tr>
        <td>Text 3</td>
        <td>{!! Form::text('ct3', $softcover->ct3, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3018', 'v-model'=>"n3018")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::text('ct3ready', $softcover->ct3ready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3019', 'v-model'=>"n3019")) !!}</td>
        <td>{!! Form::text('ct3waste', $softcover->ct3waste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3020', 'v-model'=>"n3020")) !!}</td>
      </tr>
      <tr>
        <td></td>
        <td>{!! Form::text('bwt3', $softcover->bwt3, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3021', 'v-model'=>"n3021")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::text('bwt3ready', $softcover->bwt3ready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3022', 'v-model'=>"n3022")) !!}</td>
        <td>{!! Form::text('bwt3waste', $softcover->bwt3waste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3023', 'v-model'=>"n3023")) !!}</td>
      </tr>

      <tr>
        <td>Stickers</td>
        <td>{!! Form::text('csticker', $softcover->csticker, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3024', 'v-model'=>"n3024")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::text('cstickerready', $softcover->cstickerready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3025', 'v-model'=>"n3025")) !!}</td>
        <td>{!! Form::text('cstickerwaste', $softcover->cstickerwaste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3026', 'v-model'=>"n3026")) !!}</td>
      </tr>
      <tr>
        <td></td>
        <td>{!! Form::text('bwsticker', $softcover->bwsticker, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3027', 'v-model'=>"n3027")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::text('bwstickerready', $softcover->bwstickerready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3028', 'v-model'=>"n3028")) !!}</td>
        <td>{!! Form::text('bwstickerwaste', $softcover->bwstickerwaste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3029', 'v-model'=>"n3029")) !!}</td>
      </tr>

  </table>
</div>

<div class="col-md-6">
  <table class="table table-bordered">
      <tr>
        <td colspan="2">(COL) Make ready per color - Front </td>
        <td>{!! Form::number('colMakeFront', $softcover->colMakeFront, array('class' => 'form-control', 'id'=>'n200', 'v-model'=>"n200")) !!}</td>

      </tr>
      <tr>
        <td colspan="2">(COL) Make ready per color - Back </td>
        <td>{!! Form::number('colMakeBack', $softcover->colMakeBack, array('class' => 'form-control', 'id'=>'n201', 'v-model'=>"n201")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">(COL) Waste % </td>
        <td>{!! Form::number('colWaste', $softcover->colWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n202', 'v-model'=>"n202")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">(BLA) Make ready per side</td>
        <td>{!! Form::number('blaMake', $softcover->blaMake, array('class' => 'form-control', 'id'=>'n203', 'v-model'=>"n203")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">(BLA) Waste %</td>
        <td>{!! Form::number('blaWaste', $softcover->blaWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n204', 'v-model'=>"n204")) !!}</td>
      </tr>

      <tr>
        <td colspan="2"></td>
        <td>Make Ready</td>
        <td>Waste %</td>
      </tr>
      <tr>
        <td colspan="2">Surface Finishing</td>
        <td>{!! Form::number('surfMake', $softcover->surfMake, array('class' => 'form-control', 'id'=>'n205', 'v-model'=>"n205")) !!}</td>
        <td>{!! Form::number('surfWaste', $softcover->surfWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n206', 'v-model'=>"n206")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Trimming/Cutting</td>
        <td>{!! Form::number('trimMake', $softcover->trimMake, array('class' => 'form-control', 'id'=>'n207', 'v-model'=>"n207")) !!}</td>
        <td>{!! Form::number('trimWaste', $softcover->trimWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n208', 'v-model'=>"n208")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Diecut</td>
        <td>{!! Form::number('dieMake', $softcover->dieMake, array('class' => 'form-control', 'id'=>'n209', 'v-model'=>"n209")) !!}</td>
        <td>{!! Form::number('dieWaste', $softcover->dieWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n210', 'v-model'=>"n210")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Stripping</td>
        <td>{!! Form::number('stripMake', $softcover->stripMake, array('class' => 'form-control', 'id'=>'n211', 'v-model'=>"n211")) !!}</td>
        <td>{!! Form::number('stripWaste', $softcover->stripWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n212', 'v-model'=>"n212")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Folding</td>
        <td>{!! Form::number('foldMake', $softcover->foldMake, array('class' => 'form-control', 'id'=>'n213', 'v-model'=>"n213")) !!}</td>
        <td>{!! Form::number('foldWaste', $softcover->foldWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n214', 'v-model'=>"n214")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Sewing</td>
        <td>{!! Form::number('sewMake', $softcover->sewMake, array('class' => 'form-control', 'id'=>'n215', 'v-model'=>"n215")) !!}</td>
        <td>{!! Form::number('sewWaste', $softcover->sewWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n216', 'v-model'=>"n216")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Binding</td>
        <td>{!! Form::number('bindMake', $softcover->bindMake, array('class' => 'form-control', 'id'=>'n217', 'v-model'=>"n217")) !!}</td>
        <td>{!! Form::number('bindWaste', $softcover->bindWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n218', 'v-model'=>"n218")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">3 Knife Trim</td>
        <td>{!! Form::number('threeMake', $softcover->threeMake, array('class' => 'form-control', 'id'=>'n219', 'v-model'=>"n219")) !!}</td>
        <td>{!! Form::number('threeWaste', $softcover->threeWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n220', 'v-model'=>"n220")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Packing</td>
        <td>{!! Form::number('PackMake', $softcover->PackMake, array('class' => 'form-control', 'id'=>'n221', 'v-model'=>"n221")) !!}</td>
        <td>{!! Form::number('packWaste', $softcover->packWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n222', 'v-model'=>"n222")) !!}</td>
      </tr>

  </table>
</div>
<div class="form-group row">
<button type="submit" class="btn btn-success btn-block" >SAVE </button>
</div>
{!! Form::close() !!}
</div>
  <script>
  var vm = new Vue({
          el:'#app',
          data : {
                      n1 : {!!$softcover->covOrderC!!}, n2:{!!$softcover->t1OrderC!!}, n3:{!!$softcover->t2OrderC!!}, n4:{!!$softcover->t3OrderC!!}, n5:{!!$softcover->statOrderC!!}, n6:{!!$softcover->covOrderB!!},  n8:{!!$softcover->t2OrderB!!}, n9:{!!$softcover->t3OrderB!!}, n10:{!!$softcover->statOrderB!!}
                      , n11: {!!$softcover->covUpC!!} , n12:{!!$softcover->t1UpC!!}, n13:{!!$softcover->t2UpC!!}, n14:{!!$softcover->t3UpC!!}, n15:{!!$softcover->statUpC!!}, n16:{!!$softcover->covUpB!!}, n17:{!!$softcover->t1UpB!!}, n18:{!!$softcover->t2UpB!!}, n19:{!!$softcover->t3UpB!!}
                      , n20:{!!$softcover->statUpB!!}
                      , n21 : {!!$softcover->covSignC!!}, n22:{!!$softcover->t1signC!!}, n23:{!!$softcover->t2signC!!}, n24:{!!$softcover->t3signC!!}, n25:{!!$softcover->statSignC!!}, n26:{!!$softcover->covSignB!!}, n27:{!!$softcover->t1signB!!}, n28:{!!$softcover->t2signB!!}, n29:{!!$softcover->t3signB!!}, n30:{!!$softcover->statSignB!!}
                      , n31:{!!$softcover->covFrontC!!}, n32:{!!$softcover->t1FrontC!!}, n33:{!!$softcover->t2FrontC!!} , n34:{!!$softcover->t3FrontC!!}, n35:{!!$softcover->statFrontC!!}, n36:{!!$softcover->covFrontB!!}, n37:{!!$softcover->t1FrontB!!}, n38:{!!$softcover->t2FrontB!!}, n39:{!!$softcover->t3FrontB!!}, n40:{!!$softcover->statFrontB!!}
                      , n41:{!!$softcover->covBackC!!}, n42:{!!$softcover->t1BackC!!}, n43:{!!$softcover->t2BackC!!}, n44:{!!$softcover->t3BackC!!} , n45:{!!$softcover->statBackC!!}, n46:{!!$softcover->covBackB!!}, n47:{!!$softcover->t1BackB!!}, n48:{!!$softcover->t2BackB!!}, n49:{!!$softcover->t3BackB!!}, n50:{!!$softcover->statBackB!!}
                      , n51:{!!$softcover->covSurfC!!}, n52:{!!$softcover->t1SurfC!!}, n53:{!!$softcover->t2SurfC!!}, n54:{!!$softcover->t3SurfC!!} , n55:{!!$softcover->statSurfC!!}, n56:{!!$softcover->covSurfB!!}, n57:{!!$softcover->t1SurfB!!}, n58:{!!$softcover->t2SurfB!!}, n59:{!!$softcover->t3SurfB!!}
                      , n60:{!!$softcover->statSurfB!!}, n61 : {!!$softcover->covTrimC!!}, n62:{!!$softcover->t1TrimC!!}, n63:{!!$softcover->t2TrimC!!}, n64:{!!$softcover->t3TrimC!!}, n65:{!!$softcover->statTrimC!!}, n66:{!!$softcover->covTrimB!!}, n67:{!!$softcover->t1TrimB!!}, n68:{!!$softcover->t2TrimB!!}, n69:{!!$softcover->t3TrimB!!}
                      , n70:{!!$softcover->statTrimB!!}, n71:{!!$softcover->covDieC!!}, n72:{!!$softcover->t1DieC!!}, n73:{!!$softcover->t2DieC!!}, n74:{!!$softcover->t3DieC!!}, n75:{!!$softcover->statDieC!!}, n76:{!!$softcover->covDieB!!}, n77:{!!$softcover->t1DieB!!}, n78:{!!$softcover->t2DieB!!}, n79:{!!$softcover->t3DieB!!}
                      , n80:{!!$softcover->statDieB!!}, n81:{!!$softcover->covStripC!!}, n82:{!!$softcover->t1StripC!!}, n83:{!!$softcover->t2StripC!!}, n84:{!!$softcover->t3stripC!!}, n85:{!!$softcover->statStripC!!}, n86:{!!$softcover->covStripB!!}, n87:{!!$softcover->t1StripB!!}, n88:{!!$softcover->t2StripB!!}, n89:{!!$softcover->t3stripB!!}
                      , n90:{!!$softcover->statStripB!!}, n91:{!!$softcover->covFoldC!!}, n92:{!!$softcover->t1FoldC!!}, n93:{!!$softcover->t2FoldC!!}, n94:{!!$softcover->t3FoldC!!}, n95:{!!$softcover->statFoldC!!}, n96:{!!$softcover->covFoldB!!}, n97:{!!$softcover->t1FoldB!!}, n98:{!!$softcover->t2FoldB!!}, n99:{!!$softcover->t3FoldB!!}
                      , n100:{!!$softcover->statFoldB!!}, n101: {!!$softcover->covSewC!!}, n102: {!!$softcover->t1SewC!!}, n103: {!!$softcover->t2SewC!!}, n104: {!!$softcover->t3SewC!!}, n105: {!!$softcover->statSewC!!}, n106: {!!$softcover->covSewB!!}, n107: {!!$softcover->t1SewB!!}, n108: {!!$softcover->t2SewB!!}
                      , n109: {!!$softcover->t3SewB!!}, n110: {!!$softcover->statSewB!!}
                      , n111: {!!$softcover->covBindC!!}, n112: {!!$softcover->t1BindC!!}, n113: {!!$softcover->t2BindC!!}, n114: {!!$softcover->t3BindC!!}, n115: {!!$softcover->statBindC!!}, n116: {!!$softcover->covBindB!!}, n117: {!!$softcover->t1BindB!!}, n118: {!!$softcover->t2BindB!!}, n119: {!!$softcover->t3BindB!!}, n120: {!!$softcover->statBindB!!}
                      , n121: {!!$softcover->cov3C!!}, n122: {!!$softcover->t13C!!}, n123: {!!$softcover->t23C!!}, n124: {!!$softcover->t33C!!}, n125: {!!$softcover->stat3C!!}, n126: {!!$softcover->cov3B!!}, n127: {!!$softcover->t13B!!}, n128: {!!$softcover->t23B!!}, n129: {!!$softcover->t33B!!}, n130: {!!$softcover->stat3B!!}
                      , n200: {!!$softcover->colMakeFront!!}, n201: {!!$softcover->colMakeBack!!}, n202: {!!$softcover->colWaste!!}, n203: {!!$softcover->blaMake!!}, n204: {!!$softcover->blaWaste!!}
                      , n205: {!!$softcover->surfMake!!}, n206: {!!$softcover->surfWaste!!}, n208 : {!!$softcover->trimWaste!!}, n207 : {!!$softcover->trimMake!!}, n209: {!!$softcover->dieMake!!}, n210: {!!$softcover->dieWaste!!}, n211: {!!$softcover->stripMake!!}, n212: {!!$softcover->stripWaste!!}, n213: {!!$softcover->foldMake!!}, n214: {!!$softcover->foldWaste!!}
                      , n215: {!!$softcover->sewMake!!}, n216: {!!$softcover->sewWaste!!}
                      , n217: {!!$softcover->bindMake!!}, n218: {!!$softcover->bindWaste!!}, n219: {!!$softcover->threeMake!!}, n220: {!!$softcover->threeWaste!!}, n221: {!!$softcover->PackMake!!}, n222: {!!$softcover->packWaste!!}

           },
           methods: {
             f1: function(value){
                 if(isNaN(value)){
                     return 0;
                 }
                 else{
                   if(isFinite(value)){
                       return value.toFixed(0);
                   }
                   else {
                     return 0;
                   }
                 }
             },
           },
          computed: {
            n7: function() {
              return this.n6;
            },
            //cover
                  n131: function(){
                    var statement = ((parseFloat(this.n200) * parseFloat(this.n31)) + (parseFloat(this.n201) * parseFloat(this.n41)));
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
                        if1 = ((parseFloat(this.n1) / parseFloat(this.n11) * (parseFloat(this.n202) / 100) * (parseFloat(this.n31) + parseFloat(this.n41)) + parseFloat(if2)));
                      }
                    return this.f1(if1);
                  },
                  n141: function(){
                    var n141a =  (parseFloat(this.n1) / parseFloat(this.n11) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n21) * parseFloat(this.n51) ;
                    return this.f1(n141a);
                  },
                  n151: function(){
                    var n151a = (parseFloat(this.n1) / parseFloat(this.n11) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n21) * parseFloat(this.n61);
                     return this.f1(n151a);
                  },
                  n161: function(){
                    var n161a = (parseFloat(this.n1) / parseFloat(this.n11) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n21) * parseFloat(this.n71);
                    return this.f1(n161a);
                  },
                  n171: function(){
                    var n171a = (parseFloat(this.n1) / parseFloat(this.n11) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n21) * parseFloat(this.n81);
                    return this.f1(n171a);
                  },
                  n181: function(){
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
                          if1 = (parseFloat(this.n1) / parseFloat(this.n11) * parseFloat(this.n214) / 100 + parseFloat(this.n213) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n91);
                        }
                      return this.f1(if1);
                  },
                  n191: function(){
                      var n191a = ((parseFloat(this.n1) / parseFloat(this.n11) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n21) * parseFloat(this.n101));
                      return this.f1(n191a);
                  },
                  n2001: function(){
                    // var statement = (this.n200 * this.n31 + this.n201 * this.n41);
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
                        if1 = (parseFloat(this.n1) / parseFloat(this.n11) * parseFloat(this.n218) / 100 + parseFloat(this.n217) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n111);
                      }
                    return this.f1(if1);
                  },
                  n2011: function(){
                    var n2011a = (parseFloat(this.n1) / parseFloat(this.n11) * parseFloat(this.n220/ 100) + parseFloat(this.n219))* parseFloat(this.n21) * parseFloat(this.n121) ;
                    return this.f1(n2011a);
                  },
                  n2021 : function(){
                    var n2021a = (parseFloat(this.n1) / parseFloat(this.n11) * parseFloat(this.n21) * parseFloat(this.n222/ 100));
                    return this.f1(n2021a);
                  },
              //number1
                  n132: function(){
                    var statement = ((parseFloat(this.n200) * parseFloat(this.n32)) + (parseFloat(this.n201) * parseFloat(this.n42)));
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
                        if1 = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.n202) / 100) * (parseFloat(this.n32) + parseFloat(this.n42)) + parseFloat(if2)) * parseFloat(this.n22));
                      }
                    return this.f1(if1);
                  },
                  n142: function(){
                      var n142a = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n22) * parseFloat(this.n52));
                      return this.f1(n142a);
                  },
                  n152: function(){
                      var n152a = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.n208)/ 100) +parseFloat( this.n207))* parseFloat(this.n22) * parseFloat(this.n62));
                      return this.f1(n152a);
                  },
                  n162: function(){
                    var n162a = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n22) * parseFloat(this.n72));
                    return this.f1(n162a);
                  },
                  n172: function(){
                      var n172a = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n22) * parseFloat(this.n82));
                      return this.f1(n172a);
                  },
                  n182: function()
                  {
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
                        if1 = (parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.n214) / 100) + parseFloat(this.n213) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n22) * parseFloat(this.n92) ;
                      }
                    return this.f1(if1);
                  },
                  n192: function(){
                      var n192a = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n22) * parseFloat(this.n102));
                      return this.f1(n192a);
                  },
                  n2002: function()
                  {
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
                        if1 = (parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.n218) / 100) + parseFloat(this.n217) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n22) * parseFloat(this.n112);
                    }
                    return this.f1(if1);
                  },
                  n2012: function(){
                    var n2012a = ((parseFloat(this.n2) / parseFloat(this.n12) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n22) * parseFloat(this.n122));
                    return this.f1(n2012a);
                  },
                  n2022 : function(){
                    var n2022a = (parseFloat(this.n2) / parseFloat(this.n12) * parseFloat(this.n22) * (parseFloat(this.n222)/ 100));
                    return this.f1(n2022a);
                  },
              //number2
                  n133: function(){
                    var statement = ((parseFloat(this.n200) * parseFloat(this.n33)) + (parseFloat(this.n201) * parseFloat(this.n43)));
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
                        if1 = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.n202) / 100) * (parseFloat(this.n33) + parseFloat(this.n43)) + parseFloat(if2)) * parseFloat(this.n23));
                      }
                    return this.f1(if1);
                  },
                n143: function(){
                      var n143a = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n23) * parseFloat(this.n53));
                      return this.f1(n143a);
                  },
                  n153: function(){
                      var n153a = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n23) * parseFloat(this.n63));
                      return this.f1(n153a);
                  },
                  n163: function(){
                    var n163a = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n23) * parseFloat(this.n73));
                    return this.f1(n163a);
                  },
                  n173: function(){
                      var n173a = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n23) * parseFloat(this.n83));
                      return this.f1(n173a);
                  },
                  n183: function()
                  {
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
                        if1 = (parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.n214) / 100) + parseFloat(this.n213) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n23) * parseFloat(this.n93);
                      }
                    return this.f1(if1);
                  },
                  n193: function(){
                      var n193a = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n23) * parseFloat(this.n103));
                      return this.f1(n193a);
                  },
                  n2003: function()
                  {
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
                        if1 = (parseFloat(this.n3) / parseFloat(this.n13) * parseFloat(this.n218) / 100 + parseFloat(this.n217) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n23) * parseFloat(this.n113);
                      }
                    return this.f1(if1);
                  },
                  n2013: function(){
                    var n2013a = ((parseFloat(this.n3) / parseFloat(this.n13) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n23) * parseFloat(this.n123));
                    return this.f1(n2013a);
                  },
                  n2023 : function(){
                    var n2023a = (parseFloat(this.n3) / parseFloat(this.n13) * parseFloat(this.n23) * (parseFloat(this.n222)/ 100));
                    return this.f1(n2023a);
                  },
              //number3
                  n134: function(){
                    var statement = ((parseFloat(this.n200) * parseFloat(this.n34)) + (parseFloat(this.n201) * parseFloat(this.n44)));
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
                        if1 = ((parseFloat(this.n34) / parseFloat(this.n14) * (parseFloat(this.n202) / 100) * (parseFloat(this.n34) + parseFloat(this.n44)) + parseFloat(if2)) * parseFloat(this.n24));
                      }
                    return this.f1(if1);
                  },
                n144: function(){
                      var n144a = ((parseFloat(this.n4) / parseFloat(this.n14) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n24) * parseFloat(this.n54));
                      return this.f1(n144a);
                  },
                  n154: function(){
                      var n154a = ((parseFloat(this.n4) / parseFloat(this.n14 )* (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n24) * parseFloat(this.n64));
                      return this.f1(n154a);
                  },
                  n164: function(){
                    var n164a = ((parseFloat(this.n4) / parseFloat(this.n14) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n24) * parseFloat(this.n74));
                    return this.f1(n164a);
                  },
                  n174: function(){
                      var n174a = ((parseFloat(this.n4) / parseFloat(this.n14) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n24) * parseFloat(this.n84));
                      return this.f1(n174a);
                  },
                  n184: function()
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
                        if1 = (parseFloat(this.n4) / parseFloat(this.n14) * parseFloat(this.n214) / 100 + parseFloat(this.n213) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n24) * parseFloat(this.n94);
                      }
                    return this.f1(if1);
                  },
                  n194: function(){
                      var n194a = ((parseFloat(this.n4) / parseFloat(this.n14) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n24) * parseFloat(this.n104));
                      return this.f1(n194a);
                  },
                  n2004: function()
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
                        if1 = (parseFloat(this.n4) / parseFloat(this.n14) * parseFloat(this.n218) / 100 + parseFloat(this.n217) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n24) * parseFloat(this.n114);
                      }
                    return this.f1(if1);
                  },
                  n2014: function(){
                    var n2014a = ((parseFloat(this.n4) / parseFloat(this.n14) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n24) * parseFloat(this.n124));
                    return this.f1(n2014a);
                  },
                  n2024 : function(){
                    var n2024a = parseFloat((this.n4) / parseFloat(this.n14) * parseFloat(this.n24) * (parseFloat(this.n222)/ 100));
                    return this.f1(n2024a);
                  },
              //sticker
                  n135: function(){
                    var statement = ((parseFloat(this.n200) * parseFloat(this.n35)) + (parseFloat(this.n201) * parseFloat(this.n45)));
                    var if1 = 0;
                    var if2 = 0;

                    if (statement < 300)
                    {
                        if2 = 300;
                    } else{
                        if2 = statement;
                    }
                    if( this.n5 == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = ((parseFloat(this.n5) / parseFloat(this.n15) * (parseFloat(this.n202) / 100) * (parseFloat(this.n35) + parseFloat(this.n45)) + parseFloat(if2)) * parseFloat(this.n25));
                      }
                    return this.f1(if1);
                  },
                  n145: function(){
                      var n145a = ((parseFloat(this.n5 )/parseFloat( this.n15) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n25) * parseFloat(this.n55)) ;
                      return this.f1(n145a);
                  },
                  n155: function(){
                      var n155a = ((parseFloat(this.n5) / parseFloat(this.n15) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n25 )* parseFloat(this.n65)) ;
                      return this.f1(n155a);
                  },
                  n165: function(){
                    var n165a = ((parseFloat(this.n5) / parseFloat(this.n15) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n25) * parseFloat(this.n75));
                    return this.f1(n165a);
                  },
                  n175: function(){
                      var n175a = ((parseFloat(this.n5) / parseFloat(this.n15) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n25) * parseFloat(this.n85));
                      return this.f1(n175a);
                  },
                  n185: function()
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
                        if1 = (parseFloat(this.n5) / parseFloat(this.n15) * parseFloat(this.n214) / 100 + parseFloat(this.n213) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n25) * parseFloat(this.n95);
                    }
                    return this.f1(if1);
                  },
                  n195: function(){
                    var n195a = ((parseFloat(this.n5) / parseFloat(this.n15) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n25) * parseFloat(this.n105));
                    return this.f1(n195a);
                  },
                  n2005: function()
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
                        if1 = (parseFloat(this.n5) / parseFloat(this.n15) * parseFloat(this.n218) / 100 + parseFloat(this.n217) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n25) * parseFloat(this.n115);
                    }
                    return this.f1(if1);
                  },
                  n2015: function(){
                    var n2015a = ((parseFloat(this.n5) / parseFloat(this.n15) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n25) * parseFloat(this.n125));
                    return this.f1(n2015a);
                  },
                  n2025 : function(){
                    var n2025a = (parseFloat(this.n5) / parseFloat(this.n15) * parseFloat(this.n25) * (parseFloat(this.n222)/ 100));
                    return this.f1(n2025a);
                  },
              //cover BW
                  n136: function(){
                    var statement = ((parseFloat(this.n203) * parseFloat(this.n36)) + (parseFloat(this.n203) * parseFloat(this.n46)));
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
                        if1 = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.n204) / 100) * (parseFloat(this.n36) + parseFloat(this.n46)) + parseFloat(if2)) * parseFloat(this.n26));
                      }
                    return this.f1(if1);
                  },
                  n146: function(){
                      var n146a = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))*parseFloat(this.n26) * parseFloat(this.n56));
                      return this.f1(n146a);
                  },
                  n156: function(){
                    var n156a = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n26) * parseFloat(this.n66));
                    return this.f1(n156a);
                  },
                  n166: function(){
                    var n166a = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n26) * parseFloat(this.n76)) ;
                    return this.f1(n166a);
                  },
                  n176: function(){
                    var n176a = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n26) * parseFloat(this.n86));
                    return this.f1(n176a);
                  },
                  n186: function()
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
                        if1 = (parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.n214) / 100) + parseFloat(this.n213) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n96);
                    }
                    return this.f1(if1);
                  },
                  n196: function(){
                    var n196a = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n26) * parseFloat(this.n106));
                    return this.f1(n196a);
                  },
                  n2006: function()
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
                        if1 = (parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.n218) / 100) + parseFloat(this.n217) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n116);
                    }
                    return this.f1(if1);
                  },
                  n2016: function(){
                    var n2016a = ((parseFloat(this.n6) / parseFloat(this.n16) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n26) * parseFloat(this.n126));
                    return this.f1(n2016a);
                  },
                  n2026 : function(){
                   var n2026a = (parseFloat(this.n6) / parseFloat(this.n16) * parseFloat(this.n26) * (parseFloat(this.n222)/ 100));
                   return this.f1(n2026a);
                  },
              //number1 BW
                  n137: function(){
                    var statement = ((parseFloat(this.n203) * parseFloat(this.n37)) + (parseFloat(this.n203) * parseFloat(this.n47)));
                    var if1 = 0;
                    var if2 = 0;

                    if (statement < 100)
                    {
                        if2 = 100;
                    } else{
                        if2 = statement;
                    }
                    if( this.n7 == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = ((parseFloat(this.n7) / parseFloat(this.n17) * (parseFloat(this.n204) / 100) * (parseFloat(this.n37) + parseFloat(this.n47)) + parseFloat(if2)) * parseFloat(this.n27));
                      }
                    return this.f1(if1);
                  },
                  n147: function(){
                    var n147a = ((parseFloat(this.n7) / parseFloat(this.n17) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n27) * parseFloat(this.n57));
                    return this.f1(n147a);
                  },
                  n157: function(){
                    var n157a = ((parseFloat(this.n7) / parseFloat(this.n17) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n27) * parseFloat(this.n67));
                    return this.f1(n157a);
                  },
                  n167: function(){
                    var n167a = ((parseFloat(this.n7) / parseFloat(this.n17) * (parseFloat(this.n210)/ 100) +parseFloat(this.n209))* parseFloat(this.n27) * parseFloat(this.n77));
                    return this.f1(n167a);
                  },
                  n177: function(){
                    var n177a = ((parseFloat(this.n7) / parseFloat(this.n17) * (parseFloat(this.n212)/ 100) +parseFloat (this.n211))* parseFloat(this.n27) * parseFloat(this.n87));
                    return this.f1(n177a);
                  },
                  n187: function()
                  {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.n7> 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.n7 > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.n7 < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }

                    if( this.n7 == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = ((parseFloat(this.n7) / parseFloat(this.n17) * (parseFloat(this.n214) / 100)) + parseFloat(this.n213) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n27) * parseFloat(this.n97) ;
                    }
                    return this.f1(if1);
                  },
                  n197: function(){
                    var n197a = ((parseFloat(this.n7) / parseFloat(this.n17) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n27) * parseFloat(this.n107));
                    return this.f1(n197a);
                  },
                  n2007: function()
                  {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.n7> 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.n7 > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.n7 < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }

                    if( this.n7 == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = (parseFloat(this.n7) / parseFloat(this.n17) * parseFloat(this.n218) / 100 + parseFloat(this.n217) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n27) * parseFloat(this.n117);
                    }
                    return this.f1(if1);
                  },
                  n2017: function(){
                      var n2017a = ((parseFloat(this.n7) / parseFloat(this.n17) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n27) * parseFloat(this.n127));
                      return this.f1(n2017a);
                  },
                  n2027 : function(){
                    var n2027a = (parseFloat(this.n7) / parseFloat(this.n17) * parseFloat(this.n27) * (parseFloat(this.n222)/ 100));
                    return this.f1(n2027a);
                  },
              //number2 BW
                  n138: function(){
                    var statement = ((parseFloat(this.n203) * parseFloat(this.n38)) + (parseFloat(this.n203) * parseFloat(this.n48)));
                    var if1 = 0;
                    var if2 = 0;

                    if (statement < 100)
                    {
                        if2 = 100;
                    } else{
                        if2 = statement;
                    }
                    if( this.n8 == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = ((parseFloat(this.n8) / parseFloat(this.n18) * (parseFloat(this.n204) / 100) * (parseFloat(this.n38) + parseFloat(this.n48)) + parseFloat(if2)) * parseFloat(this.n28));
                      }
                    return this.f1(if1);
                  },
                  n148: function(){
                    var n148a = ((parseFloat(this.n8) / parseFloat(this.n18) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n28) * parseFloat(this.n58)) ;
                    return this.f1(n148a);
                  },
                  n158: function(){
                    var n158a= ((parseFloat(this.n8) / parseFloat(this.n18) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n28) * parseFloat(this.n68)) ;
                    return this.f1(n158a);
                  },
                  n168: function(){
                      var n168a = ((parseFloat(this.n8) /parseFloat (this.n18) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n28) * parseFloat(this.n78));
                      return this.f1(n168a);
                  },
                  n178: function(){
                      var n178a = ((parseFloat(this.n8) / parseFloat(this.n18) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n28) * parseFloat(this.n88));
                      return this.f1(n178a);
                  },
                  n188: function()
                  {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.n8 > 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.n8 > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.n8 < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }

                    if( this.n8 == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = (parseFloat(this.n8) / parseFloat(this.n18) * parseFloat(this.n214) / 100 + parseFloat(this.n213) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n28) * parseFloat(this.n98);
                    }
                    return this.f1(if1);
                  },
                  n198: function(){
                    var n198a = ((parseFloat(this.n8) / parseFloat(this.n18) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n28) * parseFloat(this.n108));
                    return this.f1(n198a);
                  },
                  n2008: function()
                  {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.n8 > 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.n8 > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.n8 < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }
                    if( this.n8 == 0)
                    {
                        if1 = 0;
                    } else{
                      if1 = (parseFloat(this.n8) / parseFloat(this.n18) * parseFloat(this.n218) / 100 + parseFloat(this.n217) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n28) * parseFloat(this.n118);
                    }
                    return this.f1(if1);
                  },
                  n2018: function(){
                    var n2018a = ((parseFloat(this.n8) / parseFloat(this.n18) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n28) * parseFloat(this.n128));
                    return this.f1(n2018a);
                  },
                  n2028 : function(){
                    var n2028a = (parseFloat(this.n8) / parseFloat(this.n18) * parseFloat(this.n28) * (parseFloat(this.n222)/ 100));
                    return this.f1(n2028a);
                  },
              //number3 BW
                  n139: function(){
                    var statement = ((parseFloat(this.n203) * parseFloat(this.n39)) + (parseFloat(this.n203) * parseFloat(this.n49)));
                    var if1 = 0;
                    var if2 = 0;

                    if (statement < 100)
                    {
                        if2 = 100;
                    } else{
                        if2 = statement;
                    }
                    if( this.n9== 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = ((parseFloat(this.n9) / parseFloat(this.n19) * (parseFloat(this.n204) / 100) * (parseFloat(this.n39) + parseFloat(this.n49)) + parseFloat(if2)) * parseFloat(this.n29));
                      }
                    return this.f1(if1);
                  },
                  n149: function(){
                    var n149a = ((parseFloat(this.n9) / parseFloat(this.n19) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n29) * parseFloat(this.n59));
                    return this.f1(n149a);
                  },
                  n159: function(){
                    var n159a = ((parseFloat(this.n9) / parseFloat(this.n19) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n29) * parseFloat(this.n69));
                    return this.f1(n159a);
                  },
                  n169: function(){
                    var n169a = ((parseFloat(this.n9) / parseFloat(this.n19) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n29) * parseFloat(this.n79));
                    return this.f1(n169a);
                  },
                  n179: function(){
                    var n179a = ((parseFloat(this.n9) / parseFloat(this.n19) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n29) * parseFloat(this.n89));
                    return this.f1(n179a);
                  },
                  n189: function()
                  {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.n9 > 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.n9 > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.n9 < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }
                    if( this.n9 == 0)
                    {
                        if1 = 0;
                    } else{
                      if1 = (parseFloat(this.n9) / parseFloat(this.n19) * parseFloat(this.n214) / 100 + parseFloat(this.n213) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n29) * parseFloat(this.n99);
                    }
                    return this.f1(if1);
                  },
                  n199: function(){
                    var n199a = ((parseFloat(this.n9) / parseFloat(this.n19 )* (parseFloat(this.n216)/ 100) + parseFloat(this.n215))*parseFloat (this.n29) * parseFloat(this.n109));
                    return this.f1(n199a);
                  },
                  n2009: function()
                  {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.n9 > 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.n9 > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.n9 < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }
                    if( this.n9 == 0)
                    {
                        if1 = 0;
                    } else{
                      if1 = (parseFloat(this.n9) / parseFloat(this.n19) * parseFloat(this.n218) / 100 + parseFloat(this.n217) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n29) * parseFloat(this.n119);
                    }
                    return this.f1(if1);
                  },
                  n2019: function(){
                    var n2019a = ((parseFloat(this.n9) /parseFloat(this.n19) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n29) * parseFloat(this.n129));
                    return this.f1(n2019a);

                  },
                  n2029 : function(){
                    var n2029a = (parseFloat(this.n9) / parseFloat(this.n19) * parseFloat(this.n29) * (parseFloat(this.n222)/ 100));
                    return this.f1(n2029a);
                  },
              //sticker BW
                  n140: function(){
                    var statement = ((parseFloat(this.n203) * parseFloat(this.n40)) + (parseFloat(this.n203) * parseFloat(this.n50)));
                    var if1 = 0;
                    var if2 = 0;

                    if (statement < 100)
                    {
                        if2 = 100;
                    } else{
                        if2 = statement;
                    }
                    if( this.n10 == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = ((parseFloat(this.n10) / parseFloat(this.n20) * (parseFloat(this.n204) / 100) * (parseFloat(this.n40) + parseFloat(this.n50)) + parseFloat(if2)) * parseFloat(this.n30));
                      }
                    return this.f1(if1);
                  },
                  n150: function(){
                    var n150a = ((parseFloat(this.n10) / parseFloat(this.n20) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n30) * parseFloat(this.n60));
                    return this.f1(n150a);
                  },
                  n160: function(){
                    var n160a = ((parseFloat(this.n10) / parseFloat(this.n20) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n30) * parseFloat(this.n70)) ;
                    return this.f1(n160a);
                  },
                  n170: function(){
                    var n170a = ((parseFloat(this.n10) / parseFloat(this.n20) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n30) * parseFloat(this.n80));
                    return this.f1(n170a);
                  },
                  n180: function(){
                    var n180a = ((parseFloat(this.n10) / parseFloat(this.n20) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n30) * parseFloat(this.n90));
                    return this.f1(n180a);
                  },
                  n190: function()
                  {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.n10 > 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.n10 > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.n10 < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }
                    if( this.n10 == 0)
                    {
                        if1 = 0;
                    } else{
                      if1 = (parseFloat(this.n10) / parseFloat(this.n20) * parseFloat(this.n214) / 100 + parseFloat(this.n213) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n30) * parseFloat(this.n100);
                    }
                    return this.f1(if1);
                  },
                  n2000: function(){
                    var n2000a = ((parseFloat(this.n10) / parseFloat(this.n20) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n30) * parseFloat(this.n110));
                    return this.f1(n2000a);
                  },
                  n2010: function()
                  {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.n10 > 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.n10 > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.n10 < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }
                    if( this.n10 == 0)
                    {
                        if1 = 0;
                    } else{
                      if1 = (parseFloat(this.n10) / parseFloat(this.n20) * parseFloat(this.n218) / 100 + parseFloat(this.n217) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n30) * parseFloat(this.n120);
                    }
                    return this.f1(if1);
                  },
                  n2020: function(){
                    var n2020a = ((parseFloat(this.n10) /parseFloat( this.n20) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))*parseFloat( this.n30) * parseFloat(this.n130));
                    return this.f1(n2020a);
                  },
                  n2030 : function(){
                    var n2030a = (parseFloat(this.n10) / parseFloat(this.n20) * parseFloat(this.n30)* (parseFloat(this.n222)/ 100));
                    return this.f1(n2030a);
                  },
                  n1000a : function()
                  {
                    if (this.n1 == 0)
                    {
                      return 0;
                    }
                    else
                    {
                      return (this.n1 / 2);
                    }
                  },

                  n3000: function(){
                      return (parseFloat(this.n131) + parseFloat(this.n141) + parseFloat(this.n151) + parseFloat(this.n161) + parseFloat(this.n171) + parseFloat(this.n181) + parseFloat(this.n191) + parseFloat(this.n2001) + parseFloat(this.n2011) + parseFloat(this.n2021));
                  },
                  n3001: function(){
                    if (this.n3000 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na1 = (parseFloat(this.n3000) - parseFloat(this.n131) + parseFloat(this.n1) / parseFloat(this.n11));
                      return this.f1(na1);
                    }
                  },
                  n3002: function(){
                    if (this.n3000 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na2 = (parseFloat(this.n1) / parseFloat(this.n11) + parseFloat(this.n3000));
                      return this.f1(na2);
                    }
                  },
                  n3003: function(){
                    return (parseFloat(this.n136) + parseFloat(this.n146) + parseFloat(this.n156) + parseFloat(this.n166) + parseFloat(this.n176) + parseFloat(this.n186) + parseFloat(this.n196)+ parseFloat(this.n2006) + parseFloat(this.n2016) + parseFloat(this.n2026));
                  },
                  n3004: function(){
                    if (this.n3003 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na3 = (parseFloat(this.n3003) - parseFloat(this.n136) + parseFloat(this.n6) / parseFloat(this.n16));
                      return this.f1(na3);
                    }
                  },
                  n3005: function(){
                    if (this.n3003 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na4 = (parseFloat(this.n6) / parseFloat(this.n16) + parseFloat(this.n3003));
                      return this.f1(na4);
                    }
                  },
                  n3006: function(){
                    return (parseFloat(this.n132) + parseFloat(this.n142) + parseFloat(this.n152) + parseFloat(this.n162) + parseFloat(this.n172) + parseFloat(this.n182) + parseFloat(this.n192)+ parseFloat(this.n2002) + parseFloat(this.n2012) + parseFloat(this.n2022));
                  },
                  n3007: function(){
                    if (this.n3006 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na5 = (parseFloat(this.n3006) - parseFloat(this.n132) + parseFloat(this.n2) / parseFloat(this.n12));
                      return this.f1(na5);
                    }
                  },
                  n3008: function(){
                    if (this.n3006 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na6 = (parseFloat(this.n2) / parseFloat(this.n12) + parseFloat(this.n3006));
                      return this.f1(na6);
                    }
                  },
                  n3009: function(){
                    return (parseFloat(this.n137) + parseFloat(this.n147) + parseFloat(this.n157) + parseFloat(this.n167) + parseFloat(this.n177) + parseFloat(this.n187) + parseFloat(this.n197)+ parseFloat(this.n2007) + parseFloat(this.n2017) + parseFloat(this.n2027));
                  },
                  n3010: function(){
                    if (this.n3009 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na7 = (parseFloat(this.n3009) - parseFloat(this.n137) + parseFloat(this.n7) / parseFloat(this.n17));
                      return this.f1(na7);
                    }
                  },
                  n3011: function(){
                    if (this.n3009 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na8 = (parseFloat(this.n7) / parseFloat(this.n17) + parseFloat(this.n3009));
                      return this.f1(na8);
                    }
                  },
                  n3012: function(){
                    return (parseFloat(this.n133) + parseFloat(this.n143) + parseFloat(this.n153) + parseFloat(this.n163) + parseFloat(this.n173) + parseFloat(this.n183) + parseFloat(this.n193) + parseFloat(this.n2003) + parseFloat(this.n2013) + parseFloat(this.n2023));
                  },
                  n3013: function(){
                    if (this.n3012 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na9 = (parseFloat(this.n3012) - parseFloat(this.n133) + parseFloat(this.n3) / parseFloat(this.n13));
                      return this.f1(na9);
                    }
                  },
                  n3014: function(){
                    if (this.n3012 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na10 = (parseFloat(this.n3) / parseFloat(this.n13) + parseFloat(this.n3012));
                      return this.f1(na10);
                    }
                  },
                  n3015: function(){
                    return (parseFloat(this.n138) + parseFloat(this.n148) + parseFloat(this.n158) + parseFloat(this.n168) + parseFloat(this.n178) + parseFloat(this.n188) + parseFloat(this.n198)+ parseFloat(this.n2008) + parseFloat(this.n2018) + parseFloat(this.n2028));
                  },
                  n3016: function(){
                    if (this.n3015 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na11 = (parseFloat(this.n3015) - parseFloat(this.n138) + parseFloat(this.n8) / parseFloat(this.n18));
                      return this.f1(na11);
                    }
                  },
                  n3017: function(){
                    if (this.n3015 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na12 = (parseFloat(this.n8) / parseFloat(this.n18) + parseFloat(this.n3015));
                      return this.f1(na12);
                    }
                  },
                  n3018: function(){
                    return (parseFloat(this.n134) + parseFloat(this.n144) + parseFloat(this.n154) + parseFloat(this.n164) + parseFloat(this.n174) + parseFloat(this.n184) + parseFloat(this.n194)+ parseFloat(this.n2004) + parseFloat(this.n2014) + parseFloat(this.n2024));
                  },
                  n3019: function(){
                    if (this.n3018 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na13 =  (parseFloat(this.n3018) - parseFloat(this.n134) + parseFloat(this.n4) / parseFloat(this.n14));
                      return this.f1(na13);
                    }
                  },
                  n3020: function(){
                    if (this.n3018 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na14 = (parseFloat(this.n4) / parseFloat(this.n14) + parseFloat(this.n3018));
                      return this.f1(na14);
                    }
                  },
                  n3021: function(){
                    return (parseFloat(this.n139) + parseFloat(this.n149) + parseFloat(this.n159) + parseFloat(this.n169) + parseFloat(this.n179) + parseFloat(this.n189) + parseFloat(this.n199) + parseFloat(this.n2009) + parseFloat(this.n2019) + parseFloat(this.n2029));
                  },
                  n3022: function(){
                    if (this.n3021 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na15 = ((this.n3021) - (this.n139) + (this.n9) / (this.n19));
                      return this.f1(na15);
                    }
                  },
                  n3023: function(){
                    if (this.n3021 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na16 = (parseFloat(this.n9) / parseFloat(this.n19) + parseFloat(this.n3021));
                      return this.f1(na16);
                    }
                  },
                  n3024: function(){
                    return (parseFloat(this.n135) + parseFloat(this.n145) + parseFloat(this.n155) + parseFloat(this.n165) + parseFloat(this.n175) + parseFloat(this.n185)+ parseFloat(this.n195)+ parseFloat(this.n2005) + parseFloat(this.n2015) + parseFloat(this.n2025));
                  },
                  n3025: function(){
                    if (this.n3024 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na17 = (parseFloat(this.n3024) - parseFloat(this.n135) + parseFloat(this.n5) / parseFloat(this.n15));
                      return this.f1(na17);
                    }
                  },
                  n3026: function(){
                    if (this.n3024 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na18 = (parseFloat(this.n5) / parseFloat(this.n15) + parseFloat(this.n3024));
                      return this.f1(na18);
                    }
                  },
                  n3027: function(){
                    return (parseFloat(this.n140) + parseFloat(this.n150) + parseFloat(this.n160) + parseFloat(this.n170) + parseFloat(this.n180) + parseFloat(this.n190) + parseFloat(this.n2000) + parseFloat(this.n2010) + parseFloat(this.n2020) + parseFloat(this.n2030));
                  },
                  n3028: function(){
                    if (this.n3027 == 0)
                    {
                      return 0;
                    }
                    else {
                        var na19 = (parseFloat(this.n3027) - parseFloat(this.n140) + parseFloat(this.n10) / parseFloat(this.n20));
                        return this.f1(na19);
                    }

                  },
                  n3029: function(){
                    if (this.n3027 == 0)
                    {
                      return 0;
                    }
                    else {
                      var na20 = (parseFloat(this.n10) / parseFloat(this.n20) + parseFloat(this.n3027));
                      return this.f1(na20);
                    }
                  },
              }
              });
  </script>

@endsection
