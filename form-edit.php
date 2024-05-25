<?php

include("config.php");

// kalau tidak ada id di query string 
if (!isset($_GET['id'])) {
    header('Location: list-pasien.php');
}

//ambil id dari query string 
$id = $_GET['id'];

// buat query untuk ambil data dari database 
$sql = "SELECT * FROM pasien WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$pasien = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan 
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Formulir Edit Pasien | RS Santoso</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Pasien</h3>
    </header>

    <form action="proses-edit.php" method="POST">

        <fieldset>

            <input type="hidden" name="id" value="<?php echo $pasien['id']
                                                    ?>" />

            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $pasien['nama'] ?>" />
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"><?php echo $pasien['alamat']
                                        ?></textarea>
            </p>
            <p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <?php $jk = $pasien['jenis_kelamin']; ?>
                <label><input type="radio" name="jenis_kelamin" value="L" <?php
                                                                            echo ($jk == 'L') ? "checked" : "" ?>> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="P" <?php
                                                                            echo ($jk == 'P') ? "checked" : "" ?>> Perempuan</label>
            </p>
            <p>
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" placeholder="YYYY-MM
DD" value="<?php echo $pasien['tanggal_lahir'] ?>" />
            </p>
            <p>
                <input type="submit" value="Simpan" name="simpan" />
            </p>
        </fieldset>
    </form>
</body>

</html>