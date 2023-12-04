<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/biologos/show.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Área') }}
        </h2>
    </x-slot>
    <section class="author-details">
      <div class="author-content">
        <div class="author-meta">
          <span class="author-label">ID:</span>
          <span class="author-info">{{ $area->id }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Nome:</span>
          <span class="author-info">{{ $area->nome }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Nacionalidade:</span>
          <span class="author-info">{{ $area->descricao }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Responsável:</span>
          <span class="author-info">{{ $area->responsavel->nome }}</span>
        </div>
      </div>
      <a href="{{ route('areas.index') }}" class="btn-return">Voltar</a>
    </section>
  </x-app-layout>
