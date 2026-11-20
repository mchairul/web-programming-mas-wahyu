<?php
include 'partial/header.php';
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
$id=$_GET['id'];
$mataPelajaran = mysqli_query($koneksi,"SELECT * FROM mata_pelajaran WHERE id= '$id' ");

$row = mysqli_fetch_assoc($mataPelajaran);
?>

<div class="container">
    <h1>Ubah Mata Pelajaran</h1>
    <br>
    <form action="proses_ubah_mapel.php" method="post">
        <input type="hidden" name="<?= getCsrfName() ?>" value="<?= getCsrfToken() ?>">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="mb-3">
                <label for="id_kode_mapel">Kode Mata Pelajaran</label>
                <input type="text" 
                    name="kode_mata_pelajaran" 
                    id="id_kode_mapel" 
                    class="form-control <?php if(cekFlashSession('kode_mata_pelajaran')) { echo 'is-invalid'; }?>"
                    value="<?= $row['kode_mata_pelajaran']?>" 
                    placeholder="Input Kode Mata Pelajaran" required>
             <div class="invalid-feedback">
                <?php if (cekFlashSession('kode_mata_pelajaran')) {?>
                <?= ambilFlashSession('kode_mata_pelajaran') ?>
                <?php } ?>
            </div>   
            </div>
            <div class="mb-3">
                <label for="id_nama_mapel">Nama Mata Pelajaran</label>
                <input type="text"
                    name="nama_mata_pelajaran"
                    id="id_nama_mapel"
                    class="form-control <?php if(cekMapelSession('nama_mata_pelajaran')) {echo 'is-invalid';} ?>"
                    value="<?=  $row['nama_mata_pelajaran'] ?>"
                    placeholder="Input Nama Mata Pelajaran" required>
             <div class="invalid-feedback">
                <?php if (cekMapelSession('nama_mata_pelajaran')) {?>
                <?= ambilMapelSession('nama_mata_pelajaran') ?>
                <?php } ?>
            </div>
            </div>
            <div class="mb-3">
                <a href="mata_pelajaran.php" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-success">Ubah</button>
            </div>
    </form>
</div>
<script>
        // hapus class is-invalid ketika user mengetik di input username

        // variable element input dengan id username
        var elementInputUsername = document.getElementById('id_kode_mapel');
        // event listener untuk elemet elementInputUsername
        elementInputUsername.addEventListener('input', function () {
            // hapus class di element
            elementInputUsername.classList.remove('is-invalid');
        });

        // hapus class is-invalid ketika user mengetik di input password
        var elementInputPassword = document.getElementById('id_nama_mapel');
        elementInputPassword.addEventListener('input', function () {
            elementInputPassword.classList.remove('is-invalid');
        });
    </script>
<?php include 'partial/footer.php'?>