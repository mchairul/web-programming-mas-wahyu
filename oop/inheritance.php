<?php

class Hewan {
    // property
    protected string $nama;

    public function __construct(string $namaDipanggil)
    {
        $this->nama = $namaDipanggil;
    }

    // method
    public function makan(): string
    {
        return $this->nama . ' sedang makan';    
    }
}

class Kucing extends Hewan {

    public function suara(): string
    {
        return $this->nama . ' mengeong';
    }
}

$kucing = new Kucing('Garfield');
echo $kucing->makan();
// echo $kucing->nama; tidak boleh
echo '<br>';
echo $kucing->suara();
