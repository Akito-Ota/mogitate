@extends('layouts.app')

@section('title', '商品一覧')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endpush
@section('content')
<div class="container">
    <div class="sidebar">
        <h2>商品一覧</h2>

        <form method="GET" action="{{ route('products.index') }}" class="search-box">
            <input type="text" name="q" value="{{ $q }}" placeholder="商品名で検索">
            <button type="submit">検索</button>

            {{-- 並び替え（セレクトで十分） --}}
            <label class="sort-label">価格順で表示</label>
            <select name="sort" onchange="this.form.submit()">
                <option value="" {{ $sort==='' ? 'selected' : '' }}>デフォルト</option>
                <option value="price_asc" {{ $sort==='price_asc'  ? 'selected' : '' }}>低い順に表示</option>
                <option value="price_desc" {{ $sort==='price_desc' ? 'selected' : '' }}>高い順に表示</option>
            </select>
        </form>


        <div class="chips">
            @if($q !== '')
            <span class="chip">「{{ $q }}」
                <a href="{{ route('products.index', array_filter(['sort'=>$sort])) }}">×</a>
            </span>
            @endif
            @if($sort === 'price_asc')
            <span class="chip">低い順
                <a href="{{ route('products.index', array_filter(['q'=>$q])) }}">×</a>
            </span>
            @elseif($sort === 'price_desc')
            <span class="chip">高い順
                <a href="{{ route('products.index', array_filter(['q'=>$q])) }}"></a>
            </span>
            @endif
        </div>

        <a href="{{ route('products.create') }}" class="btn-add">+ 商品を追加</a>
    </div>

    <div class="grid">
        @forelse($products as $product)
        <a class="card" href="{{ url('/products/'.$product->id) }}">
            <div class="thumb">
                <img src="{{ asset($product->image ?? 'storage/image/noimage.png') }}" alt="{{ $product->name }}">
            </div>
            <div class="meta">
                <div class="name">{{ $product->name }}</div>
                <div class="price">¥{{ number_format($product->price) }}</div>
            </div>
        </a>
        @empty
        <p>該当する商品がありません。</p>
        @endforelse
    </div>
    <a class="card" href="{{ route('products.show', $product->id) }}">
        <div class="thumb">
            <img src="{{ asset($product->image ?? 'storage/image/noimage.png') }}" alt="{{ $product->name }}">
        </div>
        <div class="meta">
            <div class="name">{{ $product->name }}</div>
            <div class="price">¥{{ number_format($product->price) }}</div>
        </div>
    </a>


    <div class="pager">
        {{ $products->onEachSide(1)->links() }}
    </div>
</div>
@endsection