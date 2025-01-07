<nav class="navbar navbar-expand-lg bg">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center p-3 fw-bolder" href="/">
            <img src="{{ asset('images/VisionArchive-removebg-preview.png') }}" alt="Vision Archive Logo" width="50"
                height="50" class="d-inline-block align-text-top me-2">
            <span class="ms-2 fs-4">Vision Archive</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link list" href="/admin">Admin</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link list" href="/home">Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link list" href="/contact">Contact</a>
                </li>

                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link list" href="{{ route('image.create') }}">
                            <button class="neobtn">Post an Image</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link list" href="/profile">
                            <img src="{{ Auth::user()->pfp != null ? asset('storage/' . Auth::user()->pfp) : asset('images/bg.png') }}"
                                alt="" width="50px" height="50px" style="border-radius: 100%">
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
