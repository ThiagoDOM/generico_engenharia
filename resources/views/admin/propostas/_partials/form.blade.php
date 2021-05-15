@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300">{{ $error }}</li>
        @endforeach
    </ul>
@endif

@csrf

<label for="id_cliente">Cliente</label>
<select name="id_cliente" id="id_cliente" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>
    <option value="">Selecione</option>
    @foreach ($clientes as $cliente)
    <option value="{{ $cliente->id }}">{{ $cliente->razao_social }}</option>
    @endforeach
</select>

<label for="endereco">Endereço da Obra</label>
<input type="text" name="endereco" id="endereco" placeholder="Endereço" value="{{ $proposta->endereco ?? old('endereco') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="servico">Serviço</label>
<input type="text" name="servico" id="servico" placeholder="Serviço" value="{{ $proposta->servico ?? old('servico') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="vl_total">Valor Total</label>
<input type="number" name="vl_total" id="vl_total" placeholder="Valor Total" min="1" value="{{ $proposta->vl_total ?? old('vl_total') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="vl_sinal">Sinal</label>
<input type="number" name="vl_sinal" id="vl_sinal" placeholder="Sinal" min="1" value="{{ $proposta->vl_sinal ?? old('vl_sinal') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="qt_parcelas">Quantidade de Parcelas</label>
<input type="number" name="qt_parcelas" id="qt_parcelas" placeholder="Quantidade de Parcelas" min="1" value="{{ $proposta->qt_parcelas ?? old('qt_parcelas') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="vl_parcelas">Valor das Parcelas</label>
<input type="number" name="vl_parcelas" id="vl_parcelas" placeholder="Valor das Parcelas" min="1" value="{{ $proposta->vl_parcelas ?? old('vl_parcelas') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="dt_inicio_pgto">Data de início do Pagamento</label>
<input type="date" name="dt_inicio_pgto" id="dt_inicio_pgto" value="{{ $proposta->dt_inicio_pgto ?? old('dt_inicio_pgto') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="dt_parcelas">Data das Parcelas</label>
<input type="number" name="dt_parcelas" id="dt_parcelas" placeholder="Dia do mês" min="1" max="31" value="{{ $proposta->dt_parcelas ?? old('dt_parcelas') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>

<label for="documento">Anexar Doc</label>
<input type="file" name="documento" id="documento" maxlength="11" value="{{ $proposta->documento ?? old('documento') }}" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">

<label for="status">Status</label>
<select name="status" id="status" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required>
    <option value="0">Aberta</option>
    <option value="1">Aprovada</option>
</select>

<button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">Salvar</button>

<script>
    document.getElementById('id_cliente').value = {{ $proposta->id_cliente ?? old('id_cliente') }};
    document.getElementById('status').value = {{ $proposta->status ?? old('status') }};
</script>