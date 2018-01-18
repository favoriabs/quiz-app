<?php

namespace App\Repositories\Topic;

interface TopicContract
{
    public function findAll();
    public function findById($topicId);
}
