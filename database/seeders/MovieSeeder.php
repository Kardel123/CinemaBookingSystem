<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $movies = [
            [
                'title' => 'The Dark Knight',
                'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
                'genre' => 'Action, Crime, Drama',
                'duration' => '2h 32m',
                'image_url' => 'https://image.tmdb.org/t/p/original/qJ2tW6WMUDux911r6m7haRef0WH.jpg',
                'release_date' => '2024-03-01',
                'status' => 'now_showing',
                'price' => 12.99
            ],
            [
                'title' => 'Inception',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.',
                'genre' => 'Action, Adventure, Sci-Fi',
                'duration' => '2h 28m',
                'image_url' => 'https://image.tmdb.org/t/p/original/9gk7adHYeDvHkCSEqAvQNLV5Uge.jpg',
                'release_date' => '2024-03-05',
                'status' => 'now_showing',
                'price' => 11.99
            ],
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'genre' => 'Drama',
                'duration' => '2h 22m',
                'image_url' => 'https://image.tmdb.org/t/p/original/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg',
                'release_date' => '2024-03-10',
                'status' => 'now_showing',
                'price' => 10.99
            ],
            [
                'title' => 'Dune: Part Two',
                'description' => 'Paul Atreides unites with Chani and the Fremen while seeking revenge against the conspirators who destroyed his family.',
                'genre' => 'Action, Adventure, Drama',
                'duration' => '2h 46m',
                'image_url' => 'https://image.tmdb.org/t/p/original/8b8R8l88Qje9dn9OE8PY05Nxl1X.jpg',
                'release_date' => '2024-04-01',
                'status' => 'coming_soon',
                'price' => 13.99
            ],
            [
                'title' => 'Oppenheimer',
                'description' => 'The story of American scientist J. Robert Oppenheimer and his role in the development of the atomic bomb.',
                'genre' => 'Biography, Drama, History',
                'duration' => '3h 0m',
                'image_url' => 'https://image.tmdb.org/t/p/original/fm6KqXpk3M2HVveHwCrBSSBaO0V.jpg',
                'release_date' => '2024-04-15',
                'status' => 'coming_soon',
                'price' => 14.99
            ],
            [
                'title' => 'The Batman',
                'description' => 'When the Riddler, a sadistic serial killer, begins murdering key political figures in Gotham, Batman is forced to investigate the city\'s hidden corruption.',
                'genre' => 'Action, Crime, Drama',
                'duration' => '2h 56m',
                'image_url' => 'https://image.tmdb.org/t/p/original/74xTEgt7R36Fpooo50r9T25onhq.jpg',
                'release_date' => '2024-04-20',
                'status' => 'coming_soon',
                'price' => 12.99
            ],
            [
                'title' => 'Top Gun: Maverick',
                'description' => 'After more than thirty years of service as one of the Navy\'s top aviators, Pete Mitchell is where he belongs, pushing the envelope as a courageous test pilot.',
                'genre' => 'Action, Drama',
                'duration' => '2h 11m',
                'image_url' => 'https://image.tmdb.org/t/p/original/62HCnUTziyWcpDaBO2i1DX17ljH.jpg',
                'release_date' => '2024-05-01',
                'status' => 'coming_soon',
                'price' => 11.99
            ],
            [
                'title' => 'Avatar: The Way of Water',
                'description' => 'Jake Sully lives with his newfound family formed on the planet of Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\'vi race to protect their planet.',
                'genre' => 'Action, Adventure, Fantasy',
                'duration' => '3h 12m',
                'image_url' => 'https://image.tmdb.org/t/p/original/t6HIqrRAclMCA60NsSmeqe9RmNV.jpg',
                'release_date' => '2024-05-15',
                'status' => 'coming_soon',
                'price' => 13.99
            ]
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
} 