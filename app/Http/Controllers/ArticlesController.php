<?php

namespace App\Http\Controllers;

use Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;

class ArticlesController extends Controller
{
    //
    public function index()
    {
    	//return 'get all articles';
    	$articles = Article::latest('published_at')->get();

    	//return $articles;
    	return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
    	//return $id;
    	$article = Article::findOrfail($id);

    	

    	//dd($article);
    	//return $article;
    	return view('articles.show', compact('article'));
    }

    public function create()
    {
    	return view('articles.create');

    }

    public function store()
    {
    	$input = Request::all();
    	$input['published_at']=Carbon::now();

    	Article::create($input);
    	return redirect('articles');
    }
}
