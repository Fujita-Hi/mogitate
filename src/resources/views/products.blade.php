@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}" />
<link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@endsection

@section('content')
<div class="main__header">
    <h1 class="main__title">商品一覧</h1>
    <a href="/products/register" class="main__button">+ 商品を追加</a>
</div>

<div class="main__contents">
    <div class="search__contents">
        <form action="/products/search" method="GET" class="search__form">
            @csrf
            <input name="keyword" type="text" placeholder="商品名で検索" class="search__box" value="{{ old('keyword', $keyword) }}"></input>
            <button class="search__button">検索</button>

            <p class="search__sort--text">価格順で表示</p>
            <div class="search__sort">
                <select name="sort" id="" class="sort__select">
                    <option value="" class="sort__select--disabled" selected disabled>価格順に表示</option>
                    <option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}>高い順に表示</option>
                    <option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>低い順に表示</option>
                </select>
                @if (isset($sort))
                    <button name="sort" value="" class="sort__clear">{{ $sort == 'asc' ? '低い' : '高い' }}順に表示<i class="fa-regular fa-circle-xmark"></i></button>
                @endif
            </div>
        </form>
        <hr class="under__border"></hr>
    </div>
    <div class="info__contets">
        <div class="item__contents">
            @foreach ($products as $product)
                <div class="item__card">
                    <a href="/products/{{$product->id}}" class="card__link">
                        <img src="{{ url('img/'.$product->image) }}" alt="img" class="card__image">
                        <div class="card__bottom">
                            <p>{{$product->name}}</p>
                            <p>￥{{$product->price}}</p>
                        </div>
                    </a>
                </div>
            @endforeach    
        </div>
        <div class="pagination__contents">
            {{ $products->links('pagination::default') }}
        </div>
    </div>
</div>

@endsection