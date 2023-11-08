<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Models\News;

class NewsController extends Controller
{
    public function readAll()
    {
        $news = News::all();
        return response(compact("news"));
    }
    public function addNews(CreateNewsRequest $request)
    {
        $data = $request->all();

        try {
            $news = News::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'image' => $data['image'],
                'is_published' => $data['is_published'],
            ]);
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact("news"));
    }
}