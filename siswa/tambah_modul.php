<?php
include 'partial/header.php';
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

// ambil semua data mapel untuk tag html select
$dataMapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran");
?>

<div class="container">
    <h1>Tambah Modul</h1>
    <!-- Untuk upload file tambahkan  enctype="multipart/form-data"  -->
    <form action="proses_tambah_modul.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="id_mapel">Mata Pelajaran</label>
            <select name="post_id_mapel" id="id_mapel" class="form-select" required>
                <option value="">-- Pilih Mata Pelajaran --</option>
                <?php while($mapel = mysqli_fetch_assoc($dataMapel)) { ?>
                <option value="<?= $mapel['id'] ?>">
                    <?= $mapel['kode_mata_pelajaran'] ?> - <?= $mapel['nama_mata_pelajaran'] ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_file">File Modul</label>
            <input type="file" name="post_file" id="id_file" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_keterangan">Keterangan</label>
            <textarea name="post_keterangan" id="id_keterangan" class="form-control" placeholder="Input keterangan"></textarea>
        </div>

        <div class="mb-3">
            <a href="modul.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php';?>