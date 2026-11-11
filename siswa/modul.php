<?php
include 'partial/header.php';
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$query = "SELECT modul_mata_pelajaran.*,
                mata_pelajaran.kode_mata_pelajaran, 
                mata_pelajaran.nama_mata_pelajaran
FROM modul_mata_pelajaran
JOIN mata_Pelajaran ON modul_mata_pelajaran.id_mata_pelajaran = mata_pelajaran.id";

$dataModul = mysqli_query($koneksi, $query);
?>

<div class="container ">
    <h1>Modul Belajar</h1>
    <a href="tambah_modul.php" class="btn btn-primary">+ Tambah Modul</a>
    <table class="table">
        <tr>            
            <th>Kode Pelajaran</th>
            <th>Nama Modul</th>
            <th>Nama File</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
        <thead>
            <tbody>
                <?php while ($modul = mysqli_fetch_assoc($dataModul)) { ?>
                <tr>                    
                    <td><?= $modul['kode_mata_pelajaran'] ?></td>
                    <td><?= $modul['nama_mata_pelajaran'] ?></td>
                    <td>
                        <a href="uploads/<?= $modul['nama_file'] ?>" target="_blank"><?= $modul['nama_file'] ?></a>
                    </td>
                    <td><?= $modul['keterangan'] ?></td>
                    <td>                        
                    <button class="btn btn-danger" onclick="hapusModul('<?= $modul['id'] ?>')">Hapus</button>
                    </td>
                </tr>
               <?php } ?>
            </tbody>
        </thead>
    </table>
</div>
<script>
    function hapusModul(id) {
        if (confirm('Apakah anda yakin ?')) {
            window.location.href = 'hapus_modul.php?id=' + id
        }
    }
</script>

<?php include 'partial/footer.php'; ?>