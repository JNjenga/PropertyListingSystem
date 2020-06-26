<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return response(['data' => $users ], 200);
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        return response(['data' => $user ], 201);

    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return response(['data', $user ], 200);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response(['data' => $user ], 200);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response(['data' => null ], 204);
    }
}
