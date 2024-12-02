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
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="login-email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="login-email" name="login-email" required>
                            </div>
                            <div class="mb-3">
                                <label for="login-password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="login-password" name="login-password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="neobtn">Login</button>
                            </div>
                        </form>
                        <p class="mt-3 text-center">Don't have an account? <a href="/signup" class="toggle-form">Sign Up here</a></p>
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
