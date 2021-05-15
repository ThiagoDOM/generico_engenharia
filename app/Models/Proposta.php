<?php

namespace App\Models;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    use HasFactory;

    
    protected $table = 'propostas';

    const CREATED_AT = 'dt_proposta';

    protected $fillable = ['dt_proposta', 'endereco','servico','vl_total','vl_sinal','qt_parcelas','vl_parcelas','dt_inicio_pgto','dt_parcelas','documento','status','id_cliente'];

    public function cliente(){
        
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
