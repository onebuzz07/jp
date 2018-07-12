<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('slsmark/create') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.create', 'All') !!}</li>
            <li class="{!! Request::is('slsmark/create-history') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.create-history', 'History') !!}</li>
            <li class="{!! Request::is('slsmark/create-new') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.create-new', 'New') !!}</li>
        </ul>
    </div>
</nav>
