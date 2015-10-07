<?php

namespace App\Models;
use Jenssegers\Mongodb\Model;

class Movie extends Model{
	protected $fillable = ['title','description','photo'];
}
