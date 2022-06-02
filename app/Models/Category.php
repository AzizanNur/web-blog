<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable; 

    protected $guarded = ['id'];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function getRouteKeyName()
    {   //this change rule select where id to select where slug
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
