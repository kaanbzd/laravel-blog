<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = DB::table('articles')->orderBy('created_at', 'desc')->paginate(1);
        return view("article.index", ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = DB::table('tags')->where('name', '=', $request->tag)->first();
        if ($tag == null) {
            $tag = new Tag;
            $tag->name = $request->tag;
            $tag->save();
        }

        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->detail;
        $article->user_id = auth()->id();
        $article->save();

        $article->tag()->attach($tag->id);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        //$comments = Article::find($id)->comments;
        return view("detail", ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        if (Gate::forUser(Auth::user())->denies('edit-post', $article)) {
            abort(403, 'Unauthorized action.');
        }

        return view("edit", ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->detail;
        $article->save();
        return redirect('/detail/' . $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Article $article)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/');
    }
}
