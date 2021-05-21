@extends('admin.layouts.app')

@section('title', 'Cliente')

@section('content')

<div class="container mx-auto py-8">
    
<div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">

    <div class="grid grid-cols-2">
    <div>
    <ul>
        <li><strong>Cliente: </strong>{{ $proposta->cliente->razao_social }}</li>
        <li><strong>Endereço: </strong>{{ $proposta->endereco }}</li>
        <li><strong>Valor Total: </strong>{{ $proposta->vl_total }}</li>
        <li><strong>Sinal: </strong>{{ $proposta->vl_sinal }}</li>
        <li><strong>Quantidade de Parcelas: </strong>{{ $proposta->qt_parcelas }}</li>
        <li><strong>Valor das Parcelas: </strong>{{ $proposta->vl_parcelas }}</li>
    </ul>
    </div>
    
    <div>
    <ul>
        <li><strong>Data da proposta: </strong>{{ $proposta->dt_proposta }}</li>
        <li><strong>Data Início pgto: </strong>{{ $proposta->dt_inicio_pgto }}</li>
        <li><strong>Data das Parcelas: </strong>{{ $proposta->dt_parcelas }}</li>
        <li><strong>Documento: </strong> <a href="{{ url("storage/$proposta->documento") }}">Baixar</a> </li>
        <li><strong>Status: </strong>{{ $proposta->status == 1?'Aprovada':'Aberta' }}</li>
    </ul>
</div>
    </div>

<form action="{{ route('propostas.destroy', $proposta->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-red-500 shadow-lg focus:outline-none hover:bg-red-900 hover:shadow-none">Deletar a Proposta</button>
</form>

</div>

</div>

@endsection