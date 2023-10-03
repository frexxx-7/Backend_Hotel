<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function signup(SignupRequest $request)
    {
        $data = $request->validated();
        /** @var \app\Models\User $user */
        $user = User::create([
            'login' => $data['login'],
            'password' => bcrypt($data['password']),
        ]);

        $token = $user->createToken('main')->plainTextToken;

        return response(compact($user, $token));
    }
    public function singin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Provided email address or password in incorrect'
            ]);
        }
        /** @var User $user */

        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;
        return response(compact($user, $token));
    }

    public function logout(Request $request)
    {
        /** @var User $user */
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response('', 204);
    }
}