<?php

namespace App\Business;

use App\Models\User;
use App\Models\Movie;
use App\Models\Note;
use App\Business\MakeNotes;
use DB;

class RateMovies {
    public static function doAction(){
        $users = User::all();
        $movies = Movie::all();
        $notesMaker = new MakeNotes($users->all(),$movies->all());
        $rangeNotes = ["MIN"=>3,"MAX"=>10];
        $avaliacoes = $notesMaker->makeNotes($rangeNotes,6);
        DB::collection('notes')->delete();
        $notes = [];
        foreach($avaliacoes as $avaliacoesUsuario){
            foreach($avaliacoesUsuario as $avaliacoaUsuario){
                array_push($notes,Note::create($avaliacoaUsuario));
            }
        }
        return count($notes);
    }
}