<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class user_category extends Pivot
{
    protected $fillable = [
        'user_id',
        'category_id'
    ];
}
