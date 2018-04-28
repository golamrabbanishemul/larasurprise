<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function post()
    {
        return $this->hasMany(Post::class);
    }

//    public function children()
//    {
//        return $this->belongsTo(Category::class, 'parent_category','id');
//    }
//
//    public function parent()
//    {
//        return Category::where('id', '=', $this->parent_category)->get();
//    }

    public function ds()
    {
        return $this->hasMany(self::class,'parent_category','id');
    }

    public function us(){
        return $this->belongsTo(self::class,'id','parent_category');
    }
}
