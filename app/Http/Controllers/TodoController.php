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

    public function store(Request $request) : JsonResponse
    {
        $validated = $request->validate([
            "title" => ['required', 'string', 'max:255']
        ]);
        $todo = new Todo(); 
        $todo->title = $validated["title"];
        $todo->save(); 
        return response()->json($todo, 201);
    }
}
