<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'body',
        'user_id',
        'is_accepted',
        'like',
        'dislike',
        'ask_id'
    ];

    public function ask(){
        return $this->belongsTo(Ask::class);
    }
}
