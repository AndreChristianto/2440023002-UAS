<nav class="navbar navbar-expand-lg navbar-dark navbar-background">
    <div class="container-fluid" style="height: 4vw">
        <div>
            <a class="navbar-brand" href="/">Amazing E-Grocery</a>
            <a class="nav-item" href="/home">@lang('public.Home')</a>
            <a class="nav-item" href="/cart">@lang('public.Cart')</a>
            <a class="nav-item" href="/profile">@lang('public.Profile')</a>
            @auth
                @if (Auth::user()->role_id == 2)
                    <a class="nav-item" href="/view-account-maintenance">@lang('public.Account Maintenance')</a>
                @endif
            @endauth
        </div>
        <div class="d-flex">
            <div class="d-flex align-items-center">
                <a href="locale/en" class="nav-item" style="margin-right: 0.25vw">en</a>
                <a href="locale/id" class="nav-item" style="margin-left: 0.25vw; margin-right: 0.5vw">id</a>
            </div>
            @auth
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">@lang('public.Logout')</button>
                </form>
            @else
                <a href="/register" class="btn btn-success register-login" style="margin-left:1vw">@lang('public.Register')</a>
                <a href="/login" class="btn btn-success register-login" style="margin-left:1vw">@lang('public.Login')</a>
            @endauth
        </div>
      </div>
    </div>
  </nav>
