<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category','id');
    }

    public function parent()
    {
        return Category::where('id', '=', $this->parent_category)->get();
    }
}
