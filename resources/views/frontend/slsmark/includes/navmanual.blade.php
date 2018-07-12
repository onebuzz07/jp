<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li class="{!! Request::is('slsmark/newmanualso') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.newmanualso', 'New') !!}</li>
            <li class="{!! Request::is('slsmark/histmanualso') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.histmanualso', 'History') !!}</li>
        </ul>
    </div>
</nav>
