<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;

    public function showArticle($searchterm) {
        return DB::table('ab_article')->select('id','ab_name','ab_price','ab_description')
            ->where('ab_name','ilike',"%$searchterm%")->get();
    }
}
