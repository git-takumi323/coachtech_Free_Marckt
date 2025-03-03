@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6">プロフィール設定</h2>

        <!-- プロフィール画像 -->
        <div class="flex justify-center mb-4">
            <img src="{{ $user->profile_image ?? 'https://via.placeholder.com/150' }}" 
                alt="プロフィール画像" class="w-24 h-24 rounded-full object-cover">
        </div>

        <form method="POST" action="{{ route('users.profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4 text-center">
                <label for="profile_image" class="cursor-pointer text-red-500 border border-red-500 px-4 py-2 rounded-lg">
                    画像を選択する
                </label>
                <input type="file" name="profile_image" id="profile_image" class="hidden">
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">ユーザー名</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="postal_code" class="block text-sm font-medium text-gray-700">郵便番号</label>
                <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code', $user->postal_code) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">住所</label>
                <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="building" class="block text-sm font-medium text-gray-700">建物名</label>
                <input type="text" name="building" id="building" value="{{ old('building', $user->building) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition duration-200">
                更新する
            </button>
        </form>
    </div>
</div>
@endsection
