
<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/biologos/edit.css') }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Biólogo</title>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Biólogo') }}
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
            <form action="{{ route('biologos.update', $biologo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <x-input-label for="nome" :value="__('Name')" />
                    <input type="text" name="nome" value="{{ $biologo->nome }}">
                </div>
                <div class="form-group">
                    <x-input-label for="especialidade" :value="__('Especialidade')" />
                    <input type="text" name="especialidade" value="{{ $biologo->especialidade }}">
                </div>
                <div class="form-group">
                    <x-input-label for="data_nascimento" :value="__('Data de Nascimento')" />
                    <input type="date" name="data_nascimento" value="{{ $biologo->data_nascimento }}">
                </div>
                <button type="submit" class="btn btn-success">Salvar Alterações</button>
                <a href="{{ route('biologos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
</x-app-layout>

