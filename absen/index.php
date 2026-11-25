<?php
require_once __DIR__ . '/koneksi.php';

// kondisi awal kosong
$divisiId = 0;

// nilai query awal kosong
$queryKaryawan = "SELECT * FROM karyawan";

// cek apakah ada GET parameter divisi_id di URL
if (isset($_GET['divisi_id']) ) {

    // jika ada buat variable $divisiId dengan nilai dari GET parameter divisi_id di URL
    $divisiId = $_GET['divisi_id'];

    // cek apakah variable $divisiId yang didapat dari GET parameter divisi_id tidak kosong
    if ($divisiId != '') {
        // jika tidak kosong ubah nilai variable $queryKaryawan
        $queryKaryawan = "SELECT * FROM karyawan WHERE divisi_id = '$divisiId'";
    }
}
//jalakan query berdasarkan nilai variable $queryKaryawan
$dataKaryawan = mysqli_query($koneksi, $queryKaryawan);

$dataDivisi = mysqli_query($koneksi, "SELECT * FROM divisi");

$date = date('Y-m-d H:i:s');
$timezone =  date_default_timezone_get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 id="txt"></h1>
        <h3>Absen</h3>
        <form action="post_absen.php" method="POST">
            <div class="mb-3">
                <label for="divisi">Divisi</label>
                <select name="divisi_id" id="divisi" class="form-select" required>
                    <option value="">Semua</option>
                    <?php while($divisi = mysqli_fetch_assoc($dataDivisi)) { ?>
                    <option value="<?= $divisi['id'] ?>" <?php if ($divisiId == $divisi['id']) { echo 'selected'; }?>>
                        <?= $divisi['nama'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="karyawan">Karyawan</label>
                <select name="karyawan_id" id="karyawan" class="form-select" required>
                    <option value="">-- Pilih Karyawan --</option>
                    <?php while($karyawan = mysqli_fetch_assoc($dataKaryawan)) { ?>
                    <option value="<?= $karyawan['id'] ?>">
                        <?= $karyawan['nama'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-success" name="absen_masuk" value="Absen Masuk">
                <input type="submit" class="btn btn-danger" name="absen_keluar" value="Absen Keluar">
            </div>
        </form>

        <?php if (isset($_SESSION['pesan_sukses'])) { ?>
            <div class="alert alert-success"><?= $_SESSION['pesan_sukses'] ?></div>
        <?php }
        unset($_SESSION['pesan_sukses']);
        ?>

        <?php if (isset($_SESSION['pesan_gagal'])) { ?>
            <div class="alert alert-danger"><?= $_SESSION['pesan_gagal'] ?></div>
        <?php }
        unset($_SESSION['pesan_gagal']);
        ?>
        <p>Jam Server : <?= $date ?>, timezone : <?= $timezone ?></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ketika HTML sudah dirender
        window.addEventListener('DOMContentLoaded', function() {
            startTime();
            // perubah dari semua ke direksi atau yang lain (finance, dll)
            var elemDivisi = document.getElementById('divisi');
            elemDivisi.addEventListener('change', function(){
                var idDivisi = elemDivisi.value;
                window.location.href = '?divisi_id=' + idDivisi;
            });
        });

        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {i = "0" + i};
            return i;
        }
    </script>
</body>
</html>