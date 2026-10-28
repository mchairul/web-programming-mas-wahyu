<?php 
$produk = [
    [
        "id" => 101,
        "nama" => "Laptop",
        "harga" => 8500000,
        "stok" => 5,
        "kategori" => ['Elektronik', 'Komputer']
    ],
    [
        "id" => 102,
        "nama" => 'Mouse Wireless',
        "harga" => 150000,
        "stok" => 20,
        "kategori" => ['Aksesoris', 'Komputer']
    ],
    [
        "id" => 103,
        "nama" => 'Keyboard Mechanical',
        "harga" => 450000,
        "stok" => 0,
        "kategori" => ['Aksesoris', 'Gaming']
    ]
]; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tugas PHP 1 - 21Okt2026</title>
    </head>
    <body>
        <h1>Daftar Produk</h1>
        <table width=60%; border ="2">
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Jumlah Produk</th>
            </tr>
            <?php 
            for ($i=0; $i <count($produk); $i++) { ?>
            <tr>
                <td><?php echo $produk[$i]['id']?></td>
                <td><?php echo $produk[$i]['nama']?></td>
                <td><?php echo $produk[$i]['harga']?></td>
                <td><?php echo $produk[$i]['stok']?></td>
                <td><?php echo $produk[$i]['kategori'][0].",".$produk[$i]['kategori'][1]?></td>
                <td>
                    <?php
                    $TotalProduk = $produk[$i]['harga'] * $produk[$i]['stok'];
                    echo $TotalProduk;
                    ?>  
                </td>   
            </tr>
            <?php } ?>
        </table>
    </body>
</html>