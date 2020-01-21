<?php

namespace App\Http\Controllers\panell\Category;

use App\Http\Controllers\Controller;
use App\Http\Models\Music\Categury;
use App\Http\Requests\panell\Category\CategoryStoreRequest;
use App\Http\Resources\panell\Category\CategoryIndexResource;
use App\Http\Resources\panell\Category\CategoryShowResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		if (!auth()->user()->can('view',Categury::class)){
			abort(403);
		}
		$category=Categury::paginate();
		$cats=CategoryIndexResource::collection($category);
//        dd($genres);
		return view('admin.categories.index',compact('cats'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		if (!auth()->user()->can('create',Categury::class)){
			abort(403);
		}
		return view('admin.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CategoryStoreRequest $request)
	{
		$genre= new Categury();
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
	public function edit(Categury $id)
	{
		if (!auth()->user()->can('update',Categury::class)){
			abort(403);
		}
		$cat=new CategoryShowResource($id);
		return view('admin.categories.update',compact('cat'));
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
	public function destroy(Categury $category)
	{
		if (!auth()->user()->can('delete',Categury::class)){
			abort(403);
		}
//		dd($category->id);
		$category->delete();
		return redirect()->back();
	}
}
