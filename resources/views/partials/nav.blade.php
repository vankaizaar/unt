<nav class="navbar navbar-default navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">               
                <img src="@php echo $theme_logo @endphp" alt=" {{ config('app.name', 'Laravel') }}"/>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse @php 
             
             if (isset($fixedBG))
             {
                 echo $fixedBG;
             } 
             
             @endphp">
            <ul class="nav navbar-nav">
                <li class="{{ Route::currentRouteNamed('about') ? 'active' : '' }}">
                    <a href="{{ route('about') }}">About</a>
                </li>
                <li class="{{ Route::currentRouteNamed('how') ? 'active' : '' }}">
                    <a href="{{ route('how') }}">How the Academy works</a>
                </li>
                <li class="{{ Route::currentRouteNamed('partners') ? 'active' : '' }}">
                    <a href="{{ route('partners') }}">Partners</a>
                </li>
                <li class="{{ Route::currentRouteNamed('faqs') ? 'active' : '' }}">
                    <a href="{{ route('faqs') }}">FAQs</a>
                </li>
                <li class="{{ Route::currentRouteNamed('judges') ? 'active' : '' }}">
                    <a href="{{ route('judges') }}">Judges</a>
                </li>
                <li class="{{ Route::currentRouteNamed('media') ? 'active' : '' }}">
                    <a href="{{ route('media') }}">Media</a>
                </li>
                <li class="{{ Route::currentRouteNamed('contact') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}">Contact us</a>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                <li class="{{ Route::currentRouteNamed('register') ? 'active' : '' }}">
                    <a href="{{ route('register') }}">Apply Now</a>
                </li>
                <li class="{{ Route::currentRouteNamed('login') ? 'active' : '' }}">
                    <a href="{{ route('login') }}">Login</a>
                </li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                        @if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1)
                        <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}" class="user-avatar-nav"> @else
                        <div class="user-avatar-nav"></div>
                        @endif

                        <b>{{ Auth::user()->name }}</b>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li {{ Request::is( 'profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'class=active' : null }}> {!! HTML::link(url('/profile/'.Auth::user()->name),
                            trans('titles.profile')) !!}
                    </li>
                    <li {{ Request::is( 'audio') ? 'class=active' : null }}>
                        {!! HTML::link(url('/audio'), trans('titles.audio')) !!}
                </li>

                <li><a href="/messages">Messages @include('messenger.unread-count')</a></li>                
                @role('admin')
                <li><a href="/messages/create">Create New Message</a></li>
                <li {{ Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'class=active' : null }}>{!! HTML::link(url('/users'), Lang::get('titles.adminUserList')) !!}</li>
                <li {{ Request::is('users/create') ? 'class=active' : null }}>{!! HTML::link(url('/users/create'), Lang::get('titles.adminNewUser')) !!}</li>                
                <!--                <li {{ Request::is('logs') ? 'class=active' : null }}>{!! HTML::link(url('/logs'), Lang::get('titles.adminLogs')) !!}</li>-->
                <!--                <li {{ Request::is('phpinfo') ? 'class=active' : null }}>{!! HTML::link(url('/phpinfo'), Lang::get('titles.adminPHP')) !!}</li>-->
                <!--                <li {{ Request::is('routes') ? 'class=active' : null }}>{!! HTML::link(url('/routes'), Lang::get('titles.adminRoutes')) !!}</li>-->
                <!--                <li {{ Request::is('active-users') ? 'class=active' : null }}>{!! HTML::link(url('/active-users'), Lang::get('titles.activeUsers')) !!}</li>-->
                @endrole
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {!! trans('titles.logout') !!}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
        @endguest
    </ul>
</div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</nav>
