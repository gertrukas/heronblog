<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '-1');

        $jsonString = file_get_contents(base_path('blogs.json'));

        $data = json_decode($jsonString, true);

        foreach ($data as $blog) {

            Blog::create([
                'author' => 'Heron Pazzi',
                'name' => $blog['name'],
                'slug' => $blog['slug'],
                'intro' => $blog['intro'],
                'description' => $blog['description'],
                'created_at' => $blog['date']['$date'],
                'post_type' => $blog['post_type'] ?? 'post',
                'active' => $blog['active'],
                'image' => $blog['image'] ?? null,
            ]);
        }
    }
}
