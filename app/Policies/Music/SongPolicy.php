<?php

namespace App\Policies\Music;

use App\Http\Models\Music\Song;
use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SongPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any songs.
     *
     * @param  \App\Models\User\User  $user
     * @return mixed
     */
	public function viewAny(User $user)
	{
		return $user->role==User::ROLE_ADMIN||$user->role==User::ROLE_SUPER_ADMIN;
	}

	/**
	 * Determine whether the user can view the album.
	 *
	 * @param  \App\Models\User\User  $user
	 * @param  \App\Http\Models\Music\Album  $album
	 * @return mixed
	 */
	public function view(User $user)
	{
		return $user->role==User::ROLE_ADMIN||$user->role==User::ROLE_SUPER_ADMIN;
	}

	/**
	 * Determine whether the user can create albums.
	 *
	 * @param  \App\Models\User\User  $user
	 * @return mixed
	 */
	public function create(User $user)
	{
		return $user->role==User::ROLE_ADMIN||$user->role==User::ROLE_SUPER_ADMIN;
	}

	/**
	 * Determine whether the user can update the album.
	 *
	 * @param  \App\Models\User\User  $user
	 * @param  \App\Http\Models\Music\Album  $album
	 * @return mixed
	 */
	public function update(User $user)
	{
		return $user->role==User::ROLE_ADMIN||$user->role==User::ROLE_SUPER_ADMIN;
	}

	/**
	 * Determine whether the user can delete the album.
	 *
	 * @param  \App\Models\User\User  $user
	 * @param  \App\Http\Models\Music\Album  $album
	 * @return mixed
	 */
	public function delete(User $user)
	{
		return $user->role==User::ROLE_ADMIN||$user->role==User::ROLE_SUPER_ADMIN;
	}

	/**
	 * Determine whether the user can restore the album.
	 *
	 * @param  \App\Models\User\User  $user
	 * @param  \App\Http\Models\Music\Album  $album
	 * @return mixed
	 */
	public function restore(User $user)
	{
		return $user->role==User::ROLE_ADMIN||$user->role==User::ROLE_SUPER_ADMIN;
	}

	/**
	 * Determine whether the user can permanently delete the album.
	 *
	 * @param  \App\Models\User\User  $user
	 * @param  \App\Http\Models\Music\Album  $album
	 * @return mixed
	 */
	public function forceDelete(User $user)
	{
		return $user->role==User::ROLE_SUPER_ADMIN;
	}
}
