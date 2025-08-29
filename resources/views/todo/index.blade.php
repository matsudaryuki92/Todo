@extends('layouts.header')

@section('content')

<body>
    <section class="text-gray-600 body-font relative">
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="container px-5 py-10 mx-auto">
                <div class="max-w-4xl mx-auto">
                    <div class="bg-white p-4">
                        @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="flex items-center gap-4">
                            <!-- タスク入力 -->
                            <input type="text" id="todo" name="contents"
                                placeholder="タスクを入力" value="{{ old('contents') }}"
                                class="flex-grow bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-orange-400 focus:bg-white focus:ring-2 focus:ring-orange-200 text-base text-gray-700 py-2 px-4 outline-none transition duration-200" />
                            <!-- カテゴリ選択 -->
                            <select id="category" name="category"
                                class="w-40 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-orange-400 focus:bg-white focus:ring-2 focus:ring-orange-200 text-base text-gray-700 py-2 px-3 outline-none transition duration-200">
                                <option disabled selected style="display:none;">カテゴリ</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category') === $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <!-- 締切日 -->
                            <input type="date" id="deadline" name="deadline" value="{{ old('deadline') }}"
                                class="w-40 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-orange-400 focus:bg-white focus:ring-2 focus:ring-orange-200 text-base text-gray-700 py-2 px-3 outline-none transition duration-200" />
                            <!-- 追加ボタン -->
                            <button type="submit"
                                class="bg-orange-400 hover:bg-orange-500 text-white text-base font-medium py-2 px-5 rounded transition duration-200">
                                追加
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </section>
    <section>
        <div class="container px-5 py-10 mx-auto">
            @foreach ($todos as $todo)
            <div class="flex items-center p-3 bg-white shadow rounded mb-4">
                <div class="flex justify-between items-center w-full mr-4">
                    <!-- 左：タスク内容 -->
                    <span class="text-gray-700">・{{ $todo->contents }}</span>

                    <!-- 右：カテゴリと締切（視覚的に統一） -->
                    <div class="flex items-center text-gray-600 px-3 py-1 rounded space-x-4">
                        <div class="{{ $todo->is_overdue ? 'bg-red-200' : '' }}">
                            <span>カテゴリ：「{{ $todo->category->title }}」</span>
                            <span>締切：{{ $todo->deadline->format('n月j日') }}まで</span>
                        </div>
                    </div>
                </div>

                <!-- 操作ボタン -->
                <div class="flex space-x-2">
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
            {{ $todos->links() }}
        </div>
    </section>
</body>

</html>
@endsection