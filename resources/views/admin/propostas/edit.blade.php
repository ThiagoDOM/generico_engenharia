@extends('admin.layouts.app')

@section('title', 'Editar Proposta')

@section('content')
    <h1 class="text-center text-3xl uppercase font-black my-4">Editar Proposta</h1>

    <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
        <form action="{{ route('propostas.update', $proposta->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @include('admin.propostas._partials.form')
        </form>
    </div>
@endsection