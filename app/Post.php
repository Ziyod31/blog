<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;
use App\Comment;
use App\Tag;
use App\Category;

class Post extends Model
{
    protected $fillable = ['tag_id', 'title', 'body'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function scopeFilter($query, $filter)
    {
        if(isset($filter['month']))
        {
            $query->whereMonth('created_at', Carbon::parse($filter['month'])->month);
        }
        
        if(isset($filter['year']))
        {
            $query->whereYear('created_at', $filter['year']);
        }
    }
    
    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('month desc')
        ->get()
        ->toArray();
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function addComments($comment)
    {
        $this->comments()->create(['comment'=>$comment]);
    }
    
    public function tags()
    {
        return $this->belongsToMany(\App\Tag::class);
    }
    
    public function addTags()
    {
        $this->tags()->create(['name'=>$tag]);
    }
    
    public function categories()
    {
        return $this->belongsTo(\App\Category::class);
    }
}
