<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->upsert([
            [
                'id' => 1,
                'title' => 'Laskar Pelangi',
                'description' => 'Kisah perjuangan anak-anak Belitung.',
                'price' => 85000,
                'stock' => 20,
                'cover_photo' => 'laskar-pelangi.jpg',
                'genre_id' => null,
                'author_id' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Bumi',
                'description' => 'Petualangan di dunia paralel.',
                'price' => 90000,
                'stock' => 15,
                'cover_photo' => 'bumi.jpg',
                'genre_id' => null,
                'author_id' => 2,
            ],
            [
                'id' => 3,
                'title' => 'Perahu Kertas',
                'description' => 'Kisah persahabatan dan cinta.',
                'price' => 78000,
                'stock' => 12,
                'cover_photo' => 'perahu-kertas.jpg',
                'genre_id' => null,
                'author_id' => 3,
            ],
            [
                'id' => 4,
                'title' => 'Bumi Manusia',
                'description' => 'Novel tentang kehidupan masa kolonial.',
                'price' => 95000,
                'stock' => 10,
                'cover_photo' => 'bumi-manusia.jpg',
                'genre_id' => null,
                'author_id' => 4,
            ],
            [
                'id' => 5,
                'title' => 'Negeri 5 Menara',
                'description' => 'Kisah perjuangan meraih cita-cita.',
                'price' => 82000,
                'stock' => 18,
                'cover_photo' => 'negeri-5-menara.jpg',
                'genre_id' => null,
                'author_id' => 5,
            ],
        ], ['id'], [
            'title',
            'description',
            'price',
            'stock',
            'cover_photo',
            'genre_id',
            'author_id',
        ]);
    }
}
