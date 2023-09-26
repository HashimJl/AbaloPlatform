<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $obj = new ArticleCategory();
        $data = $obj->getCategories();

        return view('categories')->with('data',$data);
    }
}
