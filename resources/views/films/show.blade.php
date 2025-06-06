@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">🎬 Dettagli del film</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">{{ $film->title }}</h3>

            @if ($film->release_date)
                <p><strong>Data di uscita:</strong> {{ date('d/m/Y', strtotime($film->release_date)) }}</p>
            @endif

            @if ($film->description)
                <p><strong>Descrizione:</strong> {{ $film->description }}</p>
            @endif

            <p><strong>Generi:</strong>
                @if ($film->genres->count())
                    @foreach ($film->genres as $genre)
                        <span class="badge bg-secondary">{{ $genre->name }}</span>
                    @endforeach
                @else
                    <span class="text-muted">Nessun genere</span>
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('films.index') }}" class="btn btn-secondary">🔙 Torna alla lista</a>
    <a href="{{ route('films.edit', $film) }}" class="btn btn-warning">✏️ Modifica</a>
</div>
@endsection
