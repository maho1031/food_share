@include('layouts.head')
@extends('layouts.app')
@section('title', '購入された商品一覧')
@section('content')

<section class="c-container p-product">
            <div class="p-productContainer">
                <div class="p-product__header">
                    <p class="c-title">購入された商品一覧</p>
                </div>
                <div id="app" class="p-product__wrapper">
                    <shop-sold-product>
                    </shop-sold-product>
                </div>

                <p class="p-productForm__txt"><a class="p-productForm__txt-link" href="{{route('shop.show')}}">マイページへ戻る</a></p>
            </div>
</section>
@endsection