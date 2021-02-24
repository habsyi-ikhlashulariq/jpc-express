<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailVendor extends Model
{
    use HasFactory;
    protected $table = 'detail_vendor';
    protected $fillable = ['penjualan_id','vendor_id', 'totalBiaya'];
}
