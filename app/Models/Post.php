<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    //if meet MassAssignmentException 
    // protected $fillable = ['title', 'exceprt', 'body']; //this to setting field allow to edit
    protected $guarded = ['id']; //this opposite fillable, so this id to be guard and not allow to edit
    protected $with = ['user', 'category'];//this used user eager load

    public function scopeFilter($query, array $filters){
        //$filters['search'] ?? false -> this use null coalescing operator, this new fitur on php 7 and changed isset
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%'.$search.'%')
            ->orWhere('body', 'like', '%'.$search.'%');
        }); 

        //this use join to search category when they are have text or body in search
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){ //'use' is define to use $category first, agar can use to below $category
                $query->where('slug', $category);

            });
        });

        //this use arrow function, if you used arrow funcition you not used 'use' in this function
        $query->when($filters['user'] ?? false, fn($query, $user) =>
            $query->whereHas('user', fn($query) =>
                $query->where('slug', $user)
            )
        );
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
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

