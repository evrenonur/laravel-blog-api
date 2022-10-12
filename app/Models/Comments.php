<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'post_id',
        'parent_id',
        'body',
    ];
    protected $primaryKey = 'id';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(BlogPosts::class, 'post_id');
    }

    public function replies()
    {
        return $this->hasMany(Comments::class, 'parent_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }



}
