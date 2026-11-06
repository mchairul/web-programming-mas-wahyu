<?php

include 'system/koneksi.php';

$id = $_GET['id'];

$hapusJadwal = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id = $id");

header('Location: jadwal.php');
