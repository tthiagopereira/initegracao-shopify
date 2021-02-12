<?php

namespace App\Http\Controllers;

use App\Models\ProdutoFavorito;
use App\Models\User;
use Illuminate\Http\Request;

class ProdutoFavoritoController extends Controller
{

    public function index()
    {
        return response()->json(ProdutoFavorito::all());
    }

    public function store(Request $request)
    {
        $register = new ProdutoFavorito();
        $register->fill($request->all());
        $register->save();

        $this->enviarEmail($request['user_id']);

        return response()->json($register);
    }

    public function show($id)
    {
        return response()->json(ProdutoFavorito::where('user_id','=', $id)->where('favorito','=',1)->get());
    }

    public function update(Request $request, $id)
    {
        $register = ProdutoFavorito::find($id);
        if($register) {
            $register->fill($request->all());
            $register->update();
            $this->enviarEmail($request['user_id']);
            return response()->json($register);
        }

        return response()->json(['message' => 'Não encontrado']);
    }

    public function destroy($id)
    {
        $register = ProdutoFavorito::find($id);
        if($register) {
            $register->delete();
            return response()->json(['message' => 'Registro deletado com sucesso']);
        }
        return response()->json(['message'=>'Registro não encontrado']);
    }

    public function listaFavoritos($user_id) {
        $register = ProdutoFavorito::where('user_id', $user_id)
            ->where('favorito','=',1)
            ->get();

        if($register) {
            return response()->json($register);
        }
        return response()->json(['message' => 'Não a registro']);

    }
}
