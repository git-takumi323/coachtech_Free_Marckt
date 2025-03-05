@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg flex">
        <!-- 左側（商品情報 & 支払い方法 & 配送先） -->
        <div class="w-2/3 pr-8">
            <!-- 商品情報 -->
            <div class="flex items-center mb-6">
                <img src="{{ $item->image_url ?? 'https://via.placeholder.com/150' }}" 
                     alt="商品画像" class="w-24 h-24 rounded-lg">
                <div class="ml-4">
                    <h2 class="text-xl font-bold">{{ $item->name }}</h2>
                    <p class="text-lg font-semibold text-gray-700">¥{{ number_format($item->price) }}</p>
                </div>
            </div>

            <!-- 支払い方法 -->
            <h3 class="text-lg font-bold mb-2">支払い方法</h3>
            <form method="POST" action="{{ route('purchase.process', $item->id) }}">
                @csrf
                <select name="payment_method" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-6">
                    <option value="">選択してください</option>
                    <option value="コンビニ払い" {{ old('payment_method', 'コンビニ払い') == 'コンビニ払い' ? 'selected' : '' }}>コンビニ払い</option>
                    <option value="カード払い" {{ old('payment_method') == 'カード払い' ? 'selected' : '' }}>カード払い</option>
                </select>

                <!-- 配送先 -->
                <h3 class="text-lg font-bold mb-2">配送先</h3>
                <div class="bg-gray-100 p-4 rounded-lg flex justify-between">
                    <div>
                        <p class="text-gray-700">〒 {{ Auth::user()->postal_code ?? 'XXX-YYYY' }}</p>
                        <p class="text-gray-700">{{ Auth::user()->address ?? 'ここには住所と建物が入ります' }}</p>
                    </div>
                    <a href="{{ route('purchase.address.edit', $item->id) }}" class="text-blue-500 hover:underline">
                        変更する
                    </a>
                </div>

                <!-- 右側（購入情報 & 購入ボタン） -->
                <div class="w-1/3 bg-gray-100 p-6 rounded-lg mt-6">
                    <h3 class="text-lg font-bold mb-4">購入情報</h3>
                    <div class="mb-4">
                        <p class="text-gray-700">商品代金</p>
                        <p class="text-lg font-bold">¥{{ number_format($item->price) }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-700">支払い方法</p>
                        <p class="text-lg font-bold" id="selected-payment">コンビニ払い</p>
                    </div>
                    <button type="submit"
                        class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition duration-200">
                        購入する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector("select[name='payment_method']").addEventListener("change", function() {
        document.getElementById("selected-payment").innerText = this.value || "未選択";
    });
</script>

@endsection
