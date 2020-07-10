<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="#">
          <i class="fa fa-home rotate-n-15" aria-hidden="true"></i> PLS
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/listings">Listings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/blog">Blog</a>
        </li>


        <li class="nav-item">
        @if (Route::has('login'))
       
            @auth
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
           </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
           </form>
            @else
                <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          @if (Route::has('register'))
          <a class="nav-link" href="{{ route('register') }}">Register</a>
      @endif
  @endauth

@endif
        </li>
               
      </ul>
    </div>
  </div>
</nav>
