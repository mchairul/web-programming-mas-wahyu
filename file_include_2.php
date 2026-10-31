<?php


$alamat = 'jakarta';

function penambahan(int $angka1, int $angka2) : int
{
    return $angka1 + $angka2;
}

function pengurangan(int $angka1, int $angka2): int
{
    return $angka1 - $angka2;
}

function hitungGaji(int $jumlahJam, int $biayaPerjam = 10000): int
{
    return $jumlahJam * $biayaPerjam;
}

function tampilLayar(string $content): void
{
    echo $content;
}
