<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Question\QuestionContract;
use App\Repositories\Answer\AnswerContract;

class QuestionController extends Controller
{
    protected $repo;
    protected $answerRepo;

    public function __construct(QuestionContract $questionContract, AnswerContract $answerContract) {
        $this->repo = $questionContract;
        $this->answerRepo = $answerContract;
    }

    public function getQuestionFromTopic(Request $request)
    {
        $question = $this->repo->getQuestionFromTopic($request);
        $optionsForThisQuestion = $this->answerRepo->getOptionsToQuestion($question->id);

        return response()->json([
          'code' => '100',
          'question' => $question,
          'options' => $optionsForThisQuestion
        ]);
    }
}
