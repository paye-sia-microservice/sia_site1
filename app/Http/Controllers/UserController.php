<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;

Class UserController extends Controller {
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getUsers()
    {
        $users = User::all();
        return response()->json(['data' => $users], 200);
    }

    public function add(Request $request ){

        $rules = [
        'username' => 'required|max:20',
        'password' => 'required|max:20',
        // 'gender' => 'required|in:Male,Female',
        ];

        $this->validate($request,$rules);

        $user = User::create($request->all());
        // return $this->json($user, 200);
        return response()->json($user, 200);
    }
}