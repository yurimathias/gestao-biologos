<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/biologos/index.css') }}">
    <script src="{{ asset('build/assets/jquery.min.js') }}"></script>
    <script src="{{ asset('build/assets/alerta.js') }}"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista Animais') }}
        </h2>
    </x-slot>
    <div class="container">
        <form action="{{ route('animais.index') }}" method="GET" class="search-form">
            <div class="search-container">
                <input type="text" name="search" placeholder="Pesquisar animais..." value="{{ request()->query('search') }}" class="search-input">
                <button type="submit" class="search-button">Pesquisar</button>
            </div>
        </form>
        <a href="{{ route('animais.create') }}" class="btn btn-primary">Criar Animal</a>
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
                @foreach ($animais as $animal)
                    <tr>
                        <td class="colunas">{{ $animal->id }}</td>
                        <td id="nome_cientifico">{{ $animal->nome_cientifico }}</td>
                        <td id="nome_comum">{{ $animal->nome_comum }}</td>
                        <td>{{ $animal->descricao }}</td>
                        <td id="area">{{ $animal->area_id ? $animal->area->nome : ''}}</td>
                        <td>
                            <a href="{{ route('animais.show', $animal->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('animais.edit', $animal->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('animais.destroy', $animal->id) }}" method="POST" style="display: inline;">
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

