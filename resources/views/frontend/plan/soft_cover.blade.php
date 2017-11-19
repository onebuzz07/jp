@extends('frontend.layouts.app')

@section('content')
  <h1>Plan Department</h1>
@include('frontend.plan.includes.nav')
    <h3>Soft Cover v1.5</h3>
<div class="row col-md-12" id="app">
  <table class="table table-bordered" id="users-table">
      <thead>
          <tr>
            <th>{!! Form::number('', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n1000a', 'v-model'=>'n1000a', 'readonly'=>true)) !!}</th>
            {{-- <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th> --}}
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
            <th>number1</th>
            <th>number2</th>
            <th>number3</th>
            <th>Sticker</th>
            <th></th>
            <th>Cover</th>
            <th>number1</th>
            <th>number2</th>
            <th>number3</th>
            <th>Sticker</th>
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
          <td></td>
          <td>{!! Form::number('covOrderB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>
          <td>{!! Form::number('t1OrderB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n7', 'v-model'=>"n7")) !!}</td>
          <td>{!! Form::number('t2OrderB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n8', 'v-model'=>"n8")) !!}</td>
          <td>{!! Form::number('t3OrderB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n9', 'v-model'=>"n9")) !!}</td>
          <td>{!! Form::number('statOrderB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n10', 'v-model'=>"n10")) !!}</td>
        </tr>
        <tr>
          <td>Up(s) per sheet</td>
          <td>{!! Form::number('covUpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n11', 'v-model'=>"n11")) !!}</td>
          <td>{!! Form::number('t1UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n12', 'v-model'=>"n12")) !!}</td>
          <td>{!! Form::number('t2UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n13', 'v-model'=>"n13")) !!}</td>
          <td>{!! Form::number('t3UpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n14', 'v-model'=>"n14")) !!}</td>
          <td>{!! Form::number('statUpC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n15', 'v-model'=>"n15")) !!}</td>
          <td></td>
          <td>{!! Form::number('covUpB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>
          <td>{!! Form::number('t1UpB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n17', 'v-model'=>"n17")) !!}</td>
          <td>{!! Form::number('t2UpB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n18', 'v-model'=>"n18")) !!}</td>
          <td>{!! Form::number('t3UpB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n19', 'v-model'=>"n19")) !!}</td>
          <td>{!! Form::number('statUpB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n20', 'v-model'=>"n20")) !!}</td>
        </tr>
        <tr>
          <td>Signature/Spread(s)</td>
          <td>{!! Form::number('covSignC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n21', 'v-model'=>"n21")) !!}</td>
          <td>{!! Form::number('t1signC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n22', 'v-model'=>"n22")) !!}</td>
          <td>{!! Form::number('t2signC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n23', 'v-model'=>"n23")) !!}</td>
          <td>{!! Form::number('t3signC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n24', 'v-model'=>"n24")) !!}</td>
          <td>{!! Form::number('statSignC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n25', 'v-model'=>"n25")) !!}</td>
          <td></td>
          <td>{!! Form::number('covSignB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>
          <td>{!! Form::number('t1signB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n27', 'v-model'=>"n27")) !!}</td>
          <td>{!! Form::number('t2signB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n28', 'v-model'=>"n28")) !!}</td>
          <td>{!! Form::number('t3signB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n29', 'v-model'=>"n29")) !!}</td>
          <td>{!! Form::number('statSignB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n30', 'v-model'=>"n30")) !!}</td>
        </tr>
        <tr>
          <td>Front Color</td>
          <td>{!! Form::number('covFrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n31', 'v-model'=>"n31")) !!}</td>
          <td>{!! Form::number('t1FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n32', 'v-model'=>"n32")) !!}</td>
          <td>{!! Form::number('t2FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n33', 'v-model'=>"n33")) !!}</td>
          <td>{!! Form::number('t3FrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n34', 'v-model'=>"n34")) !!}</td>
          <td>{!! Form::number('statFrontC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n35', 'v-model'=>"n35")) !!}</td>
          <td></td>
          <td>{!! Form::number('covFrontB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>
          <td>{!! Form::number('t1FrontB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n37', 'v-model'=>"n37")) !!}</td>
          <td>{!! Form::number('t2FrontB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n38', 'v-model'=>"n38")) !!}</td>
          <td>{!! Form::number('t3FrontB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n39', 'v-model'=>"n39")) !!}</td>
          <td>{!! Form::number('statFrontB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n40', 'v-model'=>"n40")) !!}</td>
        </tr>
        <tr>
          <td>Back Color</td>
          <td>{!! Form::number('covBackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n41', 'v-model'=>"n41")) !!}</td>
          <td>{!! Form::number('t1BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n42', 'v-model'=>"n42")) !!}</td>
          <td>{!! Form::number('t2BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n43', 'v-model'=>"n43")) !!}</td>
          <td>{!! Form::number('t3BackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n44', 'v-model'=>"n44")) !!}</td>
          <td>{!! Form::number('statBackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n45', 'v-model'=>"n45")) !!}</td>
          <td></td>
          <td>{!! Form::number('covBackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n46', 'v-model'=>"n46")) !!}</td>
          <td>{!! Form::number('t1BackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n47', 'v-model'=>"n47")) !!}</td>
          <td>{!! Form::number('t2BackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n48', 'v-model'=>"n48")) !!}</td>
          <td>{!! Form::number('t3BackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n49', 'v-model'=>"n49")) !!}</td>
          <td>{!! Form::number('statBackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n50', 'v-model'=>"n50")) !!}</td>
        </tr>
        <tr><td></td></tr>
        <tr>
          <td>Surface Finishing</td>
          <td>{!! Form::number('covSurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n51', 'v-model'=>"n51")) !!}</td>
          <td>{!! Form::number('t1SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n52', 'v-model'=>"n52")) !!}</td>
          <td>{!! Form::number('t2SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n53', 'v-model'=>"n53")) !!}</td>
          <td>{!! Form::number('t3SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n54', 'v-model'=>"n54")) !!}</td>
          <td>{!! Form::number('statSurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n55', 'v-model'=>"n55")) !!}</td>
          <td></td>
          <td>{!! Form::number('covSurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n56', 'v-model'=>"n56")) !!}</td>
          <td>{!! Form::number('t1SurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n57', 'v-model'=>"n57")) !!}</td>
          <td>{!! Form::number('t2SurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n58', 'v-model'=>"n58")) !!}</td>
          <td>{!! Form::number('t3SurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n59', 'v-model'=>"n59")) !!}</td>
          <td>{!! Form::number('statSurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n60', 'v-model'=>"n60")) !!}</td>
        </tr>
        <tr>
          <td>Trimming/Cutting</td>
          <td>{!! Form::number('covTrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n61', 'v-model'=>"n61")) !!}</td>
          <td>{!! Form::number('t1TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n62', 'v-model'=>"n62")) !!}</td>
          <td>{!! Form::number('t2TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n63', 'v-model'=>"n63")) !!}</td>
          <td>{!! Form::number('t3TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n64', 'v-model'=>"n64")) !!}</td>
          <td>{!! Form::number('statTrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n65', 'v-model'=>"n65")) !!}</td>
          <td></td>
          <td>{!! Form::number('covTrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n66', 'v-model'=>"n66")) !!}</td>
          <td>{!! Form::number('t1TrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n67', 'v-model'=>"n67")) !!}</td>
          <td>{!! Form::number('t2TrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n68', 'v-model'=>"n68")) !!}</td>
          <td>{!! Form::number('t3TrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n69', 'v-model'=>"n69")) !!}</td>
          <td>{!! Form::number('statTrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n70', 'v-model'=>"n70")) !!}</td>
        </tr>
        <tr>
          <td>Diecut</td>
          <td>{!! Form::number('covDieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n71', 'v-model'=>"n71")) !!}</td>
          <td>{!! Form::number('t1DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n72', 'v-model'=>"n72")) !!}</td>
          <td>{!! Form::number('t2DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n73', 'v-model'=>"n73")) !!}</td>
          <td>{!! Form::number('t3DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n74', 'v-model'=>"n74")) !!}</td>
          <td>{!! Form::number('statDieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n75', 'v-model'=>"n75")) !!}</td>
          <td></td>
          <td>{!! Form::number('covDieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n76', 'v-model'=>"n76")) !!}</td>
          <td>{!! Form::number('t1DieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n77', 'v-model'=>"n77")) !!}</td>
          <td>{!! Form::number('t2DieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n78', 'v-model'=>"n78")) !!}</td>
          <td>{!! Form::number('t3DieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n79', 'v-model'=>"n79")) !!}</td>
          <td>{!! Form::number('statDieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n80', 'v-model'=>"n80")) !!}</td>
        </tr>
        <tr>
          <td>Stripping</td>
          <td>{!! Form::number('covStripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n81', 'v-model'=>"n81")) !!}</td>
          <td>{!! Form::number('t1StripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n82', 'v-model'=>"n82")) !!}</td>
          <td>{!! Form::number('t2StripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n83', 'v-model'=>"n83")) !!}</td>
          <td>{!! Form::number('t3stripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n84', 'v-model'=>"n84")) !!}</td>
          <td>{!! Form::number('statStripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n85', 'v-model'=>"n85")) !!}</td>
          <td></td>
          <td>{!! Form::number('covStripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n86', 'v-model'=>"n86")) !!}</td>
          <td>{!! Form::number('t1StripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n87', 'v-model'=>"n87")) !!}</td>
          <td>{!! Form::number('t2StripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n88', 'v-model'=>"n88")) !!}</td>
          <td>{!! Form::number('t3stripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n89', 'v-model'=>"n89")) !!}</td>
          <td>{!! Form::number('statStripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n90', 'v-model'=>"n90")) !!}</td>
        </tr>
        <tr>
          <td>Folding</td>
          <td>{!! Form::number('covFoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n91', 'v-model'=>"n91")) !!}</td>
          <td>{!! Form::number('t1FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n92', 'v-model'=>"n92")) !!}</td>
          <td>{!! Form::number('t2FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n93', 'v-model'=>"n93")) !!}</td>
          <td>{!! Form::number('t3FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n94', 'v-model'=>"n94")) !!}</td>
          <td>{!! Form::number('statFoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n95', 'v-model'=>"n95")) !!}</td>
          <td></td>
          <td>{!! Form::number('covFoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n96', 'v-model'=>"n96")) !!}</td>
          <td>{!! Form::number('t1FoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n97', 'v-model'=>"n97")) !!}</td>
          <td>{!! Form::number('t2FoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n98', 'v-model'=>"n98")) !!}</td>
          <td>{!! Form::number('t3FoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n99', 'v-model'=>"n99")) !!}</td>
          <td>{!! Form::number('statFoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n100', 'v-model'=>"n100")) !!}</td>
        </tr>
        <tr>
          <td>Sewing</td>
          <td>{!! Form::number('covSewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n101', 'v-model'=>"n101")) !!}</td>
          <td>{!! Form::number('t1SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n102', 'v-model'=>"n102")) !!}</td>
          <td>{!! Form::number('t2SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n103', 'v-model'=>"n103")) !!}</td>
          <td>{!! Form::number('t3SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n104', 'v-model'=>"n104")) !!}</td>
          <td>{!! Form::number('statSewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n105', 'v-model'=>"n105")) !!}</td>
          <td></td>
          <td>{!! Form::number('covSewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n106', 'v-model'=>"n106")) !!}</td>
          <td>{!! Form::number('t1SewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n107', 'v-model'=>"n107")) !!}</td>
          <td>{!! Form::number('t2SewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n108', 'v-model'=>"n108")) !!}</td>
          <td>{!! Form::number('t3SewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n109', 'v-model'=>"n109")) !!}</td>
          <td>{!! Form::number('statSewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n110', 'v-model'=>"n110")) !!}</td>
        </tr>
        <tr>
          <td>Binding</td>
          <td>{!! Form::number('covBindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n111', 'v-model'=>"n111")) !!}</td>
          <td>{!! Form::number('t1BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n112', 'v-model'=>"n112")) !!}</td>
          <td>{!! Form::number('t2BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n113', 'v-model'=>"n113")) !!}</td>
          <td>{!! Form::number('t3BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n114', 'v-model'=>"n114")) !!}</td>
          <td>{!! Form::number('statBindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n115', 'v-model'=>"n115")) !!}</td>
          <td></td>
          <td>{!! Form::number('covBindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n116', 'v-model'=>"n116")) !!}</td>
          <td>{!! Form::number('t1BindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n117', 'v-model'=>"n117")) !!}</td>
          <td>{!! Form::number('t2BindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n118', 'v-model'=>"n118")) !!}</td>
          <td>{!! Form::number('t3BindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n119', 'v-model'=>"n119")) !!}</td>
          <td>{!! Form::number('statBindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n120', 'v-model'=>"n120")) !!}</td>
        </tr>
        <tr>
          <td>3 Knife Trim</td>
          <td>{!! Form::number('cov3C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n121', 'v-model'=>"n121")) !!}</td>
          <td>{!! Form::number('t13C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n122', 'v-model'=>"n122")) !!}</td>
          <td>{!! Form::number('t23C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n123', 'v-model'=>"n123")) !!}</td>
          <td>{!! Form::number('t33C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n124', 'v-model'=>"n124")) !!}</td>
          <td>{!! Form::number('stat3C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n125', 'v-model'=>"n125")) !!}</td>
          <td></td>
          <td>{!! Form::number('cov3B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n126', 'v-model'=>"n126")) !!}</td>
          <td>{!! Form::number('t13B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n127', 'v-model'=>"n127")) !!}</td>
          <td>{!! Form::number('t23B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n128', 'v-model'=>"n128")) !!}</td>
          <td>{!! Form::number('t33B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n129', 'v-model'=>"n129")) !!}</td>
          <td>{!! Form::number('stat3B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n130', 'v-model'=>"n130")) !!}</td>
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
            <th>number1</th>
            <th>number2</th>
            <th>number3</th>
            <th>Sticker</th>
            <th></th>
            <th>Cover</th>
            <th>number1</th>
            <th>number2</th>
            <th>number3</th>
            <th>Sticker</th>

          </tr>
      </thead>
      <tbody>

        <tr>
          <td>Printing</td>
          <td>{!! Form::number('covPrintC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n131', 'v-model'=>"n131")) !!}</td>
          <td>{!! Form::number('t1PrintC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n132', 'v-model'=>"n132")) !!}</td>
          <td>{!! Form::number('t2PrintC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n133', 'v-model'=>"n133")) !!}</td>
          <td>{!! Form::number('t3PrintC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n134', 'v-model'=>"n134")) !!}</td>
          <td>{!! Form::number('statPrintC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n135', 'v-model'=>"n135")) !!}</td>
          <td></td>
          <td>{!! Form::number('covPrintB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n136', 'v-model'=>"n136")) !!}</td>
          <td>{!! Form::number('t1PrintB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n137', 'v-model'=>"n137")) !!}</td>
          <td>{!! Form::number('t2PrintB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n138', 'v-model'=>"n138")) !!}</td>
          <td>{!! Form::number('t3PrintB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n139', 'v-model'=>"n139")) !!}</td>
          <td>{!! Form::number('statPrintB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n140', 'v-model'=>"n140")) !!}</td>
        </tr>
        <tr>
          <td>Surface Finishing</td>
          <td>{!! Form::number('covSurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n141', 'v-model'=>"n141")) !!}</td>
          <td>{!! Form::number('t1SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n142', 'v-model'=>"n142")) !!}</td>
          <td>{!! Form::number('t2SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n143', 'v-model'=>"n143")) !!}</td>
          <td>{!! Form::number('t3SurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n144', 'v-model'=>"n144")) !!}</td>
          <td>{!! Form::number('statSurfC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n145', 'v-model'=>"n145")) !!}</td>
          <td></td>
          <td>{!! Form::number('covSurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n146', 'v-model'=>"n146")) !!}</td>
          <td>{!! Form::number('t1SurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n147', 'v-model'=>"n147")) !!}</td>
          <td>{!! Form::number('t2SurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n148', 'v-model'=>"n148")) !!}</td>
          <td>{!! Form::number('t3SurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n149', 'v-model'=>"n149")) !!}</td>
          <td>{!! Form::number('statSurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n150', 'v-model'=>"n150")) !!}</td>
        </tr>
        <tr>
          <td>Trimming/Cutting</td>
          <td>{!! Form::number('covTrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n151', 'v-model'=>"n151")) !!}</td>
          <td>{!! Form::number('t1TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n152', 'v-model'=>"n152")) !!}</td>
          <td>{!! Form::number('t2TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n153', 'v-model'=>"n153")) !!}</td>
          <td>{!! Form::number('t3TrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n154', 'v-model'=>"n154")) !!}</td>
          <td>{!! Form::number('statTrimC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n155', 'v-model'=>"n155")) !!}</td>
          <td></td>
          <td>{!! Form::number('covTrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n156', 'v-model'=>"n156")) !!}</td>
          <td>{!! Form::number('t1TrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n157', 'v-model'=>"n157")) !!}</td>
          <td>{!! Form::number('t2TrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n158', 'v-model'=>"n158")) !!}</td>
          <td>{!! Form::number('t3TrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n159', 'v-model'=>"n159")) !!}</td>
          <td>{!! Form::number('statTrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n160', 'v-model'=>"n160")) !!}</td>
        </tr>
        <tr>
          <td>Diecut</td>
          <td>{!! Form::number('covDieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n161', 'v-model'=>"n161")) !!}</td>
          <td>{!! Form::number('t1DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n162', 'v-model'=>"n162")) !!}</td>
          <td>{!! Form::number('t2DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n163', 'v-model'=>"n163")) !!}</td>
          <td>{!! Form::number('t3DieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n164', 'v-model'=>"n164")) !!}</td>
          <td>{!! Form::number('statDieC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n165', 'v-model'=>"n165")) !!}</td>
          <td></td>
          <td>{!! Form::number('covDieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n166', 'v-model'=>"n166")) !!}</td>
          <td>{!! Form::number('t1DieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n167', 'v-model'=>"n167")) !!}</td>
          <td>{!! Form::number('t2DieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n168', 'v-model'=>"n168")) !!}</td>
          <td>{!! Form::number('t3DieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n169', 'v-model'=>"n169")) !!}</td>
          <td>{!! Form::number('statDieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n170', 'v-model'=>"n170")) !!}</td>
        </tr>
        <tr>
          <td>Stripping</td>
          <td>{!! Form::number('covStripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n171', 'v-model'=>"n171")) !!}</td>
          <td>{!! Form::number('t1StripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n172', 'v-model'=>"n172")) !!}</td>
          <td>{!! Form::number('t2StripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n173', 'v-model'=>"n173")) !!}</td>
          <td>{!! Form::number('t3stripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n174', 'v-model'=>"n174")) !!}</td>
          <td>{!! Form::number('statStripC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n175', 'v-model'=>"n175")) !!}</td>
          <td></td>
          <td>{!! Form::number('covStripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n176', 'v-model'=>"n176")) !!}</td>
          <td>{!! Form::number('t1StripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n177', 'v-model'=>"n177")) !!}</td>
          <td>{!! Form::number('t2StripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n178', 'v-model'=>"n178")) !!}</td>
          <td>{!! Form::number('t3stripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n179', 'v-model'=>"n179")) !!}</td>
          <td>{!! Form::number('statStripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n180', 'v-model'=>"n180")) !!}</td>
        </tr>
        <tr>
          <td>Folding</td>
          <td>{!! Form::number('covFoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n181', 'v-model'=>"n181")) !!}</td>
          <td>{!! Form::number('t1FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n182', 'v-model'=>"n182")) !!}</td>
          <td>{!! Form::number('t2FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n183', 'v-model'=>"n183")) !!}</td>
          <td>{!! Form::number('t3FoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n184', 'v-model'=>"n184")) !!}</td>
          <td>{!! Form::number('statFoldC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n185', 'v-model'=>"n185")) !!}</td>
          <td></td>
          <td>{!! Form::number('covFoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n186', 'v-model'=>"n186")) !!}</td>
          <td>{!! Form::number('t1FoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n187', 'v-model'=>"n187")) !!}</td>
          <td>{!! Form::number('t2FoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n188', 'v-model'=>"n188")) !!}</td>
          <td>{!! Form::number('t3FoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n189', 'v-model'=>"n189")) !!}</td>
          <td>{!! Form::number('statFoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n190', 'v-model'=>"n190")) !!}</td>
        </tr>
        <tr>
          <td>Sewing</td>
          <td>{!! Form::number('covSewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n191', 'v-model'=>"n191")) !!}</td>
          <td>{!! Form::number('t1SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n192', 'v-model'=>"n192")) !!}</td>
          <td>{!! Form::number('t2SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n193', 'v-model'=>"n193")) !!}</td>
          <td>{!! Form::number('t3SewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n194', 'v-model'=>"n194")) !!}</td>
          <td>{!! Form::number('statSewC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n195', 'v-model'=>"n195")) !!}</td>
          <td></td>
          <td>{!! Form::number('covSewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n196', 'v-model'=>"n196")) !!}</td>
          <td>{!! Form::number('t1SewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n197', 'v-model'=>"n197")) !!}</td>
          <td>{!! Form::number('t2SewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n198', 'v-model'=>"n198")) !!}</td>
          <td>{!! Form::number('t3SewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n199', 'v-model'=>"n199")) !!}</td>
          <td>{!! Form::number('statSewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2000', 'v-model'=>"n2000")) !!}</td>
        </tr>
        <tr>
          <td>Binding</td>
          <td>{!! Form::number('covBindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2001', 'v-model'=>"n2001")) !!}</td>
          <td>{!! Form::number('t1BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2002', 'v-model'=>"n2002")) !!}</td>
          <td>{!! Form::number('t2BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2003', 'v-model'=>"n2003")) !!}</td>
          <td>{!! Form::number('t3BindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2004', 'v-model'=>"n2004")) !!}</td>
          <td>{!! Form::number('statBindC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2005', 'v-model'=>"n2005")) !!}</td>
          <td></td>
          <td>{!! Form::number('covBindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2006', 'v-model'=>"n2006")) !!}</td>
          <td>{!! Form::number('t1BindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2007', 'v-model'=>"n2007")) !!}</td>
          <td>{!! Form::number('t2BindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2008', 'v-model'=>"n2008")) !!}</td>
          <td>{!! Form::number('t3BindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2009', 'v-model'=>"n2009")) !!}</td>
          <td>{!! Form::number('statBindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2010', 'v-model'=>"n2010")) !!}</td>
        </tr>
        <tr>
          <td>3 Knife Trim</td>
          <td>{!! Form::number('cov3C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2011', 'v-model'=>"n2011")) !!}</td>
          <td>{!! Form::number('t13C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2012', 'v-model'=>"n2012")) !!}</td>
          <td>{!! Form::number('t23C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2013', 'v-model'=>"n2013")) !!}</td>
          <td>{!! Form::number('t33C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2014', 'v-model'=>"n2014")) !!}</td>
          <td>{!! Form::number('stat3C', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2015', 'v-model'=>"n2015")) !!}</td>
          <td></td>
          <td>{!! Form::number('cov3B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2016', 'v-model'=>"n2016")) !!}</td>
          <td>{!! Form::number('t13B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2017', 'v-model'=>"n2017")) !!}</td>
          <td>{!! Form::number('t23B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2018', 'v-model'=>"n2018")) !!}</td>
          <td>{!! Form::number('t33B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2019', 'v-model'=>"n2019")) !!}</td>
          <td>{!! Form::number('stat3B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2020', 'v-model'=>"n2020")) !!}</td>
        </tr><tr>
          <td>Packing</td>
          <td>{!! Form::number('covPackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2021', 'v-model'=>"n2021")) !!}</td>
          <td>{!! Form::number('t1PackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2022', 'v-model'=>"n2022")) !!}</td>
          <td>{!! Form::number('t2PackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2023', 'v-model'=>"n2023")) !!}</td>
          <td>{!! Form::number('t3PackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2024', 'v-model'=>"n2024")) !!}</td>
          <td>{!! Form::number('statPackC', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2025', 'v-model'=>"n2025")) !!}</td>
          <td></td>
          <td>{!! Form::number('covPackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2026', 'v-model'=>"n2026")) !!}</td>
          <td>{!! Form::number('t1PackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2027', 'v-model'=>"n2027")) !!}</td>
          <td>{!! Form::number('t2PackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2028', 'v-model'=>"n2028")) !!}</td>
          <td>{!! Form::number('t3PackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2029', 'v-model'=>"n2029")) !!}</td>
          <td>{!! Form::number('statPackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n2030', 'v-model'=>"n2030")) !!}</td>
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
        <td>{!! Form::number('ccover', '', array('class' => 'form-control', 'id'=>'n3000', 'v-model'=>"n3000")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::number('ccoverwaste', '', array('class' => 'form-control', 'id'=>'n3001', 'v-model'=>"n3001")) !!}</td>
        <td>{!! Form::number('ccoverwaste', '', array('class' => 'form-control', 'id'=>'n3002', 'v-model'=>"n3002")) !!}</td>

      </tr>
      <tr>
        <td></td>
        <td>{!! Form::number('bwcover', '', array('class' => 'form-control', 'id'=>'n3003', 'v-model'=>"n3003")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::number('bwcoverready', '', array('class' => 'form-control', 'id'=>'n3004', 'v-model'=>"n3004")) !!}</td>
        <td>{!! Form::number('bwcoverwaste', '', array('class' => 'form-control', 'id'=>'n3005', 'v-model'=>"n3005")) !!}</td>
      </tr>

      <tr>
        <td>Text 1</td>
        <td>{!! Form::number('ct1', '', array('class' => 'form-control', 'id'=>'n3006', 'v-model'=>"n3006")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::number('ct1ready', '', array('class' => 'form-control', 'id'=>'n3007', 'v-model'=>"n3007")) !!}</td>
        <td>{!! Form::number('ct1waste', '', array('class' => 'form-control', 'id'=>'n3008', 'v-model'=>"n3008")) !!}</td>
      </tr>
      <tr>
        <td></td>
        <td>{!! Form::number('bwt1', '', array('class' => 'form-control', 'id'=>'n3009', 'v-model'=>"n3009")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::number('bwt1ready', '', array('class' => 'form-control', 'id'=>'n3010', 'v-model'=>"n3010")) !!}</td>
        <td>{!! Form::number('bwt1waste', '', array('class' => 'form-control', 'id'=>'n3011', 'v-model'=>"n3011")) !!}</td>
      </tr>

      <tr>
        <td>Text 2</td>
        <td>{!! Form::number('ct2', '', array('class' => 'form-control', 'id'=>'n3012', 'v-model'=>"n3012")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::number('ct2ready', '', array('class' => 'form-control', 'id'=>'n3013', 'v-model'=>"n3013")) !!}</td>
        <td>{!! Form::number('ct2waste', '', array('class' => 'form-control', 'id'=>'n3014', 'v-model'=>"n3014")) !!}</td>
      </tr>
      <tr>
        <td></td>
        <td>{!! Form::number('bwt2', '', array('class' => 'form-control', 'id'=>'n3015', 'v-model'=>"n3015")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::number('bwt2ready', '', array('class' => 'form-control', 'id'=>'n3016', 'v-model'=>"n3016")) !!}</td>
        <td>{!! Form::number('bwt2waste', '', array('class' => 'form-control', 'id'=>'n3017', 'v-model'=>"n3017")) !!}</td>
      </tr>

      <tr>
        <td>Text 3</td>
        <td>{!! Form::number('ct3', '', array('class' => 'form-control', 'id'=>'n3018', 'v-model'=>"n3018")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::number('ct3ready', '', array('class' => 'form-control', 'id'=>'n3019', 'v-model'=>"n3019")) !!}</td>
        <td>{!! Form::number('ct3waste', '', array('class' => 'form-control', 'id'=>'n3020', 'v-model'=>"n3020")) !!}</td>
      </tr>
      <tr>
        <td></td>
        <td>{!! Form::number('bwt3', '', array('class' => 'form-control', 'id'=>'n3021', 'v-model'=>"n3021")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::number('bwt3ready', '', array('class' => 'form-control', 'id'=>'n3022', 'v-model'=>"n3022")) !!}</td>
        <td>{!! Form::number('bwt3waste', '', array('class' => 'form-control', 'id'=>'n3023', 'v-model'=>"n3023")) !!}</td>
      </tr>

      <tr>
        <td>Stickers</td>
        <td>{!! Form::number('csticker', '', array('class' => 'form-control', 'id'=>'n3024', 'v-model'=>"n3024")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::number('cstickerready', '', array('class' => 'form-control', 'id'=>'n3025', 'v-model'=>"n3025")) !!}</td>
        <td>{!! Form::number('cstickerwaste', '', array('class' => 'form-control', 'id'=>'n3026', 'v-model'=>"n3026")) !!}</td>
      </tr>
      <tr>
        <td></td>
        <td>{!! Form::number('bwsticker', '', array('class' => 'form-control', 'id'=>'n3027', 'v-model'=>"n3027")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::number('bwstickerready', '', array('class' => 'form-control', 'id'=>'n3027', 'v-model'=>"n3027")) !!}</td>
        <td>{!! Form::number('bwstickerwaste', '', array('class' => 'form-control', 'id'=>'n3028', 'v-model'=>"n3028")) !!}</td>
      </tr>

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
        <td>{!! Form::number('colWaste', '', array('class' => 'form-control', 'id'=>'n202', 'v-model'=>"n202")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">(BLA) Make ready per side</td>
        <td>{!! Form::number('blaMake', '', array('class' => 'form-control', 'id'=>'n203', 'v-model'=>"n203")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">(BLA) Waste %</td>
        <td>{!! Form::number('blaWaste', '', array('class' => 'form-control', 'id'=>'n204', 'v-model'=>"n204")) !!}</td>
      </tr>

      <tr>
        <td colspan="2"></td>
        <td>Make Ready</td>
        <td>Waste %</td>
      </tr>
      <tr>
        <td colspan="2">Surface Finishing</td>
        <td>{!! Form::number('surfMake', '', array('class' => 'form-control', 'id'=>'n205', 'v-model'=>"n205")) !!}</td>
        <td>{!! Form::number('surfWaste', '', array('class' => 'form-control', 'id'=>'n206', 'v-model'=>"n206")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Trimming/Cutting</td>
        <td>{!! Form::number('trimMake', '', array('class' => 'form-control', 'id'=>'n207', 'v-model'=>"n207")) !!}</td>
        <td>{!! Form::number('trimWaste', '', array('class' => 'form-control', 'id'=>'n208', 'v-model'=>"n208")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Diecut</td>
        <td>{!! Form::number('dieMake', '', array('class' => 'form-control', 'id'=>'n209', 'v-model'=>"n209")) !!}</td>
        <td>{!! Form::number('dieWaste', '', array('class' => 'form-control', 'id'=>'n210', 'v-model'=>"n210")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Stripping</td>
        <td>{!! Form::number('stripMake', '', array('class' => 'form-control', 'id'=>'n211', 'v-model'=>"n211")) !!}</td>
        <td>{!! Form::number('stripWaste', '', array('class' => 'form-control', 'id'=>'n212', 'v-model'=>"n212")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Folding</td>
        <td>{!! Form::number('foldMake', '', array('class' => 'form-control', 'id'=>'n213', 'v-model'=>"n213")) !!}</td>
        <td>{!! Form::number('foldWaste', '', array('class' => 'form-control', 'id'=>'n214', 'v-model'=>"n214")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Sewing</td>
        <td>{!! Form::number('sew1Make', '', array('class' => 'form-control', 'id'=>'n215', 'v-model'=>"n215")) !!}</td>
        <td>{!! Form::number('sew1Waste', '', array('class' => 'form-control', 'id'=>'n216', 'v-model'=>"n216")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Binding</td>
        <td>{!! Form::number('sew2Make', '', array('class' => 'form-control', 'id'=>'n217', 'v-model'=>"n217")) !!}</td>
        <td>{!! Form::number('sew2Waste', '', array('class' => 'form-control', 'id'=>'n218', 'v-model'=>"n218")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">3 Knife Trim</td>
        <td>{!! Form::number('3Make', '', array('class' => 'form-control', 'id'=>'n219', 'v-model'=>"n219")) !!}</td>
        <td>{!! Form::number('3Waste', '', array('class' => 'form-control', 'id'=>'n220', 'v-model'=>"n220")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Packing</td>
        <td>{!! Form::number('PackMake', '', array('class' => 'form-control', 'id'=>'n221', 'v-model'=>"n221")) !!}</td>
        <td>{!! Form::number('packWaste', '', array('class' => 'form-control', 'id'=>'n222', 'v-model'=>"n222")) !!}</td>
      </tr>

  </table>
</div>
</div>
  <script>
  var n151 = new Vue({
          el:'#app',
          data : {
                      n1 : 0, n2:0, n3:0, n4:0, n5:0, n6:0, n7:0, n8:0, n9:0, n10:0
                      , n11: 0 , n12:0, n13:0, n14:0, n15:0, n16:0, n17:0, n18:0, n19:0, n20:0
                      , n21 : 0, n22:0, n23:0, n24:0, n25:0, n26:0, n27:0, n28:0, n29:0, n30:0
                      , n31:0, n32:0, n33:0 , n34:0, n35:0, n36:0, n37:0, n38:0, n39:0, n40:0
                      , n41:0, n42:0, n43:0, n44:0 , n45:0, n46:0, n47:0, n48:0, n49:0, n50:0
                      , n51:0, n52:0, n53:0, n54:0 , n55:0, n56:0, n57:0, n58:0, n59:0
                      , n60:0, n61 : 0, n62:0, n63:0, n64:0, n65:0, n66:0, n67:0, n68:0, n69:0
                      , n70:0, n71:0, n72:0, n73:0, n74:0, n75:0, n76:0, n77:0, n78:0, n79:0
                      , n80:0, n81:0, n82:0, n83:0, n84:0, n85:0, n86:0, n87:0, n88:0, n89:0
                      , n90:0, n91:0, n92:0, n93:0, n94:0, n95:0, n96:0, n97:0, n98:0, n99:0
                      , n100:0, n101: 0, n102: 0, n103: 0, n104: 0, n105: 0, n106: 0, n107: 0, n108: 0, n109: 0, n110: 0
                      , n111: 0, n112: 0, n113: 0, n114: 0, n115: 0, n116: 0, n117: 0, n118: 0, n119: 0, n120: 0
                      , n121: 0, n122: 0, n123: 0, n124: 0, n125: 0, n126: 0, n127: 0, n128: 0, n129: 0, n130: 0
                      , n200: 0, n201: 0, n202: 0, n203: 0, n204: 0
                      , n205: 0, n206: 0, n208 : 0, n207 : 0, n209: 0, n210: 0, n211: 0, n212: 0, n213: 0, n214: 0, n215: 0, n216: 0
                      , n217: 0, n218: 0, n219: 0, n220: 0, n221: 0, n222: 0

           },
          computed: {
            //cover
                  n131: function(){
                    var statement = (this.n200 * this.n31 + this.n201 * this.n41);

                    if (this.n1 == 0){
                      return this.n1;
                    }
                    else{
                        if (statement < 300){
                          return (this.n1 / this.n11 * (this.n202/100) * (this.n31 + this.n41) + 300);
                        }
                        else {
                          return (this.n1 / this.n11 * (this.n202/100) * (this.n31 + this.n41) + statement );
                        }

                    }
                  },
                  n141: function(){
                      return (this.n1 / this.n11 * (this.n206/ 100) + this.n205)* this.n21 * this.n51;
                  },
                  n151: function(){
                      return (this.n1 / this.n11 * (this.n208/ 100) + this.n207)* this.n21 * this.n61;
                  },
                  n161: function(){
                    return (this.n1 / this.n11 * (this.n210/ 100) + this.n209)* this.n21 * this.n71;
                  },
                  n171: function(){
                      return (this.n1 / this.n11 * (this.n212/ 100) + this.n211)* this.n21 * this.n81;
                  },
                  n181: function(){
                    // var statement = (this.n200 * this.n31 + this.n201 * this.n41);
                    var statement1 = (this.n1 / this.n11 * (this.n214/100) + this.n213 );
                    if (this.n1 == '0'){
                      return this.n1;
                    }
                    else if (this.n1 != '0')
                    {
                          if (this.n1 < '4000' && this.n1 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n91);
                          }
                          else if( this.n1 > '4000' && this.n1 > '1999')
                          {
                            if (this.n1 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n91);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n91);
                            }
                          }
                          else if (this.n1 < '4000' && this.n1 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n91);
                          }
                          else if( this.n1 > '4000' && this.n1 < '1999')
                          {
                            if (this.n1 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n91);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n91);
                            }
                          }
                      }
                  },
                  n191: function(){
                      return (this.n1 / this.n11 * (this.n216/ 100) + this.n215)* this.n21 * this.n101;
                  },
                  n2001: function(){
                    // var statement = (this.n200 * this.n31 + this.n201 * this.n41);
                    var statement1 = (this.n1 / this.n11 * (this.n218/100) + this.n217 );
                    if (this.n1 == '0'){
                      return this.n1;
                    }
                    else if (this.n1 != '0')
                    {
                          if (this.n1 < '4000' && this.n1 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n111);
                          }
                          else if( this.n1 > '4000' && this.n1 > '1999')
                          {
                            if (this.n1 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n111);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n111);
                            }
                          }
                          else if (this.n1 < '4000' && this.n1 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n111);
                          }
                          else if( this.n1 > '4000' && this.n1 < '1999')
                          {
                            if (this.n1 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n111);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n111);
                            }
                          }
                      }
                  },
                  n2011: function(){
                    return (this.n1 / this.n11 * (this.n220/ 100) + this.n219)* this.n21 * this.n121;
                  },
                  n2021 : function(){
                    return (this.n1 / this.n11 * this.n21 * (this.n222/ 100));
                  },
              //number1
                  n132: function(){
                    var statement = ((this.n200 * this.n32) + (this.n201 * this.n42));

                    if (this.n2 == 0){
                      return this.n2;
                    }
                    else if (this.n2 != 0){
                        if (statement < 300){
                          return ((this.n2 / this.n12) * (this.n202/100) * (this.n32 + this.n42) + 300 * this.n22);
                        }

                        else {
                            return ((this.n2 / this.n12) * (this.n202/100) * (this.n32 + this.n42) + statement * this.n22);
                        }

                    }
                  },
                  n142: function(){
                      return (this.n2 / this.n12 * (this.n206/ 100) + this.n205)* this.n22 * this.n52;
                  },
                  n152: function(){
                      return (this.n2 / this.n12 * (this.n208/ 100) + this.n207)* this.n22 * this.n62;
                  },
                  n162: function(){
                    return (this.n2 / this.n12 * (this.n210/ 100) + this.n209)* this.n22 * this.n72;
                  },
                  n172: function(){
                      return (this.n2 / this.n12 * (this.n212/ 100) + this.n211)* this.n22 * this.n82;
                  },
                  n182: function()
                  {
                    var statement1 = (this.n2 / this.n12 * (this.n214/100) + this.n213 );
                    if (this.n2 == '0'){
                      return this.n2;
                    }
                    else if (this.n2 != '0')
                    {
                          if (this.n2 < '4000' && this.n2 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n22 * this.n92);
                          }
                          else if( this.n2 > '4000' && this.n2 > '1999')
                          {
                            if (this.n2 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n22 * this.n92);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n22 * this.n92);
                            }
                          }
                          else if (this.n2 < '4000' && this.n2 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n22 * this.n92);
                          }
                          else if( this.n2 > '4000' && this.n2 < '1999')
                          {
                            if (this.n2 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n22 * this.n92);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n22 * this.n92);
                            }
                          }
                      }
                  },
                  n192: function(){
                      return (this.n2 / this.n12 * (this.n216/ 100) + this.n215)* this.n22 * this.n102;
                  },
                  n2002: function()
                  {
                    var statement1 = (this.n2 / this.n12 * (this.n218/100) + this.n217 );
                    if (this.n2 == '0'){
                      return this.n2;
                    }
                    else if (this.n2 != '0')
                    {
                          if (this.n2 < '4000' && this.n2 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n22 * this.n112);
                          }
                          else if( this.n2 > '4000' && this.n2 > '1999')
                          {
                            if (this.n2 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n22 * this.n112);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n22 * this.n112);
                            }
                          }
                          else if (this.n2 < '4000' && this.n2 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n22 * this.n112);
                          }
                          else if( this.n2 > '4000' && this.n2 < '1999')
                          {
                            if (this.n2 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n22 * this.n112);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n22 * this.n112);
                            }
                          }
                      }
                  },
                  n2012: function(){
                    return (this.n2 / this.n12 * (this.n220/ 100) + this.n219)* this.n22 * this.n122;
                  },
                  n2022 : function(){
                    return (this.n2 / this.n12 * this.n22 * (this.n222/ 100));
                  },
              //number2
                  n133: function(){
                    var statement = (this.n200 * this.n33 + this.n201 * this.n43);

                    if (this.n3 == '0'){
                      return this.n3;
                    }
                    else if (this.n3 != '0'){
                        if (statement < '300'){
                          return (this.n3 / this.n13 * (this.n202/100) * (this.n33 + this.n43) + '300' * this.n23);
                        }
                        else
                          return (this.n3 / this.n13 * (this.n202/100) * (this.n33 + this.n43) + statement * this.n23);
                    }
                  },
                  n143: function(){
                      return (this.n3 / this.n13 * (this.n206/ 100) + this.n205)* this.n23 * this.n53;
                  },
                  n153: function(){
                      return (this.n3 / this.n13 * (this.n208/ 100) + this.n207)* this.n23 * this.n63;
                  },
                  n163: function(){
                    return (this.n3 / this.n13 * (this.n210/ 100) + this.n209)* this.n23 * this.n73;
                  },
                  n173: function(){
                      return (this.n3 / this.n13 * (this.n212/ 100) + this.n211)* this.n23 * this.n83;
                  },
                  n183: function()
                  {
                    var statement1 = (this.n3 / this.n13 * (this.n214/100) + this.n213 );
                    if (this.n3 == '0'){
                      return this.n3;
                    }
                    else if (this.n3 != '0')
                    {
                          if (this.n3 < '4000' && this.n3 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n23 * this.n93);
                          }
                          else if( this.n3 > '4000' && this.n3 > '1999')
                          {
                            if (this.n3 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n23 * this.n93);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n23 * this.n93);
                            }
                          }
                          else if (this.n3 < '4000' && this.n3 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n23 * this.n93);
                          }
                          else if( this.n3v> '4000' && this.n3 < '1999')
                          {
                            if (this.n3v> '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n23 * this.n93);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n23 * this.n93);
                            }
                          }
                      }
                  },
                  n193: function(){
                      return (this.n3 / this.n13 * (this.n216/ 100) + this.n215)* this.n23 * this.n103;
                  },
                  n2003: function()
                  {
                    var statement1 = (this.n3 / this.n13 * (this.n218/100) + this.n217 );
                    if (this.n3 == '0'){
                      return this.n3;
                    }
                    else if (this.n3 != '0')
                    {
                          if (this.n3 < '4000' && this.n3 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n23 * this.n113);
                          }
                          else if( this.n3 > '4000' && this.n3 > '1999')
                          {
                            if (this.n3 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n23 * this.n113);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n23 * this.n113);
                            }
                          }
                          else if (this.n3 < '4000' && this.n3 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n23 * this.n113);
                          }
                          else if( this.n3v> '4000' && this.n3 < '1999')
                          {
                            if (this.n3v> '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n23 * this.n113);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n23 * this.n113);
                            }
                          }
                      }
                  },
                  n2013: function(){
                    return (this.n3 / this.n13 * (this.n220/ 100) + this.n219)* this.n23 * this.n123;
                  },
                  n2023 : function(){
                    return (this.n3 / this.n13 * this.n23 * (this.n222/ 100));
                  },
              //number3
                  n134: function(){
                    var statement = (this.n200 * this.n34 + this.n201 * this.n44);

                    if (this.n4 == '0'){
                      return this.n4;
                    }
                    else if (this.n3 != '0'){
                        if (statement < '300'){
                          return (this.n4 / this.n14 * (this.n202/100) * (this.n34 + this.n44) + '300' * this.n24);
                        }
                        else
                          return (this.n4 / this.n14 * (this.n202/100) * (this.n34 + this.n44) + statement * this.n24);
                    }
                  },
                  n144: function(){
                      return (this.n4 / this.n14 * (this.n206/ 100) + this.n205)* this.n24 * this.n54;
                  },
                  n154: function(){
                      return (this.n4 / this.n14 * (this.n208/ 100) + this.n207)* this.n24 * this.n64;
                  },
                  n164: function(){
                    return (this.n4 / this.n14 * (this.n210/ 100) + this.n209)* this.n24 * this.n74;
                  },
                  n174: function(){
                      return (this.n4 / this.n14 * (this.n212/ 100) + this.n211)* this.n24 * this.n84;
                  },
                  n184: function()
                  {
                    var statement1 = (this.n4 / this.n14 * (this.n214/100) + this.n213 );
                    if (this.n4 == '0'){
                      return this.n4;
                    }
                    else if (this.n4 != '0')
                    {
                          if (this.n4 < '4000' && this.n4 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n24 * this.n94);
                          }
                          else if( this.n4 > '4000' && this.n4 > '1999')
                          {
                            if (this.n4 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n24 * this.n94);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n24 * this.n94);
                            }
                          }
                          else if (this.n4 < '4000' && this.n4 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n24 * this.n94);
                          }
                          else if( this.n4 > '4000' && this.n4 < '1999')
                          {
                            if (this.n4 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n24 * this.n94);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n24 * this.n94);
                            }
                          }
                      }
                  },
                  n194: function(){
                      return (this.n4 / this.n14 * (this.n216/ 100) + this.n215)* this.n24 * this.n104;
                  },
                  n2004: function()
                  {
                    var statement1 = (this.n4 / this.n14 * (this.n218/100) + this.n217 );
                    if (this.n4 == '0'){
                      return this.n4;
                    }
                    else if (this.n4 != '0')
                    {
                          if (this.n4 < '4000' && this.n4 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n24 * this.n114);
                          }
                          else if( this.n4 > '4000' && this.n4 > '1999')
                          {
                            if (this.n4 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n24 * this.n114);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n24 * this.n114);
                            }
                          }
                          else if (this.n4 < '4000' && this.n4 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n24 * this.n114);
                          }
                          else if( this.n4 > '4000' && this.n4 < '1999')
                          {
                            if (this.n4 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n24 * this.n114);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n24 * this.n114);
                            }
                          }
                      }
                  },
                  n2014: function(){
                    return (this.n4 / this.n14 * (this.n220/ 100) + this.n219)* this.n24 * this.n124;
                  },
                  n2024 : function(){
                    return (this.n4 / this.n14 * this.n24 * (this.n222/ 100));
                  },
              //sticker
                  n135: function(){
                    var statement = (this.n200 * this.n35 + this.n201 * this.n45);

                    if (this.n5 == '0'){
                      return this.n5;
                    }
                    else if (this.n5 != '0'){
                        if (statement < '300'){
                          return (this.n5 / this.n15 * (this.n202/100) * (this.n35 + this.n45) + '300' * this.n25);
                        }
                        else
                          return (this.n5 / this.n15 * (this.n202/100) * (this.n35 + this.n45) + statement * this.n25);
                    }
                  },
                  n145: function(){
                      return (this.n5 / this.n15 * (this.n206/ 100) + this.n205)* this.n25 * this.n55;
                  },
                  n155: function(){
                      return (this.n5 / this.n15 * (this.n208/ 100) + this.n207)* this.n25 * this.n65;
                  },
                  n165: function(){
                    return (this.n5 / this.n15 * (this.n210/ 100) + this.n209)* this.n25 * this.n75;
                  },
                  n175: function(){
                      return (this.n5 / this.n15 * (this.n212/ 100) + this.n211)* this.n25 * this.n85;
                  },
                  n185: function()
                  {
                    var statement1 = (this.n5 / this.n15 * (this.n214/100) + this.n213 );
                    if (this.n5 == '0'){
                      return this.n5;
                    }
                    else if (this.n5 != '0')
                    {
                          if (this.n5 < '4000' && this.n5 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n25 * this.n95);
                          }
                          else if( this.n5 > '4000' && this.n5 > '1999')
                          {
                            if (this.n5 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n25 * this.n95);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n25 * this.n95);
                            }
                          }
                          else if (this.n5 < '4000' && this.n5 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n25 * this.n95);
                          }
                          else if( this.n5 > '4000' && this.n5 < '1999')
                          {
                            if (this.n5 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n25 * this.n95);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n25 * this.n95);
                            }
                          }
                      }
                  },
                  n195: function(){
                      return (this.n5 / this.n15 * (this.n216/ 100) + this.n215)* this.n25 * this.n105;
                  },
                  n2005: function()
                  {
                    var statement1 = (this.n5 / this.n15 * (this.n218/100) + this.n217 );
                    if (this.n5 == '0'){
                      return this.n5;
                    }
                    else if (this.n5 != '0')
                    {
                          if (this.n5 < '4000' && this.n5 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n25 * this.n115);
                          }
                          else if( this.n5 > '4000' && this.n5 > '1999')
                          {
                            if (this.n5 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n25 * this.n115);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n25 * this.n115);
                            }
                          }
                          else if (this.n5 < '4000' && this.n5 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n25 * this.n115);
                          }
                          else if( this.n5 > '4000' && this.n5 < '1999')
                          {
                            if (this.n5 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n25 * this.n115);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n25 * this.n115);
                            }
                          }
                      }
                  },
                  n2015: function(){
                    return (this.n5 / this.n15 * (this.n220/ 100) + this.n219)* this.n25 * this.n125;
                  },
                  n2025 : function(){
                    return (this.n5 / this.n15 * this.n25 * (this.n222/ 100));
                  },
              //cover BW
                  n136: function(){
                    var statement = (this.n200 * this.n36 + this.n201 * this.n46);

                    if (this.n6 == '0'){
                      return this.n6;
                    }
                    else if (this.n6 != '0'){
                        if (statement < '300'){
                          return (this.n6 / this.n16 * (this.n202/100) * (this.n36 + this.n46) + '300' * this.n26);
                        }
                        else
                          return (this.n6 / this.n16 * (this.n202/100) * (this.n36 + this.n46) + statement * this.n26);
                    }
                  },
                  n146: function(){
                      return (this.n6 / this.n16 * (this.n206/ 100) + this.n205)* this.n26 * this.n56;
                  },
                  n156: function(){
                      return (this.n6 / this.n16 * (this.n208/ 100) + this.n207)* this.n26 * this.n66;
                  },
                  n166: function(){
                    return (this.n6 / this.n16 * (this.n210/ 100) + this.n209)* this.n26 * this.n76;
                  },
                  n176: function(){
                      return (this.n6 / this.n16 * (this.n212/ 100) + this.n211)* this.n26 * this.n86;
                  },
                  n186: function()
                  {
                    var statement1 = (this.n6 / this.n16 * (this.n214/100) + this.n213 );
                    if (this.n6 == '0'){
                      return this.n6;
                    }
                    else if (this.n6 != '0')
                    {
                          if (this.n6 < '4000' && this.n6 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n96);
                          }
                          else if( this.n6 > '4000' && this.n6 > '1999')
                          {
                            if (this.n6 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n96);
                            }
                            else
                            {
                              return (statement1 + '0' + '50'  * this.n96);
                            }
                          }
                          else if (this.n6 < '4000' && this.n6 < '1999')
                          {
                            return ( statement1 + '50' + '0'  * this.n94);
                          }
                          else if( this.n6 > '4000' && this.n6 < '1999')
                          {
                            if (this.n6 > '9999')
                            {
                              return ( statement1 + '75' + '0'  * this.n96);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n96);
                            }
                          }
                      }
                  },
                  n196: function(){
                      return (this.n6 / this.n16 * (this.n216/ 100) + this.n215)* this.n26 * this.n106;
                  },
                  n2006: function()
                  {
                    var statement1 = (this.n6 / this.n16 * (this.n218/100) + this.n217 );
                    if (this.n6 == '0'){
                      return this.n6;
                    }
                    else if (this.n6 != '0')
                    {
                          if (this.n6 < '4000' && this.n6 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n116);
                          }
                          else if( this.n6 > '4000' && this.n6 > '1999')
                          {
                            if (this.n6 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n116);
                            }
                            else
                            {
                              return (statement1 + '0' + '50'  * this.n116);
                            }
                          }
                          else if (this.n6 < '4000' && this.n6 < '1999')
                          {
                            return ( statement1 + '50' + '0'  * this.n116);
                          }
                          else if( this.n6 > '4000' && this.n6 < '1999')
                          {
                            if (this.n6 > '9999')
                            {
                              return ( statement1 + '75' + '0'  * this.n116);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n116);
                            }
                          }
                      }
                  },
                  n2016: function(){
                    return (this.n6 / this.n16 * (this.n220/ 100) + this.n219)* this.n26 * this.n126;
                  },
                  n2026 : function(){
                    return (this.n6 / this.n16 * this.n26 * (this.n222/ 100));
                  },
              //number1 BW
                  n137: function(){
                    var statement = (this.n200 * this.n37 + this.n201 * this.n47);

                    if (this.n7 == '0'){
                      return this.n7;
                    }
                    else if (this.n7 != '0'){
                        if (statement < '300'){
                          return (this.n7 / this.n17 * (this.n202/100) * (this.n37 + this.n47) + '300' * this.n27);
                        }
                        else
                          return (this.n7 / this.n17 * (this.n202/100) * (this.n37 + this.n47) + statement * this.n27);
                    }
                  },
                  n147: function(){
                      return (this.n7 / this.n17 * (this.n206/ 100) + this.n205)* this.n27 * this.n57;
                  },
                  n157: function(){
                      return (this.n7 / this.n17 * (this.n208/ 100) + this.n207)* this.n27 * this.n67;
                  },
                  n167: function(){
                    return (this.n7 / this.n17 * (this.n210/ 100) + this.n209)* this.n27 * this.n77;
                  },
                  n177: function(){
                      return (this.n7 / this.n17 * (this.n212/ 100) + this.n211)* this.n27 * this.n87;
                  },
                  n187: function()
                  {
                    var statement1 = (this.n7 / this.n17 * (this.n214/100) + this.n213 );
                    if (this.n7 == '0'){
                      return this.n7;
                    }
                    else if (this.n7 != '0')
                    {
                          if (this.n7 < '4000' && this.n7 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n27 * this.n97);
                          }
                          else if( this.n7 > '4000' && this.n7 > '1999')
                          {
                            if (this.n7 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n27 * this.n97);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n27 * this.n97);
                            }
                          }
                          else if (this.n7 < '4000' && this.n7 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n27 * this.n97);
                          }
                          else if( this.n7 > '4000' && this.n7 < '1999')
                          {
                            if (this.n7 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n27 * this.n97);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n27 * this.n97);
                            }
                          }
                      }
                  },
                  n197: function(){
                      return (this.n7 / this.n17 * (this.n216/ 100) + this.n215)* this.n27 * this.n107;
                  },
                  n2007: function()
                  {
                    var statement1 = (this.n7 / this.n17 * (this.n218/100) + this.n217 );
                    if (this.n7 == '0'){
                      return this.n7;
                    }
                    else if (this.n7 != '0')
                    {
                          if (this.n7 < '4000' && this.n7 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n27 * this.n117);
                          }
                          else if( this.n7 > '4000' && this.n7 > '1999')
                          {
                            if (this.n7 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n27 * this.n117);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n27 * this.n117);
                            }
                          }
                          else if (this.n7 < '4000' && this.n7 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n27 * this.n117);
                          }
                          else if( this.n7 > '4000' && this.n7 < '1999')
                          {
                            if (this.n7 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n27 * this.n117);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n27 * this.n117);
                            }
                          }
                      }
                  },
                  n2017: function(){
                    return (this.n7 / this.n17 * (this.n220/ 100) + this.n219)* this.n27 * this.n127;
                  },
                  n2027 : function(){
                    return (this.n7 / this.n17 * this.n27 * (this.n222/ 100));
                  },
              //number2 BW
                  n138: function(){
                    var statement = (this.n200 * this.n38 + this.n201 * this.n48);

                    if (this.n8 == '0'){
                      return this.n8;
                    }
                    else if (this.n8 != '0'){
                        if (statement < '300'){
                          return (this.n8 / this.n18 * (this.n202/100) * (this.n38 + this.n48) + '300' * this.n28);
                        }
                        else
                          return (this.n8 / this.n18 * (this.n202/100) * (this.n38 + this.n48) + statement * this.n28);
                    }
                  },
                  n148: function(){
                      return (this.n8 / this.n18 * (this.n206/ 100) + this.n205)* this.n28 * this.n58;
                  },
                  n158: function(){
                      return (this.n8 / this.n18 * (this.n208/ 100) + this.n207)* this.n28 * this.n68;
                  },
                  n168: function(){
                    return (this.n8 / this.n18 * (this.n210/ 100) + this.n209)* this.n28 * this.n78;
                  },
                  n178: function(){
                      return (this.n8 / this.n18 * (this.n212/ 100) + this.n211)* this.n28 * this.n88;
                  },
                  n188: function()
                  {
                    var statement1 = (this.n8 / this.n18 * (this.n214/100) + this.n213 );
                    if (this.n8 == '0'){
                      return this.n8;
                    }
                    else if (this.n8 != '0')
                    {
                          if (this.n8 < '4000' && this.n8 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n28 * this.n98);
                          }
                          else if( this.n8 > '4000' && this.n8 > '1999')
                          {
                            if (this.n8 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n28 * this.n98);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n28 * this.n98);
                            }
                          }
                          else if (this.n8 < '4000' && this.n8 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n28 * this.n98);
                          }
                          else if( this.n8 > '4000' && this.n9 < '1999')
                          {
                            if (this.n8 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n28 * this.n98);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n28 * this.n98);
                            }
                          }
                      }
                  },
                  n198: function(){
                      return (this.n8 / this.n18 * (this.n216/ 100) + this.n215)* this.n28 * this.n108;
                  },
                  n2008: function()
                  {
                    var statement1 = (this.n8 / this.n18 * (this.n218/100) + this.n217 );
                    if (this.n8 == '0'){
                      return this.n8;
                    }
                    else if (this.n8 != '0')
                    {
                          if (this.n8 < '4000' && this.n8 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n28 * this.n118);
                          }
                          else if( this.n8 > '4000' && this.n8 > '1999')
                          {
                            if (this.n8 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n28 * this.n118);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n28 * this.n118);
                            }
                          }
                          else if (this.n8 < '4000' && this.n8 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n28 * this.n118);
                          }
                          else if( this.n8 > '4000' && this.n9 < '1999')
                          {
                            if (this.n8 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n28 * this.n118);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n28 * this.n118);
                            }
                          }
                      }
                  },
                  n2018: function(){
                    return (this.n8 / this.n18 * (this.n220/ 100) + this.n219)* this.n28 * this.n12;
                  },
                  n2028 : function(){
                    return (this.n8 / this.n18 * this.n28 * (this.n222/ 100));
                  },
              //number3 BW
                  n139: function(){
                    var statement = (this.n200 * this.n39 + this.n201 * this.n49);

                    if (this.n9 == '0'){
                      return this.n9;
                    }
                    else if (this.n9 != '0'){
                        if (statement < '300'){
                          return (this.n9 / this.n19 * (this.n202/100) * (this.n39 + this.n49) + '300' * this.n29);
                        }
                        else
                          return (this.n9 / this.n19 * (this.n202/100) * (this.n39 + this.n49) + statement * this.n29);
                    }
                  },
                  n149: function(){
                      return (this.n9 / this.n19 * (this.n206/ 100) + this.n205)* this.n29 * this.n59;
                  },
                  n159: function(){
                      return (this.n9 / this.n19 * (this.n208/ 100) + this.n207)* this.n29 * this.n69;
                  },
                  n169: function(){
                    return (this.n9 / this.n19 * (this.n210/ 100) + this.n209)* this.n29 * this.n79;
                  },
                  n179: function(){
                      return (this.n9 / this.n19 * (this.n212/ 100) + this.n211)* this.n29 * this.n89;
                  },
                  n189: function()
                  {
                    var statement1 = (this.n9 / this.n19 * (this.n214/100) + this.n213 );
                    if (this.n9 == '0'){
                      return this.n9;
                    }
                    else if (this.n9 != '0')
                    {
                          if (this.n9 < '4000' && this.n9 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n29 * this.n99);
                          }
                          else if( this.n9 > '4000' && this.n9 > '1999')
                          {
                            if (this.n9 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n29 * this.n99);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n29 * this.n99);
                            }
                          }
                          else if (this.n9 < '4000' && this.n9 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n29 * this.n99);
                          }
                          else if( this.n9 > '4000' && this.n9 < '1999')
                          {
                            if (this.n9 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n29 * this.n99);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n29 * this.n99);
                            }
                          }
                      }
                  },
                  n199: function(){
                      return (this.n9 / this.n19 * (this.n216/ 100) + this.n215)* this.n29 * this.n109;
                  },
                  n2009: function()
                  {
                    var statement1 = (this.n9 / this.n19 * (this.n218/100) + this.n217 );
                    if (this.n9 == '0'){
                      return this.n9;
                    }
                    else if (this.n9 != '0')
                    {
                          if (this.n9 < '4000' && this.n9 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n29 * this.n119);
                          }
                          else if( this.n9 > '4000' && this.n9 > '1999')
                          {
                            if (this.n9 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n29 * this.n119);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n29 * this.n119);
                            }
                          }
                          else if (this.n9 < '4000' && this.n9 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n29 * this.n119);
                          }
                          else if( this.n9 > '4000' && this.n9 < '1999')
                          {
                            if (this.n9 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n29 * this.n119);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n29 * this.n119);
                            }
                          }
                      }
                  },
                  n2019: function(){
                    return (this.n9s / this.n19 * (this.n220/ 100) + this.n219)* this.n29 * this.n129;
                  },
                  n2029 : function(){
                    return (this.n9 / this.n19 * this.n29 * (this.n222/ 100));
                  },
              //sticker BW
                  n140: function(){
                    var statement = (this.n200 * this.n40 + this.n201 * this.n50);

                    if (this.n10 == '0'){
                      return this.n10;
                    }
                    else if (this.n10 != '0'){
                        if (statement < '300'){
                          return (this.n10 / this.n20 * (this.n202/100) * (this.n40 + this.n50) + '300' * this.n50);
                        }
                        else
                          return (this.n10 / this.n20 * (this.n202/100) * (this.n40 + this.n50) + statement * this.n50);
                    }
                  },
                  n150: function(){
                      return (this.n10 / this.n20 * (this.n206/ 100) + this.n205)* this.n30 * this.n60;
                  },
                  n160: function(){
                      return (this.n10 / this.n20 * (this.n208/ 100) + this.n207)* this.n30 * this.n70;
                  },
                  n170: function(){
                    return (this.n10 / this.n20 * (this.n210/ 100) + this.n209)* this.n30 * this.n80;
                  },
                  n180: function(){
                      return (this.n10 / this.n20 * (this.n212/ 100) + this.n211)* this.n30 * this.n90;
                  },
                  n190: function()
                  {
                    var statement1 = (this.n10 / this.n20 * (this.n214/100) + this.n213 );
                    if (this.n10 == '0'){
                      return this.n10;
                    }
                    else if (this.n10 != '0')
                    {
                          if (this.n10 < '4000' && this.n10 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n30 * this.n100);
                          }
                          else if( this.n10 > '4000' && this.n10 > '1999')
                          {
                            if (this.n10 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n30 * this.n100);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n30 * this.n100);
                            }
                          }
                          else if (this.n10 < '4000' && this.n10 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n30 * this.n100);
                          }
                          else if( this.n10 > '4000' && this.n10 < '1999')
                          {
                            if (this.n10 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n30 * this.n100);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n30 * this.n100);
                            }
                          }
                      }
                  },
                  n2000: function(){
                      return (this.n10 / this.n20 * (this.n216/ 100) + this.n215)* this.n30 * this.n110;
                  },
                  n2010: function()
                  {
                    var statement1 = (this.n10 / this.n20 * (this.n218/100) + this.n217 );
                    if (this.n10 == '0'){
                      return this.n10;
                    }
                    else if (this.n10 != '0')
                    {
                          if (this.n10 < '4000' && this.n10 > '1999' )
                          {
                            return ( statement1 + '50' + '50' * this.n30 * this.n120);
                          }
                          else if( this.n10 > '4000' && this.n10 > '1999')
                          {
                            if (this.n10 > '9999')
                            {
                              return ( statement1 + '75' + '50' * this.n30 * this.n120);
                            }
                            else
                            {
                              return (statement1 + '0' + '50' * this.n30 * this.n120);
                            }
                          }
                          else if (this.n10 < '4000' && this.n10 < '1999')
                          {
                            return ( statement1 + '50' + '0' * this.n30 * this.n120);
                          }
                          else if( this.n10 > '4000' && this.n10 < '1999')
                          {
                            if (this.n10 > '9999')
                            {
                              return ( statement1 + '75' + '0' * this.n30 * this.n120);
                            }
                            else
                            {
                              return (statement1 + '0' + '0' * this.n30 * this.n120);
                            }
                          }
                      }
                  },
                  n2020: function(){
                    return (this.n10 / this.n20 * (this.n220/ 100) + this.n219)* this.n30 * this.n130;
                  },
                  n2030 : function(){
                    return (this.n10 / this.n20 * this.n30 * (this.n222/ 100));
                  },
                  n1000a : function()
                  {
                    if (this.n1 == 0)
                    {
                      return (this.n1);
                    }
                    else
                    {
                      return (this.n1 / 2);
                    }
                  },

                  // n3000: function(){
                  //   return this.n131 + this.n141 + this.n151 + this.n161 + this.n171 + this.n181 + this.n191 + this.n2001 + this.n2011 + this.n2021;
                  // },
                  // n3001: function(){
                  //   return (this.n3000 - this.n131 + this.n1 / this.n11);
                  // },
                  // n3002: function(){
                  //   return (this.n1 / this.n11 + this.n3000);
                  // },
                  // n3003: function(){
                  //   return this.n136 + this.n146 + this.n156 + this.n166 + this.n176 + this.n186 + this.n196+ this.n2006 + this.n2016 + this.n2026;
                  // },
                  // n3004: function(){
                  //   return (this.n3003 - this.n136 + this.n6 / this.n16);
                  // },
                  // n3005: function(){
                  //   return (this.n6 / this.n16 + this.n3003);
                  // },
                  // n3006: function(){
                  //   return this.n132 + this.n142 + this.n152 + this.n162 + this.n172 + this.n182 + this.n192+ this.n2002 + this.n2012 + this.n2022;
                  // },



              }
              });

  </script>

@endsection
