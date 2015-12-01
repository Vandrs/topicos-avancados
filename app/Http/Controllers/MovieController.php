<?php 

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller{
	public function getFromIMDB(){
		$data = ["scripts" => ['imdb.js']];

		return view("imdb-movies",$data);
	}

	public function insertMovies(Request $request){
		DB::collection('movies')->delete();
		$movies = $request->input("movies");
		foreach($movies as $idx => $movieData){
			if($idx == 50){
				break;
			}
			Movie::create($movieData);

		}
	}
}