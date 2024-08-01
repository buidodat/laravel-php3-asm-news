<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'description',
        'slug',
        'content',
        'image',
        'is_active',    
        'is_popular',
        'is_hot_post',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_popular' => 'boolean',
        'is_hot_post' => 'boolean'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
