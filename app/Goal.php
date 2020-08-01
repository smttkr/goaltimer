<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable =[
    'user_id',
    'goal_name',
    'goal_time',
    'status'
    ];

    public function getAllGoal($user_id)
    {
        $result = Goal::where('user_id', $user_id) ->orderBy('status', 'desc') ->get();
        return $result;
    }

    public function getGoalTime()
    {
        $time = $this->goal_time;
        $result = convertHour($time);
        return $result;
    }

    public function getTimeRecord()
    {
        $goal_id = $this->id;
        $records =  TimeRecord::where('goal_id', $goal_id)->get();
        $result = 0;
        foreach ($records as $record) {
            $result += $record ->time_record;
        }
        $result = convertTime($result);
        return $result;
    }

    public function getAddTime()
    {
        $goal_time = $this->goal_time;
        $goal_id = $this->id;
        $records =  TimeRecord::where('goal_id', $goal_id)->get();
        $time_record = 0;
        foreach ($records as $record) {
            $time_record += $record ->time_record;
        }
        $result = $goal_time - $time_record;
        $result = convertTime($result);
        return $result;
    }

    public function records()
    {
        return $this ->hasMany('App\TimeRecord');
    }

    public function checkstatus()
    {
        $addTime = $this->getAddTime();
        if ($addTime <0 && $this->status === 1) {
            $this->status = 0;
            $this->save();
        } elseif ($addTime >0 && $this->status === 0) {
            $this->status = 1;
            $this->save();
        }
    }
}
