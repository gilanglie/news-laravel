<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Filter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::orderBy('created_at','DESC')->paginate(15);
        $tags = Article::select('tag')->distinct()->get();

        return view('home',['articles' => $articles,'sort' => 'DESC','tags' => $tags]);
    }

    public function sort(Request $request)
    {   
        
        // sort item
        (!$request->sortBy ? $sortBy = 'DESC' : $sortBy = $request->sortBy);
        // filter tags
        $reqTag = $request->tags;
        
        $tags = Filter::filterTags($reqTag);
        
        $new_articles = Article::when(!empty($reqTag), function ($query) use ($reqTag) {
                            return $query->whereIn('tag', $reqTag);
                        })
                            ->orderBy('created_at', $sortBy)->paginate(15);
        $new_articles->appends (array(
        'sort' => $sortBy, 'tag' => $reqTag
        ));

        return view('home', ['articles' => $new_articles,'sort' => $sortBy,'tags' => $tags]);
    }
}
