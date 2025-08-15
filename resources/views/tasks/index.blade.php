@extends('layouts.app')

@section('title', 'Minha Lista de Tarefas')

@section('content')
<div class="flex items-center justify-center h-full">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-6">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Minha Lista de Tarefas</h1>

        <form method="POST" action="{{ route('tasks.store') }}" class="flex gap-2 mb-6">
            @csrf
            <input type="text" name="title" placeholder="Nova tarefa" class="flex-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                Adicionar
            </button>
        </form>

        <ul class="space-y-3">
            @foreach ($tasks as $task)
                <li class="flex items-center justify-between bg-gray-50 p-3 rounded shadow-sm">

                    <div class="flex items-center gap-3">
                        <form method="POST" action="{{ route('tasks.update', $task) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="px-3 py-1 text-sm rounded transition {{ $task->completed ? 'bg-yellow-500 text-white hover:bg-yellow-600' : 'bg-green-500 text-white hover:bg-green-600' }}">
                                {{ $task->completed ? 'Desfazer' : 'Concluir' }}
                            </button>
                        </form>

                        <span class="{{ $task->completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                            {{ $task->title }}
                        </span>
                    </div>

                    <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                            Excluir
                        </button>
                    </form>

                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection