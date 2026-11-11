<?php
include 'partial/header.php';
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
$id = $_GET['id'];

$dataSiswa = mysqli_query($koneksi, "SELECT * FROM table_siswa WHERE id = $id");

// fetch ke array
$siswa = mysqli_fetch_assoc($dataSiswa);
?>

<div class="container">
    <h1>Ubah Siswa</h1>
    <form action="proses_ubah_siswa.php" method="post">
        <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
        <div class="mb-3">
            <label for="id_nisn">NISN</label>
            <input type="text" name="nisn" id="nisn" class="form-control" value="<?= $siswa['nisn'] ?>" placeholder="Input NISN" required>
        </div>
        <div class="mb-3">
            <label for="id_nama">Nama</label>
            <input type="text" name="nama" id="id_nama" class="form-control" value="<?= $siswa['nama_siswa'] ?>" placeholder="Input Nama" required>
        </div>
        <div class="mb-3">
            <label for="id_alamat">Alamat</label>
            <textarea
                name="alamat"
                id="id_alamat"
                class="form-control"
                placeholder="input alamat"
                required><?= $siswa['alamat'] ?></textarea>
        </div>
        <div class="mb-3">
            <a href="siswa.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Ubah</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php'; ?>