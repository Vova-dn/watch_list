<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class SearchController
{
    public function searchProcessor(Request $request)
    {

        $type = $request->category;
        $name = $request->name;

        if($type === "Site"){
            $results = Anime::where('name', 'LIKE', "%$name%")->get();
            return view('search', ['results'=>$results]);

        }
        if($type === "anime"){

            $process=new Process(['python3',base_path('parser/parser_animevost.py'),$name]);
//        dd($data);
            $process->run();

            $output = $process->getOutput();
//            dd($process->getOutput());

            return view('main',['output'=>$output]);

        }
    }
}
