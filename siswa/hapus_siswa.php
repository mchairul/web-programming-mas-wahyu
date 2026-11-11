<?php

include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

$hapusSiswa = mysqli_query($koneksi, "DELETE FROM table_siswa WHERE id = $id");

header('Location: siswa.php');
