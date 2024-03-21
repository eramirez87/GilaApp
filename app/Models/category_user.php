<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class category_user extends Pivot
{
    protected $fillable = [
        'user_id',
        'category_id'
    ];
}
