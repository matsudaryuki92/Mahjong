<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::create([
            'name' => 'マーチャオヴィーナス新越谷店',
            'address' => '埼玉県越谷市南越谷1丁目11−9 東京宝石第2ビル 4階',
            'phone' => '048-985-3900',
            'url' => 'https://marchao.co.jp/shops/view/47',
            'opening_hours' => '09:00',
            'closing_hours' => '24:00',
            'holiday' => '年中無休',
            'latitude' => 35.87540451083454,
            'longitude' => 139.7902536255774,
        ]);
        Store::create([
            'name' => 'まぁじゃんヒャクジャン南越谷店',
            'address' => '埼玉県越谷市南越谷１丁目２６−１３ ２階',
            'phone' => '03-6757-0777',
            'url' => 'https://hyakujyan.jp/',
            'opening_hours' => '??:??',
            'closing_hours' => '??:??',
            'holiday' => '年中無休',
            'latitude' => 35.876654305943056,
            'longitude' => 139.79136940847795,
        ]);
    }
}
