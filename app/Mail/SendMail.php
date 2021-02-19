<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = DB::table('penjualan')
        ->join('customer', 'penjualan.customer_id', '=', 'customer.id')
        ->join('status_pengiriman', 'status_pengiriman.id', '=', 'penjualan.statusPengiriman_id')
        ->join('metode_pembayaran', 'metode_pembayaran.id', '=', 'penjualan.metodePembayaran_id')
        ->select('penjualan.id','penjualan.tanggal', 'penjualan.penerima', 'penjualan.alamatPenerima', 'customer.namaCustomer', 'customer.emailCustomer', 'customer.noTelpCustomer', 'metode_pembayaran.jenisPembayaran')
        ->where('penjualan.id', $id)
        ->first();
        
        return $this->from('pengirim@gmail.com')
                   ->view('order.notif')
                   ->with(
                    [
                        'user' => $user,
                        'website' => 'www.malasngoding.com',
                    ]);
    }
}
