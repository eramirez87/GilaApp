<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class channel_user extends Pivot
{
    protected $fillable = [
        'user_id',
        'channel_id'
    ];
}
