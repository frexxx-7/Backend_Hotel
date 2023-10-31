<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function readAll()
    {
        $news = News::all();
        return response(compact("news"));
    }
    public function addNews()
    {

    }
}