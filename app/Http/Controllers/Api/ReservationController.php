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
      ]);
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

    return response(compact("reservation"));
  }
  public function loadInfoReservation(Request $request){  
    $data = request('idRoom');
    try {
      $reservation = Reservation::where('idRoom', $data)->get();
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
    return response(compact("reservation"));
  }
}