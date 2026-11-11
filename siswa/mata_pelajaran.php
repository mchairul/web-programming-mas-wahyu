<?php
include 'partial/header.php';
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$mataPelajaran = mysqli_query($koneksi,"SELECT * FROM mata_pelajaran");
?>
<div class="container">
    <h1>Daftar Mata Pelajaran</h1>
    <br>
    <a href="tambah_mata_pelajaran.php" class="btn btn-primary">+ Tambah Mata Pelajaran</a>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Mata Pelajaran</th>
                <th>Nama Mata Pelajaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;
            while ($row = mysqli_fetch_assoc($mataPelajaran)) { ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row['kode_mata_pelajaran'] ?></td>
                <td><?= $row['nama_mata_pelajaran'] ?></td>
                <td>
                    <a class = "btn btn-warning" href="ubah_mata_pelajaran.php?id=<?= $row['id'] ?>">Ubah</a>
                    <button type="button" class = "btn btn-danger" onclick="hapusMapel('<?= $row['id'] ?>')">Hapus</a>
                </td>
            </tr>
            <?php $i++; } ?>       
        </tbody>
    </table>
</div>
<script>
    function hapusMapel(id) {
        if (confirm('Apa Anda yakin untuk hapus')) {
            window.location.href = 'hapus_mata_pelajaran.php?id=' + id
        }
    }
</script>
<?php include 'partial/footer.php'; ?>