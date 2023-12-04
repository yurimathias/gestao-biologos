<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/biologos/create.css') }}">
        <title>Nova Área</title>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Área') }}
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
            <form action="{{ route('areas.store') }}" method="POST">
                <!-- Token CSRF para proteção contra ataques CSRF -->
                @csrf
                <div class="form-group">
                    <x-input-label for="nome" :value="__('Name')" />
                    <input type="text" name="nome" required>
                </div>
                <div class="form-group">
                    <x-input-label for="descricao" :value="__('Descrição')" />
                    <input type="text" name="descricao">
                </div>
                <div class="form-group">
                    <x-input-label for="responsavel_id" :value="__('Responsável')" />
                    <select name="responsavel_id" id="responsavel_id">
                        <option value="">Selecione um biólogo</option>
                        @foreach ($biologos as $biologo)
                            <option value="{{ $biologo->id }}">{{ $biologo->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
</x-app-layout>

