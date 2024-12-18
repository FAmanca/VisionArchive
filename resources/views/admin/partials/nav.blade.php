<nav class="navbar navbar-expand-lg bg">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center fw-bolder" href="/">
            <img
                src="{{ asset('images/VisionArchive-removebg-preview.png') }}"
                alt="Vision Archive Logo"
                width="50"
                height="50"
                class="d-inline-block align-text-top me-2"
            >
            <span class="ms-2 fs-4">Archive Master</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Dashboar -->
                <li class="nav-item">
                    <a class="nav-link list active"  href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link list" href="{{ route('admin.manageusers') }}">Manage Users</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle list" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Content Management
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/admin/images">Manage Global Albums</a></li>
                        <li><a class="dropdown-item" href="/admin/images">Manage Images</a></li>
                        <li><a class="dropdown-item" href="/admin/comments">Manage Comments</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link list" href="{{ route('admin.report') }}">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link list" href="">Notifications</a>
                </li>

                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link list" href="/profile">
                            <img src="{{ Auth::user()->pfp != null ? asset('storage/' . Auth::user()->pfp) : asset('images/bg.png') }}" alt="" width="50px" height="50px" style="border-radius: 100%">
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
