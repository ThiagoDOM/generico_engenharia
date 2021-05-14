<?php

namespace App\Http\Controllers;

use App\Models\Proposta;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PropostaController extends Controller
{
    public function index(){
        //$propostas = Proposta::with('cliente')->get();
        //$clientes = Cliente::where('id_usuario', "1")->paginate(10);
        
        $propostas = Cliente::where('id_usuario', "1")->join('propostas', 'clientes.id','propostas.id_cliente')->get();
        //$proposta = $clientes->propostas;
        //$user = User::where('id', "{$id}")->first();
        //$clientes = $user->clientes; 
        //$propostas = ['id' => '2'];
        //$proposta = Proposta::with('cliente')->get();
        //$cliente = $proposta->cliente->razao_social; 
        //$proposta =
        
        //dd($propostas);
        return view('admin.propostas.index', compact('propostas'));
    }
}
