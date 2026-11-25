<?php

class Mobil {
    //properti
    public string $merk;
    public string $warna;

    // method
    public function klakson(): string
    {
        return "tin tin!, Mobil $this->merk berwarna $this->warna";
    }
}

// instance
// instanisasi (membuat objek dari class)
$mobil = new Mobil();
$mobil->merk = 'Honda';
$mobil->warna = 'merah';

echo $mobil->klakson();
