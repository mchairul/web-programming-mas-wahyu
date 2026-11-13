<?php
include 'system/koneksi.php';

$username = postData('username');
$password = postData('password');

$tervalidasi = true;

if ($username == '') {
    $tervalidasi = false;
    buatFlashSession('username', 'Username tidak boleh kosong!');
}

if ($password == '') {
    $tervalidasi = false;
    buatFlashSession('password', 'Password tidak boleh kosong');
}

if (! $tervalidasi) {
    header('Location: index.php');
    exit;
}

$dataUser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '$username'");

// cek apakah ada record 
if (mysqli_num_rows($dataUser) > 0) {
    $user = mysqli_fetch_assoc($dataUser);
    // cek password
    if (password_verify($password, $user['password'])) {
        // buat session 
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        //pindah ke halaman siswa
        header('Location: siswa.php');
        exit();
    }
}

buatFlashSession('username', 'login gagal!');

header('Location: index.php');
exit();
