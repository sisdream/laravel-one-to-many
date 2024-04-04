<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">Laravel project</a>
      <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
        class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a @class(['nav-link', 'active' => Route::currentRouteName() == 'home']) aria-current="page" href="{{ route('home') }}">Home</a>
          </li>

          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
            @endif
          @else
            <li class="nav-item dropdown">
              <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                href="#" id="navbarDropdown" role="button" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('admin.dashboard') }}"> Dashboard</a>
                <a class="dropdown-item" href="{{ url('profile') }}"> Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}" id="logout-link">
                  Logout
                </a>

                <form action="{{ route('logout') }}" class="d-none" id="logout-form" method="POST">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
      </div>
    </div>
  </nav>
</header>
