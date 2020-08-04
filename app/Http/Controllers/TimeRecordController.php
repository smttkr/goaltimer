<?php

namespace App\Http\Controllers;

use App\TimeRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TimeRecordRequest;
use App\Goal;

class TimeRecordController extends Controller
{
    public function create(TimeRecordRequest $request, Goal $goal)
    {
        $user = Auth::user();

        $record = $request->record;
        $timeRecord = new TimeRecord;

        $form = [
                'user_id' =>$user->id,
                'goal_id'=> $goal->id,
                'time_record' =>$record,
            ];
        $timeRecord->fill($form) ->save();

        $goal->checkstatus();
        return redirect(route('index'));
    }

    public function show(Goal $goal)
    {
        $user = Auth::user();

        $timeRecords = $goal ->records()->orderBy('created_at', 'desc')->paginate(30);
        $i = 0;
        $params = [
            'user' => $user,
            'goal' => $goal,
            'timeRecords' =>$timeRecords,
            'i' =>$i,
        ];

        return view('show', $params);
    }

    public function update(TimeRecordRequest $request, $point, TimeRecord $timeRecord)
    {
        $timeRecord->{ $point } = $request->{ $point };
        $timeRecord->save();
        
        $goal = Goal::find($timeRecord->goal_id);
        $goal->checkstatus();
        return back();
    }

    public function delete(TimeRecord $timeRecord)
    {
        $timeRecord->delete();

        $goal = Goal::find($timeRecord->goal_id);
        $goal->checkstatus();
        return  redirect()->back();
    }
}
