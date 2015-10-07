<?php

namespace App\Models;
use Jenssegers\Mongodb\Model;
class User extends Model{
	protected $fillable = ['name','photo'];
}