<?php

namespace App\Business;
use App\Models\User;
use App\Models\Note;
use App\Models\Movie;
use App\Models\Mdiff;

class Prediction {

	private $user;
	private $userRatedMovies;
	private $userNotRatedMovies;
	private $rankingNotes;
    
    public function make(User $user){
    	$this->user = $user;
    	$this->cleanData();
    	$this->getUserRatedMovies();
    	$this->getUserNotRatedMovies();
    	return $this->calcRates();
    }

    private function cleanData(){
    	$this->userRatedMovies;
		$this->userNotRatedMovies;
		$this->rankingNotes;
    }

    private function getUserRatedMovies(){
    	$this->userRatedMovies = Note::where('user_id',$this->user->_id)->orderBy('movie_title','ASC')->get();
	}

	private function getUserNotRatedMovies(){
		$ratedIds = $this->getRatedIds();
		$this->userNotRatedMovies = Movie::whereNotIn("_id",$ratedIds)->get();
	}

	private function getRatedIds(){
		if(empty($this->userRatedMovies)){
			$this->getUserRatedMovies();
		}
		$ratedMoviesIds = [];
		$this->userRatedMovies->each(function($ratedMovie,$index) use (&$ratedMoviesIds){	
			array_push($ratedMoviesIds, $ratedMovie->movie_id);
		});
		return $ratedMoviesIds;
	}

	private function calcRates(){
		$candidates = [];
		$this->userNotRatedMovies->each(function($movieA,$index) use (&$candidates){
			$diffNote = [];
			$this->userRatedMovies->each(function($note,$index) use($movieA,&$diffNote){
				$diff = Mdiff::where('movieA_id',$movieA->_id)->first();
				if(empty($diff)){
					$diff = Mdiff::where('movieB_id',$movieA->_id)->where('movieA_id',$note->movie_id)->first();
				}
				if(!empty($diff)){
					array_push($diffNote,$diff->diff);
				}
			});
			if(empty($diffNote)){
				$note = 0;
			} else {
				$note = array_sum($diffNote)/count($diffNote);
			}
			array_push($candidates, ['note' => $note, 'movie'=> $movieA]);
		});
		return $this->orderCandidates($candidates);
	}

	private function orderCandidates($candidates){
		/*Ordena decrescente*/
		usort($candidates,function($a,$b){
			if ($a['note'] == $b['note']) {
    			return 0;
    		}
    		return ($a['note'] > $b['note']) ? -1 : 1;
		});
		return $candidates;
	}

	public function getRatedmovies(){
		return $this->userRatedMovies;
	}

}