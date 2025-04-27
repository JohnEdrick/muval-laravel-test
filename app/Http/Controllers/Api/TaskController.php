<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user')->get();
        return response()->json(['tasks' => $tasks], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:To do,In Progress,Done',
            'user_id' => 'required|exists:users,id',
        ]);

        $task = Task::create($validated);

        return response()->json(['message' => 'Task created successfully.', 'task' => $task], 201);
    }

    public function show(Task $task)
    {
        return response()->json(['task' => $task], 200);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:To do,In Progress,Done',
            'user_id' => 'required|exists:users,id',
        ]);

        $task->update($validated);

        return response()->json(['message' => 'Task updated successfully.', 'task' => $task], 200);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully.'], 200);
    }
}
