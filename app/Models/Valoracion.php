<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $table = 'valoraciones';

    public function usuario_evaluador(){
        return $this->belongsTo(User::class, 'id_usuario_evaluador');
    }

    public function usuario_evaluado(){
        return $this->belongsTo(User::class, 'id_usuario_evaluador');
    }
}
