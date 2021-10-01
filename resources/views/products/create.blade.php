@include('layouts.head')
@extends('shop.layouts.app')
@section('title', '商品新規登録')
@section('content')

<main class="l-main">
    <div class="c-container p-productForm">
        <div class="p-productFrom__header">
            <p class="c-title__sub">商品新規登録</p>
            @include('error')
        </div>

        <div id="app" class="p-productForm__inner">
        
            <form-create
            :categories="{{ $categories }}"
            ></form-create>
        </div>

        <p class="p-productForm__txt"><a href="{{route('shop.show')}}" class="p-productForm__txt-link">マイページへ戻る</a></p>
    </div>
</main>

@endsection