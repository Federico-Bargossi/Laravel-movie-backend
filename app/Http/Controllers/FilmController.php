<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $films = Film::with('genres')->orderBy('created_at', 'desc')->get();

    return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $genres = Genre::all();
    return view('films.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'release_date' => 'nullable|date',
        'genres' => 'nullable|array',
        'genres.*' => 'exists:genres,id',
    ]);

    $film = Film::create($validated);

    if (isset($validated['genres'])) {
        $film->genres()->attach($validated['genres']);
    }

    return redirect()->route('films.index')->with('success', 'Film creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
    $genres = Genre::all();
    $selectedGenres = $film->genres->pluck('id')->toArray();

    return view('films.edit', compact('film', 'genres', 'selectedGenres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'release_date' => 'nullable|date',
        'genres' => 'nullable|array',
        'genres.*' => 'exists:genres,id',
    ]);

    $film->update($validated);
    $film->genres()->sync($validated['genres'] ?? []);

    return redirect()->route('films.index')->with('success', 'Film aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
    $film->delete();

    return redirect()->route('films.index')->with('success', 'Film eliminato con successo.');
    }
}
