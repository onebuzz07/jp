<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('plan/paf') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.paf')!!}">New</a>
            </li>
            <li class="{!! Request::is('plan/pafconfirm') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.pafconfirm')!!}">History</a>
            </li>

        </ul>
    </div>
</nav>
