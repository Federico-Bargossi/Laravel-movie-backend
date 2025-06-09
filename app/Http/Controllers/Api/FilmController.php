<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
{
    return response()->json(\App\Models\Film::with('genres')->get());
}

public function show(\App\Models\Film $film)
{
    return response()->json($film->load('genres'));
}
}
