<?php

namespace App\Repositories\Topic;

use App\Repositories\Topic\TopicContract;
use App\Topic;

class EloquentTopicRepository implements TopicContract
{
    public function findById($questionId)
    {
        return Topic::find($questionId)
    }

    public function findAll()
    {
        return Topic::all();
    }
}
