<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;

    public function allArticles() {
        return DB::table('ab_article')->select('*')->get();
    }
    public function showArticle($searchterm) {
        return DB::table('ab_article')->select('id','ab_name','ab_price','ab_description')
            ->where('ab_name','ilike',"%$searchterm%")->get();
    }
    public function insertArticle($name, $price, $desc, $date) {
        DB::table('ab_article')->insert([
            'ab_name' => $name,
            'ab_price' => $price,
            'ab_description' => $desc,
            "ab_creator_id" => 1,
            "ab_createdate" => $date
        ]);
    }
}
