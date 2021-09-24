@include('layouts.head')
@extends('layouts.app')
@section('title', '出品した商品一覧')
@section('content')

<section class="c-container p-product">
            <div class="p-productContainer">
                <div class="p-product__header">
                    <p class="c-title">出品した商品一覧</p>
                </div>

                <div id="app" class="p-product__wrapper">
                    <shop-product-list>
                    </shop-product-list>
                </div>

            
            <p class="p-productForm__txt"><a class="p-productForm__txt-link" href="{{route('shop.show')}}">マイページへ戻る</a></p>
            </div>
</section>
@endsection