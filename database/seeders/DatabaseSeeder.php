<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'rootroot',
        ]);

        // $categories = ['electronics', 'clothing', 'motors', 'books', 'music', 'furniture','sport','houses','jewelry', 'other',];

        $categories= [
            ['name' => 'electronics', 'img' => './media/elettronica.jpeg', 'class' => 'one'],
            ['name' => 'clothing', 'img' => './media/abbigliamento.jpeg', 'class' => 'two'],
            ['name' => 'motors', 'img' => './media/motori.jpeg' , 'class' => 'three'],
            ['name' => 'books', 'img' => './media/libri.jpeg' , 'class' => 'four'],
            ['name' => 'music', 'img' => './media/musica.jpeg' , 'class' => 'five'],
            ['name' => 'furniture', 'img' => './media/aricolicasa.jpeg' , 'class' => 'six'],
            ['name' => 'sport', 'img' => './media/sport.jpeg' , 'class' => 'seven'],
            ['name' => 'houses', 'img' => './media/immobili.jpeg' , 'class' => 'eight'],
            ['name' => 'jewelry', 'img' => './media/gioielli.webp' , 'class' => 'nine'],
            ['name' => 'other', 'img' => './media/altro.webp' , 'class' => 'ten']

        ];
        
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'img' => $category['img'],
                'class' => $category['class']
            ]);
        }
    }
}
