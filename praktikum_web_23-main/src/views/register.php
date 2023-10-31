<?php
require'../include/db_connect.php';

if(isset($_POST['daftar'])){
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    if ($pass === $cpass){
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $result = mysqli_query($conn, "SELECT username from user WHERE username = '$name'");

        if (mysqli_fetch_assoc($result)) {
            echo "
            <script>
                alert('Username sudah ada!');
                document.location.href = 'register.php';
            </script>";
        } else{
            $result = mysqli_query($conn, "INSERT INTO user VALUES ('', '$name', '$pass')");

            if (mysqli_affected_rows($conn) > 0) {
                echo "
                <script>
                    alert('Registrasi Berhasil!');
                    document.location.href = 'login.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Registrasi Gagal!');
                    document.location.href = 'register.php';
                </script>";
            }
        }
    } else {
        echo "
            <script>
                alert('Password tidak sama!');
                document.location.href = 'register.php';
            </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Universitas Mulawarman</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="form">
        <img src="../assets/rektorat.jpg" alt="">
        <div class="form-container">
            <h1>Daftar</h1><hr>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" class="textfield" required>
                <input type="password" name="password" placeholder="Password" class="textfield" required>
                <input type="password" name="cpassword" placeholder="Konfirmasi Password" class="textfield" required>
                <div class="remember">
                    <input type="checkbox" name="remember" value="true">
                    <label for="remember">Ingat username ini</label>
                </div>
                <input type="submit" name="daftar" value="Daftar" class="login-btn">
            </form>
        </div>
    </div>
</body>
</html>