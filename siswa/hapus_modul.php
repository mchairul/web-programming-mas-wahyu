<?php

include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

// query nama file berdasarkan id
$dataFile = mysqli_query($koneksi, "SELECT nama_file FROM modul_mata_pelajaran WHERE id = $id");
// result jadi array
$file = mysqli_fetch_assoc($dataFile);

$namaFileLengkap = 'uploads/' . $file['nama_file'];

// hapus file
unlink($namaFileLengkap);

$hapusModul = mysqli_query($koneksi, "DELETE FROM modul_mata_pelajaran WHERE id = $id");

header('Location: modul.php');
