<?php
    require "../include/db_connect.php";
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $fakultas = $_POST['fakultas'];
        $prodi = $_POST['prodi'];
        $foto = $_FILES['foto']['name'];

        $tanggal = date('Y-m-d h-i-s');
        $x = explode('.', $foto);
        $ekstensi = strtolower(end($x));

        $new_foto = "$tanggal.$nama.$ekstensi";
        $tmp = $_FILES['foto']['tmp_name'];

        if (move_uploaded_file($tmp, "../img/".$new_foto)) {
            $result = mysqli_query($conn, "INSERT INTO mahasiswa VALUES ('', '$nama', '$nim', '$fakultas', '$prodi', '$new_foto')");

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
                </script>";
            }

        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan!');
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
            <form action="" method="post" enctype="multipart/form-data">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="textfield">
                <label for="nim">NIM</label>
                <input type="text" name="nim" class="textfield">
                <label for="fakultas">Fakultas</label>
                <input type="text" name="fakultas" class="textfield">
                <label for="prodi">Program studi</label>
                <input type="text" name="prodi" class="textfield">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="textfield">
                <input type="submit" name="tambah" value="Tambah Data" class="login-btn">
            </form>
        </div>
    </section>
</body>
</html>