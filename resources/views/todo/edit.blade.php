@extends('layouts.header')

@section('content')
<section class="text-gray-600 body-font relative">
    <form action="{{ route('todos.update', ['todo' => $todo->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container px-5 py-20 mx-auto">
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="flex -m-2">
                    <div class="p-2 w-3/4">
                        <input type="text" value="{{ $todo->contents }}" id="contents" name="contents" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-orange-400 focus:bg-white focus:ring-2 focus:ring-orange-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="p-2 w-1/4">
                        <button class="flex mx-auto text-white bg-orange-400 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection