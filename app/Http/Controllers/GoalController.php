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
        $goalList = $goal->getAllGoal($user->id);

        $params = [
            'user' => $user,
            'goalList' => $goalList,
            'done' => 0
        ];
        return view('index', $params);
    }

    public function show(Goal $goal)
    {
        $user = Auth::user();
        $this->authorize('goalPolicyCheck', $goal);

        $i = 0;

        $records = $goal->records()->thisMonth()->orderBy('id', 'desc') ->get();
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
            'goal_time' => $request->goal_time,
            'status' =>1,
        ];

        $goal->fill($form)->save();

        return redirect(route('index'));
    }

    public function update(GoalRequest $request, $point, Goal $goal)
    {
        $this->authorize('goalPolicyCheck', $goal);

        $goal->{ $point } = $request->{ $point };
        $goal->save();

        $goal->checkstatus();

        return redirect(url('GoalController/show', $goal->id));
    }

    public function delete(Goal $goal)
    {
        $this->authorize('goalPolicyCheck', $goal);

        $goal->delete();
        return redirect(route('index'));
    }
}
