<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => 1, // IDを指定
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'), // ハッシュ化
            'profile_image' => 'https://via.placeholder.com/150',
            'postal_code' => '123-4567',
            'address' => '東京都新宿区1-1-1',
        ]);
    }
}
