<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Budget extends Model
{
    //
    protected $fillable = [
        'user_id',
        'budget',
        'saving',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
