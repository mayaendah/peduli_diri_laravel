<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto" method="GET" action="/cari">
      @csrf
      <div class="search-element ml-3">
        <div>
          <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" name="pencarian">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </div>
        
      </div>
    </form>
    <ul class="navbar-nav navbar-right">
      
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ asset('')}}assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">
          @if (!empty(auth()->user()->name))
               {{auth()->user()->name}}
          @else
          user
          @endif
        </div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Logged in 5 min ago</div>
          <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="/logout" class="dropdown-item has-icon text-danger" >
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
          
        </div>
      </li>
    </ul>
  </nav>