<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}"> <!-- Menghubungkan CSS terpisah -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Main Container for Login and Signup -->
    <section id="auth-section" class="container-fluid my-5">
        <div class="row justify-content-center align-items-center">
            <!-- Kolom Form Login/Sign Up -->
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="card-container">

                    <!-- Form Login -->
                    <div class="cards login-form">
                        <h2 class="mb-4">Login to Your Account</h2>
                        <form action="{{ route('auth.login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="login-email" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="login-email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="login-password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="login-password" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="neobtn">Login</button>
                            </div>

                            @if (session('error'))
                                <div class="alert alert-danger mt-3">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </form>

                        <p class="mt-3 text-center">Don't have an account? <a href="{{ route('auth.signup') }}"
                                class="toggle-form">Sign Up here</a></p>
                        <div class="d-grid">
                            <hr>
                            <p>Or</p>
                            <a href="{{ route('auth.redirect') }}" style="color: black; text-decoration: none"
                                class="neogbtn">
                                Continue With Google
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Gambar Hero -->
            <div class="col-lg-6 col-md-4 d-none d-md-block">
                <img src="{{ asset('images/footage/1.png') }}" alt="Hero Image" class="img-fluid hero-img">
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
