<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'duration',
        'youtube_url',
        'thumbnail_path'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
