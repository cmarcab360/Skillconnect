<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function usuario_emisor(){
        return $this->belongsTo(Usuario::class, 'id_usuario_emisor');
    }

    public function usuario_receptor(){
        return $this->belongsTo(Usuario::class, 'id_usuario_receptor');
    }
}
