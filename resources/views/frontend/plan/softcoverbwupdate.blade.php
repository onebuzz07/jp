@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
    <h3>Soft Cover BW v1.5</h3><small>(For black and white only)</small>
<div class="row col-md-12" id="app">
{!! Form::model($softcoverbw, array('route' => array('frontend.plan.softcoverbwupdate', $softcoverbw->id), 'method' => 'PUT')) !!}
  <div class="col-md-7">
    <table class="table table-bordered" id="users-table">
        <thead>
          <tr>
            <th>{!! Form::number('half', $softcoverbw->half, array('class' => 'form-control', 'min'=>'0', 'id'=>'n1000a', 'v-model'=>'n1000a', 'readonly'=>true)) !!}</th>
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
            <th>number1</th>
            <th>number2</th>
            <th>number3</th>
            <th>Sticker</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>P. Order Qty</td>
            <td>{!! Form::number('covOrderB', $softcoverbw->covOrderB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>
            <td>{!! Form::number('t1OrderB', $softcoverbw->t1OrderB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n7', 'v-model'=>"n7")) !!}</td>
            <td>{!! Form::number('t2OrderB', $softcoverbw->t2OrderB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n8', 'v-model'=>"n8")) !!}</td>
            <td>{!! Form::number('t3OrderB', $softcoverbw->t3OrderB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n9', 'v-model'=>"n9")) !!}</td>
            <td>{!! Form::number('statOrderB', $softcoverbw->statOrderB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n10', 'v-model'=>"n10")) !!}</td>
          </tr>
          <tr>
            <td>Up(s) per sheet</td>
            <td>{!! Form::number('covUpB', $softcoverbw->covUpB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>
            <td>{!! Form::number('t1UpB', $softcoverbw->t1UpB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n17', 'v-model'=>"n17")) !!}</td>
            <td>{!! Form::number('t2UpB', $softcoverbw->t2UpB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n18', 'v-model'=>"n18")) !!}</td>
            <td>{!! Form::number('t3UpB', $softcoverbw->t3UpB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n19', 'v-model'=>"n19")) !!}</td>
            <td>{!! Form::number('statUpB', $softcoverbw->statUpB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n20', 'v-model'=>"n20")) !!}</td>
          </tr>
          <tr>
            <td>Signature/Spread(s)</td>
            <td>{!! Form::number('covSignB', $softcoverbw->covSignB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>
            <td>{!! Form::number('t1signB', $softcoverbw->t1signB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n27', 'v-model'=>"n27")) !!}</td>
            <td>{!! Form::number('t2signB', $softcoverbw->t2signB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n28', 'v-model'=>"n28")) !!}</td>
            <td>{!! Form::number('t3signB', $softcoverbw->t3signB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n29', 'v-model'=>"n29")) !!}</td>
            <td>{!! Form::number('statSignB', $softcoverbw->statSignB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n30', 'v-model'=>"n30")) !!}</td>
          </tr>
          <tr>
            <td>Front Color</td>
            <td>{!! Form::number('covFrontB', $softcoverbw->covFrontB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>
            <td>{!! Form::number('t1FrontB', $softcoverbw->t1FrontB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n37', 'v-model'=>"n37")) !!}</td>
            <td>{!! Form::number('t2FrontB', $softcoverbw->t2FrontB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n38', 'v-model'=>"n38")) !!}</td>
            <td>{!! Form::number('t3FrontB', $softcoverbw->t3FrontB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n39', 'v-model'=>"n39")) !!}</td>
            <td>{!! Form::number('statFrontB', $softcoverbw->statFrontB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n40', 'v-model'=>"n40")) !!}</td>
          </tr>
          <tr>
            <td>Back Color</td>
            <td>{!! Form::number('covBackB', $softcoverbw->covBackB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n46', 'v-model'=>"n46")) !!}</td>
            <td>{!! Form::number('t1BackB', $softcoverbw->t1BackB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n47', 'v-model'=>"n47")) !!}</td>
            <td>{!! Form::number('t2BackB', $softcoverbw->t2BackB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n48', 'v-model'=>"n48")) !!}</td>
            <td>{!! Form::number('t3BackB', $softcoverbw->t3BackB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n49', 'v-model'=>"n49")) !!}</td>
            <td>{!! Form::number('statBackB', $softcoverbw->statBackB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n50', 'v-model'=>"n50")) !!}</td>
          </tr>
          <tr><td></td></tr>
          <tr>
            <td>Surface Finishing</td>
            <td>{!! Form::number('covSurfB', $softcoverbw->covSurfB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n56', 'v-model'=>"n56")) !!}</td>
            <td>{!! Form::number('t1SurfB', $softcoverbw->t1SurfB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n57', 'v-model'=>"n57")) !!}</td>
            <td>{!! Form::number('t2SurfB', $softcoverbw->t2SurfB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n58', 'v-model'=>"n58")) !!}</td>
            <td>{!! Form::number('t3SurfB', $softcoverbw->t3SurfB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n59', 'v-model'=>"n59")) !!}</td>
            <td>{!! Form::number('statSurfB', $softcoverbw->statSurfB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n60', 'v-model'=>"n60")) !!}</td>
          </tr>
          <tr>
            <td>Trimming/Cutting</td>
            <td>{!! Form::number('covTrimB', $softcoverbw->covTrimB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n66', 'v-model'=>"n66")) !!}</td>
            <td>{!! Form::number('t1TrimB', $softcoverbw->t1TrimB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n67', 'v-model'=>"n67")) !!}</td>
            <td>{!! Form::number('t2TrimB', $softcoverbw->t2TrimB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n68', 'v-model'=>"n68")) !!}</td>
            <td>{!! Form::number('t3TrimB', $softcoverbw->t3TrimB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n69', 'v-model'=>"n69")) !!}</td>
            <td>{!! Form::number('statTrimB', $softcoverbw->statTrimB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n70', 'v-model'=>"n70")) !!}</td>
          </tr>
          <tr>
            <td>Diecut</td>
            <td>{!! Form::number('covDieB', $softcoverbw->covDieB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n76', 'v-model'=>"n76")) !!}</td>
            <td>{!! Form::number('t1DieB', $softcoverbw->t1DieB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n77', 'v-model'=>"n77")) !!}</td>
            <td>{!! Form::number('t2DieB', $softcoverbw->t2DieB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n78', 'v-model'=>"n78")) !!}</td>
            <td>{!! Form::number('t3DieB', $softcoverbw->t3DieB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n79', 'v-model'=>"n79")) !!}</td>
            <td>{!! Form::number('statDieB', $softcoverbw->statDieB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n80', 'v-model'=>"n80")) !!}</td>
          </tr>
          <tr>
            <td>Stripping</td>
            <td>{!! Form::number('covStripB', $softcoverbw->covStripB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n86', 'v-model'=>"n86")) !!}</td>
            <td>{!! Form::number('t1StripB', $softcoverbw->t1StripB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n87', 'v-model'=>"n87")) !!}</td>
            <td>{!! Form::number('t2StripB', $softcoverbw->t2StripB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n88', 'v-model'=>"n88")) !!}</td>
            <td>{!! Form::number('t3stripB', $softcoverbw->t3stripB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n89', 'v-model'=>"n89")) !!}</td>
            <td>{!! Form::number('statStripB', $softcoverbw->statStripB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n90', 'v-model'=>"n90")) !!}</td>
          </tr>
          <tr>
            <td>Folding</td>
            <td>{!! Form::number('covFoldB', $softcoverbw->covFoldB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n96', 'v-model'=>"n96")) !!}</td>
            <td>{!! Form::number('t1FoldB', $softcoverbw->t1FoldB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n97', 'v-model'=>"n97")) !!}</td>
            <td>{!! Form::number('t2FoldB', $softcoverbw->t2FoldB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n98', 'v-model'=>"n98")) !!}</td>
            <td>{!! Form::number('t3FoldB', $softcoverbw->t3FoldB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n99', 'v-model'=>"n99")) !!}</td>
            <td>{!! Form::number('statFoldB', $softcoverbw->statFoldB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n100', 'v-model'=>"n100")) !!}</td>
          </tr>
          <tr>
            <td>Sewing</td>
            <td>{!! Form::number('covSewB', $softcoverbw->covSewB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n106', 'v-model'=>"n106")) !!}</td>
            <td>{!! Form::number('t1SewB', $softcoverbw->t1SewB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n107', 'v-model'=>"n107")) !!}</td>
            <td>{!! Form::number('t2SewB', $softcoverbw->t2SewB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n108', 'v-model'=>"n108")) !!}</td>
            <td>{!! Form::number('t3SewB', $softcoverbw->t3SewB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n109', 'v-model'=>"n109")) !!}</td>
            <td>{!! Form::number('statSewB', $softcoverbw->statSewB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n110', 'v-model'=>"n110")) !!}</td>
          </tr>
          <tr>
            <td>Binding</td>
            <td>{!! Form::number('covBindB', $softcoverbw->covBindB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n116', 'v-model'=>"n116")) !!}</td>
            <td>{!! Form::number('t1BindB', $softcoverbw->t1BindB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n117', 'v-model'=>"n117")) !!}</td>
            <td>{!! Form::number('t2BindB', $softcoverbw->t2BindB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n118', 'v-model'=>"n118")) !!}</td>
            <td>{!! Form::number('t3BindB', $softcoverbw->t3BindB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n119', 'v-model'=>"n119")) !!}</td>
            <td>{!! Form::number('statBindB', $softcoverbw->statBindB, array('class' => 'form-control', 'min'=>'0', 'id'=>'n120', 'v-model'=>"n120")) !!}</td>
          </tr>
          <tr>
            <td>3 Knife Trim</td>
            <td>{!! Form::number('cov3B', $softcoverbw->cov3B, array('class' => 'form-control', 'min'=>'0', 'id'=>'n126', 'v-model'=>"n126")) !!}</td>
            <td>{!! Form::number('t13B', $softcoverbw->t13B, array('class' => 'form-control', 'min'=>'0', 'id'=>'n127', 'v-model'=>"n127")) !!}</td>
            <td>{!! Form::number('t23B', $softcoverbw->t23B, array('class' => 'form-control', 'min'=>'0', 'id'=>'n128', 'v-model'=>"n128")) !!}</td>
            <td>{!! Form::number('t33B', $softcoverbw->t33B, array('class' => 'form-control', 'min'=>'0', 'id'=>'n129', 'v-model'=>"n129")) !!}</td>
            <td>{!! Form::number('stat3B', $softcoverbw->stat3B, array('class' => 'form-control', 'min'=>'0', 'id'=>'n130', 'v-model'=>"n130")) !!}</td>
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
              <th>number1</th>
              <th>number2</th>
              <th>number3</th>
              <th>Sticker</th>

            </tr>
        </thead>
        <tbody>

          <tr>
            <td>Printing</td>
            <td>{!! Form::text('covPrintB1', $softcoverbw->covPrintB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n136', 'v-model'=>"n136")) !!}</td>
            <td>{!! Form::text('t1PrintB1', $softcoverbw->t1PrintB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n137', 'v-model'=>"n137")) !!}</td>
            <td>{!! Form::text('t2PrintB1', $softcoverbw->t2PrintB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n138', 'v-model'=>"n138")) !!}</td>
            <td>{!! Form::text('t3PrintB1', $softcoverbw->t3PrintB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n139', 'v-model'=>"n139")) !!}</td>
            <td>{!! Form::text('statPrintB1', $softcoverbw->statPrintB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n140', 'v-model'=>"n140")) !!}</td>
          </tr>
          <tr>
            <td>Surface Finishing</td>
            <td>{!! Form::text('covSurfB1', $softcoverbw->covSurfB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n146', 'v-model'=>"n146")) !!}</td>
            <td>{!! Form::text('t1SurfB1', $softcoverbw->t1SurfB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n147', 'v-model'=>"n147")) !!}</td>
            <td>{!! Form::text('t2SurfB1', $softcoverbw->t2SurfB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n148', 'v-model'=>"n148")) !!}</td>
            <td>{!! Form::text('t3SurfB1', $softcoverbw->t3SurfB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n149', 'v-model'=>"n149")) !!}</td>
            <td>{!! Form::text('statSurfB1', $softcoverbw->statSurfB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n150', 'v-model'=>"n150")) !!}</td>
          </tr>
          <tr>
            <td>Trimming/Cutting</td>
            <td>{!! Form::text('covTrimB1', $softcoverbw->covTrimB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n156', 'v-model'=>"n156")) !!}</td>
            <td>{!! Form::text('t1TrimB1', $softcoverbw->t1TrimB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n157', 'v-model'=>"n157")) !!}</td>
            <td>{!! Form::text('t2TrimB1', $softcoverbw->t2TrimB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n158', 'v-model'=>"n158")) !!}</td>
            <td>{!! Form::text('t3TrimB1', $softcoverbw->t3TrimB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n159', 'v-model'=>"n159")) !!}</td>
            <td>{!! Form::text('statTrimB1', $softcoverbw->statTrimB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n160', 'v-model'=>"n160")) !!}</td>
          </tr>
          <tr>
            <td>Diecut</td>
            <td>{!! Form::text('covDieB1', $softcoverbw->covDieB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n166', 'v-model'=>"n166")) !!}</td>
            <td>{!! Form::text('t1DieB1', $softcoverbw->t1DieB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n167', 'v-model'=>"n167")) !!}</td>
            <td>{!! Form::text('t2DieB1', $softcoverbw->t2DieB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n168', 'v-model'=>"n168")) !!}</td>
            <td>{!! Form::text('t3DieB1', $softcoverbw->t3DieB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n169', 'v-model'=>"n169")) !!}</td>
            <td>{!! Form::text('statDieB1', $softcoverbw->statDieB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n170', 'v-model'=>"n170")) !!}</td>
          </tr>
          <tr>
            <td>Stripping</td>
            <td>{!! Form::text('covStripB1', $softcoverbw->covStripB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n176', 'v-model'=>"n176")) !!}</td>
            <td>{!! Form::text('t1StripB1', $softcoverbw->t1StripB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n177', 'v-model'=>"n177")) !!}</td>
            <td>{!! Form::text('t2StripB1', $softcoverbw->t2StripB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n178', 'v-model'=>"n178")) !!}</td>
            <td>{!! Form::text('t3stripB1', $softcoverbw->t3stripB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n179', 'v-model'=>"n179")) !!}</td>
            <td>{!! Form::text('statStripB1', $softcoverbw->statStripB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n180', 'v-model'=>"n180")) !!}</td>
          </tr>
          <tr>
            <td>Folding</td>
            <td>{!! Form::text('covFoldB1', $softcoverbw->covFoldB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n186', 'v-model'=>"n186")) !!}</td>
            <td>{!! Form::text('t1FoldB1', $softcoverbw->t1FoldB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n187', 'v-model'=>"n187")) !!}</td>
            <td>{!! Form::text('t2FoldB1', $softcoverbw->t2FoldB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n188', 'v-model'=>"n188")) !!}</td>
            <td>{!! Form::text('t3FoldB1', $softcoverbw->t3FoldB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n189', 'v-model'=>"n189")) !!}</td>
            <td>{!! Form::text('statFoldB1', $softcoverbw->statFoldB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n190', 'v-model'=>"n190")) !!}</td>
          </tr>
          <tr>
            <td>Sewing</td>
            <td>{!! Form::text('covSewB1', $softcoverbw->covSewB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n196', 'v-model'=>"n196")) !!}</td>
            <td>{!! Form::text('t1SewB1', $softcoverbw->t1SewB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n197', 'v-model'=>"n197")) !!}</td>
            <td>{!! Form::text('t2SewB1', $softcoverbw->t2SewB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n198', 'v-model'=>"n198")) !!}</td>
            <td>{!! Form::text('t3SewB1', $softcoverbw->t3SewB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n199', 'v-model'=>"n199")) !!}</td>
            <td>{!! Form::text('statSewB1', $softcoverbw->statSewB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2000', 'v-model'=>"n2000")) !!}</td>
          </tr>
          <tr>
            <td>Binding</td>
            <td>{!! Form::text('covBindB1', $softcoverbw->covBindB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2006', 'v-model'=>"n2006")) !!}</td>
            <td>{!! Form::text('t1BindB1', $softcoverbw->t1BindB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2007', 'v-model'=>"n2007")) !!}</td>
            <td>{!! Form::text('t2BindB1', $softcoverbw->t2BindB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2008', 'v-model'=>"n2008")) !!}</td>
            <td>{!! Form::text('t3BindB1', $softcoverbw->t3BindB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2009', 'v-model'=>"n2009")) !!}</td>
            <td>{!! Form::text('statBindB1', $softcoverbw->statBindB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2010', 'v-model'=>"n2010")) !!}</td>
          </tr>
          <tr>
            <td>3 Knife Trim</td>
            <td>{!! Form::text('cov3B1', $softcoverbw->cov3B1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2016', 'v-model'=>"n2016")) !!}</td>
            <td>{!! Form::text('t13B1', $softcoverbw->t13B1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2017', 'v-model'=>"n2017")) !!}</td>
            <td>{!! Form::text('t23B1', $softcoverbw->t23B1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2018', 'v-model'=>"n2018")) !!}</td>
            <td>{!! Form::text('t33B1', $softcoverbw->t33B1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2019', 'v-model'=>"n2019")) !!}</td>
            <td>{!! Form::text('stat3B1', $softcoverbw->stat3B1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2020', 'v-model'=>"n2020")) !!}</td>
          </tr><tr>
            <td>Packing</td>
            <td>{!! Form::text('covPackB1', $softcoverbw->covPackB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2026', 'v-model'=>"n2026")) !!}</td>
            <td>{!! Form::text('t1PackB1', $softcoverbw->t1PackB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2027', 'v-model'=>"n2027")) !!}</td>
            <td>{!! Form::text('t2PackB1', $softcoverbw->t2PackB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2028', 'v-model'=>"n2028")) !!}</td>
            <td>{!! Form::text('t3PackB1', $softcoverbw->t3PackB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2029', 'v-model'=>"n2029")) !!}</td>
            <td>{!! Form::text('statPackB1', $softcoverbw->statPackB1, array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2030', 'v-model'=>"n2030")) !!}</td>
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
          <td>{!! Form::text('ccover', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3000', 'v-model'=>"n3000")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ccoverready', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3001', 'v-model'=>"n3001")) !!}</td>
          <td>{!! Form::text('ccoverwaste', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3002', 'v-model'=>"n3002")) !!}</td>

        </tr> --}}
        <tr>
          <td>Cover</td>
          <td>{!! Form::text('bwcover', $softcoverbw->bwcover, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3003', 'v-model'=>"n3003")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwcoverready', $softcoverbw->bwcoverready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3004', 'v-model'=>"n3004")) !!}</td>
          <td>{!! Form::text('bwcoverwaste', $softcoverbw->bwcoverwaste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3005', 'v-model'=>"n3005")) !!}</td>
        </tr>

        {{-- <tr>
          <td>Text 1</td>
          <td>{!! Form::text('ct1', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3006', 'v-model'=>"n3006")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct1ready', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3007', 'v-model'=>"n3007")) !!}</td>
          <td>{!! Form::text('ct1waste', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3008', 'v-model'=>"n3008")) !!}</td>
        </tr> --}}
        <tr>
          <td>Text 1</td>
          <td>{!! Form::text('bwt1', $softcoverbw->bwt1, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3009', 'v-model'=>"n3009")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwt1ready', $softcoverbw->bwt1ready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3010', 'v-model'=>"n3010")) !!}</td>
          <td>{!! Form::text('bwt1waste', $softcoverbw->bwt1waste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3011', 'v-model'=>"n3011")) !!}</td>
        </tr>

        {{-- <tr>
          <td>Text 2</td>
          <td>{!! Form::text('ct2', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3012', 'v-model'=>"n3012")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct2ready', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3013', 'v-model'=>"n3013")) !!}</td>
          <td>{!! Form::text('ct2waste', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3014', 'v-model'=>"n3014")) !!}</td>
        </tr> --}}
        <tr>
          <td>Text 2</td>
          <td>{!! Form::text('bwt2', $softcoverbw->bwt2, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3015', 'v-model'=>"n3015")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwt2ready', $softcoverbw->bwt2ready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3016', 'v-model'=>"n3016")) !!}</td>
          <td>{!! Form::text('bwt2waste', $softcoverbw->bwt2waste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3017', 'v-model'=>"n3017")) !!}</td>
        </tr>

        {{-- <tr>
          <td>Text 3</td>
          <td>{!! Form::text('ct3', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3018', 'v-model'=>"n3018")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('ct3ready', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3019', 'v-model'=>"n3019")) !!}</td>
          <td>{!! Form::text('ct3waste', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3020', 'v-model'=>"n3020")) !!}</td>
        </tr> --}}
        <tr>
          <td>Text 3</td>
          <td>{!! Form::text('bwt3', $softcoverbw->bwt3, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3021', 'v-model'=>"n3021")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwt3ready', $softcoverbw->bwt3ready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3022', 'v-model'=>"n3022")) !!}</td>
          <td>{!! Form::text('bwt3waste', $softcoverbw->bwt3waste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3023', 'v-model'=>"n3023")) !!}</td>
        </tr>

        {{-- <tr>
          <td>Stickers</td>
          <td>{!! Form::text('csticker', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3024', 'v-model'=>"n3024")) !!}</td>
          <td>Color Job</td>
          <td>{!! Form::text('cstickerready', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3025', 'v-model'=>"n3025")) !!}</td>
          <td>{!! Form::text('cstickerwaste', $softcoverbw->, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3026', 'v-model'=>"n3026")) !!}</td>
        </tr> --}}
        <tr>
          <td>Stickers</td>
          <td>{!! Form::text('bwsticker', $softcoverbw->bwsticker, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3027', 'v-model'=>"n3027")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwstickerready', $softcoverbw->bwstickerready, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3028', 'v-model'=>"n3028")) !!}</td>
          <td>{!! Form::text('bwstickerwaste', $softcoverbw->bwstickerwaste, array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3029', 'v-model'=>"n3029")) !!}</td>
        </tr>

    </table>
    <table class="table table-bordered">
        {{-- <tr>
          <td colspan="2">(COL) Make ready per color - Front </td>
          <td>{!! Form::number('colMakeFront', $softcoverbw->, array('class' => 'form-control', 'id'=>'n200', 'v-model'=>"n200")) !!}</td>

        </tr>
        <tr>
          <td colspan="2">(COL) Make ready per color - Back </td>
          <td>{!! Form::number('colMakeBack', $softcoverbw->, array('class' => 'form-control', 'id'=>'n201', 'v-model'=>"n201")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(COL) Waste % </td>
          <td>{!! Form::number('colWaste', $softcoverbw->, array('class' => 'form-control', 'step'=>"any", 'id'=>'n202', 'v-model'=>"n202")) !!}</td>
        </tr> --}}
        <tr>
          <td colspan="2">(BLA) Make ready per side</td>
          <td>{!! Form::number('blaMake', $softcoverbw->blaMake, array('class' => 'form-control', 'id'=>'n203', 'v-model'=>"n203")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(BLA) Waste %</td>
          <td>{!! Form::number('blaWaste', $softcoverbw->blaWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n204', 'v-model'=>"n204")) !!}</td>
        </tr>

        <tr>
          <td colspan="2"></td>
          <td>Make Ready</td>
          <td>Waste %</td>
        </tr>
        <tr>
          <td colspan="2">Surface Finishing</td>
          <td>{!! Form::number('surfMake', $softcoverbw->surfMake, array('class' => 'form-control', 'id'=>'n205', 'v-model'=>"n205")) !!}</td>
          <td>{!! Form::number('surfWaste', $softcoverbw->surfWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n206', 'v-model'=>"n206")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Trimming/Cutting</td>
          <td>{!! Form::number('trimMake', $softcoverbw->trimMake, array('class' => 'form-control', 'id'=>'n207', 'v-model'=>"n207")) !!}</td>
          <td>{!! Form::number('trimWaste', $softcoverbw->trimWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n208', 'v-model'=>"n208")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Diecut</td>
          <td>{!! Form::number('dieMake', $softcoverbw->dieMake, array('class' => 'form-control', 'id'=>'n209', 'v-model'=>"n209")) !!}</td>
          <td>{!! Form::number('dieWaste', $softcoverbw->dieWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n210', 'v-model'=>"n210")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Stripping</td>
          <td>{!! Form::number('stripMake', $softcoverbw->stripMake, array('class' => 'form-control', 'id'=>'n211', 'v-model'=>"n211")) !!}</td>
          <td>{!! Form::number('stripWaste', $softcoverbw->stripWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n212', 'v-model'=>"n212")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Folding</td>
          <td>{!! Form::number('foldMake', $softcoverbw->foldMake, array('class' => 'form-control', 'id'=>'n213', 'v-model'=>"n213")) !!}</td>
          <td>{!! Form::number('foldWaste', $softcoverbw->foldWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n214', 'v-model'=>"n214")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Sewing</td>
          <td>{!! Form::number('sewMake', $softcoverbw->sewMake, array('class' => 'form-control', 'id'=>'n215', 'v-model'=>"n215")) !!}</td>
          <td>{!! Form::number('sewWaste', $softcoverbw->sewWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n216', 'v-model'=>"n216")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Binding</td>
          <td>{!! Form::number('bindMake', $softcoverbw->bindMake, array('class' => 'form-control', 'id'=>'n217', 'v-model'=>"n217")) !!}</td>
          <td>{!! Form::number('bindWaste', $softcoverbw->bindWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n218', 'v-model'=>"n218")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">3 Knife Trim</td>
          <td>{!! Form::number('threeMake', $softcoverbw->threeMake, array('class' => 'form-control', 'id'=>'n219', 'v-model'=>"n219")) !!}</td>
          <td>{!! Form::number('threeWaste', $softcoverbw->threeWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n220', 'v-model'=>"n220")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Packing</td>
          <td>{!! Form::number('PackMake', $softcoverbw->PackMake, array('class' => 'form-control', 'id'=>'n221', 'v-model'=>"n221")) !!}</td>
          <td>{!! Form::number('packWaste', $softcoverbw->packWaste, array('class' => 'form-control', 'step'=>"any", 'id'=>'n222', 'v-model'=>"n222")) !!}</td>
        </tr>

    </table>
  </div>
  <div class="form-group row">
  <button type="submit" class="btn btn-success btn-block" >SAVE </button>
  </div>
{!!Form::close()!!}
</div>
{{-- <script>
    var vm = new Vue({
        el:'#app',
        data : {
          n6:0, n9:0, n10:0, n16:0, n17:0, n18:0, n19:0, n20:0
        , n26:0, n27:0, n28:0, n29:0, n30:0, n36:0, n37:0, n38:0, n39:0, n40:0
        , n46:0, n47:0, n48:0, n49:0, n50:0, n56:0, n57:0, n58:0, n59:0, n60:0
        , n66:0, n67:0, n68:0, n69:0, n70:0, n76:0, n77:0, n78:0, n79:0, n80:0
        , n86:0, n87:0, n88:0, n89:0, n90:0, n96:0, n97:0, n98:0, n99:0, n100:0
        ,  n106: 0, n107: 0, n108: 0, n109: 0, n110: 0, n116: 0, n117: 0, n118: 0, n119: 0, n120: 0
        , n126: 0, n127: 0, n128: 0, n129: 0, n130: 0
        , n200: 0, n201: 0, n202: 0, n203: 0, n204: 0, n205: 0, n206: 0, n208 : 0, n207 : 0, n209: 0, n210: 0
        , n211: 0, n212: 0, n213: 0, n214: 0, n215: 0, n216: 0, n217: 0, n218: 0, n219: 0, n220: 0, n221: 0, n222: 0
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
          n8: function() {
            return this.n6;
          },
          //cover BW
              n136: function(){
                var statement = ((parseFloat(this.n203) * parseFloat(this.n36)) + (parseFloat(this.n203) * parseFloat(this.n46)));
                var if1 = 0;
                var if2 = 0;

                if (statement < 60)
                {
                    if2 = 60;
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

                if (statement < 60)
                {
                    if2 = 60;
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

                if (statement < 60)
                {
                    if2 = 60;
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

                if (statement < 60)
                {
                    if2 = 60;
                } else{
                    if2 = statement;
                }
                if( this.n9 == 0)
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

                if (statement < 60)
                {
                    if2 = 60;
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
            return 0;
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
          n3021: function(){
            return (parseFloat(this.n139) + parseFloat(this.n149) + parseFloat(this.n159) + parseFloat(this.n169) + parseFloat(this.n179) + parseFloat(this.n189) + parseFloat(this.n199) + parseFloat(this.n2009) + parseFloat(this.n2019) + parseFloat(this.n2029));
          },
          n3022: function(){
            if (this.n3021 == 0)
            {
              return 0;
            }
            else {
              var na15 = (parseFloat(this.n3021) - parseFloat(this.n139) + parseFloat(this.n9) / parseFloat(this.n19));
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
</script> --}}
@endsection
