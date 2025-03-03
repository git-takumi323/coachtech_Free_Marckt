<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ItemCategorySeeder extends Seeder
{
    public function run()
    {
        $itemCategories = [
            ['item_name' => '腕時計', 'category_name' => 'ファッション'],
            ['item_name' => 'HDD', 'category_name' => '家電'],
            ['item_name' => '玉ねぎ3束', 'category_name' => 'キッチン'],
            ['item_name' => '革靴', 'category_name' => 'ファッション'],
            ['item_name' => 'ノートPC', 'category_name' => '家電'],
            ['item_name' => 'マイク', 'category_name' => '家電'],
            ['item_name' => 'ショルダーバッグ', 'category_name' => 'ファッション'],
            ['item_name' => 'タンブラー', 'category_name' => 'キッチン'],
            ['item_name' => 'コーヒーミル', 'category_name' => 'キッチン'],
            ['item_name' => 'メイクセット', 'category_name' => 'レディース'],
        ];

        foreach ($itemCategories as $itemCategory) {
            $item = Item::where('name', $itemCategory['item_name'])->first();
            $category = Category::where('name', $itemCategory['category_name'])->first();

            if ($item && $category) {
                DB::table('item_categories')->insert([
                    'item_id' => $item->id,
                    'category_id' => $category->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
