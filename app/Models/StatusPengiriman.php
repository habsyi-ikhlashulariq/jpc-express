<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPengiriman extends Model
{
    use HasFactory;
    protected $table = 'status_pengiriman';
    protected $fillable = ['penjualan_id','kurir_id','keterangan', 'tanggal','status'];
}
