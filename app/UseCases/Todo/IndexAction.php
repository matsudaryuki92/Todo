<?php

namespace App\UseCases\Todo;

use App\Models\Todo;
use App\Models\Category;

class IndexAction
{
    public function __invoke(): array
    {
        $todos = Todo::with('category')
            ->select('id', 'contents', 'category_id', 'deadline')
            ->where('completed', false)
            ->orderBy('deadline', 'asc')
            ->paginate(4);
        $categories = Category::all();

        return ([
            'todos' => $todos,
            'categories' => $categories
        ]);
    }
}