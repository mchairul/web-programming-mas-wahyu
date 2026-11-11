<?php
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

$hapusMapel = mysqli_query($koneksi, "DELETE FROM mata_pelajaran WHERE id = $id");

header('Location: mata_pelajaran.php');