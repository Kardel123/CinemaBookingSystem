<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $movies = [
            [
                'title' => 'The Dark Knight',
                'genre' => 'Action, Crime, Drama',
                'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
                'duration' => '152 min',
                'release_date' => '2008-07-18',
                'rating' => 'PG-13',
                'image' => 'movie1.jpg',
                'status' => 'now_showing'
            ],
            [
                'title' => 'Inception',
                'genre' => 'Action, Adventure, Sci-Fi',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.',
                'duration' => '148 min',
                'release_date' => '2010-07-16',
                'rating' => 'PG-13',
                'image' => 'movie2.jpg',
                'status' => 'now_showing'
            ],
            [
                'title' => 'The Shawshank Redemption',
                'genre' => 'Drama',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'duration' => '142 min',
                'release_date' => '1994-09-23',
                'rating' => 'R',
                'image' => 'movie3.jpg',
                'status' => 'now_showing'
            ],
            [
                'title' => 'Pulp Fiction',
                'genre' => 'Crime, Drama',
                'description' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
                'duration' => '154 min',
                'release_date' => '1994-10-14',
                'rating' => 'R',
                'image' => 'movie4.jpg',
                'status' => 'now_showing'
            ],
            [
                'title' => 'The Matrix',
                'genre' => 'Action, Sci-Fi',
                'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
                'duration' => '136 min',
                'release_date' => '1999-03-31',
                'rating' => 'R',
                'image' => 'movie5.jpg',
                'status' => 'now_showing'
            ],
            [
                'title' => 'Dune: Part Two',
                'genre' => 'Action, Adventure, Drama',
                'description' => 'Paul Atreides unites with Chani and the Fremen while seeking revenge against the conspirators who destroyed his family.',
                'duration' => '166 min',
                'release_date' => '2024-03-01',
                'rating' => 'PG-13',
                'image' => 'movie6.jpg',
                'status' => 'coming_soon'
            ],
            [
                'title' => 'Oppenheimer',
                'genre' => 'Biography, Drama, History',
                'description' => 'The story of American scientist J. Robert Oppenheimer and his role in the development of the atomic bomb.',
                'duration' => '180 min',
                'release_date' => '2023-07-21',
                'rating' => 'R',
                'image' => 'movie7.jpg',
                'status' => 'coming_soon'
            ],
            [
                'title' => 'The Batman',
                'genre' => 'Action, Crime, Drama',
                'description' => 'When the Riddler, a sadistic serial killer, begins murdering key political figures in Gotham, Batman is forced to investigate the city\'s hidden corruption.',
                'duration' => '176 min',
                'release_date' => '2022-03-04',
                'rating' => 'PG-13',
                'image' => 'movie8.jpg',
                'status' => 'coming_soon'
            ],
            [
                'title' => 'Top Gun: Maverick',
                'genre' => 'Action, Drama',
                'description' => 'After more than thirty years of service as one of the Navy\'s top aviators, Pete Mitchell is where he belongs, pushing the envelope as a courageous test pilot.',
                'duration' => '130 min',
                'release_date' => '2022-05-27',
                'rating' => 'PG-13',
                'image' => 'movie9.jpg',
                'status' => 'coming_soon'
            ],
            [
                'title' => 'Avatar: The Way of Water',
                'genre' => 'Action, Adventure, Fantasy',
                'description' => 'Jake Sully lives with his newfound family formed on the planet of Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\'vi race to protect their planet.',
                'duration' => '192 min',
                'release_date' => '2022-12-16',
                'rating' => 'PG-13',
                'image' => 'movie10.jpg',
                'status' => 'coming_soon'
            ],
        ];

        foreach ($movies as $movie) {
            DB::table('movies')->insert($movie);
        }
    }
} 