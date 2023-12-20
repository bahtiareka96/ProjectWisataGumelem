<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallbackMidtrans extends Model
{
    use HasFactory;

    protected $fillable = [
        'trx_order', 'data', 'status'
    ];

    public function merchandiseTransaction()
    {
        return $this->belongsTo(MerchandiseTransaction::class, 'trx_order');
    }
}
