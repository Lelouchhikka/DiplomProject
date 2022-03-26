<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function create (User $user) {
        return $user->usertype=='admin';
    }
    public function edit (User $user ) {
        return $user->usertype=='admin';
    }
    public function update (User $user ) {
        return $user->usertype=='admin';
    }
    public function delete (User $user) {
        return $user->usertype=='admin';
    }
}
