<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStatusReservationRequest;
use App\Models\Reservation;
use App\Models\StatusReservation;
use Illuminate\Support\Facades\DB;
use Request;

class StatusReservationController extends Controller
{
  public function addStatusReservation(CreateStatusReservationRequest $request)
  {
    $data = $request->all();
    try {
      $statusReservation = StatusReservation::create([
        "name"=> $data["name"],
      ]);
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

    return response(compact("statusReservation"));
  }
}