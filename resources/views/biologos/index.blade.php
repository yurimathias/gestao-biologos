<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/biologos/index.css') }}">
    <script src="{{ asset('build/assets/jquery.min.js') }}"></script>
    <script src="{{ asset('build/assets/alerta.js') }}"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista Biólogos') }}
        </h2>
    </x-slot>
    <div class="container">
        <form action="{{ route('biologos.index') }}" method="GET" class="search-form">
            <div class="search-container">
                <input type="text" name="search" placeholder="Pesquisar biologos..." value="{{ request()->query('search') }}" class="search-input">
                <button type="submit" class="search-button">Pesquisar</button>
            </div>
        </form>
        <a href="{{ route('biologos.create') }}" class="btn btn-primary">Criar Biólogo</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Especialidade</th>
                    <th>Data de Nascimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($biologos as $biologo)
                    <tr>
                        <td class="colunas">{{ $biologo->id }}</td>
                        <td id="nome">{{ $biologo->nome }}</td>
                        <td>{{ $biologo->especialidade }}</td>
                        <td class="colunas">{{ date_format(new DateTime($biologo->data_nascimento), 'd/m/Y') }}</td>
                        <td>
                            <a href="{{ route('biologos.show', $biologo->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('biologos.edit', $biologo->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('biologos.destroy', $biologo->id) }}" method="POST" style="display: inline;">
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

