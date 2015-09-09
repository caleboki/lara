<?php

namespace App\Http\Controllers;

//use Request; //Facade No longer necessary because of the validated request object passed in the store method
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;

use App\Http\Requests\ArticleRequest;

use Illuminate\Http\Request;

use Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
        $this->middleware('demo');
    }
    //
    public function index()
    {
    	//return \Auth::user()->username;
        //return 'get all articles';
    	$articles = Article::latest('published_at')->published()->get();

    	//return $articles;
    	return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
    	//return $id;
    	$article = Article::findOrfail($id);

    	//dd($article->published_at);

    	

    	//dd($article);
    	//return $article;
    	return view('articles.show', compact('article'));
    }

    public function create()
    {
    	return view('articles.create');

    }

    public function store(ArticleRequest $request)
    {
    	//validation passed in the arguement i.e ArticleRequest
    	

    	//Article::create($request->all());
        $article = new Article($request->all());

        Auth::user()->articles()->save($article);

    	return redirect('articles');
    }

    public function edit($id)
    {
    	$article = Article::findOrfail($id);
    	return view('articles.edit', compact('article'));
    }

    public function update($id, ArticleRequest $request)
    {
    	$article = Article::findOrfail($id);
    	$article->update($request->all());
    	return redirect('articles');
    }
}
