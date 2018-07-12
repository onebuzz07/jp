@extends('frontend.layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/planning.css') }}" />
@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
    <h3>Soft Cover BW v1.5</h3><small>(For black and white only)</small>
{!! Form::model($sales, array('route' => array('frontend.plan.softcoverbwStore', $sales->id), 'method' => 'POST')) !!}
<div class="row col-md-12" id="app">
  <div class="col-md-12">
    <table class="table table-bordered" id="users-table">
        <thead>
          <tr>
            <th>{!! Form::number('half', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n1000a', 'v-model'=>'n1000a', 'readonly'=>true)) !!}</th>
          </tr>
          <tr>
            <th>1/2</th>
            <th>B/W</th>
            <th></th>
            <th></th>
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
            <th>Text4</th>
            <th>Text5</th>
            <th>Sticker</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>P. Order Qty</td>
            <td>{!! Form::number('covOrderB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n6', 'v-model'=>"n6")) !!}</td>
            <td>{!! Form::number('t1OrderB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n7', 'v-model'=>"n7")) !!}</td>
            <td>{!! Form::number('t2OrderB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n8', 'v-model'=>"n8")) !!}</td>
            <td>{!! Form::number('t3OrderB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n9', 'v-model'=>"n9")) !!}</td>
            <td>{!! Form::number('t4OrderB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n8e', 'v-model'=>"n8e")) !!}</td>
            <td>{!! Form::number('t5OrderB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n9e', 'v-model'=>"n9e")) !!}</td>
            <td>{!! Form::number('statOrderB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n10', 'v-model'=>"n10")) !!}</td>
          </tr>
          <tr>
            <td>Up(s) per sheet</td>
            <td>{!! Form::number('covUpB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n16', 'v-model'=>"n16")) !!}</td>
            <td>{!! Form::number('t1UpB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n17', 'v-model'=>"n17")) !!}</td>
            <td>{!! Form::number('t2UpB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n18', 'v-model'=>"n18")) !!}</td>
            <td>{!! Form::number('t3UpB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n19', 'v-model'=>"n19")) !!}</td>
            <td>{!! Form::number('t4UpB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n18e', 'v-model'=>"n18e")) !!}</td>
            <td>{!! Form::number('t5UpB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n19e', 'v-model'=>"n19e")) !!}</td>
            <td>{!! Form::number('statUpB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n20', 'v-model'=>"n20")) !!}</td>
          </tr>
          <tr>
            <td>Signature/Spread(s)</td>
            <td>{!! Form::number('covSignB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n26', 'v-model'=>"n26")) !!}</td>
            <td>{!! Form::number('t1signB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n27', 'v-model'=>"n27")) !!}</td>
            <td>{!! Form::number('t2signB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n28', 'v-model'=>"n28")) !!}</td>
            <td>{!! Form::number('t3signB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n29', 'v-model'=>"n29")) !!}</td>
            <td>{!! Form::number('t4signB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n28e', 'v-model'=>"n28e")) !!}</td>
            <td>{!! Form::number('t5signB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n29e', 'v-model'=>"n29e")) !!}</td>
            <td>{!! Form::number('statSignB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n30', 'v-model'=>"n30")) !!}</td>
          </tr>
          <tr>
            <td>Front Color</td>
            <td>{!! Form::number('covFrontB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n36', 'v-model'=>"n36")) !!}</td>
            <td>{!! Form::number('t1FrontB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n37', 'v-model'=>"n37")) !!}</td>
            <td>{!! Form::number('t2FrontB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n38', 'v-model'=>"n38")) !!}</td>
            <td>{!! Form::number('t3FrontB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n39', 'v-model'=>"n39")) !!}</td>
            <td>{!! Form::number('t4FrontB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n38e', 'v-model'=>"n38e")) !!}</td>
            <td>{!! Form::number('t5FrontB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n39e', 'v-model'=>"n39e")) !!}</td>
            <td>{!! Form::number('statFrontB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n40', 'v-model'=>"n40")) !!}</td>
          </tr>
          <tr>
            <td>Back Color</td>
            <td>{!! Form::number('covBackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n46', 'v-model'=>"n46")) !!}</td>
            <td>{!! Form::number('t1BackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n47', 'v-model'=>"n47")) !!}</td>
            <td>{!! Form::number('t2BackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n48', 'v-model'=>"n48")) !!}</td>
            <td>{!! Form::number('t3BackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n49', 'v-model'=>"n49")) !!}</td>
            <td>{!! Form::number('t4BackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n48e', 'v-model'=>"n48e")) !!}</td>
            <td>{!! Form::number('t5BackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n49e', 'v-model'=>"n49e")) !!}</td>
            <td>{!! Form::number('statBackB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n50', 'v-model'=>"n50")) !!}</td>
          </tr>
          <tr><td></td></tr>
          <tr>
            <td>Surface Finishing</td>
            <td>{!! Form::number('covSurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n56', 'v-model'=>"n56")) !!}</td>
            <td>{!! Form::number('t1SurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n57', 'v-model'=>"n57")) !!}</td>
            <td>{!! Form::number('t2SurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n58', 'v-model'=>"n58")) !!}</td>
            <td>{!! Form::number('t3SurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n59', 'v-model'=>"n59")) !!}</td>
            <td>{!! Form::number('t4SurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n58e', 'v-model'=>"n58e")) !!}</td>
            <td>{!! Form::number('t5SurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n59e', 'v-model'=>"n59e")) !!}</td>
            <td>{!! Form::number('statSurfB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n60', 'v-model'=>"n60")) !!}</td>
          </tr>
          <tr>
            <td>Trimming/Cutting</td>
            <td>{!! Form::number('covTrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n66', 'v-model'=>"n66")) !!}</td>
            <td>{!! Form::number('t1TrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n67', 'v-model'=>"n67")) !!}</td>
            <td>{!! Form::number('t2TrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n68', 'v-model'=>"n68")) !!}</td>
            <td>{!! Form::number('t3TrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n69', 'v-model'=>"n69")) !!}</td>
            <td>{!! Form::number('t4TrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n68e', 'v-model'=>"n68e")) !!}</td>
            <td>{!! Form::number('t5TrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n69e', 'v-model'=>"n69e")) !!}</td>
            <td>{!! Form::number('statTrimB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n70', 'v-model'=>"n70")) !!}</td>
          </tr>
          <tr>
            <td>Diecut</td>
            <td>{!! Form::number('covDieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n76', 'v-model'=>"n76")) !!}</td>
            <td>{!! Form::number('t1DieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n77', 'v-model'=>"n77")) !!}</td>
            <td>{!! Form::number('t2DieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n78', 'v-model'=>"n78")) !!}</td>
            <td>{!! Form::number('t3DieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n79', 'v-model'=>"n79")) !!}</td>
            <td>{!! Form::number('t4DieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n78e', 'v-model'=>"n78e")) !!}</td>
            <td>{!! Form::number('t5DieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n79e', 'v-model'=>"n79e")) !!}</td>
            <td>{!! Form::number('statDieB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n80', 'v-model'=>"n80")) !!}</td>
          </tr>
          <tr>
            <td>Stripping</td>
            <td>{!! Form::number('covStripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n86', 'v-model'=>"n86")) !!}</td>
            <td>{!! Form::number('t1StripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n87', 'v-model'=>"n87")) !!}</td>
            <td>{!! Form::number('t2StripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n88', 'v-model'=>"n88")) !!}</td>
            <td>{!! Form::number('t3stripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n89', 'v-model'=>"n89")) !!}</td>
            <td>{!! Form::number('t4StripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n88e', 'v-model'=>"n88e")) !!}</td>
            <td>{!! Form::number('t5stripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n89e', 'v-model'=>"n89e")) !!}</td>
            <td>{!! Form::number('statStripB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n90', 'v-model'=>"n90")) !!}</td>
          </tr>
          <tr>
            <td>Folding</td>
            <td>{!! Form::number('covFoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n96', 'v-model'=>"n96")) !!}</td>
            <td>{!! Form::number('t1FoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n97', 'v-model'=>"n97")) !!}</td>
            <td>{!! Form::number('t2FoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n98', 'v-model'=>"n98")) !!}</td>
            <td>{!! Form::number('t3FoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n99', 'v-model'=>"n99")) !!}</td>
            <td>{!! Form::number('t4FoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n98e', 'v-model'=>"n98e")) !!}</td>
            <td>{!! Form::number('t5FoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n99e', 'v-model'=>"n99e")) !!}</td>
            <td>{!! Form::number('statFoldB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n100', 'v-model'=>"n100")) !!}</td>
          </tr>
          <tr>
            <td>Sewing</td>
            <td>{!! Form::number('covSewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n106', 'v-model'=>"n106")) !!}</td>
            <td>{!! Form::number('t1SewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n107', 'v-model'=>"n107")) !!}</td>
            <td>{!! Form::number('t2SewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n108', 'v-model'=>"n108")) !!}</td>
            <td>{!! Form::number('t3SewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n109', 'v-model'=>"n109")) !!}</td>
            <td>{!! Form::number('t4SewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n108e', 'v-model'=>"n108e")) !!}</td>
            <td>{!! Form::number('t5SewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n109e', 'v-model'=>"n109e")) !!}</td>
            <td>{!! Form::number('statSewB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n110', 'v-model'=>"n110")) !!}</td>
          </tr>
          <tr>
            <td>Binding</td>
            <td>{!! Form::number('covBindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n116', 'v-model'=>"n116")) !!}</td>
            <td>{!! Form::number('t1BindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n117', 'v-model'=>"n117")) !!}</td>
            <td>{!! Form::number('t2BindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n118', 'v-model'=>"n118")) !!}</td>
            <td>{!! Form::number('t3BindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n119', 'v-model'=>"n119")) !!}</td>
            <td>{!! Form::number('t4BindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n118e', 'v-model'=>"n118e")) !!}</td>
            <td>{!! Form::number('t5BindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n119e', 'v-model'=>"n119e")) !!}</td>
            <td>{!! Form::number('statBindB', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n120', 'v-model'=>"n120")) !!}</td>
          </tr>
          <tr>
            <td>3 Knife Trim</td>
            <td>{!! Form::number('cov3B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n126', 'v-model'=>"n126")) !!}</td>
            <td>{!! Form::number('t13B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n127', 'v-model'=>"n127")) !!}</td>
            <td>{!! Form::number('t23B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n128', 'v-model'=>"n128")) !!}</td>
            <td>{!! Form::number('t33B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n129', 'v-model'=>"n129")) !!}</td>
            <td>{!! Form::number('t43B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n128e', 'v-model'=>"n128e")) !!}</td>
            <td>{!! Form::number('t53B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n129e', 'v-model'=>"n129e")) !!}</td>
            <td>{!! Form::number('stat3B', '', array('class' => 'form-control', 'min'=>'0', 'id'=>'n130', 'v-model'=>"n130")) !!}</td>
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
              <th></th>
              <th></th>
            </tr>
            <tr>
              <th></th>
              <th>Cover</th>
              <th>Text1</th>
              <th>Text2</th>
              <th>Text3</th>
              <th>Text4</th>
              <th>Text5</th>
              <th>Sticker</th>

            </tr>
        </thead>
        <tbody>

          <tr>
            <td>Printing</td>
            <td>{!! Form::text('covPrintB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n136', 'v-model'=>"n136")) !!}</td>
            <td>{!! Form::text('t1PrintB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n137', 'v-model'=>"n137")) !!}</td>
            <td>{!! Form::text('t2PrintB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n138', 'v-model'=>"n138")) !!}</td>
            <td>{!! Form::text('t3PrintB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n139', 'v-model'=>"n139")) !!}</td>
            <td>{!! Form::text('t4PrintB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n138e', 'v-model'=>"n138e")) !!}</td>
            <td>{!! Form::text('t5PrintB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n139e', 'v-model'=>"n139e")) !!}</td>
            <td>{!! Form::text('statPrintB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n140', 'v-model'=>"n140")) !!}</td>
          </tr>
          <tr>
            <td>Surface Finishing</td>
            <td>{!! Form::text('covSurfB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n146', 'v-model'=>"n146")) !!}</td>
            <td>{!! Form::text('t1SurfB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n147', 'v-model'=>"n147")) !!}</td>
            <td>{!! Form::text('t2SurfB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n148', 'v-model'=>"n148")) !!}</td>
            <td>{!! Form::text('t3SurfB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n149', 'v-model'=>"n149")) !!}</td>
            <td>{!! Form::text('t4SurfB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n148e', 'v-model'=>"n148e")) !!}</td>
            <td>{!! Form::text('t5SurfB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n149e', 'v-model'=>"n149e")) !!}</td>
            <td>{!! Form::text('statSurfB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n150', 'v-model'=>"n150")) !!}</td>
          </tr>
          <tr>
            <td>Trimming/Cutting</td>
            <td>{!! Form::text('covTrimB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n156', 'v-model'=>"n156")) !!}</td>
            <td>{!! Form::text('t1TrimB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n157', 'v-model'=>"n157")) !!}</td>
            <td>{!! Form::text('t2TrimB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n158', 'v-model'=>"n158")) !!}</td>
            <td>{!! Form::text('t3TrimB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n159', 'v-model'=>"n159")) !!}</td>
            <td>{!! Form::text('t4TrimB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n158e', 'v-model'=>"n158e")) !!}</td>
            <td>{!! Form::text('t5TrimB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n159e', 'v-model'=>"n159e")) !!}</td>
            <td>{!! Form::text('statTrimB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n160', 'v-model'=>"n160")) !!}</td>
          </tr>
          <tr>
            <td>Diecut</td>
            <td>{!! Form::text('covDieB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n166', 'v-model'=>"n166")) !!}</td>
            <td>{!! Form::text('t1DieB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n167', 'v-model'=>"n167")) !!}</td>
            <td>{!! Form::text('t2DieB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n168', 'v-model'=>"n168")) !!}</td>
            <td>{!! Form::text('t3DieB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n169', 'v-model'=>"n169")) !!}</td>
            <td>{!! Form::text('t4DieB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n168e', 'v-model'=>"n168e")) !!}</td>
            <td>{!! Form::text('t5DieB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n169e', 'v-model'=>"n169e")) !!}</td>
            <td>{!! Form::text('statDieB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n170', 'v-model'=>"n170")) !!}</td>
          </tr>
          <tr>
            <td>Stripping</td>
            <td>{!! Form::text('covStripB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n176', 'v-model'=>"n176")) !!}</td>
            <td>{!! Form::text('t1StripB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n177', 'v-model'=>"n177")) !!}</td>
            <td>{!! Form::text('t2StripB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n178', 'v-model'=>"n178")) !!}</td>
            <td>{!! Form::text('t3stripB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n179', 'v-model'=>"n179")) !!}</td>
            <td>{!! Form::text('t4StripB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n178e', 'v-model'=>"n178e")) !!}</td>
            <td>{!! Form::text('t5stripB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n179e', 'v-model'=>"n179e")) !!}</td>
            <td>{!! Form::text('statStripB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n180', 'v-model'=>"n180")) !!}</td>
          </tr>
          <tr>
            <td>Folding</td>
            <td>{!! Form::text('covFoldB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n186', 'v-model'=>"n186")) !!}</td>
            <td>{!! Form::text('t1FoldB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n187', 'v-model'=>"n187")) !!}</td>
            <td>{!! Form::text('t2FoldB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n188', 'v-model'=>"n188")) !!}</td>
            <td>{!! Form::text('t3FoldB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n189', 'v-model'=>"n189")) !!}</td>
            <td>{!! Form::text('t4FoldB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n188e', 'v-model'=>"n188e")) !!}</td>
            <td>{!! Form::text('t5FoldB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n189e', 'v-model'=>"n189e")) !!}</td>
            <td>{!! Form::text('statFoldB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n190', 'v-model'=>"n190")) !!}</td>
          </tr>
          <tr>
            <td>Sewing</td>
            <td>{!! Form::text('covSewB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n196', 'v-model'=>"n196")) !!}</td>
            <td>{!! Form::text('t1SewB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n197', 'v-model'=>"n197")) !!}</td>
            <td>{!! Form::text('t2SewB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n198', 'v-model'=>"n198")) !!}</td>
            <td>{!! Form::text('t3SewB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n199', 'v-model'=>"n199")) !!}</td>
            <td>{!! Form::text('t4SewB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n198e', 'v-model'=>"n198e")) !!}</td>
            <td>{!! Form::text('t5SewB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n199e', 'v-model'=>"n199e")) !!}</td>
            <td>{!! Form::text('statSewB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2000', 'v-model'=>"n2000")) !!}</td>
          </tr>
          <tr>
            <td>Binding</td>
            <td>{!! Form::text('covBindB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2006', 'v-model'=>"n2006")) !!}</td>
            <td>{!! Form::text('t1BindB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2007', 'v-model'=>"n2007")) !!}</td>
            <td>{!! Form::text('t2BindB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2008', 'v-model'=>"n2008")) !!}</td>
            <td>{!! Form::text('t3BindB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2009', 'v-model'=>"n2009")) !!}</td>
            <td>{!! Form::text('t4BindB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2008e', 'v-model'=>"n2008e")) !!}</td>
            <td>{!! Form::text('t5BindB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2009e', 'v-model'=>"n2009e")) !!}</td>
            <td>{!! Form::text('statBindB1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2010', 'v-model'=>"n2010")) !!}</td>
          </tr>
          <tr>
            <td>3 Knife Trim</td>
            <td>{!! Form::text('cov3B1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2016', 'v-model'=>"n2016")) !!}</td>
            <td>{!! Form::text('t13B1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2017', 'v-model'=>"n2017")) !!}</td>
            <td>{!! Form::text('t23B1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2018', 'v-model'=>"n2018")) !!}</td>
            <td>{!! Form::text('t33B1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2019', 'v-model'=>"n2019")) !!}</td>
            <td>{!! Form::text('t43B1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2018e', 'v-model'=>"n2018e")) !!}</td>
            <td>{!! Form::text('t53B1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2019e', 'v-model'=>"n2019e")) !!}</td>
            <td>{!! Form::text('stat3B1', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2020', 'v-model'=>"n2020")) !!}</td>
          </tr><tr>
            <td>Packing</td>
            <td>{!! Form::text('covPackB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2026', 'v-model'=>"n2026")) !!}</td>
            <td>{!! Form::text('t1PackB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2027', 'v-model'=>"n2027")) !!}</td>
            <td>{!! Form::text('t2PackB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2028', 'v-model'=>"n2028")) !!}</td>
            <td>{!! Form::text('t3PackB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2029', 'v-model'=>"n2029")) !!}</td>
            <td>{!! Form::text('t4PackB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2028e', 'v-model'=>"n2028e")) !!}</td>
            <td>{!! Form::text('t5PackB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2029e', 'v-model'=>"n2029e")) !!}</td>
            <td>{!! Form::text('statPackB', '', array('class' => 'form-control', 'readonly'=>true, 'min'=>'0', 'id'=>'n2030', 'v-model'=>"n2030")) !!}</td>
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
        <tr>
          <td>Cover</td>
          <td>{!! Form::text('bwcover', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3003', 'v-model'=>"n3003")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwcoverready', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3004', 'v-model'=>"n3004")) !!}</td>
          <td>{!! Form::text('bwcoverwaste', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3005', 'v-model'=>"n3005")) !!}</td>
        </tr>

        <tr>
          <td>Text 1</td>
          <td>{!! Form::text('bwt1', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3009', 'v-model'=>"n3009")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwt1ready', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3010', 'v-model'=>"n3010")) !!}</td>
          <td>{!! Form::text('bwt1waste', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3011', 'v-model'=>"n3011")) !!}</td>
        </tr>

        <tr>
          <td>Text 2</td>
          <td>{!! Form::text('bwt2', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3015', 'v-model'=>"n3015")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwt2ready', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3016', 'v-model'=>"n3016")) !!}</td>
          <td>{!! Form::text('bwt2waste', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3017', 'v-model'=>"n3017")) !!}</td>
        </tr>
        <tr>
          <td>Text 3</td>
          <td>{!! Form::text('bwt3', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3021', 'v-model'=>"n3021")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwt3ready', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3022', 'v-model'=>"n3022")) !!}</td>
          <td>{!! Form::text('bwt3waste', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3023', 'v-model'=>"n3023")) !!}</td>
        </tr>

        <tr>
          <td>Text 4</td>
          <td>{!! Form::text('bwt4', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3021e', 'v-model'=>"n3021e")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwt4ready', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3022e', 'v-model'=>"n3022e")) !!}</td>
          <td>{!! Form::text('bwt4waste', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3023e', 'v-model'=>"n3023e")) !!}</td>
        </tr>

        <tr>
          <td>Text 5</td>
          <td>{!! Form::text('bwt5', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3021r', 'v-model'=>"n3021r")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwt5ready', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3022r', 'v-model'=>"n3022r")) !!}</td>
          <td>{!! Form::text('bwt5waste', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3023r', 'v-model'=>"n3023r")) !!}</td>
        </tr>

        <tr>
          <td>Stickers</td>
          <td>{!! Form::text('bwsticker', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3027', 'v-model'=>"n3027")) !!}</td>
          <td>B/W Job</td>
          <td>{!! Form::text('bwstickerready', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3028', 'v-model'=>"n3028")) !!}</td>
          <td>{!! Form::text('bwstickerwaste', '', array('class' => 'form-control', 'readonly'=>true, 'id'=>'n3029', 'v-model'=>"n3029")) !!}</td>
        </tr>

    </table>
  </div>
  <div class="col-md-6">
    <table class="table table-bordered">

        <tr>
          <td colspan="2">(BLA) Make ready per side</td>
          <td>{!! Form::number('blaMake', '', array('class' => 'form-control', 'id'=>'n203', 'v-model'=>"n203")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">(BLA) Waste %</td>
          <td>{!! Form::number('blaWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n204', 'v-model'=>"n204")) !!}</td>
        </tr>

        <tr>
          <td colspan="2"></td>
          <td>Make Ready</td>
          <td>Waste %</td>
        </tr>
        <tr>
          <td colspan="2">Surface Finishing</td>
          <td>{!! Form::number('surfMake', '', array('class' => 'form-control', 'id'=>'n205', 'v-model'=>"n205")) !!}</td>
          <td>{!! Form::number('surfWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n206', 'v-model'=>"n206")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Trimming/Cutting</td>
          <td>{!! Form::number('trimMake', '', array('class' => 'form-control', 'id'=>'n207', 'v-model'=>"n207")) !!}</td>
          <td>{!! Form::number('trimWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n208', 'v-model'=>"n208")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Diecut</td>
          <td>{!! Form::number('dieMake', '', array('class' => 'form-control', 'id'=>'n209', 'v-model'=>"n209")) !!}</td>
          <td>{!! Form::number('dieWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n210', 'v-model'=>"n210")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Stripping</td>
          <td>{!! Form::number('stripMake', '', array('class' => 'form-control', 'id'=>'n211', 'v-model'=>"n211")) !!}</td>
          <td>{!! Form::number('stripWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n212', 'v-model'=>"n212")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Folding</td>
          <td>{!! Form::number('foldMake', '', array('class' => 'form-control', 'id'=>'n213', 'v-model'=>"n213")) !!}</td>
          <td>{!! Form::number('foldWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n214', 'v-model'=>"n214")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Sewing</td>
          <td>{!! Form::number('sewMake', '', array('class' => 'form-control', 'id'=>'n215', 'v-model'=>"n215")) !!}</td>
          <td>{!! Form::number('sewWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n216', 'v-model'=>"n216")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Binding</td>
          <td>{!! Form::number('bindMake', '', array('class' => 'form-control', 'id'=>'n217', 'v-model'=>"n217")) !!}</td>
          <td>{!! Form::number('bindWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n218', 'v-model'=>"n218")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">3 Knife Trim</td>
          <td>{!! Form::number('threeMake', '', array('class' => 'form-control', 'id'=>'n219', 'v-model'=>"n219")) !!}</td>
          <td>{!! Form::number('threeWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n220', 'v-model'=>"n220")) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Packing</td>
          <td>{!! Form::number('PackMake', '', array('class' => 'form-control', 'id'=>'n221', 'v-model'=>"n221")) !!}</td>
          <td>{!! Form::number('packWaste', '', array('class' => 'form-control', 'step'=>"any", 'id'=>'n222', 'v-model'=>"n222")) !!}</td>
        </tr>

    </table>
  </div>
  <div class="form-group row">
  <button type="submit" class="btn btn-success btn-block" >SAVE </button>
  </div>
</div>
{!!Form::close()!!}
<script>
    var vm = new Vue({
        el:'#app',
        data : {
          n6:0, n9:0, n10:0, n16:0, n17:0, n18:0, n19:0, n20:0
        , n18e:0, n19e:0, n28e:1, n29e:1, n38e:0, n39e:0
        , n48e:0, n49e:0, n58e:0, n59e:0, n68e:0, n69e:0
        , n78e:0, n79e:0, n88e:0, n89e:0, n98e:0, n99e:0
        , n108e:0, n109e:0, n118e:0, n119e:0, n128e:0, n129e:0
        , n36:0, n37:0, n38:0, n39:0, n40:0
        , n46:0, n47:0, n48:0, n49:0, n50:0, n56:0, n57:0, n58:0, n59:0, n60:0
        , n66:0, n67:0, n68:0, n69:0, n70:0, n76:0, n77:0, n78:0, n79:0, n80:0
        , n86:0, n87:0, n88:0, n89:0, n90:0, n96:0, n97:0, n98:0, n99:0, n100:0
        ,  n106: 0, n107: 0, n108: 0, n109: 0, n110: 0, n116: 0, n117: 0, n118: 0, n119: 0, n120: 0
        , n126: 0, n127: 0, n128: 0, n129: 0, n130: 0

        , n26:1, n27:1, n28:1, n29:1, n30:1, n200: 0, n201: 0, n202: 0,
         n203: 30, n204: 0.75, n205: 20, n206: 0.5, n208 : 5, n207 : 0, n209: 20, n210: 0.5
        , n211: 0, n212: 0.1, n213: 20, n214: 0.5, n215: 20, n216: 0.25, n217: 20, n218: 0.5, n219: 5, n220: 0.5, n221: 0, n222: 0.1
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
          n8e: function() {
            return this.n8;
          },
          n9e: function() {
            return this.n9;
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

              //number4 BW
                  n138e: function(){
                    var statement = ((parseFloat(this.n203) * parseFloat(this.n38e)) + (parseFloat(this.n203) * parseFloat(this.n48e)));
                    var if1 = 0;
                    var if2 = 0;

                    if (statement < 60)
                    {
                        if2 = 60;
                    } else{
                        if2 = statement;
                    }
                    if( this.n8e == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = ((parseFloat(this.n8e) / parseFloat(this.n18e) * (parseFloat(this.n204) / 100) * (parseFloat(this.n38e) + parseFloat(this.n48e)) + parseFloat(if2)) * parseFloat(this.n28e));
                      }
                    return this.f1(if1);
                  },
                  n148e: function(){
                    var n148ea = ((parseFloat(this.n8e) / parseFloat(this.n18e) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n28e) * parseFloat(this.n58e)) ;
                    return this.f1(n148ea);
                  },
                  n158e: function(){
                    var n158ea= ((parseFloat(this.n8e) / parseFloat(this.n18e) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n28e) * parseFloat(this.n68e)) ;
                    return this.f1(n158ea);
                  },
                  n168e: function(){
                      var n168ea = ((parseFloat(this.n8e) /parseFloat (this.n18e) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n28e) * parseFloat(this.n78e));
                      return this.f1(n168ea);
                  },
                  n178e: function(){
                      var n178ea = ((parseFloat(this.n8e) / parseFloat(this.n18e) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n28e) * parseFloat(this.n88e));
                      return this.f1(n178ea);
                  },
                  n188e: function()
                  {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.n8e > 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.n8e > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.n8e < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }

                    if( this.n8e == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = (parseFloat(this.n8e) / parseFloat(this.n18e) * parseFloat(this.n214) / 100 + parseFloat(this.n213) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n28e) * parseFloat(this.n98e);
                    }
                    return this.f1(if1);
                  },
                  n198e: function(){
                    var n198ea = ((parseFloat(this.n8e) / parseFloat(this.n18e) * (parseFloat(this.n216)/ 100) + parseFloat(this.n215))* parseFloat(this.n28e) * parseFloat(this.n108e));
                    return this.f1(n198ea);
                  },
                  n2008e: function()
                  {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.n8e > 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.n8e > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.n8e < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }
                    if( this.n8e == 0)
                    {
                        if1 = 0;
                    } else{
                      if1 = (parseFloat(this.n8e) / parseFloat(this.n18e) * parseFloat(this.n218) / 100 + parseFloat(this.n217) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n28e) * parseFloat(this.n118e);
                    }
                    return this.f1(if1);
                  },
                  n2018e: function(){
                    var n2018ea = ((parseFloat(this.n8e) / parseFloat(this.n18e) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n28e) * parseFloat(this.n128e));
                    return this.f1(n2018ea);
                  },
                  n2028e : function(){
                    var n2028ea = (parseFloat(this.n8e) / parseFloat(this.n18e) * parseFloat(this.n28e) * (parseFloat(this.n222)/ 100));
                    return this.f1(n2028ea);
                  },
              //number5BW
                  n139e: function(){
                    var statement = ((parseFloat(this.n203) * parseFloat(this.n39e)) + (parseFloat(this.n203) * parseFloat(this.n49e)));
                    var if1 = 0;
                    var if2 = 0;

                    if (statement < 60)
                    {
                        if2 = 60;
                    } else{
                        if2 = statement;
                    }
                    if( this.n9e == 0)
                    {
                        if1 = 0;
                    } else{
                        if1 = ((parseFloat(this.n9e) / parseFloat(this.n19e) * (parseFloat(this.n204) / 100) * (parseFloat(this.n39e) + parseFloat(this.n49e)) + parseFloat(if2)) * parseFloat(this.n29e));
                      }
                    return this.f1(if1);
                  },
                  n149e: function(){
                    var n149ea = ((parseFloat(this.n9e) / parseFloat(this.n19e) * (parseFloat(this.n206)/ 100) + parseFloat(this.n205))* parseFloat(this.n29e) * parseFloat(this.n59e));
                    return this.f1(n149ea);
                  },
                  n159e: function(){
                    var n159ea = ((parseFloat(this.n9e) / parseFloat(this.n19e) * (parseFloat(this.n208)/ 100) + parseFloat(this.n207))* parseFloat(this.n29e) * parseFloat(this.n69e));
                    return this.f1(n159ea);
                  },
                  n169e: function(){
                    var n169ea = ((parseFloat(this.n9e) / parseFloat(this.n19e) * (parseFloat(this.n210)/ 100) + parseFloat(this.n209))* parseFloat(this.n29e) * parseFloat(this.n79e));
                    return this.f1(n169ea);
                  },
                  n179e: function(){
                    var n179ea = ((parseFloat(this.n9e) / parseFloat(this.n19e) * (parseFloat(this.n212)/ 100) + parseFloat(this.n211))* parseFloat(this.n29e) * parseFloat(this.n89e));
                    return this.f1(n179ea);
                  },
                  n189e: function()
                  {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.n9e > 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.n9e > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.n9e < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }
                    if( this.n9e == 0)
                    {
                        if1 = 0;
                    } else{
                      if1 = (parseFloat(this.n9e) / parseFloat(this.n19e) * parseFloat(this.n214) / 100 + parseFloat(this.n213) + parseFloat(if2) + parseFloat(if4)) * parseFloat(this.n29e) * parseFloat(this.n99e);
                    }
                    return this.f1(if1);
                  },
                  n199e: function(){
                    var n199a = ((parseFloat(this.n9e) / parseFloat(this.n19e )* (parseFloat(this.n216)/ 100) + parseFloat(this.n215))*parseFloat (this.n29e) * parseFloat(this.n109e));
                    return this.f1(n199a);
                  },
                  n2009e: function()
                  {
                    var if1 = 0;
                    var if2 = 0;
                    var if3 = 0;
                    var if4 = 0;

                    if (this.n9e > 19999)
                    {
                        if4 = 50;
                    } else{
                        if4 = 0;
                    }

                    if ( this.n9e > 9999)
                    {
                        if3 = 75;
                    } else{
                        if3 = 0;
                    }

                    if (this.n9e < 4000)
                    {
                     if2 = 50;
                    } else {
                        if2 = if3;
                    }
                    if( this.n9e == 0)
                    {
                        if1 = 0;
                    } else{
                      if1 = (parseFloat(this.n9e) / parseFloat(this.n19e) * parseFloat(this.n218) / 100 + parseFloat(this.n217) + parseFloat(if2) + parseFloat(if4)) *parseFloat(this.n29e) * parseFloat(this.n119e);
                    }
                    return this.f1(if1);
                  },
                  n2019e: function(){
                    var n2019ea = ((parseFloat(this.n9e) /parseFloat(this.n19e) * (parseFloat(this.n220)/ 100) + parseFloat(this.n219))* parseFloat(this.n29e) * parseFloat(this.n129e));
                    return this.f1(n2019ea);

                  },
                  n2029e : function(){
                    var n2029ea = (parseFloat(this.n9e) / parseFloat(this.n19e) * parseFloat(this.n29e) * (parseFloat(this.n222)/ 100));
                    return this.f1(n2029ea);
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
            var na = (parseFloat(this.n136) + parseFloat(this.n146) + parseFloat(this.n156) + parseFloat(this.n166) + parseFloat(this.n176) + parseFloat(this.n186) + parseFloat(this.n196)+ parseFloat(this.n2006) + parseFloat(this.n2016) + parseFloat(this.n2026));
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
              var na = (parseFloat(this.n3003) - parseFloat(this.n136) + parseFloat(this.n6) / parseFloat(this.n16));
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
          n3009: function(){
            var na =  (parseFloat(this.n137) + parseFloat(this.n147) + parseFloat(this.n157) + parseFloat(this.n167) + parseFloat(this.n177) + parseFloat(this.n187) + parseFloat(this.n197)+ parseFloat(this.n2007) + parseFloat(this.n2017) + parseFloat(this.n2027));
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
              var na = (parseFloat(this.n3009) - parseFloat(this.n137) + parseFloat(this.n7) / parseFloat(this.n17));
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
              var na = (parseFloat(this.n7) / parseFloat(this.n17) + parseFloat(this.n3009));
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
            var na = (parseFloat(this.n138) + parseFloat(this.n148) + parseFloat(this.n158) + parseFloat(this.n168) + parseFloat(this.n178) + parseFloat(this.n188) + parseFloat(this.n198)+ parseFloat(this.n2008) + parseFloat(this.n2018) + parseFloat(this.n2028));
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
              var na = (parseFloat(this.n3015) - parseFloat(this.n138) + parseFloat(this.n8) / parseFloat(this.n18));
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
              var na = (parseFloat(this.n8) / parseFloat(this.n18) + parseFloat(this.n3015));
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
          n3021: function(){
            var na = (parseFloat(this.n139) + parseFloat(this.n149) + parseFloat(this.n159) + parseFloat(this.n169) + parseFloat(this.n179) + parseFloat(this.n189) + parseFloat(this.n199) + parseFloat(this.n2009) + parseFloat(this.n2019) + parseFloat(this.n2029));
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
          n3022: function(){
            if (this.n3021 == 0)
            {
              return 0;
            }
            else {
              var na = (parseFloat(this.n3021) - parseFloat(this.n139) + parseFloat(this.n9) / parseFloat(this.n19));
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
          n3023: function(){
            if (this.n3021 == 0)
            {
              return 0;
            }
            else {
              var na = (parseFloat(this.n9) / parseFloat(this.n19) + parseFloat(this.n3021));
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

          n3021e: function(){
            var na = (parseFloat(this.n138e) + parseFloat(this.n148e) + parseFloat(this.n158e) + parseFloat(this.n168e) + parseFloat(this.n178e) + parseFloat(this.n188e) + parseFloat(this.n198e) + parseFloat(this.n2008e) + parseFloat(this.n2018e) + parseFloat(this.n2028e));
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
          n3022e: function(){
            if (this.n3021e == 0)
            {
              return 0;
            }
            else {
              var na = (parseFloat(this.n3021e) - parseFloat(this.n138e) + parseFloat(this.n8e) / parseFloat(this.n18e));
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
          n3023e: function(){
            if (this.n3021e == 0)
            {
              return 0;
            }
            else {
              var na = (parseFloat(this.n8e) / parseFloat(this.n18e) + parseFloat(this.n3021e));
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

          n3021r: function(){
            var na = (parseFloat(this.n139e) + parseFloat(this.n149e) + parseFloat(this.n159e) + parseFloat(this.n169e) + parseFloat(this.n179e) + parseFloat(this.n189e) + parseFloat(this.n199e) + parseFloat(this.n2009e) + parseFloat(this.n2019e) + parseFloat(this.n2029e));
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
          n3022r: function(){
            if (this.n3021r == 0)
            {
              return 0;
            }
            else {
              var na = (parseFloat(this.n3021r) - parseFloat(this.n139e) + parseFloat(this.n9e) / parseFloat(this.n19e));
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
          n3023r: function(){
            if (this.n3021r == 0)
            {
              return 0;
            }
            else {
              var na = (parseFloat(this.n9e) / parseFloat(this.n19e) + parseFloat(this.n3021r));
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

          n3027: function(){
            var na = (parseFloat(this.n140) + parseFloat(this.n150) + parseFloat(this.n160) + parseFloat(this.n170) + parseFloat(this.n180) + parseFloat(this.n190) + parseFloat(this.n2000) + parseFloat(this.n2010) + parseFloat(this.n2020) + parseFloat(this.n2030));
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
          n3028: function(){
            if (this.n3027 == 0)
            {
              return 0;
            }
            else {
                var na = (parseFloat(this.n3027) - parseFloat(this.n140) + parseFloat(this.n10) / parseFloat(this.n20));
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
          n3029: function(){
            if (this.n3027 == 0)
            {
              return 0;
            }
            else {
              var na = (parseFloat(this.n10) / parseFloat(this.n20) + parseFloat(this.n3027));
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

        }
      });
</script>
@endsection
