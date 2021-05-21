<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Proposta;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropostaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showUpdateProposta(User $user, Proposta $proposta){
        return $user->id == $proposta->cliente->id_usuario;
    }
    
}
