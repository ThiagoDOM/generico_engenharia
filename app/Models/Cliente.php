<?php

namespace App\Models;
use App\Models\Proposta;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    public $primaryKey = 'id';

    protected $fillable = ['razao_social', 'nm_fantasia','cnpj','endereco','email','telefone','nm_responsavel','cpf','celular','id_usuario'];

    public function user(){
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function propostas(){
        return $this->hasMany(Proposta::class, 'id_cliente');
    }
}
