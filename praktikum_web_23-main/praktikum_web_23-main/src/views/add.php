<?php
    require "../include/db_connect.php";
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $fakultas = $_POST['fakultas'];
        $prodi = $_POST['prodi'];

        $result = mysqli_query($conn, "INSERT INTO mahasiswas VALUES ('', '$nama', '$nim', '$fakultas', '$prodi')");

        if ($result) {
            echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'dashboard.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'dashboard.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Tambah Data</h1><hr><br>
            <form action="" method="post">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="textfield">
                <label for="nim">NIM</label>
                <input type="text" name="nim" class="textfield">
                <label for="fakultas">Fakultas</label>
                <input type="text" name="fakultas" class="textfield">
                <label for="prodi">Program studi</label>
                <input type="text" name="prodi" class="textfield">
                <input type="submit" name="tambah" value="Tambah Data" class="login-btn">
            </form>
        </div>
    </section>
</body>
</html>