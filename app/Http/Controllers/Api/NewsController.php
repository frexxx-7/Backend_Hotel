<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Models\News;
use Request;

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
    public function oneNews(Request $request, string $id)
    {
        try {
            $news = News::all()->where("id", $id)->first();

            if (!$news)
                return response("News not found", 404);
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact("news"));
    }

    public function updateNews(CreateNewsRequest $request, string $id)
    {
        $data = $request->all();

        try {
            $news = News::where('id', $id)->update([
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

    public function deleteNews(Request $request, string $id){
        try {
            $news = News::where("id", $id)->delete();
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact("news"));
    }
    public function searchAllNews(Request $request)
    {
        $data = request('searchText');

        try {
            $news = News::whereRaw("concat(title, content) LIKE ?", ['%'.$data.'%'])->get();
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact("news"));
    }
    
}