<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getUser()
    {
        $users = User::orderBy('id', 'desc')->get();

        return response()->json([
            'message' => 'success',
            'data' => $users,
        ]);
    }
}
