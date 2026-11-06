<?php 
include 'system/koneksi.php';

$kode_mapel = $_POST['kode_mata_pelajaran'];
$nama_mapel = $_POST['nama_mata_pelajaran'];

$query = "INSERT INTO mata_pelajaran (kode_mata_pelajaran, nama_mata_pelajaran) 
VALUES ('$kode_mapel','$nama_mapel')";

$tambahMapel = mysqli_query($koneksi, $query);

header('Location: mata_pelajaran.php');