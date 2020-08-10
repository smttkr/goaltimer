<?php

namespace App\Policies;

use App\User;
use App\TimeRecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimeRecordPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function timeRecordPolicyCheck(User $user, TimeRecord $timeRecord)
    {
        return $user->id == $timeRecord->user_id;
    }
}
