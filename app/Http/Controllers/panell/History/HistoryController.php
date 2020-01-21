<?php

namespace App\Http\Controllers\panell\History;

use App\Http\Controllers\Controller;
use App\Http\Models\Music\Genre;
use App\Http\Models\User\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
	public function analyze_data($id)
	{

		$history=History::where('user_id',$id)->get();
		$history->load('user','song.artists','song.genre');
		$history=json_decode(json_encode($history));
//		dd($history);
		return view('admin.history.index',compact('history'));
    }

	public function sort_history($id)
	{


// ------------------------------------ get history ------------------------------------

		$history=History::where('user_id',$id)->get();
		$history->load('user','song.artists','song.genre');
		$history=json_decode(json_encode($history));


		$array=0;
		// ------------------------------------ get genre ------------------------------------

		$genre=Genre::all();
		$genre=json_decode(json_encode($genre));
		foreach ($genre as $genr){
// ------------------------------------ input genre to array ------------------------------------

			$genret=$genr->genre_name;
			$result[$array]=array($genret=>0);
// ------------------------------------ analyze genre ------------------------------------

			foreach ($history as $hist){
				foreach ($hist->song as $song){
					foreach ($song->genre as $genres){

						if ($genres->genre_name==$genret){
							$result[$array][$genret]++;
						}
					}
				}

			}

			$array++;

		}
//		$sorts[0]=$result;


//	$result=json_decode(json_encode($result));
//dd($result);
//		for ($x=1;$x<count($result);$x++){
//			$a=$result[$x];
//
//			$b=array_keys($a);
//			dd(array_keys($result[$x])[0]);
//			$d=$b[0];
//			dd($a[$d]);
//		}


return view('admin.history.sort_data',compact('result','history'));




    }
}
