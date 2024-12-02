<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}"> <!-- Menghubungkan CSS terpisah -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Main Container for Login and Signup -->
    <section id="auth-section" class="container-fluid my-5">
        <div class="row justify-content-center align-items-center">
            <!-- Kolom Form Login/Sign Up -->
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="card-container">
                    <!-- Form Sign Up -->
                    <div class="cards sign-up-form">
                        <h2 class="mb-4">Create an Account</h2>
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="neobtn">Sign Up</button>
                            </div>
                        </form>
                        <p class="mt-3 text-center">Already have an account? <a href="/signin" class="toggle-form">Login here</a></p>
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
