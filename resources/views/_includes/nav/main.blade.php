<section class="hero is-dark is-medium">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="/">
                        <img src="{{asset('img/logo_ruhr_coal.png')}}" alt="Bulma: a modern CSS framework based on Flexbox" width="" height="">
                        <span class="title">Pottivity</span>
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                  <span></span>
                  <span></span>
                  <span></span>
                </span>
                </div>
                <div id="navbarMenuHeroA" class="navbar-menu">
                    <div class="navbar-end">
                        <a href="/" class="navbar-item is-active">
                            Home
                        </a>

                        @if (Auth::guest())
                            <a class="navbar-item" href="{{route('login')}}" class="nav-item is-tab">Login</a>
                            <a class="navbar-item" href="{{route('register')}}" class="nav-item is-tab">Register</a>
                        @else
                            <span class="navbar-item">
                            <div class="dropdown is-hoverable">
                                <div class="dropdown-trigger">
                                    <button class="button is-dark" aria-haspopup="true" aria-controls="dropdown-menu4">
                                        <span>Hallo {{Auth::user()->name}}</span>
                                        <span class="icon is-small">
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </div>
                                <div class="dropdown-menu" id="dropdown-menu4" role="menu">
                                    <div class="dropdown-content">
                                     <div class="dropdown-item">
                                            <a href="{{route('me')}}">
                                            <span class="icon">
                                                <i class="fa fa-fw fa-user m-r-5"></i>
                                             </span>
                                                Profil
                                            </a>

                                        </div>
                                        <div class="dropdown-item">
                                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                            <span class="icon">
                                                <i class="fa fa-fw fa-sign-out m-r-5"></i>
                                             </span>
                                                Logout
                                            </a>
                                                @include('_includes.forms.logout')

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>