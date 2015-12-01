<?php

namespace App\Models;
use Jenssegers\Mongodb\Model;
use App\Models\Note;

class Movie extends Model{
	protected $fillable = ['imdb_ref','title','description','image_url'];

	public function qtdAvaliacoes(){
		return Note::where("movie_id",$this->_id)->count();
	}

	public function nota(){
		$notes = Note::where("movie_id",$this->_id)->get();
		$qtd = $notes->count();
		if(empty($qtd)){
			return 0;
		}

		$total = 0;
		$notes->each(function($note,$index)use(&$total){
			$total += $note->note;
		});
		$media = $total/$qtd;
		return number_format($media,1,',','.');
	}
}
