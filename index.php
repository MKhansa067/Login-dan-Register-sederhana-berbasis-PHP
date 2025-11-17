<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "layout/header.php"; ?>
    <main>
        <h1>Selamat Datang di Halaman Utama</h1>
        <p>Ini adalah halaman utama dari aplikasi login dan registrasi sederhana.</p>
        <p>Sudah punya akun?</p>
        <button onclick="window.location.href='login.php'">Login</button>
        <p>Belum punya akun?</p>
        <button onclick="window.location.href='register.php'">Register</button>
    </main>
    <?php include "layout/footer.php"; ?>
</body>
</html>