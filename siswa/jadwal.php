<?php
include 'partial/header.php';
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$query = "SELECT jadwal.*, table_siswa.nisn, table_siswa.nama_siswa,
	mata_pelajaran.kode_mata_pelajaran, mata_pelajaran.nama_mata_pelajaran
FROM jadwal
JOIN table_siswa ON jadwal.id_siswa = table_siswa.id
JOIN mata_pelajaran ON jadwal.id_mata_pelajaran = mata_pelajaran.id";
$dataJadwal = mysqli_query($koneksi, $query);

?>

<div class="container">
    <h1>Jadwal Mata Pelajaran Siswa</h1>
    <a href="tambah_jadwal.php" class="btn btn-primary">+ Tambah Jadwal</a>
    <table class="table">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kode Mapel</th>
                <th>Nama Mapel</th>
                <th>Jadwal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($jadwal = mysqli_fetch_assoc($dataJadwal)) { ?>
            <tr>
                <td><?= $jadwal['nisn'] ?></td>
                <td><?= $jadwal['nama_siswa'] ?></td>
                <td><?= $jadwal['kode_mata_pelajaran'] ?></td>
                <td><?= $jadwal['nama_mata_pelajaran'] ?></td>
                <td><?= $jadwal['jadwal'] ?></td>
                <td>
                    <a href="ubah_jadwal.php?id=<?= $jadwal['id'] ?>" class="btn btn-warning">Ubah</a>
                    <button class="btn btn-danger" onclick="hapusJadwal('<?= $jadwal['id'] ?>')">Hapus</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    function hapusJadwal(id) {
        if (confirm('Apakah anda yakin ?')) {
            window.location.href = 'hapus_jadwal.php?id=' + id
        }
    }
</script>

<?php include 'partial/footer.php'; ?>