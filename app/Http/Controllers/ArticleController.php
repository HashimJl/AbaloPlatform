<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getArticle() {
        $searchterm = strtolower(last(request()->segments()));
        $imgNames = scandir("articleimages");
        $object = new Article();
        $data = $object->showArticle($searchterm);

        return view('articles')
            ->with('data',$data)
            ->with('imgNames',$imgNames);
    }

    public function getAllArticles() {
        $obj = new Article();
        $data = $obj->allArticles();
        $imgNames = scandir("articleimages");

        return view('articles')
            ->with('data', $data)
            ->with('imgNames', $imgNames);
    }

    public function newArticle(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|gt:0|numeric',
            'desc' => 'nullable'
        ]);
        $name = $validated['name'];
        $price = $validated['price']*100;
        $desc = $validated['desc'];

        $now = date("Y-m-d H:i:s");
        $obj = new Article();
        $data = $obj->insertArticle($name,$price,$desc, $now);
        return redirect('newarticle');

    }

    public function getArticle_api() {
        $searchterm = strtolower(last(request()->segments()));
        $object = new Article();
        $data = $object->showArticle($searchterm);
        return json_encode($data);
    }

    public function getArticleID_api($id) {
        $obj = new Article();
        $data = $obj->getArticleID($id);
        return json_encode($data);
    }

    public function deleteArticle_api($id) {
        $obj = new Article();
        $obj->deleteArticle($id);
    }

    public function addToShoppingcart_api($id) {
        dd($id);
        /*
        $obj = new Article();
        $now = date("Y-m-d H:i:s");
        $obj->addToShoppingcart($id, $now);
        */
    }
}
