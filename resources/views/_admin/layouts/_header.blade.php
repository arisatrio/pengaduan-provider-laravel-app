<header class="main-header" style="background-color: rgb(108 0 167) !important;">

    <!-- Logo -->
    <a href="{{ url('/dashboard') }}" class="logo" style="background-color: rgb(108 0 167) !important;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Media</b>Stores</span>
      {{-- <img class="logo-lg" src="{{ asset('img/kievit.png') }}" alt="logo" style=" max-width: 100%; max-height: 100%;"> --}}
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu text-center">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              {{-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> --}}
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">
                  <i class="fa fa-user"></i> <br>
                  My Profile
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header" style="color: black">

                <p style="color: black">
                  {{ auth()->user()->name }}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{URL('/profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
</header>