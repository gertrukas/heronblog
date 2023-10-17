<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Romance', 'Ciencia Ficción', 'Amor', 'Suspenso', 'Drama', 'Contemporáneo', 'Erótico', 'Paranormal' ,'Fantasía'];

        foreach ($names as $key => $name) {
            Tag::create([
                'name' => $name
            ]);
        }
    }
}
