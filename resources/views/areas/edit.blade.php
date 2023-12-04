
<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/biologos/edit.css') }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Área</title>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Área') }}
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
            <form action="{{ route('areas.update', $area->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <x-input-label for="nome" :value="__('Name')" />
                    <input type="text" name="nome" value="{{ $area->nome }}" required>
                </div>
                <div class="form-group">
                    <x-input-label for="descricao" :value="__('Descrição')" />
                    <input type="text" name="descricao" value="{{ $area->descricao }}">
                </div>
                <div class="form-group">
                    <x-input-label for="responsavel_id" :value="__('Responsável')" />
                    <select name="responsavel_id" id="responsavel_id">
                        <option value="">Selecione um biólogo</option>
                        @foreach ($biologos as $biologo)
                            <option value="{{ $biologo->id }}" @selected($area->responsavel_id == $biologo->id)>{{ $biologo->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Salvar Alterações</button>
                <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
</x-app-layout>