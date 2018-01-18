<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Result\ResultContract;

class ResultController extends Controller
{
    protected $repo;

    public function __construct(ResultContract $resultContract) {
        $this->repo = $resultContract;
    }
    
    public function index()
    {
        //
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }
    
    public function delete($id)
    {
        //
    }
}
