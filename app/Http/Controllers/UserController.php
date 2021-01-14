<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $register = new User();
        $register->name = $request['name'];
        $register->email = $request['email'];
        $register->password = bcrypt($request['password']);
        $register->save();

        return response()->json($register);
    }

    public function show($id)
    {
        return response()->json(User::find($id));
    }

    public function update(Request $request, $id)
    {
        $register = User::find($id);
        $register->name = $request['name'];
        $register->email= $request['email'];
        if($request['password']) {
            $register->password = bcrypt($request['password']);
        }
        $register->update();
        return response()->json($register);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['message' => 'Excluido com sucesso']);
    }
}
