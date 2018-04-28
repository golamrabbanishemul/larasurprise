<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryPost extends Model
{
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
