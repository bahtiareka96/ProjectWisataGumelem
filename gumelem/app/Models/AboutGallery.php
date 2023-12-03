<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutGallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'about_gumelems_id', 'image'
    ];

    protected $hidden = [];

    public function about_gumelem(){
        return $this->belongsTo(AboutGumelem::class, 'about_gumelems_id', 'id');
    }

    use HasFactory;
}
