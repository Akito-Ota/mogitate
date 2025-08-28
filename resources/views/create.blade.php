@extends('layouts.app')

@section('title', '商品登録')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endpush

@section('content')
<div class="container">
    <h2>商品登録</h2>

    {{-- バリデーションエラー表示 --}}
    @if ($errors->any())
    <div class="error-box">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- 商品名 --}}
        <div class="field">
            <label for="name">商品名</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="商品名を入力">
        </div>

        {{-- 価格 --}}
        <div class="field">
            <label for="price">価格</label>
            <input type="text" name="price" id="price" value="{{ old('price') }}" placeholder="例: 800">
            <p class="hint">0〜10000円以内で入力してください</p>
        </div>

        {{-- 画像 --}}
        <div class="field">
            <label for="image">商品画像</label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg">
        </div>

        {{-- 季節 --}}
        <div class="field">
            <label>季節</label>
            <div class="checkbox-group">
                @foreach($seasons as $season)
                <label>
                    <input type="checkbox" name="season_ids[]" value="{{ $season->id }}"
                        {{ in_array($season->id, old('season_ids', [])) ? 'checked' : '' }}>
                    {{ $season->name }}
                </label>
                @endforeach
            </div>
        </div>

        {{-- 説明 --}}
        <div class="field">
            <label for="description">商品説明</label>
            <textarea name="description" id="description" rows="4" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
        </div>

        {{-- ボタン --}}
        <div class="form-buttons">
            <button type="submit" class="btn-submit">登録する</button>
            <a href="{{ route('products.index') }}" class="btn-cancel">戻る</a>
        </div>
    </form>
</div>
@endsection