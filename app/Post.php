<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function dashesTitle($title)
    {
        $removeslash = str_replace("/", "-", $title);
        $removespace = explode(" ", $removeslash);
        return $includedash = implode("-", $removespace);

    }

    public static function removeDashes($title)
    {
        $removeslash = str_replace("/", "-", $title);
        $removespace = explode("-", $removeslash);
        return $removedash = implode(" ", $removespace);
    }

}
