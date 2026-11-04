<?php
include 'system/koneksi.php';

// baca data $_POST dan taruh ke variable
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

// variable string untuk query (supaya bisa dimanage)
$query = "INSERT INTO table_siswa (nisn, nama_siswa, alamat)VALUES ('$nisn', '$nama', '$alamat') ";

// proses query insert data siswa 
$tambahSiswa = mysqli_query($koneksi, $query);

// pindah ke halaman siswa.php
header('Location: siswa.php');
