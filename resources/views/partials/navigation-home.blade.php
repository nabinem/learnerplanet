<header>
  <nav class="navbar navbar-expand-lg navigation-wrap">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <i class="navbar-toggler-icon"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#explore-course">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#testomonials">Testimonial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#faq">FAQ</a>
          </li>
          @auth
          @if(auth()->user()->hasRole('admin'))
          <li>
            <a class="white-btn small-btn" href="{{ route('adminDashboard') }}">LOG IN</a>
          </li>
          <li>
            <a class="main-btn" href="{{ route('adminDashboard') }}">SIGN UP</a>
          </li>
          @else
          <li>
            <a class="white-btn small-btn" href="{{ route('dashboard') }}">LOG IN</a>
          </li>
          <li>
            <a class="main-btn" href="{{ route('dashboard') }}">SIGN UP</a>
          </li>
          @endif
          @else
          <li>
            <a class="white-btn small-btn" href="{{ route('login') }}">LOG IN</a>
          </li>
          <li>
            <a class="main-btn" href="{{ route('register') }}">SIGN UP</a>
          </li>
          @endauth



        </ul>
      </div>
    </div>
  </nav>
</header>