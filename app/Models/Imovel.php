<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    // Informa ao Laravel que a tabela associada a este modelo é imoveis
    protected $table = 'imoveis';

    // Um imóvel pertence a uma imobiliária 'belongsTo' - Muitos para um
    public function imobiliaria()
    {
        return $this->belongsTo(Imobiliaria::class);
    }

    // Um imóvel tem um endereço 'hasOne' - Um para um
    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    // Um imovel tem muitas fotos 'hasMany' - Um para muitos
    public function fotos()
    {
        return $this->hasMany(FotoImovel::class);
    }
}
