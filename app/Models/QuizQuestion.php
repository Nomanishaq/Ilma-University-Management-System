<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;
    protected $table = 'quiz_questions';

    protected $fillable = [
        'quiz_id',
        'question_type',
        'question',
        'options',
        'clo',
        'plo',
        'total_marks',
        'cognitive',
        'psychomotor',
        'affective',
    ];

    /**
     * Define the relationship to the Quiz model.
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
