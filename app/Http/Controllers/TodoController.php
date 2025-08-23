<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::select('id', 'contents')->where('completed', false)->get();
        return view('todo.index', compact('todos'));
    }

    public function store(Todo $todo, Request $request)
    {
        $request->validate([
            'contents' => 'required|max:255',
        ]);

        $todo->contents = $request->contents;
        $todo->completed = false;
        $todo->created_at = now();
        $todo->save();

        return redirect()
        ->route('todos.index')
        ->with('message', 'タスクを追加しました');
    }

    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo.edit', compact('todo'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'contents' => 'required|max:255',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->contents = $request->input('contents');
        $todo->completed = false;
        $todo->save();

        return redirect()->route('todos.index');
    }

    public function completed()
    {
        $doneTodos = Todo::where('completed', true)->get();
        return view('todo.completed', compact('doneTodos'));
    }

    public function taskComplete(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();

        return redirect()->route('todos.index');
    }

    public function deleted()
    {
        $deletedTodos = Todo::onlyTrashed()->get();
        return view('todo.deleted', compact('deletedTodos'));
    }

    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id)->delete();
        return redirect()->route('todos.index');
    }
}
