<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imobiliaria extends Model
{
    use HasFactory;

    // Informa ao Laravel que a tabela associada a este modelo é imobiliarias
    protected $table = 'imobiliarias';

    // Uma imobiliária pode ter vários imóveis 'hasMany' - Um para muitos
    public function imoveis()
    {
        return $this->hasMany(Imovel::class);
    }

    // Uma imobiliaria pertence a um endereço 'belongsTo' - Muitos para um
    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    // Uma imobiliária tem muitos usuários (funcionarios) 'hasMany' - Um para muitos
    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
    

}
