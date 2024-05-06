<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function habilidad(){
        return $this->hasMany(Habilidad::class);
    }
    public function usuario(){
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
