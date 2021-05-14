@extends('admin.layouts.app')

@section('title', 'Cliente')

@section('content')



<!--<table class="min-w-full bg-white">
    <thead>
        <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">ID</th>
            
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Razão Social</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">CNPJ</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Responsável</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">CPF</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider"></th>
        </tr>
    </thead>
    <tbody>
        
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                    #{{ $cliente->id }}
                </td>
                <!--<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                    <img src="{{ url("storage/{$cliente->image}") }}" alt="{{ $cliente->title }}" class="w-16">
                </td>--><!--
                
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $cliente->razao_social }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $cliente->cnpj }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $cliente->nm_responsavel }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $cliente->cpf }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-right">
                    <a href="{{ route('clientes.show', $cliente->id) }}" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Ver</a>
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Edit</a>
                </td>
            </tr>
        
    </tbody>
</table>
<h3>Propostas</h3>
<table class="min-w-full bg-white">
    <thead>
        <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">ID</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Razão Social</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">CNPJ</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Responsável</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">CPF</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider"></th>
        </tr>
    </thead>
    <tbody>
        
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                    #{{ $cliente->id }}
                </td>
                <!--<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                    <img src="{{ url("storage/{$cliente->image}") }}" alt="{{ $cliente->title }}" class="w-16">
                </td>-->
                <!--
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $cliente->razao_social }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $cliente->cnpj }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $cliente->nm_responsavel }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $cliente->cpf }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-right">
                    <a href="{{ route('clientes.show', $cliente->id) }}" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Ver</a>
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Edit</a>
                </td>
            </tr>
        
    </tbody>
</table>-->
<div class="container mx-auto py-8">
    
<div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">

    <div class="grid grid-cols-2">
    <div>
    <ul>
        <li><strong>Razão Social: </strong>{{ $cliente->razao_social }}</li>
        <li><strong>Nome Fantasia: </strong>{{ $cliente->nm_fantasia }}</li>
        <li><strong>CNPJ: </strong>{{ $cliente->cnpj }}</li>
        <li><strong>Endereço: </strong>{{ $cliente->endereco }}</li>
        <li><strong>Email: </strong>{{ $cliente->email }}</li>
        <li><strong>Telefone: </strong>{{ $cliente->telefone }}</li>
    </ul>
    </div>
    
    <div>
    <ul>
        <li><strong>Responsável: </strong>{{ $cliente->nm_responsavel }}</li>
        <li><strong>CPF: </strong>{{ $cliente->cpf }}</li>
        <li><strong>Celular: </strong>{{ $cliente->celular }}</li>
    </ul>
</div>
    </div>

<form action="{{ route('clientes.destroy', $cliente->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-red-500 shadow-lg focus:outline-none hover:bg-red-900 hover:shadow-none">Deletar o Post: </button>
</form>

</div>

</div>

@endsection