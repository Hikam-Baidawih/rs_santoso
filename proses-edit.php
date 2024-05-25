<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum? 
if (isset($_POST['simpan'])) {

    // ambil data dari formulir 
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $tl = $_POST['tanggal_lahir'];

    // buat query update 
    $sql = "UPDATE pasien SET nama='$nama', alamat='$alamat', 
jenis_kelamin='$jk', tanggal_lahir='$tl' WHERE id=$id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query update berhasil? 
    if ($query) {
        // kalau berhasil alihkan ke halaman list-pasien.php 
        header('Location: list-pasien.php');
    } else {
        // kalau gagal tampilkan pesan 
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
