<?php

namespace App\Repositories\Auth;

interface AuthContract
{
    public function create($request);
    public function createFromSocial($request);
}
