<?php

namespace App\Models;
use Jenssegers\Mongodb\Model;
class Mdiff extends Model{
	protected $collection = 'mdiff';
	protected $fillable = ["movieA_id","movieB_id","diff"];
}