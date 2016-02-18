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

use App\Tag;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create', 'only' => 'edit', 'only' => 'update']);
        $this->middleware('demo');
    }
    //
    public function index()
    {
    	//return \Auth::user()->username;
        //return 'get all articles';
    	$articles = Article::latest('published_at')->published()->get();


    	//return $articles;
    	return view('articles.index', compact('articles', 'latest'));
    }

    public function show(Article $article)
    {
    	return view('articles.show', compact('article'));
    }

    public function create()
    {
    	$tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));

    }

    public function store(ArticleRequest $request)
    {
    	//validation passed in the arguement i.e ArticleRequest
    	

    	//Article::create($request->all());
        //$article = new Article($request->all());

        $this->createArticle($request);

        
        

        //$article->tags()->attach($request->input('tag_list'));

        //Auth::user()->articles()->save($article);

        /*

        \Session::flash('flash_message', 'Your article has been created');
        session()->flash('flash_message_important', true);

        */
       flash()->overlay('Your article has been successfully created!', 'Good Job')->important();

    	return redirect('articles');
    }

    public function edit(Article $article)
    {
    	//$article = Article::findOrfail($id);
        $tags = Tag::lists('name', 'id');
    	return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
    	//$article = Article::findOrfail($id);
    	$article->update($request->all());

        //$article->tags()->sync($request->input('tag_list'));

        $this->syncTags($article, $request->input('tag_list'));

    	return redirect('articles');
    }

    private function syncTags(Article $article, array $tags) {

        $article->tags()->sync($tags);
    }

    private function createArticle(ArticleRequest $request)
    {

        
        $article = Auth::user()->articles()->create($request->all());
        $this->syncTags($article, $request->input('tag_list'));
        return $article;

    }

   
    }
