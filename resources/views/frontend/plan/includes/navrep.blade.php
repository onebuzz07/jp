<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('plan/repeat') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.repeat')!!}">New</a>
            </li>
            <li class="{!! Request::is('plan/repeatconfirm') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.repeatconfirm')!!}">History</a>
            </li>

        </ul>
    </div>
</nav>
