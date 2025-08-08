<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>Minha Lista de Tarefas</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <input type="text" name="title" placeholder="Nova tarefa">
        <button type="submit">Adicionar</button>
    </form>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <form method="POST" action="{{ route('tasks.update', $task) }}" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit">{{ $task->completed ? 'Desfazer' : 'Concluir' }}</button>
                </form>

                {{ $task->title }} 
                @if($task->completed) ✅ @endif

                <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>