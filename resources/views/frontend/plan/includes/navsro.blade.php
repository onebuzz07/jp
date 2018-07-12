<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('plan/sample') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.sample')!!}">New</a>
            </li>
            <li class="{!! Request::is('plan/sroconfirm') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.sroconfirm')!!}">History</a>
            </li>

        </ul>
    </div>
</nav>
