@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">✏️ Modifica Film</h1>

    <form action="{{ route('films.update', $film) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control"
                value="{{ old('title', $film->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $film->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Data di uscita</label>
            <input type="date" name="release_date" id="release_date" class="form-control"
                value="{{ old('release_date', $film->release_date ? date('Y-m-d', strtotime($film->release_date)) : '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Generi</label>
            @foreach ($genres as $genre)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="genres[]"
                        value="{{ $genre->id }}"
                        {{ in_array($genre->id, old('genres', $selectedGenres)) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $genre->name }}</label>
                </div>
            @endforeach
        </div>

         <div class="form-control mb-3 d-flex flex-wrap gap-3">
            <label for="image">Immagine</label>
            <input id="image" name="image" type="file">

            @if($film->image)
            <div class="post-image mb-4">
                <img class="img-fluid" style="width: 9rem" src="{{asset("storage/" . $film->image)}}" alt="Copertina Film non trovata">
            </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        <a href="{{ route('films.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection
