@extends('admin.layouts.app')

@section('title', 'Lista de Propostas')

@section('content')

<div class="container mx-auto py-8">
    <div class="margin">
        <a href="{{ route('propostas.create') }}" class="my-4 uppercase px-8 py-2 rounded bg-green-600 text-blue-50 max-w-max shadow-sm hover:shadow-lg">Cadastrar Nova Proposta</a>
        <a href="{{ route('propostas.exportar') }}" class="my-4 uppercase px-8 py-2 rounded bg-green-600 text-blue-50 max-w-max shadow-sm hover:shadow-lg">Exportar</a>
    </div>
    <div class="grid">  
        <form action="{{ route('propostas.search') }}" method="post">
            @csrf
            <div class="max-w-sm my-4 p-1 pr-0 flex items-center">
                <input type="text" name="search" placeholder="Filtrar" value="{{ $filters['search'] ?? '' }}" class="flex-1 appearance-none rounded shadow p-2 text-grey-dark mr-2 focus:outline-none">
                <button type="submit" class="uppercase p-2 rounded bg-blue-500 text-blue-50 max-w-max shadow-sm hover:shadow-lg">Filtrar</button>
            </div>
        </form>
    </div>

@if (session('message'))
    <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
        {{ session('message') }}
    </div>
@endif

@if (session('alert'))
    <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-700 bg-red-100 border border-red-300 ">
        {{ session('alert') }}
    </div>
@endif

<table class="min-w-full bg-white">
    <thead>
        <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">ID</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Cliente</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Proposta Feita em</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Início do pgto.</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Serviços</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Qtde. de parcelas</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Sinal R$</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Valor Parcela R$</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Total</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Status</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Documento</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($propostas as $proposta)
            
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                    #{{ $proposta->id }}
                </td>
                
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $proposta->razao_social }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $proposta->dt_proposta }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $proposta->dt_inicio_pgto }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $proposta->servico }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $proposta->qt_parcelas }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $proposta->vl_sinal }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $proposta->vl_parcelas }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $proposta->vl_total }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"><a onclick="statusUpdate({{ $proposta->id }})" style="cursor: pointer">{{ $proposta->status == 1?'Aprovada':'Aberta' }}</a></td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-right">
                    <a href="{{ route('propostas.show', $proposta->id) }}" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Ver</a>
                    <a href="{{ route('propostas.edit', $proposta->id) }}" class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Edit</a>
                </td>
            </tr>
            
        @endforeach
            
    </tbody>
</table>



<div class="my-4">
    @if (isset($filters))
    
        {{ $propostas->appends($filters)->links() }}
    @else
    
        {{ $propostas->links() }}
        
    @endif
</div>

</div>
<form action="{{ route('propostas.updateStatus') }}" method="post" name="statusForm" id="statusForm">
    @method('put')
    @csrf
    <input type="hidden" name="id_proposta" id="id_proposta">
</form>
<script>
function statusUpdate($idp){
    let response = confirm('Alterar Status?')
    if (response) {
        document.getElementById('id_proposta').value = $idp;
        document.statusForm.submit();
    }
}
</script>
@endsection