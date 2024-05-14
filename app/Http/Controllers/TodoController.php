<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse; 
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    //

    public function index(): JsonResponse
    {
        $user = Auth::user();
        $todos = $user->todos;
        return response()->json($todos); 
    }

    public function store(Request $request) : JsonResponse
    {
        $validated = $request->validate([
            "title" => ['required', 'string', 'max:255']
        ]);
        $todo = new Todo(); 
        $todo->title = $validated["title"];
        $todo->user_id = Auth::user()->id;
        $todo->save(); 
        return response()->json($todo, 201);
    }
}
