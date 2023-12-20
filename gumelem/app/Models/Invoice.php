<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchandise_transaction_id', 'item_name', 'quantity', 'total_price', 'status'    
    ];
}
