<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'is_published',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(QuestionAnswers::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }
}
