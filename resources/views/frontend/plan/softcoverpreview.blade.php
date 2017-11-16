@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
    <h3>Soft Cover v1.5</h3> <small></small>
<div class="row col-md-12" id="app">
{!! Form::model($softcover, array('route' => array('frontend.plan.softcoverpreview', $softcover->id), 'method' => 'PUT')) !!}
  <table class="table table-bordered" id="users-table">
      <thead>
          <tr>
            <th>{!! Form::text('half' , $softcover->half , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n1000a', 'v-model'=>'n1000a')) !!}</th>

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
            <th>text1</th>
            <th>text2</th>
            <th>text3</th>
            <th>Sticker</th>
            <th></th>
            <th>Cover</th>
            <th>text1</th>
            <th>text2</th>
            <th>text3</th>
            <th>Sticker</th>
          </tr>

      </thead>
      <tbody>
        <tr>
          <td>P. Order Qty</td>
          <td>{!! Form::text('covOrderC', $softcover->covOrderC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n1', 'v-model'=>"n1")) !!}</td>
          <td>{!! Form::text('t1OrderC', $softcover->t1OrderC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2', 'v-model'=>"n2")) !!}</td>
          <td>{!! Form::text('t2OrderC', $softcover->t2OrderC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n3', 'v-model'=>"n3")) !!}</td>
          <td>{!! Form::text('t3OrderC', $softcover->t3OrderC, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n4', 'v-model'=>"n4")) !!}</td>
          <td>{!! Form::text('statOrderC', $softcover->statOrderC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n5', 'v-model'=>"n5")) !!}</td>
          <td></td>
          <td>{!! Form::text('covOrderB', $softcover->covOrderB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>
          <td>{!! Form::text('t1OrderB', $softcover->t1OrderB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n7', 'v-model'=>"n7")) !!}</td>
          <td>{!! Form::text('t2OrderB', $softcover->t2OrderB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n8', 'v-model'=>"n8")) !!}</td>
          <td>{!! Form::text('t3OrderB', $softcover->t3OrderB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n9', 'v-model'=>"n9")) !!}</td>
          <td>{!! Form::text('statOrderB', $softcover->statOrderB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n10', 'v-model'=>"n10")) !!}</td>
        </tr>
        <tr>
          <td>Up(s) per sheet</td>
          <td>{!! Form::text('covUpC', $softcover->covUpC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n11', 'v-model'=>"n11")) !!}</td>
          <td>{!! Form::text('t1UpC', $softcover->t1UpC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n12', 'v-model'=>"n12")) !!}</td>
          <td>{!! Form::text('t2UpC', $softcover->t2UpC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n13', 'v-model'=>"n13")) !!}</td>
          <td>{!! Form::text('t3UpC', $softcover->t3UpC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n14', 'v-model'=>"n14")) !!}</td>
          <td>{!! Form::text('statUpC', $softcover->statUpC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n15', 'v-model'=>"n15")) !!}</td>
          <td></td>
          <td>{!! Form::text('covUpB', $softcover->covUpB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>
          <td>{!! Form::text('t1UpB', $softcover->t1UpB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n17', 'v-model'=>"n17")) !!}</td>
          <td>{!! Form::text('t2UpB', $softcover->t2UpB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n18', 'v-model'=>"n18")) !!}</td>
          <td>{!! Form::text('t3UpB', $softcover->t3UpB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n19', 'v-model'=>"n19")) !!}</td>
          <td>{!! Form::text('statUpB', $softcover->statUpB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n20', 'v-model'=>"n20")) !!}</td>
        </tr>
        <tr>
          <td>Signature/Spread(s)</td>
          <td>{!! Form::text('covSignC', $softcover->covSignC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n21', 'v-model'=>"n21")) !!}</td>
          <td>{!! Form::text('t1signC', $softcover->t1signC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n22', 'v-model'=>"n22")) !!}</td>
          <td>{!! Form::text('t2signC', $softcover->t2signC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n23', 'v-model'=>"n23")) !!}</td>
          <td>{!! Form::text('t3signC', $softcover->t3signC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n24', 'v-model'=>"n24")) !!}</td>
          <td>{!! Form::text('statSignC', $softcover->statSignC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n25', 'v-model'=>"n25")) !!}</td>
          <td></td>
          <td>{!! Form::text('covSignB', $softcover->covSignB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>
          <td>{!! Form::text('t1signB', $softcover->t1signB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n27', 'v-model'=>"n27")) !!}</td>
          <td>{!! Form::text('t2signB', $softcover->t2signB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n28', 'v-model'=>"n28")) !!}</td>
          <td>{!! Form::text('t3signB', $softcover->t3signB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n29', 'v-model'=>"n29")) !!}</td>
          <td>{!! Form::text('statSignB', $softcover->statSignB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n30', 'v-model'=>"n30")) !!}</td>
        </tr>
        <tr>
          <td>Front Color</td>
          <td>{!! Form::text('covFrontC', $softcover->covFrontC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n31', 'v-model'=>"n31")) !!}</td>
          <td>{!! Form::text('t1FrontC', $softcover->t1FrontC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n32', 'v-model'=>"n32")) !!}</td>
          <td>{!! Form::text('t2FrontC', $softcover->t2FrontC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n33', 'v-model'=>"n33")) !!}</td>
          <td>{!! Form::text('t3FrontC', $softcover->t3FrontC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n34', 'v-model'=>"n34")) !!}</td>
          <td>{!! Form::text('statFrontC', $softcover->statFrontC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n35', 'v-model'=>"n35")) !!}</td>
          <td></td>
          <td>{!! Form::text('covFrontB', $softcover->covFrontB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>
          <td>{!! Form::text('t1FrontB', $softcover->t1FrontB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n37', 'v-model'=>"n37")) !!}</td>
          <td>{!! Form::text('t2FrontB', $softcover->t2FrontB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n38', 'v-model'=>"n38")) !!}</td>
          <td>{!! Form::text('t3FrontB', $softcover->t3FrontB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n39', 'v-model'=>"n39")) !!}</td>
          <td>{!! Form::text('statFrontB', $softcover->statFrontB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n40', 'v-model'=>"n40")) !!}</td>
        </tr>
        <tr>
          <td>Back Color</td>
          <td>{!! Form::text('covBackC', $softcover->covBackC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n41', 'v-model'=>"n41")) !!}</td>
          <td>{!! Form::text('t1BackC', $softcover->t1BackC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n42', 'v-model'=>"n42")) !!}</td>
          <td>{!! Form::text('t2BackC', $softcover->t2BackC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n43', 'v-model'=>"n43")) !!}</td>
          <td>{!! Form::text('t3BackC', $softcover->t3BackC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n44', 'v-model'=>"n44")) !!}</td>
          <td>{!! Form::text('statBackC', $softcover->statBackC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n45', 'v-model'=>"n45")) !!}</td>
          <td></td>
          <td>{!! Form::text('covBackB', $softcover->covBackB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n46', 'v-model'=>"n46")) !!}</td>
          <td>{!! Form::text('t1BackB', $softcover->t1BackB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n47', 'v-model'=>"n47")) !!}</td>
          <td>{!! Form::text('t2BackB', $softcover->t2BackB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n48', 'v-model'=>"n48")) !!}</td>
          <td>{!! Form::text('t3BackB', $softcover->t3BackB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n49', 'v-model'=>"n49")) !!}</td>
          <td>{!! Form::text('statBackB', $softcover->statBackB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n50', 'v-model'=>"n50")) !!}</td>
        </tr>
        <tr><td></td></tr>
        <tr>
          <td>Surface Finishing</td>
          <td>{!! Form::text('covSurfC', $softcover->covSurfC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n51', 'v-model'=>"n51")) !!}</td>
          <td>{!! Form::text('t1SurfC', $softcover->t1SurfC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n52', 'v-model'=>"n52")) !!}</td>
          <td>{!! Form::text('t2SurfC', $softcover->t2SurfC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n53', 'v-model'=>"n53")) !!}</td>
          <td>{!! Form::text('t3SurfC', $softcover->t3SurfC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n54', 'v-model'=>"n54")) !!}</td>
          <td>{!! Form::text('statSurfC', $softcover->statSurfC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n55', 'v-model'=>"n55")) !!}</td>
          <td></td>
          <td>{!! Form::text('covSurfB', $softcover->covSurfB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n56', 'v-model'=>"n56")) !!}</td>
          <td>{!! Form::text('t1SurfB', $softcover->t1SurfB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n57', 'v-model'=>"n57")) !!}</td>
          <td>{!! Form::text('t2SurfB', $softcover->t2SurfB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n58', 'v-model'=>"n58")) !!}</td>
          <td>{!! Form::text('t3SurfB', $softcover->t3SurfB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n59', 'v-model'=>"n59")) !!}</td>
          <td>{!! Form::text('statSurfB', $softcover->statSurfB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n60', 'v-model'=>"n60")) !!}</td>
        </tr>
        <tr>
          <td>Trimming/Cutting</td>
          <td>{!! Form::text('covTrimC', $softcover->covTrimC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n61', 'v-model'=>"n61")) !!}</td>
          <td>{!! Form::text('t1TrimC', $softcover->t1TrimC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n62', 'v-model'=>"n62")) !!}</td>
          <td>{!! Form::text('t2TrimC', $softcover->t2TrimC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n63', 'v-model'=>"n63")) !!}</td>
          <td>{!! Form::text('t3TrimC', $softcover->t3TrimC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n64', 'v-model'=>"n64")) !!}</td>
          <td>{!! Form::text('statTrimC', $softcover->statTrimC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n65', 'v-model'=>"n65")) !!}</td>
          <td></td>
          <td>{!! Form::text('covTrimB', $softcover->covTrimB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n66', 'v-model'=>"n66")) !!}</td>
          <td>{!! Form::text('t1TrimB', $softcover->t1TrimB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n67', 'v-model'=>"n67")) !!}</td>
          <td>{!! Form::text('t2TrimB', $softcover->t2TrimB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n68', 'v-model'=>"n68")) !!}</td>
          <td>{!! Form::text('t3TrimB', $softcover->t3TrimB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n69', 'v-model'=>"n69")) !!}</td>
          <td>{!! Form::text('statTrimB', $softcover->statTrimB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n70', 'v-model'=>"n70")) !!}</td>
        </tr>
        <tr>
          <td>Diecut</td>
          <td>{!! Form::text('covDieC', $softcover->covDieC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n71', 'v-model'=>"n71")) !!}</td>
          <td>{!! Form::text('t1DieC', $softcover->t1DieC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n72', 'v-model'=>"n72")) !!}</td>
          <td>{!! Form::text('t2DieC', $softcover->t2DieC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n73', 'v-model'=>"n73")) !!}</td>
          <td>{!! Form::text('t3DieC', $softcover->t3DieC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n74', 'v-model'=>"n74")) !!}</td>
          <td>{!! Form::text('statDieC', $softcover->statDieC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n75', 'v-model'=>"n75")) !!}</td>
          <td></td>
          <td>{!! Form::text('covDieB', $softcover->covDieB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n76', 'v-model'=>"n76")) !!}</td>
          <td>{!! Form::text('t1DieB', $softcover->t1DieB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n77', 'v-model'=>"n77")) !!}</td>
          <td>{!! Form::text('t2DieB', $softcover->t2DieB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n78', 'v-model'=>"n78")) !!}</td>
          <td>{!! Form::text('t3DieB', $softcover->t3DieB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n79', 'v-model'=>"n79")) !!}</td>
          <td>{!! Form::text('statDieB', $softcover->statDieB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n80', 'v-model'=>"n80")) !!}</td>
        </tr>
        <tr>
          <td>Stripping</td>
          <td>{!! Form::text('covStripC', $softcover->covStripC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n81', 'v-model'=>"n81")) !!}</td>
          <td>{!! Form::text('t1StripC', $softcover->t1StripC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n82', 'v-model'=>"n82")) !!}</td>
          <td>{!! Form::text('t2StripC', $softcover->t2StripC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n83', 'v-model'=>"n83")) !!}</td>
          <td>{!! Form::text('t3stripC', $softcover->t3stripC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n84', 'v-model'=>"n84")) !!}</td>
          <td>{!! Form::text('statStripC', $softcover->statStripC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n85', 'v-model'=>"n85")) !!}</td>
          <td></td>
          <td>{!! Form::text('covStripB', $softcover->covStripB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n86', 'v-model'=>"n86")) !!}</td>
          <td>{!! Form::text('t1StripB', $softcover->t1StripB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n87', 'v-model'=>"n87")) !!}</td>
          <td>{!! Form::text('t2StripB', $softcover->t2StripB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n88', 'v-model'=>"n88")) !!}</td>
          <td>{!! Form::text('t3stripB', $softcover->t3stripB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n89', 'v-model'=>"n89")) !!}</td>
          <td>{!! Form::text('statStripB', $softcover->statStripB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n90', 'v-model'=>"n90")) !!}</td>
        </tr>
        <tr>
          <td>Folding</td>
          <td>{!! Form::text('covFoldC', $softcover->covFoldC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n91', 'v-model'=>"n91")) !!}</td>
          <td>{!! Form::text('t1FoldC', $softcover->t1FoldC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n92', 'v-model'=>"n92")) !!}</td>
          <td>{!! Form::text('t2FoldC', $softcover->t2FoldC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n93', 'v-model'=>"n93")) !!}</td>
          <td>{!! Form::text('t3FoldC', $softcover->t3FoldC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n94', 'v-model'=>"n94")) !!}</td>
          <td>{!! Form::text('statFoldC', $softcover->statFoldC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n95', 'v-model'=>"n95")) !!}</td>
          <td></td>
          <td>{!! Form::text('covFoldB', $softcover->covFoldB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n96', 'v-model'=>"n96")) !!}</td>
          <td>{!! Form::text('t1FoldB', $softcover->t1FoldB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n97', 'v-model'=>"n97")) !!}</td>
          <td>{!! Form::text('t2FoldB', $softcover->t2FoldB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n98', 'v-model'=>"n98")) !!}</td>
          <td>{!! Form::text('t3FoldB', $softcover->t3FoldB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n99', 'v-model'=>"n99")) !!}</td>
          <td>{!! Form::text('statFoldB', $softcover->statFoldB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n100', 'v-model'=>"n100")) !!}</td>
        </tr>
        <tr>
          <td>Sewing</td>
          <td>{!! Form::text('covSewC', $softcover->covSewC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n101', 'v-model'=>"n101")) !!}</td>
          <td>{!! Form::text('t1SewC', $softcover->t1SewC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n102', 'v-model'=>"n102")) !!}</td>
          <td>{!! Form::text('t2SewC', $softcover->t2SewC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n103', 'v-model'=>"n103")) !!}</td>
          <td>{!! Form::text('t3SewC', $softcover->t3SewC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n104', 'v-model'=>"n104")) !!}</td>
          <td>{!! Form::text('statSewC', $softcover->statSewC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n105', 'v-model'=>"n105")) !!}</td>
          <td></td>
          <td>{!! Form::text('covSewB', $softcover->covSewB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n106', 'v-model'=>"n106")) !!}</td>
          <td>{!! Form::text('t1SewB', $softcover->t1SewB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n107', 'v-model'=>"n107")) !!}</td>
          <td>{!! Form::text('t2SewB', $softcover->t2SewB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n108', 'v-model'=>"n108")) !!}</td>
          <td>{!! Form::text('t3SewB', $softcover->t3SewB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n109', 'v-model'=>"n109")) !!}</td>
          <td>{!! Form::text('statSewB', $softcover->statSewB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n110', 'v-model'=>"n110")) !!}</td>
        </tr>
        <tr>
          <td>Binding</td>
          <td>{!! Form::text('covBindC', $softcover->covBindC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n111', 'v-model'=>"n111")) !!}</td>
          <td>{!! Form::text('t1BindC', $softcover->t1BindC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n112', 'v-model'=>"n112")) !!}</td>
          <td>{!! Form::text('t2BindC', $softcover->t2BindC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n113', 'v-model'=>"n113")) !!}</td>
          <td>{!! Form::text('t3BindC', $softcover->t3BindC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n114', 'v-model'=>"n114")) !!}</td>
          <td>{!! Form::text('statBindC', $softcover->statBindC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n115', 'v-model'=>"n115")) !!}</td>
          <td></td>
          <td>{!! Form::text('covBindB', $softcover->covBindB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n116', 'v-model'=>"n116")) !!}</td>
          <td>{!! Form::text('t1BindB', $softcover->t1BindB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n117', 'v-model'=>"n117")) !!}</td>
          <td>{!! Form::text('t2BindB', $softcover->t2BindB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n118', 'v-model'=>"n118")) !!}</td>
          <td>{!! Form::text('t3BindB', $softcover->t3BindB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n119', 'v-model'=>"n119")) !!}</td>
          <td>{!! Form::text('statBindB', $softcover->statBindB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n120', 'v-model'=>"n120")) !!}</td>
        </tr>
        <tr>
          <td>3 Knife Trim</td>
          <td>{!! Form::text('cov3C', $softcover->cov3C , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n121', 'v-model'=>"n121")) !!}</td>
          <td>{!! Form::text('t13C', $softcover->t13C , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n122', 'v-model'=>"n122")) !!}</td>
          <td>{!! Form::text('t23C', $softcover->t23C , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n123', 'v-model'=>"n123")) !!}</td>
          <td>{!! Form::text('t33C', $softcover->t33C , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n124', 'v-model'=>"n124")) !!}</td>
          <td>{!! Form::text('stat3C', $softcover->stat3C , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n125', 'v-model'=>"n125")) !!}</td>
          <td></td>
          <td>{!! Form::text('cov3B', $softcover->cov3B , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n126', 'v-model'=>"n126")) !!}</td>
          <td>{!! Form::text('t13B', $softcover->t13B , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n127', 'v-model'=>"n127")) !!}</td>
          <td>{!! Form::text('t23B', $softcover->t23B , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n128', 'v-model'=>"n128")) !!}</td>
          <td>{!! Form::text('t33B', $softcover->t33B , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n129', 'v-model'=>"n129")) !!}</td>
          <td>{!! Form::text('stat3B', $softcover->stat3B , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n130', 'v-model'=>"n130")) !!}</td>
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
            <th>text1</th>
            <th>text2</th>
            <th>text3</th>
            <th>Sticker</th>
            <th></th>
            <th>Cover</th>
            <th>text1</th>
            <th>text2</th>
            <th>text3</th>
            <th>Sticker</th>

          </tr>
      </thead>
      <tbody>

        <tr>
          <td>Printing</td>
          <td>{!! Form::text('covPrintC', $softcover->covPrintC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n131', 'v-model.text'=>"n131")) !!}</td>
          <td>{!! Form::text('t1PrintC', $softcover->t1PrintC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n132', 'v-model'=>"n132")) !!}</td>
          <td>{!! Form::text('t2PrintC', $softcover->t2PrintC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n133', 'v-model'=>"n133")) !!}</td>
          <td>{!! Form::text('t3PrintC', $softcover->t3PrintC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n134', 'v-model'=>"n134")) !!}</td>
          <td>{!! Form::text('statPrintC', $softcover->statPrintC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n135', 'v-model'=>"n135")) !!}</td>
          <td></td>
          <td>{!! Form::text('covPrintB', $softcover->covPrintB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n136', 'v-model'=>"n136")) !!}</td>
          <td>{!! Form::text('t1PrintB', $softcover->t1PrintB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n137', 'v-model'=>"n137")) !!}</td>
          <td>{!! Form::text('t2PrintB', $softcover->t2PrintB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n138', 'v-model'=>"n138")) !!}</td>
          <td>{!! Form::text('t3PrintB', $softcover->t3PrintB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n139', 'v-model'=>"n139")) !!}</td>
          <td>{!! Form::text('statPrintB', $softcover->statPrintB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n140', 'v-model'=>"n140")) !!}</td>
        </tr>
        <tr>
          <td>Surface Finishing</td>
          <td>{!! Form::text('covSurfC1', $softcover->covSurfC1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n141', 'v-model'=>"n141")) !!}</td>
          <td>{!! Form::text('t1SurfC1', $softcover->t1SurfC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n142', 'v-model'=>"n142")) !!}</td>
          <td>{!! Form::text('t2SurfC1', $softcover->t2SurfC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n143', 'v-model'=>"n143")) !!}</td>
          <td>{!! Form::text('t3SurfC1', $softcover->t3SurfC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n144', 'v-model'=>"n144")) !!}</td>
          <td>{!! Form::text('statSurfC1', $softcover->statSurfC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n145', 'v-model'=>"n145")) !!}</td>
          <td></td>
          <td>{!! Form::text('covSurfB1', $softcover->covSurfB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n146', 'v-model'=>"n146")) !!}</td>
          <td>{!! Form::text('t1SurfB1', $softcover->t1SurfB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n147', 'v-model'=>"n147")) !!}</td>
          <td>{!! Form::text('t2SurfB1', $softcover->t2SurfB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n148', 'v-model'=>"n148")) !!}</td>
          <td>{!! Form::text('t3SurfB1', $softcover->t3SurfB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n149', 'v-model'=>"n149")) !!}</td>
          <td>{!! Form::text('statSurfB1', $softcover->statSurfB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n150', 'v-model'=>"n150")) !!}</td>
        </tr>
        <tr>
          <td>Trimming/Cutting</td>
          <td>{!! Form::text('covTrimC1', $softcover->covTrimC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n151', 'v-model'=>"n151")) !!}</td>
          <td>{!! Form::text('t1TrimC1', $softcover->t1TrimC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n152', 'v-model'=>"n152")) !!}</td>
          <td>{!! Form::text('t2TrimC1', $softcover->t2TrimC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n153', 'v-model'=>"n153")) !!}</td>
          <td>{!! Form::text('t3TrimC1', $softcover->t3TrimC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n154', 'v-model'=>"n154")) !!}</td>
          <td>{!! Form::text('statTrimC1', $softcover->statTrimC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n155', 'v-model'=>"n155")) !!}</td>
          <td></td>
          <td>{!! Form::text('covTrimB1', $softcover->covTrimB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n156', 'v-model'=>"n156")) !!}</td>
          <td>{!! Form::text('t1TrimB1', $softcover->t1TrimB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n157', 'v-model'=>"n157")) !!}</td>
          <td>{!! Form::text('t2TrimB1', $softcover->t2TrimB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n158', 'v-model'=>"n158")) !!}</td>
          <td>{!! Form::text('t3TrimB1', $softcover->t3TrimB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n159', 'v-model'=>"n159")) !!}</td>
          <td>{!! Form::text('statTrimB1', $softcover->statTrimB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n160', 'v-model'=>"n160")) !!}</td>
        </tr>
        <tr>
          <td>Diecut</td>
          <td>{!! Form::text('covDieC1', $softcover->covDieC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n161', 'v-model.text'=>"n161")) !!}</td>
          <td>{!! Form::text('t1DieC1', $softcover->t1DieC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n162', 'v-model'=>"n162")) !!}</td>
          <td>{!! Form::text('t2DieC1', $softcover->t2DieC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n163', 'v-model'=>"n163")) !!}</td>
          <td>{!! Form::text('t3DieC1', $softcover->t3DieC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n164', 'v-model'=>"n164")) !!}</td>
          <td>{!! Form::text('statDieC1', $softcover->statDieC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n165', 'v-model'=>"n165")) !!}</td>
          <td></td>
          <td>{!! Form::text('covDieB1', $softcover->covDieB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n166', 'v-model'=>"n166")) !!}</td>
          <td>{!! Form::text('t1DieB1', $softcover->t1DieB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n167', 'v-model'=>"n167")) !!}</td>
          <td>{!! Form::text('t2DieB1', $softcover->t2DieB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n168', 'v-model'=>"n168")) !!}</td>
          <td>{!! Form::text('t3DieB1', $softcover->t3DieB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n169', 'v-model'=>"n169")) !!}</td>
          <td>{!! Form::text('statDieB1', $softcover->statDieB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n170', 'v-model'=>"n170")) !!}</td>
        </tr>
        <tr>
          <td>Stripping</td>
          <td>{!! Form::text('covStripC1', $softcover->covStripC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n171', 'v-model.text'=>"n171")) !!}</td>
          <td>{!! Form::text('t1StripC1', $softcover->t1StripC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n172', 'v-model'=>"n172")) !!}</td>
          <td>{!! Form::text('t2StripC1', $softcover->t2StripC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n173', 'v-model'=>"n173")) !!}</td>
          <td>{!! Form::text('t3stripC1', $softcover->t3stripC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n174', 'v-model'=>"n174")) !!}</td>
          <td>{!! Form::text('statStripC1', $softcover->statStripC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n175', 'v-model'=>"n175")) !!}</td>
          <td></td>
          <td>{!! Form::text('covStripB1', $softcover->covStripB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n176', 'v-model'=>"n176")) !!}</td>
          <td>{!! Form::text('t1StripB1', $softcover->t1StripB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n177', 'v-model'=>"n177")) !!}</td>
          <td>{!! Form::text('t2StripB1', $softcover->t2StripB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n178', 'v-model'=>"n178")) !!}</td>
          <td>{!! Form::text('t3stripB1', $softcover->t3stripB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n179', 'v-model'=>"n179")) !!}</td>
          <td>{!! Form::text('statStripB1', $softcover->statStripB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n180', 'v-model'=>"n180")) !!}</td>
        </tr>
        <tr>
          <td>Folding</td>
          <td>{!! Form::text('covFoldC1', $softcover->covFoldC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n181', 'v-model.text'=>"n181")) !!}</td>
          <td>{!! Form::text('t1FoldC1', $softcover->t1FoldC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n182', 'v-model'=>"n182")) !!}</td>
          <td>{!! Form::text('t2FoldC1', $softcover->t2FoldC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n183', 'v-model'=>"n183")) !!}</td>
          <td>{!! Form::text('t3FoldC1', $softcover->t3FoldC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n184', 'v-model'=>"n184")) !!}</td>
          <td>{!! Form::text('statFoldC1', $softcover->statFoldC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n185', 'v-model'=>"n185")) !!}</td>
          <td></td>
          <td>{!! Form::text('covFoldB1', $softcover->covFoldB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n186', 'v-model'=>"n186")) !!}</td>
          <td>{!! Form::text('t1FoldB1', $softcover->t1FoldB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n187', 'v-model'=>"n187")) !!}</td>
          <td>{!! Form::text('t2FoldB1', $softcover->t2FoldB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n188', 'v-model'=>"n188")) !!}</td>
          <td>{!! Form::text('t3FoldB1', $softcover->t3FoldB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n189', 'v-model'=>"n189")) !!}</td>
          <td>{!! Form::text('statFoldB1', $softcover->statFoldB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n190', 'v-model'=>"n190")) !!}</td>
        </tr>
        <tr>
          <td>Sewing</td>
          <td>{!! Form::text('covSewC1', $softcover->covSewC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n191', 'v-model'=>"n191")) !!}</td>
          <td>{!! Form::text('t1SewC1', $softcover->t1SewC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n192', 'v-model'=>"n192")) !!}</td>
          <td>{!! Form::text('t2SewC1', $softcover->t2SewC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n193', 'v-model'=>"n193")) !!}</td>
          <td>{!! Form::text('t3SewC1', $softcover->t3SewC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n194', 'v-model'=>"n194")) !!}</td>
          <td>{!! Form::text('statSewC1', $softcover->statSewC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n195', 'v-model'=>"n195")) !!}</td>
          <td></td>
          <td>{!! Form::text('covSewB1', $softcover->covSewB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n196', 'v-model'=>"n196")) !!}</td>
          <td>{!! Form::text('t1SewB1', $softcover->t1SewB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n197', 'v-model'=>"n197")) !!}</td>
          <td>{!! Form::text('t2SewB1', $softcover->t2SewB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n198', 'v-model'=>"n198")) !!}</td>
          <td>{!! Form::text('t3SewB1', $softcover->t3SewB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n199', 'v-model'=>"n199")) !!}</td>
          <td>{!! Form::text('statSewB1', $softcover->statSewB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2000', 'v-model'=>"n2000")) !!}</td>
        </tr>
        <tr>
          <td>Binding</td>
          <td>{!! Form::text('covBindC1', $softcover->covBindC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2001', 'v-model.text'=>"n2001")) !!}</td>
          <td>{!! Form::text('t1BindC1', $softcover->t1BindC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2002', 'v-model'=>"n2002")) !!}</td>
          <td>{!! Form::text('t2BindC1', $softcover->t2BindC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2003', 'v-model'=>"n2003")) !!}</td>
          <td>{!! Form::text('t3BindC1', $softcover->t3BindC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2004', 'v-model'=>"n2004")) !!}</td>
          <td>{!! Form::text('statBindC1', $softcover->statBindC1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2005', 'v-model'=>"n2005")) !!}</td>
          <td></td>
          <td>{!! Form::text('covBindB1', $softcover->covBindB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2006', 'v-model'=>"n2006")) !!}</td>
          <td>{!! Form::text('t1BindB1', $softcover->t1BindB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2007', 'v-model'=>"n2007")) !!}</td>
          <td>{!! Form::text('t2BindB1', $softcover->t2BindB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2008', 'v-model'=>"n2008")) !!}</td>
          <td>{!! Form::text('t3BindB1', $softcover->t3BindB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2009', 'v-model'=>"n2009")) !!}</td>
          <td>{!! Form::text('statBindB1', $softcover->statBindB1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2010', 'v-model'=>"n2010")) !!}</td>
        </tr>
        <tr>
          <td>3 Knife Trim</td>
          <td>{!! Form::text('cov3C1', $softcover->cov3C1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2011', 'v-model'=>"n2011")) !!}</td>
          <td>{!! Form::text('t13C1', $softcover->t13C1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2012', 'v-model'=>"n2012")) !!}</td>
          <td>{!! Form::text('t23C1', $softcover->t23C1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2013', 'v-model'=>"n2013")) !!}</td>
          <td>{!! Form::text('t33C1', $softcover->t33C1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2014', 'v-model'=>"n2014")) !!}</td>
          <td>{!! Form::text('stat3C1', $softcover->stat3C1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2015', 'v-model'=>"n2015")) !!}</td>
          <td></td>
          <td>{!! Form::text('cov3B1', $softcover->cov3B1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2016', 'v-model'=>"n2016")) !!}</td>
          <td>{!! Form::text('t13B1', $softcover->t13B1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2017', 'v-model'=>"n2017")) !!}</td>
          <td>{!! Form::text('t23B1', $softcover->t23B1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2018', 'v-model'=>"n2018")) !!}</td>
          <td>{!! Form::text('t33B1', $softcover->t33B1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2019', 'v-model'=>"n2019")) !!}</td>
          <td>{!! Form::text('stat3B1', $softcover->stat3B1 , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2020', 'v-model'=>"n2020")) !!}</td>
        </tr><tr>
          <td>Packing</td>
          <td>{!! Form::text('covPackC', $softcover->covPackC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2021', 'v-model'=>"n2021")) !!}</td>
          <td>{!! Form::text('t1PackC', $softcover->t1PackC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2022', 'v-model'=>"n2022")) !!}</td>
          <td>{!! Form::text('t2PackC', $softcover->t2PackC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2023', 'v-model'=>"n2023")) !!}</td>
          <td>{!! Form::text('t3PackC', $softcover->t3PackC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2024', 'v-model'=>"n2024")) !!}</td>
          <td>{!! Form::text('statPackC', $softcover->statPackC , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2025', 'v-model'=>"n2025")) !!}</td>
          <td></td>
          <td>{!! Form::text('covPackB', $softcover->covPackB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2026', 'v-model'=>"n2026")) !!}</td>
          <td>{!! Form::text('t1PackB', $softcover->t1PackB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2027', 'v-model'=>"n2027")) !!}</td>
          <td>{!! Form::text('t2PackB', $softcover->t2PackB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2028', 'v-model'=>"n2028")) !!}</td>
          <td>{!! Form::text('t3PackB', $softcover->t3PackB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2029', 'v-model'=>"n2029")) !!}</td>
          <td>{!! Form::text('statPackB', $softcover->statPackB , array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2030', 'v-model'=>"n2030")) !!}</td>
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
        <td>{!! Form::text('ccover', $softcover->ccover , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3000', 'v-model'=>"n3000")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::text('ccoverready', $softcover->ccoverready , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3001', 'v-model'=>"n3001")) !!}</td>
        <td>{!! Form::text('ccoverwaste', $softcover->ccoverwaste , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3002', 'v-model'=>"n3002")) !!}</td>

      </tr>
      <tr>
        <td></td>
        <td>{!! Form::text('bwcover', $softcover->bwcover , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3003', 'v-model'=>"n3003")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::text('bwcoverready', $softcover->bwcoverready , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3004', 'v-model'=>"n3004")) !!}</td>
        <td>{!! Form::text('bwcoverwaste', $softcover->bwcoverwaste , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3005', 'v-model'=>"n3005")) !!}</td>
      </tr>

      <tr>
        <td>Text 1</td>
        <td>{!! Form::text('ct1', $softcover->ct1 , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3006', 'v-model'=>"n3006")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::text('ct1ready', $softcover->ct1ready , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3007', 'v-model'=>"n3007")) !!}</td>
        <td>{!! Form::text('ct1waste', $softcover->ct1waste , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3008', 'v-model'=>"n3008")) !!}</td>
      </tr>
      <tr>
        <td></td>
        <td>{!! Form::text('bwt1', $softcover->bwt1 , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3009', 'v-model'=>"n3009")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::text('bwt1ready', $softcover->bwt1ready , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3010', 'v-model'=>"n3010")) !!}</td>
        <td>{!! Form::text('bwt1waste', $softcover->bwt1waste , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3011', 'v-model'=>"n3011")) !!}</td>
      </tr>

      <tr>
        <td>Text 2</td>
        <td>{!! Form::text('ct2', $softcover->ct2 , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3012', 'v-model'=>"n3012")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::text('ct2ready', $softcover->ct2ready , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3013', 'v-model'=>"n3013")) !!}</td>
        <td>{!! Form::text('ct2waste', $softcover->ct2waste , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3014', 'v-model'=>"n3014")) !!}</td>
      </tr>
      <tr>
        <td></td>
        <td>{!! Form::text('bwt2', $softcover->bwt2 , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3015', 'v-model'=>"n3015")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::text('bwt2ready', $softcover->bwt2ready , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3016', 'v-model'=>"n3016")) !!}</td>
        <td>{!! Form::text('bwt2waste', $softcover->bwt2waste , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3017', 'v-model'=>"n3017")) !!}</td>
      </tr>

      <tr>
        <td>Text 3</td>
        <td>{!! Form::text('ct3', $softcover->ct3 , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3018', 'v-model'=>"n3018")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::text('ct3ready', $softcover->ct3ready , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3019', 'v-model'=>"n3019")) !!}</td>
        <td>{!! Form::text('ct3waste', $softcover->ct3waste , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3020', 'v-model'=>"n3020")) !!}</td>
      </tr>
      <tr>
        <td></td>
        <td>{!! Form::text('bwt3', $softcover->bwt3 , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3021', 'v-model'=>"n3021")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::text('bwt3ready', $softcover->bwt3ready , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3022', 'v-model'=>"n3022")) !!}</td>
        <td>{!! Form::text('bwt3waste', $softcover->bwt3waste , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3023', 'v-model'=>"n3023")) !!}</td>
      </tr>

      <tr>
        <td>Stickers</td>
        <td>{!! Form::text('csticker', $softcover->csticker , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3024', 'v-model'=>"n3024")) !!}</td>
        <td>Color Job</td>
        <td>{!! Form::text('cstickerready', $softcover->cstickerready , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3025', 'v-model'=>"n3025")) !!}</td>
        <td>{!! Form::text('cstickerwaste', $softcover->cstickerwaste , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3026', 'v-model'=>"n3026")) !!}</td>
      </tr>
      <tr>
        <td></td>
        <td>{!! Form::text('bwsticker', $softcover->bwsticker , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3027', 'v-model'=>"n3027")) !!}</td>
        <td>B/W Job</td>
        <td>{!! Form::text('bwstickerready', $softcover->bwstickerready , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3028', 'v-model'=>"n3028")) !!}</td>
        <td>{!! Form::text('bwstickerwaste', $softcover->bwstickerwaste , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3029', 'v-model'=>"n3029")) !!}</td>
      </tr>

  </table>
</div>

<div class="col-md-6">
  <table class="table table-bordered">
      <tr>
        <td colspan="2">(COL) Make ready per color - Front </td>
        <td>{!! Form::text('colMakeFront', $softcover->colMakeFront , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n200', 'v-model'=>"n200")) !!}</td>

      </tr>
      <tr>
        <td colspan="2">(COL) Make ready per color - Back </td>
        <td>{!! Form::text('colMakeBack', $softcover->colMakeBack , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n201', 'v-model'=>"n201")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">(COL) Waste % </td>
        <td>{!! Form::text('colWaste', $softcover->colWaste , array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n202', 'v-model'=>"n202")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">(BLA) Make ready per side</td>
        <td>{!! Form::text('blaMake', $softcover->blaMake , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n203', 'v-model'=>"n203")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">(BLA) Waste %</td>
        <td>{!! Form::text('blaWaste', $softcover->blaWaste , array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n204', 'v-model'=>"n204")) !!}</td>
      </tr>

      <tr>
        <td colspan="2"></td>
        <td>Make Ready</td>
        <td>Waste %</td>
      </tr>
      <tr>
        <td colspan="2">Surface Finishing</td>
        <td>{!! Form::text('surfMake', $softcover->surfMake , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n205', 'v-model'=>"n205")) !!}</td>
        <td>{!! Form::text('surfWaste', $softcover->surfWaste , array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n206', 'v-model'=>"n206")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Trimming/Cutting</td>
        <td>{!! Form::text('trimMake', $softcover->trimMake , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n207', 'v-model'=>"n207")) !!}</td>
        <td>{!! Form::text('trimWaste', $softcover->trimWaste , array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n208', 'v-model'=>"n208")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Diecut</td>
        <td>{!! Form::text('dieMake', $softcover->dieMake , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n209', 'v-model'=>"n209")) !!}</td>
        <td>{!! Form::text('dieWaste', $softcover->dieWaste , array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n210', 'v-model'=>"n210")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Stripping</td>
        <td>{!! Form::text('stripMake', $softcover->stripMake , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n211', 'v-model'=>"n211")) !!}</td>
        <td>{!! Form::text('stripWaste', $softcover->stripWaste , array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n212', 'v-model'=>"n212")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Folding</td>
        <td>{!! Form::text('foldMake', $softcover->foldMake , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n213', 'v-model'=>"n213")) !!}</td>
        <td>{!! Form::text('foldWaste', $softcover->foldWaste , array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n214', 'v-model'=>"n214")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Sewing</td>
        <td>{!! Form::text('sewMake', $softcover->sewMake , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n215', 'v-model'=>"n215")) !!}</td>
        <td>{!! Form::text('sewWaste', $softcover->sewWaste , array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n216', 'v-model'=>"n216")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Binding</td>
        <td>{!! Form::text('bindMake', $softcover->bindMake , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n217', 'v-model'=>"n217")) !!}</td>
        <td>{!! Form::text('bindWaste', $softcover->bindWaste , array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n218', 'v-model'=>"n218")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">3 Knife Trim</td>
        <td>{!! Form::text('threeMake', $softcover->threeMake , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n219', 'v-model'=>"n219")) !!}</td>
        <td>{!! Form::text('threeWaste', $softcover->threeWaste , array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n220', 'v-model'=>"n220")) !!}</td>
      </tr>
      <tr>
        <td colspan="2">Packing</td>
        <td>{!! Form::text('PackMake', $softcover->PackMake , array('class' => 'form-control', 'readonly'=>true , 'id'=>'n221', 'v-model'=>"n221")) !!}</td>
        <td>{!! Form::text('packWaste', $softcover->packWaste , array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n222', 'v-model'=>"n222")) !!}</td>
      </tr>

  </table>
</div>
<div class="form-group row">
      <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)">  </input>
    </div>
{!! Form::close() !!}
</div>


@endsection
