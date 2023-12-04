<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/biologos/index.css') }}">
    <script src="{{ asset('build/assets/jquery.min.js') }}"></script>
    <script src="{{ asset('build/assets/alerta.js') }}"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista Áreas') }}
        </h2>
    </x-slot>
    <div class="container">
        <form action="{{ route('areas.index') }}" method="GET" class="search-form">
            <div class="search-container">
                <input type="text" name="search" placeholder="Pesquisar áreas..." value="{{ request()->query('search') }}" class="search-input">
                <button type="submit" class="search-button">Pesquisar</button>
            </div>
        </form>
        <a href="{{ route('areas.create') }}" class="btn btn-primary">Criar Área</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Responsável</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $area)
                    <tr>
                        <td class="colunas">{{ $area->id }}</td>
                        <td id="nome">{{ $area->nome }}</td>
                        <td>{{ $area->descricao }}</td>
                        <td id="responsavel">{{ $area->responsavel_id ? $area->responsavel->nome : ''}}</td>
                        <td>
                            <a href="{{ route('areas.show', $area->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('areas.edit', $area->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('areas.destroy', $area->id) }}" method="POST" style="display: inline;">
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

