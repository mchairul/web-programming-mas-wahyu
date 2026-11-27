<?php

abstract class BangunDatar {
    abstract public function hitungLuas(): float;

    public function tampilPesan(string $pesan): void
    {
        echo $pesan;
    }
}

class Persegi extends BangunDatar {

    private float $sisi;
    public function __construct(float $sisiDipanggil) {
        $this->sisi = $sisiDipanggil;
    }

    public function hitungLuas(): float
    {
        return $this->sisi * $this->sisi;
    }
}

class PersegiPanjang extends BangunDatar {
    private float $panjang;
    private float $lebar;

    public function __construct(float $panjangDipanggil, float $lebarDipanggilpanjang) {
        $this->panjang = $panjangDipanggil;
        $this->lebar = $lebarDipanggilpanjang;
    }

    public function hitungLuas(): float
    {
        return $this->panjang * $this->lebar;
    }
}

$persegi = new Persegi(5);
$persegi->tampilPesan($persegi->hitungLuas());

echo '<br>';

$persegiPanjang = new PersegiPanjang(10, 5);
$persegiPanjang->tampilPesan($persegiPanjang->hitungLuas());
