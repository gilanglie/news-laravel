<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use Forecast;
use Filter;
class ApiController extends Controller
{   
    // Weather
    public function getWeather(Request $request)
    {
        $forecast = Forecast::get($request->lat, $request->long);
        return $forecast;
    } 

    public function index(Request $request)
    {
        // sort 
        (!$request->sortBy ? $sortBy = 'DESC' : $sortBy = $request->sortBy);
        // filter tags
        $reqTag = $request->tags;
        // offset pagination
        $skip = $request->skip;


        $tags = Filter::filterTags($reqTag);

        $article =  Article::when(!empty($reqTag), function ($query) use ($reqTag) {
                        return $query->whereIn('tag', $reqTag);
                    })->orderBy('created_at', $sortBy)
                      ->skip($skip)
                      ->take(5)
                      ->get();

        foreach($article as $item) {
                $item['date'] = $item->created_at->diffForHumans();              
        };
        $callback = [];
        $callback['articles'] = $article;
        $callback['tags'] = $tags;
        
        return  $callback;
    }
    public function show($id)
    {
        $article = Article::find($id);
        $article['date'] = $article->created_at->diffForHumans(); 
        return $article;
    }
  
}
 