<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('production/index') ? 'active' : '' !!}">
                <a href="{!! route('frontend.production.index')!!}">STATION</a>
            </li>
        </ul>
    </div>
</nav>
