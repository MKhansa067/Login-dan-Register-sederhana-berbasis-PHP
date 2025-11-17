<?php
    include "service/database.php";

    session_start();

    if (isset($_SESSION["is_login"])) {
        header("Location: dashboard.php");
    }

    if(isset($_POST["username"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $hash_password = hash('sha256', $password);

        try {
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash_password')";
            if($db->query($sql)){
                echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Registrasi gagal! Silakan coba lagi.'); window.location.href='register.php';</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('User sudah ada, silahkan gunakan username yang lain!'); window.location.href='register.php';</script>";
        }
        $db->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php include "layout/header.php"; ?>
    <h3>Register</h3>
    <i><?$register_message ?></i>
    <form method="POST" action="register.php">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required/><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required/>
        <button type="submit" name="register">Register</button>
    </form>
    <?php include "layout/footer.php"; ?>
</body>
</html>