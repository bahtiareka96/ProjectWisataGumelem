<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WisataGallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'objek_wisatas_id', 'image'
    ];

    protected $hidden = [];

    public function objek_wisata(){
        return $this->belongsTo(ObjekWisata::class, 'objek_wisatas_id', 'id');
    }

    use HasFactory;
}
