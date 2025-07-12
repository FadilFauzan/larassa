<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;


class Menu extends Model
{

    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['category', 'author']; // Debug n+1 problem (eager load)


    public function scopeFilter($query, array $filters) {

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) { // whereHas() = dimana kaitan dengan relasi
                $query->where('slug', $category);
            });
        });
    }


    // membuat relasi dengan class Category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // membuat relasi dengan class User
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName() {
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
