<?php

namespace App\Repositories\Answer;

use App\Repositories\Answer\AnswerContract;
use App\Answer;

class EloquentAnswerRepository implements AnswerContract
{
    public function getOptionsToQuestion($questionId)
    {
        $options = Answer::where('question_id', $questionId)->get();
        return $options;
    }
}
