<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('plan/index') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.index')!!}">New</a>
            </li>
            <li class="{!! Request::is('plan/oldjob') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.oldjob')!!}">History</a>
            </li>

        </ul>
    </div>
</nav>
