<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        return response()->json(Tarefa::all());
    }

    public function listUSerTarefa($id) {
        return response()->json(Tarefa::where('user_id', $id)->get());
    }

    public function store(Request $request)
    {
        return response()->json(Tarefa::create($request->all()));
    }

    public function show($id)
    {
        return response()->json(Tarefa::find($id));
    }

    public function update(Request $request, $id)
    {
        $register = Tarefa::find($id);
        $register->fill($request->all());
        $register->update();
        return response()->json($register);
    }

    public function destroy($id)
    {
        $register = Tarefa::find($id);
        if(!$register) {
            return response()->json(['message'=>'Registro nao existe']);
        }
        $register->delete();
        return response()->json(['message'=> 'Registro excluido com sucesso']);
    }
}
