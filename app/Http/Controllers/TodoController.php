<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse; 
use App\Models\Todo;

class TodoController extends Controller
{
    //

    public function index(): JsonResponse
    {
        $todos = Todo::all();
        return response()->json($todos); 
    }
}
