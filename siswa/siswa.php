<?php
include 'partial/header.php';
include 'system/koneksi.php';

// SELECT data siswa ditaruh ke dalam variable
$dataSiswa = mysqli_query($koneksi, "SELECT * FROM table_siswa");

?>

<div class="container">
    <h1>Siswa</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n = 1;
            while($row = mysqli_fetch_assoc($dataSiswa)) { ?>
            <tr>
                <td><?= $n ?></td>
                <td><?= $row['nisn'] ?></td>
                <td><?= $row['nama_siswa'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                    <a class="btn btn-warning">Ubah</a>
                    <a class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php $n++; } ?>
        </tbody>
    </table>
</div>
<?php include 'partial/footer.php'; ?>