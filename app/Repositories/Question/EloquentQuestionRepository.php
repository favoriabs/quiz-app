<?php

namespace App\Repositories\Question;

use App\Repositories\Question\QuestionContract;
use App\Question;

class EloquentQuestionRepository implements QuestionContract
{
    public function findById($questionId)
    {
        return Question::find($questionId)
    }

    public function findAll()
    {
        return Question::all();
    }

    public function getQuestionFromTopic($request)
    {
        $question = Question::where('topic_id', $request->topicId)->first();
        return $question;
    }
}
