<?php

include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$idSiswa = $_POST['post_id_siswa'];
$idMapel = $_POST['post_id_mapel'];
$jadwal = $_POST['post_jadwal'];

$query = "INSERT INTO jadwal (id_siswa, id_mata_pelajaran, jadwal)
VALUES ('$idSiswa', '$idMapel', '$jadwal') ";

$tambahJadwal = mysqli_query($koneksi, $query);

header('Location:jadwal.php');
