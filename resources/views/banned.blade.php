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
            <h4 class="alert-heading">Akun Anda Dibanned!</h4>
            <p>Maaf, akun Anda telah dibanned dan tidak dapat mengakses sistem hingga {{ $user->banned->BannedUntil }}.</p>
            <i>Alasan Banned : {{ $user->banned->BanReason }}</i>
            <hr>
            <p class="mb-0">Silakan hubungi administrator jika Anda merasa ini adalah kesalahan.</p>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js for Bootstrap functionality -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
