<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AbTestData extends Model
{
    use HasFactory;

    public function showTestData() {
        $test = DB::table('ab_testdata')->get();
        //dd($test);
        return $test;
    }
}
