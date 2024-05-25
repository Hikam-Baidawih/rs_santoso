<?php include("config.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pendaftaran Pasien Baru | RS Santoso</title>
</head>

<body>
    <header>
        <h3>Formulir Pendaftaran Pasien Baru</h3>
    </header>

    <form action="pendaftaran.php" method="POST">

        <fieldset>

            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama lengkap" />
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"></textarea>
            </p>
            <p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <label><input type="radio" name="jenis_kelamin" value="L">
                    Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="P">
                    Perempuan</label>
            </p>
            <p>
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" placeholder="YYYY-MM-DD" />
            </p>
            <p>
                <input type="submit" value="Daftar" name="daftar" />
            </p>

        </fieldset>

    </form>

</body>

</html>

<?php

// cek apakah tombol daftar sudah diklik atau blum? 
if (isset($_POST['daftar'])) {

    // ambil data dari formulir 
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $jk = $_POST["jenis_kelamin"];
    $lahir = $_POST["tanggal_lahir"];

    // buat query 
    $sql = "INSERT INTO pasien (nama, alamat, jenis_kelamin, tanggal_lahir) 
VALUES ('$nama', '$alamat', '$jk', '$lahir')";
    $query = mysqli_query($koneksi, $sql);

    // apakah query simpan berhasil? 
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses 
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman index.php dengan status=gagal 
        header('Location: index.php?status=gagal');
    }
} else {
    echo "akses dilarang";
}

?>