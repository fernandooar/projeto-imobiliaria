<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoImovel extends Model
{
    use HasFactory;

    // Informa ao Laravel que a tabela associada a este modelo é fotos
    protected $table = 'fotos_imoveis';

    // Um imóvel tem muitas fotos 'belongsTo' - Muitos para um
    public function imovel()
    {
        return $this->belongsTo(Imovel::class);
    }
    
}
