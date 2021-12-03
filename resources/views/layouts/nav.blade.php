<div id="navbar-collapse" class="collapse navbar-collapse">
    <ul class="nav navbar-nav ml-auto align-items-center">

      <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services <i class="fa fa-angle-down"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/register/dental">Dental</a></li>
            <li><a href="/register/prenatal">Prenatal</a></li>
            <li><a href="/register/outreach-programs">Outreach Programs</a></li>
            <li><a href="/register/counseling">Counseling</a></li>
          </ul>
      </li>

      <li class="nav-item"><a href="about.html">FAQ</a></li>

      <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>

      <li class="nav-item"><a href="about.html">About Us</a></li>

        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif

        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" v-pre>
                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/appointment">Appointment <span
                    class="sr-only">(current)</span></a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </ul>
</div>
