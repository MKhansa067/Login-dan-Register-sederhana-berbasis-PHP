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

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$hash_password'";
        $result = $db->query($sql);

        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $_SESSION["is_login"] = true;
            $_SESSION["username"] = $data ["username"];
            header("Location: dashboard.php");
        } else {
            echo "<script>alert('Login gagal! Periksa username dan password Anda.'); window.location.href='index.php';</script>";
        }
        $db->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php include "layout/header.php"; ?>
    <h3>Login</h3>
    <form method="POST" action="login.php">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required/><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required/>
        <button type="submit" name="login">Login</button>
    </form>
    <?php include "layout/footer.php"; ?>
</body>
</html>