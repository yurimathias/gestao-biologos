<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/biologos/index.css') }}">
    <script src="{{ asset('build/assets/jquery.min.js') }}"></script>
    <script src="{{ asset('build/assets/alerta.js') }}"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista Relatórios') }}
        </h2>
    </x-slot>
    <div class="container">
        <form action="{{ route('relatorios.index') }}" method="GET" class="search-form">
            <div class="search-container">
                <input type="text" name="search" placeholder="Pesquisar relatórios..." value="{{ request()->query('search') }}" class="search-input">
                <button type="submit" class="search-button">Pesquisar</button>
            </div>
        </form>
        <a href="{{ route('relatorios.create') }}" class="btn btn-primary">Criar Relatório</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Biólogo</th>
                    <th>Área</th>
                    <th>Observações</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($relatorios as $relatorio)
                    <tr>
                        <td class="colunas">{{ $relatorio->id }}</td>
                        <td id="biologo">{{ $relatorio->biologo->nome }}</td>
                        <td id="area">{{ $relatorio->area->nome }}</td>
                        <td>{{ $relatorio->observacoes }}</td>
                        <td>
                            <a href="{{ route('relatorios.show', $relatorio->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('relatorios.edit', $relatorio->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('relatorios.destroy', $relatorio->id) }}" method="POST" style="display: inline;">
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

