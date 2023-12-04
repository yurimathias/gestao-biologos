<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/biologos/index.css') }}">
    <script src="{{ asset('build/assets/jquery.min.js') }}"></script>
    <script src="{{ asset('build/assets/alerta.js') }}"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista Plantas') }}
        </h2>
    </x-slot>
    <div class="container">
        <form action="{{ route('plantas.index') }}" method="GET" class="search-form">
            <div class="search-container">
                <input type="text" name="search" placeholder="Pesquisar plantas..." value="{{ request()->query('search') }}" class="search-input">
                <button type="submit" class="search-button">Pesquisar</button>
            </div>
        </form>
        <a href="{{ route('plantas.create') }}" class="btn btn-primary">Criar Planta</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Científico</th>
                    <th>Nome Comum</th>
                    <th>Descrição</th>
                    <th>Área</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plantas as $planta)
                    <tr>
                        <td class="colunas">{{ $planta->id }}</td>
                        <td id="nome_cientifico">{{ $planta->nome_cientifico }}</td>
                        <td id="nome_comum">{{ $planta->nome_comum }}</td>
                        <td>{{ $planta->descricao }}</td>
                        <td id="area">{{ $planta->area_id ? $planta->area->nome : ''}}</td>
                        <td>
                            <a href="{{ route('plantas.show', $planta->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('plantas.edit', $planta->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('plantas.destroy', $planta->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger destroy">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

