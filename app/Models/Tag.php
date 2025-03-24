<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Tag extends Model
{
    protected $fillable=['*'];

    public function animes(): BelongsToMany
    {
        return $this->belongsToMany(Anime::class);
    }

}
