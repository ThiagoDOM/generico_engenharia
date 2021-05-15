<?php

namespace App\Exports;

use App\Models\Cliente;
use App\Models\Proposta;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PropostasExport implements FromCollection,ShouldAutoSize,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private function authid(){
        return Auth::user()->id;
    }
    public function headings(): array
    {
        return [
            'Cliente',
            'Endereço da obra',
            'Valor Total',
            'Sinal',
            'Quantidade de Parcelas',
            'Valor das Parcelas',
            'Data da proposta',
            'Data Início pgto',
            'Data das Parcelas',
            'Status'
        ];
    }
    public function collection()
    {
        //return Proposta::all();
        //$table = [];
        $propostas = Cliente::select('razao_social','propostas.endereco','vl_total','vl_sinal','qt_parcelas','vl_parcelas','dt_proposta','dt_inicio_pgto','dt_parcelas','status')->where('id_usuario', "{$this->authid()}")->join('propostas', 'clientes.id','propostas.id_cliente')->get();
        /*foreach($propostas as $proposta){
            if($proposta->status == 1){
                $proposta->status = "Aprovada";
            } else {
                $proposta->status = "Aberta";
            }
        $table[0] = $proposta;
        }
        $propostas = $table;
        dd($propostas);*/
        foreach($propostas as $proposta){
            
            $proposta->status == 1 ? $proposta->status = "Aprovada" : $proposta->status = "Aberta";
        }

        return $propostas;
    }
}
