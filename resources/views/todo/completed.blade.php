@extends('layouts.header')

@section('content')
<div class="container px-5 py-10 mx-auto">
    @foreach ($doneTodos as $todo)
    <div class="flex justify-between items-center p-3 bg-white shadow rounded mb-4">
        <span class="text-gray-700 px-4 py-2">{{ $todo->id }} : {{ $todo->contents }}</span>
    </div>
    @endforeach
    {{ $doneTodos->links() }}
</div>
@endsection