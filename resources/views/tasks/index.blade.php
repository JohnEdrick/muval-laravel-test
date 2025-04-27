<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tasks</title>
</head>

<body>
    <h1>Task List</h1>

    <div style="margin-bottom: 20px;">
        <a href="{{ route('tasks.create') }}">
            <button>Create New Task</button>
        </a>
    </div>

    <ul>
        @foreach ($tasks as $task)
        <li>
            {{ $task->title }} - Assigned to: {{ $task->user->name ?? 'Unknown' }}
            <!-- Edit URL -->
            <a href="{{ route('tasks.edit', $task->id) }}" style="margin-right: 10px;">Edit</a> |
            <!-- Delete URL -->
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>

    <form action="{{ route('logout') }}" method="POST" style="display: inline; margin-top: 20px;">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>

</html>