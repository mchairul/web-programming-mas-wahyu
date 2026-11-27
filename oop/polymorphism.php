<?php

// ketika sebuah class me-implement interface ini. harus ada method bayar
interface Pembayaran {
    public function bayar(int $nominal): string;
}

class Cash implements Pembayaran {

    public function bayar(int $nominal): string
    {
        return 'Membayar ' . $nominal . ' Dengan CASH';
    }
}

class Qris implements Pembayaran {

    public function bayar(int $nominal): string
    {
        return 'Membayar ' . $nominal . ' Dengan QRIS';
    }
}

function prosesCheckout(Pembayaran $metode, int $totalBayar): void
{
    echo $metode->bayar($totalBayar) . '<br>';
}

prosesCheckout(new Qris(), 100000);
prosesCheckout(new Cash(), 300000);
