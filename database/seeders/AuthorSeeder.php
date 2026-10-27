<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->upsert([
            [
                'id' => 1,
                'name' => 'Andrea Hirata',
                'email' => 'andrea@example.com',
                'bio' => 'Penulis novel Laskar Pelangi.',
            ],
            [
                'id' => 2,
                'name' => 'Tere Liye',
                'email' => 'tereliye@example.com',
                'bio' => 'Penulis novel Indonesia.',
            ],
            [
                'id' => 3,
                'name' => 'Dee Lestari',
                'email' => 'dee@example.com',
                'bio' => 'Penulis dan musisi Indonesia.',
            ],
            [
                'id' => 4,
                'name' => 'Pramoedya Ananta Toer',
                'email' => 'pramoedya@example.com',
                'bio' => 'Sastrawan Indonesia.',
            ],
            [
                'id' => 5,
                'name' => 'Ahmad Fuadi',
                'email' => 'fuadi@example.com',
                'bio' => 'Penulis novel Negeri 5 Menara.',
            ],
        ], ['id'], ['name', 'email', 'bio']);
    }
}
