<?php

class Produk {
    //property
    public string $namaProduk;
    public int $harga;

    // constructor
    public function __construct(string $namaProdukDipanggil, int $hargaProdukDipanggil)
    {
        $this->namaProduk = $namaProdukDipanggil;
        $this->harga = $hargaProdukDipanggil;
    }

    public function infoProduk(): string
    {
        return $this->namaProduk . '- Rp : ' . number_format($this->harga);
    }

    public function __destruct()
    {
        echo 'class Produk dengan nama produk ' . $this->namaProduk . ' sudah selesai dijalankan! <br>';
    }
}

$susu = new Produk('Ultra Milk', 20000);
$info = $susu->infoProduk();
echo $info;
echo '<br>';

$coklat = new Produk('Beng beng', 5000);
echo $coklat->infoProduk();
echo '<br>';


$gula = new Produk('gulaku', 5000);
echo $gula->infoProduk();
echo '<br>';
