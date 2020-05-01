<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Task;
use Illuminate\Http\Request;

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
}
