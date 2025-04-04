<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Anime extends Model
{
    protected $fillable=['*'];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

}
