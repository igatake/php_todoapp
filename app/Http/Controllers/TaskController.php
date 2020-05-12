<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;

class TaskController extends Controller
{   

    public function index(int $id)
    {
        // 全てのGoalを取得する
        $goals = Goal::all();

        // 選ばれたGoalを取得する
        $current_goal = Goal::find($id);

        // 選ばれたGoalに紐づくTaskを取得する
        $tasks = $current_goal->tasks()->get();

        return view('tasks/index', [
            'goals' => $goals,
            'current_goal_id' => $current_goal->id,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm(int $id) {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }

    public function create(int $id, CreateTask $request) {
        $current_goal = Goal::find($id);

        $task = new Task();
        $task->title = $request->title;

        $current_goal->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $current_goal->id,
        ]);
    }

    public function showEditForm(int $id, int $task_id) {
        $task = Task::find($task_id);

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

   public function edit(int $id, int $task_id, EditTask $request)
{
    // 1
    $task = Task::find($task_id);

    // 2
    $task->title = $request->title;
    $task->status = $request->status;
    $task->save();

    // 3
    return redirect()->route('tasks.index', [
        'id' => $task->goal_id,
    ]);
}
}
