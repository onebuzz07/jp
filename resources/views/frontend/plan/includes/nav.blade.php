<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li class="{!! Request::is('plan/newmanualso') ? 'active' : '' !!} dropdown">
              <a href="{!! route('frontend.plan.newmanualso')!!}">Manual SO</a>
          </li>
            <li class="{!! Request::is('plan/index') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.index')!!}">SC</a>
            </li>
            <li class="{!! Request::is('plan/paf') ? 'active' : '' !!}">
                <a href="{!! route('frontend.plan.paf')!!}">PAF</a>
            </li>
            <li class="{!! Request::is('plan/sample') ? 'active' : '' !!} dropdown">
              <a href="{!! route('frontend.plan.sample')!!}">SRO (Sample)</a>
            </li>
            <li class="{!! Request::is('plan/repeat') ? 'active' : '' !!} dropdown">
              <a href="{!! route('frontend.plan.repeat')!!}">Repeat</a>
            </li>
            <li class="{!! Request::is('plan/selectpn') ? 'active' : '' !!} dropdown">
                <a href="{!! route('frontend.plan.selectpn')!!}">Planning Master</a>
            </li>
            <li class="{!! Request::is('plan/listsales') ? 'active' : '' !!} dropdown">
                <a href="{!! route('frontend.plan.listsales')!!}">Routing</a>
            </li>
            <li class="{!! Request::is('plan/listbalance') ? 'active' : '' !!} dropdown">
                <a href="{!! route('frontend.plan.listbalance')!!}">Roll Inventory</a>
            </li>
        </ul>
    </div>
</nav>
