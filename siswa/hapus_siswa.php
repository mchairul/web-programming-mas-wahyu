<?php

include 'system/koneksi.php';

$id = $_GET['id'];

$hapusSiswa = mysqli_query($koneksi, "DELETE FROM table_siswa WHERE id = $id");

header('Location: siswa.php');
