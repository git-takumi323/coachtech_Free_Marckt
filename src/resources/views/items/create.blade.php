@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6">商品を出品</h2>

        <!-- エラーメッセージ -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- 商品画像 -->
            <h3 class="text-lg font-bold mb-2">商品画像</h3>
            <div class="mb-4">
                <label for="image" class="cursor-pointer block w-full border-2 border-gray-300 border-dashed 
                    rounded-lg p-4 text-center text-gray-500 hover:bg-gray-100">
                    画像を選択する
                </label>
                <input type="file" name="image" id="image" class="hidden">
            </div>

            <!-- カテゴリー -->
            <h3 class="text-lg font-bold mb-2">カテゴリー</h3>
            <div class="mb-4 flex flex-wrap">
                @foreach ($categories as $category)
                    <label class="inline-flex items-center m-1 px-3 py-1 bg-red-100 text-red-500 rounded-lg cursor-pointer">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="hidden">
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>

            <!-- 商品の状態 -->
            <h3 class="text-lg font-bold mb-2">商品の状態</h3>
            <select name="condition" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 mb-4">
                <option value="">選択してください</option>
                <option value="新品">新品</option>
                <option value="未使用に近い">未使用に近い</option>
                <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
                <option value="やや傷や汚れあり">やや傷や汚れあり</option>
                <option value="傷や汚れあり">傷や汚れあり</option>
                <option value="状態が悪い">状態が悪い</option>
            </select>

            <!-- 商品名 -->
            <h3 class="text-lg font-bold mb-2">商品名</h3>
            <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg mb-4" placeholder="商品名を入力">

            <!-- ブランド名 -->
            <h3 class="text-lg font-bold mb-2">ブランド名</h3>
            <input type="text" name="brand_name" class="w-full px-4 py-2 border rounded-lg mb-4" placeholder="ブランド名を入力">

            <!-- 商品説明 -->
            <h3 class="text-lg font-bold mb-2">商品の説明</h3>
            <textarea name="description" rows="4" required class="w-full px-4 py-2 border rounded-lg mb-4" 
                placeholder="商品の説明を入力"></textarea>

            <!-- 販売価格 -->
            <h3 class="text-lg font-bold mb-2">販売価格</h3>
            <input type="number" name="price" required class="w-full px-4 py-2 border rounded-lg mb-6" 
                placeholder="¥" min="0">

            <button type="submit"
                class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition duration-200">
                出品する
            </button>
        </form>
    </div>
</div>
@endsection
