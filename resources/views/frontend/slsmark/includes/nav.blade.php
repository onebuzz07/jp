<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('slsmark/create') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.create', 'Create New') !!}</li>
            <li class="{!! Request::is('slsmark/index') ? 'active' : '' !!}">
                <a href="{!! route('frontend.slsmark.index')!!}">Status <span class="sr-only">(current)</span></a>
            </li>

            <li class="{!! Request::is('slsmark/review') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.review', 'List form') !!}</li>
            <li class="{!! Request::is('slsmark/listStock') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.listStock', 'Forecast Stock') !!}</li>
            <li class="{!! Request::is('slsmark/showsales') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.showsales', 'Sample Requisition Order') !!}</li>
            {{-- <li class="{!! Request::is('slsmark/repeat') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.repeat', 'List of repeat sales confirmation order') !!}</li> --}}
        </ul>
    </div>
</nav>
