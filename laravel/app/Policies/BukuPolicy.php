<?php

namespace App\Policies;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BukuPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Buku $buku): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Buku $buku): bool
    {
    }

    public function delete(User $user, Buku $buku): bool
    {
    }

    public function restore(User $user, Buku $buku): bool
    {
    }

    public function forceDelete(User $user, Buku $buku): bool
    {
    }
}
