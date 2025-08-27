<?php

namespace App\UseCases\Todo;

use App\Models\Todo;
use App\Http\Requests\UpdateTodoRequest;

class UpdateAction
{
    public function __invoke(UpdateTodoRequest $request, $id): Todo
    {
        $todo = Todo::findOrFail($id);
        $todo->contents = $request->input('contents');
        $todo->completed = false;
        $todo->save();

        return $todo;
    }
}
