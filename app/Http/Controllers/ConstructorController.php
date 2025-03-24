<?php

namespace App\Http\Controllers;




use App\Services\AnimeCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ConstructorController extends Controller
{
    public function createAnime(Request $request){


        $path = $request->file('image')->store('uploads', 'public');

        $an=new AnimeCreator();
            $anime = $an->AddAnime(
                $request->name,
                $path,
                $request->type,
                $request->episodes,
                $request->time,
                '8',
                Auth::id(),
            );
            $anime->save();
        return view('parser-result');
    }
}
