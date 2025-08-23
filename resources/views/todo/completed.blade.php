@extends('layouts.header')

@section('content')
    <div class="container px-5 py-10 mx-auto">
        @foreach ($doneTodos as $todo)
        <div class="flex justify-between items-center p-3 bg-white shadow rounded mb-4">
            <span class="text-gray-700">{{ $todo->id }} : {{ $todo->contents }}</span>
            <div class="flex space-x-2 ml-auto">
                <button class="bg-gray-400 text-white px-4 py-2 w-20 rounded">戻す</button>
            </div>
        </div>
        @endforeach
    </div>
@endsection