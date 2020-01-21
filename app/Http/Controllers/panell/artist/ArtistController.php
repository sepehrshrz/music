<?php

namespace App\Http\Controllers\panell\artist;

use App\Http\Controllers\Controller;
use App\Http\Models\Music\Artist;
use App\Http\Models\Music\File;
use App\Http\Requests\Panell\Artist\StoreArtistRequest;
use App\Http\Requests\Panell\Artist\UpdateArtistRequest;
use App\Http\Resources\panell\artist\ArtistIndexResource;
use App\Http\Resources\Panell\Artist\ShowArtistResource;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|object
	 *     @return array    []
     */
    public function index()
    {
if (!auth()->user()->can('view',Artist::class)){
	abort(403);
}
        $artists=Artist::paginate();
        $artist= ArtistIndexResource::collection($artists);
     return view('admin.artists.index',compact('artist'));
    }

	public function create()
	{
		if (!auth()->user()->can('create',Artist::class)){
			abort(403);
		}

		return view('admin/artists/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|array

	 *
     */
    public function store(StoreArtistRequest $request)
	{
		if (!auth()->user()->can('view',Artist::class)){
			abort(403);
		}
		\DB::beginTransaction();
		try {
			$artist = new Artist();
			$artist->fill($request->all());
			$artist->save();
			// ------------------------------------ atach file ------------------------------------
			$file     = new File();
			$FileName = $request->file('image')->getClientOriginalName();
			$request->file('image')->move('images/artist_image', $FileName);
			$file->image = $FileName;
			$file->save();
			$artist->file()->attach($file->id);
			\DB::commit();

			return [
				'success' => true,
				'message' => trans('responses.panel.music.message.store'),
			];
		} catch (\Exception $exception) {
			\DB::rollBack();
			return [
				'success' => false,
				'message' => $exception->getMessage(),
			];
		}
	}




    /**
     * Display the specified resource.

     * @param  int  $artist
     * @return \Illuminate\Http\Response|array
     */
    public function show(Artist $artist)
    {

		if (!auth()->user()->can('view',Artist::class)){
			abort(403);
		}
   $art=new ShowArtistResource($artist->load('file'));

		$artist      = json_decode(json_encode($art->resource));
//dd($artist);
		if ($artist->file) {
			$path    = explode('/', $artist->file[0]->image);
			$path    = end($path);
			$storage = '/images/artist_image/' . $path;
		} else {
			$storage = '/images/song_image/nophoto.png';
		}
//		$artist=json_encode(json_decode($artist));
		return view('admin.artists.show',compact('storage','artist'));

    }

	public function edit(Artist $id)
	{
		if (!auth()->user()->can('create',Artist::class)){
			abort(403);
		}
		$art=new ShowArtistResource($id->load('file'));

		$artist      = json_decode(json_encode($art->resource));
		if ($artist->file) {
			$path    = explode('/', $artist->file[0]->image);
			$path    = end($path);
			$storage = '/images/artist_image/' . $path;
		} else {
			$storage = '/images/song_image/nophoto.png';
		}

		return view('admin.artists.update',compact('storage','artist'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response|array
     */
    public function update(UpdateArtistRequest $request, Artist $artist)
    {
		if (!auth()->user()->can('update',Artist::class)){
			abort(403);
		}
		\DB::beginTransaction();
		try{    $artist->fill($request->all());
			$artist->update();

			if ($request->hasFile('image')){
				$file     =new File();
				$FileName = $request->file('image')->getClientOriginalName();
				$request->file('image')->move('images/artist_image', $FileName);
				$file->image = $FileName;
//				$file->update($record);

				$file->save();
				$artist->file()->detach();
				$artist->file()->attach($file->id);
			}

			\DB::commit();
			return[
				'success'=>true,
				'message'=>trans('responses.panel.music.message.update'),

			];}catch (\Exception $exception) {
			\DB::rollBack();
			return [
				'success' => false,
				'message' => $exception->getMessage(),
			];
		}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|array
     */
    public function destroy(Artist $artist)
    {
		if (!auth()->user()->can('delete',Artist::class)){
			abort(403);
		}
    	\DB::beginTransaction();
    	try{   $artist->delete();
    	$artist->file()->detach();
			\DB::commit();
			return[
				'success'=>true,
				'message'=>trans('responses.panel.music.message.delete'),
			];}catch (\Exception $exception) {
			\DB::rollBack();
			return [
				'success' => false,
				'message' => $exception->getMessage(),
			];
		}

    }

	public function restore($id)
	{
		if (!auth()->user()->can('forceDelete',Artist::class)){
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
		return Artist::select('id','name')->get();
    }
}
