<?php
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$id = $_POST['id'];
$idSiswa = $_POST['post_ubah_siswa'];
$idFoto = $_FILES['post_ubah_foto'];
$idKeterangan = $_POST['post_ubah_keterangan'];

//var_dump($idFoto);exit;

// kondisi ada file foto yang diupload
if ($idFoto['size'] > 0) { // size didapat dari array key file yang diupload
    // data foto lama
    $dataFotoLama = mysqli_query($koneksi, "SELECT file_foto FROM foto_siswa WHERE id = $id");
    $fotoLama = mysqli_fetch_assoc($dataFotoLama);
    $tujuanUpload = 'uploads/';

    $namaFileLama = $tujuanUpload . $fotoLama['file_foto'];
    unlink($namaFileLama); // hapus foto lama

    //$namaFile = $idFoto['name'];
    $extension = pathinfo($idFoto['name'], PATHINFO_EXTENSION);
    $namaFileBaru = pathinfo($idFoto['name'], PATHINFO_FILENAME) . '-' . uniqid() . '.' . $extension;

    $upload = move_uploaded_file($idFoto['tmp_name'], $tujuanUpload . $namaFileBaru);

    $query = "UPDATE foto_siswa SET id_siswa=$idSiswa, file_foto='$namaFileBaru', keterangan='$idKeterangan' WHERE id=$id";
    $tambahFoto = mysqli_query($koneksi, $query);
} else {
    // tidak ada foto yang diupload
    $tambahFoto = mysqli_query($koneksi, "UPDATE foto_siswa SET id_siswa=$idSiswa, keterangan='$idKeterangan' WHERE id=$id");
}

header('Location: foto.php');
