@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Elenco Film</h1>

        <a href="{{ route('films.create') }}" class="btn btn-success mb-3">Aggiungi Nuovo Film</a>

        @if ($films->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Generi</th>
                        <th>Data di uscita</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($films as $film)
                        <tr>
                            <td>{{ $film->title }}</td>
                            <td>
                                @if ($film->genres->count())
                                    @foreach ($film->genres as $genre)
                                        <span class="badge bg-secondary">{{ $genre->name }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">Nessun genere</span>
                                @endif
                            </td>

                            <td>{{ $film->release_date ? \Carbon\Carbon::parse($film->release_date)->format('d/m/Y') : '-' }}
                            </td>
                            <td>
                                <a href="{{ route('films.show', $film) }}" class="btn btn-info btn-sm">Mostra</a>
                                <a href="{{ route('films.edit', $film) }}" class="btn btn-warning btn-sm">✏️</a>
                                <form action="{{ route('films.destroy', $film) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Sei sicuro?')">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nessun film trovato.</p>
        @endif
    </div>
@endsection
