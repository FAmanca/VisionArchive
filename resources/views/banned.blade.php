<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Dibanned</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="alert alert-danger text-center" role="alert">
            <h4 class="alert-heading">Your Account is Banned!</h4>
            <p>Sorry, your account has been banned and cannot access the system until {{ $user->banned->BannedUntil }}.
            </p>
            <i>Reason for Ban: {{ $user->banned->BanReason }}</i>
            <hr>
            <p class="mb-0">Please contact the administrator if you believe this is a mistake.</p>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js for Bootstrap functionality -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
