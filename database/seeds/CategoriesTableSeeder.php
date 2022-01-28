<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'シャツ',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'ブラウス',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Tシャツ',
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'name' => 'カットソー',
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'name' => 'タンクトップ',
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'name' => 'キャミソール',
        ]);
        DB::table('categories')->insert([
            'id' => 8,
            'name' => 'スウェット',
        ]);
        DB::table('categories')->insert([
            'id' => 9,
            'name' => 'パーカー',
        ]);
        DB::table('categories')->insert([
            'id' => 10,
            'name' => 'ニット/セーター',
        ]);
        DB::table('categories')->insert([
            'id' => 11,
            'name' => 'カーディガン',
        ]);
        DB::table('categories')->insert([
            'id' => 12,
            'name' => 'ジャケット',
        ]);
        DB::table('categories')->insert([
            'id' => 13,
            'name' => 'ブルゾン',
        ]);
        DB::table('categories')->insert([
            'id' => 14,
            'name' => 'ベスト',
        ]);
        DB::table('categories')->insert([
            'id' => 15,
            'name' => 'コート',
        ]);
        DB::table('categories')->insert([
            'id' => 16,
            'name' => 'ボトムス',
        ]);
        DB::table('categories')->insert([
            'id' => 17,
            'name' => 'スカート',
        ]);
        DB::table('categories')->insert([
            'id' => 18,
            'name' => 'ワンピース',
        ]);
        DB::table('categories')->insert([
            'id' => 19,
            'name' => 'バッグ',
        ]);
        DB::table('categories')->insert([
            'id' => 20,
            'name' => '靴',
        ]);
        DB::table('categories')->insert([
            'id' => 21,
            'name' => 'ファッション雑貨',
        ]);
        DB::table('categories')->insert([
            'id' => 22,
            'name' => 'サングラス',
        ]);
        DB::table('categories')->insert([
            'id' => 23,
            'name' => '財布、小物',
        ]);
        DB::table('categories')->insert([
            'id' => 24,
            'name' => '腕時計',
        ]);
        DB::table('categories')->insert([
            'id' => 25,
            'name' => 'アクセサリー',
        ]);
        DB::table('categories')->insert([
            'id' => 26,
            'name' => '帽子',
        ]);
        DB::table('categories')->insert([
            'id' => 27,
            'name' => 'コスメ、香水',
        ]);
        DB::table('categories')->insert([
            'id' => 28,
            'name' => 'その他',
        ]);

    }
}
