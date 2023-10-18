<?php
    require "../include/db_connect.php";
    $id = $_GET['id'];
    $get = mysqli_query($conn, "SELECT * FROM mahasiswas WHERE id = $id");
    $mahasiswa = [];

    while ($row = mysqli_fetch_assoc($get)) {
        $mahasiswa[] = $row;
    }
    $mahasiswa = $mahasiswa[0];

    if (isset($_POST['ubah'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $fakultas = $_POST['fakultas'];
        $prodi = $_POST['prodi'];

        $result = mysqli_query($conn, "UPDATE mahasiswa SET nama='$nama', nim='$nim', fakultas='$fakultas', prodi='$prodi' WHERE id = $id");

        if ($result) {
            echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'dashboard.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal diubah!');
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
    <title>Edit Data</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Edit Data</h1><hr><br>
            <form action="" method="post">
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="<?php echo $mahasiswa['nama'] ?>" class="textfield">
                <label for="nim">NIM</label>
                <input type="text" name="nim" value="<?php echo $mahasiswa['nim'] ?>" class="textfield">
                <label for="fakultas">Fakultas</label>
                <input type="text" name="fakultas" value="<?php echo $mahasiswa['fakultas'] ?>" class="textfield">
                <label for="prodi">Program studi</label>
                <input type="text" name="prodi" value="<?php echo $mahasiswa['prodi'] ?>" class="textfield">
                <input type="submit" value="Edit Data" class="login-btn">
            </form>
        </div>
    </section>
</body>
</html>