<?php

namespace App\Http\Controllers\Panell\Song;

use App\Http\Controllers\Controller;
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

		$songs=Song::paginate();
		return SongIndexResorce::collection($songs);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response|array

	 *
	 */
	public function store(StoreSongRequest $request)
	{
		\DB::beginTransaction();
		try {
			$song = new Song();
			$song->fill($request->all());

			$song->save();
			$artistname=$request->artist_name;

			$artistid=\DB::table('artists')->where('name',$artistname)->value('id');
			$song->artists()->attach($artistid);
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

	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Song $song)
	{

		return new SongShowResorce($song);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response|array
	 */
	public function update(UpdateSongRequest $request, Song $song)
	{

		\DB::beginTransaction();
		try{    $song->fill($request->all());
			$song->save();
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
	public function destroy(Song $song)
	{
		\DB::beginTransaction();
		try{   $song->delete();
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
		 * @mixin Song
		 */
		\DB::beginTransaction();
		try{
			Song::onlyTrashed()->findOrFail($id)->restore();
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
		return Song::select('id','name')->get();
	}
}
