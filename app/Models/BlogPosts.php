<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPosts extends Model
{
    use HasFactory;
    protected $table = 'blog_posts';

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'image',
        'comment_status',
        'views_count',
        'is_published',
        'is_slider',
    ];

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

   public function comments()
    {
        return $this->hasMany(Comments::class, 'post_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', 1)->orderBy('id', 'desc');
    }

    public function scopeSlider($query)
    {
        return $query->where('is_slider', 1);
    }

    public function scopeNotslider($query, $id = array())
    {

        return $query->whereNotIn('id', $id);
    }


}
