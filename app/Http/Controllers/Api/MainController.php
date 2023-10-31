<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Room;

class MainController extends Controller
{
    public function readNewsAndRooms()
    {
        $news = News::all();
        $rooms = Room::all();
        return response(compact("news", "rooms"));
    }
    public function addNews()
    {

    }
}