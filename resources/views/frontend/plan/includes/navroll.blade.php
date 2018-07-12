<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('plan/listbalance') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.listbalance')!!}">New</a>
            </li>
            <li class="{!! Request::is('plan/listhistorybalance') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.listhistorybalance')!!}">History</a>
            </li>

        </ul>
    </div>
</nav>
