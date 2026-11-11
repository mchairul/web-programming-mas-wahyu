<?php

include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$idFoto = $_POST['post_id_foto'];
$keterangan = $_POST['post_keterangan'];

$fotoUpload = $_FILES['post_file_foto'];
//var_dump($fileUpload); // untuk menampilkan isi array $_FILES
//exit; // hentikan eksekusi sementara untuk melihat isi array $_FILES

// tentukan lokasi upload
$tujuanUpload = 'uploads/';
//$namaFile = $fotoUpload['name'];
$extension = pathinfo($fotoUpload['name'], PATHINFO_EXTENSION);
$namaFileBaru = pathinfo($fotoUpload['name'], PATHINFO_FILENAME) . '-' . uniqid() . '.' . $extension;

//  pindahkan file dari lokasi sementara ke lokasi tujuan
//             /Applications/MAMP/tmp/php/phpDlcCtu -> uploads/wehz m why.xlsx
$upload = move_uploaded_file($fotoUpload['tmp_name'], $tujuanUpload . $namaFileBaru);

$query = "INSERT INTO foto_siswa (id_siswa, file_foto, keterangan) VALUES ('$idFoto', '$namaFileBaru', '$keterangan')";
$tambahFoto = mysqli_query($koneksi, $query);

header('Location: foto.php');
