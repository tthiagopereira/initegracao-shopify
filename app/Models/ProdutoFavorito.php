<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoFavorito extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'produto_id', 'favorito'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
