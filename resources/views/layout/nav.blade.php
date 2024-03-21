<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        @auth
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('notification.create') }}">Envio</a>
          </li>
        </ul>
        <span class="navbar-text">
            <a class="nav-link" href="{{ route('login.logout') }}">Logout</a>
        </span>
        @endauth
        @guest
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <span class="navbar-text">
            <a class="nav-link" href="{{ route('login.login') }}">Login</a>
        </span>
        @endguest
      </div>
    </div>
  </nav>
