<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'user_id', 'login_time', 'logout_time',
    ];

    protected $dates = [
        'login_time', 'logout_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
