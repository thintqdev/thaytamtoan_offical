<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable = [
        'title',
        'type',
        'duration',
        'started_at',
        'ended_at',
        'total_question',
        'score_per_question',
        'view_count',
    ];

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
