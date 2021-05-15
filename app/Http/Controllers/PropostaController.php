<?php

namespace App\Http\Controllers;

use App\Models\Proposta;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\PropostasExport;
//As validações são feitas nesse controller. 'StoreUpdateProposta'
use App\Http\Requests\StoreUpdateProposta;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PropostaController extends Controller
{
    //função simples que retorna o id do usuario autenticado
    private function authid(){
        return Auth::user()->id;
    }

    public function index(){
        //Pego os dados da tabela Propostas através de um INNER JOIN para que o id do User seja validado.
        //SELECT * FROM clientes JOIN propostas ON clientes.id = propostas.id_cliente WHERE id_usuario = 1;
        $propostas = Cliente::join('propostas', 'clientes.id','propostas.id_cliente')->where('id_usuario', "{$this->authid()}")->paginate(5);

        return view('admin.propostas.index', compact('propostas'));
    }

    public function show($id){
        //Verificar se existe
        if(Proposta::find($id)){
            //Pego os dados da tabela Propostas através de um INNER JOIN para que o id do User seja validado.
            $proposta = Cliente::join('propostas as prop', 'clientes.id','prop.id_cliente')->where('prop.id', "{$id}")->where('id_usuario', "{$this->authid()}")->get();
            //Verifico se retornou algum resultado, guardo em um objeto simples e retorno
            if(isset($proposta[0])){
            $proposta = $proposta[0];
            } else {
                return redirect()->route('propostas.index')->with('alert','Proposta Não encontrada!');
            }
            return view('admin.propostas.show', compact('proposta'));
        } else {
            return redirect()->route('propostas.index')->with('alert','Proposta Não encontrada!');
        } 
    }

    public function create(){
        //Pego os Clientes do usuario e retorno para fazer o input "select"
        $clientes = Cliente::select('id','razao_social')->where('id_usuario', "{$this->authid()}")->get();
        return view('admin.propostas.create', compact('clientes'));
    }

    public function store(StoreUpdateProposta $request){
        
        $data = $request->all();
        //Verifico se o documento é válido e armazeno, e reescrevo o campo da variavel $data com sua url
        if($request->documento->isValid()){
            $file = $request->documento->store('propostas'); 
            $data['documento'] = $file;
        }

        Proposta::create($data);

        return redirect()->route('propostas.index')->with('message','Proposta Criada com sucesso');
        
    }

    public function edit($id){
        //Verifica se existe
        if($proposta = Proposta::find($id)){
            //Pego os clientes para fazer o input "select"
            $clientes = Cliente::select('id','razao_social')->where('id_usuario', "{$this->authid()}")->get();
            return view('admin.propostas.edit', compact('proposta','clientes'));
        }
        return redirect()->route('propostas.index')->with('alert','Proposta Não encontrada!');
    }

    public function update(StoreUpdateProposta $request, $id){
        //Verifica se existe
        if($proposta = Proposta::find($id)){
            //Verifica se a proposta pertence ao usuario
            $verifica = Cliente::join('propostas as prop', 'clientes.id','prop.id_cliente')->where('prop.id', "{$id}")->where('id_usuario', "{$this->authid()}")->get();
            //Verifico se não retornou algum resultado
            if(!isset($verifica[0])){
                return redirect()->route('propostas.index')->with('alert','Proposta Não encontrada!');
            }
            $data = $request->all();
            //Verifica se tem documento, e se ele é válido
            if($request->documento && $request->documento->isValid()){
            //Se existir exclui o antigo para receber o novo
                if(Storage::exists($proposta->documento)){
                    Storage::delete($proposta->documento);
                }
            //Guarda o novo arquivo
            $file = $request->documento->store('propostas');
            $data['documento'] = $file;
        }
            $proposta->update($data);
            return redirect()->route('propostas.index')->with('message','Proposta Atualizada com sucesso');
        } else {
            return redirect()->route('propostas.index')->with('alert','Proposta Não encontrada!');
        } 
    }

    public function destroy($id){
        //Verifica se existe
        if($proposta = Proposta::find($id)){
            //Verifico se é pertencente ao usuario, se retornar 0 linhas, é inválido
            $userid = Cliente::select('id_usuario')->join('propostas as prop', 'clientes.id','prop.id_cliente')->where('prop.id', "{$id}")->where('id_usuario', "{$this->authid()}")->get();
            if(isset($userid[0])){
                $userid = $userid[0]->id_usuario;
            } else {
                return redirect()->route('propostas.index')->with('alert','Proposta Não encontrada!');
            }
            //Se estiver tudo certo, exclui, primeiro o arquivo, depois da base de dados
            if($userid == $this->authid()){
                if(Storage::exists($proposta->documento)){
                    Storage::delete($proposta->documento);
                }
            $proposta->delete();
            return redirect()->route('propostas.index')->with('message','Proposta Deletada com sucesso');
            }
        }  
        return redirect()->route('propostas.index')->with('alert','Proposta Não encontrada!');
    }

    public function export() 
    {
        //O Visual Studio pode acusar erro, mas está funcionando 
        return Excel::download(new PropostasExport, 'propostas.xlsx');
    }

    public function search(Request $request){
        //Pega os filtros exceto o token
        $filters = $request->except('_token');
        //Se o filtro estiver vazio redireciona para a index
        if(!isset($filters['search'])){
            return redirect()->route('propostas.index');
        }
        //Verifica se digitou 'Aberta' ou 'Aprovada', se sim, busca na coluna 'status'
        if($request->search == "Aprovada" ||  $request->search == "aprovada" || $request->search == "Aprovado" ||  $request->search == "aprovado"){
            $propostas = Cliente::join('propostas', 'clientes.id','propostas.id_cliente')->where('id_usuario', "{$this->authid()}")->where('status',"1")->paginate(5);
        } else if($request->search == "Aberta" || $request->search == "aberta" || $request->search == "Aberto" || $request->search == "aberto"){
            $propostas = Cliente::join('propostas', 'clientes.id','propostas.id_cliente')->where('id_usuario', "{$this->authid()}")->where('status',"0")->paginate(5);
        } else {
            //Se não, busca nas colunas 'Cliente' e 'Qtde. de parcelas'
            $propostas = Cliente::join('propostas', 'clientes.id','propostas.id_cliente')->where('id_usuario', "{$this->authid()}")->where('razao_social','LIKE',"%{$request->search}%")->orWhere('qt_parcelas', "{$request->search}")->paginate(5);
        }
        
        return view('admin.propostas.index', compact('propostas','filters'));
    }

    public function updateStatus(Request $request){
        //pega o id pelo request
        $id = $request->id_proposta;
        //Verifica se existe
        if($proposta = Proposta::find($id)){
            //Inverte o valor
            $proposta->status == 0 ? $proposta->status = 1 : $proposta->status = 0;
            //Salva na base de dados
            $proposta->save();
            return redirect()->route('propostas.index')->with('message','Proposta Atualizada com sucesso');
        } else {
            return redirect()->route('propostas.index')->with('alert','Proposta Não encontrada!');
        } 
    }
}
