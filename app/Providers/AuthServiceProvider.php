<?php

namespace App\Providers;

use App\Http\Models\Music\Album;
use App\Http\Models\Music\Artist;
use App\Http\Models\Music\Categury;
use App\Http\Models\Music\Genre;
use App\Http\Models\Music\Song;
use App\Policies\Music\AlbumPolicy;
use App\Policies\Music\ArtistPolicy;
use App\Policies\Music\CateguryPolicy;
use App\Policies\Music\GenrePolicy;
use App\Policies\Music\SongPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
		Artist::class=>ArtistPolicy::class,
		Album::class=>AlbumPolicy::class,
		Song::class=>SongPolicy::class,
		Genre::class=>GenrePolicy::class,
		Categury::class=>CateguryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
