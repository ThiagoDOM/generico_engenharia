<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCliente;
use App\Models\Cliente;
use App\Models\Proposta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClienteController extends Controller
{
    //função simples que retorna o id do usuario autenticado
    private function authid(){
        return Auth::user()->id;
    }

    public function index(){
        //Pega todos os clientes que pertencem ao usuario autenticado
        $clientes = Cliente::where('id_usuario', "{$this->authid()}")->paginate(5);
        
        return view('admin.clientes.index', compact('clientes'));
    }

    public function create(){
        return view('admin.clientes.create');
    }

    public function store(StoreUpdateCliente $request){
        
        //Reescreve o campo 'id_usuario' para impedir ataques
        $request->id_usuario = Auth::user()->id;
       
        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('message','Cliente Cadastrado com Sucesso');
    }

    public function show($id){
        
        if($cliente = Cliente::find($id)){
            //Verifico se o cliente pertence ao Usuario autenticado
            if($cliente->id_usuario == $this->authid())
                $propostas = Proposta::where('id_cliente',"{$id}")->get();
                
                return view('admin.clientes.show', compact('cliente','propostas'));
        } 
        return redirect()->route('clientes.index')->with('alert','Cliente Não encontrado!');
    }

    public function destroy($id){
        if($cliente = Cliente::find($id)){
            //Verifico se o cliente pertence ao Usuario autenticado
            if($cliente->id_usuario == $this->authid()){
            $cliente->delete();
            return redirect()->route('clientes.index')->with('message','Cliente Deletado com sucesso');
            }
        }  
        return redirect()->route('clientes.index')->with('alert','Cliente Não encontrado!');
    }

    public function edit($id){
        
        if($cliente = Cliente::find($id)){
            //Verifico se o cliente pertence ao Usuario autenticado
            if($cliente->id_usuario == $this->authid())
                return view('admin.clientes.edit', compact('cliente'));
        }
        return redirect()->route('clientes.index')->with('alert','Cliente Não encontrado!');
    }

    public function update(StoreUpdateCliente $request, $id){

        if($cliente = Cliente::find($id)){
            $data = $request->all();          
            //Verifico se o cliente pertence ao Usuario autenticado
            if($cliente->id_usuario == $this->authid()){
                $cliente->update($data);
                return redirect()->route('clientes.index')->with('message','Cliente Atualizado com sucesso');
            }
        }
        return redirect()->route('clientes.index')->with('alert','Cliente Não encontrado!');
    }
}
