<?php

namespace App\Services;

use App\Models\Anime;

class AnimeCreator
{

    public function AddAnime(string $name,
                             string $image,
                             string $type,
                             string $episodes,
                             string $duration,
                             string $rating,
                             int    $id,
                             int    $visibility = 1): Anime
    {
        $anime = new Anime();
        $anime->name = $name;
        $anime->image = $image;
        $anime->type = $type;
        $anime->episodes = $episodes;
        $anime->duration = $duration;
        $anime->rating = $rating;
        $anime->user_id = $id;
        $anime->visibility_type = $visibility;
        return $anime;
    }



}
