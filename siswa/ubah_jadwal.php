<?php
include 'partial/header.php';
include 'system/koneksi.php';

$id = $_GET['id'];
$dataJadwal = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id = $id");
$jadwal = mysqli_fetch_assoc($dataJadwal);

// ambil semua data siswa untuk tag html select
$dataSiswa = mysqli_query($koneksi, "SELECT * FROM table_siswa");

// ambil semua data mapel untuk tag html select
$dataMapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran");

?>

<div class="container">
    <h1>Ubah Jadwal</h1>
    <form action="proses_ubah_jadwal.php" method="post">
        <input type="hidden" name="id" value="<?= $jadwal['id'] ?>">
        <div class="mb-3">
            <label for="id_siswa_id">Siswa</label>
            <select name="post_id_siswa" id="id_siswa_id" class="form-select" required>
                <option value="">-- Pilih Siswa --</option>

                <?php while ($siswa = mysqli_fetch_assoc($dataSiswa)) { ?>
                <option value="<?= $siswa['id'] ?>" <?php if($siswa['id'] == $jadwal['id_siswa']) { echo 'selected'; } ?>>
                    <?= $siswa['nisn'] ?> - <?= $siswa['nama_siswa'] ?>
                </option>
                <?php } ?>

            </select>
        </div>
        
        <div class="mb-3">
            <label for="id_mapel">Mata Pelajaran</label>
            <select name="post_id_mapel" id="id_mapel" class="form-select" required>
                <option value="">-- Pilih Mata Pelajaran --</option>
                <?php while($mapel = mysqli_fetch_assoc($dataMapel)) { ?>
                <option value="<?= $mapel['id'] ?>" <?php if($mapel['id'] == $jadwal['id_mata_pelajaran']) { echo 'selected'; } ?>>
                    <?= $mapel['kode_mata_pelajaran'] ?> - <?= $mapel['nama_mata_pelajaran'] ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_jadwal">Jadwal</label>
            <input value="<?= $jadwal['jadwal'] ?>" type="date" name="post_jadwal" id="id_jadwal" class="form-control" required>
        </div>

        <div class="mb-3">
            <a href="jadwal.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Ubah Jadwal</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php'; ?>