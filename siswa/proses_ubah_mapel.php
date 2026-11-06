<?php
include 'system/koneksi.php';

$id = $_POST['id'];
$kode_mapel = $_POST['kode_mata_pelajaran'];
$nama_mapel = $_POST['nama_mata_pelajaran'];

$query = "UPDATE mata_pelajaran SET kode_mata_pelajaran = '$kode_mapel', nama_mata_pelajaran = '$nama_mapel' WHERE id=$id";
$ubahMapel = mysqli_query($koneksi,$query);

header('Location: mata_pelajaran.php');