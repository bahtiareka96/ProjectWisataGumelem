<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerchandiseOrder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'about', 'quantity', 'price', 'user_id'
    ];

    protected $hidden =[];

    public function merchandise_galleries(){
        return $this->hasMany(MerchandiseGallery::class, 'merchandise_orders_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class,'users_id', 'id');
    }

    use HasFactory;
}
