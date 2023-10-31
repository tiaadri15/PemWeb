<?php
session_start();
require"../include/db_connect.php";

if (isset($_POST['masuk'])){
    $name = $_POST['username'];
    $pass = $_POST['password'];

    
    $result  = mysqli_query($conn, "SELECT * FROM user WHERE username = '$name'");

    if (mysqli_num_rows($result) === 1){
        $row  = mysqli_fetch_assoc($result);

        if (password_verify($pass, $row['password'])) {
            $_SESSION['login'] = true;

            header("Location: dashboard.php");
            exit;
        }
    }

    $error = true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Universitas Mulawarman</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="form">
        <img src="../assets/rektorat.jpg" alt="">
        <div class="form-container">
            <h1>Masuk</h1><hr>
            <?php 
                if (isset($error)) {
                    echo "<p style='color: red;'>Username atau password salah!</p>";
                }
            
            ?>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" class="textfield" required>
                <input type="password" name="password" placeholder="Password" class="textfield" required>
                <div class="remember">
                    <input type="checkbox" name="remember" value="true">
                    <label for="remember">Ingat username ini</label>
                </div>
                <input type="submit" name="masuk" value="Masuk" class="login-btn">
            </form>
        </div>
    </div>
</body>
</html>