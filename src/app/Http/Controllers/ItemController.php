<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\User;

class ItemController extends Controller
{
    public function index(Request $request)
{
    $query = Item::query();
    $tab = $request->query('tab', ''); // クエリパラメータ 'tab' を取得（デフォルト値 ''）
    // 🔹 検索機能 (FN016)
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->query('search') . '%');
    }
    // 🔹 マイリスト表示 (FN015)
    if ($request->query('tab') === 'mylist') {
        if (!auth()->check()) {
            return view('items.index', ['items' => []]); // 未認証なら空データ
        }
        $query->whereHas('likes', function ($q) {
            $q->where('user_id', auth()->id());
        });
    } else {
        // 🔹 自分が出品した商品を除外 (FN014)
        if (auth()->check()) {
            $query->where('user_id', '!=', auth()->id());
        }
        // 🔹 販売中の商品を取得 (FN014)
        $query->where('status', '販売中');
    }
    // 🔹 商品一覧取得
    $items = $query->get();
    $user = User::find(1);
    return view('items.index', compact('user','items','tab'));
}

    // 商品詳細
    public function show($item_id)
    {
        $item = Item::findOrFail($item_id);
        return view('items.show', compact('item'));
    }

    // 出品ページ
    public function create()
    {
        $categories = Category::all(); // カテゴリーを取得
        return view('items.create', compact('categories')); // ビューに渡す
    }

    // // 出品処理
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|max:100',
    //         'description' => 'required',
    //         'price' => 'required|numeric|min:1',
    //     ]);

    //     Item::create([
    //         'user_id' => auth()->id(),
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'status' => '販売中',
    //     ]);

    //     return redirect()->route('items.index')->with('success', '商品を出品しました');
    // }
}
