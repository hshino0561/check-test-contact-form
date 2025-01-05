<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Carbonクラスをインポート

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // 外部キー制約を無効化
      DB::table('categories')->truncate(); // カテゴリーテーブルをトランケート
      DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // 外部キー制約を再有効化

      $currentTimestamp = Carbon::now();

      $param = [
        'content' => '商品のお届けについて',
        'created_at' => $currentTimestamp,
        'updated_at' => $currentTimestamp,
      ];
      DB::table('categories')->insert($param);

      $param = [
        'content' => '商品の交換について',
        'created_at' => $currentTimestamp,
        'updated_at' => $currentTimestamp,
      ];
      DB::table('categories')->insert($param);

      $param = [
        'content' => '商品トラブル',
        'created_at' => $currentTimestamp,
        'updated_at' => $currentTimestamp,
      ];
      DB::table('categories')->insert($param);

      $param = [
        'content' => 'ショップへのお問い合わせ',
        'created_at' => $currentTimestamp,
        'updated_at' => $currentTimestamp,
      ];
      DB::table('categories')->insert($param);

      $param = [
        'content' => 'その他',
        'created_at' => $currentTimestamp,
        'updated_at' => $currentTimestamp,
      ];
      DB::table('categories')->insert($param);
    }
}
