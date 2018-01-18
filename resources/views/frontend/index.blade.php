@extends('frontend.layouts.app')

@section('content')
<div class="row">
  <div class="col-md-2 ">
    <img src="{{URL::asset('/img/vissol.jpeg')}}" alt="Vissol" height="61" width="150" align="centre">
    {{-- <br><p style="font-size:6%">Powered by Vissol</p> --}}
  </div>
        <div class="col-md-10 ">
            <div class="panel panel-default">
              <div class="panel-heading">
                  <i class="fa fa-home"></i> {{ trans('navs.general.home') }}
              </div>
                <div class="panel-body">
                    {{ trans('strings.frontend.welcome_to', ['place' => app_name()]) }}
                </div>
            </div><!-- panel -->
        </div><!-- col-md-10 -->

          <div class="col-md-10 col-md-offset-4">
            <div class="row">
                    <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 5px 0;
                    padding:2px; background:lavender; display:table-cell">
                    <a href="{{route('frontend.slsmark.index')}}" >
                        {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                        <center>
                           <h2>Sales </br>Marketing</h2>
                        </center>
                    </a>
                    </div>
                    <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 0 0;
                    padding:2px; background:lavender; display:table-cell">
                        <a href="{{route('frontend.plan.index')}}" >
                            {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                            <center>
                               <h2>Planning</h2>
                            </center>
                        </a>
                    </div>
                    <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 0 0;
                    padding:2px; background:lavender; display:table-cell">
                        <a href="{{route('frontend.ctp.index')}}" >
                            {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                            <center>
                               <h2>CTP</h2>
                            </center>
                        </a>
                    </div>
              </div>
              <div class="row">
                <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 0 0;
                padding:2px; background:lavender; display:table-cell">
                    <a href="{{route('frontend.printing.index')}}" >
                        {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                        <center>
                           <h2>Printing</h2>
                        </center>
                    </a>
                </div>
                <div class="row">
                  <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 0 0;
                  padding:2px; background:lavender; display:table-cell">
                      {{-- <a href="{{route('frontend.production.index')}}" > --}}
                          {{--<i class="glyphicon glyphicon-transfer fa-5x"></i><br/>--}}
                          <center>
                             {{-- <h2>Production</h2> --}}
                             <h2></h2>
                          </center>
                      </a>
                  </div>
                  <div class="tile center-block" style="height:150px; width:150px; float:left; margin:0 5px 0 0;
                  padding:2px; background:lavender; display:table-cell">
                      {{-- <a href="{{route('fr ontend.report.index')}}" > --}}
                          <center>
                             {{-- <h2>Report</h2> --}}
                             <h2></h2>
                          </center>
                      </a>
                  </div>
              </div>


          </div>
</div>
@endsection
