<?php

use App\Http\Controllers\AutorisationController;
use App\Http\Controllers\ConstructorController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\ParserController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function (){
    return view('autorisation');
});
Route::get('/', [ContentController::class, 'ExtractContent']);

Route::post('/aculk', [AutorisationController::class, 'authenticate'])->name('kisinka');

Route::post('/animes',[DatabaseController::class, 'inputDatabase'])->middleware('auth');;
Route::get('/animes',[DatabaseController::class, 'parseDatabase'])->name('anime')->middleware('auth');

Route::get('/title/{anime}', [DatabaseController::class, 'titleControll'])->name('GiveMeTitle')->middleware('auth');

Route::get('/parser-result', function (){
   return view('parser-result');
})->middleware('auth');

Route::post('/main', [AutorisationController::class, 'CreateUser'])->name('autoriz');

Route::post('/constructor', [ConstructorController::class, 'createAnime'])->middleware('auth');

Route::post('/search', [SearchController::class, 'searchProcessor'])->middleware('auth');
