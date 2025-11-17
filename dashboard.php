<?php
    session_start();
    if (!isset($_SESSION["is_login"])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
?>

<?php
session_start();

if (isset($_POST["logout"])) {
    session_unset();      // hapus semua data session
    session_destroy();    // hapus session
    header("Location: index.php"); // kembali ke halaman utama
    exit();
}

if (!isset($_SESSION["is_login"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php include "layout/header.php"; ?>
    <h3>Dashboard</h3>
    <p>Selamat datang, <?php echo $_SESSION["username"]; ?>!</p>
    <form action = "dashboard.php" method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
    <?php include "layout/footer.php"; ?>
</body>
</html>