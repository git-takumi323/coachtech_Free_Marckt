<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // 商品一覧
    public function index(Request $request)
    {
        $query = Item::query();

        // マイリスト表示
        if ($request->query('tab') === 'mylist' && auth()->check()) {
            $query->whereHas('likes', function ($q) {
                $q->where('user_id', auth()->id());
            });
        }

        $items = $query->where('status', '販売中')->get();

        return view('items.index', compact('items'));
    }

    // 商品詳細
    public function show($item_id)
    {
        $item = Item::findOrFail($item_id);
        return view('items.show', compact('item'));
    }

    // // 出品ページ
    // public function create()
    // {
    //     return view('items.create');
    // }

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
