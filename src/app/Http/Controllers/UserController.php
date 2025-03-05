<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileRequest;
use App\Models\User;

class UserController extends Controller
{
    // 初回プロフィール設定画面を表示
    public function showSetupForm()
    {
        return view('users.setup');
    }

        // プロフィール表示
        public function show(Request $request)
        {
            // $user = auth()->user();

            // IDが1のユーザーを取得（仮のデータとして）
            $user = User::find(1);
            $items = []; // 空の配列をデフォルト値として設定

        // ユーザーがいる場合、関連するアイテムを取得（例）
        if ($user) {
            $items = $user->items ?? []; // ユーザーに関連する items を取得（リレーションがあれば）
        }
            $tab = $request->query('tab', 'profile');

            return view('users.show', compact('user', 'tab', 'items')); // ユーザー情報とタブ情報をビューに渡す
        }

    // プロフィール編集ページ
    public function edit()
    {
        $user = User::find(1); // IDが1のユーザーを取得（仮のデータとして）
        return view('users.edit', compact('user'));
    }

    // // プロフィール更新処理
    // public function update(Request $request)
    // {
    //     $user = auth()->user();
    //     $user->update($request->only(['name', 'postal_code', 'address']));

    //     return redirect()->route('users.profile')->with('success', 'プロフィールを更新しました');
    // }
}
