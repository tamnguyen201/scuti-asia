<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'slug', 'content', 'image', 'map_url'];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = \Str::slug($this->name , "-");
    }
}
