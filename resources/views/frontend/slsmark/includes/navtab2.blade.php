<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li class="{!! Request::is('slsmark/create') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.create', 'New') !!}</li>
            <li class="{!! Request::is('slsmark/createhist') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.createhist', 'History') !!}</li>
            <li class="{!! Request::is('slsmark/history') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.history', 'Irrelevant') !!}</li>
        </ul>
    </div>
</nav>
