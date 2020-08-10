<?php

namespace App\Policies;

use App\User;
use  App\Goal;
use Illuminate\Auth\Access\HandlesAuthorization;

class GoalPolicy
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

    public function goalPolicyCheck(User $user, Goal $goal)
    {
        return $user->id == $goal->user_id;
    }

}
