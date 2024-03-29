<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    //
    protected $fillable = [
       'category'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function expense(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
