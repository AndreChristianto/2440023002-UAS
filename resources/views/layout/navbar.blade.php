<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div>
        <a class="navbar-brand" href="/">Amazing E-Grocery</a>
        <a class="nav-item" href="/home">Home</a>
        <a class="nav-item" href="/cart">Cart</a>
        <a class="nav-item" href="/profile">Profile</a>
        @auth
            <a class="nav-item" href="">Account Maintenance</a>
        @endauth
      </div>
      {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        <div>
            @auth
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            @else
                <a href="/register" class="btn btn-outline-success">Register</a>
                <a href="/login" class="btn btn-outline-success">Login</a>
            @endauth
        </div>
      </div>
    </div>
  </nav>
