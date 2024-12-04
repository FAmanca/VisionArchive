<nav class="navbar navbar-expand-lg bg">
    <div class="container-fluid">
        <a class="navbar-brand p-3 fw-bolder" href="/">
            <h3>Vision Archive</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link list" href="/home">Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link list" href="#">Contact</a>
                </li>

                {{-- Check if the user is logged in --}}
                @if (Auth::check())
                    {{-- If logged in, show logout and post image --}}
                    <li class="nav-item">
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link list btn btn-link">Logout</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link list" href="{{ route('image.create') }}">
                            <button class="neobtn">Post an Image</button>
                        </a>
                    </li>
                @else
                    {{-- If not logged in, show login and signup buttons --}}
                    <li class="nav-item">
                        <a class="nav-link list" href="{{ route('auth.signin') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link list" href="{{ route('auth.signup') }}">
                            <button class="neobtn">Sign Up For Free</button>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
