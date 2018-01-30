<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            {{-- {{ link_to_route('frontend.index','', [], ['class' => 'navbar-brand']) }} --}}
            <img src="{{URL::asset('/img/frontend/logo.gif')}}"  alt="profile Pic" height="47" width="120" align="centre">
            {{-- <p style="font-size:1% ; padding:none;">Powered by Vissol</p> --}}
        </div><!--navbar-header-->

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">
          <ul class="nav navbar-nav">
              <li>{{ link_to_route('frontend.index', trans('navs.general.home')) }}</li>

          </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (! $logged_in_user)
                    <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login'), [], ['class' => active_class(Active::checkRoute('frontend.auth.login')) ]) }}</li>

                @else
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Welcome, {{ access()->user()->name }} <span class="caret"></span>
                      </a>
                  <ul class="dropdown-menu" role="menu">
                    {{-- <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      Welcome, {{ $logged_in_user->name }}
                  </a></li> --}}
                    @permission('view-backend')
                      <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                      @endauth
                      <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => active_class(Active::checkRoute('frontend.user.account')) ]) }}</li>
                      <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                        </ul>

                      </li>
                @endif
            </ul>
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>
