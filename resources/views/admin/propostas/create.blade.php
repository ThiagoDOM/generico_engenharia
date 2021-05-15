@extends('admin.layouts.app')

@section('title', 'Cadastrar Cliente')

@section('content')
    <h1 class="text-center text-3xl uppercase font-black my-4">Nova Proposta</h1>

    <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
        <form action="{{ route('propostas.store') }}" method="post" enctype="multipart/form-data">
            @include('admin.propostas._partials.form')
        </form>
    </div>
@endsection