@extends('frontend.layouts.app')

@section('content')
    <h1>Production</h1>

    @include('frontend.production.includes.nav')

    <div class="col-md-10 ">
      <div class="row">
              <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 5px 0;
              padding:2px; background:lavender; display:table-cell">
              <a href="{{route('frontend.production.diecut')}}" >
                  {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                  <center>
                     <h2>Die-cut</h2>
                  </center>
              </a>
              </div>
              <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 5px 0;
              padding:2px; background:lavender; display:table-cell">
                  <a href="{{route('frontend.production.print')}}" >
                      {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                      <center>
                         <h2>Printing</h2>
                      </center>
                  </a>
              </div>
              <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 5px 0;
              padding:2px; background:lavender; display:table-cell">
                  <a href="{{route('frontend.production.surfacefinishing')}}" >
                      {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                      <center>
                         <h2>Surface <br>Finishing</h2>
                      </center>
                  </a>
              </div>
              <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 5px 0;
              padding:2px; background:lavender; display:table-cell">
              <a href="{{route('frontend.production.stripping')}}" >
                  {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                  <center>
                     <h2>Stripping</h2>
                  </center>
              </a>
              </div>
              <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 5px 0;
              padding:2px; background:lavender; display:table-cell">
                  <a href="{{route('frontend.production.packing')}}" >
                      {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                      <center>
                         <h2>Packing</h2>
                      </center>
                  </a>
              </div>
        </div>
        <div class="row">
          <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 5px 0;
          padding:2px; background:lavender; display:table-cell">
                    <a href="{{route('frontend.production.folding')}}" >
                        {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                        <center>
                           <h2>Folding</h2>
                        </center>
                    </a>
                </div>
                <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 5px 0;
                padding:2px; background:lavender; display:table-cell">
                    <a href="{{route('frontend.production.sewing')}}" >
                        {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                        <center>
                           <h2>Sewing</h2>
                        </center>
                    </a>
                </div>
                <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 5px 0;
                padding:2px; background:lavender; display:table-cell">
                <a href="{{route('frontend.production.binding')}}" >
                    {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                    <center>
                       <h2>Binding</h2>
                    </center>
                </a>
                </div>
                <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 5px 0;
                padding:2px; background:lavender; display:table-cell">
                    <a href="{{route('frontend.production.threeknifetrim')}}" >
                        {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                        <center>
                           <h2>3 Knife <br>Trim</h2>
                        </center>
                    </a>
                </div>
                <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 5px 0;
                padding:2px; background:lavender; display:table-cell">
                    <a href="{{route('frontend.production.trim')}}" >
                        {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                        <center>
                           <h2>Trimming<br>/Cutting</h2>
                        </center>
                    </a>
                </div>
          </div>


@endsection
