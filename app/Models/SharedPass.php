<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SharedPass extends Model
{
    protected $fillable = ['user_pass_id', 'shared_with_user_id', 'shared_by_user_id'];

    public function userPass()
    {
        return $this->belongsTo(UserPass::class, 'user_pass_id');
    }

    public function sharedWith()
    {
        return $this->belongsTo(User::class, 'shared_with_user_id');
    }

    public function sharedBy()
    {
        return $this->belongsTo(User::class, 'shared_by_user_id');
    }
}
