<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subscriber
 * @package App\Models
 */
class Subscriber extends Model
{
	use SoftDeletes;
        protected $table = 'subscribers';
        protected $fillable = ['user_id', 'first_name', 'last_name', 'email'];
        
        public function lists(){
            
            return $this->belongsToMany('App\Models\ListModel', 'list_subscribers','subscriber_id','list_id');
        }
}
