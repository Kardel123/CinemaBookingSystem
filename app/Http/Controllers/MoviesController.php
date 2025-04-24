<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        $nowShowing = [
            [
                'id' => 1,
                'title' => 'The Dark Knight',
                'genre' => 'Action, Crime, Drama',
                'image' => 'movie1.jpg',
                'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.'
            ],
            [
                'id' => 2,
                'title' => 'Inception',
                'genre' => 'Action, Adventure, Sci-Fi',
                'image' => 'movie2.jpg',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.'
            ],
            [
                'id' => 3,
                'title' => 'The Shawshank Redemption',
                'genre' => 'Drama',
                'image' => 'movie3.jpg',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.'
            ],
            [
                'id' => 4,
                'title' => 'Pulp Fiction',
                'genre' => 'Crime, Drama',
                'image' => 'movie4.jpg',
                'description' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.'
            ],
            [
                'id' => 5,
                'title' => 'The Matrix',
                'genre' => 'Action, Sci-Fi',
                'image' => 'movie5.jpg',
                'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.'
            ],
        ];

        $comingSoon = [
            [
                'id' => 6,
                'title' => 'Dune: Part Two',
                'genre' => 'Action, Adventure, Drama',
                'image' => 'movie6.jpg',
                'description' => 'Paul Atreides unites with Chani and the Fremen while seeking revenge against the conspirators who destroyed his family.'
            ],
            [
                'id' => 7,
                'title' => 'Oppenheimer',
                'genre' => 'Biography, Drama, History',
                'image' => 'movie7.jpg',
                'description' => 'The story of American scientist J. Robert Oppenheimer and his role in the development of the atomic bomb.'
            ],
            [
                'id' => 8,
                'title' => 'The Batman',
                'genre' => 'Action, Crime, Drama',
                'image' => 'movie8.jpg',
                'description' => 'When the Riddler, a sadistic serial killer, begins murdering key political figures in Gotham, Batman is forced to investigate the city\'s hidden corruption.'
            ],
            [
                'id' => 9,
                'title' => 'Top Gun: Maverick',
                'genre' => 'Action, Drama',
                'image' => 'movie9.jpg',
                'description' => 'After more than thirty years of service as one of the Navy\'s top aviators, Pete Mitchell is where he belongs, pushing the envelope as a courageous test pilot.'
            ],
            [
                'id' => 10,
                'title' => 'Avatar: The Way of Water',
                'genre' => 'Action, Adventure, Fantasy',
                'image' => 'movie10.jpg',
                'description' => 'Jake Sully lives with his newfound family formed on the planet of Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\'vi race to protect their planet.'
            ],
        ];

        return view('movies.index', compact('nowShowing', 'comingSoon'));
    }
} 