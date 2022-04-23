<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        CRUD
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item {{ request()->is('/') ? 'border-bottom' : '' }}">
            <a href="{{ route('home') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item {{ request()->is('posts') ? 'border-bottom' : '' }}">
            <a  href="{{ route('posts') }}" class="nav-link {{ request()->is('posts') ? 'active' : '' }}">See posts 👀</a>
          </li>
        </ul>
      </div>
    </div>
    
</nav>