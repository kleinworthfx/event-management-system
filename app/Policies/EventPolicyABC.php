<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EventABC;

class EventPolicyABC
{
    public function update(User $user, EventABC $event): bool
    {
        return $user->id === $event->organizer_id || $user->isAdmin();
    }
    
    public function delete(User $user, EventABC $event): bool
    {
        return $user->id === $event->organizer_id || $user->isAdmin();
    }
}