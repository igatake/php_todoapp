<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $id)
    {
        $goals = Goal::all();

        return view('tasks/index', [
            'goals' => $goals,
            'current_goal_id' => $id,
        ]);
    }
}
