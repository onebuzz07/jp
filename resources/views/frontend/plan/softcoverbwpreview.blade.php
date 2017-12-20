@extends('frontend.layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/planning.css') }}" />
@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
    <h3>Soft Cover BW v1.5</h3><small>(For black and white only)</small>
<div class="row col-md-12" id="app">
{!! Form::model($softcoverbw, array('route' => array('frontend.plan.softcoverbwpreview', $softcoverbw->id), 'method' => 'PUT')) !!}
  <div class="col-md-7">
    <table class="table table-bordered" id="users-table">
        <thead>
          <tr>
            <th>{!! Form::text('half', $softcoverbw->half, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n1000a', 'v-model'=>'n1000a')) !!}</th>
          </tr>
          <tr>
            <th>1/2</th>
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
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>P. Order Qty</td>
            <td>{!! Form::text('covOrderB', $softcoverbw->covOrderB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>
            <td>{!! Form::text('t1OrderB', $softcoverbw->t1OrderB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n7', 'v-model'=>"n7")) !!}</td>
            <td>{!! Form::text('t2OrderB', $softcoverbw->t2OrderB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n8', 'v-model'=>"n8")) !!}</td>
            <td>{!! Form::text('t3OrderB', $softcoverbw->t3OrderB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n9', 'v-model'=>"n9")) !!}</td>
            <td>{!! Form::text('statOrderB', $softcoverbw->statOrderB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n10', 'v-model'=>"n10")) !!}</td>
          </tr>
          <tr>
            <td>Up(s) per sheet</td>
            <td>{!! Form::text('covUpB', $softcoverbw->covUpB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>
            <td>{!! Form::text('t1UpB', $softcoverbw->t1UpB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n17', 'v-model'=>"n17")) !!}</td>
            <td>{!! Form::text('t2UpB', $softcoverbw->t2UpB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n18', 'v-model'=>"n18")) !!}</td>
            <td>{!! Form::text('t3UpB', $softcoverbw->t3UpB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n19', 'v-model'=>"n19")) !!}</td>
            <td>{!! Form::text('statUpB', $softcoverbw->statUpB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n20', 'v-model'=>"n20")) !!}</td>
          </tr>
          <tr>
            <td>Signature/Spread(s)</td>
            <td>{!! Form::text('covSignB', $softcoverbw->covSignB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>
            <td>{!! Form::text('t1signB', $softcoverbw->t1signB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n27', 'v-model'=>"n27")) !!}</td>
            <td>{!! Form::text('t2signB', $softcoverbw->t2signB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n28', 'v-model'=>"n28")) !!}</td>
            <td>{!! Form::text('t3signB', $softcoverbw->t3signB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n29', 'v-model'=>"n29")) !!}</td>
            <td>{!! Form::text('statSignB', $softcoverbw->statSignB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n30', 'v-model'=>"n30")) !!}</td>
          </tr>
          <tr>
            <td>Front Color</td>
            <td>{!! Form::text('covFrontB', $softcoverbw->covFrontB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>
            <td>{!! Form::text('t1FrontB', $softcoverbw->t1FrontB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n37', 'v-model'=>"n37")) !!}</td>
            <td>{!! Form::text('t2FrontB', $softcoverbw->t2FrontB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n38', 'v-model'=>"n38")) !!}</td>
            <td>{!! Form::text('t3FrontB', $softcoverbw->t3FrontB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n39', 'v-model'=>"n39")) !!}</td>
            <td>{!! Form::text('statFrontB', $softcoverbw->statFrontB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n40', 'v-model'=>"n40")) !!}</td>
          </tr>
          <tr>
            <td>Back Color</td>
            <td>{!! Form::text('covBackB', $softcoverbw->covBackB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n46', 'v-model'=>"n46")) !!}</td>
            <td>{!! Form::text('t1BackB', $softcoverbw->t1BackB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n47', 'v-model'=>"n47")) !!}</td>
            <td>{!! Form::text('t2BackB', $softcoverbw->t2BackB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n48', 'v-model'=>"n48")) !!}</td>
            <td>{!! Form::text('t3BackB', $softcoverbw->t3BackB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n49', 'v-model'=>"n49")) !!}</td>
            <td>{!! Form::text('statBackB', $softcoverbw->statBackB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n50', 'v-model'=>"n50")) !!}</td>
          </tr>
          <tr><td></td></tr>
          <tr>
            <td>Surface Finishing</td>
            <td>{!! Form::text('covSurfB', $softcoverbw->covSurfB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n56', 'v-model'=>"n56")) !!}</td>
            <td>{!! Form::text('t1SurfB', $softcoverbw->t1SurfB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n57', 'v-model'=>"n57")) !!}</td>
            <td>{!! Form::text('t2SurfB', $softcoverbw->t2SurfB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n58', 'v-model'=>"n58")) !!}</td>
            <td>{!! Form::text('t3SurfB', $softcoverbw->t3SurfB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n59', 'v-model'=>"n59")) !!}</td>
            <td>{!! Form::text('statSurfB', $softcoverbw->statSurfB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n60', 'v-model'=>"n60")) !!}</td>
          </tr>
          <tr>
            <td>Trimming/Cutting</td>
            <td>{!! Form::text('covTrimB', $softcoverbw->covTrimB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n66', 'v-model'=>"n66")) !!}</td>
            <td>{!! Form::text('t1TrimB', $softcoverbw->t1TrimB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n67', 'v-model'=>"n67")) !!}</td>
            <td>{!! Form::text('t2TrimB', $softcoverbw->t2TrimB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n68', 'v-model'=>"n68")) !!}</td>
            <td>{!! Form::text('t3TrimB', $softcoverbw->t3TrimB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n69', 'v-model'=>"n69")) !!}</td>
            <td>{!! Form::text('statTrimB', $softcoverbw->statTrimB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n70', 'v-model'=>"n70")) !!}</td>
          </tr>
          <tr>
            <td>Diecut</td>
            <td>{!! Form::text('covDieB', $softcoverbw->covDieB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n76', 'v-model'=>"n76")) !!}</td>
            <td>{!! Form::text('t1DieB', $softcoverbw->t1DieB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n77', 'v-model'=>"n77")) !!}</td>
            <td>{!! Form::text('t2DieB', $softcoverbw->t2DieB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n78', 'v-model'=>"n78")) !!}</td>
            <td>{!! Form::text('t3DieB', $softcoverbw->t3DieB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n79', 'v-model'=>"n79")) !!}</td>
            <td>{!! Form::text('statDieB', $softcoverbw->statDieB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n80', 'v-model'=>"n80")) !!}</td>
          </tr>
          <tr>
            <td>Stripping</td>
            <td>{!! Form::text('covStripB', $softcoverbw->covStripB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n86', 'v-model'=>"n86")) !!}</td>
            <td>{!! Form::text('t1StripB', $softcoverbw->t1StripB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n87', 'v-model'=>"n87")) !!}</td>
            <td>{!! Form::text('t2StripB', $softcoverbw->t2StripB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n88', 'v-model'=>"n88")) !!}</td>
            <td>{!! Form::text('t3stripB', $softcoverbw->t3stripB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n89', 'v-model'=>"n89")) !!}</td>
            <td>{!! Form::text('statStripB', $softcoverbw->statStripB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n90', 'v-model'=>"n90")) !!}</td>
          </tr>
          <tr>
            <td>Folding</td>
            <td>{!! Form::text('covFoldB', $softcoverbw->covFoldB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n96', 'v-model'=>"n96")) !!}</td>
            <td>{!! Form::text('t1FoldB', $softcoverbw->t1FoldB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n97', 'v-model'=>"n97")) !!}</td>
            <td>{!! Form::text('t2FoldB', $softcoverbw->t2FoldB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n98', 'v-model'=>"n98")) !!}</td>
            <td>{!! Form::text('t3FoldB', $softcoverbw->t3FoldB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n99', 'v-model'=>"n99")) !!}</td>
            <td>{!! Form::text('statFoldB', $softcoverbw->statFoldB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n100', 'v-model'=>"n100")) !!}</td>
          </tr>
          <tr>
            <td>Sewing</td>
            <td>{!! Form::text('covSewB', $softcoverbw->covSewB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n106', 'v-model'=>"n106")) !!}</td>
            <td>{!! Form::text('t1SewB', $softcoverbw->t1SewB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n107', 'v-model'=>"n107")) !!}</td>
            <td>{!! Form::text('t2SewB', $softcoverbw->t2SewB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n108', 'v-model'=>"n108")) !!}</td>
            <td>{!! Form::text('t3SewB', $softcoverbw->t3SewB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n109', 'v-model'=>"n109")) !!}</td>
            <td>{!! Form::text('statSewB', $softcoverbw->statSewB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n110', 'v-model'=>"n110")) !!}</td>
          </tr>
          <tr>
            <td>Binding</td>
            <td>{!! Form::text('covBindB', $softcoverbw->covBindB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n116', 'v-model'=>"n116")) !!}</td>
            <td>{!! Form::text('t1BindB', $softcoverbw->t1BindB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n117', 'v-model'=>"n117")) !!}</td>
            <td>{!! Form::text('t2BindB', $softcoverbw->t2BindB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n118', 'v-model'=>"n118")) !!}</td>
            <td>{!! Form::text('t3BindB', $softcoverbw->t3BindB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n119', 'v-model'=>"n119")) !!}</td>
            <td>{!! Form::text('statBindB', $softcoverbw->statBindB, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n120', 'v-model'=>"n120")) !!}</td>
          </tr>
          <tr>
            <td>3 Knife Trim</td>
            <td>{!! Form::text('cov3B', $softcoverbw->cov3B, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n126', 'v-model'=>"n126")) !!}</td>
            <td>{!! Form::text('t13B', $softcoverbw->t13B, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n127', 'v-model'=>"n127")) !!}</td>
            <td>{!! Form::text('t23B', $softcoverbw->t23B, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n128', 'v-model'=>"n128")) !!}</td>
            <td>{!! Form::text('t33B', $softcoverbw->t33B, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n129', 'v-model'=>"n129")) !!}</td>
            <td>{!! Form::text('stat3B', $softcoverbw->stat3B, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n130', 'v-model'=>"n130")) !!}</td>
          </tr>
        </tbody>
        <thead>
            <tr>
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

            </tr>
        </thead>
        <tbody>

          <tr>
            <td>Printing</td>
            <td>{!! Form::text('covPrintB', $softcoverbw->covPrintB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n136', 'v-model'=>"n136")) !!}</td>
            <td>{!! Form::text('t1PrintB', $softcoverbw->t1PrintB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n137', 'v-model'=>"n137")) !!}</td>
            <td>{!! Form::text('t2PrintB', $softcoverbw->t2PrintB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n138', 'v-model'=>"n138")) !!}</td>
            <td>{!! Form::text('t3PrintB', $softcoverbw->t3PrintB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n139', 'v-model'=>"n139")) !!}</td>
            <td>{!! Form::text('statPrintB', $softcoverbw->statPrintB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n140', 'v-model'=>"n140")) !!}</td>
          </tr>
          <tr>
            <td>Surface Finishing</td>
            <td>{!! Form::text('covSurfB1', $softcoverbw->covSurfB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n146', 'v-model'=>"n146")) !!}</td>
            <td>{!! Form::text('t1SurfB1', $softcoverbw->t1SurfB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n147', 'v-model'=>"n147")) !!}</td>
            <td>{!! Form::text('t2SurfB1', $softcoverbw->t2SurfB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n148', 'v-model'=>"n148")) !!}</td>
            <td>{!! Form::text('t3SurfB1', $softcoverbw->t3SurfB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n149', 'v-model'=>"n149")) !!}</td>
            <td>{!! Form::text('statSurfB1', $softcoverbw->statSurfB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n150', 'v-model'=>"n150")) !!}</td>
          </tr>
          <tr>
            <td>Trimming/Cutting</td>
            <td>{!! Form::text('covTrimB1', $softcoverbw->covTrimB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n156', 'v-model'=>"n156")) !!}</td>
            <td>{!! Form::text('t1TrimB1', $softcoverbw->t1TrimB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n157', 'v-model'=>"n157")) !!}</td>
            <td>{!! Form::text('t2TrimB1', $softcoverbw->t2TrimB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n158', 'v-model'=>"n158")) !!}</td>
            <td>{!! Form::text('t3TrimB1', $softcoverbw->t3TrimB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n159', 'v-model'=>"n159")) !!}</td>
            <td>{!! Form::text('statTrimB1', $softcoverbw->statTrimB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n160', 'v-model'=>"n160")) !!}</td>
          </tr>
          <tr>
            <td>Diecut</td>
            <td>{!! Form::text('covDieB1', $softcoverbw->covDieB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n166', 'v-model'=>"n166")) !!}</td>
            <td>{!! Form::text('t1DieB1', $softcoverbw->t1DieB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n167', 'v-model'=>"n167")) !!}</td>
            <td>{!! Form::text('t2DieB1', $softcoverbw->t2DieB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n168', 'v-model'=>"n168")) !!}</td>
            <td>{!! Form::text('t3DieB1', $softcoverbw->t3DieB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n169', 'v-model'=>"n169")) !!}</td>
            <td>{!! Form::text('statDieB1', $softcoverbw->statDieB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n170', 'v-model'=>"n170")) !!}</td>
          </tr>
          <tr>
            <td>Stripping</td>
            <td>{!! Form::text('covStripB1', $softcoverbw->covStripB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n176', 'v-model'=>"n176")) !!}</td>
            <td>{!! Form::text('t1StripB1', $softcoverbw->t1StripB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n177', 'v-model'=>"n177")) !!}</td>
            <td>{!! Form::text('t2StripB1', $softcoverbw->t2StripB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n178', 'v-model'=>"n178")) !!}</td>
            <td>{!! Form::text('t3stripB1', $softcoverbw->t3stripB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n179', 'v-model'=>"n179")) !!}</td>
            <td>{!! Form::text('statStripB1', $softcoverbw->statStripB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n180', 'v-model'=>"n180")) !!}</td>
          </tr>
          <tr>
            <td>Folding</td>
            <td>{!! Form::text('covFoldB1', $softcoverbw->covFoldB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n186', 'v-model'=>"n186")) !!}</td>
            <td>{!! Form::text('t1FoldB1', $softcoverbw->t1FoldB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n187', 'v-model'=>"n187")) !!}</td>
            <td>{!! Form::text('t2FoldB1', $softcoverbw->t2FoldB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n188', 'v-model'=>"n188")) !!}</td>
            <td>{!! Form::text('t3FoldB1', $softcoverbw->t3FoldB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n189', 'v-model'=>"n189")) !!}</td>
            <td>{!! Form::text('statFoldB1', $softcoverbw->statFoldB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n190', 'v-model'=>"n190")) !!}</td>
          </tr>
          <tr>
            <td>Sewing</td>
            <td>{!! Form::text('covSewB1', $softcoverbw->covSewB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n196', 'v-model'=>"n196")) !!}</td>
            <td>{!! Form::text('t1SewB1', $softcoverbw->t1SewB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n197', 'v-model'=>"n197")) !!}</td>
            <td>{!! Form::text('t2SewB1', $softcoverbw->t2SewB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n198', 'v-model'=>"n198")) !!}</td>
            <td>{!! Form::text('t3SewB1', $softcoverbw->t3SewB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n199', 'v-model'=>"n199")) !!}</td>
            <td>{!! Form::text('statSewB1', $softcoverbw->statSewB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2000', 'v-model'=>"n2000")) !!}</td>
          </tr>
          <tr>
            <td>Binding</td>
            <td>{!! Form::text('covBindB1', $softcoverbw->covBindB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2006', 'v-model'=>"n2006")) !!}</td>
            <td>{!! Form::text('t1BindB1', $softcoverbw->t1BindB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2007', 'v-model'=>"n2007")) !!}</td>
            <td>{!! Form::text('t2BindB1', $softcoverbw->t2BindB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2008', 'v-model'=>"n2008")) !!}</td>
            <td>{!! Form::text('t3BindB1', $softcoverbw->t3BindB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2009', 'v-model'=>"n2009")) !!}</td>
            <td>{!! Form::text('statBindB1', $softcoverbw->statBindB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2010', 'v-model'=>"n2010")) !!}</td>
          </tr>
          <tr>
            <td>3 Knife Trim</td>
            <td>{!! Form::text('cov3B1', $softcoverbw->cov3B1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2016', 'v-model'=>"n2016")) !!}</td>
            <td>{!! Form::text('t13B1', $softcoverbw->t13B1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2017', 'v-model'=>"n2017")) !!}</td>
            <td>{!! Form::text('t23B1', $softcoverbw->t23B1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2018', 'v-model'=>"n2018")) !!}</td>
            <td>{!! Form::text('t33B1', $softcoverbw->t33B1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2019', 'v-model'=>"n2019")) !!}</td>
            <td>{!! Form::text('stat3B1', $softcoverbw->stat3B1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2020', 'v-model'=>"n2020")) !!}</td>
          </tr><tr>
            <td>Packing</td>
            <td>{!! Form::text('covPackB', $softcoverbw->covPackB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2026', 'v-model'=>"n2026")) !!}</td>
            <td>{!! Form::text('t1PackB', $softcoverbw->t1PackB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2027', 'v-model'=>"n2027")) !!}</td>
            <td>{!! Form::text('t2PackB', $softcoverbw->t2PackB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2028', 'v-model'=>"n2028")) !!}</td>
            <td>{!! Form::text('t3PackB', $softcoverbw->t3PackB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2029', 'v-model'=>"n2029")) !!}</td>
            <td>{!! Form::text('statPackB', $softcoverbw->statPackB1, array('class' => 'form-control', 'readonly'=>true , 'min'=>'0', 'id'=>'n2030', 'v-model'=>"n2030")) !!}</td>
          </tr>
        </tbody>
    </table>

  </div>
  <div class="col-md-5">
    <table class="table table-bordered">
        <tr>
          <td colspan="3">Paper+wastage qty </td>
          <td>Required qty</td>
          <td>Paper Supply</td>

        </tr>
        {{-- <tr>
          <td>Cover</td>
          <td>{!! Form::text('ccover', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3000', 'v-model'=>"n3000")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ccoverready', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3001', 'v-model'=>"n3001")) !!}</td>
          <td>{!! Form::text('ccoverwaste', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3002', 'v-model'=>"n3002")) !!}</td>

        </tr> --}}
        <tr>
          <td>Cover</td>
          <td>{!! Form::text('bwcover', $softcoverbw->bwcover, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3003', 'v-model'=>"n3003")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwcoverready', $softcoverbw->bwcoverready, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3004', 'v-model'=>"n3004")) !!}</td>
          <td>{!! Form::text('bwcoverwaste', $softcoverbw->bwcoverwaste, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3005', 'v-model'=>"n3005")) !!}</td>
        </tr>

        {{-- <tr>
          <td>Text 1</td>
          <td>{!! Form::text('ct1', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3006', 'v-model'=>"n3006")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct1ready', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3007', 'v-model'=>"n3007")) !!}</td>
          <td>{!! Form::text('ct1waste', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3008', 'v-model'=>"n3008")) !!}</td>
        </tr> --}}
        <tr>
          <td>Text 1</td>
          <td>{!! Form::text('bwt1', $softcoverbw->bwt1, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3009', 'v-model'=>"n3009")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwt1ready', $softcoverbw->bwt1ready, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3010', 'v-model'=>"n3010")) !!}</td>
          <td>{!! Form::text('bwt1waste', $softcoverbw->bwt1waste, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3011', 'v-model'=>"n3011")) !!}</td>
        </tr>

        {{-- <tr>
          <td>Text 2</td>
          <td>{!! Form::text('ct2', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3012', 'v-model'=>"n3012")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct2ready', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3013', 'v-model'=>"n3013")) !!}</td>
          <td>{!! Form::text('ct2waste', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3014', 'v-model'=>"n3014")) !!}</td>
        </tr> --}}
        <tr>
          <td>Text 2</td>
          <td>{!! Form::text('bwt2', $softcoverbw->bwt2, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3015', 'v-model'=>"n3015")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwt2ready', $softcoverbw->bwt2ready, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3016', 'v-model'=>"n3016")) !!}</td>
          <td>{!! Form::text('bwt2waste', $softcoverbw->bwt2waste, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3017', 'v-model'=>"n3017")) !!}</td>
        </tr>

        {{-- <tr>
          <td>Text 3</td>
          <td>{!! Form::text('ct3', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3018', 'v-model'=>"n3018")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct3ready', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3019', 'v-model'=>"n3019")) !!}</td>
          <td>{!! Form::text('ct3waste', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3020', 'v-model'=>"n3020")) !!}</td>
        </tr> --}}
        <tr>
          <td>Text 3</td>
          <td>{!! Form::text('bwt3', $softcoverbw->bwt3, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3021', 'v-model'=>"n3021")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwt3ready', $softcoverbw->bwt3ready, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3022', 'v-model'=>"n3022")) !!}</td>
          <td>{!! Form::text('bwt3waste', $softcoverbw->bwt3waste, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3023', 'v-model'=>"n3023")) !!}</td>
        </tr>

        {{-- <tr>
          <td>Stickers</td>
          <td>{!! Form::text('csticker', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3024', 'v-model'=>"n3024")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('cstickerready', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3025', 'v-model'=>"n3025")) !!}</td>
          <td>{!! Form::text('cstickerwaste', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3026', 'v-model'=>"n3026")) !!}</td>
        </tr> --}}
        <tr>
          <td>Stickers</td>
          <td>{!! Form::text('bwsticker', $softcoverbw->bwsticker, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3027', 'v-model'=>"n3027")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwstickerready', $softcoverbw->bwstickerready, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3028', 'v-model'=>"n3028")) !!}</td>
          <td>{!! Form::text('bwstickerwaste', $softcoverbw->bwstickerwaste, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n3029', 'v-model'=>"n3029")) !!}</td>
        </tr>

    </table>
    <table class="table table-bordered">
        {{-- <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::text('colMakeFront', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n200', 'v-model'=>"n200")) !!}</td>

        </tr>
        <tr>
          <td colspan="2">(COL) Make ready per color - Back </td>
          <td>{!! Form::text('colMakeBack', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n201', 'v-model'=>"n201")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Waste % </td>
          <td>{!! Form::text('colWaste', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n202', 'v-model'=>"n202")) !!}</td>
        </tr> --}}
        <tr>
          <td colspan="2">(BLA) Make ready per side</td>
          <td>{!! Form::text('blaMake', $softcoverbw->blaMake, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n203', 'v-model'=>"n203")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(BLA) Waste %</td>
          <td>{!! Form::text('blaWaste', $softcoverbw->blaWaste, array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n204', 'v-model'=>"n204")) !!}</td>
        </tr>

        <tr>
          <td colspan="2"></td>
          <td>Make Ready</td>
          <td>Waste %</td>
        </tr>
        <tr>
          <td colspan="2">Surface Finishing</td>
          <td>{!! Form::text('surfMake', $softcoverbw->surfMake, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n205', 'v-model'=>"n205")) !!}</td>
          <td>{!! Form::text('surfWaste', $softcoverbw->surfWaste, array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n206', 'v-model'=>"n206")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Trimming/Cutting</td>
          <td>{!! Form::text('trimMake', $softcoverbw->trimMake, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n207', 'v-model'=>"n207")) !!}</td>
          <td>{!! Form::text('trimWaste', $softcoverbw->trimWaste, array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n208', 'v-model'=>"n208")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Diecut</td>
          <td>{!! Form::text('dieMake', $softcoverbw->dieMake, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n209', 'v-model'=>"n209")) !!}</td>
          <td>{!! Form::text('dieWaste', $softcoverbw->dieWaste, array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n210', 'v-model'=>"n210")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Stripping</td>
          <td>{!! Form::text('stripMake', $softcoverbw->stripMake, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n211', 'v-model'=>"n211")) !!}</td>
          <td>{!! Form::text('stripWaste', $softcoverbw->stripWaste, array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n212', 'v-model'=>"n212")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Folding</td>
          <td>{!! Form::text('foldMake', $softcoverbw->foldMake, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n213', 'v-model'=>"n213")) !!}</td>
          <td>{!! Form::text('foldWaste', $softcoverbw->foldWaste, array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n214', 'v-model'=>"n214")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Sewing</td>
          <td>{!! Form::text('sewMake', $softcoverbw->sewMake, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n215', 'v-model'=>"n215")) !!}</td>
          <td>{!! Form::text('sewWaste', $softcoverbw->sewWaste, array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n216', 'v-model'=>"n216")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Binding</td>
          <td>{!! Form::text('bindMake', $softcoverbw->bindMake, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n217', 'v-model'=>"n217")) !!}</td>
          <td>{!! Form::text('bindWaste', $softcoverbw->bindWaste, array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n218', 'v-model'=>"n218")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">3 Knife Trim</td>
          <td>{!! Form::text('threeMake', $softcoverbw->threeMake, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n219', 'v-model'=>"n219")) !!}</td>
          <td>{!! Form::text('threeWaste', $softcoverbw->threeWaste, array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n220', 'v-model'=>"n220")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Packing</td>
          <td>{!! Form::text('PackMake', $softcoverbw->PackMake, array('class' => 'form-control', 'readonly'=>true , 'id'=>'n221', 'v-model'=>"n221")) !!}</td>
          <td>{!! Form::text('packWaste', $softcoverbw->packWaste, array('class' => 'form-control', 'readonly'=>true , 'step'=>"any", 'id'=>'n222', 'v-model'=>"n222")) !!}</td>
        </tr>

    </table>
  </div>
  <div class="form-group row">
  <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)">  </input>
</div>
{!!Form::close()!!}
</div>
@endsection
