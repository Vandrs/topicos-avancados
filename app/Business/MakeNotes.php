<?php

namespace App\Business;
use App\Models\User;
use App\Models\Movie;

class MakeNotes {
	
    private $movies;
    private $users;

    public function __construct($users, $movies){
    	$this->users = $users;
    	$this->movies = $movies;
    }
    
    public function makeNotes($rangeNotas, $qtdProjectToAval = 0){
        $avaliacoes = [];
        foreach($this->users as $usuario){
            $moviesAvaliar = $this->removeProjetos($usuario,$this->movies, $qtdProjectToAval);
            $notes = $this->makeNotas($moviesAvaliar, $rangeNotas);
            foreach($notes as $idx => $note){
            	$notes[$idx]["user_id"] = $usuario->_id;
                $notes[$idx]["user_name"] = $usuario->name;
            }
            array_push($avaliacoes, $notes);
        }
        return $avaliacoes;
    }
    
    private function makeNotas($moviesAvaliar, $rangeNotas){
        $avaliacoes = [];
        foreach($moviesAvaliar as $movie){
            $nota = rand($rangeNotas["MIN"], $rangeNotas["MAX"]);
            $avaliacao = [
            	"note" => $nota,
                "movie_id" => $movie->_id,
                "movie_title" => $movie->title
            ];
            array_push($avaliacoes,$avaliacao);
        }
        return $avaliacoes;
    }
    
    private function removeProjetos($usuario, $movies, $qtdProjectToAval){
        $moviesAvaliar = $movies;
        $qtdProjetos = count($moviesAvaliar);
        if($qtdProjectToAval != 0 && $qtdProjetos > $qtdProjectToAval){
            $qtdProjetosRemover =  ($qtdProjectToAval - $qtdProjetos)*-1;
            for($i = 1; $i <= $qtdProjetosRemover; $i++){
                unset($moviesAvaliar[rand(0, count($moviesAvaliar)-1)]);
            }
        }
        return $moviesAvaliar;
    }
}