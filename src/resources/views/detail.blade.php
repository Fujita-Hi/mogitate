@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('content')
<div class="breadcrumb">

</div>
<form action="/products/{{$product->id}}/update" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="breadcrumb">
        <p><a href="/products">商品一覧</a>>キウイ</p>
    </div>
    <div class="grid__contents">
        <div class="image__contents">
            <img src="{{ url('img/'.$product->image) }}" alt="image" class="product__image">
            <input name="image" class="product__file" type="file"></input>
            @if($errors->has('image'))
                @foreach($errors->get('image') as $message)
                    <div style="color: red;">{{ $message }}</div>
                @endforeach
            @endif
        </div>

        <div class="detail__contents">
            <p class="product__tag">商品名</p>
            <input name="name" type="text" class="product__text" value="{{ old('name', $product->name) }}"></input>
            @if($errors->has('name'))
                @foreach($errors->get('name') as $message)
                    <div style="color: red;">{{ $message }}</div>
                @endforeach
            @endif
            <p class="product__tag">値段</span></p>
            <input name="price" type="text" class="product__text" value="{{ old('price', $product->price) }}"></input>
            @if($errors->has('price'))
                @foreach($errors->get('price') as $message)
                    <div style="color: red;">{{ $message }}</div>
                @endforeach
            @endif
            <p class="product__tag">季節</p>
            <div class="product__checkbox">
                <label class="checkbox__label">
                    <input type="checkbox" class="checkbox__input" name="seasons[]" value="1" {{ $seasons['haru'] ? 'checked' : '' }}>
                    春
                </label>
                <label class="checkbox__label">
                    <input type="checkbox" class="checkbox__input" name="seasons[]" value="2" {{ $seasons['natsu'] ? 'checked' : '' }}>
                    夏
                </label>
                <label class="checkbox__label">
                    <input type="checkbox" class="checkbox__input" name="seasons[]" value="3" {{ $seasons['aki'] ? 'checked' : '' }}>
                    秋
                </label>
                <label class="checkbox__label">
                    <input type="checkbox" class="checkbox__input" name="seasons[]" value="4" {{ $seasons['fuyu'] ? 'checked' : '' }}>
                    冬
                </label>
                @if($errors->has('seasons'))
                    @foreach($errors->get('seasons') as $message)
                        <div style="color: red;">{{ $message }}</div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <p class="product__tag">商品説明</p>
    <textarea name="description" type="textarea" class="product__textarea">{{ old('description', $product->description) }}</textarea>
    @if($errors->has('description'))
        @foreach($errors->get('description') as $message)
            <div style="color: red;">{{ $message }}</div>
        @endforeach
    @endif

    <div class="form__button">
        <a href="/products" class="button__back--link"><div class="button__back">戻る</div></a>
        <button class="button__update">変更を保存</button>
    </div>

</form>

@endsection