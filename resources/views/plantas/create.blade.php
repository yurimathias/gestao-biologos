<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/biologos/create.css') }}">
        <title>Novo Planta</title>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Planta') }}
        </h2>
    </x-slot>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Sucesso!</strong>
        <span class="block sm:inline">{{ session('success') }}</div>
        </div>
    @endif
    <body>
        <div class="container">
            <form action="{{ route('plantas.store') }}" method="POST">
                <!-- Token CSRF para proteção contra ataques CSRF -->
                @csrf
                <div class="form-group">
                    <x-input-label for="nome_cientifico" :value="__('Nome Científico')" />
                    <input type="text" name="nome_cientifico" required>
                </div>
                <div class="form-group">
                    <x-input-label for="nome_comum" :value="__('Nome Comum')" />
                    <input type="text" name="nome_comum" required>
                </div>
                <div class="form-group">
                    <x-input-label for="descricao" :value="__('Descrição')" />
                    <input type="text" name="descricao">
                </div>
                <div class="form-group">
                    <x-input-label for="area_id" :value="__('Área')" />
                    <select name="area_id" id="area_id">
                        <option value="">Selecione uma área</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('plantas.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
</x-app-layout>

