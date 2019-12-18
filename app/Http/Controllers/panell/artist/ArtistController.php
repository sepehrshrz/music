<?php

namespace App\Http\Controllers\panell\artist;

use App\Http\Controllers\Controller;
use App\Http\Models\Music\Artist;
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

        $artists=Artist::paginate();
        return ArtistIndexResource::collection($artists);

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
		\DB::beginTransaction();
		try {
			$artist = new Artist();
			$artist->fill($request->all());
			$artist->save();
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


  return new ShowArtistResource($artist);


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

		\DB::beginTransaction();
		try{    $artist->fill($request->all());
			$artist->save();
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
    	\DB::beginTransaction();
    	try{   $artist->delete();
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
