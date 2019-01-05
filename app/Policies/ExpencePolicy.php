<?php

namespace App\Policies;

use App\User;
use App\Expence;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpencePolicy
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

    /**
     * 指定されたユーザーが指定されたexpenceを削除できるか決定
     *
     * @param  User  $user
     * @param  Expence  $expence
     * @return bool
     */
    public function destroy(User $user, Expence $expence)
    {
        return $user->id === $expence->user_id;
    }
}
