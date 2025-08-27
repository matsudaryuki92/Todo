<?php

namespace App\UseCases\Todo;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;

class StoreAction
{
    public function __invoke(Todo $todo, StoreTodoRequest $request): Todo
    {
        $todo->contents = $request->contents;
        $todo->deadline = $request->deadline;
        $todo->category_id = $request->category;
        $todo->completed = false;
        $todo->created_at = now();
        $todo->save();

        return $todo;
    }
}
