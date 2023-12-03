<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerchandiseTransaction extends Model
{
    use SoftDeletes;

    protected $fillable= [
        'merchandise_orders_id', 'users_id', 'email', 'address', 'expedition',
        'quantity_order', 'price', 'expedition_price', 'total_price', 'status'
    ];

    protected $hidden = [];

    public function merchandise_order(){
        return $this->belongsTo(MerchandiseOrder::class,'merchandise_orders_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class,'users_id', 'id');
    }

    use HasFactory;
}
