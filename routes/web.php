<?php

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage', [
        'articles' => Article:: where('is_accepted', true)->take(4)
            ->orderBy('created_at', 'desc')
            ->get(),
        'categories' => Category::all(),
    ]);
})->name('homepage');


Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');

Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/article/categoryindex/{category}', [ArticleController::class, 'categoryindex'])->name('article.categoryindex');

//Revisione
Route::get('/revisor/homepage', [RevisorController::class, 'index'])->name('revisor.index')->middleware('isRevisor');

//Accettazione dell'annuncio
Route::patch('/accetta/article/{article}', [RevisorController::class, 'acceptArticle'])->name('revisor.accept_article')->middleware('isRevisor');

//Rifiuto l'annuncio
Route::patch('/rifiuta/article/{article}', [RevisorController::class, 'rejectArticle'])->name('revisor.reject_article')->middleware('isRevisor');

//Ripristino dell'annuncio già revisionato nella lista da revisionare
Route::patch('/undo/article', [RevisorController::class, 'undoArticle'])->name('revisor.undo_article')->middleware('isRevisor');


//Richiesta per diventare Revisor
Route::patch('revisor/workWithUs', [RevisorController::class, 'addBodyToUser'])->name('revisor.addBodyToUser')->middleware('auth');

Route::get('/richiesta/revisore',[RevisorController::class, 'becomeRevisor'])->name('become.revisor')->middleware('auth');

Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

// Lavora con noi view

Route::get('revisor/workWithUs', [RevisorController::class, 'workWithUs'])->name('revisor.workWithUs')->middleware('auth');

//ricerca annuncio
Route::get('/article/search', [ArticleController::class, 'searchArticle'])->name('article.search');

//cambio lingue
Route::post('/setLanguage/{lang}', [Controller::class, 'setLanguage'])->name('set.locale');


