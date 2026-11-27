<?php

// membatasi akses langsung

// public : bisa diakses dari mana saja
// protected : hanya bisa diakses dari dalam class itu sendiri dan turunan nya.
// private : hanya bisa diakses di dalam class itu sendiri

class RekeningBank {
    private int $saldo = 0;

    public function setor(int $jumlah): void
    {
        $this->saldo += $jumlah;
    }

    public function getSaldo(): int
    {
        return $this->saldo;    
    }
}

$akun = new RekeningBank();

// setor uang
$akun->setor(1000000);

//echo $akun->saldo; tidak bisa

// setor lagi
$akun->setor(500000);

// tampil saldo
echo number_format($akun->getSaldo());
