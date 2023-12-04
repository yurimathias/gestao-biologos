<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/biologos/show.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Relatório') }}
        </h2>
    </x-slot>
    <section class="author-details">
      <div class="author-content">
        <div class="author-meta">
          <span class="author-label">ID:</span>
          <span class="author-info">{{ $relatorio->id }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Biólogo:</span>
          <span class="author-info">{{ $relatorio->biologo->nome }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Área:</span>
          <span class="author-info">{{ $relatorio->area->nome }}</span>
        </div>
        <div class="author-meta">
          <span class="author-label">Observações:</span>
          <span class="author-info"><textarea name="observacoes" id="observacoes" cols="15" rows="5" readonly>{{ $relatorio->observacoes }}</textarea></span>
        </div>
        <div class="author-meta">
          <span class="author-label">Animais relacionados:</span>
          <span class="author-info">
            <ul>
              @foreach ($relatorio->animais as $animal)
                <li>{{ $animal->nome_cientifico . ' | ' . $animal->nome_comum }}</li>
              @endforeach
            </ul>
          </span>
        </div>
        <div class="author-meta">
          <span class="author-label">Plantas relacionadas:</span>
          <span class="author-info">
            <ul>
              @foreach ($relatorio->plantas as $planta)
                <li>{{ $planta->nome_cientifico . ' | ' . $planta->nome_comum }}</li>
              @endforeach
            </ul>
          </span>
        </div>
      <a href="{{ route('relatorios.index') }}" class="btn-return">Voltar</a>
    </section>
  </x-app-layout>
