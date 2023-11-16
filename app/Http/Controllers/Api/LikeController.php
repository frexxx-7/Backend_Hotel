<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLikeRequest;
use App\Models\Like;
use Illuminate\Support\Facades\Storage;

class LikeController extends Controller
{
    public function like(CreateLikeRequest $request)
    {
      $data = $request->all();

        try {
            $like = Like::create([
                'idUser' => $data['idUser'],
                'idNews' => $data['idNews'],
            ]);
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact('like'));
    }
    public function checkLike(CreateLikeRequest $request)
    {
      $data = $request->all();

        try {
            $like = Like::where('idUser', $data['idUser'])->where('idNews', $data['idNews'])->first();
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact('like'));
    }
    public function deleteLike(CreateLikeRequest $request)
    {
      $data = $request->all();

        try {
            $like = Like::where('idUser', $data['idUser'])->where('idNews', $data['idNews'])->delete();
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact('like'));
    }
}