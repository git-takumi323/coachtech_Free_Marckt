<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    // 会員登録画面を表示
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // // 会員登録処理
    // public function register(RegisterRequest $request)
    // {
    //     // バリデーション済みデータを取得
    //     $validated = $request->validated();

    //     $user = User::create([
    //         'name' => $validated->name,
    //         'email' => $validated->email,
    //         'password' => Hash::make($validated->password),
    //     ]);

    //     Auth::login($user);

    //     return redirect()->route('items.index')->with('success', '会員登録が完了しました！');
    // }

     // ログイン画面を表示
     public function showLoginForm()
     {
         return view('auth.login');
     }
}
