<?php
include 'partial/header.php';
include 'system/koneksi.php';

$mataPelajaran = mysqli_query($koneksi,"SELECT * FROM mata_pelajaran");
?>
<div class="container">
    <h1>Daftar Mata Pelajaran</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Mata Pelajaran</th>
                <th>Nama Mata Pelajaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;
            while ($row = mysqli_fetch_assoc($mataPelajaran)) { ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row['kode_mata_pelajaran'] ?></td>
                <td><?= $row['nama_mata_pelajaran'] ?></td>
                <td>
                    <a class = "btn btn-warning">Ubah</a>
                    <a class = "btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php $i++; } ?>       
        </tbody>
    </table>
</div>