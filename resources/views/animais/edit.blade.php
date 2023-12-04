
<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/biologos/edit.css') }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Animal</title>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Animal') }}
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
            <form action="{{ route('animais.update', $animal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <x-input-label for="nome_cientifico" :value="__('Nome Científico')" />
                    <input type="text" name="nome_cientifico" value="{{ $animal->nome_cientifico }}" required>
                </div>
                <div class="form-group">
                    <x-input-label for="nome_comum" :value="__('Nome Comum')" />
                    <input type="text" name="nome_comum" value="{{ $animal->nome_comum }}" required>
                </div>
                <div class="form-group">
                    <x-input-label for="descricao" :value="__('Descrição')" />
                    <input type="text" name="descricao" value="{{ $animal->descricao }}">
                </div>
                <div class="form-group">
                    <x-input-label for="area_id" :value="__('Área')" />
                    <select name="area_id" id="area_id">
                        <option value="">Selecione uma área</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}" @selected($animal->area_id == $area->id)>{{ $area->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Salvar Alterações</button>
                <a href="{{ route('animais.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
</x-app-layout>