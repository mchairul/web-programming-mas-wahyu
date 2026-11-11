<?php

include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

$hapusJadwal = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id = $id");

header('Location: jadwal.php');
