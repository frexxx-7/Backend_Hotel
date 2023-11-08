<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Room;

class MainController extends Controller
{
    public function readNewsAndRooms()
    {
        try {
            $news = News::all()->sortByDesc("created_at")->take(4);
            $rooms = Room::all()->sortByDesc("created_at")->take(4);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

        return response(compact("news", "rooms"));
    }
    public function addNews()
    {

    }
}