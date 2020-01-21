<?php

namespace App\Http\Controllers\Panell\Album;

use App\Http\Controllers\Controller;
use App\Http\Models\Music\Album;
use App\Http\Models\Music\Artist;
use App\Http\Models\Music\File;
use App\Http\Requests\Panell\Album\AlbumStoreRequest;
use App\Http\Requests\Panell\Album\AlbumUpdateRequest;
use App\Http\Resources\Panell\Album\AlbumIndexResource;
use App\Http\Resources\Panell\Album\AlbumShowResource;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
	/**
	 * @mixin Album
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
    public function index()
    {
    	if (!auth()->user()->can('view',Album::class)){
    		abort(403);
		}
        $album=Album::paginate()->load('file');
        $albums=AlbumIndexResource::collection($album);
        return view('admin.albums.index',compact('albums'));
    }

	public function create()
	{
		if (!auth()->user()->can('create',Album::class)){
			abort(403);
		}
		return view('admin.albums.create');
}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request|array|
	 *
	 * @return \Illuminate\Http\Response|array
	 *
	 */
	public function create_song(Album $id)
	{
		if (!auth()->user()->can('create',Album::class)){
			abort(403);
		}

		$art=Artist::all();
		return view('admin.albums.create_song',compact('id','art'));
	}
    public function store(AlbumStoreRequest $request,Album $album)
    {
    	\DB::beginTransaction();
    	try{
			$album->fill($request->all());
			$album->save();
			// ------------------------------------ attach file ------------------------------------
			$file     = new File();
			$FileName = $request->file('image')->getClientOriginalName();
			$request->file('image')->move('images/album_image', $FileName);
			$file->image = $FileName;
			$file->save();
			$album->file()->attach($file->id);

			\DB::commit();
			return[
				'success'=>true,
				'message'=>trans('responses.panel.music.message.store'),
			];
		}
		catch (\Exception $exception){
			\DB::roleback();
			return[
				'success='=>true,
				'message'=>$exception->getMessage(),

			];
		}



	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
    public function show(Album $album)
    {
		if (!auth()->user()->can('view',Album::class)){
			abort(403);
		}

		$pure_data = new AlbumShowResource($album->load('file', 'songs'));
		$album     = json_decode(json_encode($pure_data->resource));
		if ($album->file) {
			$path    = explode('/', $album->file[0]->image);
			$path    = end($path);
			$storage = '/images/album_image/' . $path;
		} else {
			$storage = '/images/song_image/nophoto.png';
		}

		// ------------------------------------ relation ------------------------------------


		$song = $album->songs;
//		$song=[$song];

//		dd($song);
		$album = json_decode(json_encode($album), true);

//		dd($album);
		$album = json_decode(json_encode($album));
//dd($album);
		return view('admin.albums.show', compact('song',  'album', 'storage'));

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request]
	 * @param  int                      $id

	 * @return \Illuminate\Http\Response|array
	 */
    public function update(AlbumUpdateRequest $request, Album $album)
    {
		if (!auth()->user()->can('update',Album::class)){
			abort(403);
		}
        \DB::beginTransaction();
        try{
        	$album->fill($request->all());
        	$album->save();
        	DB::commit();
        	return[
        		'success'=>true,
				'message'=>trans('responses.panel.music.message.update'),
			];

		}catch (\Exception $exception){
        	\DB::roleback();
        	return[
        		'success'=>true,
				'message'=>$exception->getMessage(),
			];
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *  * @return \Illuminate\Http\Response|array
	 */
    public function destroy(Album $album)
    {
		if (!auth()->user()->can('delete',Album::class)){
			abort(403);
		}
		\DB::beginTransaction();
		try{
			$album->delete();

			\DB::commit();
			return[
				'success'=>true,
				'message'=>trans('responses.panel.music.message.destroy'),
			];

		}catch (\Exception $exception){
			\DB::roleback();
			return[
				'success'=>true,
				'message'=>$exception->getMessage(),
			];
		}
    }
	public function restore($id)
	{
		if (!auth()->user()->can('forceDelete',Album::class)){
			abort(403);
		}
		/**
		 * @mixin Artist
		 */
		\DB::beginTransaction();
		try{
			Artist::onlyTrashed()->findOrFail($id)->restore();
			\DB::commit();
			return[
				'success'=>true,
				'message'=>trans('responses.panel.music.message.restore'),
			];

		}catch (\Exception $exception) {
			\DB::rollBack();
			return [
				'success' => false,
				'message' => $exception->getMessage(),
			];
		}

	}

	public function list()
	{
		if (!auth()->user()->can('view',Album::class)){
			abort(403);
		}
		return Album::select('id','name')->get();
	}
}
