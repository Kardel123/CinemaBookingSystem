<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        $nowShowing = Movie::where('status', 'now_showing')->get();
        $comingSoon = Movie::where('status', 'coming_soon')->get();
        return view('movies.index', compact('nowShowing', 'comingSoon'));
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }
} 