<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goal;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GoalRequest;

class GoalController extends Controller
{
    public function index(Goal $goal)
    {
        $user = Auth::user();
        $goalList = $goal ->getAllGoal($user ->id);

        $params = [
            'user' => $user,
            'goalList' => $goalList,
        ];
        return view('index', $params);
    }

    public function show(Goal $goal)
    {
        $user = Auth::user();

        $i = 0;

        $records = $goal ->records() ->ThisMonth() ->orderBy('id', 'desc') ->get();
        $params = [
            'user' => $user,
            'goal' => $goal,
            'records' =>$records,
            'i' => $i,
        ];
        return view('admin', $params);
    }

    public function create(GoalRequest $request, Goal $goal)
    {
        $user = Auth::user();
        $form = [
            'user_id' => $user->id,
            'goal_name' => $request->goal_name,
            'goal_time' => $request->goal_time*60,
            'status' =>1,
        ];

        $goal ->fill($form)->save();

        return redirect(route('index'));
    }

    public function update(GoalRequest $request, $point, Goal $goal)
    {
        $user = Auth::user();


        if ($point === 'goal_name') {
            $goal->goal_name = $request->goal_name;
            $goal->save();
        } elseif ($point === 'goal_time') {
            $goal->goal_time = $request->goal_time*60;
            $goal->save();
        }
        $goal->checkstatus();

        return redirect(url('GoalController/show', $goal->id));
    }

    public function delete(Goal $goal)
    {
        $goal->delete();
        return redirect(route('index'));
    }
}
