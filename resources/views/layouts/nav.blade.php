<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
            <span class="sr-only">{!! trans('titles.toggleNav') !!}</span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/')}}" href="{{ url('/') }}">
                        Gefunden
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('sell/')}}" href="{{ url('/sell') }}">
                        Verkauf
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/overwatch/')}}" href="{{ url('/admin/overwatch') }}">
                            Übersicht
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Konfiguration
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item {{ Request::is('admin/users/')}}" href="{{ url('/admin/users') }}">
                                Benutzer
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('admin/groups/')}}" href="{{ url('/admin/groups') }}">
                                Item Gruppen
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('admin/events/')}}" href="{{ url('/admin/events') }}">
                                Item Events
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('admin/items/')}}" href="{{ url('/admin/items') }}">
                                Items
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('admin/claims/')}}" href="{{ url('/admin/claims') }}">
                                Anfragen
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->scout_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
