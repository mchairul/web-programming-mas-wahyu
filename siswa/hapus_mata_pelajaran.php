<?php
include 'system/koneksi.php';

$id = $_GET['id'];

$hapusMapel = mysqli_query($koneksi, "DELETE FROM mata_pelajaran WHERE id = $id");

header('Location: mata_pelajaran.php');