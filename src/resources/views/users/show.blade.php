@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <!-- ユーザー情報 -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ $user->profile_image ?? 'https://via.placeholder.com/150' }}" 
                    alt="プロフィール画像" class="w-20 h-20 rounded-full object-cover mr-4">
                <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
            </div>
            <a href="{{ route('users.profile.edit') }}" 
               class="px-4 py-2 border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition">
                プロフィールを編集
            </a>
        </div>

        <!-- タブメニュー -->
        <div class="mt-6 border-b">
            <a href="{{ route('users.sales') }}" 
               class="inline-block py-2 px-4 {{ $tab === 'sell' ? 'text-red-500 font-bold' : 'text-gray-500' }}">
                出品した商品
            </a>
            <a href="{{ route('users.purchases') }}" 
               class="inline-block py-2 px-4 {{ $tab === 'buy' ? 'text-red-500 font-bold' : 'text-gray-500' }}">
                購入した商品
            </a>
        </div>

        <!-- 商品一覧 -->
        <div class="mt-6 grid grid-cols-2 md:grid-cols-3 gap-4">
            @forelse($items as $item)
                <div class="bg-gray-200 p-4 rounded-lg text-center">
                    <img src="{{ $item->image_url ?? 'https://via.placeholder.com/150' }}" alt="商品画像" class="w-full h-40 object-cover rounded">
                    <p class="mt-2 text-sm">{{ $item->name }}</p>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">商品がありません</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
