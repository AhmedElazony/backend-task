<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
//
// Route::get('/ai', function () {
//     $response = Http::withToken(config('services.openai.secret'))
//         ->post('https://api.openai.com/v1/images/generations', [
//             "model" => "dall-e-3",
//             "prompt" => "a white siamese cat",
//             "n" => 1,
//             "size" => "1024x1024"
//         ])->json();
//
//     // $response = Http::withToken(config('services.openai.secret'))
//     // ->get('https://api.openai.com/v1/models')->json();
//
//     dd($response);
// });

// Route::get('/hello,world', function () {
//     return "Hello, World";
// });
//
//
Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('/articles/create', [ArticleController::class, 'create'])
    ->name('articles.create');

Route::post('/articles/store', [ArticleController::class, 'store'])
    ->name('articles.store');

Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])
    ->name('articles.edit');

Route::put('/articles/{article}/update', [ArticleController::class, 'update'])
    ->name('articles.update');

Route::delete('/articles/{article}/destroy', [ArticleController::class, 'destroy'])
    ->name('articles.destroy');
