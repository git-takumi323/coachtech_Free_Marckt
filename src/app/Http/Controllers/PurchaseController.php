<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Transaction;

class PurchaseController extends Controller
{
    // 商品購入ページ
    public function showPurchaseForm($item_id)
    {
        $item = Item::findOrFail($item_id);
        return view('purchase.confirm', compact('item'));
    }

    // 購入処理
    public function purchase(Request $request, $item_id)
    {
        $item = Item::findOrFail($item_id);

        Transaction::create([
            'item_id' => $item->id,
            'buyer_id' => auth()->id(),
            'status' => '支払い待ち',
            'address' => auth()->user()->address,
            'payment_method' => $request->payment_method,
        ]);

        $item->update(['status' => '取引中']);

        return redirect()->route('users.purchases')->with('success', '購入手続きが完了しました');
    }
}
