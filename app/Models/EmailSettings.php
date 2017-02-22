<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSettings extends Model
{
    protected $table = 'email_send_types';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {

        return $this->belongsToMany('App\User', 'email_send_settings', 'email_send_type_id', 'user_id');
    }
}
