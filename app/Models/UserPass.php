<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPass extends Model
{
    protected $fillable = ['app_name', 'password', 'username', 'notes'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
