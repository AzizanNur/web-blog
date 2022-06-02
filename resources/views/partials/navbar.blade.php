<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/">Azizan Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link @if(Request::is() === false) active @endif" href="/">Home</a>
          <a class="nav-link {{ Request::is('about') ? 'active' : ''}}" href="/about">About</a>
          <a class="nav-link {{ Request::is('blog') ? 'active' : ''}}" href="/blog">Blog</a>
          <a class="nav-link {{ Request::is('categories') ? 'active' : ''}}" href="/categories">Categories</a>
        </div>

        <div class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome Back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar"></i> My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li> 
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                      <i class="bi bi-box-arrow-left"></i> Logout
                    </button>
                  </form>
                  
                </li>
              </ul>
            </li>
          @else
            <a class="nav-link {{ Request::is('login') ? 'active' : ''}}" href="/login"><i class="bi bi-box-arrow-right"></i> Login</a>
          @endauth
        </div>
      </div>
    </div>
  </nav>