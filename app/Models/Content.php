<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = 'content';
    public function tools_info()
    {
        return $this->hasOne('App\Models\Tools','id','tools_id');
    }

    public function gallery()
    {
        return $this->morphMany(Gallery::class, 'galleryable');
    }

}
