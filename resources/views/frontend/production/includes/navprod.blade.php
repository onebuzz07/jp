<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{!! Request::is('production/print') ? 'active' : '' !!}">
                <a href="{!! route('frontend.production.print')!!}">Printing</a>
            </li>
            <li class="{!! Request::is('production/surfacefinishing') ? 'active' : '' !!}">
                <a href="{!! route('frontend.production.surfacefinishing')!!}">Surface Finishing</a>
            </li>
            <li class="{!! Request::is('production/trim') ? 'active' : '' !!}">
                <a href="{!! route('frontend.production.trim')!!}">Trimming/Cutting</a>
            </li>
            <li class="{!! Request::is('production/diecut') ? 'active' : '' !!}">
                <a href="{!! route('frontend.production.diecut')!!}">Die-cut</a>
            </li>
            <li class="{!! Request::is('production/stripping') ? 'active' : '' !!}">
                <a href="{!! route('frontend.production.stripping')!!}">Stripping</a>
            </li>
            <li class="{!! Request::is('production/folding') ? 'active' : '' !!}">
                <a href="{!! route('frontend.production.folding')!!}">Folding</a>
            </li>
            <li class="{!! Request::is('production/sewing') ? 'active' : '' !!}">
                <a href="{!! route('frontend.production.sewing')!!}">Sewing</a>
            </li>
            <li class="{!! Request::is('production/binding') ? 'active' : '' !!}">
                <a href="{!! route('frontend.production.binding')!!}">Binding</a>
            </li>
            <li class="{!! Request::is('production/threeknifetrim') ? 'active' : '' !!}">
                <a href="{!! route('frontend.production.threeknifetrim')!!}">3 Knife Trim</a>
            </li>
            <li class="{!! Request::is('production/packing') ? 'active' : '' !!}">
                <a href="{!! route('frontend.production.packing')!!}">Packing</a>
            </li>
        </ul>
    </div>
</nav>
