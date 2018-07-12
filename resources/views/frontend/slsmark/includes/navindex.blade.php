<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li class="{!! Request::is('slsmark/notfinish') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.notfinish', 'Not finish') !!}</li>
          <li class="{!! Request::is('slsmark/index') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.index', 'Finish') !!}</li>
        </ul>
    </div>
</nav>
