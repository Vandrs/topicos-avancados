<?php

namespace App\Models;
use Jenssegers\Mongodb\Model;

class Movie extends Model{
	protected $fillable = ['imdb_ref','title','description','image_url'];
}
