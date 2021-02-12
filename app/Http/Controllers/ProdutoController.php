<?php

namespace App\Http\Controllers;

class ProdutoController extends Controller
{
    public function protudos()
    {
        $url_base = 'https://269a1ec67dfdd434dfc8622a0ed77768:4e788173c35d04421ab4793044be622f@send4-avaliacao.myshopify.com';
        $caminho  = '/admin/api/2020-01/products.json';
        $produtos = file_get_contents($url_base.$caminho);
        return response()->json($produtos);
    }

    public function produtoFavorito($id)
    {
        $url_base = 'https://269a1ec67dfdd434dfc8622a0ed77768:4e788173c35d04421ab4793044be622f@send4-avaliacao.myshopify.com';
        $caminho  = '/admin/api/2021-01/products/'.$id.'.json';
        $produtos = file_get_contents($url_base.$caminho);

        return response()->json($produtos);
    }
}
