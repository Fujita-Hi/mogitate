@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
<h1 class="main__title">商品一覧</h1>
<div class="main__contents">
   <form action="/products/register" method="POST" enctype="multipart/form-data">
        @csrf
        <p class="register__tag">商品名<span class="register__required">必須</span></p>
        <input name="name" type="text" class="register__text" placeholder="商品名を入力"></input>
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <p class="register__tag">値段<span class="register__required">必須</span></p>
        <input name="price" type="text" class="register__text" placeholder="値段を入力"></input>
        @if($errors->has('price'))
            @foreach($errors->get('price') as $message)
                <div style="color: red;">{{ $message }}</div>
            @endforeach
        @endif
        <p class="register__tag">商品画像<span class="register__required">必須</span></p>
        <input name="image" class="register__file" type="file"></input>
        @if($errors->has('image'))
            @foreach($errors->get('image') as $message)
                <div style="color: red;">{{ $message }}</div>
            @endforeach
        @endif
        <p class="register__tag">季節<span class="register__required">必須</span><span class="register__multiple">複数選択可</span></p>
        <div class="register__checkbox">
            <label class="checkbox__label">
                <input name="seasons[]" type="checkbox" class="checkbox__input" value="1">
                春
            </label>
            <label class="checkbox__label">
                <input name="seasons[]" type="checkbox" class="checkbox__input" value="2">
                夏
            </label>
            <label class="checkbox__label">
                <input name="seasons[]" type="checkbox" class="checkbox__input" value="3">
                秋
            </label>
            <label class="checkbox__label">
                <input name="seasons[]" type="checkbox" class="checkbox__input" value="4">
                冬
            </label>
            
            @error('seasons')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <p class="register__tag">商品説明<span class="register__required">必須</span></p>
        <textarea name="description" type="textarea" class="register__textarea" placeholder="商品の説明を入力"></textarea>
        @if($errors->has('description'))
            @foreach($errors->get('description') as $message)
                <div style="color: red;">{{ $message }}</div>
            @endforeach
        @endif

        <div class="form__button">
            <a href="/products" class="button__back--link"><div class="button__back">戻る</div></a>
            <button class="button__register">登録</button>
        </div>
    </form>
</div>
@endsection