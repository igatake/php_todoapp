<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;
use App\Http\Requests\CreateGoal;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function showCreateForm() {
        return view('goals/create');
    }

    public function create(CreateGoal $request) {
        // Goalモデルのインスタンスを作成
        $goal = new Goal();

        // formから受け取った値を代入する
        $goal->title = $request->title;
        $goal->due_date = $request->due_date;

        Auth::user()->goals()->save($goal);

        return redirect()->route('tasks.index', [
            'id' => $goal->id,
        ]);
    }
}
