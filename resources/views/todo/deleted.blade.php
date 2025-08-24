@extends('layouts.header')

@section('content')
<div class="container px-5 py-10 mx-auto">
    @foreach ($deletedTodos as $todo)
    <div class="flex justify-between items-center p-3 bg-white shadow rounded mb-4">
        <span class="text-gray-700">{{ $todo->id }} : {{ $todo->contents }}</span>
        <div class="flex space-x-2 ml-auto">
            <form action="{{ route('todos.restore', ['todo' => $todo->id]) }}" method="POST">
                @csrf
                <button class="bg-gray-400 text-white px-4 py-2 w-20 rounded">戻す</button>
            </form>
            <!-- 完全削除処理を実装する -->
            <form action="{{ route('todos.forceDelete', ['todo' => $todo->id]) }}" method="POST">
                @csrf
                <button class="bg-red-400 text-white px-4 py-2 w-25 rounded">完全削除</button>
            </form>
        </div>
    </div>
    @endforeach
    {{ $deletedTodos->links() }}
</div>
@endsection