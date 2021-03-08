<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JpcExpress extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($namaCustomer, $noTelpCustomer, $penjualan_id, $penerima, $alamatPenerima, $noTelpPenerima, $berat, $panjang, $keterangan,  $tanggal, $kotaAsal, $kotaTujuan)
    {
        //
        $this->namaCustomer = $namaCustomer;
        $this->noTelpCustomer = $noTelpCustomer;
        $this->penjualan_id = $penjualan_id;
        $this->penerima = $penerima;
        $this->alamatPenerima = $alamatPenerima;
        $this->berat = $berat;
        $this->panjang = $panjang;
        $this->keterangan = $keterangan;
        $this->tanggal = $tanggal;
        $this->kotaAsal = $kotaAsal;
        $this->kotaTujuan = $kotaTujuan;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('JPCExpreess@gmmail.com')
            ->view('notif.email')
            ->with(
            [
                'namaCustomer' => $this->namaCustomer,
                'noTelpCustomer' => $this->noTelpCustomer,
                'penjualan_id' => $this->penjualan_id,
                'penerima' => $this->penerima,
                'alamatPenerima' => $this->alamatPenerima,
                'berat' => $this->berat,
                'panjang' => $this->panjang,
                'keterangan' => $this->keterangan,
                'tanggal' => $this->tanggal,
                'kotaAsal' => $this->kotaAsal,
                'kotaTujuan' => $this->kotaTujuan,
            ]);
    }
}
