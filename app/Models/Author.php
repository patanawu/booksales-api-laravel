<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        ['id' => 1, 'name' => 'Andrea Hirata'],
        ['id' => 2, 'name' => 'Tere Liye'],
        ['id' => 3, 'name' => 'Dee Lestari'],
        ['id' => 4, 'name' => 'Pramoedya Ananta Toer'],
        ['id' => 5, 'name' => 'Raditya Dika'],
    ];

    public function getAuthors()
    {
        return $this->authors;
    }
}