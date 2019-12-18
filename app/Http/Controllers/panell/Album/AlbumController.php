<?php

namespace App\Http\Controllers\Panell\Album;

use App\Http\Controllers\Controller;
use App\Http\Models\Music\Album;
use App\Http\Models\Music\Artist;
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
        $albums=Album::paginate();
        return AlbumIndexResource::collection($albums);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request|array|
	 *
	 * @return \Illuminate\Http\Response|array
	 *
	 */
    public function store(AlbumStoreRequest $request,Album $album)
    {
    	\DB::beginTransaction();
    	try{
			$album->fill($request->all());
			$album->save();
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
        return new AlbumSowResource($album);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id

	 * @return \Illuminate\Http\Response|array
	 */
    public function update(AlbumUpdateRequest $request, Album $album)
    {
        \DB::beginTransactin();
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
		\DB::beginTransactin();
		try{
			$album->delete();
			DB::commit();
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
		return Album::select('id','name')->get();
	}
}
