<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('slsmark/create') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.create', 'Create New') !!}</li>
            <li class="{!! Request::is('slsmark/index') ? 'active' : '' !!}">
                <a href="{!! route('frontend.slsmark.index')!!}">Approved SCO <span class="sr-only">(current)</span></a>
            </li>

            <li class="{!! Request::is('slsmark/review') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.review', 'PAF') !!}</li>
            <li class="{!! Request::is('slsmark/listStock') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.listStock', 'Forecast Stock') !!}</li>
            <li class="{!! Request::is('slsmark/showsales') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.showsales', 'Sample Requisition Order') !!}</li>
            <li class="{!! Request::is('slsmark/da') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.da', 'Delivery Advice') !!}</li>
        </ul>
    </div>
</nav>
