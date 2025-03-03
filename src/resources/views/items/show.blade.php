@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-lg flex">
        <!-- 商品画像 -->
        <div class="w-1/2">
            <img src="{{ $item->image_url ?? 'https://via.placeholder.com/400' }}" 
                 alt="商品画像" class="w-full h-auto rounded-lg">
        </div>

        <!-- 商品情報 -->
        <div class="w-1/2 pl-8">
            <h2 class="text-2xl font-bold mb-2">{{ $item->name }}</h2>
            <p class="text-gray-500 mb-4">{{ $item->brand_name ?? 'ブランド名不明' }}</p>
            <p class="text-3xl font-bold mb-4">¥{{ number_format($item->price) }} <span class="text-sm text-gray-500">(税込)</span></p>

            <!-- いいね & コメント数 -->
            <div class="flex items-center mb-4">
                <span class="text-gray-700 mr-2">⭐ {{ $item->likes_count }}</span>
                <span class="text-gray-700">💬 {{ $item->comments_count }}</span>
            </div>

            <!-- 購入ボタン -->
            <a href="{{ route('purchase.show', $item->id) }}" 
               class="block text-center bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition duration-200">
                購入手続きへ
            </a>

            <!-- 商品説明 -->
            <h3 class="mt-6 text-lg font-bold">商品説明</h3>
            <p class="text-gray-700">{{ $item->description }}</p>

            <!-- 商品情報 -->
            <h3 class="mt-6 text-lg font-bold">商品情報</h3>
            <p><span class="font-semibold">カテゴリ:</span> 
                @foreach($item->categories as $category)
                    <span class="inline-block bg-gray-200 text-gray-700 px-2 py-1 rounded-md text-sm">{{ $category->name }}</span>
                @endforeach
            </p>
            <p><span class="font-semibold">商品の状態:</span> {{ $item->condition }}</p>

            <!-- コメント一覧 -->
            <h3 class="mt-6 text-lg font-bold">コメント ({{ $item->comments->count() }})</h3>
            <div class="mt-4">
                @foreach($item->comments as $comment)
                    <div class="flex items-start space-x-3 mb-4">
                        <img src="{{ $comment->user->profile_image ?? 'https://via.placeholder.com/50' }}" 
                             alt="ユーザー画像" class="w-10 h-10 rounded-full">
                        <div>
                            <p class="font-semibold">{{ $comment->user->name }}</p>
                            <p class="text-gray-600">{{ $comment->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- コメント投稿フォーム -->
            @auth
                <h3 class="mt-6 text-lg font-bold">商品へのコメント</h3>
                <form method="POST" action="{{ route('comments.store', $item->id) }}" class="mt-4">
                    @csrf
                    <textarea name="content" rows="3" required 
                        class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    <button type="submit"
                        class="w-full bg-red-500 text-white py-2 mt-2 rounded-lg hover:bg-red-600 transition duration-200">
                        コメントを送信する
                    </button>
                </form>
            @endauth
        </div>
    </div>
</div>
@endsection
