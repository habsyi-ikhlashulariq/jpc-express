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
    public function __construct($namaCustomer, $noTelpCustomer, $penjualan_id, $penerima, $alamatPenerima, $noTelpPenerima)
    {
        //
        $this->namaCustomer = $namaCustomer;
        $this->noTelpCustomer = $noTelpCustomer;
        $this->penjualan_id = $penjualan_id;
        $this->penerima = $penerima;
        $this->alamatPenerima = $alamatPenerima;

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
            ]);
    }
}
