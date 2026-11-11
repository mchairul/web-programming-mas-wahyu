<?php

include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

$dataFotoLama = mysqli_query($koneksi, "SELECT file_foto FROM foto_siswa WHERE id = $id");
$fotoLama = mysqli_fetch_assoc($dataFotoLama);
$tujuanUpload = 'uploads/';

$namaFileLama = $tujuanUpload . $fotoLama['file_foto'];
unlink($namaFileLama); // hapus foto lama

$hapusFoto = mysqli_query($koneksi, "DELETE FROM foto_siswa WHERE id = $id");

header('Location: foto.php');
