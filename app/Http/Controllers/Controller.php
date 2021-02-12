<?php

namespace App\Http\Controllers;

use App\Models\ProdutoFavorito;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $email = '';

    public function retornaEmail($id)
    {
        $this->email = User::find($id)->email;
    }

    public function enviarEmail($user_id)
    {
        $user = User::find($user_id);
        $produto = ProdutoFavorito::where('user_id','=', $user_id)->where('favorito','=',1)->get();
        $this->retornaEmail($user_id);
        Mail::send('emails.produtoEmail',
            ['title' => 'Lista de produtos favoritos',
                'name'    => $user->name,
                'produtos' => $produto],
            function ($message)
            {
                $message->from('tthiagopereira7@gmail.com', 'THIAGO PEREIRA DOS SANTOS');
                $message->to($this->email);
            });
    }

}
