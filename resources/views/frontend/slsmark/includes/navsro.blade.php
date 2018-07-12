<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li class="{!! Request::is('slsmark/showsales') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.showsales', 'New') !!}</li>
            <li class="{!! Request::is('slsmark/showsaleshist') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.showsaleshist', 'History') !!}</li>
        </ul>
    </div>
</nav>
