<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    use HasFactory;
    protected $table = 'habilidades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function anuncio_busca(){
        return $this->belongsTo(Anuncio::class, 'id_habilidad_buscada');
    }

    public function anuncio_ofece(){
        return $this->belongsTo(Anuncio::class, 'id_habilidad_ofrecida');
    }
}
