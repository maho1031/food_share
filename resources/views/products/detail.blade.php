@include('layouts.head')
@extends('shop.layouts.app')
@section('title', '商品詳細')
@section('content')

<main class="l-main">
    <div class="c-container p-productDetail">
        <div id="app" class="p-productDetail__wrapper">
                <product-show
                :product_id="{{ $product_id }}"
                >
                </product-show>
                

                    <div class="p-btnContainer">
                        @if($product->sold_flg === 0)
                        <a href="{{route('products.edit', ['id' => $product->id]) }}" class="c-btn p-btnContainer__btn">商品の編集</a>
                        @endif
                    </div>


            </div>
    </div>
</main>

@endsection