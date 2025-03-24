<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\User;

class ContentController
{
    public function ExtractContent(){


        $animes = Anime::all();
        $animes_1 = $animes->slice(0,5);
        $animes_2 = $animes->slice(5,5);
        $animes_3 = $animes->slice(10,5);


        return view('partials.main-page',['animes_1'=>$animes_1, 'animes_2'=>$animes_2, 'animes_3'=>$animes_3]);
    }
}
