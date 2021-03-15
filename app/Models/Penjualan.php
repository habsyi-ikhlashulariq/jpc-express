<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $fillable = ['noResi','tanggal', 'hargaKg', 'kuli', 'penerima', 'alamatPenerima', 'noTelpPenerima','vendor_id', 'barang_id', 'metodePembayaran_id', 'statusPengiriman_id', 'customer_id', 'destinasi_id'];
    protected $primaryKey = 'noResi';
    protected $casts = [
        'noResi' => 'string',
    ];
}
