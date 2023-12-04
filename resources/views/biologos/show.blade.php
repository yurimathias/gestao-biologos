<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/biologos/show.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Biólogo') }}
        </h2>
    </x-slot>
    <section class="author-details">
      <div class="author-content">
        <div class="author-meta">
          <span class="author-label">ID:</span>
          <span class="author-info">{{ $biologo->id }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Nome:</span>
          <span class="author-info">{{ $biologo->nome }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Nacionalidade:</span>
          <span class="author-info">{{ $biologo->especialidade }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Data de Nascimento:</span>
          <span class="author-info">{{ date_format(new DateTime($biologo->data_nascimento), 'd/m/Y') }}</span>
        </div>
      </div>
      <a href="{{ route('biologos.index') }}" class="btn-return">Voltar</a>
    </section>
  </x-app-layout>
