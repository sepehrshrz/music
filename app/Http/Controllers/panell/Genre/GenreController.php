<?php

namespace App\Http\Controllers\panell\Genre;

use App\Http\Controllers\Controller;
use App\Http\Models\Music\Genre;
use App\Http\Requests\panell\Genre\GenreStoreRequest;
use App\Http\Resources\panell\Genre\GenreShowResource;
use App\Jobs\SendAnSms;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
	if (!auth()->user()->can('view',Genre::class)){
		abort(403);
	}
	$genre=Genre::paginate();
	$genres=GenreShowResource::collection($genre);
//        dd($genres);
	return view('admin.genres.index',compact('genres'));
}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		if (!auth()->user()->can('create',Genre::class)){
			abort(403);
		}
		return view('admin.genres.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(GenreStoreRequest $request)
	{
$this->dispatch(new SendAnSms());
		$genre= new Genre();
		$genre-> fill($request->all());
		$genre->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
//        $genre=new GenreShowResource($id);
//
//        return view('admin.genres.show',compact('genre'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Genre $id)
	{
		if (!auth()->user()->can('update',Genre::class)){
			abort(403);
		}
		$genre=new GenreShowResource($id);
		return view('admin.genres.update',compact('genre'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
//		$genre= new Genre();
//		$genre->fill($request->all());
//		$genre->update();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Genre $genre)
	{
		if (!auth()->user()->can('delete',Genre::class)){
			abort(403);
		}
		$genre->delete();
	}
}
