<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Comment extends Model
{
    protected $fillable = ['comment', 'post_id'];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
