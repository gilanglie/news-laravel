<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Article;

class ArticleController extends Controller
{
    public function index($id)
    {
        $article = Article::find($id);
        return view('layouts.article', ['article' => $article]);
    }
    public function add(Request $request)
    {
        $this->validate($request,[
    		'title' => 'required',
    	]);
        if(!$request->imgFile){ 
            $img = $request->imgUrl;
        }else{
            $file = $request->file('imgFile');
            $uploadDir = 'uploads';
            $path = url($file->move($uploadDir,$file->getClientOriginalName()));
            $img =  $path;
        };
        Article::create([
            'title' => $request->title,
            'img' => $img,
            'tag' => $request->tag,
            'text' => $request->text,
    	]);
 
    	return redirect('/home');
    }
    public function update($id, Request $request)
    {
        $this->validate($request,[
    		'title' => 'required',
        ]);

        if(!$request->imgFile){ 
            $img = $request->imgUrl;
        }else{
            $file = $request->file('imgFile');
            $uploadDir = 'uploads';
            $path = url($file->move($uploadDir,$file->getClientOriginalName()));
            $img =  $path;
        };

        $article = Article::find($id);
        $article->title = $request->title;
        $article->img = $img;
        $article->tag = $request->tag;
        $article->text = $request->text;
        $article->save();
        return redirect('/home');
    }
    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/home');
    }
}
