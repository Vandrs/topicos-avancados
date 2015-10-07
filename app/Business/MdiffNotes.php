<?php

namespace App\Business;

use App\Models\User;
use App\Models\Movie;
use App\Models\Note;
use App\Models\Mdiff;
use DB;

class MdiffNotes{

	/*
		# Fase de preprocessamento na qual é calculada a diferença
		# entre todos os item-item valores.
		1. para cara item i
		2.  para cada item j
		3.   para cada usuário u que expressa preferência por i e j
		4. 	 adicione a diferença entre as preferências i e j `a matriz de diferenças
		(formando uma média das diferenças entre i e j) 
	*/

	private $users;
	private $qtdDiffs = 0;


	public function make(){
		$this->dropMdiff();
		$this->users = User::all()->all();
		$movies = Movie::all()->all();
		foreach($movies as $movieA){
			foreach($movies as $movieB){
				if( (string)$movieA->_id != (string)$movieB->_id){
					$this->addMdiff($movieA,$movieB);
				}
			}
		}
		return $this->qtdDiffs;
	}

	public function addMdiff($movieA,$movieB){
		foreach($this->users as $user){
			$noteA = Note::where("movie_id",$movieA->id)
			             ->where("user_id",$user->id)->first();
			$noteB = Note::where("movie_id",$movieB->id)
			             ->where("user_id",$user->id)->first();
			if($noteA && $noteB){
				$diff = $noteA->note - $noteB->note;
				$data = [
					"movieA_id" => $noteA->id,
					"mobieB_id" => $noteB->id, 
					"diff"      => $diff
				];
				Mdiff::create($data);
				$this->qtdDiffs++;
			}
		}
	}

	private function dropMdiff(){
		DB::collection('mdiff')->delete();
	}

}


