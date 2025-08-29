<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\UseCases\Todo\IndexAction;
use App\UseCases\Todo\StoreAction;
use App\UseCases\Todo\UpdateAction;

class TodoController extends Controller
{

    public function index(IndexAction $action)
    {
        $data = $action();
        return view('todo.index', $data);
    }

    public function store(Todo $todo, StoreTodoRequest $request, StoreAction $action)
    {
        $action($todo, $request);

        return redirect()
        ->route('todos.index')
        ->with('message', 'タスクを追加しました');
    }

    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo.edit', compact('todo'));
    }

    public function update(UpdateAction $action, UpdateTodoRequest $request, string $id)
    {
        $action($request, $id);
        return redirect()->route('todos.index');
    }

    public function completed()
    {
        $doneTodos = Todo::where('completed', true)
        ->paginate(4);;
        return view('todo.completed', compact('doneTodos'));
    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();

        return redirect()
        ->route('todos.index')
        ->with(
            ['message' => 'タスクを完了しました'],
        );
    }

    public function deleted()
    {
        $deletedTodos = Todo::onlyTrashed()
        ->paginate(4);;
        return view('todo.deleted', compact('deletedTodos'));
    }

    public function destroy(string $id)
    {
        Todo::findOrFail($id)->delete();
        return redirect()
        ->route('todos.index')
        ->with(
            ['message' => 'タスクを削除しました'],
        );
    }

    public function forceDelete(string $id)
    {
        Todo::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()
        ->route('todos.deleted')
        ->with(
            ['message' => 'タスクを完全に削除しました'],
        );
    }

    public function restore(string $id)
    {
        Todo::onlyTrashed()->findOrFail($id)->restore();
        return redirect()
        ->route('todos.index')
        ->with(
            ['message' => 'タスクを復元しました'],
        );
    }
}
