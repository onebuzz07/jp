<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li class="{!! Request::is('report/index') ? 'active' : '' !!}">
              <a href="{!! route('frontend.report.index')!!}">Search</a>
          </li>
          {{-- <li class="{!! Request::is('report/viewslsmark') ? 'active' : '' !!}">
              <a href="{!! route('frontend.report.viewslsmark')!!}">Sales Marketing</a>
          </li>
          <li class="{!! Request::is('report/viewplanning') ? 'active' : '' !!}">
              <a href="{!! route('frontend.report.viewplanning')!!}">Planning</a>
          </li> --}}
        </ul>
    </div>
</nav>
