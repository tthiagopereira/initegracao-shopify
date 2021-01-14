<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;
    protected $fillable =
        ['nome','data_conclusao','status','user_id'];

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
