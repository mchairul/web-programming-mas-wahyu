<?php
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$id = $_POST['id'];
$idSiswa = $_POST['post_id_siswa'];
$idMapel = $_POST['post_id_mapel'];
$jadwal = $_POST['post_jadwal'];

$query = "UPDATE jadwal SET id_siswa = '$idSiswa', id_mata_pelajaran = '$idMapel', jadwal = '$jadwal'
WHERE id = $id";

$ubahJadwal = mysqli_query($koneksi, $query);

header('Location: jadwal.php');
