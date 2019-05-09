<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use Forecast;

class ApiController extends Controller
{   
    // Weather
    public function getWeather()
    {
        $forecast = Forecast::get('-6.21462', '106.84513');
        return $forecast;
    }

    // Article Data
    public function index()
    {
        return Article::all();
    }
    public function show($id)
    {
        return Article::find($id);
    }

    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }

}
 