<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;

class RoomsController extends Controller
{
    public function readAll()
    {
        $rooms = Room::all();
        return response(compact("rooms"));
    }
    public function addRoom()
    {

    }
}