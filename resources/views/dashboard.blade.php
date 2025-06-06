@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Benvenuto nella tua Dashboard, {{ Auth::user()->name }}!</h1>

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('films.index') }}" class="btn btn-primary btn-block mb-2">Gestisci Film</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('genres.index') }}" class="btn btn-secondary btn-block mb-2">Gestisci Generi</a>
        </div>
    </div>
</div>
@endsection
