<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse; 
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TodoController extends Controller
{
    //

    public function index(): JsonResponse
    {
        Gate::authorize('viewAny', Todo::class);
        $user = Auth::user();
        $todos = $user->todos;
        return response()->json($todos); 
    }

    public function show(Todo $todo) {
        Gate::authorize('view', $todo);
        return response()->json($todo);
    }

    public function store(Request $request) : JsonResponse
    {
        if($request->user()->cannot('create', Todo::class)) {
            abort(403);
        }
        $validated = $request->validate([
            "title" => ['required', 'string', 'max:255']
        ]);
        $todo = new Todo(); 
        $todo->title = $validated["title"];
        $todo->user_id = Auth::user()->id;
        $todo->save(); 
        return response()->json($todo, 201);
    }

    public function update(Todo $todo): JsonResponse
    {

        $todo->completed = !$todo->completed;
        $todo->save(); 
        return response()->json($todo);
    }

    public function delete(Todo $todo) : JsonResponse
    {
        Gate::authorize('delete', $todo);
        $deleted = $todo; 
        $todo->delete(); 
        return response()->json($deleted);
    }
}
