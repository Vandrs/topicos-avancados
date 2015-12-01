<?php 

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Movie;
use App\Models\Note;
use App\Business\MakeNotes;
use App\Business\MdiffNotes;
use App\Business\Prediction;
use DB;

class PredictionController extends Controller{

	public function index(){
		$users = User::query()->orderBy('name','ASC')->get();
		$movies = Movie::query()->orderBy('title','ASC')->get(); 
		$prediction = new Prediction();
		$predictionData = [];
		$users->each(function($user,$index) use($prediction,&$predictionData){
			$rateData = [
				"predictions" => $prediction->make($user),
				"ratedMovies" => $prediction->getRatedmovies()
			];
			$predictionData[$user->id ] = $rateData;
		});
		$data = [
			"users" => $users,
			"movies" => $movies,
			"predictionData" => $predictionData
		];
		return view('prediction',$data);
	}

	public function users(){
		$users = User::all();
		$data = ['users' => $users];
		return view('users',$data);
	}

	public function user($id){
		$user = User::find($id);
		$prediction = new Prediction();
		$data = [
			"user" => $user,
			"predictions" => $prediction->make($user),
			"ratedMovies" => $prediction->getRatedmovies()
		];
		return view('user',$data); 
	}

	public function movies(){
		$movies = Movie::all();
		$data = ['movies' => $movies];
		return view('movies',$data);
	}

	public function movie($id){
		$movie = Movie::find($id);
		$notes = Note::where('movie_id',$movie->_id)->orderBy('note','DESC')->get();
		$data = [
			'movie' => $movie,
			'notes' => $notes
		];
		return view('movie',$data);
	}
}