@extends('layouts.app')

@section('title', $product->name.' | 商品詳細')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endpush

@section('content')
<div class="detail-container">

    <div class="detail-header">
        <a class="back-link" href="{{ route('products.index') }}">商品一覧</a>  {{ $product->name }}
    </div>

    <div class="detail-panel">
        {{-- 左：画像 --}}
        <div class="detail-left">
            <div class="img-box">
                <img src="{{ asset($product->image ?? 'storage/image/noimage.png') }}" alt="{{ $product->name }}">
            </div>
            <label class="file-label">
                <span>ファイルを選択</span>
                <input type="file" form="product-update" name="image" accept=".png,.jpeg,.jpg">
            </label>
            @error('image')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- 右：フォーム --}}
        <div class="detail-right">
            <form id="product-update" method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                @csrf
                {{-- 商品名 --}}
                <div class="field">
                    <label>商品名</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="商品名を入力">
                    @error('name') <p class="error">{{ $message }}</p> @enderror
                </div>

                {{-- 価格 --}}
                <div class="field">
                    <label>値段</label>
                    <input type="text" name="price" value="{{ old('price', $product->price) }}" placeholder="値段を入力">
                    @error('price') <p class="error">{{ $message }}</p> @enderror
                    <p class="hint">0〜10000円以内で入力してください</p>
                </div>

                {{-- 季節 --}}
                <div class="field">
                    <label>季節</label>
                    @php $checked = old('season_ids', $product->seasons->pluck('id')->toArray()); @endphp
                    <div class="radios">
                        @foreach($seasons as $season)
                        <label class="radio">
                            <input type="checkbox" name="season_ids[]" value="{{ $season->id }}"
                                {{ in_array($season->id, $checked ?? []) ? 'checked' : '' }}>
                            <span>{{ $season->name }}</span>
                        </label>
                        @endforeach
                    </div>
                    @error('season_ids') <p class="error">{{ $message }}</p> @enderror
                </div>

                {{-- 説明 --}}
                <div class="field">
                    <label>商品説明</label>
                    <textarea name="description" rows="5" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
                    @error('description') <p class="error">{{ $message }}</p> @enderror
                    <p class="hint">120文字以内で入力してください</p>
                </div>

                {{-- ボタン --}}
                <div class="actions">
                    <a href="{{ route('products.index') }}" class="btn ghost">戻る</a>
                    <button type="submit" class="btn primary">変更を保存</button>
                </div>
            </form>

            {{-- 削除 --}}
            <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('削除しますか？');">
                @csrf @method('DELETE')
                <button type="submit" class="delete-btn" title="削除">🗑</button>
            </form>
        </div>
    </div>
</div>
@endsection