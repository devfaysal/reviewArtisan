<nav class="navbar has-shadow is-fixed-top" >
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
                            <a href="{{route('manage.dashboard')}}" class="navbar-item">
                              <span class="icon">
                                <i class="fa fa-fw fa-cog m-r-5"></i>
                              </span>Manage
                            </a>
                            <hr class="navbar-divider">
                            <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="navbar-item">
                              <span class="icon">
                                <i class="fa fa-fw fa-sign-out m-r-5"></i>
                              </span>
                              Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @endguest
              </div>
        </div>
    </div>
</nav>
