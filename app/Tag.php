<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Tag extends Model
{
    protected $fillable = ['name'];
    public function posts()
    {
        return $this->belongsToMany(\App\Post::class);
    }
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}