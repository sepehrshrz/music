<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Models\Music\Like;
use App\Http\Models\Music\Song;
use App\Http\Models\User\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function sliders()
	{
// ------------------------------------ slider ------------------------------------

		$slider=Song::with('file')->where('slider',Song::SLIDERTRUE)->get();
		$slider=json_decode(json_encode($slider));
		// ------------------------------------ newmusic ------------------------------------
		$song=Song::with('file')->orderBy('created_at')->paginate(5);
		$song=json_decode(json_encode($song));
		$song=$song->data;
		return view('guest.index',compact('slider','song'));
    }

	public function single_song_view(Song $song)
	{
if (!Auth::guest()) {
	$his          = new History();
	$his->user_id = Auth::id();
	$his->save();
	$song->history()->attach($his->id);
}
// ------------------------------------ like ------------------------------------
	$count=0;
	$query=0;
	if (!Auth::guest()){

		$liked=Like::with('song')->where('user_id',Auth::id())->get();

		$liked=json_decode(json_encode($liked));
		foreach ($liked as $son){
			if ($son->song[0]->id==$song->id)
			{
				$count++;
			}
		}
		if ($count>0){$query=1;}
	}




		$song->load('file','artists','history');
		$song=json_decode(json_encode($song));
		return view('guest.single_song',compact('song','query'));
    }
}
