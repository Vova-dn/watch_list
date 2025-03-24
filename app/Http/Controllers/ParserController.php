<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class ParserController extends Controller
{
    public function parseShikomori($name)
    {
        $a =
//        $data=$request->input("name");
        $process=new Process(['python3',base_path('parser/parser.py'),$name]);
//        dd($data);
        $process->run();

        $output = $process->getOutput();
        dd($process->getOutput());

        return view('main',['output'=>$output]);

    }
}
