<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('plan/newmanualso') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.newmanualso')!!}">New</a>
            </li>
            <li class="{!! Request::is('plan/histmanualso') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.histmanualso')!!}">History</a>
            </li>

        </ul>
    </div>
</nav>
