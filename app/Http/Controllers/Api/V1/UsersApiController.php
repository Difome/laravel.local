<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersApiController extends Controller
{

    public function getUsers()
    {
        $users = User::select('*')->orderByDesc('last_online_at')->get();

        return $users;
    }

}
