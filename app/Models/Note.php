<?php

namespace App\Models;
use Jenssegers\Mongodb\Model;

class Note extends Model{
	protected $fillable = ["user_id","movie_id","note"];
}