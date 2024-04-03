<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = [
        'name',
        'category_id',
        'mime_type',
        'google_drive_url',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
