<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('article.index', [
            'articles' => Article::all()->where('is_accepted', true),
            
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    //     return view('article.create', [
    //         'categories' => Category::all(),
    //     ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', [
            'article' => $article
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
    public function categoryindex(Category $category){
        return view('article.categoryindex', [
            'category' => $category,
            'articles' => $category->articles()->get(),
        ]);
    }
    public function searchArticle(Request $request){
        $article = Article::search($request->searched)->where('is_accepted', true)->get();
        return view('article.index', [
            'articles' => $article,
        ]);
    }
}
