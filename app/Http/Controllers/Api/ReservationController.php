<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReservationRequest;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Request;

class ReservationController extends Controller
{
  public function addReservation(CreateReservationRequest $request)
  {
    $data = $request->all();
    try {
      $reservation = Reservation::create([
        "idUser"=> $data["idUser"],
        "idRoom"=> $data["idRoom"],
        "idStatus"=> $data["idStatus"],
        "arrivalDate"=> $data["arrivalDate"],
        "departureDate"=> $data["departureDate"],
      ]);
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

    return response(compact("reservation"));
  }
  public function loadInfoReservation(Request $request){  
    $data = request('idRoom');
    try {
      $reservation = Reservation::leftJoin('status_reservations', 'reservations.idStatus', '=', 'status_reservations.id')-> where('idRoom', $data)->get();
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
    return response(compact("reservation"));
  }
  public function userRooms(Request $request, string $id)
    {
        try {
            $rooms = Reservation::leftJoin('rooms', 'rooms.id', '=', 'reservations.idRoom')->where("idUser", $id)->get();
            if (!$rooms)
                return response("Room not found", 404);
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact("rooms"));
    }
}