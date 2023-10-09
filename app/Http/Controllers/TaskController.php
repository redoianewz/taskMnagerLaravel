<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use function Laravel\Prompts\select;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' =>  'required',
            'completed' => 'required',
        ]);
        $data =new Task();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->completed = $request->completed;
        $data->save();
        return response()->json([
            'message' => 'Task created successfully',
        ], 200);
    }

    public function show($id)
    {
        return Task::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' =>  'required',
            'completed' => 'required',
        ]);
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->completed = $request->completed;
        $task->save();
        return response()->json([
            'message' => 'Task updated successfully',
        ], 200);
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return response()->json([
            'message' => 'Task deleted successfully',
        ], 200);
    }
}
