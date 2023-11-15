<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Request;

class UserController extends Controller
{
    public function loadInfoUser(Request $request, string $id)
    {
        $user = User::where("id", $id)->first();
        return response(compact('user'));
    }

    public function editUser(EditUserRequest $request, string $id)
    {
        $data = $request->all();

        try {
            $user = User::where('id', $id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact("user"));
    }

}