<?php 

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Movie;
use App\Models\Note;
use App\Business\MakeNotes;
use App\Business\MdiffNotes;
use DB;

class TesteController extends Controller{
	public function index(){
		$makeDiffnotes = new MdiffNotes();
		return $makeDiffnotes->make();
	}
}