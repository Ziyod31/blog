<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
           @guest
            <a class="text-muted" href="/admin">Dashboard</a>
            @if (Route::has('register'))
            @endif
            @else
            <a href="/posts/create" class="text-muted">Add Post</a>
            @endguest
        </div>
        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="/">Large</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            @guest
            <a class="btn btn-sm btn-outline-secondary" href="/login">Sign in</a>
            @if (Route::has('register'))
            <a class="btn btn-sm btn-outline-secondary" href="/register">Register</a>
            @endif
            @else
            <a class="nav-link" href="/admin">{{ Auth::user()->name }} <span class="caret"></span></a>
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest
        </div>
    </div>
</header>