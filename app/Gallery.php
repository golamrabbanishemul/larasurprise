<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function gallery_posts()
    {
        return $this->hasMany(GalleryPost::class);
    }
}
