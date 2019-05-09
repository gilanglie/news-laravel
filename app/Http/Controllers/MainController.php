<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Article;
use Forecast;
use Swap;
class MainController extends Controller
{
    public function index()
    {   
        $rate = Swap::latest('EUR/USD');
        $forecast = Forecast::get('-6.21462', '106.84513');
        $articles = Article::orderBy('id','DESC')->paginate(12);
        return view('layouts.main', ['rate' => $rate,'forecast' => $forecast,'articles' => $articles]);
    }
}
