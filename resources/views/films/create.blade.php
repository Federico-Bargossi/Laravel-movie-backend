@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Aggiungi Nuovo Film</h1>

    <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Data di uscita</label>
            <input type="date" name="release_date" id="release_date" class="form-control" value="{{ old('release_date') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Generi</label>
            <div class="form-check">
                @foreach ($genres as $genre)
                    <label class="form-check-label d-block">
                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                            class="form-check-input" {{ in_array($genre->id, old('genres', [])) ? 'checked' : '' }}>
                        {{ $genre->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="form-control mb-3 d-flex flex-wrap gap-3">
            <label for="image">Immagine</label>
            <input id="image" name="image" type="file">
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ route('films.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection
