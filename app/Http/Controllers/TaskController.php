<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project; 

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required',
            // 'deadline' => 'required',
        ]);

        if ($request->has('task_id') && $request->task_id > 0) {
            $task = Task::findOrFail($request->task_id);
            $task->name = $request->input('name');
            $task->priority = 1;
            $task->deadline = $request->input('deadline');
            $task->project_id = $request->input('project_id');
            $task->save();
        } else {
            $task = new Task();
            $task->name = $request->input('name');
            $task->priority = 1;
            $task->deadline = $request->input('deadline');
            $task->project_id = $request->input('project_id');
            $task->save();
        }

        return response()->json($task);
    }

    public function index() {
        $tasks = Task::orderBy('priority', 'desc')->get();
        $projects = Project::all();
        return view('index', compact('tasks', 'projects'));
    }

    public function updateTaskStatus($taskId)
    {
        $task = Task::find($taskId);
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $isChecked = request()->input('isChecked');
        $task->status = $isChecked ? 1 : 0;
        $task->priority = $isChecked ? 0 : 1;
        $task->save();

        return response()->json(['message' => 'Task status updated successfully']);
    }

    public function destroy(Task $task)
    {
        // return "done";
        // $task = Task::findOrFail($id);
        $task->delete();

    }
}
