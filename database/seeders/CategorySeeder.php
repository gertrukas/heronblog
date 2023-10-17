<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Novelas', 'Cuentos', 'Academicos'];

        foreach ($names as $key => $name) {
            Category::create([
                'name' => $name
            ]);
        }
    }
}
