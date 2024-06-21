<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $haru_id = DB::table('seasons')->where('name', '春')->value('id');
        $natsu_id = DB::table('seasons')->where('name', '夏')->value('id');
        $aki_id = DB::table('seasons')->where('name', '秋')->value('id');
        $fuyu_id = DB::table('seasons')->where('name', '冬')->value('id');


        $product_id = DB::table('products')->where('name', 'キウイ')->value('id');
        $param = [
            'product_id' => $product_id,
            'season_id' => $aki_id
        ];
        DB::table('product_season')->insert($param);
        $param = [
            'product_id' => $product_id,
            'season_id' => $fuyu_id
        ];
        DB::table('product_season')->insert($param);

        $product_id = DB::table('products')->where('name', 'ストロベリー')->value('id');
        $param = [
            'product_id' => $product_id,
            'season_id' => $haru_id
        ];
        DB::table('product_season')->insert($param);

        $product_id = DB::table('products')->where('name', 'オレンジ')->value('id');
        $param = [
            'product_id' => $product_id,
            'season_id' => $fuyu_id
        ];
        DB::table('product_season')->insert($param);

        $product_id = DB::table('products')->where('name', 'スイカ')->value('id');
        $param = [
            'product_id' => $product_id,
            'season_id' => $natsu_id
        ];
        DB::table('product_season')->insert($param);

        $product_id = DB::table('products')->where('name', 'ピーチ')->value('id');
        $param = [
            'product_id' => $product_id,
            'season_id' => $natsu_id
        ];
        DB::table('product_season')->insert($param);

        $product_id = DB::table('products')->where('name', 'シャインマスカット')->value('id');
        $param = [
            'product_id' => $product_id,
            'season_id' => $natsu_id
        ];
        DB::table('product_season')->insert($param);
        $param = [
            'product_id' => $product_id,
            'season_id' => $aki_id
        ];
        DB::table('product_season')->insert($param);

        $product_id = DB::table('products')->where('name', 'パイナップル')->value('id');
        $param = [
            'product_id' => $product_id,
            'season_id' => $haru_id
        ];
        DB::table('product_season')->insert($param);
        $param = [
            'product_id' => $product_id,
            'season_id' => $natsu_id
        ];
        DB::table('product_season')->insert($param);
        

        $product_id = DB::table('products')->where('name', 'ブドウ')->value('id');
        $param = [
            'product_id' => $product_id,
            'season_id' => $natsu_id
        ];
        DB::table('product_season')->insert($param);
        $param = [
            'product_id' => $product_id,
            'season_id' => $aki_id
        ];
        DB::table('product_season')->insert($param);

        $product_id = DB::table('products')->where('name', 'バナナ')->value('id');
        $param = [
            'product_id' => $product_id,
            'season_id' => $natsu_id
        ];
        DB::table('product_season')->insert($param);

        $product_id = DB::table('products')->where('name', 'メロン')->value('id');
        $param = [
            'product_id' => $product_id,
            'season_id' => $haru_id
        ];
        DB::table('product_season')->insert($param);
        $param = [
            'product_id' => $product_id,
            'season_id' => $natsu_id
        ];
        DB::table('product_season')->insert($param);
    }
}
