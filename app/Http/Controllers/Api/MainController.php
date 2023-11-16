<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Request;

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
    public function searchRooms(Request $request)
    {
        $data = request('searchText');

        try {
            $rooms = Room::whereRaw("concat(numberOfBeds, square, number, quantityIsBusy, price) LIKE ?", ['%'.$data.'%'])->get();
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact("rooms"));
    }
}