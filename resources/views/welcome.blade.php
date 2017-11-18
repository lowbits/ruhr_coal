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
    @include('_includes.nav.main')


  

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
