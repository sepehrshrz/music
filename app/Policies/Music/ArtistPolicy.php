<?php

namespace App\Policies\Music;

use App\Http\Models\Music\Artist;
use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArtistPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any artists.
     *
     * @param  \App\Models\User\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role==User::ROLE_SUPER_ADMIN||$user->role==User::ROLE_ADMIN;
    }

    /**
     * Determine whether the user can view the artist.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Http\Models\Music\Artist  $artist
     * @return mixed
     */
    public function view(User $user)
    {
		return $user->role==User::ROLE_SUPER_ADMIN||$user->role==User::ROLE_ADMIN;

	}

    /**
     * Determine whether the user can create artists.
     *
     * @param  \App\Models\User\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
		return $user->role==User::ROLE_SUPER_ADMIN||$user->role==User::ROLE_ADMIN;

	}

    /**
     * Determine whether the user can update the artist.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Http\Models\Music\Artist  $artist
     * @return mixed
     */
    public function update(User $user)
    {
		return $user->role==User::ROLE_SUPER_ADMIN||$user->role==User::ROLE_ADMIN;

	}

    /**
     * Determine whether the user can delete the artist.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Http\Models\Music\Artist  $artist
     * @return mixed
     */
    public function delete(User $user)
    {
		return $user->role==User::ROLE_SUPER_ADMIN;

	}

    /**
     * Determine whether the user can restore the artist.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Http\Models\Music\Artist  $artist
     * @return mixed
     */
    public function restore(User $user)
    {
		return $user->role==User::ROLE_SUPER_ADMIN||$user->role==User::ROLE_ADMIN;

	}

    /**
     * Determine whether the user can permanently delete the artist.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Http\Models\Music\Artist  $artist
     * @return mixed
     */
    public function forceDelete(User $user)
    {
		return $user->role==User::ROLE_SUPER_ADMIN;

	}
}
