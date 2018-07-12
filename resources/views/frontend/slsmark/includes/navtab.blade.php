<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li class="{!! Request::is('slsmark/notfinish') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.notfinish', 'Not done') !!}</li>
          <li class="{!! Request::is('slsmark/index') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.index', 'History') !!}</li>
            {{-- <li class="{!! Request::is('slsmark/historysc') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.historysc', 'History') !!}</li> --}}
            {{-- <li class="{!! Request::is('slsmark/newsc') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.newsc', 'All') !!}</li> --}}
        </ul>
    </div>
</nav>
