<?php 
session_start();
session_unset();
session_destroy();

echo "<script>alert('Anda Berhasil Logout')</script>";
header("Location: login.php");
?>