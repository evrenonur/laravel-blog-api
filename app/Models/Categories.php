<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;


    protected $table = 'categories';
    protected $fillable = ['category_name', 'category_image', 'status'];

    public function blogPosts()
    {
        return $this->hasMany(BlogPosts::class, 'category_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
