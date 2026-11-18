<?php

include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

$hapusSiswa = mysqli_query($koneksi, "DELETE FROM table_siswa WHERE id = $id");

// cek apakah hapus siswa berhasil
// jika berhasil
if ($hapusSiswa) {
    buatFlashSession('pesan_sukses', 'Hapus Siswa Berhasil');
} else {
    buatFlashSession('pesan_gagal', 'Hapus siswa gagal : ' . $koneksi->error);
}

header('Location: siswa.php');
