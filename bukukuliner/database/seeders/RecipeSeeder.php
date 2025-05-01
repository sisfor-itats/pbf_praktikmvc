<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        $recipes = [
            [
                'title' => 'Nasi Goreng Spesial',
                'category' => 'Makanan Utama',
                'ingredients' => "- 2 piring nasi putih\n- 2 butir telur\n- 3 siung bawang putih\n- 2 sdm kecap manis\n- Garam dan merica secukupnya",
                'steps' => "1. Tumis bawang putih hingga harum.\n2. Masukkan telur, orak-arik.\n3. Masukkan nasi, aduk rata.\n4. Tambahkan kecap, garam, dan merica. Aduk rata dan sajikan.",
            ],
            [
                'title' => 'Es Teh Lemon Segar',
                'category' => 'Minuman',
                'ingredients' => "- 2 kantong teh\n- 1 buah lemon\n- 2 sdm gula\n- Es batu secukupnya",
                'steps' => "1. Seduh teh hingga pekat.\n2. Tambahkan gula, aduk hingga larut.\n3. Peras lemon, masukkan ke teh.\n4. Tambahkan es batu dan sajikan.",
            ],
            [
                'title' => 'Pisang Goreng Krispi',
                'category' => 'Cemilan',
                'ingredients' => "- 5 buah pisang\n- 100 gr tepung terigu\n- 1 sdm gula\n- Air secukupnya\n- Minyak untuk menggoreng",
                'steps' => "1. Campur tepung, gula, dan air menjadi adonan.\n2. Celupkan pisang ke adonan.\n3. Goreng hingga keemasan.\n4. Tiriskan dan sajikan hangat.",
            ],
        ];

        foreach ($recipes as $recipe) {
            Recipe::create($recipe);
        }
    }
}

