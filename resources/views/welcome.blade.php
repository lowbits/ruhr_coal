<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    </head>
    <body>


      <section class="hero is-dark is-medium">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
          <nav class="navbar">
            <div class="container">
              <div class="navbar-brand">
                <a class="navbar-item" href="/">
                  <img src="{{asset('img/logo_ruhr_coal.png')}}" alt="Bulma: a modern CSS framework based on Flexbox" width="" height="">
                  <span class="title">Ruhr Kohle</span>
                </a>
                <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                  <span></span>
                  <span></span>
                  <span></span>
                </span>
              </div>
              <div id="navbarMenuHeroA" class="navbar-menu">
                <div class="navbar-end">
                  <a class="navbar-item is-active">
                    Home
                  </a>
                  <a class="navbar-item">
                    Examples
                  </a>
                  <a class="navbar-item">
                    Documentation
                  </a>
                  <span class="navbar-item">
                    <a class="button is-dark is-inverted">
                      <span class="icon">
                        <i class="fa fa-sign-in"></i>
                      </span>
                      <span>Login</span>
                    </a>
                  </span>
                </div>
              </div>
            </div>
          </nav>
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
          <div class="container has-text-centered">
            <h1 class="title">
              #NextLevelRuhr
            </h1>
            <h2 class="subtitle">
              der Hackathon für alle
            </h2>
          </div>
        </div>

        <!-- Hero footer: will stick at the bottom -->
        <div class="hero-foot">
          <nav class="tabs">
            <div class="container">
              <ul>
                <li class="is-active"><a>Overview</a></li>
                <li><a>Modifiers</a></li>
                <li><a>Grid</a></li>
                <li><a>Elements</a></li>
                <li><a>Components</a></li>
                <li><a>Layout</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </section>
    </body>
</html>
