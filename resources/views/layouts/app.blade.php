<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ReviewArtisan</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar has-shadow" >
            <div class="container">
                <div class="navbar-brand">
                  <a class="navbar-item is-paddingless" href="{{route('home')}}">
                    <img style="width:100px;" src="{{asset('images/logo.png')}}" alt="Review Artisan Logo">
                  </a>
                  <button class="button navbar-burger">
                   <span></span>
                   <span></span>
                   <span></span>
                 </button>
                </div>
                <div class="navbar-menu">
                    <div class="navbar-start">
                          <!-- navbar items -->
                          <a href="#" class="navbar-item is-tab is-hidden-mobile m-l-10">Learn</a>
                          <a href="#" class="navbar-item is-tab is-hidden-mobile">Discuss</a>
                          <a href="#" class="navbar-item is-tab is-hidden-mobile">Share</a>
                    </div>

                      <div class="navbar-end">
                        <!-- navbar items -->
                        @guest
                            <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
                            <a href="{{route('register')}}" class="navbar-item is-tab">Signup</a>
                        @else
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">Dropdown</a>
                                <div class="navbar-dropdown is-right" >
                                    <a href="#" class="navbar-item">
                                      <span class="icon">
                                        <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                                      </span>Profile
                                    </a>
                                    <a href="#" class="navbar-item">
                                      <span class="icon">
                                        <i class="fa fa-fw fa-bell m-r-5"></i>
                                      </span>Notifications
                                    </a>
                                    <a href="" class="navbar-item">
                                      <span class="icon">
                                        <i class="fa fa-fw fa-cog m-r-5"></i>
                                      </span>Manage
                                    </a>
                                    <hr class="navbar-divider">
                                    <a href="" class="navbar-item">
                                      <span class="icon">
                                        <i class="fa fa-fw fa-sign-out m-r-5"></i>
                                      </span>
                                      Logout
                                    </a>
                                </div>
                            </div>
                        @endguest
                      </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
