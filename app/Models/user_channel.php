<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class user_channel extends Pivot
{
    protected $fillable = [
        'user_id',
        'channel_id'
    ];
}
