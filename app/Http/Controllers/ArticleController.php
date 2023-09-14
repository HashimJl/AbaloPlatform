<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getArticles() {
        $searchterm = strtolower(last(request()->segments()));
        $imgNames = scandir("articleimages");
        $object = new Article();
        $data = $object->showArticle($searchterm);

        return view('articles')
            ->with('data',$data)
            ->with('imgNames',$imgNames);
    }
}
