<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class ApiController extends Controller
{   
    // Weather
    public function getWeather()
    {
        return Article::all();
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
 