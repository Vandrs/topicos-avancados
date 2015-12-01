<?php

namespace App\Models;
use Jenssegers\Mongodb\Model;
use App\Models\Note;
class User extends Model{
	protected $fillable = ['name','photo'];

	public function qtdAvaliacoes(){
		return Note::where("user_id",$this->_id)->count();
	}
}