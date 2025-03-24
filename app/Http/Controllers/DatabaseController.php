<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Services\AnimeCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\text;


class DatabaseController extends Controller
{
    public function inputDatabase(Request $request)
    {
        $an=new AnimeCreator();

        $json = $request->getContent();
        $data=json_decode($json, true);
        $n = count($data);

        for($i=0;$i<$n;$i++){
            $file = Http::get('https://animevost.org/'.$data[$i]['Photo']);
            $name = "uploads/" . uniqid() . ".jpeg";
            Storage::disk('public')->put($name, $file);
            $path = $name;

            $anime = $an->AddAnime(
                $data[$i]["name"],
                $path,
                $data[$i]["type"],
                $data[$i]["epizodes"],
                '20 min',
                '10',
                Auth::id(),
                1,
            );
            $anime->save();
        }
        return redirect()->route('anime');

    }

    public function parseDatabase()
    {
        $animes = Anime::all();
        $output = json_encode($animes);
        return view('anime', ['animes'=>$animes]);


    }

    public function titleControll(Anime $anime)
    {

        return view('title', ['anime'=>$anime]);
    }

//    public function saveImage($url)
//    {
////        $SavePath = "storage/app/public/uploads/";
//        $file = Http::get($url);
//        $path = $file->store('uploads', 'public');
//        return $path;
//        $ch = curl_init();
//        $fp = fopen($SavePath, 'wb');
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_FILE, $fp);
//        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//        curl_setopt($ch, CURLOPT_FAILONERROR, true);
//
//        $filePath = $SavePath . $name;
//
//        if (downloadFile($url, $filePath)){
//            echo "Файл успешно скачан";
//        } else {
//            echo "Не удалось скачать файл";
//        }
//
//        return $filePath;


//    }
}
