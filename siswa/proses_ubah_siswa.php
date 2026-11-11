<?php

include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$id = $_POST['id'];
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

$query = "UPDATE table_siswa SET nisn = '$nisn', nama_siswa = '$nama', alamat = '$alamat' WHERE id = $id";
$ubahSiswa = mysqli_query($koneksi, $query);

header('Location: siswa.php');
