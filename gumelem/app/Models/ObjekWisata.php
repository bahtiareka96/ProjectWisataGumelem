<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObjekWisata extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'about', 'location'
    ];

    protected $hidden = [];

    public function wisata_galleries(){
        return $this->hasMany(WisataGallery::class, 'objek_wisatas_id', 'id');
    }

    use HasFactory;
}
