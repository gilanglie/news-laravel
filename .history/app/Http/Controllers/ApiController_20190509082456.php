<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use Forecast;

class ApiController extends Controller
{   
    // Weather
    public function getWeather(Request $request, $param1, $param2)
    {
        // $forecast = Forecast::get('-6.21462', '106.84513');
        return $request->min_posts;
    }

    public function index()
    {
        return Article::all();
    }

    public function show(Article $article)
    {
        return $article;
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
 