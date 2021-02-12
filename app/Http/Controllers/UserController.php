<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'unique:users',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->messages());
        }

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
