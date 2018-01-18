<?php

namespace App\Repositories\Question;

interface QuestionContract
{
    public function findAll();
    public function findById($questionId);
    public function getQuestionFromTopic($request);
}
