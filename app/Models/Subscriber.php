<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subscriber extends Model
{
	use SoftDeletes;//подключение трейта
	protected $fillable = ['user_id', 'first_name', 'last_name', 'email'];   
}
