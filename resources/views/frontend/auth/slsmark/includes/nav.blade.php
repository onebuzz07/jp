<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('slsmark/create') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.create', 'Create New') !!}</li>
            <li class="{!! Request::is('slsmark/updatewid') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.updatewid', 'Update WID') !!}</li>
            <li class="{!! Request::is('slsmark/histmanualso') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.histmanualso', 'Manual Sales Order') !!}</li>
            <li class="{!! Request::is('slsmark/notfinish') ? 'active' : '' !!}">
                <a href="{!! route('frontend.slsmark.notfinish')!!}">SC<span class="sr-only">(current)</span></a>
            </li>

            <li class="{!! Request::is('slsmark/review') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.review', 'PAF') !!}</li>
            <li class="{!! Request::is('slsmark/showsales') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.showsales', 'SRO (Sample)') !!}</li>
            <li class="{!! Request::is('slsmark/addrepeat') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.addrepeat', 'Repeat') !!}</li>
            <li class="{!! Request::is('slsmark/stocklist') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.stocklist', 'Stock Status') !!}</li>
            <li class="{!! Request::is('slsmark/daselect') ? 'active' : '' !!}">{!! link_to_route('frontend.slsmark.daselect', 'Delivery Advice') !!}</li>
        </ul>
    </div>
</nav>
