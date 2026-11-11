<?php
include 'partial/header.php';
include 'system/koneksi.php';

//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$query = "SELECT foto_siswa.id,
    foto_siswa.id_siswa,
    foto_siswa.file_foto,
    foto_siswa.keterangan,
    table_siswa.nisn,
    table_siswa.nama_siswa
FROM foto_siswa
JOIN table_siswa ON foto_siswa.id_siswa = table_siswa.id";

$dataFoto = mysqli_query($koneksi, $query);

?>

<div class="container">
    <h1>Daftar Foto Siswa</h1>
    <a href="tambah_foto.php" class="btn btn-primary">+ Upload Foto</a>
    <table class="table">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>File Foto</th>
                <th>Keterangan</th>                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($foto = mysqli_fetch_assoc($dataFoto)) { ?>
            <tr>
                <td><?= $foto['nisn'] ?></td>
                <td><?= $foto['nama_siswa'] ?></td>
                <td>
                    <img src="uploads/<?= $foto['file_foto'] ?>" alt="foto siswa" width="150">
                </td>
                <td><?= $foto['keterangan'] ?></td>
                <td>
                    <a href="ubah_foto.php?id=<?= $foto['id'] ?>" class="btn btn-warning">Ubah</a>
                    <button class="btn btn-danger" onclick="hapusFoto('<?= $foto['id'] ?>')">Hapus</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    function hapusFoto(id) {
        if (confirm('Apakah anda yakin ?')) {
            window.location.href = 'hapus_foto.php?id=' + id
        }
    }
</script>

<?php include 'partial/footer.php'; ?>