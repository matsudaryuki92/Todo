@extends('layouts.header')

@section('content')

<body>
    <section class="text-gray-600 body-font relative">
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="container px-5 py-10 mx-auto">
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="flex -m-2">
                        <div class="p-2 w-3/4">
                            <input type="text" id="todo" name="contents" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-orange-400 focus:bg-white focus:ring-2 focus:ring-orange-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="p-2 w-1/4">
                            <button class="flex mx-auto text-white bg-orange-400 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">追加</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <section>
        <div class="container px-5 py-10 mx-auto">
            @foreach ($todos as $todo)
            <div class="flex justify-between items-center p-3 bg-white shadow rounded mb-4">
                <span class="text-gray-700">{{ $todo->id }} : {{ $todo->contents }}</span>
                <div class="flex space-x-2 ml-auto">
                    <button onClick='location.href="{{ route('todos.edit', ['todo' => $todo->id] )}}"' class="bg-gray-400 text-white px-4 py-2 w-20 rounded">編集</button>
                    <form action="{{ route('todos.done', ['todo' => $todo->id]) }}" method="POST">
                        @csrf
                        <button class="bg-blue-400 text-white px-4 py-2 w-20 rounded">完了</button>
                    </form>
                    <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-400 text-white px-4 py-2 w-20 rounded">削除</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <!-- ページネーションを実装 -->
        {{ $todos->links() }}
    </section>
</body>

</html>
@endsection