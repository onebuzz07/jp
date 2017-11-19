<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('plan/index') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.index')!!}">SCO</a>
            </li>
            <li class="{!! Request::is('plan/paf') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.paf')!!}">PAF</a>
            </li>
            <li class="{!! Request::is('plan/selectpn') ? 'active' : '' !!} dropdown">
                <a href="{!! route('frontend.plan.selectpn')!!}">Planning Master</a>
            </li>
            <li class="{!! Request::is('plan/liststock') ? 'active' : '' !!} dropdown">
                <a href="{!! route('frontend.plan.liststock')!!}">Forecast Stock</a>
            </li>
        </ul>
    </div>
</nav>
