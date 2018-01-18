<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Topic\TopicContract;

class TopicController extends Controller
{
    protected $repo;

    public function __construct(TopicContract $topicContract) {
        $this->repo = $topicContract;
    }

    public function getAllTopics()
    {
        $topics = $this->repo->findAll();
        return response()->json([
          'code' => '100',
          'topics' => $topics
        ]);
    }
}
