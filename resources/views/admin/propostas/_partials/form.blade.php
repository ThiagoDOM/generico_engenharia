@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300">{{ $error }}</li>
        @endforeach
    </ul>
@endif

@csrf
<label for="razao_social">Razão Social</label>
<input type="text" name="razao_social" id="razao_social" placeholder="Razao Social" value="{{ $cliente->razao_social ?? old('razao_social') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="nm_fantasia">Nome Fantasia</label>
<input type="text" name="nm_fantasia" id="nm_fantasia" placeholder="Nome Fantasia" value="{{ $cliente->nm_fantasia ?? old('nm_fantasia') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="cnpj">CNPJ</label>
<input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" maxlength="14" value="{{ $cliente->cnpj ?? old('cnpj') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="endereco">Endereço</label>
<textarea name="endereco" id="endereco" cols="30" rows="2" placeholder="Endereço" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>{{ $cliente->endereco ?? old('endereco') }}</textarea>

<label for="email">Email</label>
<input type="email" name="email" id="email" placeholder="E-mail" value="{{ $cliente->email ?? old('email') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="telefone">Telefone</label>
<input type="text" name="telefone" id="telefone" placeholder="Telefone" value="{{ $cliente->telefone ?? old('telefone') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="nm_responsavel">Nome Responsável</label>
<input type="text" name="nm_responsavel" id="nm_responsavel" placeholder="Nome Responsável" value="{{ $cliente->nm_responsavel ?? old('nm_responsavel') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="cpf">CPF</label>
<input type="text" name="cpf" id="cpf" placeholder="CPF" maxlength="11" value="{{ $cliente->cpf ?? old('cpf') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="celular">Celular</label>
<input type="text" name="celular" id="celular" placeholder="Celular" value="{{ $cliente->celular ?? old('celular') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<input type="hidden" name="id_usuario" id="id_usuario" value={{ Auth::user()->id }}>

<button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">Salvar</button>
