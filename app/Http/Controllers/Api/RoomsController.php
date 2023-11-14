<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoomRequest;
use App\Models\Room;
use Request;

class RoomsController extends Controller
{
    public function readAll()
    {
        $rooms = Room::all();
        return response(compact("rooms"));
    }
    public function addRoom(CreateRoomRequest $request)
    {
        $data = $request->all();

        try {
            $room = Room::create([
                'numberOfBeds' => $data['numberOfBeds'],
                'square' => $data['square'],
                'number' => $data['number'],
                'quantityIsBusy' => $data['quantityIsBusy'],
                'image' => $data['image'],
            ]);
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact("room"));
    }
    public function oneRoom(Request $request, string $id)
    {
        try {
            $room = Room::all()->where("id", $id)->first();
            if (!$room)
                return response("Room not found", 404);
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact("room"));
    }

    public function updateRoom(CreateRoomRequest $request, string $id)
    {
        $data = $request->all();

        try {
            $room = Room::where('id', $id)->update([
                'numberOfBeds' => $data['numberOfBeds'],
                'square' => $data['square'],
                'number' => $data['number'],
                'quantityIsBusy' => $data['quantityIsBusy'],
                'image' => $data['image'],
            ]);
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact("room"));
    }
    public function deleteRoom(Request $request, string $id){
        try {
            $room = Room::where("id", $id)->delete();
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact("room"));
    }
}