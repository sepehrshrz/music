<?php

namespace App\Http\Controllers\Panell\Song;

use App\Http\Controllers\Controller;
use App\Http\Models\Music\Album;
use App\Http\Models\Music\Artist;
use App\Http\Models\Music\File;
use App\Http\Models\Music\Genre;
use App\Http\Models\Music\Song;
use App\Http\Requests\Panell\Song\StoreSongRequest;
use App\Http\Requests\Panell\Song\UpdateSongRequest;
use App\Http\Resources\Panell\Song\SongIndexResorce;
use App\Http\Resources\Panell\Song\SongShowResorce;
use Illuminate\Http\Request;

class SongController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response|array
	 * @return array
	 */

	public function index()
	{
		if (!auth()->user()->can('view',Song::class)){
			abort(403);
		}

		$song = Song::paginate()->load('album', 'artists', 'genre');


		$songs = SongIndexResorce::collection($song);
//		$album = $song->album;
		$album = json_decode(json_encode($songs));
//dd($songs->album);



//		dd($album);
		return view('admin.songs.index', compact('songs', 'album'));

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response|array
	 *
	 */
	public function store(StoreSongRequest $request)
	{

		\DB::beginTransaction();
		try {
			$song = new Song();
			$song->fill($request->all());
			$album_id       = \DB::table('albums')->where('name', $request->album)->value('id');
			$song->album_id = $album_id;

			$song->save();
//			\DB::commit();
			// ------------------------------------ attach album ------------------------------------

			//----------------------------------attach artists---------------------------//
			$artist = $request->artists;

			$artist_id = \DB::table('artists')->where('name', $artist)->value('id');
			$song->artists()->attach($artist_id);
			// ------------------------------------ attach file ------------------------------------
			$file     = new File();
			$FileName = $request->file('image')->getClientOriginalName();
			$request->file('image')->move('images/song_image', $FileName);
			$file->image = $FileName;
			$Filemp3Name = $request->file('mp3_128')->getClientOriginalName();
			$request->file('mp3_128')->move('music/128', $Filemp3Name);
			$file->mp3_128 = $Filemp3Name;
			$file->save();
			$song->file()->attach($file->id);

			//---------------------------------- ataching genre ----------------------------------------//
			$genre = $request->genre;

			$genreid = \DB::table('genres')->where('genre_name', $genre)->value('id');
			$song->genre()->attach($genreid);
			\DB::commit();
return redirect()->back();
//			return [
//				'success' => true,
//				'message' => trans('responses.panel.music.message.store'),
//			];
		} catch (\Exception $exception) {
			\DB::rollBack();
//			return redirect()->back();
			return [
				'success' => false,
				'message' => $exception->getMessage(),
			];
		}


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  Song $song
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Song $song)
	{
		if (!auth()->user()->can('view',Song::class)){
			abort(403);
		}

		$pure_data = new SongShowResorce($song->load('file', 'artists', 'categury', 'genre', 'album'));
		$song      = json_decode(json_encode($pure_data->resource));
		if ($song->file) {
			$path    = explode('/', $song->file[0]->image);
			$path    = end($path);
			$storage = '/images/song_image/' . $path;
		} else {
			$storage = '/images/song_image/nophoto.png';
		}

		// ------------------------------------ relation ------------------------------------
		$artists = $song->artists;

		$category = $song->categury;
		$genre    = $song->genre;

		$album = $song->album;
		$album = json_decode(json_encode($album), true);

//		dd($album);
		$song = json_decode(json_encode($song));


		return view('admin.songs.show', compact('song', 'artists', 'category', 'genre', 'album', 'storage'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id
	 *
	 * @return \Illuminate\Http\Response|array
	 */
	public function update(UpdateSongRequest $request, Song $song)
	{
		if (!auth()->user()->can('update',Song::class)){
			abort(403);
		}
		\DB::beginTransaction();
		try {

			$record = $request->all();
//			$song->fill($request->all());
			$album_id       = \DB::table('albums')->where('name', $request->album)->value('id');
			$song->album_id = $album_id;
			$song->update($record);


			// ------------------------------------ attach album ------------------------------------

			//----------------------------------attach artists---------------------------//
			if ($request->artists){
			$artist = $request->artists;
            $song->artists()->detach();
			$artist_id = \DB::table('artists')->where('name', $artist)->value('id');
			$song->artists()->attach($artist_id);}
//			// ------------------------------------ attach file ------------------------------------
			if ($request->hasFile('image')){
				$file     =new File();
				$FileName = $request->file('image')->getClientOriginalName();
				$request->file('image')->move('images/song_image', $FileName);
				$file->image = $FileName;
				$Filemp3Name = $request->file('mp3_128')->getClientOriginalName();
				$request->file('mp3_128')->move('music/128', $Filemp3Name);
				$file->mp3_128 = $Filemp3Name;
//				$file->update($record);

				$file->save();
				$song->file()->detach();
				$song->file()->attach($file->id);
			}


//			//---------------------------------- ataching genre ----------------------------------------//
			if ($request->genre){
				$genre = $request->genre;
				$song->genre()->detach();
				$genreid = \DB::table('genres')->where('genre_name', $genre)->value('id');
				$song->genre()->attach($genreid);
			}

			\DB::commit();

			return [
				'success' => true,
				'message' => trans('responses.panel.music.message.store'),
			];
		} catch (\Exception $exception) {
			\DB::rollBack();
//			return redirect()->back();
			return [
				'success' => false,
				'message' => $exception->getMessage(),
			];
		}


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response|array
	 */
	public function destroy(Song $song)
	{
		if (!auth()->user()->can('delete',Song::class)){
			abort(403);
		}
		\DB::beginTransaction();
		try {
			$song->delete();
			$song->artists()->detach();
			$song->genre()->detach();
			$song->file()->detach();
			$song->categury()->detach();
			\DB::commit();
			return [
				'success' => true,
				'message' => trans('responses.panel.music.message.delete'),
			];
		} catch (\Exception $exception) {
			\DB::rollBack();
			return [
				'success' => false,
				'message' => $exception->getMessage(),
			];
		}

	}

	public function restore($id)
	{
		if (!auth()->user()->can('forceDelete',Song::class)){
			abort(403);
		}
		/**
		 * @mixin Song
		 */
		\DB::beginTransaction();
		try {
			Song::onlyTrashed()->findOrFail($id)->restore();
			\DB::commit();
			return [
				'success' => true,
				'message' => trans('responses.panel.music.message.restore'),
			];

		} catch (\Exception $exception) {
			\DB::rollBack();
			return [
				'success' => false,
				'message' => $exception->getMessage(),
			];
		}

	}

	public function list()
	{
		return Song::select('id', 'name')->get();
	}

	public function create()
	{
		$art    = Artist::all();
		$albums = Album::all();
		return view('admin/songs/create', compact('art'), compact('albums'));
	}

	public function edit(Song $id)
	{
		$pure_data = new SongShowResorce($id->load('file', 'artists', 'categury', 'genre', 'album'));
		$song      = json_decode(json_encode($pure_data->resource));
		if ($song->file) {
			$path    = explode('/', $song->file[0]->image);
			$path    = end($path);
			$storage = '/images/song_image/' . $path;
		} else {
			$storage = '/images/song_image/nophoto.png';
		}
		$pathmp3    = explode('/', $song->file[0]->mp3_128);
		$pathmp3    = end($pathmp3);
		$storagemp3 = '/music/128/' . $pathmp3;

		// ------------------------------------ relation ------------------------------------
		$artists  = $song->artists;
		$category = $song->categury;
		$genre    = $song->genre;

		$album    = $song->album;

		$song     = json_decode(json_encode($song), true);
// ------------------------------------ model ------------------------------------
		$art    = Artist::all();
		$albums = Album::all();
		$genress = Genre::all();


		return view('admin.songs.update', compact('song', 'artists', 'category', 'genre', 'album', 'storage','storagemp3', 'art', 'albums','genress'));


	}
}
