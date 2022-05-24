<?php

namespace App\Policies;

use App\Models\Wallet;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
     * @param User $user
     * @param Wallet $wallet
     * @return bool
     */
    public function owner(User $user, Wallet $wallet)
    {
        return $wallet->id === $user->wallet_id;
    }
}
