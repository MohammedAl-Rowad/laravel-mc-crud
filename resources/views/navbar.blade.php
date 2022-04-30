<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        CRUD
      </a>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item {{ request()->is('/') ? 'border-bottom' : '' }}">
            <a href="{{ route('home') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item {{ request()->is('posts') ? 'border-bottom' : '' }}">
            <a  href="{{ route('posts') }}" class="nav-link {{ request()->is('posts') ? 'active' : '' }}">See posts 👀</a>
          </li>
        </ul>
        <a href="{{ route('see-cart-products') }}" class="btn btn-outline-dark bg-white text-black" type="submit">
          🛒 ({{ Cookie::get('PRODUCT_COOKIE') }})
          @if(Cookie::get('PRODUCT_COOKIE'))
            🛒 ({{ count(explode(',', Cookie::get('PRODUCT_COOKIE')))  }}) 
          @else 
            🛒 (0)
          @endif
           
        </a>
      </div>
    </div>
    
</nav>