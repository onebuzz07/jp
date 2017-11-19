<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('printing/index') ? 'active' : '' !!}">
                <a href="{!! route('frontend.printing.index')!!}">SCO</a>
            </li>
        </ul>
    </div>
</nav>
