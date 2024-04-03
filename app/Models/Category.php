<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    protected $hidden = ['created_at', 'updated_at', 'category'];

    public function parent()
    {
        return $this->hasMany(Category::class, 'id', 'parent_id');
    }

    public function children()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function getParentNameAttribute()
    {
        if ($this->parent_id) {
            $parentCategory = self::find($this->parent_id);
            if ($parentCategory) {
                return $parentCategory->name;
            }
        }
        return null;
    }

    public function questions()
    {
        return $this->hasMany(Document::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
