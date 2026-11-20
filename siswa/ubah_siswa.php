<?php
include 'system/koneksi.php';
include 'partial/header.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
$id = $_GET['id'];

$dataSiswa = mysqli_query($koneksi, "SELECT * FROM table_siswa WHERE id = '$id'");

// cek apakah siswa dengan id dari $_GET benar ada
// jika hasil baris kurang dari 1 . atau di table_siswa tidak ada
if (mysqli_num_rows($dataSiswa) < 1) {
    header('Location: siswa.php');
    exit();
}

// fetch ke array
$siswa = mysqli_fetch_assoc($dataSiswa);
?>

<div class="container">
    <h1>Ubah Siswa</h1>
    <form action="proses_ubah_siswa.php" method="post">
        <input type="hidden" name="<?= getCsrfName() ?>" value="<?= getCsrfToken() ?>">
        <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
        <div class="mb-3">
            <label for="id_nisn">NISN</label>
            <input type="text" name="nisn" id="nisn"
                class="form-control <?php if (cekFlashSession('nisn')) { echo 'is-invalid'; } ?>"
                value="<?= $siswa['nisn'] ?>" placeholder="Input NISN" required>
            <div class="invalid-feedback">
                <?php if (cekFlashSession('nisn')) { ?>
                <?= ambilFlashSession('nisn') ?>
                <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="id_nama">Nama</label>
            <input type="text" name="nama" id="id_nama"
                class="form-control <?php if (cekFlashSession('nama')) { echo 'is-invalid'; } ?>"
                value="<?= $siswa['nama_siswa'] ?>" placeholder="Input Nama" required>
            <div class="invalid-feedback">
                <?php if (cekFlashSession('nama')) { ?>
                <?= ambilFlashSession('nama') ?>
                <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="id_alamat">Alamat</label>
            <textarea
                name="alamat"
                id="id_alamat"
                class="form-control <?php if (cekFlashSession('alamat')) { echo 'is-invalid'; } ?>"
                placeholder="input alamat"
                required><?= $siswa['alamat'] ?></textarea>
            <div class="invalid-feedback">
                <?php if (cekFlashSession('alamat')) { ?>
                <?= ambilFlashSession('alamat') ?>
                <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <a href="siswa.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Ubah</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php'; ?>