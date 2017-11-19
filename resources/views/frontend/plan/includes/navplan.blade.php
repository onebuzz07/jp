<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">

          <li class="{!! Request::is('plan/selectpn') ? 'active' : '' !!} dropdown">
              <a href="{!! route('frontend.plan.selectpn')!!}">Create</a>
          </li>
            <li class="{!! Request::is('plan/softcoverview') ? 'active' : '' !!} dropdown">
                <a href="{!! route('frontend.plan.softcoverview')!!}">Soft Cover v1.5</a>
            </li>
            <li class="{!! Request::is('plan/softcoverbwview') ? 'active' : '' !!} dropdown">
                <a href="{!! route('frontend.plan.softcoverbwview')!!}">Soft Cover V1.5(BW)</a>
            </li>
            <li class="{!! Request::is('plan/softcoveroverseasview') ? 'active' : '' !!} dropdown">
                <a href="{!! route('frontend.plan.softcoveroverseasview')!!}">Soft Cover of Overseas (F&B)</a>
            </li>
            <li class="{!! Request::is('plan/softcoveroverseaswtview') ? 'active' : '' !!} dropdown">
                <a href="{!! route('frontend.plan.softcoveroverseaswtview')!!}">Soft Cover of Overseas (W&T)</a>
            </li>
            <li class="{!! Request::is('plan/boxesview') ? 'active' : '' !!} dropdown">
                <a href="{!! route('frontend.plan.boxesview')!!}">Boxes V1.3</a>
            </li>
            <li class="{!! Request::is('plan/planningview') ? 'active' : '' !!} dropdown">
                <a href="{!! route('frontend.plan.planningview')!!}">Planning V1.4</a>
            </li>


        </ul>
    </div>
</nav>
