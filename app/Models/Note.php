<?php

namespace App\Models;
use Jenssegers\Mongodb\Model;

class Note extends Model{
	protected $fillable = ["user_id","user_name","movie_id","movie_title","note"];
}