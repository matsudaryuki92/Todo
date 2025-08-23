<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスク管理アプリ</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center bg-orange-400">
            <a href="{{ route('todos.index') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <img class="w-12 h-12 text-white p-2" src="{{ asset('images/todo.avif') }}" alt="todo">
                <span class="ml-3 text-white text-2xl md:text-3xl font-bold">Todo</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <button onClick='location.href="{{ route('todos.completed') }}"' class="text-white mr-5 hover:text-gray-900">完了一覧</button>
                <button onClick='location.href="{{ route('todos.deleted') }}"' class="text-white mr-5 hover:text-gray-900">削除一覧</button>
            </nav>
        </div>
    </header>

    <section>
        @yield('content')
    </section>

</body>

</html>