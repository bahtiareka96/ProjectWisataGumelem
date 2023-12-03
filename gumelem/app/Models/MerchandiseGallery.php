<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerchandiseGallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'merchandise_orders_id', 'image'
    ];

    protected $hidden = [];

    public function merchandise_order(){
        return $this->belongsTo(MerchandiseOrder::class, 'merchandise_orders_id', 'id');
    }

    use HasFactory;
}
