<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function adminInfo()
    {
        $data = file_get_contents('storage/adminInfo.txt');
        $admin_data = explode("\n", $data);
        $username = trim($admin_data[0]);
        $email = trim($admin_data[1]);
        $password = trim($admin_data[2]);
        return response(compact('username','email', 'password'));
    }
    public function addNews()
    {

    }
}