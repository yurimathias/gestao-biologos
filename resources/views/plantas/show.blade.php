<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/biologos/show.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Planta') }}
        </h2>
    </x-slot>
    <section class="author-details">
      <div class="author-content">
        <div class="author-meta">
          <span class="author-label">ID:</span>
          <span class="author-info">{{ $planta->id }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Nome:</span>
          <span class="author-info">{{ $planta->nome_cientifico }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Nome:</span>
          <span class="author-info">{{ $planta->nome_comum }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Nacionalidade:</span>
          <span class="author-info">{{ $planta->descricao }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Responsável:</span>
          <span class="author-info">{{ $planta->area->nome }}</span>
        </div>
      </div>
      <a href="{{ route('plantas.index') }}" class="btn-return">Voltar</a>
    </section>
  </x-app-layout>
