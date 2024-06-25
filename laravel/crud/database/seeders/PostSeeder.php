<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        $numbersInWords = [
            'first', 'second', 'third', 'fourth', 'fifth',
            'sixth', 'seventh', 'eighth', 'ninth', 'tenth',
            'eleventh', 'twelfth', 'thirteenth', 'fourteenth', 'fifteenth',
            'sixteenth', 'seventeenth', 'eighteenth', 'nineteenth', 'twentieth'
        ];

        for ($i = 0; $i < 20; $i++) {
            Post::create([
                'title' => ucfirst($numbersInWords[$i]) . ' Post',
                'content' => 'This is the content of the ' . $numbersInWords[$i] . ' post.'
            ]);
        }
    }
}
