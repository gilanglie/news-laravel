<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


use App\Article;
use Forecast;
use Swap;
use Filter;

class MainController extends Controller
{
    public function index()
    {   
        $rate = Swap::latest('EUR/USD');
        $forecast = Forecast::get('-6.21462', '106.84513');
        $articles = Article::orderBy('created_at','DESC')->paginate(15);
        $tags = Article::select('tag')->distinct()->get();

        return view('layouts.main', ['rate' => $rate,'forecast' => $forecast,'articles' => $articles,'sort' => 'DESC','tags' => $tags]);
    }
    
    
    public function sort(Request $request)
    {   
        
        $rate = Swap::latest('EUR/USD');
        $forecast = Forecast::get('-6.21462', '106.84513');
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
        
        return view('layouts.main', ['rate' => $rate,'forecast' => $forecast, 'articles' => $new_articles,'sort' => $sortBy,'tags' => $tags]);
    }
}
