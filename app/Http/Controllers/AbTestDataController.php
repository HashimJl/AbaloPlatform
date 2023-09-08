<?php

namespace App\Http\Controllers;

use App\Models\AbTestData;
use Illuminate\Http\Request;

class AbTestDataController extends Controller
{
    public function index() {
        $data = new AbTestData();
        $data->showTestData();
    }
}
