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

    // // プロフィール表示
    // public function show(Request $request)
    // {
    //     $user = auth()->user();
    //     $tab = $request->query('tab', 'profile');

    //     return view('users.show', compact('user', 'tab'));
    // }

    // // プロフィール編集ページ
    // public function edit()
    // {
    //     $user = auth()->user();
    //     return view('users.edit', compact('user'));
    // }

    // // プロフィール更新処理
    // public function update(Request $request)
    // {
    //     $user = auth()->user();
    //     $user->update($request->only(['name', 'postal_code', 'address']));

    //     return redirect()->route('users.profile')->with('success', 'プロフィールを更新しました');
    // }
}
