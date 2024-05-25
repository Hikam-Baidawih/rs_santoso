<?php include("config.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran Pasien Baru | RS Santoso</title>
</head>

<body>
    <header>
        <h3>Data Pasien</h3>
    </header>

    <nav>
        <a href="pendaftaran.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM pasien";
            $query = mysqli_query($koneksi, $sql);

            while ($pasien = mysqli_fetch_array($query)) {
                echo "<tr>";

                echo "<td>" . $pasien['nama'] . "</td>";
                echo "<td>" . $pasien['alamat'] . "</td>";
                echo "<td>" . $pasien['jenis_kelamin'] . "</td>";
                echo "<td>" . $pasien['tanggal_lahir'] . "</td>";

                echo "<td>";
                echo "<a href='form-edit.php?id=" . $pasien['id'] . "'>Edit</a> | 
";
                echo "<a href='hapus.php?id=" . $pasien['id'] . "'>Hapus</a>";
                echo "</td>";

                echo "</tr>";
            }
            ?>

        </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

</body>

</html>