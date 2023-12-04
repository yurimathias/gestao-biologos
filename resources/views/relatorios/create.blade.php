<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/biologos/create.css') }}">
        <link href="{{ asset('build/assets/select2.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('build/assets/jquery.min.js') }}"></script>
        <title>Novo Relatório</title>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Relatório') }}
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
            <form action="{{ route('relatorios.store') }}" method="POST">
                <!-- Token CSRF para proteção contra ataques CSRF -->
                @csrf
                <div class="form-group">
                    <x-input-label for="biologo_id" :value="__('Biólogo')" />
                    <select name="biologo_id" id="biologo_id" required>
                        <option value="">Selecione um biólogo</option>
                        @foreach ($biologos as $biologo)
                            <option value="{{ $biologo->id }}">{{ $biologo->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <x-input-label for="area_id" :value="__('Área')" />
                    <select name="area_id" id="area_id" required>
                        <option value="">Selecione uma área</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <x-input-label for="observacoes" :value="__('Observações')" />
                    <textarea name="observacoes" id="observacoes" cols="30" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <x-input-label for="animal_id" :value="__('Animais')" />
                    <select class="select2-multiple" name="animal_id[]" id="animal_id" multiple>
                        <option value="">Selecione um ou mais animais</option>
                        @foreach ($animais as $animal)
                            <option value="{{ $animal->id }}">{{ $animal->nome_cientifico . ' | ' . $animal->nome_comum }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <x-input-label for="planta_id" :value="__('Plantas')" />
                    <select class="select2-multiple" name="planta_id[]" id="planta_id" multiple>
                        <option value="">Selecione uma ou mais plantas</option>
                        @foreach ($plantas as $planta)
                            <option value="{{ $planta->id }}">{{ $planta->nome_cientifico . ' | ' . $planta->nome_comum }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('relatorios.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
    <script src="{{ asset('build/assets/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2-multiple').select2();
        });
    </script>
</x-app-layout>

