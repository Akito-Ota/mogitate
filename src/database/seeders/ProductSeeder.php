<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'name' => 'キウイ',
                'price' => 800,
                'description' => '甘みと酸味のバランスが魅力のフルーツ。ビタミンCなど栄養豊富で美肌・疲労回復にも期待。',
                'image' => 'storage/image/kiwi.png'
            ],
            [
                'name' => 'ストロベリー',
                'price' => 1200,
                'description' => '大人から子供まで人気のいちご。食物繊維豊富で腸内環境の改善にも期待。',
                'image' => 'storage/image/strawberry.png'
            ],
            [
                'name' => 'オレンジ',
                'price' => 850,
                'description' => '酸味と甘みのバランスが抜群のオレンジ。爽やかな香りでリフレッシュ。',
                'image' => 'storage/image/orange.png'
            ],
            [
                'name' => 'スイカ',
                'price' => 700,
                'description' => 'みずみずしくてシャリシャリ食感。水分補給に最適で夏の定番。',
                'image' => 'storage/image/watermelon.png'
            ],
            [
                'name' => 'ピーチ',
                'price' => 1000,
                'description' => 'とろけるような甘さと豊潤な香りが魅力。見た目も可愛い人気者。',
                'image' => 'storage/image/peach.png'
            ],
            [
                'name' => 'シャインマスカット',
                'price' => 1400,
                'description' => '爽やかな香りと上品な甘み。皮ごと食べられてジューシー。',
                'image' => 'storage/image/muscat.png'
            ],
            [
                'name' => 'パイナップル',
                'price' => 800,
                'description' => '甘さと酸味のバランスが絶妙な南国フルーツ。トロピカルな香りが広がる。',
                'image' => 'storage/image/pineapple.png'
            ],
            [
                'name' => 'ブドウ',
                'price' => 1100,
                'description' => 'フルーツの定番。品種も多く、濃厚な甘みで満足度◎。',
                'image' => 'storage/image/grapes.png'
            ],
            [
                'name' => 'バナナ',
                'price' => 600,
                'description' => '栄養満点でエネルギー補給にも最適。濃厚な甘みでスムージー向き。',
                'image' => 'storage/image/banana.png'
            ],
            [
                'name' => 'メロン',
                'price' => 900,
                'description' => '香り高くジューシー。上品な甘さでご褒美デザートにぴったり。',
                'image' => 'storage/image/melon.png'
            ],
        ];

        foreach ($rows as $r) {
            Product::firstOrCreate(['name' => $r['name']], $r);
        }
    }
}
