<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>

</head>

<body>
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ old('description', $task->description) }}</textarea><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
        </select><br>

        <label for="user_id">Assign User:</label>
        <select id="user_id" name="user_id" required>
            <option value="">Select User</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ old('user_id', $task->user_id) == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
            @endforeach
        </select><br>

        @if ($errors->any())
        <div class="error">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <button type="submit">Save</button>
    </form>

    <a href="{{ route('tasks.index') }}" class="back-link">Back to Task List</a>
</body>

</html>