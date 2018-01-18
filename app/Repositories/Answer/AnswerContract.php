<?php

namespace App\Repositories\Answer;

interface AnswerContract
{
    public function getOptionsToQuestion($questionId);
}
