<?php
    require "../include/db_connect.php";
    $id = $_GET['id'];
    $get = mysqli_query($conn, "DELETE FROM mahasiswas WHERE id = $id");
    $mahasiswa = [];

    if ($result) {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'dashboard.php';
        </script>";
    }
?>