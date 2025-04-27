<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>

<body>
    <h1>Create a New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="">Select Status</option>
            <option value="To do">To do</option>
            <option value="In Progress">In Progress</option>
            <option value="Done">Done</option>
        </select><br>

        <label for="user_id">Assign User:</label>
        <select id="user_id" name="user_id">
            <option value="">Select User</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
            @endforeach
        </select><br>

        @if ($errors->any())
        <div>
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <button type="submit">Create Task</button>
    </form>

    <a href="{{ route('tasks.index') }}">Back to Task List</a>
</body>

</html>