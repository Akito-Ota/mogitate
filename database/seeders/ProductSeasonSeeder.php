<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Season;

class ProductSeasonSeeder extends Seeder
{
    public function run(): void
    {
    
        $seasonId = Season::pluck('id', 'name'); 
        $map = [
            'キウイ'             => ['秋', '冬'],
            'ストロベリー'       => ['春'],
            'オレンジ'           => ['冬'],
            'スイカ'             => ['夏'],
            'ピーチ'             => ['夏'],
            'シャインマスカット' => ['春', '秋'],
            'パイナップル'       => ['春', '夏'],
            'ブドウ'             => ['春', '秋'],
            'バナナ'             => ['夏'],
            'メロン'             => ['春', '夏'],
        ];

        foreach ($map as $productName => $seasons) {
            $product = Product::where('name', $productName)->first();
            if (!$product) {
                continue; 
            }

            $ids = collect($seasons)
                ->map(fn($name) => $seasonId[$name] ?? null)
                ->filter()
                ->all();

            $product->seasons()->syncWithoutDetaching($ids);
        }
    }
}
